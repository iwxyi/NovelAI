<HTML>
<TITLE>标点AI - 码字风云/写作天下</TITLE>
<BODY>
    <a href="list.php?type=1" target="_blank">全部记录</a>
    例如：【你好吗】，输出【你好吗？】（仅限一句话，不包含人物神态动作）
<?php
require 'public_module.php';

$sent = seize('sent');
$wrong = seize('wrong');

if ($wrong)
{
    $instr = str2sql($sent);
    // $instr = $sent;
    $time = time();
    $inte = $time-60; // 一分钟之前
    query("UPDATE novelai SET wrong = wrong + 1, record_time = $time WHERE type = 1 && instr = '$instr' && record_time < $inte");
}

/* 字符替换：
([^\$])(punc|sent|stone)
\1$\2

sent\.left\((\w+)\)
mleft($sent, \1)

sent\.right\((\w+)\)
mright($sent, -\1)

sent\.mid\((\w+)\)
mmid($sent, -\1)

_(left)
$left

\$sent\.length(\(\))?
mlength($sent)

shenme_pos    手动改

mid    手动改
msubstr($sent, mstrlen($sent)-2, 1)

substr
msubstr

\$sent\.startsWith\((.(+?)"\)
canRegExp($sent, "^\1")

\$sent\.endsWith\("(.+?)"\)
canRegExp($sent, "\1$")

== -1
=== false

> -1
!== flase

 */

function getPunc($sent)
{
	$left1 = mmid($sent, mstrlen($sent)-1, 1);
	$left2 = mmid($sent, mstrlen($sent)-2, 1);
	$left3 = mmid($sent, mstrlen($sent)-3, 1);
    $res = getTalkTone($sent, -1, $left1, $left2, $left3);
    if ($res == '，')
        $res = '。';

    $sent = str2sql($sent);
    $time = time();

    if (row("SELECT * FROM novelai WHERE type = 1 && instr = '$sent'"))
        query("UPDATE novelai SET count = count + 1, update_time = '$time' WHERE type = 1 && instr = '$sent'");
    else
        query("INSERT INTO novelai (type, instr, outstr, count, create_time, update_time) VALUES ('1', '$sent', '$res', '1', '$time', '$time')");

    return $res;
}

function getDescTone($sent)
{
    $tone = -1;

    if ( strpos(sent, "轻") !== false)
        $tone = 0;
    else if ( strpos(sent, "温") !== false)
        $tone = 0;
    else if ( strpos(sent, "柔") !== false)
        $tone = 0;
    else if ( strpos(sent, "悄") !== false)
        $tone = 0;
    else if ( strpos(sent, "淡") !== false)
        $tone = 0;
    else if ( strpos(sent, "静") !== false)
        $tone = 0;
    else if ( strpos(sent, "小") !== false)
        $tone = 0;
    else if ( strpos(sent, "问") !== false)
        $tone = 2;
    else if ( strpos(sent, "疑") !== false)
        $tone = 2;
    else if ( strpos(sent, "惑") !== false)
        $tone = 2;
    else if ( strpos(sent, "不解") !== false)
        $tone = 2;
    else if ( strpos(sent, "迷") !== false)
        $tone = 2;
    else if ( strpos(sent, "好奇") !== false)
        $tone = 2;
    else if ( strpos(sent, "试") !== false)
        $tone = 2;
    else if ( strpos(sent, "探") !== false)
        $tone = 2;
    else if ( strpos(sent, "询") !== false)
        $tone = 2;
    else if ( strpos(sent, "诧") !== false)
        $tone = 2;
    else if ( strpos(sent, "愤") !== false)
        $tone = 1;
    else if ( strpos(sent, "恼") !== false)
        $tone = 1;
    else if ( strpos(sent, "咬") !== false)
        $tone = 1;
    else if ( strpos(sent, "怒") !== false)
        $tone = 1;
    else if ( strpos(sent, "骂") !== false)
        $tone = 1;
    else if ( strpos(sent, "狠") !== false)
        $tone = 1;
    else if ( strpos(sent, "火") !== false)
        $tone = 1;
    else if ( strpos(sent, "重") !== false)
        $tone = 1;
    else if ( strpos(sent, "抓") !== false)
        $tone = 1;
    else if ( strpos(sent, "狂") !== false)
        $tone = 1;
    else if ( strpos(sent, "叫") !== false)
        $tone = 1;
    else if ( strpos(sent, "喊") !== false)
        $tone = 1;
    else if ( strpos(sent, "力") !== false)
        $tone = 1;
    else if ( strpos(sent, "大") !== false)
        $tone = 1;
    else if ( strpos(sent, "哮") !== false)
        $tone = 1;
    else if ( strpos(sent, "厉") !== false)
        $tone = 1;
    else if ( strpos(sent, "斥") !== false)
        $tone = 1;
    else if ( strpos(sent, "吼") !== false)
        $tone = 1;
    else if ( strpos(sent, "气") !== false)
        $tone = 1;
    else if ( strpos(sent, "震") !== false)
        $tone = 1;
    else if ( strpos(sent, "喜") !== false)
        $tone = 1;
    else if ( strpos(sent, "惊") !== false)
        $tone = 1;
    else if ( strpos(sent, "忙") !== false)
        $tone = 1;
    else if ( strpos(sent, "瞪") !== false)
        $tone = 1;
    else if ( strpos(sent, "嗔") !== false)
        $tone = 1;
    else if ( strpos(sent, "暴") !== false)
        $tone = 1;
    else if ( strpos(sent, "咒") !== false)
        $tone = 1;
    else if ( strpos(sent, "红") !== false)
        $tone = 1;
    else if ( strpos(sent, "痛") !== false)
        $tone = 1;
    else if ( strpos(sent, "恐") !== false)
        $tone = 1;
    else if ( strpos(sent, "憎") !== false)
        $tone = 1;
    else if ( strpos(sent, "眦") !== false)
        $tone = 1;
    else if ( strpos(sent, "悲") !== false)
        $tone = 1;
    else if ( strpos(sent, "狂") !== false)
        $tone = 1;
    else if ( strpos(sent, "重") !== false)
        $tone = 1;
    else if ( strpos(sent, "躁") !== false)
        $tone = 1;
    else if ( strpos(sent, "铁青") !== false)
        $tone = 1;
    else if ( strpos(sent, "狠") !== false)
        $tone = 1;
    else if ( strpos(sent, "恨") !== false)
        $tone = 1;
    else if ( strpos(sent, "齿") !== false)
        $tone = 1;
    else if ( strpos(sent, "急") !== false)
        $tone = 1;
    else if ( strpos(sent, "变") !== false)
        $tone = 1;
    else if ( strpos(sent, "冲") !== false)
        $tone = 1;
    else if ( strpos(sent, "激") !== false)
        $tone = 1;
    else if ( strpos(sent, "恶") !== false)
        $tone = 1;
    else if ( strpos(sent, "绝") !== false)
        $tone = 1;
    else if ( strpos(sent, "瞪") !== false)
        $tone = 1;
    else if ( strpos(sent, "愁") !== false)
        $tone = 1;
    else if ( strpos(sent, "羞") !== false)
        $tone = 1;
    else if ( strpos(sent, "恼") !== false)
        $tone = 1;
    else if ( strpos(sent, "忿") !== false)
        $tone = 1;
    else if ( strpos(sent, "凶") !== false)
        $tone = 1;
    else if ( strpos(sent, "连") !== false)
        $tone = 1;
    else if ( strpos(sent, "热") !== false)
        $tone = 1;
    else if ( strpos(sent, "欢") !== false)
        $tone = 1;
    else if ( strpos(sent, "万") !== false)
        $tone = 1;
    else if ( strpos(sent, "得") !== false)
        $tone = 1;
    else if ( strpos(sent, "叹") !== false)
        $tone = 1;
    else if ( strpos(sent, "兴") !== false)
        $tone = 1;
    else if ( strpos(sent, "不已") !== false)
        $tone = 1;
    else if ( strpos(sent, "舞") !== false)
        $tone = 1;
    else if ( strpos(sent, "天天") !== false)
        $tone = 1;
    else if ( strpos(sent, "高") !== false)
        $tone = 1;
    else if ( strpos(sent, "昂") !== false)
        $tone = 1;
    else if ( strpos(sent, "澎湃") !== false)
        $tone = 1;
    else if ( strpos(sent, "颤") !== false)
        $tone = 1;
    else if ( strpos(sent, "慌") !== false)
        $tone = 1;
    else if ( strpos(sent, "骇") !== false)
        $tone = 1;
    else if ( strpos(sent, "跳") !== false)
        $tone = 1;
    else if ( strpos(sent, "皆") !== false)
        $tone = 1;
    else if ( strpos(sent, "怵") !== false)
        $tone = 1;
    else if ( strpos(sent, "霹雳") !== false)
        $tone = 1;
    else if ( strpos(sent, "急") !== false)
        $tone = 1;
    else if ( strpos(sent, "忙") !== false)
        $tone = 1;
    else
        $tone = -1;

    return $tone;
}

function getTalkTone($sent, $tone,$left1, $left2, $left3)
{
   $punc = "，";

    if (strpos($sent, "是不") !== false)
        if ($tone == 0)
            $punc = "，";
        else if ($tone == 1)
            $punc = "！";
        else if (canRegExp($sent, "是不.的") == true)
            ;
        else if (strpos($sent, "本来是不") !== false)
            ;
        else
            $punc = "？";
    else if (strpos($sent, "是么") !== false)
        $punc = "？";
    else if (strpos($sent, "管不管") !== false)
        $punc = "？";
    else if (strpos($sent, "不管") !== false)
        ;
    else if (strpos($sent, "反正") !== false)
        ;
    else if (strpos($sent, "怎么知") !== false)
        $punc = "？";
    else if (strpos($sent, "么会") !== false)
        $punc = "？";
    else if (strpos($sent, "真") !== false && strpos($sent, "真理") === false && strpos($sent, "真假") === false && strpos($sent, "真事") === false)
        if (strpos($sent, "真的") !== false || strpos($sent, "真是") !== false)
            if (strpos($sent, "真的是") !== false || strpos($sent, "真是") !== false)
                if (strpos($sent, "啊") !== false)
                    $punc = "！";
                else if (strpos($sent, "吗") !== false)
                    $punc = "？";
                else if (strpos($sent, "啦") !== false)
                    $punc = "！";
                else if (strpos($sent, "呀") !== false)
                    $punc = "！";
                else if (strpos($sent, "了") !== false)
                    if (strpos($sent, "太") !== false || strpos($sent, "好"))
                        $punc = "！";
                    else
                        $punc = "？";
                else if ($tone == 1)
                    $punc = "！";
                else if ($tone == 2)
                    $punc = "？";
                else if (strpos($sent, "真是不") !== false)
                    $punc = "！";
                else
                {}
            else if ($sent == "真的")
                if ($tone == 2)
                    $punc = "？";
                else if (strpos($sent, "好吗"))
                    $punc = "？";
                else if (strpos($sent, "太") !== false || strpos($sent, "好"))
                    $punc = "！";
                else
                {}
            else if (strpos($sent, "真的好") !== false || strpos($sent, "真的很") !== false || strpos($sent, "真的非常") !== false || strpos($sent, "真的太") !== false || strpos($sent, "真的特") !== false)
                if (strpos($sent, "吗") !== false)
                    $punc = "？";
                else if ($tone == 0)
                    ;
                else if ($tone == 2)
                    $punc = "？";
                else
                    $punc = "！";
            else if (strpos($sent, "怎么") !== false)
                if (canRegExp($sent, "怎么也.*不"))
                    ;
                else
                    $punc = "？";
            else if (strpos($sent, "难道") !== false)
                $punc = "？";
            else if (isKnowFormat($sent) == true)
                ;
            else if (strpos($sent, "是我") !== false)
                ;
            else if (strpos($sent, "如何") !== false)
                $punc = "？";
            else if (strpos($sent, "啊") !== false)
                $punc = "！";
            else if (strpos($sent, "吗") !== false)
                $punc = "？";
            else if (strpos($sent, "啦") !== false)
                $punc = "！";
            else if (strpos($sent, "呀") !== false)
                $punc = "！";
            else if ($tone == 1)
                $punc = "！";
            else if ($tone == 2)
                $punc = "？";
            else if (strpos($sent, "就真的不是") !== false)
                ;
            else if (strpos($sent, "不是") !== false)
                $punc = "？";
            else
            {}
        else if (strpos($sent, "你真") !== false)
            if (strpos($sent, "不") !== false || strpos($sent, "了") !== false)
                if ($tone == 1)
                    $punc = "！";
                else if ($tone == 0)
                    ;
                else
                    $punc = "？";
            else if ($tone == 2)
                $punc = "？";
            else if ($tone == 0)
                ;
            else if (strpos($sent, "啊") !== false)
                $punc = "！";
            else if (strpos($sent, "吗") !== false)
                $punc = "？";
            else if (strpos($sent, "啦") !== false)
                $punc = "！";
            else if (strpos($sent, "呀") !== false)
                $punc = "！";
            else
                $punc = "！";
        else if (strpos($sent, "他真") !== false)
            if (strpos($sent, "不") !== false || strpos($sent, "了") !== false)
                if ($tone == 1)
                    $punc = "！";
                else if ($tone == 0)
                    ;
                else
                    $punc = "？";
            else if (strpos($sent, "啊") !== false)
                $punc = "！";
            else if (strpos($sent, "吗") !== false)
                $punc = "？";
            else if (strpos($sent, "啦") !== false)
                $punc = "！";
            else if (strpos($sent, "呀") !== false)
                $punc = "！";
            else if ($tone == 2)
                $punc = "？";
            else if ($tone == 0)
                ;
            else
                $punc = "！";
        else if (strpos($sent, "她真") !== false)
            if (strpos($sent, "不") !== false || strpos($sent, "了") !== false)
                if ($tone == 1)
                    $punc = "！";
                else if ($tone == 0)
                    ;
                else
                    $punc = "？";
            else if (strpos($sent, "啊") !== false)
                $punc = "！";
            else if (strpos($sent, "吗") !== false)
                $punc = "？";
            else if (strpos($sent, "啦") !== false)
                $punc = "！";
            else if (strpos($sent, "呀") !== false)
                $punc = "！";
            else if ($tone == 2)
                $punc = "？";
            else if ($tone == 0)
                ;
            else
                $punc = "！";
        else if (isKnowFormat($sent) == true)
            ;
        else if ($tone == 1)
            $punc = "！";
        else if ($tone == 2)
            $punc = "？";
        else if (strpos($sent, "啊") !== false)
            $punc = "！";
        else if (strpos($sent, "吗") !== false)
            $punc = "？";
        else if (strpos($sent, "啦") !== false)
            $punc = "！";
        else if (strpos($sent, "呀") !== false)
            $punc = "！";
        else
        {}
    else if (strpos($sent, "是否") !== false)
        if (isKnowFormat($sent) == true)
            ;
        else
            $punc = "？";
    else if (strpos($sent, "是不是") !== false)
        if (isKnowFormat($sent) == true)
            ;
        else if ($tone == 1)
            $punc = "！";
        else if ($tone == 0)
            ;
        else
            $punc = "？";
    else if (strpos($sent, "可能是") !== false && canRegExp($sent, ".*[特别|真的|格外|非常].*") == true)
        $punc = "！";
    else if (strpos($sent, "知不知") !== false)
        $punc = "？";
    else if (strpos($sent, "需不需") !== false)
        if (isKnowFormat($sent) == true && strpos($sent, "怎么") === false && strpos($sent, "为什么") === false)
            ;
        else
            $punc = "？";
    else if (strpos($sent, "要不要") !== false)
        if (isKnowFormat($sent) == true)
            ;
        else if (strpos($sent, "你") === false)
            $punc = "？";
        else if (strpos($sent, "犹豫要") !== false || strpos($sent, "在想") !== false || strpos($sent, "思考") !== false)
            ;
        else
            $punc = "？";
    else if (strpos($sent, "要不是") !== false)
        ;
    else if (canRegExp($sent, "(.{1,2})不\\1") == true)
        if (isKnowFormat($sent) == true && strpos($sent, "怎么") === false && strpos($sent, "为什么") === false && strpos($sent, "难道") === false)
            ;
        else if (strpos($sent, "时不时") !== false)
            ;
        else
            $punc = "？";
    else if (mstrlen($sent)  > 2 && msubstr($sent, -1) == "不" && strpos($sent, "不不") === false)
        $punc = "？";
    else if (strpos($sent, "还不") !== false)
        if (strpos($sent, "给我") !== false)
            $punc = "！";
        else if ($tone == 1)
            $punc = "！";
        else if ($tone == 0)
            ;
        else if (strpos($sent, "吧") !== false)
            $punc = "？";
        else if (strpos($sent, "吗") !== false)
            $punc = "？";
        else if (strpos($sent, "嘛") !== false)
            $punc = "？";
        else if (strpos($sent, "啊") !== false)
            $punc = "！";
        else if (strpos($sent, "不至于") !== false)
            ;
        else if (strpos($sent, "不如") !== false)
            ;
        else
            $punc = "？";
    else if (strpos($sent, "不要") !== false && strpos($sent, "吗") === false && strpos($sent, "吧") === false && strpos($sent, "呢") === false && strpos($sent, "了") === false)
        $punc = "！";
    else if (strpos($sent, "不可思议") !== false)
        $punc = "！";
    else if (strpos($sent, "誓不") !== false)
        $punc = "！";
    else if (strpos($sent, "都要") !== false && strpos($sent, "吗") === false && strpos($sent, "吧") === false && strpos($sent, "呢") === false && strpos($sent, "了") === false)
        if (strpos($sent, "你都要") !== false && strpos($sent, "这") !== false && strpos($sent, "这") > strpos($sent, "你都要"))
            $punc = "？";
        else
            $punc = "！";
    else if ($sent == "我要")
        $punc = "！";
    else if ($sent == "不要")
        $punc = "！";
    else if ($sent == "要")
        ;
    else if ($sent == "反正")
        ;
    else if ($sent == "那就是说" && mstrlen($sent)  > 6 && msubstr($sent, -1) == "了")
        if ($tone == 1)
            $punc = "！";
        else if ($tone == 0)
            $punc = "。";
        else
            $punc = "？";
    else if (strpos($sent, "绝对") !== false)
        $punc = "！";
    else if (strpos($sent, "一定") !== false && strpos($sent, "有一定") === false && strpos($sent, "一定的") === false && strpos($sent, "不一定") === false && strpos($sent, "一定的") === false)
        $punc = "！";
    else if (strpos($sent, "你居然") !== false)
        $punc = "！";
    else if (strpos($sent, "甚至") !== false)
        $punc = "！";
    else if (strpos($sent, "简直") !== false)
        $punc = "！";
    else if (strpos($sent, "必定") !== false)
        $punc = "！";
    else if (strpos($sent, "要不") !== false)
        if ($sent == "要不")
            $punc = "，";
        else
            $punc = "？";
    else if (strpos($sent, "可不") !== false)
        $punc = "？";
    else if (strpos($sent, "行不") !== false)
        $punc = "？";
    else if (strpos($sent, "不就") !== false)
        $punc = "？";
    else if (strpos($sent, "多少") !== false)
        if (strpos($sent, "没") !== false)
            ;
        else if (strpos($sent, "多少") < strpos($sent, "是"))
            ;
        else if ($tone == 1)
            $punc = "！";
        else if ($tone == 0)
            ;
        else if (isKnowFormat($sent) == true)
            ;
        else
            $punc = "？";
    else if (strpos($sent, "多久") !== false)
        if (strpos($sent, "没") !== false && strpos($sent, "没") < strpos($sent, "多久"))
            ;
        else if (strpos($sent, "没多久") !== false)
            ;
        else if ($tone == 1)
            $punc = "！";
        else if ($tone == 0)
            ;
        else if (isKnowFormat($sent) == true)
            ;
        else
            $punc = "？";
    else if (strpos($sent, "有多") !== false)
        if ($tone == 1)
            $punc = "！";
        else if ($tone == 0)
            $punc = "。";
        else if (isKnowFormat($sent) == true)
            ;
        else
            $punc = "？";
    else if (strpos($sent, "都要") !== false)
        if ($tone == 2)
            $punc = "？";
        else if ($tone == 0)
            ;
        else
            $punc = "！";
    else if (strpos($sent, "么") !== false)
        if (strpos($sent, "什么") !== false)
        {
            $shenme_pos = strpos($sent, "什么");
            if ($tone == 1)
                $punc = "！";
            else if ($tone == 2)
                $punc = "？";
            else if ($tone == 0)
                ;
            else if (strpos($sent, "还") !== false)
                if (isKnowFormat($sent) == true)
                    ;
                else if (strpos($sent, "以为") !== false)
                    ;
                else
                    $punc = "？";
            else if (strpos($sent, "似乎") !== false)
                ;
            else if (strpos($sent, "好像") !== false)
                ;
            else if (strpos($sent, "不了") !== false)
                if ($tone == 1)
                    $punc = "！";
                else
                {}
            else if (strpos($sent, "怎么") === false && canRegExp($sent, "什么.*都"))
                ;
            else if (strpos($sent, "都不") !== false)
                ;
            else if (strpos($sent, "都") !== false && strpos($sent, "来") !== false)
                ;
            else if (strpos($sent, "或许") !== false)
                ;
            else if (strpos($sent, "说不定") !== false)
                ;
            else if (strpos($sent, "可能") !== false)
                ;
            else if (strpos($sent, "仿佛") !== false)
                ;
            else if (strpos($sent, "要发生什么") !== false)
                ;
            else if (strpos($sent, "没") !== false && strpos($sent, "没") < $shenme_pos)
                ;
            else if (strpos($sent, "肯定") !== false && strpos($sent, "肯定") < $shenme_pos)
                ;
            else if (strpos($sent, "决定") !== false)
                ;
            else if (strpos($sent, "不出") !== false)
                ;
            else if (strpos($sent, "不是") !== false && strpos($sent, "不是") < $shenme_pos)
                ;
            else if (strpos($sent, "不到") !== false && strpos($sent, "不到") < $shenme_pos)
                ;
            else if (strpos($sent, "不了") !== false)
                ;
            else if (strpos($sent, "多么") !== false)
                if (strpos($sent, "啊") !== false)
                    $punc = "！";
                else
                {}
            else if (strpos($sent, "什么都") !== false)
                if (strpos($sent, "怎么") !== false)
                    if (strpos($sent, "不") !== false)
                        ;
                    else
                        $punc = "？";
                else if (strpos($sent, "什么都要") !== false)
                    $punc = "！";
                else
                {}
            else if (strpos($sent, "什么的") !== false)
                ;
            else if (strpos($sent, "的什么东西") !== false)
                ;
            else if (strpos($sent, "说了什么") !== false && strpos($sent, "的", strpos($sent, "说了什么") + 1) !== false)
                ;
            else if (strpos($sent, "到底") !== false)
                $punc = "！";
            else if (strpos($sent, "情况") !== false)
                $punc = "？";
            else if (isKnowFormat($sent) == true)
                ;
            else
                $punc = "？";
        }
        else if (strpos($sent, "怎么") !== false && strpos($sent, "不怎么") === false && strpos($sent, "怎么也") === false)
            if (isKnowFormat($sent) == true && strpos($sent, "都知道") === false)
                if (strpos($sent, "怎么知") !== false)
                    $punc = "？";
                else if (strpos($sent, "怎么懂") !== false)
                    $punc = "？";
                else if (canRegExp($sent, "我.*[教|告|诉|帮].*怎么"))
                    ;
                else if ($tone == 2)
                    $punc = "？";
                else if ($tone == 1)
                    $punc = "！";
                else
                {}
            else if ($tone == 1)
                $punc = "！";
            else if ($tone == 0)
                ;
            else if ($sent == "怎么")
                $punc = "，";
            else if (strpos($sent, "吗") !== false)
                $punc = "？";
            else if (strpos($sent, "啊") !== false)
                $punc = "？";
            else if (strpos($sent, "吧") !== false)
                $punc = "？";
            else if (strpos($sent, "呢") !== false)
                $punc = "？";
            else if (strpos($sent, "嘛") !== false)
                $punc = "？";
            else if (strpos($sent, "看到") !== false)
                ;
            else if (strpos($sent, "其实") !== false)
                ;
            else if (strpos($sent, "发现") !== false)
                ;
            else if (strpos($sent, "怎么就") !== false)
                $punc = "！";
            else
                $punc = "？";
        else if (strpos($sent, "要么") !== false)
            $punc = "，";
        else if (strpos($sent, "不怎") !== false)
            ;
        else if (strpos($sent, "怎样") !== false)
            if (isKnowFormat($sent) == true || strpos($sent, "不怎样") !== false)
                ;
            else
                $punc = "？";
        else if (strpos($sent, "么么") !== false)
            $punc = "~";
        else if (strpos($sent, "么又") !== false)
            if ($tone == 1)
                $punc = "！";
            else if ($tone == 0)
                ;
            else
                $punc = "？";
        else if (strpos($sent, "这么") !== false)
            if ($tone == 1)
                $punc = "！";
            else if ($tone == 2)
                $punc = "？";
            else
            {}
        else if (strpos($sent, "那么") !== false)
            if ($tone == 1)
                $punc = "！";
            else if ($tone == 2)
                $punc = "？";
            else
            {}
        else if (strpos($sent, "多么") !== false)
            if (strpos($sent, "啊") !== false)
                $punc = "！";
            else
            {}
        else if (strpos($sent, "饿了么") !== false)
            ;
        else
            $punc = "？";
    else if (strpos($sent, "难道") !== false)
        if ($sent == "难道")
            $punc = "，";
        else
            $punc = "？";
    else if (strpos($sent, "怎样") !== false && strpos($sent, "不怎样") === false)
        if (isKnowFormat($sent) == true && strpos($sent, "我") !== false && strpos($sent, "怎么") === false && strpos($sent, "知") < strpos($sent, "怎样") && strpos($sent, "明") < strpos($sent, "怎样") && strpos($sent, "懂", 0) < strpos($sent, "怎样"))
            ;
        else
            $punc = "？";
    else if (strpos($sent, "何") !== false)
        if (strpos($sent, "如何") !== false)
            if (strpos($sent, "无论") !== false || strpos($sent, "不管") !== false || isKnowFormat($sent) == true)
                if ($tone == 1)
                    $punc = "！";
                else
                {}
            else
                $punc = "？";
        else if (strpos($sent, "任何") !== false)
            if ($tone == 2 && isKnowFormat($sent) == false)
                $punc = "？";
            else if ($tone == 1)
                $punc = "！";
            else
            {}
        else if (strpos($sent, "为何") !== false)
            if (isKnowFormat($sent) == true)
                if (strpos($sent, "何不知") !== false)
                    $punc = "？";
                else
                {}
            else
                $punc = "？";
        else if (strpos($sent, "何况") !== false || strpos($sent, "何人") !== false || strpos($sent, "何事") !== false || strpos($sent, "何时") !== false || strpos($sent, "何且") !== false)
            $punc = "？";
        else if (strpos($sent, "何等") !== false)
            if (strpos($sent, "啊") !== false)
                $punc = "！";
            else
            {}
        else if ($tone == 0)
            ;
        else if ($tone == 1)
            $punc = "！";
        else if (strpos($sent, "几何") !== false)
            ;
        else if (strpos($sent, "何来") !== false)
            $punc = "！";
        else
            $punc = "？";
    else if (strpos($sent, "谁") !== false && strpos($sent, "谁也") === false)
        if (strpos($sent, "谁知") !== false && strpos($sent, "谁知") < strpos($sent, "就"))
            $punc = "！";
        else if ($tone == 1)
            $punc = "！";
        else if (strpos($sent, "谁说") !== false || strpos($sent, "谁让") !== false)
            $punc = "？";
        else if (isKnowFormat($sent))
        	;
        else
            $punc = "？";
    else if (canRegExp($sent, "当.+时") == true)
        if (strpos($sent, "难道") !== false)
            $punc = "？";
        else
        {}
    else if (strpos($sent, "啥") !== false)
        if (isKnowFormat($sent) == true)
            $punc = "。";
        else
            $punc = "？";
    else if (strpos($sent, "哪") !== false)
        if ($tone == 0)
            $punc = "。";
        else if ($tone == 1)
            $punc = "！";
        else if (strpos($sent, "天哪") !== false)
            $punc = "！";
        else if (strpos($sent, "哪怕") !== false)
            ;
        else if ($sent == "哪里")
            ;
        else
            $punc = "？";
    else if (strpos($sent, "居然") !== false && mstrlen($sent)  >= 3 && msubstr($sent, -3).indexOf("居然") !== false)
        $punc = "……";
    else if (strpos($sent, "居然") !== false)
        if ($tone == 2)
            $punc = "？";
        else if ($tone == 0)
            if (mstrlen($sent) > 5)
                $punc = "。";
            else
            {}
        else if (strpos($sent, "知") !== false || strpos($sent, "发") !== false || strpos($sent, "到") !== false)
            ;
        else
            $punc = "！";
    else if ((canRegExp($sent, "^虽然") || canRegExp($sent, "^然而") || canRegExp($sent, "^但") || canRegExp($sent, "^最后") || strpos($sent, "接着") !== false || strpos($sent, "然后") !== false || strpos($sent, "之后") !== false || strpos($sent, "至少") !== false)
             && QString("吗呢吧呀啊").indexOf(msubstr($sent, -1)) === false)
        ;
    else if (strpos($sent, "也不能") !== false && strpos($sent, "也不能")<= 2 && QString("吗呢").indexOf(msubstr($sent, -1)) === false)
        ;
    else if (strpos($sent, "听说") !== false)
        if ($tone == 0 || strpos($sent, "就听说") !== false || strpos($sent, "一些") || strpos($sent, "还没") || strpos($sent, "不是") > strpos($sent, "听说")
                || $sent == "听说" || strpos($sent, "前") > strpos($sent, "听说") || strpos($sent, "时") !== false || strpos($sent, "听说过") !== false || strpos($sent, "却") !== false
                || (strpos($sent, "没听说") !== false && QString("吧吗啊").indexOf(msubstr($sent, -1)) !== false) || strpos($sent, "都听说") !== false
                || strpos($sent, "她") > strpos($sent, "听说")|| strpos($sent, "他") > strpos($sent, "听说")|| strpos($sent, "它") > strpos($sent, "听说")
                || canRegExp($sent, "听说$") || strpos($sent, "这") !== false)
            ;
        else if ($tone == 1)
            $punc = "！";
        else
            $punc = "？";
    else if (strpos($sent, "貌似") !== false)
        if ($tone == 0)
            ;
        else if ($tone == 1)
            $punc = "！";
        else
            $punc = "？";
    else if (strpos($sent, "有没有") !== false)
        if (strpos($sent, "知道") !== false)
            ;
        else if ($tone == 1)
            $punc = "！";
        else
            $punc = "？";
    else if (strpos($sent, "至少") !== false)
        if ($sent == "至少")
            $punc = "，";
        else if ($tone == 0)
            ;
        else if ($tone == 2)
            $punc = "？";
        else
            $punc = "！";
    else if (strpos($sent, "想必") !== false)
        if ($tone == 0)
            ;
        else
            $punc = "？";
    else if (strpos($sent, "站住") !== false)
        $punc = "！";
    else if (strpos($sent, "然又") !== false || strpos($sent, "又来") !== false)
        if ($tone == 2 || strpos($sent, "吗") !== false)
            $punc = "？";
        else
            $punc = "！";
    else if (strpos($sent, "了没") !== false && isKnowFormat($sent) == false)
        $punc = "？";
    else if (strpos($sent, "了什") !== false && isKnowFormat($sent) == false )
        $punc = "？";
    else if (strpos($sent, "不知") !== false)
        if (isKnowFormat($sent) == true && msubstr($sent, -2) == "知道")
            $punc = "，";
        else if ($tone == 0)
            ;
        else if ($tone == 1)
            $punc = "！";
        else if (strpos($sent, "知过") !== false)
            ;
        else if (mstrlen($sent)  > 7 && msubstr($sent, 3) == "不知道" && msubstr($sent, -1) == "的")
            $punc = "？";
        else if (strpos($sent, "然不知") !== false)
            $punc = "，";
        else if (strpos($sent, "知所") !== false)
            $punc = "，";
        else if (strpos($sent, "知不") !== false)
            $punc = "，";
        else if (strpos($sent, "知者") !== false)
            $punc = "，";
        else if (strpos($sent, "知火") !== false)
            $punc = "，";
        else if (strpos($sent, "知之") !== false)
            $punc = "，";
        else if (strpos($sent, "知的") !== false)
            $punc = "，";
        else if (strpos($sent, "还不") !== false && strpos($sent, "呢") !== false)
            $punc = "！";
        else
            $punc = "？";
    else if (strpos($sent, "干嘛") !== false)
        if ( strpos($sent, "你") === false && isKnowFormat($sent) == true)
            $punc = "，";
        else
            $punc = "？";
    else if (strpos($sent, "也算") !== false || strpos($sent, "算是") !== false)
        if ($tone == 2)
            $punc = "？";
        else if ($tone == 1)
            $punc = "！";
        else if (strpos($sent, "吗") !== false)
            $punc = "？";
        else if (strpos($sent, "呢") !== false)
            $punc = "！";
        else if (strpos($sent, "嘛") !== false)
            $punc = "！";
        else if (strpos($sent, "吧") !== false)
            if (strpos($sent, "这") !== false || strpos($sent, "那") !== false )
                if (strpos($sent, "也算") !== false)
                    $punc = "？";
                else
                    $punc = "！";
            else
                $punc = "！";
        else
        {}
    else if (strpos($sent, "百分百") !== false)
        if ($tone == 2)
            $punc = "？";
        else if ($tone == 0)
            ;
        else
            $punc = "！";
    else if (strpos($sent, "听说你") !== false || strpos($sent, "听说他") !== false || strpos($sent, "听说她") !== false || strpos($sent, "听说这") !== false || strpos($sent, "听说那") !== false)
        if ($tone == 2 || strpos($sent, "啊") !== false || strpos($sent, "吗") !== false || strpos($sent, "吧") !== false)
            $punc = "？";
        else if ($tone == 0)
            ;
        else if ($tone == 1 || strpos($sent, "呢") !== false)
            $punc = "！";
        else
            $punc = "？";
    else if (strpos($sent, "彻底") !== false)
        if ($tone == 2)
            $punc = "？";
        else if ($tone == 0)
            ;
        else
            $punc = "！";
    else if (strpos($sent, "到底") !== false)
        if ($tone == 2)
            $punc = "？";
        else if ($tone == 0)
            ;
        else
            $punc = "！";
    else if (canRegExp($sent, "极了$"))
        $punc = "！";
    else if (strpos($sent, "岂有此理") !== false)
        $punc = "！";
    else if (strpos($sent, "恐怖如此") !== false)
        $punc = "！";
    else if (strpos($sent, "岂") !== false)
        $punc = "？";
    else if (strpos($sent, "真的") !== false)
        $punc = "？";
    else if (strpos($sent, "而且是") !== false)
        $punc = "？";
    else if (strpos($sent, "多久") !== false)
        if (isKnowFormat($sent) == true)
            ;
        else
            $punc = "？";
    else if (strpos($sent, "莫非") !== false)
        if ($sent == "莫非")
            $punc = "……";
        else
            $punc = "？";
    else if (strpos($sent, "其实") !== false)
        if ($sent == "其实")
            ;
        else
        {}
    else if (strpos($sent, "当心") !== false)
        $punc = "！";
    else if (strpos($sent, "当真") !== false)
        $punc = "！";
    else if (strpos($sent, "你敢") !== false)
        if ($sent == "你敢")
            $punc = "！";
        else
            $punc = "？";
    else if (strpos($sent, "你确定") !== false)
        $punc = "？";
    else if (strpos($sent, "你肯定") !== false)
        $punc = "？";
    else if (strpos($sent, "定") !== false && canRegExp($sent, "[必定|一定|肯定|定要|定把|定将|定会|定能|定可|定是|定非]") == true && strpos($sent, "不一定") === false && strpos($sent, "不") === false && strpos($sent, "确定") === false && strpos($sent, "稳定") === false && strpos($sent, "待定") === false && strpos($sent, "定理") === false && strpos($sent, "定义") === false && strpos($sent, "不定") === false && strpos($sent, "没") === false && strpos($sent, "定时") === false && strpos($sent, "定期") === false && strpos($sent, "安定") === false && strpos($sent, "设定") === false && strpos($sent, "定点") === false && strpos($sent, "平定") === false && strpos($sent, "定力") === false)
        if (strpos($sent, "你确定") !== false)
            $punc = "？";
        else if (strpos($sent, "确定") !== false)
            ;
        else
            $punc = "！";
    else if (strpos($sent, "滚") !== false && strpos($sent, "打滚") === false && strpos($sent, "翻滚") === false && strpos($sent, "滚动") === false && strpos($sent, "靠滚") === false)
        $punc = "！";
    else if (strpos($sent, "混账") !== false || strpos($sent, "混蛋") !== false || strpos($sent, "可恶") !== false || strpos($sent, "变态") !== false || strpos($sent, "难以置信") !== false)
        if ($tone == 2)
            $punc = "？";
        else if ($tone == 0)
            ;
        else
            $punc = "！";
    else if (strpos($sent, "相信") !== false)
        if ($sent == "我相信" || $sent == "相信")
            $punc = "，";
        else
            $punc = "！";
    else if (strpos($sent, "不信") !== false)
        $punc = "！";
    else if (strpos($sent, "加油") !== false)
        $punc = "！";
    else if (strpos($sent, "还是") !== false)
        if ($tone == 0)
            ;
        else if (isInQuotes == true)
            if ($tone == 2)
                $punc = "？";
            else
                $punc = "！";
        else if ($sent == "还是")
            $punc = "？";
        else if (msubstr($sent, -1) == "的" || strpos($sent, "果然") !== false)
            ;
        else if (strpos($sent, "居然") !== false || strpos($sent, "竟然") !== false)
            $punc = "！";
        else if (strpos($sent, "还是没有") !== false && strpos($sent, "你还是") === false)
            ;
        else
        {
            if (QString("吗嘛呢").indexOf($left1) !== false)
                $punc = "？";
            else if ($left1 == "吧")
                $punc = "！";
            else if (strpos($sent, "我还是") !== false)
                $punc = "！";
            else if ($left1 == "但还是")
                ;
            else if (QString("吧啊嘛哈").indexOf($left1) !== false)
                $punc = "！";
            else
            {}
        }
    else if (strpos($sent, "不可能") !== false)
        if ($tone == 1)
            $punc = "！";
        else if ($tone == 2)
            $punc = "！";
        else
        {}
    else if (strpos($sent, "不就") !== false)
        if ($tone == 0)
            ;
        else if ($tone == 1)
            $punc = "！";
        else
            $punc = "？";
    else if (strpos($sent, "有点") !== false && QString("啊吗呢吧呀么").indexOf(msubstr($sent, -1)) === false)
        ;
    else if (strpos($sent, "斩") !== false)
        if ($tone == 2)
            $punc = "？";
        else if ($tone == 0)
            ;
        else
            $punc = "！";
    else if (strpos($sent, "简直") !== false)
        $punc = "!";
    else if (canRegExp($sent, "^巴不得") && (canRegExp($sent, "呢$")))
        $punc = "！";
    else if (strpos($sent, "不成") !== false && (
                 canRegExp($sent, "还.{1,5}不成") || strpos($sent, "成不成") !== false))
        $punc = "？";
    else if (strpos($sent, "真") !== false && strpos($sent, "可怕") !== false && !canRegExp($sent, "吗$") && !canRegExp($sent, "么$"))
        $punc = "！";
    else if (strpos($sent, "杀") !== false)
        if ($tone == 2)
            $punc = "？";
        else if ($tone == 0)
            ;
        else if (mstrlen($sent)  >= 2 && msubstr($sent, 1) == "杀")
            ;
        else if (mstrlen($sent)  >= 2 && msubstr($sent, -1) == "杀")
            ;
        else if (strpos($sent, "被") !== false)
            ;
        else if (strpos($sent, "我不") !== false)
            ;
        else if (strpos($sent, "杀了你") !== false)
            $punc = "！";
        else if (strpos($sent, "我杀") !== false)
            ;
        else if (strpos($sent, "杀掉") !== false)
            $punc = "！";
        else
        {}
    else if (strpos($sent, "死") !== false)
        if ($tone == 2)
            $punc = "？";
        else if ($tone == 0)
            ;
        else if (strpos($sent, "濒死") !== false)
            ;
        else if (strpos($sent, "死活") !== false)
            ;
        else if (strpos($sent, "死寂") !== false)
            ;
        else if (strpos($sent, "死不") !== false)
            ;
        else if (strpos($sent, "不死") !== false)
            if (strpos($sent, "啊") !== false)
                $punc = "？";
            else
            {}
        else
            $punc = "！";
    else if (mstrlen($sent)  >= 4 && msubstr($sent, 1) == "快")
        if ($tone == 0)
            ;
        else
            $punc = "！";
    else if ($tone === false && strpos($sent, "貌似") !== false && strpos($sent, "要") !== false)
        ;
    else if ($left1 == "了")
        if ($tone == 1)
            $punc = "！";
        else if ($tone == 2)
            $punc = "？";
        else if ($tone == 3)
            $punc = "~";
        else
        {}
    else if ($left1 == "吗")
        if ($tone == 1)
            $punc = "！";
        else if ($tone == 0)
            ;
        else if ($tone == 3)
            $punc = "~";
        else
            $punc = "？";
    else if ($left1 == "吧")
        if ($tone == 1)
            $punc = "！";
        else if ($tone == 0)
            ;
        else if ($tone == 3)
            $punc = "~";
        else if (strpos($sent, "没") !== false)
            $punc = "？";
        else if ($left1 == "心")
            $punc = "，";
        else if (strpos($sent, "你还") !== false)
            $punc = "？";
        else if (strpos($sent, "似乎") !== false)
            $punc = "？";
        else if (strpos($sent, "会") !== false && strpos($sent, "我") !== false && strpos($sent, "我") < strpos($sent, "会"))
            $punc = "？";
        else if (strpos($sent, "不说") !== false)
            ;
        else if (strpos($sent, "还") !== false)
            ;
        else if (strpos($sent, "酒吧") !== false)
            ;
        else if (strpos($sent, "网吧") !== false)
            ;
        else if (strpos($sent, "咖啡吧") !== false)
            ;
        else if (strpos($sent, "再") !== false)
            $punc = "！";
        else if (strpos($sent, "因为") !== false)
            $punc = "！";
        else if (strpos($sent, "就是") !== false)
            $punc = "！";
        else if (strpos($sent, "是") !== false)
            $punc = "？";
        else if (strpos($sent, "这也") !== false)
            $punc = "？";
        else if ($left2 == "的")
            $punc = "？";
        else if (canRegExp($sent, "就.{1,3}了吧"))
            $punc = "？";
        else
            $punc = "！";
    else if ($left1 == "啊")
        if (strpos($sent, "还是") !== false)
            $punc = "！";
        else if (strpos($sent, "你还") !== false)
            $punc = "？";
        else if ($sent == "不过啊")
            $punc = "，";
        else if ($sent == "但是啊")
            $punc = "，";
        else if ($sent == "你想啊")
            $punc = "，";
        else if ((strpos($sent, "啊") < mstrlen($sent) - 1 && $mb_msubstr($sent, mstrlen($sent)-2, 1, 'utf_8') != "啊") || $tone == 0)
            ;
        else if ($tone == 1)
            $punc = "！";
        else if ($tone == 2)
            $punc = "？";
        else if (isChinese($left2) == true)
            $punc = "！";
        else
            $punc = "！";
    else if ($left1 == "呢")
        if (strpos($sent, "如果") !== false || strpos($sent, "要是") !== false || canRegExp($sent, "^而") || strpos($sent, "哪") !== false)
            $punc = "？";
        else if (strpos($sent, "还是") !== false || strpos($sent, "就是") !== false)
            $punc = "！";
        else if ($sent .indexOf("起来") !== false && $sent .indexOf("起来") <= 2)
            $punc = "！";
        else
            $punc = "？";
    else if ($left1 == "呀")
        if ($sent == "什么呀")
            $punc = "，";
        else if (strpos($sent, "什么") !== false)
            $punc = "？";
        else if ($sent == "哎呀")
            $punc = "，";
        else if (canRegExp($sent, "不.{1,3}呀"))
            $punc = "！";
        else if (strpos($sent, "呀呀") !== false)
            ;
        else if (strpos($sent, "来呀") !== false)
            ;
        else if ($tone == 1)
            $punc = "！";
        else if ($tone == 2)
            $punc = "？";
        else
            $punc = "！";
    else if ($left1 == "哦")
        if (isChinese($left2) == true)
            $punc = "！";
        else
            $punc = "？";
    else if ($left1 == "哈")
        if ($left1 == "哈" || isChinese($left2) == false)
            $punc = "！";
        else
        {}
    else if ($left1 == "哼")
        $punc = "！";
    else if ($left1 == "唉")
        if ($tone == 0)
            ;
        else if ($tone == 2)
            $punc = "？";
        else
            $punc = "！";
    else if ($left1 == "嘛")
        if (strpos($sent, "就") !== false)
            $punc = "！";
        else if (isKnowFormat($sent) == true)
            ;
        else if (strpos($sent, "你") !== false)
            $punc = "！";
        else
            $punc = "！";
    else if ($left1 == "额")
        if (!isChinese($left2))
            $punc = "……";
        else
        {}
    else if ($left1 == "呃")
        $punc = "……";
    else if ($left1 == "啦")
        if ($left2 == "的")
            $punc = "～";
        else
            $punc = "！";
    else if ($left1 == "嘻")
        $punc = "！";
    else if ($left1 == "诶")
        $punc = "！";
    else if ($left1 == "嘭")
        $punc = "！";
    else if ($left1 == "咚")
        $punc = "！";
    else if ($left1 == "咦")
        $punc = "？";
    else if ($left1 == "呜")
        if ($left1 ==  "嗷")
            $punc = "～～";
        else
            $punc = "……";
    else if ($left1 == "开")
        if (isChinese($left2) == false)
            $punc = "！";
        else
        {}
    else if ($left1 == "嗷")
        $punc = "～～";
    else if ($left1 == "呸")
        $punc = "！";
    else if ($left1 == "嘿")
        $punc = "！";
    else if ($left1 == "嗨")
        $punc = "！";
    else if ($left1 == "哩" && $left2 != "哔")
        $punc = "！";
    else if ($left1 == "靠")
        $punc = "！";
    else if ($left1 == "艹")
        $punc = "！";
    else if ($left1 == "要")
        $punc = "！";
    else if ($left1 == "轰")
        $punc = "！";
    else if ($left1 == "隆")
        $punc = "！";
    else if ($left1 == "砰")
        $punc = "！";
    else if ($left1 == "哇")
        $punc = "！";
    else if ($left1 == "当")
        $punc = "！";
    else if ($left1 == "喽")
        if ($left2 == "的")
            $punc = "？";
        else if ($tone == 0)
            $punc = "。";
        else if ($tone == 2)
            $punc = "？";
        else
            $punc = "！";
    else if ($left1 == "呵")
        if (!isChinese($left2) || ($left2=="呵"&&$left3=="呵"))
            $punc = "！";
        else
        {}
    else
    {}

    return $punc;
}

function isKnowFormat($sent)
{
	if (strpos($sent, '怎么知') !== false)
		return false;
	if (strpos($sent, '知道我') !== false)
		return false;

	if (canRegExp($sent, '知道我.*[怎|什|何|吗|吧]'))
		return false;

	$keys = array( '知道', '问了');
	foreach ($keys as $key) {
		if (strpos($sent, $key) !== false)
			return true;
	}
	return false;
}

function isChinese($s)
{
	return preg_match('/^[\x{4e00}-\x{9fa5}]+$/u',$str);
}

function isBlank($s)
{
	return preg_match('/^[ 　\n\t]$/u',$str);
}

function canRegExp($str, $pat)
{
	return preg_match('/' . $pat . '/u', $str);
}

function mstrlen($str)
{
	return mb_strlen($str, 'utf-8');
}

function msubstr($sent, $pos, $len = -1)
{
	if ($len === false) // 右边
	{
		$pos = -$pos;
		return mb_substr($sent, $pos, mstrlen($sent)-$pos, 'utf-8');
		// return mb_substr($sent, $pos, 'utf-8');
	}

	// 左边或者中间
	return mb_substr($sent, $pos, $len, 'utf-8');
}

function mleft($sent, $len)
{
	return msubstr($sent, 0, $len);
}

function mright($sent, $len)
{
	return msubstr($sent, mstrlen($sent)-$len, $len);
}

function mmid($sent, $pos, $len)
{
	return msubstr($sent, $pos, $len);
}

?>
<form method="POST">
	<input type="text" name="sent" autofocus> <input type="submit" name="" value="测试"> <br />
	<?php
        if ($sent)
        {
            if ($wrong)
                echo "已记录错误：【 $sent 】,请等待开发者更新数据";
            else
                echo $sent . getPunc($sent);
        }
    ?>
</form>
<?php
if ($sent && !$wrong)
{
    ?>
    <form method="POST">
        <input type="hidden" name="sent" value="<?php echo $sent; ?>">
        <input type="submit" name="wrong" value="反馈错误">
    </form>
    <?php
}
?>
</BODY>
</HTML>

