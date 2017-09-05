@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9 col-md-offset-1" style="margin-top: 80px;">
                <!-- 为ECharts准备一个具备大小（宽高）的Dom -->
                <div id="main" style="height:400px;"></div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <!-- ECharts单文件引入 -->
    <script src="http://echarts.baidu.com/build/dist/echarts-all.js"></script>
    <script type="text/javascript">
        // 基于准备好的dom，初始化echarts图表
        var myChart = echarts.init(document.getElementById('main'),'default');

        option = {
            title : {
                text: '采购管理',
                subtext: '相关单据的数量'
            },
            tooltip : {
                trigger: 'axis'
            },
            legend: {
                data:['数量']
            },
            toolbox: {
                show : true,
                feature : {
//                    mark : {show: true},
//                    dataView : {show: true, readOnly: false},
                    magicType : {show: true, type: ['bar','line']},
                    restore : {show: true},
//                    saveAsImage : {show: true}
                }
            },
            calculable : true,
            xAxis : [
                {
                    type : 'category'
                }
            ],
            yAxis : [
                {
                    type : 'value'
                }
            ],
            series : [
                {
                    name:'数量',
                    type:'bar',
                    smooth:true,
                }
            ]
        };

        loadDATA(option);

        // 为echarts对象加载数据
        myChart.setOption(option);

        function loadDATA(option){
            $.ajax({
                type : "get",
                async : false, //同步执行
                url : "/api/bills/time",
                data : {},
                dataType : "json", //返回数据形式为json
                success : function(result) {
                    if (result) {
                        //初始化option.xAxis[0]中的data
                        option.xAxis[0].data=[];
                        for(var i=0;i<result.length;i++){
                            option.xAxis[0].data.push(result[i].name);
                        }
                        //初始化option.series[0]中的data
                        option.series[0].data=[];
                        for(var i=0;i<result.length;i++){
                            option.series[0].data.push(result[i].num);
                        }
                    }
                }
            });
        }
    </script>
@endsection
