<?php

namespace App\QueryFilters;


use Closure;

class Area extends Filter
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
        $total_area = array_map('intval', explode('-', request('total_area')));
        if (request('total_area')) {
            $query->when(
                !isset($total_area[1]),
                fn ($query) => $query->where('total_area', '<=', (int) request('total_area'))
            )
                ->when(
                    isset($total_area[1]),
                    fn ($query) => $query->whereBetween('total_area', $total_area)

                );
        }
        return $next($query);
    }
}
