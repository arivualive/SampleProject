SELECT 
telegram_kbn AS TELEGRAM_KBN, 
send_flg AS SEND_STATUS, 
UPDATE_USER,   
REGIST_USER, 
to_char(UPDATE_DT, 'YYYY/MM/DD HH24:MI') as UPDATE_DATE, 
to_char(REGIST_DT, 'YYYY/MM/DD HH24:MI') as REGIST_DATE, 
TELEGRAM_EXPLANATION  
 FROM TelegramStat_Tbl  
 ORDER BY TELEGRAM_KBN 


UPDATE 
 TelegramStat_Tbl 
SET 
 send_status = " . getSqlValue($data[$i]['send_status']). 
 update_user = " . getSqlValue($S_USERID) . 
 update_dt = SYSDATE 
 WHERE TELEGRAM_KBN = " . getSqlValue($data[$i]['telegram_kbn'])