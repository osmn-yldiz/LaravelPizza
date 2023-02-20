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
                <div class="card">
                    <div class="card-header"><i class="fas fa-pizza-slice"></i> Pizza</div>
                    <div class="container">
                        <form action="{{ route('pizza.store', $subcategory->id) }}" method="post"
                              enctype="multipart/form-data">@csrf @method("POST")
                            <div class="card-body">

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name">İsim</label>
                                            <input type="text" class="form-control" name="name"
                                                   placeholder="Pizza ismi giriniz." value="{{ old('name') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="description">Açıklama</label>
                                            <textarea class="form-control" name="description"
                                                      placeholder="Pizza açıklaması giriniz.">{{ old('description') }}</textarea>
                                        </div>
                                    </div>
                                </div>


                                <label for="price">Fiyat</label>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="text" name="price" class="form-control"
                                                   placeholder="Pizza fiyatını giriniz.">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="image">Resim</label>
                                            <input type="file" name="image" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group text-center">
                                            <button class="btn btn-primary" type="submit">Kaydet</button>
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
