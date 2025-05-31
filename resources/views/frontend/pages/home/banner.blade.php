 <!-- Start Banner Two Area -->
 <div class="banner-two-area">
     <div class="banner-two-slider owl-carousel owl-theme">
         @foreach ($sliders as $sliders)
             <div class="single-banner-two-content">
                 <div class="container-fluid">
                     <div class="row align-items-center">
                         <div class="col-lg-6">
                             <div class="banner-two-content">
                                 <span>WELCOME TO IDEA ARCHITECTS LIMITED</span>
                                 <h1>{{ $slider->title }}</h1>
                                 <p>{{ $slider->short_description }}</p>
                                 <div class="banner-two-btn">
                                     <a href="/about-us" class="default-btn">Our Services <i
                                             class="flaticon-next"></i></a>
                                 </div>
                             </div>
                         </div>
                         <div class="col-lg-6">
                             <div class="banner-two-image">
                                 <img src="{{ Storage::url($slider->logo) }}" alt="{{ $slider->title }}">
                                 <div class="banner-two-shape">
                                     <img src="{{ asset('assets/frontend/images/banner/banner-two-shape-1.png') }}"
                                         alt="images">
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         @endforeach
     </div>
 </div>
 <!-- End Banner Two Area -->
