<?php
    require_once 'pages/style.php';
    require_once 'pages/body.php';
    
    if(!isset($_GET['yt'])){return;}
    if(isset($_GET['yt']) and $_GET['yt']==""){
        echo '<script>
        document.getElementsByClassName("card")[0].remove();
        </script>';

        require_once 'faults/invalid_url.php';
        return;
    }
    require_once 'libs/get.php';
    header("Location:".getMP3($_GET['yt']) -> audio_file);
?>
