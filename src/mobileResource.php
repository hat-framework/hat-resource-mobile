<?php
//define("FORM_DIR", realpath(dirname(__FILE__)) . "/");

class mobileResource extends \classes\Interfaces\resource{
    
    /**
    * @uses Contém a instância do banco de dados
    */
    private static $instance = NULL;

    
    /**
    * Construtor da classe
    * @uses Carregar os arquivos necessários para o funcionamento do recurso
    * @throws DBException
    * @return retorna um objeto com a instância do banco de dados
    */
    public function __construct() {
        $this->dir = dirname(__FILE__);
        $this->LoadResourceFile('mobile_device_detect.php', '');
    }
    
    /**
    * retorna a instância do banco de dados
    * @uses Faz a chamada do contrutor
    * @throws DBException
    * @return retorna um objeto com a instância do banco de dados
    */
    public static function getInstanceOf(){
        $class_name = __CLASS__;
        if (!isset(self::$instance)) self::$instance = new $class_name;
        return self::$instance;
    }
    
    
    private $iphone=true;
    private $ipad=true;
    private $android=true;
    private $opera=true;
    private $blackberry=true;
    private $palm=true;
    private $windows=true;
    
    public function setIphone($bool = false){
        $this->iphone = $bool;
    }
    
    public function setIpad($bool = false){
        $this->ipad = $bool;
    }
    
    public function setAndrod($bool = false){
        $this->android = $bool;
    }
    
    public function setBlackberry($bool = false){
        $this->blackberry = $bool;
    }
    
    public function setPalm($bool = false){
        $this->palm = $bool;
    }
    
    public function setWindows($bool = false){
        $this->windows = $bool;
    }
    
    public function mobile_device_detect($mobileredirect = false, $desktopredirect = false){
        return mobile_device_detect($this->iphone, $this->ipad,$this->android,$this->opera,$this->blackberry,$this->palm,$this->windows,$mobileredirect,$desktopredirect);
    }
    
    public function IsMobile(){
        return mobile_device_detect($this->iphone, $this->ipad,$this->android,$this->opera,$this->blackberry,$this->palm,$this->windows,false,false);
    }
    
}

?>
