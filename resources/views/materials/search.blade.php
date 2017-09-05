@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9 col-md-offset-1" style="margin-top: 50px;">
                <div class="row" style="margin-bottom: -20px;">
                    <div class="col-md-2">
                        <a class="btn btn-sm btn-primary m-add" href="/materials">所有物料</a>
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
                <search-material-table mid="{{ $material->mid }}"></search-material-table>
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
    form input {
        box-shadow: none!important;
    }

    .btn.btn-sm.btn-primary.m-add {
        background: none;
        color: #20A0FF;
    }

    .btn.btn-sm.btn-primary.m-add:hover {
        background-color: #20A0FF;
        color: #ffffff;
        border-color: #20A0FF;
    }

    span a:hover {
        color: #000000;
    }

</style>