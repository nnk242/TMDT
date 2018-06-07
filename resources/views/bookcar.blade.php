@extends('layouts.app')

@section('content')

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-6 bg-white p-3">
                <h4 class="text-center">Đặt xe: <a href="{{route('info', ['id'=>$cs->id])}}">{{$cs->name}}</a></h4>
                <div><IMG src="{{asset('images/'.$cs->image)}}" class="w-25 m-auto d-block"></div>
                <form method="post" action="{{route('postbookcar', ['id'=>$cs->id])}}">
                    {!! csrf_field() !!}
                    <div class="form-group">
                        <label for="hoten">Họ tên:</label>
                        <input type="text" class="form-control" id="hoten" name="hoten" required>
                    </div>
                    <div class="form-group">
                        <label for="sdt">Số điện thoại:</label>
                        <input type="number" class="form-control" id="sdt" name="sdt">
                    </div>
                    <div class="form-group">
                        <label for="diachi">Địa chỉ - <SMALL>Khu vực chủ xe có thể tới là:</SMALL> <span class="h3">{{$cs->local}}</span></label>
                        <input type="text" class="form-control" id="diachi" name="diachi" required>
                    </div>
                    <div class="form-group">
                        <label for="tgd">Thời gian đón:</label>
                        <input type="time" class="form-control" id="tgd" name="tgd" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Gửi cho chủ xe</button>
                </form>
            </div>
        </div>
    </div>
@endsection


