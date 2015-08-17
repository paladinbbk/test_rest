<?php

class Controller_Crud extends Controller
{

    function action_index()
    {	
        $model_crud = $this->loadModel('Crud');
        echo $this->view->render('Crud/dashboard.php' , ['list' => $model_crud->getDashboard()]);
    }

    function action_list($entity)
    {	
        $model = $this->loadModel('Entity' , ['entity' => $entity]);
        echo $this->view->render('Crud/list.php' , ['entity' => $model->getEntity(),
                                                    'list' => $model->getList(),
                                                    'items' => $model->getData()
                                                    ]);
    }

    function action_list_field($item, $field)
    {
        if(isset($item[$field])){
            echo $item[$field];
        } else {
            $model = $this->loadModel('Entity' , ['entity' => $field]);
            echo $model->getNameById(intval($item[$field.'_id']));
        }
    }
        
    function action_remove($entity,$id)
    {	
        $model = $this->loadModel('Entity' , ['entity' => $entity]);
        $model->removeItem(intval($id)); 
        $this->stopAndRedirect($this->router->generate('adminList',['entity' => $model->getEntity()]));
    }
        
    function action_form($entity,$id)
    {	
        $model = $this->loadModel('Entity' , ['entity' => $entity]);
        echo $this->view->render('Crud/form.php' , ['entity' => $model->getEntity(),
                                                    'list' => $model->getList(),
                                                    'item' => $model->getItem(intval($id))
                                                    ]);
    }
    
    function action_form_field($item, $field)
    {
        if(isset($item[$field])){
            echo $this->view->render('Crud/form_input.php' , ['field' => $field,'value' => $item[$field] ]);
        } else {
            $model = $this->loadModel('Entity' , ['entity' => $field]); 
            echo $this->view->render('Crud/form_select.php', ['field' => $field.'_id',
                                                              'items' => $model->getSelectData(),
                                                              'value' => $item[$field.'_id']
                                                                ]);
        }
    }
        
    function action_save($entity,$id=0)
    {	
        $model = $this->loadModel('Entity' , ['entity' => $entity]);
        $model->saveItem(intval($id));
        $this->stopAndRedirect($this->router->generate('adminList',['entity' => $model->getEntity()]));
    }  
        
}