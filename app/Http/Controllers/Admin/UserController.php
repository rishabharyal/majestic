<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users = new User();

        if ($request->get('search')) {
            $users = $users->where('name', $request->get('search'));
        }
        $users = $users->get();

        return view('admin.users.index', compact('users'));
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
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\r  $r
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\r  $r
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        dd($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\r  $r
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if (!$user) {
            return redirect()->back()->with('message', 'The user you wanted to delete does not exist.');
        }

        $user->delete();
        return redirect()->action('Admin\UserController@index')->with('message', 'The user you wanted to delete does not exist.');
    }

    /**
    * Suspend or un-susped the user
    *
    * @param $id
    *
    */

    public function suspend($id)
    {
        $user = User::find($id);
        if (!$user){
            return redirect()->back()->with('warning', 'The user you wanted to suspend does not exist.');
        }

        $user->is_suspended = !$user->is_suspended;
        $user->save();

        return redirect()->back()->with('success', 'The user is now suspended. This user won\'t be able to login anymore.');

    }
}
