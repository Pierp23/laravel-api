@extends('layouts.app')

@section('page-title', 'Aggiungi una tecnologia')

@section('main-content')
<div class="container">
    <div class="row">
        <div class="col">
            <h1>
                Aggiungi una tecnologia
            </h1>
        </div>
    </div>

    <div class="row">
        <div class="col bg-success py-4">
           

            <form action="{{ route('admin.technologies.store') }}" method="POST">
                @csrf

                @if($errors->any())
                    <ul>
                        @foreach ($errors -> all() as $error)
                            <li> {{$error}} </li>
                        @endforeach
                    </ul>
                @endif

                <div class="mb-3">
                    <label for="title" class="form-label">Tipo <span class="text-danger">*</span></label>
                    <input type="text" maxlength="128" class="form-control" value="{{ old('title') }}" id="title" name="title" placeholder="Enter value..." required>
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