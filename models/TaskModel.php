<?php

class TaskModel{
    public $id;
    public $user_name;
    public $email;
    public $task_text;
    public $status;
        
    const STATUSES = ['not completed', 'completed'];
    const MAX_PAGE_ITEMS = 3;
    
    public function create()
    {
        $query = "INSERT INTO `tasks_list` "
                . "(`user_name`, `email`, `task_text`, `status`) "
                . "VALUES (:user_name, :email, :task_text, :status)";
        $params = [
            ':user_name' => $this->user_name, 
            ':email' => $this->email, 
            ':task_text' => $this->task_text, 
            ':status' => $this->status
        ];
        Db::execute($query, $params); 
    }
    
    public function update()
    {
        $query = "UPDATE `tasks_list` SET "
                . "`user_name` = :user_name, `email` = :email, "
                . " `task_text` = :task_text, "
                . "`status` = :status WHERE `id` = :id";
        $params = [
            ':id' => $this->id,
            ':user_name' => $this->user_name, 
            ':email' => $this->email, 
            ':task_text' => $this->task_text, 
            ':status' => $this->status
        ];
        Db::execute($query, $params); 
    }
    
    public static function deleteById($id)
    {
        $query = "DELETE FROM `tasks_list` WHERE id = :id;";
        $params = [':id' => $id];
        Db::execute($query, $params);
    }
    
    public static function getTasksQty()
    {
        $query = "SELECT COUNT(*) as quantity FROM `tasks_list`;";
        return Db::queryOne($query);
    }
    
    public static function getAllTasks($offset = 0, $order = 'id')
    {
        $query = "SELECT `id`, `user_name`, `email`, "
                . "`task_text`, `status`"
                . " FROM tasks_list ORDER BY $order DESC LIMIT :offset, :limit";
        
        $params = [
            ':offset' => $offset, 
            ':limit' => self::MAX_PAGE_ITEMS
        ];

        return Db::queryAll($query, $params);
    }
    
    public static function getTaskById($id)
    {
        $query = "SELECT `id`, `user_name`, `email`, "
                . "`task_text`, `status`"
                . " FROM tasks_list WHERE id = :id";
        $params = [
            ':id' => $id, 
        ];
        return Db::queryOne($query, $params);        
    }
}

?>
