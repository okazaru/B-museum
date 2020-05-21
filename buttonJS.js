 (function(){
      for(let i=0; i<630; i++){
      var $buttons= document.createElement("button")
            $buttons.setAttribute("class","button01");
            $buttons.style.cssText="background-color: #fff;"+"margin: 0.9px;"+"border:0;"+"padding:14px;"
      if(i%30==0){
          var $br= document.createElement("br")
          document.getElementById( "buttons" ).appendChild( $br );
      }
      document.getElementById( "buttons" ).appendChild( $buttons );
      }
      
      
  } )();


let bclass= document.getElementsByClassName("button01");
for(let i=0; i<bclass.length; i++){
var clicked = false;  
var revel;
bclass[i].addEventListener("click",() =>{
if (clicked) {
        bclass[i].style.backgroundColor ='#fff';

        clicked = false;
        return;
    }
    
    clicked = true;
    setTimeout(function () {
     if (clicked) {
		revel=$('#color-d').val();
		bclass[i].style.backgroundColor =revel;
        }

        clicked = false;
    }, 500);

},false)
}
  var canvasData = null;
  function showCanvas(){

      //HTML内に画像を表示
      html2canvas(document.getElementById("buttons"),{
        onrendered: function(canvas){
          //imgタグのsrcの中に、html2canvasがレンダリングした画像を指定する。
          
          var imgData = canvas.toDataURL();
          document.getElementById("B-canvas").src = imgData;
          document.getElementById("B-canvas").style.width ="190px" ;
          document.getElementById("B-canvas").style.height = "130px";
          document.getElementById("download").removeAttribute("disabled");
          canvasData = canvas;
         }
        
      });
	
}

	function Download(canvas){		
		var agr = window.confirm("この内容で保存しますか？");
	if(agr){	
	var dataUrl = canvasData.toDataURL("image/jpeg");   // jpg形式
    var event = document.createEvent("MouseEvents");
    event.initMouseEvent("click", true, false, window, 0, 0, 0, 0, 0, false, false, false, false, 0, null);
    var a = document.createElementNS("http://www.w3.org/1999/xhtml", "a");
    a.href = dataUrl;
    a.download = "B-museum-arts";
    a.dispatchEvent(event);
    
	}
	}