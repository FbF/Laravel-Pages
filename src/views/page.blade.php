@extends('layouts.master')

@section('title')
	{{ $page->title }}
@endsection

@section('meta_description')
	{{ $page->meta_description }}
@endsection

@section('meta_keywords')
	{{ $page->meta_keywords }}
@endsection

@section('content')
	@include ('laravel-pages::banner')
	@include ('laravel-pages::content')
@stop