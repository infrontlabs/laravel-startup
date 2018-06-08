<?php

namespace App\Http\Middleware\Org;

use App\Org;
use App\Org\Manager;
use Closure;

class OrgMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $org = $this->resolveOrg(
            $request->org ?: session()->get('org')
        );

        if (!auth()->user()->isMemberOf($org)) {
            return redirect('/dashboard/orgs');
        }

        $this->registerOrg($org);

        return $next($request);
    }

    public function registerOrg(Org $org)
    {
        app(Manager::class)->setOrg($org);

        session()->put('org', $org->id);
    }

    public function resolveOrg($id)
    {
        return Org::find($id);
    }
}
