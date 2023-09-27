@extends('layouts.app')

@section('page-title')
Project
@endsection

@section('main-content')
<div class="container">
    <div class="row">
        <div class="col">
            <h1>
                Project n.{{$project->id}}
            </h1>
        </div>
    </div>

    <div class="row">
        <div class="col col-lg-4">
            <div class="card my-3">
                <h2>
                   {{$project->title}}
                </h2>
                <div class="body-card">                    
                    <ul>
                        <li>
                            <span class="fw-bold">Descrizione: </span>{{$project->description}}
                        </li>

                        <li>
                            <span class="fw-bold">Linguaggio: </span>
                            @forelse ($project->technologies as $techno)
                                {{$techno->title}}
                            @empty
                                -
                            @endforelse{{$project->language}}
                        </li>

                        <li>
                            <span class="fw-bold">Data: </span>{{$project->date}}
                        </li>
                        
                        <li>
                            <span class="fw-bold">Tipo: </span>
                            @if ($project->type)                                
                                <a href="{{ route('admin.types.show', ['type' => $project->type->id]) }}">
                                    {{ $project->type->type }}
                                </a>
                            @else
                                -
                            @endif
                        </li>  
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
