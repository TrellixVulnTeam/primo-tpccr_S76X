
<?php
	session_start();
	$MLName = $_GET['MLName'];
$fileURL = $_GET['FileURL'];
$info = pathinfo($fileURL);

$fileURL= str_replace(".".$info["extension"],".pdf",$fileURL);

//$fileURL="../../primo/uploadFiles/CA4.pdf";
$file = $_GET['FileName'];

$file= str_replace(".".$info["extension"],".pdf",$file);

$sFileVal =explode('.',$file);
$RedirectURL=$_GET['RedirectURL'];

$file	=  $sFileVal[0];
//$url = "https://10.160.0.75/primo/PDF-TO-TEXT/example.php?FileURL=$fileURL&FileName=$file&RedirectURL=$RedirectURL";

$url = "https://10.160.0.88/primo/OCR/test.php?FileURL=$fileURL&FileName=$file&RedirectURL=$RedirectURL";


//$ch = curl_init();
//curl_setopt($ch, CURLOPT_URL, $url);
//curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
//curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true );
// This is what solved the issue (Accepting gzip encoding)
//curl_setopt($ch, CURLOPT_ENCODING, "gzip,deflate");     
//$response = curl_exec($ch);
//curl_close($ch);
 
//file_put_contents("../uploadfiles/$file.txt", $response);
$_SESSION[$MLName]=1;
header("Location:".$url); 
?>