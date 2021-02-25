<?php
namespace App\Controller;
//use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
//use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\Greeter;
use Symfony\Component\HttpFoundation\Response;

class helloController extends AbstractController{

    /**
     * @Route("hello")
     */

  function hello (Greeter $Greeter){
      $message = $Greeter->greet();
   return new Response ($message);

  }


    
}