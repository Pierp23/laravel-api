@extends('layouts.app')

@section('page-title', 'Home | Projects')

@section('main-content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h1 class="text-center text-success">
                        Sei loggato!
                    </h1>
                    <br>
                    La dashboard è una pagina privata (protetta dal middleware)
                </div>
                <div class="col-12 mb-4">
                    <a href="{{ route('admin.projects.create') }}" class="btn btn-success w-100">
                        + Aggiungi
                    </a>
                </div>
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Titolo</th>
                        <th scope="col">Descrizione</th>
                        <th scope="col">Linguaggio</th>
                        <th scope="col">Data</th>
                        <th scope="col">Azioni</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($projects as $project)
                            <tr>
                        <th scope="row">{{$project->id}}</th>
                        <td>{{$project->title}}</td>
                        <td>{{$project->description}}</td>
                        <td class="text-center">
                            @forelse($project->technologies as $techno)
                            {{$techno->title}}
                            @empty
                            -
                            @endforelse
                        </td>
                        <td>{{$project->date}}</td>
                        <td>
                            <a href="{{route('admin.projects.show', ['project' => $project->id])}}" class="btn btn-primary">
                                Vedi
                            </a>
                            <a href="{{route('admin.projects.edit', ['project' => $project->id])}}" class="btn btn-warning">
                                Modifica
                            </a>
                            <form action="{{ route('admin.projects.destroy', ['project' => $project->id]) }}" class="d-inline-block" method="POST"  
                                onsubmit="return confirm('Confemi di voler cancellare questo elemento?')">
                                @csrf
                                @method('DELETE')
                                
                                <button type="submit" class="btn btn-danger">
                                    Elimina
                                </button>
                            </form>
                        </td>                        
                      </tr> 
                        @endforeach
                                           
                    </tbody>
                  </table>
            </div>
        </div>
    </div>
@endsection