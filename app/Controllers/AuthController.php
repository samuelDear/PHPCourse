<?php

namespace App\Controllers;

use App\Models\User;
use Respect\Validation\Validator as v;
use Respect\Validation\Exceptions\NestedValidationException;
use Laminas\Diactoros\Response\RedirectResponse;

class AuthController extends BaseController{

    public function getLogin(){
        return $this->renderHTML('login.twig');
    }

    public function postLogin($request){
        if($request->getMethod() == "POST") {
            $responseMessage = null;
            $postData = $request->getParsedBody();
            $user = User::where('usr',$postData['usr'])->first();

            if($user){
                if(\password_verify($postData['pwd'], $user->pwd)){
                    $_SESSION['userId'] = $user->id;
                    return new RedirectResponse('admin');
                }else{
                    $responseMessage = 'Bad credentials';
                }
            }else{
                $responseMessage = 'Bad credentials';
            }
            
            try {
                
            } catch(NestedValidationException $e) {
                $responseMessage = $e->getMessage();
            }
        }
        return $this->renderHTML('login.twig', [
            'responseMessage' => $responseMessage
        ]);
    }

    public function getLogout(){
        unset($_SESSION['userId']);
        return new RedirectResponse('login');        
    }
}