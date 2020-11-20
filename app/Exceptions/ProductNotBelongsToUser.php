<?php

namespace App\Exceptions;

use Exception;

class ProductNotBelongsToUser extends Exception
{
    public function render()
    {
        return [
            'errors' => 'You dont have Permission to Edit/Delete this Product!'
        ];
    }
}
