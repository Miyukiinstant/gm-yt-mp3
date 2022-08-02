<?php
//https://translate.google.com/translate_tts?ie=UTF-8&client=tw-ob&tl="+Voice+"&q="+TEXT
if(!isset($_GET['voice']) or !isset($_GET['q'])){
    return;
}
?>
<audio controls autoplay name="media">
    <source src="https://translate.google.com/translate_tts?ie=UTF-8&client=tw-ob&tl=<?php echo $_GET['voice']."&q=".$_GET['q'];?>" type="audio/mpeg">

</audio>
