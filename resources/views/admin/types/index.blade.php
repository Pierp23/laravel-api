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
                    <a href="{{ route('admin.types.create') }}" class="btn btn-success w-100">
                        + Aggiungi
                    </a>
                </div>
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Tipo</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($types as $type)
                            <tr>
                        <th scope="row">{{$type->id}}</th>
                        <td>{{$type->type}}</td>
                        <td>{{$type->difficulty}}</td>
                        <td>
                            <a href="{{route('admin.types.show', ['type' => $type->id])}}" class="btn btn-primary">
                                Vedi
                            </a>
                            <a href="{{route('admin.types.edit', ['type' => $type->id])}}" class="btn btn-warning">
                                Modifica
                            </a>
                            <form action="{{ route('admin.types.destroy', ['type' => $type->id]) }}" class="d-inline-block" method="POST"  
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