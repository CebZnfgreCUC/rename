<?php
$url = $_GET['url'];
$name = $_GET['name'];

$type = strrchr($url, ".");
$uniq = uniqid(true);
copy($url, $uniq.$type);
rename($uniq.$type, $name);

$file = $name;

if (file_exists($file)) {
    header('Content-Description: File Transfer');
    header('Content-Type: image/jpg');
    header('Content-Disposition: attachment; filename="'.basename($file).'"');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($file));
    readfile($file);
    unlink($name);
    exit;
}else{
	unlink($uniq.$type);
	unlink($name);
}
?>
