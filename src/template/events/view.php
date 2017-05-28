<div class="w3-container">
<h1>Events</h1>
<?php
    // Stupid date ordinal stuff.
    $day = strftime("%A");
    $month = strftime("%B");
    $year = strftime("%Y");
    $number = strftime("%e");
    $ends = array('th','st','nd','rd','th','th','th','th','th','th');
    if (($number %100) >= 11 && ($number%100) <= 13)
        $ordinal = 'th';
    else
        $ordinal = $ends[$number % 10];
?>

<h3>Today's Date: <?php echo "$day $number<sup>$ordinal</sup> $month $year"; ?></h3>
<?php
    // Present the events nicely.

    echo '<table class="w3-table-all">';
    echo '<tr>';
        echo '<th>Event</th>';
        echo '<th>Description</th>';
        echo '<th>Start Date</th>';
        echo '<th>Location</th>';
        echo '<th>Organiser</th>';
    echo '</tr>';

    foreach($content as $ev) {
        echo '<tr>';
        echo '<td>' . $ev['event_name'] . '</td>';
        echo '<td>' . $ev['event_desc'] . '</td>';
        echo '<td>' . $ev['event_datestart'] . '</td>';
        echo '<td>' . $ev['event_location'] . '</td>';
        echo '<td>' . $ev['org_name'] . '</td>';
        echo '</tr>';
    }
    echo '</table>';
?>
</div>
