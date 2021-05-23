( SELECT 
od.acpt_dt_tm AS ORDER_DT							
od.cust_no	AS KAINNO						
nm.cust_name AS KAIN_NAME							
ij.net_ij_cd AS NET_IJ_CD
--login_status							
od.mbr_kbn AS KAIN_KBN	

--odr_form
od.gift_flg	AS GIFT_FLG
rb.regular_buy_odr_seq AS REGULAR_ORDER_ID
od.item_kbn AS SHOHIN_TYPE
ac.odr_kbn AS ORDER_KBN
ij.net_ij_rsn AS NET_IJ_INFO							
od.odr_stat_kbn AS ORDER_STATUS							
--host_kbn
od.host_kbn	AS HOST_FLG						
od.rcv_form_output_kbn	AS PRINT_FLG						
--odr_kbn							
oddi.upd_kbn AS CHANGE_KBN							
od.tel_no AS TEL_NO						
nm.mail_adr AS EMAIL 						
--site_kbn
od.site_kbn AS SITE_KBN
od.route_dtl_kbn						
od.login_cd AS NETMEMBER_ID							

						
od.credit_card_no AS CC_NO							
od.avail_term AS CC_TERM				
rb.credit_card_name	AS CC_NAME						
ac.mbr_cd AS KAIIN_ID						
ac.mbr_pwd AS KAIIN_PASS						
oddi.acpt_dt_tm	AS ORDER_DT			
oddi.credit_card_no AS CC_NO						
oddi.avail_term	AS CC_TERM						
credit_card_name AS CC_NAME							
ci.mbr_cd AS CHNG_HIST_KAIIN_ID						
cichange_mbr_pwd AS CHNG_HIST_KAIIN_PASS						
pay.trade_cd AS ACCESS_ID							
pay.trade_pwd AS ACCESS_PASS							
pay.order_cd AS ORDER_ID							
pay.e_pay_account_cd AS EPAYMENT_ID							

INNER JOIN m_net_mbr nm
 ON od.cust_no=nm.mbr_seq
LEFT JOIN m_net_ij_rsn ij
 ON od.pend_cd=ij.net_ij_cd
LEFT JOIN h_approval_card_input ac
 ON od.odr_seq=ac.odr_kbn
LEFT JOIN h_card_input ci
 ON od.odr_seq=ci.odr_seq
LEFT JOIN odr_d odd
 ON od.odr_seq=odd.odr_seq
LEFT JOIN m_item i
 ON odd.item_cd=i.item_cd
LEFT JOIN m_sys_set sys
 LEFT JOIN f_odr_upd odu
 LEFT JOIN h_e_pay_authori pay
 ON od.odr_seq=pay.odr_no
LEFT JOIN f_regular_buy_odr_info_record rb
 ON od.cust_no=rb.cust_no
LEFT JOIN f_regular_buy_odr_info_dtl_record rbd
 ON rb.regular_buy_odr_seq=rbd.regular_buy_odr_seq
LEFT JOIN m_offline_data of
 ON rb.cust_no=of.cust_no
LEFT JOIN f_odr_direct oddi
 ON od.odr_seq=oddi.odr_seq 
 ORDER BY od.acpt_dt_tm DESC ) AS A


(b.cosme_flag AS COSME_FLAG						
b.herb_flag	AS HERB_FLAG) AS B

SELECT
a.acpt_dt_tm AS ORDER_DT							
a.cust_no	AS KAINNO						
a.cust_name AS KAIN_NAME							
a.net_ij_cd AS NET_IJ_CD
AS REGIST_USER
--login_status							
a.mbr_kbn AS KAIN_KBN	

--odr_form
a.gift_flg	AS GIFT_FLG
a.regular_buy_odr_seq AS REGULAR_ORDER_ID
a.item_kbn AS SHOHIN_TYPE
a.odr_kbn AS ORDER_KBN
a.net_ij_rsn AS NET_IJ_INFO							
a.odr_stat_kbn AS ORDER_STATUS							
--host_kbn
a.host_kbn	AS HOST_FLG						
a.rcv_form_output_kbn	AS PRINT_FLG						
--odr_kbn							
a.upd_kbn AS CHANGE_KBN							
a.tel_no AS TEL_NO						
a.mail_adr AS EMAIL 						
--site_kbn
a.site_kbn AS SITE_KBN
a.route_dtl_kbn						
a.login_cd AS NETMEMBER_ID							

b.cosme_flag AS COSME_FLAG						
b.herb_flag	AS HERB_FLAG
						
a.credit_card_no AS CC_NO							
a.avail_term AS CC_TERM				
a.credit_card_name	AS CC_NAME						
a.mbr_cd AS KAIIN_ID						
a.mbr_pwd AS KAIIN_PASS						
a.acpt_dt_tm	AS ORDER_DT			
a.credit_card_no AS CC_NO						
a.avail_term	AS CC_TERM						
a.credit_card_name AS CC_NAME							
a.mbr_cd AS CHNG_HIST_KAIIN_ID						
a.mbr_pwd AS CHNG_HIST_KAIIN_PASS						
a.trade_cd AS ACCESS_ID							
a.trade_pwd AS ACCESS_PASS							
a.order_cd AS ORDER_ID							
a.e_pay_account_cd AS EPAYMENT_ID

WHERE

A.delete_flg != 1

A.order_dt >= to_timestamp('$ymdh', 'yyyymmddhh24miss')

A.order_dt <= to_timestamp('$ymdh', 'yyyymmddhh24miss')

A.cust_no like 

A.cust_name LIKE 

A.tel_no = 

a.mail_adr LIKE 
}

A.注文区分 IN (状況（検索条件）)

A.変更区分=注文状態指定（検索条件）

--Site_kbn
A.site_kbn = '1' AND A.route_dtl_kbn <> '03')
A.site_kbn = '2'
(A.site_kbn != '2' AND A.route_dtl_kbn = '03')

--net_ij_kbn
A.net_ij_cd=0000 OR A.net_ij_cd IS NULL
A.net_ij_cd !=0000 OR A.net_ij_cd IS NOT NULL


B.cosme_flag = 1 and B.herb_flag = 0
B.herb_flag = 1 and B.cosme_flag = 0

--Login Status
A.mbr_kbn = 2
A.mbr_kbn IN (0,1) and A.odr_kbn=1 and A.item_kbn=1
A.login_cd = 

--odr_form
A.gift_flg = 0
A.gift_flg = 1
(ro.regular_buy_odr_seq != '' AND ro.shohin_type=1 AND h.order_kbn=2)
(a.gift_flg = '0' AND ro.regular_buy_odr_seq != '' AND ro.shohin_type=1 AND h.order_kbn=2)
	
REGIST_USER



SELECT
    * 
FROM
    ( 
        SELECT
            a.recv_order_id
            , a.site_kbn
            , a.kainno
            , a.tel_no as tel_no
            , a.netmember_id
            , to_char(a.order_dt, 'YYYY/MM/DD HH24:MI:SS') as order_dt
            , b.kain_name as kain_name
            , decode(a.site_kbn, 1, b.email, b.m_email) as email
            , ( 
                select
                    sum(price * amount) as sum_price 
                from
                    RecvProduct_Tbl r 
                where
                    r.recv_order_id = a.recv_order_id
            ) as sum_price
            , ( 
                select
                    sum((s.TANKA * r.amount) * (sy.TAX_RATE + 1)) as wk_price 
                from
                    RecvProduct_Tbl r
                    , sqlshohin_tbl s
                    , system_tbl sy 
                where
                    sy.SITE_KBN = '1' 
                    and r.SHOHIN_CD = s.SHOHIN_CD 
                    and ( 
                        ( 
                            r.SHOHIN_LEVEL is null 
                            and s.SHOHIN_LEVEL is null
                        ) 
                        or ( 
                            r.SHOHIN_LEVEL is not null 
                            and r.SHOHIN_LEVEL = s.SHOHIN_LEVEL
                        )
                    ) 
                    and r.recv_order_id = a.recv_order_id
            ) as SUM_PRICE2
            , a.host_flg
            , a.print_flg
            , a.order_status
            , a.session_id
            , a.NET_IJ_CD
            , c.NET_IJ_INFO
            , a.RESERVE_KBN
            , a.GIFT_FLG
            , ( 
                NVL(a.TOTAL_ORDER_AMOUNT, 0) + NVL(a.TOTAL_ORDER_TAXRATE, 0)
            ) as ORDER_AMOUNT
            , a.ODRROUTEDTLKBN
            , a.PAYMENT_NUM
            , h.REGIST_HISTORY_ID
            , h.KAIIN_ID as KAIIN_ID
            , h.KAIIN_PASS as KAIIN_PASS
            , h.CLR_CORP_CD
            , h.CARD_SEQ
            , a.CC_TERM
            , a.CC_NO as CC_NO
            , chnghst.REGIST_HISTORY_ID as CHNG_HIST_REGIST_HISTORY_ID
            , chnghst.KAIIN_ID as CHNG_HIST_KAIIN_ID
            , chnghst.KAIIN_PASS as CHNG_HIST_KAIIN_PASS
            , chnghst.CLR_CORP_CD as CHNG_HIST_CLR_CORP_CD
            , chnghst.CARD_SEQ as CHNG_HIST_CARD_SEQ
            , ( 
                select
                    change_kbn 
                from
                    orderchange_tbl 
                where
                    recv_change_id = a.recv_order_id
            ) as change_kbn
            , ( 
                select
                    order_dt 
                from
                    orderchange_tbl 
                where
                    recv_change_id = a.recv_order_id
            ) as order_change_dt
            , ( 
                SELECT
                    CONCAT( 
                        cc_no
                        , CONCAT( 
                            ','
                            , CONCAT( 
                                cc_name
                                , CONCAT(',', CONCAT(cc_term, CONCAT(',', payment_num)))
                            )
                        )
                    ) 
                from
                    orderchange_tbl 
                where
                    recv_change_id = a.recv_order_id
            ) as data_payment 
        FROM
            RecvOrder_Tbl a
            , Member_Tbl b
            , net_ij_tbl c
            , CARDAPPROVALREGISTHISTORY_TBL h
            , CARDREGISTHISTORY_TBL chnghst 
        WHERE
            a.kainno = b.kainno 
            AND a.NET_IJ_CD = c.NET_IJ_CD(+) 
            AND a.RECV_ORDER_ID = h.ORDER_ID(+) 
            AND a.RECV_ORDER_ID = chnghst.ORDER_ID(+) 
            AND a.delete_flg <> 1 
            AND a.order_dt >= TO_DATE('20200416000000', 'yyyymmddhh24miss') 
            AND a.order_dt <= TO_DATE('20210416000000', 'yyyymmddhh24miss') 
            AND a.kainno like  18427519  
            AND (a.KAIN_KBN is null OR a.KAIN_KBN = '2') 
            AND (a.site_kbn = '1' AND a.ODRROUTEDTLKBN <> '03')
    ) 
ORDER BY
    order_dt desc;