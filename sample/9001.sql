SELECT 
ACCEPTTIME_ID, 
ORDER_TIME_FROM, 
ORDER_TIME_TO, 
NEXTDAY_FLG, 
VIEW_TIME, 
RECEPTION_TIME, 
MEMO, 
SETTING, 
UPDATE_DT, 
REGIST_DT, 
UPDATE_USER, 
REGIST_USER 
FROM M_ORDERCHANGE_ACCEPTTIME_TBL 
WHERE 
ACCEPTTIME_ID = :accepttime_id 

$sql = "SELECT ";
$sql .= "acpt_avail_tm_cd AS ACCEPTTIME_ID, ";
$sql .= "odr_start_tm AS ORDER_TIME_FROM, ";
$sql .= "odr_end_tm AS ORDER_TIME_TO, ";
$sql .= "next_day_flg AS NEXTDAY_FLG, ";
$sql .= "disp_tm AS VIEW_TIME, ";
$sql .= "acpt_avail_tm AS RECEPTION_TIME, ";
$sql .= "memo AS MEMO, ";
$sql .= "set_kbn AS SETTING, ";
$sql .= "update_date AS UPDATE_DT, ";
$sql .= "register_date AS REGIST_DT, ";
$sql .= "update_user_cd AS UPDATE_USER, ";
$sql .= "register_user_cd AS REGIST_USER ";
$sql .= "FROM m_odr_upd_acpt_avail_tm ";
$sql .= "WHERE ";
$sql .= "acpt_avail_tm_cd = :accepttime_id ";


$sql = "SELECT ";
$sql .= "acpt_avail_tm_cd AS ACCEPTTIME_ID, ";
$sql .= "odr_start_tm AS ORDER_TIME_FROM, ";
$sql .= "odr_end_tm AS ORDER_TIME_TO, ";
$sql .= "next_day_flg AS NEXTDAY_FLG, ";
$sql .= "disp_tm AS VIEW_TIME, ";
$sql .= "acpt_avail_tm AS RECEPTION_TIME, ";
$sql .= "del_flg AS DELETE_FLG, ";
$sql .= "memo AS MEMO, ";
$sql .= "set_kbn AS SETTING ";
$sql .= "FROM m_odr_upd_acpt_avail_tm ";
$sql .= "WHERE ";
$sql .= "del_flg =  ";
$sql .= "ORDER BY acpt_avail_tm_cd ASC ";



$sql = "INSERT INTO m_odr_upd_acpt_avail_tm ";
 $sql .= "(  ";
 $sql .= "acpt_avail_tm_cd,  ";
 $sql .= "odr_start_tm,  ";
 $sql .= "odr_end_tm,  ";
 $sql .= "next_day_flg,  ";
 $sql .= "disp_tm,  ";
 $sql .= "acpt_avail_tm,  ";
 $sql .= "memo,  ";
 $sql .= "set_kbn,  ";
 $sql .= "update_date,  ";
 $sql .= "register_date,  ";
 $sql .= "update_user_cd,  ";
 $sql .= "register_user_cd  ";
$sql .= ") VALUES (  ";
    $sql .= ":accepttime_id  ";
   $sql .= ",:order_time_from  ";
   $sql .= ",:order_time_to  ";
   $sql .= ",:nextday_flg  ";
   $sql .= ",:view_time  ";
   $sql .= ",:reception_time  ";
   $sql .= ",:memo  ";
   $sql .= ",:setting  ";
   $sql .= ",current_timestamp(0) ";
   $sql .= ",current_timestamp(0) ";
   $sql .= ",:user_cd  ";
   $sql .= ",:user_cd  ";
$sql .= ") ";


$sql .= "UPDATE m_odr_upd_acpt_avail_tm ";
$sql .= "SET ";
    $sql .= "odr_start_tm = :order_time_from ";
   $sql .= ",odr_end_tm = :order_time_to ";
   $sql .= ",next_day_flg = :nextday_flg ";
   $sql .= ",disp_tm = :view_time ";
   $sql .= ",acpt_avail_tm = :reception_time ";
   $sql .= ",memo = :memo ";
   $sql .= ",set_kbn = :setting ";
   $sql .= ",update_date = current_timestamp(0) ";
   $sql .= ",update_user_cd = :user_cd ";
$sql .= "WHERE ";
 $sql .= "odr_start_tm = :accepttime_id ";

 $sql .= "UPDATE m_odr_upd_acpt_avail_tm ";
 $sql .= "SET ";
 $sql .= "del_flg = '1' ";
 $sql .= "WHERE ";
 $sql .= "odr_start_tm = :accepttime_id ";


 SELECT 
    ACCEPTTIME_ID, 
    ORDER_TIME_FROM, 
    ORDER_TIME_TO, 
    NEXTDAY_FLG, 
    VIEW_TIME, 
    RECEPTION_TIME, 
    DELETE_FLG, 
    MEMO, 
    SETTING 
FROM M_ORDERCHANGE_ACCEPTTIME_TBL 
WHERE 
    DELETE_FLG = 0
ORDER BY 
    ACCEPTTIME_ID ASC

SELECT 
    acpt_avail_tm_cd AS ACCEPTTIME_ID, 
    odr_start_tm AS ORDER_TIME_FROM, 
    odr_end_tm AS ORDER_TIME_TO, 
    next_day_flg AS NEXTDAY_FLG, 
    disp_tm AS VIEW_TIME, 
    acpt_avail_tm AS RECEPTION_TIME, 
    del_flg AS DELETE_FLG, 
    memo AS MEMO, 
    set_kbn AS SETTING 
FROM m_odr_upd_acpt_avail_tm 
WHERE 
    del_flg = 0
ORDER BY 
    acpt_avail_tm_cd ASC


INSERT INTO M_ORDERCHANGE_ACCEPTTIME_TBL
 ( 
    ACCEPTTIME_ID, 
    ORDER_TIME_FROM, 
    ORDER_TIME_TO, 
    NEXTDAY_FLG, 
    VIEW_TIME, 
    RECEPTION_TIME, 
    MEMO, 
    SETTING, 
    UPDATE_DT, 
    REGIST_DT, 
    UPDATE_USER, 
    REGIST_USER 
) VALUES ( 
    8 
   ,'1200' 
   ,'1300' 
   ,0 
   ,'1200' 
   ,'1300' 
   ,'22:45発送締め'
   ,'0' 
   ,SYSDATE 
   ,SYSDATE 
   ,'Tool:localdev' 
   ,'Tool:localdev' 
)

INSERT INTO m_odr_upd_acpt_avail_tm
 ( 
    acpt_avail_tm_cd, 
    odr_start_tm, 
    odr_end_tm, 
    next_day_flg, 
    disp_tm, 
    acpt_avail_tm, 
    memo, 
    set_kbn, 
    update_date, 
    register_date, 
    update_user_cd, 
    register_user_cd 
) VALUES ( 
    '12'
   ,'1200' 
   ,'1300' 
   ,'0'
   ,'1200' 
   ,'1300' 
   ,'22:45発送締め'
   ,'0' 
   ,current_timestamp(0)
   ,current_timestamp(0) 
   ,'Tool:localdev' 
   ,'Tool:localdev'
)

UPDATE M_ORDERCHANGE_ACCEPTTIME_TBL
SET
    ORDER_TIME_FROM = '1300'
   ,ORDER_TIME_TO = '1400'
   ,NEXTDAY_FLG = '0'
   ,VIEW_TIME = '0'
   ,RECEPTION_TIME = '1300'
   ,MEMO = 'テスト'
   ,SETTING = 0
   ,UPDATE_DT = SYSDATE
   ,UPDATE_USER = 'Tool:localdev'
WHERE
 ACCEPTTIME_ID = 12

UPDATE m_odr_upd_acpt_avail_tm
SET
    odr_start_tm = '1300'
   ,odr_end_tm = '1400'
   ,next_day_flg = '0'
   ,disp_tm = '1300'
   ,acpt_avail_tm = '1400'
   ,memo = 'テスト'
   ,set_kbn = '0'
   ,update_date = current_timestamp(0)
   ,update_user_cd = 'Tool:localdev'
WHERE
 odr_start_tm = '12'

UPDATE M_ORDERCHANGE_ACCEPTTIME_TBL 
SET 
    DELETE_FLG = 1 
WHERE 
    ACCEPTTIME_ID = 12

UPDATE m_odr_upd_acpt_avail_tm 
SET 
    del_flg = '1' 
WHERE 
    acpt_avail_tm_cd = '12'

SELECT 
    ACCEPTTIME_ID, 
    ORDER_TIME_FROM, 
    ORDER_TIME_TO, 
    NEXTDAY_FLG, 
    VIEW_TIME, 
    RECEPTION_TIME, 
    MEMO, 
    SETTING, 
    UPDATE_DT, 
    REGIST_DT, 
    UPDATE_USER, 
    REGIST_USER 
    FROM M_ORDERCHANGE_ACCEPTTIME_TBL 
    WHERE 
    ACCEPTTIME_ID = 5

