<div class="container">
<!-- 增加显示部门名称的内容 -->
<h3>
<?php
$this->session->depart_id = $thisDep->did;
$this->session->depart_name = $thisDep->name;

?>
</h3>
<?php foreach ($posts as $post): ?>
<h5><a href="<?php echo site_url('pcinfo/sayyes/' . $post->sn) ?> "><?php echo $post->name . '( ' . $post->dep . ' )'; ?></a>  </h5>
<?php endforeach?>
</div>