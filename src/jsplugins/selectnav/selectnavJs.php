<?php

use classes\Classes\JsPlugin;
class selectnavJs extends JsPlugin{

    static private $instance;
    public static function getInstanceOf($plugin){
        $class_name = __CLASS__;
        if (!isset(self::$instance))self::$instance = new $class_name($plugin);
        return self::$instance;
    }
    
    public function init() {
        $this->Html->LoadJs("$this->url/selectnav.min");
    }
    
    public function execute($id){
        $this->Html->LoadJsFunction("selectnav('$id', {
            label: 'Menu',
            activeclass: 'act',
            nested: true,
            
            indent: '-'
        });");
    }

}

?>
