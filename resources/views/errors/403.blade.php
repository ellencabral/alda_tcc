@extends('errors::minimal')

@section('title', 'Proibido')
@section('code', '403')
@section('message', __($exception->getMessage() ?: 'Forbidden'))
