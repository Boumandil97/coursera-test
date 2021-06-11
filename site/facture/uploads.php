<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<link rel="stylesheet" href="mystyle.css">
</head>

<body>
	<h1>LONGMA INDUSTRY SARL</h1>
	<p>CLASS TRADE<BR><BR>RUE NEPALE ROUTE DE SEFROU FES<br>ICE &nbsp;: 00229133000010</p>
		<h2><b>Facture</b></h2>
<?php
require_once __DIR__ . '/vendor/autoload.php';

if(isset($_POST['submit'])){
	$file = $_FILES['file'];
	$fileName= $_FILES['file']['name'];
	$fileExt= explode('.',$fileName);
	$fileExtension= strtolower(end($fileExt));
	
	$fileTemp= $_FILES['file']['tmp_name'];
	$allowed = array('xlsx','xls');
	
	if(in_array($fileExtension,$allowed)){
		$fileDestination = 'upload/'.$fileName;
		move_uploaded_file($fileTemp,$fileDestination);
		require_once "Classes/PHPExcel.php";

$reader= PHPExcel_IOFactory::createReaderForFile($fileDestination);
$excel_Obj = $reader->load($fileDestination);
 
//Get the last sheet in excel
//$worksheet=$excel_Obj->getActiveSheet();
 
//Get the first sheet in excel
$worksheet=$excel_Obj->getSheet('0');
//echo $worksheet->getCell('A3')->getValue();
		$lastRow = $worksheet->getHighestRow();
		$colomncount = $worksheet->getHighestDataColumn();
		//echo $lastRow;
$colomncount_number=PHPExcel_Cell::columnIndexFromString($colomncount);
		
//		for($row=0;$row<=$lastRow;$row++){
//			echo "<table border='1'>";
//		echo "<tr>";
//		for($col=0;$col<=$colomncount_number;$col++){
//			echo "<td>";
//			echo $worksheet->getCell(PHPExcel_Cell::stringFromColumnIndex($col).$row)->getValue();
//			echo "</td>";
//		}
//		echo "</tr>";
//			echo "</table>";
//	}
		
		
			for($row=2;$row<=$lastRow;$row++){
				
				$nu=$worksheet->getCell('A'.$row)->getValue();
				if($nu== NULL) break;
				
				
			echo "<table border='1' id=\"table1\">
			<tr>
			   <th> NUMERO </th>
			   <th> DATE </th>
			   <th> REFERENCE </th>
			   <th> MODE DE REGLEMENT </th>
			   
			
			</tr>
		<tr>
			";
				$data=array(0,3,4,5);
				for($col=0;$col<=$colomncount_number;$col++){
					if(in_array($col,$data)){
			echo "<td>";
			echo $worksheet->getCell(PHPExcel_Cell::stringFromColumnIndex($col).$row)->getValue();
			echo "</td>";}
		}
				echo"</tr> </table>";
				
				
		
				echo "<table border='1'id=\"table2\">
			<tr>
			   <th> REFERENCE </th>
			   <th> DESIGNATION </th>
			   <th> Montant TTC	 </th>
			    <th>  Remise </th>
				<th>prix unité  </th>
			   <th> QTé </th>
			   
			  
			   
			   <th> * </th>
			
			</tr>
		<tr>
			";
	
			$data2= array(1,2,11,10,9,8);
				
				for($col=0;$col<=$colomncount_number;$col++){
				
					if(in_array($col,$data2)){
			echo "<td>";
			echo $worksheet->getCell(PHPExcel_Cell::stringFromColumnIndex($col).$row)->getValue();
			echo "</td>";}
		}
				echo"
				<td>V20</td>
				</tr></table>";
				   
			echo "<table border='1'id=\"table3\">
			<tr>
			  <th> Code </th>
			   <th> Base </th>
			   <th> Taux </th>
			    <th>  Montant </th>
			
			</tr>
		<tr>
			<td>V20</td>
			
			";
				   $mt=0;
			 for($col=0;$col<=$colomncount_number;$col++){
				
					if($col==12){
			echo "<td>";
			echo $mt= $worksheet->getCell(PHPExcel_Cell::stringFromColumnIndex($col).$row)->getValue();
			 ;
						echo "</td>";}
		}
			
				$mt=$mt*0.2;
			echo "<td>20%</td>
			       <td>
			".$mt."</td>";
			
			
		
		echo "<table border='1'id=\"table4\">
			<tr>
			  <th> Port </th>
			   <th> Total Ht </th>
			   <th> Escompte </th>
			    <th>  Totat TTC </th>
				<th>  Acompte </th>
				<th>  Net A PAYER </th>
			
			</tr>
		<tr>
			<td></td>
			
			";
				$net_a_payer=0;
				$ht=0;
				 for($col=0;$col<=$colomncount_number;$col++){
				
					if($col==12){
			
			 $ht= $worksheet->getCell(PHPExcel_Cell::stringFromColumnIndex($col).$row)->getValue();
			 ;
						}
					 elseif($col==8){
						 
			 $net_a_payer= $worksheet->getCell(PHPExcel_Cell::stringFromColumnIndex($col).$row)->getValue();
			 ;
						
					 }
		}
				echo "<td>".$ht."</td>
				<td>0.00</td>
							<td>".$net_a_payer."</td>  <td>0.00</td> <td>".$net_a_payer."</td>
							
							<br><br><br><br>";
		
		
		
		
		
		
		
		
		
		
		
	}
	
	
	
	
	
	
	
	
	
	
	}
	
	
	
	
	
	else{
		echo "<h2>your file isn't supproted</h2>";
	}
}



?>
	<!--<footer>
		<div>
		<form action="download.php">
	
	<Button type="submit" name="sub">generate pdf</Button>
	</form>
			</div>
		</footer>-->
</body>
</html>