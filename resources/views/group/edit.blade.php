<x-app>
<x-slot name="title">
Todo Group
  </x-slot>
  <div class="app-title">
        <div>
            <h1><i class="fa fa-tags"></i>Todo Group</h1>
        </div>
    </div>
    @include('partials.flash')
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="tile">
                <h3 class="tile-title">Update Group</h3>
                <form action="{{ route('todo.group.update') }}" method="POST" role="form" enctype="multipart/form-data">
                    @csrf
                    <div class="tile-body">
                        <div class="form-group">
                            <label class="control-label" for="name">Title <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" id="name" value="{{ old('name', $todo_group->name) }}" required/>
                            @error('name') {{ $message }} @enderror
                        </div>
                        <div class="form-group">
                            <input type="hidden" class="form-control" type="text" name="id" id="id" value="{{ old('id',$todo_group->id) }}" required/>
                        </div>
                    </div>
                    <div class="tile-footer">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update Group</button>
                        &nbsp;&nbsp;&nbsp;
                        <a class="btn btn-secondary" href="{{ route('todo.group.index') }}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app>