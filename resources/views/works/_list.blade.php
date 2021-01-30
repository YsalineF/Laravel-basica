@foreach($works as $work)
  <div class="col-md-4 col-sm-6">
    <figure>
      <img src="{{ asset('assets/img/portfolio/' . $work->image . '.jpg') }}" alt="img04">
      <figcaption>
        <h3>{{ $work->title }}</h3>
        <span>{{ $work->client->name }}</span>
        <a href="portfolio-item.html">Take a look</a>
      </figcaption>
    </figure>
  </div>
@endforeach
