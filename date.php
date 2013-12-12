<?php
/*
 * Determine month and year. If none specified, sets to current month of this year.
 */

if(!empty($_GET))
{
	$thisYearNum = strip_tags($_GET['year']);
	$thisMonthNum = strip_tags($_GET['month']);
	
	if(isset($_GET['day']))
	{
		$thisDayNum = strip_tags($_GET['day']);
	}
	else
	{
		if ($thisMonthNum == date("m"))
			$thisDayNum = date("d");
		else
			$thisDayNum = 0;
	}

	$thisMonth = date('F', mktime(0, 0, 0, $thisMonthNum, 1, $thisYearNum));
	$lastMonthNum = date("m", strtotime("-1 month", mktime(0, 0, 0, $thisMonthNum, 1, $thisYearNum)));
	$nextMonthNum = date("m", strtotime("+1 month", mktime(0, 0, 0, $thisMonthNum, 1, $thisYearNum)));
}
else
{
	$thisYearNum = date('Y');
	$thisMonthNum = date('m');
	$thisMonth = date('F');
	$thisDayNum = date('d');
	$lastMonthNum = date("m", strtotime("last month"));
	$nextMonthNum = date("m", strtotime("next month"));
	$errorMessage = null;
}

/* Get number of days in month */
$daysInMonth = cal_days_in_month(CAL_GREGORIAN, $thisMonthNum, $thisYearNum);

/* Get day of the week the month starts */
$dayOfWeekMonthStart = date("D", mktime(0, 0, 0, $thisMonthNum, 1, $thisYearNum));

?>