@extends('app')
@section('content')

<div class="container w-25 border p-4 mt-4">
    <div class="row mx-auto">
    <form  method="POST" action="{{route('todos')}}">
        @csrf
        <div class="mb-3 col">
        @error('title')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        @if (session('success'))
                <h6 class="alert alert-success">{{ session('success') }}</h6>
        @endif
        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
            <label for="title" class="form-label">Título de la Actividad</label>
            <input type="text" class="form-control mb-2" name="title" id="exampleFormControlInput1" placeholder="Actividad">
            <input type="submit" value="Crear Actividad" class="btn btn-primary my-2" />
        </div>
    </form>

    <form  method="POST" action="{{route('asignar-horas')}}">
        @csrf
        <div class="mb-3 col">
        @error('title')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror     
            <label for="activity_id" class="form-label">Seleccione actividad</label>
            <select name="activity_id" class="form-select mb-2" >
                @foreach ($todos as $todo)
                    <option value="{{$todo->id}}">{{$todo->title}}</option>
                @endforeach
            </select>
            <label for="title" class="form-label">Fecha</label>
            <input type="date" class="form-control mb-2" name="fecha" id="exampleFormControlInput1" required>
            <label for="title" class="form-label">Horas dedicadas</label>
            <input type="number" class="form-control mb-2" name="horas" id="exampleFormControlInput1" required >
            <input type="submit" value="Asignar tiempo" class="btn btn-primary my-2" />
        </div>
    </form>
    </div>
</div>
@endsection