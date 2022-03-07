@extends('layouts.base')

@section('content')
    <div class="row">
        <div class="col">
            <h1>New Reportes</h1>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <a class="btn btn-secondary" href="/expense_reports/{{$report->id}}">Back</a>

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
            <form action="/expense_reports/{{$report->id}}/expenses" method="post">
                <!--token de seguridad-->
                @csrf
                <div class="form-group">
                    <label for="title">
                        Description
                    </label>
                    <input type="text" class="form-control" id="description" name="description"
                           placeholder="Type a Description">
                </div>
                <div class="form-group">
                    <label for="title">
                        Amount
                    </label>
                    <input type="text" class="form-control" id="amount" name="amount"
                           placeholder="Type a amount">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>

@endsection
