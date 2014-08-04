<?php

namespace Tony\BaseBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class BaseController
 * @package Tony\BaseBundle\Controller
 */
class BaseController extends Controller
{
    /**
     * @param $entityName
     * @return \Doctrine\Common\Persistence\ObjectRepository
     */
    protected function getRepo($entityName)
    {
        $entityPath = $this->getEntityPath($entityName);
        return $this->getDoctrine()->getRepository($entityPath);
    }

    /**
     * @param $entityName
     * @return mixed
     */
    private function getEntityPath($entityName)
    {
        $map = array(
            'User' => 'TonyUserBundle:User',
        );
        return $map[$entityName];
    }
}