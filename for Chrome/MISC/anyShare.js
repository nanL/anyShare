// anyShare.js for Chrome by nan.im 2013-0403.

var HTM = '<b><i>anyShare</i>分享到：</b>';
var URL = encodeURIComponent('http://nan.im/blog/1302');
var TXT = encodeURIComponent('anyShare - Easy SNS share tool');
var API = {
	'L766QQ空间':'http://sns.qzone.qq.com/cgi-bin/qzshare/cgi_qzshare_onekey?url={URL}&title={TXT}&desc=&summary=&site=&pics=',
	'L398新浪微博':'http://service.weibo.com/share/share.php?url={URL}&title={TXT}&appkey=3581453612&pic=&sudaref={URL}',
	'L161腾讯微博':'http://share.v.t.qq.com/index.php?c=share&a=index&url={URL}&title={TXT}&appkey=2e295ab2ff8245229d96fa3768a9f779',
	'L301人人网':'http://widget.renren.com/dialog/share?resourceUrl={URL}&srcUrl=&title={TXT}&description=',
	'L280百度贴吧':'http://tieba.baidu.com/f/commit/share/openShareApi?url={URL}&title={TXT}&desc=&comment=',
	'L315开心网':'http://www.kaixin001.com/rest/records.php?url={URL}&style=11&content={TXT}&stime=&sig=',
	'L472百度空间':'http://hi.baidu.com/pub/show/share?url={URL}&title={TXT}&content=&linkid=',
	'L937豆瓣':'http://shuo.douban.com/!service/share?href={URL}&name={TXT}&image=',
	'L115搜狐微博':'http://t.sohu.com/third/post.jsp?url={URL}&title={TXT}&pic=',
	'L944FaceBook':'https://www.facebook.com/sharer/sharer.php?u={URL}&t=',
	'L050Twitter':'https://twitter.com/intent/tweet?source=webclient&text={TXT}%20{URL}',
	'L918GooglePlus':'https://plus.google.com/share?url={URL}',
};

for(var SNS in API){
	HTM += '<a target="_blank" id="' + SNS.substr(0,4) + '" href="' + API[SNS] + '">' + SNS.substr(4) + '</a>';
}

try{chrome.tabs.getSelected(null, function(PAG){
	//console.log(PAG);
	URL = encodeURIComponent(PAG.url);
	TXT = encodeURIComponent(PAG.title);
	HTM = HTM.replace(/{URL}/g, URL).replace(/{TXT}/g, TXT);
	//console.log(HTM);
	document.getElementById('anyShare').innerHTML = HTM;
})}catch(ERR){ }
