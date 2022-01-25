<?php

namespace App\Message;

final class UserClick
{
    /*
     * Add whatever properties & methods you need to hold the
     * data for this message class.
     */

     private $name;

     public function __construct(string $name)
     {
         $this->name = $name;
     }

    public function getName(): string
    {
        return $this->name;
    }
}
