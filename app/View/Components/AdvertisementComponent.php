<?php

namespace App\View\Components;

use App\Models\Advertisement;
use Illuminate\View\Component;

class AdvertisementComponent extends Component
{
    public $advertisement;


    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($advertisement, $section, $direction)
    {
        $this->advertisement = $advertisement->filter(fn ($item, $key) => $item->section == $section && $item->direction == $direction);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.advertisement-component');
    }
}
