<?php
include("includes/sessionconnected.php");

include("includes/head.php");

include("includes/header.php");

if($req['CodeFonction']==1){
    include("includes/aside1.php");
}elseif($req['CodeFonction']==2){
    include("includes/aside2.php");
}

include("content/profile.php");

include("includes/footer.php");

include("includes/script.php");

include("getrow/habitant.php");

include("modal/habitant.php");

?>


