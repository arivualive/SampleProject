SELECT 
od.acpt_dt_tm AS ORDER_DT							
od.cust_no	AS KAINNO						
nm.cust_name AS KAIN_NAME							
ij.net_ij_cd AS NET_IJ_CD
--login_status							
mbr_kbn AS KAIN_KBN						
--odr_form
od.gift_flg	
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
						
cosme_flag							
herbf_lag

od.credit_card_no AS CC_NO							
od.avail_term AS CC_TERM				
rb.credit_card_name	AS CC_NAME						
ac.mbr_cd AS KAIIN_ID						
ac.mbr_pwd AS KAIIN_PASS						
oddi.acpt_dt_tm	AS ORDER_DT			
oddi.credit_card_no AS CC_NO						
oddi.avail_term	AS CC_TERM						
credit_card_name AS CC_NAME							
change_mbr_cd							
change_mbr_pwd							
trade_cd							
trade_pwd							
order_cd							
epay_account_cd							

			

SELECT  FROM
f_odr od
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