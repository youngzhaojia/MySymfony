<?php
/**
 * Copyright (c) 2013-2014 Lucups, All rights reserved.
 * Author: Tony Lu <lucups@live.com>
 * Create: 14-7-31
 */

namespace Tony\UserBundle\Component;

use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Generator\UrlGenerator;
use Symfony\Component\Security\Http\Authentication\DefaultAuthenticationSuccessHandler;
use Symfony\Component\Security\Http\Authentication\AuthenticationSuccessHandlerInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Http\HttpUtils;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\Bundle\DoctrineBundle\Registry as Doctrine;

/**
 * Class LoginSuccessHandler
 * @package Mdx\UserBundle\Component
 */
class LoginSuccessHandler extends DefaultAuthenticationSuccessHandler
{
    /**
     * @param HttpUtils $httpUtils
     * @param array $options
     * @param Doctrine $doctrine
     */
    public function __construct(HttpUtils $httpUtils, array $options, Doctrine $doctrine)
    {
        parent::__construct($httpUtils, $options);
        $this->doctrine = $doctrine;
    }

    /**
     * @param Request $request
     * @param TokenInterface $token
     * @return RedirectResponse|Response
     */
    public function onAuthenticationSuccess(Request $request, TokenInterface $token)
    {
        // do something ...
        return parent::onAuthenticationSuccess($request, $token);
    }
} 