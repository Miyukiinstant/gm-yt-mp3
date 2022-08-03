<?php
//https://translate.google.com/translate_tts?ie=UTF-8&client=tw-ob&tl="+Voice+"&q="+TEXT
if(!isset($_GET['voice']) or !isset($_GET['q'])){
    return;
}
header("Location:https://translate.google.com/translate_tts?ie=UTF-8&client=tw-ob&tl={$_GET['voice']}&q={$_GET['q']}");

?>