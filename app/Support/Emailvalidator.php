<?php
namespace App\Support;

use InvalidArgumentException;

class EmailValidator
{
    public function validate($email)
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new InvalidArgumentException('Invalid email format');
        }
    }
}

?>