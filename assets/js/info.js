      //发表评论
	  
			var wbk
			 function send_pl(){
				 
				 //var box = document.getElementsByClassName('box');
				// var textarea = box.getElementsByTagName('textarea')[0];
				 wbk =document.getElementById("demo_text");
				 var list=document.getElementById("list");
				 // var list = box.getElementsByClassName('comment-list')[0];
				var div = document.createElement('div');
				div.className = 'comment-box clearfix';
				 var ids=getid();
				 div.id=ids;
				  // div.setAttribute('user','self');
				  
				 var xhr = new XMLHttpRequest();
				 
				 
                var html = ' <img src="images/my.jpg"  class="myhead" alt="" />'+
				         '<p class="comment-text">'+getTime()+'</p>'+
                         '<div class="comment-content">'+
                         '<p class="comment-text">'+wbk.value+'</p>'+
                         '<p class="comment-btn">'+
                         '<a href="javascript:dz(\''+ids+'\');" title="点赞"><img src="../assets/images/dz.png" border="0" width="20" id="img_'+ids+'" /></a>&nbsp;'+
						 '<label id="lab_'+ids+'">10</label>&nbsp;&nbsp;'+
						 '<a href="javascript:jb(\''+ids+'\');" style="color:white" title="举报">举报</a>&nbsp;&nbsp;'+
                         '<a href="javascript:del_pl(\''+ids+'\');" style="color:white" title="删除">删除</a>'+
                         '</p>'+
                         '</div>';
                 div.innerHTML = html;
                 list.appendChild(div);
                 wbk.value = '';
                 wbk.onfocus();
                 function getTime(){
                     var t = new Date();
                     var y = t.getFullYear();
                     var m = t.getMonth() + 1;//月份是从0开始
                     var d = t.getDay();
                     var h = t.getHours();
                     var mi = t.getMinutes();
                     m = m>10 ? m: '0' + m;
                     d = d>10 ? d: '0' + d;
                     h = h>10 ? h: '0' + h;
                     mi = mi>10 ?mi: '0' +mi;
                     return y + '-' + m + '-' + d + ' ' + h + ':' + mi;
                 }
				 function getid(){   //某条评论的ID，ID必须唯一
				     var t = new Date();
				     var y = t.getFullYear();
				     var m = t.getMonth() + 1;
				     var d = t.getDay();
				     var h = t.getHours();
				     var mi = t.getMinutes();
					 var se=t.getSeconds();
				     m = m>10 ? m: '0' + m;
				     d = d>10 ? d: '0' + d;
				     h = h>10 ? h: '0' + h;
				     mi = mi>10 ?mi: '0' +mi;
				     se = se>10 ?se: '0' +se;
				     return y +  m + d + h + mi + se;
				 }
				
             }
			 
//点赞和取消点赞
function  dz(opt_id)
{
	var _img=document.getElementById("img_"+opt_id);
	var _lab=document.getElementById("lab_"+opt_id);
	if(_img.src.indexOf("dz.png")=="-1")  
	{
		_img.src="../assets/images/dz.png";
	    _lab.innerText=Number(_lab.innerText)-1;
	}
	else
	 {
		 _img.src="../assets/images/dz2.png";
		 _lab.innerText=Number(_lab.innerText)+1;
	 }
}

//举报
function jb(opt_id)
{

	layer.open({
		type: 2,
		title: ['举报信息', 'background-color:blue;text-align:center;font-size:18px;'],
		shadeClose: true,
		shade: false,
		maxmin: true,
		area: ['500px', '300px'],
		content: 'jbinfo.html'
	});
	
}

//删除评论
function del_pl(opt_id)
{

layer.confirm('确认要删除本条评论吗？删除后将不可恢复！', {
title: false,
btn: ['确定','取消'] //按钮
}, function(ind){
     layer.close(ind);
     var _div=document.getElementById(opt_id);
     _div.parentNode.removeChild(_div);//删除整个div
}, function(inds){
     layer.close(inds);
});
	
	
}

function getParams(key) {
	var reg = new RegExp("(^|&)" + key + "=([^&]*)(&|$)");
	var r = window.location.search.substr(1).match(reg);
	if (r != null) {
		return unescape(r[2]);
	}
	return null;
};
 var sid = getParams("sid");
 var xhr=new XMLHttpRequest();
 xhr.open('post', '../api/deceased/send_message.php');
 xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
 xhr.send("sid="sid"&mcontent"=wbk.value);
 //xhr.send("mcontent"=wbk.value);
 //xhr.send(null);
			 