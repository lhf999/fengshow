<div class="modal-dialog" style="width: 700px">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
			<h4 class="modal-title">{{$title}}</h4>
		</div>
		<form class="form-horizontal" id="addLibraryForm" method="post">
			<!-- 公共属性字段 -->
			<div class="form-group">
				<label for="title" class="col-sm-2 control-label">资源名：</label>
				<div class="col-sm-8">
					<input type="text" class="form-control" value="" id="title" name="title">
				</div>
			</div>
			<div class="hr-line-dashed"></div>
			<div class="form-group">
				<label for="short_title" class="col-sm-2 control-label">短标题：</label>
				<div class="col-sm-8">
					<input type="text" class="form-control" value="" id="short_title" name="short_title">
				</div>
			</div>
			<div class="hr-line-dashed"></div>
			<div class="form-group">
				<label for="tags" class="col-sm-2 control-label">标签：</label>
				<div class="col-sm-8">
					<input type="text" class="form-control" value="" id="tags" name="tags">
				</div>
			</div>
			<div class="hr-line-dashed"></div>
			<div class="form-group">
				<label for="" class="col-sm-2 control-label">原始图：</label>
				<div class="col-sm-8">
					<input type="file" class="default uploadcover" name="files[]" accept="image/gif, image/jpeg, image/png, image/jpg" />
				</div>
			</div>
			<div class="hr-line-dashed"></div>
			<div class="form-group">
				<label for="description" class="col-sm-2 control-label">内容：</label>
				<div class="col-sm-8">
					<textarea rows="10" style="width:480px" id="description" name="description" class="vali_pass"></textarea>
				</div>
			</div>
			<div class="hr-line-dashed"></div>
			<div class="form-group">
				<div class="col-sm-offset-3">
					<button type="submit" class="btn btn-primary" id="submit">保存</button>
				</div>
			</div>
			<div class="hr-line-dashed"></div>
		</form>
	</div>
</div>
<script type="text/javascript">
</script>
