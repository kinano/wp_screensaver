This folder has two files:
1) index.php 
Thid file will be used to render the images to Google Picasa Screensaver clients.
You can test that it works by browsing to it on your site and making sure it has the correct relative path to wordpress setup.
Also remember that you need nggallery plugin on your wordpress setup. You may use other plugins but the code may have to change a little bit.
This file should be placed anywhere you want your screensaver to be visible to the public.

2) get_screen_saver_images.SQL shows the DDL for the SP that gets the picture records from wordpress DB.
Again, it relies on the availability of nggallery tables on your site.
