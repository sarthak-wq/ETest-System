<?php
class DbConfig 
{    
    private $_host = '50.62.209.74';
    private $_username = 'Itnsystems_estn';
    private $_password = 'h32kL*5z';
    private $_database = 'Itnsystems_estn';
    
    protected $connection;
    
    public function __construct()
    {
        if (!isset($this->connection)) {
            
            $this->connection = new mysqli($this->_host, $this->_username, $this->_password, $this->_database);
            
            if (!$this->connection) {
                echo 'Cannot connect to database server';
                exit;
            }            
        }    
        
        return $this->connection;
    }
}
?>
