<?php

namespace App\Http\Middleware;

use Closure;
use Session;

class CmsGuard
{
    public function handle($request, Closure $next)
    {
        // GUARD CMS FROM UNOTORIZED USERS
        
        if(!Session::has('is_admin')){
            return redirect('user/signin');
        }
        return $next($request);
    }
}
