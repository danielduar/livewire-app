<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ShowTweets extends Component
{
    public $message = 'Isso é apenas um teste';

    public function render()
    {
        return view('livewire.show-tweets');
    }
}
