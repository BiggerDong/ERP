@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9 col-md-offset-1" style="margin-top: 50px;">
                <div class="row" style="margin-bottom: -20px;">
                    <div class="col-md-2">
                        <a class="btn btn-sm btn-primary m-all" href="/materials">所有物料</a>
                    </div>
                    <div class="col-md-3 pull-right">
                        <form action="/materials/search">
                            <div class="form-group">
                                <input type="text" id="m-search" class="form-control" name="mid" placeholder="搜索物料编号"
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
                <form action="/materials/{{ $material->id }}" method="post">
                    <input type="hidden" name="_method" value="PUT">
                    {{ csrf_field() }}
                    <div class="row" style="margin-top: 20px;">
                        <div class="form-group">
                            <label for="m-number" class="col-md-2 control-label">物料编号</label>
                            <div class="col-md-3" style="margin-top: -8px;margin-left: -60px;">
                                <input type="text" class="form-control" name="mid" id="m-number"
                                       value="{{ $material->mid }}" readonly="readonly" style="cursor: not-allowed;">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="m-name" class="col-md-2 control-label" style="margin-top: -15px;margin-left: 60px;">物料名称</label>
                            <div class="col-md-3" style="margin-top: -23px;margin-left: -60px;">
                                <input type="text" class="form-control" name="name" id="m-name"
                                       value="{{ $material->name }}" placeholder="物料名称" required>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row" style="margin-top: 20px;">
                        <div class="form-group">
                            <label for="m-type" class="col-md-2 control-label">物料类型</label>
                            <div class="col-md-3" style="margin-top: -8px;margin-left: -60px;">
                                <input type="text" class="form-control" name="type" id="m-type"
                                       value="{{ $material->type }}" placeholder="物料类型" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="m-price" class="col-md-2 control-label" style="margin-top: -15px;margin-left: 60px;">物料价格</label>
                            <div class="col-md-3" style="margin-top: -23px;margin-left: -60px;">
                                <input type="text" class="form-control" name="price" id="m-price"
                                       value="{{ $material->price }}" placeholder="物料价格" required>
                            </div>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 40px;">
                        <div class="form-group">
                            <label for="m-stock" class="col-md-2 control-label">当前库存</label>
                            <div class="col-md-3" style="margin-top: -8px;margin-left: -60px;">
                                <input type="text" class="form-control" name="stock" id="m-stock"
                                       value="{{ $material->stock }}" placeholder="当前库存" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="m-sstock" class="col-md-2 control-label" style="margin-top: -15px;margin-left: 60px;">安全库存</label>
                            <div class="col-md-3" style="margin-top: -23px;margin-left: -60px;">
                                <input type="text" class="form-control" name="sstock" id="m-sstock"
                                       value="{{ $material->sstock }}" placeholder="安全库存" required>
                            </div>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 20px;">
                        <div class="form-group">
                            <label for="m-describe" class="col-md-2 control-label" style="margin-top: 20px;">物料描述</label>
                            <div class="col-md-8" style="margin-top: 12px;margin-left: -60px;">
                                <input type="text" class="form-control" name="describe" id="m-describe"
                                       value="{{ $material->describe }}" placeholder="物料描述">
                            </div>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 40px;">
                        <button class="btn btn-md btn-primary col-md-3 col-md-offset-3" style="border: none;">
                            修改物料
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
            $("#m-search").focus(function () {
                startAnimation();
                function startAnimation() {
                    $('#m-search').animate({marginLeft: "-=30px",width:"+=30px"}, 200)
                }
            }).blur(function () {
                startAnimation();
                function startAnimation() {
                    $('#m-search').animate({width: "-=30px",marginLeft: "+=30px"}, 200)
                }
            });
        });
    </script>
@endsection

<style>

    .btn.btn-sm.btn-primary.m-all {
        background: none;
        color: #20A0FF;
    }

    .btn.btn-sm.btn-primary.m-all:hover {
        background-color: #20A0FF;
        color: #ffffff;
        border-color: #20A0FF;
    }

</style>