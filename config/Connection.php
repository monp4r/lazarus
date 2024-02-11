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
     * 
     * IMPORTANT: Replace YOUR_HOST, YOUR_DB_NAME, YOUR_DB_USER and YOUR_DB_PASSWORD with your own data to 
     * connect to the database.
     * 
     * The construction SQL file is in the root of the project. You can use it to create the LAZARUS database.
     * 
     * @return void
     */
    public function __construct()
    {
        try{
            $config_bd = "mysql:host=YOUR_HOST;dbname=YOUR_DB_NAME;charset=utf8mb4";
            $this->db = new PDO($config_bd, "YOUR_DB_NAME", "YOUR_DB_PASSWORD") ;
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
