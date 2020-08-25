<?php

require_once "../../vendor/autoload.php";

use App\ConnexionDB;
use App\User;
use App\ConnexionUser;

    if(isset($_POST['submit'])){


        try {
            $user = new User($_POST['email'], $_POST['password']);
            $connexion = new ConnexionDB("mysql:host=localhost;dbname=online_advisor","root","root");
            $db = $connexion->openCon();
            ConnexionUser::connectUser($user,$db);
        } catch (Exception $e){
            echo 'Exception : ',$e->getMessage(),"<br>";
        }


    }
