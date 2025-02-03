<?php
include "./models/LoginModel.php";

class LoginController
{
    public static function index()
    {
        include "./views/login.php";
    }

    public static function login()
    {
        if (Request::checkKeys(['user_email', 'user_password'])) 
        {
            $user_email = Request::POST('user_email');
            $password = Request::POST('user_password');

            $result = self::getUsers($user_email);
            
            if($result && password_verify($password, $result['user_password']))
            {
                $_SESSION['user_id'] = $result['user_id'];
                $_SESSION['user_email'] = $result['user_email'];
                $_SESSION['user_access'] = $result['user_access'];

                Response::json(['success' => true]);
            } else 
            {
                Response::json(['success' => false]);
            }

        } else 
        {
            Response::json(['success' => false]);
        }
    }

    public static function getUsers($user_email)
    {
        $sql = "SELECT * FROM `logins` WHERE `user_email` = :user_email";

        $stmt = db::$conn->prepare($sql);

        $stmt->bindParam(':user_email', $user_email, PDO::PARAM_STR);

        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

}
