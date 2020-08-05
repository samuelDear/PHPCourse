<?php

namespace App\Controllers;

use App\Models\User;
use Respect\Validation\Validator as v;
use Respect\Validation\Exceptions\NestedValidationException;

class UserController extends BaseController{

    public function create(){
        return $this->renderHTML('addUser.twig');
    }

    public function store($request){
        if($request->getMethod() == "POST") {
            $responseMessage = null;
            $postData = $request->getParsedBody();

            $userValidator = v::key('usr', v::email()->notEmpty())
                             ->key('pwd', v::stringType()->notEmpty()->length(2, 15));

            try {
                $userValidator->check($postData);
                $user = new User();
                $user->usr = $postData['usr'];
                $user->pwd = password_hash($postData['pwd'], PASSWORD_DEFAULT);
                $user->save();
                $responseMessage = "Guardado satisfactoriamente";
            } catch(NestedValidationException $e) {
                $responseMessage = $e->getMessage();
            }
        }
        return $this->renderHTML('addUser.twig', ['responseMessage' => $responseMessage]);
    }

}