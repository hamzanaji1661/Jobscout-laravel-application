@extends('frontend.layouts.masterDashboard')
@section('page_title')Manage Hiring Posts @endsection
@section('header_shadow')head-shadow @endsection
@section('body_content')
    @include('frontend.layouts.employerDashboardNav')


    {{ $slot }}


@endsection