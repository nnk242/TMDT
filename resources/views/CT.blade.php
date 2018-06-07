@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if (isset($cs))
                    <div class="card">
                        <div class="card-header">{{$cs->name}}</div>

                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success">
                                    {{ session('status') }}
                                </div>
                            @endif
                            <div>
                                <img class="w-75 m-auto d-block" src="{{ asset('images/' . $cs->image) }}">
                            </div>
                            <p class="mt-3">{{$cs->title}}</p>
                            <div class="mt-3 text-center">
                                <button class="btn-success btn">Thuê</button>
                            </div>
                        </div>
                    </div>
                @else
                    <p class="font-weight-bold text-center">Sản phẩm không tồn tại!</p>
                @endif
            </div>
        </div>
    </div>
@endsection
