<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TeamRequest;
use App\Models\Team;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class TeamController extends CommonController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teams = Team::latest()->get();
        return view('admin.team.index', compact('teams'));
    }

    public function getTeams()
    {
        $teams = Team::select('id', 'name', 'phone', 'designation', 'profile')->latest();
        return DataTables::of($teams)
            ->addColumn('image', function ($team) {
                return '<img src=' . $team->profile . '  class="news_img" align="center" />';
            })
            ->addColumn('action', function ($p) {
                return
                    '<a href="' . route('team.edit', $p->id) . '" class="btn btn-sm btn-primary" data-toggle="tooltip" data-placement="top" title="Edit Blog"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>' . ' ' .
                    '<button onclick="deleteCity(' . $p->id . ')" class="btn btn-sm btn-danger remove"><i class="fa fa-trash-o"></i> </button>';
            })->rawColumns(['image', 'action'])
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $team = new Team();
        return view('admin.team.form', compact('team'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TeamRequest $request)
    {
        try {
            Team::create($request->validated());
            return redirect(route('team.index'))->with('message', 'Team saved successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error',$th->getMessage())->withInput();
        }
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
    public function edit(Team $team)
    {
        return view('admin.team.form', compact('team'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TeamRequest $request, Team $team)
    {
        try {
            $team->update($request->validated());
            return back()->with('message', 'Team updated successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage())->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Team $team)
    {
        $this->deleteImage('team', $team->profile);
        $team->delete();
    }
}
