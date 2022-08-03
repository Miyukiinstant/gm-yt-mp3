<?php
    if(!isset($_GET['text']) or !isset($_GET['voice'])){
        require_once 'error.php';    
        return;
    }
    require_once '../../libs/post.php';
    $audio = "https://cdn.15.ai/audio/";
    $root = "https://api.15.ai/app/getAudioFile5";

    $res = POST15ai($root,array("voice"=>$_GET['voice'],"text"=>$_GET['text']));

    header("Location:$audio{$res -> wavNames[0]}");

?>