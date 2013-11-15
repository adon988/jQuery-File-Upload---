<!DOCTYPE html>
<html>
<head>
	<meta charset="utf8"> 
	<title>jQuery Upload Demo</title>
	<!-- 引用bootstrap CSS -->
	<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
	<style>
	.btn-primary input{
		/*隱藏按鈕*/
	    cursor: pointer;
	    height: 35px;
	    margin: -28px -11px -5px;
	    opacity: 0;
	    width: 121px;
	}
	</style>


	<!-- jQuery 10 -->
	<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	

<!--jQuery File Upload  # 細部調整可以參考js/UploadHandler.php的中文說明 -->
	<!-- 引用上傳圖片js -->
	<script type="text/javascript" src="../js/jquery.fileupload/jquery.ui.widget.js"></script>
	<script type="text/javascript" src="../js/jquery.fileupload/jquery.fileupload.js"></script>
	<!-- 上傳圖片設定** -->
	<script>
	$(function () {
	    var url = '../upload/news/';// 設定上傳路徑 url
	    $('#fileupload').fileupload({
	        url: url,
	        dataType: 'json',
	        maxChunkSize: 1024*1024,//上傳速度
	        done: function (e, data) {
	            $.each(data.result.files, function (index, file) {
	            	if( typeof file.error==='undefined'){
	            		if(file.type.match(/image/i)){
		            		$('#files_result').append("<p><img style='max-width:100px;height:auto;' src='"+file.url+"'/></p>");
	            		}else{
	            			$('#files_result').append("<p><a href='"+file.url+"'><img style='max-width:100px;height:auto;' src='../images/fileupload/forms-icon.png'/></a></p>");
	            		}
						
	            	}else{
	            		$('#files_result').append("<p>"+file.error+"</p>");
	            	}
	               
	            });
	            $('#progress .progress-bar').delay(1000).fadeOut(1000);
	        },
	        progressall: function (e, data) {
	            var progress = parseInt(data.loaded / data.total * 100, 10);
	            $('#progress .progress-bar').css('width',progress + '%');
	        }
	    });
	});
	</script>
<!-- End  ~~~~~ #( jQuery File Upload )-->

</head>
<body>
<div class="container">
		<h1>jQuery Upload Demo</h1>
			
	    <h3>上傳圖檔範例</h4>
		
		<div class="jumbotron">

			<!-- 選擇檔案-->
				<span class="btn btn-primary" role="button">
				    <i class="glyphicon glyphicon-plus"></i>
				    <span>選擇檔案...</span>
				    <!-- multiple or '' 設定是否多張上傳-->
					<input id="fileupload" type="file" name="files[]" multiple>
				</span>
			
			
			<!--進度條-->
				<div id="progress" class="progress" style="margin: 10px 0;width:200px;height:10px;">
			        <div class="progress-bar" role="progressbar"></div>
			    </div>

		    
		    <!--上傳限制說明-->
				<h4>上傳類型限制: jpg, jpeg, gif, png, doc(x), ppt(x), xls(x), pdf, txt</h4>

		</div>
		<!--上傳成功將資訊放入#files_result-->
		<div id="files_result"></div>


</div>
</body>
</html>
