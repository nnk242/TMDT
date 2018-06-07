@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-6 bg-white p-3">
                <h4 class="text-center">Đặt xe: {{$cs->name}}</h4>
                <div></div>
                <form>
                    <div class="form-group">
                        <label for="hoten">Họ tên:</label>
                        <input type="text" class="form-control" id="hoten" name="hoten">
                    </div>
                    <div class="form-group">
                        <label for="sdt">Số điện thoại:</label>
                        <input type="text" class="form-control" id="sdt">
                    </div>
                    <div class="form-group">
                        <label for="sdt">Thời gian đón:</label>
                        <input type="time" class="form-control" id="tgd">
                    </div>

                    <button type="submit" class="btn btn-primary">Gửi cho chủ xe</button>
                </form>
            </div>
        </div>
    </div>
@endsection
