{{--
  Variables disponibles :
    - $works : ARRAY(Work)
 --}}
 @foreach($works as $key => $work)
 <div class="item {{$key == 0 ? 'active' : '' }}" style="background-image: url('{{ asset('assets/img/portfolio/' . $work->image) }}')">
   <div class="container">
     <div class="row">
       <div class="col-sm-12">
         <div class="carousel-content centered">
           <h2 class="animation animated-item-1">{{ $work->title }}</h2>
           <p class="animation animated-item-2">{{ Str::words($work->content, 25, ' ...') }}</p>
         </div>
       </div>
     </div>
   </div>
 </div><!--/.item-->
@endforeach
