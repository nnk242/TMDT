@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="container bg-white">
            <div class="pt-3 pb-3">
                <form class="form-inline">
                    <label for="type" class="mr-2">Chọn loại xe:</label>
                    <select class="form-control mr-2" id="type" name="type">
                        <option value="all">Tất cả</option>
                        @foreach($types as $type)
                            <option @if($tslt == $type->id) selected
                                    @endif value="{{$type->id}}">{{$type->name}}</option>
                        @endforeach
                    </select>
                    <label for="curr" class="mr-2">Giá tiền theo giờ:</label>
                    <select class="form-control mr-2" id="curr" name="curr">
                        <option @if($cslt == 'all') selected @endif value="all">Tất cả</option>
                        <option @if($cslt == '1') selected @endif value="1">0 vnđ - 50.000 vnđ</option>
                        <option @if($cslt == '2') selected @endif value="2">50.001 vnđ - 100.000 vnđ</option>
                        <option @if($cslt == '3') selected @endif value="3">100.001 vnđ - 200.000 vnđ</option>
                        <option @if($cslt == '4') selected @endif value="4">200.001 vnđ - 500.000 vnđ</option>
                        <option @if($cslt == '5') selected @endif value="5">Trên 500.000 vnđ</option>
                    </select>
                    <label for="mcar" class="mr-2">Hãng xe:</label>
                    <select class="form-control mr-2" id="curr" name="mcar">
                        <option value="all">Tất cả</option>
                        @foreach($manufacturers as $manufacturer)
                            <option @if($mslt == $manufacturer->id) selected
                                    @endif value="{{$manufacturer->id}}">{{$manufacturer->name}}</option>
                        @endforeach
                    </select>
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                </form>
            </div>
        </div>
        <div class="bg-white container mt-3 pb-3">
            @if (count($cars))
                <div class="row">
                    @foreach($cars as $car)
                        <div class="col-md-3">
                            <div class="card mt-3">
                                <img class="card-img-top" src="{{asset('images/'.$car->image)}}" alt="Card image"
                                     style="width:100%; max-height: 100px; min-height: 100px">
                                <div class="card-body">
                                    <h4 class="card-title"
                                        style="min-height: 70px">{{str_limit( $car->name,$limit=20,$end='...')}}</h4>
                                    <p class="card-text"
                                       style="min-height: 100px">{{ str_limit($car->title,$limit=40,$end='...')}}</p>

                                    <p class="card-text">Giá: {{ number_format($car->price) }} vnđ/giờ</p>
                                    <a href="{{route('info', ['id'=>$car->id])}}"><button class="btn btn-primary">Xem chi tiết</button></a>
                                    <a href="{{ route('bookcar', ['id'=>$car->id]) }}"><button class="btn btn-success">Đặt xe</button></a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <p class="text-center pt-5 font-weight-bold">Không có sự lựa chọn nào</p>
            @endif
        </div>
    </div>
@endsection