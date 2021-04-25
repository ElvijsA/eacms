<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $items = User::all();

      return view('users.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|unique:users,email',
        'password' => 'required|string|min:6|confirmed'
      ]);

      $item = new User([
          'name' => $request->get('name'),
          'author_id' => "1",
          'edited_by' => "1",
          'password' => bcrypt($request->get('password')),
          'email' => $request->get('email')
      ]);

      $item->save();

      $item->createToken('API Token')->plainTextToken;

      return redirect('/users')->with('success', 'User created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProjectModel  $project
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $item = User::find($id);
      return view('users.show', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProjectModel  $project
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $item = User::find($id);
      return view('users.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProjectModel  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $request->validate([
          'name'=>'required',
      ]);

      $item = User::find($id);
      $item->name =  $request->get('name');
      $item->save();

      return redirect('/users')->with('success', 'Item updated!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProjectModel  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $item = User::find($id);
      $item->delete();

      return redirect('/users')->with('success', 'Item deleted!');
    }
}
