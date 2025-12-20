<?php

namespace Illuminate\Contracts\View;

use Illuminate\Contracts\Support\Renderable;

interface View extends Renderable
{
    /**
     * Get the evaluated view contents for the given view.
     *
     * @param  \Illuminate\Contracts\View\Factory  $factory
     * @return string
     */
    public function extends();
    public function section();
    public function layoutData();
    public function layout($viewName);
}
