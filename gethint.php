<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
	<link href="starter-template.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	</head>
	
	<body>
<?php


// get the q parameter from URL
$q=(string)$_REQUEST["q"];
$len=(int)$_REQUEST["len"];

$hint=""; $array;

// lookup all hints from array if $q is different from ""
if ($q !== "")
  { $q=strtolower($q); //$len=strlen($q);
  
  $handle = fopen("dict.txt", "r") or die("Couldn't get handle");
if ($handle) {
    while (!feof($handle)) {
        $buffer = fgets($handle, 4096);
        // Process buffer here..
		//print $buffer;
		$buffer=trim($buffer);
		
		//echo($buffer);
		$lines = explode(" ", $buffer);

		//add to array
		//$lines[]=$buffer;
	
		foreach($lines as $word){
			if (strlen($word)==$len && preg_match($q, $word)){
				/*if ($hint==="")
        { $hint=$word; }
        else
        { $hint .= ", $word"; }*/
		$array[]=$word;
      }
    }
  }
    }
    fclose($handle);
}
// Output "no suggestion" if no hint were found
// or output the correct values
//echo $hint==="" ? "no suggestion" : "<b>"+$hint+"</b>";



?> </head>

<body>

<table class="table">
<tr>
<?php
	try{
	if (empty($array)){echo 'NOT FOUND';}
	else{
    $i = 0;
    foreach ($array as $val){
        $i++;
        print '<td>'.$val.'</td>';
        if ($i % 4 == 0){
            print '</tr><tr>' ;
        }
		}

    }
	}
	catch (Exception $e)
	{echo 'Out of my word list' ; }
?>
</tr>
</table>

</body>