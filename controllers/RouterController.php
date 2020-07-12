<?php

class RouterController extends Controller
{
    protected $controller;

    public function process($params)
    {
        if(is_array($params) && !empty($params))
        {
            $parsedUrl = $this->parseUrl($params[0]);
                        
            if(empty($parsedUrl[0]))
            {
                $this->redirect('task');
            }
            
            $controllerClass = $this->dashesToCamel(
                array_shift($parsedUrl)
            ) . 'Controller';
                          
            if (file_exists('controllers/' . $controllerClass . '.php'))
            {
                $this->controller = new $controllerClass;
                $this->controller->process($params);
                $this->setControllerData($this->controller->data);
                $this->setControllerHeadData($this->controller->head);
                $this->view = $this->controller->view;
            }
            else
            {
                $this->redirect('error');
            }
        }
    }
    
    private function parseUrl($url)
    {
        $parsedUrl = parse_url($url);
        $parsedUrl["path"] = ltrim($parsedUrl["path"], "/");
        $parsedUrl["path"] = trim($parsedUrl["path"]);
        $explodedUrl = explode("/", $parsedUrl["path"]);
        return $explodedUrl;
    }
    
    private function dashesToCamel($text)
    {
        $text = str_replace('-', ' ', $text);
        $text = ucwords($text);
        $text = str_replace(' ', '', $text);
        return $text;
    }
    
    private function setControllerHeadData($head_data)
    {
        if(!empty($head_data))
        {
            foreach($head_data as $k => $v)
            {
                $this->data[$k] = $v;
            }
        }
    }
    
    private function setControllerData($data)
    {
        if(!empty($data))
        {
            foreach($data as $k => $v)
            {
                $this->data[$k] = $v;
            }
        }
    }
}