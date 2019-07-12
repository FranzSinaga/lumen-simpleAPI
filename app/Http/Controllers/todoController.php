<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;

class todoController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function index(){
        $data = User::all();
        return response($data);
    }

    public function show($id){
        $data = User::where('id', $id)->get();
        return response($data);
    }

    public function store(Request $request){
        $data = new User();
        $data->activity = $request->input('activity');
        $data->description = $request->input('description');
        $data->save();

        return response('success');
    }

    public function update($id, Request $request){
        $data = User::where('id', $id)->first();
        $data->activity = $request->input('activity');
        $data->description = $request->input('description');
        $data->save();

        return response('success');
    }

    public function destroy($id){
        $data = User::where('id', $id)->first();
        $data->delete();

        return response('success');
    }
}