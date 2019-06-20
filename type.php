<HTML>
<TITLE>小说类型AI - 码字风云/写作天下</TITLE>
<BODY>
<?php
require 'public_module.php';

$name = seize('name');

function getNovelType($name)
{
	$name = strtoupper($name); // 转换到大写

	$result = ""; // 结果（可能为空）
	$dataset = readTextFile('novel_type_dataset.txt'); // 读取文件

	$max_type_count = 0; // 最大数量
	$max_type_name = ''; // 最大数量的类型

	$types_text = getXmls($dataset, 'TYPE');
	foreach ($types_text as $type_text) {
		$type_name = trim(getXML($type_text, 'NAME'));
		$type_dict = trim(getXML($type_text, 'DICT'));
		$integral = 0;
		$keys = explode(' ', $type_dict);
		foreach ($keys as $key) {
			if ($key != '' && strpos($name, $key) !== false)
				$integral++;
		}
		if ($integral > $max_type_count)
		{
			$max_type_count = $integral;
			$max_type_name = $type_name;
		}
		echo "$type_name : $integral <br>";
	}

	if ($max_type_name != '')
		$result = $max_type_name;
	return $result;
}
function readTextFile($path)
{
	$myfile = fopen($path, "r") or die("Unable to open file!");
	$txt = fread($myfile,filesize($path));
	fclose($myfile);
	return $txt;
}

?>
<form>
	<input type="text" name="name" autofocus> <input type="submit" name="" value="测试"> <br />
	<?php if ($name) echo $name . ' : ' . getNovelType($name); ?>
</form>
</BODY>
</HTML>
