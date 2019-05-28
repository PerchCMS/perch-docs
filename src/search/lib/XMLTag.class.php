<?php

class XMLTag
{
	private $attributes = array();
	private $tag;
	
	private $namespaced = array();
	
	function __construct($tag) {
		$this->tag	= $tag;
		$this->parse();
	}
	
	private function parse()
	{
		$tag	= $this->tag;
		
		$s		= '/([a-z-:]*)="([^"]*)"/';
		$count	= preg_match_all($s, $tag, $matches, PREG_SET_ORDER);
		
		if ($count > 0) {
			foreach($matches as $match) {
				$this->attributes[$match[1]] = $match[2];
				
				if (strpos($match[1], ':')>0) {
				    $parts = explode(':', $match[1]);
				    $this->namespaced[$parts[0]][$parts[1]] = $match[2];
				}
			}
		}
	}
	
	function get_attributes()
	{
		return $this->attributes;
	}
	
	function __call($method, $arguments=false)
	{
	    $method = str_replace('_', '-', $method);
        
		if (isset($this->attributes[$method]) && $this->attributes[$method]!='false') {
			return $this->attributes[$method];
		}
		
		return false;
	}
	
	public function set($key, $val)
	{
	    $this->attributes[$key] = $val;
	}
	
	public function is_set($key)
	{
	    return isset($this->attributes[$key]);
	}
	
	public function get_attributes_by_namespace($name)
	{ 
	    if (isset($this->namespaced[$name])) return $this->namespaced[$name];
	    
	    return false;
	}

    public static function create($name, $type, $attrs=array())
    {    
        if ($type!='closing' && Util::count($attrs)) {
            $attpairs = array();
            foreach($attrs as $key=>$val) {
                if ($val!='') {
                    $attpairs[] = Util::html($key).'="'.Util::html($val, true).'"';
                } 
            }
            $attstring = ' '.implode(' ', $attpairs);
        }else{
            $attstring = '';
        }
        
        switch($type) {
            case 'opening':
                return '<'.Util::html($name).$attstring.'>';
                break;
                
            case 'single':
                if (defined('PERCH_XHTML_MARKUP') && PERCH_XHTML_MARKUP==false) {
                    return '<'.Util::html($name).$attstring.'>';
                }else{
                    return '<'.Util::html($name).$attstring.'>';
                }
                break;

            case 'closing':
                return '</'.Util::html($name).'>';
                break;
        }
        
        return '';
    }
}
