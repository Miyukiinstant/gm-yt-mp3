<?php
    header("Access-Control-Allow-Origin:*");
    switch ($_GET['type']) {
        case 'addons':
            $content = file_get_contents("https://metastruct.net/api/v1/addons");
            break;
        case 'servers':
            $content = file_get_contents("https://metastruct.net/api/v1/servers");
            break;
        default:
            $content = NULL;
            break;
    }
    
    echo $content;
?>