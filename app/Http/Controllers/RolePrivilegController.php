<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use App\user;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class RolePrivilegController extends Controller {
	function usersinfo() {
		$rows = DB::table('users')->get();
		$roles= DB::table('roles')->get();
		return view('allusers', array('rows' => $rows,
			                          'roles' => $roles
			                    ));
	}

	function privilegeusers() {
		$rows = DB::table('roles')->get();
        $data = array('rows' => $rows);
        return view('privilege', $data);
	}

	function roleresperm() {
		$rows = DB::table('roles')->get();
		$resources = DB::table('resources')->get();
        return view('role', array('rows' => $rows));

	}
}
