<?php
include("includes/session_superadmin_connected.php");

include("includes/head.php");

include("includes/header.php");

if($req['CodeFonction']==1){
    include("includes/aside1.php");
}elseif($req['CodeFonction']==2){
    include("includes/aside2.php");
}

include("content/province.php");

include("includes/footer.php");

include("includes/script.php");

include("getrow/province.php");

include("modal/province.php");

?>


