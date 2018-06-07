@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <div id="demo" class="carousel slide" data-ride="carousel">
                    <ul class="carousel-indicators">
                        <li data-target="#demo" data-slide-to="0" class="active"></li>
                        <li data-target="#demo" data-slide-to="1"></li>
                        <li data-target="#demo" data-slide-to="2"></li>
                    </ul>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="{{asset('images/slide/1.jpg')}}" alt="Los Angeles" width="1100" height="500">
                            <div class="carousel-caption">
                                <h3>Nhiều loại xe.</h3>
                                <p>Sự lựa chọn hoàn hảo!</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="{{asset('images/slide/2.jpg')}}" alt="Chicago" width="1100" height="500">
                            <div class="carousel-caption">
                                <h3>Nhiều hình thức cho thuê.</h3>
                                <p>Lựa chọn phù hợp với túi tiền!</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="{{asset('images/slide/3.jpg')}}" alt="New York" width="1100" height="500">
                            <div class="carousel-caption">
                                <h3>Hợp đồng nhanh chóng</h3>
                                <p>Thời gian là vàng!</p>
                            </div>
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#demo" data-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                    </a>
                    <a class="carousel-control-next" href="#demo" data-slide="next">
                        <span class="carousel-control-next-icon"></span>
                    </a>
                </div>
            </div>
            <div class="col-md-5">
                <div>
                    <div class="media border p-3 bg-white" style="height:500px;">
                        <div class="media-body">
                            <h4>Tin tức</h4>
                            <p><b>1:</b> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                incididunt ut labore et dolore magna aliqua.</p>
                            <p><b>2:</b>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                incididunt ut labore et dolore magna aliqua.</p>
                        </div>
                    </div>
                </div>
            </div>

            {{--@foreach($cars as $car)--}}
            {{--<div class="col-md-3">--}}
            {{--<div class="card mt-3">--}}
            {{--<img class="card-img-top" src="{{asset('images/'.$car->image)}}" alt="Card image"--}}
            {{--style="width:100%; max-height: 100px; min-height: 100px">--}}
            {{--<div class="card-body">--}}
            {{--<h4 class="card-title" style="min-height: 70px">{{str_limit( $car->name,$limit=20,$end='...')}}</h4>--}}
            {{--<p class="card-text" style="min-height: 100px">{{ str_limit($car->title,$limit=40,$end='...')}}</p>--}}

            {{--<p class="card-text">Giá: {{ number_format($car->price) }} vnđ</p>--}}
            {{--<a href="#" class="btn btn-primary">Xem chi tiết</a>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--@endforeach--}}

        </div>
        <div class="container mt-3 bg-white">
            <h2>Chọn hình thức thuê xe</h2>
            <form>
                <div class="form-group">
                    <label for="type">Chọn loại xe:</label>
                    <select class="form-control" id="type" name="type">
                        <option value="all">Tất cả</option>
                        @foreach($types as $type)
                            <option value="{{$type->id}}">{{$type->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="curr">Giá tiền theo giờ:</label>
                    <select class="form-control" id="curr" name="curr">
                        <option value="all">Tất cả</option>
                        <option value="1">0 vnđ - 50.000 vnđ</option>
                        <option value="2">50.001 vnđ - 100.000 vnđ</option>
                        <option value="3">100.001 vnđ - 200.000 vnđ</option>
                        <option value="4">200.001 vnđ - 500.000 vnđ</option>
                        <option value="5">Trên 500.000 vnđ</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="mcar">Hãng xe:</label>
                    <select class="form-control" id="curr" name="mcar">
                        <option value="all">Tất cả</option>
                        @foreach($manufacturers as $manufacturer)
                            <option value="{{$manufacturer->id}}">{{$manufacturer->name}}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Lọc</button>
            </form>
        </div>
    </div>
@endsection