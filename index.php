<?php
    require_once 'pages/style.php';
    require_once 'pages/body.php';
    
    if(!isset($_GET['yt'])){return;}
    if(isset($_GET['yt']) and $_GET['yt']==""){
        echo '<script>alert("Provide valid link '.$_SERVER['SERVER_NAME'].'?yt=YOUTUBELINKHERE")</script>';
        return;
    }
    $root = 'https://getmp3.pro/';
    $host = 'https://getn.topsandtees.space';
    $root = $host."/s/".explode("https://getn.topsandtees.space/",explode('"',file_get_contents($root))[55])[1]; //Fetches the main root link for furhter requests 
    $yt = $_GET['yt'];
    $yt = trim(explode("list=",$yt)[0], "&?");
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
    
    header("Location:$audio");
    if(!$_GET['json']){return;}
    echo json_encode(array("audio_file"=>$audio));

    
?>
