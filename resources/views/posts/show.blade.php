{{--
  Variables disponibles :
    - $post Post
 --}}

@extends('templates.index')

@section('title')
  {{ $post->title }}
@endsection

@section('breadcrumbs')
  Blog post
@endsection

@section('content')
  @include('templates.breadcrumbs')
  <div class="section">
    <div class="container">
      <div class="row">
        <!-- Blog Post -->
        <div class="col-sm-8">
          <div class="blog-post blog-single-post">
            <div class="single-post-title">
              <h2>{{ $post->title }}</h2>
            </div>

            <div class="single-post-image">
              <img src="{{ asset('assets/img/blog/' . $post->image . '.jpg')}}" alt="{{ $post->title }}">
            </div>
            <div class="single-post-info">
              <i class="glyphicon glyphicon-time"></i>{{ \Carbon\Carbon::parse($post->created_at)->format('d M, Y') }} <a href="#" title="Show Comments"><i class="glyphicon glyphicon-comment"></i>11</a>
            </div>
            <div class="single-post-content">
              <h3>{{ $post->title }}</h3>
              <div>
                {!! $post->content !!}
              </div>
            </div>
          </div>
        </div>
        <!-- End Blog Post -->
        <!-- Sidebar -->
        <div class="col-sm-4 blog-sidebar">

          @include('posts._post_listRecentPosts', ['posts' => \App\Models\Post::orderBy('created_at', 'DESC')->take(4)->get()])
          @include('categories._post_list', ['categories' => \App\Models\Categorie::orderBy('name', 'ASC')->get()])

        </div>
        <!-- End Sidebar -->
      </div>
    </div>
  </div>
@endsection
