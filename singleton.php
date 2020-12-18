<?php

class Settings {
    static private $box;
    private $settings;
    
     private final function __construct()
    {
         $this->settings = parse_ini_file('app.ini');
    }
    
    static public function getBox()
    {
        if (is_null(static::$box)) {
            static::$box = new static();
        }
        return static::$box;
    }
    
    public function getHost() {
        return $this->settings['host'];
        
    }
    
     public function getUser() {
        return $this->settings['user'];
        
    }
    
     public function getPass() {
        return $this->settings['password'];
        
    }
    
     public function getDbName() {
        return $this->settings['dbName'];
        
    }
    
    
}




echo $dbHost = Settings::getBox()->getHost();