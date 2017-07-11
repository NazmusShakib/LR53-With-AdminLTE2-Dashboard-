<?php

namespace App\Http\Controllers;

use App\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Mockery\Exception;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Todo::all();
        return $data;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:20',
            'subject' => 'max:50',
            'message' => 'required|max:250'
        ]);
        if ($validator->fails()) {
            $data = $validator->messages();
            return response()->json(['data' => $data], 422);
        }
        try {
            Todo::create([
                'name' => $request->name,
                'subject' => $request->subject,
                'message' => $request->message
            ]);
            return response()->json('Data saved successfully.', 200);
        } catch (Exception $e) {
            return response()->json('Failed to save.', 412);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Todo::findOrFail($id);
        return $data;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Todo::findOrFail($id);
        return $data;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:20',
            'subject' => 'max:50',
            'message' => 'required|max:250'
        ]);
        if ($validator->fails()) {
            $data = $validator->messages();
            return response()->json(['data' => $data], 422);
        }

        $data = Todo::findOrFail($id);
        $data->fill($request->all());

        if ($data->save()) {
            return response()->json('Data updated successfully.', 200);
        } else {
            return response()->json('Failed to update.', 412);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Todo::findOrFail($id);
        if ($data->delete()) {
            return response()->json('Data deleted successfully.', 200);
        } else {
            return response()->json('Failed to delete.', 412);
        }
    }
}
