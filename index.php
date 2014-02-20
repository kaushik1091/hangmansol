<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">


	<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Kaushik">
    <link rel="shortcut icon" href="../images/experiments.ico">

 <meta property="og:image" content="http://experiments.sourcenxt.in/images/experiments.ico" />
 <meta property="og:type" content="website" />
 <meta property="og:title" content="Experiments - Hangman" />
 <meta property="og:url" content="http://experiments.sourcenxt.in/hangman/" />
 <meta property="og:site_name" content="Experiments_at_SourceNXT" />

    <title>Hangman Solver</title>

    <!-- Bootstrap -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
	<link href="starter-template.css" rel="stylesheet">

		 <script type="text/javascript" src="http://www.google.com/jsapi"></script>
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.1/jquery.js"></script>
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"></script>
	
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	
		<style>text{text-align : center;} </style>
		<script>
		
		function lettersOnly(evt) {
       evt = (evt) ? evt : event;
       var charCode = (evt.charCode) ? evt.charCode : ((evt.keyCode) ? evt.keyCode :
          ((evt.which) ? evt.which : 0));
       if (charCode > 31 && (charCode < 65 || charCode > 90) &&
          (charCode < 97 || charCode > 122)) {
          return false;
       }
       return true;
     }
		
		 $(document).ready(function(){
        $counter = 0; // initialize 0 for limitting textboxes
		var count=0; //var str='';
        $('#dropdownadd').change(function(){
            $('#query').html(""); // when the dropdown change set the div to empty
            $loopcount = $(this).val(); // get the selected value
			$count=$loopcount;
            for (var i = 1; i <= $loopcount; i++)
            {
                $('#query').append('<input type="text" id="text'+i+'" class="text" maxlength="1" size="3" value="" onkeyup="concat(this.value)" onkeypress="return lettersOnly(event)" />  ');
            }
        });
    });
		
		function concat(letter)
			{
				//var x='text'+i+'.value';
				var str='';
				
				for(var i=1;i<=$count;i++){					
					var x = document.getElementById('text'+i).value;
						if(x=='') x='[a-zA-Z]';
						else {x='['+x+']';}
					str=str+x; 
				}
				str='/'+str+'/i'; //alert(str);
				
				showHint(str);
				
			}

		function showHint(str)
			{
				//alert(str);
				if (str.length==0)
					{
						document.getElementById("txtHint").innerHTML="";
						return;
					}
		var xmlhttp=new XMLHttpRequest();
		xmlhttp.onreadystatechange=function()
		{
			if (xmlhttp.readyState==4 && xmlhttp.status==200)
					{
						document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
					}
		}
			xmlhttp.open("GET","gethint.php?q="+str+"&len="+$count,true);
			xmlhttp.send();
		}
	</script>
	
  </head>
  <body>
	

  <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Hangman Solver</a>
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="../index.htm#contact">Contact</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>
    
	    <div class="container">

      <div class="starter-template">
        <h1>Guess the word</h1>
        	
		<div class="choices">
			<span>Select the size of word</span>
			<select id="dropdownadd">
			<option value="0">0</option>
			<option value="1">1</option>
			<option value="2">2</option>
			<option value="3">3</option>
			<option value="4">4</option>
			<option value="5">5</option>
			<option value="6">6</option>
			<option value="7">7</option>
			<option value="8">8</option>
			<option value="9">9</option>
			<option value="10">10</option>
			<option value="11">11</option>
			<option value="12">12</option>
			<option value="13">13</option>
			<option value="14">14</option>
			<option value="15">15</option>
		    </select>
		</div>
		
		<br/>
		<div id="query">
		</div>
		<br/>
		<p><span id="txtHint"></span></p>
      </div>
	  <br/>
	  </div><!-- /.container -->
	  
	  <div class='well' id="about">
		<span><center><h2>Have you ever played <b>Hangman</b>?<h2/><h3>This is a small effort to try and guess the words.<br/>Like a Cheat-sheet.</h4></center></span>
	  </div>
	  

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../js/bootstrap.min.js"></script>
  </body>
</html>
