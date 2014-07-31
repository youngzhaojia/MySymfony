<?php
/**
 * Copyright (c) 2013-2014 Lucups, All rights reserved.
 * Author: Tony Lu <lucups@live.com>
 * Create: 14-7-31
 */

namespace Tony\BaseBundle\Common;

/**
 * Class AjaxResponse
 * @package Tony\BaseBundle\Common
 */
class AjaxResponse
{
    const ERR_SUCCESS       = 0;
    const ERR_NOT_MAN       = 1;
    const ERR_FAILED        = 2;
    const ERR_PARAM_ILLEGAL = 3;

    private static $errors = array(
        0 => 'Success',
        1 => 'It seems that you are not a man...',
        2 => 'failed',
        3 => 'Parameters Illegal !',
    );

    private static $ERROR_NO;

    /**
     * @param $error_no
     */
    public static function setErrorNo($error_no)
    {
        self::$ERROR_NO = $error_no;
    }

    /**
     * @param null $error_id
     * @param null $data
     * @return string
     */
    public static function encode($error_id = NULL, $data = NULL)
    {
        if (!$error_id) $error_id = self::ERR_SUCCESS;
        $error_msg = self::$errors[$error_id];
        if ($error_msg == NULL) $error_msg = 'Error!';
        $data = array(
            'errorId'  => $error_id,
            'errorMsg' => $error_msg,
            'data'     => $data
        );

        return json_encode($data);
    }
} 