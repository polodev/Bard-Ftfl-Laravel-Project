<?php

namespace App\Http\Controllers;
use App\Http\Requests\UserRegistrationRequest;
use App\Info;
use App\Role_user;
use App\Trainer;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Bican\Roles\Models\Role;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UserRoleRequest;

class UsersController extends Controller
{
    public function __construct()
    {


        //$this->middleware('admin', ['except' => ['not_allowed', 'redirection_page']]);

    }

    public function redirection_page()
    {
        return view('auth/redirection_page');
    }
    public function not_allowed($role)
    {
        return view('auth/not_allowed')->with('role', $role);
    }
    public function show_user_registration_form()
    {
        $roles = Role::all();
       return view('user.user_registration')->with('roles', $roles);
    }

    public function role_name_by_user_id($user_id)
    {
        $role_id = Role_user::whereUser_id($user_id)->first()->role_id;
       return Role::whereId($role_id)->first()->name;

    }
    public function role_id_by_user_id($user_id)
    {
        return Role_user::whereUser_id($user_id)->first()->role_id;

    }

    public function store_user_and_assign_role_to_them(UserRegistrationRequest $request)
    {
        $user = new User();
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->password = bcrypt($request->get('password'));
        $user->remember_token = $request->get('_token');
        if($user->save()){
            $user_id =  $user->id;
            $role_user = new Role_user();
            $role_user->role_id = $request->get('role_id');
            $role_user->user_id = $user_id;
            $role_user->save();
        }
        return redirect('user/registration')->with('status', 'User Created successfully');
    }

    public function create_user_role()
    {
        return view('user.create_user_role');
    }

    public function store_user_role(UserRoleRequest $request)
    {
        $data = [
            'name' => $request->get('role_name'),
            'slug' => $request->get('role_slug'),
            'description' => $request->get('role_description'),
            'level' => $request->get('role_level')
        ];
        $role = new Role($data);
        $role->save();
        $status = $request->get('role_slug') . " Role is created";
        return redirect('user/create_user_role')->with('status', $status);
    }

    public function all_user()
    {
        $user_details=[];
        $users = User::orderBy('created_at', 'desc')->paginate(20);
        foreach($users as $user){
            $user_id = $user->id;
            $role_name = $this->role_name_by_user_id($user_id);
            $user_details[] = [
                'user_id' => $user->id,
                'user_name' => $user->name,
                'user_email' => $user->email,
                'user_role' => $role_name
            ];
        }
        return view('user.all_user')->with('user_details', $user_details)->with('users', $users);
    }

    public function delete_user($id)
    {
        return 'hello world';
    }
    public function edit_user($id)
    {
        $user = User::findOrFail($id);
        $role_id = Role_user::whereUser_id($user->id)->first()->role_id;
        $roles = Role::all();
        return view('user.edit_user', compact('roles'), compact('user'))->with('role_id', $role_id);
    }
    public function deleteUser($id)
    {
        $user = User::findOrFail($id)->delete();
        return redirect('/user/all');
    }

    public function update_user($id, Request $request)
    {
        $user = User::findOrFail($id);
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->save();
        $role_user = Role_user::whereUser_id($user->id)->first();
        $role_user->role_id = $request->get('role_id');
        $role_user->save();
        return redirect('user/all')->with('status', 'User info update successfully');
    }

    public function user_search(Request $request)
    {
        $search_term = $request->get('search_term');
        if($search_term == "name"){
           $name = $request->get('search_keyword');
            $users = User::where('name', 'like', "%$name%")->orderBy('created_at', 'desc')->get();
        }elseif($search_term == "email"){
           $email = $request->get('search_keyword');
            $users = User::where('email', 'like', $email)->get();
        }
        $user_details=[];
        foreach($users as $user){
            $user_id = $user->id;
            $role_name = $this->role_name_by_user_id($user_id);
            $user_details[] = [
                'user_id' => $user->id,
                'user_name' => $user->name,
                'user_email' => $user->email,
                'user_role' => $role_name
            ];
        }
        return view('user.search_users')->with('user_details', $user_details)->with('users', $users);
    }
}
