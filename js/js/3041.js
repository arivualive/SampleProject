// ���i�Ǘ��p���̓`�F�b�N 
function InputChk() {
	with (document.form_inp){
		// �����o�C���Ή��@2009/03/12
		// �T�C�g�\���p���i���̂�PC�A�g�ы��ɖ����͂̏ꍇ�̓G���[�Ƃ���
		if (fncTrim(shohin_name.value) == "") {
			fncAlert("�T�C�g�\���p���i����(PC)����͂��Ă�������",shohin_name);
			return false;
		}
		if (fncTrim(m_shohin_name.value) == "") {
			fncAlert("�T�C�g�\���p���i����(�g��)����͂��Ă�������",shohin_name);
			return false;
		}
		// �����o�C���Ή��@2009/03/12
		if (fncTrim(shohin_name.value) != "") {
			if(fncGetLength(shohin_name.value) > 60) {
				fncAlert("�T�C�g�\���p���i����(PC)�͑S�p30�����ȓ��œ��͂��Ă�������",shohin_name);
				return false;
			}
		}
		// �����o�C���Ή��@2009/03/12
		if (fncTrim(m_shohin_name.value) != "") {
			if(fncGetLength(m_shohin_name.value) > 60) {
				fncAlert("�T�C�g�\���p���i����(�g��)�͑S�p30�����ȓ��œ��͂��Ă�������",m_shohin_name);
				return false;
			}
		}
		// �����o�C���Ή��@2009/03/12
		if (fncGetLength(shohin_comment1.value) > 100) {
			fncAlert("�R�����g1(PC)�͑S�p50�����ȓ��œ��͂��Ă�������",shohin_comment1);
			return false;
		}
		// �����o�C���Ή��@2009/03/12
		if (fncGetLength(m_shohin_comment1.value) > 100) {
			fncAlert("�R�����g1(�g��)�͑S�p50�����ȓ��œ��͂��Ă�������",m_shohin_comment1);
			return false;
		}
		// �����o�C���Ή��@2009/03/12
		if (fncGetLength(shohin_comment2.value) > 60){
			fncAlert("�R�����g2(PC)�͑S�p30�����ȓ��œ��͂��Ă�������",shohin_comment2);
			return false;
		}
		// �����o�C���Ή��@2009/03/12
		if (fncGetLength(m_shohin_comment2.value) > 60) {
			fncAlert("�R�����g2(�g��)�͑S�p30�����ȓ��œ��͂��Ă�������",m_shohin_comment2);
			return false;
		}
		// �����o�C���Ή��@2009/03/12
		//��2011/12/06 R-#2255_�yPC�z�y�ێ�^�c�z�Ǘ���ʏ��i�}�X�^�[�o�^���@�̓���_inori�i�t�F�[�Y2�j(ul yamashita)
		if (fncGetLength(explanation1.value) > 4000) {
			fncAlert("����TOP(PC)�͑S�p2000�����ȓ��œ��͂��Ă�������",explanation1);
			return false;
		}
		// �����o�C���Ή��@2009/03/12
		if (fncGetLength(m_explanation1.value) > 4000) {
			fncAlert("����TOP(�g��)�͑S�p2000�����ȓ��œ��͂��Ă�������",m_explanation1);
			return false;
		}
		// �����o�C���Ή��@2009/03/12
		if (fncGetLength(explanation2.value) > 4000) {
			fncAlert("��Ȕz������(PC)�͑S�p2000�����ȓ��œ��͂��Ă�������",explanation2);
			return false;
		}
		// �����o�C���Ή��@2009/03/12
		if (fncGetLength(m_explanation2.value) > 4000) {
			fncAlert("��Ȕz������(�g��)�͑S�p2000�����ȓ��œ��͂��Ă�������",m_explanation2);
			return false;
		}
		// �����o�C���Ή��@2009/03/12
		if (fncGetLength(explanation3.value) > 4000) {
			fncAlert("���\�E����(PC)�͑S�p2000�����ȓ��œ��͂��Ă�������",explanation3);
			return false;
		}
		// �����o�C���Ή��@2009/03/12
		if (fncGetLength(m_explanation3.value) > 4000) {
			fncAlert("���\�E����(�g��)�͑S�p2000�����ȓ��œ��͂��Ă�������",m_explanation3);
			return false;
		}
		// �����o�C���Ή��@2009/03/12
		if (fncGetLength(explanation4.value) > 4000) {
			fncAlert("�������(PC)�͑S�p2000�����ȓ��œ��͂��Ă�������",explanation4);
			return false;
		}
		// �����o�C���Ή��@2009/03/12
		if (fncGetLength(m_explanation4.value) > 4000) {
			fncAlert("�������(�g��)�͑S�p2000�����ȓ��œ��͂��Ă�������",m_explanation4);
			return false;
		}
		// �����o�C���Ή��@2009/03/12
		if (fncGetLength(explanation5.value) > 4000) {
			fncAlert("�g����(PC)�͑S�p2000�����ȓ��œ��͂��Ă�������",explanation5);
			return false;
		}
		// �����o�C���Ή��@2009/03/12
		if (fncGetLength(m_explanation5.value) > 4000) {
			fncAlert("�g����(�g��)�͑S�p2000�����ȓ��œ��͂��Ă�������",m_explanation5);
			return false;
		}
		// �����o�C���Ή��@2009/03/12


		//��2009/04/27 #xxx ���o�C���Ή����ڒǉ�(kdl yoshii)
		if (fncGetLength(explanation6.value) > 4000) {
			fncAlert("���̂悤�ȕ��ɂ�������(PC)�͑S�p2000�����ȓ��œ��͂��Ă�������",explanation6);
			return false;
		}
		if (fncGetLength(m_explanation6.value) > 4000) {
			fncAlert("���̂悤�ȕ��ɂ�������(�g��)�͑S�p2000�����ȓ��œ��͂��Ă�������",m_explanation6);
			return false;
		}
		//��2009/04/27 #xxx ���o�C���Ή����ڒǉ�(kdl yoshii)

		if (fncTrim(priority.value) == "") {
			fncAlert("�D�揇�ʂ���͂��Ă�������",priority);
			return false;
		} else {
		//��2011/12/06 R-#2255_�yPC�z�y�ێ�^�c�z�Ǘ���ʏ��i�}�X�^�[�o�^���@�̓���_inori�i�t�F�[�Y2�j(ul yamashita)
			if (!fncJudgeNumber(fncTrim(priority.value))) {
				fncAlert("�D�揇�ʂ͔��p�����œ��͂��Ă�������",priority);
				return false;
			}
		}
		if(!fncEditConfirm()){
			return false;
		}
	}
}
/*--------------------------------------------------------
 * fncShohinKbnChange
 * �T�@�v�F�Z���N�g�{�b�N�X�I�����I�������l�������đJ��
 * ���@���F
 * �߂�l�F
--------------------------------------------------------*/
function fncShohinKbnChange(){
	var url   = document.list.action;
	var param = document.list.shohin_kbn.selectedIndex;
	if(param != ""){
		url = url + '?shohin_kbn=' + param;
	}
	document.list.action= url;
	document.list.submit();
}