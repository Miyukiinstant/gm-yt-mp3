<?php
    if (!isset($_GET['yt'])){
        echo "Provide a valid yt url by adding ?yt=linkhere";
        return;
    }
    $host = 'https://getn.topsandtees.space';
    $root = 'https://getn.topsandtees.space/s/PXxDeloNjO';
    $yt = $_GET['yt'];
    $yt = explode("&list",$yt)[0];
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
    header("Location:".$audio) ;
?>