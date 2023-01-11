<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.customer.index');
    }

    public function getCustomers()
    {
        // $customers = User::select('id', 'name', 'email', 'is_blocked')->whereHas("roles", function($q){ $q->where("name", "Customer"); })
        //     ->latest();
            $customers = User::visible()->whereHas("roles", function($q){ $q->where("name", "Customer"); })->latest()->get();
        return DataTables::of($customers)
            ->addColumn('status', function ($customer) {
                if ($customer->is_blocked == 1) {
                    return
                        '<button class="btn btn-xs btn-danger" data-toggle="tooltip" data-placement="top" title="User Status"> Blocked </button>';
                } else {

                    return

                        '<a href="#" class="btn btn-xs btn-success" data-toggle="tooltip" data-placement="top" title="User Status">Active</a>';
                }
            })

            ->addColumn('action', function ($p) {
                return
                    '<a href="' . route('customer.edit', $p->id) . '" class="btn btn-sm btn-primary" data-toggle="tooltip" data-placement="top" title="Edit Blog"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>' . ' ' .
                    '<button onclick="deleteUser(' . $p->id . ')" class="btn btn-sm btn-danger remove"><i class="fa fa-trash-o"></i> </button>';
            })->rawColumns(['status', 'image', 'action'])
            ->make(true);
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
        $user = User::find($id);
        return view('admin.customer.edit', compact('user'));
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customer = User::find($id);
        $customer->delete();
    }
}
