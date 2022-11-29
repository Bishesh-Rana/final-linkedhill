<?php

namespace App\QueryFilters;

use Closure;

class Location extends Filter
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
        $query->when(
            request('province_id'),
            fn ($query) =>
            $query->join('cities', 'properties.city_id', 'cities.id')
                ->join('provinces', 'provinces.id', 'cities.province_id')
                ->whereIn('cities.province_id', request('province_id'))
        );
        return $next($query);
    }
}
