@extends('admin.master')

@section('body')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Manage Message</h5>
                        <h4 class="text-center text-success font-weight-bold">{{ Session::get('success') }}</h4>
                        <div class="table-responsive">
                            <table id="zero_config" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>SL No.</th>
                                        <th> Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Message</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php($i=1)
                                    @foreach ($messages as $message)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $message->name }}</td>
                                        <td>{{ $message->email }}</td>
                                        <td>{{ $message->phonenumber}}</td>
                                        <td>{{ $message->message}}</td>

                                        <td>
                                            <a href="{{ route('delete-message',['id'=>$message->id]) }}" class="btn btn-danger">
                                                <span><i class="fa fa-trash"></i></span>
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>SL No.</th>
                                        <th> Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Message</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
