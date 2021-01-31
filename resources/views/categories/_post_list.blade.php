{{--
  Variables disponibles :
    - $categories : ARRAY(Categorie)
 --}}
<h4>Categories</h4>
<ul class="blog-categories">
  @foreach($categories as $categorie)
    <li>
      <a href="#">
        {{ $categorie->name }}
      </a>
    </li>
  @endforeach()
</ul>
