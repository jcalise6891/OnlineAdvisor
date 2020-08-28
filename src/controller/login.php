<?php

require_once "../../vendor/autoload.php";

use App\model\ConnexionDB;
use App\User;
use App\model\ConnexionUser;

if (isset($_POST['submit'])) {
    try {
        $user = new User($_POST['email'], $_POST['password']);
        $connexion = new ConnexionDB("mysql:host=localhost;dbname=online_advisor", "root", "root");
        $db = $connexion->openCon();
        $connexionResult = ConnexionUser::connectUser($user, $db);
        if (!$connexionResult) {
            echo "Mauvais login";
        } else {
            header('Location: ../../../../OnlineAdvisor/');
        }
    } catch (Exception $e) {
        echo 'Exception : ',$e->getMessage(),"<br>";
    }
}
