<?php /* 公用模块，使用说明
/**
 * @author 命燃芯乂
 * @create 2017
 *
 * @change 20190415
 * - 数据库支持PHP7.x（彻底使用另一种方法）
 * - 增加 mysqli 方式连接数据库（也全自动）
 * - 新增 select() 方法，直接获取所有内容
 *
 * @change 20181217
 * - 增加一部分注释
 * - 交换模块顺序（表单输入和安全控制）
 * - 修改数据库方法名，更加简短（可能产生冲突）
 * - check_account() 方法中的全局变量转化成参数形式，增强封装
 * - 修改 printres() 方法，增加两个输出参数
 * - 修改 query() 方法，增加输出错误参数
 * - 新增 query2() 方法，失败输出 错误，并且 die
 * - 新增 die_if2() 方案，输出全局错误代码 F 以及错误原因
 * - getIP() 和 gettime() 等改成 下划线命名法
 * - 调整放SQL注入策略，把HTML格式化变成只修改单引号
 */
/*
<?php
	require "public_module.php";
	php_start();
	#code
	php_end();
?>
*/ ?><?php // 宏定义
	header("Content-type: text/html; charset=utf-8"); // 允许中文

	define("MySQL_servername", "localhost");
	define("MySQL_username", "root");
	define("MySQL_password", "root");
	define("MySQL_database", "mzfy");
	
	define("T", "<STATE>OK</STATE>");  // 成功返回状态文本
	define("F", "<STATE>Bad</STATE>"); // 失败返回状态文本
	define("MOD", 1);      // 秘钥1
	define("MOD2", 2);  // 秘钥2
	define("LOW", 3);      // 秘钥3

	$VERSION_MYSQL = 1;

	$userID = "";                // 全局用户ID
	$version = seize("version"); // 应用版本
	$con = NULL;                 // 数据库连接
	$is_connected = 0;           // 数据库是否连接
?><?php // 全局控制函数
	/**
	 * 如果需要安全验证，则使用下面的函数
	 * 会针对秘钥进行验证
	 */
	function php_start() // 开启操作：安全验证
	{
		verify(); // 验证安全验证码
		reverify(); // 返回安全验证码
	}
	function php_end() // 结束操作：关闭数据库
	{
		global $is_connected, $con;
		if ($is_connected) mysql_close($con); // 若数据库已连接，则关闭
	}
?><?php // 安全验证操作
	/**
	 * 判断能否登录（通过userID和passsword）
	 * @return bool 账号密码是否正确
	 */
	function check_account($userID, $password)
	{
		$sql = "select * from users where userID = '$userID' && password = '$password'";
		die_if(!row($sql), "用户名或者密码错误");
	}
	/**
	 * 验证秘钥
	 * 判断版本是否过期
	 * @return bool 是否验证成功
	 */
	function verify() // 开始验证，版本号是必须的
	{	
		global $userID, $version;
		$version = seize0("version");
		// if ($version == 0) return 0;
		if ($version < 87)
		{
			die("<state>Old</state>");
		}
		$veri_code = seize0("vericode");
		if (verify_uncode($veri_code))
		{
			return 1;
		}
		else
		{
			fuck();
		}
	}
	/**
	 * 输出秘钥，格式化XML，给客户端验证
	 */
	function reverify() // 发送加密后的验证码
	{
		echo "<verify>" . verify_encode() . "</verify>\n";
	}
	/**
	 * 解密收到的密码
	 * @param  string $s 加密后的秘钥
	 * @return string    解密后的字符串
	 */
	function verify_uncode($s) // 解密
	{
		global $version;
		date_default_timezone_set('PRC'); // 临时设置成中国时区
		// 解密操作，已屏蔽
		return $res;
	}
	/**
	 * 产生一串加密后的秘钥
	 * @return string 加密后的字符串
	 */
	function verify_encode() // 返回加密后的验证码
	{
		global $version;
		date_default_timezone_set('PRC'); // 临时设置成中国时区
		
		// 加密操作，已屏蔽
		
		return $ans;
	}
?><?php // 获取表单操作
	/**
	 * 获取表单操作并且进行安全性操作
	 * @return string 返回一个表单（可能为空）
	 */
	function seize() // 函数重载吧……
	{
		$args = func_get_args();
		if (func_num_args() == 1)
			if (isset($_REQUEST[$args[0]]))
				return format_input($_REQUEST[$args[0]], 1);
			else
				return NULL;
		else // 多个，仅判断存不存在
		{
			$num = func_num_args();
			for ($i = 0; $i < $num; $i++)
				if (!isset($_REQUEST[$args[$i]])) // 有一个没有值
					return NULL;
			return 1;
		}
	}
	function seizeor() // 多个表单有一个就行了
	{
		$args = func_get_args();
		if (func_num_args() == 1)
			if (isset($_REQUEST[$args[0]]))
				return format_input($_REQUEST[$args[0]], 1);
			else
				return NULL;
		else // 多个，仅判断存不存在
		{
			$num = func_num_args();
			for ($i = 0; $i < $num; $i++)
				if (isset($_REQUEST[$args[$i]]) && $_REQUEST[$args[$i]] != "") // 有一个值
				{
					return format_input($_REQUEST[$args[$i]], 1);
				}
			return NULL;
		}
	}
	function seize0($s, $blank = 0) // 获取必须存在且非空的表单，如果没有则强制退出
	{
		if (isset($_REQUEST[$s]) && $_REQUEST[$s] != "")
			return format_input($_REQUEST[$s], $blank);
		/*else if (isset($_COOKIE[$s]))
			return $s;*/
		else
			die ;
	}
	function seize1($s, $blank = 0) // 获取一个表单
	{
		if (isset($_REQUEST[$s]))
			return format_input($_REQUEST[$s], $blank);
		/*else if (isset($_COOKIE[$s]))
			return $s;*/
		else
			return NULL;
	}
	function seize2($s, &$a, $blank = 0) // 获取表单并引用赋值
	{
		if (isset($_REQUEST[$s]))
			return ($a = format_input($_REQUEST[$s], $blank));
		/*else if (isset($_COOKIE[$s]))
			return ($a = $s);*/
		else
			return ($a = NULL);
	}
	function seizeval($s, $blank = 0) // 获取一个非空表单，否则为NULL
	{
		if (isset($_REQUEST[$s]) && $_REQUEST[$s] != "")
			return format_input($_REQUEST[$s], $blank);
		/*else if (isset($_COOKIE[$s]))
			return $s;*/
		else
			return NULL;
	}
	function is_set($s) // 有没有存在对应的内容
	{
		if (isset($_REQUEST[$s]))
			return 1;
		else if (isset($_COOKIE[$s]))
			return 2;
		else return 0;
	}
	function enull($s) // 表单为空时也是NULL
	{
		if ($s == NULL || trim($s) == "")
			return NULL;
		else
			return $s;
	}
	function fuck($s = "") // 全部操作退出
	{
		die("00000");
	}
?><?php // 输出控制操作
	function println($s) // 输出一行
	{
		echo $s . "\n";
	}
	/**
	 * 输出某个操作的结果
	 * @param  string $b 操作结果
	 * @param  string $e 错误内容（只在错误时输出）
	 * @param  string $e 正确内容（只在正确时输出）
	 * @return bool    是否执行成功
	 */
	function printres($b, $e="", $t="") // 输出结果，OK / Bad
	{
		if ($b)
		{
			if ($t) echo $t;
			echo T . "\n";
			return 1;
		}
		else
		{
			if ($e) echo $e;
			echo F . "\n";
			return 0;
		}
	}
	/**
	 * 如果表达式成立，则退出，并输出错误信息
	 * @param  bool $b 操作返回结果
	 * @param  string $s 输出内容
	 */
	function die_if($b, $s = "") // 必须OK，否则结束程序
	{
		if ($b)
		{
			die($s);;
		}
	}
	/**
	 * 如果表达式成立，则退出，输出 F 与 XML格式的错误原因
	 * 用于强制退出程序的最后一步
	 * @param  bool $b 表达式结果
	 * @param  string $s 错误信息
	 */
	function die_if2($b, $s = "")
	{
		if ($b)
		{
			echo F . "\n";
			die(XML($s, "REASON")); // <REASON>$s</REASON>
		}
	}
?><?php // 各种取值操作
	/**
	 * 针对输入格式进行格式化，防止SQL注入
	 * @param  string  $s     表单内容
	 * @param  bool    $blank 是否去掉空格
	 * @return string         格式化后的内容
	 */
	function format_input($s, $blank = 0) // 格式化输入内容
	{
		if (!$blank)
			$s = trim($s); // 去空格
		$s = stripslashes($s); // 去转义
		// $s = str_replace("'", "''", $s);
		$s = htmlspecialchars($s); // 防注入
		return $s;
	}
	function get_IP() // 获取真实的IP
	{
		$ip = "";
		if (getenv('HTTP_CLIENT_IP'))
		{
			$ip = getenv('HTTP_CLIENT_IP');
		}
		elseif (getenv('HTTP_X_FORWARDED_FOR'))
		{
			$ip = getenv('HTTP_X_FORWARDED_FOR');
		}
		elseif (getenv('HTTP_X_FORWARDED'))
		{
			$ip = getenv('HTTP_X_FORWARDED');
		}
		elseif (getenv('HTTP_FORWARDED_FOR'))
		{
			$ip = getenv('HTTP_FORWARDED_FOR');
		}
		elseif (getenv('HTTP_FORWARDED'))
		{
			$ip = getenv('HTTP_FORWARDED');
		}
		else
		{
			$ip = $_SERVER['REMOTE_ADDR'];
		}
		return $ip;
	}
	function get_time() // 获取当前时间文本
	{
		date_default_timezone_set('PRC'); // 临时设置成中国时区
		$time = date("y-m-d h:i:s", time());
		return $time;
	}
?><?php // 数据库操作
	function connect_sql() // 连接数据库
	{
		global $con, $is_connected, $VERSION_MYSQL;
		if ($is_connected) // 避免多次连接
		{ return NULL; }
		if ($VERSION_MYSQL === 1)
			$con = new mysqli(MySQL_servername,MySQL_username,MySQL_password);
		else if ($VERSION_MYSQL === 2)
			$con = mysqli_connect(MySQL_servername, MySQL_username, MySQL_password);
		else
			$con = mysqli_connect(MySQL_servername, MySQL_username, MySQL_password);
		if (!$con)
		{ die("数据库连接失败"); }
		
		/*if ($VERSION_MYSQL === 1)
			$con->query("set names 'utf8'");
		else
			mysql_query("SET NAMES 'utf8'");*/

		$is_connected = 1;
		// 选择数据库
		if ($VERSION_MYSQL === 1)
			$con->select_db(MySQL_database);
		else if ($VERSION_MYSQL === 2)
			mysqli_select_db($con, MySQL_database);
		else
			mysql_select_db(MySQL_database, $con);
		return $con;
	}

	/**
	 * 查询与操作语句
	 * @param  string $sql   SQL语句
	 * @param  string $err_s 出现错误时报错
	 * @return array        数组返回结果
	 */
	function query($sql, $err_s = "") // 查询语句
	{
		global $con, $is_connected, $VERSION_MYSQL;
		if (!$is_connected)
			connect_sql();

		if ($VERSION_MYSQL === 1)
			$result = $con->query($sql);
		else if ($VERSION_MYSQL === 2)
			$result = mysqli_query($con, $sql);
		else
			$result = mysql_query($sql, $con);

		if ($err_s && !$result) // 输出错误信息
			echo $err_s . ' ' . mysql_error() . '\n';
		return $result;
	}

	function query_sql($sql, $err_s = "")
	{
		return query($sql, $err_s);
	}

	/**
	 * 查询与操作语句，遇见错误则终止整个程序
	 * @param  string $sql SQL语句
	 * @param  string $err 出现错误时报错
	 * @return array      返回错误内容
	 */
	function query2($sql, $err = "")
	{
		if (!query($sql))
		{
			echo F . '\n';
			echo "<REASON>";
			if ($err != "")
				echo $err . ' ';
			else if ($err == 0)
				echo mysqli_error($con);
			echo '<MYSQ_EOORO:>' . mysql_error();
			echo "</REASON>";
			die;
		}
	}

	function query2_sql($sql, $err = "")
	{
		return query2($sql, $err);
	}

	function row($sql) // 查询一行，数据是否存在
	{
		global $con, $is_connected, $VERSION_MYSQL;
		if (!$is_connected)
		{
			connect_sql();
			$is_connected = 1;
		}
		if ($VERSION_MYSQL === 1)
			$result = $con->query($sql);
		else if ($VERSION_MYSQL === 2)
			$result = mysqli_query($con, $sql);
		else
			$result = mysql_query($sql);
		if ($result)
		{
			if ($VERSION_MYSQL === 1)
				$row = $result->fetch_assoc();
			else if ($VERSION_MYSQL === 2)
				$row = mysqli_fetch_array($result);
			else
				$row = mysql_fetch_array($result);
			return $row;
		}
		else
		{
			return NULL;
		}
	}

	function row_sql($sql)
	{
		return row($sql);
	}

	/**
	 * 返回整个表的数组
	 * @param  string $sql SQL语句
	 * @return array[][]   数组，行下标为整数，列下表为字段名
	 */
	function select($sql)
	{
		global $con, $is_connected, $VERSION_MYSQL;
		if (!$is_connected)
		{
			connect_sql();
			$is_connected = 1;
		}
		if ($VERSION_MYSQL === 1)
			$result = $con->query($sql);
		else if ($VERSION_MYSQL === 2)
			$result = mysqli_query($con, $sql);
		else
			$result = mysql_query($sql);
		// !如果查询出错，$result会返回 none
		$data=array();
		if ($result)
		{
			if ($VERSION_MYSQL === 1)
			{
				// 每行下标整数，每列下标是字段名
				while ($_tmp=$result->fetch_assoc())
				    $data[]=$_tmp;

				// 这个返回的是整数下标的二维数组，每行每列下标都是整数型
				// $data = $result->fetch_all();
			}
			else if ($VERSION_MYSQL === 2)
			{
				while ($_tmp = mysqli_fetch_array($result))
				{
					$data[] = $_tmp;
				}
			}
			else
			{
				while ($_tmp = mysql_fetch_array($result))
				{
					$data[] = $_tmp;
				}
			}
		}
		
		return $data;
	}

	function str2sql($str)
	{
		// 如果没有进行 magic_quotes_gpc ，则进行字符串过滤
		if (!get_magic_quotes_gpc())
		{
			$str = addslashes($str);
		}
		$str = str_replace("_", "\_", $str);
		$str = str_replace("%", "\%", $str);
		return $str;
	}

	function sql2str($sql)
	{
		$str = stripslashes($sql);
		$str = str_replace("\_", "_", $str);
		$str = str_replace("\%", "%", $str);
		return $str;
	}
	
?><?php // 字符串操作
	function XML($str, $tag)
	{
		return "<" . $tag . ">" . $str . "</" . $tag . ">";
	}
	function getXML($str, $tag)
	{
		$left = "<" . $tag . ">";
		$right = "</" . $tag . ">";
		return getMid($str, $left, $right);
	}
	function getXMLs($str, $tag)
	{
		$left = "<" . $tag . ">";
		$right = "</" . $tag . ">";
		return getMids($str, $left, $right);
	}
	function getMid($str, $left, $right)
	{
		$pos = strpos($str, $left);
		if ($pos === false) $pos = 0;
		$pos += strlen($left);
		$pos2 = strpos($str, $right, $pos);
		if ($pos2 === false) $pos2 = strlen($str);
		return substr($str, $pos, $pos2-$pos);
	}
	function getMids($str, $left, $right)
	{
		$ans = array();
		$pos = 0;
		$pos2 = 0;
		while (1)
		{
			$pos = strpos($str, $left, $pos2);
			if ($pos === false) return $ans;
			$pos += strlen($left);
			$pos2 = strpos($str, $right, $pos);
			if ($pos2 === false) return $ans;
			array_push($ans, substr($str, $pos, $pos2-$pos));
			$pos2 += strlen($right);
		}
		return $ans;
	}