<?php
namespace App\CBSoftwareDev\Table\Components;

use App\CBSoftwareDev\Table\Table;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TableComponent extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(private Table $table)
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('table::table-component', [
            'table' => $this->table,
        ]);
    }
}
