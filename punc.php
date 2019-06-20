<?php
require 'public_module.php';

$sent = seize('sent');

/* 字符替换：
([^\$])(punc|sent|stone)
\1$\2


sent\.left\((\w+)\)
msubstr($sent, \1)

sent\.right\((\w+)\)
msubstr($sent, -\1)

sent\.mid\((\w+)\)
msubstr($sent, -\1)

_(left)
$left

\$sent\.length(\(\))?
mb_strlen($sent, 'utf-8')

shenme_pos    手动改

mid    手动改
msubstr($sent, mb_strlen($sent, 'utf-8')-2, 1)

substr
msubstr

\$sent\.startsWith\((.(+?)"\)
canRegExp($sent, "^\1")

\$sent\.endsWith\("(.+?)"\)
canRegExp($sent, "\1$")
 */

function getPunc($sent)
{
	$left1 = msubstr($sent, -1);
	$left2 = msubstr($sent, -2);
	$left3 = msubstr($sent, -3);
    return getTalkTone($sent, -1, $left1, $left2, $left3);
}

function getDescTone($sent)
{
    $tone = -1;

    if ( strpos(sent, "轻") > -1)
        $tone = 0;
    else if ( strpos(sent, "温") > -1)
        $tone = 0;
    else if ( strpos(sent, "柔") > -1)
        $tone = 0;
    else if ( strpos(sent, "悄") > -1)
        $tone = 0;
    else if ( strpos(sent, "淡") > -1)
        $tone = 0;
    else if ( strpos(sent, "静") > -1)
        $tone = 0;
    else if ( strpos(sent, "小") > -1)
        $tone = 0;
    else if ( strpos(sent, "问") > -1)
        $tone = 2;
    else if ( strpos(sent, "疑") > -1)
        $tone = 2;
    else if ( strpos(sent, "惑") > -1)
        $tone = 2;
    else if ( strpos(sent, "不解") > -1)
        $tone = 2;
    else if ( strpos(sent, "迷") > -1)
        $tone = 2;
    else if ( strpos(sent, "好奇") > -1)
        $tone = 2;
    else if ( strpos(sent, "试") > -1)
        $tone = 2;
    else if ( strpos(sent, "探") > -1)
        $tone = 2;
    else if ( strpos(sent, "询") > -1)
        $tone = 2;
    else if ( strpos(sent, "诧") > -1)
        $tone = 2;
    else if ( strpos(sent, "愤") > -1)
        $tone = 1;
    else if ( strpos(sent, "恼") > -1)
        $tone = 1;
    else if ( strpos(sent, "咬") > -1)
        $tone = 1;
    else if ( strpos(sent, "怒") > -1)
        $tone = 1;
    else if ( strpos(sent, "骂") > -1)
        $tone = 1;
    else if ( strpos(sent, "狠") > -1)
        $tone = 1;
    else if ( strpos(sent, "火") > -1)
        $tone = 1;
    else if ( strpos(sent, "重") > -1)
        $tone = 1;
    else if ( strpos(sent, "抓") > -1)
        $tone = 1;
    else if ( strpos(sent, "狂") > -1)
        $tone = 1;
    else if ( strpos(sent, "叫") > -1)
        $tone = 1;
    else if ( strpos(sent, "喊") > -1)
        $tone = 1;
    else if ( strpos(sent, "力") > -1)
        $tone = 1;
    else if ( strpos(sent, "大") > -1)
        $tone = 1;
    else if ( strpos(sent, "哮") > -1)
        $tone = 1;
    else if ( strpos(sent, "厉") > -1)
        $tone = 1;
    else if ( strpos(sent, "斥") > -1)
        $tone = 1;
    else if ( strpos(sent, "吼") > -1)
        $tone = 1;
    else if ( strpos(sent, "气") > -1)
        $tone = 1;
    else if ( strpos(sent, "震") > -1)
        $tone = 1;
    else if ( strpos(sent, "喜") > -1)
        $tone = 1;
    else if ( strpos(sent, "惊") > -1)
        $tone = 1;
    else if ( strpos(sent, "忙") > -1)
        $tone = 1;
    else if ( strpos(sent, "瞪") > -1)
        $tone = 1;
    else if ( strpos(sent, "嗔") > -1)
        $tone = 1;
    else if ( strpos(sent, "暴") > -1)
        $tone = 1;
    else if ( strpos(sent, "咒") > -1)
        $tone = 1;
    else if ( strpos(sent, "红") > -1)
        $tone = 1;
    else if ( strpos(sent, "痛") > -1)
        $tone = 1;
    else if ( strpos(sent, "恐") > -1)
        $tone = 1;
    else if ( strpos(sent, "憎") > -1)
        $tone = 1;
    else if ( strpos(sent, "眦") > -1)
        $tone = 1;
    else if ( strpos(sent, "悲") > -1)
        $tone = 1;
    else if ( strpos(sent, "狂") > -1)
        $tone = 1;
    else if ( strpos(sent, "重") > -1)
        $tone = 1;
    else if ( strpos(sent, "躁") > -1)
        $tone = 1;
    else if ( strpos(sent, "铁青") > -1)
        $tone = 1;
    else if ( strpos(sent, "狠") > -1)
        $tone = 1;
    else if ( strpos(sent, "恨") > -1)
        $tone = 1;
    else if ( strpos(sent, "齿") > -1)
        $tone = 1;
    else if ( strpos(sent, "急") > -1)
        $tone = 1;
    else if ( strpos(sent, "变") > -1)
        $tone = 1;
    else if ( strpos(sent, "冲") > -1)
        $tone = 1;
    else if ( strpos(sent, "激") > -1)
        $tone = 1;
    else if ( strpos(sent, "恶") > -1)
        $tone = 1;
    else if ( strpos(sent, "绝") > -1)
        $tone = 1;
    else if ( strpos(sent, "瞪") > -1)
        $tone = 1;
    else if ( strpos(sent, "愁") > -1)
        $tone = 1;
    else if ( strpos(sent, "羞") > -1)
        $tone = 1;
    else if ( strpos(sent, "恼") > -1)
        $tone = 1;
    else if ( strpos(sent, "忿") > -1)
        $tone = 1;
    else if ( strpos(sent, "凶") > -1)
        $tone = 1;
    else if ( strpos(sent, "连") > -1)
        $tone = 1;
    else if ( strpos(sent, "热") > -1)
        $tone = 1;
    else if ( strpos(sent, "欢") > -1)
        $tone = 1;
    else if ( strpos(sent, "万") > -1)
        $tone = 1;
    else if ( strpos(sent, "得") > -1)
        $tone = 1;
    else if ( strpos(sent, "叹") > -1)
        $tone = 1;
    else if ( strpos(sent, "兴") > -1)
        $tone = 1;
    else if ( strpos(sent, "不已") > -1)
        $tone = 1;
    else if ( strpos(sent, "舞") > -1)
        $tone = 1;
    else if ( strpos(sent, "天天") > -1)
        $tone = 1;
    else if ( strpos(sent, "高") > -1)
        $tone = 1;
    else if ( strpos(sent, "昂") > -1)
        $tone = 1;
    else if ( strpos(sent, "澎湃") > -1)
        $tone = 1;
    else if ( strpos(sent, "颤") > -1)
        $tone = 1;
    else if ( strpos(sent, "慌") > -1)
        $tone = 1;
    else if ( strpos(sent, "骇") > -1)
        $tone = 1;
    else if ( strpos(sent, "跳") > -1)
        $tone = 1;
    else if ( strpos(sent, "皆") > -1)
        $tone = 1;
    else if ( strpos(sent, "怵") > -1)
        $tone = 1;
    else if ( strpos(sent, "霹雳") > -1)
        $tone = 1;
    else if ( strpos(sent, "急") > -1)
        $tone = 1;
    else if ( strpos(sent, "忙") > -1)
        $tone = 1;
    else
        $tone = -1;

    return $tone;
}

function getTalkTone($sent, $tone,$left1, $left2, $left3)
{
   $punc = "，";

    if (strpos($sent, "是不") > -1)
        if ($tone == 0)
            $punc = "，";
        else if ($tone == 1)
            $punc = "！";
        else if (canRegExp($sent, "是不.的") == true)
            ;
        else if (strpos($sent, "本来是不") > -1)
            ;
        else
            $punc = "？";
    else if (strpos($sent, "是么") > -1)
        $punc = "？";
    else if (strpos($sent, "管不管") > -1)
        $punc = "？";
    else if (strpos($sent, "不管") > -1)
        ;
    else if (strpos($sent, "反正") > -1)
        ;
    else if (strpos($sent, "怎么知") > -1)
        $punc = "？";
    else if (strpos($sent, "么会") > -1)
        $punc = "？";
    else if (strpos($sent, "真") > -1 && strpos($sent, "真理") == -1 && strpos($sent, "真假") == -1 && strpos($sent, "真事") == -1)
        if (strpos($sent, "真的") > -1 || strpos($sent, "真是") > -1)
            if (strpos($sent, "真的是") > -1 || strpos($sent, "真是") > -1)
                if (strpos($sent, "啊") > -1)
                    $punc = "！";
                else if (strpos($sent, "吗") > -1)
                    $punc = "？";
                else if (strpos($sent, "啦") > -1)
                    $punc = "！";
                else if (strpos($sent, "呀") > -1)
                    $punc = "！";
                else if (strpos($sent, "了") > -1)
                    if (strpos($sent, "太") > -1 || strpos($sent, "好"))
                        $punc = "！";
                    else
                        $punc = "？";
                else if ($tone == 1)
                    $punc = "！";
                else if ($tone == 2)
                    $punc = "？";
                else if (strpos($sent, "真是不") > -1)
                    $punc = "！";
                else
                {}
            else if ($sent == "真的")
                if ($tone == 2)
                    $punc = "？";
                else if (strpos($sent, "好吗"))
                    $punc = "？";
                else if (strpos($sent, "太") > -1 || strpos($sent, "好"))
                    $punc = "！";
                else
                {}
            else if (strpos($sent, "真的好") > -1 || strpos($sent, "真的很") > -1 || strpos($sent, "真的非常") > -1 || strpos($sent, "真的太") > -1 || strpos($sent, "真的特") > -1)
                if (strpos($sent, "吗") > -1)
                    $punc = "？";
                else if ($tone == 0)
                    ;
                else if ($tone == 2)
                    $punc = "？";
                else
                    $punc = "！";
            else if (strpos($sent, "怎么") > -1)
                if (canRegExp($sent, "怎么也.*不"))
                    ;
                else
                    $punc = "？";
            else if (strpos($sent, "难道") > -1)
                $punc = "？";
            else if (isKnowFormat($sent) == true)
                ;
            else if (strpos($sent, "真的是我") > -1)
                ;
            else if (strpos($sent, "如何") > -1)
                $punc = "？";
            else if (strpos($sent, "啊") > -1)
                $punc = "！";
            else if (strpos($sent, "吗") > -1)
                $punc = "？";
            else if (strpos($sent, "啦") > -1)
                $punc = "！";
            else if (strpos($sent, "呀") > -1)
                $punc = "！";
            else if ($tone == 1)
                $punc = "！";
            else if ($tone == 2)
                $punc = "？";
            else if (strpos($sent, "就真的不是") > -1)
                ;
            else if (strpos($sent, "不是") > -1)
                $punc = "？";
            else
            {}
        else if (strpos($sent, "你真") > -1)
            if (strpos($sent, "不") > -1 || strpos($sent, "了") > -1)
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
            else
                $punc = "！";
        else if (strpos($sent, "他真") > -1)
            if (strpos($sent, "不") > -1 || strpos($sent, "了") > -1)
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
            else
                $punc = "！";
        else if (strpos($sent, "她真") > -1)
            if (strpos($sent, "不") > -1 || strpos($sent, "了") > -1)
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
            else
                $punc = "！";
        else if (isKnowFormat($sent) == true)
            ;
        else if ($tone == 1)
            $punc = "！";
        else if ($tone == 2)
            $punc = "？";
        else
        {}
    else if (strpos($sent, "是否") > -1)
        if (isKnowFormat($sent) == true)
            ;
        else
            $punc = "？";
    else if (strpos($sent, "是不是") > -1)
        if (isKnowFormat($sent) == true)
            ;
        else if ($tone == 1)
            $punc = "！";
        else if ($tone == 0)
            ;
        else
            $punc = "？";
    else if (strpos($sent, "可能是") > -1 && canRegExp($sent, ".*[特别|真的|格外|非常].*") == true)
        $punc = "！";
    else if (strpos($sent, "知不知") > -1)
        $punc = "？";
    else if (strpos($sent, "需不需") > -1)
        if (isKnowFormat($sent) == true && strpos($sent, "怎么") == -1 && strpos($sent, "为什么") == -1)
            ;
        else
            $punc = "？";
    else if (strpos($sent, "要不要") > -1)
        if (isKnowFormat($sent) == true)
            ;
        else if (strpos($sent, "你") == -1)
            $punc = "？";
        else if (strpos($sent, "犹豫要") > -1 || strpos($sent, "在想") > -1 || strpos($sent, "思考") > -1)
            ;
        else
            $punc = "？";
    else if (strpos($sent, "要不是") > -1)
        ;
    else if (canRegExp($sent, "(.{1,2})不\\1") == true)
        if (isKnowFormat($sent) == true && strpos($sent, "怎么") == -1 && strpos($sent, "为什么") == -1 && strpos($sent, "难道") == -1)
            ;
        else if (strpos($sent, "时不时") > -1)
            ;
        else
            $punc = "？";
    else if (mb_strlen($sent, 'utf-8')  > 2 && msubstr($sent, -1) == "不" && strpos($sent, "不不") == -1)
        $punc = "？";
    else if (strpos($sent, "还不") > -1)
        if (strpos($sent, "给我") > -1)
            $punc = "！";
        else if ($tone == 1)
            $punc = "！";
        else if ($tone == 0)
            ;
        else if (strpos($sent, "吧") > -1)
            $punc = "？";
        else if (strpos($sent, "吗") > -1)
            $punc = "？";
        else if (strpos($sent, "嘛") > -1)
            $punc = "？";
        else if (strpos($sent, "啊") > -1)
            $punc = "！";
        else if (strpos($sent, "不至于") > -1)
            ;
        else if (strpos($sent, "不如") > -1)
            ;
        else
            $punc = "？";
    else if (strpos($sent, "不要") > -1 && strpos($sent, "吗") == -1 && strpos($sent, "吧") == -1 && strpos($sent, "呢") == -1 && strpos($sent, "了") == -1)
        $punc = "！";
    else if (strpos($sent, "不可思议") > -1)
        $punc = "！";
    else if (strpos($sent, "誓不") > -1)
        $punc = "！";
    else if (strpos($sent, "都要") > -1 && strpos($sent, "吗") == -1 && strpos($sent, "吧") == -1 && strpos($sent, "呢") == -1 && strpos($sent, "了") == -1)
        if (strpos($sent, "你都要") > -1 && strpos($sent, "这") > -1 && strpos($sent, "这") > strpos($sent, "你都要"))
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
    else if ($sent == "那就是说" && mb_strlen($sent, 'utf-8')  > 6 && msubstr($sent, -1) == "了")
        if ($tone == 1)
            $punc = "！";
        else if ($tone == 0)
            $punc = "。";
        else
            $punc = "？";
    else if (strpos($sent, "绝对") > -1)
        $punc = "！";
    else if (strpos($sent, "一定") > -1 && strpos($sent, "有一定") == -1 && strpos($sent, "一定的") == -1 && strpos($sent, "不一定") == -1 && strpos($sent, "一定的") == -1)
        $punc = "！";
    else if (strpos($sent, "你居然") > -1)
        $punc = "！";
    else if (strpos($sent, "甚至") > -1)
        $punc = "！";
    else if (strpos($sent, "简直") > -1)
        $punc = "！";
    else if (strpos($sent, "必定") > -1)
        $punc = "！";
    else if (strpos($sent, "要不") > -1)
        if ($sent == "要不")
            $punc = "，";
        else
            $punc = "？";
    else if (strpos($sent, "可不") > -1)
        $punc = "？";
    else if (strpos($sent, "行不") > -1)
        $punc = "？";
    else if (strpos($sent, "不就") > -1)
        $punc = "？";
    else if (strpos($sent, "多少") > -1)
        if (strpos($sent, "没") > -1)
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
    else if (strpos($sent, "多久") > -1)
        if (strpos($sent, "没") > -1 && strpos($sent, "没") < strpos($sent, "多久"))
            ;
        else if (strpos($sent, "没多久") > -1)
            ;
        else if ($tone == 1)
            $punc = "！";
        else if ($tone == 0)
            ;
        else if (isKnowFormat($sent) == true)
            ;
        else
            $punc = "？";
    else if (strpos($sent, "有多") > -1)
        if ($tone == 1)
            $punc = "！";
        else if ($tone == 0)
            $punc = "。";
        else if (isKnowFormat($sent) == true)
            ;
        else
            $punc = "？";
    else if (strpos($sent, "都要") > -1)
        if ($tone == 2)
            $punc = "？";
        else if ($tone == 0)
            ;
        else
            $punc = "！";
    else if (strpos($sent, "么") > -1)
        if (strpos($sent, "什么") > -1)
        {
            $shenme_pos = strpos($sent, "什么");
            if ($tone == 1)
                $punc = "！";
            else if ($tone == 2)
                $punc = "？";
            else if ($tone == 0)
                ;
            else if (strpos($sent, "还") > -1)
                if (isKnowFormat($sent) == true)
                    ;
                else if (strpos($sent, "以为") > -1)
                    ;
                else
                    $punc = "？";
            else if (strpos($sent, "似乎") > -1)
                ;
            else if (strpos($sent, "好像") > -1)
                ;
            else if (strpos($sent, "不了") > -1)
                if ($tone == 1)
                    $punc = "！";
                else
                {}
            else if (strpos($sent, "怎么") == -1 && canRegExp($sent, "什么.*都"))
                ;
            else if (strpos($sent, "都不") > -1)
                ;
            else if (strpos($sent, "都") > -1 && strpos($sent, "来") > -1)
                ;
            else if (strpos($sent, "或许") > -1)
                ;
            else if (strpos($sent, "说不定") > -1)
                ;
            else if (strpos($sent, "可能") > -1)
                ;
            else if (strpos($sent, "仿佛") > -1)
                ;
            else if (strpos($sent, "要发生什么") > -1)
                ;
            else if (strpos($sent, "没") > -1 && strpos($sent, "没") < $shenme_pos)
                ;
            else if (strpos($sent, "肯定") > -1 && strpos($sent, "肯定") < $shenme_pos)
                ;
            else if (strpos($sent, "决定") > -1)
                ;
            else if (strpos($sent, "不出") > -1)
                ;
            else if (strpos($sent, "不是") > -1 && strpos($sent, "不是") < $shenme_pos)
                ;
            else if (strpos($sent, "不到") > -1 && strpos($sent, "不到") < $shenme_pos)
                ;
            else if (strpos($sent, "不了") > -1)
                ;
            else if (strpos($sent, "多么") > -1)
                if (strpos($sent, "啊") > -1)
                    $punc = "！";
                else
                {}
            else if (strpos($sent, "什么都") > -1)
                if (strpos($sent, "怎么") > -1)
                    if (strpos($sent, "不") > -1)
                        ;
                    else
                        $punc = "？";
                else if (strpos($sent, "什么都要") > -1)
                    $punc = "！";
                else
                {}
            else if (strpos($sent, "什么的") > -1)
                ;
            else if (strpos($sent, "的什么东西") > -1)
                ;
            else if (strpos($sent, "说了什么") > -1 && strpos($sent, "的", strpos($sent, "说了什么") + 1) > -1)
                ;
            else if (strpos($sent, "到底") > -1)
                $punc = "！";
            else if (strpos($sent, "情况") > -1)
                $punc = "？";
            else if (isKnowFormat($sent) == true)
                ;
            else
                $punc = "？";
        }
        else if (strpos($sent, "怎么") > -1 && strpos($sent, "不怎么") == -1 && strpos($sent, "怎么也") == -1)
            if (isKnowFormat($sent) == true && strpos($sent, "都知道") == -1)
                if (strpos($sent, "怎么知") > -1)
                    $punc = "？";
                else if (strpos($sent, "怎么懂") > -1)
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
            else if (strpos($sent, "吗") > -1)
                $punc = "？";
            else if (strpos($sent, "啊") > -1)
                $punc = "？";
            else if (strpos($sent, "吧") > -1)
                $punc = "？";
            else if (strpos($sent, "呢") > -1)
                $punc = "？";
            else if (strpos($sent, "嘛") > -1)
                $punc = "？";
            else if (strpos($sent, "看到") > -1)
                ;
            else if (strpos($sent, "其实") > -1)
                ;
            else if (strpos($sent, "发现") > -1)
                ;
            else if (strpos($sent, "怎么就") > -1)
                $punc = "！";
            else
                $punc = "？";
        else if (strpos($sent, "要么") > -1)
            $punc = "，";
        else if (strpos($sent, "不怎") > -1)
            ;
        else if (strpos($sent, "怎样") > -1)
            if (isKnowFormat($sent) == true || strpos($sent, "不怎样") > -1)
                ;
            else
                $punc = "？";
        else if (strpos($sent, "么么") > -1)
            $punc = "~";
        else if (strpos($sent, "么又") > -1)
            if ($tone == 1)
                $punc = "！";
            else if ($tone == 0)
                ;
            else
                $punc = "？";
        else if (strpos($sent, "这么") > -1)
            if ($tone == 1)
                $punc = "！";
            else if ($tone == 2)
                $punc = "？";
            else
            {}
        else if (strpos($sent, "那么") > -1)
            if ($tone == 1)
                $punc = "！";
            else if ($tone == 2)
                $punc = "？";
            else
            {}
        else if (strpos($sent, "多么") > -1)
            if (strpos($sent, "啊") > -1)
                $punc = "！";
            else
            {}
        else if (strpos($sent, "饿了么") > -1)
            ;
        else
            $punc = "？";
    else if (strpos($sent, "难道") > -1)
        if ($sent == "难道")
            $punc = "，";
        else
            $punc = "？";
    else if (strpos($sent, "怎样") > -1 && strpos($sent, "不怎样") == -1)
        if (isKnowFormat($sent) == true && strpos($sent, "我") > -1 && strpos($sent, "怎么") == -1 && strpos($sent, "知") < strpos($sent, "怎样") && strpos($sent, "明") < strpos($sent, "怎样") && strpos($sent, "懂", 0) < strpos($sent, "怎样"))
            ;
        else
            $punc = "？";
    else if (strpos($sent, "何") > -1)
        if (strpos($sent, "如何") > -1)
            if (strpos($sent, "无论") > -1 || strpos($sent, "不管") > -1 || isKnowFormat($sent) == true)
                if ($tone == 1)
                    $punc = "！";
                else
                {}
            else
                $punc = "？";
        else if (strpos($sent, "任何") > -1)
            if ($tone == 2 && isKnowFormat($sent) == false)
                $punc = "？";
            else if ($tone == 1)
                $punc = "！";
            else
            {}
        else if (strpos($sent, "为何") > -1)
            if (isKnowFormat($sent) == true)
                if (strpos($sent, "何不知") > -1)
                    $punc = "？";
                else
                {}
            else
                $punc = "？";
        else if (strpos($sent, "何况") > -1 || strpos($sent, "何人") > -1 || strpos($sent, "何事") > -1 || strpos($sent, "何时") > -1 || strpos($sent, "何且") > -1)
            $punc = "？";
        else if (strpos($sent, "何等") > -1)
            if (strpos($sent, "啊") > -1)
                $punc = "！";
            else
            {}
        else if ($tone == 0)
            ;
        else if ($tone == 1)
            $punc = "！";
        else if (strpos($sent, "几何") > -1)
            ;
        else if (strpos($sent, "何来") > -1)
            $punc = "！";
        else
            $punc = "？";
    else if (strpos($sent, "谁") > -1 && strpos($sent, "谁也") == -1)
        if (strpos($sent, "谁知") > -1 && strpos($sent, "谁知") < strpos($sent, "就"))
            $punc = "！";
        else if ($tone == 1)
            $punc = "！";
        else if (strpos($sent, "谁说") > -1 || strpos($sent, "谁让") > -1)
            $punc = "？";
        else
            $punc = "？";
    else if (canRegExp($sent, "当.+时") == true)
        if (strpos($sent, "难道") > -1)
            $punc = "？";
        else
        {}
    else if (strpos($sent, "啥") > -1)
        if (isKnowFormat($sent) == true)
            $punc = "。";
        else
            $punc = "？";
    else if (strpos($sent, "哪") > -1)
        if ($tone == 0)
            $punc = "。";
        else if ($tone == 1)
            $punc = "！";
        else if (strpos($sent, "天哪") > -1)
            $punc = "！";
        else if (strpos($sent, "哪怕") > -1)
            ;
        else if ($sent == "哪里")
            ;
        else
            $punc = "？";
    else if (strpos($sent, "居然") > -1 && mb_strlen($sent, 'utf-8')  >= 3 && msubstr($sent, -3).indexOf("居然") > -1)
        $punc = "……";
    else if (strpos($sent, "居然") > -1)
        if ($tone == 2)
            $punc = "？";
        else if ($tone == 0)
            if (mb_strlen($sent, 'utf-8') > 5)
                $punc = "。";
            else
            {}
        else if (strpos($sent, "知") > -1 || strpos($sent, "发") > -1 || strpos($sent, "到") > -1)
            ;
        else
            $punc = "！";
    else if ((canRegExp($sent, "^虽然") || canRegExp($sent, "^然而") || canRegExp($sent, "^但") || canRegExp($sent, "^最后") || strpos($sent, "接着") > -1 || strpos($sent, "然后") > -1 || strpos($sent, "之后") > -1 || strpos($sent, "至少") > -1)
             && QString("吗呢吧呀啊").indexOf(msubstr($sent, -1)) == -1)
        ;
    else if (strpos($sent, "也不能") > -1 && strpos($sent, "也不能")<= 2 && QString("吗呢").indexOf(msubstr($sent, -1)) == -1)
        ;
    else if (strpos($sent, "听说") > -1)
        if ($tone == 0 || strpos($sent, "就听说") > -1 || strpos($sent, "一些") || strpos($sent, "还没") || strpos($sent, "不是") > strpos($sent, "听说")
                || $sent == "听说" || strpos($sent, "前") > strpos($sent, "听说") || strpos($sent, "时") > -1 || strpos($sent, "听说过") > -1 || strpos($sent, "却") > -1
                || (strpos($sent, "没听说") > -1 && QString("吧吗啊").indexOf(msubstr($sent, -1)) > -1) || strpos($sent, "都听说") > -1
                || strpos($sent, "她") > strpos($sent, "听说")|| strpos($sent, "他") > strpos($sent, "听说")|| strpos($sent, "它") > strpos($sent, "听说")
                || canRegExp($sent, "听说$") || strpos($sent, "这") > -1)
            ;
        else if ($tone == 1)
            $punc = "！";
        else
            $punc = "？";
    else if (strpos($sent, "貌似") > -1)
        if ($tone == 0)
            ;
        else if ($tone == 1)
            $punc = "！";
        else
            $punc = "？";
    else if (strpos($sent, "有没有") > -1)
        if (strpos($sent, "知道") > -1)
            ;
        else if ($tone == 1)
            $punc = "！";
        else
            $punc = "？";
    else if (strpos($sent, "至少") > -1)
        if ($sent == "至少")
            $punc = "，";
        else if ($tone == 0)
            ;
        else if ($tone == 2)
            $punc = "？";
        else
            $punc = "！";
    else if (strpos($sent, "想必") > -1)
        if ($tone == 0)
            ;
        else
            $punc = "？";
    else if (strpos($sent, "站住") > -1)
        $punc = "！";
    else if (strpos($sent, "然又") > -1 || strpos($sent, "又来") > -1)
        if ($tone == 2 || strpos($sent, "吗") > -1)
            $punc = "？";
        else
            $punc = "！";
    else if (strpos($sent, "了没") > -1 && isKnowFormat($sent) == false)
        $punc = "？";
    else if (strpos($sent, "了什") > -1 && isKnowFormat($sent) == false )
        $punc = "？";
    else if (strpos($sent, "不知") > -1)
        if (isKnowFormat($sent) == true && msubstr($sent, -2) == "知道")
            $punc = "，";
        else if ($tone == 0)
            ;
        else if ($tone == 1)
            $punc = "！";
        else if (strpos($sent, "知过") > -1)
            ;
        else if (mb_strlen($sent, 'utf-8')  > 7 && msubstr($sent, 3) == "不知道" && msubstr($sent, -1) == "的")
            $punc = "？";
        else if (strpos($sent, "然不知") > -1)
            $punc = "，";
        else if (strpos($sent, "知所") > -1)
            $punc = "，";
        else if (strpos($sent, "知不") > -1)
            $punc = "，";
        else if (strpos($sent, "知者") > -1)
            $punc = "，";
        else if (strpos($sent, "知火") > -1)
            $punc = "，";
        else if (strpos($sent, "知之") > -1)
            $punc = "，";
        else if (strpos($sent, "知的") > -1)
            $punc = "，";
        else if (strpos($sent, "还不") > -1 && strpos($sent, "呢") > -1)
            $punc = "！";
        else
            $punc = "？";
    else if (strpos($sent, "干嘛") > -1)
        if ( strpos($sent, "你") == -1 && isKnowFormat($sent) == true)
            $punc = "，";
        else
            $punc = "？";
    else if (strpos($sent, "也算") > -1 || strpos($sent, "算是") > -1)
        if ($tone == 2)
            $punc = "？";
        else if ($tone == 1)
            $punc = "！";
        else if (strpos($sent, "吗") > -1)
            $punc = "？";
        else if (strpos($sent, "呢") > -1)
            $punc = "！";
        else if (strpos($sent, "嘛") > -1)
            $punc = "！";
        else if (strpos($sent, "吧") > -1)
            if (strpos($sent, "这") > -1 || strpos($sent, "那") > -1 )
                if (strpos($sent, "也算") > -1)
                    $punc = "？";
                else
                    $punc = "！";
            else
                $punc = "！";
        else
        {}
    else if (strpos($sent, "百分百") > -1)
        if ($tone == 2)
            $punc = "？";
        else if ($tone == 0)
            ;
        else
            $punc = "！";
    else if (strpos($sent, "听说你") > -1 || strpos($sent, "听说他") > -1 || strpos($sent, "听说她") > -1 || strpos($sent, "听说这") > -1 || strpos($sent, "听说那") > -1)
        if ($tone == 2 || strpos($sent, "啊") > -1 || strpos($sent, "吗") > -1 || strpos($sent, "吧") > -1)
            $punc = "？";
        else if ($tone == 0)
            ;
        else if ($tone == 1 || strpos($sent, "呢") > -1)
            $punc = "！";
        else
            $punc = "？";
    else if (strpos($sent, "彻底") > -1)
        if ($tone == 2)
            $punc = "？";
        else if ($tone == 0)
            ;
        else
            $punc = "！";
    else if (strpos($sent, "到底") > -1)
        if ($tone == 2)
            $punc = "？";
        else if ($tone == 0)
            ;
        else
            $punc = "！";
    else if (canRegExp($sent, "极了$"))
        $punc = "！";
    else if (strpos($sent, "岂有此理") > -1)
        $punc = "！";
    else if (strpos($sent, "恐怖如此") > -1)
        $punc = "！";
    else if (strpos($sent, "岂") > -1)
        $punc = "？";
    else if (strpos($sent, "真的") > -1)
        $punc = "？";
    else if (strpos($sent, "而且是") > -1)
        $punc = "？";
    else if (strpos($sent, "多久") > -1)
        if (isKnowFormat($sent) == true)
            ;
        else
            $punc = "？";
    else if (strpos($sent, "莫非") > -1)
        if ($sent == "莫非")
            $punc = "……";
        else
            $punc = "？";
    else if (strpos($sent, "其实") > -1)
        if ($sent == "其实")
            ;
        else
        {}
    else if (strpos($sent, "当心") > -1)
        $punc = "！";
    else if (strpos($sent, "当真") > -1)
        $punc = "！";
    else if (strpos($sent, "你敢") > -1)
        if ($sent == "你敢")
            $punc = "！";
        else
            $punc = "？";
    else if (strpos($sent, "你确定") > -1)
        $punc = "？";
    else if (strpos($sent, "你肯定") > -1)
        $punc = "？";
    else if (strpos($sent, "定") > -1 && canRegExp($sent, "[必定|一定|肯定|定要|定把|定将|定会|定能|定可|定是|定非]") == true && strpos($sent, "不一定") == -1 && strpos($sent, "不") == -1 && strpos($sent, "确定") == -1 && strpos($sent, "稳定") == -1 && strpos($sent, "待定") == -1 && strpos($sent, "定理") == -1 && strpos($sent, "定义") == -1 && strpos($sent, "不定") == -1 && strpos($sent, "没") == -1 && strpos($sent, "定时") == -1 && strpos($sent, "定期") == -1 && strpos($sent, "安定") == -1 && strpos($sent, "设定") == -1 && strpos($sent, "定点") == -1 && strpos($sent, "平定") == -1 && strpos($sent, "定力") == -1)
        if (strpos($sent, "你确定") > -1)
            $punc = "？";
        else if (strpos($sent, "确定") > -1)
            ;
        else
            $punc = "！";
    else if (strpos($sent, "滚") > -1 && strpos($sent, "打滚") == -1 && strpos($sent, "翻滚") == -1 && strpos($sent, "滚动") == -1 && strpos($sent, "靠滚") == -1)
        $punc = "！";
    else if (strpos($sent, "混账") > -1 || strpos($sent, "混蛋") > -1 || strpos($sent, "可恶") > -1 || strpos($sent, "变态") > -1 || strpos($sent, "难以置信") > -1)
        if ($tone == 2)
            $punc = "？";
        else if ($tone == 0)
            ;
        else
            $punc = "！";
    else if (strpos($sent, "相信") > -1)
        if ($sent == "我相信" || $sent == "相信")
            $punc = "，";
        else
            $punc = "！";
    else if (strpos($sent, "不信") > -1)
        $punc = "！";
    else if (strpos($sent, "加油") > -1)
        $punc = "！";
    else if (strpos($sent, "还是") > -1)
        if ($tone == 0)
            ;
        else if (isInQuotes == true)
            if ($tone == 2)
                $punc = "？";
            else
                $punc = "！";
        else if ($sent == "还是")
            $punc = "？";
        else if (msubstr($sent, -1) == "的" || strpos($sent, "果然") > -1)
            ;
        else if (strpos($sent, "居然") > -1 || strpos($sent, "竟然") > -1)
            $punc = "！";
        else if (strpos($sent, "还是没有") > -1 && strpos($sent, "你还是") == -1)
            ;
        else
        {
            if (QString("吗嘛呢").indexOf($left1) > -1)
                $punc = "？";
            else if ($left1 == "吧")
                $punc = "！";
            else if (strpos($sent, "我还是") > -1)
                $punc = "！";
            else if ($left1 == "但还是")
                ;
            else if (QString("吧啊嘛哈").indexOf($left1) > -1)
                $punc = "！";
            else
            {}
        }
    else if (strpos($sent, "不可能") > -1)
        if ($tone == 1)
            $punc = "！";
        else if ($tone == 2)
            $punc = "！";
        else
        {}
    else if (strpos($sent, "不就") > -1)
        if ($tone == 0)
            ;
        else if ($tone == 1)
            $punc = "！";
        else
            $punc = "？";
    else if (strpos($sent, "有点") > -1 && QString("啊吗呢吧呀么").indexOf(msubstr($sent, -1)) == -1)
        ;
    else if (strpos($sent, "斩") > -1)
        if ($tone == 2)
            $punc = "？";
        else if ($tone == 0)
            ;
        else
            $punc = "！";
    else if (strpos($sent, "简直") > -1)
        $punc = "!";
    else if (canRegExp($sent, "^巴不得") && (canRegExp($sent, "呢$")))
        $punc = "！";
    else if (strpos($sent, "不成") > -1 && (
                 canRegExp($sent, "还.{1,5}不成") || strpos($sent, "成不成") > -1))
        $punc = "？";
    else if (strpos($sent, "真") > -1 && strpos($sent, "可怕") > -1 && !canRegExp($sent, "吗$") && !canRegExp($sent, "么$"))
        $punc = "！";
    else if (strpos($sent, "杀") > -1)
        if ($tone == 2)
            $punc = "？";
        else if ($tone == 0)
            ;
        else if (mb_strlen($sent, 'utf-8')  >= 2 && msubstr($sent, 1) == "杀")
            ;
        else if (mb_strlen($sent, 'utf-8')  >= 2 && msubstr($sent, -1) == "杀")
            ;
        else if (strpos($sent, "被") > -1)
            ;
        else if (strpos($sent, "我不") > -1)
            ;
        else if (strpos($sent, "杀了你") > -1)
            $punc = "！";
        else if (strpos($sent, "我杀") > -1)
            ;
        else if (strpos($sent, "杀掉") > -1)
            $punc = "！";
        else
        {}
    else if (strpos($sent, "死") > -1)
        if ($tone == 2)
            $punc = "？";
        else if ($tone == 0)
            ;
        else if (strpos($sent, "濒死") > -1)
            ;
        else if (strpos($sent, "死活") > -1)
            ;
        else if (strpos($sent, "死寂") > -1)
            ;
        else if (strpos($sent, "死不") > -1)
            ;
        else if (strpos($sent, "不死") > -1)
            if (strpos($sent, "啊") > -1)
                $punc = "？";
            else
            {}
        else
            $punc = "！";
    else if (mb_strlen($sent, 'utf-8')  >= 4 && msubstr($sent, 1) == "快")
        if ($tone == 0)
            ;
        else
            $punc = "！";
    else if ($tone == -1 && strpos($sent, "貌似") > -1 && strpos($sent, "要") > -1)
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
        else if (strpos($sent, "没") > -1)
            $punc = "？";
        else if ($left1 == "心")
            $punc = "，";
        else if (strpos($sent, "你还") > -1)
            $punc = "？";
        else if (strpos($sent, "似乎") > -1)
            $punc = "？";
        else if (strpos($sent, "会") > -1 && strpos($sent, "我") > -1 && strpos($sent, "我") < strpos($sent, "会"))
            $punc = "？";
        else if (strpos($sent, "不说") > -1)
            ;
        else if (strpos($sent, "还") > -1)
            ;
        else if (strpos($sent, "酒吧") > -1)
            ;
        else if (strpos($sent, "网吧") > -1)
            ;
        else if (strpos($sent, "咖啡吧") > -1)
            ;
        else if (strpos($sent, "再") > -1)
            $punc = "！";
        else if (strpos($sent, "因为") > -1)
            $punc = "！";
        else if (strpos($sent, "就是") > -1)
            $punc = "！";
        else if (strpos($sent, "是") > -1)
            $punc = "？";
        else if (strpos($sent, "这也") > -1)
            $punc = "？";
        else if ($left2 == "的")
            $punc = "？";
        else if (canRegExp($sent, "就.{1,3}了吧"))
            $punc = "？";
        else
            $punc = "！";
    else if ($left1 == "啊")
        if (strpos($sent, "还是") > -1)
            $punc = "！";
        else if (strpos($sent, "你还") > -1)
            $punc = "？";
        else if ($sent == "不过啊")
            $punc = "，";
        else if ($sent == "但是啊")
            $punc = "，";
        else if ($sent == "你想啊")
            $punc = "，";
        else if ((strpos($sent, "啊") < mb_strlen($sent, 'utf-8') - 1 && $mb_msubstr($sent, mb_strlen($sent, 'utf-8')-2, 1, 'utf_8') != "啊") || $tone == 0)
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
        if (strpos($sent, "如果") > -1 || strpos($sent, "要是") > -1 || canRegExp($sent, "^而") || strpos($sent, "哪") > -1)
            $punc = "？";
        else if (strpos($sent, "还是") > -1 || strpos($sent, "就是") > -1)
            $punc = "！";
        else if ($sent .indexOf("起来") > -1 && $sent .indexOf("起来") <= 2)
            $punc = "！";
        else
            $punc = "？";
    else if ($left1 == "呀")
        if ($sent == "什么呀")
            $punc = "，";
        else if (strpos($sent, "什么") > -1)
            $punc = "？";
        else if ($sent == "哎呀")
            $punc = "，";
        else if (canRegExp($sent, "不.{1,3}呀"))
            $punc = "！";
        else if (strpos($sent, "呀呀") > -1)
            ;
        else if (strpos($sent, "来呀") > -1)
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
        if (strpos($sent, "就") > -1)
            $punc = "！";
        else if (isKnowFormat($sent) == true)
            ;
        else if (strpos($sent, "你") > -1)
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
	if (strpos($sent, '怎么知') > -1)
		return false;
	if (strpos($sent, '知道我') > -1)
		return false;

	if (canRegExp($sent, '知道我.*[怎|什|何|吗|吧]'))
		return false;

	$keys = array( '知道', '问了');
	foreach ($keys as $key) {
		if (strpos($sent, $key) > -1)
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
	if ($len == -1) // 右边
	{
		$pos = -$pos;
		return mb_substr($sent, $pos, mstrlen($sent)-$pos, 'utf-8');
		// return mb_substr($sent, $pos, 'utf-8');
	}

	// 左边或者中间
	return mb_substr($sent, $pos, $len, 'utf-8');
}

?>
<HTML>
<TITLE>智能标点AI - 码字风云/写作天下</TITLE>
<BODY>
	<form>
		<input type="text" name="sent" autofocus> <br />
		<?php if ($sent) echo $sent . getPunc($sent); ?>
	</form>
</BODY>
</HTML>

