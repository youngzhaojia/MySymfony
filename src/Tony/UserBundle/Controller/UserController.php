<?php

namespace Tony\UserBundle\Controller;

use Tony\BaseBundle\Controller\BaseController;
use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
 * Class DefaultController
 * @package Tony\UserBundle\Controller
 * @Route("/user")
 */
class UserController extends BaseController
{
    /**
     * @Route("/login", name="_login")
     * @Template()
     */
    public function loginAction(Request $request)
    {
        $session = $request->getSession();

        // get the login error if there is one
        if ($request->attributes->has(SecurityContext::AUTHENTICATION_ERROR)) {
            $error = $request->attributes->get(
                SecurityContext::AUTHENTICATION_ERROR
            );
        } else {
            $error = $session->get(SecurityContext::AUTHENTICATION_ERROR);
            $session->remove(SecurityContext::AUTHENTICATION_ERROR);
        }
        $message = NULL;
        if ($error) $message = $this->get('translator')->trans($error->getMessage());
        return array(
            'error'   => $error,
            'message' => $message,
        );
    }

    /**
     * @Route("/logout", name="_logout")
     */
    public function logoutAction()
    {
    }

    /**
     * @Route("/login_check", name="_login_check")
     */
    public function loginCheckAction()
    {
    }
}
