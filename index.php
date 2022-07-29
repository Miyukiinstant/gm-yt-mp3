<style>
    /*https://coolors.co/palette/000000-14213d-fca311-e5e5e5-ffffff*/
    *{
        color: #ffffff;
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        transition: cubic-bezier(0.075, 0.82, 0.165, 1) 500ms;
    }
    body{
        background-color: #000000;
    }
    img{
        border-radius: 50%;
        width: 50%;
        height: auto;
    }
    .card{
        text-align: center;
        background-color: #14213d;
        margin: auto;
        width: 50%;
        align-self: center;
        padding: 2%;
        border-radius: 2em;
    }
    a{
        text-decoration: none;
        background-color: #000000;
        padding: 1%;
        border-radius: 2em;
        margin: auto;
    }
    a:hover{
        background-color: #ffffff;
        color: #000000;
    }
    .blur{
        filter: blur(5px);
    }
    .blur:hover{
        filter: blur(0px);
    }
</style>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="https://imgur.com/fUS8XZa.gif">
    <title>YT To Mp3</title>
</head>
<body>
        <?php
            if (isset($_GET['yt']) && $_GET['yt'] == ""){
                echo "<div class=card>
                        <h1>
                        Provide a valid yt url like this:
                        {$_SERVER['SERVER_NAME']}?yt=yourytlinkhere
                        </h1>
                    </div>";
                    return;
            }
        ?>
    
    <div class="card">
        <h1>Welcome to this beautiful place</h1>
        <img class="blur" src="https://imgur.com/olPAxXY.gif"></img>
        <div style="margin-top: 5%;">
            <a href="?yt=">Request mp3</a>
        </div>
    </div>
</body>
</html>
<?php
    if(!isset($_GET['yt'])){return;}
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
    
    header("Location:$audio");
    if(!$_GET['json']){return;}
    echo json_encode(array("audio_file"=>$audio));

    
?>
