@extends('layout')
@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <div class="d-flex justify-content-center">
        <div class="row">
            <div class="col-9">
                <div>
                    <span class="text-uppercase font-weight-bold text-success float-start">Add New Contact<span>
                </div>
                <div class="float-end mb-1">
                    <a class=" text-primary fload-right" href="{{ route('dashboard') }}"> Back</a>
                </div>
            </div>

            <form  action="{{ route('update-contact', $contact->id ) }}" method="POST">
                @csrf
                    <div class="col-10">
                        <div class="form-group mb-2">
                            <input type="text" name="name" class="form-control" value="{{$contact->name}}">
                        </div>
    
                        <div class="form-group mb-2">
                            <input type="text" name="relation" class="form-control" value="{{$contact->relation}}">
                        </div>
    
                        <div class="form-group mb-2">
                            <input type="text" name="phone" class="form-control" value="{{$contact->phone}}">
                        </div>
    
                        <div class="form-group mb-2">
                            <input type="text" name="city" class="form-control" value="{{$contact->city}}">
                        </div>
    
                        <div class="form-group mb-2 float-end">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
            </form>
        </div>
    </div>
@endsection

