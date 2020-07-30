<?php 

    namespace App\Models;

    require_once('Printable.php');


    class BaseElement implements Printable{
        protected $title;
        public $description;
        public $visible = true;
        public $months;
      
        public function __construct($title,$description){
          $this->setTitle($title);
          $this->description = $description;
        }
      
        public function setTitle($title){
          if($title == ''){
            $this->title = 'N/A';
          }else{
            $this->title = $title;
          }
        }
      
        public function getTitle(){
          return $this->title;
        }
      
        public function getDurationAsString(){
          //Validamos primero los meses para evitar realizar calculos innecesarios
          if($this->months < 12){
            return "$this->months month".($this->months > 1 ? 's' : '');
          }
      
          //Si llegamos aqui requerimos calcular
          $years = floor($this->months / 12);
          $extraMonths = $this->months % 12;
      
          //Si tenemos mas de 0 meses restantes, lo mostramos
          if($extraMonths > 0){
            return "$years year".($years > 1 ? 's' : '').
            " $extraMonths month".($extraMonths > 1 ? 's' : '');
          }else{
            return "$years year".($years > 1 ? 's' : '');
          }
        }

        public function getDescription(){
          return $this->description;
        }
      }
?>