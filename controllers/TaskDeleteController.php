<?php

class TaskDeleteController extends Controller {
    public function process($params)
    {
        if(!$this->isLogged())
        {
            $this->redirect('login');
        }
        
        if ($_SERVER['REQUEST_METHOD'] == 'GET'){
            $id = htmlspecialchars($_GET['id']);
            if(is_numeric($id))
            {
                $task = TaskModel::getTaskById($id);
                if(empty($task))
                {
                    $this->redirect ('error');
                }
                
                TaskModel::deleteById($id);
                
                $this->redirect('/');

            }else{
                $this->redirect ('error');
            }
        }
    }
}
