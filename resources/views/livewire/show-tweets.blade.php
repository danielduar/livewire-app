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
        <div class="flex">
            {{--Imagem --}}
            <div class="w1/8">
                @if($tweet->user->photo)
                    <img class="rounded-full h-8 w-8" src="{{url("storage/{$tweet->user->photo}")}}" alt="{{$tweet->user->name}}">

                @else
                    <img   class="rounded-full h-8 w-8"src="{{url('img/no-image.png')}}" alt="{{$tweet->user->name}}">
                @endif
                {{$tweet->user->name}}
            </div>
            {{--    Conteudo --}}
            <div class="w-7/8">
                {{$tweet->content}}
                @if($tweet->likes()->count())
                    <a href="#" wire:click.prevent="dislikeTweet({{$tweet->id}})">Descurtir</a>
                @else
                    <a href="#" wire:click.prevent="likeTweet({{$tweet->id}})">Curtir</a>
                @endif
            </div>
        </div>
        <br>
    @endforeach

    <hr>
    <div>
        {{$tweets->links()}}
    </div>
</div>
