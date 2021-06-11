<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
	<?php 
	require_once __DIR__ . '/vendor/autoload.php';
	$mpdf= new \Mpdf\Mpdf();
$page=file_get_contents("uploads.php");
$document->loadHTML($page);
$mpdf->WriteHTML($page);
$mpdf->Output('file.pdf','D');
	?>
</body>
</html>