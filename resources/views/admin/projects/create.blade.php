@extends('layouts.app')

@section('page-title', 'Aggiungi progetto')

@section('main-content')
<div class="container">
    <div class="row">
        <div class="col">
            <h1>
                Aggiungi un progetto
            </h1>
        </div>
    </div>

    <div class="row">
        <div class="col bg-success py-4">
           

            <form action="{{ route('admin.projects.store') }}" method="POST">
                @csrf

                @if($errors->any())
                    <ul>
                        @foreach ($errors -> all() as $error)
                            <li> {{$error}} </li>
                        @endforeach
                    </ul>
                @endif

                <div class="mb-3">
                    <label for="title" class="form-label">Title <span class="text-danger">*</span></label>
                    <input type="text" maxlength="128" class="form-control" value="{{ old('title') }}" id="title" name="title" placeholder="Enter value..." required>
                    
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Descrizione <span class="text-danger">*</span></label>
                    <textarea class="form-control"  id="description" name="description" rows="3">{{ old('description') }}</textarea>
                   
                </div>

                <div class="mb-3">
                    <label class="form-label d-block">Tecnologia <span class="text-danger">*</span></label>
                    @foreach ($technologies as $technology)
                        <div class="form-check form-check-inline">
                            <input
                                class="form-check-input"
                                type="checkbox"
                                name="technologies[]"
                                id="technology-{{ $technology->id }}"
                                value="{{ $technology->id }}"
                                @if (
                                    in_array(
                                        $technology->id,
                                        old('technologies', [])
                                    )
                                )
                                    checked
                                @endif
                                >
                            <label class="form-check-label" for="technology-{{ $technology->id }}">
                                {{ $technology->title }}
                            </label>
                        </div>
                    @endforeach
                </div>

                <div class="mb-3">
                    <label for="date" class="form-label">Data <span class="text-danger">*</span></label>
                    <input type="date" class="form-control" value="{{ old('date') }}" id="date" name="date" placeholder="Enter value..." required>
                    
                </div>

                <div class="mb-3">
                    <label for="type_id" class="form-label">Tipo</label>
                    <select class="form-select" id="type_id" name="type_id">
                        <option value="">Seleziona una categoria...</option>
                        @foreach ($types as $type)
                            <option
                                {{-- ID del type --}}
                                value="{{ $type->id }}"
                                {{-- selected sulla option precedentemente selezionata --}}                        
                                 {{ old('type_id') == $type->id ? 'selected' : '' }} 
                                >
                                    {{ $type->type }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <button type="submit" class="btn btn-primary w-100">
                        + Aggiungi
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection