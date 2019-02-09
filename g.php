<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "hms";

$conn = mysqli_connect($servername, $username, $password, $db); // update your connection params

$query = "SELECT grocery,quantity,price FROM grocery"; //update your query as needed

$results = mysqli_query($conn, $query);
$pieData = array();

while ($row = mysqli_fetch_array($results)) {
    $acc_type = $row ['grocery'];
    $acc_num = $row ['quantity'];
    $price =$row['price'];
    $pieData[] = array($row['grocery'], $row['quantity']);
}
?>

<div class="hellcontainer">
    <div id="chart_div"></div>
</div>

<script type="text/javascript" src="https://www.google.com/jsapi"></script>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>

<script type="text/javascript">
google.load("visualization","1",{packages:["corechart"]});
google.setOnLoadCallback(drawChart);
function drawChart()
{

    var data = new google.visualization.DataTable();
    data.addColumn('string', 'Groceries');
    data.addColumn('number', 'Quantity');
    data.addRows(<?php echo json_encode($pieData); ?>);

    var options = {'title':'Monthly Groceries Used',
                           'width':900,
                           'height':900};

    var chart=new google.visualization.PieChart(document.getElementById('chart_div'));
    chart.draw(data,options);

}
</script>
<script>
document.write("<input type='button' " +
"onClick='window.print()' " +
"class='printbutton' " +
"value='Print This Page'/>");
</script>