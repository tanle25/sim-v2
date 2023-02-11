@extends('layouts.app')

@section('content')
<div class=" bg-white">
    @can('is-admin')
    <livewire:sim-manager>

    @else
    <livewire:user-sim-manager>
    @endcan

</div>
@endsection
