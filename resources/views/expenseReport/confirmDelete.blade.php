@extends('layouts.base')

@section('content')
    <div class="row">
        <div class="col">
            <h1>Delete Reports {{$report->title}}</h1>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <a class="btn btn-secondary" href="/expense_reports/">Back</a>

        </div>
    </div>

    <div class="row">
        <div class="col">
            <form action="/expense_reports/{{$report->id}}" method="post">
                <!--token de seguridad-->
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>

@endsection
