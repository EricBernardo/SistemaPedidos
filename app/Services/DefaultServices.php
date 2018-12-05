<?php

namespace App\Services;

class DefaultServices
{

    protected $entity;

    public function create($data)
    {

        $result = $this->entity::create($data);

        if (request()->wantsJson()) {
            return $result;
        }

        $response = [
            'message' => 'Updated.',
        ];

        return redirect()->back()->with('success', $response['message']);

    }

    public function update($data, $uuid)
    {

        $result = $this->entity::where('uuid', $uuid)->first();

        $result->update($data);

        if (request()->wantsJson()) {
            return $result;
        }

        $response = [
            'message' => 'Updated.',
        ];

        return redirect()->back()->with('success', $response['message']);

    }

    public function delete($id)
    {

        $result = $this->entity::where('id', $id);

        $result->delete();

        if (request()->wantsJson()) {
            return null;
        }

        $response = [
            'message' => 'Deleted.',
        ];

        redirect()->back()->with('success', $response['message']);

    }

    public function all()
    {
        return $this->entity::all();
    }

    public function show($id)
    {
        return $this->entity::where('id', '=', $id)->get();
    }

    public function paginate()
    {
        return $this->entity::paginate();
    }

}
