<?php

namespace App\Http\Controllers\Api\V1\Common;

use App\Models\Color;
use App\Http\Controllers\Api\V1\BaseController;
use Illuminate\Http\Request;

class ColorController extends BaseController
{
    public function __construct(Color $color)
    {
        $this->color = $color;
    }


    public function getColors()
    {

        return $this->respondSuccess($this->color->orderBy('id','desc')->get());
    }
}
