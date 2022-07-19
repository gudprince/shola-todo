<x-app>
<x-slot name="title">
Todo
  </x-slot>
  <div class="app-title">
        <div>
            <h1><i class="fa fa-tags"></i> Todo</h1>
        </div>
    </div>
    @include('partials.flash')
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="tile">
                <h3 class="tile-title">Add Todo</h3>
                <form action="{{ route('todo.update') }}" method="POST" role="form" enctype="multipart/form-data">
                    @csrf
                    <div class="tile-body">
                        <div class="form-group">
                            <label class="control-label" for="name">Title <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('title') is-invalid @enderror" type="text" name="title" id="title" value="{{ old('title', $todo->title) }}" required/>
                            @error('title') {{ $message }} @enderror
                        </div>
                        <div class="form-group">
                            <input type="hidden" class="form-control" type="text" name="id" id="id" value="{{ old('id',$todo->id) }}" required/>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="todo">Group</label>
                            <select name="todo_group_id" id="categories" class="form-control" >
                                <option value="">Select a group</option>
                                @foreach($todo_groups as $group)
                                    @if($group->id ==  $todo->todo_group_id)
                                    <option value="{{$group->id}}" selected>{{$group->name}}</option>
                                    @else
                                    <option value="{{$group->id}}" >{{$group->name}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="tile-footer">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update</button>
                        &nbsp;&nbsp;&nbsp;
                        <a class="btn btn-secondary" href="{{ route('todo.index') }}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app>