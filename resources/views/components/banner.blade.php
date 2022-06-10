@if ($dataArr && count($dataArr))
    <div id="slider">
        <div class="container-fluid">
            <div class="row">
                <!-- Paradise Slider -->
                <div id="fw_al_002" class="carousel slide swipe_x ps_easeInOutSine" data-ride="carousel"
                     data-pause="hover"
                     data-interval="5000" data-duration="2000">

                    <!-- Wrapper For Slides -->
                    <div class="carousel-inner" role="listbox">
                    @foreach($dataArr['document'] as $key=>$data)
                        <!-- Slide -->
                            <div class="carousel-item @if($key==0)active @endif slide-{{$key+1}}">
                                <div class="overl"></div>
                                <!-- Slide Background -->
                                <img src="{{ asset("storage".$data['file']) }}"
                                     alt="BlueBees4U Banner"/>
                                <!-- Slide Text Layer -->
                                <div class="fw_al_002_slide">
                                    <h1 class="bold" data-animation="animated fadeInRight">{!! $data['name'] !!}</h1>
                                    <p data-animation="animated fadeInRight">
                                        {{$data['description']}}
                                    </p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
