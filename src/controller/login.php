<?php

require_once "../../vendor/autoload.php";

use App\ConnexionDB;
use App\User;
use App\ConnexionUser;

    if(isset($_POST['submit'])){

        $connexion = new ConnexionDB("mysql:host=localhost;dbname=online_advisor","root","root");
        $user = new User($_POST['email'],$_POST['password']);

        $db = $connexion->openCon();
    }
