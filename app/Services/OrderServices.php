<?php

namespace App\Services;

use App\Entities\Order;
use App\Entities\Product;

class OrderServices extends DefaultServices
{

    public function __construct()
    {
        $this->entity = Order::class;
    }

    public function paginate()
    {
        return $this->entity::orderBy('created_at', 'desc')->with('client')->paginate();
    }

    public function create($data)
    {
        $data_insert = array();

        $data_insert['client_id'] = $data['client_id'];
        $data_insert['discount'] = str_replace(',', '.', (str_replace('.', '', ($data['discount'] > 0 ? $data['discount'] : 0))));
        $data_insert['subtotal'] = 0;
        $data_insert['total'] = 0;

        foreach ($data['product_id'] as $i => $id) {
            $product = Product::where('id', '=', $id)->get()->first();
            $data_insert['subtotal'] += ($product['price'] * ($data['quantity'][$i]));
        }

        $data_insert['total'] = ($data_insert['subtotal'] - $data_insert['discount']);

        $data_insert['paid'] = $data['paid'] ? date('Y-m-d H:i:s') : null;

        $result = $this->entity::create($data_insert);

        if (request()->wantsJson()) {
            return $result;
        }

        $response = [
            'message' => 'Created.',
        ];

        return redirect()->back()->with('success', $response['message']);

    }

}

