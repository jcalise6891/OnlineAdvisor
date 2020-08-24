<?php

require_once "../../vendor/autoload.php";

use App\ConnexionDB;
use App\User;

    if(isset($_POST['submit'])){
        $connexion = new ConnexionDB("mysql:host=localhost;dbname=online_advisor","root","root");
        $db = $connexion->openCon();

        $user = new User($_POST['email'],$_POST['password']);
        $user->verifyUser($db);
    }
