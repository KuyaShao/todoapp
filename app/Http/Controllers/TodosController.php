<?php

namespace App\Http\Controllers;
use Session;
use Illuminate\Http\Request;
use App\Todo;
class TodosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $todos = Todo::all();
        return view('todos',compact('todos'));
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $todos = new Todo;
        $todos->name = $request->todosname;
        $todos->save();
        Session::flash('success',"Your todo was created");
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $todos = Todo::findorfail($id);
        return view('/edit',compact('todos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $todo = Todo::find($id);
        $todo->name = $request->updatetodos;
        $todo->save();
        Session::flash('success',"Your todo was updated");
        return redirect()->route('home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $del = Todo::find($id);
        $del->delete();
        Session::flash('success',"Your todo was deleted");
        return redirect()->back();
    }

    public function complete($id)
    {
        $todo = Todo::find($id);
        $todo->completed = 1;
        $todo->save();
        Session::flash('success',"Congrats! Your todo was completed");
        return redirect()->back();
    }
}
