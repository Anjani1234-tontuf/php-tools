<?php
//error_reporting(0);
//ini_set('memory_limit', '128M');
$sub=$_POST['sub'];
if($sub=="add"){
$image = $HTTP_POST_VARS['image'];
$newwidth = $HTTP_POST_VARS['twidth'];
$newheight = $HTTP_POST_VARS['theight'];
$supported_types = array(1, 2, 3);
$imgcheck=preg_match('|^http(s)?://[a-z0-9-]+(.[a-z0-9-]+)*(:[0-9]+)?(/.*)?$|i', $image);
if($imgcheck==0){
  echo '<font color=red>Please enter valid image source </font>';
  $form="false";
}
else if($newwidth==''  || !is_numeric($newwidth)){
  echo '<font color=red>Please enter width less than original width </font>';
  $form="false";
}
else if($newheight=='' || !is_numeric($newheight)){
  echo '<font color=red>Please enter height less than original height </font>';
  $form="false";
}

else{ 
  $size = GetImageSize($image);
  $oldwidth=$size[0];
  $oldheight=$size[1];
  $width = $size[0];
  $height = $size[1];
  $type=$size[2];
  $width = $width-$newwidth;
  $height = $height-$newheight;
  $x = $width/2;
  $y = $height/2;  
if(!in_array($type, $supported_types))
  {
   echo '<font color=red>Unsupported Image Type ' . $image_type.'</font>';
   $form="false";
  }
else if($newheight!='' && $newheight>=$size[1]){
  echo '<font color=red>Please enter height less than original height </font>';
  $form="false";
}
else if($newwidth!='' && $newwidth>=$size[0]){
  echo '<font color=red>Please enter width less than original width </font>';
  $form="false";
}    
else{    
   $src = imagecreatefromstring(file_get_contents($image));
   $tmb = imagecreatetruecolor($newwidth,$newheight);
   //imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
   imagecopyresized($tmb, $src, 0, 0, 0, 0, $newwidth, $newheight,$oldwidth,$oldheight);
   $path = pathinfo($image);
   $extension= $path['extension'];
   $filename=$path['basename'];
   if($type==1){   
    header('Content-type:image/gif');
    imagegif($tmb);
   }
   else if($type==2){
     header('Content-type: image/jpeg');
     ImageJpeg($tmb,null, 100);
	}
   else if($type==3){
     header('Content-type: image/png');
     Imagepng($tmb);
	}
ImageDestroy($src);
ImageDestroy($tmb);
ImageDestroy($thumb);
$form="false";
}
}
}
?>
<script type="text/javascript">
function ctck()
{
    var sds = document.getElementById("dum");
    if(sds == null){
        alert("You are using a free package.\n You are not allowed to remove the tag.\n");
    }
    var sdss = document.getElementById("dumdiv");
    if(sdss == null){
        alert("You are using a free package.\n You are not allowed to remove the tag.\n");
    }
}
document.onload="ctck()";
</script>
<?php
if($form=="false" || $form==""){
?>  
<table align=center cellspacing=0 cellpadding=5 style='border:1px solid green;'>
<tr><td>
<form name='thumbnail' method=post action="<?php echo $PHP_SELF;?>">
Image Path:</td><td><input type=hidden name=sub value="add">
<input type=text name='image' value="<?php echo $image;?>"></td></tr>
<tr><td>Width:</td><td><input type=text name=twidth value="<?php echo $newwidth;?>"></td></tr>
<tr><td>Height:</td><td><input type=text name=theight value="<?php echo $newheight;?>"></td></tr>
<tr><td colspan=2 align=center><input type=submit value=Submit>
<div style="font-size: 10px;color: #dadada;" id="dumdiv">
<a href="http://www.hscripts.com" id="dum" style="text-decoration:none;color: #dadada;">&copy;H</a></div>
</td></tr> 
</form>
</table>
<?php
}
?>
