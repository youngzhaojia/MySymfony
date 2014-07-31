<?php

namespace Proj\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('ProjCoreBundle:Default:index.html.twig', array('name' => $name));
    }
}
