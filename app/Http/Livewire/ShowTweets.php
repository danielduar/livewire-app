<?php

namespace App\Http\Livewire;

use App\Models\Tweet;
use Livewire\Component;

class ShowTweets extends Component
{
    public $message = 'Isso é apenas um teste';

    public function render()
    {
        $tweets = Tweet::get();
        return view('livewire.show-tweets',[
            'tweets'=>$tweets
        ]);
    }
}
