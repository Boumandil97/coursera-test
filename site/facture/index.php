<!doctype html>
<html>
<head>
	<link rel="stylesheet" href="mystyle.css">
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
	<h1 id="header">convertisser votre fichieren un clein d'oeille</h1>
	
	<form action="uploads.php" method="POST" enctype="multipart/form-data">
	<input type="file" name="file" id="load">
		<button type="submit" name="submit">UPLOAD YOUR EXEL FILE</button>
	
	</form>	
	
	
	
	
	
	
	
	
	
	
	<!--<h2>Read Excel By PHPExcel</h2>
<php
require_once "Classes/PHPExcel.php";
$path="Classeur1.xlsx";
$reader= PHPExcel_IOFactory::createReaderForFile($path);
$excel_Obj = $reader->load($path);
 
//Get the last sheet in excel
//$worksheet=$excel_Obj->getActiveSheet();
 
//Get the first sheet in excel
$worksheet=$excel_Obj->getSheet('0');
echo $worksheet->getCell('A3')->getValue();?> 
	-->
</body>
</html>