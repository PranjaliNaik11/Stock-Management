<?php
session_start();
$dbhost = 'localhost';
$dbuser = 'root';
$conn = mysql_connect($dbhost, $dbuser);
mysql_select_db('hms');
$name=$_POST['Name'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$uname=$_POST['uname'];
$password=$_POST['password'];
if($name!=''&& $email!='' && $phone!='' && $uname!='' && $password!=''){
$data=mysql_query("INSERT into Register(Name,Email,Phone,Username,Password) values ('$name','$email','$phone','$uname','$password')") or die(mysql_error());
}
if(isset($_POST['login']))
{

    //echo "Update";
    $naam = $_POST['unaam'];
    //echo $naam;
    $password = $_POST['pwd'];
    //echo $amt;
    $data=mysql_query("SELECT * from Register") or die(mysql_error());
    while($row=mysql_fetch_array($data))
    {
        $unaam=$row['Username'];
        $pwd=$row['Password'];
        if($naam==$unaam && $password==$pwd)
        {
            $_SESSION['logged']=true;
            $_SESSION['username']=$unaam;
            header("location:Postlogo.php");
            exit();
        }
        else 
        if($naam!=$unaam && $password!=$pwd)
        {
            //header("location:Login.php");
        }
    }
}    
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login</title>

    
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

    <!-- Theme CSS -->
    <link href="css/Login.css" rel="stylesheet">

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
                        <a class="page-scroll" href="Home.php">HOME</a>
                    </li>
					<li>
                        <a class="page-scroll" href="Login.php">LOGIN</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="Register.php">REGISTER</a>
                    </li>
					
					
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

    <!-- Header -->
    <header>
        <div class="container">
            <div class="intro-text">
                <div class="intro-heading">Login</div>
				<a href="Register.php"><h3 align='right' style='color:white'><i>Not a member? Register!</i></h3></a>
                <div class="intro-lead-in"></div>
                
            </div>
        </div>
    </header>

    <!-- Contact Section -->
    <section id="contact" class="bg-dark-orange">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 align='left' class="section-heading">Login</h2>
                    <h3 class="section-subheading text-muted"></h3>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    
                        <div class="row">
                            <div class="col-md-6">
							<form action="" method="post">
                                <div class="form-group">
                                    <h4>Please enter your username:</h4>
									<?php
                                    echo "<form method='post'>";
                                    echo "<input type='text' name='unaam' class='form-control' placeholder='Username' id='uname' required data-validation-required-message='Please enter your username.'>";
                                    "</form>";
                                    ?>
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
									<h4>Please enter your password:</h4>
                                    <?php
                                    echo "<form method='post'>";
                                    echo "<input type='password' name='pwd' class='form-control' placeholder='Password' id='pwd' required data-validation-required-message='Please enter your password.'>";
                                    "</form>";
                                    ?>
                                    <p class="help-block text-danger"></p>
                                </div>
								<br> <br>
                            </div>
							
                            <div class="clearfix"></div>
                            <div class="col-lg-12 text-center">
                                <div id="success"></div>
                                <p align='left'>
                                <?php
                                echo "<button type='submit' name='login' class='btn btn-xl'>LOGIN</button>";
                                
                                ?>
                                </p>
                                </div>
                            </form>

                        </div>
                   
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
