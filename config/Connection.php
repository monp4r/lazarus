<?php

/**
 * Class Connection
 * 
 * This class is used to connect to the MySQL database using PDO.
 * Moreover, it has a method to close the connection to the database.
 */
class Connection
{
    public $db;

    /**
     * We create the constructor method to connect to the database
     */
    public function __construct()
    {
        try{
            $config_bd = "mysql:host=localhost;dbname=lazarus;charset=utf8mb4";
            $this->db = new PDO($config_bd, "lazarus", "rWsjts2AZ6U2ZAmg") ;
            $this->db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $ex){
            echo "Error --> : " . $ex->getMessage();
        }
    }
    
    /**
     * Close the connection to the database
     * @return void
     */
    public function closeConnection()
    {
        $this->db = null;
    }

} // End of class Connection
