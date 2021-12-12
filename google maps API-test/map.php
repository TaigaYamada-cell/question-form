<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8"> 
<script>
    var map;
    var visible = true;
  
function initialize() {
  var latlng = new google.maps.LatLng(37.406872232409405, 138.72840041114438);
  var opts = {
    zoom: 7.4,
    center: latlng,
    mapTypeId: google.maps.MapTypeId.ROADMAP
  };
   let map = new google.maps.Map(document.getElementById("map"), opts);

   //ToDo

//infowindowのコンテンツ
let yahiko_description = '新潟県を代表する峠と言っても過言ではありません！実写版 頭文字Dのロケ地でもあり、山頂から向かって間瀬側の道には某秋名山にも負けず劣らずの10連続ヘアピンがあります。元有料道路ということもあり、全線センターライン付きの2車線道路で誰でも安心して走れます。';
let happoudai_description = '長岡市の峠と言ったらここ！「八方台」として知られていますが、正式には森立峠と言います。山頂からは綺麗な夜景も眺めることが出来ます。全線2車線ですが、タイトなコーナーが連続するので対向車には十分注意して走行しましょう。山頂には「八方台いこいの森」という自然公園もありキャンプスポットにもピッタリ！';
let uonuma_description = '景色がとてもきれいです。<br>紅葉の時期におすすめ！';
let desctiption_273 = '新潟県岩船郡関川村にある峠道。ワインディング区間は約6km。道幅は区間によって異なりますが、普通車同士なら問題なくすれ違えます。勾配がきつくタイトなコーナーが多いので注意して走行しましょう。273号線からアクセスした場合、峠の終盤には見通しが良く、舗装しなおされた区間があり、爽快感は抜群です。';
let description_17 = '新潟市と阿賀町にまたいで位置する峠。すれ違いが困難なほど道幅が狭い区間もあるため、気持ちよく走るのは難しいです。早出川と並走できる区間は景色も良いため、通ってみる価値はアリ！運が良ければサルをはじめとした動物も見ることができるため、サファリ感覚で走ってみるのも楽しいかもしれません。';
let description_iwafune = '新潟県村上市と岩船郡に跨いで位置する峠。「道良し・景色良し・走りごたえ抜群」の三拍子そろった最高な峠です。山頂には駐車場と広場があるため、そこでのんびりすることも出来ちゃいます。全線2車線で見通しも良く、法定速度内で気持ち良く走れちゃう、ドライブ好きが求める模範解答のような峠です。';
let description_207 = '新潟峠の中でも相当過酷な道。<br>事故にはお気を付けください';
let description_shiori = '新潟県魚沼市にある峠。雲海を眺められることで非常に有名です。しかし、峠道自体は少し過酷！路面は綺麗ですが、道は狭くウネウネがずっと続きます。同乗者がいる場合は酔わせてしまうので避けたいところです。雲海を見るのが目的の方は、魚沼市観光協会のインスタグラムをチェックすると雲海予報が見れますよ。';
let description_6 = '「だるまやウィーリー」事件現場。<br>水曜どうでしょうファンにおすすめ';

let contents = [
  ['弥彦山スカイライン', 'img/yahiko_img.jpg' ,yahiko_description,'https://niigatatouge.com/2021/09/22/skyline/'],
  ['八方台', 'img/happoudai_img.jpg', happoudai_description, 'https://niigatatouge.com/2021/09/30/happoudai/'],
  ['魚沼スカイライン','img/uonuma_img.JPG', uonuma_description, 'https://niigatatouge.com/2021/11/09/shioritouge-drive/'],
  ['県道273号線', 'img/273',desctiption_273, 'https://niigatatouge.com/2021/10/11/niigata273drive/'],
  ['沼越峠', 'img/numakoshi.jpg',description_17, 'https://niigatatouge.com/2021/10/27/route17-numakoshi-touge/'],
  ['岩舟北部広域農道', 'img/iwafune.jpg', description_iwafune, 'https://niigatatouge.com/2021/11/04/budotouge/'],
  ['県道207号大栗田村上線', 'img/207.png', description_207, 'https://niigatatouge.com/2021/11/05/niigata207/'],
  ['枝折峠', 'img/shiori.jpg', description_shiori, 'https://niigatatouge.com/2021/11/09/shioritouge-drive/'],
  ['県道6号山北朝日線', 'img/6.jpg', description_6, 'https://niigatatouge.com/2021/11/19/niigata6sanpokuasahi/']
];

let marker= [];
let content_html = [];
let infowindow = [];
let currentinfoWindow = null;
let comp1 ="<div style='display: flex;'><div><img src='img/favourite.png' style='width:20px;'><img src='img/favourite.png' style='width:20px;'><img src='img/favourite.png' style='width:20px;'><img src='img/favourite.png' style='width:20px;'><img src='img/favourite.png' style='width:20px;'><div><img src=";
let DS = new google.maps.DirectionsService();
let DR = new google.maps.DirectionsRenderer();

DR.setMap(map);

for (i = 0; i < contents.length; i++) {
  content_html.push("<div><h3>" + contents[i][0] + "</h3>"+comp1 + contents[i][1] + " style='width:100px'></div></div><p>"+ contents[i][2]+"<br><a href="+contents[i][3]+">ブログ記事</a></p></div>");
}

let map_data = [
  {
    lat: 37.70379604279255,
    lng:  138.8056766046995,
    content: content_html[0]
  },
  {
    lat:37.423184275642704,
    lng: 138.92955508434426,
    content: content_html[1]
  },
  {
    lat: 37.03791861698117,
    lng: 138.79683947489153,
    content: content_html[2]
  }
];

let request = [{
  Olat: 37.73616668003348,
  Olng: 138.81962929939792,
  Dlat: 37.68764645957382, 
  Dlng: 138.80699837047405,
},
{
  Olat: 37.43705061775374, 
  Olng: 138.91360953153492,
  Dlat: 37.43641082755973, 
  Dlng: 138.9375846609683,
},
{
  Olat: 36.989562554328884, 
  Olng: 138.76249958627187,
  Dlat: 37.08493379599434,
  Dlng: 138.8373439445883,
  waypoints: [{location: new google.maps.LatLng(37.040140675046146, 138.7970035220783) }]
}
];

for(i=0; i<map_data.length; i++){
  let markerLatLng = new google.maps.LatLng({lat: map_data[i]['lat'], lng: map_data[i]['lng']});
  marker[i] = new google.maps.Marker({
    position: markerLatLng,
    map: map
  });
  let markerContents = map_data[i]['content'];
  infowindow[i] = new google.maps.InfoWindow({
    content: markerContents
  });

  let Origin = new google.maps.LatLng({lat: request[i]['Olat'], lng: request[i]['Olng']});
  let Destination = new google.maps.LatLng({lat: request[i]['Dlat'], lng: request[i]['Dlng']});
  
  let opts = {
    origin: Origin,
    destination: Destination,
    travelMode: google.maps.TravelMode.DRIVING
  }

  markerEvent(i);
}




function markerEvent(i) {
  marker[i].addListener('click', function(){
    if(currentinfoWindow){
      currentinfoWindow.close();
    }
    infowindow[i].open(map, marker[i]);
    currentinfoWindow = infowindow[i];
    map.setZoom(14);

     DS.route(opts, function(result, status){
    DR.setDirections(result);
    })
  });
}



// marker2.addListener('click', ()=>
// DS.route(request2, function(result,status){
//   DR.setDirections(result);
// }))

//ルートを表示








// marker3.addListener('click', ()=>
// DS.route(request3, function(result, status){
//     DR.setDirections(result);
//   }))
//   //表示・非表示を切り替えるボタンを設置
//   // function showhide() {
//   //   var btn = document.getElementById("showbtn");
//   //   var mapArea = document.getElementById("map");

//   // if(visible){
//   //     mapArea.style.visibility ="hidden";
//   //     btn.value = "表示する";
//   // }else{
//   //   mapArea.style.visibility ="visible";
//   //   btn.value ="隠す"
//   // }
//   //   visible = !visible;
//   // }

}





</script>

    <title>Google Maps API サンプル</title>
  </head>

  <body onload="initialize()">
  <p>Google Maps APIを使ったサンプルです。</p>
  <input type="button" id="showbtn" value="mapを表示する" onclick="showhide();">

<div id="map" style="width:1000px; height:600px"></div>

    <script async defer
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDfxvP5VnzlIsgUG-3ZM1YhU2liLKVau64&callback=initMap">
    </script>
    
 
</body>
</html>