<div>
    Show Tweets

    <p>{{$message}}</p>
    <form action="" method="post" wire:submit.prevent="create">
        <input type="text" name="message" id="message" wire:model="message">
        @error('message')
        {{$message}}
        @enderror

        <button type="submit">Criar Tweet</button>
    </form>

    <hr>
    @foreach($tweets as $tweet)
        {{$tweet->user->name}} -{{$tweet->content}}
        @if($tweet->likes()->count())
            <a href="#">Descurtir</a>
        @else
            <a href="">Curtir</a>
        @endif
        <br>
    @endforeach

    <hr>
    <div>
        {{$tweets->links()}}
    </div>
</div>
