/* SIGNAL code version: 1.0 */

function s_codeSetting(){
	s.campaign=s.getQueryParam('cid');
	pcd=(s.pathConcatDelim=="")?"":s.pathConcatDelim;
	if (typeof(gs_pageType)!='undefined'&& gs_pageType!=""){
		s.pageType=gs_pageType;
	}else{
		if(typeof(s.pageName)!='undefined' && s.pageName!=""){
//			s.hier1=s.pageName;
            s.pageName=(gs_siteIDAlign=="right")?s.pageName+'['+gs_siteID+']':gs_siteID+s.pageName;
            s.hier1=gs_siteID+s.pageNamet;
		}else{
			s.pageName=s.getPageName();
			s.pageName=(gs_siteIDAlign=="right")?s.pageName+'['+gs_siteID+']':gs_siteID+s.pageName;
			s.pageName=(s.defaultPage=="")?s.pageName.replace(pcd+pcd,pcd+gs_hierDefault+pcd):s.pageName;
			s.hier1=(s.pageName.lastIndexOf(pcd)==(s.pageName.length-1))?gs_siteID+s.pageName+gs_hierDefault:gs_siteID+s.pageName;
		}
	}
	s.server=(typeof(s.server)!='undefined'&& s.server!="")?s.server:document.domain;
	s.channel=(typeof(s.channel)!='undefined'&& s.channel!="")?s.channel:document.domain+pcd+s.getFolderName(1,1);
	s.channel=s.channel.replace(/(.+)\/$/,"$1")+pcd;
	if(s.channel!="member"){s.eVar9=s.channel;}
	s.prop1=document.URL;
	s.prop2=(typeof(gs_title)!='undefined'&& gs_title!="")?gs_title:document.title;
	
	s.channelManager('cid','','0','0','s_cm','1');
	//s.eVar11=decodeURIComponent(escape(s._keywords));
	if(s._channel=="Direct Load"){s.eVar8=s._channel;
	}else{
		if(s._campaignID){
			if(s._channel=="Paid Search")s.eVar8="Paid "+s._partner;
			else s.eVar8=s._campaignID;
		}else{
			if(s._channel=="Natural Search")s.eVar8="Natural "+s._partner;
			else s.eVar8=s._referringDomain;
		}
	}
	s.eVar1 = s.crossVisitParticipation(s.eVar8,'s_ccvp','180','2','>','','1');
	s.eVar7=s.prop8="D=vid";
	s.eVar25=s.eVar26="D=v9";

	/* SBT add 20111212 */
	if(s.campaign.length==22){
		s.eVar16=s.prop16=s.campaign.substring(0,2);
		s.eVar17=s.prop17=s.campaign.substring(2,4);
		s.eVar18=s.prop18=s.campaign.substring(4,5);
		s.eVar19=s.prop19=s.campaign.substring(5,7);
		s.eVar20=s.prop20=s.campaign.substring(7,8);
		s.eVar21=s.prop21=s.campaign.substring(8,10);
		s.eVar22=s.prop22=s.campaign.substring(10,11);
		s.eVar23=s.prop23=s.campaign.substring(11,17);
		s.eVar24=s.prop24=s.campaign.substring(17,22);
	}
	/* SBT add 20111212 */
}



/******* Plug-in Setting *******/
/* SIGNAL Setting */
gs_siteIDAlign="right";
gs_siteID=document.domain;
gs_hierDefault="defaultPage"

/* getPageName Setting*/
s.defaultPage="index.html";
s.pathExcludeList="";
s.queryVarsList="age,cate,prod,notice_id,id";
s.pathConcatDelim="/";

/* ChannelManager Setting*/
s._extraSearchEngines="";
s._channelDomain="";
s._channelParameter="";
s._channelPattern="";

/******* SiteCatalyst Plug-in code *******/
/* Plugin: getPageName v2.2s */
s.getPageName=new Function(""
+"var s=this,"
+"cs=(s.pathConcatDelim)?s.pathConcatDelim:'/',l=location,"
+"q=l.search.substring(1),p=l.pathname.substring(1),p=p.split('/');"
+"pn='';var i=0,j=0;for(j=0;j<p.length;j++){if(p[j].length>0){pn+=cs;"
+"if(s.pathExcludeList){if((',' + s.pathExcludeList + ',').indexOf(',' + p[j] + ',')<0) pn+=p[j];"
+"}else{pn+=p[j];}}else{pn+=cs;if(s.defaultPage.length>0){pn+=s.defaultPage}}}"
+"if(q.length>0){if(s.queryVarsList){var qpa=new Array(),qv=s.split(s.queryVarsList,','),qp=s.split(q,'&'),tmp,idx;"
+"for(i=0;i<qp.length;i++){tmp=s.split(qp[i],'=');qpa[i]=tmp[0]}for(i=0;i<qv.length;i++){"
+"idx=s.ia(qpa,qv[i]);if(idx>=0){pn+=cs;pn+=qp[idx];}}}}if(pn.length==0) pn=cs;return pn;");

/* Plugin: getFolderName v1.0s */
s.getFolderName=new Function("n","a",""
+"var p=s.wd.location.pathname,pa=p.split('/');"
+"if(a=='1' && pa[pa.length-1].indexOf('.')>-1) pa[pa.length-1]='';if(pa[0]==''){"
+" for(var i=0;i<pa.length;i++){pa[i]=i!=pa.length?pa[i+1]:null;}}"
+"return pa[parseInt(n)-1]?pa[parseInt(n)-1]:'';");

/********************************************************************
 *
 * Main Plug-in code (should be in Plug-ins section)
 *
 *******************************************************************/
 
/* ChannelManager 2.4 */
s.channelManager=new Function("a","b","c","d","e","f",""
+"var s=this,A,B,g,l,m,M,p,q,P,h,k,u,S,i,O,T,j,r,t,D,E,F,G,H,N,U,v=0,"
+"X,Y,W,n=new Date;n.setTime(n.getTime()+1800000);if(e){v=1;if(s.c_r("
+"e)){v=0}if(!s.c_w(e,1,n)){s.c_w(e,1,0)}if(!s.c_r(e)){v=0}}g=s.refer"
+"rer?s.referrer:document.referrer;g=g.toLowerCase();if(!g){h=1}i=g.i"
+"ndexOf('?')>-1?g.indexOf('?'):g.length;j=g.substring(0,i);k=s.linkI"
+"nternalFilters.toLowerCase();k=s.split(k,',');l=k.length;for(m=0;m<"
+"l;m++){B=j.indexOf(k[m])==-1?'':g;if(B)O=B}if(!O&&!h){p=g;U=g.index"
+"Of('//');q=U>-1?U+2:0;Y=g.indexOf('/',q);r=Y>-1?Y:i;t=g.substring(q"
+",r);t=t.toLowerCase();u=t;P='Referrers';S=s.seList+'>'+s._extraSear"
+"chEngines;if(d==1){j=s.repl(j,'oogle','%');j=s.repl(j,'ahoo','^');g"
+"=s.repl(g,'as_q','*')}A=s.split(S,'>');T=A.length;for(i=0;i<T;i++){"
+"D=A[i];D=s.split(D,'|');E=s.split(D[0],',');F=E.length;for(G=0;G<F;"
+"G++){H=j.indexOf(E[G]);if(H>-1){i=s.split(D[1],',');U=i.length;for("
+"k=0;k<U;k++){l=s.getQueryParam(i[k],'',g);if(l){l=l.toLowerCase();M"
+"=l;if(D[2]){u=D[2];N=D[2]}else{N=t}if(d==1){N=s.repl(N,'#',' - ');g"
+"=s.repl(g,'*','as_q');N=s.repl(N,'^','ahoo');N=s.repl(N,'%','oogle'"
+");}}}}}}}if(!O||f!='1'){O=s.getQueryParam(a,b);if(O){u=O;if(M){P='P"
+"aid Search'}else{P='Paid Non-Search';}}if(!O&&M){u=N;P='Natural Sea"
+"rch'}}if(h==1&&!O&&v==1){u=P=t=p='Direct Load'}X=M+u+t;c=c?c:'c_m';"
+"if(c!='0'){X=s.getValOnce(X,c,0);}g=s._channelDomain;if(g&&X){k=s.s"
+"plit(g,'>');l=k.length;for(m=0;m<l;m++){q=s.split(k[m],'|');r=s.spl"
+"it(q[1],',');S=r.length;for(T=0;T<S;T++){Y=r[T];Y=Y.toLowerCase();i"
+"=j.indexOf(Y);if(i>-1)P=q[0]}}}g=s._channelParameter;if(g&&X){k=s.s"
+"plit(g,'>');l=k.length;for(m=0;m<l;m++){q=s.split(k[m],'|');r=s.spl"
+"it(q[1],',');S=r.length;for(T=0;T<S;T++){U=s.getQueryParam(r[T]);if"
+"(U)P=q[0]}}}g=s._channelPattern;if(g&&X){k=s.split(g,'>');l=k.lengt"
+"h;for(m=0;m<l;m++){q=s.split(k[m],'|');r=s.split(q[1],',');S=r.leng"
+"th;for(T=0;T<S;T++){Y=r[T];Y=Y.toLowerCase();i=O.toLowerCase();H=i."
+"indexOf(Y);if(H==0)P=q[0]}}}if(X)M=M?M:'n/a';p=X&&p?p:'';t=X&&t?t:'"
+"';N=X&&N?N:'';O=X&&O?O:'';u=X&&u?u:'';M=X&&M?M:'';P=X&&P?P:'';s._re"
+"ferrer=p;s._referringDomain=t;s._partner=N;s._campaignID=O;s._campa"
+"ign=u;s._keywords=M;s._channel=P");
/* Grouped SearchEngine List */
s.seList="bing.com|q|Microsoft Bing>google.,goo"
+ "glesyndication.com|q,as_q|Google>yahoo.com,yahoo.co."
+ "jp|p,va|Yahoo!>";
/* Utility Function: split v1.5 - split a string (JS 1.0 compatible) */
s.split=new Function("l","d",""
+"var i,x=0,a=new Array;while(l){i=l.indexOf(d);i=i>-1?i:l.length;a[x"
+"++]=l.substring(0,i);l=l.substring(i+d.length);}return a");
/* Plugin Utility: Replace v1.0 */
s.repl=new Function("x","o","n",""
+"var i=x.indexOf(o),l=n.length;while(x&&i>=0){x=x.substring(0,i)+n+x."
+"substring(i+o.length);i=x.indexOf(o,i+l)}return x");

/*
 * Plugin: getValOnce_v1.0
 */
s.getValOnce=new Function("v","c","e",""
+"var s=this,a=new Date,v=v?v:v='',c=c?c:c='s_gvo',e=e?e:0,k=s.c_r(c"
+");if(v){a.setTime(a.getTime()+e*86400000);s.c_w(c,v,e?a:0);}return"
+" v==k?'':v");

/*
 *	Plug-in: crossVisitParticipation v1.7 - stacks values from
 *	specified variable in cookie and returns value
 */
s.crossVisitParticipation=new Function("v","cn","ex","ct","dl","ev","dv",""
+"var s=this,ce;if(typeof(dv)==='undefined')dv=0;if(s.events&&ev){var"
+" ay=s.split(ev,',');var ea=s.split(s.events,',');for(var u=0;u<ay.l"
+"ength;u++){for(var x=0;x<ea.length;x++){if(ay[u]==ea[x]){ce=1;}}}}i"
+"f(!v||v==''){if(ce){s.c_w(cn,'');return'';}else return'';}v=escape("
+"v);var arry=new Array(),a=new Array(),c=s.c_r(cn),g=0,h=new Array()"
+";if(c&&c!=''){arry=s.split(c,'],[');for(q=0;q<arry.length;q++){z=ar"
+"ry[q];z=s.repl(z,'[','');z=s.repl(z,']','');z=s.repl(z,\"'\",'');arry"
+"[q]=s.split(z,',')}}var e=new Date();e.setFullYear(e.getFullYear()+"
+"5);if(dv==0&&arry.length>0&&arry[arry.length-1][0]==v)arry[arry.len"
+"gth-1]=[v,new Date().getTime()];else arry[arry.length]=[v,new Date("
+").getTime()];var start=arry.length-ct<0?0:arry.length-ct;var td=new"
+" Date();for(var x=start;x<arry.length;x++){var diff=Math.round((td."
+"getTime()-arry[x][1])/86400000);if(diff<ex){h[g]=unescape(arry[x][0"
+"]);a[g]=[arry[x][0],arry[x][1]];g++;}}var data=s.join(a,{delim:',',"
+"front:'[',back:']',wrap:\"'\"});s.c_w(cn,data,e);var r=s.join(h,{deli"
+"m:dl});if(ce)s.c_w(cn,'');return r;");

/* s.join: 1.0 - s.join(v,p) */
s.join = new Function("v","p",""
+"var s = this;var f,b,d,w;if(p){f=p.front?p.front:'';b=p.back?p.back"
+":'';d=p.delim?p.delim:'';w=p.wrap?p.wrap:'';}var str='';for(var x=0"
+";x<v.length;x++){if(typeof(v[x])=='object' )str+=s.join( v[x],p);el"
+"se str+=w+v[x]+w;if(x<v.length-1)str+=d;}return f+str+b;");

/******* shared function *******/
/* Utility Function: p_c */
s.p_c=new Function("v","c",""
+"var x=v.indexOf('=');return c.toLowerCase()==v.substring(0,x<0?v.le"
+"ngth:x).toLowerCase()?v:0");

/* Utility Function: ia */
s.ia=new Function("ar","v",""
+"for(var i=0;i<ar.length;i++){if(ar[i]==v)return i}return -1");

/*
 * Utility Function: split v1.5 - split a string (JS 1.0 compatible)
 */
s.split=new Function("l","d",""
+"var i,x=0,a=new Array;while(l){i=l.indexOf(d);i=i>-1?i:l.length;a[x"
+"++]=l.substring(0,i);l=l.substring(i+d.length);}return a");

/*
 * Plugin Utility: Replace v1.0
 */
s.repl=new Function("x","o","n",""
+"var i=x.indexOf(o),l=n.length;while(x&&i>=0){x=x.substring(0,i)+n+x."
+"substring(i+o.length);i=x.indexOf(o,i+l)}return x");



/************* DO NOT ALTER ANYTHING BELOW THIS LINE ! **************/
//s_codeSetting();
//var s_code=s.t();if(s_code)document.write(s_code);



