<?php
    if(!isset($_GET['text']) or !isset($_GET['author'])){return;}
    $audio = "https://cdn.15.ai/audio/";
    $root = "https://api.15.ai/app/getAudioFile5";
    $data = array(
        "character"=>$_GET['author'],
        "emotion"=>"Contextual",
        "text"=> $_GET['text']
    );
    $options = array(
        'http' => array(
            'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
            'method'  => 'POST',
            'content' => http_build_query($data)
        )
    );
    $context  = stream_context_create($options);
    $result = file_get_contents($root, false, $context);
    if ($result === FALSE) { /* Handle error */ }
    header("Location:" . $audio . json_decode($result) -> wavNames[0]);
?>