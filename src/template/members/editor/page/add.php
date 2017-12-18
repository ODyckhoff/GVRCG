<div class="w3-content">
<p>
    <a href="<?php echo BASE_URI; ?>/members/editor/page">&laquo Go back to Pages</a>

    <h1>Adding Page</h1>
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

    <form id="addpageform" action="<?php echo BASE_URI; ?>/action/addpage" method="POST">
        <div class="w3-section w3-row">
            <div class="w3-col" style="width:100px;">
                <b>Page Name:</b>
            </div>
            <div class="w3-rest">
                <input type="text" class="w3-input w3-border w3-round-large" name="pagename" />
            </div>
        </div>
        <div class="w3-section w3-row">
            <div class="w3-col" style="width:100px;">
                <b>Menu Position</b> <i>(0 to hide)</i>:
            </div>
            <div class="w3-rest">
                <input type="text" class="w3-input w3-border w3-round-large" name="position" />
            </div>
        </div>
        <div class="w3-section w3-row">
            <div class="w3-col" style="width:100px;">
                <b>Page Parent: </b>
            </div>
            <div class="w3-rest">
                <!--<input type="text" class="w3-input w3-border w3-round-large" name="pageurl" />-->
                <select name="pageurl" class="w3-select w3-border w3-round-large">
                    <option value="/">/ (site root)</option>
                    <?php
                        foreach($menuitems as $item) {
                            echo '<option value="/' . $item['page_name'] . '">/' . $item['page_name'] . '</option>';
                        }
                        foreach($uroutes as $route) {
                            echo '<option value="' . $route . '">/' . $route . '</option>';
                        }
                    ?>
                </select>
            </div>
        </div>
        <input id="codeplaceholder" type="hidden" name="contents" value="" />
        <div id="summernote"></div>
    </form>

</div>

<script>
    $(document).ready(function() {
        $('#summernote').summernote({
            height:300
        });
    });

    function submitform() {
        $('#codeplaceholder').val(getContents());
        $('#addpageform').submit();
    }

    function getContents() {
        var markup = $('#summernote').summernote('code');
        return markup;
    }
</script>
