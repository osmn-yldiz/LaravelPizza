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
                    <div class="card-header"><i class="fa-solid fa-bars"></i> Kategori</div>
                    <div class="container">
                        <form action="{{ route('category.update', $category->id) }}" method="post"> @csrf @method("PUT")
                            <div class="card-body">

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name">İsim</label>
                                            <input type="text" class="form-control" name="name"
                                                   value="{{ $category->name }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name">Url</label>
                                            <input type="text" class="form-control" name="name"
                                                   value="{{ $category->url }}" disabled>
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
