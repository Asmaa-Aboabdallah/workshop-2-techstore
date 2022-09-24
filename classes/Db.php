<?php

namespace TeachStore\Classes;

abstract class Db // For inheritance only
{
    protected $conn;
    protected $table;

    public function connect()
    {
        $this->conn = mysqli_connect(DB_SERVERNAME, DB_USERNAME , DB_PASSWORD , DB_NAME);
    }

    public function selectAll(string $fields = "*") : array
    {
        $sql = "SELECT $fields FROM $this->table";
        $result = mysqli_query($this->conn , $sql);
        return mysqli_fetch_all($result , MYSQLI_ASSOC);
    }

    public function selectId(int $id , string $fields = "*")
    {
        $sql = "SELECT $fields FROM $this->table WHERE id=$id";
        $result = mysqli_query($this->conn , $sql);
        return mysqli_fetch_assoc($result);
    }

    public function selectWhere($conds , string $fields = "*") : array
    {
        $sql = "SELECT $fields FROM $this->table WHERE $conds";
        $result = mysqli_query($this->conn , $sql);
        return mysqli_fetch_all($result , MYSQLI_ASSOC);
    }

    public function getCount() : int
    {
        $sql = "SELECT COUNT(*) AS cnt FROM $this->table";
        $result = mysqli_query($this->conn , $sql);
        return mysqli_fetch_assoc($result)['cnt'];
    }



    public function insert(string $fields, string $values) : bool
    {
        $sql = "INSERT INTO $this->table ($fields) VALUES ($values)";
        return mysqli_query($this->conn , $sql);
    }

    public function insertAndGetId(string $fields, string $values) 
    {
        $sql = "INSERT INTO $this->table ($fields) VALUES ($values)";
        mysqli_query($this->conn , $sql);
        return mysqli_insert_id($this->conn);
    }
    

    public function update(string $set , $id) : bool
    {
        $sql = "UPDATE $this->table SET $set WHERE id=$id";
        return mysqli_query($this->conn , $sql);
    }


    public function delete($id) : bool
    {
        $sql = "DELETE FROM $this->table WHERE id=$id";
        return mysqli_query($this->conn , $sql);
    }

}