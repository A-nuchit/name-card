<body>
	<?php if (isset($query)): ?>
	<table class="table table-hover">
		<thead class="thead-dark">
			<tr>
		 		<th><center>id</center></th>
				<th><center>ชื่อ</center></th>
				<th><center>นามสกุล</center></th>
				<th><center>E-mail</center></th>
				<th><center>เบอร์โทรศัพท์</center></th>
		 
			</tr>
		</thead>
		<tbody>
			<?php foreach($query as $r):?>
				<tr align="center">
					<td><?php echo $r->id; ?></td>
					<td><?php echo $r->name; ?></td>
					<td><?php echo $r->lastname; ?></td>
					<td><?php echo $r->email; ?></td>
					<td><?php echo $r->tel; ?></td>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
<?php endif; ?>
</body>
