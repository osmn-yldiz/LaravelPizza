@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-md-4">
                @include("inc.sidebar")

                @if ($errors->any())
                    <div class="card mt-3">
                        <div class="card-body">
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                @endif
            </div>

            <div class="col-md-8">
                @if (count($errors) > 0)
                    <div class="card mt-5">
                        <div class="card-body">
                            <div class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <p> {{ $error }}<p>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endif
                <div class="card">
                    <div class="card-header"><i class="fas fa-pizza-slice"></i> Pizza Düzenle</div>

                    <div class="container">
                        <form action="{{ route('pizza.update', $pizza->id) }}" method="post"
                              enctype="multipart/form-data">@csrf
                            @method("PUT")
                            <div class="card-body">

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="name">İsim</label>
                                            <input type="text" class="form-control" name="name"
                                                   value="{{$pizza->name}}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="name">Seo Url</label>
                                            <input type="text" class="form-control" name="url"
                                                   value="{{$pizza->url}}" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="description">Açıklama</label>
                                            <textarea class="form-control"
                                                      name="description">{{$pizza->description}}</textarea>
                                        </div>
                                    </div>
                                </div>

                                <label for="price">Fiyat</label>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="text" name="price" class="form-control"
                                                   value="{{$pizza->price}}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="image">Resim</label>
                                            <input type="file" name="image" class="form-control">
                                            <img src="{{ asset("pizza_images/".$pizza->image) }}" alt="{{$pizza->name}}"
                                                 width="80">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group text-center">
                                            <button class="btn btn-primary" type="submit">Güncelle</button>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
