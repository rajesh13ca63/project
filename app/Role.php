<?php

namespace App;
use App\Role;
use Illuminate\Database\Eloquent\Model;

class Role extends Model {
    public function permissions() {
    	return $this->belongsToMany(Permission::class);
    }

    public function assign(Permission $permission) {
    	return $this->permissions()->save($permission);
    }
}
