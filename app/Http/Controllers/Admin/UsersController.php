<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
        //$this->middleware('can:manageUsers,App\Models\User');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.users.index')->with('model', User::paginate(Config::get('app.pagination')));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        if(!Auth::user()->hasRole('admin') && Auth::user()->id != $user->id) {
            return redirect()->route('users.index')->with('status', 'You have enough permissions for this action');
        }

        return view('admin.users.edit')->with(['model' => $user, 'roles' => Role::all()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        if(!Auth::user()->hasRole('admin') && Auth::user()->id != $user->id) {
            return redirect()->route('users.index');
        }

        $user->fill($request->only('name','email'));
        $user->save();

        $user->roles()->sync($request->roles);

        return redirect()->route('users.index')->with('status', "$user->name was updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
