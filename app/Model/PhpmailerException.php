<?php
/**
 * CLASS
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018-8-8
 * Time: 17:27
 */

namespace App\Model;
use Exception;

class PhpmailerException extends Exception
{
    public function errorMessage()
    {
        $errorMsg = '<strong>' . $this->getMessage() . "</strong><br />\n";
        return $errorMsg;
    }
}