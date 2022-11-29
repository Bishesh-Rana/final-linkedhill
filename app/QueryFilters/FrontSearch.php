<?php

namespace App\QueryFilters;

use Closure;

class FrontSearch extends Filter
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
        if (request('frontend_price')) {
            [$start_price, $end_price] = explode(';', request('frontend_price'));
            $query->where('start_price', '>=', $start_price)
                ->where('end_price', '<=', $end_price);
        }

        return $next($query);
    }
}
