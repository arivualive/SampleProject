///////////////////////////////////////////////
// ���̓`�F�b�N
///////////////////////////////////////////////
function InputChk(mode,dispQuestionNo){
 	var errorMsg = ""; // �G���[���b�Z�[�W�i�[�p
	var confMsg = "";  // �m�F���b�Z�[�W�i�[�p

	switch(mode){
		case "add":
			// �V�K�ǉ��{�^��������
			if (fncTrim(document.form_inp.question_cont.value) == "") {
				// ���╶���󔒂̏ꍇ
				errorMsg += "���╶����͂��Ă��������B\n";
			}
			
			if (document.form_inp.question_cont.value.match(/\n/)) {
				// ���╶�ɉ��s���܂܂�Ă���ꍇ
				errorMsg += "���s�͓��͂��Ȃ��ł��������B\n";
			}
			
			if (errorMsg == "") {
				// �G���[���Ȃ��ꍇ
				confMsg = "�����ǉ����܂����H\n";
			}
            
            
            if (errorMsg == "") {
		    // �G���[���Ȃ��ꍇ
		    if (confirm(confMsg)) {
			// �m�F���b�Z�[�W��\�����AOK���������ꂽ�ꍇ
            
            document.form_inp.submit();
            
			return true;
		    } else {
			// �m�F���b�Z�[�W��\�����A�L�����Z�����������ꂽ�ꍇ
			return false;
		    }
            } else {
		    // �G���[������ꍇ
	        alert(errorMsg);
		    return false;
            } 
            
            
            
			break;
			
		case "edit":
			// �\�����鎿���ύX�{�^��������
            

            var cnt = 0;
            
            for (var i = 1; i < 8; i++){
                
                var aa = eval("document.form_inp.que_list" + i);
                var bb = eval("document.form_up.que_update" + i);
                var cc = eval("document.form_up.que_select" + i);
                var a = document.getElementById ('question_cur' + i);
                
                
                for(var j = i + 1; j < 7; j++){
                
                var dd = eval("document.form_inp.que_list" + j);
                
                if(aa.value == dd.value ){
                
                alert("�d������ID�͓o�^�ł��܂���B");
                return false;
                }
                
                
                
                }
                
                
                if(a.innerHTML != aa.value){
                bb.value = "1";
                cc.value = aa.value;
                cnt++;
                }    
            
            
            
            }
            
            if(cnt == 0){
            
            alert("�ύX�O�ƕύX��̎���ID�������ł��B\n�ύX���Ȃ���΃L�����Z���ŉ�ʂ���Ă��������B");
            return false;
            }
            
            
            
            if (confirm("�����ύX���܂��B\n��낵���ł����H")) {
		    // �m�F���b�Z�[�W��\�����AOK���������ꂽ�ꍇ
		    document.form_up.submit();
            return true;
	        } else {
		    // �m�F���b�Z�[�W��\�����A�L�����Z�����������ꂽ�ꍇ
		    return false;
	}
            
            
            
            
            
			break;
			
		default:
			// ��L�ȊO�̏ꍇ
			return false;
	}
	
    
}


///////////////////////////////////////////////
// �L�����Z���`�F�b�N
///////////////////////////////////////////////
function IsCancel(){
	if (confirm("���͓��e��j�����܂����H")) {
		// �m�F���b�Z�[�W��\�����AOK���������ꂽ�ꍇ
		window.close();
	} else {
		// �m�F���b�Z�[�W��\�����A�L�����Z�����������ꂽ�ꍇ
		return false;
	}
}


///////////////////////////////////////////////
// ����ID�\��
///////////////////////////////////////////////
function setNo(strQuestionNoSelect,strQuestionNoFree,strQuestionContSelect,strQuestionContFree,dispQuestionNo){
	var select1 = document.forms.form_inp.changeQuestion; // �ύX���鎿��ԍ��̃Z���N�g�{�b�N�X��ݒ�
	var select2 = document.forms.form_inp.dispQuestionId; // �\�����鎿��ID�̃Z���N�g�{�b�N�X��ݒ�
	var dispQNo = dispQuestionNo.split(",");              // ���łɐݒ肳��Ă���A�\�����鎿��ID�̈ꗗ
	
	select2.options.length = 0; // �I�����̐������ꂼ��ɈقȂ�ꍇ�ɂ��킹�A�I�v�V�����̐���0�ɂ���
	
	if(select1.options[select1.selectedIndex].value == "---"){
		// �ύX���鎿��ԍ��̃Z���N�g�{�b�N�X�������l�̏ꍇ
		// �\�����鎿��ID�̃Z���N�g�{�b�N�X�A�\�����鎿�╶�A�񓚕��@�ɏ����l��ݒ�
		select2.options[0] = new Option("---"); 
		document.forms.form_inp.edit_question_cont.value = "";
		document.forms.form_inp.question_kbn.value = "";
	}else if (select1.options[select1.selectedIndex].value == "7"){
		// �ύX���鎿��ԍ��̃Z���N�g�{�b�N�X������7��I�����Ă���ꍇ
		var arrayQuestionNoFree = strQuestionNoFree.split(",");     // �񓚕��@�����R�񓚂̎���ID��ݒ�
		var arrayQuestionContFree = strQuestionContFree.split(","); // �񓚕��@�����R�񓚂̎��╶��ݒ�
		for(var i=0; i < arrayQuestionNoFree.length ; i++){
			// �\�����鎿��ID���I�v�V�����ɐݒ�
			select2.options[i] = new Option(arrayQuestionNoFree[i],arrayQuestionContFree[i]);
			if (dispQNo[parseInt(select1.options[select1.selectedIndex].value)-1] == arrayQuestionNoFree[i]) {
				// �ύX���鎿��ԍ��ɐݒ肳��Ă��鎿��ID��I������
				select2.options[i].selected = true;
			}
		}
		// ���╶�Ɖ񓚕��@��ݒ�
		document.forms.form_inp.edit_question_cont.value = select2.options[select2.selectedIndex].value;
		document.forms.form_inp.question_kbn.value = "�t���[�X�y�[�X";
	}else{
		// �ύX���鎿��ԍ��̃Z���N�g�{�b�N�X������7�ȊO��I�����Ă���ꍇ
		var arrayQuestionNoSelect = strQuestionNoSelect.split(",");     // �񓚕��@���I���񓚂̎���ID��ݒ�
		var arrayQuestionContSelect = strQuestionContSelect.split(","); // �񓚕��@���I���񓚂̎��╶��ݒ�
		for(var i=0; i < arrayQuestionNoSelect.length ; i++){
			// �\�����鎿��ID���I�v�V�����ɐݒ�
			select2.options[i] = new Option(arrayQuestionNoSelect[i],arrayQuestionContSelect[i]);
			if (dispQNo[parseInt(select1.options[select1.selectedIndex].value)-1] == arrayQuestionNoSelect[i]) {
				// �ύX���鎿��ԍ��ɐݒ肳��Ă��鎿��ID��I������
				select2.options[i].selected = true;
			}
		}
		// ���╶�Ɖ񓚕��@��ݒ�
		document.forms.form_inp.edit_question_cont.value = select2.options[select2.selectedIndex].value;
		document.forms.form_inp.question_kbn.value = "�I�����";
	}
}


///////////////////////////////////////////////
// ���╶�\��
///////////////////////////////////////////////
function setCont(){
	// �\�����鎿��ID�̃Z���N�g�{�b�N�X��ݒ�
	var selectOption = document.forms.form_inp.dispQuestionId;
	
	// ���╶��ݒ�
	document.forms.form_inp.edit_question_cont.value = selectOption.options[selectOption.selectedIndex].value
}








function SelectSelect(quenum){

    
    var select_no_ary = '<?php echo $select_no_ary; ?>';
    var select_no = select_no_ary.split(',');
    
    var select_cont_ary = '<?php echo $select_cont_ary; ?>';
    var select_cont = select_cont_ary.split('|~');
    
    
    
    
    
    
    for(var j=1; j<7; j++){
    
    if(quenum == j){
    
    

    
    for (var i = 0; i < select_no.length; i++) {
    
        var aaa = eval("document.form_inp.que_list" + j);
    
        if(aaa.value == select_no[i]){
        
        
      
            
            
            
            var a = document.getElementById ('question_cur' + j);
            
            var b = document.getElementById ('question_td' + j);
            b.innerHTML = select_cont[i];

            
            if(a.innerHTML !=  aaa.value){
  
            b.style.backgroundColor = 'yellow';
            
              
            }
            
            if(a.innerHTML == aaa.value){
            
     
            b.style.backgroundColor = 'white';
            
      
            }
          

            
        }
        
     }
    }
    
    }
    
    
    
    
    
    
    
    

}


function FreeSelect(){

    
    var free_no_ary = '<?php echo $free_no_ary; ?>';
    var free_no = free_no_ary.split(',');
    
    var free_cont_ary = '<?php echo $free_cont_ary; ?>';
    var free_cont = free_cont_ary.split('|~');
    
    
  

    
    for (var i = 0; i < free_no.length; i++) {
        if(document.form_inp.que_list7.value == free_no[i]){
        
        

            
            
            
            var a = document.getElementById ('question_cur7');
            var b = document.getElementById ('question_td7');
            b.innerHTML = free_cont[i];

            
            if(a.innerHTML != document.form_inp.que_list7.value){
            

            b.style.backgroundColor = 'yellow';
      
            }
            
            if(a.innerHTML == document.form_inp.que_list7.value){
   
            b.style.backgroundColor = 'white';
      
            }
          

            
        }
        
     }
    

}