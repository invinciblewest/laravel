@extends('layout.layout')

@section('content')
    @auth
        <form method="POST" action="{{ route('tweet.store') }}" style="margin-top: 30px;">
            @csrf
            <div class="row">
                <div class="input-field col s12">
                    <i class="material-icons prefix">mode_edit</i>
                    <textarea name="text" id="icon_prefix2" class="materialize-textarea">{{ old('text') }}</textarea>
                    <label for="icon_prefix2">Tweet</label>
                    <span class="helper-text" style="color: red">{{ $errors->first('text') }}</span>
                </div>
                <div class="input-field col s12">
                    <i class="material-icons prefix">local_offer</i>
                    <select id="icon_prefix3" name="tags[]" multiple>
                        <option value="" disabled selected>Choose your tags</option>
                        @foreach($tags as $tag)
                            <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                        @endforeach
                    </select>
                    <label for="icon_prefix3">Tags</label>
                </div>
                <div class="input-field col s12">
                    <button class="btn waves-effect waves-light right" type="submit" name="action">Submit
                        <i class="material-icons right">send</i>
                    </button>
                </div>
            </div>
        </form>
    @endauth

    <h2 class="header">All tweets</h2>
    @foreach($tweets as $tweet)
        <div class="card horizontal">
            <div class="card-stacked">
                <div class="card-content">
                    @foreach($tweet->tags as $tag)
                        <a href="#" class="chip">{{ $tag->name }}</a>
                    @endforeach
                    <p><b>{{ $tweet->author->name }}</b>: {{ $tweet->text }}</p>
                </div>
                <div class="card-action">
                    <a class="waves-effect waves-light btn-small" href="{{ route('tweet.show', $tweet->id) }}">Show</a>
                    @auth
                        <a class="waves-effect waves-light btn-small" href="{{ route('tweet.edit', $tweet->id) }}">Edit</a>
                        <form method="post" style="display: inline" action="{{ route('tweet.destroy', $tweet->id) }}">
                            @csrf
                            @method('delete')
                            <button class="waves-effect waves-light btn-small red" type="submit">Delete</button>
                        </form>
                    @endauth
                </div>
            </div>
        </div>
    @endforeach
@endsection
