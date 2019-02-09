<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Grocery Analysis</title>
    <style type="text/css">
            #chart-container {
                width: 640px;
                height: auto;
                align-content: center;
            }
        </style>
    
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

    <!-- Theme CSS -->
    <link href="css/GrocAnalysis.css" rel="stylesheet">

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
                        <a class="page-scroll" href="Analysis.html">Analysis</a>
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
                <div class="intro-heading">Analysis</div>
                <div class="intro-lead-in">Study your Grocery analysis here!</div>
                
            </div>
        </div>
    </header>

    

    <!-- Portfolio Grid Section -->
    <section id="portfolio" class="" align="center">
        <div class="container" align="center">
            <div class="row" align="center">
                <div class="col-lg-12 text-center">
                   <h3 class="section-heading">Total Expenditure Graph</h3>
                    <h4 class="section-subheading text-muted">Pink : Total Expenditure</h4>
                     <h4 class="section-subheading text-muted">Purple : Grocery Expenditure</h4>
                    <div id="chart-container" align="center">
                        <link rel="stylesheet" href="http://www.amcharts.com/lib/style.css" type="text/css">
  <script src="http://www.amcharts.com/lib/3/amcharts.js" type="text/javascript"></script>
  <script src="http://www.amcharts.com/lib/3/serial.js" type="text/javascript"></script>

  <!-- cutom functions -->
  <script>
AmCharts.loadJSON = function(url) {
  // create the request
  if (window.XMLHttpRequest) {
    // IE7+, Firefox, Chrome, Opera, Safari
    var request = new XMLHttpRequest();
  } else {
    // code for IE6, IE5
    var request = new ActiveXObject('Microsoft.XMLHTTP');
  }

  // load it
  // the last "false" parameter ensures that our code will wait before the
  // data is loaded
  request.open('GET', url, false);
  request.send();

  // parse adn return the output
  return eval(request.responseText);
};
  </script>

  <!-- chart container -->
  <div id="chartdiv" style="width: 800px; height: 600px;"></div>

  <!-- the chart code -->
  <script>
var chart;

// create chart
AmCharts.ready(function() {

  // load the data
  var chartData = AmCharts.loadJSON('da.php');

  // SERIAL CHART
  chart = new AmCharts.AmSerialChart();
  chart.pathToImages = "http://www.amcharts.com/lib/images/";
  chart.dataProvider = chartData;
  chart.categoryField = "category";
  chart.dataDateFormat = "YYYY-MM-DD";

  // GRAPHS

  var graph1 = new AmCharts.AmGraph();
graph1.lineColor ="#ff80aa"
  graph1.valueField = "value1";
  graph1.bullet = "round";
  graph1.bulletBorderColor = "#FFFFF2";
  graph1.bulletBorderThickness = 3;
  graph1.lineThickness = 2;
  graph1.lineAlpha = 0.5;
  //graph1.lineColorField =#00FFFF;
  chart.addGraph(graph1);

  var graph2 = new AmCharts.AmGraph();
graph2.lineColor ="#8000ff"
  graph2.valueField = "value2";
  graph2.bullet = "round";
  graph2.bulletBorderColor = "#00FFFF";
  graph2.bulletBorderThickness = 3;
  graph2.lineThickness = 2;
  graph2.lineAlpha = 0.5;
  chart.addGraph(graph2);

  // CATEGORY AXIS
  chart.categoryAxis.parseDates = true;

  // WRITE
  chart.write("chartdiv");
});

  </script>
                    </div>

        <!-- javascript -->
        
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

</body>

</html>
