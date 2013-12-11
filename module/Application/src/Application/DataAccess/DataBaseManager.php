<?php

namespace Application\DataAccess;

class DataBaseManager {
    private $conn;

    public function __construct($connection){
        $this->conn = $connection;
    }

    public function insert($model){
        $this->conn->open();
        $this->conn->insert('Users', $model->getParams());
        $this->conn->commit();
        $this->conn->close();
        return 1;
    }

    public function get($id){
        $this->conn->open();
        $user = $this->conn->select('Users', $id);
        $this->conn->close();
        return $user;
    }
} 