<?php

class LogoutController extends Controller {
  public function process($params) {
    session_destroy();
    $this->redirect('login');
  }
}
