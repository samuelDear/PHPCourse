<?php 
    namespace App\Controllers;

    use App\Models\Job;
    use Respect\Validation\Validator as v;
    use Respect\Validation\Exceptions\NestedValidationException;

    class JobsController extends BaseController {
        public $responseMsg = '';

        public function getAddJobAction($request){
            if($request->getMethod() == 'POST'){
                
                $postData = $request->getParsedBody();

                $jobValidator = v::key('title', v::stringType()->notEmpty())
                  ->key('description', v::stringType()->notEmpty());

                try {
                    $jobValidator->assert($postData);

                    $files = $request->getUploadedFiles();
                    $logo = $files['logo'];

                    if($logo->getError() == UPLOAD_ERR_OK){
                        $fileName = $logo->getClientFilename();
                        $logo->moveTo("uploads/$fileName");
                    }
                    $job = new Job();
                    $job->title = $postData['title'];
                    $job->dsc = $postData['description'];
                    $job->save();// true

                    $this->responseMsg = 'Saved';
                } catch(NestedValidationException $e) {
                    $this->responseMsg = $e->getMessage();
                }
            }

            //include('../views/addJob.php');
            return $this->renderHTML('addJob.twig',[
                'responseMsg' => $this->responseMsg
             ]);
        }
    }
?>