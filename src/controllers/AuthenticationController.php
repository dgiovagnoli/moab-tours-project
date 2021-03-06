<?php
namespace Project\controllers;

use Project\models\User;
use Project\Validation\Validator;
use duncan3dc\Laravel\BladeInstance;
use Project\auth\LoggedIn;

class AuthenticationController extends BaseController
{

    /**
     *
     * Shows the login page
     * @return html
     */
    public function getShowLoginPage()
    {
        echo $this->blade->render("login", [
            'signer' => $this->signer,
        ]);
    }

    public function postShowLoginPage()
    {

        if (!$this->signer->validateSignature($_POST['_token'])) {
            header('HTTP/1.0 400 Bad Request');
            exit;
        }

        $okay = true;
        $email = $_REQUEST['email'];
        $password = $_REQUEST['password'];

        //look up the user
        $user = User::where('email', '=', $email)
            ->first();

        if ($user != null) {
            // validate credentials
            if (! password_verify($password, $user->password)) {
                $okay = false;
            }
        } else {
            $okay = false;
        }

        if ($okay) {
          $_SESSION['user'] = $user;
          if ($user->active == 0){
             $okay = false;
           }
        }

        if ($okay) {
            header("Location: /");
            exit();
        } else {
            $_SESSION['msg'] = ["Invalid login!"];
            echo $this->blade->render("login", [
                'signer' => $this->signer,
            ]);
            unset($_SESSION['msg']);
            exit();
        }
    }


    public function getLogout()
    {
        unset($_SESSION['user']);
        session_destroy();
        header("Location: /login");
        exit();
    }

}
