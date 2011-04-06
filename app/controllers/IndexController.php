<?php

include_once("../app/models/LoginModel.php");
include_once("../app/models/BeerFundModel.php");
include_once("../app/views/LoginView.php");
include_once("../app/views/BeerFundView.php");

class IndexController {

    function IndexController() {
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

    function tryingToAuthenticate() {
        if(isset($_POST["user"]) && isset($_POST["password"])) {
            return true;
        } else {
            return false;
        }
    }

    function tryingToLogout() {
        if(isset($_GET['logout'])) {
            return true;
        } else {
            return false;
        }
    }
    
    function invoke() {
        if(!$this->isAuthenticated()) {
            if(!$this->tryingToAuthenticate()) {
                $this->loginView->display();
            } else {
                $result = $this->loginModel->authenticate($_POST["user"], $_POST["password"]);
            }
        }
        if($this->tryingToLogout()) {
            $this->loginModel->logout();
        }
        if($this->isAuthenticated()) {
            $this->beerfundView->display();
        }
        
    }

}

?>
