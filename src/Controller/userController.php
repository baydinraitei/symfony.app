<?php

namespace App\Controller;

use userType;
use App\Entity\user;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class userController extends AbstractController{

    /**
     * @Route ("/user")
     */
    
     function createUserForm (Request $request){

        $user = new user() ;
        $form = $this ->createFormBuilder($user);
        $form = $this->createForm(userType::class, $user);
   
       
            $form->handleRequest($request);
            
            if ($form->isSubmitted() && $form->isValid()) { 
                $userInfo = $form->getData();
                $entitymanager = $this->getDoctrine()->getManager();
                $entitymanager->persist($userInfo);
                $entitymanager->flush();

                return new Response("Formulaire validé");
            }

        return $this -> render('form.html.twig', ['userform' => $form->createview()]);

     }
}