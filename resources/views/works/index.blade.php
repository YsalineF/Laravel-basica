{{--
Variables disponibles :
$works
--}}

@extends('templates.index')

@section('scripts')
  <script src={{ asset('assets/js/portfolio/index.js') }}></script>
@endsection

@section('breadcrumbs')
  our portfolio
@endsection

@section('title')
  Portfolio
@endsection

@section('content')
  @include('templates.breadcrumbs');

  <div class="section">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <h2>We are leading company</h2>
          <h3>Specializing in Wordpress Theme Development</h3>
          <p>
            Donec elementum mi vitae enim fermentum lobortis. In hac habitasse platea dictumst. Ut pellentesque, orci sed mattis consequat, libero ante lacinia arcu, ac porta lacus urna in lorem. Praesent consectetur tristique augue, eget elementum diam suscipit id. Donec elementum mi vitae enim fermentum lobortis.
          </p>

        </div>
      </div>
    </div>
  </div>

  <div class="section">
    <div class="container">
      <div class="row">

        <ul class="grid cs-style-2" id="works_list">
          @include('works._list')
        </ul>

      </div>

      <ul class="pager">
        <li><a href="#" id="portfolio_index_more" data-url="{{ route('works.ajax.more') }}" data-limit="3">More works</a></li>
      </ul>

    </div>
  </div>
@endsection
