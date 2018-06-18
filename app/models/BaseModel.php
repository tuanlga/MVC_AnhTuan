<?php 

/**
 * summary
 */
class BaseModel
{
    public $connect;
    public function __construct()
    {
        try {
    		$this->connect = new PDO("mysql:host=127.0.0.1; dbname=hvcg_demo; charset=utf8", "root", "");
        	
        } catch (PDOException $e) {
        	var_dump($e->getMessage());die;
        }
    }


    public function update(){
        $this->queryBuilder = "update $this->tableName set ";

        foreach ($this->columns as $col) {
            if($this->{$col} == null){
                continue;
            }
            $this->queryBuilder .= " $col = '".$this->$col . "', ";
        }
        $this->queryBuilder = rtrim($this->queryBuilder, ", ");

        $this->queryBuilder .= " where id = $this->id";

        // var_dump($this->queryBuilder);die;
        $stmt = $this->connect->prepare($this->queryBuilder);
        try {
            $stmt->execute();
            return $this;
        } catch (PDOException $e) {
            var_dump($e->getMessage());die;
        }
    }

    public function insert(){

        $this->queryBuilder = "insert into $this->tableName (";
        foreach ($this->columns as $col) {
            if($this->{$col} == null){
                continue;
            }
            $this->queryBuilder .= "$col, ";
        }
        $this->queryBuilder = rtrim($this->queryBuilder, ", ");
        $this->queryBuilder .= ") values ( ";
        foreach ($this->columns as $col) {
            if($this->{$col} == null){
                continue;
            }
            $this->queryBuilder .= "'" . $this->{$col} ."', ";
        }
        $this->queryBuilder = rtrim($this->queryBuilder, ", ");
        $this->queryBuilder .= ")";
        $stmt = $this->connect->prepare($this->queryBuilder);
        try{

            $stmt->execute();
            $this->id = $this->connect->lastInsertId();
            return $this;
        }catch(Exception $ex){
            var_dump($ex->getMessage());die;
        }
        
    }


    public static function all(){
        $model = new static();
        $sql = "SELECT * FROM $model->tableName";
        $stmt = $model->connect->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_CLASS, get_class($model));
        return $result;
    }
    public static function find($id){
        $model = new static();
        $sql =" SELECT * FROM $model->tableName WHERE id = $id";
        $stmt = $model->connect->prepare($sql);
        $stmt->execute();
        // var_dump($sql);die;
        $result = $stmt->fetchAll(PDO::FETCH_CLASS, get_class($model));
        if(count($result)>0) return $result[0];
        return null;
    }
    public static function where($arr = []){
        $model = new static();
        $model->queryBuilder =" SELECT * FROM $model->tableName WHERE ";
        // var_dump($sql->queryBuilder);die;
        if(count($arr) == 2){
            $model->queryBuilder .= "$arr[0] = '$arr[1]'";
        }
        if(count($arr) == 3){
            $model->queryBuilder .= "$arr[0] $arr[1] '$arr[2]' ";
        }
        // var_dump($sql->queryBuilder);die;

        return $model;
    }

    public function andWhere($arr = []){
        $this->queryBuilder =" and where ";
        // var_dump($sql->queryBuilder);die;
        if(count($arr) == 2){
            $this->queryBuilder .= "$arr[0] = '$arr[1]'";
        }
        if(count($arr) == 3){
            $this->queryBuilder .= "$arr[0] $arr[1] '$arr[2]' ";
        }

        return $this;
    }

    public function orWhere($arr = []){
        $this->queryBuilder =" or where ";
        // var_dump($sql->queryBuilder);die;
        if(count($arr) == 2){
            $sql->queryBuilder .= "$arr[0] = '$arr[1]'";
        }
        if(count($arr) == 3){
            $sql->queryBuilder .= "$arr[0] $arr[1] '$arr[2]' ";
        }

        return $this;
    }

    public function get(){
        $stmt = $this->connect->prepare($this->queryBuilder);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_CLASS, get_class($this));
        return $result;
    }

    public function delete(){
        $this->queryBuilder = "DELETE FROM $this->tableName where id = $this->id";
        $stmt = $this->connect->prepare($this->queryBuilder);
        try {
            $stmt->execute();
        } catch (PDOException $e) {
            var_dump($e->getMessage());die;
        }
        
    }
}
