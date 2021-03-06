@extends('admin')

@section('title', 'Services')
@section('content')
    <main class="app-content">
        <div class="app-title">
            <div>
                <h1>Services</h1>

            </div>
            <button class="btn btn-primary pull-right bold" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus"></i> Add New service</button>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <div class="tile-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Icon</th>
                                    <th scope="col">Actions</th>
                                </tr>
                                </thead>
                                <tbody id="products-list" name="products-list">
                                @foreach($services as $data)
                                    <tr id="product3">
                                        <td >{{$loop->iteration}}</td>
                                        <td >{{$data->name}}</td>
                                        <td >  <i class="{{$data->icon}}"></i></td>
                                        <td data-label="Action">
                                         <button type="button" data-toggle="modal" data-target="#edit-{{ $data->id }}" class="btn btn-primary btn-detail open_modal bold uppercase"><i class="fa fa-edit"></i></button>
                                            <button type="button" class="btn btn-danger bold" data-toggle="modal" data-target="#delete-{{ $data->id }}"> <i class="fa fa-trash"></i></button>
                                        </td>
                                    </tr>


                                    <div class="modal fade" id="delete-{{ $data->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title danger" id="myModalLabel2"><i class='fa fa-trash '></i> <span class="danger">Are you sure you want to delete this?</span></h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form method="post" action="{{route('admin.service.delete',$data->id)}}" class="action-route">
                                                    @csrf
                                                    <div class="modal-body">
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-success"> Yes</button>
                                                        <button type="button" class="btn btn-danger" data-dismiss="modal"> No</button>&nbsp;
                                                    </div>
                                                </form>

                                            </div>
                                        </div>
                                    </div>



                                    <div class="modal fade" id="edit-{{ $data->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">New Service</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form method="post" action="{{route('admin.service.update', $data->id)}}">
                                                        @csrf
                                                        <div class="form-group">
                                                            <label for="recipient-name" class="col-form-label">Name:</label>
                                                            <input type="text" name="name" value="{{$data->name}}" class="form-control" id="recipient-name">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="recipient-name" class="col-form-label">Icon</label>
                                                            <input type="text" name="icon" value="{{$data->icon}}" class="form-control" id="recipient-name">
                                                            <code>use icon class from https://fontawesome.com/v4.7.0/icons/ or https://www.flaticon.com/</code>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="message-text" class="col-form-label">description</label>
                                                            <textarea class="form-control"  name="description" id="message-text">{{$data->description}}</textarea>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary">Submit</button>
                                                        </div>
                                                    </form>
                                                </div>

                                            </div>
                                        </div>
                                    </div>


                                @endforeach
                                </tbody>

                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>


        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">New Service</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="{{route('admin.service.store')}}">
                            @csrf
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Name:</label>
                                <input type="text" name="name" class="form-control" id="recipient-name">
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Icon</label>
                                <input type="text" name="icon" class="form-control" id="recipient-name">
                                <code>use icon from https://fontawesome.com/v4.7.0/icons/ Or  https://www.flaticon.com/</code>
                            </div>
                            <div class="form-group">
                                <label for="message-text" class="col-form-label">description</label>
                                <textarea class="form-control" name="description" id="message-text"></textarea>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>


    </main>


@endsection
