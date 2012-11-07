<?php
/*
 	RSS2 Feed Template that will connect to a wordpress DB (with nggallery plugin installed). 
	The page will get the picture records and display them using Google Picasa Screensaver format. You may see a working example on the following URL: 
	http://theSilentCamera.com/screenSaver
	@package theSilentCamera
 	Remember that you have to output the XML with no whitespaces. Whitespaces will cause Picasa client to blow up...
*/
//	The images will be fetched from wordpress's DB. 
//	We need to include the wp_config file. Change the following string based on your wordpress setup:
require('/wp-config.php');
//	Let's define our DB object using the constants in wp-config.php
$mysqli  = new mysqli(DB_HOST,DB_USER, DB_PASSWORD,DB_NAME);
//	Build the SQL query, We will call a dedicated SP that should be on your woredpress DB: 
$sql = 'CALL get_screen_saver_images()';
// 	Build the resultset
$result = $mysqli->query($sql);
// 	Define a local var that will hold wordpress URL(as seen in the blog settings and wp_options table):
$url	=	site_url();
//	Define a local variable for the title of the blog(e.g. the Silent Camera):
$site_name	=	get_bloginfo();
//	Get the blog tagline(description):
$site_description	=	get_bloginfo ( 'description' );
//	Render the xml according to the spec:
echo ('<?xml version="1.0" encoding="utf-8"?>');
?>
<rss version="2.0"
	 xmlns:media="http://search.yahoo.com/mrss/"
	    xmlns:dc="http://purl.org/dc/elements/1.1/"
	    xmlns:creativeCommons="http://cyber.law.harvard.edu/rss/creativeCommonsRssModule.html"
	    xmlns:flickr="urn:flickr:" >
<channel>
	<title><?php echo($site_name);?></title>
	<link><?php echo($url);?></link>
	<description><?php echo($site_description);?></description>
    <?php
	//	Now, we need to get the individual pictures, their titles, descriptions and links:
    while ($row = $result->fetch_object()) 
    {
		// 	The following var will hold the URL to the individual picture:
		$link = $url.'/'.$row->path.'/'.$row->filename;
		// 	The following var will hold the URL to the picture thumbnail(this is the default setting of nggallery plugin):
		$thumb = $url.'/'.$row->path.'/thumbs/'.$row->filename;
		//	Get the title of the picture
		$title = html_entity_decode($row->title);
		//	Get the description of the picture
		$description = $row->description;
		//	Render the picture:
	?>
    <item>
        <pubDate><?php echo($row->imagedate);?></pubDate>
        <lastBuildDate><?php echo($row->imagedate);?></lastBuildDate>
        <generator><?php echo($url);?></generator>
        <link><?php echo($link);?></link>
        <description><![CDATA[<?php echo($description);?>]]></description>
        <title><![CDATA[<?php echo($title);?>]]></title>
        <media:content url="<?php echo($link);?>" type="image/jpeg"/> 
	    <media:title><![CDATA[<?php echo($title);?>]]></media:title> 
    	<media:description type="html"><![CDATA[<?php echo($description);?>]]></media:description> 
   	 	<media:thumbnail url="<?php echo($thumb);?>" height="120" width="120" /> 
    	<media:credit role="photographer"><?php echo($site_name.' | '.$site_description). ' | '. $row->imagedate; ?></media:credit> 
    	<media:category scheme="urn:flickr:tags"></media:category> 
    </item>
	<?php
	} //end the loop and close the xml output
	?>
</channel>
</rss>