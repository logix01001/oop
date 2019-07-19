<?php

class DB {


    protected $_pdo,
              $_table,
              $_primaryKey = 'id',
              $_where;
    

    public function __construct(){

        $this->DBConnect();
    }

    private function DBConnect(){
        $host = Config::get('mysql/host');
        $database = Config::get('mysql/database');
        $username = Config::get('mysql/username');
        $password = Config::get('mysql/password');
        $dsn = "mysql:host={$host};dbname={$database};charset=utf8";
        try{
            $this->_pdo = new PDO($dsn,$username,$password);

            $this->_pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            $this->_pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);
            
        }catch(PDOException $e){
            echo $e->getMessage();

        }



    } 

    public function all(){

        try{   
           
            $stmt = $this->_pdo->query("SELECT * FROM `{$this->_table}`");

            return $stmt->fetchAll();

        }catch(PDOException $e){
            echo $e->getMessage();
        }

    }


    public function insert(Array $datas){
        if(count($datas) > 0 ){

            try{   
            
                $fields = "`" . implode('`,`',array_keys($datas)) . '`';
                $bindValues = ":" . implode(',:',array_keys($datas));
                
                $stmt = $this->_pdo->prepare("INSERT INTO `{$this->_table}`({$fields}) VALUES({$bindValues})");
                
                foreach($datas as $key=>$value){
                    if(is_string($value)){
                        $stmt->bindValue(":{$key}",$value,PDO::PARAM_STR);
                    }else{
                        $stmt->bindValue(":{$key}",$value,PDO::PARAM_INT);
                    }
                   
                }

                $stmt->execute();
                // return $stmt->fetchAll();
    
            }catch(PDOException $e){
                echo $e->getMessage();
            }

        }
       

    }


    public function find($id){

        try{
            $stmt = $this->_pdo->prepare(
            "SELECT * FROM {$this->_table} WHERE `{$this->_primaryKey}` = :id"
            );

            $stmt->bindValue(':id',$id, (is_string($id)) ? PDO::PARAM_STR : PDO::PARAM_INT);

            $stmt->execute();
            return $stmt->fetch();
        }catch(PDOException $e){
            echo $e->getMessage();
        }

    }

    public function updatePK($id,Array $datas){

        //$fields = "`" . implode('`,`',array_keys($datas)) . '`';
        
       // $bindValues = ":" . implode(',:',array_keys($datas));
        $fields = [];
        foreach($datas as $key=>$value){
            $fields[] = "`{$key}` = :{$key}";
            

        }

        $fields = implode(",",$fields);
        
        try{
            $stmt = $this->_pdo->prepare(
            "UPDATE {$this->_table} SET {$fields} WHERE `{$this->_primaryKey}` = :id"
            );

            foreach($datas as $key=>$value){

                $stmt->bindValue(":{$key}",$value, (is_string($value)) ? PDO::PARAM_STR : PDO::PARAM_INT);
            
            }

            $stmt->bindValue(':id',$id, (is_string($id)) ? PDO::PARAM_STR : PDO::PARAM_INT);

            $stmt->execute();
  
        }catch(PDOException $e){
            echo $e->getMessage();
        }

    }


    public function deletePK($id)
    {
        try{
            $stmt = $this->_pdo->prepare(
            "DELETE FROM {$this->_table} WHERE `{$this->_primaryKey}` = :id"
            );

            $stmt->bindValue(':id',$id, (is_string($id)) ? PDO::PARAM_STR : PDO::PARAM_INT);

            $stmt->execute();
            return $stmt->fetch();
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    public function check_unique($table,$field,$value){
        $this->_table = $table;
        $this->_primaryKey = trim($field);
        try{
            $stmt = $this->_pdo->prepare("SELECT * FROM {$this->_table} WHERE `{$this->_primaryKey}` = :value");
            
            $stmt->bindValue(":value",$value,(is_string($value)) ? PDO::PARAM_STR : PDO::PARAM_INT);

            $stmt->execute();

            return $stmt->rowCount();
        }catch(PDOException $e){

            echo $e->getMessage();

        }
    }
}