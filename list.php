<?php
require 'public_module.php';

$type = seizeor('type', 't');

if ($type)
	$types = "type = $type";
else
	$types = "type != '0'";

if ($type == '1')
	$title = '标点AI';
else if ($type == '2')
	$title = '类型AI';
else
	$title = '小说AI';

$data = select("SELECT * from novelai WHERE $types ORDER BY update_time DESC");
?>
<TITLE><?php echo $title; ?></TITLE>
<div align="center" style="background: #EEEEEE;">
<TABLE id="table-rank">
	<tr>
		<th>索引</th>
		<th>文字</th>
		<th>结果</th>
		<th>次数</th>
		<th>错误</th>
	</tr>
	<?php
	for ($i = 0; $i < count($data); $i++)
	{
		echo "<tr>";
		{
			echo "<td>" . ($i+1) . "</td>";
			if ($data[$i]['type']=='2')
				echo "<td>《" . $data[$i]['instr'] . "》</td>";
			else
				echo "<td>" . $data[$i]['instr'] . "</td>";
			echo "<td>" . $data[$i]['outstr'] . "</td>";
			echo "<td>" . $data[$i]['count'] . "</td>";
			echo "<td>" . $data[$i]['wrong'] . "</td>";
		}
		echo "</tr>";
	}
	?>
</TABLE>
</div>
<style>

a:link{text-decoration: none; color: rgb(230, 189, 189); font-family: 微软雅黑;}
a:visited{ color: rgb(230, 189, 189);}
a:hover{text-decoration: underline; color: rgb(230, 189, 189); }
a:active{text-decoration: blink; color: rgb(230, 189, 189);}

/* Border styles */
#table-rank thead, #table-rank tr {
border-top-width: 1px;
border-top-style: solid;
border-top-color: rgb(230, 189, 189);
}
#table-rank {
border-bottom-width: 1px;
border-bottom-style: solid;
border-bottom-color: rgb(230, 189, 189);
}

/* Padding and font style */
#table-rank td, #table-rank th {
padding: 5px 10px;
font-size: 12px;
font-family: Verdana;
color: rgb(177, 106, 104);
}

/* Alternating background colors */
#table-rank tr:nth-child(even) {
background: rgb(238, 211, 210)
}
#table-rank tr:nth-child(odd) {
background: #FFF
}
</style>