<?php
//Creamos una clase Observable
abstract class Observable {

  private $observers = array();

  public function addObserver(Observer $observer) {
         array_push($this->observers, $observer);
  }

  public function notifyObservers() {
         for ($i = 0; $i < count($this->observers); $i++) {
                 $widget = $this->observers[$i];
                 $widget->update($this);
         }
     }
}


class DataSource extends Observable {

  private $nombre;
  private $apellido;
  private $edad;
  private $altura; //

  function __construct() {
         $this->nombre = array();
         $this->apellido = array();
         $this->edad = array();
         $this->altura = array(); //
  }

  public function addRecord($nombre, $apellido, $edad, $altura) { //
         array_push($this->nombre, $nombre);
         array_push($this->apellido, $apellido);
         array_push($this->edad, $edad);
         array_push($this->altura, $altura); //

         $this->notifyObservers();
  }

  public function getData() {
         return array($this->nombre, $this->apellido, $this->edad, $this->altura);
  }
}
?>