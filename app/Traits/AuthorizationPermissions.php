<?php
    
namespace App\Traits;

use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Support\Facades\Auth;

trait AuthorizationPermissions
{
    
    //Check auth and permissions
    protected function checkPermissionsOrFail(string $permissions, string $guard='web'): void
    {
        /**@var User $user */
        $user = Auth::user();
        if(!$user || !$user->hasPermissionTo($permissions, $guard))
        {
            throw new AuthorizationException();
        }
    }
}