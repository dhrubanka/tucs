<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Facade\FlareClient\Http\Response;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class UserController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
    }




    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)

    {

            if (Auth::user()->hasAnyRole(['admin'])) {
                $users = User::with('roles')->role(['moderator', 'student', 'alumni', 'professor'])->paginate(15);
            } else {
                $users = User::with('roles')->role(['student', 'alumni', 'professor'])->paginate(15);
            }


            return view('admin.users.index', ['users' => $users]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {


            if (Auth::user()->hasAnyRole(['admin'])) {

                $roles = Role::all()->whereNotIn('name', ['admin']);
            } else {

                $roles = Role::all()->whereNotIn('name', ['admin', 'moderator']);
            }

            // ddd(response()->json($roles));
            return view('admin.users.create', ['roles' => $roles]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|string|unique:users,email|email|max:255',
            'password' => 'required|string|min:6|max:255',
            'role' =>  'required',
        ]);



        if ($request->is('api/*')) {
            $user =  \App\Models\User::factory()->create([
                'username' => $request->name,
                'email' => $request->email,
                'password' =>  Hash::make($request->password),
            ]);

            $user->assignRole($request->role);
            //write your logic for api call
            $response = [
                'status' => 'success',
                'msg' => 'Successfully registered a new user!'
            ];

            return response($response, 201);
        } else {

            $user =  \App\Models\User::factory()->create([
                'username' => $request->name,
                'email' => $request->email,
                'password' =>  Hash::make($request->password),

            ]);

            $user->assignRole($request->role);

            //write your logic for web call
            return back()->with('success', 'Successfully registered a new user!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $user = User::find($id);
        $permissions = $user->getAllPermissions();
        $role = $user->getRoleNames();


        if ($request->is('api/*')) {
            //write your logic for api call
            $response = [
                'status' => 'success',
                'user' => $user,
                'role' => $role,
                'permissions' => $permissions
            ];

            return response($response, 201);
        } else {
            //write your logic for web call
            return view('admin.users.show', ['user' => $user, 'role' => $role, 'permissions' => $permissions]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit(Request $request, $id)
    {
        if ($request->is('api/*')) {
            $loggedinUser = User::where('email', $request->email)->first();
            $user = User::find($id);

            if ($user->hasAnyRole(['admin']) && ($loggedinUser->email != $user->email)) {
                return response(['error' => 'Unauthenticated.'], 401);
            }

            $role = $loggedinUser->getRoleNames();
            if ($user->hasAnyRole(['super-admin']) && ($role[0] != 'super-admin')) {
                return response(['error' => 'Unauthenticated.'], 401);
            }

            if ($loggedinUser->hasAnyRole(['super-admin'])) {
                $roles = Role::all()->whereNotIn('name', ['super-admin']);
            } else {
                $roles = Role::all()->whereNotIn('name', ['super-admin', 'admin']);
            }
            //$user = User::where('email', $request->email)->first();
            $role = $user->getRoleNames();
            //ddd($role[0]);
            //return view('user.edit', ['user' => $user, 'role' => $role[0], 'roles' => $roles]);

            $response = [
                'user' => $user,
                'role' => $role[0],
                'roles' =>  $roles
            ];

            return response($response, 201);
        } else {

            $user = User::find($id);
            if ($user->hasAnyRole(['admin']) && (Auth::user()->email != $user->email)) {
                return abort(403, 'Unauthorized action.');
            }
            $role = Auth::user()->getRoleNames();
            //dd($role[0]);
            if ($user->hasAnyRole(['super-admin']) && ($role[0] != 'super-admin')) {
                return abort(403, 'Unauthorized action.');
            }

            if (Auth::user()->hasAnyRole(['super-admin'])) {

                $roles = Role::all()->whereNotIn('name', ['super-admin']);
            } else {

                $roles = Role::all()->whereNotIn('name', ['super-admin', 'admin']);
            }

            $role = $user->getRoleNames();
            //ddd($role[0]);
            return view('admin.users.edit', ['user' => $user, 'role' => $role[0], 'roles' => $roles]);
        }
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
        //$some = $request->id;
        $user = User::find($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'present|email|max:255|unique:users,email,' . $user->id . '|nullable',
            // 'email' => 'required|string|unique:users,email|email|max:255',
            'phone' => 'required|digits_between:10,12',
            //'password' => 'nullable|confirmed|min:6|max:255',
        ]);


        if ($request->is('api/*')) {
            $loggedinUser = User::where('email', $request->email)->first();
            if ($user->hasAnyRole(['admin']) && ($loggedinUser->email != $user->email)) {
                return response(['error' => 'Unauthenticated.'], 401);
            }
            $role = $loggedinUser->getRoleNames();
            if ($user->hasAnyRole(['super-admin']) && ($role[0] != 'super-admin')) {
                return response(['error' => 'Unauthenticated.'], 401);
            }
            if(request('password') != null){
                $user->update([
                    'password' => Hash::make($request->password),
                ]);
            }
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'phone' =>  $request->phone,
            ]);

            //$user->assignRole($request->role);
            $affected = DB::table('model_has_roles')
                ->where('model_id', $id)
                ->update(['role_id' => $request->role]);
            //write your logic for api call
            $response = [
                'status' => 'success',
                'msg' => 'Successfully updated user!'
            ];

            return response($response, 201);
        } else {
            if ($user->hasAnyRole(['admin']) && (Auth::user()->email != $user->email)) {
                return abort(403, 'Unauthorized action.');
            }
            $role = Auth::user()->getRoleNames();
            //dd($role[0]);
            if ($user->hasAnyRole(['super-admin']) && ($role[0] != 'super-admin')) {
                return abort(403, 'Unauthorized action.');
            }
            if(request('password') != null){
                $user->update([
                    'password' => Hash::make($request->password),

                ]);
            }

            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'phone' =>  $request->phone,

            ]);

            //$user->assignRole($request->role);
            $affected = DB::table('model_has_roles')
                ->where('model_id', $id)
                ->update(['role_id' => $request->role]);

            //write your logic for web call
            return back()->with('success', 'Successfully updated user!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $user = User::find($id);


        if ($request->is('api/*')) {
            //write your logic for api call
            $loggedinUser = User::where('email', $request->email)->first();

            if ($user->hasAnyRole(['admin']) && ($loggedinUser->email != $user->email)) {
                return response(['error' => 'Unauthenticated.'], 401);
            }

            $user->delete();
            $response = [
                'status' => 'success',
                'msg' => 'Successfully deleted user!'
            ];

            return response($response, 201);
        } else {

            if ($user->hasAnyRole(['admin']) && (Auth::user()->email != $user->email)) {
                return abort(403, 'Unauthorized action.');
            }

            $user->delete();
            //write your logic for web call
            return back()->with('success', 'Successfully deleted user!');
        }
    }

    public function editprofile(Request $request, $id)
    {
        if ($request->is('api/*')) {
            $loggedinUser = User::where('email', $request->email)->first();
            $user = User::find($id);

            if($loggedinUser->email != $user->email) {
                return response(['error' => 'Unauthenticated.'], 401);
            }
            $role = $user->getRoleNames();
            $response = [
                'user' => $user,
                'role' => $role[0]
            ];

            return response($response, 201);

        } else {

            $user = User::find($id);
            if (Auth::user()->email != $user->email) {
                return abort(403, 'Unauthorized action.');
            }
            $role = $user->getRoleNames();
            //ddd($role[0]);
            return view('user.myprofile', ['user' => $user, 'role' => $role[0] ]);
        }
    }

    public function updateprofile(Request $request, $id)
    {
        //$some = $request->id;
        $user = User::find($id);
        // if (!$request->has('password') {
        //     $request->except('password');
        // }

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'present|email|max:255|unique:users,email,' . $user->id . '|nullable',
            // 'email' => 'required|string|unique:users,email|email|max:255',
            'phone' => 'required|digits_between:10,12',


        ]);




        if ($request->is('api/*')) {

            $loggedinUser = User::where('email', $request->email)->first();

            if ($loggedinUser->email != $user->email) {
                return response(['error' => 'Unauthenticated.'], 401);
            }
            if(request('password') != null){
                $user->update([
                    'password' => Hash::make($request->password),
                ]);
            }

            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'phone' =>  $request->phone,

            ]);



            //write your logic for api call
            $response = [
                'status' => 'success',
                'msg' => 'Successfully updated user!'
            ];

            return response($response, 201);
        } else {
            if (Auth::user()->email != $user->email) {
                return abort(403, 'Unauthorized action.');
            }
           // dd(request('password'));
            if(request('password') != null){
                $user->update([
                    'password' => Hash::make($request->password),

                ]);
            }

            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'phone' =>  $request->phone,


            ]);


            //write your logic for web call
            return back()->with('success', 'Successfully updated user!');
        }
    }
}
