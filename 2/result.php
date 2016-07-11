<!DOCTYPE html>
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta charset="UTF-8">
	<title>Result</title>
     <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no">
	<link rel="stylesheet" href="./Css/style.css">
</head>
<body>
<?php
	require_once './Tools/PHPExcel.php';
	$filename = "./Data/KJS.xls";
	$objReader = PHPExcel_IOFactory::createReaderForFile($filename);
	$objPHPExcel = $objReader->load($filename);
	$objPHPExcel->setActiveSheetIndex(0);


	//string a is the result and selt is which time
	if( isset($_GET['selt']) ){
		$weekday = date("w"); //
		$across = 'A';
		if($weekday == 0){
			$across = 'G';
		}
		while($weekday > 1){
			$weekday --;
			$across ++;
		}
		$down = $_GET['selt'];
		$result = $objPHPExcel->getActiveSheet()->getCell("$across$down")->getValue();
	}
?>
<header id="header" style="vertical-align:middle;">
<div style="background:rgba(136,36,23,1.00); font:'Lucida Grande', 'Lucida Sans Unicode', 'Lucida Sans', 'DejaVu Sans', Verdana, sans-serif; vertical-align: top; font-size:1.2em; width:auto; color:white; letter-spacing: -1.2px;"><nobr>
	<img src="image/3.jpg" alt="symbol" width="65" height="54" style="vertical-align:middle;">SCIE Available Classrooms </nobr></div>
</header>
<div id="main">
  <p>Search Result</p>
	<div class="content-box">
	  <div class="select-btn"><div><?php print($result) ?></div></div></a>
	</div>
</div>

<br><br><br>
<input type="button" name="back" value="Back" onclick ="location.href='./index.html'" style="background:rgba(136,36,23,1.00); color:white; height:50px; width:80px; font-size:18px;">
<br><br><br>
<hr style="width:auto;">
<h5 style="font:Constantia, 'Lucida Bright', 'DejaVu Serif', Georgia, serif;"> Copyright &copy; 2016 Susie. All rights reserved.
<br> <br>This website is created to benefit everyone in SCIE.
<br>Feel free to use it whenever you need an available classroom for self studies or other purposes.
</h5>
</body>
</html>
