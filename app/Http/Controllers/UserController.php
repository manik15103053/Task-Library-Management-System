<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use PhpParser\Node\Expr\FuncCall;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:user.index')->only(['index']);
        $this->middleware('can:user.create')->only(['create', 'store']);
        $this->middleware('can:user.edit')->only(['edit', 'update']);
        $this->middleware('can:user.delete')->only(['delete']);
    }
    public function index()
    {
        $data['users'] = User::with('roles')->whereNotIn('id', [1])->orderBy('id','desc')->paginate(8);
        return view('pages.user.user',$data);
    }

    public function create(){

        $data['roles'] = Role::latest()->get();
        return view('pages.user.create',$data);
    }

    public function store(Request $request){

            $request->validate([
                'name' => 'required',
                'email' => 'required|email|unique:users,email',
                'username' => 'required|unique:users,username',
                'password' => 'required|min:6|max:30',
                'roles' => 'required|array',
               
            ]);

            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->username = $request->username;
            $user->password = Hash::make($request->password);
            $user->save();
    
            $roles = Role::whereIn('id', $request->roles)->pluck('name')->toArray();
            $user->syncRoles($roles);

            return redirect()->route('user.index')->with('success','User Create Successfully');
    }

    public function edit($id){
        $data['roles'] = Role::latest()->get();
        $data['user'] = User::with('roles')->find($id);
        return  view('pages.user.edit',$data);
    }

    public function update(Request $request, $id)
{
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'username' => 'required|unique:users,username,' . $id,
            'password' => 'nullable|min:6|max:30', 
            'roles' => 'required|array',
        ]);


        $user = User::findOrFail($id);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->username = $request->username;
        
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        $roles = Role::whereIn('id', $request->roles)->pluck('name')->toArray();
        $user->syncRoles($roles);

        return redirect()->route('user.index')->with('success', 'User updated successfully');

    }

    public function delete($id)
    {
 
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('user.index')->with('success', 'User deleted successfully');
    }

}

