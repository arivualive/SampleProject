/*
 * �֐� : checkHasFlashPlayer()
 * FlashPlayer�̃C���X�g�[���󋵂��`�F�b�N����Flash�R���e���c�̃����N�𐧌䂷��
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
		// �q���g�b�v�R���e���c
		if (pageName == 'hilltop'){
			flash_com.innerHTML = "<center>���q���g�b�v�R���e���c�́A�^�b�`�p IE10�ł͂����p���������Ȃ��ꍇ���������܂��B<br/>�����p���������Ȃ��ꍇ�́A�f�X�N�g�b�v�p IE10�ɕύX�����������ł����p���������܂��B<br/>�ύX���@��<a href=\"javascript:;\" onclick =\"window.open('/modeChange.html','modeChange','toolbar=no,location=yes,directories=no,status=no,menubar=no,titlebar=no,scrollbars=yes,alwaysRaised=yes,width=720,height=380');\">������</a>���炲�m�F���������B</center>";
		// WEB�ނ�
		}else if (pageName == 'tsumugi'){
			flash_com.innerHTML = "<center>����񎏁u�ނ��v�́A�^�b�`�p IE10�ł͂����p���������Ȃ��ꍇ���������܂��B<br/>�����p���������Ȃ��ꍇ�́A�f�X�N�g�b�v�p IE10�ɕύX�����������ł����p���������܂��B<br/>�ύX���@��<a style=\"color: #0000EE;\" href=\"javascript:;\" onclick =\"window.open('/modeChange.html','modeChange','toolbar=no,location=yes,directories=no,status=no,menubar=no,titlebar=no,scrollbars=yes,alwaysRaised=yes,width=720,height=380');\">������</a>���炲�m�F���������B</center>";
		// �}�C�y�[�W
		}else if (pageName == 'mypage'){
			// ��������
			if (flash_com1 != 'undefined' && flash_com1 != null){
				flash_com1.innerHTML = "�����������́A�^�b�`�p IE10�ł͂����p���������Ȃ��ꍇ���������܂��B�����p���������Ȃ��ꍇ�́A�f�X�N�g�b�v�p IE10�ɕύX�����������ł����p���������܂��B�ύX���@��<a href=\"javascript:;\" onclick =\"window.open('/modeChange.html','modeChange','toolbar=no,location=yes,directories=no,status=no,menubar=no,titlebar=no,scrollbars=yes,alwaysRaised=yes,width=720,height=380');\">������</a>���炲�m�F���������B";
			// ���蓖�J�����_�[
			}else if (flash_com2 != 'undefined' && flash_com2 != null){
				flash_com2.innerHTML = "��My���蓖�ăJ�����_�[�́A�^�b�`�p IE10�ł͂����p���������Ȃ��ꍇ���������܂��B�����p���������Ȃ��ꍇ�́A�f�X�N�g�b�v�p IE10�ɕύX�����������ł����p���������܂��B�ύX���@��<a href=\"javascript:;\" onclick =\"window.open('/modeChange.html','modeChange','toolbar=no,location=yes,directories=no,status=no,menubar=no,titlebar=no,scrollbars=yes,alwaysRaised=yes,width=720,height=380');\">������</a>���炲�m�F���������B";
			}
			// WEB�ނ��A�q���g�b�v�R���e���c
			flash_com3.innerHTML = "�����u�ނ��v�A�q���g�b�v�R���e���c�́A�^�b�`�p IE10�ł͂����p���������Ȃ��ꍇ���������܂��B�����p���������Ȃ��ꍇ�́A�f�X�N�g�b�v�p IE10�ɕύX�����������ł����p���������܂��B�ύX���@��<a href=\"javascript:;\" onclick =\"window.open('/modeChange.html','modeChange','toolbar=no,location=yes,directories=no,status=no,menubar=no,titlebar=no,scrollbars=yes,alwaysRaised=yes,width=720,height=380');\">������</a>���炲�m�F���������B";
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

	// iOS(Flash���Ή�)�܂���Android(Flash���Ή�)
    if (is_iOS || is_Android && !flash){
		// �q���g�b�v�R���e���c
		if (pageName == 'hilltop'){
			flash_com.innerHTML = "<center>���\���󂲂����܂���B�q���g�b�v�R���e���c�́A���q�l�����g���̃X�}�[�g�t�H���E�^�u���b�g�[���ł͂����p���������܂���B</center>";
		// WEB�ނ�
		}else if (pageName == 'tsumugi'){
			flash_com.innerHTML = "<center>���\���󂲂����܂���B��񎏁u�ނ��v�́A���q�l�����g���̃X�}�[�g�t�H���E�^�u���b�g�[���ł͂����p���������܂���B</center>";
		// �}�C�y�[�W
		}else if (pageName == 'mypage'){
			// ��������
			if (flash_com1 != 'undefined' && flash_com1 != null){
				flash_com1.innerHTML = "���\���󂲂����܂���B�X�}�[�g�t�H���E�^�u���b�g�[���ł́A���������̈ꕔ�@�\�������p���������܂���B";
			// ���蓖�J�����_�[
			}else if (flash_com2 != 'undefined' && flash_com2 != null){
				if (document.getElementById("calendar") != 'undefined' && document.getElementById("calendar") != null){
					document.getElementById("calendar").removeAttribute("href");
				}
				flash_com2.innerHTML = "���\���󂲂����܂���BMy���蓖�ăJ�����_�[�́A���q�l�����g���̃X�}�[�g�t�H���E�^�u���b�g�[���ł͂����p���������܂���B";
			}
			// WEB�ނ�
			R_img_tsumugi.src = "/member/mypage/img/R_btn_tsumugi.gif";
			R_btn_tsumugi.removeAttribute("href");
			R_btn_tsumugi.removeAttribute("target");
			R_btn_tsumugi.removeAttribute("class");
			// �q���g�b�v�R���e���c
			R_img_hilltop.src = "/member/mypage/img/R_btn_hiltop.gif";
			R_btn_hilltop.removeAttribute("href");
			R_btn_hilltop.removeAttribute("target");
			R_btn_hilltop.removeAttribute("class");
			flash_com3.innerHTML = "���\���󂲂����܂���B���u�ނ��v�A�q���g�b�v�R���e���c�́A���q�l�����g���̃X�}�[�g�t�H���E�^�u���b�g�[���ł͂����p���������܂���B";
		}
	// Android(Flash�Ή�)
    }else if (is_Android && flash){
		// �q���g�b�v�R���e���c
		if (pageName == 'hilltop'){
			flash_com.innerHTML = "<center>���\���󂲂����܂���B�q���g�b�v�R���e���c�́A�ꕔ�̃X�}�[�g�t�H���E�^�u���b�g�[���ł͂����p���������܂���B</center>";
		// WEB�ނ�
		}else if (pageName == 'tsumugi'){
			flash_com.innerHTML = "<center>���\���󂲂����܂���B��񎏁u�ނ��v�́A�ꕔ�̃X�}�[�g�t�H���E�^�u���b�g�[���ł͂����p���������܂���B</center>";
		// �}�C�y�[�W
		}else if (pageName == 'mypage'){
			// ��������
			if (flash_com1 != 'undefined' && flash_com1 != null){
				flash_com1.innerHTML = "���\���󂲂����܂���B�X�}�[�g�t�H���E�^�u���b�g�[���ł́A���������̈ꕔ�@�\�������p���������܂���B";
			// ���蓖�J�����_�[
			}else if (flash_com2 != 'undefined' && flash_com2 != null){
				flash_com2.innerHTML = "���\���󂲂����܂���BMy���蓖�ăJ�����_�[�́A�ꕔ�̃X�}�[�g�t�H���E�^�u���b�g�[���ł͂����p���������܂���B";
			}
			// WEB�ނ��A�q���g�b�v�R���e���c
			flash_com3.innerHTML = "���\���󂲂����܂���B���u�ނ��v�A�q���g�b�v�R���e���c�́A�ꕔ�̃X�}�[�g�t�H���E�^�u���b�g�[���ł͂����p���������܂���B";
		}
    }

}