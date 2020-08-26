<?php

require_once "../../vendor/autoload.php";

use App\ConnexionDB;
use App\User;

    if (isset($_POST['submit'])) {
        echo '<pre>';
        print_r($_POST);
        echo '<pre>';
    }
