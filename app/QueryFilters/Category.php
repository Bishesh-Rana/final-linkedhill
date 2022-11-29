<?php

namespace App\QueryFilters;


use Closure;

class Category extends Filter
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
        $categories =  is_array(request('category_id')) ? request('category_id') : [request('category_id')];
        $query->when(request('category_id') && !in_array(0, $categories), fn ($query) => [$query->whereIn('category_id', $categories)]);
        return $next($query);
    }
}
