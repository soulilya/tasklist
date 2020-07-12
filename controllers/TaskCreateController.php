<?php

class TaskCreateController extends Controller {
    public function process($params)
    {
        
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            $task_form = new TaskForm($_POST);

            if(empty($task_form->errors))
            {
                $task_model = new TaskModel();
                $task_model->user_name = $task_form->user_name;
                $task_model->email = $task_form->email;
                $task_model->task_text = $task_form->task_text;
                $task_model->status = $task_form->status;
                $task_model->create();

                $this->data['form_message'] = 'Task succesfully added!';
            }else{            
                $this->data['form'] = $task_form;
                $this->data['form_message'] = 'Please, correct form data!';
            }
        }
        
        $this->head['title'] = 'Create task';
        $this->view = 'task_create';
        $this->data['isLogged'] = $this->isLogged();
    }
}
