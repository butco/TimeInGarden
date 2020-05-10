<?php

class Timespent
{

    private $db;
    public function __construct($database)
    {
        $this->db = $database;
    }

    //Start
    public function Start($userId)
    {
        $sql = "INSERT INTO timespent(user_id,start_time) VALUES(:userId,TIMESTAMPADD(HOUR,-2,CURRENT_TIMESTAMP))";
        $stmt = $this->db->prepare($sql);
        $stmt->bindparam(":userId", $userId);
        try {
            $stmt->execute();
            if ($stmt->rowCount() > 0) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    //Has the start button been pressed today?
    public function GetTodaysRecord()
    {
        $sql = "SELECT * FROM timespent WHERE DATE(start_time) = CURDATE() AND stop_time IS NULL";
        $stmt = $this->db->prepare($sql);
        // $stmt->bindparam(":userId", $userId);
        try {
            $stmt->execute();
            if ($stmt->rowCount() > 0) {
                $result = $stmt->fetchAll(PDO::FETCH_OBJ);
                return $result;
            }
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    //Get how many minutes spent today
    public function GetTodaysMinutes()
    {
        $sql = "SELECT SUM(minutes) FROM timespent WHERE DATE(stop_time) = CURDATE() GROUP BY DATE(start_time)";
        $stmt = $this->db->prepare($sql);
        // $stmt->bindparam(":userId", $userId);
        try {
            $stmt->execute();
            if ($stmt->rowCount()) {

                return $stmt->fetchColumn();
            }
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    //Get start_time
    public function GetStartTime()
    {
        $sql = "SELECT TIME(start_time) FROM timespent WHERE DATE(start_time) = CURDATE() AND stop_time IS NULL";
        $stmt = $this->db->prepare($sql);
        // $stmt->bindparam(":userId", $userId);
        try {
            $stmt->execute();
            if ($stmt->rowCount()) {

                return $stmt->fetchColumn();
            }
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    //Stop
    public function Stop($userId)
    {
        $sql = "UPDATE timespent SET stop_time = TIMESTAMPADD(HOUR,-2,CURRENT_TIMESTAMP),minutes=TIMESTAMPDIFF(MINUTE,start_time,stop_time) WHERE DATE(start_time) = CURDATE() AND stop_time IS NULL AND user_id=:userId";
        $stmt = $this->db->prepare($sql);
        $stmt->bindparam(":userId", $userId);
        try {
            $stmt->execute();
            if ($stmt->rowCount() > 0) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
    //Reset
    public function Reset($userId)
    {
        $sql = "DELETE FROM timespent WHERE DATE(start_time) = CURDATE() AND stop_time IS NULL AND user_id=:userId";
        $stmt = $this->db->prepare($sql);
        $stmt->bindparam(":userId", $userId);
        try {
            $stmt->execute();
            if ($stmt->rowCount()) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
}