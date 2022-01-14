<?php

namespace App\Http\Livewire;

use App\Models\Tweet;
use Livewire\Component;
use Livewire\WithPagination;

class ShowTweets extends Component
{

    use WithPagination;

    public $message = 'Isso é apenas um teste5';

    protected $rules = [
        'message' => 'required|min:3|max:25'
    ];

    public function render()
    {
        $tweets = Tweet::with('user')->paginate(2);
        return view('livewire.show-tweets', [
            'tweets' => $tweets
        ]);
    }

    public function create()
    {

        $this->validate();

//        pega o usuário logado
        auth()->user()->tweets()->create([
            'content' => $this->message
        ]);



        $this->message = '';
    }

    /**
     * Ação de curtir o tweet
     * @param $tweetId
     */
    public function likeTweet($tweetId)
    {
        $tweet = Tweet::find($tweetId);

        $tweet->likes()->create([
            'user_id'=>auth()->user()->id
        ]);
    }

    /**
     * Ação de descurtir o tweet
     * @param Tweet $tweet
     */
    public function dislikeTweet(Tweet $tweet)
    {

        $tweet->likes()->delete();
    }
}


