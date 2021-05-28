--ukeku(rcv_kbn)							
--cust_no AS KAINNO
--acpt_dt_tm AS ORDER_DT
--cust_name AS NAMEKANJI
--cust_name_kana AS NAMEKANA
--era_kbn AS NAMEOFERA
--birthday AS BIRTHDAY
--tel_no AS TEL_NO
--adr AS H_KNJ_ADDRESS
--adr_non_chg_part AS H_NOT_CONV
--item_cd AS SHOHIN_CD
--item_name	AS NAMEFULL
--item_name_10 AS NAME10
--item_lvl AS SHOHIN_LEVE
--item_dtl_kbn AS SHOHIN_KIND
--num AS AMOUNT
--amnt AS PRICE
--tot_odr_amnt AS TOTAL_ORDER_AMOUNT
--tot_odr_tax AS TOTAL_ORDER_TAXRATE						
kingakuamount							
--pay_way_kbn AS PAYMENT_TYPE
--pay_cnt AS PAYMENT_NUM
--credit_card_corp_name AS COMPANYMEIFULL
--credit_card_no AS CC_NO
--card_input_kbn AS CC_REGIST_KBN
--avail_term AS CC_TERM						
--cvs_rcv_site_odr_no AS ECONORDER_ID						
--dlv_tm_kbn AS DELIVERY_TIME_TYPE							
--dlv_req_dt AS DELIVERY_DT							
--another_adr_post_no AS B_POST_NO							
--another_adr AS B_KNJ_ADDRESS							
--another_adr_tel_no AS B_TEL_NO							
--mail_adr AS	EMAIL						
--mob_mail_adr AS M_EMAIL							
--ship_att_cd_1 AS SHIP_CAUTION_CD1							
--dlv_to_kbn AS ANOTHER_ADDR_TYPE							
--other_adr_post_no	AS ANOTHER_POST_NO						
--other_adr AS ANOTHER_ADDR						
--other_adr_tel_no AS ANOTHER_TELNO														
--dlv_to_input_kbn AS DELIVERY_REGIST_KBN							
--other_non_chg_part AS ANOTHER_ADDR_NOT_CONV						
--overseas_post_no AS	POSTCD_FOREIGN						
--overseas_adr_1 AS ADRS_FOREIGN1							
--overseas_adr_2 AS ADRS_FOREIGN2							
--overseas_adr_3 AS ADRS_FOREIGN3							
--overseas_to_name AS COUNTRY_ADDRESSEE							
--overseas_tel_no AS TEL_NO_FOREIGN							
--dlv_req_memo AS DELIVERY_REQUEST							
--ikusei_comment AS IKUSEI_COMMENT							
--net_ij_rsn AS NET_IJ_INFO	

Add Myself

country_cd AS COUNTRY_CD
att_cont AS ATTENTION	
							
																							
																					
SELECT
    base.cust_no AS KAINNO
    , base.site_kbn AS SITE_KBN
    , base.acpt_dt_tm AS ORDER_DT
    , base.cust_name AS NAMEKANJI
    , base.cust_name_kana AS NAMEKANA
    , base.era_kbn AS NAMEOFERA
    , base.birthday AS BIRTHDAY
    , base.tel_no AS TEL_NO
    , base.adr AS H_KNJ_ADDRESS
    , base.adr_non_chg_part AS H_NOT_CONV
    , or_d.item_cd AS SHOHIN_CD
    , or_d.item_name AS NAMEFULL
    , or_d.item_name_10 AS NAME10
    , or_d.item_lvl AS SHOHIN_LEVEL
    , or_d.item_dtl_kbn AS SHOHIN_KIND
    , or_d.num AS AMOUNT
    , or_d.amnt AS PRICE
    , base.tot_odr_amnt AS TOTAL_ORDER_AMOUNT
    , base.tot_odr_tax AS TOTAL_ORDER_TAXRATE
    , base.pay_way_kbn AS PAYMENT_TYPE
    , base.pay_cnt AS PAYMENT_NUM
    , base.credit_card_corp_name AS COMPANYMEIFULL
    , base.credit_card_no AS CC_NO
    , base.card_input_kbn AS CC_REGIST_KBN
    , base.avail_term AS CC_TERM
    , base.cvs_rcv_site_odr_no AS ECONORDER_ID
    , base.dlv_tm_kbn AS DELIVERY_TIME_TYPE
    , base.dlv_req_dt AS DELIVERY_DT
    , base.another_adr_post_no AS B_POST_NO
    , base.another_adr AS B_KNJ_ADDRESS
    , base.another_adr_tel_no AS B_TEL_NO
    , base.mail_adr AS EMAIL
    , base.mob_mail_adr AS M_EMAIL
    , base.ship_att_cd_1 AS SHIP_CAUTION_CD1
    , base.dlv_to_kbn AS ANOTHER_ADDR_TYPE
    , base.other_adr_post_no AS ANOTHER_POST_NO
    , base.other_adr AS ANOTHER_ADDR
    , base.other_adr_tel_no AS ANOTHER_TELNO
    , base.dlv_to_input_kbn AS DELIVERY_REGIST_KBN
    , base.other_non_chg_part AS ANOTHER_ADDR_NOT_CONV
    , base.country_cd AS COUNTRY_CD
    , base.overseas_post_no AS POSTCD_FOREIGN
    , base.overseas_adr_1 AS ADRS_FOREIGN1
    , base.overseas_adr_2 AS ADRS_FOREIGN2
    , base.overseas_adr_3 AS ADRS_FOREIGN3
    , base.overseas_to_name AS COUNTRY_ADDRESSEE
    , base.overseas_tel_no AS TEL_NO_FOREIGN
    , base.dlv_req_memo AS DELIVERY_REQUEST
    , base.ikusei_comment AS IKUSEI_COMMENT
    , base.net_ij_rsn AS NET_IJ_INFO 
    , base.att_cont AS ATTENTION
FROM
    ( 
        SELECT
            f_o.odr_seq
            , f_o.site_kbn
            , f_o.cust_no
            , f_o.acpt_dt_tm
            , m_of.cust_name
            , m_of.cust_name_kana
            , m_of.era_kbn
            , m_of.birthday
            , m_of.tel_no
            , m_of.adr
            , m_of.adr_non_chg_part
            , f_o.tot_odr_amnt
            , f_o.tot_odr_tax
            , f_o.pay_way_kbn
            , f_o.pay_cnt
            , m_c.credit_card_corp_name
            , f_o.credit_card_no
            , f_o.card_input_kbn
            , f_o.avail_term
            , f_o.cvs_rcv_site_odr_no
            , f_o.dlv_tm_kbn
            , f_o.dlv_req_dt
            , m_of.another_adr_post_no
            , m_of.another_adr
            , m_of.another_adr_tel_no
            , m_mbr.mail_adr
            , m_mbr.mob_mail_adr
            , f_o.dlv_to_kbn
            , f_o.other_adr_post_no
            , f_o.other_adr
            , f_o.other_adr_tel_no
            , f_o.dlv_to_input_kbn
            , f_o.other_non_chg_part
            , f_o.dlv_req_memo
            , m_net.net_ij_rsn
            , f_o.ship_att_cd_1
            , f_o.country_cd
            , f_o.overseas_post_no
            , f_o.overseas_adr_1
            , f_o.overseas_adr_2
            , f_o.overseas_adr_3
            , f_o.overseas_to_name
            , f_o.overseas_tel_no
            , f_o.ikusei_comment 
            , f_o.att_cont
        FROM
            f_odr f_o 
            LEFT JOIN m_net_mbr m_mbr 
                ON f_o.cust_no = m_mbr.cust_no 
            LEFT JOIN m_offline_data m_of 
                ON m_mbr.cust_no = m_of.cust_no 
            LEFT JOIN m_credit_corp m_c 
                ON f_o.credit_card_corp = m_c.credit_card_corp_cd 
            LEFT JOIN m_net_ij_rsn m_net 
                ON f_o.pend_cd = m_net.net_ij_cd 
            LEFT JOIN m_att att 
                ON f_o.ship_att_cd_1 = att.att_cd 
            LEFT JOIN m_att att1 
                ON f_o.enclos_cd1 = att1.att_cd 
            LEFT JOIN m_att att2 
                ON f_o.enclos_cd2 = att2.att_cd 
            LEFT JOIN m_att att3 
                ON f_o.enclos_cd3 = att3.att_cd 
            LEFT JOIN m_att att4 
                ON f_o.enclos_cd4 = att4.att_cd 
            LEFT JOIN m_att att5 
                ON f_o.enclos_cd5 = att5.att_cd 
            LEFT JOIN m_att att6 
                ON f_o.enclos_cd6 = att6.att_cd 
            LEFT JOIN m_att att7 
                ON f_o.enclos_cd7 = att7.att_cd 
            LEFT JOIN m_att att8 
                ON f_o.enclos_cd8 = att8.att_cd 
            LEFT JOIN m_att att9 
                ON f_o.enclos_cd9 = att9.att_cd 
            LEFT JOIN m_att att10 
                ON f_o.enclos_cd10 = att10.att_cd
    ) as base 
    LEFT JOIN ( 
        SELECT
            o_d.odr_seq
            , o_d.item_cd
            , o_d.num
            , o_d.amnt
            , o_d.item_lvl
            , item.item_name
            , item.item_name_10
            , item.item_dtl_kbn
            , o_d.item_kbn 
        FROM
            odr_d o_d 
            LEFT JOIN ( 
                SELECT
                    it.item_cd
                    , it.item_name
                    , it.item_name_10
                    , it.item_lvl
                    , it_dt.item_dtl_kbn 
                FROM
                    m_item it 
                    LEFT JOIN m_item_dtl it_dt 
                        ON it.item_cd = it_dt.item_cd 
                        AND it.item_lvl = it_dt.item_lvl
            ) AS item 
                ON o_d.item_cd = item.item_cd 
                AND ( 
                    ( 
                        o_d.item_lvl IS NOT NULL 
                        AND o_d.item_lvl = item.item_lvl
                    ) 
                    OR (o_d.item_lvl IS NULL AND item.item_lvl IS NULL)
                )
    ) as or_d 
        ON base.odr_seq = or_d.odr_seq



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
and r.odr_seq = base.odr_seq
) as price2, 

( 
select sum( (s.price * r.amnt) * (sy.TAX_RATE) ) as wk_price 
from odr_d r ,m_item s , m_sys_set sy";
where sy.site_kbn='1' ";
and  r.item_cd  = s.item_cd ";
and ( ";
     ( r.item_lvl is null and s.item_lvl is null ) ";
  or ( r.item_lvl is not null and r.item_lvl = s.item_lvl ) ";
 ) ";
 and r.recv_order_id = ".$tmpPrice_OrderId ;
 ) as tax,

Spc.item_dtl_kbn FROM m_item_dtl Spc
WHERE = "Sh.item_cd = Spc.item_cd(+) AND Sh.item_lvl = Spc.item_lvl(+)";


																					
$sql  = "SELECT ";
$sql  = "base.cust_no AS KAINNO, ";
$sql  = "base.site_kbn AS SITE_KBN, ";
$sql  = "base.acpt_dt_tm AS ORDER_DT, ";
$sql  = "base.cust_name AS NAMEKANJI, ";
$sql  = "base.cust_name_kana AS NAMEKANA, ";
$sql  = "base.era_kbn AS NAMEOFERA, ";
$sql  = "base.birthday AS BIRTHDAY, ";
$sql  = "base.tel_no AS TEL_NO, ";
$sql  = "base.adr AS H_KNJ_ADDRESS, ";
$sql  = "base.adr_non_chg_part AS H_NOT_CONV, ";
$sql  = "or_d.item_cd AS SHOHIN_CD, ";
$sql  = "or_d.item_name AS NAMEFULL, ";
$sql  = "or_d.item_name_10 AS NAME10, ";
$sql  = "or_d.item_lvl AS SHOHIN_LEVEL, ";
$sql  = "or_d.item_dtl_kbn AS SHOHIN_KIND, ";
$sql  = "or_d.num AS AMOUNT, ";
$sql  = "or_d.amnt AS PRICE, ";
$sql  = "base.tot_odr_amnt AS TOTAL_ORDER_AMOUNT, ";
$sql  = "base.tot_odr_tax AS TOTAL_ORDER_TAXRATE, ";
$sql  = "base.pay_way_kbn AS PAYMENT_TYPE, ";
$sql  = "base.pay_cnt AS PAYMENT_NUM, ";
$sql  = "base.credit_card_corp_name AS COMPANYMEIFULL, ";
$sql  = "base.credit_card_no AS CC_NO, ";
$sql  = "base.card_input_kbn AS CC_REGIST_KBN, ";
$sql  = "base.avail_term AS CC_TERM, ";
$sql  = "base.cvs_rcv_site_odr_no AS ECONORDER_ID, ";
$sql  = "base.dlv_tm_kbn AS DELIVERY_TIME_TYPE, ";
$sql  = "base.dlv_req_dt AS DELIVERY_DT, ";
$sql  = "base.another_adr_post_no AS B_POST_NO, ";
$sql  = "base.another_adr AS B_KNJ_ADDRESS, ";
$sql  = "base.another_adr_tel_no AS B_TEL_NO, ";
$sql  = "base.mail_adr AS EMAIL, ";
$sql  = "base.mob_mail_adr AS M_EMAIL, ";
$sql  = "base.base.ship_att_cd_1 AS SHIP_CAUTION_CD1, ";
$sql  = "base.dlv_to_kbn AS ANOTHER_ADDR_TYPE, ";
$sql  = "base.other_adr_post_no AS ANOTHER_POST_NO, ";
$sql  = "base.other_adr AS ANOTHER_ADDR, ";
$sql  = "base.other_adr_tel_no AS ANOTHER_TELNO, ";
$sql  = "base.dlv_to_input_kbn AS DELIVERY_REGIST_KBN, ";
$sql  = "base.other_non_chg_part AS ANOTHER_ADDR_NOT_CONV, ";
$sql  = "base.country_cd AS COUNTRY_CD, ";
$sql  = "base.overseas_post_no AS POSTCD_FOREIGN, ";
$sql  = "base.overseas_adr_1 AS ADRS_FOREIGN1, ";
$sql  = "base.overseas_adr_2 AS ADRS_FOREIGN2, ";
$sql  = "base.overseas_adr_3 AS ADRS_FOREIGN3, ";
$sql  = "base.overseas_to_name AS COUNTRY_ADDRESSEE, ";
$sql  = "base.overseas_tel_no AS TEL_NO_FOREIGN, ";
$sql  = "base.dlv_req_memo AS DELIVERY_REQUEST, ";
$sql  = "base.ikusei_comment AS IKUSEI_COMMENT, ";
$sql  = "base.net_ij_rsn AS NET_IJ_INFO, ";
$sql  = "base.att_cont AS ATTENTION ";
$sql  = "FROM ";
$sql  = "( ";
$sql  = "SELECT ";
$sql  = "f_o.odr_seq, ";
$sql  = "f_o.site_kbn, ";
$sql  = "f_o.cust_no, ";
$sql  = "f_o.acpt_dt_tm, ";
$sql  = "m_of.cust_name, ";
$sql  = "m_of.cust_name_kana, ";
$sql  = "m_of.era_kbn, ";
$sql  = "m_of.birthday, ";
$sql  = "m_of.tel_no, ";
$sql  = "m_of.adr, ";
$sql  = "m_of.adr_non_chg_part, ";
$sql  = "f_o.tot_odr_amnt, ";
$sql  = "f_o.tot_odr_tax, ";
$sql  = "f_o.pay_way_kbn, ";
$sql  = "f_o.pay_cnt, ";
$sql  = "m_c.credit_card_corp_name, ";
$sql  = "f_o.credit_card_no, ";
$sql  = "f_o.card_input_kbn, ";
$sql  = "f_o.avail_term, ";
$sql  = "f_o.cvs_rcv_site_odr_no, ";
$sql  = "f_o.dlv_tm_kbn, ";
$sql  = "f_o.dlv_req_dt, ";
$sql  = "m_of.another_adr_post_no, ";
$sql  = "m_of.another_adr, ";
$sql  = "m_of.another_adr_tel_no, ";
$sql  = "m_mbr.mail_adr, ";
$sql  = "m_mbr.mob_mail_adr, ";
$sql  = "f_o.dlv_to_kbn, ";
$sql  = "f_o.other_adr_post_no, ";
$sql  = "f_o.other_adr, ";
$sql  = "f_o.other_adr_tel_no, ";
$sql  = "f_o.dlv_to_input_kbn, ";
$sql  = "f_o.other_non_chg_part, ";
$sql  = "f_o.dlv_req_memo, ";
$sql  = "m_net.net_ij_rsn, ";
$sql  = "f_o.ship_att_cd_1, ";
$sql  = "f_o.country_cd, ";
$sql  = "f_o.overseas_post_no, ";
$sql  = "f_o.overseas_adr_1, ";
$sql  = "f_o.overseas_adr_2, ";
$sql  = "f_o.overseas_adr_3, ";
$sql  = "f_o.overseas_to_name, ";
$sql  = "f_o.overseas_tel_no, ";
$sql  = "f_o.ikusei_comment, ";
$sql  = "f_o.att_cont ";
$sql  = "FROM ";
$sql  = "f_odr f_o ";
$sql  = "LEFT JOIN m_net_mbr m_mbr ";
$sql  = "ON f_o.cust_no = m_mbr.cust_no ";
$sql  = "LEFT JOIN m_offline_data m_of ";
$sql  = "ON m_mbr.cust_no = m_of.cust_no ";
$sql  = "LEFT JOIN m_credit_corp m_c ";
$sql  = "ON f_o.credit_card_corp = m_c.credit_card_corp_cd ";
$sql  = "LEFT JOIN m_net_ij_rsn m_net ";
$sql  = "ON f_o.pend_cd = m_net.net_ij_cd ";
$sql  = "LEFT JOIN m_att att ";
$sql  = "ON f_o.ship_att_cd_1 = att.att_cd ";
$sql  = "LEFT JOIN m_att att1 ";
$sql  = "ON f_o.enclos_cd1 = att1.att_cd ";
$sql  = "LEFT JOIN m_att att2 ";
$sql  = "ON f_o.enclos_cd2 = att2.att_cd ";
$sql  = "LEFT JOIN m_att att3 ";
$sql  = "ON f_o.enclos_cd3 = att3.att_cd ";
$sql  = "LEFT JOIN m_att att4 ";
$sql  = "ON f_o.enclos_cd4 = att4.att_cd ";
$sql  = "LEFT JOIN m_att att5 ";
$sql  = "ON f_o.enclos_cd5 = att5.att_cd ";
$sql  = "LEFT JOIN m_att att6 ";
$sql  = "ON f_o.enclos_cd6 = att6.att_cd ";
$sql  = "LEFT JOIN m_att att7 ";
$sql  = "ON f_o.enclos_cd7 = att7.att_cd ";
$sql  = "LEFT JOIN m_att att8 ";
$sql  = "ON f_o.enclos_cd8 = att8.att_cd ";
$sql  = "LEFT JOIN m_att att9 ";
$sql  = "ON f_o.enclos_cd9 = att9.att_cd ";
$sql  = "LEFT JOIN m_att att10 ";
$sql  = "ON f_o.enclos_cd10 = att10.att_cd";
$sql  = ") as base ";
$sql  = "LEFT JOIN ( ";
$sql  = "SELECT";
$sql  = "o_d.odr_seq, ";
$sql  = "o_d.item_cd, ";
$sql  = "o_d.num, ";
$sql  = "o_d.amnt, ";
$sql  = "o_d.item_lvl, ";
$sql  = "item.item_name, ";
$sql  = "item.item_name_10, ";
$sql  = "item.item_dtl_kbn, ";
$sql  = "o_d.item_kbn ";
$sql  = "FROM";
$sql  = "odr_d o_d ";
$sql  = "LEFT JOIN ( ";
$sql  = "SELECT";
$sql  = "it.item_cd, ";
$sql  = "it.item_name, ";
$sql  = "it.item_name_10, ";
$sql  = "it.item_lvl, ";
$sql  = "it_dt.item_dtl_kbn ";
$sql  = "FROM ";
$sql  = "m_item it ";
$sql  = "LEFT JOIN m_item_dtl it_dt ";
$sql  = "ON it.item_cd = it_dt.item_cd ";
$sql  = "AND it.item_lvl = it_dt.item_lvl ";
$sql  = ") AS item ";
$sql  = "ON o_d.item_cd = item.item_cd ";
$sql  = "AND ( ";
$sql  = "( ";
$sql  = "o_d.item_lvl IS NOT NULL ";
$sql  = "AND o_d.item_lvl = item.item_lvl";
$sql  = ") ";
$sql  = "OR (o_d.item_lvl IS NULL AND item.item_lvl IS NULL)";
$sql  = ") ";
$sql  = ") as or_d ";
$sql  = "ON base.odr_seq = or_d.odr_seq ";
$sql  = "WHERE base.odr_seq = ".getSqlValue('%'.$kainno.'%');	


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
We.another_adr AS B_KNJ_ADDRESS,
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
At10.att_cont as ENCLOSURE10,
Spc.item_dtl_kbn AS SHOHIN_KIND,
Pr.item_cd AS SHOHIN_CD,
Pr.num AS AMOUNT,
Pr.amnt AS PRICE,
(
select 
sum(CAST (s.price AS INTEGER) * r.amnt)  as wk_price 
from odr_d r ,m_item s , m_sys_set sy
where sy.site_kbn='1' 
and  r.item_cd  = s.item_cd 
and ( 
( r.item_lvl is null and s.item_lvl is null ) 
or ( r.item_lvl is not null and r.item_lvl = s.item_lvl ) 
) 
and r.odr_seq = Re.odr_seq
) as PRICE2, 
( 
select sum( (CAST (s.price AS INTEGER) * r.amnt) * (sy.TAX_RATE) ) as wk_price 
from odr_d r ,m_item s , m_sys_set sy
where sy.site_kbn='1' 
and  r.item_cd  = s.item_cd 
and ( 
     ( r.item_lvl is null and s.item_lvl is null ) 
  or ( r.item_lvl is not null and r.item_lvl = s.item_lvl ) 
 )
 and r.odr_seq = Re.odr_seq
 ) as TAX
from f_odr Re
LEFT JOIN m_net_mbr Me
ON Re.cust_no = Me.cust_no
LEFT JOIN m_offline_data We
ON Me.cust_no = We.cust_no
LEFT JOIN m_credit_corp Cr
ON Re.credit_card_corp = Cr.credit_card_corp_cd
LEFT JOIN odr_d Pr
ON Re.odr_seq = Pr.odr_seq
LEFT JOIN m_item Sh 
ON Pr.item_cd = Sh.item_cd AND Pr.item_lvl = Sh.item_lvl AND ((Pr.item_lvl is not null and Pr.item_lvl = Sh.item_lvl) or (Pr.item_lvl is null and  Sh.item_lvl is null))
LEFT JOIN m_net_ij_rsn Ij
ON Re.pend_cd = Ij.net_ij_cd
LEFT JOIN m_att At
ON Re.ship_att_cd_1 = At.att_cd
LEFT JOIN m_att At1
ON Re.enclos_cd1 = At1.att_cd
LEFT JOIN m_att At2
ON Re.enclos_cd2 = At2.att_cd
LEFT JOIN m_att At3
ON Re.enclos_cd3 = At3.att_cd
LEFT JOIN m_att At4
ON Re.enclos_cd4 = At4.att_cd
LEFT JOIN m_att At5
ON Re.enclos_cd5 = At5.att_cd
LEFT JOIN m_att At6
ON Re.enclos_cd6 = At6.att_cd
LEFT JOIN m_att At7
ON Re.enclos_cd7 = At7.att_cd
LEFT JOIN m_att At8
ON Re.enclos_cd8 = At8.att_cd
LEFT JOIN m_att At9
ON Re.enclos_cd9 = At9.att_cd
LEFT JOIN m_att At10
ON Re.enclos_cd10 = At10.att_cd
LEFT JOIN m_item_dtl Spc
ON Sh.item_cd = Spc.item_cd AND Sh.item_lvl = Spc.item_lvl
WHERE Re.RECV_ORDER_ID = ".getSqlValue($recv_order_id) 


$sql  = "SELECT  ";
$sql  = "Re.cust_no AS KAINNO, ";
$sql  = "Re.tel_no AS TEL_NO, ";
$sql  = "Re.pay_way_kbn AS PAYMENT_TYPE, ";
$sql  = "Re.pay_cnt AS PAYMENT_NUM, ";
$sql  = "Re.credit_card_no AS CC_NO, ";
$sql  = "Re.credit_card_no AS CC_NO, ";
$sql  = "Re.avail_term AS CC_TERM, ";
$sql  = "Re.card_input_kbn AS CC_REGIST_KBN, ";
$sql  = "Re.dlv_tm_kbn AS DELIVERY_TIME_TYPE, ";
$sql  = "We.another_adr AS B_KNJ_ADDRESS, ";
$sql  = "Re.dlv_req_memo AS DELIVERY_REQUEST, ";
$sql  = "Re.site_kbn AS SITE_KBN, ";
$sql  = "to_char(Re.dlv_req_dt, 'YYYY/MM/DD') AS DELIVERY_DT, ";
$sql  = "Re.dlv_to_kbn AS ANOTHER_ADDR_TYPE, ";
$sql  = "Re.other_non_chg_part AS ANOTHER_ADDR_NOT_CONV, ";
$sql  = "Re.other_adr_tel_no AS ANOTHER_TELNO, ";
$sql  = "Re.other_adr_post_no AS ANOTHER_POST_NO, ";
$sql  = "Re.dlv_to_input_kbn AS DELIVERY_REGIST_KBN, ";
$sql  = "Re.cvs_rcv_site_odr_no AS ECONORDER_ID, ";
$sql  = "Re.enclos_cd1 AS ENCLOSURE_CD1, ";
$sql  = "to_char(Re.acpt_dt_tm, 'YYYY/MM/DD HH24:MI:SS')  AS ORDER_DT, ";
$sql  = "Re.country_cd AS COUNTRY_CD, ";
$sql  = "Re.overseas_post_no AS POSTCD_FOREIGN, ";
$sql  = "Re.overseas_to_name AS COUNTRY_ADDRESSEE, ";
$sql  = "Re.overseas_adr_1 AS ADRS_FOREIGN1, ";
$sql  = "Re.overseas_adr_2 AS ADRS_FOREIGN2, ";
$sql  = "Re.overseas_adr_3 AS ADRS_FOREIGN3, ";
$sql  = "Re.overseas_tel_no AS TEL_NO_FOREIGN, ";
$sql  = "Re.ikusei_comment AS IKUSEI_COMMENT, ";
$sql  = "COALESCE(Re.tot_odr_amnt, 0) as ORDER_AMOUNT, ";
$sql  = "COALESCE(Re.tot_odr_tax, 0) as ORDER_TAXRATE, ";
$sql  = "Re.ship_att_cd_1 AS SHIP_CAUTION3_CD, ";
$sql  = "Me.mail_adr AS EMAIL, ";
$sql  = "Me.mob_mail_adr AS M_EMAIL, ";
$sql  = "We.cust_name AS NAMEKANJI, ";
$sql  = "We.cust_name_kana AS NAMEKANA, ";
$sql  = "We.era_kbn AS NAMEOFERA, ";
$sql  = "We.birthday AS BIRTHDAY, ";
$sql  = "We.adr AS H_KNJ_ADDRESS, ";
$sql  = "We.adr_non_chg_part AS H_NOT_CONV, ";
$sql  = "We.another_adr_post_no AS B_POST_NO, ";
$sql  = "We.another_adr AS B_KNJ_ADDRESS, ";
$sql  = "We.another_adr_tel_no AS B_TEL_NO, ";
$sql  = "Cr.credit_card_corp_name AS COMPANYMEIFULL, ";
$sql  = "Sh.item_name_10 AS NAME10, ";
$sql  = "Sh.price AS TANKA, ";
$sql  = "Sh.item_name AS NAMEFULL, ";
$sql  = "Sh.item_lvl AS SHOHIN_LEVEL, ";
$sql  = "Ij.net_ij_rsn AS NET_IJ_INFO, ";
$sql  = "At.att_cont as CAUTION, ";
$sql  = "At1.att_cont as ENCLOSURE1, ";
$sql  = "At2.att_cont as ENCLOSURE2, ";
$sql  = "At3.att_cont as ENCLOSURE3, ";
$sql  = "At4.att_cont as ENCLOSURE4, ";
$sql  = "At5.att_cont as ENCLOSURE5, ";
$sql  = "At6.att_cont as ENCLOSURE6, ";
$sql  = "At7.att_cont as ENCLOSURE7, ";
$sql  = "At8.att_cont as ENCLOSURE8, ";
$sql  = "At9.att_cont as ENCLOSURE9, ";
$sql  = "At10.att_cont as ENCLOSURE10, ";
$sql  = "Spc.item_dtl_kbn AS SHOHIN_KIND, ";
$sql  = "Pr.item_cd AS SHOHIN_CD, ";
$sql  = "Pr.num AS AMOUNT, ";
$sql  = "Pr.amnt AS PRICE, ";
$sql  = "( ";
$sql  = "select  ";
$sql  = "sum(CAST (s.price AS INTEGER) * r.amnt)  as wk_price  ";
$sql  = "from odr_d r ,m_item s , m_sys_set sy ";
$sql  = "where sy.site_kbn='1'  ";
$sql  = "and  r.item_cd  = s.item_cd  ";
$sql  = "and (  ";
$sql  = "( r.item_lvl is null and s.item_lvl is null )  ";
$sql  = "or ( r.item_lvl is not null and r.item_lvl = s.item_lvl )  ";
$sql  = ")  ";
$sql  = "and r.odr_seq = Re.odr_seq ";
$sql  = ") as PRICE2,  ";
$sql  = "(  ";
$sql  = "select sum( (CAST (s.price AS INTEGER) * r.amnt) * (sy.TAX_RATE) ) as wk_price  ";
$sql  = "from odr_d r ,m_item s , m_sys_set sy ";
$sql  = "where sy.site_kbn='1'  ";
$sql  = "and  r.item_cd  = s.item_cd  ";
$sql  = "and (  ";
$sql  = "( r.item_lvl is null and s.item_lvl is null )  ";
$sql  = "or ( r.item_lvl is not null and r.item_lvl = s.item_lvl )  ";
$sql  = ") ";
$sql  = "and r.odr_seq = Re.odr_seq ";
$sql  = ") as TAX ";
$sql  = "from f_odr Re ";
$sql  = "LEFT JOIN m_net_mbr Me ";
$sql  = "ON Re.cust_no = Me.cust_no ";
$sql  = "LEFT JOIN m_offline_data We ";
$sql  = "ON Me.cust_no = We.cust_no ";
$sql  = "LEFT JOIN m_credit_corp Cr ";
$sql  = "ON Re.credit_card_corp = Cr.credit_card_corp_cd ";
$sql  = "LEFT JOIN odr_d Pr ";
$sql  = "ON Re.odr_seq = Pr.odr_seq ";
$sql  = "LEFT JOIN m_item Sh  ";
$sql  = "ON Pr.item_cd = Sh.item_cd AND Pr.item_lvl = Sh.item_lvl AND "; 
$sql  = "((Pr.item_lvl is not null and Pr.item_lvl = Sh.item_lvl) or ";
$sql  = "(Pr.item_lvl is null and  Sh.item_lvl is null)) ";
$sql  = "LEFT JOIN m_net_ij_rsn Ij ";
$sql  = "ON Re.pend_cd = Ij.net_ij_cd ";
$sql  = "LEFT JOIN m_att At ";
$sql  = "ON Re.ship_att_cd_1 = At.att_cd ";
$sql  = "LEFT JOIN m_att At1 ";
$sql  = "ON Re.enclos_cd1 = At1.att_cd ";
$sql  = "LEFT JOIN m_att At2 ";
$sql  = "ON Re.enclos_cd2 = At2.att_cd ";
$sql  = "LEFT JOIN m_att At3 ";
$sql  = "ON Re.enclos_cd3 = At3.att_cd ";
$sql  = "LEFT JOIN m_att At4 ";
$sql  = "ON Re.enclos_cd4 = At4.att_cd ";
$sql  = "LEFT JOIN m_att At5 ";
$sql  = "ON Re.enclos_cd5 = At5.att_cd ";
$sql  = "LEFT JOIN m_att At6 ";
$sql  = "ON Re.enclos_cd6 = At6.att_cd ";
$sql  = "LEFT JOIN m_att At7 ";
$sql  = "ON Re.enclos_cd7 = At7.att_cd ";
$sql  = "LEFT JOIN m_att At8 ";
$sql  = "ON Re.enclos_cd8 = At8.att_cd ";
$sql  = "LEFT JOIN m_att At9 ";
$sql  = "ON Re.enclos_cd9 = At9.att_cd ";
$sql  = "LEFT JOIN m_att At10 ";
$sql  = "ON Re.enclos_cd10 = At10.att_cd ";
$sql  = "LEFT JOIN m_item_dtl Spc ";
$sql  = "ON Sh.item_cd = Spc.item_cd AND Sh.item_lvl = Spc.item_lvl ";

