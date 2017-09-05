@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9 col-md-offset-1" style="margin-top: 50px;">
                <div class="row" style="margin-bottom: -20px;">
                    <div class="col-md-2" >
                        <a class="btn btn-sm btn-primary s-all" href="/bills/pi/create">创建应付发票</a>
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
                <table class="table">
                    <thead>
                    <tr>
                        <th>应付发票编号</th>
                        <th>制单日期</th>
                        <th>制单人</th>
                        <th>接收人</th>
                        <th>状态</th>
                        <th>操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($bills as $bill)
                        <tr>
                            <th scope="row">{{ $bill->bid }}</th>
                            <td>{{ $bill->created_at->format('Y年m月d日') }}</td>
                            <td>{{ $bill->creator }}</td>
                            <td>{{ $bill->receiver }}</td>
                            <td>未清</td>
                            <td>
                                <span style="color: #666;">
                                    <a style="cursor: pointer;text-decoration: none;" href="/bills/pi/{{ $bill->id }}"
                                       data-toggle="tooltip" data-placement="top" title="查看">
                                        <i class="iconfont" style="color: #666;font-size: 16px;">&#xe601;</i>
                                    </a>
                                </span>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $(function () {
            $('[data-toggle="tooltip"]').tooltip();
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
