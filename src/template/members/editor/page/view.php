<div class="w3-content">
    <h1>Managing Pages</h1>
    <p>
        <a class="w3-btn w3-green w3-round-large" href="<?php echo PROTOCOL . BASE_URI; ?>/members/editor/page/add"><i class="fa fa-plus" aria-hidden="true"></i> Add Page</a>

        <a class="w3-btn w3-amber w3-round-large"><i class="fa fa-list-ol" aria-hidden="true"></i> Change Order</a>
    </p>
    <table class="w3-table-all">
        <thead>
            <tr>
                <th>Actions</th>
                <th>Page Name</th>
                <th>Menu Placement</th>
            </tr>
        </thead>
        <tbody>
        <?php
            foreach($content as $page) {
                echo "<tr>";
                echo "<td>";
                // buttons
                echo '<a class="w3-btn w3-round-large green"'
                   . 'href="' . BASE_URI . '/members/editor/page/edit/' . $page['page_id'] . '">'
                   . '<i class="fa fa-pencil" aria-hidden="true"></i> Edit</a> ';
                
                echo '<a class="w3-btn w3-round-large w3-red"'
                   . 'href="' . BASE_URI . '/members/editor/page/delete/' . $page['page_id'] . '">'
                   . '<i class="fa fa-pencil" aria-hidden="true"></i> Delete</a> ';
                echo "</td>";

                echo "<td>" . $page['page_title_en'] . "</td>";
                echo "<td>" . ( $page['page_order'] == NULL ? 'Not Shown' : $page['page_order']) . "</td>";
                echo "<tr>";
                if($page['page_title_en'] == 'Home') {
                    echo '</tbody><tbody id="sortable">';
                }
            }
        ?>
        </tbody>
    </table>
</div>
