<?php 
require 'vendor/autoload.php';
use PhpScience\TextRank\Tool\StopWords\Indonesian;
use PhpScience\TextRank\TextRankFacade;

$text = $_POST['text'];
$api = new TextRankFacade();
$stopWords = new Indonesian();
$api->setStopWords($stopWords);
$result = $api->getOnlyKeyWords($text); 
$result = $api->getHighlights($text); 

$result2['result'] = array();
$result = $api->summarizeTextBasic($text);
$result3 = "";
foreach($result as $rs){
    $result3 = $result3 . $rs; 
    
}
array_push($result2['result'], $result3);
echo json_encode($result2);
 ?>