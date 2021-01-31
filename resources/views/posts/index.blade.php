@extends('templates.index')

@section('title')
  Blog
@endsection

@section('breadcrumbs')
  Our blog
@endsection

@section('content')
  @include('templates.breadcrumbs')
  <div class="section">
    <div class="container">
      <div class="row">
        @include('posts._list')

        <!-- Pagination -->
        <div class="pagination-wrapper">
          {{ $posts->links('pagination::bootstrap-4') }}
        </div>
      </div>
    </div>
  </div>
@endsection
