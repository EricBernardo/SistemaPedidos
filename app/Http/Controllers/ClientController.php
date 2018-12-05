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
        $clients = $this->services->paginate();
        return view('adminlte::client.index', compact('clients'));
    }

    public function create()
    {
        return view('adminlte::client.create');
    }

    public function store(ClientRequest $request)
    {
die("FIM");
        return $this->service->create($request->all());

    }

    public function show($id)
    {

        $result = $this->repository->find($id);

        if (request()->wantsJson()) {
            return $result;
        }

        return view('page.company.show', compact('result'));

    }

    public function edit($id)
    {

        $result = $this->repository->find($id);

        return view('page.company.edit', compact('result'));

    }

    public function update(CompanyUpdateRequest $request, $id)
    {

        return $this->service->update($request->all(), $id);

    }

    public function destroy($id)
    {

        return $this->service->delete($id);

    }


}