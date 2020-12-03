@extends('layouts.app')
@section('css', 'mypage.css')

@section('title', 'スポット検索')

@section('content')
  <!-- Page Content -->
  <div class="container">

    <div class="row">

      <div class="col-lg-3">

        <h1 class="my-4"> 俺のアニメ</h1>
        <div class="list-group">
          <a href="#" class="list-group-item">Category 1</a>
          <a href="#" class="list-group-item">Category 2</a>
          <a href="#" class="list-group-item">Category 3</a>
        </div>

      </div>
      <!-- /.col-lg-3 -->

      <div class="col-lg-9">
        <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
          </ol>
          <div class="carousel-inner" role="listbox">
            <div class="carousel-item active">
              <img class="d-block img-fluid" src="http://placehold.it/900x350" alt="First slide">
            </div>
            <div class="carousel-item">
              <img class="d-block img-fluid" src="http://placehold.it/900x350" alt="Second slide">
            </div>
            <div class="carousel-item">
              <img class="d-block img-fluid" src="http://placehold.it/900x350" alt="Third slide">
            </div>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>

        <div class="row">
          @foreach($all_animes as $all_anime)
          <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100">
              @if($all_anime->anime_image == null)
              <img class="card-img-top" src="/images/noimage.png" alt="">
              @else
              <img class="card-img-top" src="{{ asset('storage/animes/' .$all_anime->anime_image) }}" alt="">
              @endif
              <div class="card-body">
                <h4 class="card-title">
                  <a href="#">{{ $all_anime->title }}</a>
                </h4>

                <p class="card-text">{{ $all_anime->text }}</p>
              </div>
              <div class="card-footer">
                <small class="text-muted">Status : {{ $all_anime->status }}<br></small>
                @if($all_anime->recommend == 1)
                <small class="text-muted">おすすめ : &#9733; &#9734; &#9734; &#9734; &#9734;</small>
                @elseif($all_anime->recommend == 2)
                <small class="text-muted">おすすめ : &#9733; &#9733; &#9734; &#9734; &#9734;</small>
                @elseif($all_anime->recommend == 3)
                <small class="text-muted">おすすめ : &#9733; &#9733; &#9733; &#9734; &#9734;</small>
                @elseif($all_anime->recommend == 4)
                <small class="text-muted">おすすめ : &#9733; &#9733; &#9733; &#9733; &#9734;</small>
                @else
                <small class="text-muted">おすすめ : &#9733; &#9733; &#9733; &#9733; &#9733;</small>
                @endif
                @if ($all_anime->user_id === Auth::user()->id)
                  <a href="{{ url('animes/' .$all_anime->id .'/edit') }}" class="btn btn-primary">アニメ情報の編集</a>
                @endif
              </div>
            </div>
          </div>
          @endforeach
        </div>
        <div class="my-4 d-md-flex justify-content-center">
          {{ $all_animes->links() }}
        </div>
        <!-- /.row -->

      </div>
      <!-- /.col-lg-9 -->

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->
  @endsection
  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>
