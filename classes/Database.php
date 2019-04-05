<?php

class Database {

    private $hostdb = "localhost";
    private $userdb = "root";
    private $passdb = "";
    private $namedb = "projectdevxpart";
    public  $pdo;

    public function __construct() {
        if (!isset($this->pdo)) {
            try {
                $link = new PDO("mysql:host=" . $this->hostdb . "; dbname=" . $this->namedb, $this->userdb, $this->passdb);
                $link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $link->exec("SET CHARACTER SET utf8");
                $this->pdo = $link;
            } catch (PDOException $exc) {
                die("Field to Connect with Database" . $exc->getMessage());
            }
        }
    }

    /*
    !---------------------------------------
    ! Prepare Method
    !---------------------------------------
    */
    public function prepare($sql)
    {
        $stmt =  $this->pdo->prepare($sql);
        return $stmt;
    }


    /*
    !---------------------------------------
    ! Count Row
    !---------------------------------------
    */
    public function countRow($sql)
    {
        //select * from table
        $stmt =  $this->pdo->prepare($sql);
        $stmt->execute();
        $row  = $stmt->rowCount();
        return $row;   
    }

}
