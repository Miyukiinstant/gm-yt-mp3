<?php
    function getMP3(string $url): mixed{
        $root = 'https://getmp3.pro/';
        $host = 'https://getn.topsandtees.space';
        $root = $host."/s/".explode("https://getn.topsandtees.space/",explode('"',file_get_contents($root))[55])[1]; //Fetches the main root link for furhter requests 
        $yt = $url;
        $yt = trim(explode("list=",$yt)[0], "&?");


        $ch1 = curl_init();

        curl_setopt_array($ch1,array(

            CURLOPT_URL => $root,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POSTFIELDS => "q=$yt"
        ));

        $mh = curl_multi_init();

        curl_multi_add_handle($mh,$ch1);

        $active = null;
        do {
            curl_multi_exec($mh,$active);
        } while ($active);
        curl_multi_remove_handle($mh,$ch1);
        curl_multi_close($mh);

        $result = curl_multi_getcontent($ch1);

        $mp3url  =explode('"',$result);
        $final = $host . $mp3url[247] . "/mp3";
        $temp = file_get_contents($final);
        $audio = explode('"',$temp)[171];
        return json_decode(json_encode(array("audio_file"=>$audio)));
    }
?>