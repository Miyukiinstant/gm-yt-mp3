<?php
    if (!isset($_GET['yt'])){
        echo "Provide a valid yt url";
        return;
    }
    $host = 'https://getn.topsandtees.space';
    $root = 'https://getn.topsandtees.space/s/PXxDeloNjO';
    $yt = $_GET['yt'];
    $fields = [
    'q' => $yt,
    ];
    $postdata = http_build_query($fields);
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL, $root);
    curl_setopt($ch,CURLOPT_POST, true);
    curl_setopt($ch,CURLOPT_POSTFIELDS, $postdata);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
    $result = curl_exec($ch);
    $url  =explode('"',$result);
    $final = $host . $url[247] . "/mp3";
    $temp = file_get_contents($final);
    $audio = explode('"',$temp)[171];
    echo $audio;
    //return;
    header("Location:".$audio) ;
?>