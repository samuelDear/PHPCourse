<?php

class Job{
  private $title;
  public $description;
  public $visible;
  public $months;

  public function __construct($title,$description,$visible,$months){
    $this->setTitle($title);
    $this->description = $description;
    $this->visible = $visible;
    $this->months = $months;
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
}

$job1 = new Job('PHP Developer','This is an awesome job!', true, 16);
/*$job1->setTitle();
$job1->description = ;
$job1->visible = true;
$job1->months = 16;*/

$job2 = new Job('Python Developer','This is an awesome job!', true, 16);
$job3 = new Job('DevOps', 'This is an awesome job!', true, 16);

$jobs = [
  $job1,
  $job2,
  $job3
    /*[
      'title' => 'PHP Developer',
      'description' => 'This is an awesome job!!',
      'visible' => true,
      'months' => 16
    ],
    [
      'title' => 'Python Dev',
      'description' => 'This is an awesome job!!',
      'visible' => true,
      'months' => 14
    ],
    [
      'title' => 'DevOps',
      'description' => 'This is an awesome job!!',
      'visible' => true,
      'months' => 5
    ],
    [
      'title' => 'Node Dev',
      'description' => 'This is an awesome job!!',
      'visible' => true,
      'months' => 12
    ],
    [
      'title' => 'Frontend Dev',
      'description' => 'This is an awesome job!!',
      'visible' => true,
      'months' => 33
    ],*/
  ];

  function printJob($job){
    if($job->visible){
      echo '<li class="work-position">';
      echo '<h5>'.$job->getTitle().'</h5>';
      echo '<p>'.$job->description.'</p>';
      echo '<p>'.$job->getDurationAsString().'</p>';
      echo '<strong>Achievements:</strong>';
      echo '<ul>';
      echo '<li>Lorem ipsum dolor sit amet, 80% consectetuer adipiscing elit.</li>';
      echo '<li>Lorem ipsum dolor sit amet, 80% consectetuer adipiscing elit.</li>';
      echo '<li>Lorem ipsum dolor sit amet, 80% consectetuer adipiscing elit.</li>';
      echo '</ul>';
      echo '</li>';
    }
  }
?>