<?php

use App\Models\{Job, Project};

/*
$job1 = new Job('PHP Developer','This is an awesome job!');
$job1->months = 16;
$job2 = new Job('Python Developer','This is an awesome job!');
$job2->months = 15;
$job3 = new Job('DevOps', 'This is an awesome job!');
$job3->months = 14;
*/

$jobs = Job::all();

$projects = Project::all();

  function printElement($job){
    //if($job->visible){
      echo '<li class="work-position">';
      echo '<h5>'.$job->title.'</h5>';
      echo '<p>'.$job->dsc.'</p>';
      echo '<p>'.$job->getDurationAsString().'</p>';
      echo '<strong>Achievements:</strong>';
      echo '<ul>';
      echo '<li>Lorem ipsum dolor sit amet, 80% consectetuer adipiscing elit.</li>';
      echo '<li>Lorem ipsum dolor sit amet, 80% consectetuer adipiscing elit.</li>';
      echo '<li>Lorem ipsum dolor sit amet, 80% consectetuer adipiscing elit.</li>';
      echo '</ul>';
      echo '</li>';
    //}
  }
?>