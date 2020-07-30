<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;

    class Job extends Model {

        protected $table = 'jobs';

        /*public function __construct($title,$description){
            $newTitle = 'Job: '.$title;
            //parent::__construct($newTitle,$description);
            $this->title = $newTitle;
        }*/

        public function getDurationAsString(){
            //Validamos primero los meses para evitar realizar calculos innecesarios
            if($this->months < 12){
              return "Job duration: $this->months month".($this->months > 1 ? 's' : '');
            }
        
            //Si llegamos aqui requerimos calcular
            $years = floor($this->months / 12);
            $extraMonths = $this->months % 12;
        
            //Si tenemos mas de 0 meses restantes, lo mostramos
            if($extraMonths > 0){
              return "Job duration: $years year".($years > 1 ? 's' : '').
              " $extraMonths month".($extraMonths > 1 ? 's' : '');
            }else{
              return "Job duration: $years year".($years > 1 ? 's' : '');
            }
          }
    }
?>