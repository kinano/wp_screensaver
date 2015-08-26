This repo gives you a way to generate the RSS feed necessary to use any images that you may have stored on your WordPress site & use it(the RSS feed) for Google ScreenSaver(now part of Picasa). 

The goal is to use images that you had already published as a screensaver on any number of computers.

You can control what images you retrieve from the DB, the order in which the images are fetched & what titles/tags you want to display.

There are two files:

1. index.php 
This file will be used to connect to your wordpress DB, fetch the image records and render them using the appropriate RSS tags for Google/Picasa Screensaver clients or any clients that understand the photo RSS feed.
You can test that the repo works by browsing to the php file on your site. 
Please make sure you read the comments in the code. 
This file should be placed anywhere you want your screensaver to be visible to the public. Just make sure you can get to the wp-config.php file  
2. get_screen_saver_images.SQL 
shows the DDL that will create the stored procedure(mySQL) responsible for fetching the picture records from your wordpress DB.
You could modify the SP to limit the number of images it returns or the order of the pictures.
If you are using other plugins to manage your wordpress pictures/galleries, you may need to modify the stored procedure a bit.
Alternatively, you could create a view or query the table(s) directly but I usually prefer SPs to take advantage of the SQL engine execution plan.

If you have questions, please shoot me an email: k@theSilentCamera.com
