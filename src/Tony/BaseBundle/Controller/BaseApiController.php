<?php
/**
 * Copyright (c) 2013-2014 Lucups, All rights reserved.
 * Author: Tony Lu <lucups@live.com>
 * Create: 14-7-31
 */

namespace Tony\BaseBundle\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Validator\Constraints as Assert;
use Tony\BaseBundle\Common\AjaxResponse as AR;

/**
 * Class BaseApiController
 * @package Tony\BaseBundle\Controller
 */
class BaseApiController extends BaseController
{
    /**
     * @param int $error_id
     * @param null $data
     * @return Response
     */
    protected function makeResponse($error_id = AR::ERR_SUCCESS, $data = NULL)
    {
        return new Response(AR::encode($error_id, $data));
    }

}