<?php

class Model_Rest extends Model
{
    public function getProduct($id)
    {
        $conn = $this->ConnectDB();
        $sql = "SELECT product.name as name , category.name as category FROM product
                LEFT JOIN category
                ON category.id = product.category_id
                WHERE product.id = $id";
        $res = $conn->query($sql, PDO::FETCH_ASSOC)->fetch();
        if(!$res){
            return ['error'=> 'wrong id'];
        }
        
        $sql = "SELECT path FROM photo
                WHERE product_id = $id";
        $photo = $conn->query($sql, PDO::FETCH_NUM)->fetchAll(PDO::FETCH_COLUMN, 0);
        if($photo){
            $res['photo'] = $photo;
        }
        return $res;
    }
}
