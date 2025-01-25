<?php

namespace App\CBSoftwareDev\Breadcrumbs\Components;

use App\CBSoftwareDev\Breadcrumbs\BreadcrumbsGenerator;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class BreadcrumbsComponent extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(private BreadcrumbsGenerator $breadcrumbsGenerator)
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(string $Route = ""): View|Closure|string
    {
        return view('breadcrumbs::breadcrumbs-component', [
            'breadcrumbs' => $this->breadcrumbsGenerator->Generate($Route),
        ]);
    }
}
