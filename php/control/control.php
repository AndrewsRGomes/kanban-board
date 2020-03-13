<?php 

    require_once("config.php");

    //Show a list of events
    $list = new Events;
    $list->getList("pindoba");

    echo $list;

?> 