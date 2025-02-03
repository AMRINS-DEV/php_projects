<?php
class DataModel
{
    public static function getAll($date, $type)
    {
        $result = db::select("SELECT * FROM `data` WHERE type='$type' AND MONTH(date)=MONTH('$date') AND YEAR(date)=YEAR('$date') ORDER BY `date` DESC, `data_id` DESC");
        return $result;
    }

    public static function getTotal($date, $type)
    {
        $result = db::select("SELECT COALESCE(SUM(`price`), 0) FROM `data` WHERE type='$type' AND MONTH(date)=MONTH('$date') AND YEAR(date)=YEAR('$date')");
        return $result;
    }

    public static function addData($Add_Price, $Add_Date, $Add_Category, $Add_paimentMethod, $Add_Discription, $user_id, $Add_Type, $Add_Location)
    {
        try {
            $stmt = db::$conn->prepare(
                "INSERT 
                INTO data 
                    (`category`, `description`, `price`, `type`, `payment_method`, `user_id`, `location`, `date`) 
                VALUES
                    (:Add_Category, :Add_Discription, :Add_Price, :Add_Type, :Add_paimentMethod, :user_id, :Add_Location, :Add_Date)
            "
            );

            $stmt->bindParam(':Add_Category', $Add_Category, PDO::PARAM_STR);
            $stmt->bindParam(':Add_Discription', $Add_Discription, PDO::PARAM_STR);
            $stmt->bindParam(':Add_Price', $Add_Price, PDO::PARAM_STR);
            $stmt->bindParam(':Add_Type', $Add_Type, PDO::PARAM_STR);
            $stmt->bindParam(':Add_paimentMethod', $Add_paimentMethod, PDO::PARAM_STR);
            $stmt->bindParam(':user_id', $user_id, PDO::PARAM_STR);
            $stmt->bindParam(':Add_Location', $Add_Location, PDO::PARAM_STR);
            $stmt->bindParam(':Add_Date', $Add_Date, PDO::PARAM_STR);

            $result = $stmt->execute();

            if ($result) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            return false;
        }
    }

    public static function cardsTotal($date)
    {

        $rct = [
            "thismonth" => db::select("SELECT COALESCE(SUM(`price`), 0) AS `total` FROM `data` WHERE `type`='rct' AND MONTH(date) = MONTH('$date') AND YEAR(date) = YEAR('$date')")[0],
            "lastmonth" => db::select("SELECT COALESCE(SUM(`price`), 0) AS `total` FROM `data` WHERE `type`='rct' AND YEAR(date) = YEAR('$date' - INTERVAL 1 MONTH) AND MONTH(date) = MONTH('$date' - INTERVAL 1 MONTH)")[0]
        ];
        $cf = [
            "thismonth" => db::select("SELECT COALESCE(SUM(`price`), 0) AS `total` FROM `data` WHERE `type`='cf' AND MONTH(date) = MONTH('$date') AND YEAR(date) = YEAR('$date')")[0],
            "lastmonth" => db::select("SELECT COALESCE(SUM(`price`), 0) AS `total` FROM `data` WHERE `type`='cf' AND YEAR(date) = YEAR('$date' - INTERVAL 1 MONTH) AND MONTH(date) = MONTH('$date' - INTERVAL 1 MONTH)")[0]
        ];
        $cv = [
            "thismonth" => db::select("SELECT COALESCE(SUM(`price`), 0) AS `total` FROM `data` WHERE `type`='cv' AND MONTH(date) = MONTH('$date') AND YEAR(date) = YEAR('$date')")[0],
            "lastmonth" => db::select("SELECT COALESCE(SUM(`price`), 0) AS `total` FROM `data` WHERE `type`='cv' AND YEAR(date) = YEAR('$date' - INTERVAL 1 MONTH) AND MONTH(date) = MONTH('$date' - INTERVAL 1 MONTH)")[0]
        ];

        return ["rct" => $rct, "cf" => $cf,"cv" => $cv];
    }
}
