SELECT 
Re.cust_no AS KAINNO,
Re.tel_no AS TEL_NO,
Re.pay_way_kbn AS PAYMENT_TYPE,
Re.pay_cnt AS PAYMENT_NUM,
Re.credit_card_no AS CC_NO,
Re.credit_card_no AS CC_NO,
Re.avail_term AS CC_TERM,
Re.card_input_kbn AS CC_REGIST_KBN,
Re.dlv_tm_kbn AS DELIVERY_TIME_TYPE,
Re.another_adr AS B_KNJ_ADDRESS,
Re.dlv_req_memo AS DELIVERY_REQUEST,
Re.site_kbn AS SITE_KBN,
to_char(Re.dlv_req_dt, 'YYYY/MM/DD') AS DELIVERY_DT,
Re.dlv_to_kbn AS ANOTHER_ADDR_TYPE,
Re.other_non_chg_part AS ANOTHER_ADDR_NOT_CONV,
Re.other_adr_tel_no AS ANOTHER_TELNO,
Re.other_adr_post_no AS ANOTHER_POST_NO,
Re.dlv_to_input_kbn AS DELIVERY_REGIST_KBN,
Re.cvs_rcv_site_odr_no AS ECONORDER_ID,
Re.enclos_cd1 AS ENCLOSURE_CD1,
to_char(Re.acpt_dt_tm, 'YYYY/MM/DD HH24:MI:SS')  AS ORDER_DT,
Re.country_cd AS COUNTRY_CD,
Re.overseas_post_no AS POSTCD_FOREIGN,
Re.overseas_to_name AS COUNTRY_ADDRESSEE,
Re.overseas_adr_1 AS ADRS_FOREIGN1,
Re.overseas_adr_2 AS ADRS_FOREIGN2,
Re.overseas_adr_3 AS ADRS_FOREIGN3,
Re.overseas_tel_no AS TEL_NO_FOREIGN,
Re.ikusei_comment AS IKUSEI_COMMENT,
COALESCE(Re.tot_odr_amnt, 0) as ORDER_AMOUNT,
COALESCE(Re.tot_odr_tax, 0) as ORDER_TAXRATE,
Re.ship_att_cd_1 AS SHIP_CAUTION3_CD,
Me.mail_adr AS EMAIL,
Me.mob_mail_adr AS M_EMAIL,
We.cust_name AS NAMEKANJI,
We.cust_name_kana AS NAMEKANA,
We.era_kbn AS NAMEOFERA,
We.birthday AS BIRTHDAY,
We.adr AS H_KNJ_ADDRESS,
We.adr_non_chg_part AS H_NOT_CONV,
We.another_adr_post_no AS B_POST_NO,
We.another_adr AS B_KNJ_ADDRESS,
We.another_adr_tel_no AS B_TEL_NO,
Cr.credit_card_corp_name AS COMPANYMEIFULL,
Sh.item_name_10 AS NAME10,
Sh.price AS TANKA,
Sh.item_name AS NAMEFULL,
Sh.item_lvl AS SHOHIN_LEVEL,
Ij.net_ij_rsn AS NET_IJ_INFO,
At.att_cont as CAUTION,
At1.att_cont as ENCLOSURE1,
At2.att_cont as ENCLOSURE2,
At3.att_cont as ENCLOSURE3,
At4.att_cont as ENCLOSURE4,
At5.att_cont as ENCLOSURE5,
At6.att_cont as ENCLOSURE6,
At7.att_cont as ENCLOSURE7,
At8.att_cont as ENCLOSURE8,
At9.att_cont as ENCLOSURE9,
At10.att_cont as ENCLOSURE10
Spc.item_dtl_kbn AS SHOHIN_KIND,
Pr.item_cd AS SHOHIN_CD,
Pr.num AS AMOUNT,
Pr.amnt AS PRICE,
(
select 
sum( (s.price * r.amnt) ) as wk_price 
from odr_d r ,m_item s , m_sys_set sy
where sy.site_kbn='1' 
and  r.item_cd  = s.item_cd 
and ( 
( r.item_lvl is null and s.item_lvl is null ) 
or ( r.item_lvl is not null and r.item_lvl = s.Sitem_lvl ) 
) 
and r.odr_seq = Re.odr_seq
) as PRICE2, 
( 
select sum( (s.price * r.amnt) * (sy.TAX_RATE) ) as wk_price 
from odr_d r ,m_item s , m_sys_set sy
where sy.site_kbn='1' 
and  r.item_cd  = s.item_cd 
and ( 
     ( r.item_lvl is null and s.item_lvl is null ) 
  or ( r.item_lvl is not null and r.item_lvl = s.item_lvl ) 
 )
 and r.recv_order_id = Re.odr_seq
 ) as TAX,
from f_odr Re
LEFT JOIN m_net_mbr Me
ON Re.cust_no = Me.cust_no(+)
LEFT JOIN m_offline_data We
ON Me.cust_no = We.cust_no(+)
LEFT JOIN m_credit_corp Cr
ON Re.credit_card_corp = Cr.credit_card_corp(+)
LEFT JOIN m_item Sh 
ON Pr.item_cd = Sh.item_cd(+) AND Pr.item_lvl = Sh.item_lvl AND ((Pr.item_lvl is not null and Pr.item_lvl = Sh.item_lvl) or (Pr.item_lvl is null and  Sh.item_lvl is null))
FROM m_net_ij_rsn Ij
ON Re.pend_cd = Ij.net_ij_cd(+)
LEFT JOIN m_att At
ON to_number(Re.ship_att_cd_1) = to_number(At.att_cd(+))
LEFT JOIN m_att At1
ON to_number(Re.enclosure_cd1) = to_number(At1.att_cd(+))
LEFT JOIN m_att At2
ON to_number(Re.enclosure_cd2) = to_number(At2.att_cd(+))
LEFT JOIN m_att At3
ON to_number(Re.enclosure_cd3) = to_number(At3.att_cd(+))
LEFT JOIN m_att At4
ON to_number(Re.enclosure_cd4) = to_number(At4.att_cd(+))
LEFT JOIN m_att At5
ON to_number(Re.enclosure_cd5) = to_number(At5.att_cd(+))
LEFT JOIN m_att At6
ON to_number(Re.enclosure_cd6) = to_number(At6.att_cd(+))
LEFT JOIN m_att At7
ON to_number(Re.enclosure_cd7) = to_number(At7.att_cd(+))
LEFT JOIN m_att At8
ON to_number(Re.enclosure_cd8) = to_number(At8.att_cd(+))
LEFT JOIN m_att At9
ON to_number(Re.enclosure_cd9) = to_number(At9.att_cd(+))
LEFT JOIN m_att At10
ON to_number(Re.enclosure_cd10) = to_number(At10.att_cd(+))
LEFT JOIN m_item_dtl Spc
ON Sh.item_cd = Spc.item_cd(+) AND Sh.item_lvl = Spc.item_lvl(+)
LEFT JOIN odr_d Pr
ON Re.odr_seq = Pr.odr_seq
WHERE Re.odr_seq = ".getSqlValue($recv_order_id)


f_odr.odr_seq,



odr_d.item_kbn,


f_odr.core_sys_kbn,


f_odr.del_flg,


f_odr.route_dtl_kbn,


h_approval_card_input.hist_seq,


h_card_input.hist_seq AS chng_hist_seq,

h_e_pay_authori.trade_cd,
h_e_pay_authori.trade_pwd,
h_e_pay_authori.order_cd,
h_e_pay_authori.e_pay_account_cd 


acptdttm							
mbrno							
name							
netijcd							
loginstatus							
odrform							
netijrsn							
odrstatkbn							
hostkbn							
rcvformoutputkbn							
odrkbn							
updkbn							
telno							
email							
sitekbnnm							
mbrkbn							
logincd							
sitekbn							
giftflg							
cosmeflag							
herbflag							
regularbuyodrseq							
creditcardno							
availterm							
creditcardname							
mbrcd							
mbrpwd							
changeacptdttm							
changecreditcardno							
changeavailterm							
changecreditcardname							
changembrcd							
changembrpwd							
tradecd							
tradepwd							
ordercd							
epayaccountcd							





























