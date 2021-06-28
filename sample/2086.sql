担当者登録  '15623'

SELECT ctrl_scr_login_cd as COMM_CD 
FROM m_user 
WHERE 
care_calendar_charge_flg = '1' 
AND del_flg = '0' 
AND ctrl_scr_login_cd <> :COMM_CD 


SELECT ctrl_scr_login_cd as COMM_CD, 
user_name as COMM_NM 
FROM m_user 
WHERE 
care_calendar_charge_flg = '0' 
AND ctrl_scr_login_cd != :ADMIN_COMM_CD 
ORDER BY ctrl_scr_login_cd ASC

SELECT disp_turn as SORT_NO, 
ctrl_scr_login_cd as COMM_CD, 
user_name as COMM_NM, 
TO_CHAR(register_date,'YYYY/MM/DD HH24:MI:SS') AS REGIST_DT,
TO_CHAR(update_date,'YYYY/MM/DD HH24:MI:SS') AS UPDATE_DT, 
register_user_cd as REGIST_USER, 
update_user_cd as UPDATE_USER 
FROM m_user 
WHERE 
ctrl_scr_login_cd = :COMM_CD 
AND care_calendar_charge_flg = '1'

SELECT c.ctrl_scr_login_cd as COMM_CD, 
c.user_name as COMM_NM, 
c.title as COMM_TITLE, 
c.sex_kbn as COMM_GENDAR, 
c.icon as COMM_ICON, 
c.del_flg as DEL_FLG, 
COUNT(m.ctrl_account_cd) AS CHARGE_NUM 
FROM m_user c 
LEFT JOIN 
( 
    SELECT mp.ctrl_account_cd FROM m_mbr_profile mp 
    INNER JOIN m_net_mbr mt 
    ON mp.cust_no = mt.cust_no 
    AND (mp.ctrl_account_cd IS NOT NULL AND trim(mp.ctrl_account_cd) != '')
) m 
ON c.ctrl_scr_login_cd = m.ctrl_account_cd 
WHERE c.care_calendar_charge_flg = '1' 
GROUP BY c.disp_turn, c.ctrl_scr_login_cd, c.user_name,
c.title, c.sex_kbn, c.icon, c.del_flg 
ORDER BY c.disp_turn

SELECT MP.cust_no as KAINNO,
M.cust_name as KAIN_NAME,
MP.ctrl_account_cd as COMM_CD,
MP.del_flg as DELETE_FLG ,
TO_CHAR(OCS.register_date,'YY/MM/DD') AS REGIST_DT,
(case OCS.stat_kbn when NULL then '0' else OCS.stat_kbn end) AS STATUS,
MIN(TRIM(OCA.ship_dt)) AS HASOUDT,
TO_CHAR(OCS.start_dt,'YYYY/MM/DD') AS START_DT_YMD,
(case OCC.care_calendar_cd when NULL then '0' else '1' end) AS IS_COMPLETE 
FROM m_mbr_profile MP 
INNER JOIN m_net_mbr M 
ON MP.cust_no = M.cust_no 
AND (MP.ctrl_account_cd IS NOT NULL AND trim(MP.ctrl_account_cd) != '') 
INNER JOIN m_care_calendar_set OCS 
ON MP.cust_no = OCS.cust_no 
INNER JOIN m_care_calendar_ctrl OCA 
ON MP.cust_no = OCA.cust_no 
LEFT JOIN f_care_calendar_achieve OCC 
ON MP.cust_no = OCC.cust_no 
WHERE MP.ctrl_account_cd = .$comm_cd.  
GROUP BY MP.cust_no ,M.cust_name,
MP.ctrl_account_cd,
MP.del_flg,
TO_CHAR(OCS.register_date,'YY/MM/DD'),
case OCS.stat_kbn when NULL then '0' else OCS.stat_kbn end,
TO_CHAR(OCS.start_dt,'YYYY/MM/DD'),
case OCC.care_calendar_cd when NULL then '0' else '1' end
ORDER BY regist_dt,kain_name

SELECT c.disp_turn as SORT_NO, 
c.ctrl_scr_login_cd as COMM_CD, 
c.user_name as COMM_NM, 
c.title as COMM_TITLE, 
c.sex_kbn as COMM_GENDAR, 
c.icon as COMM_ICON, 
c.del_flg as DEL_FLG, 
COUNT(m.ctrl_account_cd) AS CHARGE_NUM 
FROM m_user c 
LEFT JOIN 
( 
    SELECT mp.ctrl_account_cd 
    FROM m_mbr_profile mp 
    INNER JOIN m_net_mbr mt 
    ON mp.cust_no = mt.cust_no 
    AND (mp.ctrl_account_cd IS NOT NULL AND trim(mp.ctrl_account_cd) != '')
) m 
ON c.ctrl_scr_login_cd = m.ctrl_account_cd 
WHERE c.care_calendar_charge_flg = '1' 
GROUP BY c.disp_turn, 
c.ctrl_scr_login_cd, 
c.user_name, 
c.title, 
c.sex_kbn, 
c.icon, 
c.del_flg 
ORDER BY disp_turn ASC

SELECT * 
FROM m_user 
WHERE 
ctrl_scr_login_cd = :COMM_CD 
AND care_calendar_charge_flg = '1'

SELECT 
MAX(disp_turn) AS MAX_SORT_NO 
FROM 
m_user 
WHERE 
care_calendar_charge_flg = :OTEATE_CALENDAR_CHARGE_FLG

SELECT 
cust_no 
FROM 
m_mbr_profile 
WHERE ctrl_account_cd = :COMM_CD 
ORDER BY register_date ASC

SELECT 
ctrl_scr_login_cd 
FROM m_user 
WHERE care_calendar_charge_flg = '1' 
AND del_flg = '0'
AND ctrl_scr_login_cd <> :COMM_CD 
ORDER BY disp_turn ASC

UPDATE m_mbr_profile 
SET ctrl_account_cd = :COMM_CD, 
sync_flg = :SYNC_FLG, 
update_user_cd = :UPDATE_USER, 
update_date = current_timestamp(0), 
app_sync_flg = :APP_SYNC_FLG 
WHERE cust_no = :KAINNO

UPDATE m_user 
SET del_flg = '1', 
update_user_cd = :UPDATE_USER, 
update_date = current_timestamp(0)
WHERE TRIM(ctrl_scr_login_cd) = :COMM_CD 
AND care_calendar_charge_flg = '1'

UPDATE m_user 
SET del_flg = '0', 
update_user_cd = :UPDATE_USER, 
update_date = current_timestamp(0)
WHERE TRIM(ctrl_scr_login_cd) = :COMM_CD 
AND care_calendar_charge_flg = '1' 
AND del_flg = '1'

UPDATE m_user 
SET care_calendar_charge_flg = '1', 
disp_turn = .$setSortNo., 
update_user_cd = :UPDATE_USER, 
update_date = current_timestamp(0)
WHERE TRIM(ctrl_scr_login_cd) = :COMM_CD 

UPDATE m_mbr_profile 
SET ctrl_account_cd = :new_comm_cd,
sync_flg = :sync_flg,
update_user_cd = :userid,
update_date = current_timestamp(0),
app_sync_flg = :app_sync_flg 
WHERE cust_no = :kainno

UPDATE m_mbr_profile 
SET ctrl_account_cd = :new_comm_cd ,
sync_flg = :sync_flg ,
update_user_cd = :userid ,
update_date = current_timestamp(0),
app_sync_flg = :app_sync_flg 
WHERE cust_no = :kainno

UPDATE m_mbr_profile 
SET ctrl_account_cd = '' ,
sync_flg = :sync_flg ,
update_user_cd = :userid ,
update_date = current_timestamp(0),
app_sync_flg = :app_sync_flg 
WHERE cust_no = :kainno

UPDATE m_mbr_profile 
SET ctrl_account_cd = '' ,
sync_flg = :sync_flg ,
update_user_cd = :userid ,
update_date = current_timestamp(0),
app_sync_flg = :app_sync_flg 
WHERE cust_no = :kainno



---- PHP SQL FORMAT

$defSql  = "SELECT ctrl_scr_login_cd as COMM_CD ";
$defSql .= "FROM m_user ";
$defSql .= "WHERE ";
$defSql .= "care_calendar_charge_flg = '1' ";
$defSql .= "AND del_flg = '0' ";
$defSql .= "AND ctrl_scr_login_cd <> :COMM_CD"; 


$listSql  = "SELECT ctrl_scr_login_cd as COMM_CD, ";
$listSql .= "user_name as COMM_NM ";
$listSql .= "FROM m_user ";
$listSql .= "WHERE ";
$listSql .= "care_calendar_charge_flg = '0' ";
$listSql .= "AND ctrl_scr_login_cd != :ADMIN_COMM_CD ";
$listSql .= "ORDER BY ctrl_scr_login_cd ASC";

$sql  =  " SELECT disp_turn as SORT_NO, ";
$sql .=  " ctrl_scr_login_cd as COMM_CD, ";
$sql .=  " user_name as COMM_NM, ";
$sql .=  " TO_CHAR(register_date,'YYYY/MM/DD HH24:MI:SS') AS REGIST_DT,";
$sql .=  " TO_CHAR(update_date,'YYYY/MM/DD HH24:MI:SS') AS UPDATE_DT, ";
$sql .=  " register_user_cd as REGIST_USER, ";
$sql .=  " update_user_cd as UPDATE_USER ";
$sql .=  " FROM m_user ";
$sql .=  " WHERE ";
$sql .=  " ctrl_scr_login_cd = :COMM_CD ";
$sql .=  " AND care_calendar_charge_flg = '1'";

$sql =  "SELECT c.ctrl_scr_login_cd as COMM_CD, ";
$sql .=  "c.user_name as COMM_NM, ";
$sql .=  "c.title as COMM_TITLE, ";
$sql .=  "c.sex_kbn as COMM_GENDAR, ";
$sql .=  "c.icon as COMM_ICON, ";
$sql .=  "c.del_flg as DEL_FLG, ";
$sql .=  "COUNT(m.ctrl_account_cd) AS CHARGE_NUM ";
$sql .=  "FROM m_user c ";
$sql .=  "LEFT JOIN ";
$sql .=  "( ";
    $sql .=  "SELECT mp.ctrl_account_cd FROM m_mbr_profile mp ";
    $sql .=  "INNER JOIN m_net_mbr mt ";
    $sql .=  "ON mp.cust_no = mt.cust_no ";
    $sql .=  "AND (mp.ctrl_account_cd IS NOT NULL AND trim(mp.ctrl_account_cd) != '')";
$sql .=  ") m ";
$sql .=  "ON c.ctrl_scr_login_cd = m.ctrl_account_cd ";
$sql .=  "WHERE c.care_calendar_charge_flg = '1' ";
$sql .=  "GROUP BY c.disp_turn, c.ctrl_scr_login_cd, c.user_name,";
$sql .=  "c.title, c.sex_kbn, c.icon, c.del_flg ";
$sql .=  "ORDER BY c.disp_turn";

$sql  =  "SELECT MP.cust_no as KAINNO,";
$sql .=  "M.cust_name as KAIN_NAME,";
$sql .=  "MP.ctrl_account_cd as COMM_CD,";
$sql .=  "MP.del_flg as DELETE_FLG ,";
$sql .=  "TO_CHAR(OCS.register_date,'YY/MM/DD') AS REGIST_DT,";
$sql .=  "(case OCS.stat_kbn when NULL then '0' else OCS.stat_kbn end) AS STATUS,";
$sql .=  "MIN(TRIM(OCA.ship_dt)) AS HASOUDT,";
$sql .=  "TO_CHAR(OCS.start_dt,'YYYY/MM/DD') AS START_DT_YMD,";
$sql .=  "(case OCC.care_calendar_cd when NULL then '0' else '1' end) AS IS_COMPLETE ";
$sql .=  "FROM m_mbr_profile MP ";
$sql .=  "INNER JOIN m_net_mbr M ";
$sql .=  "ON MP.cust_no = M.cust_no ";
$sql .=  "AND (MP.ctrl_account_cd IS NOT NULL AND trim(MP.ctrl_account_cd) != '') ";
$sql .=  "INNER JOIN m_care_calendar_set OCS ";
$sql .=  "ON MP.cust_no = OCS.cust_no ";
$sql .=  "INNER JOIN m_care_calendar_ctrl OCA ";
$sql .=  "ON MP.cust_no = OCA.cust_no ";
$sql .=  "LEFT JOIN f_care_calendar_achieve OCC ";
$sql .=  "ON MP.cust_no = OCC.cust_no ";
$sql .=  "WHERE MP.ctrl_account_cd =" .$comm_cd. ;
$sql .=  "GROUP BY MP.cust_no ,M.cust_name,";
$sql .=  "MP.ctrl_account_cd,";
$sql .=  "MP.del_flg,";
$sql .=  "TO_CHAR(OCS.register_date,'YY/MM/DD'),";
$sql .=  "case OCS.stat_kbn when NULL then '0' else OCS.stat_kbn end,";
$sql .=  "TO_CHAR(OCS.start_dt,'YYYY/MM/DD'),";
$sql .=  "case OCC.care_calendar_cd when NULL then '0' else '1' end ";
$sql .=  "ORDER BY regist_dt,kain_name";

$sql  =  "SELECT c.disp_turn as SORT_NO, ";
$sql .=  "c.ctrl_scr_login_cd as COMM_CD, ";
$sql .=  "c.user_name as COMM_NM, ";
$sql .=  "c.title as COMM_TITLE, ";
$sql .=  "c.sex_kbn as COMM_GENDAR, ";
$sql .=  "c.icon as COMM_ICON, ";
$sql .=  "c.del_flg as DEL_FLG, ";
$sql .=  "COUNT(m.ctrl_account_cd) AS CHARGE_NUM ";
$sql .=  "FROM m_user c ";
$sql .=  "LEFT JOIN ";
$sql .=  "( ";
    $sql .=  "SELECT mp.ctrl_account_cd ";
    $sql .=  "FROM m_mbr_profile mp ";
    $sql .=  "INNER JOIN m_net_mbr mt ";
    $sql .=  "ON mp.cust_no = mt.cust_no ";
    $sql .=  "AND (mp.ctrl_account_cd IS NOT NULL AND trim(mp.ctrl_account_cd) != '')";
$sql .=  ") m ";
$sql .=  "ON c.ctrl_scr_login_cd = m.ctrl_account_cd ";
$sql .=  "WHERE c.care_calendar_charge_flg = '1' ";
$sql .=  "GROUP BY c.disp_turn, ";
$sql .=  "c.ctrl_scr_login_cd, ";
$sql .=  "c.user_name, ";
$sql .=  "c.title, ";
$sql .=  "c.sex_kbn, ";
$sql .=  "c.icon, ";
$sql .=  "c.del_flg ";
$sql .=  "ORDER BY disp_turn ASC";

$sql  =  "SELECT * ";
$sql .=  "FROM m_user ";
$sql .=  "WHERE ";
$sql .=  "ctrl_scr_login_cd = :COMM_CD ";
$sql .=  "AND care_calendar_charge_flg = '1'";

$sortSql  = "SELECT ";
$sortSql .= "MAX(disp_turn) AS MAX_SORT_NO ";
$sortSql .= "FROM ";
$sortSql .= "m_user ";
$sortSql .= "WHERE ";
$sortSql .= "care_calendar_charge_flg = :OTEATE_CALENDAR_CHARGE_FLG";

$listSql  = "SELECT ";
$listSql .= "cust_no ";
$listSql .= "FROM ";
$listSql .= "m_mbr_profile ";
$listSql .= "WHERE ctrl_account_cd = :COMM_CD ";
$listSql .= "ORDER BY register_date ASC";

 $defSql  = "SELECT ";
 $defSql .= "ctrl_scr_login_cd ";
 $defSql .= "FROM m_user ";
 $defSql .= "WHERE care_calendar_charge_flg = '1' ";
 $defSql .= "AND del_flg = '0'";
 $defSql .= "AND ctrl_scr_login_cd <> :COMM_CD ";
 $defSql .= "ORDER BY disp_turn ASC";

 $upSql   = "UPDATE m_mbr_profile ";
 $upSql  .= "SET ctrl_account_cd = :COMM_CD, ";
 $upSql  .= "sync_flg = :SYNC_FLG, ";
 $upSql  .= "update_user_cd = :UPDATE_USER, ";
 $upSql  .= "update_date = current_timestamp(0), ";
 $upSql  .= "app_sync_flg = :APP_SYNC_FLG ";
 $upSql  .= "WHERE cust_no = :KAINNO";

$sql  =  "UPDATE m_user ";
$sql .=  "SET del_flg = '1', ";
$sql .=  "update_user_cd = :UPDATE_USER, ";
$sql .=  "update_date = current_timestamp(0) ";
$sql .=  "WHERE TRIM(ctrl_scr_login_cd) = :COMM_CD ";
$sql .=  "AND care_calendar_charge_flg = '1'";

$sql  =  "UPDATE m_user ";
$sql .=  "SET del_flg = '0', ";
$sql .=  "update_user_cd = :UPDATE_USER, ";
$sql .=  "update_date = current_timestamp(0) ";
$sql .=  "WHERE TRIM(ctrl_scr_login_cd) = :COMM_CD ";
$sql .=  "AND care_calendar_charge_flg = '1' ";
$sql .=  "AND del_flg = '1'";

$sql  =  "UPDATE m_user ";
$sql .=  "SET care_calendar_charge_flg = '1', ";
$sql .=  "disp_turn = .$setSortNo., ";
$sql .=  "update_user_cd = :UPDATE_USER, ";
$sql .=  "update_date = current_timestamp(0) ";
$sql .=  "WHERE TRIM(ctrl_scr_login_cd) = :COMM_CD ";

$sql  =  "UPDATE m_mbr_profile ";
$sql .=  "SET ctrl_account_cd = :new_comm_cd,";
$sql .=  "sync_flg = :sync_flg,";
$sql .=  "update_user_cd = :userid,";
$sql .=  "update_date = current_timestamp(0),";
$sql .=  "app_sync_flg = :app_sync_flg ";
$sql .=  "WHERE cust_no = :kainno";

$sql  =  "UPDATE m_mbr_profile ";
$sql .=  "SET ctrl_account_cd = :new_comm_cd ,";
$sql .=  "sync_flg = :sync_flg ,";
$sql .=  "update_user_cd = :userid ,";
$sql .=  "update_date = current_timestamp(0),";
$sql .=  "app_sync_flg = :app_sync_flg ";
$sql .=  "WHERE cust_no = :kainno";

$sql  =  "UPDATE m_mbr_profile ";
$sql .=  "SET ctrl_account_cd = '' ,";
$sql .=  "sync_flg = :sync_flg ,";
$sql .=  "update_user_cd = :userid ,";
$sql .=  "update_date = current_timestamp(0),";
$sql .=  "app_sync_flg = :app_sync_flg ";
$sql .=  "WHERE cust_no = :kainno";

$sql  =  "UPDATE m_mbr_profile ";
$sql .=  "SET ctrl_account_cd = '' ,";
$sql .=  "sync_flg = :sync_flg ,";
$sql .=  "update_user_cd = :userid ,";
$sql .=  "update_date = current_timestamp(0),";
$sql .=  "app_sync_flg = :app_sync_flg ";
$sql .=  "WHERE cust_no = :kainno";

COMMUNICATOR_TBL
MemberProfile_Tbl
Member_Tbl
OTEATECALENDARSETTING_TBL
OTEATECALENDARADMIN_TBL
OTEATECALENDARCOMPLETE_TBL


SELECT
KAINNO,
SITE_KBN,
NICKNAME,
ICON,
DELETE_FLG,
SYNC_FLG,
SESSION_ID,
UPDATE_DT,
REGIST_DT,
UPDATE_USER,
REGIST_USER,
COMM_CD,
APP_SYNC_FLG,
FROM
    SSKADMINUSER.MEMBERPROFILE_TBL

SELECT
    MN.MEMBER_ID
    , MN.KAINNO
    , MN.STFUNC_SSK_DEC(TEL_NO)
    , MN.NETMEMBER_ID
    , MN.STFUNC_SSK_DEC(NETMEMBER_PW)
    , MN.STFUNC_SSK_DEC(KAIN_NAME)
    , MN.STFUNC_SSK_DEC(EMAIL)
    , MN.MAIL_FLG
    , MN.HNDL_NAME
    , MN.DMMAIL_FLG
    , MN.DELETE_FLG
    , MN.MAILSTYLE_FLG
    , MN.MAILADDRESSERROR_FLG
    , MN.CARRIER
    , MN.DEVICE_NAME
    , MN.DEVICE_SHOW_NAME
    , MN.STFUNC_SSK_DEC(M_EMAIL)
    , MN.M_MAIL_FLG
    , MN.M_DMMAIL_FLG
    , MN.M_MAILADDRESSERROR_FLG
    , MN.DISP_TYPE
    , MN.SYNC_FLG
    , MN.SYSTEM_STATUS_FLG
    , MN.TEMP_PASSWORD_FLG
    , MN.PASSWORD_FAIL_COUNT
    , MN.M_PASSWORD_FAIL_COUNT
    , MN.TAIOUMEMO
    , MN.UPDATE_DT
    , MN.REGIST_DT
    , MN.UPDATE_USER
    , MN.REGIST_USER
    , MN.AGREE_FLG
    , MN.M_AGREE_FLG
    , MN.AUTO_LOGIN_DT
    , MN.MOBILE_ID
    , MN.SEC_AUTH_FAIL_COUNT
    , MN.SEC_AUTH_FAIL_COUNT_UPDATE_DT
    , MN.KAIN_KBN 
FROM
    SSKADMINUSER.MEMBER_TBL 


SELECT
COMM_CD,
TANTO_CD,
STFUNC_SSK_DEC(COMM_NM),
STFUNC_SSK_DEC(COMM_PW),
COMM_TITLE,
COMM_PERMIT,
COMM_SIGHEADER,
COMM_GENDAR,
COMM_TASTE,
COMM_MESSAGE,
COMM_ICON,
UPDATE_DT,
REGIST_DT,
UPDATE_USER,
REGIST_USER,
OTEATE_CALENDAR_CHARGE_FLG,
SORT_NO,
DEL_FLG
FROM
    COMMUNICATOR_TBL
WHERE 
COMM_CD IN ( 
'15623',
'localdev',
'16082',
'10991',
'shimizu',
'17625',
'16520',
'17762',
'14179',
'16344')

SELECT
ctrl_scr_login_cd,
charge_cd,
user_name,
pwd,
title,
authori_ty_kbn,
sign,
sex_kbn,
hobby,
msg,
icon,
update_date,
register_date,
update_user_cd,
register_user_cd,
care_calendar_charge_flg,
disp_turn,
del_flg
FROM
    m_user
WHERE 
COMM_CD IN ( 
'15623',
'localdev',
'16082',
'10991',
'shimizu',
'17625',
'16520',
'17762',
'14179',
'16344')

'19713542',
'19762997',
'18819547',
'19783599',
'19878571',
'19942567',
'19930106',
'19910615',
'16392049',
'19939687'
