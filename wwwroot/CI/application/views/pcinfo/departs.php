<div class="container">
	<h2><a href="<?php echo site_url( 'pcinfo/signin');?>">登录</a></h2>
	<h2>请选择你的计算机终端所在的部门：</h2>
	<?php foreach ($departs as $dep): ?>
		<h5>
			<a href="<?php echo site_url('pcinfo/postInDep/' . $dep->did) ?> "><?php echo $dep->name . '( ' . $dep->did . ' )'; ?></a>
		</h5>
	<?php endforeach ?>
</div>
