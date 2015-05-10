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
}