<div class="w3-content">
    <a href="<?php echo PROTOCOL . BASE_URI; ?>/members">Go back to Dashboard</a>
    <h2>Delete File</h2>

    <div class="w3-container w3-padding w3-card-4">
        <h3>Are you sure you wish to permanently remove this file?</h3>
<a class="w3-btn w3-round-large w3-green" href="<?php echo PROTOCOL . BASE_URI; ?>/members/editor/doc"><i class="fa fa-check" aria-hidden="true"></i> No. Keep it.</a>
        <a class="w3-btn w3-round-large w3-red w3-text-white" href="<?php echo PROTOCOL . BASE_URI; ?>/action/deletefile/<?php echo $filename; ?>"><i class="fa fa-times" aria-hidden="true"></i> YES</a>
    </div>
</div>
