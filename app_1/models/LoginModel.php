<?php
class LoginModel
{
    public static function getUsers($user)
    {
        $sql = "SELECT * FROM `users` WHERE `user_name` = :user";

        $stmt = db::$conn->prepare($sql);

        $stmt->bindParam(':user', $user, PDO::PARAM_STR);

        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

}