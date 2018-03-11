<div class="w3-content">
    <h1><?php echo $text->get_text('approveusr'); ?></h1>
</div>
    <table class="w3-table-all w3-hoverable w3-centered">
        <thead>
            <tr class="w3-green">
                <th><?php echo $text->get_text('memberid'); ?></th>
                <th><?php echo $text->get_text('memberuser'); ?></th>
                <th><?php echo $text->get_text('membername'); ?></th>
                <th><?php echo $text->get_text('memberemail'); ?></th>
                <th><?php echo $text->get_text('memberapproved'); ?></th>
                <th><?php echo $text->get_text('memberclearance'); ?></th>
                <th><?php echo $text->get_text('memberaction'); ?></th>
            </tr>
        </thead>
        <tbody>
        <?php
            foreach($pending as $member) {
                echo '<tr class="w3-cell-middle">';
                    echo '<td>' . $member['member_id'] . '</td>';
                    echo '<td>' . $member['member_user'] . '</td>';
                    echo '<td>' . $member['member_name'] . '</td>';
                    echo '<td>' . $member['member_email'] . '</td>';
                    echo '<td>' .
                        ($member['member_approved'] 
                            ? '<i class="fa fa-check"></i>'
                            : '<i class="fa fa-times"></i>'
                        ) . '</td>';
                   echo '<td>' . $text->get_text('clearance_' . $member['member_level']) . '</td>';
                   echo '<td><a class="w3-btn w3-round green w3-hover-opacity" href="'
                        . PROTOCOL . BASE_URI . '/action/approve/' . $member['member_id'] . '">'
                        . rtrim($text->get_text('approveusr'), 's') . '</a> ';

                   echo '&nbsp; <a class="w3-btn w3-round green w3-hover-opacity" href="'
                        . PROTOCOL . BASE_URI . '/action/deny/' . $member['member_id'] . '">'
                        . $text->get_text('denyusr') . '</a></td>';
               echo '</tr>';
            }
        ?>
    </table>
</div>
