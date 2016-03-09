<?php
namespace App\Http\Controllers;

use DB;
use App\user;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RolePrivilegController extends Controller {
	function usersinfo() {
		$rows = DB::table('users')->get();
		$roles = DB::table('roles')->get();
		/*
		Select the user id from role_user table then its corresponding name from users table
		*/
		$users = DB::table('role_user')
		           ->select('user_id')
		           ->get();
	    
	    foreach ($users as $user) {
		    $userassign[] = DB::table('users')
		                 ->select('name')
		                 ->where('id',$user->user_id)
		                 ->first();
		}

        /*
        Select Role_id from role_user table and Rolename from Parents table roles table
        */
	    $assingrole = DB::table('role_user')
		                ->select('role_id')
		                ->get();

		foreach ($assingrole as $role) {
		    $roleassigned[] = DB::table('roles')
		 	                    ->select('role_name')
		 	                    ->where('id',$role->role_id)
		 	                    ->first();
		}

		return view('allusers', array('rows' => $rows,
			                          'roles' => $roles,
			                          'userassign' => $userassign,
			                          'roleassign' => $roleassigned
			                        ));

	}

	function privilegeusers() {
		$rows = DB::table('roles')
		          ->get();
        $data = array('rows' => $rows);

        return view('privilege', $data);
	}

	function roleresperm() {
	//Selecting Data From Database and Showing Role Resource and Perms
		$rows = DB::table('roles')
		          ->get();
		$resources = DB::table('resources')
		               ->get();
		$permissions = DB::table('permissions')
		                 ->get();
		
        return view('role', array(
        	                    'rows' => $rows,
        	                    'resources' => $resources,
        	                    'permissions' => $permissions
        	                    ));
	}

    //Inserting new Resources Role and Permissions
    function newroleresperm(Request $request) {
		$newrole = $request['newrole'];
		$newperm = $request['newpermission'];
		$newres = $request['newresource'];
		$operation = $request['submit'];
		$role = $request['role'];
		$resource = $request['resource'];
		$perm = $request['newperm'];

		if ($newrole=="" || $newperm =="" || $newres =="") {
           
           return redirect('roleresourceperm')->with('status','Please Enter Text Value');
		}

	    //Adding NewResource ,NewRole And NewPermission
		if ($operation == "AddRole") {
            DB::table('roles')
              ->insert(['role_name' => $newrole]);
        }
        elseif ($operation == "AddResource") {
            DB::table('resources')
              ->insert(['resource_name' => $newres]);
        }
        elseif ($operation == "AddPermission") {
            DB::table('permissions')
              ->insert(['permission_name' => $newperm]);
        }

        //Deleting Existing Role Permission and Resources
        if ($operation == "DeleteRole") {
            DB::table('roles')
              ->where('role_name',$role )
              ->delete();   
        }

        if ($operation == "DeleteResource") {
            DB::table('resources')
              ->where('resource_name',$resource )
              ->delete();   
        }

        if ($operation == "DeletePermission") {
            DB::table('permissions')
              ->where('permission_name',$perm )
              ->delete();   
        }

        return redirect('roleresourceperm')->with('operation', 'Sucessfully Added new Records');
       
	}
    
    //This is Role Change Method, After selecting Username
	function rolechange(Request $request) {
		$roleid= $request['role'];
		$userid= $request['users'];
		$operation = $request['submit'];
		
		if ($roleid ==0 || $userid==0) {
			
			return redirect('allusers')->with('operation', 'Please Select Username/UserType');
		}

		if ($operation == 'Add') {
			DB::table('role_user')
			  ->insert(
	                   ['role_id' => $roleid,
	                    'user_id' => $userid]                          
	                );
			
			return redirect('allusers')->with('operation', 'Records Successfully Updated');
		}

		if ($operation == 'Delete') {
			DB::table('role_user')
			  ->where('role_id', $roleid)
			  ->where('user_id', $userid)
			  ->delete();
			
			return redirect('allusers')->with('operation', 'Records Successfully Updated');
		}
		
	}
}
