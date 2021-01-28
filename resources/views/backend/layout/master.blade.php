<!DOCTYPE html>
<html lang="en">
  <head>
    <title>@yield('title') - {{ config('app.name') }}</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('backend/css/main.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('backend/css/font-awesome.min.css')}}"/>
    <!---dataTable css-->
    <link rel="stylesheet" type="text/css" href="{{asset('css/dataTables.min.csss')}}"/>
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css"href="{{asset('backend/css/font-awesome/4.7.0/css/font-awesome.min.css')}}"/>
  </head>
 <body class="app sidebar-mini rtl">
   @include('backend.partials.header')
   @include('backend.partials.sidebar')
      <main class="app-content">
        @yield('content')
      </main>
   @include('backend.partials.footer')