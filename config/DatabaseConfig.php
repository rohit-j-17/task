<?php
// Database configuration

require_once $_SERVER['DOCUMENT_ROOT'].'/NEC/vendor/autoload.php'; // Composer autoloader

class DatabaseConfig{
    public $global_connection;

    public function __construct(){
        $this->setConfig();
    }

    private function setConfig(){
        // Load environment variables from .env file
        $dotenv = Dotenv\Dotenv::createImmutable($_SERVER['DOCUMENT_ROOT'].'/NEC/');
        $dotenv->load();

        // Database configuration
        define('DB_HOST', $_ENV['DB_HOST']);
        define('DB_PORT', $_ENV['DB_PORT']);
        define('DB_DATABASE', $_ENV['DB_DATABASE']);
        define('DB_USERNAME', $_ENV['DB_USERNAME']);
        define('DB_PASSWORD', $_ENV['DB_PASSWORD']);


        // Now, use these variables to establish a database connection
        try{
            $this->global_connection = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
            // Check the connection
            if ($this->global_connection->connect_error) {
                die("Connection failed: " . $this->global_connection->connect_error);
            }
                return $this->global_connection;
            // Close the connection when done
            $this->global_connection->close();
        }catch(Exception $e){
            die(json_encode($e->getMessage()));
        }
        
    }
}

?>