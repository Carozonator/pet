<?php
namespace pluralpet;

class View{
    
    private $request;
    private $file;
    private $data;
    
    function __construct($request) {
        $this->request = $request;
        $this->data = array('tab' => $this->request->getTab());
    }
    
    function render(){
        extract($this->data);
        include ROOT.'application/include/header.php';
        include ($this->file);
        include ROOT.'application/include/footer.php';
    }
    
    function setFilePath($file_path){
        $this->file = $file_path;
    }
    
    function setFile($file){
        $file_path = ROOT.'application/module/'.strtolower($this->request->getController()).'/'.strtolower($file).'.php';
        $this->file = $file_path;
    }
    
    function assign($aAssign){
        $this->data = array_merge($this->data,$aAssign);
    }
    
}