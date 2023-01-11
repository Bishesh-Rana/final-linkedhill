<?php

namespace App\View\Components\Frontend;

use App\Models\Property;
use App\Models\PropertyCategory;
use Illuminate\View\Component;

class PropertyTypeComponent extends Component
{
    public $propertiesType;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->propertiesType = Property::get();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.frontend.property-type-component');
    }
}
