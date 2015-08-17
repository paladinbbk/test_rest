<?php

class Controller_Rest extends Controller
{

    function action_index($id)
    {	
        $model = $this->loadModel('Rest');
        $prod = $model->getProduct(intval($id));
        echo $this->view->render('Rest/json.php' , ['prod' => json_encode($prod , JSON_FORCE_OBJECT)]);
    }
}