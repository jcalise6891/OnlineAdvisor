<?php

use App\Connexion;

    $connexion = new Connexion("mysql:host=localhost;dbname=online_advisor","root","root");
    $db = $connexion->openCon();
    if($db){
        echo "Connexion success";
    }
    else{
        echo "Connexion failed";
    }
