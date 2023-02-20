<?php

require "Connect.php";

class Branch extends Connect
{
    private function insert($data)
    {
        $query = "INSERT INTO branches (name, branch, host, status) VALUES (:name, :branch, :host, :status)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":name", $data["name"], PDO::PARAM_STR);
        $stmt->bindParam(":branch", $data["branch"], PDO::PARAM_STR);
        $stmt->bindParam(":host", $data["host"], PDO::PARAM_STR);
        $stmt->bindParam(":status", $data["status"], PDO::PARAM_STR);
        $stmt->execute();
        return $this->conn->lastInsertId();
    }

    private function update($data)
    {
        $query = "UPDATE branches SET status = :status WHERE name = :name";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":status", $data["status"], PDO::PARAM_STR);
        $stmt->bindParam(":name", $data["name"], PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->rowCount();
    }

    private function nameVerify($name)
    {
        $query = "SELECT * FROM branches WHERE name = :name";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":name", $name, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->rowCount() > 0 ? true : false;
    }

    public function save($data)
    {
        if (!$this->nameVerify($data["name"])) {
            $this->insert($data);
            return true;
        } else {
            $this->update($data);
            return true;
        }
        return false;
    }
}
