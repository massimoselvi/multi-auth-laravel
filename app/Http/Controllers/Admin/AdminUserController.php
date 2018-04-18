<?php

namespace App\Http\Controllers\Admin;

use App\AdminUser;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $adminUsers = AdminUser::paginate();
        return view('admin.users.index', compact('adminUsers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
    //     //
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(Request $request)
    // {
    //     //
    // }

    /**
     * Display the specified resource.
     *
     * @param  \App\AdminUser  $user
     * @return \Illuminate\Http\Response
     */
    public function show(AdminUser $user)
    {
        return view('admin.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AdminUser  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(AdminUser $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AdminUser  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AdminUser $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AdminUser  $user
     * @return \Illuminate\Http\Response
     */
    // public function destroy(AdminUser $user)
    // {
    //     //
    // }
}
