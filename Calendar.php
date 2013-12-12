<?php

function Calendar()
{
	$thisYearNum = date('Y');
	$thisMonthNum = date('m');
	$thisMonth = date('F');
	
	
	/* Get number of days in month */
	
	$daysInMonth = cal_days_in_month(CAL_GREGORIAN, $thisMonthNum, $thisYearNum);
	
	echo "There are $daysInMonth days in $thisMonth";
	
	$monthArray = array();
	
	echo "<link rel=\"stylesheet\" href=\"style.css\" />";
	echo "<div class=\"calendarmain\">";
	
	for ($i = 1; $i <= $daysInMonth; $i++)
	{
		if ($i - 1 / 7 == 0)
			echo "<br />";
		echo "<div class=\"calendarday\"><div class=\"calendardaynum\">$i</div></div>";
	}
	
	echo "</div>";
}

Calendar();

?>