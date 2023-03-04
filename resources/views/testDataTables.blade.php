@extends('layouts.app')

@section('content')
{!! $dataTable->table() !!}
@endsection

 
{!! $dataTable->scripts() !!}
 