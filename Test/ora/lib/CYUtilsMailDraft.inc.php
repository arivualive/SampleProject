<?php
/*��R-#13199 WEB�Ǘ��c�[���Ń��[�����M���Ă�CJISSEKI_MAIL_TBL�̃��R�[�h���X�V����Ȃ� 2014/01/31 uls-soga*/
//�Ώۂ̃\�[�X�̑S�Ẵ��[���o�b�N���R�����g�A�E�g
/*��R-#13199 WEB�Ǘ��c�[���Ń��[�����M���Ă�CJISSEKI_MAIL_TBL�̃��R�[�h���X�V����Ȃ� 2014/01/31 uls-soga*/

/*
 * �y���[�����M���сA���[���������@�\ �z
 *
 */
require_once dirname(__FILE__) . '/CYUtilsDBConst.inc.php';


$MailDraft_conf = array();

//�����敪
$MailDraft_conf['REQUESTKBN'][0]="�s��";
$MailDraft_conf['REQUESTKBN'][1]="�t��";
$MailDraft_conf['REQUESTKBN'][2]="TEL(IN)";
$MailDraft_conf['REQUESTKBN'][3]="TEL(OUT)";
$MailDraft_conf['REQUESTKBN'][4]="FAX";
$MailDraft_conf['REQUESTKBN'][5]="NET";
$MailDraft_conf['REQUESTKBN'][6]="�g��";

//�Ɩ����
$MailDraft_conf['GYOUMUSCREEN'][0]="�s��";
$MailDraft_conf['GYOUMUSCREEN'][1]="TEL��";
$MailDraft_conf['GYOUMUSCREEN'][2]="�T���v��";
$MailDraft_conf['GYOUMUSCREEN'][3]="����ܕ�";
$MailDraft_conf['GYOUMUSCREEN'][4]="FAX�ʏ�";
$MailDraft_conf['GYOUMUSCREEN'][5]="�ԐMFAX";
$MailDraft_conf['GYOUMUSCREEN'][6]="�m�FFAX";
$MailDraft_conf['GYOUMUSCREEN'][7]="NET�����m��";

//�Ɩ��敪
$MailDraft_conf['GYOUMUKBN'][15]="�������烁�[��";
$MailDraft_conf['GYOUMUKBN'][16]="�R���r�j���";
$MailDraft_conf['GYOUMUKBN'][17]="���ӌ������k";
$MailDraft_conf['GYOUMUKBN'][18]="�����̂��Y�ݑ��k��";
$MailDraft_conf['GYOUMUKBN'][19]="������ׂ�L��";
$MailDraft_conf['GYOUMUKBN'][20]="�����J�E���Z�����O";
$MailDraft_conf['GYOUMUKBN'][21]="(PC)�ʃ��[��";
$MailDraft_conf['GYOUMUKBN'][22]="(�g��)�ʃ��[��(�g��)";
//��2011/01/19 #1408 �h���X���̑Ή��iEC-One�j
$MailDraft_conf['GYOUMUKBN'][23]="�h���X�������烁�[��";
//��2011/01/19 #1408 �h���X���̑Ή��iEC-One�j
//��2011/07/13 A-05761 ���ރh���Ή��i�ʏ�̔��j�iec-one tazoe�j
$MailDraft_conf['GYOUMUKBN'][24]="���ރh��(����)�������烁�[��";
$MailDraft_conf['GYOUMUKBN'][25]="���ރh��(���)�������烁�[��";
//��2011/07/13 A-05761 ���ރh���Ή��i�ʏ�̔��j�iec-one tazoe�j
// HuyDV 2018/5/30 start
$MailDraft_conf['GYOUMUKBN'][29]="���q�l�Ή����[���Ǘ�";
// HuyDV 2018/5/30 end
//�]���敪
$MailDraft_conf['HYOUKAKBN'][1]="���͎���";
$MailDraft_conf['HYOUKAKBN'][2]="�ԐM����";
$MailDraft_conf['HYOUKAKBN'][3]="��b����";
$MailDraft_conf['HYOUKAKBN'][4]="���Ȏ���";
$MailDraft_conf['HYOUKAKBN'][5]="���[���ۑ���";
$MailDraft_conf['HYOUKAKBN'][6]="���[�����M��";

//��^�t���O
//��R-#2921 ��^��20�Ή�(1:��^ 2:20�Ή� 3:�ʂɕύX) 2012/02/10 ul-fuse
$MailDraft_conf['TEIKEIFLG'][1]="��^";
$MailDraft_conf['TEIKEIFLG'][2]="20�Ή�";
$MailDraft_conf['TEIKEIFLG'][3]="��";
//��R-#2921 ��^��20�Ή�(1:��^ 2:20�Ή� 3:�ʂɕύX) 2012/02/10 ul-fuse

//���[��������FROM
$MailDraft_conf['MAIL_FROM'][0]="manzoku@saishunkan.co.jp";
$MailDraft_conf['MAIL_FROM'][1]="news@saishunkan.co.jp";
$MailDraft_conf['MAIL_FROM'][2]="privacy@saishunkan.co.jp";
$MailDraft_conf['MAIL_FROM'][3]="kagami@saishunkan.co.jp";

$MailDraft_conf['SHOHIN']['1'] = '0166';
$MailDraft_conf['SHOHIN']['2'] = '0167';
$MailDraft_conf['SHOHIN']['3'] = '0173';
$MailDraft_conf['SHOHIN']['4'] = '0113';
$MailDraft_conf['SHOHIN']['5'] = '0115';
$MailDraft_conf['SHOHIN']['6'] = '0112';
$MailDraft_conf['SHOHIN']['7'] = '0114';
$MailDraft_conf['SHOHIN']['8'] = '0210';

$MailDraft_conf['SHOHIN']['0166'] = 'DCJ';
$MailDraft_conf['SHOHIN']['0167'] = 'DCS';
$MailDraft_conf['SHOHIN']['0173'] = 'DFP';
$MailDraft_conf['SHOHIN']['0113'] = 'DL';
$MailDraft_conf['SHOHIN']['0115'] = 'DE';
$MailDraft_conf['SHOHIN']['0112'] = 'DW20';
$MailDraft_conf['SHOHIN']['0114'] = 'DML';
$MailDraft_conf['SHOHIN']['0210'] = '�h���X';
$MailDraft_conf['SHOHIN']['9'] = '0250';
$MailDraft_conf['SHOHIN']['0250'] = '���ރh��';

// ��R-#16279_�y�V���i�Ή��z�߂���̌��� 2014/12/15 nul-motoi
$MailDraft_conf['SHOHIN']['10'] = '0260';
$MailDraft_conf['SHOHIN']['0260'] = '�߂���';
// ��R-#16279_�y�V���i�Ή��z�߂���̌��� 2014/12/15 nul-motoi

$OSUSUME_1_KEYWORD = Array("���ϗ����W�F��","���ϗ����ު�");
$OSUSUME_2_KEYWORD = Array("���Ό�");
$OSUSUME_3_KEYWORD = Array("�_���p�b�N","�_���߯�");
$OSUSUME_4_KEYWORD = Array("�ێ��t");
$OSUSUME_5_KEYWORD = Array("�������G�L�X","���������");
$OSUSUME_6_KEYWORD = Array("�N���[���Q�O","�N���[��20","�ذтQ�O","�ذ�20");
$OSUSUME_7_KEYWORD = Array("�ی���t");
$OSUSUME_8_KEYWORD = Array("�f���h���X�N���[��","�f����ڽ�ذ�");
$OSUSUME_SET3_KEYWORD = Array("�����R�_","����3�_");
$OSUSUME_SET4_KEYWORD = Array("��{�S�_","��{4�_");
$OSUSUME_9_KEYWORD = Array("���ރh���z���������N��","�����������ݸ�");
// ��R-#16279_�y�V���i�Ή��z�߂���̌��� 2014/12/15 nul-motoi
$OSUSUME_10_KEYWORD = Array("�߂���̌���");
// ��R-#16279_�y�V���i�Ή��z�߂���̌��� 2014/12/15 nul-motoi


//--------------------------------------------------
//���́F���[�����с@�Ǎ���
//�֐��FCjissekiMail_load
//�����F
//�ߒl�F
//�T�v�F
//--------------------------------------------------
function CjissekiMail_load(&$con, $TantoCD,$RequestKbn,$GyoumuScreen,$GyoumuKbn,$TAIOUCD=null){

	logDebug("CjissekiMail_load[start]");

	$ret = false;

	//------------------------------
	//�S���҃`�F�b�N
	//------------------------------
	if(chkTantoCD($TantoCD)==false){
		return $ret;
	}

	//------------------------------
	//�N�G���[�쐬
	//------------------------------
	$sql  = "SELECT ";
	$sql .= " TAIOUCD";
	$sql .= ",TANTOCD";
	$sql .= ",GYOUMUSCREEN";
	$sql .= ",GYOUMUKBN";
	$sql .= ",TEIKEIFLG";
	$sql .= " FROM CJISSEKI_MAIL_TBL ";
	$sql .= " WHERE TantoCD = '".$TantoCD."'";
	//��2012/11/12 R-#6569_���[���쐬���я��e�[�u���̋Ɩ���ʃJ�����g���Ή�(ulsystems hatano)
	if(trim($GyoumuScreen) != ""){
		$sql .= " AND GyoumuScreen = '".str_pad($GyoumuScreen, 2, '0', STR_PAD_LEFT)."'";
	}else{
		$sql .= " AND GyoumuScreen = '".$GyoumuScreen."'";
	}
	//��2012/11/12 R-#6569_���[���쐬���я��e�[�u���̋Ɩ���ʃJ�����g���Ή�(ulsystems hatano)
	$sql .= " AND GyoumuKbn = '".$GyoumuKbn."'";
	if($TAIOUCD){
		$sql .= " AND TAIOUCD = '".$TAIOUCD."'";
	}
	$sql .= " AND ENDTIME  is null";
	$sql .= " AND SYNC_FLG is null";
	$sql .= " order by regist_dt desc";

	/* �� #1492 WEB�Ǘ��c�[�����і��v��Ή� EC-One Soga 2011-03-29 */
	// DB�ڑ��E�g�����U�N�V���������\�b�h�̊O�Ɉړ�
	//------------------------------
	//DB�ڑ����p�[�X
	//------------------------------
	//$con = dbConnect();
	/* �� #1492 WEB�Ǘ��c�[�����і��v��Ή� EC-One Soga 2011-03-29 */
	$result = ssk_db_parse($con, $sql);

	$data_arr = array();
	$result = dbQuery($con, $sql, true);


	$rows = getNumRows($result, $data_arr);
	logDebug("record rows=".$rows);
	if($rows > 0){
		//------------------------------
		//�f�[�^�擾
		//------------------------------
		$ret = array();
		$ret = dbFetchRow($result, 0, $data_arr);
	}
	dbFreeResult($result);

	logDebug("CjissekiMail_load[end] ret[]=".print_r($ret,1));
	return $ret;
}


//--------------------------------------------------
//���́F���[�����с@�V�K�o�^
//�֐��FCjissekiMail_insert
//�����F
//�ߒl�F
//�T�v�F
//--------------------------------------------------
//��R-#37249_�yH31-0169-001�z�l�b�g�Ɩ��v���[�U�[�̊e�Ή����Ԍv���̂��߂�Web�Ǘ��c�[�����C�˗�_WEB 2019/07/19 saisys-hasegawa
function CjissekiMail_insert(&$con,$TantoCD,$RequestKbn,$GyoumuScreen,$GyoumuKbn,$HyoukaKbn,$kainMailSendCD=NULL){
//��R-#37249_�yH31-0169-001�z�l�b�g�Ɩ��v���[�U�[�̊e�Ή����Ԍv���̂��߂�Web�Ǘ��c�[�����C�˗�_WEB 2019/07/19 saisys-hasegawa

	logDebug("CjissekiMail_insert[start]");

	//------------------------------
	//�S���҃`�F�b�N
	//------------------------------
	if(chkTantoCD($TantoCD)==false){
		return false;
	}

	//------------------------------
	//�N�G���[�쐬
	//------------------------------
	$sql  = "INSERT INTO CJISSEKI_MAIL_TBL (";
	$sql .= " TaiouCD";
	$sql .= ",ShoriDate";
	$sql .= ",TantoCD";
	$sql .= ",StartTime";
	$sql .= ",RequestKbn";
	$sql .= ",GyoumuScreen";
	$sql .= ",GyoumuKbn";
	$sql .= ",HyoukaKbn";
	$sql .= ",HyoukaTime";
	$sql .= ",SYNC_FLG";
	$sql .= ",TEIKEIFLG";
	$sql .= ",UPDATE_DT";
	$sql .= ",REGIST_DT";
	$sql .= ",UPDATE_USER";
	$sql .= ",REGIST_USER";
	//��R-#37249_�yH31-0169-001�z�l�b�g�Ɩ��v���[�U�[�̊e�Ή����Ԍv���̂��߂�Web�Ǘ��c�[�����C�˗�_WEB 2019/07/19 saisys-hasegawa
	if ($kainMailSendCD != NULL) {
		$sql .= ",KAIINMAILSEND_CD";
	}
	//��R-#37249_�yH31-0169-001�z�l�b�g�Ɩ��v���[�U�[�̊e�Ή����Ԍv���̂��߂�Web�Ǘ��c�[�����C�˗�_WEB 2019/07/19 saisys-hasegawa
	$sql .= " )VALUES( ";
	$sql .= " SEQ_TAIOUCD.NEXTVAL";
	$sql .= ",systimestamp";
	$sql .= ",'".$TantoCD."'";
	$sql .= ",to_char(sysdate,'hh24miss')";
	$sql .= ",'".$RequestKbn."'";
	//��2012/11/09 R-#6569_���[���쐬���я��e�[�u���̋Ɩ���ʃJ�����g���Ή�(ulsystems hatano)
	if(trim($GyoumuScreen) != ""){
		$sql .= ",'".str_pad($GyoumuScreen, 2, '0', STR_PAD_LEFT)."'";
	}else{
		$sql .= ",'".$GyoumuScreen."'";
	}
	//��2012/11/09 R-#6569_���[���쐬���я��e�[�u���̋Ɩ���ʃJ�����g���Ή�(ulsystems hatano)
	$sql .= ",'".$GyoumuKbn."'";
	$sql .= ",'0'";

	//$sql .= ",to_char(sysdate,'hh24miss')";
	$sql .= ",NULL";

	$sql .= ",NULL";
	$sql .= ",NULL";
	$sql .= ",sysdate";
	$sql .= ",sysdate";
	$sql .= ",".getSqlValue("TOOL:".$TantoCD);
	$sql .= ",".getSqlValue("TOOL:".$TantoCD);
	//��R-#37249_�yH31-0169-001�z�l�b�g�Ɩ��v���[�U�[�̊e�Ή����Ԍv���̂��߂�Web�Ǘ��c�[�����C�˗�_WEB 2019/07/19 saisys-hasegawa
	if ($kainMailSendCD != NULL) {
		$sql .= ",".getSqlValue($kainMailSendCD);
	}
	//��R-#37249_�yH31-0169-001�z�l�b�g�Ɩ��v���[�U�[�̊e�Ή����Ԍv���̂��߂�Web�Ǘ��c�[�����C�˗�_WEB 2019/07/19 saisys-hasegawa
	$sql .= ")";

	/* �� #1492 WEB�Ǘ��c�[�����і��v��Ή� EC-One Soga 2011-03-29 */
	// DB�ڑ��E�g�����U�N�V���������\�b�h�̊O�Ɉړ�
	//------------------------------
	//DB�ڑ����p�[�X
	//------------------------------
	//$con = dbConnect();
	$result = ssk_db_parse($con, $sql);
	if(!$result) {
		// ���[���o�b�N
		//dbRollback($con);
		dbFreeResult($result);
		dbClose($con);
		return false;
	}
	//------------------------------
	//SQL���s
	//------------------------------
	$ret = putNoTransDbRecord($con,$sql);
	if(!$ret) {
		// ���[���o�b�N
		//dbRollback($con);
		dbFreeResult($ret);
		dbClose($con);
		return false;
	}

	//------------------------------
	//DB�ؒf
	//------------------------------
	//dbClose($con);
	/* �� #1492 WEB�Ǘ��c�[�����і��v��Ή� EC-One Soga 2011-03-29 */

	logDebug("CjissekiMail_insert[end] ret=".$ret);
	return $ret;
}

//--------------------------------------------------
//���́F���[�����с@�X�V
//�֐��FCjissekiMail_update
//�����F
//�ߒl�F
//�T�v�F
//--------------------------------------------------
//��R-#37249_�yH31-0169-001�z�l�b�g�Ɩ��v���[�U�[�̊e�Ή����Ԍv���̂��߂�Web�Ǘ��c�[�����C�˗�_WEB 2019/07/19 saisys-hasegawa
function CjissekiMail_update(&$con,$TantoCD,$RequestKbn,$GyoumuScreen,$GyoumuKbn,$rec_type,$KaiinCD,$TaiouCD,$HyoukaKbn,$TeikeiFlg,$kainMailSendCD=NULL){
//��R-#37249_�yH31-0169-001�z�l�b�g�Ɩ��v���[�U�[�̊e�Ή����Ԍv���̂��߂�Web�Ǘ��c�[�����C�˗�_WEB 2019/07/19 saisys-hasegawa

	logDebug("CjissekiMail_update[start]");

	//------------------------------
	//�S���҃`�F�b�N
	//------------------------------
	if(chkTantoCD($TantoCD)==false){
		return false;
	}

	//------------------------------
	//�N�G���[�쐬
	//------------------------------
	$sql  = "UPDATE CJISSEKI_MAIL_TBL ";
	$sql .= " SET ";
	$sql .= " EndTime      = to_char(sysdate,'hh24miss')";
	$sql .= ",HyoukaKbn    = '".$HyoukaKbn."'";

	//$sql .= ",HyoukaTime   =  to_char(sysdate,'hh24miss')";
	$sql .= ",HyoukaTime = (  ((to_char(sysdate,'hh24') * 60 * 60) + (to_char(sysdate,'mi') * 60 ) + to_char(sysdate,'ss')) - ";
	$sql .= "((SUBSTR(StartTime,1,2) * 60 * 60) + (SUBSTR(StartTime,3,2) * 60 ) + SUBSTR(StartTime,5,2))   )";

	//��R-#37249_�yH31-0169-001�z�l�b�g�Ɩ��v���[�U�[�̊e�Ή����Ԍv���̂��߂�Web�Ǘ��c�[�����C�˗�_WEB 2019/07/19 saisys-hasegawa
	if ($kainMailSendCD != NULL) {
		$sql .= ",KAIINMAILSEND_CD = ".getSqlValue($kainMailSendCD);
	}
	//��R-#37249_�yH31-0169-001�z�l�b�g�Ɩ��v���[�U�[�̊e�Ή����Ԍv���̂��߂�Web�Ǘ��c�[�����C�˗�_WEB 2019/07/19 saisys-hasegawa

	logDebug("rec_type=".$rec_type);
	logDebug("GyoumuKbn=".$GyoumuKbn);

	//�������̏ꍇ�͉���ԍ��͏o�͂��Ȃ��B
	//if($rec_type==0){
	//    $sql .= ",KAIINCD = null ";
	//}else{
	//if($GyoumuKbn==21 || $GyoumuKbn==22 ){
	//    $tmp = putKainCD($KaiinCD);
	//    if($tmp){
	//        $sql .= ",KAIINCD      = '".$tmp."'";
	//    }
	//}else{
	//    if($KaiinCD){
	//        $sql .= ",KAIINCD      = '".$KaiinCD."'";
	//    }
	//}
	//��2011/01/19 #xxxx ����ԍ��ۑ��Ή��iEC-One yoshii�j
	if($GyoumuKbn==18 || $GyoumuKbn==19){
		if($KaiinCD){
			//$sql .= ",KAIINCD      = '".$KaiinCD."'";
			$tmpGID = getPid_to_Gid($GyoumuKbn,$KaiinCD);
			if($tmpGID==0) {
				$tmp = getKainno_pid($GyoumuKbn,$KaiinCD);
			} else {

				$tmpGID2 = getPid_to_Gid($GyoumuKbn,$tmpGID);
				if($tmpGID2==0) {
					$tmp = getKainno_pid($GyoumuKbn,$tmpGID);
				} else {
					$tmp = getKainno_pid($GyoumuKbn,$tmpGID2);
				}
			}
			if($tmp) {
				$sql .= ",KAIINCD='".$tmp."'";
			}
		}
		//��2011/01/19 #xxxx ����ԍ��ۑ��Ή��iEC-One yoshii�j
	}else{
		$tmp = putKainCD($KaiinCD);
		if($tmp){
			$sql .= ",KAIINCD      = '".$tmp."'";
		}
	}
	//}

	$sql .= ",SYNC_FLG='0'";
	$sql .= ",TeikeiFlg = '".$TeikeiFlg."'";
	$sql .= ",UPDATE_DT = sysdate";
	$sql .= ",UPDATE_USER = ".getSqlValue("TOOL:".$TantoCD);
	$sql .= " WHERE TaiouCD ='".$TaiouCD."'";
	$sql .= " AND TantoCD ='".$TantoCD."'";
	$sql .= " AND RequestKbn ='".$RequestKbn."'";
	//��2012/11/12 R-#6569_���[���쐬���я��e�[�u���̋Ɩ���ʃJ�����g���Ή�(ulsystems hatano)
	if(trim($GyoumuScreen) != ""){
		$sql .= " AND GyoumuScreen ='".str_pad($GyoumuScreen, 2, '0', STR_PAD_LEFT)."'";
	}else{
		$sql .= " AND GyoumuScreen ='".$GyoumuScreen."'";
	}
	//��2012/11/12 R-#6569_���[���쐬���я��e�[�u���̋Ɩ���ʃJ�����g���Ή�(ulsystems hatano)
	$sql .= " AND GyoumuKbn ='".$GyoumuKbn."'";
	$sql .= " AND SYNC_FLG is null";


	logDebug("sql=".$sql);

	/* �� #1492 WEB�Ǘ��c�[�����і��v��Ή� EC-One Soga 2011-03-29 */
	// DB�ڑ��E�g�����U�N�V���������\�b�h�̊O�Ɉړ�
	//------------------------------
	//DB�ڑ����p�[�X
	//------------------------------
	//$con = dbConnect();
	$result = ssk_db_parse($con, $sql);
	if(!$result) {
		// ���[���o�b�N
		//dbRollback($con);
		dbFreeResult($result);
		dbClose($con);
		return false;
	}

	//------------------------------
	//SQL���s
	//------------------------------
	$ret = putNoTransDbRecord($con,$sql);
	if(!$ret) {
		// ���[���o�b�N
		//dbRollback($con);
		dbFreeResult($ret);
		dbClose($con);
		return false;
	}

	//------------------------------
	//DB�ؒf
	//------------------------------
	//dbClose($con);
	/* �� #1492 WEB�Ǘ��c�[�����і��v��Ή� EC-One Soga 2011-03-29 */

	logDebug("CjissekiMail_update[end] ret=".$ret);
	return $ret;
}

//--------------------------------------------------
//���́F���[���������@�ꗗ
//�֐��FMailDraft_list
//�����F
//�ߒl�F
//�T�v�F
//--------------------------------------------------
function MailDraft_list(&$con,$TantoCD,$GyoumuKbn,$sw){

	logDebug("MailDraft_list[start]");

	global $salt, $seed, $vector, $dec;
	global $MailDraft_conf;

	$ret = array();


	//------------------------------
	//�S���҃`�F�b�N
	//------------------------------
	if(chkTantoCD($TantoCD)==false){
		return $ret;
	}

	//------------------------------
	//�N�G���[�쐬
	//------------------------------
	$sql  = "SELECT ";
	$sql .= " a.MAILDRAFTCD";
	$sql .= ",a.TantoCD";
	$sql .= ",a.GYOUMUKBN";
	$sql .= ",a.CONTACTID";
	$sql .= ",a.KAIINCD";
	$sql .= ",a.MAIL_NAME";
	$sql .= ",a.MAIL_TO";
	$sql .= ",a.MAIL_KAINNO";
	$sql .= ",a.MAIL_FROM";
	$sql .= ",a.MAIL_SUBJECT";
	$sql .= ",a.MAIL_BODY";
	$sql .= ",a.MAIL_SIGNATURE";
	$sql .= ",a.MAIL_MEMO1";
	$sql .= ",a.MAIL_MEMO2";
	$sql .= ",a.MAIL_CD"; // #1134 2010/08/26 kdl-uchida
    //��2011/03/08 #16 WAO�Ή�(EC-One hatano) �Ή������C��
    $sql .= ",a.MAIL_TAIOUMEMO";
    //��2011/03/08 #16 WAO�Ή�(EC-One hatano) �Ή������C��
	$sql .= ",to_char(a.UPDATE_DT,'YYYY-MM-DD hh24:mi:ss') as UPDATE_DT";
	$sql .= ",b.KAIN_NAME ";
	$sql .= " FROM MAILDRAFT_TBL a,member2_v b";
	$sql .= " WHERE a.KAIINCD   = b.kainno(+) ";

	$sql .= " AND   a.TANTOCD   = '".$TantoCD. "'";

	if($sw==true){
		// HuyDV 2018/05/30 start
		if($GyoumuKbn == '21'){
			$sql .= " AND   (a.GyoumuKbn   = '" . $GyoumuKbn . "' OR a.GyoumuKbn   = '29')";

		} else {
			$sql .= " AND   a.GyoumuKbn   = '" . $GyoumuKbn . "'";
		}
		// HuyDV 2018/05/30 end
	}else{
		$sql .= " AND   a.GYOUMUKBN <> '".$GyoumuKbn ."'";
	}
	$sql .= " order by a.MAILDRAFTCD desc,a.UPDATE_DT desc";

	/* �� #1492 WEB�Ǘ��c�[�����і��v��Ή� EC-One Soga 2011-03-29 */
	// DB�ڑ��E�g�����U�N�V���������\�b�h�̊O�Ɉړ�
	//------------------------------
	//DB�ڑ����p�[�X
	//------------------------------
	//$con = dbConnect();
	$result = ssk_db_parse($con, $sql);

	$data_arr = array();
	$result = dbQuery($con, $sql, true);

	$rows = getNumRows($result, $data_arr);
	logDebug("record rows=".$rows);
	if($rows>0){
		//------------------------------
		//�f�[�^�擾
		//------------------------------
		$ret = array();
		for($i=0; $i<$rows; $i++){
			$row = dbFetchRow($result, $i, $data_arr);

			if(!$row['MAIL_NAME']){
				$row['MAIL_NAME']="";
			}else{
				//�Í����ڂ̕�����
				$row['MAIL_NAME'] = ssk_crypt_decrypt(MCRYPT_RIJNDAEL_256, SSK_CRYPT_MCRYPT_MODE_CTR,$salt, $seed, $vector,$row['MAIL_NAME'], $dec, $error_code);
			}

			if($row['GYOUMUKBN']){
				$wk = $MailDraft_conf['GYOUMUKBN'][$row['GYOUMUKBN']];
				$row['GYOUMUKBN_NAME'] = $wk;
			}else{
				$row['GYOUMUKBN_NAME'] = "";
			}
			$row['KAIINCD'] = putKainCD($row['KAIINCD']);
			$ret[$i]=$row;
		}
	}
	dbFreeResult($result);

	//------------------------------
	//DB�ؒf
	//------------------------------
	//dbClose($con);
	/* �� #1492 WEB�Ǘ��c�[�����і��v��Ή� EC-One Soga 2011-03-29 */

	logDebug("MailDraft_list[end] ret[]=".print_r($ret,1));
	return $ret;
}


//--------------------------------------------------
//���́F���[���������@�Ǎ���
//�֐��FMailDraft_load
//�����F
//�ߒl�F
//�T�v�F
//--------------------------------------------------
function MailDraft_load(&$con,$TantoCD,$GyoumuKbn,$MailDraftCD=null , $kainno=null , $CONTACTID=null){

	logDebug("==============================");
	logDebug("MailDraft_load[start]");

	logDebug("TantoCD    =".$TantoCD);
	logDebug("GyoumuKbn  =".$GyoumuKbn);
	logDebug("MailDraftCD=".$MailDraftCD);
	logDebug("kainno     =".$kainno);
	logDebug("CONTACTID  =".$CONTACTID);


	global $salt, $seed, $vector, $dec;

	$ret = false;


	//------------------------------
	//�S���҃`�F�b�N
	//------------------------------
	if(chkTantoCD($TantoCD)==false){
		return $ret;
	}

	//------------------------------
	//
	//------------------------------
	if($MailDraftCD){
		if($kainno || $CONTACTID){
			//���[���h���t�g�R�[�h���w�肳��Ă���̂ɁA���NO�A�R���^�N�gID���ݒ肳��Ă���ꍇ�̓G���[
			return $ret;
		}
	}else{
		if(!$CONTACTID){
			//���[���h���t�g�R�[�h�����w��Ȃ̂ɁA�R���^�N�gID�����w��Ȃ�΃G���[
			if($GyoumuKbn==18 || $GyoumuKbn==19){
				//�������A�f���̏ꍇ�́u�V�K�o�^�v�̉�������ǂݍ��݂���G���[�ɂ��Ȃ��B
			}else{
				return $ret;
			}
		}
	}

	//------------------------------
	//�N�G���[�쐬
	//------------------------------
	$sql  = "SELECT ";
	$sql .= " a.MAILDRAFTCD";
	$sql .= ",a.TANTOCD";
	$sql .= ",a.GYOUMUKBN";
	$sql .= ",a.CONTACTID";
	$sql .= ",a.KAIINCD";
	$sql .= ",a.MAIL_NAME";
	$sql .= ",a.MAIL_TO";
	$sql .= ",a.MAIL_KAINNO";
	$sql .= ",a.MAIL_FROM";
	$sql .= ",a.MAIL_SUBJECT";
	$sql .= ",a.MAIL_BODY";
	$sql .= ",a.MAIL_SIGNATURE";
	$sql .= ",a.MAIL_MEMO1";
	$sql .= ",a.MAIL_MEMO2";
	$sql .= ",a.MAIL_TEIKEIFLG";
	$sql .= ",a.MAIL_CD"; // #1134 2010/08/26 kdl-uchida
	//��2011/03/08 #16 WAO�Ή�(EC-One hatano) �Ή������C��
    $sql .= ",a.MAIL_TAIOUMEMO";
    //��2011/03/08 #16 WAO�Ή�(EC-One hatano) �Ή������C��

	// ��R-#16279_�y�V���i�Ή��z�߂���̌��� 2014/12/15 nul-motoi
	// ���߂���̌����ǉ��ɔ����A���[�v�J�E���g��+1
	for($i=1;$i<=10;$i++){
		$sql .= ",a.SHOHIN".$i."_CD";
	}
	// ��R-#16279_�y�V���i�Ή��z�߂���̌��� 2014/12/15 nul-motoi

	$sql .= ",to_char(a.UPDATE_DT,'YYYY-MM-DD hh24:mi:ss') as UPDATE_DT";
	$sql .= ",b.KAIN_NAME ";
	$sql .= " FROM MAILDRAFT_TBL a,member2_v b";

	$sql .= " WHERE a.KAIINCD   = b.kainno(+) ";
	$sql .= " AND   a.TantoCD     = '".$TantoCD."'";
	$sql .= " AND   a.GyoumuKbn   = '".$GyoumuKbn."'";


	//--------------------------------------------------
	//�L�[�ɂȂ��Ă��鍀�ڂ̃f�[�^������Ώ�����ݒ肷��B
	//�i�K�v�L���̏�������͏�L�ł����Ȃ��Ă���B�j
	//--------------------------------------------------
	if($MailDraftCD){
		$sql .= " AND   a.MailDraftCD = '".$MailDraftCD."'";
	}else{
		if($kainno){
			$tmp = putKainCD($kainno);
			if($tmp){
				$sql .= " AND   a.KAIINCD = '".$tmp."'";
			}else{
				$sql .= " AND   a.KAIINCD is null ";
			}
		}
		if($CONTACTID){
			$sql .= " AND   a.CONTACTID = '".$CONTACTID."'";
		}else{
			if($GyoumuKbn==18 || $GyoumuKbn==19){
				//�f���́u�V�K�o�^�v�̏ꍇ�́A��������ǂݍ��݂���G���[�ɂ��Ȃ��B
				$sql .= " AND   a.CONTACTID is null";
			}
		}
    }
    logDebug("sql=".$sql);

	/* �� #1492 WEB�Ǘ��c�[�����і��v��Ή� EC-One Soga 2011-03-29 */
	// DB�ڑ��E�g�����U�N�V���������\�b�h�̊O�Ɉړ�
	//------------------------------
	//DB�ڑ����p�[�X
	//------------------------------
	//$con = dbConnect();
	$result = ssk_db_parse($con, $sql);

	$data_arr = array();
	$result = dbQuery($con, $sql, true);
	$rows = getNumRows($result, $data_arr);

	logDebug("record rows=".$rows);
	if($rows>0){

		$ret = array();
		$ret = dbFetchRow($result, 0, $data_arr);

		//�Í����ڂ̕�����
		$ret['MAIL_NAME'] = ssk_crypt_decrypt(MCRYPT_RIJNDAEL_256, SSK_CRYPT_MCRYPT_MODE_CTR,$salt, $seed, $vector,$ret['MAIL_NAME'], $dec, $error_code);
		$ret['MAIL_TO']   = ssk_crypt_decrypt(MCRYPT_RIJNDAEL_256, SSK_CRYPT_MCRYPT_MODE_CTR,$salt, $seed, $vector,$ret['MAIL_TO']  , $dec, $error_code);
	}

	dbFreeResult($result);

	//------------------------------
	//DB�ؒf
	//------------------------------
	//dbClose($con);
	/* �� #1492 WEB�Ǘ��c�[�����і��v��Ή� EC-One Soga 2011-03-29 */

	logDebug("MailDraft_load[end] ret[]=".print_r($ret,1));
	logDebug("==============================");

	return $ret;
}

//--------------------------------------------------
//���́F���[���������@�V�K�o�^
//�֐��FMailDraft_insert
//�����F
//�ߒl�F
//�T�v�F
//--------------------------------------------------
//��R-#37249_�yH31-0169-001�z�l�b�g�Ɩ��v���[�U�[�̊e�Ή����Ԍv���̂��߂�Web�Ǘ��c�[�����C�˗�_WEB 2019/07/19 saisys-hasegawa
//function MailDraft_insert(&$con,$TantoCD,$GyoumuKbn,$DraftData){
function MailDraft_insert(&$con,$TantoCD,$GyoumuKbn,$DraftData,&$newMailDraftCD=NULL){
//��R-#37249_�yH31-0169-001�z�l�b�g�Ɩ��v���[�U�[�̊e�Ή����Ԍv���̂��߂�Web�Ǘ��c�[�����C�˗�_WEB 2019/07/19 saisys-hasegawa

	logDebug("----------");
	logDebug("MailDraft_insert[start]");

	logDebug("DraftData[]=".print_r($DraftData,1));
	global $salt, $seed, $vector, $base64_enc;
	global $MailDraft_conf;

	$ret = false;

	//------------------------------
	//�S���҃`�F�b�N
	//------------------------------
	if(chkTantoCD($TantoCD)==false){
		return $ret;
	}

	//------------------------------
	//�N�G���[�쐬
	//------------------------------
	$sql  = "INSERT INTO MAILDRAFT_TBL (";
	$sql .= " MailDraftCD";
	$sql .= ",TantoCD";
	$sql .= ",GyoumuKbn";
	$sql .= ",ContactID";
	$sql .= ",KaiinCD";
	$sql .= ",MAIL_NAME";
	$sql .= ",MAIL_TO";
	$sql .= ",MAIL_KAINNO";
	$sql .= ",MAIL_FROM";
	$sql .= ",MAIL_SUBJECT";
	$sql .= ",MAIL_BODY";
	$sql .= ",MAIL_SIGNATURE";
    //��2011/03/08 #16 WAO�Ή�(EC-One hatano) �Ή������C��
	//$sql .= ",MAIL_MEMO1";
    $sql .= ",MAIL_TAIOUMEMO";
	//$sql .= ",MAIL_MEMO2";
    //��2011/03/08 #16 WAO�Ή�(EC-One hatano) �Ή������C��
	$sql .= ",MAIL_TEIKEIFLG";
	$sql .= ",UPDATE_DT";
	$sql .= ",REGIST_DT";
	$sql .= ",UPDATE_USER";
	$sql .= ",REGIST_USER";

	// ��R-#16279_�y�V���i�Ή��z�߂���̌��� 2014/12/15 nul-motoi
	// ���߂���̌����ǉ��ɔ����A���[�v�J�E���g��+1
	for($i=1;$i<=10;$i++){
		$sql .= ",SHOHIN".$i."_CD";
	}
	// ��R-#16279_�y�V���i�Ή��z�߂���̌��� 2014/12/15 nul-motoi

	$sql .= ",MAIL_CD"; // #1134 2010/08/26 kdl-uchida

	$sql .= " ) VALUES ( ";

	//�� #1238 ���[�����M�@�\�S�Ă���A�A�h�o�C�X�y�[�W�쐬���\�� 2010/08/16 kdl-uchida
	if($GyoumuKbn==21 && isset($_SESSION['2010advice']['cvoice_id']) && !is_null($_SESSION['2010advice']['cvoice_id'])){
		$sql .= "'".$_SESSION['2010advice']['cvoice_id']. "'";
	    //��R-#37249_�yH31-0169-001�z�l�b�g�Ɩ��v���[�U�[�̊e�Ή����Ԍv���̂��߂�Web�Ǘ��c�[�����C�˗�_WEB 2019/07/19 saisys-hasegawa
		$newMailDraftCD = $_SESSION['2010advice']['cvoice_id'];
	    //��R-#37249_�yH31-0169-001�z�l�b�g�Ɩ��v���[�U�[�̊e�Ή����Ԍv���̂��߂�Web�Ǘ��c�[�����C�˗�_WEB 2019/07/19 saisys-hasegawa
	}else{
	    //��R-#37249_�yH31-0169-001�z�l�b�g�Ɩ��v���[�U�[�̊e�Ή����Ԍv���̂��߂�Web�Ǘ��c�[�����C�˗�_WEB 2019/07/19 saisys-hasegawa
		//$sql .= " SEQ_MAILDRAFTCD.NEXTVAL";
		$newMailDraftCD = getMailDraftCD();
		$sql .= "'".$newMailDraftCD. "'";
	    //��R-#37249_�yH31-0169-001�z�l�b�g�Ɩ��v���[�U�[�̊e�Ή����Ԍv���̂��߂�Web�Ǘ��c�[�����C�˗�_WEB 2019/07/19 saisys-hasegawa
	}
	//�� #1238 ���[�����M�@�\�S�Ă���A�A�h�o�C�X�y�[�W�쐬���\�� 2010/08/16 kdl-uchida
	$sql .= ",'".$TantoCD."'";
	$sql .= ",'".$GyoumuKbn."'";

	if($GyoumuKbn==18 || $GyoumuKbn==19){
		if($DraftData['pid']){
			$sql .= ",'".$DraftData['pid']."'";
		}else{
			$sql .= ",null";
		}
	}else if($GyoumuKbn==21 || $GyoumuKbn==22){
		$sql .= ",'0'";
	}else{
		if($DraftData['econorderid']){
			$sql .= ",'".$DraftData['econorderid']."'";

		}else if($DraftData['cvid']){
			$sql .= ",'".$DraftData['cvid']."'";
		// 2018/05/25 HuyDV start
		}else if($DraftData['mailTraceId']){
			$sql .= ",'".$DraftData['mailTraceId']."'";
		} else{
		// 2018/05/25 HuyDV end
			$sql .= ",null";
		}
	}

	//��2011/01/19 #xxxx ����ԍ��ۑ��Ή��iEC-One yoshii�j
	//$tmp = putKainCD($DraftData['cd']);
	if($GyoumuKbn==18 || $GyoumuKbn==19){
		$tmp = getKainno_pid($GyoumuKbn,$DraftData['pid']);
	}else{
		$tmp = putKainCD($DraftData['cd']);
		//if(!$tmp){
		//    $tmp = putKainCD($DraftData['KAINNO']);
		//}
	}
	//��2011/01/19 #xxxx ����ԍ��ۑ��Ή��iEC-One yoshii�j

	logDebug("debug tmp=".$tmp);
	if($tmp){
		$sql .= ",'".$tmp."'";
	}else{
		$sql .= ",null";
	}

	if($GyoumuKbn==18 || $GyoumuKbn==19){
		if($DraftData['staffname']){
			//�Í����ڂ̈Í���
			$key = '8WPMhCRgLHzjNpSSO/PiKbvLKjDTlGHAJ7Gfvrgjzv4=';
			$key2 = ssk_crypt_encrypt(MCRYPT_RIJNDAEL_256, SSK_CRYPT_MCRYPT_MODE_CTR,$salt, $seed, $DraftData['staffname'],$key, $output, $error_code);
			$sql .= ",'".$key2."'";
		}else{
			$sql .= ",null";
		}
	}else{
		if($DraftData['mlName']){
			//�Í����ڂ̈Í���
			$key = '8WPMhCRgLHzjNpSSO/PiKbvLKjDTlGHAJ7Gfvrgjzv4=';
			$key2 = ssk_crypt_encrypt(MCRYPT_RIJNDAEL_256, SSK_CRYPT_MCRYPT_MODE_CTR,$salt, $seed, $DraftData['mlName'],$key, $output, $error_code);
			$sql .= ",'".$key2."'";

		}else{
			$sql .= ",null";
		}
	}

	if($DraftData['mlTo']){
		//�Í����ڂ̈Í���
		$key = '8WPMhCRgLHzjNpSSO/PiKbvLKjDTlGHAJ7Gfvrgjzv4=';
		$key2 = ssk_crypt_encrypt(MCRYPT_RIJNDAEL_256, SSK_CRYPT_MCRYPT_MODE_CTR,$salt, $seed, $DraftData['mlTo'],$key, $output, $error_code);
		$sql .= ",'".$key2."'";

	}else{
		$sql .= ",null";
	}

	//��2011/01/19 #xxxx ����ԍ��ۑ��Ή��iEC-One yoshii�j
	//$tmp = putKainCD($DraftData['KAINNO']);
	if($GyoumuKbn==18 || $GyoumuKbn==19){
		$tmp = getKainno_pid($GyoumuKbn,$DraftData['pid']);
	}else{
		$tmp = putKainCD($DraftData['KAINNO']);
	}
	//��2011/01/19 #xxxx ����ԍ��ۑ��Ή��iEC-One yoshii�j
	if($tmp){
		$sql .= ",'".$tmp."'";
	}else{
		$sql .= ",null";
	}


	if(strpos($DraftData['mlFrom'],$MailDraft_conf['MAIL_FROM'][0])==true){
		//��R-#39533_�yH31-0016-048�zWEB�Ǘ��c�[���̌Ή����[���̍��o�l�ύX�Ή� 2020/01/18 saisys-hasegawa
		if(strpos($DraftData['mlFrom'],'�h���z���������N��') !== false){
			$sql .= ",'4'";
		} else {
			$sql .= ",'0'";
		}
		//��R-#39533_�yH31-0016-048�zWEB�Ǘ��c�[���̌Ή����[���̍��o�l�ύX�Ή� 2020/01/18 saisys-hasegawa

	}else if(strpos($DraftData['mlFrom'],$MailDraft_conf['MAIL_FROM'][1])==true){
		$sql .= ",'1'";

	}else if(strpos($DraftData['mlFrom'],$MailDraft_conf['MAIL_FROM'][2])==true){
		$sql .= ",'2'";

	}else if(strpos($DraftData['mlFrom'],$MailDraft_conf['MAIL_FROM'][3])==true){
		$sql .= ",'3'";

	}else{
		$sql .= ",null";
	}



	if($GyoumuKbn==18 || $GyoumuKbn==19){

		if($DraftData['msgtitle']){
// ���yH29-00035-04�z�y�s��Ή��z�@WEB�Ǘ��c�[����ʁi(PC)�ʃ��[�����M�j�̃f�[�^�ۑ��s�Ή� --2016/07/31 sai_matsuoka
			$sql .= ",".getSqlValue($DraftData['msgtitle']);
// ���yH29-00035-04�z�y�s��Ή��z�@WEB�Ǘ��c�[����ʁi(PC)�ʃ��[�����M�j�̃f�[�^�ۑ��s�Ή� --2016/07/31 sai_matsuoka
		}else{
			$sql .= ",null";
		}

		if($DraftData['msg']){
			//$sql .= ",'".$DraftData['msg']."'";
			$sql .= ",".putCLOB($DraftData['msg']);
		}else{
			$sql .= ",null";
		}

	}else{
		if($DraftData['mlSubject']){
// ���yH29-00035-04�z�y�s��Ή��z�@WEB�Ǘ��c�[����ʁi(PC)�ʃ��[�����M�j�̃f�[�^�ۑ��s�Ή� --2016/07/31 sai_matsuoka
			$sql .= ",".getSqlValue($DraftData['mlSubject']);
// ���yH29-00035-04�z�y�s��Ή��z�@WEB�Ǘ��c�[����ʁi(PC)�ʃ��[�����M�j�̃f�[�^�ۑ��s�Ή� --2016/07/31 sai_matsuoka
		}else{
			$sql .= ",null";
		}

		if($DraftData['mlBody']){
			//$sql .= ",'".$DraftData['mlBody']."'";
			$sql .= ",".putCLOB($DraftData['mlBody']);
		}else{
			$sql .= ",null";
		}
	}


	if($DraftData['mlSignature']){
// ���yH29-00035-04�z�y�s��Ή��z�@WEB�Ǘ��c�[����ʁi(PC)�ʃ��[�����M�j�̃f�[�^�ۑ��s�Ή� --2016/07/31 sai_matsuoka
		$sql .= ",".getSqlValue($DraftData['mlSignature']);
// ���yH29-00035-04�z�y�s��Ή��z�@WEB�Ǘ��c�[����ʁi(PC)�ʃ��[�����M�j�̃f�[�^�ۑ��s�Ή� --2016/07/31 sai_matsuoka
	}else{
		$sql .= ",null";
	}

    //��2011/03/08 #16 WAO�Ή�(EC-One hatano) �Ή������C��
    /*
	if($DraftData['Memo']){
		$sql .= ",'".$DraftData['Memo']."'";
	}else{
		$sql .= ",null";
	}

	if($DraftData['Memo2']){
		$sql .= ",'".$DraftData['Memo2']."'";
	}else{
		$sql .= ",null";
	}
    */
    if($DraftData['Memo']){
// ���yH29-00035-04�z�y�s��Ή��z�@WEB�Ǘ��c�[����ʁi(PC)�ʃ��[�����M�j�̃f�[�^�ۑ��s�Ή� --2016/07/31 sai_matsuoka
        $sql .= ",".getSqlValue($DraftData['Memo']);
// ���yH29-00035-04�z�y�s��Ή��z�@WEB�Ǘ��c�[����ʁi(PC)�ʃ��[�����M�j�̃f�[�^�ۑ��s�Ή� --2016/07/31 sai_matsuoka
    }else{
        $sql .= ",null";
    }
    //��2011/03/08 #16 WAO�Ή�(EC-One hatano) �Ή������C��

	//��R-#2921 ��^��20�Ή�(1:��^ 2:20�Ή� 3:�ʂɕύX) 2012/02/10 ul-fuse
	if($DraftData['TEIKEIFLG']=='1' || $DraftData['TEIKEIFLG']=='2' || $DraftData['TEIKEIFLG']=='3'){
	//��R-#2921 ��^��20�Ή�(1:��^ 2:20�Ή� 3:�ʂɕύX) 2012/02/10 ul-fuse
		$sql .= ",'".$DraftData['TEIKEIFLG']."'";
	}else{
		$sql .= ",null";
	}

	$sql .= ",sysdate";
	$sql .= ",sysdate";
	$sql .= ",".getSqlValue("TOOL:".$TantoCD);
	$sql .= ",".getSqlValue("TOOL:".$TantoCD);

	// ��R-#16279_�y�V���i�Ή��z�߂���̌��� 2014/12/15 nul-motoi
	// ���߂���̌����ǉ��ɔ����A���[�v�J�E���g��+1
	for($i=1;$i<=10;$i++){
		if( $DraftData['OSUSUME_'.$i] ){
			$sql .= ",'".$DraftData['OSUSUME_'.$i]."'";
		}else{
			$sql .= ",null";
		}
	}
	// ��R-#16279_�y�V���i�Ή��z�߂���̌��� 2014/12/15 nul-motoi

	$sql .= ",".getSqlValue($DraftData['code']);

	$sql .= ")";

	logDebug("DraftData=".print_r($DraftData,1));
	logDebug("sql=".$sql);

	/* �� #1492 WEB�Ǘ��c�[�����і��v��Ή� EC-One Soga 2011-03-29 */
	// DB�ڑ��E�g�����U�N�V���������\�b�h�̊O�Ɉړ�
	//------------------------------
	//DB�ڑ����p�[�X
	//------------------------------
	//$con = dbConnect();
	$result = ssk_db_parse($con, $sql);
	if(!$result) {
		//dbRollback($con);
		dbFreeResult($result);
		dbClose($con);
		return false;
	}

	//------------------------------
	//SQL���s
	//------------------------------
	$ret = putNoTransDbRecord($con,$sql);
	if(!$ret) {
		//dbRollback($con);
		dbFreeResult($ret);
		dbClose($con);
		return false;
	}

	//------------------------------
	//DB�ؒf
	//------------------------------
	//dbClose($con);
	/* �� #1492 WEB�Ǘ��c�[�����і��v��Ή� EC-One Soga 2011-03-29 */

	logDebug("MailDraft_insert[end] ret=".$ret);
	logDebug("----------");
	return $ret;
}

//--------------------------------------------------
//���́F���[���������@�X�V
//�֐��FMailDraft_update
//�����F
//�ߒl�F
//�T�v�F
//--------------------------------------------------
function MailDraft_update(&$con,$TantoCD,$GyoumuKbn,$ContactID,$DraftData){

	logDebug("----------");
	logDebug("MailDraft_update[start]");

	logDebug("DraftData[]=".print_r($DraftData,1));
	global $salt, $seed, $vector, $base64_enc;
	global $MailDraft_conf;

	//------------------------------
	//�S���҃`�F�b�N
	//------------------------------
	if(chkTantoCD($TantoCD)==false){
		return false;
	}

	//------------------------------
	//�N�G���[�쐬
	//------------------------------
	$sql  = "UPDATE MAILDRAFT_TBL";
	$sql .= " set";


	if($GyoumuKbn==21 || $GyoumuKbn==22){
		$sql .= " ContactID ='0'";
	}else if($GyoumuKbn==18 || $GyoumuKbn==19){
		if($DraftData['pid']){
			$sql .= " ContactID     ='".$DraftData['pid']."'";
		}else{
			$sql .= " ContactID     =null";
		}
	// 2018/05/25 HuyDV start
	}else if($GyoumuKbn==29){
			if($DraftData['mailTraceId']){
				$sql .= " ContactID ='".$DraftData['mailTraceId']."'";
			}
	// 2018/05/25 HuyDV end
	}else{
		if($DraftData['econorderid']){
			$sql .= " ContactID     ='".$DraftData['econorderid']."'";
		}else if($DraftData['cvid']){
			$sql .= " ContactID     ='".$DraftData['cvid']."'";
		}else{
			$sql .= " ContactID     =null";
		}
	}

	//��2011/01/19 #xxxx ����ԍ��ۑ��Ή��iEC-One yoshii�j
	//$tmp = putKainCD($DraftData['cd']);
	if($GyoumuKbn==18 || $GyoumuKbn==19){
		$tmp = getKainno_pid($GyoumuKbn,$DraftData['pid']);
	}else{
		$tmp = putKainCD($DraftData['cd']);
		//if(!$tmp){
		//    $tmp = putKainCD($DraftData['KAINNO']);
		//}
	}
	//��2011/01/19 #xxxx ����ԍ��ۑ��Ή��iEC-One yoshii�j
	if($tmp){
		$sql .= ",KaiinCD='".$tmp."'";
	}else{
		$sql .= ",KaiinCD=null";
	}

	if($GyoumuKbn==18 || $GyoumuKbn==19){

		if($DraftData['staffname']){
			//�Í����ڂ̈Í���
			$key = '8WPMhCRgLHzjNpSSO/PiKbvLKjDTlGHAJ7Gfvrgjzv4=';
			$key2 = ssk_crypt_encrypt(MCRYPT_RIJNDAEL_256, SSK_CRYPT_MCRYPT_MODE_CTR,$salt, $seed, $DraftData['staffname'], $key  , $output, $error_code);
			$sql .= ",MAIL_NAME='".$key2."'";
		}else{
			$sql .= ",MAIL_NAME=null";
		}

	}else{
		if($DraftData['mlName']){
			//�Í����ڂ̈Í���
			$key = '8WPMhCRgLHzjNpSSO/PiKbvLKjDTlGHAJ7Gfvrgjzv4=';
			$key2 = ssk_crypt_encrypt(MCRYPT_RIJNDAEL_256, SSK_CRYPT_MCRYPT_MODE_CTR,$salt, $seed, $DraftData['mlName'], $key  , $output, $error_code);
			$sql .= ",MAIL_NAME='".$key2."'";
			logDebug($key2);
		}else{
			$sql .= ",MAIL_NAME=null";
		}
	}

	if($DraftData['mlTo']){
		//�Í����ڂ̈Í���
		$key = '8WPMhCRgLHzjNpSSO/PiKbvLKjDTlGHAJ7Gfvrgjzv4=';
		$key2 = ssk_crypt_encrypt(MCRYPT_RIJNDAEL_256, SSK_CRYPT_MCRYPT_MODE_CTR,$salt, $seed, $DraftData['mlTo'],$key, $output, $error_code);
		$sql .= ",MAIL_TO='".$key2."'";
	}else{
		$sql .= ",MAIL_TO=null";
	}

	//��2011/01/19 #xxxx ����ԍ��ۑ��Ή��iEC-One yoshii�j
	//$tmp = putKainCD($DraftData['KAINNO']);
	if($GyoumuKbn==18 || $GyoumuKbn==19){
		$tmp = getKainno_pid($GyoumuKbn,$DraftData['pid']);
	}else{
		$tmp = putKainCD($DraftData['KAINNO']);
	}
	//��2011/01/19 #xxxx ����ԍ��ۑ��Ή��iEC-One yoshii�j
	if($tmp){
		$sql .= ",MAIL_KAINNO='".$tmp."'";
	}else{
		$sql .= ",MAIL_KAINNO=null";
	}

	if(strpos($DraftData['mlFrom'],$MailDraft_conf['MAIL_FROM'][0])==true){
		//��R-#39533_�yH31-0016-048�zWEB�Ǘ��c�[���̌Ή����[���̍��o�l�ύX�Ή� 2020/01/18 saisys-hasegawa
		if(strpos($DraftData['mlFrom'],'�h���z���������N��') !== false){
			$sql .= ",MAIL_FROM = '4'";
		} else {
			$sql .= ",MAIL_FROM = '0'";
		}
		//��R-#39533_�yH31-0016-048�zWEB�Ǘ��c�[���̌Ή����[���̍��o�l�ύX�Ή� 2020/01/18 saisys-hasegawa

	}else if(strpos($DraftData['mlFrom'],$MailDraft_conf['MAIL_FROM'][1])==true){
		$sql .= ",MAIL_FROM = '1'";

	}else if(strpos($DraftData['mlFrom'],$MailDraft_conf['MAIL_FROM'][2])==true){
		$sql .= ",MAIL_FROM = '2'";

	}else if(strpos($DraftData['mlFrom'],$MailDraft_conf['MAIL_FROM'][3])==true){
		$sql .= ",MAIL_FROM = '3'";

	}else{
		$sql .= ",MAIL_FROM = null";
	}

	if($GyoumuKbn==18 || $GyoumuKbn==19){
// ���yH29-00035-04�z�y�s��Ή��z�@WEB�Ǘ��c�[����ʁi(PC)�ʃ��[�����M�j�̃f�[�^�ۑ��s�Ή� --2016/07/31 sai_matsuoka
		$sql .= ",MAIL_SUBJECT  =".getSqlValue($DraftData['msgtitle']);
// ���yH29-00035-04�z�y�s��Ή��z�@WEB�Ǘ��c�[����ʁi(PC)�ʃ��[�����M�j�̃f�[�^�ۑ��s�Ή� --2016/07/31 sai_matsuoka
		//$sql .= ",MAIL_BODY     ='".$DraftData['msg']."'";
		$sql .= ",MAIL_BODY     =".putCLOB($DraftData['msg']);
	}else{
// ���yH29-00035-04�z�y�s��Ή��z�@WEB�Ǘ��c�[����ʁi(PC)�ʃ��[�����M�j�̃f�[�^�ۑ��s�Ή� --2016/07/31 sai_matsuoka
		$sql .= ",MAIL_SUBJECT  =".getSqlValue($DraftData['mlSubject']);
// ���yH29-00035-04�z�y�s��Ή��z�@WEB�Ǘ��c�[����ʁi(PC)�ʃ��[�����M�j�̃f�[�^�ۑ��s�Ή� --2016/07/31 sai_matsuoka
		//$sql .= ",MAIL_BODY     ='".$DraftData['mlBody']."'";
		$sql .= ",MAIL_BODY     =".putCLOB($DraftData['mlBody']);
	}

// ���yH29-00035-04�z�y�s��Ή��z�@WEB�Ǘ��c�[����ʁi(PC)�ʃ��[�����M�j�̃f�[�^�ۑ��s�Ή� --2016/07/31 sai_matsuoka
	$sql .= ",MAIL_SIGNATURE=".getSqlValue($DraftData['mlSignature']);
// ���yH29-00035-04�z�y�s��Ή��z�@WEB�Ǘ��c�[����ʁi(PC)�ʃ��[�����M�j�̃f�[�^�ۑ��s�Ή� --2016/07/31 sai_matsuoka

	$sql .= ",MAIL_TEIKEIFLG ='".$DraftData['TEIKEIFLG']."'";

	// ��R-#16279_�y�V���i�Ή��z�߂���̌��� 2014/12/15 nul-motoi
	// ���߂���̌����ǉ��ɔ����A���[�v�J�E���g��+1
	for($i=1;$i<=10;$i++){
		if( $DraftData['OSUSUME_'.$i] ){
			$sql .= ",SHOHIN".$i."_CD='".$DraftData['OSUSUME_'.$i]."'";
		}else{
			$sql .= ",SHOHIN".$i."_CD=null";
		}
	}
	// ��R-#16279_�y�V���i�Ή��z�߂���̌��� 2014/12/15 nul-motoi


	$sql .= ",UPDATE_DT    = sysdate";
	$sql .= ",UPDATE_USER  = ".getSqlValue("TOOL:".$TantoCD);

	$sql .= ",MAIL_CD  = ".getSqlValue($DraftData['code']); // #1134 2010/08/26 kdl-uchida
// ���yH29-00035-04�z�y�s��Ή��z�@WEB�Ǘ��c�[����ʁi(PC)�ʃ��[�����M�j�̃f�[�^�ۑ��s�Ή� --2016/07/31 sai_matsuoka
    $sql .= ",MAIL_TAIOUMEMO =".getSqlValue($DraftData['Memo']);
// ���yH29-00035-04�z�y�s��Ή��z�@WEB�Ǘ��c�[����ʁi(PC)�ʃ��[�����M�j�̃f�[�^�ۑ��s�Ή� --2016/07/31 sai_matsuoka

	$sql .= " WHERE TANTOCD    = '".$TantoCD."'";
	$sql .= " AND   GYOUMUKBN  = '".$GyoumuKbn."'";
	$sql .= " AND   MAILDRAFTCD= '".$DraftData['MDCD']."'";

	logDebug("sql=".$sql);

	/* �� #1492 WEB�Ǘ��c�[�����і��v��Ή� EC-One Soga 2011-03-29 */
	// DB�ڑ��E�g�����U�N�V���������\�b�h�̊O�Ɉړ�
	//------------------------------
	//DB�ڑ����p�[�X
	//------------------------------
	//$con = dbConnect();
	$result = ssk_db_parse($con, $sql);
	if(!$result) {
		//dbRollback($con);
		dbFreeResult($result);
		dbClose($con);
		return false;
	}

	//------------------------------
	//SQL���s
	//------------------------------
	$ret = putNoTransDbRecord($con,$sql);
	if(!$ret) {
		//dbRollback($con);
		dbFreeResult($ret);
		dbClose($con);
		return false;
	}

	//------------------------------
	//DB�ؒf
	//------------------------------
	//dbClose($con);
	/* �� #1492 WEB�Ǘ��c�[�����і��v��Ή� EC-One Soga 2011-03-29 */

	logDebug("MailDraft_update[end] ret=".$ret);
	logDebug("----------");
	return $ret;
}


//--------------------------------------------------
//
//--------------------------------------------------
function putCLOB($dat){

	$clob = "";

	if(mb_strLen($dat) < 2000 ){
// ���yH29-00035-04�z�y�s��Ή��z�@WEB�Ǘ��c�[����ʁi(PC)�ʃ��[�����M�j�̃f�[�^�ۑ��s�Ή� --2016/07/31 sai_matsuoka
		$clob = "TO_CLOB(".getSqlValue($dat).")";
// ���yH29-00035-04�z�y�s��Ή��z�@WEB�Ǘ��c�[����ʁi(PC)�ʃ��[�����M�j�̃f�[�^�ۑ��s�Ή� --2016/07/31 sai_matsuoka

	}else{
		$tmp = array();
		$c=0;
		$cmax=1990;
		$y=0;

		for($i=0;$i<mb_strLen($dat);$i++){
			$c++;
			$tmp[$y] .= mb_substr($dat, $i, 1);
			if($c>=$cmax){
				$c=0;
				$y++;
			}
		}

		for($i=0;$i<=$y;$i++){
			if($i>0){
				$clob .= " || ";
			}
// ���yH29-00035-04�z�y�s��Ή��z�@WEB�Ǘ��c�[����ʁi(PC)�ʃ��[�����M�j�̃f�[�^�ۑ��s�Ή� --2016/07/31 sai_matsuoka
			$clob .= "TO_CLOB(".getSqlValue($tmp[$i]).")";
// ���yH29-00035-04�z�y�s��Ή��z�@WEB�Ǘ��c�[����ʁi(PC)�ʃ��[�����M�j�̃f�[�^�ۑ��s�Ή� --2016/07/31 sai_matsuoka
		}
	}

	return $clob;
}


//--------------------------------------------------
//���́F���[���������@�폜
//�֐��FMailDraft_delete
//�����F
//�ߒl�F
//�T�v�F
//--------------------------------------------------
//HuyDV 2018/06/04 update start
function MailDraft_delete(&$con,$TantoCD,$GyoumuKbn,$MAILDRAFTCD, $mailTraceId = null){

	logDebug("MailDraft_delete[start]");

	//------------------------------
	//�S���҃`�F�b�N
	//------------------------------
	if(chkTantoCD($TantoCD)==false && !$mailTraceId){
		return false;
	}

	//------------------------------
	//
	//------------------------------
	if(!$MAILDRAFTCD && !$mailTraceId){
		return false;
	}

	//------------------------------
	//�N�G���[�쐬
	//------------------------------
	if($mailTraceId && $GyoumuKbn == '29'){
		$sql  = "DELETE MAILDRAFT_TBL";
		$sql .= " WHERE ContactID = '".$mailTraceId."'";
	} else {
		$sql  = "DELETE MAILDRAFT_TBL";

		$sql .= " WHERE MAILDRAFTCD = '".$MAILDRAFTCD."'";
		$sql .= " AND   TantoCD     = '".$TantoCD."'";
		//$sql .= " AND   GyoumuKbn   = '".$GyoumuKbn."'";
	}
	//HuyDV 2018/06/04 update end
	logDebug("sql=".$sql);

	/* �� #1492 WEB�Ǘ��c�[�����і��v��Ή� EC-One Soga 2011-03-29 */
	// DB�ڑ��E�g�����U�N�V���������\�b�h�̊O�Ɉړ�
	//------------------------------
	//SQL���s
	//------------------------------
	//$con = dbConnect();
	$result = ssk_db_parse($con, $sql);
	if(!$result) {
		//dbRollback($con);
		dbFreeResult($result);
		dbClose($con);
		return false;
	}
	$ret = putNoTransDbRecord($con,$sql);
	if(!$ret) {
		//dbRollback($con);
		dbFreeResult($ret);
		dbClose($con);
		return false;
	}
	//dbClose($con);
	/* �� #1492 WEB�Ǘ��c�[�����і��v��Ή� EC-One Soga 2011-03-29 */

	logDebug("MailDraft_delete[end] ret=".$ret);
	return $ret;
}

//--------------------------------------------------
//���́F���R�[�h�R�~�b�g
//�֐��FputDbRecord
//�����F
//�ߒl�F
//�T�v�F
//--------------------------------------------------
function putDbRecord($con,$sql){

	$ret = false;

	logDebug("bigin");
	dbBegin($con);

	$result = dbQuery($con, $sql,true);
	logDebug("result=".print_r($result,1));

	if($result){
		logDebug("commit");
		dbCommit($con);
		dbFreeResult($result);
		$ret = true;
	}else{
		logDebug("rollback");
		dbRollback($con);
	}

	return $ret;
}
//--------------------------------------------------
//���́F���R�[�h�o�^�i�g�����U�N�V�����Ȃ��j
//�֐��FputNoTransDbRecord
//�����F
//�ߒl�F
//�T�v�F
//--------------------------------------------------
function putNoTransDbRecord($con,$sql){

	//��2014/11/07 R-#16058_MailOsusumeDetail_Tbl�ւ̃f�[�^�o�^����RollBack�����p�~(nul hatano)
	$result = dbQuery($con, $sql,false);
	//��2014/11/07 R-#16058_MailOsusumeDetail_Tbl�ւ̃f�[�^�o�^����RollBack�����p�~(nul hatano)
	logDebug("result=".print_r($result,1));
	return $result;
}

//--------------------------------------------------
//���́F����ԍ����W�o�C�g�ŕԂ�
//�֐��FputKainCD
//�����F
//�ߒl�F
//�T�v�F
//--------------------------------------------------
function putKainCD($kainno){

	logDebug("putKainCD[in] kainno=".$kainno);

	$tmp = '00000000'.trim($kainno);

	$ret = substr($tmp,-8,8);

	if($ret == "00000000"){
		$ret = "";
	}

	logDebug("putKainCD[out] kainno=".$ret);
	return $ret;
}

//--------------------------------------------------
//���́F
//�֐��FchkTantoCD
//�����F
//�ߒl�F
//�T�v�F
//--------------------------------------------------
function chkTantoCD($tantocd){
	$ret = false;
	if(strLen($tantocd)<=5){
		if (preg_match('/^[0-9]+$/', $tantocd) === 1) {
			$ret = true;
		}
	}
	if($ret==false){
		logDebug("tantocd=��Ώێ�");
	}

	return $ret;
}

//��2014/11/10 R-#16067_MailOsusumeDetail_Tbl�ւ̃f�[�^�o�^����RollBack�����p�~(nis tagomori)
//--------------------------------------------------
//���́F�����߃V�[�P���X�ԍ��擾
//�֐��FgetMailOsusumeCD
//�����F�Ȃ�
//�ߒl�F�����߃V�[�P���X�ԍ�
//�T�v�F
//--------------------------------------------------
function getMailOsusumeCD(){

	logDebug(__FUNCTION__.'[start]');

	$sql  = "select SEQ_MAILOSUSUMECD.NEXTVAL from dual";
	$con = dbConnect();
	$result = ssk_db_parse($con, $sql);

	$data_arr = array();
	$result = dbQuery($con, $sql, true);
	$rows = getNumRows($result, $data_arr);
	if($rows>0){
		$ret = array();
		$ret = dbFetchRow($result, 0, $data_arr);
	}else{
		// �V�[�P���X�擾�G���[
		return false;
	}

	dbFreeResult($result);
	dbClose($con);

	logDebug(__FUNCTION__.'[end]');
	return $ret['NEXTVAL'];

}
//��2014/11/10 R-#16067_MailOsusumeDetail_Tbl�ւ̃f�[�^�o�^����RollBack�����p�~(nis tagomori)

//--------------------------------------------------
//���́F�����߁@�V�K�o�^
//�֐��FOsusume_insert
//�����F
//�ߒl�F
//�T�v�F
//--------------------------------------------------
//��2014/11/10 R-#16067_MailOsusumeDetail_Tbl�ւ̃f�[�^�o�^����RollBack�����p�~(nis tagomori)
function MailOsusume_insert(&$con,$MailOsusumeCD,$TantoCD,$GyoumuKbn,$DraftData){
//��2014/11/10 R-#16067_MailOsusumeDetail_Tbl�ւ̃f�[�^�o�^����RollBack�����p�~(nis tagomori)

	logDebug("MailOsusume_insert[start]");
	logDebug("DraftData[]=".print_r($DraftData,1));

	//------------------------------
	//�S���҃`�F�b�N
	//------------------------------
	if(chkTantoCD($TantoCD)==false){
		return false;
	}

	//------------------------------
	//�N�G���[�쐬
	//------------------------------

	$sql  = "INSERT INTO MAILOSUSUME_TBL (";

	$sql .= " MailOsusumeCD";   //���[���������߃R�[�h
	$sql .= ",TantoCD";         //�S���R�[�h
	$sql .= ",GyoumuKbn";       //�Ɩ��敪
	$sql .= ",ContactID";       //�ڐGID

	$sql .= ",KaiinCD";         //���q�l�ԍ�
	$sql .= ",SEND_DT";         //���M��
	$sql .= ",SEND_TM";         //���M����
	$sql .= ",TeikeiFlg";       //��^�t���O
	$sql .= ",SYNC_FLG";        //�����t���O
	$sql .= ",DELETE_FLG";      //�폜�t���O

	$sql .= ",UPDATE_DT";
	$sql .= ",REGIST_DT";
	$sql .= ",UPDATE_USER";
	$sql .= ",REGIST_USER";

	$sql .= ",KAIN_NAME";

	$sql .= " )VALUES( ";

	//��2014/11/10 R-#16067_MailOsusumeDetail_Tbl�ւ̃f�[�^�o�^����RollBack�����p�~(nis tagomori)
	$sql .= " '".$MailOsusumeCD."'";
	//��2014/11/10 R-#16067_MailOsusumeDetail_Tbl�ւ̃f�[�^�o�^����RollBack�����p�~(nis tagomori)

	$sql .= ",'".$TantoCD."'";

	$sql .= ",'".$GyoumuKbn."'";


	//��2010/07/20 #xxxx �����ߏ�������Ή��ikdl yoshii�j
	if($GyoumuKbn=='18' || $GyoumuKbn=='19'){

		//��2011/01/19 #xxxx ����ԍ��ۑ��Ή��iEC-One yoshii�j
		//$tmpKainName = getOsusumeKainName($GyoumuKbn,$DraftData['gid']);
		//if($DraftData['gid']=='' || $DraftData['gid']=='0'){
		//    $tmp = getKainno_pid($GyoumuKbn,$DraftData['pid']);
		//}else{
		//    $tmp = getKainno_pid($GyoumuKbn,$DraftData['gid']);
		//}
		//$tmpKainName = getOsusumeKainName2($tmp);
		$tmpGID = getPid_to_Gid($GyoumuKbn,$DraftData['pid']);
		if($tmpGID==0){
			$tmp = getKainno_pid($GyoumuKbn,$DraftData['pid']);
			$tmpContactID = $DraftData['pid'];
		}else{

			$tmpGID2 = getPid_to_Gid($GyoumuKbn,$tmpGID);

			if($tmpGID2==0){
				$tmp = getKainno_pid($GyoumuKbn,$tmpGID);
				$tmpContactID = $tmpGID;
			}else{
				$tmp = getKainno_pid($GyoumuKbn,$tmpGID2);
				$tmpContactID = $tmpGID2;
			}

		}
		$tmpKainName = getOsusumeKainName2($tmp);
		$tmpKainNo = $tmp;

		logDebug("=====");
		logDebug("gid=".$DraftData['gid']);
		logDebug("pid=".$DraftData['pid']);
		logDebug("tmpGID=".$tmpGID);
		logDebug("tmpGID2=".$tmpGID2);
		logDebug("tmpContactID=".$tmpContactID);
		logDebug("tmp=".$tmp);
		logDebug("=====");
		//��2011/01/19 #xxxx ����ԍ��ۑ��Ή��iEC-One yoshii�j

	}else{
		$tmpKainName = trim($DraftData['mlName']);
	}
	//��2010/07/20 #xxxx �����ߏ�������Ή��ikdl yoshii�j


	if($GyoumuKbn==18 || $GyoumuKbn==19){
		//��2011/01/19 #xxxx ����ԍ��ۑ��Ή��iEC-One yoshii�j
		//if($DraftData['pid']){
		//    $sql .= ",'".$DraftData['pid']."'";
		//}else{
		//    $sql .= ",null";
		//}
		//if($DraftData['gid']){
		//    $sql .= ",'".$DraftData['gid']."'";
		//}else{
		//    if($DraftData['pid']){
		//    $sql .= ",'".$DraftData['pid']."'";
		//    }else{
		//        $sql .= ",null";
		//    }
		//}
		if($tmpContactID==0){
			$sql .= ",null";
		}else{
			$sql .= ",'".$tmpContactID."'";
		}
		//��2011/01/19 #xxxx ����ԍ��ۑ��Ή��iEC-One yoshii�j

	}else if($GyoumuKbn==21 || $GyoumuKbn==22){
		$sql .= ",'0'";
	// 2018/05/25 HuyDV start
	}else if($GyoumuKbn==29){
			if($DraftData['mailTraceId']){
				$sql .= ",'".$DraftData['mailTraceId']."'";
			}
	// 2018/05/25 HuyDV end
	}else{
		if($DraftData['econorderid']){
			$sql .= ",'".$DraftData['econorderid']."'";

		}else if($DraftData['cvid']){
			$sql .= ",'".$DraftData['cvid']."'";

		}else{
			$sql .= ",null";
		}
	}


	//��2011/01/19 #xxxx ����ԍ��ۑ��Ή��iEC-One yoshii�j
	//$tmp = putKainCD($DraftData['cd']);
	if($GyoumuKbn==18 || $GyoumuKbn==19){
		//$tmp = getKainno_pid($GyoumuKbn,$DraftData['pid']);

		//if($DraftData['gid']=='' || $DraftData['gid']=='0'){
		//    $tmp = getKainno_pid($GyoumuKbn,$DraftData['pid']);
		//}else{
		//    $tmp = getKainno_pid($GyoumuKbn,$DraftData['gid']);
		//}

		$tmp = putKainCD($tmpKainNo);
	}else{
		$tmp = putKainCD($DraftData['cd']);
		if(!$tmp){
			$tmp = putKainCD($DraftData['KaiinCD']);
		}
	}
	//��2011/01/19 #xxxx ����ԍ��ۑ��Ή��iEC-One yoshii�j
	if($tmp){
		$sql .= ",'".$tmp."'";
	}else{
		$sql .= ",null";
	}

	$sql .= ",to_char(sysdate,'YYYYMMDD')";
	$sql .= ",to_char(sysdate,'hh24miss')";

	//��R-#2921 ��^��20�Ή�(1:��^ 2:20�Ή� 3:�ʂɕύX) 2012/02/10 ul-fuse
	if($DraftData['TEIKEIFLG']=='1' || $DraftData['TEIKEIFLG']=='2' || $DraftData['TEIKEIFLG']=='3'){
	//��R-#2921 ��^��20�Ή�(1:��^ 2:20�Ή� 3:�ʂɕύX) 2012/02/10 ul-fuse
		$sql .= ",'".$DraftData['TEIKEIFLG']."'";
	}else{
		$sql .= ",null";
	}

	$sql .= ",'0'";         //�����t���O
	$sql .= ",'0'";         //�폜�t���O
	$sql .= ",sysdate";
	$sql .= ",sysdate";
	$sql .= ",".getSqlValue("TOOL:".$TantoCD);
	$sql .= ",".getSqlValue("TOOL:".$TantoCD);


	//��2010/07/20 #xxxx �����ߏ�������Ή��ikdl yoshii�j
	if($tmpKainName){
		$sql .= ",'".$tmpKainName."'";
	}else{
		$sql .= ",null";
	}
	//��2010/07/20 #xxxx �����ߏ�������Ή��ikdl yoshii�j


	$sql .= ")";

	logDebug("sql=".$sql);

	/* �� #1492 WEB�Ǘ��c�[�����і��v��Ή� EC-One Soga 2011-03-29 */
	// DB�ڑ��E�g�����U�N�V���������\�b�h�̊O�Ɉړ�
	//------------------------------
	//DB�ڑ����p�[�X
	//------------------------------
	//$con = dbConnect();
	$result = ssk_db_parse($con, $sql);
	if(!$result) {
		//dbRollback($con);
		dbFreeResult($result);
		dbClose($con);
		return false;
	}

	//------------------------------
	//SQL���s
	//------------------------------
	$ret = putNoTransDbRecord($con,$sql);
	if(!$ret) {
		//dbRollback($con);
		dbFreeResult($ret);
		dbClose($con);
		return false;
	}

	//------------------------------
	//DB�ؒf
	//------------------------------
	//dbClose($con);
	/* �� #1492 WEB�Ǘ��c�[�����і��v��Ή� EC-One Soga 2011-03-29 */

	logDebug("MailOsusume_insert[end] ret=".$ret);
	return $ret;
}

//--------------------------------------------------
//���́F�����߁@�V�K�o�^
//�֐��FOsusume_insert
//�����F
//�ߒl�F
//�T�v�F
//--------------------------------------------------
//��2010/07/20 #xxxx �����ߏ�������Ή��ikdl yoshii�j
//function MailOsusumeDetail_insert($TantoCD,$MailOsusumeCD,$osusume){
function MailOsusumeDetail_insert(&$con,$TantoCD,$MailOsusumeCD,$osusume,$mstShohinCD,$shinkoku_flg){
//��2010/07/20 #xxxx �����ߏ�������Ή��ikdl yoshii�j

	logDebug("MailOsusumeDetail_insert[start]");

	$ret = false;

	//��2010/07/20 #xxxx �����ߏ�������Ή��ikdl yoshii�j
	//if(!$MailOsusumeCD || !$osusume){
	if(!$MailOsusumeCD){
		return $ret;
	}

	//$select_flg = '0';
	$keyword_flg = '0';
	if($osusume==$mstShohinCD){
		//$select_flg = '1';
		$keyword_flg = '1';
	}else{
		//�����߂���Ă��Ȃ��ꍇ���󃌃R�[�h���쐬����̂ł��̏ꍇ�}�X�^�[�̏��iCD���Z�b�g����B
		$osusume = $mstShohinCD;
	}

	$select_flg = $shinkoku_flg;


	//��2010/07/20 #xxxx �����ߏ�������Ή��ikdl yoshii�j

	//------------------------------
	//�N�G���[�쐬
	//------------------------------
	$sql  = "INSERT INTO MAILOSUSUMEDETAIL_TBL (";

	$sql .= " MailOsusumeCD";   //���[���������߃R�[�h
	$sql .= ",SHOHIN_CD";       //���i�b�c
	$sql .= ",SELECT_FLG";      //�\���t���O
	$sql .= ",KEYWORD_FLG";     //���ʃL�[���[�h�t���O
	$sql .= ",UPDATE_DT";
	$sql .= ",REGIST_DT";
	$sql .= ",UPDATE_USER";
	$sql .= ",REGIST_USER";

	$sql .= " )VALUES( ";

	$sql .= " '".$MailOsusumeCD."'";
	$sql .= ",'".$osusume."'";
	$sql .= ",'".$select_flg."'";
	$sql .= ",'".$keyword_flg."'";
	$sql .= ",sysdate";
	$sql .= ",sysdate";
	$sql .= ",".getSqlValue("TOOL:".$TantoCD);
	$sql .= ",".getSqlValue("TOOL:".$TantoCD);

	$sql .= ")";


	/* �� #1492 WEB�Ǘ��c�[�����і��v��Ή� EC-One Soga 2011-03-29 */
	// DB�ڑ��E�g�����U�N�V���������\�b�h�̊O�Ɉړ�
	//------------------------------
	//DB�ڑ����p�[�X
	//------------------------------
	//$con = dbConnect();
	$result = ssk_db_parse($con, $sql);
	if(!$result) {
		//dbRollback($con);
		return false;
	}

	//------------------------------
	//SQL���s
	//------------------------------
	$ret = putNoTransDbRecord($con,$sql);
	if(!$ret) {
		//dbRollback($con);
		return false;
	}

	//------------------------------
	//DB�ؒf
	//------------------------------
	//dbClose($con);
	/* �� #1492 WEB�Ǘ��c�[�����і��v��Ή� EC-One Soga 2011-03-29 */

	logDebug("MailOsusumeDetail_insert[end] ret=".$ret);
	return $ret;
}



//��2010/07/20 #xxxx �����ߏ�������Ή��ikdl yoshii�j
//--------------------------------------------------
//���́F
//�֐��F
//�����F
//�ߒl�F
//�T�v�F
//--------------------------------------------------
function getOsusumeKainName($GyoumuKbn,$id){

	logDebug("getOsusumeKainName[start]");
	logDebug("GyoumuKbn=".$GyoumuKbn);
	logDebug("id=".$id);



	$tmpKAIN_NAME = "";

	if(!$id || $id=='0'){
		return $tmpKAIN_NAME;
	}

	//------------------------------
	//�N�G���[�쐬
	//------------------------------
	if($GyoumuKbn==18){
		$sql  = "select CONTRIBUTOR from cbbs_hada_tbl   where pid='".$id."' and admin_kbn='0'";
	}
	if($GyoumuKbn==19){
		$sql  = "select CONTRIBUTOR from cbbs_hiroba_tbl where pid='".$id."' and admin_kbn='0'";
	}

	logDebug("sql=".$sql);


	//------------------------------
	//DB�ڑ����p�[�X
	//------------------------------
	$con = dbConnect();
	$result = ssk_db_parse($con, $sql);

	$data_arr = array();
	$result = dbQuery($con, $sql, true);


	$rows = getNumRows($result, $data_arr);
	logDebug("record rows=".$rows);

	if($rows>0){
		//------------------------------
		//�f�[�^�擾
		//------------------------------
		$ret = array();
		$ret = dbFetchRow($result, 0, $data_arr);

		$tmpKAIN_NAME = $ret['CONTRIBUTOR'];

	}
	dbFreeResult($result);

	//------------------------------
	//DB�ؒf
	//------------------------------
	dbClose($con);


	logDebug("getOsusumeKainName[end] tmpKAIN_NAME=".$tmpKAIN_NAME);
	return $tmpKAIN_NAME;
}

//��2011/01/19 #xxxx ����ԍ��ۑ��Ή��iEC-One yoshii�j
//--------------------------------------------------
//���́F
//�֐��F
//�����F
//�ߒl�F
//�T�v�F����ԍ��������e�[�u���̂����O���擾����B
//--------------------------------------------------
function getOsusumeKainName2($kno){

	logDebug("getOsusumeKainName2[start]");
	logDebug("kdno=".$kno);

	$tmpKAIN_NAME = "";

	if(!$kno || $kno=='0'){
		return $tmpKAIN_NAME;
	}

	//------------------------------
	//�N�G���[�쐬
	//------------------------------
	$sql  = "select stfunc_ssk(KAIN_NAME) KAIN_NAME from member_tbl where kainno='".$kno."'";

	logDebug("sql=".$sql);


	//------------------------------
	//DB�ڑ����p�[�X
	//------------------------------
	$con = dbConnect();
	$result = ssk_db_parse($con, $sql);

	$data_arr = array();
	$result = dbQuery($con, $sql, true);


	$rows = getNumRows($result, $data_arr);
	logDebug("record rows=".$rows);

	if($rows>0){
		//------------------------------
		//�f�[�^�擾
		//------------------------------
		$ret = array();
		$ret = dbFetchRow($result, 0, $data_arr);

		$tmpKAIN_NAME = $ret['KAIN_NAME'];

	}
	dbFreeResult($result);

	//------------------------------
	//DB�ؒf
	//------------------------------
	dbClose($con);


	logDebug("getOsusumeKainName2[end] tmpKAIN_NAME=".$tmpKAIN_NAME);
	return $tmpKAIN_NAME;
}
//��2011/01/19 #xxxx ����ԍ��ۑ��Ή��iEC-One yoshii�j
//��2010/07/20 #xxxx �����ߏ�������Ή��ikdl yoshii�j


function checkOsusumeKeyword($mlBody,$idx){


	global $OSUSUME_1_KEYWORD;
	global $OSUSUME_2_KEYWORD;
	global $OSUSUME_3_KEYWORD;
	global $OSUSUME_4_KEYWORD;
	global $OSUSUME_5_KEYWORD;
	global $OSUSUME_6_KEYWORD;
	global $OSUSUME_7_KEYWORD;
	global $OSUSUME_8_KEYWORD;
	global $OSUSUME_9_KEYWORD;
	// ��R-#16279_�y�V���i�Ή��z�߂���̌��� 2014/12/15 nul-motoi
	global $OSUSUME_10_KEYWORD;
	// ��R-#16279_�y�V���i�Ή��z�߂���̌��� 2014/12/15 nul-motoi
	global $MailDraft_conf;

	$dat = array();

	if($idx==1){
		$dat = $OSUSUME_1_KEYWORD;
	}
	if($idx==2){
		$dat = $OSUSUME_2_KEYWORD;
	}
	if($idx==3){
		$dat = $OSUSUME_3_KEYWORD;
	}
	if($idx==4){
		$dat = $OSUSUME_4_KEYWORD;
	}
	if($idx==5){
		$dat = $OSUSUME_5_KEYWORD;
	}
	if($idx==6){
		$dat = $OSUSUME_6_KEYWORD;
	}
	if($idx==7){
		$dat = $OSUSUME_7_KEYWORD;
	}
	if($idx==8){
		$dat = $OSUSUME_8_KEYWORD;
	}
	if($idx==9){
		$dat = $OSUSUME_9_KEYWORD;
	}
	// ��R-#16279_�y�V���i�Ή��z�߂���̌��� 2014/12/15 nul-motoi
	if($idx==10){
		$dat = $OSUSUME_10_KEYWORD;
	}
	// ��R-#16279_�y�V���i�Ή��z�߂���̌��� 2014/12/15 nul-motoi


	//echo "<br>OSUSUME_8_KEYWORD[]=".print_r($OSUSUME_8_KEYWORD,1);
	//echo "<br>dat[]=".print_r($dat,1);
	//echo "<br>mlBody=".$mlBody;

	$ret = '';
	foreach( $dat as $key_word ){

		$pos = strpos($mlBody,$key_word);

		//echo "<br>key_word=".$key_word;
		//echo "<br>pos=".$pos;

		if($pos===false){
		}else{
			$ret = $MailDraft_conf['SHOHIN'][$idx];
			break;
		}
	}

	return $ret;
}

//--------------------------------------------------
//���́F�������V�[�P���X�擾
//�֐��FgetMailDraftCD
//�����F�Ȃ�
//�ߒl�FMailDraft_Tbl.MailDraftCD�̍ő�l
//�T�v�F
// #1238 ���[�����M�@�\�S�Ă���A�A�h�o�C�X�y�[�W�쐬���\�� 2010/08/16 kdl-uchida
//--------------------------------------------------
function getMailDraftCD(){

	logDebug(__FUNCTION__.'[start]');

	$sql  = "select SEQ_MAILDRAFTCD.NEXTVAL from dual";
	$con = dbConnect();
	$result = ssk_db_parse($con, $sql);

	$data_arr = array();
	$result = dbQuery($con, $sql, true);
	$rows = getNumRows($result, $data_arr);
	if($rows>0){
		$ret = array();
		$ret = dbFetchRow($result, 0, $data_arr);
	}else{
		// �V�[�P���X�擾�G���[
		return false;
	}

	dbFreeResult($result);
	dbClose($con);

	logDebug(__FUNCTION__.'[end]');
	return $ret['NEXTVAL'];

}
//��2011/01/19 #xxxx ����ԍ��ۑ��Ή��iEC-One yoshii�j
//--------------------------------------------------
//���́F
//�֐��F
//�����F
//�ߒl�F
//�T�v�Fpid�ɂČf���i���Y�ݑ��k���E������ׂ�L��j�̉���ԍ����擾����B
//--------------------------------------------------
function getKainno_pid($GyoumuKbn,$pid){

	logDebug("getKainno_pid[start]");
	logDebug("GyoumuKbn=".$GyoumuKbn);
	logDebug("pid=".$pid);

	$tmpKAINNO = "";
	if($GyoumuKbn==18 || $GyoumuKbn==19){
	}else{
		return $tmpKAINNO;
	}

	//------------------------------
	//�N�G���[�쐬
	//------------------------------
	if($GyoumuKbn==18){
		$sql  = "select KAINNO from CBBS_Hada_Tbl   where PID='".$pid."' ";
	}
	if($GyoumuKbn==19){
		$sql  = "select KAINNO from CBBS_Hiroba_Tbl where PID='".$pid."' ";
	}

	logDebug("sql=".$sql);


	//------------------------------
	//DB�ڑ����p�[�X
	//------------------------------
	$con = dbConnect();
	$result = ssk_db_parse($con, $sql);

	$data_arr = array();
	$result = dbQuery($con, $sql, true);


	$rows = getNumRows($result, $data_arr);
	logDebug("record rows=".$rows);

	if($rows>0){
		//------------------------------
		//�f�[�^�擾
		//------------------------------
		$ret = array();
		$ret = dbFetchRow($result, 0, $data_arr);

		$tmpKAINNO  = $ret['KAINNO'];
	}
	dbFreeResult($result);

	//------------------------------
	//DB�ؒf
	//------------------------------
	dbClose($con);


	logDebug("getKainno_pid[end] tmpKAINNO=".$tmpKAINNO);
	return $tmpKAINNO;
}

//--------------------------------------------------
//���́F
//�֐��F
//�����F
//�ߒl�F
//�T�v�Fpid�ɂČf���i���Y�ݑ��k���E������ׂ�L��j��GID���擾����B
//--------------------------------------------------
function getPid_to_Gid($GyoumuKbn,$pid){

	logDebug("getPid_to_Gid[start]");
	logDebug("GyoumuKbn=".$GyoumuKbn);
	logDebug("pid=".$pid);

	$tmpGID = "";
	if($GyoumuKbn==18 || $GyoumuKbn==19){
	}else{
		return $tmpGID;
	}

	//------------------------------
	//�N�G���[�쐬
	//------------------------------
	if($GyoumuKbn==18){
		$sql  = "select GID from CBBS_Hada_Tbl   where pid='".$pid."' ";
	}
	if($GyoumuKbn==19){
		$sql  = "select GID from CBBS_Hiroba_Tbl where pid='".$pid."' ";
	}

	logDebug("sql=".$sql);


	//------------------------------
	//DB�ڑ����p�[�X
	//------------------------------
	$con = dbConnect();
	$result = ssk_db_parse($con, $sql);

	$data_arr = array();
	$result = dbQuery($con, $sql, true);


	$rows = getNumRows($result, $data_arr);
	logDebug("record rows=".$rows);

	if($rows>0){
		//------------------------------
		//�f�[�^�擾
		//------------------------------
		$ret = array();
		$ret = dbFetchRow($result, 0, $data_arr);

		$tmpGID  = $ret['GID'];
	}
	dbFreeResult($result);

	//------------------------------
	//DB�ؒf
	//------------------------------
	dbClose($con);


	logDebug("getPid_to_Gid[end] tmpGID=".$tmpGID);
	return $tmpGID;
}

//��2011/01/19 #xxxx ����ԍ��ۑ��Ή��iEC-One yoshii�j


?>
