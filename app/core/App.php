<?php

class App
{
    
    protected $controller = 'home';
    
    protected $method = 'index';
    
    protected $parameter = [];
    
    
    public function __construct(){
        //Do something
        //Parse URL
        
        //$this->parseURL();
        $url = $this->parseURL();
        //print_r($url);
        
        if(file_exists('../app/controllers/'. $url[0] . '.php')){
            $this->controller = $url[0];
            unset($url[0]);
        }
             
        
        require_once '../app/controllers/' . $this->controller . '.php';
        
        $this->controller=new $this->controller;
        
       
        //var_dump($this->controller);
        
        if(isset($url[1])){
            if(method_exists($this->controller, $url[1])){
                $this->method = $url[1];
                unset($url[1]);
            }
        }
        
        $this->params = array_values($url);
        
        //print_r($this->params);
        
        call_user_func_array([$this->controller, $this->method], $this->params);
        
    }
    
    
    public function parseURL(){
        //Zerlege URL und liefere Namen des Controllers, der Metode und der Parameter        
        
        if (isset($_GET['url'])){
           
            return $url=explode('/',filter_var(rtrim($_GET['url'], '/'),FILTER_SANITIZE_URL));
        }
    }

}

