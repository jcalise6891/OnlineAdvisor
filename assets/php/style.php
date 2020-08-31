<?php
header('Content-Type : content/css');

if (isset($_SESSION['userMail'])) {
    ?>  #logOut{
            display:block;
            }
        <?php
} else {
        ?>  #logOut{
            display:none;
            }
        <?php
    }
