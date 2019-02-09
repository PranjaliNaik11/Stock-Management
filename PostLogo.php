<?php
session_start();
$uname=$_POST['unaam'];
$password=$_POST['pwd'];
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Trackery</title>

    
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

    <!-- Theme CSS -->
    <link href="css/PostLog.css" rel="stylesheet">

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
                        <a class="page-scroll" href="PostLogo.php">HOME</a>
                    </li>
                     <li>
                        <a class="page-scroll" href="#port">UPDATES</a>
                    </li>
					<li>
                        <a class="page-scroll" href="#portfolio">ACTIVITIES</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#contact">CONTACT</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="Login.php">LOGOUT</a>
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
                <div class="intro-heading">Welcome Back!</div>
                <div class="intro-lead-in"></div>
                
            </div>
        </div>
    </header>
	
	 <section id="port" class="bg-light-orange">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    
                    
                </div>
            <div class="clearfix"></div>
                    <div class="col-lg-12 text-center">
                                <div id="success"></div>
                                <?php
                            //session_start();
                                 if($_SESSION['logged']==true)
                                { 
                                    $emailnaam=$_SESSION["username"];
                                    $_SESSION['logge']=true;
                                    $_SESSION['usernam']=$emailnaam;
                                    //echo "<h2 align='right'>"."<a color='black' href='Login.php'>Logout</a>"."</h2>";
                                  echo "<h2 align='right'>"."Hello, $emailnaam"."</h2>";

                                  echo "<h2 >"."UPDATES"."</h2>";
                                  //echo '<a href="logout.php"><span>Logout</span></a></li>';
                                }
                            $dbhost = 'localhost';
                            $dbuser = 'root';
                            $conn = mysql_connect($dbhost, $dbuser);
                            mysql_select_db('hms');

                            $waqt=new DateTime();
                            $waqt->format('Y-m-d H:i:s');
                            $waqt->getTimestamp(); 
                            $samay = $waqt->format( 'c' );
                            $newarr=array();
                            echo $uname;
                            if(isset($_POST['update']))

                            {
                                //echo $emailnaam;
                                //echo "Update";
                                $naam = $_POST['Name'];
                                
                                //echo $naam;
                                $amt = $_POST['Qty'];
                                //echo $amt;
                                $emailsend=mysql_query("SELECT Email from register where Username='$emailnaam'") or die(mysql_error());
                                //mysql_query($emailsend, $conn);
                                //echo $emailsend;
                                while($row=mysql_fetch_array($emailsend))
                                {
                                    $emailadd=$row['Email'];
                                    //echo $emailadd;
                                }
                                $UpdateQuery = "UPDATE tbl SET qty='$amt',timestamp='$samay' WHERE name='$naam'";
                                mysql_query($UpdateQuery, $conn);
                                if(!$UpdateQuery)
                                {
                                    die("Error" .mysql_error());
                                }
                                array_push($newarr, $naam);
                                //print_r($newarr);
                                if($amt<=0)
                                {
                                    if(in_array($naam, $newarr))
                                    {
                                        //echo "In mail func";
                                        require_once 'PHPMailerAutoload.php';

                                        $mail = new PHPMailer;

                                        $mail->isSMTP();                            // Set mailer to use SMTP
                                        $mail->Host = 'smtp.gmail.com';             // Specify main and backup SMTP servers
                                        $mail->SMTPAuth = true;                     // Enable SMTP authentication
                                        $mail->Username = 'xyz@abc.com';          // SMTP username
                                        $mail->Password = 'abcde'; // SMTP password
                                        $mail->SMTPSecure = 'tls';                  // Enable TLS encryption, `ssl` also accepted
                                        $mail->Port = 587;                          // TCP port to connect to

                                        $mail->setFrom('xyz@abc.com', 'Home Management System');
                                        //$mail->addReplyTo('info@codexworld.com', 'CodexWorld');
                                        $mail->addAddress($emailadd);   // Add a recipient
                                        //$mail->addCC('cc@example.com');
                                        //$mail->addBCC('bcc@example.com');

                                        $mail->isHTML(true);  // Set email format to HTML

                                        $bodyContent = '<h2>The value of following items have gone below zero:</h2>';
                                        $bodyContent .= '<p>'.$naam.'</p>';

                                        $mail->Subject = 'Email from Home Management System';
                                        $mail->Body    = $bodyContent;

                                        if(!$mail->send()) {            
                                            //echo 'Message could not be sent.';
                                            //echo 'Mailer Error: ' . $mail->ErrorInfo;
                                        } else {
                                            //echo 'Message has been sent';
                                        }

                                    }
                                }

                            }
                             if(isset($_POST['Edit']))
                            {
                                $naam = $_POST['IName'];
                                
                                //echo $naam;
                                $qty = $_POST['amount'];
                                $UpdateQuery = "UPDATE tbl SET qty='$qty',timestamp='$samay' WHERE name='$naam'";
                                mysql_query($UpdateQuery, $conn);
                                $query=mysql_query("SELECT qty from tbl where name='$naam'") or die(mysql_error());
                                 $emailsend=mysql_query("SELECT Email from register where Username='$emailnaam'") or die(mysql_error());
                                //mysql_query($emailsend, $conn);
                                //echo $emailsend;
                                while($row=mysql_fetch_array($emailsend))
                                {
                                    $emailadd=$row['Email'];
                                    //echo $emailadd;
                                }
                                while($row=mysql_fetch_array($query))
                                {
                                    if($row['qty']<=0)
                                    {
                                        //echo "Zero";
                                        array_push($newarr, $naam);
                                //print_r($newarr);
                                        if(in_array($naam, $newarr))
                                        {
                                            //echo "In mail func";
                                            require_once 'PHPMailerAutoload.php';

                                            $mail = new PHPMailer;

                                            $mail->isSMTP();                            // Set mailer to use SMTP
                                            $mail->Host = 'smtp.gmail.com';             // Specify main and backup SMTP servers
                                            $mail->SMTPAuth = true;                     // Enable SMTP authentication
                                            $mail->Username = 'xyz@abc.com';          // SMTP username
                                            $mail->Password = 'abcde'; // SMTP password
                                            $mail->SMTPSecure = 'tls';                  // Enable TLS encryption, `ssl` also accepted
                                            $mail->Port = 587;                          // TCP port to connect to

                                            $mail->setFrom('xyz@abc.com', 'Home Management System');
                                            //$mail->addReplyTo('info@codexworld.com', 'CodexWorld');
                                            $mail->addAddress($emailadd);   // Add a recipient
                                            //$mail->addCC('cc@example.com');
                                            //$mail->addBCC('bcc@example.com');

                                            $mail->isHTML(true);  // Set email format to HTML

                                            $bodyContent = '<h2>The value of following items have gone below zero:</h2>';
                                            $bodyContent .= '<p>'.$naam.'</p>';

                                            $mail->Subject = 'Email from Home Management System';
                                            $mail->Body    = $bodyContent;

                                            if(!$mail->send()) {            
                                                //echo 'Message could not be sent.';
                                                //echo 'Mailer Error: ' . $mail->ErrorInfo;
                                            } else {
                                                //echo 'Message has been sent';
                                            }

                                        }
                                    }
                                }
                                if(!$UpdateQuery)
                                {
                                    die("Error" .mysql_error());
                                }
                                //echo $qty;
                                //header("Location: EditQuant.html");
                                //exit;
                            }
                            $text='acbde';
                            //echo $text;
                            $text = explode(' ',$text);
                            $text = array_flip($text);
                            if (isset($text[$word])) 
                            {

                            }
                                                    
                                                      //Time
                            $now=new DateTime();
                            $now->format('Y-m-d H:i:s');
                            $now->getTimestamp(); 
                            $for = $now->format( 'c' );

                            $data=mysql_query("select name,qty,qty_sub,timestamp from tbl where Cust_name='$emailnaam'") or die(mysql_error());
                            $sub='select qty_sub from table';
                            $time=mysql_query('select timestamp from tbl') or die(mysql_error());
                            $stack = array();
                            print"<table class='table table-striped'>";
                            print"<tr >";
                            print"<td col='10' text-align:'center'><b>Item Name</b></th>";
                            print"<td col='10' align='center'><b>Quantity Remaining</b></th>";
                            print"<td col='10' align='center'></th>";
                           
                            while($row=mysql_fetch_array($data))
                            {
                                //echo "first while<br>";
                                $update=date( "Y-m-d H:i:s", strtotime($row["timestamp"]) + 4 * 60);
                                //echo $row["timestamp"]."<br>";
                                //echo $update."<br>";
                                $n=date( "Y-m-d H:i:s", strtotime($for));
                                //echo $n;
                                if($n>=$update)
                                {
                                    //echo "first if<br>";
                                    //$retval = mysql_query($sql,$conn);
                                    //echo "sec while<br>";
                                    $first= $row["qty"];
                                    $second= $row["qty_sub"];
                                    $third=$first-$second;
                                    if($third<=0)
                                    {
                                        array_push($stack, $row["name"]);
                                        array_push($newarr, $stack);
                                        //print_r($stack);
                                    }
                                    echo "<form action='' method='post' align='center'>";
                                    print "<tr>";
                                    //echo"<td>"."<text name='Name' value='".$row['name']."'>".$row['name']."</text>"."</td>";
                                    echo"<td>"."<input type=hidden name='Name' value='".$row['name']."'>".$row['name']."</input>"."</td>";
                                    //echo"<td>"."<text name='Qty' value='$third'>".$third."</text>"."</td>";
                                    echo"<td>"."<input type=hidden name='Qty' value='".$third."'>".$third."</input>"."</td>";
                                    "<tr>";
                                    echo "<td>"."<input type=submit name='update' class='btn btn-l' value=Confirm onclick='return confirm(\"Are you sure you want to update the Quantity?\")'>"." </td>";
                                    echo "</form>";
                                    //echo "<form action='EditQuant.php' method='post'>";
                                    //print "<td>"."<input type=submit name=Edit value=Edit onclick='EditQuant.php' action='EditQuant.php'>"."<a href='EditQuant.html'>"." </td>";
                                    
                                    //echo "</form>";
                                    //printf ("%s",$row[0]-$sub[0]);
                                }
                            }
                            print"<table>";
                            echo "<br>";
                            echo "<form action='PostLogo.php' method='post'>";
                            echo "<h4>"."Item Name:"."</h4>";
                            echo"<input type='text' name='IName' class='form-control' placeholder='Item Name' id='item' required data-validation-required-message='Please enter the Grocery Item.' value=''>"."</input>";
                            echo "<br>";
                            echo "<h4>"."New Quantity:"."</h4>";
                            echo "<input type='text' name='amount' class='form-control' placeholder='New Quantity' id='newq' required data-validation-required-message='Please enter the Grocery Item.'>"."<br>";
                            echo "<input type='submit' name='Edit' value='Edit' class='btn btn-xl' onclick='PostLogo.php'>"."</input>";
                           echo "</form>";
                                               
                            
                            $data=mysql_query("SELECT * from expenses") or die(mysql_error());

                            $date=date('Y-m-d');
                            // echo "in while";
                            $emailsend=mysql_query("SELECT Email from register where Username='$emailnaam'") or die(mysql_error());
                                //mysql_query($emailsend, $conn);
                                //echo $emailsend;
                            while($row=mysql_fetch_array($emailsend))
                            {
                                $emailadd=$row['Email'];
                                 //echo $emailadd;
                            }
                            while ($row=mysql_fetch_array($data)) 
                            {
                             //   echo "in while";
                                $laundry_due_date=$row['Laun_due_date'];
                               // echo $laundry_due_date;
                                $news_due_date=$row['News_due_date'];
                                $laun_amt=$row['Num_of_clothes'];
                                $laun_amt=$laun_amt*3;
                                $milk_due_date=$row['Milk_due_date'];
                                $maid_due_date=$row['Maid_due_date'];
                                
                                if($laundry_due_date==$date)
                                {
                                    require_once 'PHPMailerAutoload.php';
                                    $mail = new PHPMailer;
                                    $mail->isSMTP();                            // Set mailer to use SMTP
                                    $mail->Host = 'smtp.gmail.com';             // Specify main and backup SMTP servers
                                    $mail->SMTPAuth = true;                     // Enable SMTP authentication
                                    $mail->Username = 'xyz@abc.com';          // SMTP username
                                    $mail->Password = 'abcde'; // SMTP password
                                    $mail->SMTPSecure = 'tls';                  // Enable TLS encryption, `ssl` also accepted
                                    $mail->Port = 587;                          // TCP port to connect to
                                    $mail->setFrom('xyz@abc.com', 'Home Management System');
                                    //$mail->addReplyTo('info@codexworld.com', 'CodexWorld');
                                    $mail->addAddress($emailadd);   // Add a recipient
                                    //$mail->addCC('cc@example.com');
                                    //$mail->addBCC('bcc@example.com');
                                    $mail->isHTML(true);  // Set email format to HTML
                                    $bodyContent = '<h2>Today is due date for laundry. Price to be paid is:</h2>';
                                    $bodyContent .= '<p>'.$laun_amt.'</p>';
                                    $mail->Subject = 'Email from Home Management System';
                                    $mail->Body    = $bodyContent;
                                    if(!$mail->send()) 
                                    {            
                                        //echo 'Message could not be sent.';
                                        //echo 'Mailer Error: ' . $mail->ErrorInfo;
                                    } else 
                                    {
                                        //echo 'Message has been sent';
                                    }

                                }    
                                //echo $news_due_date;
                                //echo $date;
                                if($news_due_date==$date)
                                {
                                    require_once 'PHPMailerAutoload.php';
                                    $mail = new PHPMailer;
                                    $mail->isSMTP();                            // Set mailer to use SMTP
                                    $mail->Host = 'smtp.gmail.com';             // Specify main and backup SMTP servers
                                    $mail->SMTPAuth = true;                     // Enable SMTP authentication
                                    $mail->Username = 'xyz@abc.com';          // SMTP username
                                    $mail->Password = 'abcde'; // SMTP password
                                    $mail->SMTPSecure = 'tls';                  // Enable TLS encryption, `ssl` also accepted
                                    $mail->Port = 587;                          // TCP port to connect to
                                    $mail->setFrom('xyz@abc.com', 'Home Management System');
                                    //$mail->addReplyTo('info@codexworld.com', 'CodexWorld');
                                    $mail->addAddress($emailadd);   // Add a recipient
                                    //$mail->addCC('cc@example.com');
                                    //$mail->addBCC('bcc@example.com');
                                    $mail->isHTML(true);  // Set email format to HTML
                                    $bodyContent = '<h2>Today is due date for newspaper. Price to be paid is:</h2>';
                                    $bodyContent .= '<p>'.$row['Newspaper_amt'].'</p>';
                                    $mail->Subject = 'Email from Home Management System';
                                    $mail->Body    = $bodyContent;
                                    if(!$mail->send()) 
                                    {            
                                        //echo 'Message could not be sent.';
                                        //echo 'Mailer Error: ' . $mail->ErrorInfo;
                                    } else 
                                    {
                                        //echo 'Message has been sent';
                                    }

                                }    
                                if($milk_due_date==$date)
                                {
                                    require_once 'PHPMailerAutoload.php';
                                    $mail = new PHPMailer;
                                    $mail->isSMTP();                            // Set mailer to use SMTP
                                    $mail->Host = 'smtp.gmail.com';             // Specify main and backup SMTP servers
                                    $mail->SMTPAuth = true;                     // Enable SMTP authentication
                                    $mail->Username = 'xyz@abc.com';          // SMTP username
                                    $mail->Password = 'abcde'; // SMTP password
                                    $mail->SMTPSecure = 'tls';                  // Enable TLS encryption, `ssl` also accepted
                                    $mail->Port = 587;                          // TCP port to connect to
                                    $mail->setFrom('xyz@abc.com', 'Home Management System');
                                    //$mail->addReplyTo('info@codexworld.com', 'CodexWorld');
                                    $mail->addAddress($emailadd);   // Add a recipient
                                    //$mail->addCC('cc@example.com');
                                    //$mail->addBCC('bcc@example.com');
                                    $mail->isHTML(true);  // Set email format to HTML
                                    $bodyContent = '<h2>Today is due date for Milk. Price to be paid is:</h2>';
                                    $bodyContent .= '<p>'.$row['Milk_amt'].'</p>';
                                    $mail->Subject = 'Email from Home Management System';
                                    $mail->Body    = $bodyContent;
                                    if(!$mail->send()) 
                                    {            
                                        //echo 'Message could not be sent.';
                                        //echo 'Mailer Error: ' . $mail->ErrorInfo;
                                    } else 
                                    {
                                        //echo 'Message has been sent';
                                    }

                                }    
                                if($maid_due_date==$date)
                                {
                                    require_once 'PHPMailerAutoload.php';
                                    $mail = new PHPMailer;
                                    $mail->isSMTP();                            // Set mailer to use SMTP
                                    $mail->Host = 'smtp.gmail.com';             // Specify main and backup SMTP servers
                                    $mail->SMTPAuth = true;                     // Enable SMTP authentication
                                    $mail->Username = 'xyz@abc.com';          // SMTP username
                                    $mail->Password = 'abcde'; // SMTP password
                                    $mail->SMTPSecure = 'tls';                  // Enable TLS encryption, `ssl` also accepted
                                    $mail->Port = 587;                          // TCP port to connect to
                                    $mail->setFrom('xyz@abc.com', 'Home Management System');
                                    //$mail->addReplyTo('info@codexworld.com', 'CodexWorld');
                                    $mail->addAddress($emailadd);   // Add a recipient
                                    //$mail->addCC('cc@example.com');
                                    //$mail->addBCC('bcc@example.com');
                                    $mail->isHTML(true);  // Set email format to HTML
                                    $bodyContent = '<h2>Today is due date for Maid. Price to be paid is:</h2>';
                                    $bodyContent .= '<p>'.$row['Maid_amt'].'</p>';
                                    $mail->Subject = 'Email from Home Management System';
                                    $mail->Body    = $bodyContent;
                                    if(!$mail->send()) 
                                    {            
                                        //echo 'Message could not be sent.';
                                        //echo 'Mailer Error: ' . $mail->ErrorInfo;
                                    } else 
                                    {
                                        //echo 'Message has been sent';
                                    }

                                }  
                            }  
                    ?>
                        
                    </div>
                    
            </div>
        </div>
    </section>


    <section id="portfolio" class="">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">

                    <h2 class="section-heading">Activities</h2>
                    <h3 class="section-subheading text-muted">What would you like to do?</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-sm-6 portfolio-item">
                    <a href="#portfolioModal1" class="portfolio-link" data-toggle="modal">
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content">
                                <i class="fa fa-plus fa-3x"></i>
                            </div>
                        </div>
                        <img src="img/PostLog/AddItem.jpg" class="img-responsive" alt="">
                    </a>
                    <div class="portfolio-caption">
                        <a href="AddItem.php"><h4>Add Grocery Item</h4></a>
                        <p class="text-muted">Just shopped? Add all your grocery items!</p>
                    </div>
                </div>
				
                <div class="col-md-4 col-sm-6 portfolio-item">
                    <a href="#portfolioModal2" class="portfolio-link" data-toggle="modal">
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content">
                            </div>
                        </div>
                        <img src="img/PostLog/Pan1.jpg" class="img-responsive" alt="">
                    </a>
                    <div class="portfolio-caption">
                        <a href="P1.php"><h4>View Pantry</h4></a>
                        <p class="text-muted">See the groceries you have at home!</p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 portfolio-item">
                    <a href="#portfolioModal3" class="portfolio-link" data-toggle="modal">
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content">
                                
                            </div>
                        </div>
                        <img src="img/PostLog/Shop.jpg" class="img-responsive" alt="">
                    </a>
                    <div class="portfolio-caption">
                        <a href="Shop.php"><h4>Shop For Groceries</h4></a>
                        <p class="text-muted">Shop and get the best deals here!</p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 portfolio-item">
                    <a href="#portfolioModal4" class="portfolio-link" data-toggle="modal">
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content">
                                <i class="fa fa-plus fa-3x"></i>
                            </div>
                        </div>
                        <img src="img/PostLog/AddExp1.jpg" class="img-responsive" alt="">
                    </a>
                    <div class="portfolio-caption">
                        <a href="AddExp.php"><h4>Add Expenditure</h4></a>
                        <p class="text-muted">Add any home expenditure here!</p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 portfolio-item">
                    <a href="#portfolioModal5" class="portfolio-link" data-toggle="modal">
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content">
                                
                            </div>
                        </div>
                        <img src="img/PostLog/Analysis1.jpg" class="img-responsive" alt="">
                    </a>
                    <div class="portfolio-caption">
                        <a href="Analysis.html"><h4>View Analysis</h4></a>
                        <p class="text-muted">Check out last month's analysis!</p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 portfolio-item">
                    <a href="#portfolioModal6" class="portfolio-link" data-toggle="modal">
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content">
                               
                            </div>
                        </div>
                        <img src="img/PostLog/	Recipes.jpg" class="img-responsive" alt="">
                    </a>
                    <div class="portfolio-caption">
                        <a href="Recipes.php"><h4>View Recipes</h4></a>
                        <p class="text-muted">Check out new & exciting recipes here!</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

	
    
   
     <!-- Contact Section -->
    <section id="contact" class="bg-dark-orange">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Contact Us</h2>
                    <h3 class="section-subheading text-muted">We are at your service.</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <form name="sentMessage" id="contactForm" novalidate>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
								<h4>Please enter your name:</h4>
                                    <input type="text" class="form-control" placeholder="Your Name *" id="name" required data-validation-required-message="Please enter your name.">
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
								<h4>Please enter your email:</h4>
                                    <input type="email" class="form-control" placeholder="Your Email *" id="email" required data-validation-required-message="Please enter your email address.">
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
								<h4>Please enter your phone number:</h4>
                                    <input type="tel" class="form-control" placeholder="Your Phone *" id="phone" required data-validation-required-message="Please enter your phone number.">
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
								<h4>Please enter your message:</h4>
                                    <textarea class="form-control" placeholder="Your Message *" id="message" required data-validation-required-message="Please enter a message."></textarea>
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="col-lg-12 text-center">
                                <div id="success"></div>
                                <button type="submit" class="btn btn-xl">Send Message</button>
                            </div>
                        </div>
                    </form>
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
