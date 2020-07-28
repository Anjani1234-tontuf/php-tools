Read Me:
--------
Features:
---------
1) Fetches the displays RSS feed from a given source.

2) Alert "No feeds found" will be displayed when invalid url is entered.

3) Responsive and easy to integrate.

Usage:
---------
1) Download and unzip the rss-reader.zip file.

2) Extract the zip file which contains, six files named "index.php, ajax-getrss.php, rssclass.php, Readme.txt, jquery.js and style.css" and loading.gif image.

3) Now run the index.php file in your browser to view the functionality of the script.

style.css:
-----------
1) style.css file contains the 'CSS properties' of the script.

2) Copy and paste the style elements into your style sheet.

3) CSS properties like 'Background, position, height, width, border' etc., can be modified according to your needs.
Note: Before placing the style sheet code, make sure to verify the class name and id names to avert the duplication.

Jquery.js :
--------------

This file contains the jquery library functions that supports the jquery animations. Do not change the code in this file. If changes are done in this file, then it will affect the functionality of the script.

rssclass.php
-------------
The url you have entered in the textbox is post through ajax request and it is passed through the function "$feedlist->display(15,$url);" in ajax-getrss.php file.

In rssclass.php file, display() function will load the entered site's rss file and display.

How to embed the script in to your webpage?
------------------------------------------------------

1) Open the index.php file.

2) The script code is available inside the <body> of the Index.php file. Copy the code within the <body></body> tag and paste it inside the <body></body> tag portion of your page.

3) Embed files in <head> tag
    <script src='jquery.js'></script>
        <link rel="stylesheet" type="text/css" href="style.css">

4) Make sure the style.css, rssclass.php,ajax-getrss.php,jquery.js and loading.gif image are placed in appropriate folder.

Script provided by:
*******************
This script is developed and owned by Hscripts.com
This is given under The GNU General Public License (GPL).

Downloads:
----------------
Kindly visit our site
https://www.hscripts.com/scripts/php/rss-reader.php to download the script
For further enquiries and support, mail us to support@hscripts.com
Thanks & regards,
Hscripts Team

Visit us at https://www.hscripts.com

