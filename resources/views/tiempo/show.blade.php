@extends('app')

@section('content')
<div class="container">
  <h1>Tiempo asignado a cada actividad</h1>
  @foreach ($actividades as $actividad)
      <div class="accordion" id="accordionExample">
          <div class="accordion-item">
              <h2 class="accordion-header" id="heading{{$actividad->id}}">
                  <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{$actividad->id}}" aria-expanded="true" aria-controls="collapse{{$actividad->id}}">
                      {{ $actividad->title }}
                  </button>
              </h2>
              <div id="collapse{{$actividad->id}}" class="accordion-collapse collapse" aria-labelledby="heading{{$actividad->id}}" data-bs-parent="#accordionExample">
                  <div class="accordion-body">
                      <ul class="list-group">
                          @foreach ($actividad->horas as $hora)
                              <li class="list-group-item">{{ $hora->fecha }} - {{ $hora->horas }} horas</li>
                          @endforeach
                      </ul>
                  </div>
              </div>
          </div>
      </div>
  @endforeach
</div>
@endsection