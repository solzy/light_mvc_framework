<?php
if ($_GET['randomId'] != "GjkSh6Jzk1Z4EAGSUy0wKWL_MkZOUHA7JEpU64IqYjo43LUjP1CtzbunI_FHRCiM") {
    echo "Access Denied";
    exit();
}

// display the HTML code:
echo stripslashes($_POST['wproPreviewHTML']);

?>  
