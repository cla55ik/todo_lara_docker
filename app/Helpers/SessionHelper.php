<?php

namespace App\Helpers;

use Illuminate\Http\Request;
use Illuminate\Session\Store;

class SessionHelper implements HelperInterface
{
    public function getSession(Request $request, ?string $sessionName = null): mixed
    {
        if (is_null($sessionName)){
            return null;
        }

        if (!$request->session()?->has($sessionName)){
            return null;
        }

        return $request->session()->get($sessionName);
    }

    public function setSession(Request $request, string $name, mixed $value): void
    {
        if ($request->session()->has($name)){
            $request->session()->forget($name);
        }

        $request->session()->put($name, $value);
    }


}
