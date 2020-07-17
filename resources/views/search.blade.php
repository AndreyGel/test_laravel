@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <livewire:search-products/>
        </div>
    </div>
@endsection

@section('js')
    @parent
    <livewire:scripts/>
@show

@section('css')
    @parent
    <livewire:styles/>
@show
