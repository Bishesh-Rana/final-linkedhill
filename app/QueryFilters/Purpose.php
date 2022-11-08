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
        $query->when(request('property_status'), fn ($query) => $query->where('property_status', '=', request('property_status')));
        return $next($query);
    }
}
