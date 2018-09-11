<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    public function presetPrice()
    {
        return money_format('$%i', $this->price / 1000);
    }
}
