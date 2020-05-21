<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>B-museum</title>
<link rel="stylesheet" href="riset.css">
<link rel="stylesheet" href="buttons.css">
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.js"></script>
</head>
<body>

<div id="parts">
<input type="color" id="color-d">


<a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fwww.facebook.com%2Fsharer%2Fsharer.php%3Fu%3Dhttps%253A%252F%252Fusers2.kyoto-kcg.ac.jp%252F%257Est041702%252FB-museum%252Fentry.php&amp;src=sdkpreparse"><img src="images/facebook-logo.png" width="40px" height="40px"></a>


<a href="https://twitter.com/share?url=https://users2.kyoto-kcg.ac.jp/~st041702/B-museum/entry.php;text=ボタンで作るお絵描き博物館B-museum" rel="nofollow" target="_blank"><img src="images/20190513183031.png" width="40px" height="40px"></a>

<a href="http://getpocket.com/edit?url=https://users2.kyoto-kcg.ac.jp/~st041702/B-museum/entry.php&title=ボタンで作るお絵描き博物館B-museum" rel="nofollow" rel="nofollow" target="_blank"><img src="images/snssharec.png" width="40px" height="40px"></a>



<a href="https://social-plugins.line.me/lineit/share?url=https://users2.kyoto-kcg.ac.jp/~st041702/B-museum/entry.php"><img src="images/square-default.png" width="40px" height="40px"></a>
</div>

<div id="canvas">
<div id="buttons"></div>
<div id="add">
<input type="button" id="Prev" value="↓↓出来上がりを見る↓↓" name="onCanvas" onclick="showCanvas()">
<input type="button" id="download" value="ダウンロードする" onclick="Download()" disabled="">
</div>
<img src="" id="B-canvas" />
</div>



<div id="uploadCon">
<div id="upload">
<p>投稿作品一覧</p>
<div id="show">
</div>
</div>
<form action="" method="post" id="Picform" enctype="multipart/form-data">
<input type="file" id="chooseF" accept="image/*,.jpeg" name="attachment_fileB">
<input type="hidden" name="sendPic" value="sendPic">
<input type="button" id="uploadB" name="sendPic" value="投稿する">
</form>
</div>
<script>
const subCatch = document.getElementById("uploadB");
subCatch.addEventListener("click",function(){
var filecount = $("#chooseF").val().length;
if(filecount == 0){
		alert("ファイルを選択してください");
	}else{
		$("#Picform").submit();
	}
})
</script>
<?php
define( "FILE_DIR","UloadPics/");
$success ="<script>alert('投稿完了しました！');</script>";
$faild ="<script>alert('投稿に失敗しました');</script>";
$upload_file_path = FILE_DIR. date("YmdHis") . rand(0,10000) . basename($_FILES['attachment_fileB']['name']);
  if(isset($_POST["sendPic"])) {
       $upload_res=move_uploaded_file($_FILES['attachment_fileB']['tmp_name'], $upload_file_path);
       if( $upload_res === true ) {
      	echo $success;
			 		} else{
		echo $faild;
			 			
			 		}
  }

	$accountN = htmlspecialchars(@$_POST['account-name'], ENT_QUOTES, 'UTF-8');
	$changName = json_encode($accountN);
	
foreach(glob("UloadPics/*.*") as $file) {
	$result[] = $file;
    $countF = count($result) ;
    $changeF = json_encode($countF);
    $cat_File = json_encode($result);
    
}

if(isset($_POST["deleteSend"])){
echo("成功！！！！！！");
unlink(FILE_DIR.$_FILES['attachment_fileB']['name']);
}
?>
 <script>
   
		var nam = JSON.parse('<?php echo $changName ?>');
 		var vol = JSON.parse('<?php echo $changeF ?>');
 		var fil = JSON.parse('<?php echo $cat_File ?>');
    	for(var i=0;i<vol;i++){
    const preview = document.getElementById('show');
    
    var sp = document.createElement('span');
    sp.setAttribute("name",fil[i]);
    
    var deleteB = document.createElement('button');  
    deleteB.setAttribute("id","delete");
    deleteB.setAttribute("name","deleteSend");
    deleteB.setAttribute("onclick","deleteOn()");
    deleteB.innerHTML="削除する"
    var arr = document.createElement('button'); 
    arr.setAttribute("id","arr");
    arr.innerHTML="編集する"
    var pelem = document.createElement('p');
    pelem.innerHTML =nam+'さんの作品';
	pelem.style.cssText="font-size:10px;"+"color:#fff;" 
	
	var img = document.createElement('img');
	img.style.cssText="width:220px;"+"height:160px;"
    img.src = fil[i];
    preview.appendChild(img);
    preview.appendChild(form); 
    preview.appendChild(deleteB); 
    preview.appendChild(sp);
    preview.appendChild(arr);   
      function deleteOn(){
    	var del = window.confirm("本当に削除しますか？");
    	if(del){
    		 $("#effectform").submit(); 		
    	}
    }
    }
    
    
  

    </script>


       <script type="text/javascript"  src="buttonJS.js?date=200503"></script>
</body>
</html>















