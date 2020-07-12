<?php
class TaskForm {
    public $id;
    public $user_name;
    public $email;
    public $task_text;
    public $status;
    public $errors = [];
    
    public function __construct($post_data) 
    {
        $form_fields = get_object_vars($this);
        
        foreach($form_fields as $form_field => $field_value)
        {
            if($form_field === 'errors' || $form_field === 'status')
            {
                continue;
            }
            
            if(isset($post_data[$form_field]))
            {
                $this->{$form_field} = htmlspecialchars($post_data[$form_field]);
            }
        }

        if(isset($post_data['status']))
        {
            $this->status = $post_data['status'] == 0 ? 0 : 1;
        }
        
        $this->verifyForm($post_data);
    }
        
    private function verifyForm($post_data)
    {
        $this->errors = [];
                          
        if(!preg_match('/^[.\w-]+@([\w-]+\.)+[a-zA-Z]{2,6}$/', $post_data['email']))
        {
            $this->errors['email'] = 'Wrong email format!';
        }   

        return empty($this->errors);
    }
    
}
