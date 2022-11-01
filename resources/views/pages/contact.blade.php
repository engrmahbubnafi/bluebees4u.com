@extends('layouts.front')

@section("title") Contact Us @endsection

@section('content')
<div class="inner_page_bnr">
  <div class="container">
    <h2>Contact Us</h2>

    <div class="breadcum_bg">
      <div class="container">
        <ol class="breadcrumb">
          <li class="active"><a href="/">Home</a></li>
          <li><a href="contact">Contact Us</a></li>
        </ol>
      </div>
    </div>

  </div>
</div>

<div class="wdt_100 pad_94_100">
  <div class="container">
    <h3 class="black-color mar_btm1">Get In <span class="lytgreen-head">Touch</span></h3>
    <div class="row">
      <div class="col-lg-8 col-md-7 col-sm-12 col-xs-12">
        <form action="contact_process.php" method="post" id="contactForm">
          <div class="messages"></div>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <input id="name" type="text" name="name" placeholder="Name" required="" class="form-control">
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <input id="email" type="email" name="email" placeholder="Email" title="Please enter a valid email" required="" class="form-control">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <input id="subject" type="text" name="subject" placeholder="Subject" required="" class="form-control">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <textarea id="message" name="message" rows="4" placeholder="Message" class="form-control contact_textarea"></textarea>
              </div>
            </div>
            <div class="col-md-12">
              <input type="submit" value="submit now" class="btn submit_now">
            </div>
          </div>
        </form>
        <div id="success" >
		      <p style="color:seagreen">Your text message sent successfully!</p>
	      </div>
        <div id="error">
          <p>Sorry! Message not sent. Something went wrong!!</p>
        </div>
      </div>
      <div class="col-lg-4 col-md-5 col-sm-12 col-xs-12">
        <div class="contact_info wdt_100">
          <ul>
            <li class="cnt_map_icon">
              <p>MF Tower (4th Floor),<br>Plot-GA-95/C, Pragati Sarani Gulshan 1 Link Road, Dhaka-1212, Bangladesh</p>
            </li>
            <li class="cnt_mail_icon">
              <p class="cnt_fnt_14" style="margin-top: 10px;">info@index-agro.com</p>
              <p class="cnt_fnt_14">&nbsp; </p>
            </li>
            <li class="cnt_call_icon">
              <p class="cnt_fnt_14">


                <a href="tel:+8802222296442" style="color: #8e8d8d;">+88-02-222296442</a> <br>
                <a href="tel:16663" style="color: #8e8d8d;">16663, ex 1009</a>

            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="full_width">
  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3651.0736346867743!2d90.42324501498192!3d23.780392084574622!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c723333c825b%3A0x693c83c532dbdd2c!2sIndex%20Agro%20Industries%20Limited!5e0!3m2!1sen!2sbd!4v1603173763147!5m2!1sen!2sbd" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
</div>
@endsection

@push('css')
<style>
  .error{
  color: red;
  font-weight: 400;
  }
  </style>
@endpush
