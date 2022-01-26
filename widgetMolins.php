<?php
require_once("observableMolins.php");
require_once("abstract_widgetMolins.php");

//Introducimos datos

$dat = new DataSource();
$widgetA = new BasicWidget();
$widgetB = new FancyWidget();
$widgetC = new MenuWidget();

$dat->addObserver($widgetA);
$dat->addObserver($widgetB);
$dat->addObserver($widgetC);

$dat->addRecord("Alejandro", "Molins", 19, 1.72);
$dat->addRecord("Alvaro", "Perez", 22, 1.75);
$dat->addRecord("Sonia", "Roman", 25, 1.65);
$dat->addRecord("Carla", "Moreno", 19, 1.69);

$widgetA->draw(); 
$widgetB->draw();
$widgetC->draw();



?>