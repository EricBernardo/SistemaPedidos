<?php

namespace App\Services;

use App\Entities\Order;

class OrderServices extends DefaultServices
{

    public function __construct()
    {
        $this->entity = Order::class;
    }

}

