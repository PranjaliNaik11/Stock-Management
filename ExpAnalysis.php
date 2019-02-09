<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Expenditure Analysis</title>

    
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

    <!-- Theme CSS -->
    <link href="css/ExpAnalysis.css" rel="stylesheet">

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
                <div class="intro-lead-in">Study your Expenditure analysis here!</div>
                
            </div>
        </div>
    </header>

    

    <!-- Portfolio Grid Section -->
    <section id="portfolio" class="">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h4 class="section-heading">Expenditure Graph</h4>
                    <h3 class="section-subheading text-muted"></h3>
                    
                
                    <?php
/**
 * Database connection details
 * This can be stored in a seperate file called config.php and included
 * via include('config.php');
 *
 * Fake example details!
 */

  
$dbhost = 'localhost';
$dbuser = 'root';
$conn = mysql_connect($dbhost, $dbuser);
mysql_select_db('hms');
 /* Used to produce a Google Chart for the weekly average prices of widgets
 */
function generateGoogleChart()
{
    //Get the data from the database
    $sqlQuery = "SELECT week,price FROM try";
    $sqlResult = mysql_query($sqlQuery);
    while ($row = mysql_fetch_assoc($sqlResult)) {
        $priceResults[] = $row;
    }
    //Set-up the values for the Axis on the chart
    $maxWeeks = count($priceResults);
    //Set chd parameter to no value
    $chd = '';
    //Limit in my example represents weeks of the year
    $limit = 52;
    //Start to compile the prices data
    for ($row = 0; $row < $limit; $row++) {
        //Check for a value if one exists, add to $chd
        if(isset($priceResults[$row]['price']))
        {
            $chd .= $priceResults[$row]['price'];
        }
        //Check to see if row exceeds $maxWeeks
        if ($row < $maxWeeks) {
            //It doesn't, so add a comma and add the price to array $scaleValues
            $chd .= ',';
            $scaleValues[] = $priceResults[$row]['price'];
        } else if ($row >= $maxWeeks && $row < ($limit - 1)) {
            //Row exceeds, so add null value with comma
            $chd .= '_,';
        } else {
            //Row exceeds and is last required value, so just add a null value
            $chd .= '_';
        }
    }
    //Use the $scaleValues array to define my Y Axis 'buffer'
    $YScaleMax = round(max($scaleValues)) + 5;
    $YScaleMin = round(min($scaleValues)) - 5;
    //Generate the number of weeks of the year for A Axis labels
    $graphSequence = generateSequence(1, 52, "|");
    //Set the Google Image Chart API parameters
    $cht = 'lc';//Set the chart type
    $chxl = '1:|' . $graphSequence . '2:|Price|3:|Jan|Feb|Mar|Apr|May|Jun|Jul|Aug|Sept|Oct|Nov|Dec||4:|Weeks+and+Months';//custom axis labels
    $chxp = '2,50|4,50';//Axis Label Positions
    $chxr = '0,' . $YScaleMin . ',' . $YScaleMax . '|1,1,52|3,1,12|5,' . $YScaleMin . ',' . $YScaleMax . '';//Axis Range
    $chxs = '0,252525,10,1,l,676767|1,252525,10,0,l,676767|2,03619d,13|4,03619d,13|5,252525,10,1,l,676767';//Axis Label Styles
    $chxtc = '0,5|1,5|5,5';//Axis Tick Mark Styles
    $chxt = 'y,x,y,x,x,r';//Visible Axes
    $chs = '918x300';//Chart Size in px
    $chco = '6600ff';//Series Colours
    $chds = '' . $YScaleMin . ',' . $YScaleMax . '';//Custom Scaling
    $chg = '-1,-1,1,5';//Grid lines
    $chls = '2';//line styles
    $chm = 'o,252525,0,-1,3';//Shape Markers
    //Build the URL
    $googleUrl = 'http://chart.apis.google.com/chart?';
    $rawUrl = $googleUrl . 'cht=' . $cht . '&chxl=' . $chxl . '&chxp=' . $chxp . '&chxr=' . $chxr . '&chxs=' . $chxs . '&chxtc=' . $chxtc . '&chxt=' . $chxt . '&chs=' . $chs . '&chco=' . $chco . '&chd=t:' . $chd . '&chds=' . $chds . '&chg=' . $chg . '&chls=' . $chls . '&chm=' . $chm;
    $output = $rawUrl;
    return $output;
}
/**
 * A nicer way to test arrays
 */
function displayArray($val)
{
    echo "<pre>";
    print_r($val);
    echo "</pre>";
    return;
}
/**
 * a simple numeric sequence generator. requires a min and max for the sequence, and can take an optional seperator
 */
function generateSequence($min, $max, $seperator = "")
{
    $output = '';
    for ($i = $min; $i <= $max; $i++)
    {
        $output .= $i . $seperator;
    }
    return $output;
}
$chart = generateGoogleChart();
$html = '<div id="chart">';
$html .= '<img src="' . $chart . '" alt="Widget weekly average price chart for 2011" />';
$html .= '</div>';
echo $html;
?>
                </div>
            </div>
            <div class="row">
                
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
