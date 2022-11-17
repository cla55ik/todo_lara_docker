<?php

namespace App\Helpers;

use Illuminate\Http\Request;
use Illuminate\Session\Store;

class SessionHelper implements HelperInterface
{
    public function getSession(Request $request, string $sessionName): mixed
    {
        if (!$request->session()?->has($sessionName)){
            return null;
        }

        return $request->session()->get($sessionName);
    }
}
