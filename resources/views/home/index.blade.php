{{--
  Variables disponibles :

 --}}

@extends('templates.index')

@section('title')
  Home
@endsection

@section('content')
  <section id="main-slider" class="no-margin">
    <div class="carousel slide">
      <ol class="carousel-indicators">
        <li data-target="#main-slider" data-slide-to="0" class="active"></li>
        <li data-target="#main-slider" data-slide-to="1"></li>
        <li data-target="#main-slider" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner">
        <div class="item active" style="background-image: url(assets/img/slides/1.jpg)">
          <div class="container">
            <div class="row">
              <div class="col-sm-12">
                <div class="carousel-content centered">
                  <h2 class="animation animated-item-1">Welcome to BASICA! A Bootstrap3 Template</h2>
                  <p class="animation animated-item-2">Sed mattis enim in nulla blandit tincidunt. Phasellus vel sem convallis, mattis est id, interdum augue. Integer luctus massa in arcu euismod venenatis. </p>
                </div>
              </div>
            </div>
          </div>
        </div><!--/.item-->
        <div class="item" style="background-image: url(assets/img/slides/2.jpg)">
          <div class="container">
            <div class="row">
              <div class="col-sm-12">
                <div class="carousel-content center centered">
                  <h2 class="animation animated-item-1">Powerful and Responsive HTML Template</h2>
                  <p class="animation animated-item-2">Phasellus adipiscing felis a dictum dictum. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec at ligula risus. </p>
                  <br>
                  <a class="btn btn-md animation animated-item-3" href="#">Learn More</a>
                </div>
              </div>
            </div>
          </div>
        </div><!--/.item-->
        <div class="item" style="background-image: url(assets/img/slides/3.jpg)">
          <div class="container">
            <div class="row">
              <div class="col-sm-12">
                <div class="carousel-content centered">
                  <h2 class="animation animated-item-1">Works Seamlessly Well on All Devices</h2>
                  <p class="animation animated-item-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce vitae euismod lacus. Maecenas in tempor lectus. Nam mattis, odio ut dapibus ornare, libero. </p>
                  <br>
                  <a class="btn btn-md animation animated-item-3" href="#">Learn More</a>
                </div>
              </div>
            </div>
          </div>
        </div><!--/.item-->
      </div><!--/.carousel-inner-->
    </div><!--/.carousel-->
    <a class="prev hidden-xs" href="#main-slider" data-slide="prev">
      <i class="icon-angle-left"></i>
    </a>
    <a class="next hidden-xs" href="#main-slider" data-slide="next">
      <i class="icon-angle-right"></i>
    </a>
  </section><!--/#main-slider-->

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
