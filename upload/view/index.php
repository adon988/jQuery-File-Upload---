<!DOCTYPE html>
<html>
<head>
	<meta charset="utf8"> 
	<title>jQuery Upload Demo</title>
	<!--
	|jQuery 10
	-->
	<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

<!--******************************************************
 jQuery File Upload

 # 細部調整可以參考js/UploadHandler.php的中文說明

-->
	<!--
	| 引用上傳圖片js
	| 
	-->
	<script type="text/javascript" src="../js/jquery.fileupload/jquery.ui.widget.js"></script>
	<script type="text/javascript" src="../js/jquery.fileupload/jquery.fileupload.js"></script>
	<!--
	| 上傳圖片設定
	-->
	<script>
	$(function () {
	    var url = '../upload/news/';// 設定上傳路徑 url
	    $('#fileupload').fileupload({
	        url: url,
	        dataType: 'json',
	        done: function (e, data) {
	            $.each(data.result.files, function (index, file) {
	                $('#files').append("<p><img style='max-width:100px;height:auto;' src='"+file.mediumUrl+".'>"+file.name);
	            });
	        },
	        progressall: function (e, data) {
	            var progress = parseInt(data.loaded / data.total * 100, 10);
	            console.log(progress);//console 傳輸過程百分比
	        }
	    });
	});

	</script>
<!-- End  ~~~~~ #( jQuery File Upload )
*********************************************************-->

</head>
<body>
	<h1>jQuery Upload Demo</h1>
	<!--
	|上傳圖片按鈕
	-->
	<input id="fileupload" type="file" name="files[]" multiple>
	<!--
	|上傳成功將資訊放入#files
	-->
	<div id="files" class="files"></div>

</body>
</html>
