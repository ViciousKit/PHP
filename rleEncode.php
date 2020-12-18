<?php

class Encode {
    private $string;
    private $flag;


    public function __construct($string, $flag) {
        $this->string = $string;
        $this->flag = $flag;
    }
 
    public function encode() {
        if($this->shouldEncode()) {
            $code = $this->string;
            $encode = '';
            
            for ($i = 0; $i < strlen($code); $i++){
                $currentChar = $code[$i] ;
                $count = 1 ;
                for ($b = $i; $b < strlen($code); $b++){
                    if ($code[$b + 1] != $currentChar) break ;
                    $count++ ;
                    $i++ ;
                }
            $encode .= $count . $currentChar ;
            }
            
            $this->string = $encode;
            $this->flag = 0;
        }
    }

    public function decode() {
        
        if(!($this->shouldEncode())) {
            
            $code = $this->string;
            $encode = '';
            
            
            for($i = 0; $i < strlen($code); $i++) {
               if($i % 2) {
                   continue;
               }
               for($b = 1; $b <= $code[$i]; $b++) {
                    $encode .= $code[$i + 1];
               }
            }
            $this->string = $encode;
            $this->flag = 1;
        }
    }

    public function getText() {
        return $this->string;

    }

    private function shouldEncode() {
        return $this->flag == 1 ? true : false;
    }
}


$string = new Encode('ffafhfthtrftttt jjjtyjyt jyjfgyyfyfyff', 1);
echo $string->getText();
echo '<br>';
$string->encode();
echo $string->getText();
echo '<br>';
$string->decode();
echo $string->getText();



