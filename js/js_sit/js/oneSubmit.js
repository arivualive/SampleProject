// �t�H�[����2�d�T�u�~�b�g�h�~�t���O
var g_submitFlag = false;
/**
 * �t�H�[���̃T�u�~�b�g�������s���B�T�u�~�b�g�ς݂Ȃ牽�����Ȃ��B
 *@param form form object
 */
function oneSubmit(form){
	var f = form;
	if( g_submitFlag ){
		//���M�ς�
		f.onsubmit = function(){return false;}
		return false;
	}
	g_submitFlag = true;
	form.submit();
	return false;
}
