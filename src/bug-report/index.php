<?php

	$type 	  = filter_input(INPUT_POST, 'type');
	$report   = filter_input(INPUT_POST, 'breport');
	$page 	  = filter_input(INPUT_POST, 'page', FILTER_SANITIZE_URL);
	$honeypot = filter_input(INPUT_POST, 'name');

	if (trim($honeypot)!='') die();

	if (trim($report)=='') {
		if ($page) {
			header('Location: '.$page);
		}else{
			header('Location: /');
		}
		die();
	}

	switch($type) {
		case 'problem' :
			$subject = 'Problem with '.$page;
			break;

		case 'suggestion' :
			$subject = 'Suggestion for '.$page;
			break;

		default:
			die();
			break;
	}


	// Anti spam stuff

		// Kill anything containing '[/link]'
		if (strpos($report, '[/link]')!==false) {
			die();
		}


	// == anti spam


	$message = "#c:logged_from_site \n\n" . $report . "\n\nPage: $page";


	$data = [
		'subject' => $subject,
		'description' => $message,
		'project' => 10, // Perch Documentation project ID
		'priority' => 1,
	];


	// Send email to Sifter with Postmark

	$postmark_data = [
		'From'     => 'drew@edgeofmyseat.com',
		'To'       => 'drew.mclellan+docs@edgeofmyseat.com',
		'Subject'  => $subject,
		'TextBody' => $message,
	];

	$ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, 'https://api.postmarkapp.com/email');
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_HTTPHEADER, [
											'Accept: application/json',
											'Content-Type: application/json',
											'X-Postmark-Server-Token: 2f80f6e9-49d2-4103-a9f7-9e0007126d7f',
										]);
	curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postmark_data));


    $output = curl_exec($ch);
    curl_close($ch);


    header('Location: /bug-report/thanks/');
    exit;