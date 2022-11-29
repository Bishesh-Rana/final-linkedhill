<?php

namespace  App\Contracts;

use Illuminate\Database\Eloquent\Model;

interface Actionable
{
    /**
     * Validate and create a New Model.
     *
     * @param  array  $input
     * @return mixed
     */
    public function create(array $input);
}
