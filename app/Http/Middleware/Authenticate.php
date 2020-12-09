<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        $language = session('language');
        $url = config('app.url');
        if (! $request->expectsJson()) {
            if ($language){
                return $url.'/'.$language.'/'.'login';
            }else{
                return $url.'/es/'.'login';
            }

        }
    }
}
