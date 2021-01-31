{{--
  Variables disponibles :
    - $tags ARRAY(Tag)
 --}}

@foreach($tags as $i => $tag)
  {{ $tag->name }}
  @if($i < count($tags) -1)
   ,
  @endif
@endforeach
