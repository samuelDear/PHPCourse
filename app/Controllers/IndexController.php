<?php 

    namespace App\Controllers;

    use App\Models\{Job, Project};

    class IndexController {
        public function indexAction(){
            $jobs = Job::all();
            $projects = Project::all();
    
            $lastname = 'Rojas';
            $name = "Samuel $lastname";
            $limitMonths = 2000;

            include('../views/index.php');
        }
    }
?>