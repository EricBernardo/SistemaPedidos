<?php

namespace App\Http\Controllers;

use App\Entities\Client;
use App\Http\Requests\OrderRequest;
use App\Services\OrderServices;

/**
 * Class OrderController
 * @package App\Http\Controllers
 */
class OrderController extends Controller
{

    private $services;

    /**
     * Create a new controller instance.
     *
     * @param OrderServices $services
     */
    public function __construct(OrderServices $services)
    {
        $this->middleware('auth');
        $this->services = $services;
    }

    public function index()
    {
        $results = $this->services->paginate();
        return view('adminlte::pages.order.index', compact('results'));
    }

    public function create()
    {
        $clients = Client::all(['id', 'title']);
        return view('adminlte::pages.order.create', compact('clients'));
    }

    public function store(OrderRequest $request)
    {
        return $this->services->create($request->all());
    }

    public function view($id)
    {
        $result = $this->services->show($id);
        return view('adminlte::pages.order.view', compact('result', 'clients'));
    }

    public function destroy($id)
    {
        return $this->services->delete($id);
    }


}
