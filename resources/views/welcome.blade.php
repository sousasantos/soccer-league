@extends('layout.base')

@section('content')
<div class="row my-3 p-5 shadow-sm bg-white">
  <div class="col-2">

  </div>
  <div class="col-4">
    <livewire:select-league />
  </div>
  <div class="col-4">
    <livewire:select-season />
  </div>
</div>
<div class="row my-3 p-5 shadow-sm bg-white">
  <livewire:season-stage />
</div>
<livewire:team-modal />
@endsection