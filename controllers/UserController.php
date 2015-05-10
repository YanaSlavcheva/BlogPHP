<?php

class UserController extends BaseController {
    private $userModel;

    protected function onInit() {
        $this -> title = 'User';
        $this -> userModel = new UserModel();
    }

    public function index() {
        $this -> users = $this -> userModel -> getAll();
    }



    public function register() {
        if ($this -> isPost()){
            // get username and password
            $username = $_POST['username'];
            $first_name = $_POST['first_name'];
            $last_name = $_POST['last_name'];
            $password = $_POST['password'];
            // register user
            $isRegistered = $this -> userModel -> register($username, $first_name, $last_name, $password);

            // redirect user
            if ($isRegistered){
                $this -> addInfoMessage ("Registration Successful.");
                $this -> redirect("posts");
            }
            else {
                $this -> addErrorMessage("Registration Failed.");
            }
        }
        $this -> renderView(__FUNCTION__);
    }





//    public function register() {
//        if ($this -> isPost()){
//
//            // get username and password
//            $username = $_POST['username'];
//            var_dump($username);
//            $first_name = $_POST['first_name'];
//            $last_name = $_POST['last_name'];
//            $password = $_POST['password'];
//
//            // validate data
//            if ($username = null || strlen($username) < 3){
//                $this -> addErrorMessage("Invalid Username.");
//                $this -> redirect("user/register");
//            }
//
//            if ($first_name = null || strlen($first_name) < 3){
//                $this -> addErrorMessage("Invalid First Name.");
//                $this -> redirect("user/register");
//            }
//
//            if ($last_name = null || strlen($last_name) < 3){
//                $this -> addErrorMessage("Invalid Last Name.");
//                $this -> redirect("user/register");
//            }
//
//            if ($password = null || strlen($password) < 3){
//                $this -> addErrorMessage("Invalid Password.");
//                $this -> redirect("user/register");
//            }
//
//            // register user
//            $isRegistered = $this -> userModel -> register($username, $first_name, $last_name, $password);
//
//            // redirect user
//            if ($isRegistered){
//                $this -> addInfoMessage ("Registration Successful.");
//                $this -> redirect("user/login");
//            }
//            else {
//                $this -> addErrorMessage("Registration Failed.");
//            }
//        }
//
//        $this -> renderView(__FUNCTION__);
//    }

    public function login() {
        if ($this -> isPost()){
            $username = $_POST['username'];
            $password = $_POST['password'];

            $isLoggedIn = $this -> userModel -> login($username, $password);
            if ($isLoggedIn){
                $this -> addInfoMessage ("Login Successful.");
                $this -> redirect("posts");
            }
            else {
                $this -> addErrorMessage("Login Failed.");
                $this -> redirect("user/login");
            }
        }

        $this -> renderView(__FUNCTION__);
    }
}