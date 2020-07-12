<?php
class LoginController extends Controller {

  public function process($params) {
    $this->isLoggedIn = isset($_SESSION["auth"]) && $_SESSION["auth"] == true;
    $this->head['title'] = 'Login';
    $this->view = 'login';
    $this->data['isLogged'] = $this->isLogged();

    if($this->isLoggedIn)
    {
        $this->redirect('/');
    }
    
    if(isset($_POST["username"]) && isset($_POST["password"])) {
      $login_form = new LoginForm($_POST);
      $this->data['form'] = $login_form;
      
      if(empty($login_form->errors))
      {
        $user = UserModel::getUserByName($login_form->username);
        if($user)
        {
            $isCorrect = $login_form->verifyPassword(
                $login_form->password, 
                $user["password"]
            );
            
            if ($isCorrect) {
                $_SESSION["auth"] = true;
                $this->isLoggedIn = true;
                $this->redirect('/');
            }
            
            $this->data['form_message'] = 'Wrong username or password!';
        }else{
            $this->data['form_message'] = 'Wrong username or password!';
        }
      }
    }
  }
}
