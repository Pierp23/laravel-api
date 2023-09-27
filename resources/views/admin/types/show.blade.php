@extends('layouts.app')

@section('page-title')
Type
@endsection

@section('main-content')
<div class="container">
    <div class="row">
        <div class="col">
            <h1>
                Type n.{{$type->id}}
            </h1>
        </div>
    </div>

    <div class="row">
        <div class="col col-lg-4">
            <div class="card my-3">
                <h2>
                   {{$type->type}}
                </h2>
                <div class="body-card">                    
                    <ul>
                        <li>
                            <span class="fw-bold">Tipo: </span>{{$type->type}}
                        </li>
                        {{-- <li>
                            <span class="fw-bold">Difficoltà: </span>{{$type->difficulty}}
                        </li>  --}}
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <h2>
                Progetti collegati
            </h2>
            <ul>
                @foreach ($type->projects as $project)
                    <li>
                        <a href="{{ route('admin.projects.show', ['project' => $project->id]) }}">
                            {{ $project->title }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endsection
