<?php

namespace App\Services;

use App\Entities\Client;

class ClientServices extends DefaultServices
{

    public function __construct()
    {
        $this->entity = Client::class;
    }

}

