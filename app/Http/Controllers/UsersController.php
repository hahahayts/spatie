<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; 

class UsersController extends Controller
{
    public function index(){
        
        $users = User::with(['roles', 'permissions'])->get(); 
    
        return view('pages.admin.users_page', ['users' => $users]);
    }
    


    public function getUser(User $user){
    
        return view('pages.admin.edit_permission', ['user' => $user]); 

    }
    public function editPermission(Request $req, User $user) {
        // Ensure permissions are passed as an array
        if ($req->has('permissions')) {
            // Sync the permissions passed from the form
            $user->syncPermissions($req->permissions);
        }
    
        // Assign role if provided
        if ($req->has('role')) {
            $user->assignRole($req->role);
        }
    
        // Reload the user to get the updated permissions
        $user->load('permissions'); // This will reload the user's permissions
    
        // return redirect()->route('users.editPermission')->with('success', 'Permissions updated successfully');
        return redirect()->route('users.editPermission', ['user' => $user->id])->with('success', 'Permissions updated successfully');

    }

    public function deleteUser($id) {
        $user = User::find($id);
        if ($user) {
            $user->delete();
        }
        return redirect()->route('users.editPermission')->with('success', 'User deleted successfully');
    }
    
    
    
    
}
