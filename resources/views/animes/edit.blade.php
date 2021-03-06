@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Update</div>

                <div class="card-body">
                    <form method="post" action="{{ url('animes/' .$anime->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif

                        <div class="form-group row mb-0">
                            <div class="col-md-12 p-3 w-100 d-flex">
                                @if($user->profile_image == null)
                                <img src="/images/noimage.png" class="rounded-circle" width="50" height="50" alt="profile_image">
                                @else
                                <img src="{{ asset('storage/profile_image/' .$user->profile_image) }}" class="rounded-circle" width="50" height="50" alt="profile_image">
                                @endif
                                <div class="ml-2 d-flex flex-column">
                                    <p class="mb-0">{{ $user->name }}</p>
                                    <a href="{{ url('users/' .$user->id) }}" class="text-secondary">{{ $user->screen_name }}</a>
                                </div>
                            </div>
                        </div>

                        <!-- タイトル -->
                        <div class="form-group">
                            <label for="title" class=" col-form-label text-md-right">{{ __('Title') }}</label>

                            <div class="">
                                <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') ? : $anime->title }}" required autocomplete="title" autofocus>

                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- コメント入力 -->
                        <div class="form-group">
                            <label for="text" class=" col-form-label text-md-right">{{ __('Text') }}</label>

                            <div class="">
                                <textarea class="form-control @error('text') is-invalid @enderror" name="text" required autocomplete="text" rows="4">{{ old('text') ? : $anime->text  }}</textarea>

                                @error('text')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-12 text-right">
                                <p class="mb-4 text-danger">200文字以内</p>
                            </div>
                        </div>

                        <!-- 状態 -->
                        <div class="form-group">
                            <label for="status" class=" col-form-label text-md-right">{{ __('Status') }}</label>

                            <div class="">
                                <select name="status" class="form-control">
                                    <option value="{{ old('status') ? : $anime->status  }}">{{ $anime->status }}</option>
                                    <option value="見たい">見たい</option>
                                    <option value="見てる">見てる</option>
                                    <option value="見た">見た</option>
                                    <option value="一時中断">一時中断</option>
                                    <option value="途中放棄">途中放棄</option>
                                </select>

                                @error('status')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- おすすめ度 -->
                        <div class="form-group">
                            <label for="recommend" class=" col-form-label text-md-right">{{ __('Recommend') }}</label>

                            <div class="">
                                <select name="recommend" class="form-control">
                                    <option value="{{ old('recommend') ? : $anime->recommend  }}">
                                        @if($anime->recommend == 1)
                                        <small class="text-muted">&#9733; &#9734; &#9734; &#9734; &#9734;</small>
                                        @elseif($anime->recommend == 2)
                                        <small class="text-muted">&#9733; &#9733; &#9734; &#9734; &#9734;</small>
                                        @elseif($anime->recommend == 3)
                                        <small class="text-muted">&#9733; &#9733; &#9733; &#9734; &#9734;</small>
                                        @elseif($anime->recommend == 4)
                                        <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                                        @else
                                        <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9733;</small>
                                        @endif
                                    </option>
                                    <option value="1">&#9733; &#9734; &#9734; &#9734; &#9734;</option>
                                    <option value="2">&#9733; &#9733; &#9734; &#9734; &#9734;</option>
                                    <option value="3">&#9733; &#9733; &#9733; &#9734; &#9734;</option>
                                    <option value="4">&#9733; &#9733; &#9733; &#9733; &#9734;</option>
                                    <option value="5">&#9733; &#9733; &#9733; &#9733; &#9733;</option>
                                </select>

                                @error('status')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- アニメの画像 -->
                        <div class="form-group">
                            <label for="image" class="col-form-label text-md-right">{{ __('Image') }}</label>

                            <div class="">
                                <p>選択中の画像</p>
                                @if($anime->anime_image == null)
                                <img src="/images/noimage.png" class="rounded-circle" width="80" height="80" alt="profile_image">
                                @else
                                <img src="{{ asset('storage/animes/' .$anime->anime_image) }}" class="rounded-circle" width="80" height="80" alt="profile_image">
                                @endif

                                <input id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="image">

                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <input type="hidden" name="id" value="{{ $anime->id }}">
                                <button type="submit" class="btn btn-primary">更新する</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
