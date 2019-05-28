<?php

class Template
{
    public $render_empty = false;
    
    protected $path;
	protected $file = false;
	protected $template;
	protected $cache		= array();
	
	protected $set_values   = array();
	
	private $raw_input_file;
	
	
	function __construct($file=false, $path)
	{
	    if ($file===false) return;
	    $this->path = $path;
		
	    $file = str_replace('.html', '', $file).'.html';
		
		$this->raw_input_file = $file;
		
		if (file_exists($path.'/templates/'.$file)) {
		    $this->file		= $path.'/templates/'.$file;
			$this->template	= $file;   
		}else{
		    echo 'Template file not found: ' . $path.'/templates/'.$file;
			return false;
		}
			
	}
	
	public function is_valid()
	{
	    if ($this->file) return true;
	    return false;
	}
	
	public function render_group($content_vars, $return_string=false)
	{
		$r	= array();
		if (Util::count($content_vars)){    
		    $count = Util::count($content_vars);
			
			$i = 0;
			foreach($content_vars as $item) {
			    if (is_object($item)) $item = $item->to_array();
			    if ($i==0) $item['cms_item_first'] = true;
			    if ($i==($count-1)) $item['cms_item_last'] = true;
			    $item['cms_item_index'] = $i+1;
			    $item['cms_item_odd'] = ($i % 2 == 0 ? '' : 'odd');
				$r[] = $this->render($item, true, $i+1);
			    $i++;
			}
			
		}else{
		    $this->use_noresults();
		    return $this->render(array());
		}
		
		if ($return_string) {
		    return implode('', $r);
		}
		
		return $r;
	}

    public function render_nested($content_vars, $outer_vars=false)
    {
        $row_file   = str_replace('.html', '.item.html', $this->raw_input_file);
        $row_template = new Template($row_file, $this->path);
        
        foreach($this->set_values as $key=>$val) $row_template->set($key, $val);
        $row_template->set_user($this->AuthenticatedUser);
        
        $rows = '';
                
        if (Util::count($content_vars)) {
            $rows = $row_template->render_group($content_vars);       
            $rows = implode('', $rows);
        }
        
        $data = array();
        
        if (is_object($outer_vars)) {
            $outer_vars = $outer_vars->to_array();
        }
        
        if (is_array($outer_vars)){
            $data = $outer_vars;
        }
        
        if (strlen($rows)) $data['items'] = $rows;
        
        return $this->render($data);
    }

	public function render($content_vars, $strip_unmatched=true, $index_in_group=false)
	{
	    if (is_object($content_vars)) {
            
            // If it's a collection, render_group should've been called
            if (get_class($content_vars) == 'Collection') {
                return $this->render_group($content_vars, true);
            }

            $content_vars = $content_vars->to_array();
        }

        if (Util::count($content_vars)==0){
            if (!$this->render_empty) return;
            $content_vars = array();
        }

        $content_vars   = array_merge($this->set_values, $content_vars);
		
			
		$template	= $this->template;
		$path		= $this->file;
		
		$contents	= $this->load();
		
		



        // FORMS
		$contents = str_replace('<cms:form', '<cms:form template="'.$template.'"', $contents);

        // CONDITIONALS
		$i = 0;
        while (strpos($contents, 'cms:')>0 && $i<10) {
            
            /*$s = '/(<cms:(if|after|before)[^>]*>)(((?!cms:(if|after|before)).)*)<\/cms:(if|after|before)>/s';*/
            $s = '/(<cms:((?>if|after|before))[^>]*?>)(((?!cms:(?>if|after|before)).)*?)?<\/cms:(\2)>/s';
    		
    		$count	= preg_match_all($s, $contents, $matches, PREG_SET_ORDER);
		    
    		if ($count > 0) {		    
    			foreach($matches as $match) {
    			    $contents = $this->parse_conditional($match[2], $match[1], $match[3], $match[0], $contents, $content_vars);
    			}	
    		}else{
    		    break;
    		}
    		
    		$i++;
    	}

        // REPEATERS
        if ($index_in_group!==false) {
            $i = 0;
            while (strpos($contents, 'cms:every')>0 && $i<10) {
                $s = '/((?><(cms:(every)))[^>]*?>)((?!cms:every).*?)(?><\/\2>)/s';

        		$count	= preg_match_all($s, $contents, $matches, PREG_SET_ORDER);

        		if ($count > 0) {		    
        			foreach($matches as $match) {
        			    $contents = $this->parse_repeater($index_in_group, $match[1], $match[4], $match[0], $contents, $content_vars);
        			}	
        		}

        		$i++;
        	}
        }


		// CONTENT
		if (Util::count($content_vars)) {
    		foreach ($content_vars as $key => $value) {	
		
		        // simple {replace}
		        if (!is_array($value)) {
		            $contents = str_replace('{'.$key.'}', $value, $contents);
		        }		        
		        		        
		        // complex tag replace
    			$s = '/<cms:(content|region)[^>]*id="'.$key.'"[^>]*>/';
    			$count	= preg_match_all($s, $contents, $matches);
    			
    			if ($count > 0) {
    				foreach($matches[0] as $match) {
    					$tag = new XMLTag($match);
					
    					if (is_object($value) && (get_class($value) == 'Image'||get_class($value) == 'ResourceImage')) {
    						if ($tag->class()) {
    							$out		= $value->tag($tag->class(), $tag->get_attributes());
    							$contents 	= str_replace($match, $out, $contents);
    						}else{
    							$out		= $value->tag(false, $tag->get_attributes());
    							$contents 	= str_replace($match, $out, $contents);
    						}
                        
    					}else{
    				    	$encode = true;
                        
                            $formatted_value = $value;

                            // check for implode on arrays
                            if (is_array($formatted_value)) {
					            if ($tag->implode()) {
					                $formatted_value = implode($tag->implode(), $formatted_value);
					            }else{
					                $formatted_value = implode(' ', $formatted_value);
					            }
					        }
					        
					        // check for objects!
					        if (is_object($formatted_value)) {
					            $formatted_value = '';
					        }

                            // check for 'format' attribute
    					    if ($tag->format()) {        
    					        $formatted_value = $this->_format($tag->format(), $formatted_value);
    					    }
    					    
    					    // check for 'replace' strings
    					    if ($tag->replace()) {
    					        $pairs = explode(',', $tag->replace());
					            if (Util::count($pairs)) {
					                foreach($pairs as $pair) {
					                    $pairparts = explode('|', $pair);
					                    if (isset($pairparts[0]) && isset($pairparts[1])) {
					                        $formatted_value = str_replace(trim($pairparts[0]), trim($pairparts[1]), $formatted_value);
					                    }
					                }
					            }
    					    }
    					    
    					    // check for urlify
    					    if ($tag->urlify()) {
    					        $formatted_value = Util::urlify($formatted_value);
    					    }

                            // check for 'chars' and 'words' limis
                            if ($tag->chars()) {
                                if (strlen($value) > (int)$tag->chars()) {
                                    $formatted_value = Util::excerpt_char($value, (int)$tag->chars());
                                }
                            }
                        
                            if ($tag->words()) {
                                $formatted_value = Util::excerpt($value, (int)$tag->words());
                            }
                        

    					    // check the encode attribute on the tag
    					    if ($tag->encode() == false) $encode = false;

    					    // encode
    					    if ($encode) {
    					        if ($tag->encode()=='url') {
    					            $formatted_value = urlencode($formatted_value);
    					        }
    					        
    					        
    					        $formatted_value = Util::html($formatted_value);
    						}
						    
						    if ($tag->suppress()) {
						        $formatted_value = '';
						    }
						       
					        $contents = str_replace($match, $formatted_value, $contents);
						    
    						
    					}
					
    				}
				
    			}
			
    		}
    	}
		





		
		// SUB TEMPLATES
		
		$s 			= '/<cms:template[^>]*id="([^"]*)"[^>]*>/';
		$temp		= preg_match_all($s, $contents, $all_subtemplates, PREG_SET_ORDER);
		
		if (is_array($all_subtemplates)) {
			foreach ($all_subtemplates as $item) {
			    $template_path   = $item[1];			    
                $SubTemplate = new Template($template_path, $this->path);
                $SubTemplate->render_empty = true;
                
                $contents 	= str_replace($item[0], $SubTemplate->render(array()), $contents);
			}
		}
		
		$contents = $this->remove_noresults($contents);
		
		// CLEAN UP ANY UNMATCHED <cms:> TAGS
		if ($strip_unmatched) {
    		$s 			= '/<[\/]{0,1}cms:(?!(form|input|label|error|success|setting))[^>]*>/';
    		$contents	= preg_replace($s, '', $contents);
		}
		        
		
    	return $contents;
	}

    public function remove_noresults($contents)
    {
        $s = '/<cms:noresults[^>]*>.*?<\/cms:noresults>/s';
        return preg_replace($s, '', $contents);     
    }
    
    public function use_noresults()
    {   
        $contents = $this->load();
        $s = '/<cms:noresults[^>]*>(.*?)<\/cms:noresults>/s';
        $count	= preg_match_all($s, $contents, $matches, PREG_SET_ORDER);
	    $out = '';
		if ($count > 0) {
			foreach($matches as $match) {
			    $out .= $match[1];
			}	
		}
		// replace template with string
		$this->load($out);
		$this->render_empty = true;
    }



	public function find_tag($tag)
	{
		$template	= $this->template;
		$path		= $this->file;
		
		$contents	= $this->load();
			
		$s = '/<cms:[^>]*id="'.$tag.'"[^>]*>/';
		$count	= preg_match($s, $contents, $match);

		if ($count == 1){
			return new XMLTag($match[0]);
		}
		
		return false;
	}
	
	public function find_all_tags($type='content')
	{
	    $template	= $this->template;
		$path		= $this->file;
		
		$contents	= $this->load();
		
		$s = '/<cms:'.$type.'[^>]*\>/';
		$count	= preg_match_all($s, $contents, $matches);
		
		if ($count > 0) {
		    $out = array();
		    if (is_array($matches[0])){
		        foreach($matches[0] as $match) {
		            $out[] = new XMLTag($match);
		        }
		    }
		    
		    return $out;
		}
		
		return false;
	}

	public function load($template_string=false)
	{
		$contents	= '';
		
		if ($template_string!==false) {
		    $contents = $template_string;
		    $this->cache[$this->template]	= $contents;
		}else{
		    // check if template is cached
    		if (isset($this->cache[$this->template])){
    			// use cached copy
    			$contents	= $this->cache[$this->template];
    		}else{
    			// read and cache		
    			if (file_exists($this->file)){
    				$contents 	= file_get_contents($this->file);
    				$this->cache[$this->template]	= $contents;
    			}
    		}
		}
		
		return $contents;
	}
	
	protected function parse_conditional($type, $opening_tag, $condition_contents, $exact_match, $template_contents, $content_vars)
	{
	    
	    // IF
	    if ($type == 'if') {
	        $tag = new XMLTag($opening_tag);
	        
	        $positive = $condition_contents;
            $negative = '';
	        	        
	        // else condition
	        if (strpos($condition_contents, 'cms:else')>0) {
    	        $parts   = preg_split('/<cms:else\s*\>/', $condition_contents);
                if (is_array($parts) && count($parts)>1) {
                    $positive = $parts[0];
                    $negative = $parts[1];
                }
            }
	        
	        // exists
	        if ($tag->exists()) {
	            if (array_key_exists($tag->exists(), $content_vars) && $content_vars[$tag->exists()] != '') {
    	            $template_contents  = str_replace($exact_match, $positive, $template_contents);
    	        }else{
    	            $template_contents  = str_replace($exact_match, $negative, $template_contents);
    	        }
	        }
	        

	        
	        // id
	        if ($tag->id()) {
	            $matched = false;
	            $sideA = false;
	        	$sideB = false;
	        	
	        	if (array_key_exists($tag->id(), $content_vars) && $content_vars[$tag->id()] != '') {
    	            $sideA  = $content_vars[$tag->id()];
    	        }
	        	
	            $comparison = 'eq';
	            if ($tag->match()) $comparison = $tag->match();
	            if ($tag->value()) $sideB = $tag->value();
	                      
	                      
	            switch($comparison) {
	                case 'eq': 
                    case 'is': 
                    case 'exact': 
                        if ($sideA == $sideB) $matched = true;
                        break;
                    case 'neq': 
                    case 'ne': 
                    case 'not': 
                        if ($sideA != $sideB) $matched = true;
                        break;
                    case 'gt':
                        if ($sideA > $sideB) $matched = true;
                        break;
                    case 'gte':
                        if ($sideA >= $sideB) $matched = true;
                        break;
                    case 'lt':
                        if ($sideA < $sideB) $matched = true;
                        break;
                    case 'lte':
                        if ($sideA <= $sideB) $matched = true;
                        break;
                    case 'contains':
                        if (preg_match('/\b'.$sideB.'\b/i', $sideA)) $matched = true;
                        break;
                    case 'regex':
                    case 'regexp':
                        if (preg_match($sideB, $sideA)) $matched = true;
                        break;
                    case 'between':
                    case 'betwixt':
                        $vals  = explode(',', $sideB);
                        if (Util::count($vals)==2) {
                            if ($sideA>trim($vals[0]) && $sideB<trim($vals[1])) $matched = true;
                        }
                        break;
                    case 'eqbetween':
                    case 'eqbetwixt':
                        $vals  = explode(',', $sideB);
                        if (Util::count($vals)==2) {
                            if ($sideA>=trim($vals[0]) && $sideB<=trim($vals[1])) $matched = true;
                        }
                        break;
                    case 'in':
                    case 'within':
                        $vals  = explode(',', $sideB);
                        if (Util::count($vals)) {
                            foreach($vals as $value) {
                                if ($sideA==trim($value)) {
                                    $matched = true;
                                    break;
                                }
                            }
                        }
                        break;
                    
	            }          
	                      
	            
	            if ($matched) {
	                $template_contents  = str_replace($exact_match, $positive, $template_contents);
	            }else{
	                $template_contents  = str_replace($exact_match, $negative, $template_contents);
	            }
	        }
	        
	    }
	    
	    // BEFORE
        if ($type == 'before') {
            if (array_key_exists('cms_item_first', $content_vars)) {
                $template_contents = str_replace($exact_match, $condition_contents, $template_contents);
            }else{
                $template_contents = str_replace($exact_match, '', $template_contents);
            }
        }
        
        // AFTER
        if ($type == 'after') {
            if (array_key_exists('cms_item_last', $content_vars)) {
                $template_contents = str_replace($exact_match, $condition_contents, $template_contents);
            }else{
                $template_contents = str_replace($exact_match, '', $template_contents);
            }
        }
	    
	    return $template_contents;
	}
	
	protected function parse_repeater($index_in_group, $opening_tag, $condition_contents, $exact_match, $template_contents, $content_vars)
	{
	    $tag = new XMLTag($opening_tag);
	    
	    if ($tag->count()) {
	        $count = (int) $tag->count();
            $offset = 0;
            
            if ($count !== 0 && ($index_in_group % $count == 0)) {
	            $template_contents = str_replace($exact_match, $condition_contents, $template_contents);
	        }else{
	            $template_contents = str_replace($exact_match, '', $template_contents);
	        }
            
	    }elseif ($tag->nth_child()) {
	        
	        $nth_child = $tag->nth_child();
	        $nths = array(0);
	        
	        if (is_numeric($nth_child)) {
	            $nths[] = (int)$nth_child;
	        }else{
	            
	            $multiplier = 0;
	            $offset = 0;
	            
	            switch($nth_child) {
	                
	                case 'odd':
	                    $multiplier = 2;
	                    $offset = 1;
	                    break;
	                    
	                case 'even':
	                    $multiplier = 2;
	                    $offset = 0;
	                    break;
	                
	                default:
	                    $s = '/([\+-]{0,1}[0-9]*)n([\+-]{0,1}[0-9]+){0,1}/';
                        if (preg_match($s, $tag->nth_child(), $matches)) {
                            if (isset($matches[1]) && $matches[1]!='' && $matches[1]!='-') {
                                $multiplier = (int) $matches[1];
                            }else{
                                if ($matches[1]=='-') {
                                    $multiplier = -1;
                                }else{
                                    $multiplier = 1;
                                }
                            }

                            if (isset($matches[2])) {
                                $offset = (int) $matches[2];
                            }else{
                                $offset = 0;
                            }
                        }
	                    break;
	            }
                
                $n=0;        
                if ($multiplier>0) {
                    while($n<1000 && max($nths)<=$index_in_group) {
                        $nths[] = ($multiplier*$n) + $offset;
                        $n++;
                    }
                }else{
                    while($n<1000) {
                        $nth = ($multiplier*$n) + $offset;
                        if ($nth>0) {
                            $nths[] = $nth;  
                        }else{
                            break;
                        }
                        $n++;
                    }
                }
	        }
	        
	        if (Util::count($nths)) {
                if (in_array($index_in_group, $nths)) {
                    $template_contents = str_replace($exact_match, $condition_contents, $template_contents);
                }else{
                    $template_contents = str_replace($exact_match, '', $template_contents);
                }
	        }else{
	           $template_contents = str_replace($exact_match, '', $template_contents);  
	        }
	        
	        
	    }else{
	        // No count or nth-child, so scrub it.
	        $template_contents = str_replace($exact_match, '', $template_contents);   
	    }
	    
	    
	    
	    return $template_contents;
	}
	
	public function set_user($AuthenticatedUser)
	{
	    $this->AuthenticatedUser = $AuthenticatedUser;
	}
	
	public function set($key, $val)
	{
	    $this->set_values[$key] = $val;
	}
	
	public function set_vars($arr)
	{
	    if (is_object($arr)) {
	        $arr = $arr->to_array();
	    }
	    
	    if (is_array($arr)) $this->set_values = array_merge($this->set_values, $arr);
	}


    public function apply_runtime_post_processing($html)
    {
        $html = $this->render_forms($html);
        return $html;
    }
    
    public function render_forms($html, $data=false)
    {
        if (strpos($html, 'cms:form')!==false) {
            $Form = new TemplatedForm($html, $data);
            $html = $Form->render();
        }
        
        return $html;
    }


    private function _format($type, $formatted_value)
    {
        switch($type) {
            
            case 'uppercase':
                $formatted_value = strtoupper($formatted_value);
                break;

            case 'lowercase':
                $formatted_value = strtolower($formatted_value);
                break;

            case 'sentancecase':
                $formatted_value = ucfirst(strtolower($formatted_value));
                break;
                
            case 'url':
                $formatted_value = str_replace('/','<span></span>/', $formatted_value);
                break;
            
            default: 
                
                switch (substr($type, 0, 2)) {

		            case '$:':
		                // Money format = begins $: 
                        if (substr($type, 0, 2)==='$:') {
                            $formatted_value = money_format(substr($type, 2), floatval($formatted_value));
                        }
		                break;

		            case '#:':
		                // Number format = begins #: 
                        if (substr($type, 0, 2)==='#:') {
                            $decimals = 0;
                            $point = '.';
                            $thou = ',';

                            $number_parts = explode('|', substr($type, 2));

                            if (is_array($number_parts)) {
                                if (isset($number_parts[0])) $decimals = (int) $number_parts[0];
                                if (isset($number_parts[1])) $point = $number_parts[1];
                                if (isset($number_parts[2])) $thou = $number_parts[2];

                                $formatted_value = number_format(floatval($formatted_value), $decimals, $point, $thou);
                            }
                        }
		                break;

		            default:
		                // dates
		                if (strpos($type, '%')===false) {		          
                            $formatted_value = date($type,strtotime($formatted_value));
				        }else{
				            $formatted_value = strftime($type, strtotime($formatted_value));
				        }
		                break;
		        }
                
                break;
            
        }
        
        return $formatted_value;
    }

}