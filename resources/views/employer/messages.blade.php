@extends('Frontend.layouts.masterDashboard')
@section('page_title')Manage Hiring Posts @endsection
@section('header_shadow')head-shadow @endsection
@section('body_content')
    @include('Frontend.layouts.employerDashboardNav')


    {{ $slot }}


@endsection