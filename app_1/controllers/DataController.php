<?php
include "./models/DataModel.php";


class DataController
{
    public static function getData()
    {
        if(Request::checkKeys(['date', 'type']))
        {
            $date = Request::POST('date');
            $type = Request::POST('type');

            $result = DataModel::getAll($date, $type);
            if(count($result) > 0) 
            {
                Response::json($result);
            } else 
            {
                Response::json([]);
            }
        } else 
        {
            Response::json([]);
        }
    }

    public static function addData()
    {
        if(Request::checkKeys(['Add_Price', 'Add_Date', 'Add_Category', 'Add_paimentMethod', 'Add_Discription', 'Add_Type', 'Add_Location']))
        {
            $Add_Price = Request::POST('Add_Price');
            $Add_Date = Request::POST('Add_Date');
            $Add_Category = Request::POST('Add_Category');
            $Add_paimentMethod = Request::POST('Add_paimentMethod');
            $Add_Discription = Request::POST('Add_Discription');
            $user_id = $_SESSION['user_id'];
            $Add_Type = Request::POST('Add_Type');
            $Add_Location = Request::POST('Add_Location');

            $result = DataModel::addData($Add_Price, $Add_Date, $Add_Category, $Add_paimentMethod, $Add_Discription, $user_id, $Add_Type, $Add_Location);

            if($result) {
                Response::json(['success' => true]);
            } else {
                Response::json(['success' => false]);
            }
        } else  {
            Response::json(['success' => false]);
        }
    }

    public static function editData()
    {
        if(Request::checkKeys(['Edit_Price', 'Edit_Date', 'Edit_Category', 'Edit_paimentMethod', 'Edit_Discription', 'Edit_Type', 'data_id', 'Edit_Location']))
        {
            $Edit_Price = Request::POST('Edit_Price');
            $Edit_Date = Request::POST('Edit_Date');
            $Edit_Category = Request::POST('Edit_Category');
            $Edit_paimentMethod = Request::POST('Edit_paimentMethod');
            $Edit_Discription = Request::POST('Edit_Discription');
            $Edit_Type = Request::POST('Edit_Type');
            $user_id = $_SESSION['user_id'];
            $data_id = Request::POST('data_id');
            $Edit_Location = Request::POST('Edit_Location');


            try {
                $stmt = db::$conn->prepare(
                    "UPDATE `data` SET 
                        `category` = '$Edit_Category',
                        `description` = '$Edit_Discription ',
                        `price` = '$Edit_Price',
                        `type` = '$Edit_Type',
                        `payment_method` = '$Edit_paimentMethod',
                        `user_id` = '$user_id',
                        `location` = '$Edit_Location',
                        `date` = '$Edit_Date'
                    WHERE `data_id` = '$data_id';");

                    $result = $stmt->execute();
                    if($result) {
                        Response::json(['success' => true]);
                    } else {
                        Response::json(['success' => false]);
                    }
                }
            catch (PDOException $e) {
                Response::json(['success' => false]);
            }
            

        } else  {
            Response::json(['success' => false]);
        }
    }

    public static function removeData()
    {
        if(Request::checkKeys(['id']))
        {
            $id = Request::POST('id');

            try {
                $query = "DELETE FROM `data` WHERE `data_id`=:id";

                $stmt = db::$conn->prepare($query);

                $stmt->bindParam(':id', $id, PDO::PARAM_INT);

                if ($stmt->execute()) {
                    Response::json(['success' => true]);
                } else {
                    Response::json(['success' => false]);
                }
            }
            catch (PDOException $e) {
                Response::json(['success' => false]);
            }
            
        } else  {
            Response::json(['success' => false]);
        }
    }

    public static function cardsTotal() {

        if(Request::checkKeys(['date']))
        {
            $date = Request::POST('date');
            
            $result = DataModel::cardsTotal($date);

            Response::json([$result]);

            // if(count($result) > 0) 
            // {
            //     Response::json($result);
            // } else 
            // {
            //     Response::json([]);
            // }
        } else 
        {
            Response::json([]);
        }
    }

    public static function getRecettes()
    {
        if(Request::checkKeys(['type', 'date']))
        {
            $type = Request::POST('type');
            $date = Request::POST('date');

            $query = "SELECT category, price FROM `data` WHERE `type`='$type' AND MONTH(`date`)=MONTH('$date') AND YEAR(date) = YEAR('$date') GROUP BY category ORDER BY price DESC";
            $result = db::select($query);
            
            if(count($result) > 0) 
            {
                Response::json($result);
            } else 
            {
                Response::json([]);
            }
                
        }
    }

    public static function locationTotal()
    {
        if(Request::checkKeys(['date']))
        {
            $date = Request::POST('date');

            $query = "SELECT location, COALESCE(SUM(price), 0) AS `total` FROM `data` WHERE MONTH(`date`)=MONTH('$date') AND YEAR(date) = YEAR('$date') GROUP BY `location` ORDER BY `price` DESC";
            $result = db::select($query);
            
            if(count($result) > 0) 
            {
                Response::json($result);
            } else 
            {
                Response::json([]);
            }
                
        } else {
            Response::json([]);
        }
    }


    public static function Charts()
    {
        if(Request::checkKeys(['date']))
        {
            $date = Request::POST('date');
            $filter = "MONTH(`date`)=MONTH('$date') AND YEAR(date) = YEAR('$date') GROUP BY `location` ORDER BY `price` DESC";
            $rct = db::select("SELECT location, COALESCE(SUM(price), 0) AS `total` FROM `data` WHERE $filter");

            $result = [
                "rct" => $rct,
            ];
            Response::json($result);
        } else {
            Response::json([]);

        }
    }
}