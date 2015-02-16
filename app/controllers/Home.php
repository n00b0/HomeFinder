<?php

class Home extends Controller{
    
    public function index(){
        //echo $name;
        $usermodell = $this->model('User');
        $usermodell->name = 'Mike';
        //var_dump($user);
        
        //Sende Inhalte an das View
        //echo $usermodell->name;
        $this->view('home/index', ['name' => $usermodell->name]);
    }
    

}

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

