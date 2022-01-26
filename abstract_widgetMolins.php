<?php

interface Observer {
  public function update(Observable $subject);
}


abstract class Widget implements Observer {

  protected $internalData = array();

  abstract public function draw();

  public function update(Observable $subject) {
         $this->internalData = $subject->getData();
  }
}


class BasicWidget extends Widget {

  function __construct() {
  }

  public function draw() {
         $html = "<table border=1 width=130>";
         $html .= "<tr><td colspan=4 bgcolor=#cccccc>
                        <b>Datos Personales<b></td></tr>";

         $numRecords = count($this->internalData[0]);
         for($i = 0; $i < $numRecords; $i++) {
                $nombre = $this->internalData[0];
                $apellido = $this->internalData[1];
                $edad =  $this->internalData[2];
                $altura =  $this->internalData[3];
                $html .=  "<tr><td>$nombre[$i]</td>
                <td> $apellido[$i]</td>
                <td>$edad[$i]</td>
                <td>$altura[$i]</td>
                </tr>";
                }
         $html .= "</table><br>";
         echo $html;
  }
}


class FancyWidget extends Widget {
  
  function __construct() {
  }
  
  public function draw() {
         $html = 
         "<table border=0 cellpadding=5 width=270 bgcolor=#6699BB>
                <tr><td colspan=4 bgcolor=#cccccc>
                <b><span class=blue>Datos Personales<span><b>
                </td></tr>
                <tr><td><b>Nombre</b></td>
                <td><b>Apellido</b></td>
                <td><b>Edad</b></td>
                <td><b>Altura</b></td>
                </tr>";
         
         $numRecords = count($this->internalData[0]);
         for($i = 0; $i < $numRecords; $i++) {
                $nombre = $this->internalData[0];
                $apellido = $this->internalData[1];
                $edad =  $this->internalData[2];
                $altura =  $this->internalData[3];
                
                $html .= 
                "<tr><td>$nombre[$i]</td>
                <td> $apellido[$i]</td>
                <td>$edad[$i]</td>
                <td>$altura[$i]</td>
                </tr>";
                }
         $html .= "</table><br>";
         echo $html;

  }
}

class MenuWidget extends Widget {

    function __construct(){

    }

    public function draw() {
        
        $html = '<div class="dropdown">
        <button class="mainmenubtn">Main Menu</button>
        <div class="dropdown-child">';

        $numRecords = count($this->internalData[0]);
         for($i = 0; $i < $numRecords; $i++) {
                $nombre = $this->internalData[0];
                $apellido = $this->internalData[1];
                $edad =  $this->internalData[2];
                $altura =  $this->internalData[3];
                
                $html .= '<a>' . $nombre[$i] . ', ' . $apellido[$i] . ', ' . $edad[$i] . ',' . $altura[$i] . '</a>';
          }
         $html .= '</div>';

         echo $html;


    }
}

?>

<html>
<head>
<style>
.mainmenubtn {
    background-color: skyblue;
    color: white;
    border: none;
    cursor: pointer;
    padding:20px;
    margin-top:20px;
}
.mainmenubtn:hover {
    background-color: blue;
    }
.dropdown {
    position: relative;
    display: inline-block;
}
.dropdown-child {
    display: none;
    background-color: skyblue;
    min-width: 200px;
}
.dropdown-child a {
    color: blue;
    padding: 20px;
    text-decoration: none;
    display: block;
}
.dropdown:hover .dropdown-child {
    display: block;
}
</style>
