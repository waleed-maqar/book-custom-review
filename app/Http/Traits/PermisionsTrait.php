<?php

namespace App\Http\Traits;

use Illuminate\Support\Facades\Auth;

trait PermisionsTrait
{
    public function owner($id)
    {
        if (Auth::check() && Auth::id() == $id) {
            return true;
        }
        return false;
    }
    public function OwnerRedierect($id, $message = 'You Are Not Allowed To Visit This Page')
    {
        if (!$this->owner($id)) {
            return redirect('/')->withErrors(['not_allowed' => $message]);
        }
    }
}