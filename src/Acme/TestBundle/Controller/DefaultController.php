<?php

namespace Acme\TestBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;


class DefaultController extends Controller
{
    public function indexAction(Request $request, $name)
    {
        $session = $request->getSession();
        $session->set('foo','Bar');

        //echo 'Session value : '.$session->get('foo').'<br/>';

        $this->addFlash(
            'notice',
            'Your changes were saved!'
        );

       //return new Response('Hello '.$name, Response::HTTP_OK);

        $response = new Response(json_encode(array('name' => $name)));
        $response->headers->set('Content-Type', 'application/json');
        return $response;

        return $this->render('AcmeTestBundle:Default:index.html.twig', array('name' => $name));
    }


    public function helloAction()
    {

        //return $this->redirectToRoute('acme_test_homepage',array('name'=>'sandip'));
        return $this->render('AcmeTestBundle:Default:hello.html.twig');
    }


    public function showAction($slug){
        echo $slug; exit;
    }
}
