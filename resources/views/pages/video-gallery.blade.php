@extends('layouts.front')

@section("title") Video Gallery @endsection

@section('content')
<div class="inner_page_bnr">
      <div class="container">
        <h2>Video Gallery</h2>
        <div class="breadcum_bg">
          <div class="container">
            <ol class="breadcrumb">
              <li class="active"><a href="/">Home</a></li>
              <li><a href="video-gallery">Video Gallery</a></li>
            </ol>
          </div>
        </div>
      </div>
    </div>

    <div class="pad_84_70 wdt_100">
      <div class="container">
        <div class="row">

        <div class="col-md-6 mb-30">

        <iframe width="560" height="315" src="https://www.youtube.com/embed/I9XsoJ1_8IY" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

        </div>
          <div class="col-md-6 mb-30">
            <iframe width="560" height="315" src="https://www.youtube.com/embed/_jlReWZOuXY" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
          </div>

          <div class="col-md-6 mb-30">
            <iframe width="560" height="315" src="https://www.youtube.com/embed/GWADoCp5rzE" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
          </div>

          <div class="col-md-6 mb-30">
            <iframe width="560" height="315" src="https://www.youtube.com/embed/6aSquhvyrvQ" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
          </div>
      </div>
      
    </div>
  </div>
  @endsection