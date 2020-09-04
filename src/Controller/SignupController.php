<?php

namespace App\Controller;

use App\model\ConnexionDB;
use App\model\SignUpUser;
use App\Entity\User;

use Exception;

use Symfony\Component\HttpFoundation\Request;

class SignupController
{
    private Request $request;

    public function __construct()
    {
        $this->request = Request::createFromGlobals();
    }

    /**
     * @throws Exception In case of invalid password;
     */

    public function signUp():bool
    {
        try {
            if (is_string($this->request->get('submit'))) {
                if ($this->request->get('pass') === $this->request->get('confirmpass')) {
                    $newUser = new User(
                        $this->request->get('mail'),
                        $this->request->get('pass'),
                        $this->request->get('fullName')
                    );
                    $connexion = new ConnexionDB(
                        'mysql:host=localhost;dbname=online_advisor;charset=UTF8',
                        "root",
                        "root"
                    );
                    $db = $connexion->openCon();
                    header('location: ../../../../OnlineAdvisor/');
                    return SignUpUser::UserInscription($newUser, $db);
                } else {
                    throw new Exception('Mot de passe différents');
                }
            }
        } catch (Exception $e) {
            echo 'Exception : ', $e->getMessage(), "<br>";
        }
        return false;
    }
}
