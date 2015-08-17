<?php

class Model_Entity extends Model_Crud
{
    private $entity;
    
    function __construct($params)
    {
        try {
            $this->entity = $this->checkEntity($params['entity']);
        } catch (PDOException $e) {
            echo 'Не корректная сущность : ' . $e->getMessage();
        }
    }

    public function checkEntity($entity)
    {
        return array_key_exists($entity, $this->getDashboard())?$entity:false;
    }

    public function getList()
    {
        $method = 'getList'.ucfirst($this->entity);
        return $this->$method();
    }

    public function getForm()
    {
        $method = 'getForm'.ucfirst($this->entity);
        return $this->$method();
    }
    
    public function getEntity()
    {
        return $this->entity;
    }
    
    public function getData()
    {
        $conn = $this->ConnectDB();
        $sql = "SELECT * FROM $this->entity";
        return $conn->query($sql, PDO::FETCH_ASSOC);
    }
    
    public function getItem($id)
    {
        if(!$id){
            return $this->getForm();
        }
        $conn = $this->ConnectDB();
        $sql = "SELECT * FROM $this->entity WHERE id = $id";
        $res = $conn->query($sql, PDO::FETCH_ASSOC)->fetch();
        return $res;
    }
    
    public function getNameById($id)
    {
        $conn = $this->ConnectDB();
        $sql = "SELECT name FROM $this->entity WHERE id = $id";
        $res = $conn->query($sql)->fetch();
        return $res[0];
    }
    
    public function getSelectData()
    {
        $conn = $this->ConnectDB();
        $sql = "SELECT id , name FROM $this->entity";
        $res = $conn->query($sql, PDO::FETCH_ASSOC);
        return $res;
    }
    
    public function removeItem($id)
    {
        $conn = $this->ConnectDB();
        $sql = "DELETE FROM $this->entity WHERE id = $id";
        return $conn->exec($sql);
    }
    
    public function saveItem($id)
    {  
        $fields = array_keys($this->getForm());
        $fields_str = implode(",", $fields );
        $data = [];
        foreach($fields as $f){
            $data[]="'".$this->checkUserData($_POST[$f])."'";
        }
        $data_str = implode(",", $data );
        $conn = $this->ConnectDB();
       
        $sql = "REPLACE INTO $this->entity ($fields_str) VALUES ($data_str)";
        return $conn->exec($sql);
    } 
    
    
}
