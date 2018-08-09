
<table class="table table-striped table-hover">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">资产编号 </th>
      <th scope="col">处理器 </th>
      <th scope="col">内存大小 </th>

      <th scope="col">操作系统 </th>
      <th scope="col">位数 </th>

      <th scope="col">部门 </th>
      <th scope="col">使用人 </th>
      <th scope="col">联系电话 </th>
      <th scope="col">IP地址 </th>
      <th scope="col">MAC </th>
      </tr>
  </thead>
<tbody>
<?php foreach ($pcs as $pc): ?>
<tr>
<td style=" white-space:nowrap"> <?php echo $pc['SN']; ?></td>
<td style=" white-space:nowrap"> <?php echo $pc['ZC_BH']; ?></td>
<td style=" white-space:nowrap"> <?php echo $pc['CPU_NAME']; ?></td>
<td style=" white-space:nowrap"> <?php echo $pc['MEMDX']; ?></td>
<td style=" white-space:nowrap"> <?php echo $pc['SYSTEM_NAME']; ?></td>
<td style=" white-space:nowrap"> <?php echo $pc['WEISHU']; ?></td>

<td style=" white-space:nowrap"> <?php echo $pc['SY_BM']; ?></td>
<td style=" white-space:nowrap"> <?php echo $pc['SY_NAME']; ?></td>
<td style=" white-space:nowrap"> <?php echo $pc['SY_PHONE']; ?></td>
<td style=" white-space:nowrap"> <?php echo $pc['NET_IP1']; ?></td>
<td style=" white-space:nowrap"> <?php echo $pc['NET_MAC1']; ?></td>
</tr>

<?php endforeach;?>
</tbody>
</table>
