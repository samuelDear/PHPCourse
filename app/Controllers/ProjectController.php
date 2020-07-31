<?php 

    use App\Models\Job;
    namespace App\Controllers;

    class ProjectController {
        public function getAddProjectAction(){
            if(!empty($_POST)) {
                $project = new Project();
                $project->title = $_POST['title'];
                $project->dsc = $_POST['description'];
                $project->save();
            }

            include('../views/addProject.php');
        }
    }
?>