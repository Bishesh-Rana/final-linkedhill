<?php

namespace App\Traits;

use App\Models\Advertisement;

trait CommonTrait
{
    protected function getAd($page = 'main')
    {
        return Advertisement::select('*')
            ->where('page', $page)
            ->where('active', true)
            ->get();
    }
    protected function getMeta($meta = null)
    {
        if (!$meta) {

            return [
                'favicon' => config('settings.favicon') ?? null,
                'title' => config('settings.name') ?? null,
                'description' => config('settings.name') ?? null,
                'image' => config('settings.logo') ?? null,
                'keywords' => config('settings.name') ?? null,
            ];
        }

        return [
            'title' => $meta['title'],
            'image' => $meta['image'] ?? config('settings.name'),
            'description' =>  $this->parseDescription($meta['description']) ?? $meta['title'],
            'keywords' => @$meta['keywords'] ?? @$meta['title']
        ];
    }
}
