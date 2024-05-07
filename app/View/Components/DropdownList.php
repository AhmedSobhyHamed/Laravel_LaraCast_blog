<?php

namespace App\View\Components;

use App\Models\Category;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class DropdownList extends Component
{
    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.dropdown-list', [
            'categories' => caching('-C', 60, fn () => Category::all()),
            'currentCategory' => request('PostCategory') ?
                Category::firstWhere('slug', request('PostCategory'))?->name : null
        ]);
    }
}
