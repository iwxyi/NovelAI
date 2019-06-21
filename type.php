<HTML>
<TITLE>作品AI - 码字风云/写作天下</TITLE>
<BODY>
    <a href="list.php?type=2" target="_blank">全部记录</a>
	例如：【斗罗大陆】，输出【玄幻】
<?php
require 'public_module.php';

$name = seize('name');
$info = "<br />";
$wrong = seize('wrong');

if ($wrong)
{
    $instr = str2sql($name);
    $time = time();
    $inte = $time-60; // 一分钟之前
    query("UPDATE novelai SET wrong = wrong + 1, record_time = $time WHERE type = 2 && instr = '$instr' && record_time < $inte");
}

function getNovelType($name)
{
	global $info;
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
		$info .= "<br /> $type_name : $integral";
	}

	if ($max_type_name != '')
		$result = $max_type_name;

    $name = str2sql($name);
    $time = time();

    if (row("SELECT * FROM novelai WHERE type = 2 && instr = '$name'"))
        query("UPDATE novelai SET count = count + 1, update_time = '$time' WHERE type = 2 && instr = '$name'");
    else
        query("INSERT INTO novelai (type, instr, outstr, count, create_time, update_time) VALUES ('2', '$name', '$result', '1', '$time', '$time')");

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
<form method="POST">
	<input type="text" name="name" autofocus> <input type="submit" name="" value="测试"> <br />
	<?php
        if ($name)
        {
            if ($wrong)
                echo "已记录错误：《 $name 》,请等待开发者更新数据";
            else
                 echo $name . ' : ' . getNovelType($name) . $info;
        }
    ?>
</form>
<?php
if ($name && !$wrong)
{
    ?>
    <form method="POST">
        <input type="hidden" name="name" value="<?php echo $name; ?>">
        <input type="submit" name="wrong" value="反馈错误">
    </form>
    <?php
}
?>
</BODY>
</HTML>
