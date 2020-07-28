<div>
  <?php
  error_reporting(0);
  $url = $_POST['feed']; 
  $newstring = substr($url, -3);
  include('rssclass.php'); 
  if (!filter_var($url, FILTER_VALIDATE_URL) === false && $newstring=='xml')
  {
   $feedlist = new rss($url);
  echo $feedlist->display(20,$url);
  }
  else {
     echo "<div align='center' style='color:red;font-weight:bold;'>Check url and must be xml file</div>";
  }
?> 
</div>