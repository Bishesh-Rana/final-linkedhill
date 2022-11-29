<?php

namespace App\QueryFilters;

use Closure;

class Purpose extends Filter
{
    /**
     * Handle an incoming request.
     *
     * @param   $query
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($query, Closure $next)
    {
        $query->when(request('purpose'), fn ($query) => $query->where('property_status', '=', request('purpose')));
        return $next($query);
    }
}
