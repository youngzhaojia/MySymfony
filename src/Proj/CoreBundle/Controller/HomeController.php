<?php

namespace Proj\CoreBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Tony\BaseBundle\Controller\BaseController;

/**
 * Class HomeController
 * @package Proj\CoreBundle\Controller
 * @Route("/")
 */
class HomeController extends BaseController
{
    /**
     * @Route("/", name="_index")
     * @Route("/index", name="_home_index")
     */
    public function indexAction()
    {
        return array();
    }
}
