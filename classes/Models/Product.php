<?php

namespace TeachStore\Classes\Models;
use TeachStore\Classes\Db;

class Product extends Db
{
    public function __construct()
    {
        $this->table = "products";
        $this->connect();  
    }

    // override
    public function selectId(int $id , string $fields = "products.*")
    {
        $sql = "SELECT $fields FROM $this->table JOIN cats 
        ON $this->table.cat_id = cats.id
        WHERE $this->table.id=$id";
        $result = mysqli_query($this->conn , $sql);
        return mysqli_fetch_assoc($result);
    }

    public function selectAllWith(string $fields = "*") : array
    {
        $sql = "SELECT $fields FROM $this->table JOIN cats
        ON $this->table.cat_id = cats.id
        ORDER BY $this->table.id DESC";
        $result = mysqli_query($this->conn , $sql);
        return mysqli_fetch_all($result , MYSQLI_ASSOC);
    }

}