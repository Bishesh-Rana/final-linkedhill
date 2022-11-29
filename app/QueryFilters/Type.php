<?php

namespace App\QueryFilters;

use Closure;

class Type extends Filter
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
        $query->when(request('type'), function ($q) {
            $q->when(is_array(request('type')), fn ($query) => $query->whereIn('type', request('type')))
                ->when(!is_array(request('type')), fn ($query) => $query->where('type', request('type')));
        });
        return $next($query);
    }
}
