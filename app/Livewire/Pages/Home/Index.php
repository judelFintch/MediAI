<?php

namespace App\Livewire\Pages\Home;

use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.app')]

class Index extends Component
{
    public function render()
    {
        return view('livewire.pages.home.index');
    }
}
