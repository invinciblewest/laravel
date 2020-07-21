<h5 style="margin: 2.3733333333rem 0 1.424rem 0;">Tags</h5>
<div style="display: flex; align-items: center; flex-wrap: wrap">
    @foreach($tags as $tag)
        <a href="#" class="chip">{{ $tag->name }}</a>
    @endforeach
</div>

<!-- Modal Trigger -->
<a class="waves-effect waves-light btn btn-small modal-trigger" style="margin-top: 10px" href="#modal1">Add tags</a>

<!-- Modal Structure -->
<div id="modal1" class="modal">
    <form action="{{ route('tag.store') }}" method="POST">
        @csrf
        <div class="modal-content">
            <h4>Add tags</h4>
            <div class="row">
                <div class="input-field col s12">
                    <i class="material-icons prefix">local_offer</i>
                    <input type="text" name="name" id="icon_prefix2">
                    <label for="icon_prefix2">Tag name</label>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="modal-close waves-effect waves-green btn-flat">Add</button>
        </div>
    </form>
</div>

