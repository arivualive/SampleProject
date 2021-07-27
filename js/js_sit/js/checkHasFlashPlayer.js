/*
 * 関数 : checkHasFlashPlayer()
 * FlashPlayerのインストール状況をチェックしてFlashコンテンツのリンクを制御する
 */

function checkHasFlashPlayer(is_iOS,is_Android,is_IE10,pageName) {
	var flash = false;
	var flash_com1 = document.getElementById("flash_com1");
	var flash_com2 = document.getElementById("flash_com2");
	var flash_com3 = document.getElementById("flash_com3");
	var flash_com = document.getElementById("flash_com");
	var R_img_hilltop = document.getElementById("R_img_hilltop");
	var R_btn_hilltop = document.getElementById("R_btn_hilltop");
	var R_img_tsumugi = document.getElementById("R_img_tsumugi");
	var R_btn_tsumugi = document.getElementById("R_btn_tsumugi");

	// IE10(win8)
    if (is_IE10){
		// ヒルトップコンテンツ
		if (pageName == 'hilltop'){
			flash_com.innerHTML = "<center>※ヒルトップコンテンツは、タッチ用 IE10ではご利用いただけない場合がございます。<br/>ご利用いただけない場合は、デスクトップ用 IE10に変更いただく事でご利用いただけます。<br/>変更方法は<a href=\"javascript:;\" onclick =\"window.open('/modeChange.html','modeChange','toolbar=no,location=yes,directories=no,status=no,menubar=no,titlebar=no,scrollbars=yes,alwaysRaised=yes,width=720,height=380');\">こちら</a>からご確認ください。</center>";
		// WEBつむぎ
		}else if (pageName == 'tsumugi'){
			flash_com.innerHTML = "<center>※会報誌「つむぎ」は、タッチ用 IE10ではご利用いただけない場合がございます。<br/>ご利用いただけない場合は、デスクトップ用 IE10に変更いただく事でご利用いただけます。<br/>変更方法は<a style=\"color: #0000EE;\" href=\"javascript:;\" onclick =\"window.open('/modeChange.html','modeChange','toolbar=no,location=yes,directories=no,status=no,menubar=no,titlebar=no,scrollbars=yes,alwaysRaised=yes,width=720,height=380');\">こちら</a>からご確認ください。</center>";
		// マイページ
		}else if (pageName == 'mypage'){
			// お肌メモ
			if (flash_com1 != 'undefined' && flash_com1 != null){
				flash_com1.innerHTML = "※お肌メモは、タッチ用 IE10ではご利用いただけない場合がございます。ご利用いただけない場合は、デスクトップ用 IE10に変更いただく事でご利用いただけます。変更方法は<a href=\"javascript:;\" onclick =\"window.open('/modeChange.html','modeChange','toolbar=no,location=yes,directories=no,status=no,menubar=no,titlebar=no,scrollbars=yes,alwaysRaised=yes,width=720,height=380');\">こちら</a>からご確認ください。";
			// お手当カレンダー
			}else if (flash_com2 != 'undefined' && flash_com2 != null){
				flash_com2.innerHTML = "※Myお手当てカレンダーは、タッチ用 IE10ではご利用いただけない場合がございます。ご利用いただけない場合は、デスクトップ用 IE10に変更いただく事でご利用いただけます。変更方法は<a href=\"javascript:;\" onclick =\"window.open('/modeChange.html','modeChange','toolbar=no,location=yes,directories=no,status=no,menubar=no,titlebar=no,scrollbars=yes,alwaysRaised=yes,width=720,height=380');\">こちら</a>からご確認ください。";
			}
			// WEBつむぎ、ヒルトップコンテンツ
			flash_com3.innerHTML = "※会報「つむぎ」、ヒルトップコンテンツは、タッチ用 IE10ではご利用いただけない場合がございます。ご利用いただけない場合は、デスクトップ用 IE10に変更いただく事でご利用いただけます。変更方法は<a href=\"javascript:;\" onclick =\"window.open('/modeChange.html','modeChange','toolbar=no,location=yes,directories=no,status=no,menubar=no,titlebar=no,scrollbars=yes,alwaysRaised=yes,width=720,height=380');\">こちら</a>からご確認ください。";
		}
		return;
    }

	try{
	    var f = new ActiveXObject("ShockwaveFlash.ShockwaveFlash");
	    flash = true;
	} catch(e) {
	    if (navigator.mimeTypes && navigator.mimeTypes["application/x-shockwave-flash"] ?navigator.mimeTypes["application/x-shockwave-flash"].enabledPlugin : 0){
	        flash = true;
	    }
	}

	// iOS(Flash未対応)またはAndroid(Flash未対応)
    if (is_iOS || is_Android && !flash){
		// ヒルトップコンテンツ
		if (pageName == 'hilltop'){
			flash_com.innerHTML = "<center>※申し訳ございません。ヒルトップコンテンツは、お客様がお使いのスマートフォン・タブレット端末ではご利用いただけません。</center>";
		// WEBつむぎ
		}else if (pageName == 'tsumugi'){
			flash_com.innerHTML = "<center>※申し訳ございません。会報誌「つむぎ」は、お客様がお使いのスマートフォン・タブレット端末ではご利用いただけません。</center>";
		// マイページ
		}else if (pageName == 'mypage'){
			// お肌メモ
			if (flash_com1 != 'undefined' && flash_com1 != null){
				flash_com1.innerHTML = "※申し訳ございません。スマートフォン・タブレット端末では、お肌メモの一部機能がご利用いただけません。";
			// お手当カレンダー
			}else if (flash_com2 != 'undefined' && flash_com2 != null){
				if (document.getElementById("calendar") != 'undefined' && document.getElementById("calendar") != null){
					document.getElementById("calendar").removeAttribute("href");
				}
				flash_com2.innerHTML = "※申し訳ございません。Myお手当てカレンダーは、お客様がお使いのスマートフォン・タブレット端末ではご利用いただけません。";
			}
			// WEBつむぎ
			R_img_tsumugi.src = "/member/mypage/img/R_btn_tsumugi.gif";
			R_btn_tsumugi.removeAttribute("href");
			R_btn_tsumugi.removeAttribute("target");
			R_btn_tsumugi.removeAttribute("class");
			// ヒルトップコンテンツ
			R_img_hilltop.src = "/member/mypage/img/R_btn_hiltop.gif";
			R_btn_hilltop.removeAttribute("href");
			R_btn_hilltop.removeAttribute("target");
			R_btn_hilltop.removeAttribute("class");
			flash_com3.innerHTML = "※申し訳ございません。会報「つむぎ」、ヒルトップコンテンツは、お客様がお使いのスマートフォン・タブレット端末ではご利用いただけません。";
		}
	// Android(Flash対応)
    }else if (is_Android && flash){
		// ヒルトップコンテンツ
		if (pageName == 'hilltop'){
			flash_com.innerHTML = "<center>※申し訳ございません。ヒルトップコンテンツは、一部のスマートフォン・タブレット端末ではご利用いただけません。</center>";
		// WEBつむぎ
		}else if (pageName == 'tsumugi'){
			flash_com.innerHTML = "<center>※申し訳ございません。会報誌「つむぎ」は、一部のスマートフォン・タブレット端末ではご利用いただけません。</center>";
		// マイページ
		}else if (pageName == 'mypage'){
			// お肌メモ
			if (flash_com1 != 'undefined' && flash_com1 != null){
				flash_com1.innerHTML = "※申し訳ございません。スマートフォン・タブレット端末では、お肌メモの一部機能がご利用いただけません。";
			// お手当カレンダー
			}else if (flash_com2 != 'undefined' && flash_com2 != null){
				flash_com2.innerHTML = "※申し訳ございません。Myお手当てカレンダーは、一部のスマートフォン・タブレット端末ではご利用いただけません。";
			}
			// WEBつむぎ、ヒルトップコンテンツ
			flash_com3.innerHTML = "※申し訳ございません。会報「つむぎ」、ヒルトップコンテンツは、一部のスマートフォン・タブレット端末ではご利用いただけません。";
		}
    }

}