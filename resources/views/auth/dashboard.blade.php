<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@extends('layout')
@section('content')
    <style>
        i:hover {
            cursor: pointer;
        }

        .edit {
            color: green;
        }

        .delete {
            color: red;
        }
    </style>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @elseIf (session('error'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('error') }}
                        </div>
                    @endif

                    <div class="card-header text-success text-uppercase font-weight-bold">Welcome {{ Auth::user()['name'] }}
                    </div>

                    <div class="card-body">
                        <div class="float-end">
                            <a class="btn btn-success" href="{{ route('create-contact') }}"> Add Contact</a>
                        </div>
                    </div>

                    <table class="table table-bordered">
                        <tr>
                            {{-- <th> No.</th> --}}
                            <th> Name </th>
                            <th> Relation </th>
                            <th> Phone no. </th>
                            <th> City </th>
                            <th>Action</th>
                        </tr>
                        @foreach ($contacts as $key => $contact)
                            <tr>
                                @php
                                    json_encode($contact);
                                @endphp
                                {{-- <td>{{ $contact->id }}</td> --}}
                                <td>{{ $contact->name }}</td>
                                <td>{{ $contact->relation }}</td>
                                <td>{{ $contact->phone }}</td>
                                <td>{{ $contact->city }}</td>
                                {{-- <td>
                                    <a href="{{ route('edit-contact', $contact->id) }}" class="edit"><i
                                        class="fa fa-edit" aria-hidden="true"></i></a>&nbsp;&nbsp;
                                        <a href="" class="delete"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                        <form id="delete-{{$contact->id }}" action="{{ route('delete-contact', $contact->id) }}" method="post" document.getElementById('delete-{{$contact->id}}').submit(); style="display: none;>
                                            @csrf
                                            @method('Delete')
                                    </form>
                                </td> --}}
                                <td>
                                    <form action="{{ route('delete-contact',$contact->id) }}" method="POST" id="delete-{{$contact->id}}">
   
                                        <a href="{{ route('edit-contact', $contact->id) }}" class="edit"><i
                                            class="fa fa-edit" aria-hidden="true"></i></a> &nbsp;&nbsp;
                                        @csrf
                                        @method('DELETE')
                                        <a href="javascript:{}" onclick="document.getElementById('delete-{{$contact->id}}').submit();" class="delete"><i class="fa fa-trash" aria-hidden="true"></i></a>
                        
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>

            </div>
        </div>
    </div>
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script>
    $(".alert").fadeOut(2000);
</script>
