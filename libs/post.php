<?php  
    function POST15ai(string $url,array $data): mixed{
        //Create cURL resource
        $ch1 = curl_init();
        //Set cURL options
        curl_setopt_array($ch1,array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POSTFIELDS => "text={$data['text']}&character={$data['voice']}&emotion=Contextual"
        ));
        //Create the multi handles
        $mh = curl_multi_init();
        //Add them
        curl_multi_add_handle($mh,$ch1);
        //execute the multi handle
        $running = null;
        do {
            curl_multi_exec($mh, $running);
        } while ($running);
        //Close the handle
        curl_multi_remove_handle($mh,$ch1);
        curl_multi_close($mh);
        $result = curl_multi_getcontent($ch1);
        return json_decode($result);
    }
    
?>