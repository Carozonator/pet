<?php
namespace pluralpet;

class View{
    
    private $request;
    private $file;
    private $data;
    private $message;
    private $head_tags= array();
    
    function __construct($request) {
        $this->request = $request;
        $this->data = array('tab' => $this->request->getTab());
    }
    
    function render(){
        extract($this->data);
        $head_tags = implode(" ",$this->head_tags);
        
        include ROOT.'application/include/header.php';
        if(isset($this->file)){
            include ($this->file);
        }else{
            $message = $this->message;
            include ROOT.'application/include/main_content.php';
            //echo $this->message;
        }
        include ROOT.'application/include/footer.php';
    }
    
    function setFilePath($file_path){
        $this->file = $file_path;
    }
    
    function setFile($file){
        $file_path = ROOT.'application/module/'.strtolower($this->request->getController()).'/'.strtolower($file).'.php';
        $this->file = $file_path;
    }
    
    function setMessage($message){
        $this->message=$message;//'<div class="informacion">'.$message.'</div>';
    }
    
    function addHeadTag($tag){
        $this->head_tags[] = $tag;
    }
    
    function assign($aAssign){
        $this->data = array_merge($this->data,$aAssign);
    }
    
}