<?php

class Util
{
    public static function array_sort($arr_data, $str_column, $bln_desc=false)
    {
        $arr_data                 = (array) $arr_data;
        
        if (Util::count($arr_data)) {
        
            $str_column               = (string) trim($str_column);
            $bln_desc                 = (bool) $bln_desc;
            $str_sort_type            = ($bln_desc) ? SORT_DESC : SORT_ASC;

            foreach ($arr_data as $key => $row)
            {
            ${$str_column}[$key]    = $row[$str_column];
            }

            array_multisort($$str_column, $str_sort_type, $arr_data);
            
        }

        return $arr_data;
    }
    
    public static function count($array)
    {
        if (is_object($array)) return $array->count();
        if (!is_array($array)) return 0;
        
        return count($array);
    }
    
    public static function html($s=false, $quotes=false)
	{
	    if ($quotes) {
	        $q = ENT_QUOTES;
	    }else{
	        $q = ENT_NOQUOTES;
	    }
	        
		return htmlspecialchars((string)$s, $q, 'UTF-8');
	    return '';
	}
	
	public static function load($file)
    {
        $Conf = Conf::fetch();
        $Page = Page::fetch();
        
        $file = rtrim($file, '.php') . '.php';
        
        if (file_exists($Conf->site.'/'.$file)) {
            return include $Conf->site.'/'.$file;
        }else{
            return include $Conf->system.'/'.$file;
        }
    }
    
    public static function redirect($url)
	{	
	    Console::log($url);
	    
	    $Page = Page::fetch();
	    if ($Page->may_redirect) {
	        header('Location: ' . $url);
    		exit;
	    }else{
	        echo Console::output();
	        exit;
	    }
	}
	
	public static function redirect_to_account($path='/studycentre')
	{	
        $Auth = Auth::fetch();
        $Conf = Conf::fetch();
        
        $url = 'http://'.$Auth->orgSlug.'.'.$Conf->account_domain.$path;
        
        Console::log($url);
        
        Util::redirect($url);
	}
	
	public static function excerpt($str, $words) {
	    $limit  = $words;
		$str 	= trim(strip_tags($str));
        $aStr 	= explode(" ", $str);
		$newstr	= '';
		
		if (Util::count($aStr) <= $limit) {
			return $str;
		}
		
        for($i=0; $i < $limit; $i++) {
                $newstr.=$aStr[$i] . " ";
        }
        
		return $newstr.'…';
	}
	
	public static function excerpt_char($str, $chars)
	{
	    $limit  = $chars;
	    
	    $str 	= trim(strip_tags($str));
	    
	    if (strlen($str) <= $limit) return $str;
	    
	    $str    = substr($str, 0, intval($limit));
	    $last_space = strrpos($str, ' ');
	    $str    = substr($str, 0, $last_space);
	    
	    return $str.'…';
	    
	}
	
	public static function pad($n)
	{
		if ((int)$n<10) return '0'.$n;	
		return $n;
	}

    public static function text_to_html($string, $strip_tags=true, $allowable_tags='')
    {
        if ($strip_tags) {
            $allowable_tags .= '<notextile>';
            $string = strip_tags($string, $allowable_tags);
        }
                
        $Textile    = new Textile;
        $string     =  $Textile->TextileThis(stripslashes($string));
                
        return $string;
    }
    
    public static function title_to_html($string, $strip_tags=true)
    {
        if ($strip_tags) $string = strip_tags($string);
                
        $Textile    = new Textile;
        $string     =  $Textile->TextileTitle(stripslashes($string));
                
        return $string;
    }
    
    public static function urlify($string)
    {   
        $s  = iconv('UTF-8', 'ASCII//TRANSLIT', $string);
        if ($s==false) $s=$string;
        $s  = strtolower($s);
        $s  = str_replace('-', ' ', $s);
        $s  = preg_replace('/[^a-z0-9\s]/', '', $s);
        $s  = trim($s);
        $s  = preg_replace('/\s+/', '-', $s);
        
        if (strlen($s)>0){
            return $s;
        }else{
            return Util::urlify_non_translit($string);
        }
        
    }
    
    public static function urlify_non_translit($string)
    {           
        $s  = strtolower($string);
        $s  = preg_replace('/[^a-z0-9\s]/', '', $s);
        $s  = trim($s);
        $s  = preg_replace('/\s+/', '-', $s);
        
        if (strlen($s)>0){
            return $s;
        }else{
            $md5    = md5($string);
            $s      = strtolower($md5);
            return 'ra-'.substr($s, 0, 4).'-'.substr($s, 5, 4);
        }
    }
    
    
	public static function send_email($to, $from_address, $from_name, $subject, $body, $bcc='sysadmin')
	{
		$Conf = Conf::fetch();
		
		$headers 	= "From: ".$from_name." <".$from_address.">\r\n";
		$headers 	.= "Bcc: ".$Conf->email[$bcc]."\r\n";

		if (is_array($to)) {
		    foreach($to as $mail_to) {
		        Console::log("Sending mail '$subject' to '$mail_to' from '$from_name' ($from_address) copying '".$Conf->email[$bcc]."'");
		        mail($mail_to, $subject, $body, $headers);
		    }
		    return true;
		}else{
		    Console::log("Sending mail '$subject' to '$to' from '$from_name' ($from_address) copying '".$Conf->email[$bcc]."'");
    		return mail($to, $subject, $body, $headers);
		}
		
		
	}
	
	public static function tagify($string)
    {   
        $s  = Util::urlify($string);
        //$s  = str_replace('-', '+', $s);
        
        return $s;  
    }
    
	public static function parse_for_images($rows, $class='Image', $tagsOnly=false)
	{
		if (is_array($rows)) {
			if (isset($rows[0]) && is_array($rows[0])) {
				foreach ($rows as &$row) {
					foreach ($row as $key=>&$val) {
						if (strpos($key, 'img')===0) {
							$val	= new $class($val);
							if ($tagsOnly) $val	= $val->tag();
						}
					}
				}
			}else{
				foreach ($rows as $key=>&$val) {
					if (strpos($key, 'img')===0) {
						$val	= new $class($val);
						if ($tagsOnly) $val	= $val->tag();
					}
				}
			}
			
		}
		
		return $rows;
	}
	
	public static function time_since($date)
	{
	    $stamp= strtotime($date);
	    
		$diff = (time() - $stamp);
		if ($diff <= 3600) {
			$mins = round($diff / 60);
			$since = ($mins <= 1)
			?	($mins==1)
				?	'1 '. 'minute'
				:	'a few seconds'
			:	"$mins ".'minutes';
		} else if (($diff <= 86400) && ($diff > 3600)) {
			$hours = round($diff / 3600);
			$since = ($hours <= 1) ? '1 '.'hour' : "$hours ".'hours';
		} else if ($diff >= 86400) {
			$days = round($diff / 86400);
			$since = ($days <= 1) ? "1 ".'day' : "$days ".'days';
		}
		return $since.' '.'ago'; 
	}
	
	
	public static function generate_random_string($length=6) {
		$chars = "abcdefghijklmnopqrstuvwxyz0123456789";
		$code = "";
		while (strlen($code) < $length) {
			$code .= $chars[mt_rand(0,strlen($chars)-1)];
		}
		return $code;
	}
	
	public static function implode_for_sql_in($rows)
    {
        $db = DB::fetch();
        foreach($rows as &$item) {
            $item = $db->pdb($item);
        }
        
        return implode(', ', $rows);
    }
    
    public static function balance_tags($str)
	{
	    // find broken tags
	    $regexp = '/<[^>]*$/';
	    preg_match($regexp, $str, $matches);
	    if (Util::count($matches)) {
	        // we have a broken tag
	        $last_lt = strrpos($str, '<');
	        if ($last_lt > 0) $str = substr($str, 0, $last_lt);
	    }
	    
	    // find opening tags
	    $regexp = '/<([^\/]([a-zA-z]*))[^>]*>/';
	    preg_match_all($regexp, $str, $matches);
	    if (Util::count($matches)) {
	        $opening_tags = $matches[1];
	        $closing_tags = array();
	        
	        $regexp = '/<\/([a-zA-z]*)>/';
    	    preg_match_all($regexp, $str, $matches);
    	    if (Util::count($matches)) {
	            $closing_tags = $matches[1];
    	    }
    	    
    	    // find closing tags for openers
    	    $opening_tags = array_reverse($opening_tags);
    	    foreach($opening_tags as $opening_tag) {
    	        if (isset($closing_tags[0])) {
    	            if ($closing_tags[0]!=$opening_tag) {
    	                $str .= '</'.$opening_tag.'>';
    	            }else{
    	                array_shift($closing_tags);
    	            }
    	        }else{
    	            $str .= '</'.$opening_tag.'>';
    	        }
    	    }
	    }
	    
	    return $str;
	}
	
	public static function bool_val($str)
    {
              
        $str = strtolower($str);
    
        if ($str === 'false') return false;
        if ($str === '0') return false;
        if ($str === 0) return false;
        if ($str === 'no') return false;
        if ($str === 'n') return false;
        if ($str === false) return false;
        
        if ($str === 'true') return true;
        if ($str === '1') return true;
        if ($str === 1) return true;
        if ($str === 'y') return true;
        if ($str === 'yes') return true;
        if ($str === true) return true;
        
        return false;
    }
    
    
    public static function create_sort_string($string)
    {
        $s = strtolower($string);
        $s = str_replace('-', '', $s);
        $s = preg_replace('/^(the|and|an)\b(.*)/', '$2', $s);
        
        $chars = array('"', "'", '[', '(');
        
        if (in_array($s[0], $chars)) {
            $s = substr($s, 1);
        }
        
        $new_s  = iconv('ISO-8859-1', 'UTF-8', $s);
        $new_s  = iconv('UTF-8', 'ASCII//TRANSLIT', $new_s);
        $new_s  = str_replace("'", '', $new_s);
        
        if ($new_s!=false) $s=$new_s;
        
        $s  = str_replace("'", '', $s);
        
        return trim($s);
    }
    
    public static function setcookie($name, $value='', $expires=0, $path='', $domain='', $secure=false, $http_only=false)
	{
	   header('Set-Cookie: ' . rawurlencode($name) . '=' . rawurlencode($value)
	                         . (empty($expires) ? '' : '; expires=' . gmdate('D, d-M-Y H:i:s \\G\\M\\T', $expires))
	                         . (empty($path)    ? '' : '; path=' . $path)
	                         . (empty($domain)  ? '' : '; domain=' . $domain)
	                         . (!$secure        ? '' : '; secure')
	                         . (!$http_only    ? '' : '; HttpOnly'), false);
	}
}


?>
