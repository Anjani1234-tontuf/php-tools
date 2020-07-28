<?php
$titles = $_POST['wikititle'];
$titles = str_replace("_","%20",$titles);
$titles = str_replace(" ","%20",$titles);
$limit = 1;
$offset =0;
$url = "http://en.wikipedia.org/w/api.php?action=query&list=search&srsearch=$titles&srwhat=text&srlimit=$limit&sroffset=$offset&srinfo=totalhits&format=json";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_MAXREDIRS, 3);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
$data = curl_exec($ch);
if (!$data) { exit('cURL Error: '.curl_error($ch)); }
 $arr = json_decode($data, true);
    $searchResult = $arr['query']['search'];
    $rcount = $offset+1;
    if($searchResult!=''){
    foreach($searchResult as $item) {
        $wikititle = str_replace('\'','',$item['title']);
        $wikititle = str_replace("_","%20",$wikititle);
        $wikititle = str_replace(" ","%20",$wikititle);
        $url = "http://en.wikipedia.org/w/api.php?action=query&prop=extracts|info&exintro&titles=$wikititle&format=json&explaintext&redirects&inprop=url&indexpageids";
        $json = file_get_contents($url);
        $data = json_decode($json); 
        $pageid = $data->query->pageids[0];
        $output = $data->query->pages->$pageid->extract;
        $arr = explode("\n",$output);
        foreach ($arr as $value) {
           echo $value."<br>";
        }
    }
    $offset = $offset+$limit;
    }
?>