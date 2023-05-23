<?php

class Paging
{
    public $enabled  = true;
    
    private $per_page       = 10;
    private $start_position = 0;
    private $total          = 0;
    private $type           = 'db';
    private $current_page   = 1;
    
    private $offset         = 0;
    
    function __construct()
    {
        if (isset($_GET['page']) && is_numeric($_GET['page'])) {
    		$this->current_page = (int)$_GET['page'];
    	}
    }    

    public function enable()
    {
        $this->enabled  = true;
    }
    
    public function disable()
    {
        $this->enabled = false;
    }
    
    
    public function enabled()
    {
        return $this->enabled;
    }
    
    public function set_per_page($per_page=10)
    {
        $this->per_page = $per_page;
    }
    
    public function per_page()
    {
        return $this->per_page;
    }
    
    public function set_start_position($start_position=0)
    {
        $this->start_position = $start_position;
    }
    
    public function start_position()
    {
        return $this->start_position;
    }
    
    public function offset()
    {
        return $this->offset;
    }
    
    public function set_offset($offset=0)
    {
        $this->offset = $offset;
    }
    
    public function set_total($total)
    {
        $this->total    = $total;
    }
    
    public function total()
    {
        return $this->total;
    }
    
    public function set_type($type='db')
    {
        $this->type = $type;
    }
    
    public function type()
    {
        return $this->type;
    }
    
    public function lower_bound()
    {
        return (($this->per_page * $this->current_page) - $this->per_page) + $this->offset;
    }
    
    public function upper_bound()
    {
        $ub = $this->lower_bound() + $this->per_page - 1;
        
        if ($this->total != 0 && $ub > $this->total) {
            return $this->total;
        }
        
        return $ub;
    }
    
    public function number_of_pages()
    {
        return ceil((0-$this->offset + $this->total) / $this->per_page);
    }
    
    public function is_first_page()
    {
        if ($this->current_page == 1) {
            return true;
        }
        
        return false;
    }
    
    public function is_last_page()
    {
        if ($this->current_page == $this->number_of_pages()) {
            return true;
        }
        
        return false;
    }
    
    public function current_page()
    {
        return $this->current_page;
    }
    
    public function to_array()
    {        
        $out    = array();
        $out['paging']          = '1';
        $out['total']           = $this->total();
        $out['number_of_pages'] = $this->number_of_pages();
        $out['per_page']        = $this->per_page();
        $out['current_page']    = $this->current_page();
        
        $out['lower_bound']     = $this->lower_bound()+1;
        $out['upper_bound']     = $this->upper_bound()+1;
        
        if ($this->total != 0 && $out['upper_bound'] > $this->total) {
            $out['upper_bound'] = $this->total;
        }
                
        $out['prev_url']        = '';
        $out['prev_link']       = '';
        $out['next_url']        = '';
        $out['next_link']       = '';
            

        $get_vars = $_GET;

        if (!$this->is_first_page()) {
            $get_vars['page']   = $this->current_page()-1;
            $out['prev_url']    = '?'.http_build_query($get_vars);
            $out['not_first_page'] = true;
        }
        
        if (!$this->is_last_page()) {
            $get_vars['page']   = $this->current_page()+1;
            $out['next_url']    = '?'.http_build_query($get_vars);
            $out['not_last_page'] = true;
        }
        
        return $out;
    }
    
    public function get_page_links($limit=false)
    {
        $number_of_pages = $this->number_of_pages();
        $lower = 1;
        $upper = $number_of_pages;
        
        if ($limit) {
            
            $half_limit = ceil($limit/2);
            
            $lower = $this->current_page() - $half_limit;
            $upper = $this->current_page() + $half_limit+1;
            
            
            if ($upper > $number_of_pages) {
                $upper = $number_of_pages;
                $lower = $upper-$limit;
            } 
            
            if ($lower < 1) {
                $lower = 1;
                $upper = ($limit>$number_of_pages?$number_of_pages:$limit);
            }    
            
        }
        
        $Page = Page::fetch();
        
        $page_links = array();
        
        for ($i=$lower; $i<=$upper; $i++) {
            $tmp = array();
            $p = $Page->request_uri;
            if (strpos($p, 'page:')===false) {
                $p = rtrim($p, '/').'/page:0';
            }
            $p = preg_replace('/page\:[0-9]+/', 'page:'.($i), $p);
            
            $tmp['url'] = $p;
            $tmp['page_number'] = $i;
            
            if ((int)$this->current_page() == $i){
                $tmp['selected'] = true;
            }
            
            $page_links[] = $tmp;
        }
        
        return $page_links;
    }
}

?>