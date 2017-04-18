#!/usr/bin/php5

<?php
$dev="/dev/input/event1";
$f=fopen($dev, 'rb');
if($f){
    while (!feof($f)){
        $b=fread($f,32);  //каждая кнопка формирует данные по 64 бита, 32-нажата кнопка, еще 32 - отпустили
        $d=bin2hex($b); //получили hex строку
        $d=substr($d,18,8); //код кнопки пульта и её статус
        $button=substr($d,0,4); //кнопка
        $key=substr($d,4);   //0001 или 0000
        
        switch($button){
            case "0047": 
            if ($key=="0001"){shell_exec("/home/cubie/proj/ir-vlc/next.sh");} //следующий канал
            break;
            case "0046": 
            if ($key=="0001"){shell_exec("/home/cubie/proj/ir-vlc/prev.sh");} // предыдущий канал
            break;
            case "0043": 
            if ($key=="0001"){shell_exec("/home/cubie/proj/ir-vlc/volup.sh");} // громкость+
            break;
            case "0040":
            if ($key=="0001"){shell_exec("/home/cubie/proj/ir-vlc/voldown.sh");} // громкость-
            break;
        }
       
    }
}
?>
