<?php

namespace App\View\Components\layouts;

use App\Models\Community;
use Illuminate\View\Component;
use Illuminate\Support\Facades\Auth;

class ForumSide extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $communities;

    public function __construct($communities)
    {   
        
        $this->communities = $communities;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.layouts.ForumSide');
    }
}
