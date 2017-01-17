 var map, geolocation;
    //加载地图，调用浏览器定位服务
    map = new AMap.Map('container', {
        resizeEnable: true,
        zoom:11
    });
    
    var lng;
    var lat;
    map.plugin('AMap.Geolocation', function() {
        geolocation = new AMap.Geolocation({
            enableHighAccuracy: true,//是否使用高精度定位，默认:true
            timeout: 10000,          //超过10秒后停止定位，默认：无穷大
            buttonOffset: new AMap.Pixel(10, 200),//定位按钮与设置的停靠位置的偏移量，默认：Pixel(10, 20)
            zoomToAccuracy: false,      //定位成功后调整地图视野范围使定位位置及精度范围视野内可见，默认：false
            buttonPosition:'RB'
        });
        map.addControl(geolocation);
        //精确定位返回用户当前的经纬度
        geolocation.getCurrentPosition(function(status,data){
            lng=data.position.getLng();
            lat=data.position.getLat();
            //修改表单value
            $(document).ready(function(){
                $("#position").val(lng+','+lat);
                    });
            map.center=data.position;
            });
    });
  
    