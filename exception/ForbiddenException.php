<?php

namespace app\core\exception;

class ForbiddenException extends \Exception {

    protected $message = 'You Dont have permission to access this page';
    protected $code = 403;

}