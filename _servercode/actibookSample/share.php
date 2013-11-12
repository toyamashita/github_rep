<?php
header("Cache-Control:   no-store,   no-cache,   must-revalidate");
header("Cache-Control:   post-check=0,   pre-check=0",   false);

$path = "./share/";
$type = $_POST['type'];
if($type == "log"){
	$penlog = $_POST['penlog'];
	$taglog = $_POST['taglog'];
	$sid = time();
	$randNum = mt_rand();
	$sid = $sid.$randNum;
	$logFileName = $sid.".xml";
	$nowPageNo = $_POST['nowpageno'];
	$neighborPageNo = $_POST['neighborpageno'];
	$filePath = $path.$logFileName;
	while(file_exists($filePath)){
		$sid = time();
		$randNum = mt_rand();
		$logFileName = $sid.$randNum.".xml";
		$filePath = $path.$logFileName;
	}
	$file = fopen($filePath,"a");
	fwrite($file,'<?xml version="1.0" encoding="UTF-8"?>'."\n");
	fwrite($file,'<log>'."\n");
	fwrite($file,$nowPageNo."\n");
	fwrite($file,$neighborPageNo."\n");
	fwrite($file,'<pen>'."\n");
	fwrite($file,$penlog);
	fwrite($file,'</pen>'."\n");
	fwrite($file,'<tag>'."\n");
	fwrite($file,$taglog);
	fwrite($file,'</tag>'."\n");
	fwrite($file,'</log>'."\n");
	fclose($file);
	echo $sid;
	return;
}
$randNum = mt_rand();
$fileName = time().$randNum.".xml";
$filePath = $path.$fileName;
while(file_exists($filePath)){
	$randNum = mt_rand();
	$fileName = time().$randNum.".xml";
	$filePath = $path.$fileName;
}
if($type == "pen"){
	$style = $_POST['style'];
	$penX = $_POST['penX'];
	$penY = $_POST['penY'];
	$lineSlope = $_POST['lineSlope'];
	$startX = $_POST['startX'];
	$startY = $_POST['startY'];
	$endX = $_POST['endX'];
	$endY = $_POST['endY'];
	$pageNo = $_POST['pageNo'];
	$thickness = $_POST['thickness'];
	$alpha = $_POST['alpha'];
	$color = $_POST['color'];
	$pointXMLStr = $_POST['point'];
	
	$file = fopen($filePath,"a");
	fwrite($file,'<?xml version="1.0" encoding="UTF-8"?>'."\n");
	fwrite($file,'<share>'."\n");
	fwrite($file,"  <pen>"."\n");
	fwrite($file,"    ".$style."\n");
	fwrite($file,"    ".$penX."\n");
	fwrite($file,"    ".$penY."\n");
	fwrite($file,"    ".$lineSlope."\n");
	fwrite($file,"    ".$startX."\n");
	fwrite($file,"    ".$startY."\n");
	fwrite($file,"    ".$endX."\n");
	fwrite($file,"    ".$endY."\n");
	fwrite($file,"    ".$pageNo."\n");
	fwrite($file,"    ".$thickness."\n");
	fwrite($file,"    ".$alpha."\n");
	fwrite($file,"    ".$color."\n");
	fwrite($file,$pointXMLStr."\n");
	fwrite($file,"  </pen>"."\n");
	fwrite($file,"</share>"."\n");
	fclose($file);
}
if($type == "tag"){
	$id = $_POST['id'];
	$pageTotalNum = $_POST['pageTotalNum'];
	$pageNo = $_POST['pageNo'];
	$color = $_POST['color'];
	$stageX = $_POST['stageX'];
	$stageY = $_POST['stageY'];
	$flagLeftOrRight = $_POST['flagLeftOrRight'];
	$contents = $_POST['contents'];
	$inLinkPageNo = $_POST['inLinkPageNo'];
	$outLink = $_POST['outLink'];
	$belongToPageNo= $_POST['belongToPageNo'];
	
	$file = fopen($filePath,"a");
	fwrite($file,'<?xml version="1.0" encoding="UTF-8"?>'."\n");
	fwrite($file,'<share>'."\n");
	fwrite($file,"  <tag>"."\n");
	fwrite($file,"    ".$id."\n");
	fwrite($file,"    ".$pageTotalNum."\n");
	fwrite($file,"    ".$pageNo."\n");
	fwrite($file,"    ".$color."\n");
	fwrite($file,"    ".$stageX."\n");
	fwrite($file,"    ".$stageY."\n");
	fwrite($file,"    ".$flagLeftOrRight."\n");
	fwrite($file,"    ".$contents."\n");
	fwrite($file,"    ".$inLinkPageNo."\n");
	fwrite($file,"    ".$outLink."\n");
	fwrite($file,"    ".$belongToPageNo."\n");
	fwrite($file,"  </tag>"."\n");
	fwrite($file,"</share>"."\n");
	fclose($file);
}
echo $fileName;
?>