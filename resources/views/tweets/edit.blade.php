@extends('layout.layout')

@section('content')
    <form class="col s12" method="POST" action="{{ route('tweet.update', $tweet->id) }}" style="margin-top: 30px;">
        @method('put')
        @csrf
        <div class="row">
            <div class="input-field col s12">
                <i class="material-icons prefix">mode_edit</i>
                <textarea name="text" id="icon_prefix2" class="materialize-textarea">{{ $tweet->text }}</textarea>
                <label for="icon_prefix2">Tweet</label>
                <span class="helper-text" style="color: red">{{ $errors->first('text') }}</span>
                <button class="btn waves-effect waves-light right" type="submit" name="action">Update
                    <i class="material-icons right">send</i>
                </button>
            </div>
        </div>
    </form>
@endsection
