<?php

class TaskEditController extends Controller{
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

                $this->head['title'] = 'Task Edit #' . $id;
                $this->data['form'] = new TaskForm($task);
                $this->data['isLogged'] = $this->isLogged();
                $this->view = 'task_edit';
            }else{
                $this->redirect ('error');
            }
        }
        
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            $task_form = new TaskForm($_POST);

            if(empty($task_form->errors))
            {
                $task_model = new TaskModel();
                $task_model->id = $task_form->id;
                $task_model->user_name = $task_form->user_name;
                $task_model->email = $task_form->email;
                $task_model->task_text = $task_form->task_text;
                $task_model->status = $task_form->status;
                $task_model->update();

                $this->data['form_message'] = 'Task succesfully updated!';
            }else{            
                $this->data['form'] = $task_form;
                $this->data['form_message'] = 'Please, correct form data!';
            }
            
            $this->head['title'] = 'Task Edit #' . $task_form->id;
            $this->data['form'] = $task_form;
            $this->data['isLogged'] = $this->isLogged();
            $this->view = 'task_edit';
        }
    }
}
