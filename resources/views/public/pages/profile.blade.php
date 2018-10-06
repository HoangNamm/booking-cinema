@extends('public.layout.master')
@section('title', 'Profile')
@section('content')
<div class="contact-agile">
<div class="faq">
  <h4 class="latest-text w3_latest_text">Information</h4>
  <div class="container">
    <div class="col-md-3 location-agileinfo">
      <div class="icon-w3">
        <span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span>
      </div>
      <h3>Address</h3>
      <h4 id="address">345 Setwant natrer,</h4>
    </div>
    <div class="col-md-3 call-agileits">
      <div class="icon-w3">
        <span class="glyphicon glyphicon-earphone" aria-hidden="true"></span>
      </div>
      <h3>Call</h3>
      <h4 id="phone">+18044126235</h4>
    </div>
    <div class="col-md-3 mail-wthree">
      <div class="icon-w3">
        <span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>
      </div>
      <h3>Email</h3>
      <h4><a id="email">example1@mail.com</a></h4>
    </div>
    <div class="col-md-3 social-w3l">
      <div class="icon-w3">
        <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
      </div>
      <h3>Full Name</h3>
      <ul>
        <li><a><span class="text" id="full_name">Facebook</span></a></li>
      </ul>
    </div>
    <div class="clearfix"></div>
    <form action="#" method="post">
      <input type="text" name="your name" placeholder="FIRST NAME" required="">
      <input type="text" name="your name" placeholder="LAST NAME" required="">
      <input type="text" name="your email" placeholder="EMAIL" required="">
      <input type="text" name="subject" placeholder="SUBJECT" required="">
      <textarea name="your message" placeholder="YOUR MESSAGE" required=""></textarea>
    </form>
  </div>
</div>
</div>
@endsection
@section('script')
<script src="js/public/script.js"></script>
@endsection