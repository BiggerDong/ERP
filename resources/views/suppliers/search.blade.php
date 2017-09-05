@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9 col-md-offset-1" style="margin-top: 50px;">
                <div class="row" style="margin-bottom: -20px;">
                    <div class="col-md-2">
                        <a class="btn btn-sm btn-primary s-add" href="/suppliers">所有供应商</a>
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
                <table class="table">
                    <thead>
                    <tr>
                        <th>供应商编号</th>
                        <th>供应商名称</th>
                        <th>供应商电话</th>
                        <th>供应商地址</th>
                        <th>操作</th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">{{ $supplier->sid }}</th>
                            <td>{{ $supplier->name }}</td>
                            <td>{{ $supplier->phone }}</td>
                            <td>{{ $supplier->address }}</td>
                            <td>
                                <span style="color: #666;">
                                    <a style="cursor: pointer;text-decoration: none;" href="/suppliers/{{ $supplier->id }}/edit"
                                       data-toggle="tooltip" data-placement="top" title="修改">
                                        <i class="iconfont" style="color: #666;font-size: 16px;">&#xe605;</i>
                                    </a>
                                </span>
                            </td>
                        </tr>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $(function () {
            $('[data-toggle="tooltip"]').tooltip();
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

    .btn.btn-sm.btn-primary.s-add {
        background: none;
        color: #20A0FF;
    }

    .btn.btn-sm.btn-primary.s-add:hover {
        background-color: #20A0FF;
        color: #ffffff;
        border-color: #20A0FF;
    }

    span a:hover {
        color: #000000;
    }

</style>