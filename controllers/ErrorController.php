<?php

class ErrorController extends Controller
{
    public function process($params)
    {
        header("HTTP/1.0 404 Not Found");
        $this->head['title'] = 'Error 404';
        $this->data['isLogged'] = $this->isLogged();
        $this->view = 'error';
    }
}