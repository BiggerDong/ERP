@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9 col-md-offset-1" style="margin-top: 50px;">
                <div class="row" style="margin-bottom: -20px;">
                    <div class="col-md-2">
                        <a class="btn btn-sm btn-primary s-all" href="/suppliers">所有供应商</a>
                    </div>
                    <div class="col-md-3 pull-right">
                        <form action="/suppliers/search">
                            <div class="form-group">
                                <input type="text" id="s-search" class="form-control" name="sid" placeholder="搜索供应商编号"
                                       style="border: none;border-radius: 20px;background-color: #EFF2F7;text-indent: 5px;">
                                <button type="submit" class="btn btn-link"
                                        style="text-decoration: none;margin-top: -38px;margin-left: 145px;">
                                    <i class="iconfont" id="search_icon"
                                       style="color: #959FAF;font-size: 16px;">&#xe69f;</i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <hr>
            </div>

            <div class="col-md-9 col-md-offset-1">
                <form action="/suppliers/{{ $supplier->id }}" method="post">
                    <input type="hidden" name="_method" value="PUT">
                    {{ csrf_field() }}
                    <div class="row" style="margin-top: 20px;">
                        <div class="form-group">
                            <label for="s-number" class="col-md-2 control-label">供应商编号</label>
                            <div class="col-md-3" style="margin-top: -8px;margin-left: -60px;">
                                <input type="text" class="form-control" name="sid" id="s-number"
                                       value="{{ $supplier->sid }}" readonly="readonly" style="cursor: not-allowed;">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="s-name" class="col-md-2 control-label" style="margin-top: -15px;margin-left: 60px;">供应商名称</label>
                            <div class="col-md-3" style="margin-top: -23px;margin-left: -60px;">
                                <input type="text" class="form-control" name="name" id="s-name"
                                       value="{{ $supplier->name }}" placeholder="供应商名称" required>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row" style="margin-top: 20px;">
                        <div class="form-group">
                            <label for="s-phone" class="col-md-2 control-label">供应商电话</label>
                            <div class="col-md-3" style="margin-top: -8px;margin-left: -60px;">
                                <input type="text" class="form-control" name="phone" id="m-phone"
                                       value="{{ $supplier->phone }}" placeholder="供应商电话" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="m-address" class="col-md-2 control-label" style="margin-top: -15px;margin-left: 60px;">供应商地址</label>
                            <div class="col-md-3" style="margin-top: -23px;margin-left: -60px;">
                                <input type="text" class="form-control" name="address" id="m-address"
                                       value="{{ $supplier->address }}" placeholder="供应商地址" required>
                            </div>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 40px;">
                        <button class="btn btn-md btn-primary col-md-3 col-md-offset-3" style="border: none;">
                            修改
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $(function () {
            $("#s-search").focus(function () {
                startAnimation();
                function startAnimation() {
                    $('#s-search').animate({marginLeft: "-=30px",width:"+=30px"}, 200)
                }
            }).blur(function () {
                startAnimation();
                function startAnimation() {
                    $('#s-search').animate({width: "-=30px",marginLeft: "+=30px"}, 200)
                }
            });
        });
    </script>
@endsection

<style>
    form input {
        box-shadow: none!important;
    }

    .btn.btn-sm.btn-primary.s-all {
        background: none;
        color: #20A0FF;
    }

    .btn.btn-sm.btn-primary.s-all:hover {
        background-color: #20A0FF;
        color: #ffffff;
        border-color: #20A0FF;
    }

</style>