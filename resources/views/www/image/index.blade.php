<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{$title}}</title>
    <!-- 最新版本的 Bootstrap 核心 CSS 文件 -->
    <script src="{{url('/')}}/static/www/js/vendor/jquery-1.11.2.min.js"></script>
    <link href="{{url('/')}}/static/www/css/bootstrap.min.css" rel="stylesheet">
    <script src="{{url('/')}}/static/www/js/vendor/bootstrap.min.js"></script>
    {{--表格样式--}}
    <link rel="stylesheet" href="{{url('/')}}/static/www/bootstrap-table/dist/bootstrap-table.min.css">
    <script src="{{url('/')}}/static/www/bootstrap-table/dist/bootstrap-table.min.js"></script>
    <script src="{{url('/')}}/static/www/bootstrap-table/dist/locale/bootstrap-table-zh-CN.min.js"></script>
    <style>

    </style>
</head>
<body>
<div>
    <div style="float: left;margin-top: 15px">
        <button type="button" id="add" class="btn btn-success pull-right">添加</button>
    </div>
    <div>
        <table id="table"></table>
    </div>
</div>
</body>
<script type="text/javascript">
    function initTable(){
        $('#table').bootstrapTable({
            height: getHeight(),
            url: 'list',
            method: 'get',
            toolbar: '#toolbar',
            pagination: true,
            sidePagination: "server",
            pageNumber:1,
            pageSize: 10,
            pageList: [10, 25, 50, 100],
            search: true,
            sortable:true,
            sortName:'id',
            sortOrder:'desc',
            idField:'id',
            showColumns: true,
            showRefresh: true,
            showPaginationSwitch:true,
            responseHandler:responseHandler,
            columns: [
                {
                    checkbox:'true',
                    valign: 'middle',
                    width:"5%",
                },
                {
                    title: 'ID',
                    field: 'id',
                    align: 'center',
                    valign: 'middle',
                    sortable: true,
                    width:"10%",
                    footerFormatter: totalTextFormatter,
                },
                {
                    title: '名称',
                    field: 'name',
                    align: 'center',
                    valign: 'middle',
                    width:"40%",
                    footerFormatter: totalTextFormatter,

                },
                {
                    title: '缩略图',
                    field: 'thumb',
                    align: 'center',
                    valign: 'middle',
                    width:"10%",
                    footerFormatter: totalTextFormatter
                },
                {
                    title: '创建时间',
                    field: 'created',
                    align: 'center',
                    valign: 'middle',
                    width:"10%",
                    footerFormatter: totalTextFormatter
                },
                {
                    title: '创建人',
                    field: 'username',
                    align: 'center',
                    valign: 'middle',
                    width:"10%",
                    footerFormatter: totalTextFormatter
                },
                {
                    title: '管理操作',
                    field: 'operate',
                    align: 'center',
                    valign: 'middle',
                    events: operateEvents,
                    formatter: operateFormatter
                }],
            onLoadSuccess:function(){
                $(".bs-checkbox").css("vertical-align","middle");
            }
        });
    }

    /*动态添加操作栏*/
    function operateFormatter(value, row, index){
        return [
            '<button class="btn index"  title="点击查看" style="border:none;background:none" data-toggle="modal">',
            '<i class="glyphicon glyphicon-search"></i>',
            '</button>',
        ].join('');
    };
    /*给操作栏添加点击行为*/
    window.operateEvents = {
        'click .index':function (e, value, row, i){
            var url = '{{url("index")}}?id=' + [row.id] + '&s=' + Math.random();
            window.open(url);
        },
    };
    /*对响应体操作*/
    function responseHandler(res){
        return res.total?{"rows": res.data,"total": res.total}:{"rows": [],"total": 0}
    };
    /*获取元素的userid*/
    function getIdSelections(){
        return $.map($table.bootstrapTable('getSelections'), function (row) {
            return row.id;
        });
    }
    /*获取元素的data数据*/
    function getData(){
        return $table.bootstrapTable('getData')
    };
    /*获取表格的高度*/
    function getHeight(){
        return $(window).height();
    };
    /*获取全部表格个数*/
    function totalTextFormatter(data){
        return 'Total';
    };
    /*DOM加载完成执行初始化函数*/
    $(function(){
        initTable();
    });

</script>
</html>
