<?php
class LogoutController
{
    public static function logout()
    {
        session_destroy();
        header("Location: /login");
    }
}