<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClientRequest;
use App\Services\ClientServices;

/**
 * Class ClientController
 * @package App\Http\Controllers
 */
class ClientController extends Controller
{

    private $services;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(ClientServices $services)
    {
        $this->middleware('auth');
        $this->services = $services;
    }

    public function index()
    {
        $results = $this->services->paginate();
        return view('adminlte::client.index', compact('results'));
    }

    public function create()
    {
        return view('adminlte::client.create');
    }

    public function store(ClientRequest $request)
    {
        return $this->services->create($request->all());
    }

    public function edit($id)
    {
        $result = $this->services->show($id);
        return view('adminlte::client.edit', compact('result'));
    }

    public function update(ClientRequest $request, $id)
    {
        return $this->services->update($request->all(), $id);
    }

    public function destroy($id)
    {
        return $this->services->delete($id);
    }


}