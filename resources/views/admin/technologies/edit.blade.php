@extends('layouts.app')

@section('page-title', 'Modifica una tecnologia')

@section('main-content')
<div class="container">
    <div class="row">
        <div class="col">
            <h1>
                Modifica una tecnologia
            </h1>
        </div>
    </div>

    <div class="row">
        <div class="col bg-success py-4">
           

            <form action="{{ route('admin.technologies.update', ['technology' => $technology->id]) }}" method="POST">
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
                    <label for="title" class="form-label">Tecnologia <span class="text-danger">*</span></label>
                    <input type="text" maxlength="128" class="form-control" value="{{ old('title', $technology->title) }}" id="title" name="title" placeholder="Enter value..." required>
                </div>

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