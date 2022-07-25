<?php
    if (!isset($_GET['yt'])){
        echo "Provide a valid yt url by adding ?yt=linkhere";
        return;
    }
    $root = 'https://getmp3.pro/';
    $host = 'https://getn.topsandtees.space';
    $root = $host."/s/".explode("https://getn.topsandtees.space/",explode('"',file_get_contents($root))[55])[1]; //Fetches the main root link for furhter requests 
    $yt = $_GET['yt'];
    $yt = explode("&list",$yt)[0];
    $data = array(
        'q' => $yt
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
    $url  =explode('"',$result);
    $final = $host . $url[247] . "/mp3";
    $temp = file_get_contents($final);
    $audio = explode('"',$temp)[171];
    header("Location:".$audio) ;
?>