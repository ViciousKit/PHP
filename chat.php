<?php

function checkEmail($email) {
    $pattern = '/^([a-z0-9_\.-]+)@([a-z0-9_\.-]+)\.[a-z\.]{2,6}$/';
    if( $email ) {
        if( preg_match($pattern, strtolower($email)) ) return true;
        else echo 'Введите корректный email';
    }
    else {
        echo 'Введите почту';
    }
}

function censorComment($comment) {
    $pattern = '/#[a-z]{3,}#/';
    $pattern2 = '/\r\n|\r|\n/u';
    if($comment) {
        $comment = preg_replace($pattern, 'censored', strtolower($comment));
        return preg_replace($pattern2, ' ', $comment);
    }
    else echo 'Введите комментарий';
}

function saveToCash($email, $comment) {
    $cashfile = 'cash.txt';
    $content = "$email\r\n$comment\r\n\r\n";
    file_put_contents($cashfile, $content, FILE_APPEND);
}

if( $_POST ) {   
    if( checkEmail($_POST['email']) ) {
        if( $censoredText = censorComment($_POST['comment']) ) {
            saveToCash($_POST['email'], $censoredText);
        }
    }
}

?>

<form method="POST" action="chat.php"> 
    <p> Email <br>
    <input name="email" maxlength="25" size="40"> </p>
    <p> Комментарий <br>
    <textarea name="comment" cols="40"></textarea> </p>
    <input type="submit" name="button">
</form>

<div style="width:50%;">
<?php
if(file_exists('cash.txt')) {
     $content = file_get_contents('cash.txt');
}
    $content = explode("\r\n\r\n", $content);

    foreach($content as $value) {
        $value = explode("\r\n", $value);
        foreach($value as $key => $string) {
            if($key == 0) echo "<h4>$string</h4><br>";
            else echo "$string<hr>";
        }

        
    }
?>
    </div>
