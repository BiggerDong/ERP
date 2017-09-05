@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9 col-md-offset-1" style="margin-top: 50px;">
                <div class="row" style="margin-bottom: -20px;">
                    <div class="col-md-2" >
                        <a class="btn btn-sm btn-primary s-all" href="/bills/st">所有缺货单</a>
                    </div>
                    <div class="col-md-3 pull-right" style="margin-bottom: -20px;">
                        <form action="/suppliers/search">
                            <div class="form-group">
                                <input type="text" id="b-search" class="form-control" name="bid" placeholder="搜索缺货单编号"
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
                <div style="text-align: center;color: #000;">
                    <h3>缺货单</h3>
                </div>
                <div class="st-header">
                    <span>制单日期 : {{ $bill->created_at->format('Y年m月d日') }}</span>
                    <span class="pull-right">编号 : {{ $bill->bid }}</span>
                    <p style="margin-top: 15px;">接收人 : <span>{{ $bill->receiver }}</span></p>
                </div>
                <div class="sttable">
                    <table class="table table-bordered" style="text-align: center;">
                        <thead>
                        <tr>
                            <td>缺货单编号</td>
                            <td colspan="4" style="text-align: left">{{ $bill->bid }}</td>
                        </tr>
                        <tr>
                            <td>制单日期</td>
                            <td colspan="4" style="text-align: left">{{ $bill->created_at->format('Y年m月d日') }}</td>
                        </tr>
                        <tr>
                            <td>物料编号</td>
                            <td>物料名称</td>
                            <td>缺货数量</td>
                            <td>物料单价</td>
                            <td>总计金额</td>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td scope="row">{{ $bill->materials[0]->mid }}</td>
                            <td>{{ $bill->materials[0]->name }}</td>
                            <td>{{ $stbill->amount }}</td>
                            <td>{{ $bill->materials[0]->price }}</td>
                            <td>{{ $stbill->total }}</td>
                        </tr>
                        <tr>
                            <td>备注</td>
                            <td colspan="4"></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="st-footer">
                    <span style="margin-top: -15px;">制单人 : {{ $bill->creator }}</span>
                    <span class="pull-right" style="margin-right: 60px;">审核人 : </span>
                </div>
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
        });
    </script>
@endsection