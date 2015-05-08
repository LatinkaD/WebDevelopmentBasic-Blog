<?php
class AccountsController extends  BaseController {
    private $db;

    public function onInit() {
        $this->db = new AccountModel();
    }

    public function register() {
        if ($this->isPost) {
            $username = $_POST['username'];
            if ($username == null || strlen($username) < 3) {
                $this->addErrorMessage("Username is invalid!");
                $this->redirect("/accounts/register");
            }

            $password = $_POST['password'];
            $isRegistered = $this->db->register($username, $password);
            if ($isRegistered) {
                $_SESSION['username'] = $username;
                $this->addInfoMessage("Successful registration.");
                $this->redirect("home", "index");
            } else {
                $this->addErrorMessage("Registration failed.");
                $this->redirect("accounts", "register");
            }
        }
        $this->renderView(__FUNCTION__);
    }

    public function login() {
        if ($this->isPost) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $isLoggedIn = $this->db->login($username, $password);

            if (!$isLoggedIn) {
                $_SESSION['username'] = $username;
                $this->addInfoMessage("Successful login");
                return $this->redirect("home", "index");
            } else {
                $this->addErrorMessage("Login error");
            }
        }
        $this->renderView(__FUNCTION__);
    }

    public function logout() {
        $this->authorize();
        unset($_SESSION['username']);
        $this->addInfoMessage("Successful logout");
        $this->redirectToUrl("/");
    }
}