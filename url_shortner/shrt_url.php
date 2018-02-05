<?php 
@include_once 'Urls.class.php';

if(empty($_GET['url'])){
    die('Please provide a URL to shorten.');
}else{
	echo $_GET['url'];
}

$l = new Urls();
//$l->test_connection();
$linkId = $l->addShort($_GET['url']);
echo 'insert_id: '.$linkId;

//echo Urls::get_url_protocol().''.$_SERVER['HTTP_HOST'].'/'. Urls::numToAlpha($linkId); // return short URL
?>

