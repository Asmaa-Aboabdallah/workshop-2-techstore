<?php

namespace TeachStore\Classes\Models;
use TeachStore\Classes\Db;

class OrderDetail extends Db
{
    public function __construct()
    {
        $this->table = "order_details";
        $this->connect();  
    }

    public function selectWithProducts($orderid)
    {
        $sql = "SELECT quantity, name , price FROM $this->table JOIN products
            ON  $this->table.product_id = products.id
            WHERE order_id = $orderid";
        $result = mysqli_query($this->conn , $sql);
        return mysqli_fetch_all($result , MYSQLI_ASSOC);

    }

}