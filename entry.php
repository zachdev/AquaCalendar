<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
      "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<title>AquaCalendar - Log Entry</title>

<link rel="stylesheet" href="style.css" />

</head>

<body>

<?php 

require_once("date.php");

$mysql = mysql_connect("localhost", "zach", "stoex43em");

$query = "SELECT * FROM aquacalendar.entries WHERE date = '$thisYearNum-$thisMonthNum-$thisDayNum'";

$result = mysql_fetch_array(mysql_query($query, $mysql));

if($result)
{
	$date = $result['date'];
	$waterTemp = $result['water_temp'];
	$salinity = $result['salinity'];
	$calcium = $result['calcium'];
	$nitrates = $result['nitrates'];
	$nitrites = $result['nitrites'];
	$alkalinity = $result['alkalinity'];
	$magnesium = $result['magnesium'];
	$ammonia = $result['ammonia'];
	$phosphates = $result['phosphates'];
	$iodine = $result['iodine'];
	$notes = $result['notes'];
}

mysql_close($mysql);

echo "<h1 class='title'>Entry For: $thisMonth $thisDayNum, $thisYearNum</h1>";

?>

<div class="entry-main-box">

<div class="entry-inner-box">

<form action="submitentry.php<?php echo "?year=$thisYearNum&month=$thisMonthNum&day=$thisDayNum"; ?>" method="post" name="submit-entry">
<input name="date" type="hidden" value="<?php echo $thisYearNum-$thisMonthNum-$thisDayNum; ?>" />
<div class="entry-item">Water Temperature: <input name="watertemperature" type="text" size="20" class="textbox" value="<?php echo $waterTemp; ?>" /></div><br />
<div class="entry-item">Salinity: <input name="salinity" type="text" size="20" class="textbox" value="<?php echo $salinity; ?>" /></div><br />
<div class="entry-item">Nitrates: <input name="nitrates" type="text" size="20" class="textbox" value="<?php echo $nitrates; ?>"/></div><br />
<div class="entry-item">Nitrites: <input name="nitrites" type="text" size="20" class="textbox" value="<?php echo $nitrites; ?>"/></div><br />
<div class="entry-item">Calcium: <input name="calcium" type="text" size="20" class="textbox" value="<?php echo $calcium; ?>"/></div><br />
<div class="entry-item">Alkalinity: <input name="alkalinity" type="text" size="20" class="textbox" value="<?php echo $alkalinity; ?>"/></div><br />
<div class="entry-item">Magnesium: <input name="magnesium" type="text" size="20" class="textbox" value="<?php echo $magnesium; ?>"/></div><br />
<div class="entry-item">Ammonia: <input name="ammonia" type="text" size="20" class="textbox" value="<?php echo $ammonia; ?>"/></div><br />
<div class="entry-item">Phosphates: <input name="phosphates" type="text" size="20" class="textbox" value="<?php echo $phosphates; ?>"/></div><br />
<div class="entry-item">Iodine: <input name="iodine" type="text" size="20" class="textbox" value="<?php echo $iodine; ?>"/></div><br />
<div class="notes-item">Notes: <textarea name="notes" rows="5" cols="30" class="textbox"><?php echo $notes; ?></textarea></div><br />
<input type="submit" name="savebutton" class="savebutton" value="Save" />
</form>

<input type="button" name="backbutton" class="backbutton" onclick="window.location.href='<?php echo "AquaCalendar.php?year=$thisYearNum&month=$thisMonthNum" ?>'" value="Back" />

</div>

</div>

</body>
</html>