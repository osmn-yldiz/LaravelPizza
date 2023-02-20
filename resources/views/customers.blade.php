@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row ">
            <div class="col-md-12">

                <div class="card ">
                    <div class="card-header"><i class="fas fa-users"></i> Kullanıcılar
                        <a style="float:right;" href="{{route("category.index")}}">
                            <button class="bnt btn-secondary btn-sm" style="margin-left: 5px;">Kategoriler</button>
                        </a>
                        <a style="float:right;" href="{{route("user.order")}}">
                            <button class="bnt btn-secondary btn-sm">Siparişler</button>
                        </a>

                    </div>
                    <div class="card-body ">
                        <table class="table table-bordered table-hover text-center">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">İsim</th>
                                <th scope="col">Email</th>
                                <th scope="col">Kayıt Tarihi</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($customers as $customer)
                                <tr>

                                    <th scope="row">{{ $customers->firstItem() + $loop->index }}</th>
                                    <td>{{ $customer->name }}</td>
                                    <td>{{ $customer->email }}</td>
                                    <td>{{ \Carbon\Carbon::parse($customer->created_at)->format('d/m/Y') }}</td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-center">
                            {{$customers->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
