<?php 
	require_once 'app/views/layouts/inc/header.php';
 ?>
 <div class="container">
 	<div class="col-md-8 col-md-offset-2">
		<h1>Them moi Bai viet</h1>
		<form action="./store" method="POST">
			<div class="form-group">
				<label for="">Ten bai viet</label>
				<input type="text" name="title" class="form-control" placeholder="Ten bai viet">
			</div>
			<div class="form-group">
				<label for="">Hinh anh</label>
				<input type="file" name="image" class="form-control">
			</div>
			<div class="form-group">
				<label for="">Noi dung bai viet</label>
				<textarea name="description" cols="30" rows="10" class="form-control"></textarea>
			</div>
			<div class="form-group">
				<label for="">Tac gia</label>
				<input type="text" name="author" class="form-control" placeholder="Tac gia">
			</div>
			<div class="form-group">
				<button type="submit" class="btn btn-success">Them moi</button>
			</div>
		</form>
	</div>
 </div>
 	




<?php 
	require_once 'app/views/layouts/inc/footer.php';
 ?>