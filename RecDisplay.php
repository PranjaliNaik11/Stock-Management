<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Recipes</title>

    
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

    <!-- Theme CSS -->
    <link href="css/Recipes.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js" integrity="sha384-0s5Pv64cNZJieYFkXYOTId2HMA2Lfb6q2nAcx2n0RTLUnCAoTTsS0nKEO27XyKcY" crossorigin="anonymous"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js" integrity="sha384-ZoaMbDF+4LeFxg6WdScQ9nnR1QC2MIRxA1O9KWEXQwns1G8UNyIEZIQidzb0T1fo" crossorigin="anonymous"></script>
    <![endif]-->

</head>

<body id="page-top" class="index">

   
    <nav id="mainNav" class="navbar navbar-default navbar-custom navbar-fixed-top">
        <div class="container">
            
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
                </button>
                
            </div>

           
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li>
                        <a class="page-scroll" href="PostLogo.php">Home</a>
                    </li>
					<li>
                        <a class="page-scroll" href="#portfolio">Recipes</a>
                    </li>
                    
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>
     <!-- Header -->
    <header>
        <div class="container" >
            <div class="intro-text">
                
                
            </div>
        </div>
    </header>
<section id="portfolio" class="bg-light-orange">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h4 class="section-heading"></h4>
                    <h3 class="section-subheading text-muted"></h3>

<?php
$dbhost = 'localhost';
$dbuser = 'root';
$conn = mysql_connect($dbhost, $dbuser);
mysql_select_db('hms');
$keyword=$_POST['keyword'];
$key=ucfirst($keyword);
$ing1=$_POST['ing1'];
$ing2=$_POST['ing2'];
$ing3=$_POST['ing3'];
$data=mysql_query("SELECT Recipe_Name,Directions,Ingredients,Image from recipes") or die(mysql_error());
print"<table class='table table-striped' style='background-color:white'>";
print"<tr >";
//print"<td col='10' align='center'><b>Image</b></th>";
print"<td col='10' text-align:'center'><b>Recipe Name</b></th>";
print"<td col='10' align='center'><b>Ingredients</b></th>";
print"<td col='10' align='center'><b>Procedure</b></th>";
while($row=mysql_fetch_array($data))
{
	print "<tr>";
	$text = explode(' ',$row['Recipe_Name']);
	$text = array_flip($text);
	$text1 = explode(' ',$row['Ingredients']);
	$text1 = array_flip($text1);
	if (isset($text[$keyword])|| isset($text1[$ing1]) || isset($text1[$key])) 
	{
		//echo "<td>".$row['Image']."</td>";
		echo "<td>".$row['Recipe_Name']."</td>";
		echo "<td>".$row['Ingredients']."</td>";
		echo "<td>".$row['Directions']."</td>";
	}
	
	"</tr>";

}
//print"<table>";
//$input='you are mad';
//if(preg_match('/\byou\b/', $input)) {
  //  echo $input.' has the word you';
//}

?>
</div>
            
            </div>
        </div>
    </section>
 <!-- jQuery -->
    <script src="vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js" integrity="sha384-mE6eXfrb8jxl0rzJDBRanYqgBxtJ6Unn4/1F7q4xRRyIw7Vdg9jP4ycT7x1iVsgb" crossorigin="anonymous"></script>

    <!-- Contact Form JavaScript -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>

    <!-- Theme JavaScript -->
    <script src="js/agency.min.js"></script>

</html>