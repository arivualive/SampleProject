	var Ng_MailAddress = new Array(30);

	
		Ng_MailAddress[0] = "@jp-t.ne.jp";
	
		Ng_MailAddress[1] = "@jp-d.ne.jp";
	
		Ng_MailAddress[2] = "@jp-h.ne.jp";
	
		Ng_MailAddress[3] = "@jp-r.ne.jp";
	
		Ng_MailAddress[4] = "@jp-n.ne.jp";
	
		Ng_MailAddress[5] = "@jp-s.ne.jp";
	
		Ng_MailAddress[6] = "@jp-q.ne.jp";
	
		Ng_MailAddress[7] = "@jp-c.ne.jp";
	
		Ng_MailAddress[8] = "@jp-k.ne.jp";
	
		Ng_MailAddress[9] = "@softbank.ne.jp";
	
		Ng_MailAddress[10] = "@d.vodafone.ne.jp";
	
		Ng_MailAddress[11] = "@h.vodafone.ne.jp";
	
		Ng_MailAddress[12] = "@t.vodafone.ne.jp";
	
		Ng_MailAddress[13] = "@c.vodafone.ne.jp";
	
		Ng_MailAddress[14] = "@k.vodafone.ne.jp";
	
		Ng_MailAddress[15] = "@r.vodafone.ne.jp";
	
		Ng_MailAddress[16] = "@n.vodafone.ne.jp";
	
		Ng_MailAddress[17] = "@s.vodafone.ne.jp";
	
		Ng_MailAddress[18] = "@q.vodafone.ne.jp";
	
		Ng_MailAddress[19] = "@ezweb.ne.jp";
	
		Ng_MailAddress[20] = "@ido.ne.jp";
	
		Ng_MailAddress[21] = "@sky.tkk.ne.jp";
	
		Ng_MailAddress[22] = "@sky.tu-ka.ne.jp";
	
		Ng_MailAddress[23] = "@sky.tck.ne.jp";
	
		Ng_MailAddress[24] = "@docomo.ne.jp";
	
		Ng_MailAddress[25] = "@em.nttpnet.ne.jp";
	
		Ng_MailAddress[26] = "@phone.ne.jp";
	
		Ng_MailAddress[27] = "@mozio.ne.jp";
	
		Ng_MailAddress[28] = "@pdx.ne.jp";
	
		Ng_MailAddress[29] = "@pipopa.ne.jp";
	
		Ng_MailAddress[30] = "@softbank.ne.jp";
	


	function EMailKeitaiCheck(inDat){
		var ret;
		var i;
		for(i=0;i<Ng_MailAddress.length;i++){
			var rexp = new RegExp(Ng_MailAddress[i]);
			ret = rexp.test(inDat);
			if(ret == true){
				return true;
			}
		}

		return false;
	}
