<div class="w3-container">
<h1>Events Manager</h1>
<?php
    if(isset($noop) && $noop == true) {
        echo $content;
        echo '</div></div>';
        return;
    }
    if(isset($success)) {
        echo '<div class="w3-panel w3-padding w3-leftbar w3-border-green w3-pale-green">' . $success . '</div>';
    }
    elseif(isset($error)) {
        echo '<div class="w3-panel w3-padding w3-leftbar w3-border-red w3-pale-red">' . $error . '</div>';
    }

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

<p>
    <a class="w3-btn w3-green w3-round-large" href="<?php echo PROTOCOL . BASE_URI; ?>/members/editor/event/add"><i class="fa fa-plus" aria-hidden="true"></i> Add Event</a>
</p>
<?php
    // Present the events nicely.

    echo '<table class="w3-table-all">';
    echo '<tr>';
        echo '<th>Actions</th>';
        echo '<th>Event</th>';
        echo '<th>Description</th>';
        echo '<th>Start Date</th>';
        echo '<th>Location</th>';
        echo '<th>Organiser</th>';
    echo '</tr>';

    foreach($content as $ev) {
        echo '<tr>';
        echo '<td style="width:250px;">'
           . '<a class="w3-btn w3-round-large green" '
           . 'href="' . PROTOCOL . BASE_URI . '/members/editor/event/edit/'
           . $ev['event_id'] . '">'
           . '<i class="fa fa-pencil" aria-hidden="true"></i> Edit</a> ';
        echo '<a class="w3-btn w3-round-large w3-red" '
           . 'href="' . PROTOCOL . BASE_URI . '/members/editor/event/delete/'
           . $ev['event_id'] . '">'
           . '<i class="fa fa-trash" aria-hidden="true"></i> Delete</a>'
           . '</td>';

        echo '<td>' . $ev['event_name'] . '</td>';
        echo '<td>' . $ev['event_desc'] . '</td>';
        echo '<td style="width:150px;">' . $ev['event_datestart'] . '</td>';
        echo '<td>' . $ev['event_location'] . '</td>';
        echo '<td>' . $ev['org_name'] . '</td>';
        echo '</tr>';
    }
    echo '</table>';
?>
</div>
