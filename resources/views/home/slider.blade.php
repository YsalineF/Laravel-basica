{{--
  Variables disponibles :
    $works : ARRAY(Work)
 --}}

 <section id="main-slider" class="no-margin">
   <div class="carousel slide">
     <ol class="carousel-indicators">
       @foreach($works as $i => $work)
         <li data-target="#main-slider" data-slide-to="{{ $i }}" class="@if($i == 0) active @endif"></li>
       @endforeach()
     </ol>
     <div class="carousel-inner">
       @include('home.slide', $works)
     </div><!--/.carousel-inner-->
   </div><!--/.carousel-->
   <a class="prev hidden-xs" href="#main-slider" data-slide="prev">
     <i class="icon-angle-left"></i>
   </a>
   <a class="next hidden-xs" href="#main-slider" data-slide="next">
     <i class="icon-angle-right"></i>
   </a>
 </section><!--/#main-slider-->
