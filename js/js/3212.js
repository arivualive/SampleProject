
function jsEveDel(event_id,event_name) {
    if(window.confirm(event_name + '���폜���Ă���낵���ł����H')){
        document.form_del.event_id.value = event_id;
        document.form_del.mode.value = 'delete';
	    document.form_del.submit();
    }

}


function jsEveDel2(event_id,event_name) {
    if(window.confirm(event_name + '���폜���܂��B\n�C�x���g�̊��Ԓ��ł����A�{���ɍ폜���Ă���낵���ł����H')){
        document.form_del.event_id.value = event_id;
        document.form_del.mode.value = 'delete';
	    document.form_del.submit();
    }

}


function InputChk(mode_select) {

    if(mode_select == "ADD"){
		document.form_inp.mode.value = "add";
	}
    
    if(mode_select == "EDIT"){
		document.form_inp.mode.value = "edit";
	}
    
    
    with (document.form_inp){
		if (fncTrim(event_name.value) == "") {
			fncAlert("�`�������W�C�x���g������͂��Ă��������B",event_name);
			return false;
		}
		if(event_name.value.length > 20){
			fncAlert("�`�������W�C�x���g����20�����ȓ��œ��͂��Ă��������B",event_name);
			return false;
		}
        if(event_name.value.match(/\n/)){
			fncAlert("�`�������W�C�x���g���ɉ��s�͓��͂��Ȃ��ł��������B",event_name);
			return false;
		}
        
        
        if (fncTrim(event_ex.value) == "") {
			fncAlert("����������͂��Ă��������B",event_ex);
			return false;
		}
		if(event_ex.value.length > 1000){
			fncAlert("��������1000�����ȓ��œ��͂��Ă��������B",event_ex);
			return false;
		}
        if(event_ex.value.match(/\n/)){
			fncAlert("�������ɉ��s�͓��͂��Ȃ��ł��������B",event_ex);
			return false;
		}
        
        
        if (fncTrim(event_achieve.value) == "") {
			fncAlert("�K�{���ԓ�������͂��Ă��������B",event_achieve);
			return false;
		}
		if(event_achieve.value.length > 3){
			fncAlert("�K�{���ԓ�����3�����ȓ��œ��͂��Ă��������B",event_achieve);
			return false;
		}
        if(event_achieve.value.match(/\n/)){
			fncAlert("�K�{���ԓ����ɉ��s�͓��͂��Ȃ��ł��������B",event_achieve);
			return false;
		}
        
        
        if (event_achieve.value.length > 0) {
            if (!/^[0-9]+$/.test(event_achieve.value)) { 
                fncAlert("�K�{���ԓ����ɂ�1�`999�܂ł̒l����͂��Ă��������B" , event_achieve);
    		    return false;
    	    }
        
        }
        
        if (event_achieve.value < 1) {
        
             fncAlert("�K�{���ԓ����ɂ�1�`999�܂ł̒l����͂��Ă��������B" , event_achieve);
    		 return false;
        }
        
       
        if (fncTrim(img_list_bnr.value) == "") {
			fncAlert("�o�i�[�摜ID��I�����Ă��������B",img_list_bnr);
			return false;
		}
        
        if (fncTrim(img_list_hd.value) == "") {
			fncAlert("�w�b�_�[�摜ID��I�����Ă��������B",img_list_hd);
			return false;
		}
       
       
       
        
        
        if (fncTrim(disp_turn.value) == "") {
			fncAlert("�\�����ʂ���͂��Ă��������B",disp_turn);
			return false;
		}
		if(disp_turn.value.length > 3){
			fncAlert("�\�����ʂ�3�����ȓ��œ��͂��Ă��������B",disp_turn);
			return false;
		}
        if(disp_turn.value.match(/\n/)){
			fncAlert("�\�����ʂɉ��s�͓��͂��Ȃ��ł��������B",disp_turn);
			return false;
		}
        if (disp_turn.value.length > 0) {
        if (!/^[0-9]+$/.test(disp_turn.value)) { 
            fncAlert("�\�����ʂɂ�1�`999�܂ł̒l����͂��Ă��������B" , disp_turn);
    		return false;
    	}
        }
        if (disp_turn.value < 1) {
        
             fncAlert("�\�����ʂɂ�1�`999�܂ł̒l����͂��Ă��������B" , event_achieve);
    		 return false;
        }
        
        
        if (fncTrim(event_date_from_y.value) == "" || fncTrim(event_date_from_m.value) == "" || fncTrim(event_date_from_d.value) == "") {
			fncAlert("�C�x���g�J�n��������͂��Ă��������B",event_date_from_y);
			return false;
		}
        
        if (fncTrim(event_date_to_y.value) == "" || fncTrim(event_date_to_m.value) == "" || fncTrim(event_date_to_d.value) == "") {
			fncAlert("�C�x���g�I����������͂��Ă��������B",event_date_to_y);
			return false;
		}
        
        
        
        if (fncTrim(disp_date_from_y.value) == "" || fncTrim(disp_date_from_m.value) == "" || fncTrim(disp_date_from_d.value) == "") {
			fncAlert("�o�i�[�\���J�n��������͂��Ă��������B",disp_date_from_y);
			return false;
		}
        
        if (fncTrim(disp_date_to_y.value) == "" || fncTrim(disp_date_to_m.value) == "" || fncTrim(disp_date_to_d.value) == "") {
			fncAlert("�o�i�[�\���I����������͂��Ă��������B",disp_date_to_y);
			return false;
		}
        
        
        
        
        
        
        
        var start = event_date_from_y.value + ("00" + event_date_from_m.value ).slice(-2) + ("00" + event_date_from_d.value ).slice(-2);
         if (event_date_from_y.value + event_date_from_m.value + event_date_from_d.value != "") {

             if (fncChkDate(start) == "") {
                 fncAlert("�C�x���g�J�n�����𐳂������͂��Ă��������B",event_date_from_y);
                 return false;
             }
         }
         
 		var end = event_date_to_y.value + ("00" + event_date_to_m.value ).slice(-2) + ("00" + event_date_to_d.value ).slice(-2);
         if (event_date_to_y.value + event_date_to_m.value + event_date_to_d.value != "") {

             if (fncChkDate(end) == "") {
                 fncAlert("�C�x���g�I�������𐳂������͂��Ă��������B",event_date_to_y);
                 return false;
             }
             if (event_date_from_y.value + event_date_from_m.value + event_date_from_d.value != "") {
                 if (start > end) {
                     fncAlert("�C�x���g�J�n�����i�e�q�n�l�j���C�x���g�I�������i�s�n�j�œ��͂��Ă��������B",event_date_from_y);
                     return false;
                 }
             }
         }
         
         
         
         var start = disp_date_from_y.value + ("00" + disp_date_from_m.value ).slice(-2) + ("00" + disp_date_from_d.value ).slice(-2);
         if (disp_date_from_y.value + disp_date_from_m.value + disp_date_from_d.value != "") {

             if (fncChkDate(start) == "") {
                 fncAlert("�o�i�[�\���J�n�����𐳂������͂��Ă��������B",disp_date_from_y);
                 return false;
             }
         }
         
 		var end = disp_date_to_y.value + ("00" + disp_date_to_m.value ).slice(-2) + ("00" + disp_date_to_d.value ).slice(-2);
         if (disp_date_to_y.value + disp_date_to_m.value + disp_date_to_d.value != "") {

             if (fncChkDate(end) == "") {
                 fncAlert("�o�i�[�\���I�������𐳂������͂��Ă��������B",disp_date_to_y);
                 return false;
             }
             if (disp_date_from_y.value + disp_date_from_m.value + disp_date_from_d.value != "") {
                 if (start > end) {
                     fncAlert("�o�i�[�\���J�n�����i�e�q�n�l�j���o�i�[�\���I�������i�s�n�j�œ��͂��Ă��������B",disp_date_from_y);
                     return false;
                 }
             }
         }		
         
        
        
        /*
        var dt1 = new Date(event_date_to_y.value, event_date_to_m.value - 1, event_date_to_d.value); 
        var dt2 = new Date(event_date_from_y.value, event_date_from_m.value - 1, event_date_from_d.value);
        var diff = dt1 - dt2;
        var diffDay = diff / 86400000;
        

        
        if(diffDay + 2 < event_achieve.value){
            fncAlert("�C�x���g�I����������C�x���g�J�n���������������������ȓ��̊��Ԃ�K�{���ԓ����ɐݒ肵�Ă��������B", event_achieve);
            return false;
        }
        */


        var dt1 = new Date(disp_date_from_y.value, disp_date_from_m.value - 1, disp_date_from_d.value);
        var dt2 = new Date(event_date_from_y.value, event_date_from_m.value - 1, event_date_from_d.value);
        if(dt1.getTime() < dt2.getTime()) {
        
            fncAlert("�o�i�[�̕\�����Ԃ̓C�x���g�̊��ԓ��ɐݒ肵�Ă��������B", disp_date_from_y);
            return false;
            
        } 
        
        
        
        var dt1 = new Date(disp_date_to_y.value, disp_date_to_m.value - 1, disp_date_to_d.value);
        var dt2 = new Date(event_date_to_y.value, event_date_to_m.value - 1, event_date_to_d.value);
        if(dt1.getTime() > dt2.getTime()) {
        
            fncAlert("�o�i�[�̕\�����Ԃ̓C�x���g�̊��ԓ��ɐݒ肵�Ă��������B", disp_date_from_y);
            return false;
            
        }
        
        
        
        
        var dt1 = new Date(event_date_to_y.value, event_date_to_m.value - 1, event_date_to_d.value); 
        var dt2 = new Date(disp_date_to_y.value, disp_date_to_m.value - 1, disp_date_to_d.value);
        var diff = dt1 - dt2;
        var diffDay = diff / 86400000;
        
        
        if(diffDay + 1 < event_achieve.value){
            fncAlert("�C�x���g�I����������o�i�[�\���I�����������������������ȓ��̊��Ԃ�K�{���ԓ����ɐݒ肵�Ă��������B", event_achieve);
            return false;
        } 
         		
    
    }
  
  
    if(mode_select == "ADD"){
	ret = confirm("�o�^���܂��B��낵���ł����H");
	}
    
    if(mode_select == "EDIT"){
	ret = confirm("�X�V���܂��B��낵���ł����H");
	}
  
  
  
  
  
  
  if (ret == true){
    document.form_inp.submit();
    return true;
  }else{
  
      return false;
  }
    
    

}



function Cancel(){
  ret = confirm("���͓��e��j�����܂����H");
  if (ret == true){
    return true;
  }else{
  
      return false;
  }
}



function BnrSelect(){

    
    var img_id_ary = '<?php echo $img_id_ary; ?>';
    var img_id = img_id_ary.split(',');
    
    var img_path_ary = '<?php echo $img_path_ary; ?>';
    var img_path = img_path_ary.split(',');
    
    
    for (var i = 0; i < img_id.length; i++) {
        if(document.form_inp.img_list_bnr.value == img_id[i]){
       
        document.form_inp.bnr_img.src = img_path[i];
        }
        
        if(document.form_inp.img_list_bnr.value == ""){
        
         document.form_inp.bnr_img.src = "dummy.png";
        }
    }
    
    
    
}


function HdSelect(){

    
    var img_id_ary = '<?php echo $img_id_ary; ?>';
    var img_id = img_id_ary.split(',');
    
    var img_path_ary = '<?php echo $img_path_ary; ?>';
    var img_path = img_path_ary.split(',');
    
    
    for (var i = 0; i < img_id.length; i++) {
        if(document.form_inp.img_list_hd.value == img_id[i]){
        
        document.form_inp.hd_img.src = img_path[i];
        }
        
        if(document.form_inp.img_list_hd.value == ""){
        
         document.form_inp.hd_img.src = "dummy.png";
        }
    }
    
    
    
}