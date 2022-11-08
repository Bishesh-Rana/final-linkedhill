<?php

namespace App\QueryFilters;


use Closure;

class City extends Filter
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
        $query->when(request('city_id'), fn ($query) => [$query->whereIn('city_id', is_array(request('city_id')) ? request('city_id') : [request('city_id')])]);
        return $next($query);
    }
}
