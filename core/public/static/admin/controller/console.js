/**

 @Name：layuiAdmin 主页控制台
 @Author：贤心
 @Site：http://www.layui.com/admin/
 @License：LPPL
    
 */

layui.define(function(exports){

  /*
    下面通过 layui.use 分段加载不同的模块，实现不同区域的同时渲染，从而保证视图的快速呈现
  */
    //区块轮播切换
    layui.use(['admin', 'carousel'], function(){
        var $ = layui.$
            ,admin = layui.admin
            ,carousel = layui.carousel
            ,element = layui.element
            ,device = layui.device();

        //轮播切换
        $('.layadmin-carousel').each(function(){
            var othis = $(this);
            carousel.render({
                elem: this
                ,width: '100%'
                ,arrow: 'none'
                ,interval: othis.data('interval')
                ,autoplay: othis.data('autoplay') === true
                ,trigger: (device.ios || device.android) ? 'click' : 'hover'
                ,anim: othis.data('anim')
            });
        });

        element.render('progress');

    });

    var pay_order = [];
    var not_pay_order = [];
    var profit = [];

    /*
     下面通过 layui.use 分段加载不同的模块，实现不同区域的同时渲染，从而保证视图的快速呈现
     */
    //数据概览
    layui.use(['carousel', 'echarts'], function(){

        var $ = layui.$
            ,carousel = layui.carousel
            ,admin = layui.admin
            ,echarts = layui.echarts;

        var echartsApp = [], options = [
            //新增的用户量
            {
                title: {
                    text: '本周订单趋势',
                    textStyle: {
                        fontSize: 14
                    }
                },
                legend: {
                    data:['已付款','未付款' , '利润']
                },
                tooltip : { //提示框
                    trigger: 'axis',
                },
                xAxis : [{
                    type : 'category',
                    data : ['周一','周二','周三','周四','周五','周六','周日']
                }],
                yAxis : [{  //Y轴
                    type : 'value',
                    axisLabel : {
                        formatter: '{value}'
                    }
                }],
                series : [
                    {
                        name:'已付款',
                        type:'line',
                        data:pay_order,
                        markPoint: {
                            data: [
                                {type: 'max', name: '最大值'},
                                {type: 'min', name: '最小值'}
                            ]
                        }
                    },
                    {
                        name:'未付款',
                        type:'line',
                        data:not_pay_order,
                        markPoint: {
                            data: [
                                {type: 'max', name: '最大值'},
                                {type: 'min', name: '最小值'}
                            ]
                        }
                    },
                    {
                        name:'利润',
                        type:'line',
                        data:profit,
                        markPoint: {
                            data: [
                                {type: 'max', name: '最大值'},
                                {type: 'min', name: '最小值'}
                            ]
                        }
                    }
                    ]
            }
        ]
            ,elemDataView = $('#LAY-index-dataview').children('div')
            ,renderDataView =function(index){
            admin.req({
                type:'POST',
                url: config.url+'iindex/orders'
                ,data:{},
                done:function(res){
                    pay_order=res.data.pay_order;
                    not_pay_order=res.data.not_pay_order;
                    profit=res.data.profit;
                    options[0]['series'][0]['data'] = pay_order;
                    options[0]['series'][1]['data'] = not_pay_order;
                    options[0]['series'][2]['data'] = profit;
                    //渲染
                    echartsApp[index] = echarts.init(elemDataView[index], layui.echartsTheme);
                    echartsApp[index].setOption(options[index]);
                    window.onresize = echartsApp[index].resize;
                }
            });
        };

        //没找到DOM，终止执行
        if(!elemDataView[0]) return;


        renderDataView(0);

        //监听数据概览轮播
        var carouselIndex = 0;
        carousel.on('change(LAY-index-dataview)', function(obj){
            renderDataView(carouselIndex = obj.index);
        });

        //监听侧边伸缩
        layui.admin.on('side', function(){
            setTimeout(function(){
                renderDataView(carouselIndex);
            }, 300);
        });

        //监听路由
        layui.admin.on('hash(tab)', function(){
            layui.router().path.join('') || renderDataView(carouselIndex);
        });
    });
  
  //区块轮播切换
  layui.use(['admin', 'carousel'], function(){
    var $ = layui.$
    ,admin = layui.admin
    ,carousel = layui.carousel
    ,element = layui.element
    ,device = layui.device();

    //轮播切换
    $('.layadmin-carousel').each(function(){
      var othis = $(this);
      carousel.render({
        elem: this
        ,width: '100%'
        ,arrow: 'none'
        ,interval: othis.data('interval')
        ,autoplay: othis.data('autoplay') === true
        ,trigger: (device.ios || device.android) ? 'click' : 'hover'
        ,anim: othis.data('anim')
      });
    });
    
    element.render('progress');
    
  });



  //最新订单
  layui.use('table', function(){
    var $ = layui.$
    ,table = layui.table;

    table.render({
      elem: '#LAY-index-topSearch'
      ,url: config.url+'iindex/neworders'//最新的十条订单
        // ,toolbar: '#toolbar'
        ,cellMinWidth: 80
        ,defaultToolbar:false
        ,cols: [[
            {field:'order_code', title: '订单号' },
            {field:'uid', title: '购买用户' ,templet: '#showimg'},
            {field:'pay_type', title: '订单状态',templet: function(d){
                    if(d.pay_type==0){
                        return '<a class="layui-btn  layui-btn-danger layui-btn-xs">未付款</a>';
                    }
                    else if(d.pay_type==1){
                        return '<a class="layui-btn layui-btn layui-btn-normal layui-btn-xs" >已付款</a>';
                    }else if(d.pay_type==2){
                        return '<a class="layui-btn layui-btn layui-btn-warm layui-btn-xs">已发货</a>';
                    }
                    else if(d.pay_type == 3){
                        return '<a class="layui-btn layui-btn layui-btn-warm layui-btn-xs">团长已收货</a>';
                    }else if(d.pay_type == 4){
                        return '<a class="layui-btn layui-btn layui-btn-normal layui-btn-xs">交易完成</a>';
                    }else if(d.pay_type==-1){
                        return '<a class="layui-btn layui-btn layui-btn-disabled layui-btn-xs">取消订单</a>';
                    }
                }
            },
            {field:'pay_price', title: '支付价',templet:function (d) {
                    return '<b style="color: red">¥'+d.pay_price+'</b>';
                }},
            {field:'fx_price', title: '佣金',templet:function (d) {
                    return '<b style="color: red">¥'+d.fx_price+'</b>';
                }},
            {field:'create_time', title: '下单时间', templet:function (d) {
                    return layui.laytpl.toDateString(d.create_time *1000)
                }},
        ]]
        ,done:function(res){
            hoverOpenImg();//显示大图
        }
    });

      function hoverOpenImg(){
          var img_show = null; // tips提示
          $('td #showuserinfo').hover(function(){
              var img = "<img class='img_msg' src='"+$(this).data('type')+"' style='width:130px;' />";
              img_show = layer.tips(img, this,{
                  tips:[2, 'rgba(41,41,41,.5)']
                  ,area: ['160px']
              });
          },function(){
              layer.close(img_show);
          });
      }
    /*最新注册用户*/

    table.render({
      elem: '#LAY-index-newest-user'
      ,url: config.url+'iindex/gerGoodsSale'
        ,cellMinWidth: 80
        ,defaultToolbar:false
        ,cols: [[
            {field:'goods_name', title: '商品名'},
            {field:'goods_headimage', title: '封面图',templet:'<div><img width="50px" src="{{ d.goods_headimage }}"></div>'},
            {field:'buy_stock', title: '销量' },
            {field:'price', title: '单价',templet:function (d) {
                    return '<b style="color: red">¥'+d.price+'</b>';
                }},
        ]]
    });

    table.render({
      elem: '#LAY-index-newest-vip'
        ,url: config.url+'iindex/todayuser'
        ,cellMinWidth: 80
        ,defaultToolbar:false
        ,cols: [[
            {field:'homename', title: '小区名称'},
            {field:'username', title: '团长姓名'},
            {field:'sum', title: '销售额',templet:function (d) {
                    return '<b style="color: red">¥'+d.sum+'</b>';
                }},
        ]]
    });

      table.render({
          elem: '#LAY-index-user-vip'
          ,url: config.url+'iindex/sortUserSale'
          ,cellMinWidth: 80
          ,defaultToolbar:false
          ,cols: [[
              {field:'nickname', title: '用户名称'},

              {field:'headimage', title: '封面图',templet:'<div><img width="50px" src="{{ d.headimage }}"></div>'},

              {field:'sum', title: '累计消费',templet:function (d) {
                      return '<b style="color: red">¥'+d.sum+'</b>';
                  }},
          ]]
      });



    
    //今日热贴
    table.render({
      elem: '#LAY-index-topCard'
      ,url: 'https://weixin.so313.com/addons/longbing_shequpintuan/core/public/static/json/console/top-card.js' //模拟接口
      ,page: true
      ,cellMinWidth: 120
      ,cols: [[
        {type: 'numbers', fixed: 'left'}
        ,{field: 'title', title: '标题', minWidth: 300, templet: '<div><a href="{{ d.href }}" target="_blank" class="layui-table-link">{{ d.title }}</div>'}
        ,{field: 'username', title: '发帖者'}
        ,{field: 'channel', title: '类别'}
        ,{field: 'crt', title: '点击率', sort: true}
      ]]
      ,skin: 'line'
    });
  });
  
  exports('console', {})
});