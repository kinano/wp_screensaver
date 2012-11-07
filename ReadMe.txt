This repo has two files:
1) index.php 
This file will be used to call wordpress DB, fetch the image records and render them to Google/Picasa Screensaver clients.
You can test that the repo works by browsing to the php file on your site. 
Please make sure you read the comments in the code. 
Also remember that you need both wordpress and nggallery plugin running on your site. 
This file should be placed anywhere you want your screensaver to be visible to the public.

2) get_screen_saver_images.SQL 
shows the DDL that will create the stored procedure(mySQL) responsible for fetching the picture records from your wordpress DB.
You could modify the SP to limit the number of images it returns or the order of the pictures.
If you are using other plugins to manage your wordpress pictures/galleries, you may need to modify the stored procedure a bit.

If you have questions, please shoot me an email: k@theSilentCamera.com