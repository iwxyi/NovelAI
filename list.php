<?php
require 'public_module.php';

$type = seizeor('type', 't');

if ($type)
	$types = "type = $type";
else
	$types = "type != '0'";

$data = select("SELECT * from novelai WHERE $types ORDER BY update_time DESC");
?>
<TITLE>标点AI</TITLE>
<TABLE>
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
			echo "<td>" . $data[$i]['instr'] . "</td>";
			echo "<td>" . $data[$i]['outstr'] . "</td>";
			echo "<td>" . $data[$i]['count'] . "</td>";
			echo "<td>" . $data[$i]['wrong'] . "</td>";
		}
		echo "</tr>";
	}
	?>
</TABLE>