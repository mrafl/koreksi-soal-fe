<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ShowModalButton extends Component
{
    public $title;
    public $icon;
    public $targetModal;

    /**
     * Create a new component instance.
     */
    public function __construct($title, $icon, $targetModal)
    {
        $this->title = $title;
        $this->icon = $icon;
        $this->targetModal = $targetModal;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.show-modal-button');
    }
}
