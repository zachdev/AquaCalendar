<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
      "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<title>AquaCalendar</title>

<link rel="stylesheet" href="style.css" />

</head>

<body>

<a href='AquaCalendar.php'><h1 class='title'>AquaCalendar</h1></a>

<?php

require_once("date.php");

$weekdays = array("Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday");

/* Generate appropriate number of blank days */
$blanks = 0;

switch($dayOfWeekMonthStart)
{ 
 case "Sun": $blanks = 0; break; 
 case "Mon": $blanks = 1; break; 
 case "Tue": $blanks = 2; break; 
 case "Wed": $blanks = 3; break; 
 case "Thu": $blanks = 4; break; 
 case "Fri": $blanks = 5; break; 
 case "Sat": $blanks = 6; break; 
 }

/* Empty calendar string */
$calendar = "";

$dayCounter = 1;

/*
 *	Generate calendar for output.
 */

$calendar .= "<table class='calendar-main'>";

$calendar .= "<tr><th colspan=7 class='calendar-header'> <a href='?year=$thisYearNum&month=$lastMonthNum'> << </a> $thisMonth $thisYearNum <a href='?year=$thisYearNum&month=$nextMonthNum'> >> </a> </th></tr><tr>";

/* Add in days of the week */
foreach ($weekdays as $day)
{
	$calendar .= "<td class='calendar-day-header'>$day</td>";
}

$calendar .= "</tr><tr>";

/* Add in blank days */

while ($blanks > 0)
{
	$calendar .= "<td style='background: #56AAFF;'></td>";
	$dayCounter++;
	$blanks--;
}
/*
 * Output all the days
 */
for ($day = 1; $day <= $daysInMonth; $day++)
{
	/* Create new row if number if days exceeds 7 */
	if ($dayCounter > 7)
	{
		$calendar .= "</tr><tr>";
		$dayCounter = 1;
	}
	/* Shade in today's date */
	if ($day == $thisDayNum)
	{
		$calendar .= "<td class='calendar-day-today' onclick='window.location.href = \"entry.php\"'><div class='calendar-day-numbox'>$day</div></td>";
	}
	else
	{
		$calendar .= "<td class='calendar-day' onclick='window.location.href = \"entry.php?year=$thisYearNum&month=$thisMonthNum&day=$day\"'><div class='calendar-day-numbox'>$day</div></td>";
	}
	$dayCounter++;
}

$calendar .= "</tr></table>";

/*
 * If no errors, output the calendar
 */

if (!($errorMessage))
	echo $calendar;
else
	echo $errorMessage;

?>

</body>
</html>