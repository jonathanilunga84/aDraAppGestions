<?php

namespace App\View\Components\SexeStaffs;

use Illuminate\View\Component;
use App\Models\Projet;

class CounteGenreStaff extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        
        return view('components.sexe-staffs.counte-genre-staff');
    }
}
