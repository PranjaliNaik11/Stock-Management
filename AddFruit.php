<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Add Grocery Item</title>

    
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

    <!-- Theme CSS -->
    <link href="css/AddItem.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js" integrity="sha384-0s5Pv64cNZJieYFkXYOTId2HMA2Lfb6q2nAcx2n0RTLUnCAoTTsS0nKEO27XyKcY" crossorigin="anonymous"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js" integrity="sha384-ZoaMbDF+4LeFxg6WdScQ9nnR1QC2MIRxA1O9KWEXQwns1G8UNyIEZIQidzb0T1fo" crossorigin="anonymous"></script>
    <![endif]-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function (){
            $("#fr1").change(function() {
                // foo is the id of the other select box 
                if ($(this).val() == "Watermelon") {
                    $("#watermelon").show();
                }else{
                    $("#watermelon").hide();
                }
                if ($(this).val() == "Apple" || $(this).val() == "Orange" || $(this).val() == "Banana" || $(this).val() == "Strawberry") {
                    $("#apple").show();
                }else{
                    $("#apple").hide();
                }
                if ($(this).val() == "Grapes") {
                    $("#grapes").show();
                }else{
                    $("#grapes").hide();
                }
               
            });
        });
    </script>

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
                        <a class="page-scroll" href="AddItem.php">ADD GROCERY ITEM</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="AddExp.php">ADD EXPENDITURE</a>
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
                <div class="intro-heading">Add Grocery Item</div>
                <div class="intro-lead-in"></div>
                <?php
                        $dbhost = 'localhost';
                        $dbuser = 'root';
                        $conn = mysql_connect($dbhost, $dbuser);
                        mysql_select_db('hms');
                        
                        if($_SESSION['logge']==true)
                            { 
                                $unam=$_SESSION["usernam"];
                                //echo "<h2 align='right'>"."Hello, $uname"."</h2>";
                            }
                
                        if(isset($_POST['save']))
                        {
                            
                            $itemname = $_POST['Name'];
                            //echo $itemname;
                            $price = $_POST['price'];
                            $purchase = $_POST['purchase'];
                            $expiry = $_POST['expiry'];
                            $quantity = $_POST['qty'];
                            $quantity_sub = $_POST['qty_sub'];
                            $data1=mysql_query("SELECT * from tbl where name='$itemname'") or die(mysql_error());
                            if(mysql_num_rows($data1)>0)
                                {
                                    echo "Item already exists";
                                }
                                else
                                {
                                    $data=mysql_query("INSERT into tbl(name,price,purchase_date,expiry_date,qty,qty_sub,Cust_name) values ('$itemname','$price','$purchase','$expiry','$quantity','$quantity_sub','$unam')") or die(mysql_error());
                                }
                        }
                ?>
            </div>
        </div>
    </header>

    
    <!-- Contact Section -->
    <section id="contact" class="bg-dark-orange">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                <?php
                 if($_SESSION['logge']==true)
                            { 
                                $uname=$_SESSION["usernam"];
                                echo "<h2 align='right'>"."Hello, $uname"."</h2>";
                            }
                ?>
                    <h2 class="section-heading">Add Grocery Item</h2>
                    <h3 class="section-subheading text-muted"></h3>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    
                        <div class="row"><span class="fa-stack fa-4x">
								<i><a href="AddItem.php" class="fa fa-circle fa-stack-2x text-primary"></a></i>
								<i><a href="AddItem.php" class="glyphicon glyphicon-globe fa-stack-1x fa-inverse"></a></i>
							</span>
						<span class="fa-stack fa-4x">
						
								<i><a href="AddGrain.php" class="fa fa-circle fa-stack-2x text-primary"></a></i>
								<i><a href="AddGrain.php" class="glyphicon glyphicon-grain fa-stack-1x fa-inverse"></a></i>
							</span>
							<span class="fa-stack fa-4x">
								<i><a href="AddVeg.php" class="fa fa-circle fa-stack-2x text-primary"></a></i>
								<i><a href="AddVeg.php" class="fa fa-lemon-o fa-stack-1x fa-inverse"></a></i>
							</span>
							<span class="fa-stack fa-4x">
								<i><a href="AddFruit.php" class="fa fa-circle fa-stack-2x text-primary"></a></i>
								<i><a href="AddFruit.php" class="fa fa-apple fa-stack-1x fa-inverse"></a></i>
							</span>
							
							<span class="fa-stack fa-4x">
								<i><a href="AddBev.php" class="fa fa-circle fa-stack-2x text-primary"></a></i>
								<i><a href="AddBev.php" class=" fa fa-glass fa-stack-1x fa-inverse"></a></i>
							</span>
							<span class="fa-stack fa-4x">
								<i><a href="AddClean.php" class="fa fa-circle fa-stack-2x text-primary"></a></i>
								<i><a href="AddClean.php" class="fa fa-paint-brush fa-stack-1x fa-inverse"></a></i>
							</span>
							 <form action="AddFruit.php" method="post">
                                <div class="form-group">
                                    <h4>Please enter the fruit grocery item:</h4>
									<div class="form-group">
                                    <label for="fr1"></label>
                                    <?php
										echo "<select class='form-control' id='fr1' name='Name'>
                                            <option >Select one</option>
											<option value='Apple'>Apple</option>
                                            <option value='Banana'>Banana</option>
                                            <option value='Grapes'>Grapes</option>
                                            <option value='Watermelon'>Watermelon</option>
                                            <option value='Orange'>Orange</option>
                                            <option value='Strawberry'>Strawberry</option>
										</select>"
                                        ?>
									</div>
                       				<div class="form-group">
                                        <h4>Please enter the price:</h4>
                                        <?php
                                        echo "<input type='text' name='price' class='form-control' placeholder='Grocery Price' id='gprice' required data-validation-required-message='Please enter the Grocery Item.'>"
                                        ?>
                                        <p class="help-block text-danger"></p>
                                    </div>
                                    <div class="form-group">
                                        <h4>Please enter the date of purchase:</h4>
                                        <?php
                                        echo "<input type='date' name='purchase' class='form-control' placeholder='Purchase Date *' id='pdate' required data-validation-required-message='Please enter the date of purchase.'>"
                                        ?>
                                        <p class="help-block text-danger"></p>
                                    </div>
                                    <div class="form-group">
                                        <h4>Please enter the date of expiry:</h4>
                                        <?php
                                        echo "<input type='date' name='expiry' class='form-control' placeholder='Expiry Date *' id='edate' required data-validation-required-message='Please enter the date of purchase.'>"
                                        ?>
                                        <p class="help-block text-danger"></p>
                                    </div>
                                    <div id="apple" style="display:none;">
                                        <div class="form-group">
                                            <h4>Please enter the quantity in dozens:</h4>
                                            <?php
                                            echo "<input type='number' name='qty' class='form-control' placeholder='Number of Items' id='number' required data-validation-required-message='Please enter the number of items.'>"
                                            ?>
                                            <p class="help-block text-danger"></p>
                                        </div>
                                        <div class="form-group">
                                            <h4>Please enter the number of items to subtract daily:</h4>
                                            <?php
                                            echo "<input type='number' name='qty_sub' class='form-control' placeholder='Number of Items' id='number' required data-validation-required-message='Please enter the number of items.'>"
                                            ?>
                                            <p class="help-block text-danger"></p>
                                        </div>
                                    </div>
                                    <div id="watermelon" style="display:none;">
                                        <div class="form-group">
                                            <h4>Please enter the number of watermelons:</h4>
                                            <?php
                                            echo "<input type='number' name='qty' class='form-control' placeholder='Number of Items' id='number' required data-validation-required-message='Please enter the number of items.'>"
                                            ?>
                                            <p class="help-block text-danger"></p>
                                        </div>
                                        <div class="form-group">
                                            <h4>Please enter the number of watermelons to subtract daily:</h4>
                                            <?php
                                            echo "<input type='number' name='qty_sub' class='form-control' placeholder='Number of Items' id='number' required data-validation-required-message='Please enter the number of items.'>"
                                            ?>
                                            <p class="help-block text-danger"></p>
                                        </div>
                                    </div>
                                    <div id="grapes" style="display:none;">
                                        <div class="form-group">
                                            <h4>Please enter the number of bundles of grapes:</h4>
                                            <?php
                                            echo "<input type='number' name='qty' class='form-control' placeholder='Number of Items' id='number' required data-validation-required-message='Please enter the number of items.'>"
                                            ?>
                                            <p class="help-block text-danger"></p>
                                        </div>
                                        <div class="form-group">
                                            <h4>Please enter the number of bundles of grpaes to subtract daily:</h4>
                                            <?php
                                            echo "<input type='number' name='qty_sub' class='form-control' placeholder='Number of Items' id='number' required data-validation-required-message='Please enter the number of items.'>"
                                            ?>
                                            <p class="help-block text-danger"></p>
                                        </div>
                                    </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="col-lg-12 text-center">
                                <div id="success"></div>
                                <?php
                                echo "<button type='submit' name='save' class='btn btn-xl'>Save</button>";
                                ?>
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
