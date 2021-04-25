<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use App\Models\Project as ProjectModel;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $items = ProjectModel::all();

      return view('projects.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('projects.create');
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
          'name'=>'required',
      ]);

      $item = new ProjectModel([
          'name' => $request->get('name'),
          'author_id' => "1",
          'edited_by' => "1",
      ]);

      $item->save();
      return redirect('/projects')->with('success', 'Item saved!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProjectModel  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $item)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProjectModel  $project
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $item = ProjectModel::find($id);
      return view('projects.edit', compact('item'));
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

      $item = ProjectModel::find($id);
      $item->name =  $request->get('name');
      $item->save();

      return redirect('/projects')->with('success', 'Item updated!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProjectModel  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $item = ProjectModel::find($id);
      $item->delete();

      return redirect('/projects')->with('success', 'Item deleted!');
    }

    public function adduser($id)
    {
      $item = ProjectModel::find($id);
      return view('projects.add', compact('item'));
    }

    public function add(Request $request, $id)
    {
      $request->validate([
          'user_id'=>'required',
      ]);

      $user = User::find($request->get('user_id'));
      $projectIds = [$id];
      $user->projects()->attach($projectIds);

      return redirect('/projects')->with('success', 'Item updated!');

    }
}
