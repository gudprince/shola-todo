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
                <form action="{{ route('todo.save') }}" method="POST" role="form" enctype="multipart/form-data">
                    @csrf
                    <div class="tile-body">
                        <div class="form">
                            <div class="form-group">
                                <label class="control-label" for="name">Title <span class="m-l-5 text-danger"> *</span></label>
                                <input class="form-control @error('title') is-invalid @enderror" type="text" name="title[]" id="title" value="{{ old('title') }}" required/>
                                @error('title') {{ $message }} @enderror
                            </div>
                        </div>
                        <div>
                            <button class="add btn btn-primary"><i class="fa fa-fw fa-lg fa-plus"></i>Add More</button>
                        </div>
                        <div class="form-group mt-2">
                            <label class="control-label" for="categories">Group</label>
                            <select name="group_id"  class="form-control" >
                                <option value="">Select a group</option>
                                @foreach($todoGroups as $group)
                                    <option value="{{ $group->id }}">{{ $group->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="tile-footer">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save</button>
                        &nbsp;&nbsp;&nbsp;
                        <a class="btn btn-secondary" href="{{ route('todo.index') }}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @push('scripts')
    <script>
     $('.add').click(function(event){
        event.preventDefault();
        var tag = ` <div class="form-group ">
                        <label class="control-label" for="name">Title <span class="m-l-5 text-danger"> *</span></label>
                        <div class="row">
                            <div class="col-11">
                                <input class="form-control @error('title') is-invalid @enderror" type="text" name="title[]" id="title" value="" required/>
                            </div>
                            <div class="col-1">
                                <button class="mt-1 text-danger">
                                <i class="remove fa fa-lg fa-trash"></i>
                                </button>
                            </div>
                        </div>
                    </div>`
        $('.form').append(tag);
    });

    $('body').on('click','.remove', function(event){
        event.preventDefault();
        var ele = $(this);
        ele.parents().eq(3).remove();
    });
    </script>
    @endpush
</x-app>
