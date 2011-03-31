<?php

include_once("../app/models/LoginModel.php");
include_once("../app/models/BeerFundModel.php");
include_once("../app/views/LoginView.php");
include_once("../app/views/BeerFundView.php");

class IndexController {

    function IndexController() {
        echo "constructing controller\n";
        $this->loginModel = new LoginModel();
        $this->beerfundModel = new BeerFundModel();
        $this->loginView = new LoginView();
        $this->beerfundView = new BeerFundView();
    }

    function init() {
        echo "init\n";
    }

    function login() {
        echo "login\n";
        $this->loginModel->login();

    }

    function update() {
        echo "update\n";
        $this->beerfundModel->update();
    }

    function logout() {
        echo "logout\n";
        $this->loginModel->logout();
    }

    function isAuthenticated() {
        if(isset($_SESSION['auth'])) {
            return true;
        } else {
            return false;
        }
    }

    function tryAuthenticate() {
        if(isset($_POST["user"]) && isset($_POST["password"])) {
            var $result = $this->loginModel->authenticate();
            
        }
    }
    
    function invoke() {
        if(!$this->isAuthenticated()) {
            if(!$this->tryAuthenticate()) {
                $this->loginView->display();
            } else {
                if($this->loginModel->authenticate()) {
                    $_SESSION['auth'] = 'true';
                }
            }
        }
        if(isset($_GET['logout'])) {
            session_destroy();
        }
        if($this->isAuthenticated()) {
            $this->beerfundView->display();
        }
        
    }

}

?>
