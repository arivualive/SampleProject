ukeku(rcv_kbn)							
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
--item_lvl AS SHOHIN_LEVEL				
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
--domo_use_kbn AS DW_USED_KBN						
--dlv_tm_kbn AS DELIVERY_TIME_TYPE							
--dlv_req_dt AS DELIVERY_DT							
--another_adr_post_no AS B_POST_NO							
--another_adr AS B_KNJ_ADDRESS							
--another_adr_tel_no AS B_TEL_NO							
mailadr							
mobmailadr							
--ship_att_cd_1 AS SHIP_CAUTION_CD							
--ship_att_kbn_1 AS SHIP_CAUTION_CD1				
--ship_att_kbn_2 AS SHIP_CAUTION_CD2				
--dlv_to_kbn AS ANOTHER_ADDR_TYPE
--other_adr_post_no	AS ANOTHER_POST_NO						
--other_adr AS ANOTHER_ADDR						
--other_adr_tel_no AS ANOTHER_TELNO														
--dlv_to_input_kbn AS DELIVERY_REGIST_KBN							
--other_non_chg_part AS ANOTHER_ADDR_NOT_CONV					
--att_cont AS ATTENTION					
--kana_adr AS ANOTHER_ADDR_KANA							
--rcver_adr_non_chg_part_kana AS ANOTHER_ADDR_NOT_CONV_KANA							
--msg_card_kbn AS MSG_NEED_FLG							
--item_kbn AS SHOHIN_TYPE							
--dlv_req_memo AS DELIVERY_REQUEST							
--net_ij_rsn AS NET_IJ_INFO							
											



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
    , base.ship_att_cd_1 AS SHIP_CAUTION_CD
    , gift.ship_att_kbn_1 AS SHIP_CAUTION_CD1
    , gift.ship_att_kbn_2 AS SHIP_CAUTION_CD2
    , base.pay_way_kbn AS PAYMENT_TYPE
    , base.pay_cnt AS PAYMENT_NUM
    , base.credit_card_corp_name AS COMPANYMEIFULL
    , base.credit_card_no AS CC_NO
    , base.card_input_kbn AS CC_REGIST_KBN
    , base.avail_term AS CC_TERM
    , gift.domo_use_kbn AS DW_USED_KBN
    , base.dlv_tm_kbn AS DELIVERY_TIME_TYPE
    , base.dlv_req_dt AS DELIVERY_DT
    , base.another_adr_post_no AS B_POST_NO
    , base.another_adr AS B_KNJ_ADDRESS
    , base.another_adr_tel_no AS B_TEL_NO
    , base.dlv_to_kbn AS ANOTHER_ADDR_TYPE
    , base.other_adr_post_no AS ANOTHER_POST_NO
    , base.other_adr AS ANOTHER_ADDR
    , base.other_adr_tel_no AS ANOTHER_TELNO
    , base.dlv_to_input_kbn AS DELIVERY_REGIST_KBN
    , base.other_non_chg_part AS ANOTHER_ADDR_NOT_CONV
    , base.att_cont AS SHIP_CAUTION_CD3
    , gift.kana_adr AS ANOTHER_ADDR_KANA
    , gift.rcver_adr_non_chg_part_kana AS ANOTHER_ADDR_NOT_CONV_KANA
    , gift.msg_card_kbn AS MSG_NEED_FLG
    , or_d.item_kbn AS SHOHIN_TYPE
    , base.dlv_req_memo AS DELIVERY_REQUEST
    , base.net_ij_rsn AS NET_IJ_INFO 
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
            , f_o.dlv_tm_kbn
            , f_o.dlv_req_dt
            , m_of.another_adr_post_no
            , m_of.another_adr
            , m_of.another_adr_tel_no
            , f_o.dlv_to_kbn
            , f_o.other_adr_post_no
            , f_o.other_adr
            , f_o.other_adr_tel_no
            , f_o.dlv_to_input_kbn
            , f_o.other_non_chg_part
            , f_o.dlv_req_memo
            , m_net.net_ij_rsn
            , f_o.ship_att_cd_1
            , A3.att_cont 
        FROM
            f_odr f_o 
            LEFT JOIN m_att A3 
                ON f_o.ship_att_cd_1 = A3.att_cd 
            LEFT JOIN m_credit_corp m_c 
                ON f_o.credit_card_corp = m_c.credit_card_corp_cd 
            LEFT JOIN m_offline_data m_of 
                ON f_o.cust_no = m_of.cust_no 
            LEFT JOIN m_net_ij_rsn m_net 
                ON f_o.pend_cd = m_net.net_ij_cd
    ) as base 
    LEFT JOIN ( 
        SELECT
            f_g.odr_seq
            , f_g.domo_use_kbn
            , f_g.kana_adr
            , f_g.rcver_adr_non_chg_part_kana
            , f_g.msg_card_kbn
            , f_g.ship_att_kbn_1
            , f_g.ship_att_kbn_2 
        FROM
            f_gift f_g 
            LEFT JOIN m_att A1 
                ON f_g.ship_att_kbn_1 = A1.att_cd 
            LEFT JOIN m_att A2 
                ON f_g.ship_att_kbn_2 = A2.att_cd
    ) as gift 
        ON base.odr_seq = gift.odr_seq 
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

$sql  = "SELECT ";
$sql  = "base.site_kbn AS SITE_KBN, ";
$sql  = "base.cust_no AS KAINNO, ";
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
$sql  = "base.ship_att_cd_1 AS SHIP_CAUTION_CD, ";
$sql  = "gift.ship_att_kbn_1 AS SHIP_CAUTION_CD1, ";
$sql  = "gift.ship_att_kbn_2 AS SHIP_CAUTION_CD2, ";
$sql  = "base.pay_way_kbn AS PAYMENT_TYPE, ";
$sql  = "base.pay_cnt AS PAYMENT_NUM, ";
$sql  = "base.credit_card_corp_name AS COMPANYMEIFULL, ";
$sql  = "base.credit_card_no AS CC_NO, ";
$sql  = "base.card_input_kbn AS CC_REGIST_KBN, ";
$sql  = "base.avail_term AS CC_TERM, ";
$sql  = "gift.domo_use_kbn AS DW_USED_KBN, ";
$sql  = "base.dlv_tm_kbn AS DELIVERY_TIME_TYPE, ";
$sql  = "base.dlv_req_dt AS DELIVERY_DT, ";
$sql  = "base.another_adr_post_no AS B_POST_NO, ";
$sql  = "base.another_adr AS B_KNJ_ADDRESS, ";
$sql  = "base.another_adr_tel_no AS B_TEL_NO, ";
$sql  = "base.dlv_to_kbn AS ANOTHER_ADDR_TYPE, ";
$sql  = "base.other_adr_post_no AS ANOTHER_POST_NO, ";
$sql  = "base.other_adr AS ANOTHER_ADDR, ";
$sql  = "base.other_adr_tel_no AS ANOTHER_TELNO, ";
$sql  = "base.dlv_to_input_kbn AS DELIVERY_REGIST_KBN, ";
$sql  = "base.other_non_chg_part AS ANOTHER_ADDR_NOT_CONV, ";
$sql  = "base.att_cont AS SHIP_CAUTION_CD3, ";
$sql  = "gift.kana_adr AS ANOTHER_ADDR_KANA, ";
$sql  = "gift.rcver_adr_non_chg_part_kana AS ANOTHER_ADDR_NOT_CONV_KANA, ";
$sql  = "gift.msg_card_kbn AS MSG_NEED_FLG, ";
$sql  = "or_d.item_kbn AS SHOHIN_TYPE, ";
$sql  = "base.dlv_req_memo AS DELIVERY_REQUEST, ";
$sql  = "base.net_ij_rsn AS NET_IJ_INFO  ";
$sql  = "FROM";
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
$sql  = "f_o.dlv_tm_kbn, ";
$sql  = "f_o.dlv_req_dt, ";
$sql  = "m_of.another_adr_post_no, ";
$sql  = "m_of.another_adr, ";
$sql  = "m_of.another_adr_tel_no, ";
$sql  = "f_o.dlv_to_kbn, ";
$sql  = "f_o.other_adr_post_no, ";
$sql  = "f_o.other_adr, ";
$sql  = "f_o.other_adr_tel_no, ";
$sql  = "f_o.dlv_to_input_kbn, ";
$sql  = "f_o.other_non_chg_part, ";
$sql  = "f_o.dlv_req_memo, ";
$sql  = "m_net.net_ij_rsn, ";
$sql  = "f_o.ship_att_cd_1, ";
$sql  = "A3.att_cont  ";
$sql  = "FROM ";
$sql  = "f_odr f_o  ";
$sql  = "LEFT JOIN m_att A3  ";
$sql  = "ON f_o.ship_att_cd_1 = A3.att_cd ";
$sql  = "LEFT JOIN m_credit_corp m_c ";
$sql  = "ON f_o.credit_card_corp = m_c.credit_card_corp_cd ";
$sql  = "LEFT JOIN m_offline_data m_of ";
$sql  = "ON f_o.cust_no = m_of.cust_no ";
$sql  = "LEFT JOIN m_net_ij_rsn m_net ";
$sql  = "ON f_o.pend_cd = m_net.net_ij_cd";
$sql  = ") as base ";
$sql  = "LEFT JOIN ( ";
$sql  = "SELECT";
$sql  = "f_g.odr_seq, ";
$sql  = "f_g.domo_use_kbn, ";
$sql  = "f_g.kana_adr, ";
$sql  = "f_g.rcver_adr_non_chg_part_kana, ";
$sql  = "f_g.msg_card_kbn, ";
$sql  = "f_g.ship_att_kbn_1, ";
$sql  = "f_g.ship_att_kbn_2  ";
$sql  = "FROM ";
$sql  = "f_gift f_g  ";
$sql  = "LEFT JOIN m_att A1  ";
$sql  = "ON f_g.ship_att_kbn_1 = A1.att_cd ";
$sql  = "LEFT JOIN m_att A2  ";
$sql  = "ON f_g.ship_att_kbn_2 = A2.att_cd ";
$sql  = ") as gift  ";
$sql  = "ON base.odr_seq = gift.odr_seq ";
$sql  = "LEFT JOIN (  ";
$sql  = "SELECT ";
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
$sql  = "FROM";
$sql  = "m_item it ";
$sql  = "LEFT JOIN m_item_dtl it_dt ";
$sql  = "ON it.item_cd = it_dt.item_cd ";
$sql  = "AND it.item_lvl = it_dt.item_lvl";
$sql  = ") AS item ";
$sql  = "ON o_d.item_cd = item.item_cd ";
$sql  = "AND ( ";
$sql  = "( ";
$sql  = "o_d.item_lvl IS NOT NULL ";
$sql  = "AND o_d.item_lvl = item.item_lvl ";
$sql  = ") ";
$sql  = "OR (o_d.item_lvl IS NULL AND item.item_lvl IS NULL) ";
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
Re.avail_term AS CC_TERM,
Re.card_input_kbn AS CC_REGIST_KBN,
Re.site_kbn AS SITE_KBN,
Re.dlv_req_memo AS DELIVERY_REQUEST,
to_char(Re.acpt_dt_tm, 'YYYY/MM/DD HH24:MI:SS')  AS ORDER_DT,
COALESCE(Re.tot_odr_amnt, 0) as ORDER_AMOUNT,
COALESCE(Re.tot_odr_tax, 0) as ORDER_TAXRATE,
At3.att_cont AS SHIP_CAUTION3,
Re.ship_att_cd_1 AS SHIP_CAUTION3_CD,
Cr.credit_card_corp_name AS COMPANYMEIFULL,
We.cust_name AS NAMEKANJI,
We.cust_name_kana AS NAMEKANA,
We.era_kbn AS NAMEOFERA,
We.birthday AS BIRTHDAY,
We.adr AS H_KNJ_ADDRESS,
We.adr_non_chg_part AS H_NOT_CONV,
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
 ) as TAX,
Ij.net_ij_rsn AS NET_IJ_INFO,
Gi.ship_att_kbn_1 AS SHIP_CAUTION_CD1,
Gi.ship_att_kbn_2 AS SHIP_CAUTION_CD2,
Gi.msg_card_kbn AS MSG_NEED_FLG,
Gi.dlv_to_kbn AS DELIVERY_KBN,
Gi.dlv_req_dt AS DELIVERY_DT,
Gi.dlv_tm_kbn AS DELIVERY_TIME_TYPE,
Gi.rcver_name AS NAME_KANJI,
Gi.rcver_kana_name AS NAME_KANA,
Gi.rcver_adr_post_no AS ANOTHER_POST_NO,
Gi.kana_adr AS ANOTHER_ADDR_KANA,
Gi.rcver_adr AS ANOTHER_ADDR ,
Gi.rcver_adr_non_chg_part_kana AS ANOTHER_ADDR_NOT_CONV_KANA,
Gi.rcver_adr_non_chg_part AS ANOTHER_ADDR_NOT_CONV,
Gi.rcver_adr_tel_no AS ADD_ANOTHER_TELNO,
Gi.domo_use_kbn AS DW_USED_KBN,
At.att_cont AS SHIP_CAUTION1,
At2.att_cont AS SHIP_CAUTION2
FROM f_odr Re
LEFT JOIN m_offline_data We
ON Re.cust_no = We.cust_no
LEFT JOIN m_credit_corp Cr
ON Re.credit_card_corp = Cr.credit_card_corp_cd
LEFT JOIN m_net_ij_rsn Ij
ON Re.pend_cd = Ij.net_ij_cd
LEFT JOIN f_gift Gi
ON Re.odr_seq = Gi.odr_seq
LEFT JOIN m_att At
ON Gi.ship_att_kbn_1 =At.att_cd
LEFT JOIN m_att At2
ON Gi.ship_att_kbn_2 = At2.att_cd
LEFT JOIN m_att At3
ON Re.ship_att_cd_1 = At3.att_cd
WHERE Re.odr_seq = ".getSqlValue($recv_order_id);

$sql  = "SELECT ";
$sql  = "Re.cust_no AS KAINNO, ";
$sql  = "Re.tel_no AS TEL_NO, ";
$sql  = "Re.pay_way_kbn AS PAYMENT_TYPE, ";
$sql  = "Re.pay_cnt AS PAYMENT_NUM, ";
$sql  = "Re.credit_card_no AS CC_NO, ";
$sql  = "Re.avail_term AS CC_TERM, ";
$sql  = "Re.card_input_kbn AS CC_REGIST_KBN, ";
$sql  = "Re.site_kbn AS SITE_KBN, ";
$sql  = "Re.dlv_req_memo AS DELIVERY_REQUEST, ";
$sql  = "to_char(Re.acpt_dt_tm, 'YYYY/MM/DD HH24:MI:SS')  AS ORDER_DT, ";
$sql  = "COALESCE(Re.tot_odr_amnt, 0) as ORDER_AMOUNT, ";
$sql  = "COALESCE(Re.tot_odr_tax, 0) as ORDER_TAXRATE, ";
$sql  = "At3.att_cont AS SHIP_CAUTION3, ";
$sql  = "Re.ship_att_cd_1 AS SHIP_CAUTION3_CD, ";
$sql  = "Cr.credit_card_corp_name AS COMPANYMEIFULL, ";
$sql  = "We.cust_name AS NAMEKANJI, ";
$sql  = "We.cust_name_kana AS NAMEKANA, ";
$sql  = "We.era_kbn AS NAMEOFERA, ";
$sql  = "We.birthday AS BIRTHDAY, ";
$sql  = "We.adr AS H_KNJ_ADDRESS, ";
$sql  = "We.adr_non_chg_part AS H_NOT_CONV, ";
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
$sql  = ") as TAX, ";
$sql  = "Ij.net_ij_rsn AS NET_IJ_INFO, ";
$sql  = "Gi.ship_att_kbn_1 AS SHIP_CAUTION_CD1, ";
$sql  = "Gi.ship_att_kbn_2 AS SHIP_CAUTION_CD2, ";
$sql  = "Gi.msg_card_kbn AS MSG_NEED_FLG, ";
$sql  = "Gi.dlv_to_kbn AS DELIVERY_KBN, ";
$sql  = "Gi.dlv_req_dt AS DELIVERY_DT, ";
$sql  = "Gi.dlv_tm_kbn AS DELIVERY_TIME_TYPE, ";
$sql  = "Gi.rcver_name AS NAME_KANJI, ";
$sql  = "Gi.rcver_kana_name AS NAME_KANA, ";
$sql  = "Gi.rcver_adr_post_no AS ANOTHER_POST_NO, ";
$sql  = "Gi.kana_adr AS ANOTHER_ADDR_KANA, ";
$sql  = "Gi.rcver_adr AS ANOTHER_ADDR , ";
$sql  = "Gi.rcver_adr_non_chg_part_kana AS ANOTHER_ADDR_NOT_CONV_KANA, ";
$sql  = "Gi.rcver_adr_non_chg_part AS ANOTHER_ADDR_NOT_CONV, ";
$sql  = "Gi.rcver_adr_tel_no AS ADD_ANOTHER_TELNO, ";
$sql  = "Gi.domo_use_kbn AS DW_USED_KBN, ";
$sql  = "At.att_cont AS SHIP_CAUTION1, ";
$sql  = "At2.att_cont AS SHIP_CAUTION2 ";
$sql  = "FROM f_odr Re ";
$sql  = "LEFT JOIN m_offline_data We ";
$sql  = "ON Re.cust_no = We.cust_no ";
$sql  = "LEFT JOIN m_credit_corp Cr ";
$sql  = "ON Re.credit_card_corp = Cr.credit_card_corp_cd ";
$sql  = "LEFT JOIN m_net_ij_rsn Ij ";
$sql  = "ON Re.pend_cd = Ij.net_ij_cd ";
$sql  = "LEFT JOIN f_gift Gi ";
$sql  = "ON Re.odr_seq = Gi.odr_seq ";
$sql  = "LEFT JOIN m_att At ";
$sql  = "ON Gi.ship_att_kbn_1 =At.att_cd ";
$sql  = "LEFT JOIN m_att At2 ";
$sql  = "ON Gi.ship_att_kbn_2 = At2.att_cd ";
$sql  = "LEFT JOIN m_att At3 ";
$sql  = "ON Re.ship_att_cd_1 = At3.att_cd ";
$sql  = "WHERE Re.odr_seq = ".getSqlValue($recv_order_id); ";


SELECT
Pr.item_cd AS SHOHIN_CD,
Pr.num AS AMOUNT,
Pr.amnt AS PRICE,
Pr.item_kbn AS SHOHIN_TYPE,
Sh.item_name_10 AS NAME10,
Sh.item_name AS NAMEFULL,
Sh.item_lvl AS SHOHIN_LEVEL,
Spc.item_dtl_kbn AS SHOHIN_KIND 
FROM
odr_d Pr 
LEFT JOIN m_item Sh 
ON Pr.item_cd = Sh.item_cd 
AND ((Pr.item_lvl IS NOT NULL 
AND Pr.item_lvl = Sh.item_lvl) 
OR (Pr.item_lvl IS NULL AND Sh.item_lvl IS NULL)) 
LEFT JOIN m_item_dtl Spc 
ON Sh.item_cd = Spc.item_cd 
AND Sh.item_lvl = Spc.item_lvl
WHERE "Pr.odr_seq = ".getSqlValue($recv_order_id);

$sql  = "SELECT ";
$sql  = "Pr.item_cd AS SHOHIN_CD, ";
$sql  = "Pr.num AS AMOUNT, ";
$sql  = "Pr.amnt AS PRICE, ";
$sql  = "Pr.item_kbn AS SHOHIN_TYPE, ";
$sql  = "Sh.item_name_10 AS NAME10, ";
$sql  = "Sh.item_name AS NAMEFULL, ";
$sql  = "Sh.item_lvl AS SHOHIN_LEVEL, ";
$sql  = "Spc.item_dtl_kbn AS SHOHIN_KIND  ";
$sql  = "FROM ";
$sql  = "odr_d Pr  ";
$sql  = "LEFT JOIN m_item Sh  ";
$sql  = "ON Pr.item_cd = Sh.item_cd  ";
$sql  = "AND ((Pr.item_lvl IS NOT NULL  ";
$sql  = "AND Pr.item_lvl = Sh.item_lvl)  ";
$sql  = "OR (Pr.item_lvl IS NULL AND Sh.item_lvl IS NULL))  ";
$sql  = "LEFT JOIN m_item_dtl Spc  ";
$sql  = "ON Sh.item_cd = Spc.item_cd  ";
$sql  = "AND Sh.item_lvl = Spc.item_lvl ";
$sql  = "WHERE "Pr.odr_seq = ".getSqlValue($recv_order_id);


$sql  = "SELECT ";
$sql  .= "Re.cust_no AS KAINNO, ";
$sql  .= "Re.tel_no AS TEL_NO, ";
$sql  .= "Re.pay_way_kbn AS PAYMENT_TYPE, ";
$sql  .= "Re.pay_cnt AS PAYMENT_NUM, ";
$sql  .= "Re.credit_card_no AS CC_NO, ";
$sql  .= "Re.avail_term AS CC_TERM, ";
$sql  .= "Re.card_input_kbn AS CC_REGIST_KBN, ";
$sql  .= "Re.site_kbn AS SITE_KBN, ";
$sql  .= "Re.dlv_req_memo AS DELIVERY_REQUEST, ";
$sql  .= "to_char(Re.acpt_dt_tm, 'YYYY/MM/DD HH24:MI:SS')  AS ORDER_DT, ";
$sql  .= "COALESCE(Re.tot_odr_amnt, 0) as ORDER_AMOUNT, ";
$sql  .= "COALESCE(Re.tot_odr_tax, 0) as ORDER_TAXRATE, ";
$sql  .= "At3.att_cont AS SHIP_CAUTION3, ";
$sql  .= "Re.ship_att_cd_1 AS SHIP_CAUTION3_CD, ";
$sql  .= "Cr.credit_card_corp_name AS COMPANYMEIFULL, ";
$sql  .= "We.cust_name AS NAMEKANJI, ";
$sql  .= "We.cust_name_kana AS NAMEKANA, ";
$sql  .= "We.era_kbn AS NAMEOFERA, ";
$sql  .= "We.birthday AS BIRTHDAY, ";
$sql  .= "We.adr AS H_KNJ_ADDRESS, ";
$sql  .= "We.adr_non_chg_part AS H_NOT_CONV, ";
$sql  .= "( ";
$sql  .= "select  ";
$sql  .= "sum(CAST (s.price AS INTEGER) * r.amnt)  as wk_price  ";
$sql  .= "from odr_d r ,m_item s , m_sys_set sy ";
$sql  .= "where sy.site_kbn='1'  ";
$sql  .= "and  r.item_cd  = s.item_cd  ";
$sql  .= "and (  ";
$sql  = "(r.item_lvl is null or (COALESCE(r.item_lvl, '') = '' )) and (s.item_lvl is null or (COALESCE(s.item_lvl, '') = '' ))  ";
    $sql  = "or ((r.item_lvl is not null and trim(r.item_lvl) != '') and r.item_lvl = s.item_lvl )  ";
    $sql  = ")  ";
$sql  .= "and r.odr_seq = ".getSqlValue($recv_order_id);
$sql  .= ") as PRICE2,  ";
$sql  .= "(  ";
$sql  .= "select sum( (CAST (s.price AS INTEGER) * r.amnt) * (sy.TAX_RATE) ) as wk_price  ";
$sql  .= "from odr_d r ,m_item s , m_sys_set sy ";
$sql  .= "where sy.site_kbn='1'  ";
$sql  .= "and  r.item_cd  = s.item_cd  ";
$sql  .= "and (  ";
$sql  = "(r.item_lvl is null or (COALESCE(r.item_lvl, '') = '' )) and (s.item_lvl is null or (COALESCE(s.item_lvl, '') = '' ))  ";
    $sql  = "or ((r.item_lvl is not null and trim(r.item_lvl) != '') and r.item_lvl = s.item_lvl )  ";
    $sql  = ")  ";
 $sql  .= "and r.odr_seq = ".getSqlValue($recv_order_id);
 $sql  .= ") as TAX, ";
$sql  .= "Ij.net_ju_rsn AS NET_IJ_INFO, ";
$sql  .= "Gi.ship_att_kbn_1 AS SHIP_CAUTION_CD1, ";
$sql  .= "Gi.ship_att_kbn_2 AS SHIP_CAUTION_CD2, ";
$sql  .= "Gi.msg_card_kbn AS MSG_NEED_FLG, ";
$sql  .= "Gi.dlv_to_kbn AS DELIVERY_KBN, ";
$sql  .= "Gi.dlv_req_dt AS DELIVERY_DT, ";
$sql  .= "Gi.dlv_tm_kbn AS DELIVERY_TIME_TYPE, ";
$sql  .= "Gi.rcver_name AS NAME_KANJI, ";
$sql  .= "Gi.rcver_kana_name AS NAME_KANA, ";
$sql  .= "Gi.rcver_adr_post_no AS ANOTHER_POST_NO, ";
$sql  .= "Gi.kana_adr AS ANOTHER_ADDR_KANA, ";
$sql  .= "Gi.rcver_adr AS ANOTHER_ADDR , ";
$sql  .= "Gi.rcver_adr_non_chg_part_kana AS ANOTHER_ADDR_NOT_CONV_KANA, ";
$sql  .= "Gi.rcver_adr_non_chg_part AS ANOTHER_ADDR_NOT_CONV, ";
$sql  .= "Gi.rcver_adr_tel_no AS ADD_ANOTHER_TELNO, ";
$sql  .= "Gi.domo_use_kbn AS DW_USED_KBN, ";
$sql  .= "At.att_cont AS SHIP_CAUTION1, ";
$sql  .= "At2.att_cont AS SHIP_CAUTION2 ";
$sql  .= "FROM f_odr Re ";
$sql  .= "LEFT JOIN m_offline_data We ";
$sql  .= "ON Re.cust_no = We.cust_no ";
$sql  .= "LEFT JOIN m_credit_corp Cr ";
$sql  .= "ON Re.credit_card_corp = Cr.credit_card_corp_cd ";
$sql  .= "LEFT JOIN m_net_ju_rsn Ij ";
$sql  .= "ON Re.pend_cd = Ij.net_ju_cd ";
$sql  .= "LEFT JOIN f_gift Gi ";
$sql  .= "ON Re.odr_seq = Gi.odr_seq ";
$sql  .= "LEFT JOIN m_att At ";
$sql  .= "ON Gi.ship_att_kbn_1 =At.att_cd ";
$sql  .= "LEFT JOIN m_att At2 ";
$sql  .= "ON Gi.ship_att_kbn_2 = At2.att_cd ";
$sql  .= "LEFT JOIN m_att At3 ";
$sql  .= "ON Re.ship_att_cd_1 = At3.att_cd ";
$sql  .= "WHERE Re.odr_seq = ".getSqlValue($recv_order_id);