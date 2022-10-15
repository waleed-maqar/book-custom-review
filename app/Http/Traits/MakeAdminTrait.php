<?php

namespace App\Http\Traits;

use App\Models\Admin\Admin;

trait MakeAdminTrait
{
    public function addToAdmins($role = 'moderator')
    {
        Admin::firstOrCreate(
            ['email' => $this->email],
            [
                'user_id' => $this->id,
                'email' => $this->email,
                'password' => $this->password,
                'role' => $role
            ]
        );
    }
    //
    public function removeFromAdmins($id)
    {
        $admin = Admin::find($id);
        $admin->delete();
    }
    //
    public function changeRole($id, $role)
    {
        $admin = Admin::find($id);
        $admin->role = $role;
        $admin->save();
    }
}