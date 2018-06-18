<?php 
require_once 'app/views/layouts/inc/header.php';
 ?>
	<div class="container">
		<h1>Danh sach bai viet</h1>
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>STT</th>
					<th>Tieu de bai viet</th>
					<th>Noi dung bai viet</th>
					<th>Tac gia</th>
					<th><a class="btn btn-success" href="./posts/create">Them moi</a></th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($posts as $key => $post): ?>
					<tr>
						<td><?= $key+1?></td>
						<td><?= $post->title ?></td>
						<td><?= $post->description ?></td>
						<td><?= $post->author ?></td>
						<td>
							<a class="btn btn-info" href=""><span class="glyphicon glyphicon-pencil"></span></a>
							<a class="btn btn-danger" href=""><span class="glyphicon glyphicon-trash"></span></a>
						</td>
					</tr>
				<?php endforeach ?>
			</tbody>
		</table>
	</div>

<?php 
require_once 'app/views/layouts/inc/footer.php';
 ?>
