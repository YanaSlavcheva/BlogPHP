<?php
class UserModel extends BaseModel {

    public function getAll() {
        $statement = self::$db -> query(
            "SELECT * FROM users;");
        return $statement -> fetch_all(MYSQLI_ASSOC);
    }


    public function register($username, $first_name, $last_name, $password) {
        // check if such user exists
        $statement = self::$db -> prepare("SELECT COUNT(user_id) FROM users WHERE username = ?");
        $statement -> bind_param("s", $username);
        $statement -> execute();
        $result = $statement -> get_result() -> fetch_assoc();
        var_dump($result['COUNT(user_id)']);
        if ($result['COUNT(user_id)']){
            return false;
        }

        // validate data
        $pass_hash = password_hash($password, PASSWORD_BCRYPT);

        // add new user to db
        $register_statement = self::$db -> prepare(
            "INSERT INTO `users` (`username`, `first_name`, `last_name`, `password`) VALUES (?, ?, ?, ?)");
        $register_statement -> bind_param("ssss", $username, $first_name, $last_name, $pass_hash);
        $register_statement -> execute();
        return true;
    }

    public function login($username, $password) {
        
        // get user data for this username
        $statement = self::$db -> prepare("SELECT user_id, username, password FROM users WHERE username = ?");
        $statement -> bind_param("s", $username);
        $statement -> execute();
        $result = $statement -> get_result() -> fetch_assoc();

        var_dump($result);
//         check if password is correct
        if (password_verify($password, $result['password'])){
            return true;
        }

        return false;
    }
}