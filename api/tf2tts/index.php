<?php
    $data = array(
        "character"=>"Miss Pauling",
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
    $result = file_get_contents("https://api.15.ai/app/getAudioFile5", false, $context);
    if ($result === FALSE) { /* Handle error */ }
    echo json_decode($result) -> wavNames[0];
?>