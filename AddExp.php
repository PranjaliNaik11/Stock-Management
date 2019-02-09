<?php
session_start();
?>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Add Grocery Expenditure</title>

    
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

    <!-- Theme CSS -->
    <link href="css/AddExp.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js" integrity="sha384-0s5Pv64cNZJieYFkXYOTId2HMA2Lfb6q2nAcx2n0RTLUnCAoTTsS0nKEO27XyKcY" crossorigin="anonymous"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js" integrity="sha384-ZoaMbDF+4LeFxg6WdScQ9nnR1QC2MIRxA1O9KWEXQwns1G8UNyIEZIQidzb0T1fo" crossorigin="anonymous"></script>
    <![endif]-->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function (){
            $("#sel1").change(function() {
                // foo is the id of the other select box 
                if ($(this).val() == "Laundry") {
                    $("#laundry").show();
                }else{
                    $("#laundry").hide();
                }
                if ($(this).val() == "Maid") {
                    $("#maid").show();
                }else{
                    $("#maid").hide();
                } 
                if ($(this).val() == "Milk") {
                    $("#milk").show();
                }else{
                    $("#milk").hide();
                } 
                if ($(this).val() == "Newspaper") {
                    $("#newsppr").show();
                }else{
                    $("#newsppr").hide();
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
                <div class="intro-heading">Add Expenditure</div>
                <div class="intro-lead-in"></div>

            </div>
        </div>
    </header>
                
    
    <!-- Contact Section -->
    <section id="contact" class="bg-dark-orange">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Add Expenditure</h2>
                    <h3 class="section-subheading text-muted"></h3>
                   <?php
                        $username=$_SESSION["usernam"];
                        $_SESSION['logged']=true;
                        $_SESSION['usernam']=$username;
                        echo "<h2 align='right'>"."Hello, $username"."</h2>";

                    ?>

                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="">
                            <form action="AddExp.php" method="post" nonvalidate>
                                <div class="form-group">
                                <label for="sel1">Select list:</label>
                                <?php
                                    echo "<select class='form-control' id='sel1' name='expoption'>
                                           <option >Select one</option>
                                           <option value='Maid'>Maid</option>
                                           <option value='Newspaper'>Newspaper</option>
                                           <option value='Laundry'>Laundry</option>
                                           <option value='Milk'>Milk</option>
                                         </select>"
                                ?>
                                </div>
                                <div id="laundry" style="display:none;">
                                    <div class="form-group">
                                        <h4>Please enter the date :</h4>
                                        <?php
                                        echo "<input type='date' name='date_laun' class='form-control' placeholder='Laundry Date *' id='ldate' data-validation-required-message='Please enter the date.'>"
                                        ?>
                                        <p class="help-block text-danger"></p>
                                    </div>
                                    <div class="form-group">
                                        <h4>Please enter the number of clothes:</h4>
                                        <?php
                                        echo "<input type='text' name='numclo' class='form-control' placeholder='Number of Clothes' id='nclothes' data-validation-required-message='Please enter Number of clothes.'>"
                                        ?>
                                        <p class="help-block text-danger"></p>
                                    </div>
                                    <div class="form-group">
                                        <h4>Please enter the due date:</h4>
                                        <?php
                                        echo "<input type='date' name='laun_due_date' class='form-control' placeholder='Due Date *' id='duedate1' data-validation-required-message='Please enter the date of purchase.'>"
                                        ?>
                                        <p class="help-block text-danger"></p>
                                    </div>
                                    <div class="col-lg-12 text-center">
                                        <div id="success"></div>
                                    <?php
                                    echo "<button type='submit' name='save1' class='btn btn-xl'>Save</button>";
                                    ?>
                                    </div>
                                </div>
                                <div id="maid" style="display:none;">
                                    <div class="form-group">
                                        <h4>Please enter the monthly salary to pay:</h4>
                                        <?php
                                        echo "<input type='text' name='salary' class='form-control' placeholder='Maid Salary' id='msal' data-validation-required-message='Please enter the value.'>"
                                        ?>
                                        <p class="help-block text-danger"></p>
                                    </div>
                                    <div class="form-group">
                                        <h4>Please enter the due date:</h4>
                                        <?php
                                        echo "<input type='date' name='maid_due_date' class='form-control' placeholder='Due Date *' id='duedate2' data-validation-required-message='Please enter the date of purchase.'>"
                                        ?>
                                        <p class="help-block text-danger"></p>
                                    </div>
                                    <div class="col-lg-12 text-center">
                                        <div id="success"></div>
                                    <?php
                                    echo "<button type='submit' name='save2' class='btn btn-xl'>Save</button>";
                                    ?>
                                    </div>
                                </div>
                                
                                <div id="milk" style="display:none;">
                                    <div class="form-group">
                                        <h4>Please enter the monthly amount to pay:</h4>
                                        <?php
                                        echo "<input type='text' name='milk_amount' class='form-control' placeholder='Milk Amount' id='mamt' data-validation-required-message='Please enter the value.'>"
                                        ?>
                                        <p class="help-block text-danger"></p>
                                    </div>
                            
                                    <div class="form-group">
                                        <h4>Please enter the due date:</h4>
                                        <?php
                                        echo "<input type='date' name='milk_due_date' class='form-control' placeholder='Due Date *' id='duedate3' data-validation-required-message='Please enter the date of purchase.'>"
                                        ?>
                                        <p class="help-block text-danger"></p>
                                    </div>
                                    <div class="col-lg-12 text-center">
                                        <div id="success"></div>
                                    <?php
                                    echo "<button type='submit' name='save3' class='btn btn-xl'>Save</button>";
                                    ?>
                                    </div>
                                </div>
                                
                                <div id="newsppr" style="display:none;">
                                    <div class="form-group">
                                        <h4>Please enter the monthly amount to pay:</h4>
                                        <?php
                                        echo "<input type='text' name='news_amount' class='form-control' placeholder='Newspaper Amount' id='mamt' data-validation-required-message='Please enter the value.'>"
                                        ?>
                                        <p class="help-block text-danger"></p>
                                    </div>
                                    
                                    <div class="form-group">
                                        <h4>Please enter the due date:</h4>
                                        <?php
                                        echo "<input type='date' name='news_due_date' class='form-control' placeholder='Due Date *' id='duedate4' data-validation-required-message='Please enter the date of purchase.'>"
                                        ?>
                                        <p class="help-block text-danger"></p>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="col-lg-12 text-center">
                                        <div id="success"></div>
                                    <?php
                                    echo "<button type='submit' name='save4' class='btn btn-xl'>Save</button>";
                                    ?>
                                    </div>
                            </div>
                            <?php
                        
                        $dbhost = 'localhost';
                        $dbuser = 'root';
                        $dbpwd='';
                        $conn = mysql_connect($dbhost, $dbuser);
                        mysql_select_db('hms');
                        
                        //if($_SESSION['logge']==true)
                            //{ 
                                //$unam=$_SESSION["usernam"];
                                //echo "<h2 align='right'>"."Hello, $uname"."</h2>";
                            //}
                
                        if(isset($_POST['save1']) || isset($_POST['save2']) || isset($_POST['save3'])||isset($_POST['save4']))
                        {
                            
                            $expname = $_POST['expoption'];
                            //echo $expname;
                            $laun_date=$_POST['date_laun'];
                            $num_clothes=$_POST['numclo'];
                            $laun_due_dat=$_POST['laun_due_date'];
                            $milk_due_dat=$_POST['milk_due_date'];
                            $maid_due_dat=$_POST['maid_due_date'];
                            $news_due_dat=$_POST['news_due_date'];
                            $date = new DateTime($laun_due_dat);
                            $date1 = new DateTime($maid_due_dat);
                            $date2 = new DateTime($milk_due_dat);
                            $date3 = new DateTime($news_due_dat);
                            $week = $date->format("W");
                            $week1 = $date1->format("W");
                            $week2 = $date2->format("W");
                            $week3 = $date3->format("W");
                            //echo $due_dat;
                            $maid_sal = $_POST['salary'];
                            //$duedate_maid = $_POST['due_date_maid'];

                            $milk_amt = $_POST['milk_amount'];
                            //$duedate_milk = $_POST['due_date_milk'];

                            $news_amt = $_POST['news_amount'];
                            //$duedate_news = $_POST['due_date_news'];
                            if(isset($_POST['save1']))
                            {
                                $data=mysql_query("SELECT * from expenses where week='$week'") or die(mysql_error());
                                if(mysql_num_rows($data)>0)
                                {
                                    $data1=mysql_query("UPDATE expenses SET Name='$expname',Laundry_date='$laun_date',Num_of_clothes='$num_clothes',Laun_due_date='$laun_due_dat' WHERE week='$week'")
                                    or die(mysql_error());
                                }
                                else
                                {
                                    $data=mysql_query("INSERT into expenses(Name,Laundry_date,Num_of_clothes,Laun_due_date,week,Cust_name) values ('$expname','$laun_date','$num_clothes','$laun_due_dat','$week','$username')") or die(mysql_error());
                                }
                                 //echo "B4 while1";
                                
                                $data3=mysql_query("SELECT * from expenses where week='$week'") or die(mysql_error());
                                //echo "B4 while2";
                                while($row=mysql_fetch_array($data3))
                                {
                                    $price=$row['Maid_amt']+$row['Newspaper_amt']+$row['Milk_amt'];
                                    $weekly=$row['week'];
                                }
                                //echo $price;
                                //echo $weekly;
                                $data2=mysql_query("SELECT * from try where week='$week'") or die(mysql_error());
                                if(mysql_num_rows($data2)>0)
                                {
                                    $data4=mysql_query("UPDATE try set price='$price' where week='$week'") or die(mysql_error());
                                    $year = "2017"; // Year 2010
                                    //$week = "01"; // Week 1

                                    $date1 = date( "l, M jS, Y", strtotime($year."W".$week."1") ); // First day of week
                                    //$date2 = date( "l, M jS, Y", strtotime($year."W".$week."7") ); // Last day of week
                                    //echo $date1 . " - " . $date2;
                                    $data5=mysql_query("UPDATE my_chart set value1='$price' where category='$date1'") or die(mysql_error());
                                }
                                else
                                {
                                    $data4=mysql_query("INSERT into try(week,price) values ('$weekly','$price')") or die(mysql_error());
                                }
                            }
                            if(isset($_POST['save2']))
                            {
                                $data=mysql_query("SELECT * from expenses where week='$week1'") or die(mysql_error());
                                if(mysql_num_rows($data)>0)
                                {
                                    $data1=mysql_query("UPDATE expenses SET Name='$expname',Maid_amt='$maid_sal',Maid_due_date='$maid_due_dat' WHERE week='$week1'")
                                    or die(mysql_error());
                                }
                                else
                                {
                                    $data=mysql_query("INSERT into expenses(Name,Maid_amt,Maid_due_date,week,Cust_name) values ('$expname','$maid_sal','$maid_due_dat','$week1','$username')") or die(mysql_error());
                                }
                                
                                $data3=mysql_query("SELECT * from expenses where week='$week1'") or die(mysql_error());
                                while($row=mysql_fetch_array($data3))
                                {
                                    $price=$row['Maid_amt']+$row['Newspaper_amt']+$row['Milk_amt'];
                                    $weekly=$row['week'];
                                }
                                $data2=mysql_query("SELECT * from try where week='$week1'") or die(mysql_error());
                                if(mysql_num_rows($data2)>0)
                                {
                                    $data4=mysql_query("UPDATE try set price='$price' where week='$week1'") or die(mysql_error());
                                }
                                else
                                {
                                    $data4=mysql_query("INSERT into try(week,price) values ('$weekly','$price')") or die(mysql_error());
                                }
                            }
                            if(isset($_POST['save3']))
                            {
                                $data=mysql_query("SELECT * from expenses where week='$week2'") or die(mysql_error());
                                if(mysql_num_rows($data)>0)
                                {
                                    $data=mysql_query("UPDATE expenses SET Name='$expname',Milk_amt='$milk_amt',Milk_due_date='$milk_due_dat' WHERE week='$week2'")
                                    or die(mysql_error());
                                }
                                else
                                {
                                    $data=mysql_query("INSERT into expenses(Name,Milk_amt,Milk_due_date,week,Cust_name) values ('$expname','$milk_amt','$milk_due_dat','$week2','$username')") or die(mysql_error());
                                }
                                
                                $data3=mysql_query("SELECT * from expenses where week='$week2'") or die(mysql_error());
                                while($row=mysql_fetch_array($data3))
                                {
                                    $price=$row['Maid_amt']+$row['Newspaper_amt']+$row['Milk_amt'];
                                    $weekly=$row['week'];
                                }
                                $data2=mysql_query("SELECT * from try where week='$week2'") or die(mysql_error());
                                if(mysql_num_rows($data2)>0)
                                {
                                    $data4=mysql_query("UPDATE try set price='$price' where week='$week2'") or die(mysql_error());
                                }
                                else
                                {
                                    $data4=mysql_query("INSERT into try(week,price) values ('$weekly','$price')") or die(mysql_error());
                                }
                            }
                            if(isset($_POST['save4']))
                            {
                                $data=mysql_query("SELECT * from expenses where week='$week3'") or die(mysql_error());
                                if(mysql_num_rows($data)>0)
                                {
                                    $data=mysql_query("UPDATE expenses SET Name='$expname',Newspaper_amt='$news_amt',News_due_date='$news_due_dat' WHERE week='$week3'")
                                    or die(mysql_error());
                                }
                                else
                                {
                                    $data=mysql_query("INSERT into expenses(Name,Newspaper_amt,News_due_date,week,Cust_name) values ('$expname','$news_amt','$news_due_dat','$week3','$username')") or die(mysql_error());
                                }
                                
                                $data3=mysql_query("SELECT * from expenses where week='$week3'") or die(mysql_error());
                                while($row=mysql_fetch_array($data3))
                                {
                                    $price=$row['Maid_amt']+$row['Newspaper_amt']+$row['Milk_amt'];
                                    $weekly=$row['week'];
                                }
                                echo $price;
                                echo $weekly;
                                $data2=mysql_query("SELECT * from try where week='$week3'") or die(mysql_error());
                                if(mysql_num_rows($data2)>0)
                                {
                                    echo "in if";
                                    $data4=mysql_query("UPDATE try set price='$price' where week='$week3'") or die(mysql_error());
                                }
                                else
                                {
                                    echo "in else";
                                    $data4=mysql_query("INSERT into try(week,price) values ('$weekly','$price')") or die(mysql_error());
                                }
                            }
                            
                        }
                

                              
                            ?>    
                                <br><br>
                            
                        </form>
                    </div> 
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
