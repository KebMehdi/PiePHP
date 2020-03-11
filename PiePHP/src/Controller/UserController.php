<?php
namespace Controller;
use Core\Controller;
use Model\UserModel;

class UserController extends Controller {
    public function addAction () {
        echo 'test user Controller' . PHP_EOL;
    } 
    public function homeAction () {
        $this->render('home');
    }
    public function loginAction () {
        $this->render('login');
        $mail = $_POST['email'];
        $pass = $_POST['password'];
        if (!empty($mail) && !empty($pass)) {
            $userLogin = new UserModel;
            if ($userLogin->check($mail, $pass) == true) {
                session_start();
                $_SESSION['email'] = $mail;
                $this->render('show');
            } else {
                echo "Compte inexistant" . PHP_EOL;
            }
        }
    }
    public function registerAction () {
        $this->render('register');
        $mail = $_POST['email'];
        $pass = $_POST['password'];
        if (!empty($mail) && !empty($pass)) {
            $userRegister = new UserModel;
            if ($userRegister->check($mail, $pass) == false) {
                $userRegister->save($mail, $pass);
                echo 'Votre compte à bien était créer' . PHP_EOL;
            } else {
                echo 'Ce compte existe déjà' . PHP_EOL;
            }
        }
    }
    public function crudAction () {
        $this->render('crud');
    }
    public function readallAction () {
        $this->render('readall');
        $user = new UserModel;
        $all = $user->readall();
        foreach($all as $value) {
            echo $value['email'] . PHP_EOL;
        }
    }
    public function updateAction () {
        $this->render('update');
        session_start();
        $update = new UserModel;
        $mail = $_POST['editemail'];
        $id = $update->id($_SESSION['email']);
        if ($_POST['submit'] == NULL) {
            $update->update($mail, $id[0]);
            session_destroy();
            echo 'changement effectuer';
            $this->render('login');
        }
    }
    public function deleteAction () {
        $this->render('delete');
        session_start();
        $delete = new UserModel;
        $id = $delete->id($_SESSION['email']);
        $delete->delete($id[0]);
    }
}