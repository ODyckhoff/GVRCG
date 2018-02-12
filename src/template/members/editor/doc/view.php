<div class="w3-container">
    <div class="w3-content">
        <a href="<?php echo PROTOCOL . BASE_URI; ?>/members">&laquo; Go back to Dashboard.</a>
<?php
    if(isset($noop) && $noop) {
        exit;
    }
    if(isset($success)) {
        echo '<div class="w3-panel w3-padding w3-leftbar w3-border-green w3-pale-green">' . $success . '</div>';
    }
    elseif(isset($error)) {
        echo '<div class="w3-panel w3-padding w3-leftbar w3-border-red w3-pale-red">' . $error . '</div>';
    }
?>

        <h2>Documents Editor</h2>

        <p>
            <a class="w3-btn w3-green w3-round-large" href="<?php echo PROTOCOL . BASE_URI; ?>/members/editor/doc/add"><i class="fa fa-plus" aria-hidden="true"></i> Add New File</a>
        </p>

        <table class="w3-table-all">
            <tr>
                <th>Actions</th>
                <th>Name</th>
                <th>Visible?</th>
                <th>Size</th>
                <th>Type</th>
                <th></th>
            </tr>
        <?php
            foreach($filtered as $ref) {
                $path = PUB . 'doc/' . $ref['file_name'];
                $ext  = pathinfo($path, PATHINFO_EXTENSION);
                $size = human_filesize(filesize($path), 2);

                echo '<td>';
                echo '<a class="w3-btn green w3-round-large" href="' . PROTOCOL . BASE_URI . '/members/editor/doc/edit/' . $ref['file_id'] . '"><i class="fa fa-pencil" aria-hidden="true"></i> Edit</a>';
                echo ' <a class="w3-btn w3-red w3-round-large" href="' . PROTOCOL . BASE_URI . '/members/editor/doc/delete/' . $ref['file_id'] . '"><i class="fa fa-trash" aria-hidden="true"></i> Remove</a>';
                echo '</td>';

                echo "<td>" . $ref['file_name'] . "</td>"
                   . '<td><i class="fa fa-' . ($ref['file_visible'] ? 'check' : 'times') . ' aria-hidden="true"></i></td>'
                   . "<td>$size</td>"
                   . '<td>' . $ext . '</td>';

                echo '<td>';
                switch($ext) {
                    case 'doc':
                    case 'docx':
                    case 'odt':
                        echo '<i class="w3-xlarge fa fa-file-word-o" aria-hidden="true"></i>';
                    break;

                    case 'txt':
                    case 'rtf':
                        echo '<i class="w3-xlarge fa fa-file-text-o" aria-hidden="true"></i>';
                    break;

                    case 'ppt':
                    case 'pptx':
                        echo '<i class="w3-xlarge fa fa-file-powerpoint-o" aria-hidden="true"></i>';
                    break;

                    case 'xls':
                    case 'xlsx':
                        echo '<i class="w3-xlarge fa fa-file-excel-o" aria-hidden="true"></i>';
                    break;

                    case 'pdf':
                        echo '<i class="w3-xlarge fa fa-file-pdf-o" aria-hidden="true"></i>';
                    break;

                    case 'zip':
                    case 'tar':
                    case '7zip':
                    case 'bz2':
                    case 'gz':
                    case 'lz':
                    case 'lzma':
                    case 'lzo':
                    case 'rz':
                    case 'sz':
                    case 'xz':
                    case '7z':
                    case 'apk':
                    case 'jar':
                    case 'rar':
                    case 'dmg':
                    case 'tgz':
                    case 'tbz2':
                    case 'tlz':
                    case 'zipx':
                    case 'war':
                    case 'zz':
                        echo '<i class="w3-xlarge fa fa-file-archive-o" aria-hidden="true"></i>';
                    break;

                    case '3gp':
                    case 'aa':
                    case 'aac':
                    case 'aax':
                    case 'act':
                    case 'aiff':
                    case 'amr':
                    case 'ape':
                    case 'dvf':
                    case 'flac':
                    case 'gsm':
                    case 'm4a':
                    case 'm4b':
                    case 'mp3':
                    case 'ogg':
                    case 'oga':
                    case 'vox':
                    case 'wav':
                    case 'wma':
                        echo '<i class="w3-xlarge fa fa-file-audio-o" aria-hidden="true"></i>';
                    break;
         
                    case 'webm':
                    case 'flv':
                    case 'vob':
                    case 'ogv':
                    case 'gifv':
                    case 'avi':
                    case 'mov':
                    case 'wmv':
                    case 'mp4':
                    case 'm4v':
                    case 'm4p':
                    case 'mpg':
                    case 'mpeg': 
                        echo '<i class="w3-xlarge fa fa-file-video-o" aria-hidden="true"></i>';
                    break;

                    case 'gif':
                    case 'png':
                    case 'jpg':
                    case 'jpeg':
                    case 'bmp':
                    case 'tiff':
                    case 'jif':
                    case 'svg':                  
                        echo '<i class="w3-xlarge fa fa-file-image-o" aria-hidden="true"></i>';
                    break;

                    case 'html':
                    case 'htm':
                    case 'php':
                    case 'c':
                    case 'cpp':
                    case 'js':
                    case 'perl':
                    case 'pl':
                    case 'py':
                    case 'py3':
                    case 'rb':
                    case 'xml':
                    case 'sgml':
                    case 'dot':
                        echo '<i class="w3-xlarge fa fa-file-code-o" aria-hidden="true"></i>';
                    break;
                }
                echo '</td></tr>';
            }
       ?>
       </table>
