<?php 

    namespace App\Controllers;

    use App\Models\Project;

    class ProjectController extends BaseController {
        public function getAddProjectAction($request){
            if($request->getMethod() == 'POST') {
                $postData = $request->getParsedBody();
                $project = new Project();
                $project->title = $postData['title'];
                $project->dsc = $postData['description'];
                $project->save();
            }

            return $this->renderHTML('addProject.twig');
        }
    }
?>