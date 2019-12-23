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
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'role' => 'required',
        ]);
        $user = new User();
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        if(strlen($request->get('password'))){
            $user->password = bcrypt($request->get('password'));
        }
        $user->save();
        
        $user->assignRole($request->get('role'));
        return redirect()->back()->with('success', 'New User Created Successfully');
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
        $selectedRole = $user->roles()->pluck('name')->toArray()[0] ?? '';
        return view('admin.users.edit',compact('user','selectedRole'));
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
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|unique:users,email,'.$id,
            'role' => 'required',
        ]);
        $user = User::findOrFail($id);
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        if(strlen($request->get('password'))){
            $user->password = bcrypt($request->get('password'));
        }
        $user->save();
        $user->assignRole($request->get('role'));
        return redirect()->back()->with('success', 'User Edited Successfully');
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
            return redirect()->back()->with('warning', 'The user you wanted to delete does not exist.');
        }

        $user->delete();
        return redirect()->action('Admin\UserController@index')->with('success', 'The user has been deleted successfully');
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
