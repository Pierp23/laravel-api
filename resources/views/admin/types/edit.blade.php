@extends('layouts.app')

@section('page-title', 'Modifica un tipo')

@section('main-content')
<div class="container">
    <div class="row">
        <div class="col">
            <h1>
                Modifica un tipo
            </h1>
        </div>
    </div>

    <div class="row">
        <div class="col bg-success py-4">
           

            <form action="{{ route('admin.types.update', ['type' => $type->id]) }}" method="POST">
                @csrf
                @method('PUT')

                @if($errors->any())
                    <ul>
                        @foreach ($errors -> all() as $error)
                            <li> {{$error}} </li>
                        @endforeach
                    </ul>
                @endif

                <div class="mb-3">
                    <label for="type" class="form-label">Tipo <span class="text-danger">*</span></label>
                    <input type="text" maxlength="128" class="form-control" value="{{ old('type', $type->type) }}" id="type" name="type" placeholder="Enter value..." required>
                </div>

                {{-- <div class="mb-3">
                    <label for="difficulty" class="form-label">Difficoltà <span class="text-danger">*</span></label>
                    <input type="text" maxlength="128" class="form-control" value="{{ old('difficulty', $type->difficulty) }}" id="difficulty" name="difficulty" placeholder="Enter value..." required>
                </div> --}}

                <div>
                    <button type="submit" class="btn btn-primary w-100">
                        Modifica
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection