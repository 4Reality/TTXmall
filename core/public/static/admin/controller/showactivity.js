/**

 @Name：layuiAdmin 主页示例
 @Author：star1029
 @Site：http://www.layui.com/admin/
 @License：GPL-2
    
 */


layui.define(function(exports){
  var admin = layui.admin;

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
//   查看运营金额
    layui.use(['carousel', 'echarts'], function(){
        var $ = layui.$
            ,carousel = layui.carousel
            ,echarts = layui.echarts;

        var echartsApp = [], options = [
            {

                tooltip : {
                    trigger: 'item',
                    formatter: "¥{c}"
                },
                toolbox: {
                    show : true,
                    feature : {
                        magicType : {
                            show: true,
                            type: ['pie', 'funnel']
                        },
                        restore : {show: true},
                        // saveAsImage : {show: true}
                    }
                },
                // calculable : true,
                series : [
                    {
                        name:'运营金额',
                        type:'pie',
                        // radius : [30, 110],
                        // center : ['75%', '50%'],
                        roseType : 'area',
                        data:[
                            {value:100, name:'总收入(1000)'},
                            {value:500, name:'总利润'},
                            {value:150, name:'总成本'},
                            {value:250, name:'总佣金'},
                        ]
                    }
                ]
            }
        ]
            ,elemDataView = $('#LAY-index-bin').children('div')
            ,renderDataView = function(index){

            admin.req({
                type:'POST',
                url: config.url+'activity/echat_list&id='+id
                ,data:{},
                done:function(res) {
                    options[0]['series'][0]['data'][0]['name'] = '总收入(¥' + res.data.sum_pay_price + ')';
                    options[0]['series'][0]['data'][0]['value'] = res.data.sum_pay_price;

                    options[0]['series'][0]['data'][1]['name'] = '总利润(¥' + res.data.sum_profit_price + ')';
                    options[0]['series'][0]['data'][1]['value'] = res.data.sum_profit_price;

                    options[0]['series'][0]['data'][2]['name'] = '总成本(¥' + res.data.sum_count_price + ')';
                    options[0]['series'][0]['data'][2]['value'] = res.data.sum_count_price;

                    options[0]['series'][0]['data'][3]['name'] = '总佣金(¥' + res.data.sum_fx_price + ')';
                    options[0]['series'][0]['data'][3]['value'] = res.data.sum_fx_price;
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

    });

  exports('sample', {})
});