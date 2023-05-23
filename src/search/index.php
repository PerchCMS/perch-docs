<?php
	include('config.php');

	$query        = filter_input(INPUT_GET, 'q', FILTER_SANITIZE_STRIPPED);
	$search_type  = filter_input(INPUT_GET, 'type', FILTER_SANITIZE_STRIPPED);
	$result_order = filter_input(INPUT_GET, 'order', FILTER_SANITIZE_STRIPPED);

	include('perform_search.php');

	$resultset = false;
	$search_down = true;

	$final_output = [];

	if (is_array($results) && isset($results['search.done'])) {
		$resultset = $results['search.result'];
		$Paging    = $results['search.paging'];
		$keywords  = $query;
		$type      = $search_type;
		$search_down = false;

		$final_output['title']   = $results['result.title'];
		$final_output['heading'] = $results['page.heading'];
	}
	

	
	if ($resultset) {
	    
	
	    $Template = new Template('result_list/index.html', __DIR__);
	    if ($Paging) {
	        $Template->set_vars($Paging);
	    }
	    if ($keywords) $Template->set('keywords',$keywords);
	    if ($type) $Template->set('filtertype',$type);
	  
	    
	    $out = array();
	    foreach ($resultset['hits']['hits'] as $document) {
	        $tmp = array();
	        $tmp['title']         = $document['_source']['title'];
	        $tmp['url']           = $document['_source']['url'];
	        $tmp['excerpt']       = $document['_source']['excerpt'];
	        $tmp['type']          = $document['_source']['doctype'];
	        $out[] = $tmp;
	    }
	    
	    if ($resultset['hits']['total'] == 0) {
	        
	        if (isset($resultset['suggest']['spelling']) && count($resultset['suggest']['spelling'][0]['options'])) {


	            $sugg = $resultset['suggest']['spelling'][0]['options'][0]['text'];
	            
	            $arr_suggestions = array();
	            
	            /*
	            // Reverse the results, as we want to work from the end of the string so that the char counts don't change as we make replacements.
	            foreach($spellcheckResult as $suggestion) {     
	                $arr_suggestions[] = $suggestion;
	            }
	            
	            $arr_suggestions = array_reverse($arr_suggestions);
	            
	            foreach($arr_suggestions as $suggestion) {  
	                $sugg = substr_replace($sugg, $suggestion->getWord(), $suggestion->getStartOffset(), ($suggestion->getEndOffset()-$suggestion->getStartOffset()));
	            }
	            */
	            
	            $Template->set('suggestion', $sugg);
	        }
	        
	    }

	    $final_output['content'] =  $Template->render_group($out, true);
	    
	}else{

	}
	
	
	if ($search_down) {
	    $final_output['content'] = '<h2>Sorry</h2><p>Sorry, our search facility is currently unavailable.</p>';
	}


	$Template = new Template('type_facet/index.html', __DIR__);
	$final_output['facets'] = $Template->render_group($results['facets'], true);

	$Template = new Template('result_page/index.html', __DIR__);
	echo $Template->render($final_output);

