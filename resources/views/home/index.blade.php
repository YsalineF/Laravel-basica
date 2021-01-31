{{--
  Variables disponibles :

 --}}

@extends('templates.index')

@section('title')
  Home
@endsection

@section('content')
  @include('home.slider', ['works' => \App\Models\Work::where('inSlider', 1)->orderBy('created_at', 'DESC')->take(5)->get()])

  <!-- Our Portfolio -->
    @include('works._home_recentWorks', ['works' => \App\Models\Work::orderBy('created_at', 'DESC')->take(6)->get()])
  <!-- Our Portfolio -->

  <hr>

  <!-- Our Articles -->
  <div class="section">
    <div class="container">
      <div class="row">

        <!-- Featured News -->
        @include('posts._home_latestPosts', ['posts' => \App\Models\Post::orderBy('created_at', 'DESC')->take(3)->get()])
        <!-- End Featured News -->

        <!-- Latest News Twitter -->
        <div class="col-sm-6 latest-news">
          <h2>Lastest FaceBook/Twitter News</h2>
          <a class="twitter-timeline" data-width="500" data-height="500" href="https://twitter.com/FranquetYsaline?ref_src=twsrc%5Etfw">Tweets by FranquetYsaline</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
        </div>
        <!-- End Featured News -->

      </div>
    </div>
  </div>
@endsection
