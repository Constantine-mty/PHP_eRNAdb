<!DOCTYPE html>
 <html>
 <head>
   <meta charset="utf-8">
   <meta name="keywords" content="高德地图,DIY地图,高德地图生成器">
   <meta name="description" content="高德地图，DIY地图，自己制作地图，生成自己的高德地图">
   <title>高德地图 - DIY我的地图</title>
   <style>
     body { margin: 0; font: 13px/1.5 "Microsoft YaHei", "Helvetica Neue", "Sans-Serif"; min-height: 960px; min-width: 600px; }
     .my-map { margin: 0 auto; width: 600px; height: 500px;float: left; } .my-map .icon { background: url(//a.amap.com/lbs-dev-yuntu/static/web/image/tools/creater/marker.png) no-repeat; } .my-map .icon-pot { height: 23px; width: 31px; } .my-map .icon-pot-red { background-position: -234px -5px; }
     .amap-container{height: 100%;}
     .myinfowindow{width: 240px;min-height: 50px;}
     .myinfowindow h5{ height: 20px; line-height: 20px; overflow: hidden; font-size: 14px; font-weight: bold; width: 220px; text-overflow: ellipsis; word-break: break-all; white-space: nowrap; }
     .myinfowindow div{ margin-top: 10px; min-height: 40px; line-height: 20px; font-size: 13px; color: #6f6f6f; }
   </style>
 </head>
 <body>
   <div id="wrap" class="my-map">
     <div id="mapContainer"></div>
   </div>
   <script src="//webapi.amap.com/maps?v=1.3&key=e07ffdf58c8e8672037bef0d6cae7d4a"></script>
   <script>
   !function(){
     var infoWindow, map, level = 16,
       center = {lng: 104.054515, lat: 30.696605},
       features = [{"icon":"pot","color":"red","name":"生命科学与工程学院","desc":"未命名标注描述","lnglat":{"Q":30.697213748395427,"R":104.05352803900837,"lng":104.053528,"lat":30.697214},"offset":{"x":-9,"y":-31},"type":"Marker"}];
 
     function loadFeatures(){
       for(var feature, data, i = 0, len = features.length, j, jl, path; i < len; i++){
         data = features[i];
         switch(data.type){
           case "Marker":
             feature = new AMap.Marker({ map: map, position: new AMap.LngLat(data.lnglat.lng, data.lnglat.lat),
               zIndex: 3, extData: data, offset: new AMap.Pixel(data.offset.x, data.offset.y), title: data.name,
               content: '<div class="icon icon-' + data.icon + ' icon-'+ data.icon +'-' + data.color +'"></div>' });
             break;
           case "Polyline":
            for(j = 0, jl = data.path.length, path = []; j < jl; j++){
							path.push(new AMap.LngLat(data.path[j].lng, data.path[j].lat));
						}
             feature = new AMap.Polyline({ map: map, path: path, extData: data, zIndex: 2,
               strokeWeight: data.strokeWeight, strokeColor: data.strokeColor, strokeOpacity: data.strokeOpacity });
             break;
           case "Polygon":
             for(j = 0, jl = data.path.length, path = []; j < jl; j++){
               path.push(new AMap.LngLat(data.path[j].lng, data.path[j].lat));
             }
             feature = new AMap.Polygon({ map: map, path: path, extData: data, zIndex: 1,
               strokeWeight: data.strokeWeight, strokeColor: data.strokeColor, strokeOpacity: data.strokeOpacity,
               fillColor: data.fillColor, fillOpacity: data.fillOpacity });
             break;
           default: feature = null;
         }
         if(feature){ AMap.event.addListener(feature, "click", mapFeatureClick); }
       }
     }
 
     function mapFeatureClick(e){
       if(!infoWindow){ infoWindow = new AMap.InfoWindow({autoMove: true,isCustom: false}); }
       var extData = e.target.getExtData();
       infoWindow.setContent("<div class='myinfowindow'><h5>" + extData.name + "</h5><div>" + extData.desc + "</div></div>");
       infoWindow.open(map, e.lnglat);
     }
 
     map = new AMap.Map("mapContainer", {center: new AMap.LngLat(center.lng, center.lat), level: level, keyboardEnable:true, dragEnable:true, scrollWheel:true, doubleClickZoom:true});
     
     loadFeatures();
 
     map.on('complete', function(){
       map.plugin(["AMap.ToolBar", "AMap.OverView", "AMap.Scale"], function(){
         map.addControl(new AMap.ToolBar({ruler: false, direction: false, locate: false})); map.addControl(new AMap.OverView({isOpen: false})); map.addControl(new AMap.Scale);
       });	
     })
     
 	}();
   </script>
 </body>
 </html>