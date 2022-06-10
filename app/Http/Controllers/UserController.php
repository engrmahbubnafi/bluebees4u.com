<?php

namespace App\Http\Controllers;

use App\Models\Designation;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::with([
            'role' => function ($q) {
                $q->select('id', 'name');
            },
            'designation' => function ($q) {
                $q->select('id', 'title');
            },
        ])
            ->get();
        return view('admin.user.index', compact('users'));
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $users = User::findOrFail($id);
        dd($users);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $roles = Role::pluck('name', 'id');
        $designations = Designation::pluck('title', 'id');
        $users = User::findOrFail($id);

        return view('admin.user.edit', compact('users', 'roles', 'designations'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string',
            'role_id' => 'required|string',
            'designation_id' => 'required',
            'email' => 'required',
            'status' => 'required',
        ]);
        $user = User::find($id);
        $old_image_name = $user->photo;
        $imageName = null;
        $file = request()->file('photo');
        if ($file != null) {
            $imageName = time() . '_' . $file->getClientOriginalName();
        }
        $file_name = $old_image_name;
        if ($imageName != null) {
            $file->storeAs('/public/profile_photo', $imageName);
            $file_name = '/profile_photo/' . $imageName;
        }


        $user->name = $request->name;
        $user->role_id = $request->role_id;
        $user->designation_id = $request->designation_id;
        $user->email = $request->email;
        $user->status = $request->status;
        $user->photo = $file_name;
        if ($request->password != '') {
            $user->password = bcrypt($request->password);
        }
        $user->save();
        if ($request->redirect_page) {
            return redirect()->back()->with('flash_success', "Data Save");
        }
        return redirect()->route('users.index')
            ->with('flash_success', "Data Save");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $users = User::findOrFail($id)->delete();

        return redirect()->route('users.index')
            ->with('flash_success', "Data Deleted");

    }

    public function setProfile()
    {
        $id = Auth::user()->id;
        $roles = Role::pluck('name', 'id');
        $designations = Designation::pluck('title', 'id');
        $users = User::findOrFail($id);

        return view('admin.user.user-profile', compact('users', 'roles', 'designations'));

    }

    public function PasswordReset($id)
    {
        $users = User::findOrFail($id);
        return view('admin.user.password-reset', compact('users',));
    }

    public function saveResetPassword(Request $request, $id)
    {
        $request->validate([
            'password' => 'required|string|min:6|confirmed',
        ]);
        $user = User::find($id);
        if ($request->password != '') {
            $user->password = bcrypt($request->password);
        }
        $user->save();
        return redirect()->route('users.index')
            ->with('flash_success', "Password reset Save");
    }

}
