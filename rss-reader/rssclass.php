<?php
 class rss {	
     var $feed;
  function rss($feed) 
  {
    $this->feed = $feed;	
  }
  function parse()  
  {
   $url = utf8_encode(file_get_contents($this->feed));
   $rss = simplexml_load_string($url);
	// $rss = simplexml_load_file($url);	
	 $rss_split = array();		
	 foreach ($rss->channel->item as $item) {		
	   $title = (string) $item->title; // Title
	   $link   = (string) $item->link; // Url Link
	   $link = utf8_decode($link);
	   $title = utf8_decode($title);
	   $description = (string) $item->description; //Description
	   $description = utf8_decode($description);
	   $rss_split[] = '
		  <div class="link1">
			 <a href="'.$link.'" target="_blank" title="" >
				   '.$title.' 
			 </a><br>
			 <div class="desc">'.$description.'</div>
			 </div><br>';
	 }
	  if($rss_split==null)
	   {
		 echo "<div align='center' style='color:red;font-weight:bold;'>No feeds found</div>";
	   }
	 return $rss_split;
  }
  function display($numrows,$head) 
  {
    $rss_split = $this->parse();
    $i = 0;
    while ( $i < $numrows ) 
	{
      $rss_data .= $rss_split[$i];
      $i++;
    }
    $trim = str_replace('', '',$this->feed);
    $user = str_replace('&lang=en-us&format=rss_200','',$trim);
    
	
	$rss_data.='</div></div>';
    
    return $rss_data;
  }
}
?>
<style>
 .desc
 {
   color: #333;
    font: 1em/1.3em Tahoma,Geneva,sans-serif;
 }
 .link1 a
 {
  font-weight:bold;
 }
</style>