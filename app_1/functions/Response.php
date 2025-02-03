<?php
class Response
{
    public static function json($data)
    {
        include "./includes/headers.php";
        echo json_encode($data);
    }
}

