SELECT 
MAILDRAFTCD,
TANTOCD,
GYOUMUKBN,
CONTACTID,
KAIINCD,
STFUNC_SSK_DEC(MAIL_NAME),
STFUNC_SSK_DEC(MAIL_TO),
MAIL_KAINNO,
MAIL_FROM,
MAIL_SUBJECT,
MAIL_BODY,
MAIL_SIGNATURE,
MAIL_TEIKEIFLG,
MAIL_MEMO1,
MAIL_MEMO2,
UPDATE_DT,
REGIST_DT,
UPDATE_USER,
REGIST_USER,
SHOHIN1_CD,
SHOHIN2_CD,
SHOHIN3_CD,
SHOHIN4_CD,
SHOHIN5_CD,
SHOHIN6_CD,
SHOHIN7_CD,
SHOHIN8_CD,
MAIL_CD,
MAIL_TAIOUMEMO,
SHOHIN9_CD,
SHOHIN10_CD
FROM MAILDRAFT_TBL

UPDATE MAILDRAFT_TBL
set
  ContactID = '7529225'
, KaiinCD   = '2884433'
, MAIL_NAME = '谷村　３０Ｘ'
, MAIL_TO   = 'aaaaa@gmail.com'
, MAIL_KAINNO = '2884433'
, MAIL_FROM = '4'
, MAIL_SUBJECT = '【ドモホルンリンクル】'
, MAIL_BODY    = 'テスト'
, MAIL_SIGNATURE = '………テスト………'
, MAIL_TEIKEIFLG = '2'
, SHOHIN1_CD     = '0112'
, SHOHIN2_CD     = '0113'
, SHOHIN3_CD     = '0114'
, SHOHIN4_CD     = '0115'
, SHOHIN5_CD     = '0116'
, SHOHIN6_CD     = '0117'
, SHOHIN7_CD     = '0118'
, SHOHIN8_CD     = '0119'
, UPDATE_DT    = sysdate
, UPDATE_USER  = 'TOOL:' || '17703'
WHERE TANTOCD     = '17703'
AND   GYOUMUKBN   = '15'
AND   MAILDRAFTCD = '1447142'


UPDATE w_mail_draft
set
  contact_cd         = '1087678'
, cust_no            = 2884433
, mail_draft_to_name = '谷村　３０Ｘ'
, mail_draft_to      = 'aaaaa@gmail.com'
, mail_draft_cust_no = 2884433
, mail_draft_sender_kbn = '4'
, mail_draft_subject = '【ドモホルンリンクル】'
, mail_draft_body_letter 'テスト'
, mail_draft_sign    = '………テスト………'
, mail_draft_fixed_flg = '2'
, recommend_item_cd_1 = '0112'
, recommend_item_cd_2 = '0113'
, recommend_item_cd_3 = '0114'
, recommend_item_cd_4 = '0115'
, recommend_item_cd_5 = '0116'
, recommend_item_cd_6 = '0117'
, recommend_item_cd_7 = '0118'
, recommend_item_cd_8 = '0119'
, update_date    = CURRENT_TIMESTAMP(0)
, update_user_cd = 'TOOL:' || '17703'
WHERE charge_cd = '17703'
AND bs_kbn = '15'
AND mail_draft_cd = 1447142

UPDATE MAILDRAFT_TBL
set
  ContactID = '0'
, KaiinCD   = null 
, MAIL_NAME = null
, MAIL_TO   = null
, MAIL_KAINNO = null
, MAIL_FROM = null
, MAIL_SUBJECT = '【再春館製薬所】'
, MAIL_BODY    = '再春館‐テスト'
, MAIL_SIGNATURE = '………再春館‐テスト………'
, MAIL_TEIKEIFLG = '1'
, SHOHIN1_CD     = null
, SHOHIN2_CD     = null
, SHOHIN3_CD     = null
, SHOHIN4_CD     = null
, SHOHIN5_CD     = null
, SHOHIN6_CD     = null
, SHOHIN7_CD     = null
, SHOHIN8_CD     = null
, UPDATE_DT    = sysdate
, UPDATE_USER  = 'TOOL:' || '17703'
WHERE TANTOCD     = '17703'
AND   GYOUMUKBN   = '15'
AND   MAILDRAFTCD = '1447142'

UPDATE w_mail_draft
set
  contact_cd = '0'
, cust_no   = null 
, mail_draft_to_name = null
, mail_draft_to   = null
, mail_draft_cust_no = null
, mail_draft_sender_kbn = null
, mail_draft_subject = '【再春館製薬所】'
, mail_draft_body_letter = '再春館‐テスト'
, mail_draft_sign = '………再春館‐テスト………'
, mail_draft_fixed_flg = '1'
, recommend_item_cd_1 = null
, recommend_item_cd_2 = null
, recommend_item_cd_3 = null
, recommend_item_cd_4 = null
, recommend_item_cd_5 = null
, recommend_item_cd_6 = null
, recommend_item_cd_7 = null
, recommend_item_cd_8 = null
, update_date    = CURRENT_TIMESTAMP(0)
, update_user_cd  = 'TOOL:' || '17703'
WHERE charge_cd     = '17703'
AND   bs_kbn   = '15'
AND   mail_draft_cd = 1447142


UPDATE MAILDRAFT_TBL
set
  ContactID = null 
, KaiinCD   = null 
, MAIL_NAME = null
, MAIL_TO   = null
, MAIL_KAINNO = null
, MAIL_FROM = null
, MAIL_SUBJECT = '【再春館製薬所】'
, MAIL_BODY    = '再春館‐テスト'
, MAIL_SIGNATURE = '………再春館‐テスト………'
, MAIL_TEIKEIFLG = '1'
, SHOHIN1_CD     = null
, SHOHIN2_CD     = null
, SHOHIN3_CD     = null
, SHOHIN4_CD     = null
, SHOHIN5_CD     = null
, SHOHIN6_CD     = null
, SHOHIN7_CD     = null
, SHOHIN8_CD     = null
, UPDATE_DT    = sysdate
, UPDATE_USER  = 'TOOL:' || '17703'
WHERE TANTOCD     = '17703'
AND   GYOUMUKBN   = '15'
AND   MAILDRAFTCD = '1447142'

UPDATE w_mail_draft
set
  contact_cd = null
, cust_no   = null 
, mail_draft_to_name = null
, mail_draft_to   = null
, mail_draft_cust_no = null
, mail_draft_sender_kbn = null
, mail_draft_subject = '【再春館製薬所】'
, mail_draft_body_letter = '再春館‐テスト'
, mail_draft_sign = '………再春館‐テスト………'
, mail_draft_fixed_flg = '1'
, recommend_item_cd_1 = null
, recommend_item_cd_2 = null
, recommend_item_cd_3 = null
, recommend_item_cd_4 = null
, recommend_item_cd_5 = null
, recommend_item_cd_6 = null
, recommend_item_cd_7 = null
, recommend_item_cd_8 = null
, update_date    = CURRENT_TIMESTAMP(0)
, update_user_cd  = 'TOOL:' || '17703'
WHERE charge_cd     = '17703'
AND   bs_kbn   = '15'
AND   mail_draft_cd = 1447142


1447196=7529225
1447197=1087676

INSERT INTO MAILDRAFT_TBL (
 MailDraftCD
,TantoCD
,GyoumuKbn
,ContactID
,KaiinCD
,MAIL_NAME
,MAIL_TO
,MAIL_KAINNO
,MAIL_FROM
,MAIL_SUBJECT
,MAIL_BODY
,MAIL_SIGNATURE
,MAIL_TAIOUMEMO
,MAIL_TEIKEIFLG
,UPDATE_DT
,REGIST_DT
,UPDATE_USER
,REGIST_USER
,SHOHIN1_CD
,MAIL_CD
 ) VALUES ( 
  '1500000'
, '17122'
, '17'
, '1111111'
, '99999999'
, 'テスト'
, 'aaa@gmail.com'
, '99999999'
, '4'
, 'テスト'
, 'テスト'
, 'テスト'
, 'テスト'
, '3'
, sysdate
, sysdate
, 'TOOL:' || '17122'
, 'TOOL:' || '17122'
, '0115'
, '1112'
)

INSERT INTO w_mail_draft (
 mail_draft_cd
,charge_cd
,bs_kbn
,contact_cd
,cust_no
,mail_draft_to_name
,mail_draft_to
,mail_draft_cust_no
,mail_draft_sender_kbn
,mail_draft_subject
,mail_draft_body_letter
,mail_draft_sign
,mail_draft_act_memo
,mail_draft_fixed_flg
,update_date
,register_date
,update_user_cd
,register_user_cd
,recommend_item_cd_1
,mail_cd
 ) VALUES ( 
  1500000
, '17122'
, '17'
, '1111111'
, 99999999
, 'テスト'
, 'aaa@gmail.com'
, '99999999'
, '4'
, 'テスト'
, 'テスト'
, 'テスト'
, 'テスト'
, '3'
, CURRENT_TIMESTAMP(0)
, CURRENT_TIMESTAMP(0)
, 'TOOL:' || '17122'
, 'TOOL:' || '17122'
, '0115'
, '1112'
)


INSERT INTO MAILDRAFT_TBL (
 MailDraftCD
,TantoCD
,GyoumuKbn
,ContactID
,KaiinCD
,MAIL_NAME
,MAIL_TO
,MAIL_KAINNO
,MAIL_FROM
,MAIL_SUBJECT
,MAIL_BODY
,MAIL_SIGNATURE
,MAIL_TAIOUMEMO
,MAIL_TEIKEIFLG
,UPDATE_DT
,REGIST_DT
,UPDATE_USER
,REGIST_USER
,SHOHIN1_CD
,MAIL_CD
 ) VALUES ( 
  '1500001'
, '17122'
, '17'
, null
, null
, null
, null
, null
, null
, null
, null
, null
, null
, null
, sysdate
, sysdate
, 'TOOL:' || '17122'
, 'TOOL:' || '17122'
, null
, null
)


INSERT INTO w_mail_draft (
 mail_draft_cd
,charge_cd
,bs_kbn
,contact_cd
,cust_no
,mail_draft_to_name
,mail_draft_to
,mail_draft_cust_no
,mail_draft_sender_kbn
,mail_draft_subject
,mail_draft_body_letter
,mail_draft_sign
,mail_draft_act_memo
,mail_draft_fixed_flg
,update_date
,register_date
,update_user_cd
,register_user_cd
,recommend_item_cd_1
,mail_cd
 ) VALUES ( 
  150000
, '17122'
, '17'
, null
, null
, null
, null
, null
, null
, null
, null
, null
, null
, null
, CURRENT_TIMESTAMP(0)
, CURRENT_TIMESTAMP(0)
, 'TOOL:' || '17122'
, 'TOOL:' || '17122'
, null
, null
)


SELECT 
 a.MAILDRAFTCD
,a.TantoCD
,a.GYOUMUKBN
,a.CONTACTID
,a.KAIINCD
,a.MAIL_NAME
,a.MAIL_TO
,a.MAIL_KAINNO
,a.MAIL_FROM
,a.MAIL_SUBJECT
,a.MAIL_BODY
,a.MAIL_SIGNATURE
,a.MAIL_MEMO1
,a.MAIL_MEMO2
,a.MAIL_CD
,a.MAIL_TAIOUMEMO
,to_char(a.UPDATE_DT,'YYYY-MM-DD hh24:mi:ss') as UPDATE_DT
,b.KAIN_NAME 
 FROM MAILDRAFT_TBL a,member2_v b
 WHERE a.KAIINCD   = b.kainno(+)
 AND   a.TANTOCD   = '17372'
 AND   (a.GyoumuKbn   = '21' OR a.GyoumuKbn   = '29')
 order by a.MAILDRAFTCD desc,a.UPDATE_DT desc


 SELECT 
 a.mail_draft_cd as MAILDRAFTCD
,a.charge_cd     as TantoCD
,a.bs_kbn        as GYOUMUKBN
,a.contact_cd    as CONTACTID
,lpad(cast(a.cust_no as varchar), 8, '0') as KAIINCD
,a.mail_draft_to_name as MAIL_NAME
,a.mail_draft_to as MAIL_TO
,lpad(cast(a.mail_draft_cust_no as varchar), 8, '0') as MAIL_KAINNO
,a.mail_draft_sender_kbn as MAIL_FROM
,a.mail_draft_subject as MAIL_SUBJECT
,a.mail_draft_body_letter as MAIL_BODY
,a.mail_draft_sign as MAIL_SIGNATURE
,a.mail_draft_memo_1 as MAIL_MEMO1
,a.mail_draft_memo_2 as MAIL_MEMO2
,a.mail_cd as MAIL_CD
,a.mail_draft_act_memo as MAIL_TAIOUMEMO
,to_char(a.update_date,'YYYY-MM-DD hh24:mi:ss') as UPDATE_DT
,b.cust_name as KAIN_NAME 
 FROM w_mail_draft a
 left outer join m_net_mbr b
 on a.cust_no   = b.cust_no
 where a.charge_cd   = '17372'
 AND   (a.bs_kbn   = '21' OR a.bs_kbn   = '29')
 order by a.mail_draft_cd desc,a.update_date desc

 SELECT 
 a.MAILDRAFTCD
,a.TantoCD
,a.GYOUMUKBN
,a.CONTACTID
,a.KAIINCD
,a.MAIL_NAME
,a.MAIL_TO
,a.MAIL_KAINNO
,a.MAIL_FROM
,a.MAIL_SUBJECT
,a.MAIL_BODY
,a.MAIL_SIGNATURE
,a.MAIL_MEMO1
,a.MAIL_MEMO2
,a.MAIL_CD
,a.MAIL_TAIOUMEMO
,to_char(a.UPDATE_DT,'YYYY-MM-DD hh24:mi:ss') as UPDATE_DT
,b.KAIN_NAME 
 FROM MAILDRAFT_TBL a,member2_v b
 WHERE a.KAIINCD   = b.kainno(+)
 AND   a.TANTOCD   = '10424'
 AND   a.GyoumuKbn   = '17'
 order by a.MAILDRAFTCD desc,a.UPDATE_DT desc


 SELECT 
 a.mail_draft_cd as MAILDRAFTCD
,a.charge_cd     as TantoCD
,a.bs_kbn        as GYOUMUKBN
,a.contact_cd    as CONTACTID
,lpad(cast(a.cust_no as varchar), 8, '0') as KAIINCD
,a.mail_draft_to_name as MAIL_NAME
,a.mail_draft_to as MAIL_TO
,lpad(cast(a.mail_draft_cust_no as varchar), 8, '0') as MAIL_KAINNO
,a.mail_draft_sender_kbn as MAIL_FROM
,a.mail_draft_subject as MAIL_SUBJECT
,a.mail_draft_body_letter as MAIL_BODY
,a.mail_draft_sign as MAIL_SIGNATURE
,a.mail_draft_memo_1 as MAIL_MEMO1
,a.mail_draft_memo_2 as MAIL_MEMO2
,a.mail_cd as MAIL_CD
,a.mail_draft_act_memo as MAIL_TAIOUMEMO
,to_char(a.update_date,'YYYY-MM-DD hh24:mi:ss') as UPDATE_DT
,b.cust_name as KAIN_NAME 
 FROM w_mail_draft a
 left outer join m_net_mbr b
 on a.cust_no   = b.cust_no
 where a.charge_cd   = '10424'
 AND   a.bs_kbn   = '17'
 order by a.mail_draft_cd desc,a.update_date desc


SELECT 
 a.MAILDRAFTCD
,a.TantoCD
,a.GYOUMUKBN
,a.CONTACTID
,a.KAIINCD
,a.MAIL_NAME
,a.MAIL_TO
,a.MAIL_KAINNO
,a.MAIL_FROM
,a.MAIL_SUBJECT
,a.MAIL_BODY
,a.MAIL_SIGNATURE
,a.MAIL_MEMO1
,a.MAIL_MEMO2
,a.MAIL_CD
,a.MAIL_TAIOUMEMO
,to_char(a.UPDATE_DT,'YYYY-MM-DD hh24:mi:ss') as UPDATE_DT
,b.KAIN_NAME 
 FROM MAILDRAFT_TBL a,member2_v b
 WHERE a.KAIINCD   = b.kainno(+)
 AND   a.TANTOCD   = '17372'
 AND   a.GYOUMUKBN <> '21'
 order by a.MAILDRAFTCD desc,a.UPDATE_DT desc

 SELECT 
 a.mail_draft_cd as MAILDRAFTCD
,a.charge_cd     as TantoCD
,a.bs_kbn        as GYOUMUKBN
,a.contact_cd    as CONTACTID
,lpad(cast(a.cust_no as varchar), 8, '0') as KAIINCD
,a.mail_draft_to_name as MAIL_NAME
,a.mail_draft_to as MAIL_TO
,lpad(cast(a.mail_draft_cust_no as varchar), 8, '0') as MAIL_KAINNO
,a.mail_draft_sender_kbn as MAIL_FROM
,a.mail_draft_subject as MAIL_SUBJECT
,a.mail_draft_body_letter as MAIL_BODY
,a.mail_draft_sign as MAIL_SIGNATURE
,a.mail_draft_memo_1 as MAIL_MEMO1
,a.mail_draft_memo_2 as MAIL_MEMO2
,a.mail_cd as MAIL_CD
,a.mail_draft_act_memo as MAIL_TAIOUMEMO
,to_char(a.update_date,'YYYY-MM-DD hh24:mi:ss') as UPDATE_DT
,b.cust_name as KAIN_NAME 
 FROM w_mail_draft a
 left outer join m_net_mbr b
 on a.cust_no   = b.cust_no
 where a.charge_cd   = '17372'
 AND   a.bs_kbn <> '21'
 order by a.mail_draft_cd desc,a.update_date desc

SELECT  ctrl_scr_login_cd AS comm_cd
       ,user_name AS comm_nm
       ,pwd AS comm_pw
FROM m_user
WHERE ctrl_scr_login_cd = ''



4272
SELECT 
 TAIOUCD
,TANTOCD
,GYOUMUSCREEN
,GYOUMUKBN
,TEIKEIFLG
 FROM CJISSEKI_MAIL_TBL 
 WHERE TantoCD = '17762'
 AND GyoumuScreen = '08'
 AND GyoumuKbn = '21'
 AND TAIOUCD = '3804923'
 AND ENDTIME  is null
 AND SYNC_FLG is null
 order by regist_dt desc

 SELECT 
 act_seq as TAIOUCD
,charge_cd as TANTOCD
,bs_scr_kbn as GYOUMUSCREEN
,bs_kbn as GYOUMUKBN
,fixed_kbn as TEIKEIFLG
 FROM f_mail_cre_actual 
 WHERE charge_cd = '17762'
 AND bs_scr_kbn = '08'
 AND bs_kbn = '21'
 AND act_seq = 3804923
 AND (actual_eva_end_tm is null or actual_eva_end_tm = '')
 AND (sync_flg is null or sync_flg = '')
 order by register_date desc

 INSERT INTO CJISSEKI_MAIL_TBL (
 TaiouCD
,ShoriDate
,TantoCD
,StartTime
,RequestKbn
,GyoumuScreen
,GyoumuKbn
,HyoukaKbn
,HyoukaTime
,SYNC_FLG
,TEIKEIFLG
,UPDATE_DT
,REGIST_DT
,UPDATE_USER
,REGIST_USER
,KAIINMAILSEND_CD
 )VALUES( 
 SEQ_TAIOUCD.NEXTVAL
,systimestamp
,'17132'
,to_char(sysdate,'hh24miss')
,'5'
,'08'
,'20'
,'0'
,NULL
,NULL
,NULL
,sysdate
,sysdate
,'TOOL:' || '17132'
,'TOOL:' || '17132'
,'1447413'
)


INSERT 
INTO f_mail_cre_actual( 
    act_seq
    , proc_dt
    , charge_cd
    , actual_eva_start_tm
    , bill_kbn
    , bs_scr_kbn
    , bs_kbn
    , eva_kbn
    , eva_tm
    , sync_flg
    , fixed_kbn
    , update_date
    , register_date
    , update_user_cd
    , register_user_cd
    , indiv_act_mail_send_hist_cd
) 
VALUES ( 
    nextval('seq_act_seq')
    , CURRENT_TIMESTAMP (0)
    , '17132'
    , to_char(CURRENT_TIMESTAMP (0), 'hh24miss')
    , '5'
    , '08'
    , '20'
    , '0'
    , NULL
    , NULL
    , NULL
    , CURRENT_TIMESTAMP (0)
    , CURRENT_TIMESTAMP (0)
    , 'TOOL:' || '17132'
    , 'TOOL:' || '17132'
    , 1447413
)


UPDATE CJISSEKI_MAIL_TBL 
 SET 
 EndTime      = to_char(sysdate,'hh24miss')
,HyoukaKbn    = '5'
,HyoukaTime = (((to_char(sysdate,'hh24') * 60 * 60) + (to_char(sysdate,'mi') * 60 ) + to_char(sysdate,'ss')) - 
  ((SUBSTR(StartTime,1,2) * 60 * 60) + (SUBSTR(StartTime,3,2) * 60 ) + SUBSTR(StartTime,5,2))   )
,KAIINMAILSEND_CD = '1447383'
,KAIINCD      = '11111111'
,SYNC_FLG='0'
,TeikeiFlg = '1'
,UPDATE_DT = sysdate
,UPDATE_USER = 'TOOL:' || '12345'
 WHERE TaiouCD ='3804978'
 AND TantoCD ='17132'
 AND RequestKbn ='5'
 AND GyoumuScreen ='08'
 AND GyoumuKbn ='20'
 AND SYNC_FLG is null

 UPDATE f_mail_cre_actual 
 SET 
 actual_eva_end_tm = to_char(CURRENT_TIMESTAMP(0),'hh24miss')
,eva_kbn    = '5'
,eva_tm = ((
            (cast(to_char(CURRENT_TIMESTAMP(0),'hh24') as integer) * 60 * 60)
          + (cast(to_char(CURRENT_TIMESTAMP(0),'mi') as integer) * 60 )
          +  cast(to_char(CURRENT_TIMESTAMP(0),'ss') as integer)
           ) - (
            (cast(SUBSTR(actual_eva_start_tm,1,2) as integer) * 60 * 60)
          + (cast(SUBSTR(actual_eva_start_tm,3,2) as integer) * 60)
          +  cast(SUBSTR(actual_eva_start_tm,5,2) as integer)
           ))
,indiv_act_mail_send_hist_cd = 1447383
,cust_no      = 11111111
,sync_flg='0'
,fixed_kbn = '1'
,update_date = CURRENT_TIMESTAMP(0)
,update_user_cd = 'TOOL:' || '12345'
 WHERE act_seq =110
 AND charge_cd ='17132'
 AND bill_kbn ='5'
 AND bs_scr_kbn ='08'
 AND bs_kbn ='20'
 AND  (sync_flg is null or sync_flg = '')

 SELECT  TANTOCD
       ,TAIOUCD
       ,SHORIDATE
       ,lpad(starttime,6,'0') STARTTIME
       ,lpad(endtime ,6,'0') ENDTIME
       ,REQUESTKBN
       ,GYOUMUKBN
       ,HYOUKAKBN
       ,HYOUKATIME
       ,KAIINCD
       ,TEIKEIFLG
       ,UPDATE_DT
       ,REGIST_DT
       ,UPDATE_USER
       ,REGIST_USER
FROM CJISSEKI_MAIL_TBL
WHERE REGIST_DT > '2021-01-01' 
AND REGIST_DT < '2021-02-01' 
AND gyoumukbn = '20'
ORDER BY tantocd asc, TAIOUCD asc  

SELECT  charge_cd AS TANTOCD
       ,act_seq AS TAIOUCD
       ,proc_dt AS SHORIDATE
       ,lpad(actual_eva_start_tm,6,'0') AS STARTTIME
       ,lpad(actual_eva_end_tm ,6,'0') AS ENDTIME
       ,bill_kbn AS REQUESTKBN
       ,bs_kbn AS GYOUMUKBN
       ,eva_kbn AS HYOUKAKBN
       ,eva_tm AS HYOUKATIME
       ,cust_no AS KAIINCD
       ,fixed_kbn AS TEIKEIFLG
       ,update_date AS UPDATE_DT
       ,register_date AS REGIST_DT
       ,update_user_cd AS UPDATE_USER
       ,register_user_cd AS REGIST_USER
FROM f_mail_cre_actual
WHERE register_date > '2021-01-01' 
AND register_date < '2021-02-01' 
AND bs_kbn = '20'
ORDER BY charge_cd asc, act_seq asc

1510

SELECT  FUNC_CD
FROM ToolAuthority_Tbl
WHERE COMM_CD = '11111' 
AND FUNC_CD IN ('6011','6021','6031','6041','6051') 
AND VIEW_FLG = 1 

SELECT  func_cd AS FUNC_CD
FROM m_tool_authority
WHERE ctrl_scr_login_account = '11111' 
AND func_cd IN ('6011','6021','6031','6041','6051') 
AND view_flg = '1' 

4271

select
    max(ACCEPTTIME_ID) as VALUE 
from
    M_ORDERCHANGE_ACCEPTTIME_TBL


select
    COALESCE(max(acpt_avail_tm_cd), 0) as VALUE 
from
    m_odr_upd_acpt_avail_tm

1431

SELECT
    COLUMN_NAME
    , DATA_TYPE
    , DATA_LENGTH
    , NULLABLE 
FROM
    user_tab_columns 
WHERE
    table_name = 'ORDERED_TBL'

SELECT
    COLUMN_NAME
    , DATA_TYPE
    , CHARACTER_MAXIMUM_LENGTH AS DATA_LENGTH
    , IS_NULLABLE AS NULLABLE 
FROM
    INFORMATION_SCHEMA.COLUMNS 
WHERE
    TABLE_NAME = 'f_odr_stat_chk'


1450

update webProfile_Tbl 
set
    kounyu_num = '1' 
where
    kainno = '17517899'


update m_offline_data 
set
    buy_cnt = '1' 
where
    cust_no = '17517899'

1451

update webProfile_Tbl 
set
    zan_point = 50 
where
    kainno = '17517899'

update m_offline_data 
set
    accumulation_point = 50 
where
    cust_no = '17517899'



1449

update webProfile_Tbl 
set
    last_order_status = '3' 
where
    kainno = '17517899'


update m_offline_last_odr 
set
    odr_stat_kbn = '3' 
where
    mbr_seq IN ( 
        select
            mbr_seq 
        from
            m_offline_data 
        where
            cust_no = '17517899'
    )


4340

select
    SEQ_MAILDRAFTCD.NEXTVAL 
from
    dual


select
    nextval('seq_mail_draft_cd')


4315

select
    SEQ_MAILOSUSUMECD.NEXTVAL 
from
    dual

select
    nextval('seq_mail_recommend_cd')

4349

SELECT
 MEMBER_ID
 FROM MEMBER_TBL
 WHERE NETMEMBER_ID = '_00003395533'

SELECT
 mbr_seq as MEMBER_ID
 FROM m_net_mbr
 WHERE net_mbr_cd = '_00003395533'

 4339

select
    stfunc_ssk(KAIN_NAME) KAIN_NAME 
from
    member_tbl 
where
    kainno = '20364500'


select
    cust_name as KAIN_NAME 
from
    m_net_mbr 
where
    cust_no = 20364500


4351

SELECT
    TAX_RATE 
FROM
    SYSTEM_TBL 
where
    site_kbn = '1'


SELECT
    tax_rate as TAX_RATE 
FROM
    m_sys_set 
where
    site_kbn = '1'

4359

SELECT
    STATUS 
FROM
    SYSTEM_TBL 
where
    site_kbn = '1'


SELECT
    stat_kbn as STATUS 
FROM
    m_sys_set 
where
    site_kbn = '1'


4367

SELECT
    ATTENTION 
FROM
    ATTENTION_TBL 
WHERE
    ATTENTION_CD = '3613'

SELECT
    att_cont as ATTENTION 
FROM
    m_att 
WHERE
    att_cd = '3613'

4331

INSERT INTO MAILOSUSUMEDETAIL_TBL (
 MailOsusumeCD
,SHOHIN_CD
,SELECT_FLG
,KEYWORD_FLG
,UPDATE_DT
,REGIST_DT
,UPDATE_USER
,REGIST_USER
 )VALUES( 
 '1002'
,'0166'
,'0'
,'1'
, sysdate
, sysdate
,'TOOL:' || 'localdev'
,'TOOL:' || 'localdev'
)

INSERT INTO f_mail_recommend_info_d (
 mail_recommend_cd
,item_cd
,report_flg
,sente_keyword_flg
,update_date
,register_date
,update_user_cd
,register_user_cd
 )VALUES( 
 '1002'
,'0166'
,'0'
,'1'
, CURRENT_TIMESTAMP(0)
, CURRENT_TIMESTAMP(0)
,'TOOL:' || 'localdev'
,'TOOL:' || 'localdev'
)


4319-1

INSERT 
INTO MAILOSUSUME_TBL( 
    MailOsusumeCD
    , TantoCD
    , GyoumuKbn
    , ContactID
    , KaiinCD
    , SEND_DT
    , SEND_TM
    , TeikeiFlg
    , SYNC_FLG
    , DELETE_FLG
    , UPDATE_DT
    , REGIST_DT
    , UPDATE_USER
    , REGIST_USER
    , KAIN_NAME
) 
VALUES ( 
    '1002'
    , '17322'
    , '21'
    , '0'
    , '11111111'
    , to_char(sysdate, 'YYYYMMDD')
    , to_char(sysdate, 'hh24miss')
    , '3'
    , '0'
    , '0'
    , sysdate
    , sysdate
    , 'TOOL:' || '17322'
    , 'TOOL:' || '17322'
    , '山本　XXX'
)



INSERT INTO f_mail_recommend_info_h (
 mail_recommend_cd
,charge_cd
,bs_kbn
,contact_cd
,cust_no
,send_dt
,send_tm
,fixed_flg
,sync_flg
,del_flg
,update_date
,register_date
,update_user_cd
,register_user_cd
,cust_name
 )VALUES( 
  '1002'
, '17322'
, '21'
, '0'
, '11111111'
, to_char(CURRENT_TIMESTAMP(0),'YYYYMMDD')
, to_char(CURRENT_TIMESTAMP(0),'hh24miss')
, '3'
, '0'
, '0'
, CURRENT_TIMESTAMP(0)
, CURRENT_TIMESTAMP(0)
, 'TOOL:' || '17322'
, 'TOOL:' || '17322'
, '山本　XXX'
)

4319-2

INSERT INTO MAILOSUSUME_TBL (
 MailOsusumeCD
,TantoCD
,GyoumuKbn
,ContactID
,KaiinCD
,SEND_DT
,SEND_TM
,TeikeiFlg
,SYNC_FLG
,DELETE_FLG
,UPDATE_DT
,REGIST_DT
,UPDATE_USER
,REGIST_USER
,KAIN_NAME
 )VALUES( 
  '1003'
, '17322'
, '21'
, null
, null
, to_char(sysdate,'YYYYMMDD')
, to_char(sysdate,'hh24miss')
, '1'
, '0'
, '0'
, sysdate
, sysdate
, 'TOOL:' || '17322'
, 'TOOL:' || '17322'
, '宮崎　XXX'
)

INSERT INTO f_mail_recommend_info_h (
 mail_recommend_cd
,charge_cd
,bs_kbn
,contact_cd
,cust_no
,send_dt
,send_tm
,fixed_flg
,sync_flg
,del_flg
,update_date
,register_date
,update_user_cd
,register_user_cd
,cust_name
 )VALUES( 
  '1003'
, '17322'
, '21'
, null
, null
, to_char(CURRENT_TIMESTAMP(0),'YYYYMMDD')
, to_char(CURRENT_TIMESTAMP(0),'hh24miss')
, '1'
, '0'
, '0'
, CURRENT_TIMESTAMP(0)
, CURRENT_TIMESTAMP(0)
, 'TOOL:' || '17322'
, 'TOOL:' || '17322'
, '宮崎　XXX'
)



4337

select
    CONTRIBUTOR 
from
    cbbs_hada_tbl 
where
    pid = '1' 
    and admin_kbn = '0'

select
    contributor as CONTRIBUTOR 
from
    f_skin_worry 
where
    master_cd = '1' 
    and manager_kbn = '0'

4341

select
    KAINNO 
from
    CBBS_Hada_Tbl 
where
    PID = '1'

select
    lpad(cast(cust_no as varchar), 8, '0') as KAINNO 
from
    f_skin_worry 
where
    master_cd = 1

4343

select
    GID 
from
    CBBS_Hada_Tbl 
where
    pid = '1'

select
    parent_cd as GID 
from
    f_skin_worry 
where
    master_cd = 1

4345

SELECT
    IGNORESTRING 
FROM
    EDITOR_IGNORESTRING_TBL 
where
    KINOKBN = 1


SELECT
    except_string as IGNORESTRING 
FROM
    m_except_string 
where
    func_kbn = 1

4352

INSERT INTO OPERATIONTRACKS_TBL (
 MEMBER_ID
,TRANSACTION_DT
,TRANSACTION_KBN
,SESSION_ID
,RECV_ORDER_ID
,ERROR_CD
,ERROR_DETAILS
,SYNC_FLG
,SITE_KBN
,REGIST_USER
,UPDATE_USER
 ) VALUES ( 
 1111111
,SYSDATE
,'04'
,'a1cdc115fa10c17118efdfd38ced1d4f'
,'111111'
,NULL
,NULL
,'0'
,'1'
,'PC: /domo/service/login/index.html'
,'PC: /domo/service/login/index.html'
)

INSERT INTO h_operat (
 mbr_seq
,proc_dt_tm
,proc_kbn
,session_id
,odr_cd
,err_cd
,err_dtl
,sync_flg
,site_kbn
,register_user_cd
,update_user_cd
 ) VALUES ( 
 1111111
,CURRENT_TIMESTAMP(0)
,'04'
,'a1cdc115fa10c17118efdfd38ced1d4f'
,11111111
,NULL
,NULL
,'0'
,'1'
,'PC: /domo/service/login/index.html'
,'PC: /domo/service/login/index.html'
)

4356

SELECT
    POINT
    , OPOINT
    , UPOINT 
FROM
    RECVORDER_TBL 
WHERE
    KAINNO = '5526283' 
    AND HOST_FLG = '0' 
    AND DELETE_FLG = '0'

SELECT
    accumulation_point as POINT
    , this_time_buy_point as OPOINT
    , this_time_use_point as UPOINT 
FROM
    f_odr_h 
WHERE
    cust_no = 5526283 
    AND core_sys_kbn = '0' 
    AND del_flg = '0'

4360

SELECT
    MESSAGE_TITLE
    , MESSAGE_BODY 
FROM
    MSTMESSAGE_TBL 
WHERE
    DISP_FLG = 1 
    AND TO_CHAR(START_DT, 'YYYYMMDDHH24MISS') <= '20200701000000'
    AND TO_CHAR(END_DT, 'YYYYMMDDHH24MISS') >= '20210601000000'
    AND MESSAGE_ID = 3

SELECT
    msg_title as MESSAGE_TITLE
    , msg_body_letter as MESSAGE_BODY 
FROM
    m_msg 
WHERE
    disp_flg = 1 
    AND TO_CHAR(disp_start_dt_tm, 'YYYYMMDDHH24MISS') <= '20200701000000' 
    AND TO_CHAR(disp_end_dt_tm, 'YYYYMMDDHH24MISS') >= '20210601000000' 
    AND msg_seq = 3


4362


SELECT
    SHIGAI 
FROM
    SHIGAI_TBL 
WHERE
    SHIGAI = '0987'


SELECT
    area_tel_no as SHIGAI 
FROM
    m_area_tel_no 
WHERE
    area_tel_no = '0987'

4363



select
    ATTRIBUTE_ID
    , JIS_CODE_PREF 
from
    MstAttribute_Tbl 
where
    VALID_FLG = '1' 
    AND AGE_LOWER <= 41 
    AND AGE_UPPER >= 49
    AND GENDER IN (2, '0') 
    AND LAST_PURCHASE_START_DAYS <= 0
    AND LAST_PURCHASE_END_DAYS >= 1000 
    AND FIRST_PURCHASE_START_DAYS <= 0
    AND FIRST_PURCHASE_END_DAYS >= 1000 
    AND COSMETICS_PURCHASE_CNT_LOWER <= 0
    AND COSMETICS_PURCHASE_CNT_UPPER >= 999999
ORDER BY
    PRIORITY ASC
    , ATTRIBUTE_ID ASC


select
    attr_seq as ATTRIBUTE_ID
    , local_mbr as JIS_CODE_PREF 
from
    m_mbr_attr_distinct_cond 
where
    avail_flg = '1' 
    AND age_range_from <= 41 
    AND age_range_upper >= 49 
    AND sex_kbn IN ('2', '0') 
    AND last_buy_prog_dt_start <= 0 
    AND last_buy_prog_dt_end >= 1000 
    AND first_buy_prog_dt_start <= 0 
    AND first_buy_prog_dt_end >= 1000 
    AND cosme_buy_cnt_from <= 0 
    AND cosme_buy_cnt_upper >= 999999 
ORDER BY
    prior_level ASC
    , attr_seq ASC

4364

SELECT
    MAIL_SUBJECT
    , MAIL_BODY
    , MAIL_FROM 
FROM
    AUTOMAIL_TBL 
WHERE
    AUTO_MAIL_ID = 1


SELECT
    mail_subject as MAIL_SUBJECT
    , mail_cont as MAIL_BODY
    , mail_send_from as MAIL_FROM 
FROM
    m_auto_send_mail 
WHERE
    auto_mail_seq = 1


4365

SELECT
    MAIL_ID
    , EMAIL
    , MAIL_NM
    , SENDWAY 
FROM
    KANRIMAIL_TBL 
WHERE
    MAIL_KUBUN = '4'

    
SELECT
    mail_seq as MAIL_ID
    , mail_adr as EMAIL
    , mail_name as MAIL_NM
    , send_way_kbn as SENDWAY 
FROM
    m_manager_mail 
WHERE
    ctrl_mail_kbn = 4

4375

INSERT 
INTO A900SEND_TBL( 
    SITE_KBN
    , KAINNO
    , SEND_DT
    , SESSION_ID
    , SESSION_DT
    , HOST_DATA
    , HOST_DATA2
    , HOST_RESULT
    , UPDATE_DT
    , REGIST_DT
    , UPDATE_USER
    , REGIST_USER
) 
VALUES ( 
    '1'
    , '11111111'
    , SYSDATE
    , NULL
    , SYSDATE
    , 'テスト'
    , 'テスト'
    , '1'
    , SYSDATE
    , SYSDATE
    , 'Tool:localdev'
    , 'Tool:localdev'
)


INSERT 
INTO f_a900( 
    site_kbn
    , cust_no
    , send_dt_tm
    , session_id
    , session_get_dt_tm
    , core_sys_send_data
    , core_sys_rcv_data
    , core_sys_send_rslt_flg
    , update_date
    , register_date
    , update_user_cd
    , register_user_cd
) 
VALUES ( 
    '1'
    , 11111111
    , CURRENT_TIMESTAMP (0)
    , NULL
    , CURRENT_TIMESTAMP (0)
    , 'テスト'
    , 'テスト'
    , '1'
    , CURRENT_TIMESTAMP (0)
    , CURRENT_TIMESTAMP (0)
    , 'Tool:localdev'
    , 'Tool:localdev'
)



-- SQL Format

1431

$sql = "SELECT ";
    $sql .= "COLUMN_NAME ";
    $sql .= ", DATA_TYPE ";
    $sql .= ", CHARACTER_MAXIMUM_LENGTH AS DATA_LENGTH ";
    $sql .= ", IS_NULLABLE AS NULLABLE  ";
$sql .= "FROM ";
    $sql .= "INFORMATION_SCHEMA.COLUMNS  ";
$sql .= "WHERE ";
    $sql .= "TABLE_NAME = '$selected_table' ";


1449

$post_sql = "update m_offline_last_odr "; 
$post_sql .= "set ";
    $post_sql .= "odr_stat_kbn = '3' "; 
$post_sql .= "where ";
    $post_sql .= "mbr_seq IN ( "; 
        $post_sql .= "select ";
            $post_sql .= "mbr_seq "; 
        $post_sql .= "from ";
            $post_sql .= "m_offline_data "; 
        $post_sql .= "where ";
            $post_sql .= "cust_no = '' ";
    $post_sql .= ") ";

1450

$post_sql = "update m_offline_data "; 
$post_sql .= "set ";
    $post_sql .= "buy_cnt = '1' "; 
$post_sql .= "where ";
    $post_sql .= "cust_no = '" . trim($post_sql) . "' ";

1451

$post_sql = "update m_offline_data  ";
$post_sql .= "set ";
    $post_sql .= "accumulation_point = 50  ";
$post_sql .= "where ";
    $post_sql .= "cust_no = '" . trim($post_sql) . "' ";

1493

$sql = "SELECT ";
    $sql .= "charge_cd AS TANTOCD ";
    $sql .= ", act_seq AS TAIOUCD ";
    $sql .= ", proc_dt AS SHORIDATE ";
    $sql .= ", lpad(actual_eva_start_tm, 6, '0') AS STARTTIME ";
    $sql .= ", lpad(actual_eva_end_tm, 6, '0') AS ENDTIME ";
    $sql .= ", bill_kbn AS REQUESTKBN ";
    $sql .= ", bs_kbn AS GYOUMUKBN ";
    $sql .= ", eva_kbn AS HYOUKAKBN ";
    $sql .= ", eva_tm AS HYOUKATIME ";
    $sql .= ", cust_no AS KAIINCD ";
    $sql .= ", fixed_kbn AS TEIKEIFLG ";
    $sql .= ", update_date AS UPDATE_DT ";
    $sql .= ", register_date AS REGIST_DT ";
    $sql .= ", update_user_cd AS UPDATE_USER ";
    $sql .= ", register_user_cd AS REGIST_USER  ";
$sql .= "FROM ";
    $sql .= "f_mail_cre_actual  ";
$sql .= "WHERE ";
    $sql .= "register_date > '".$year."-".$month."-01'  ";
    $sql .= "AND register_date < '".$year."-".$endmonth."-01'  ";
    $sql .= "AND bs_kbn = '20'  ";
$sql .= "ORDER BY ";
    $sql .= "charge_cd asc ";
    $sql .= ", act_seq asc ";

1510

$sql =  "SELECT "
    $sql .=  "func_cd AS FUNC_CD  "
$sql .=  "FROM "
    $sql .=  "m_tool_authority  "
$sql .=  "WHERE "
    $sql .=  "ctrl_scr_login_account = ".getSqlValue($S_USERID) ;
    $sql .=  "AND func_cd IN ('6011', '6021', '6031', '6041', '6051')  "
    $sql .=  "AND view_flg = '1' "

4272

$sql .= "SELECT  ";
    $sql .= "act_seq as TAIOUCD  ";
    $sql .= ", charge_cd as TANTOCD  ";
    $sql .= ", bs_scr_kbn as GYOUMUSCREEN  ";
    $sql .= ", bs_kbn as GYOUMUKBN  ";
    $sql .= ", fixed_kbn as TEIKEIFLG   ";
$sql .= "FROM  ";
    $sql .= "f_mail_cre_actual   ";
$sql .= "WHERE  ";
    $sql .= "charge_cd = '".$TantoCD."'   ";
if(trim($GyoumuScreen) != ""){  
    $sql .= "AND bs_scr_kb = '".str_pad($GyoumuScreen, 2, '0', STR_PAD_LEFT)."'  ";
}else{  
    $sql .= "AND bs_scr_kbn = '".$GyoumuScreen."'   ";
}  
    $sql .= "AND bs_kbn = '".$GyoumuKbn."'   ";
    $sql .= "AND act_seq = $TAIOUCD   ";
    $sql .= "AND (   ";
        $sql .= "actual_eva_end_tm is null   ";
        $sql .= "or actual_eva_end_tm = ''  ";
    $sql .= ")   ";
    $sql .= "AND (sync_flg is null or sync_flg = '')   ";
$sql .= "order by  ";
    $sql .= "register_date desc  ";

4276

$sql = "INSERT  ";
$sql .= "INTO f_mail_cre_actual(  ";
    $sql .= "act_seq ";
    $sql .= ", proc_dt ";
    $sql .= ", charge_cd ";
    $sql .= ", actual_eva_start_tm ";
    $sql .= ", bill_kbn ";
    $sql .= ", bs_scr_kbn ";
    $sql .= ", bs_kbn ";
    $sql .= ", eva_kbn ";
    $sql .= ", eva_tm ";
    $sql .= ", sync_flg ";
    $sql .= ", fixed_kbn ";
    $sql .= ", update_date ";
    $sql .= ", register_date ";
    $sql .= ", update_user_cd ";
    $sql .= ", register_user_cd ";
if ($kainMailSendCD != NULL) {
    $sql .= ", indiv_act_mail_send_hist_cd ";
}
$sql .= ")  ";
$sql .= "VALUES (  ";
    $sql .= "nextval('seq_act_seq') ";
    $sql .= ", CURRENT_TIMESTAMP (0) ";
    $sql .= ", '$TantoCD' ";
    $sql .= ", to_char(CURRENT_TIMESTAMP (0), 'hh24miss') ";
    $sql .= ", '$RequestKbn' ";
if(trim($GyoumuScreen) != ""){
    $sql .= ",'".str_pad($GyoumuScreen, 2, '0', STR_PAD_LEFT)."' ";
}else{
    $sql .= ",'".$GyoumuScreen."' ";
}
    $sql .= ", '$GyoumuKbn' ";
    $sql .= ", '0' ";
    $sql .= ", NULL ";
    $sql .= ", NULL ";
    $sql .= ", NULL ";
    $sql .= ", CURRENT_TIMESTAMP (0) ";
    $sql .= ", CURRENT_TIMESTAMP (0) ";
    $sql .= ", 'TOOL:' || '$TantoCD' ";
    $sql .= ", 'TOOL:' || '$TantoCD' ";
if ($kainMailSendCD != NULL) {
    $sql .= ", $kainMailSendCD ";
}
$sql .= ") ";

4283

$sql .= "UPDATE f_mail_cre_actual  ";
$sql .= "SET ";
    $sql .= "actual_eva_end_tm = to_char(CURRENT_TIMESTAMP (0), 'hh24miss') ";
    $sql .= ", eva_kbn = '".$HyoukaKbn."' ";
    $sql .= ", eva_tm = (  ";
        $sql .= "(  ";
            $sql .= "(  ";
                $sql .= "cast(  ";
                    $sql .= "to_char(CURRENT_TIMESTAMP (0), 'hh24') as integer ";
                $sql .= ") * 60 * 60 ";
            $sql .= ") + (  ";
                $sql .= "cast(to_char(CURRENT_TIMESTAMP (0), 'mi') as integer) * 60 ";
            $sql .= ") + cast(to_char(CURRENT_TIMESTAMP (0), 'ss') as integer) ";
        $sql .= ") - (  ";
            $sql .= "(  ";
                $sql .= "cast(SUBSTR(actual_eva_start_tm, 1, 2) as integer) * 60 * 60 ";
            $sql .= ") + (  ";
                $sql .= "cast(SUBSTR(actual_eva_start_tm, 3, 2) as integer) * 60 ";
            $sql .= ") + cast(SUBSTR(actual_eva_start_tm, 5, 2) as integer) ";
        $sql .= ") ";
    $sql .= ")  ";
if ($kainMailSendCD != NULL) {
    $sql .= ", indiv_act_mail_send_hist_cd = ".getSqlValue($kainMailSendCD);
}

logDebug("rec_type=".$rec_type);
logDebug("GyoumuKbn=".$GyoumuKbn);

if($GyoumuKbn==18 || $GyoumuKbn==19){
  if($KaiinCD){
   
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
    $sql .= ", cust_no = " .$tmp. ;
   }
  }
  
 }else{
  $tmp = putKainCD($KaiinCD);
  if($tmp){
    $sql .= ", cust_no = " .$tmp. ;
  }
 }
    $sql .= ", sync_flg = '0' ";
    $sql .= ", fixed_kbn = '".$TeikeiFlg."' ";
    $sql .= ", update_date = CURRENT_TIMESTAMP (0) ";
    $sql .= ", update_user_cd = ".getSqlValue("TOOL:".$TantoCD) ;
$sql .= " WHERE ";
    $sql .= "act_seq = .$TaiouCD.  ";
    $sql .= "AND charge_cd = '".$TantoCD."'  ";
    $sql .= "AND bill_kbn = '".$RequestKbn."'  ";
if(trim($GyoumuScreen) != ""){
    $sql .= " AND bs_scr_kbn ='".str_pad($GyoumuScreen, 2, '0', STR_PAD_LEFT)."' ";
}else{
    $sql .= " AND bs_scr_kbn ='".$GyoumuScreen."' ";
}
    $sql .= "AND bs_kbn = '".$GyoumuKbn."'  ";
    $sql .= "AND (sync_flg is null or sync_flg = '') ";


4287-1

$sql = "SELECT ";
    $sql .= "a.mail_draft_cd as MAILDRAFTCD ";
    $sql .= ", a.charge_cd as TantoCD ";
    $sql .= ", a.bs_kbn as GYOUMUKBN ";
    $sql .= ", a.contact_cd as CONTACTID ";
    $sql .= ", lpad(cast(a.cust_no as varchar), 8, '0') as KAIINCD ";
    $sql .= ", a.mail_draft_to_name as MAIL_NAME ";
    $sql .= ", a.mail_draft_to as MAIL_TO ";
    $sql .= ", lpad(cast(a.mail_draft_cust_no as varchar), 8, '0') as MAIL_KAINNO ";
    $sql .= ", a.mail_draft_sender_kbn as MAIL_FROM ";
    $sql .= ", a.mail_draft_subject as MAIL_SUBJECT ";
    $sql .= ", a.mail_draft_body_letter as MAIL_BODY ";
    $sql .= ", a.mail_draft_sign as MAIL_SIGNATURE ";
    $sql .= ", a.mail_draft_memo_1 as MAIL_MEMO1 ";
    $sql .= ", a.mail_draft_memo_2 as MAIL_MEMO2 ";
    $sql .= ", a.mail_cd as MAIL_CD ";
    $sql .= ", a.mail_draft_act_memo as MAIL_TAIOUMEMO ";
    $sql .= ", to_char(a.update_date, 'YYYY-MM-DD hh24:mi:ss') as UPDATE_DT ";
    $sql .= ", b.cust_name as KAIN_NAME  ";
$sql .= "FROM ";
    $sql .= "w_mail_draft a  ";
    $sql .= "left outer join m_net_mbr b  ";
        $sql .= "on a.cust_no = b.cust_no  ";
$sql .= "where ";
    $sql .= "a.charge_cd = '".$TantoCD. "'  ";

if($sw==true){
  if($GyoumuKbn == '21'){
   $sql .= " AND   (a.bs_kbn   = '" . $GyoumuKbn . "' OR a.bs_kbn   = '29') ";

  } else {
   $sql .= " AND   a.bs_kbn   = '" . $GyoumuKbn . "' ";
  }
 }else{
  $sql .= " AND   a.bs_kbn <> '".$GyoumuKbn ."' ";
 }
$sql .= " order by ";
    $sql .= "a.mail_draft_cd desc ";
    $sql .= ", a.update_date desc ";


$sql .= "SELECT ";
    $sql .= "a.mail_draft_cd as MAILDRAFTCD ";
    $sql .= ", a.charge_cd as TANTOCD ";
    $sql .= ", a.bs_kbn as GYOUMUKBN ";
    $sql .= ", a.contact_cd as CONTACTID ";
    $sql .= ", lpad(cast(a.cust_no as varchar), 8, '0') as KAIINCD ";
    $sql .= ", a.mail_draft_to_name as MAIL_NAME ";
    $sql .= ", a.mail_draft_to as MAIL_TO ";
    $sql .= ", lpad(cast(a.mail_draft_cust_no as varchar), 8, '0') as MAIL_KAINNO ";
    $sql .= ", a.mail_draft_sender_kbn as MAIL_FROM ";
    $sql .= ", a.mail_draft_subject as MAIL_SUBJECT ";
    $sql .= ", a.mail_draft_body_letter as MAIL_BODY ";
    $sql .= ", a.mail_draft_sign as MAIL_SIGNATURE ";
    $sql .= ", a.mail_draft_memo_1 as MAIL_MEMO1 ";
    $sql .= ", a.mail_draft_memo_2 as MAIL_MEMO2 ";
    $sql .= ", a.mail_draft_fixed_flg as MAIL_TEIKEIFLG ";
    $sql .= ", a.mail_cd as MAIL_CD ";
    $sql .= ", a.mail_draft_act_memo as MAIL_TAIOUMEMO ";
for($i=1;$i<=10;$i++){
    $sql .= ", a.recommend_item_cd_1 as SHOHIN".$i."_CD";
}
    $sql .= ", to_char(a.update_date, 'YYYY-MM-DD hh24:mi:ss') as UPDATE_DT ";
    $sql .= ", b.cust_name as KAIN_NAME  ";
$sql .= "FROM ";
    $sql .= "w_mail_draft a  ";
    $sql .= "left outer join m_net_mbr b  ";
        $sql .= "on a.cust_no = b.cust_no  ";
$sql .= "WHERE ";
    $sql .= "a.charge_cd = '".$TantoCD."'  ";
    $sql .= "AND a.bs_kbn = '".$GyoumuKbn."'  ";

 if($MailDraftCD){
    $sql .= " AND a.mail_draft_cd = .$MailDraftCD. ";
 }else{
  if($kainno){
   $tmp = putKainCD($kainno);
   if($tmp){
    $sql .= " AND   a.cust_no =" .$tmp. ;
   }else{
    $sql .= " AND (a.cust_no is null or cast(a.cust_no as varchar) = '') ";
   }
  }
  if($CONTACTID){
   $sql .= " AND   a.contact_cd =" .$CONTACTID. ;
  }else{
   if($GyoumuKbn==18 || $GyoumuKbn==19){
    $sql .= " AND a.contact_cd is null";
   }
  }
    }


4296


$sql  = "INSERT INTO w_mail_draft (";
$sql .= " mail_draft_cd";
$sql .= ",charge_cd";
$sql .= ",bs_kbn";
$sql .= ",contact_cd";
$sql .= ",cust_no";
$sql .= ",mail_draft_to_name";
$sql .= ",mail_draft_to";
$sql .= ",mail_draft_cust_no";
$sql .= ",mail_draft_sender_kbn";
$sql .= ",mail_draft_subject";
$sql .= ",mail_draft_body_letter";
$sql .= ",mail_draft_sign";
$sql .= ",mail_draft_act_memo";
$sql .= ",mail_draft_fixed_flg";
$sql .= ",update_date";
$sql .= ",register_date";
$sql .= ",update_user_cd";
$sql .= ",register_user_cd";
for($i=1;$i<=10;$i++){
    $sql .= ",recommend_item_cd_".$i. ;
}


$sql .= ",mail_cd"; 

$sql .= " ) VALUES ( ";

if($GyoumuKbn==21 && isset($_SESSION['2010advice']['cvoice_id']) && !is_null($_SESSION['2010advice']['cvoice_id'])){
    $sql .= "'".$_SESSION['2010advice']['cvoice_id']. "'";
    $newMailDraftCD = $_SESSION['2010advice']['cvoice_id'];
}else{
    $newMailDraftCD = getMailDraftCD();
    $sql .= " .$newMailDraftCD. ";
}
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
    }else if($DraftData['mailTraceId']){
        $sql .= ",'".$DraftData['mailTraceId']."'";
    } else{
        $sql .= ",null";
    }
}

if($GyoumuKbn==18 || $GyoumuKbn==19){
    $tmp = getKainno_pid($GyoumuKbn,$DraftData['pid']);
}else{
    $tmp = putKainCD($DraftData['cd']);
}

logDebug("debug tmp=".$tmp);
if($tmp){
    $sql .= ",'".$tmp."'";
}else{
    $sql .= ",null";
}

if($GyoumuKbn==18 || $GyoumuKbn==19){
    if($DraftData['staffname']){
        $sql .= ",'".$DraftData['staffname']."'";
    }else{
        $sql .= ",null";
    }
}else{
    if($DraftData['mlName']){
        $sql .= ",'".$DraftData['mlName']."'";

    }else{
        $sql .= ",null";
    }
}

if($DraftData['mlTo']){
    $sql .= ",'". $DraftData['mlTo']."'";

}else{
    $sql .= ",null";
}

if($GyoumuKbn==18 || $GyoumuKbn==19){
    $tmp = getKainno_pid($GyoumuKbn,$DraftData['pid']);
}else{
    $tmp = putKainCD($DraftData['KAINNO']);
}
if($tmp){
    $sql .= ",'".$tmp."'";
}else{
    $sql .= ",null";
}


if(strpos($DraftData['mlFrom'],$MailDraft_conf['MAIL_FROM'][0])==true){
    if(strpos($DraftData['mlFrom'],'ドモホルンリンクル') !== false){
        $sql .= ",'4'";
    } else {
        $sql .= ",'0'";
    }

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
        $sql .= ",".getSqlValue($DraftData['msgtitle']);
    }else{
        $sql .= ",null";
    }

    if($DraftData['msg']){
        $sql .= ",".$DraftData['msg'];
    }else{
        $sql .= ",null";
    }

}else{
    if($DraftData['mlSubject']){
        $sql .= ",".getSqlValue($DraftData['mlSubject']);
    }else{
        $sql .= ",null";
    }

    if($DraftData['mlBody']){
        $sql .= ",".$DraftData['mlBody'];
    }else{
        $sql .= ",null";
    }
}


if($DraftData['mlSignature']){
    $sql .= ",".getSqlValue($DraftData['mlSignature']);
}else{
    $sql .= ",null";
}


if($DraftData['Memo']){
    $sql .= ",".getSqlValue($DraftData['Memo']);
}else{
    $sql .= ",null";
}
if($DraftData['TEIKEIFLG']=='1' || $DraftData['TEIKEIFLG']=='2' || $DraftData['TEIKEIFLG']=='3'){
    $sql .= ",'".$DraftData['TEIKEIFLG']."'";
}else{
    $sql .= ",null";
}

$sql .= ", CURRENT_TIMESTAMP (0)";
$sql .= ", CURRENT_TIMESTAMP (0)";
$sql .= ",".getSqlValue("TOOL:".$TantoCD);
$sql .= ",".getSqlValue("TOOL:".$TantoCD);
for($i=1;$i<=10;$i++){
    if( $DraftData['OSUSUME_'.$i] ){
        $sql .= ",'".$DraftData['OSUSUME_'.$i]."'";
    }else{
        $sql .= ",null";
    }
}


$sql .= ",".getSqlValue($DraftData['code']);

$sql .= ")";


4303

	$sql  = "UPDATE w_mail_draft";
	$sql .= " set";


	if($GyoumuKbn==21 || $GyoumuKbn==22){
		$sql .= " contact_cd ='0'";
	}else if($GyoumuKbn==18 || $GyoumuKbn==19){
		if($DraftData['pid']){
			$sql .= " contact_cd ='".$DraftData['pid']."'";
		}else{
			$sql .= " contact_cd =null";
		}
	
	}else if($GyoumuKbn==29){
			if($DraftData['mailTraceId']){
				$sql .= " contact_cd ='".$DraftData['mailTraceId']."'";
			}
	
	}else{
		if($DraftData['econorderid']){
			$sql .= " contact_cd ='".$DraftData['econorderid']."'";
		}else if($DraftData['cvid']){
			$sql .= " contact_cd ='".$DraftData['cvid']."'";
		}else{
			$sql .= " contact_cd =null";
		}
	}

	
	if($GyoumuKbn==18 || $GyoumuKbn==19){
		$tmp = getKainno_pid($GyoumuKbn,$DraftData['pid']);
	}else{
		$tmp = putKainCD($DraftData['cd']);
	}
	
	if($tmp){
		$sql .= ", cust_no ='".$tmp."'";
	}else{
		$sql .= ", cust_no = null";
	}

	if($GyoumuKbn==18 || $GyoumuKbn==19){

		if($DraftData['staffname']){
			$sql .= ", mail_draft_to_name ='".$DraftData['staffname']."'";
		}else{
			$sql .= ", mail_draft_to_name = null";
		}

	}else{
		if($DraftData['mlName']){
			$sql .= ", mail_draft_to_name ='".$DraftData['mlName']."'";
			logDebug($key2);
		}else{
			$sql .= ", mail_draft_to_name = null";
		}
	}

	if($DraftData['mlTo']){
		$sql .= ", mail_draft_to ='". $DraftData['mlTo']."'";
	}else{
		$sql .= ", mail_draft_to = null";
	}

	if($GyoumuKbn==18 || $GyoumuKbn==19){
		$tmp = getKainno_pid($GyoumuKbn,$DraftData['pid']);
	}else{
		$tmp = putKainCD($DraftData['KAINNO']);
	}
	if($tmp){
		$sql .= ", mail_draft_cust_no =" $tmp ;
	}else{
		$sql .= ", mail_draft_cust_no = null";
	}

	if(strpos($DraftData['mlFrom'],$MailDraft_conf['MAIL_FROM'][0])==true){
		if(strpos($DraftData['mlFrom'],'ドモホルンリンクル') !== false){
			$sql .= ", mail_draft_sender_kbn = '4'";
		} else {
			$sql .= ", mail_draft_sender_kbn = '0'";
		}

	}else if(strpos($DraftData['mlFrom'],$MailDraft_conf['MAIL_FROM'][1])==true){
		$sql .= ", mail_draft_sender_kbn = '1'";

	}else if(strpos($DraftData['mlFrom'],$MailDraft_conf['MAIL_FROM'][2])==true){
		$sql .= ", mail_draft_sender_kbn = '2'";

	}else if(strpos($DraftData['mlFrom'],$MailDraft_conf['MAIL_FROM'][3])==true){
		$sql .= ", mail_draft_sender_kbn = '3'";

	}else{
		$sql .= ", mail_draft_sender_kbn =null";
	}

	if($GyoumuKbn==18 || $GyoumuKbn==19){
		$sql .= ", mail_draft_subject =".getSqlValue($DraftData['msgtitle']);
		$sql .= ", mail_draft_body_letter =".$DraftData['msg'];
	}else{
		$sql .= ", mail_draft_subject =".getSqlValue($DraftData['mlSubject']);
		$sql .= ", mail_draft_body_letter =".$DraftData['mlBody'];
	}

	$sql .= ", mail_draft_sign =".getSqlValue($DraftData['mlSignature']);

	$sql .= ", mail_draft_fixed_flg ='".$DraftData['TEIKEIFLG']."'";

	for($i=1;$i<=10;$i++){
		if( $DraftData['OSUSUME_'.$i] ){
			$sql .= ", recommend_item_cd_".$i." ='".$DraftData['OSUSUME_'.$i]."'";
		}else{
			$sql .= ", recommend_item_cd_".$i." = null";
		}
	}


	$sql .= ", update_date = CURRENT_TIMESTAMP(0)";
	$sql .= ", update_user_cd = ".getSqlValue("TOOL:".$TantoCD);

	$sql .= ", mail_cd  = ".getSqlValue($DraftData['code']); 
    $sql .= ", mail_draft_act_memo =".getSqlValue($DraftData['Memo']);

	$sql .= " WHERE charge_cd  = '".$TantoCD."'";
	$sql .= " AND  bs_kbn  = '".$GyoumuKbn."'";
	$sql .= " AND  mail_draft_cd= '".$DraftData['MDCD']."'";

4311

$sql = "DELETE  ";
$sql .= "FROM ";
    $sql .= "w_mail_draft  ";
$sql .= "WHERE ";
    $sql .= "contact_cd =" $mailTraceId ;

4312

$sql = "DELETE  ";
$sql .= "FROM ";
    $sql .= "w_mail_draft  ";
$sql .= "WHERE ";
    $sql .= "mail_draft_cd =" $MAILDRAFTCD  ;
    $sql .= " AND charge_cd = '".$TantoCD."' ";

4315

$sql = "select ";
    $sql .= "nextval('seq_mail_recommend_cd') ";

4319



$sql  = "INSERT INTO f_mail_recommend_info_h (";

	$sql .= " mail_recommend_cd";   //メールおすすめコード
	$sql .= ", charge_cd";         //担当コード
	$sql .= ", bs_kbn";       //業務区分
	$sql .= ", contact_cd";       //接触ID

	$sql .= ", cust_no";         //お客様番号
	$sql .= ", send_dt";         //送信日
	$sql .= ", send_tm";         //送信時刻
	$sql .= ", fixed_flg";       //定型フラグ
	$sql .= ", sync_flg";        //同期フラグ
	$sql .= ", del_flg";      //削除フラグ

	$sql .= ", update_date";
	$sql .= ", register_date";
	$sql .= ", update_user_cd";
	$sql .= ", register_user_cd";

	$sql .= ", cust_name";

	$sql .= " )VALUES( ";

	$sql .= " '".$MailOsusumeCD."'";

	$sql .= ",'".$TantoCD."'";

	$sql .= ",'".$GyoumuKbn."'";


	if($GyoumuKbn=='18' || $GyoumuKbn=='19'){
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

	}else{
		$tmpKainName = trim($DraftData['mlName']);
	}


	if($GyoumuKbn==18 || $GyoumuKbn==19){
		if($tmpContactID==0){
			$sql .= ",null";
		}else{
			$sql .= ",'".$tmpContactID."'";
		}

	}else if($GyoumuKbn==21 || $GyoumuKbn==22){
		$sql .= ",'0'";
	}else if($GyoumuKbn==29){
			if($DraftData['mailTraceId']){
				$sql .= ",'".$DraftData['mailTraceId']."'";
			}
	}else{
		if($DraftData['econorderid']){
			$sql .= ",'".$DraftData['econorderid']."'";

		}else if($DraftData['cvid']){
			$sql .= ",'".$DraftData['cvid']."'";

		}else{
			$sql .= ",null";
		}
	}


	if($GyoumuKbn==18 || $GyoumuKbn==19){

		$tmp = putKainCD($tmpKainNo);
	}else{
		$tmp = putKainCD($DraftData['cd']);
		if(!$tmp){
			$tmp = putKainCD($DraftData['KaiinCD']);
		}
	}
	if($tmp){
		$sql .= ",'".$tmp."'";
	}else{
		$sql .= ",null";
	}

	$sql .= ",to_char(CURRENT_TIMESTAMP (0),'YYYYMMDD')";
	$sql .= ",to_char(CURRENT_TIMESTAMP (0),'hh24miss')";

	if($DraftData['TEIKEIFLG']=='1' || $DraftData['TEIKEIFLG']=='2' || $DraftData['TEIKEIFLG']=='3'){
		$sql .= ",'".$DraftData['TEIKEIFLG']."'";
	}else{
		$sql .= ",null";
	}

	$sql .= ",'0'";         
	$sql .= ",'0'";         
	$sql .= ",CURRENT_TIMESTAMP (0)";
	$sql .= ",CURRENT_TIMESTAMP (0)";
	$sql .= ",".getSqlValue("TOOL:".$TantoCD);
	$sql .= ",".getSqlValue("TOOL:".$TantoCD);


	if($tmpKainName){
		$sql .= ",'".$tmpKainName."'";
	}else{
		$sql .= ",null";
	}


	$sql .= ")";


4331

$sql  = "INSERT INTO f_mail_recommend_info_d (";
 $sql .= " mail_recommend_cd";
 $sql .= ",item_cd";
 $sql .= ",report_flg";
 $sql .= ",sente_keyword_flg"; 
 $sql .= ",update_date";
 $sql .= ",register_date";
 $sql .= ",update_user_cd";
 $sql .= ",register_user_cd";
 $sql .= " )VALUES( ";
 $sql .= " '".$MailOsusumeCD."'";
 $sql .= ",'".$osusume."'";
 $sql .= ",'".$select_flg."'";
 $sql .= ",'".$keyword_flg."'";
 $sql .= ",CURRENT_TIMESTAMP(0)";
 $sql .= ",CURRENT_TIMESTAMP(0)";
 $sql .= ",".getSqlValue("TOOL:".$TantoCD);
 $sql .= ",".getSqlValue("TOOL:".$TantoCD);
 $sql .= ")";

4337

$sql = "select ";
    $sql .= "contributor as CONTRIBUTOR  ";
$sql .= "from ";
    $sql .= "f_skin_worry  ";
$sql .= "where ";
    $sql .= "master_cd = '".$id."'  ";
    $sql .= "and manager_kbn = '0' ";

4339


$sql = "select ";
    $sql .= "cust_name as KAIN_NAME  ";
$sql .= "from ";
    $sql .= "m_net_mbr  ";
$sql .= "where ";
    $sql .= "cust_no =" $kno ;


4340


$sql = "select ";
    $sql .= "nextval(''seq_mail_draft_cd') ";

4341

$sql = "select ";
    $sql .= "lpad(cast(cust_no as varchar), 8, '0') as KAINNO  ";
$sql .= "from ";
    $sql .= "f_skin_worry  ";
$sql .= "where ";
    $sql .= "master_cd =" $pid ;

4343

$sql = "select ";
    $sql .= "parent_cd as GID  ";
$sql .= "from ";
    $sql .= "f_skin_worry  ";
$sql .= "where ";
    $sql .= "master_cd =" $pid ;


4345

$sql = "SELECT ";
    $sql .= "except_string as IGNORESTRING  ";
$sql .= "FROM ";
    $sql .= "m_except_string  ";
$sql .= "where ";
    $sql .= "func_kbn = 1 ";


4349

$sql = "SELECT ";
    $sql .= "mbr_seq as MEMBER_ID  ";
$sql .= "FROM ";
    $sql .= "m_net_mbr  ";
$sql .= "WHERE ";
    $sql .= "net_mbr_cd = :bind_nmid ";

4351

$sql = "SELECT ";
    $sql .= "tax_rate as TAX_RATE  ";
$sql .= "FROM ";
    $sql .= "m_sys_set  ";
$sql .= "where ";
    $sql .= "site_kbn = '1' ";

4352


$sql  = "INSERT INTO h_operat (";
$sql .= "  mbr_seq";
$sql .= ", proc_dt_tm";
$sql .= ", proc_kbn";
$sql .= ", session_id";
if ($ordid != "") {
$sql .= ", odr_cd";
}
if ($error_cd != "") {
$sql .= ", err_cd";
$sql .= ", err_dtl";
}
$sql .= ", sync_flg";
$sql .= ", site_kbn";
$sql .= ", register_user_cd";
$sql .= ", update_user_cd";
$sql .= " ) VALUES ( ";
$sql .= " :memid";
$sql .= ", CURRENT_TIMESTAMP (0)";
$sql .= ",:trankbn";
$sql .= ",:sesid";
if ($ordid != "") {
$sql .= ",:ordid";
}
if ($error_cd != "") {
$sql .= ",:error_cd";
$sql .= ",:error_detail";
}
$sql .= ",'0'";
$sql .= ",'".$SITE_KBN."'";
$sql .= ",'".$_SERVER['SCRIPT_NAME']."'";
$sql .= ",'".$_SERVER['SCRIPT_NAME']."'";
$sql .= ")";

4356

$sql = "SELECT ";
    $sql .= "accumulation_point as POINT ";
    $sql .= ", this_time_buy_point as OPOINT ";
    $sql .= ", this_time_use_point as UPOINT  ";
$sql .= "FROM ";
    $sql .= "f_odr_h  ";
$sql .= "WHERE ";
    $sql .= "cust_no = :kain_no ";
    $sql .= "AND core_sys_kbn = '0'  ";
    $sql .= "AND del_flg = '0' ";

4359

$sql = "SELECT ";
    $sql .= "stat_kbn as STATUS  ";
$sql .= "FROM ";
    $sql .= "m_sys_set  ";
$sql .= "where ";
    $sql .= "site_kbn = '1' ";

4360

$sql = "SELECT ";
    $sql .= "msg_title as MESSAGE_TITLE ";
    $sql .= ", msg_body_letter as MESSAGE_BODY  ";
$sql .= "FROM ";
    $sql .= "m_msg  ";
$sql .= "WHERE ";
    $sql .= "disp_flg = 1  ";
    $sql .= "AND TO_CHAR(disp_start_dt_tm, 'YYYYMMDDHH24MISS') <= :yyymmddhhiiss  ";
    $sql .= "AND TO_CHAR(disp_end_dt_tm, 'YYYYMMDDHH24MISS') >= :yyymmddhhiiss  ";
    $sql .= "AND msg_seq = :OFFLINE_MESSAGE_ID ";

4362

$sql = "SELECT ";
    $sql .= "area_tel_no as SHIGAI  ";
$sql .= "FROM ";
    $sql .= "m_area_tel_no  ";
$sql .= "WHERE ";
    $sql .= "area_tel_no = :strShigai ";

4363


$sql  = "select ";
$sql .= "attr_seq as ATTRIBUTE_ID, local_mbr as JIS_CODE_PREF ";
$sql .= "from ";
$sql .= "m_mbr_attr_distinct_cond ";
$sql .= " avail_flg = '1' ";
$sql .= "AND age_range_from <= :age ";
$sql .= "AND age_range_upper >= :age ";
if (isset($gender) || $gender == '0' || $gender == '1' ) {
$sql .= "AND sex_kbn IN ('2', :gender) ";
};
if ($last_buy_prog_day !== '') {
$sql .= "AND last_buy_prog_dt_start <= :last_buy_prog_day ";
};
if ($last_buy_prog_day !== '') {
$sql .= "AND last_buy_prog_dt_end >= :last_buy_prog_day ";
};
if ($first_buy_prog_day !== '') {
$sql .= "AND first_buy_prog_dt_start <= :first_buy_prog_day ";
};
if ($first_buy_prog_day !== '') {
$sql .= "AND first_buy_prog_dt_end >= :first_buy_prog_day ";
};
if ($purchace_cnt !== '') {
$sql .= "AND cosme_buy_cnt_from <= :purchace_cnt ";
};
if ($purchace_cnt !== '') {
$sql .= "AND cosme_buy_cnt_upper >= :purchace_cnt ";
};
$sql .= "ORDER BY prior_level ASC, attr_seq ASC ";

4364

$sql .= "SELECT ";
    $sql .= "mail_subject as MAIL_SUBJECT ";
    $sql .= ", mail_cont as MAIL_BODY ";
    $sql .= ", mail_send_from as MAIL_FROM  ";
$sql .= "FROM ";
    $sql .= "m_auto_send_mail  ";
$sql .= "WHERE ";
    $sql .= "auto_mail_seq = :auto_mail_id ";


4365

$sql = "SELECT ";
    $sql .= "mail_seq as MAIL_ID ";
    $sql .= ", mail_adr as EMAIL ";
    $sql .= ", mail_name as MAIL_NM ";
    $sql .= ", send_way_kbn as SENDWAY  ";
$sql .= "FROM ";
    $sql .= "m_manager_mail  ";
$sql .= "WHERE ";
    $sql .= "ctrl_mail_kbn =" $kanri_mail_kbn ;

4367

$sql = "SELECT ";
    $sql .= "att_cont as ATTENTION  ";
$sql .= "FROM ";
    $sql .= "m_att  ";
$sql .= "WHERE ";
    $sql .= "att_cd = :ship_caution_cd ";

4375

INSERT 
INTO f_a900( 
    site_kbn
    , cust_no
    , send_dt_tm
    , session_id
    , session_get_dt_tm
    , core_sys_send_data
    , core_sys_rcv_data
    , core_sys_send_rslt_flg
    , update_date
    , register_date
    , update_user_cd
    , register_user_cd
) 
VALUES ( 
    '$site_kbn_val'
    , $kainno
    , CURRENT_TIMESTAMP (0)
    , NULL
    , CURRENT_TIMESTAMP (0)
    , '$send_data'
    , '$ret_data'
    , '$host_result'
    , CURRENT_TIMESTAMP (0)
    , CURRENT_TIMESTAMP (0)
    , '$update_user'
    , '$update_user'
)

$sql = "SELECT ";
  $sql .= "table_name, ";
  $sql .= "index_name, ";
  $sql .= "string_agg(column_name, ',') as column_name ";
$sql .= "FROM ( ";
       $sql .= "SELECT ";
         $sql .= "t.relname AS table_name, ";
         $sql .= "i.relname AS index_name, ";
         $sql .= "a.attname AS column_name, ";
         $sql .= "(SELECT i ";
          $sql .= "FROM (SELECT ";
                  $sql .= "*, ";
                  $sql .= "row_number() ";
                  $sql .= "OVER () i ";
                $sql .= "FROM unnest(indkey) WITH ORDINALITY AS a(v)) a ";
          $sql .= "WHERE v = attnum) ";
       $sql .= "FROM ";
         $sql .= "pg_class t, ";
         $sql .= "pg_class i, ";
         $sql .= "pg_index ix, ";
         $sql .= "pg_attribute a ";
       $sql .= "WHERE ";
         $sql .= "t.oid = ix.indrelid ";
         $sql .= "AND i.oid = ix.indexrelid ";
         $sql .= "AND a.attrelid = t.oid ";
         $sql .= "AND a.attnum = ANY (ix.indkey) ";
         $sql .= "AND t.relkind = 'r' ";
         $sql .= "AND t.relname LIKE 'm_user' ";
       $sql .= "ORDER BY table_name, index_name, i ";
     $sql .= ") raw ";
$sql .= "GROUP BY table_name, index_name ";


$sql = "SELECT ";
    $sql .= "A.column_name ";
    $sql .= ", B.constraint_type  ";
$sql .= "FROM ";
    $sql .= "INFORMATION_SCHEMA.KEY_COLUMN_USAGE A ";
    $sql .= ", INFORMATION_SCHEMA.TABLE_CONSTRAINTS B  ";
$sql .= "WHERE ";
    $sql .= "A.constraint_name = B.constraint_name  ";
    $sql .= "AND A.table_name = '' ";


$sql = "SELECT ";
    $sql .= "column_name ";
    $sql .= ", data_type ";
    $sql .= ", character_maximum_length AS data_length ";
    $sql .= ", is_nullable AS nullable  ";
$sql .= "from ";
    $sql .= "information_schema.columns  ";
$sql .= "where ";
    $sql .= "table_name = '' ";


    SELECT 
    A.column_name 
    , B.constraint_type  
FROM 
    INFORMATION_SCHEMA.KEY_COLUMN_USAGE A 
    , INFORMATION_SCHEMA.TABLE_CONSTRAINTS B  
WHERE 
    A.constraint_name = B.constraint_name  
    AND A.table_name = '' 

    SELECT
    tc.constraint_name
    , tc.constraint_type
    , CASE 
        WHEN (tc.constraint_type = 'CHECK') 
            THEN cc.check_clause 
        ELSE cu.column_name 
        END 
FROM
    information_schema.TABLE_CONSTRAINTS tc 
    LEFT JOIN information_schema.CHECK_CONSTRAINTS cc 
        ON tc.CONSTRAINT_SCHEMA = cc.CONSTRAINT_SCHEMA 
        AND tc.CONSTRAINT_NAME = cc.CONSTRAINT_NAME 
    LEFT JOIN INFORMATION_SCHEMA.KEY_COLUMN_USAGE cu 
        ON tc.CONSTRAINT_SCHEMA = cu.CONSTRAINT_SCHEMA 
        AND tc.CONSTRAINT_NAME = cu.CONSTRAINT_NAME 
WHERE
    tc.TABLE_NAME = 'm_user'


$sql = "SELECT ";
    $sql .= "tc.constraint_name ";
    $sql .= ", tc.constraint_type ";
    $sql .= ", CASE  ";
        $sql .= "WHEN (tc.constraint_type = 'CHECK')  ";
            $sql .= "THEN cc.check_clause  ";
        $sql .= "ELSE cu.column_name  ";
        $sql .= "END  ";
$sql .= "FROM ";
    $sql .= "information_schema.TABLE_CONSTRAINTS tc  ";
    $sql .= "LEFT JOIN information_schema.CHECK_CONSTRAINTS cc  ";
        $sql .= "ON tc.CONSTRAINT_SCHEMA = cc.CONSTRAINT_SCHEMA  ";
        $sql .= "AND tc.CONSTRAINT_NAME = cc.CONSTRAINT_NAME  ";
    $sql .= "LEFT JOIN INFORMATION_SCHEMA.KEY_COLUMN_USAGE cu  ";
        $sql .= "ON tc.CONSTRAINT_SCHEMA = cu.CONSTRAINT_SCHEMA  ";
        $sql .= "AND tc.CONSTRAINT_NAME = cu.CONSTRAINT_NAME  ";
$sql .= "WHERE ";
    $sql .= "tc.TABLE_NAME = 'm_user' ";

update m_offline_last_odr 
set
    odr_stat_kbn = '3' 
where
    mbr_seq IN ( 
        select
            mbr_seq 
        from
            m_offline_data 
        where
            cust_no = ''
    )

$post_sql = "update m_offline_last_odr  ";
$post_sql .= "set ";
    $post_sql .= "odr_stat_kbn = '3'  ";
$post_sql .= "where ";
    $post_sql .= "mbr_seq IN (  ";
        $post_sql .= "select ";
            $post_sql .= "mbr_seq  ";
        $post_sql .= "from ";
            $post_sql .= "m_offline_data  ";
        $post_sql .= "where ";
            $post_sql .= "cust_no = '' ";
    $post_sql .= ") ";

$post_sql = "update m_offline_last_odr set odr_stat_kbn='3' where mbr_seq IN (select mbr_seq from m_offline_data where cust_no='') ";

$post_sql = "update m_offline_data set buy_cnt='1' where cust_no='' ";

$post_sql = "update m_offline_data set accumulation_point=50 where cust_no= '' ";


$sql .= "SELECT ";
    $sql .= "i.relname as index_name ";
    $sql .= ", CASE  ";
        $sql .= "WHEN p.contype = 'u'  ";
            $sql .= "THEN 'UNIQUE'  ";
        $sql .= "WHEN p.contype = 'p'  ";
            $sql .= "THEN 'UNIQUE'  ";
        $sql .= "ELSE 'NONUNIQUE'  ";
        $sql .= "END AS uniqueness ";
    $sql .= ", f.attname AS column_name  ";
$sql .= "FROM ";
    $sql .= "pg_attribute f JOIN pg_class c  ";
        $sql .= "ON c.oid = f.attrelid JOIN pg_type t  ";
        $sql .= "ON t.oid = f.atttypid  ";
    $sql .= "LEFT JOIN pg_attrdef d  ";
        $sql .= "ON d.adrelid = c.oid  ";
        $sql .= "AND d.adnum = f.attnum  ";
    $sql .= "LEFT JOIN pg_namespace n  ";
        $sql .= "ON n.oid = c.relnamespace  ";
    $sql .= "LEFT JOIN pg_constraint p  ";
        $sql .= "ON p.conrelid = c.oid  ";
        $sql .= "AND f.attnum = ANY (p.conkey)  ";
    $sql .= "LEFT JOIN pg_class AS g  ";
        $sql .= "ON p.confrelid = g.oid  ";
    $sql .= "LEFT JOIN pg_index AS ix  ";
        $sql .= "ON f.attnum = ANY (ix.indkey)  ";
        $sql .= "and c.oid = f.attrelid  ";
        $sql .= "and c.oid = ix.indrelid  ";
    $sql .= "LEFT JOIN pg_class AS i  ";
        $sql .= "ON ix.indexrelid = i.oid  ";
$sql .= "WHERE ";
    $sql .= "c.relkind = 'r' ::char  ";
    $sql .= "AND n.nspname = current_schema()  ";
    $sql .= "AND c.relname = '$selected_table'  ";
    $sql .= "AND f.attnum > 0  ";
    $sql .= "AND i.oid <> 0  ";
$sql .= "ORDER BY ";
    $sql .= "i.relname ";




SELECT 
 for ($i=0;$i<count($arr_clum_list);$i++) {
  $cl_name = explode("\.",$arr_clum_list[$i]);
  $date_flg = false;
  if ($cl_name[1] == "UPDATE_DT"
   || $cl_name[1] == "REGIST_DT"
   || $cl_name[1] == "POINT_YMD"
   || $cl_name[1] == "LAST_ORDER_RECV_DT"
   || $cl_name[1] == "LAST_ORDER_DELIVERY_DT"
   || $cl_name[1] == "LAST_DELIVERY_FINISHED_DT"
   || $cl_name[1] == "SHIP_DT"
   || $cl_name[1] == "H_DLV_END_DT"
   || $cl_name[1] == "LAST_LOGIN_DT") {
   $date_flg = true;
  }
  if ($date_flg)  {
   $sql .= $constr."TO_CHAR(".$arr_clum_list[$i].",'YYYYMMDDHH24MISS') AS ".$cl_name[1];
  } else {
   $sql .= $constr.$arr_clum_list[$i]." AS ".$cl_name[1];
  }
  $constr = ",";
 }
FROM MEMBER_TBL,WEBPROFILE_TBL
WHERE MEMBER_TBL.MEMBER_ID = WEBPROFILE_TBL.MEMBER_ID(+)
AND MEMBER_TBL.NETMEMBER_ID = :nmid 


$sql  = "SELECT ";
	
	$sql .= " FROM MEMBER_TBL,WEBPROFILE_TBL";
	$sql .= " WHERE MEMBER_TBL.MEMBER_ID = WEBPROFILE_TBL.MEMBER_ID(+)";
	$sql .= " AND MEMBER_TBL.NETMEMBER_ID = :nmid ";

    $member_data_arr = array('m_offline_data.era_kbn', 'm_offline_data.birthday', 'm_offline_data.pref_cd', 'm_offline_data.sex_kbn',
							 'm_offline_data.last_buy_dt_1', 'm_offline_data.last_buy_dt_2', 'm_offline_data.last_buy_dt_3',
							 'm_offline_data.last_buy_dt_2', 'm_offline_data.first_buy_dt_1','m_offline_data.first_buy_dt_2',
							 'm_offline_data.first_buy_dt_3', 'm_offline_data.first_buy_dt_4', 'm_offline_data.buy_cnt' );


SELECT
era_kbn,
birthday,
pref_cd,
sex_kbn,
last_buy_dt_1,
last_buy_dt_2,
last_buy_dt_3,
last_buy_dt_4,
first_buy_dt_1,
first_buy_dt_2,
first_buy_dt_3,
first_buy_dt_4,
buy_cnt
FROM m_net_mbr mbr
LEFT JOIN m_offline_data wp
ON mbr.MEMBER_ID = wp.MEMBER_ID
AND mbr.net_mbr_cd = :nmid 

$sql = "SELECT ";
$sql .= "era_kbn, ";
$sql .= "birthday, ";
$sql .= "pref_cd, ";
$sql .= "sex_kbn, ";
$sql .= "last_buy_dt_1, ";
$sql .= "last_buy_dt_2, ";
$sql .= "last_buy_dt_3, ";
$sql .= "last_buy_dt_4, ";
$sql .= "first_buy_dt_1, ";
$sql .= "first_buy_dt_2, ";
$sql .= "first_buy_dt_3, ";
$sql .= "first_buy_dt_4, ";
$sql .= "buy_cnt, ";
$sql .= "FROM m_net_mbr mbr ";
$sql .= "LEFT JOIN m_offline_data wp ";
$sql .= "ON mbr.mbr_seq = wp.mbr_seq ";
$sql .= "AND mbr.net_mbr_cd = :nmid  ";


'20364500',
'20364499',
'20364496',
'20364492',
'20364487',
'20364476',
'20364470',
'20364463',
'20364451',
'20364448'

