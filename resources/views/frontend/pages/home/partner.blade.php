 <!-- Start Partners area -->
 <div class="partners-are-two ptb-100">
     <div class="container">
         <div class="section-title">
             <span class="top-title">PARTNERS</span>
             <h2>We are Trusted by</h2>
         </div>
         <div class="partners-logo-slider owl-carousel owl-theme">
             @foreach (getPartners() as $partner)
                 <div class="partners-logo">
                     <a href="javascript:void(0)">
                         <img style="width: 191px; height:97px" src="{{ Storage::url($partner->logo) }}"
                             alt="{{ $partner->name }}">
                     </a>
                 </div>
             @endforeach
         </div>
     </div>
 </div>
 <!-- End partners area -->
