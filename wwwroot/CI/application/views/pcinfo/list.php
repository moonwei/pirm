<table class="table table-striped table-hover">
	<h2>detail</h2>
	<thead class="thead-dark">
	<tr>
		<th scope="col">#</th>
		<th scope="col">资产编号</th>

		<th scope="col">部门</th>
		<th scope="col">岗位</th>

		<th scope="col">使用人</th>
		<th scope="col">联系电话</th>

		<th scope="col">处理器</th>
		<th scope="col">内存大小</th>
		
		<th scope="col">操作系统</th>
		
		<th scope="col">IP地址</th>
		<th scope="col">MAC</th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($detail as $row): ?>
		<tr>
			<td style=" white-space:nowrap"> <?php echo $row['SN']; ?></td>
			<td style=" white-space:nowrap"> <?php echo $row['ZC_BH']; ?></td>

			<td style=" white-space:nowrap"> <?php echo $row['dname'].'-'.$row['SY_BM']; ?></td>
			<td style=" white-space:nowrap"> <?php echo $row['pname']; ?></td>

			<td style=" white-space:nowrap"> <?php echo $row['SY_NAME']; ?></td>
			<td style=" white-space:nowrap"> <?php echo $row['SY_PHONE']; ?></td>
			
			<td style=" white-space:nowrap"> <?php echo $row['CPU_NAME']; ?></td>
			<td style=" white-space:nowrap"> <?php echo $row['MEMDX']; ?></td>
			<td style=" white-space:nowrap"> <?php echo $row['SYSTEM_NAME']; ?></td>
			
			<td style=" white-space:nowrap"> <?php echo $row['NET_IP1']; ?></td>
			<td style=" white-space:nowrap"> <?php echo $row['NET_MAC1']; ?></td>
		</tr>
	
	<?php endforeach; ?>
	</tbody>
</table>


