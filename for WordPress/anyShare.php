<?php

/*
Plugin Name: anyShare
Version:     0.5
Plugin URI:  http://anyLiv.com/blog/1302
Description: Sharing buttons for Chinese SNS.
Author:      anyLiv
Author URI:  http://anyLiv.com/
*/

//wp_enqueue_style('anyShare', WP_PLUGIN_URL.'/'.dirname(plugin_basename(__FILE__)).'/anyShare.css');

// for add to content ...
function anyShare($outer){
	if(!is_singular()){ return $outer; }

	global $post;
	$share = array();
	$pName = rawurlencode($post->post_title);
	$pHref = rawurlencode(get_permalink($post->ID));

	$share['sntwet'] = array('新浪微博', 'http://v.t.sina.com.cn/share/share.php?url='.$pHref);
	$share['qqtwet'] = array('腾讯微博', 'http://v.t.qq.com/share/share.php?appkey=2e295ab2ff8245229d96fa3768a9f779&url='.$pHref.'&title='.$pName);
	$share['qqzone'] = array('腾讯空间', 'http://sns.qzone.qq.com/cgi-bin/qzshare/cgi_qzshare_onekey?url='.$pHref);
	$share['renren'] = array('人人社区', 'http://share.renren.com/share/buttonshare.do?link='.$pHref.'&title='.$pName);
	$share['kaixin'] = array('开心社区', 'http://www.kaixin001.com/repaste/share.php?rurl='.$pHref.'&rtitle='.$pName);
	$share['douban'] = array('豆瓣社区', 'http://www.douban.com/recommend/?url='.$pHref);
	$share['bdcang'] = array('百度搜藏', 'http://cang.baidu.com/do/add?iu='.$pHref.'&it='.$pName);
	$share['folow5'] = array('Follow5', 'http://www.follow5.com/f5/discuz/sharelogin.jsp?url='.$pHref.'&title='.$pName);
	$share['facebk'] = array('facebook', 'http://www.facebook.com/share.php?u='.$pHref);
	$share['twiter'] = array('twitter', 'http://twitter.com/home?status='.$pName.'-'.$pHref);

	$outer .= "\n<!-- Begin anyShare -->\n";
	$outer .= '<link rel="stylesheet" href="'.WP_PLUGIN_URL.'/'.dirname(plugin_basename(__FILE__)).'/anyShare.css?v=5">';
	$outer .= '<table id="anyShare"><tr><td id="AS-TXT"><i>anyShare</i><b>分享到：</b></td><td id="AS-IMG" rowspan="2">';
	$outer .= '<img src="http://chart.apis.google.com/chart?cht=qr&chld=|0&choe=UTF-8&chs=75x75&chl='.$pHref.'">';
	$outer .= '</td></tr><tr><td id="AS-BTN">';
	foreach($share as $key => $btn){
		$outer .= '<a id="'.$key.'" title="'.$btn[0].'" href="'.$btn[1].'" target="_blank">&nbsp;</a>';
	}
	$outer .= '<br clear="all"></td></tr></table>';
	$outer .= "\n<!-- anyShare Endof -->\n";
	return $outer;
}

add_filter('the_content', 'anyShare');

?>