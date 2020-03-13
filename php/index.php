<?php 

require_once("config.php");



//Show only one event with the ID
//$evento = new Events();
//$evento->loadById(6);
//echo $evento;

//Show a list of events
$list = new Events;
$list->getList("THIAGO.P");

//Carrega uma lista com base no title passado no parametro
//$search = new Events();

//$search->searchByTitle("","pindoba");

//echo $search;

?> 

