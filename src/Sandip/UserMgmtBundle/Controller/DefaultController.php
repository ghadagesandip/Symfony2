<?php

namespace Sandip\UserMgmtBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('SandipUserMgmtBundle:Default:index.html.twig', array('name' => $name));
    }
}
