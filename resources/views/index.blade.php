@extends('layout.layout')

@section('content')
    <div class="container">
        <div class="row">
            <form class="col s12" method="POST" action="{{ route('store') }}" style="margin-top: 30px;">
                @csrf
                <div class="row">
                    <div class="input-field col offset-s3 s6">
                        <i class="material-icons prefix">mode_edit</i>
                        <textarea name="text" id="icon_prefix2" class="materialize-textarea">{{ old('text') }}</textarea>
                        <label for="icon_prefix2">Tweet</label>
                        <span class="helper-text" style="color: red">{{ $errors->first('text') }}</span>
                        <button class="btn waves-effect waves-light right" type="submit" name="action">Submit
                            <i class="material-icons right">send</i>
                        </button>
                    </div>
                </div>
            </form>

            <div class="col offset-s3 s6">
                <h2 class="header">All tweets</h2>
                @foreach($tweets as $tweet)
                    <div class="card horizontal">
                        <div class="card-stacked">
                            <div class="card-content">
                                <p>{{ $tweet->text }}</p>
                            </div>
                            <div class="card-action">
                                <a class="waves-effect waves-light btn-small" href="{{ route('edit', $tweet->id) }}">Edit</a>
                                <form method="post" style="display: inline" action="{{ route('destroy', $tweet->id) }}">
                                    @csrf
                                    @method('delete')
                                    <button class="waves-effect waves-light btn-small red" type="submit">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </div>
@endsection
