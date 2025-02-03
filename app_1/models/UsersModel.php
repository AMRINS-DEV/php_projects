<?php
class UsersModel
{
    public static function GetAll()
    {
        $query = "SELECT `user_id`, `user_name`, `user_access` FROM `users`;";

        $stmt = db::$conn->prepare($query);


        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function AddNew($add_username, $add_mot_de_pass, $add_access)
    {
        $query = "INSERT INTO `users`(`user_name`, `user_password`, `user_access`) VALUES ('$add_username','$add_mot_de_pass','$add_access')";
        $stmt = db::$conn->prepare($query);

        return $stmt->execute();
    }

    public static function Update($userid, $colname, $newValue)
    {
        $query = "UPDATE `users` SET `$colname`='$newValue' WHERE `user_id`='$userid'";
        $stmt = db::$conn->prepare($query);

        return $stmt->execute();
    }
}
