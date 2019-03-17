<?php
/**
     * Setup Database PDO Config
     * prepare sql stmt func
     * Bind Data values func 
     * Exceut Data func and return it
     * Fetch all data func, Exceut Data and return it
     * Fectch Single Record, Exceut Data and return it
     * Get Row Count and return count
 */
 class Database{
     protected $dbname = dbname;
     protected $password = password;
     protected $user = user;
     protected $host = host;
     protected $charset = charset;

     protected $stmt;
     protected $dbh;

     public function __construct(){
        $dsn = 'mysql:host='.$this->host.';dbname='.$this->dbname.';charset='.$this->charset;
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8'
        ];

        try{    
            $this->dbh = new PDO($dsn,$this->user,$this->password,$options);
        }catch(PDOException $e){
            die('Faild To Connect '.$e->getMessage(). '<br> at line '. $e->getLine() );
        }
     }

     //Prepare Sql stmt
     public function query($sql){
         $this->stmt = $this->dbh->prepare($sql);
     }
     
     //bind Values
     public function bind($params, $values, $type=null ){
        if(is_null($type)){
            switch($values){
                case is_int($values):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($values):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($values):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    $type = PDO::PARAM_STR;
                    break;

            }
        }
        $this->stmt->bindValue($params,$values,$type);
     }

     //Execute Data
     public function execute(){
         return $this->stmt->execute();
     }

     //Fetch All Data
     public function resultSet(){
         $this->execute();
         return $this->stmt->fetchAll(PDO::FETCH_OBJ);
     }

    //Fetch Single Record
    public function single(){
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_OBJ);
    }

    // Get row Counts 
    public function rowCount(){
        return $this->stmt->rowCount();
    }
 }