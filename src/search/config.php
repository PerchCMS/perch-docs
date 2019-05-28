<?php
	$solr_config = array(
				        'adapteroptions' => array(
				            'host' => 'search.grabaperch.com',
				            'port' => 80,
				            'path' => '/solr/',
				        )
				    );


	include('lib/Solarium/Autoloader.php');
	include('lib/Paging.class.php');
	include('lib/Template.class.php');
	include('lib/Util.class.php');
	include('lib/XMLTag.class.php');


	
