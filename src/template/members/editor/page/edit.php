<div class="w3-content">
<p>
    <a href="<?php echo PROTOCOL . BASE_URI; ?>/members/editor/page">&laquo Go back to Pages</a>

    <h1>Editing Page</h1>
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
    }?>
    <p>
        <a class="w3-btn w3-round-large w3-green" onclick="submitform()"><i class="fa fa-floppy-o" aria-hidden="true"></i> Save</a>
    </p>

    <form id="editpageform" action="<?php echo PROTOCOL . BASE_URI; ?>/action/editpage/<?php echo $content['page_id']; ?>" method="POST">
        <input id="codeplaceholder" type="hidden" name="contents" value="" />
    </form>

    <div id="summernote">
<?php echo $content['content_en']; ?>
    </div>
        <script>
        </script>
</div>

<script>
    $(document).ready(function() {
        $('#summernote').summernote({
            height:300
        });
    });

    function submitform() {
        $('#codeplaceholder').val(getContents());
        $('#editpageform').submit();
    }

    function getContents() {
        var markup = $('#summernote').summernote('code');
        return markup;
    }

    $('#codeplaceholder').val(getContents());
</script>
