<?php

class TaskController extends Controller
{
    public function process($params)
    {
        $tasks_qty = TaskModel::getTasksQty();
        $order = 'id';
        
        if(isset($_GET['order']))
        {
            $order = htmlspecialchars($_GET['order']);
        }
        
        if(isset($_GET['page']) && $tasks_qty['quantity'] > TaskModel::MAX_PAGE_ITEMS)
        {
            $current_page = htmlspecialchars($_GET['page']);
            $offset = ($current_page - 1) * TaskModel::MAX_PAGE_ITEMS;
            $tasks = TaskModel::getAllTasks($offset, $order);
        }else{
            $tasks = TaskModel::getAllTasks(0, $order);
        }

        if($tasks_qty['quantity'] > TaskModel::MAX_PAGE_ITEMS)
        {
            if(!isset($current_page))
            {
                $current_page = 1;
            }
            
            $pages = ceil($tasks_qty['quantity'] / TaskModel::MAX_PAGE_ITEMS);
            $this->data['pages'] = $pages;
            $this->data['current_page'] = $current_page;
            $this->data['prev'] = ($current_page - 1 === 0) ? 1 : $current_page - 1;
            $this->data['next'] = ($current_page + 1 > $pages) ? $current_page : $current_page + 1;
        }
                
        $this->head['title'] = 'Tasks list';
        $this->data['tasks'] = $tasks;
        $this->data['isLogged'] = $this->isLogged();
        $this->view = 'index';           
    }
   
}