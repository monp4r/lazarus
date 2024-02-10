<?php

/**
 * Clase Connection
 * 
 * Clase que controla la conexión a la base de datos
 */
class Connection
{
    public $db;

    /**
     * Creamos el constructor para iniciar la conexión a la base de datos
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
     * Creamos el método para cerrar la conexión a la base de datos
     * @return void
     */
    public function closeConnection()
    {
        $this->db = null;
    }

} // Fin de la clase