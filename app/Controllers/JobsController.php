<?php 

    use App\Models\Job;
    namespace App\Controllers;

    class JobsController {
        public function getAddJobAction(){
            
            if(!empty($_POST)){
                $job = new Job();
                $job->title = $_POST['title'];
                $job->dsc = $_POST['description'];
                $job->save();
            }

            include('../views/addJob.php');
        }
    }
?>