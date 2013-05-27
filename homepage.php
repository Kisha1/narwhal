<?php

session_start();

if(isset($_SESSION['user'])){
    echo 'vse je ok';
}else{
    echo 'musis se lognout';
}

session_destroy();
?>
