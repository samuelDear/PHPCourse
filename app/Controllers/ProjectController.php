<?php 

    namespace App\Controllers;

    use App\Models\Project;
    use Respect\Validation\Validator as v;
    use Respect\Validation\Exceptions\NestedValidationException;

    class ProjectController extends BaseController {
        public $responseMsg = null;

        public function getAddProjectAction($request){
            if($request->getMethod() == 'POST') {
                $postData = $request->getParsedBody();

                $projectValidator = v::key('title', v::stringType()->notEmpty())
                  ->key('description', v::stringType()->notEmpty());

                try {
                    $projectValidator->assert($postData); 
                    $project = new Project();
                    $project->title = $postData['title'];
                    $project->dsc = $postData['description'];
                    $project->save();

                    $this->responseMsg = 'Saved';
                } catch(NestedValidationException $e) {
                    $this->responseMsg = $e->getMessage();
                }
            }

            return $this->renderHTML('addProject.twig',[
                'responseMsg' => $this->responseMsg
             ]);
        }
    }
?>