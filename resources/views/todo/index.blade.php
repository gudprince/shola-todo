<x-app>
<x-slot name="title">
Todo List
  </x-slot>
    <div class="app-title">
        <div>
            <h1><i class="fa fa-tags"></i>Todo</h1>
            <p>Todo List</p>
        </div>
        <a href="{{ route('todo.create') }}" class="btn btn-primary pull-right">Add Todo</a>
    </div>
    @include('partials.flash')
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <table class="table table-hover table-bordered" id="sampleTable">
                        <thead>
                            <tr>
                                <th> # </th>
                                <th> Title </th>
                                <th> Status </th>
                                <th> Group</th>
                                <th style="width:100px; min-width:100px;" class="text-center text-danger"><i class="fa fa-bolt"> </i></th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $i = 1; @endphp
                            @foreach($todos as $todo)
                                    <tr class="">
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $todo->title }}</td>
                                        <td>
                                            <div class="form-group mt-2">
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input class="form-lg toggle-active form-check-input"
                                                            type="checkbox"
                                                            id="status"
                                                            data-id="{{$todo->id}}"
                                                            name="status"
                                                            {{ $todo->is_complete == 1 ? 'checked' : '' }}
                                                            /> <span>{{ $todo->is_complete == 1 ? 'Completed' : 'Not Complete' }}</span>
                                                    </label>
                                                </div>
                                            </div> 
                                       
                                        </td>
                                        <td>{{$todo->group ? $todo->group->name : ''}}</td>
                                        <td class="text-center">
                                            <div class="btn-group" role="group" aria-label="Second group">
                                                <a href="{{ route('todo.edit', $todo->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal{{$todo->id}}">
                                                <i class="fa fa-trash"></i>
                                                </button>
                                                <!-- Modal -->
                                                <div class="modal fade" id="exampleModal{{$todo->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Are You Sure</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                You won't be able to revert back if deleted
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                                <a href="{{ route('todo.delete', $todo->id) }}" class=""><button type="button" class="btn btn-primary">Confirm</button></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@push('css')
    <link rel="stylesheet" href="{{asset('css/toastr.css')}}">
@endpush
@push('scripts')
    <script type="text/javascript" src="{{ asset('backend/js/plugins/jquery.dataTables.min.js') }}"></script>
    <script src="{{asset('js/toastr.js')}}"></script>
    <script type="text/javascript" src="{{ asset('backend/js/plugins/dataTables.bootstrap.min.js') }}"></script>
    <script type="text/javascript">
        $('#sampleTable').DataTable();

        $('.toggle-active').click(function(event){
           // event.preventDefault();
            
            $.ajaxSetup({
                headers:{
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            
            var ele = $(this);
            var is_complete =  ele.is(":checked") ? true: false;
            console.log(is_complete);

            $.ajax({
                type: "POST",
                url: "{{URL::to('todo/complete-toggle')}}",
                data:{
                    id: ele.attr("data-id"),
                    is_complete: is_complete
                },
                success: function (response) {
                    console.log(response);
                    let content = is_complete ? 'Completed': 'Not Complete';
                    ele.next().remove();
                    let tag = `<span>${content}</span>`;
                    ele.parent().append(tag);
                    toastr.success(response.message);
                            
                }
           });
            
        });
    </script>
@endpush
</x-app>