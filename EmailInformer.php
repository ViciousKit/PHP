<?php

abstract class EmailInformer {
    
    abstract protected function setMail();
    
    public function send() {
        echo "Message '$this->message' has been sent to $this->email";
    }
        
}

class GoogleInformer extends EmailInformer {
    protected $message;
    protected $email;
    
    public function __construct($message, $email) {
        $this->message = $message;
        $this->email = $email;
        if($this->setMail($email)) {
            $this->send();
        }
    }
    
    protected function setMail() {
        if(preg_match('/^([a-z0-9_\.-]+)@gmail\.com$/', $this->email)) {
            return true;
        }
        else echo 'Email adress should be "******@gmail.com"';
    }
}

class YandexInformer extends EmailInformer {
    protected $message;
    protected $email;
    
    public function __construct($message, $email) {
        $this->message = $message;
        $this->email = $email;
        if($this->setMail($email)) {
            $this->send();
        }
    }
    
    protected function setMail() {
        if(preg_match('/^([a-z0-9_\.-]+)@yandex\.ru$/', $this->email)) {
            return true;
        }
        else echo 'Email adress should be "******@yandex.ru"';
    }
}


$sendToGoogle = new GoogleInformer('lalalalala', 'vswekid@gmail.com');
echo '<br>';
$sendToYandex = new YandexInformer('lalalalfaefef fsefala', 'fefe@yandex.ru');
echo '<br>';
$sendToYandex = new YandexInformer('lalalalfaefef fsefala', 'wrongAdress@wrong.ru');

