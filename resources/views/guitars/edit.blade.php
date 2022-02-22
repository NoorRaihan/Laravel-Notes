@extends('layout')

@section('title', 'Guitar')

@section('content')
<div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
    
    <form action="{{ route('guitars.update', ['guitar' => $guitar['id']]) }}" method="POST">

        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="exampleInputEmail1">Guitar Name</label>
            <input class="form-control" name="guitar-name" value="{{$guitar['name']}}" id="guitar-name">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Brand</label>
            <input class="form-control" name="brand" value="{{$guitar['brand']}}" id="brand">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Year Made</label>
            <input class="form-control" name="year" value="{{$guitar['year_made']}}" id="year">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection