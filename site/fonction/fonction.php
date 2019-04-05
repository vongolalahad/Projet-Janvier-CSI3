<?php
function Format($id){
    $chaine = (string)$id;
    $length = strlen($id);
    if($length==4){
        return $chaine;
    }
    elseif ($length==3){
        return '0'.$chaine;
    }
    elseif ($length==2){
        return '00'.$chaine;
    }elseif ($length==1){
        return '000'.$chaine;
    }
}