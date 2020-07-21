@extends('layout.layout')

@section('content')
    <h2 class="header">Tweet</h2>
    <div class="card horizontal">
        <div class="card-stacked">
            <div class="card-content">
                @foreach($tweet->tags as $tag)
                    <a href="#" class="chip">{{ $tag->name }}</a>
                @endforeach
                <p><b>{{ $tweet->author->name }}</b>: {{ $tweet->text }}</p>
            </div>
            <div class="card-action">
                <a class="waves-effect waves-light btn-small" href="{{ route('tweet.edit', $tweet->id) }}">Edit</a>
                <form method="post" style="display: inline" action="{{ route('tweet.destroy', $tweet->id) }}">
                    @csrf
                    @method('delete')
                    <button class="waves-effect waves-light btn-small red" type="submit">Delete</button>
                </form>
            </div>
        </div>
    </div>
    <h4 class="header">Add comment</h4>
    <div class="card horizontal">
        <div class="card-stacked">
            <form action="{{ route('tweet.comment.store', $tweet) }}" method="POST">
                @csrf
                <div class="card-content">
                    <textarea name="text" id="icon_prefix2" class="materialize-textarea">{{ old('text') }}</textarea>
                    <label for="icon_prefix2">Comment</label>
                </div>
                <div class="card-action">
                    <button type="submit" class="waves-effect waves-light btn-small">Send</button>
                </div>
            </form>
        </div>
    </div>
    <h4 class="header">All comments</h4>
    @foreach($tweet->comments as $comment)
        <div class="card horizontal">
            <div class="card-stacked">
                <div class="card-content">
                    <p><b>[{{ $comment->created_at }}] {{ $comment->author->name }}:</b> {{ $comment->text }}</p>
                </div>
            </div>
        </div>
    @endforeach
@endsection
