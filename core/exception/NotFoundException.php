<?php

namespace app\core\exception;

class NotFoundException extends \Exception
{
    
        protected $message = "Page is not found";
        protected $code = 404;
}
