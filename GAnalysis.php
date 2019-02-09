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

    <title>Grocery Analysis</title>
    
    
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
                    <h4 class="section-heading"></h4>
                    <h3 class="section-subheading text-muted"></h3>
                    <div id="chart-container" align="center">
                    <?php
                        $username=$_SESSION["usernam"];
                        $_SESSION['logged']=true;
                        $_SESSION['usernam']=$username;
                        echo "<h2 align='right'>"."Hello, $username"."</h2>";

                    ?>
                     <?php
                        echo "<h2 >"."Expenditure Analysis"."</h2>";
                            $dbhost = 'localhost';
                            $dbuser = 'root';
                            $conn = mysql_connect($dbhost, $dbuser);
                            mysql_select_db('hms');
                            $emailsend=mysql_query("SELECT Paid from expenses where Paid!='4' and Cust_name='$username'") or die(mysql_error());
                                //mysql_query($emailsend, $conn);
                                //echo $emailsend;
                            while($row=mysql_fetch_array($emailsend))
                            {
                                $amt=$row['Paid'];
                                 //echo $emailadd;
                            }
                            if(isset($_POST['update_laun']))
                            {
                                $amt=$amt+1;
                                $data2=mysql_query("UPDATE expenses SET Paid=$amt") or die(mysql_error());
                            }
                            if(isset($_POST['update_news']))
                            {
                                $amt=$amt+1;
                                $data2=mysql_query("UPDATE expenses SET Paid=$amt") or die(mysql_error());
                            }
                            if(isset($_POST['update_milk']))
                            {
                                $amt=$amt+1;
                                $data2=mysql_query("UPDATE expenses SET Paid=$amt") or die(mysql_error());
                            }
                            if(isset($_POST['update_maid']))
                            {
                                $amt=$amt+1;
                                $data2=mysql_query("UPDATE expenses SET Paid=$amt") or die(mysql_error());
                            }





                            $data=mysql_query("SELECT * from expenses where Paid!='4' and Cust_name='$username'") or die(mysql_error());
                            $date=date('Y-m-d');
                            print"<table class='table table-striped'>";
                            print"<tr >";
                            print"<td col='10' text-align:'center'><b>Expense Name</b></th>";
                            print"<td col='10' align='center'><b>Due date</b></th>";
                            print"<td col='10' align='center'>Paid ?</th>";
                           // echo "in while";
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
                                $laun_pay=$row['Paid'];
                                if($laundry_due_date == $date && $laun_pay<'1')
                                {
                                   //echo  $laundry_due_date;
                                    echo "<form action='' method='post' align='center'>";
                                    print "<tr>";
                                    //echo"<td>"."<text name='Name' value='".$row['name']."'>".$row['name']."</text>"."</td>";
                                    echo"<td>"."<input type=hidden name='Name' value='".$row['Name']."'>"."Laundry"."</input>"."</td>";
                                    //echo"<td>"."<text name='Qty' value='$third'>".$third."</text>"."</td>";
                                    echo"<td>"."<input type=hidden name='Qty' value='".$laundry_due_date."'>".$laundry_due_date."</input>"."</td>";
                                    "<tr>";
                                    echo "<td>"."<input type=submit name='update_laun' class='btn btn-l' value=Paid onclick='return confirm(\"Are you sure you want to update the Quantity?\")'>"." </td>";
                                    echo "</form>";
                                }
                                if($news_due_date == $date && $laun_pay<'2')
                                {
                                   //echo  $laundry_due_date;
                                    echo "<form action='' method='post' align='center'>";
                                    print "<tr>";
                                    //echo"<td>"."<text name='Name' value='".$row['name']."'>".$row['name']."</text>"."</td>";
                                    echo"<td>"."<input type=hidden name='Name' value='".$row['Name']."'>"."Newspaper"."</input>"."</td>";
                                    //echo"<td>"."<text name='Qty' value='$third'>".$third."</text>"."</td>";
                                    echo"<td>"."<input type=hidden name='Qty' value='".$news_due_date."'>".$news_due_date."</input>"."</td>";
                                    "<tr>";
                                    echo "<td>"."<input type=submit name='update_news' class='btn btn-l' value=Paid onclick='return confirm(\"Are you sure you want to update the Quantity?\")'>"." </td>";
                                    echo "</form>";
                                }
                                if($milk_due_date == $date && $laun_pay<'3')
                                {
                                   //echo  $laundry_due_date;
                                    echo "<form action='' method='post' align='center'>";
                                    print "<tr>";
                                    //echo"<td>"."<text name='Name' value='".$row['name']."'>".$row['name']."</text>"."</td>";
                                    echo"<td>"."<input type=hidden name='Name' value='".$row['Name']."'>"."Milk"."</input>"."</td>";
                                    //echo"<td>"."<text name='Qty' value='$third'>".$third."</text>"."</td>";
                                    echo"<td>"."<input type=hidden name='Qty' value='".$milk_due_date."'>".$milk_due_date."</input>"."</td>";
                                    "<tr>";
                                    echo "<td>"."<input type=submit name='update_milk' class='btn btn-l' value=Paid onclick='return confirm(\"Are you sure you want to update the Quantity?\")'>"." </td>";
                                    echo "</form>";
                                }
                                if($maid_due_date == $date && $laun_pay<'4')
                                {
                                   //echo  $laundry_due_date;
                                    echo "<form action='' method='post' align='center'>";
                                    print "<tr>";
                                    //echo"<td>"."<text name='Name' value='".$row['name']."'>".$row['name']."</text>"."</td>";
                                    echo"<td>"."<input type=hidden name='Name' value='".$row['Name']."'>"."Maid"."</input>"."</td>";
                                    //echo"<td>"."<text name='Qty' value='$third'>".$third."</text>"."</td>";
                                    echo"<td>"."<input type=hidden name='Qty' value='".$maid_due_date."'>".$maid_due_date."</input>"."</td>";
                                    "<tr>";
                                    echo "<td>"."<input type=submit name='update_maid' class='btn btn-l' value=Paid onclick='return confirm(\"Are you sure you want to update the Quantity?\")'>"." </td>";
                                    echo "</form>";
                                }
                                

                            }
                            print"<table>";
                            

                            
                    ?>
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
