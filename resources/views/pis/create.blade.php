@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9 col-md-offset-1" style="margin-top: 50px;">
                <div class="row" style="margin-bottom: -20px;">
                    <div class="col-md-2" >
                        <a class="btn btn-sm btn-primary s-all" href="/bills/pi">所有应付发票</a>
                    </div>
                    <div class="col-md-3 pull-right" style="margin-bottom: -20px;">
                        <form action="/suppliers/search">
                            <div class="form-group">
                                <input type="text" id="b-search" class="form-control" name="bid" placeholder="搜索应付发票编号"
                                       style="border: none;border-radius: 20px;background-color: #EFF2F7;text-indent: 5px;">
                                <button type="submit" class="btn btn-link"
                                        style="text-decoration: none;margin-top: -62px;margin-left: 145px;">
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
                <form action="/bills/pi" method="post">
                    {{ csrf_field() }}
                    <input type="hidden" value="5" name="type">
                    <input type="hidden" value="{{ Auth::user()->name }}" name="receiver">
                    <div class="row" style="margin-top: 20px;">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="s-number" class="control-label">制单时间</label>
                                <span style="margin-left: 10px;">{{ $date }}</span>
                            </div>
                        </div>
                        <div class="pull-right" style="margin-right: -25px;">
                            <div class="form-group">
                                <label for="s-number" class="control-label">应付发票编号</label>
                                <input type="text" readonly value="PI{{ $bill_id }}" name="bid"
                                       style="background: none;border: none;margin-left: 10px;">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="s-number" class="control-label">制单人</label>
                                <input type="text" readonly value="{{ Auth::user()->name }}" name="creator"
                                       style="background: none;border: none;margin-left: 25px;">
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row" style="margin-top: 20px;">
                        <div class="form-group">
                            <label for="b-mid" class="col-md-2 control-label">物料编号</label>
                            <div class="col-md-3" style="margin-top: -8px;margin-left: -72px;">
                                <st-form-select></st-form-select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="b-amount" class="col-md-2 control-label"
                                   style="margin-top: -15px;margin-left: 100px;">数量</label>
                            <div class="col-md-3" style="margin-top: -23px;margin-left: -100px;">
                                <st-form-number></st-form-number>
                            </div>
                            <div class="col-md-2" style="margin-top: -21px;">
                                <button type="button" id="goon-stform" class="btn btn-success btn-md"
                                        style="border: none;">继续添加</button>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row" style="margin-top: 30px;">
                        <button type="submit" class="btn btn-md btn-primary col-md-3 col-md-offset-3" style="border: none;">
                            创建应付发票
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
            $("#b-search").focus(function () {
                startAnimation();
                function startAnimation() {
                    $('#b-search').animate({marginLeft: "-=30px",width:"+=30px"}, 200)
                }
            }).blur(function () {
                startAnimation();
                function startAnimation() {
                    $('#b-search').animate({width: "-=30px",marginLeft: "+=30px"}, 200)
                }
            });

            $('#goon-stform').click(function () {
                $('#goon-stform').hide();
                $('#other-stform-1').show();
                $('#other-stform-2').show();
            });

            $('.el-input__inner').attr('required','required');
            $('.el-input__inner').removeAttr('readonly');
        });
    </script>
@endsection

