<?php
	require('../blog/wp-config.php');
	$mysqli  = new mysqli(SCREENSAVER_DB_HOST,SCREENSAVER_DB_USER, SCREENSAVER_DB_PASSWORD,SCREENSAVER_DB_NAME);
	$nudes = 'false';
	if(strtolower($_GET['nudes']) == 'true')
	{
		$nudes = 'true';
	}
	$sql = 'CALL get_screen_saver_images('.$nudes.')';
	$result = $mysqli->query($sql);
	$url	=	site_url();
	$site_name	=	get_bloginfo();
	$site_description	=	get_bloginfo ( 'description' );
	header('Content-type: application/json');
	$photos = array();
    while ($row = $result->fetch_object())
    {
		$link = $url.'/'.$row->path.'/'.$row->filename;
		$title = html_entity_decode($row->title);
		$photos[] = array(
			'url' => "$link" ,
			'owner' => "$site_name.' '.$site_description). ' '. $row->imagedate",
			'title' => "$title"
		);		
	}
	echo (json_encode(array(
		"status" => "ok",
		"photos" => $photos
	)));
?>