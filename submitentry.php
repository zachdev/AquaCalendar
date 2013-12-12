<?php

$year = strip_tags($_GET['year']);
$month = strip_tags($_GET['month']);
$day = strip_tags($_GET['day']);

$waterTemperature = strip_tags($_POST['watertemperature']);
$salinity = strip_tags($_POST['salinity']);
$calcium = strip_tags($_POST['calcium']);
$nitrates = strip_tags($_POST['nitrates']);
$nitrites = strip_tags($_POST['nitrites']);
$alkalinity = strip_tags($_POST['alkalinity']);
$magnesium = strip_tags($_POST['magnesium']);
$ammonia = strip_tags($_POST['ammonia']);
$phosphates = strip_tags($_POST['phosphates']);
$iodine = strip_tags($_POST['iodine']);
$notes = strip_tags($_POST['notes']);

$date = "$year-$month-$day";

$mysql = mysql_connect("localhost", "zach", "stoex43em");

$query = "SELECT * FROM aquacalendar.entries WHERE date = '$date'";

$result = mysql_fetch_array(mysql_query($query, $mysql));

if($result == null)
{
	$query = "INSERT INTO aquacalendar.entries(`date`, `water_temp`, `salinity`,
											   `nitrates`, `nitrites`, `calcium`,
											   `alkalinity`, `magnesium`, `ammonia`,
											   `phosphates`, `iodine`, `notes`)
											   
			  VALUES ('$date',  '$waterTemperature',  '$salinity',  '$nitrates',
					  '$nitrites', '$calcium',  '$alkalinity',  '$magnesium',
					  '$ammonia',  '$phosphates',  '$iodine',  '$notes')";
}
else
{ 
	$query = "UPDATE aquacalendar.entries SET water_temp='$waterTemperature',
			  salinity='$salinity', nitrates='$nitrates', nitrites='$nitrites',
			  calcium='$calcium', alkalinity='$alkalinity',
			  magnesium='$magnesium', ammonia='$ammonia', phosphates='$phosphates',
			  iodine='$iodine', notes='$notes' WHERE date='$date'";
}

mysql_query($query, $mysql);

mysql_close($mysql);

header("Location: entry.php?year=$year&month=$month&day=$day");

?>