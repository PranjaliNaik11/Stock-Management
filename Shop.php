<?php
session_start();
$uname=$_POST['uname'];
?>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Shop</title>

    
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

    <!-- Theme CSS -->
    <link href="css/Shop.css" rel="stylesheet">

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
                        <a class="page-scroll" href="P1.php">PANTRY</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="AddItem.php">ADD ITEM</a>
                    </li>
					
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

     <header>
        <div class="container" >
            <div class="intro-text">
                <div class="intro-heading">Shop</div>
                
               
            </div>
        </div>
    </header>


    <!-- Portfolio Grid Section -->
 	
	<?php
                $username=$_SESSION["usernam"];
                $_SESSION['logged']=true;
                $_SESSION['usernam']=$username;
                echo "<h2 align='right'>"."Hello, $username"."</h2>";
           ?>
<section id="#" class="">
        <div class="container">
		<h1 align='center'>Store</h1><br><br>
           <div class="row">
           
           <form action="Shop.php" method="post">       
                <div class="form-group">
                    <h4>Please enter a Product name:</h4>
                    <?php
                    echo "<input type='text' class='form-control' placeholder='Product Name' id='kword' name='keyword'>"
                    ?>
                    <p class="help-block text-danger"></p>
                </div>
                <div class="clearfix"></div>
                <div class="col-lg-12 text-center">
                <div id="success"></div>
                <?php
                echo "<button type='submit'name='Find' class='btn btn-xl'>Find Product Deals</a></button>"
                ?>
                </div>
            </form>  
            <br></br>
            <br>
            <br><br><br><br>
            <h1 align='center'>Deals</h1><br><br>
            <table>
            <?php
                if(isset($_POST['Find']))
                { 
                    
                    $dbhost = 'localhost';
                    $dbuser = 'root';
                    $conn = mysql_connect($dbhost, $dbuser);
                    mysql_select_db('hms');
                    $keyword=$_POST['keyword'];
                    
                    $queried = mysql_real_escape_string($_POST['keyword']); // always escape
                    //echo $queried;
                    ucfirst($queried);
                    $keys = explode(" ",$queried);

                    $sql = "SELECT * FROM thurs WHERE name LIKE '%$queried%' ";

                    foreach($keys as $k)
                    {
                        $sql .= " OR name LIKE '%$k%' ";
                    }

                    $result = mysql_query($sql);



                    //$result=mysql_query("SELECT * FROM thurs");
                    $count = 0;
                    while($res=mysql_fetch_array($result))
                    {
                        $qy=mysql_real_escape_string($queried);
                        //echo $qy;
                        $text = explode(" ",$qy);
                        $text = array_flip($text);                        
                        if ($qy==$queried)
                        {                       
                            
                            if($count==3) //three images per row
                            {
                                print "</tr>";
                                $count = 0;
                            }
                            if($count==0)
                                print "<tr>";
                            print "<td>";
                        ?>
                            
                            <img src="<?php echo $res['img'] ?>" width="80" height="80"/>
                            <?php echo $res['name'];?></p>
                            <?php echo $res['price'];?></p>
                            <img src="<?php echo $res['offer'] ?>" width="80" height="20"/>
                            
                            <?php
                            echo '<a href='.$res['link'].'>SEE IT</a>';
                            ;?>
                            <?php
                            $count++;
                            print "</td>";
                        }
                          
                    }
                    if($count>0)
                       print "</tr>";  
                    
                }
            ?>

            </table>
                    
                    
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
