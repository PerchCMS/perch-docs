<?php

function build_url($defaults, $key, $value, $append=false)
{
    if (isset($defaults[$key])) {
        if ($append) {
            $parts = explode(',', $defaults[$key]);
        
            if (Util::count($parts) && in_array($value, $parts)) {
                $new_parts = array();
                foreach($parts as $part) {
                    if ($part!='') {
                        if ($part!=$value) $new_parts[] = $part;
                    }
                }
                $parts = $new_parts;
            }else{
                $parts[] = $value;
            }                

            if (Util::count($parts)) {
                if ($parts[0]=='') array_shift($parts);
                
                asort($parts);
                $defaults[$key] = implode(',', $parts);
            }else{
                $defaults[$key] = false;
            }
            
            
        }else{
           $defaults[$key] = $value; 
        }
    }else{
           $defaults[$key] = $value; 
        }
    


    $keywords = $defaults['keywords'];
    unset($defaults['keywords']);

    $parts = array();

    $parts['q'] = $keywords;

    foreach($defaults as $k=>$v) {
        if ($v!==false) $parts[$k] = $v;
    }
    

    $url = '/search/?'.http_build_query($parts);
    
    return str_replace('//', '/', $url);
    
}
