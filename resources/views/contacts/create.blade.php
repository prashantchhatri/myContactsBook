@extends('layout')
@section('content')
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <div style="d-flex justify-content-center">
        <div class="row">
            <div class="mb-2 col-9">
                <div>
                    <span class="text-uppercase font-weight-bold text-success float-start">Add New Contact<span>
                </div>
                <div class="float-end mb-1">
                    <a class=" text-primary fload-right" href="{{ route('dashboard') }}"> Back</a>
                </div>
            </div>
            <div class="col-6">

                <form action="{{ route('store-contact') }}" method="POST">
                    @csrf

                    <div class="mb-2">
                        <input type="text" name="name" class="form-control" placeholder="Enter Name">
                    </div>

                    <div class="mb-2">
                        <input type="text" name="relation" class="form-control" placeholder="Relation to Contact">
                    </div>

                    <div class="mb-2">
                        <input type="text" name="phone" class="form-control" placeholder="Phone Number">
                    </div>

                    <div class="mb-2">
                        <input type="text" name="city" class="form-control" placeholder="Enter City">
                    </div>

                    <div class="m-2 float-end">
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
