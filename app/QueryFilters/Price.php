<?php

namespace App\QueryFilters;

use Closure;

class Price extends Filter
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
        $query->when(request('start_price'), fn ($query) => $query->where('start_price', '>=', request('start_price')))
            ->when(request('end_price'), fn ($query) => $query->where('end_price', '<=', request('end_price')));
        return $next($query);
    }
}
