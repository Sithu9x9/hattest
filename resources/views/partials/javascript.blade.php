 <!-- loader -->
 <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
     <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
     <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#044462" /></svg></div>

 <script src="{{asset('js/jquery.min.js')}}"></script>
 <script src="{{asset('js/jquery-migrate-3.0.1.min.js')}}"></script>
 <script src="{{asset('js/popper.min.js')}}"></script>
 <script src="{{asset('js/bootstrap.min.js')}}"></script>
 <script src="{{asset('js/jquery.easing.1.3.js')}}"></script>
 <script src="{{asset('js/jquery.waypoints.min.js')}}"></script>
 <script src="{{asset('js/jquery.stellar.min.js')}}"></script>
 <script src="{{asset('js/jquery.animateNumber.min.js')}}"></script>
 <script src="{{asset('js/bootstrap-datepicker.js')}}"></script>
 <script src="{{asset('js/jquery.timepicker.min.js')}}"></script>
 <script src="{{asset('js/owl.carousel.min.js')}}"></script>
 <script src="{{asset('js/jquery.magnific-popup.min.js')}}"></script>

 <!-- <script src="{{asset('js/scrollax.min.js')}}"></script> -->
 <script src="{{asset('js/main.js')}}"></script>
 @include('partials.mobile-nav-script')
  <script>
     $(document).ready(function(){
         $("#footer").addClass('fixed-bottom');
     })
 </script>
 @yield('javascript')
