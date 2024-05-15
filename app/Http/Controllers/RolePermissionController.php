<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class RolePermissionController extends Controller
{
    public function assignRoleToUser(Request $request, $userId){

        $user = User::find($userId);

        
    }
}
