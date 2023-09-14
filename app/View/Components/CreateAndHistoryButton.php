<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CreateAndHistoryButton extends Component
{
    public $routeCreate;
    public $routeHistory;
    public $entityName;

    /**
     * Create a new component instance.
     */
    public function __construct($routeCreate, $routeHistory, $entityName)
    {
        $this->routeCreate = $routeCreate;
        $this->routeHistory = $routeHistory;
        $this->entityName = $entityName;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.create-and-history-button');
    }
}
