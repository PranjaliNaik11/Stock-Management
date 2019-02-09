<?php
$dbhost = 'localhost';
$dbuser = 'root';
$conn = mysql_connect($dbhost, $dbuser);
mysql_select_db('hms');
$waqt=new DateTime();
$waqt->format('Y-m-d H:i:s');
$waqt->getTimestamp(); 
$samay = $waqt->format( 'c' );
$data=mysql_query("select * from time") or die(mysql_error());
while($row=mysql_fetch_array($data))
{
	$update=date( "Y-m-d H:i:s", strtotime($row["timestamp"]) + 4 * 60);
	$n=date( "Y-m-d H:i:s", strtotime($samay));
	if($n>=$update)
    {
    	
    }
}
?>