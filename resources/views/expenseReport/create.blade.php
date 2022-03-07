@extends('layouts.base')

@section('content')
    <div class="row">
        <div class="col">
            <h1>New Reportes</h1>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <a class="btn btn-secondary" href="/expense_reports/">Back</a>

        </div>
    </div>

    <div class="row">
        <div class="col">
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="/expense_reports" method="post">
                <!--token de seguridad-->
                @csrf
                <div class="form-group">
                    <label for="title">
                        Title
                    </label>
                    <input type="text" class="form-control" id="title" name="title" name="title"
                           placeholder="Type a title" value="{{old('title')}}">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>

@endsection
