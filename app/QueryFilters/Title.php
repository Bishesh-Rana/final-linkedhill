<?php

namespace App\QueryFilters;

use Closure;

class Title extends Filter
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
        $query->when(request('title'), fn ($query) => $query->where('title', 'like', "%" . request('title') . "%"));
        return $next($query);
    }
}
