<?php
if ($handle = opendir('pages')) {
    while (false !== ($entry = readdir($handle))) {
        echo "$entry\n";
    }
    closedir($handle);
}
