$sql  = " SELECT";

    $sql .= " A.odr_seq AS RECV_ORDER_ID,";
    //注文日時
    $sql .= " A.acpt_dt_tm AS ORDER_DT,";
    //会員番号
    $sql .= " A.cust_no AS KAINNO,";
    //お名前
    $sql .= " A.cust_name AS KAIN_NAME,";
    //入力区分
    $sql .= " A.net_ju_cd AS NET_IJ_CD,";
    //ログイン状態
    //注文形態
    //マニュアル理由
    $sql .= " A.net_ju_rsn AS NET_IJ_INFO,";
    //状況
    $sql .= " A.odr_stat_kbn AS ORDER_STATUS,";
    //ホスト区分
    $sql .= " A.core_sys_kbn AS HOST_FLG,";
    //受票出力区分
    $sql .= " A.rcv_form_output_kbn AS PRINT_FLG,";
    //区分
    $sql .= " A.odr_kbn AS ORDER_KBN,";
    //変更区分
    $sql .= " A.upd_kbn AS CHANGE_KBN,";
    
    $sql .= " A.item_kbn AS SHOHIN_TYPE,";
    //電話番号
    $sql .= " A.tel_no AS TEL_NO,";
    //Eメールアドレス
    $sql .= " A.mail_adr AS EMAIL,";
    //サイト
    
    //会員区分
    $sql .= " A.mbr_kbn AS KAIN_KBN,";
    //ログインコード
    $sql .= " A.net_mbr_cd AS NETMEMBER_ID,";
    //サイト区分
    $sql .= " A.site_kbn AS SITE_KBN,";
    //贈物フラグ
    $sql .= " A.gift_flg AS GIFT_FLG,";
    //化粧品フラグ
    $sql .= " B.cosme_flag AS COSME_FLAG,";
    //漢方フラグ
    $sql .= " B.herb_flag AS HERB_FLAG,";
    //定期購入注文連番
    //$sql .= " A.regular_buy_odr_seq AS REGULAR_ORDER_ID,";
    //カード番号（カード情報）
    $sql .= " A.credit_card_no AS CC_NO,";
    //有効期限（カード情報）
    $sql .= " A.avail_term AS CC_TERM,";
    //クレジットカード名義人（カード情報）
    //$sql .= " A.credit_card_name AS CC_NAME,";
    //会員ID（カード情報）
    $sql .= " A.mbr_cd AS KAIIN_ID,";
    //会員パスワード（カード情報）
    $sql .= " A.mbr_pwd AS KAIIN_PASS,";
    //注文日時（支払変更カード情報）
    $sql .= " A.chng_order_dt AS CHNG_ORDER_DT,";
    //カード番号（支払変更カード情報）
    $sql .= " A.chng_card_no AS CHNG_HIST_CC_NO,";
    //有効期限（支払変更カード情報）
    $sql .= " A.chng_avail_term AS CHNG_HIST_CC_TERM,";
    //クレジットカード名義人（支払変更カード情報）
    $sql .= " A.chng_card_name AS CHNG_HIST_CC_NAME,";
    //会員ID（支払変更カード情報）
    $sql .= " A.chng_mbr_cd AS CHNG_HIST_KAIIN_ID,";
    //会員パスワード（支払変更カード情報）
    $sql .= " A.chng_mbr_pwd AS CHNG_HIST_KAIIN_PASS,";
    //取引ID（Pay情報）
    $sql .= " A.trade_cd AS ACCESS_ID,";
    //取引パスワード（Pay情報）
    $sql .= " A.trade_pwd AS ACCESS_PASS,";
    //オーダーID（Pay情報）
    $sql .= " A.order_cd AS ORDER_ID,";
    //AmazonビリングアグリーメントID（Pay情報）
    $sql .= " A.e_pay_account_cd AS EPAYMENT_ID,";
    
    $sql .= " A.route_dtl_kbn AS ODRROUTEDTLKBN,";
    $sql .= " A.hist_seq AS REGIST_HISTORY_ID,";
    $sql .= " A.chng_hist_seq AS CHNG_HIST_REGIST_HISTORY_ID,";
    $sql .= " A.pay_hist_seq AS EPAYMENTHISTORY_ID,";
    $sql .= " A.pay_clr_corp_cd AS EPAYCLR_CORP_CD,";
    $sql .= " A.del_flg AS DELETE_FLAG";
    
$sql .= " FROM";
    $sql .= " ( ";
        $sql .= " SELECT";
            $sql .= " od.odr_seq,";
            $sql .= " od.acpt_dt_tm,";
            $sql .= " od.cust_no,";
            $sql .= " nm.cust_name,";
            $sql .= " ij.net_ju_cd,";
            $sql .= " od.mbr_kbn,";
            $sql .= " od.gift_flg,";
            //$sql .= " rb.regular_buy_odr_seq,";
            $sql .= " odd.item_kbn,";
            $sql .= " ac.odr_kbn,";
            $sql .= " ij.net_ju_rsn,";
            $sql .= " od.odr_stat_kbn,";
            $sql .= " od.core_sys_kbn,";
            $sql .= " od.rcv_form_output_kbn,";
            $sql .= " odu.upd_kbn,";
            $sql .= " od.tel_no,";
            $sql .= " od.del_flg,";
            $sql .= " nm.mail_adr,";
            $sql .= " od.site_kbn,";
            $sql .= " od.route_dtl_kbn,";
            $sql .= " od.net_mbr_cd,";
            $sql .= " od.credit_card_no,";
            $sql .= " od.avail_term,";
            //$sql .= " rb.credit_card_name,";
            $sql .= " ac.hist_seq,";
            $sql .= " ac.mbr_cd,";
            $sql .= " ac.mbr_pwd,";
            $sql .= " odu.acpt_dt_tm AS chng_order_dt,";
            $sql .= " odu.credit_card_no AS chng_card_no,";
            $sql .= " odu.avail_term AS chng_avail_term,";
            $sql .= " odu.credit_card_name AS chng_card_name,";
            $sql .= " ci.hist_seq AS chng_hist_seq,";
            $sql .= " ci.mbr_cd AS chng_mbr_cd,";
            $sql .= " ci.mbr_pwd AS chng_mbr_pwd,";
            $sql .= " pay.hist_seq AS pay_hist_seq,";
            $sql .= " pay.trade_cd,";
            $sql .= " pay.trade_pwd,";
            $sql .= " pay.order_cd,";
            $sql .= " pay.e_pay_account_cd,";
            $sql .= " pay.credit_corp_kbn AS pay_clr_corp_cd ";
        $sql .= " FROM";
            //注文伝票
            $sql .= " f_odr_h od ";
            //ネット会員台帳
            $sql .= " INNER JOIN m_net_mbr nm ";
                //注文伝票.会員番号=ネット会員台帳.会員番号（INNER JOIN）
                $sql .= " ON od.cust_no = nm.cust_no ";
            //ネットIJ理由台帳
            $sql .= " LEFT JOIN m_net_ju_rsn ij ";
                //注文伝票.保留コード=ネットIJ理由台帳.ネットIJコード（LEFT JOIN）
                $sql .= " ON od.pend_cd = ij.net_ju_cd ";
            //承認後カード登録履歴
            $sql .= " LEFT JOIN h_approval_card_input ac ";
                // 注文伝票.受注連番=承認後カード登録履歴.注文番号（LEFT JOIN）
                $sql .= " ON od.odr_seq = ac.odr_no ";
            //カード登録履歴
            $sql .= " LEFT JOIN h_card_input ci ";
                //注文伝票.受注連番=カード登録履歴.受注連番（LEFT JOIN）
                $sql .= " ON od.odr_seq = ci.odr_seq ";
            //注文明細
            $sql .= " LEFT JOIN f_odr_d odd ";
                //注文伝票.受注連番=注文明細.受注連番（LEFT JOIN）
                $sql .= " ON od.odr_seq = odd.odr_seq ";
            //商品台帳
            //$sql .= " LEFT JOIN m_item i ";
                //注文明細.商品コード=商品台帳.商品コード（LEFT JOIN）
                //$sql .= " ON odd.item_cd = i.item_cd ";
            //システム設定台帳
            //注文変更伝票
            $sql .= " LEFT JOIN f_odr_upd odu ";
                $sql .= " ON od.odr_seq = odu.odr_cd ";
            //電子決済オーソリ履歴
            $sql .= " LEFT JOIN h_e_pay_authori pay ";
                //注文伝票.受注連番=電子決済オーソリ履歴.注文番号（LEFT JOIN）
                $sql .= " ON od.odr_seq = pay.odr_no ";
            //定期購入注文情報記録伝票
            $sql .= " LEFT JOIN f_regular_buy_odr_info_record_h rb ";
                //注文伝票.会員番号=定期購入注文情報記録伝票.会員番号（LEFT JOIN）
                $sql .= " ON od.cust_no = rb.cust_no ";
            //定期購入注文情報詳細記録伝票
            $sql .= " LEFT JOIN f_regular_buy_odr_info_record_d rbd ";
                //定期購入注文情報記録伝票.定期購入受注連番=定期購入注文情報詳細記録伝票.定期購入受注連番（LEFT JOIN）
                $sql .= " ON rb.regular_buy_odr_seq = rbd.regular_buy_odr_seq ";
            //オフライン用データ台帳
            $sql .= " LEFT JOIN m_offline_data of ";
                //定期購入注文情報記録伝票.会員番号=オフライン用データ台帳.会員番号（LEFT JOIN）
                ktool$sql .= " ON rb.cust_no = of.cust_no ";
            //注文直販伝票
            //$sql .= " LEFT JOIN f_odr_direct oddi ";
                //注文伝票.受注連番=注文直販伝票.受注連番（LEFT JOIN）
                //$sql .= " ON od.odr_seq = oddi.odr_seq";
        //注文伝票.受付日時（降順）
		$sql .= " ORDER BY od.acpt_dt_tm DESC";
    $sql .= " ) AS A ";
    $sql .= " LEFT JOIN ( ";
        $sql .= " SELECT";
            $sql .= " base.odr_seq";
            $sql .= " , coalesce(ad1.cosme_flag, 0) cosme_flag";
            $sql .= " , coalesce(ad2.herb_flag, 0) herb_flag ";
        $sql .= " FROM";
            $sql .= " ( ";
                $sql .= " SELECT";
                    $sql .= " f_odr_d.odr_seq ";
                $sql .= " FROM";
                    $sql .= " f_odr_d ";
                $sql .= " GROUP BY";
                    $sql .= " f_odr_d.odr_seq";
            $sql .= " ) AS base ";
            $sql .= " LEFT JOIN ( ";
                $sql .= " SELECT";
                    $sql .= " dd.odr_seq";
                    $sql .= " , 1 AS cosme_flag ";
                $sql .= " FROM";
                    $sql .= " f_odr_d AS dd ";
                    $sql .= " INNER JOIN m_item AS mm ";
                        $sql .= " ON dd.item_cd = mm.item_cd ";
                        $sql .= " AND mm.ope_kbn = '1' ";
                $sql .= " GROUP BY";
                    $sql .= " dd.odr_seq";
            $sql .= " ) AS ad1 ";
                $sql .= " ON base.odr_seq = ad1.odr_seq ";
            $sql .= " LEFT JOIN ( ";
                $sql .= " SELECT";
                    $sql .= " dd.odr_seq";
                    $sql .= " , 1 AS herb_flag ";
                $sql .= " FROM";
                    $sql .= " f_odr_d AS dd ";
                    $sql .= " inner join m_item AS mm ";
                        $sql .= " ON dd.item_cd = mm.item_cd ";
                        $sql .= " AND mm.ope_kbn = '2' ";
                $sql .= " GROUP BY";
                    $sql .= " dd.odr_seq";
            $sql .= " ) AS ad2 ";
                $sql .= " ON base.odr_seq = ad2.odr_seq";
		$sql .= " ORDER BY base.odr_seq DESC";
    $sql .= " ) AS B ";
        //A.注文連番=B.注文連番（LEFT JOIN）
        $sql .= " ON A.odr_seq = B.odr_seq";
            $sql .= " WHERE ( ";
                $sql .= $where;
            $sql .= ") ";
//A.受付日時（降順）
$sql .= " ORDER BY A.acpt_dt_tm DESC";


SELECT
    A.odr_seq AS ORDER_SEQ,
    A.acpt_dt_tm AS ORDER_DT,
    A.cust_no AS KAINNO,
    A.cust_name AS KAIN_NAME,
    A.net_ju_cd AS NET_IJ_CD,
    A.mbr_kbn AS KAIN_KBN,
    A.gift_flg AS GIFT_FLG,
    A.regular_buy_odr_seq AS REGULAR_ORDER_ID,
    A.item_kbn AS SHOHIN_TYPE,
    A.odr_kbn AS ORDER_KBN,
    A.net_ju_rsn AS NET_IJ_INFO,
    A.odr_stat_kbn AS ORDER_STATUS,
    A.core_sys_kbn AS HOST_FLG,
    A.rcv_form_output_kbn AS PRINT_FLG,
    A.upd_kbn AS CHANGE_KBN,
    A.tel_no AS TEL_NO,
    A.mail_adr AS EMAIL,
    A.site_kbn AS SITE_KBN,
    A.route_dtl_kbn AS ODRROUTEDTLKBN,
    A.login_cd AS NETMEMBER_ID,
    A.credit_card_no AS CC_NO,
    A.avail_term AS CC_TERM,
    A.credit_card_name AS CC_NAME,
    A.hist_seq AS REGIST_HISTORY_ID,
    A.mbr_cd AS KAIIN_ID,
    A.mbr_pwd AS KAIIN_PASS,
    A.chng_order_dt AS CHNG_ORDER_DT,
    A.chng_card_no AS CHNG_HIST_CC_NO,
    A.chng_avail_term AS CHNG_HIST_CC_TERM,
    A.chng_card_name AS CHNG_HIST_CC_NAME,
    A.chng_hist_seq AS CHNG_HIST_REGIST_HISTORY_ID,
    A.chng_mbr_cd AS CHNG_HIST_KAIIN_ID,
    A.chng_mbr_pwd AS CHNG_HIST_KAIIN_PASS,
    A.trade_cd AS ACCESS_ID,
    A.trade_pwd AS ACCESS_PASS,
    A.order_cd AS ORDER_ID,
    A.e_pay_account_cd AS EPAYMENT_ID,
    B.cosme_flag AS COSME_FLAG,
    B.herb_flag AS HERB_FLAG 
FROM
    ( 
        SELECT
            od.odr_seq,
            od.acpt_dt_tm,
            od.cust_no,
            nm.cust_name,
            ij.net_ju_cd,
            od.mbr_kbn,
            od.gift_flg,
            rb.regular_buy_odr_seq,
            odd.item_kbn,
            ac.odr_kbn,
            ij.net_ju_rsn,
            od.odr_stat_kbn,
            od.core_sys_kbn,
            od.rcv_form_output_kbn,
            odu.upd_kbn,
            od.tel_no,
            nm.mail_adr,
            od.site_kbn,
            od.route_dtl_kbn,
            od.login_cd,
            od.credit_card_no,
            od.avail_term,
            rb.credit_card_name,
            ac.hist_seq,
            ac.mbr_cd,
            ac.mbr_pwd,
            odu.acpt_dt_tm AS chng_order_dt,
            odu.credit_card_no AS chng_card_no,
            odu.avail_term AS chng_avail_term,
            odu.credit_card_name AS chng_card_name,
            ci.hist_seq AS chng_hist_seq,
            ci.mbr_cd AS chng_mbr_cd,
            ci.mbr_pwd AS chng_mbr_pwd,
            pay.trade_cd,
            pay.trade_pwd,
            pay.order_cd,
            pay.e_pay_account_cd 
        FROM
            f_odr od 
            INNER JOIN m_net_mbr nm 
                ON od.cust_no = nm.cust_no 
            LEFT JOIN m_net_ju_rsn ij 
                ON od.pend_cd = ij.net_ju_cd 
            LEFT JOIN h_approval_card_input ac 
                ON od.odr_seq = ac.odr_no 
            LEFT JOIN h_card_input ci 
                ON od.odr_seq = ci.odr_seq 
            LEFT JOIN odr_d odd 
                ON od.odr_seq = odd.odr_seq 
            LEFT JOIN m_item i 
                ON odd.item_cd = i.item_cd 
            LEFT JOIN f_odr_upd odu 
                ON od.odr_seq = odu.odr_cd 
            LEFT JOIN h_e_pay_authori pay 
                ON od.odr_seq = pay.odr_no 
            LEFT JOIN f_regular_buy_odr_info_record rb 
                ON od.cust_no = rb.cust_no 
            LEFT JOIN f_regular_buy_odr_info_dtl_record rbd 
                ON rb.regular_buy_odr_seq = rbd.regular_buy_odr_seq 
            LEFT JOIN m_offline_data of 
                ON rb.cust_no = of.cust_no 
            LEFT JOIN f_odr_direct oddi 
                ON od.odr_seq = oddi.odr_seq
		ORDER BY od.acpt_dt_tm DESC
    ) AS A 
    LEFT JOIN ( 
        SELECT
            base.odr_seq
            , coalesce(ad1.cosme_flag, 0) cosme_flag
            , coalesce(ad2.herb_flag, 0) herb_flag 
        FROM
            ( 
                SELECT
                    odr_d.odr_seq 
                FROM
                    odr_d 
                GROUP BY
                    odr_d.odr_seq
            ) AS base 
            LEFT JOIN ( 
                SELECT
                    dd.odr_seq
                    , 1 AS cosme_flag 
                FROM
                    odr_d AS dd 
                    INNER JOIN m_item AS mm 
                        ON dd.item_cd = mm.item_cd 
                        AND mm.ope_kbn = '1' 
                GROUP BY
                    dd.odr_seq
            ) AS ad1 
                ON base.odr_seq = ad1.odr_seq 
            LEFT JOIN ( 
                SELECT
                    dd.odr_seq
                    , 1 AS herb_flag 
                FROM
                    odr_d AS dd 
                    inner join m_item AS mm 
                        ON dd.item_cd = mm.item_cd 
                        AND mm.ope_kbn = '2' 
                GROUP BY
                    dd.odr_seq
            ) AS ad2 
                ON base.odr_seq = ad2.odr_seq
		ORDER BY base.odr_seq DESC
    ) AS B 
        ON A.odr_seq = B.odr_seq
		ORDER BY A.acpt_dt_tm DESC
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
            , a.tel_no AS tel_no
            , a.netmember_id
            , to_char(a.order_dt, 'YYYY/MM/DD HH24:MI:SS') AS order_dt
            , b.kain_name AS kain_name
            , decode(a.site_kbn, 1, b.email, b.m_email) AS email
            , a.host_flg
            , a.print_flg
            , a.order_status
            , a.session_id
            , a.NET_IJ_CD
            , c.NET_IJ_INFO
            , a.RESERVE_KBN
            , a.GIFT_FLG
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



$sql  = "SELECT ";
$sql  = " ";
$sql  = "A.odr_seq AS RECV_ORDER_ID, ";
$sql  = "A.acpt_dt_tm AS ORDER_DT, ";
$sql  = "A.cust_no AS KAINNO,";
$sql  = "A.cust_name AS KAIN_NAME, ";
$sql  = "A.net_ij_cd AS NET_IJ_CD, ";
$sql  = "A.mbr_kbn AS KAIN_KBN, ";
$sql  = "A.gift_flg AS GIFT_FLG, ";
$sql  = "A.regular_buy_odr_seq AS REGULAR_ORDER_ID, ";
$sql  = "A.item_kbn AS SHOHIN_TYPE, ";
$sql  = "A.odr_kbn AS ORDER_KBN, ";
$sql  = "A.net_ij_rsn AS NET_IJ_INFO, ";
$sql  = "A.odr_stat_kbn AS ORDER_STATUS, ";
$sql  = "A.host_kbn AS HOST_FLG, ";
$sql  = "A.rcv_form_output_kbn AS PRINT_FLG, ";
$sql  = "A.upd_kbn AS CHANGE_KBN, ";
$sql  = "A.tel_no AS TEL_NO, ";
$sql  = "A.mail_adr AS EMAIL, ";  
$sql  = "A.site_kbn AS SITE_KBN, ";  
$sql  = "A.route_dtl_kbn AS ODRROUTEDTLKBN, ";  
$sql  = "A.login_cd AS NETMEMBER_ID, ";  
$sql  = "A.credit_card_no AS CC_NO, ";  
$sql  = "A.avail_term AS CC_TERM, ";  
$sql  = "A.credit_card_name AS CC_NAME, ";
$sql  = "A.hist_seq AS REGIST_HISTORY_ID, ";
$sql  = "A.mbr_cd AS KAIIN_ID, ";  
$sql  = "A.mbr_pwd AS KAIIN_PASS, ";  
$sql  = "A.chng_order_dt AS CHNG_ORDER_DT, ";  
$sql  = "A.chng_card_no AS CHNG_HIST_CC_NO, ";  
$sql  = "A.chng_avail_term AS CHNG_HIST_CC_TERM, ";  
$sql  = "A.chng_card_name AS CHNG_HIST_CC_NAME, ";
$sql  = "A.chng_hist_seq AS CHNG_HIST_REGIST_HISTORY_ID, ";
$sql  = "A.chng_mbr_cd AS CHNG_HIST_KAIIN_ID, ";  
$sql  = "A.chng_mbr_pwd AS CHNG_HIST_KAIIN_PASS, ";  
$sql  = "A.trade_cd AS ACCESS_ID, ";  
$sql  = "A.trade_pwd AS ACCESS_PASS, ";  
$sql  = "A.order_cd AS ORDER_ID, ";  
$sql  = "A.e_pay_account_cd AS EPAYMENT_ID, "; 
$sql  = "B.cosme_flag AS COSME_FLAG, ";  
$sql  = "B.herb_flag AS HERB_FLAG ";  
$sql  = "FROM ";
$sql  = "( ";    
$sql  = "SELECT ";        
$sql  = "od.odr_seq, ";            
$sql  = "od.acpt_dt_tm, ";            
$sql  = "od.cust_no, ";            
$sql  = "nm.cust_name, ";            
$sql  = "ij.net_ij_cd, ";            
$sql  = "od.mbr_kbn, ";            
$sql  = "od.gift_flg, ";            
$sql  = "rb.regular_buy_odr_seq, ";            
$sql  = "odd.item_kbn, ";            
$sql  = "ac.odr_kbn, ";            
$sql  = "ij.net_ij_rsn, ";            
$sql  = "od.odr_stat_kbn, ";            
$sql  = "od.host_kbn, ";            
$sql  = "od.rcv_form_output_kbn, ";            
$sql  = "odu.upd_kbn, ";            
$sql  = "od.tel_no,";            
$sql  = "nm.mail_adr, ";            
$sql  = "od.site_kbn, ";            
$sql  = "od.route_dtl_kbn, ";            
$sql  = "od.login_cd, ";            
$sql  = "od.credit_card_no, ";            
$sql  = "od.avail_term, ";            
$sql  = "rb.credit_card_name, ";
$sql  = "ac.hist_seq, ";             
$sql  = "ac.mbr_cd, ";            
$sql  = "ac.mbr_pwd, ";            
$sql  = "odu.acpt_dt_tm AS chng_order_dt, ";            
$sql  = "odu.credit_card_no AS chng_card_no, ";            
$sql  = "odu.avail_term AS chng_avail_term, ";            
$sql  = "odu.credit_card_name AS chng_card_name, "; 
$sql  = "ci.hist_seq AS chng_hist_seq, ";            
$sql  = "ci.mbr_cd AS chng_mbr_cd, ";            
$sql  = "ci.mbr_pwd AS chng_mbr_pwd, ";            
$sql  = "pay.trade_cd, ";            
$sql  = "pay.trade_pwd, ";            
$sql  = "pay.order_cd, ";            
$sql  = "pay.e_pay_account_cd  ";            
$sql  = "FROM ";        
$sql  = "f_odr od ";             
$sql  = "INNER JOIN m_net_mbr nm ";             
$sql  = "ON od.cust_no = nm.mbr_seq ";                
$sql  = "LEFT JOIN m_net_ij_rsn ij ";            
$sql  = "ON od.pend_cd = ij.net_ij_cd ";                 
$sql  = "LEFT JOIN h_approval_card_input ac ";             
$sql  = "ON od.odr_seq = ac.odr_no ";                 
$sql  = "LEFT JOIN h_card_input ci ";             
$sql  = "ON od.odr_seq = ci.odr_seq ";                 
$sql  = "LEFT JOIN odr_d odd ";             
$sql  = "ON od.odr_seq = odd.odr_seq ";                 
$sql  = "LEFT JOIN m_item i ";             
$sql  = "ON odd.item_cd = i.item_cd ";                 
$sql  = "LEFT JOIN f_odr_upd odu ";             
$sql  = "ON od.odr_seq = odu.odr_cd ";                 
$sql  = "LEFT JOIN h_e_pay_authori pay ";            
$sql  = "ON od.odr_seq = pay.odr_no ";                 
$sql  = "LEFT JOIN f_regular_buy_odr_info_record rb ";             
$sql  = "ON od.cust_no = rb.cust_no ";                 
$sql  = "LEFT JOIN f_regular_buy_odr_info_dtl_record rbd ";             
$sql  = "ON rb.regular_buy_odr_seq = rbd.regular_buy_odr_seq ";                 
$sql  = "LEFT JOIN m_offline_data of ";             
$sql  = "ON rb.cust_no = of.cust_no ";                 
$sql  = "LEFT JOIN f_odr_direct oddi ";             
$sql  = "ON od.odr_seq = oddi.odr_seq ";                
$sql  = "ORDER BY od.acpt_dt_tm DESC ";
$sql  = ") AS A ";
$sql  = "LEFT JOIN ( ";
$sql  = "SELECT ";
$sql  = "base.odr_seq ";
$sql  = ", coalesce(ad1.cosme_flag, 0) cosme_flag ";
$sql  = ", coalesce(ad2.herb_flag, 0) herb_flag ";
$sql  = "FROM ";
$sql  = "( ";
$sql  = "SELECT ";
$sql  = "odr_d.odr_seq ";
$sql  = "FROM ";
$sql  = "odr_d ";
$sql  = "GROUP BY ";
$sql  = "odr_d.odr_seq ";
$sql  = ") AS base ";
$sql  = "LEFT JOIN ( ";
$sql  = "SELECT ";
$sql  = "dd.odr_seq ";
$sql  = ", 1 AS cosme_flag ";
$sql  = "FROM ";
$sql  = "odr_d AS dd ";
$sql  = "INNER JOIN m_item AS mm ";
$sql  = "ON dd.item_cd = mm.item_cd ";
$sql  = "AND mm.ope_kbn = '1' ";
$sql  = "GROUP BY ";
$sql  = "dd.odr_seq ";
$sql  = ") AS ad1 ";
$sql  = "ON base.odr_seq = ad1.odr_seq ";
$sql  = "LEFT JOIN ( ";
$sql  = "SELECT ";
$sql  = "dd.odr_seq ";
$sql  = ", 1 AS herb_flag ";
$sql  = "FROM ";
$sql  = "odr_d AS dd ";
$sql  = "inner join m_item AS mm ";
$sql  = "ON dd.item_cd = mm.item_cd ";
$sql  = "AND mm.ope_kbn = '2' ";
$sql  = "GROUP BY ";
$sql  = "dd.odr_seq ";
$sql  = ") AS ad2 ";
$sql  = "ON base.odr_seq = ad2.odr_seq ";
$sql  = "ORDER BY base.odr_seq DESC ";
$sql  = ") AS B ";
$sql  = "ON A.odr_seq = B.odr_seq ";
$sql .= $where;
$sql  = "ORDER BY A.acpt_dt_tm DESC ";

SELECT 
RECV_ORDER_ID,
SITE_KBN,
KAINNO,
STFUNC_SSK_DEC(TEL_NO),
NETMEMBER_ID,
ORDER_DT,
ORDER_TIME,
POINT,
OPOINT,
UPOINT,
PAYMENT_TYPE,
PAYMENT_NUM,
CC_TYPE,
STFUNC_SSK_DEC(CC_NO),
STFUNC_SSK_DEC(CC_NAME),
BONUS_KBN,
BONUSMONTH,
CC_TERM,
RECOGNITION_NO,
CC_REGIST_KBN,
SHIP_DT,
DELIVERY_DT,
DELIVERY_TIME_TYPE,
SHIP_CAUTION_CD1,
SHIP_CAUTION_CD2,
SHIP_CAUTION_CD3,
SHIP_CAUTION_CD4,
SHIP_CAUTION_CD5,
ENCLOSURE_CD1,
ENCLOSURE_CD2,
ENCLOSURE_CD3,
ENCLOSURE_CD4,
ENCLOSURE_CD5,
ENCLOSURE_CD6,
ENCLOSURE_CD7,
ENCLOSURE_CD8,
ENCLOSURE_CD9,
ENCLOSURE_CD10,
DELIVERY_REQUEST,
ANOTHER_ADDR_TYPE,
STFUNC_SSK_DEC(ANOTHER_ADDR),
STFUNC_SSK_DEC(ANOTHER_ADDR_NOT_CONV),
STFUNC_SSK_DEC(ANOTHER_TELNO),
STFUNC_SSK_DEC(ANOTHER_POST_NO),
DELIVERY_REGIST_KBN,
ECONORDER_ID,
ECONBARCODE,
ECONSHOPID,
ECONKANJINAME,
ECONRECVSTART_DT,
ECONRECVEND_DT,
ORDER_STATUS,
DELETE_FLG,
HOST_FLG,
HOST_SEND_DT,
SYNC_FLG,
PRINT_FLG,
STATUS,
MAIL_FLG,
COMMUNICATOR,
MAIL_SEND_DT,
CTRL_NO,
SESSION_ID,
UPDATE_DT,
REGIST_DT,
UPDATE_USER,
REGIST_USER,
POINT2BAI_FLG,
MAILTEIKEI_FLG,
NET_IJ_CD,
MODAL_FLG,
CC_AUTH_NUM,
COUNTRY_CD,
STFUNC_SSK_DEC(COUNTRY_ADDRESSEE),
POSTCD_FOREIGN,
STFUNC_SSK_DEC(ADRS_FOREIGN1),
STFUNC_SSK_DEC(ADRS_FOREIGN2),
STFUNC_SSK_DEC(ADRS_FOREIGN3),
STFUNC_SSK_DEC(TEL_NO_FOREIGN),
RESERVE_KBN,
GIFT_FLG,
IKUSEI_COMMENT,
STFUNC_SSK_DEC(CC_SCD),
TOTAL_ORDER_AMOUNT,
TOTAL_ORDER_TAXRATE,
REDUCTION_KBN,
REDUCTION_AMOUNT,
REDUCTION_AMOUNT_TAXRATE,
USED_DEPOSIT,
CARRYOVER_AMOUNT,
MEMBER_ID,
KAIN_KBN,
ODRROUTEDTLKBN,
APPROVAL_CARD_INFOMATION,
REGULARORDER_FLG,
DELIVERY_INTERVAL_TYPE,
NEXT_DELIVERY_DT,
NEXT_DELIVERY_WEEK,
NEXT_DELIVERY_DAY
FROM SSKADMINUSER.RECVORDER_TBL

SELECT
REGIST_HISTORY_ID,
ORDER_KBN,
ORDER_ID,
CLR_CORP_CD,
TRANSACTION_ID,
to_number(STFUNC_SSK_DEC(KAIIN_ID)),
STFUNC_SSK_DEC(KAIIN_PASS),
FORWARD,
CARD_SEQ,
MESSAGE_CD,
MESSAGE_NUM,
ERR_CD,
ERR_DTL_CD,
UPDATE_DT,
UPDATE_USER,
REGIST_DT,
REGIST_USER
FROM SSKADMINUSER.CARDREGISTHISTORY_TBL

SELECT
MEMBER_ID,
KAINNO,
STFUNC_SSK_DEC(TEL_NO),
NETMEMBER_ID,
STFUNC_SSK_DEC(NETMEMBER_PW),
STFUNC_SSK_DEC(KAIN_NAME),
STFUNC_SSK_DEC(EMAIL),
MAIL_FLG,
HNDL_NAME,
DMMAIL_FLG,
DELETE_FLG,
MAILSTYLE_FLG,
MAILADDRESSERROR_FLG,
CARRIER,
DEVICE_NAME,
DEVICE_SHOW_NAME,
STFUNC_SSK_DEC(M_EMAIL),
M_MAIL_FLG,
M_DMMAIL_FLG,
M_MAILADDRESSERROR_FLG,
DISP_TYPE,
SYNC_FLG,
SYSTEM_STATUS_FLG,
TEMP_PASSWORD_FLG,
PASSWORD_FAIL_COUNT,
M_PASSWORD_FAIL_COUNT,
TAIOUMEMO,
UPDATE_DT,
REGIST_DT,
UPDATE_USER,
REGIST_USER,
AGREE_FLG,
M_AGREE_FLG,
AUTO_LOGIN_DT,
MOBILE_ID,
SEC_AUTH_FAIL_COUNT,
SEC_AUTH_FAIL_COUNT_UPDATE_DT,
KAIN_KBN
FROM SSKADMINUSER.MEMBER_TBL

SELECT
ORDER_CHANGE_ID,
RECV_CHANGE_ID,
CHANGE_KBN,
SITE_KBN,
KAINNO,
MEMBER_ID,
KAIN_KBN,
STFUNC_SSK_DEC(TEL_NO),
ORDER_DT,
ORDER_TIME,
SHIP_DT,
ODRROUTEDTLKBN,
TOTAL_ORDER_AMOUNT,
TOTAL_ORDER_TAXRATE,
POINT,
OPOINT,
UPOINT,
POINT2BAI_FLG,
ANOTHER_ADDR_TYPE,
ANOTHER_POST_NO,
STFUNC_SSK_DEC(ANOTHER_ADDR),
STFUNC_SSK_DEC(ANOTHER_ADDR_NOT_CONV),
STFUNC_SSK_DEC(ANOTHER_TELNO),
DELIVERY_REGIST_KBN,
DELIVERY_DT,
DELIVERY_TIME_TYPE,
SHIP_CAUTION_CD1,
SHIP_CAUTION_CD2,
SHIP_CAUTION_CD3,
SHIP_CAUTION_CD4,
SHIP_CAUTION_CD5,
DELIVERY_REQUEST,
PAYMENT_TYPE,
PAYMENT_NUM,
CC_TYPE,
STFUNC_SSK_DEC(CC_NO),
STFUNC_SSK_DEC(CC_NAME),
CC_TERM,
CC_SCD,
BONUS_KBN,
BONUSMONTH,
CC_REGIST_KBN,
RECOGNITION_NO,
APPROVAL_CARD_INFOMATION,
ENCLOSURE_CD1,
ENCLOSURE_CD2,
ENCLOSURE_CD3,
ENCLOSURE_CD4,
ENCLOSURE_CD5,
ENCLOSURE_CD6,
ENCLOSURE_CD7,
ENCLOSURE_CD8,
ENCLOSURE_CD9,
ENCLOSURE_CD10,
IKUSEI_COMMENT,
RESERVE_KBN,
GIFT_FLG,
NET_IJ_CD,
ORDER_STATUS,
DELETE_FLG,
HOST_FLG,
HOST_SEND_DT,
SYNC_FLG,
PRINT_FLG,
MAILTEIKEI_FLG,
STATUS,
MAIL_FLG,
COMMUNICATOR,
MAIL_SEND_DT,
CTRL_NO,
SESSION_ID,
UPDATE_DT,
REGIST_DT,
UPDATE_USER,
REGIST_USER,
INDIVNAMESENDER_FLG,
INDIVNAMESENDER_NAME
FROM SSKADMINUSER.ORDERCHANGE_TBL

SELECT
REGULAR_ORDER_ID,
SITE_KBN,
KAINNO,
STFUNC_SSK_DEC(TEL_NO),
NETMEMBER_ID,
ORDER_DT,
ORDER_TIME,
POINT,
OPOINT,
UPOINT,
PAYMENT_TYPE,
PAYMENT_NUM,
CC_TYPE,
CC_NO,
CC_NAME,
CC_TERM,
RECOGNITION_NO,
CC_REGIST_KBN,
SHIP_DT,
DELIVERY_DT,
DELIVERY_TIME_TYPE,
SHIP_CAUTION_CD1,
SHIP_CAUTION_CD3,
SHIP_CAUTION_CD4,
SHIP_CAUTION_CD5,
DELIVERY_REQUEST,
ANOTHER_ADDR_TYPE,
ORDER_STATUS,
DELETE_FLG,
HOST_FLG,
HOST_SEND_DT,
SYNC_FLG,
PRINT_FLG,
STATUS,
MAIL_FLG,
COMMUNICATOR,
MAIL_SEND_DT,
CTRL_NO,
SESSION_ID,
UPDATE_DT,
REGIST_DT,
UPDATE_USER,
REGIST_USER,
POINT2BAI_FLG,
MAILTEIKEI_FLG,
NET_IJ_CD,
CC_AUTH_NUM,
CC_SCD,
TOTAL_ORDER_AMOUNT,
TOTAL_ORDER_TAXRATE,
USED_DEPOSIT,
CARRYOVER_AMOUNT,
NEXT_DELIVERY_DT,
NEXT_DELIVERY_WEEK,
NEXT_DELIVERY_DAY,
ROUTE_DETAILS_KBN,
KAIN_KBN
FROM SSKADMINUSER.REGULARORDER_TBL




SELECT
REGIST_HISTORY_ID,
ORDER_KBN,
ORDER_ID,
CLR_CORP_CD,
TRANSACTION_ID,
KAIIN_ID,
KAIIN_PASS,
FORWARD,
CARD_SEQ,
MESSAGE_CD,
MESSAGE_NUM,
ERR_CD,
ERR_DTL_CD,
UPDATE_DT,
UPDATE_USER,
REGIST_DT,
REGIST_USER
FROM SSKADMINUSER.CARDAPPROVALREGISTHISTORY_TBL

SELECT
RECV_ORDER_ID,
SITE_KBN,
KAINNO,
SHIP_CAUTION_CD1,
SHIP_CAUTION_CD2,
MSG_NEED_FLG,
MSG_TO_NAME,
MSG_TEXT,
MSG_FROM_NAME,
DELIVERY_KBN,
DELIVERY_DT,
DELIVERY_TIME_TYPE,
NAME_KANJI,
STFUNC_SSK_DEC(NAME_KANA),
ANOTHER_POST_NO,
STFUNC_SSK_DEC(ANOTHER_ADDR_KANA),
ANOTHER_ADDR,
STFUNC_SSK_DEC(ANOTHER_ADDR_NOT_CONV_KANA),
STFUNC_SSK_DEC(ANOTHER_ADDR_NOT_CONV),
STFUNC_SSK_DEC(ANOTHER_TELNO),
GIFT_SENDER_NAME,
DW_USED_KBN,
REGIST_AGREEMENT_FLG,
SESSION_ID,
DELETE_FLG,
UPDATE_DT,
REGIST_DT,
UPDATE_USER,
REGIST_USER
FROM SSKADMINUSER.GIFTORDER_TBL

SELECT
EPAYMENTHISTORY_ID,
ORDER_KBN,
RECV_ORDER_ID,
CLR_CORP_CD,
TRAN_DATE,
STFUNC_SSK_DEC(ACCESS_ID),
STFUNC_SSK_DEC(ACCESS_PASS),
ORDER_ID,
STFUNC_SSK_DEC(EPAYMENT_ID),
UPDATE_DT,
UPDATE_USER,
REGIST_DT,
REGIST_USER
FROM SSKADMINUSER.EPAYMENTHISTORY_TBL

SELECT
MEMBER_ID,
KAINNO,
TEL_NO,
NETMEMBER_ID,
REGIST_KBN,
ERROR_CD,
NAMEKANA,
NAMEKANJI,
H_POST_NO,
H_KANA_ADDRESS,
H_KNJ_ADDRESS,
H_NOT_CONV,
KENCD,
B_ADDRESS_KBN,
B_KNJ_ADDRESS,
B_NOT_CONV,
B_TEL_NO,
B_POST_NO,
GENDER,
NAMEOFERA,
BIRTHDAY,
FAX_NO,
ORDER_INVALID_FLG,
ORDER_INVALID_REASON,
LAST_PURCHACE_DAY1,
LAST_PURCHACE_DAY2,
LAST_PURCHACE_DAY3,
LAST_PURCHACE_DAY4,
LAST_PURCHACE_DAY5,
FIRST_PURCHACE_DAY1,
FIRST_PURCHACE_DAY2,
FIRST_PURCHACE_DAY3,
FIRST_PURCHACE_DAY4,
FIRST_PURCHACE_DAY5,
KOUNYU_NUM,
HARBS_KOUNYU_SU,
TODAY_BUY_FLG,
TODAY_BUY_KIND,
ZAN_POINT,
POINT_YMD,
CC_COMP,
CC_NO,
CC_NAME,
CC_RIMIT,
KOUZA_KBN,
CAMP_SET4_FLG,
CAMP_SET4_NOTICE_CD,
PURCHACE4_AMOUNT,
CAMP_SET3_FLG,
CAMP_SET3_NOTICE_CD,
PURCHACE3_AMOUNT,
CAMP_SET7_FLG,
CAMP_SET7_NOTICE_CD,
PURCHACE7_AMOUNT,
PURCHACE7_AMOUNT1,
PURCHACE7_AMOUNT2,
PURCHACE7_AMOUNT3,
PURCHACE7_AMOUNT4,
PURCHACE7_AMOUNT5,
PURCHACE7_AMOUNT6,
PURCHACE7_AMOUNT7,
YEAREND_PRESENT_FLG,
CAMP_A_FLG,
CAMP_A_NOTICE_CD,
CAMP_B_FLG,
CAMP_B_NOTICE_CD,
CAMP_C_FLG,
CAMP_C_NOTICE_CD,
CAMP_D_FLG,
CAMP_D_NOTICE_CD,
CAMP_E_FLG,
CAMP_E_NOTICE_CD,
CAMP_AMOUNT1,
CAMP_AMOUNT2,
CAMP_AMOUNT3,
CAMP_AMOUNT4,
MORETABI_STATUS,
MORETABI_APPLY_DATE,
MORETABI_CHANNEL,
PAYLIMIT_FLG,
PAYEXCESS_FLG,
VISADEBIT_FLG,
LAST_LOGIN_DT,
UPDATE_DT,
REGIST_DT,
UPDATE_USER,
REGIST_USER,
PURCHACE4_2_NUM1,
PURCHACE4_2_NUM2,
PURCHACE4_2_NUM3,
PURCHACE4_2_NUM4,
DW_HALF_FLG,
DRESS_FLG,
DRESSDIRECT_FLG,
DM_FLG,
DM_UPDATE_DT,
MODAL_FLG,
COUNTRY_CD,
COUNTRY_ADDRESSEE,
POSTCD_FOREIGN,
ADRS_FOREIGN1,
ADRS_FOREIGN2,
ADRS_FOREIGN3,
TEL_NO_FOREIGN,
DRINKDIRECT_FLG,
SMP_RETURN_TYPE,
DEPOSIT,
ODRROUTEDTLKBN,
PURCHASE_NUM_COSME,
SETTLEMENT_AGENT_CD,
SETTLEMENT_USER_ID,
SETTLEMENT_USER_PASSWORD,
SETTLEMENT_CARD_REGIST_NO,
SETTLEMENT_CARD_REGIST_MODE,
CHOHAKU_TEIKI_STATUS,
PURCHASE_NUM_YOJO5,
AMAZON_BILLING_AGREEMENT_ID,
INDIVNAMESENDER_FLG,
INDIVNAMESENDER_NAME
FROM SSKADMINUSER.WEBPROFILE_TBL


SELECT 
PA.g_tot_seq AS PROMO_ACC_ID,
PA.user_cd AS PROMO_ACC_USER_ID,
PA.net_mbr_cd AS NETMEMBER_ID,
PA.cust_no AS KAINNO,
TO_CHAR(PA.visit_dt_tm,'YYYY/MM/DD') AS VISIT_DATE,
TO_CHAR(PA.visit_dt_tm,'HH24:MI:SS') AS VISIT_TIME,
PA.session_id AS SESSION_ID,
PA.referrer AS REFERER,
PA.user_agent AS USER_AGENT,
PA.user_agent_kbn AS USER_AGENT_KBN,
PA.visit_cnt AS VISIT_CNT,
TO_CHAR(PA.bill_start_dt_tm,'YYYY/MM/DD') AS REQUEST_START_DATE,
TO_CHAR(PA.bill_start_dt_tm,'HH24:MI:SS') AS REQUEST_START_TIME,
TO_CHAR(PA.bill_fin_dt_tm,'YYYY/MM/DD') AS REQUEST_COMPLETE_DATE,
TO_CHAR(PA.bill_fin_dt_tm,'HH24:MI:SS') AS REQUEST_COMPLETE_TIME,
PA.bill_kbn AS REQUEST_KBN,
PA.media_cd AS BAITAI_CD,
PA.key_cd AS KEY_CD,
PA.promotion_cd AS PID,
PA.entry_trigger_cd AS KIKKAKE_BAITAI_CD,
PA.entry_trigger_name AS KIKKAKE_BAITAI_NAME,
PA.update_date AS UPDATE_DT,
PA.register_date AS REGIST_DT,
PA.update_user_cd AS UPDATE_USER,
PA.register_user_cd AS REGIST_USER,
PAP.buy_amnt AS TOTAL_ORDER_AMOUNT,
PAP.buy_item AS ORDER_ITEM_STRING
FROM f_front_media_g_tot PA
LEFT JOIN c_front_media_g_tot_buy_item PAP 
ON  PA.g_tot_seq = PAP.g_tot_cd
WHERE ()
ORDER BY PA.visit_dt_tm, PA.register_date


SELECT 
PA.PROMO_ACC_ID,
PA.PROMO_ACC_USER_ID,
PA.NETMEMBER_ID,
PA.KAINNO,
TO_CHAR(PA.VISIT_DT,'YYYY/MM/DD') AS VISIT_DATE,
TO_CHAR(PA.VISIT_DT,'HH24:MI:SS') AS VISIT_TIME,
PA.SESSION_ID,
PA.REFERER,
PA.USER_AGENT,
PA.USER_AGENT_KBN,
PA.VISIT_CNT,
TO_CHAR(PA.REQUEST_START_DT,'YYYY/MM/DD') AS REQUEST_START_DATE,
TO_CHAR(PA.REQUEST_START_DT,'HH24:MI:SS') AS REQUEST_START_TIME,
TO_CHAR(PA.REQUEST_COMPLETE_DT,'YYYY/MM/DD') AS REQUEST_COMPLETE_DATE,
TO_CHAR(PA.REQUEST_COMPLETE_DT,'HH24:MI:SS') AS REQUEST_COMPLETE_TIME,
PA.REQUEST_KBN,
PA.BAITAI_CD,
PA.KEY_CD,
PA.PID,
PA.KIKKAKE_BAITAI_CD,
PA.KIKKAKE_BAITAI_NAME,
PA.UPDATE_DT,
PA.REGIST_DT,
PA.UPDATE_USER,
PA.REGIST_USER,
PAP.TOTAL_ORDER_AMOUNT,
PAP.ORDER_ITEM_STRING
FROM PROMOACCUMLATE_TBL PA
LEFT JOIN PROMOACCUMLATEPURCHASE_TBL PAP 
ON  PA.PROMO_ACC_ID = PAP.PROMO_ACC_ID


SELECT 
EPAYMENTHISTORY_ID,
ORDER_KBN,
RECV_ORDER_ID,
CLR_CORP_CD,
TRAN_DATE,
ACCESS_ID,
ACCESS_PASS,
ORDER_ID,
EPAYMENT_ID,
UPDATE_DT,
UPDATE_USER,
REGIST_DT,
REGIST_USER
FROM SSKADMINUSER.EPAYMENTHISTORY_TBL

$sql  = " SELECT";
    $sql .= " A.odr_seq AS ORDER_SEQ,";
    $sql .= " A.acpt_dt_tm AS ORDER_DT,";
    $sql .= " A.cust_no AS KAINNO,";
    $sql .= " A.cust_name AS KAIN_NAME,";
    $sql .= " A.net_ju_cd AS NET_IJ_CD,";
    $sql .= " A.mbr_kbn AS KAIN_KBN,";
    $sql .= " A.gift_flg AS GIFT_FLG,";
    $sql .= " A.regular_buy_odr_seq AS REGULAR_ORDER_ID,";
    $sql .= " A.item_kbn AS SHOHIN_TYPE,";
    $sql .= " A.odr_kbn AS ORDER_KBN,";
    $sql .= " A.net_ju_rsn AS NET_IJ_INFO,";
    $sql .= " A.odr_stat_kbn AS ORDER_STATUS,";
    $sql .= " A.core_sys_kbn AS HOST_FLG,";
    $sql .= " A.rcv_form_output_kbn AS PRINT_FLG,";
    $sql .= " A.upd_kbn AS CHANGE_KBN,";
    $sql .= " A.tel_no AS TEL_NO,";
    $sql .= " A.mail_adr AS EMAIL,";
    $sql .= " A.site_kbn AS SITE_KBN,";
    $sql .= " A.route_dtl_kbn AS ODRROUTEDTLKBN,";
    $sql .= " A.login_cd AS NETMEMBER_ID,";
    $sql .= " A.credit_card_no AS CC_NO,";
    $sql .= " A.avail_term AS CC_TERM,";
    $sql .= " A.credit_card_name AS CC_NAME,";
    $sql .= " A.hist_seq AS REGIST_HISTORY_ID,";
    $sql .= " A.mbr_cd AS KAIIN_ID,";
    $sql .= " A.mbr_pwd AS KAIIN_PASS,";
    $sql .= " A.chng_order_dt AS CHNG_ORDER_DT,";
    $sql .= " A.chng_card_no AS CHNG_HIST_CC_NO,";
    $sql .= " A.chng_avail_term AS CHNG_HIST_CC_TERM,";
    $sql .= " A.chng_card_name AS CHNG_HIST_CC_NAME,";
    $sql .= " A.chng_hist_seq AS CHNG_HIST_REGIST_HISTORY_ID,";
    $sql .= " A.chng_mbr_cd AS CHNG_HIST_KAIIN_ID,";
    $sql .= " A.chng_mbr_pwd AS CHNG_HIST_KAIIN_PASS,";
    $sql .= " A.trade_cd AS ACCESS_ID,";
    $sql .= " A.trade_pwd AS ACCESS_PASS,";
    $sql .= " A.order_cd AS ORDER_ID,";
    $sql .= " A.e_pay_account_cd AS EPAYMENT_ID,";
    $sql .= " A.del_flg AS DELETE_FLAG,";
    $sql .= " B.cosme_flag AS COSME_FLAG,";
    $sql .= " B.herb_flag AS HERB_FLAG ";
$sql .= " FROM";
    $sql .= " ( ";
        $sql .= " SELECT";
            $sql .= " od.odr_seq,";
            $sql .= " od.acpt_dt_tm,";
            $sql .= " od.cust_no,";
            $sql .= " nm.cust_name,";
            $sql .= " ij.net_ju_cd,";
            $sql .= " od.mbr_kbn,";
            $sql .= " od.gift_flg,";
            $sql .= " rb.regular_buy_odr_seq,";
            $sql .= " odd.item_kbn,";
            $sql .= " ac.odr_kbn,";
            $sql .= " ij.net_ju_rsn,";
            $sql .= " od.odr_stat_kbn,";
            $sql .= " od.core_sys_kbn,";
            $sql .= " od.rcv_form_output_kbn,";
            $sql .= " odu.upd_kbn,";
            $sql .= " od.tel_no,";
            $sql .= " od.del_flg,";
            $sql .= " nm.mail_adr,";
            $sql .= " od.site_kbn,";
            $sql .= " od.route_dtl_kbn,";
            $sql .= " od.login_cd,";
            $sql .= " od.credit_card_no,";
            $sql .= " od.avail_term,";
            $sql .= " rb.credit_card_name,";
            $sql .= " ac.hist_seq,";
            $sql .= " ac.mbr_cd,";
            $sql .= " ac.mbr_pwd,";
            $sql .= " odu.acpt_dt_tm AS chng_order_dt,";
            $sql .= " odu.credit_card_no AS chng_card_no,";
            $sql .= " odu.avail_term AS chng_avail_term,";
            $sql .= " odu.credit_card_name AS chng_card_name,";
            $sql .= " ci.hist_seq AS chng_hist_seq,";
            $sql .= " ci.mbr_cd AS chng_mbr_cd,";
            $sql .= " ci.mbr_pwd AS chng_mbr_pwd,";
            $sql .= " pay.trade_cd,";
            $sql .= " pay.trade_pwd,";
            $sql .= " pay.order_cd,";
            $sql .= " pay.e_pay_account_cd ";
        $sql .= " FROM";
            $sql .= " f_odr od ";
            $sql .= " INNER JOIN m_net_mbr nm ";
                $sql .= " ON od.cust_no = nm.cust_no ";
            $sql .= " LEFT JOIN m_net_ju_rsn ij ";
                $sql .= " ON od.pend_cd = ij.net_ju_cd ";
            $sql .= " LEFT JOIN h_approval_card_input ac ";
                $sql .= " ON od.odr_seq = ac.odr_no ";
            $sql .= " LEFT JOIN h_card_input ci ";
                $sql .= " ON od.odr_seq = ci.odr_seq ";
            $sql .= " LEFT JOIN odr_d odd ";
                $sql .= " ON od.odr_seq = odd.odr_seq ";
            $sql .= " LEFT JOIN m_item i ";
                $sql .= " ON odd.item_cd = i.item_cd ";
            $sql .= " LEFT JOIN f_odr_upd odu ";
                $sql .= " ON od.odr_seq = odu.odr_cd ";
            $sql .= " LEFT JOIN h_e_pay_authori pay ";
                $sql .= " ON od.odr_seq = pay.odr_no ";
            $sql .= " LEFT JOIN f_regular_buy_odr_info_record rb ";
                $sql .= " ON od.cust_no = rb.cust_no ";
            $sql .= " LEFT JOIN f_regular_buy_odr_info_dtl_record rbd ";
                $sql .= " ON rb.regular_buy_odr_seq = rbd.regular_buy_odr_seq ";
            $sql .= " LEFT JOIN m_offline_data of ";
                $sql .= " ON rb.cust_no = of.cust_no ";
            $sql .= " LEFT JOIN f_odr_direct oddi ";
                $sql .= " ON od.odr_seq = oddi.odr_seq";
		$sql .= " ORDER BY od.acpt_dt_tm DESC";
    $sql .= " ) AS A ";
    $sql .= " LEFT JOIN ( ";
        $sql .= " SELECT";
            $sql .= " base.odr_seq";
            $sql .= " , coalesce(ad1.cosme_flag, 0) cosme_flag";
            $sql .= " , coalesce(ad2.herb_flag, 0) herb_flag ";
        $sql .= " FROM";
            $sql .= " ( ";
                $sql .= " SELECT";
                    $sql .= " odr_d.odr_seq ";
                $sql .= " FROM";
                    $sql .= " odr_d ";
                $sql .= " GROUP BY";
                    $sql .= " odr_d.odr_seq";
            $sql .= " ) AS base ";
            $sql .= " LEFT JOIN ( ";
                $sql .= " SELECT";
                    $sql .= " dd.odr_seq";
                    $sql .= " , 1 AS cosme_flag ";
                $sql .= " FROM";
                    $sql .= " odr_d AS dd ";
                    $sql .= " INNER JOIN m_item AS mm ";
                        $sql .= " ON dd.item_cd = mm.item_cd ";
                        $sql .= " AND mm.ope_kbn = '1' ";
                $sql .= " GROUP BY";
                    $sql .= " dd.odr_seq";
            $sql .= " ) AS ad1 ";
                $sql .= " ON base.odr_seq = ad1.odr_seq ";
            $sql .= " LEFT JOIN ( ";
                $sql .= " SELECT";
                    $sql .= " dd.odr_seq";
                    $sql .= " , 1 AS herb_flag ";
                $sql .= " FROM";
                    $sql .= " odr_d AS dd ";
                    $sql .= " inner join m_item AS mm ";
                        $sql .= " ON dd.item_cd = mm.item_cd ";
                        $sql .= " AND mm.ope_kbn = '2' ";
                $sql .= " GROUP BY";
                    $sql .= " dd.odr_seq";
            $sql .= " ) AS ad2 ";
                $sql .= " ON base.odr_seq = ad2.odr_seq";
		$sql .= " ORDER BY base.odr_seq DESC";
    $sql .= " ) AS B ";
        $sql .= " ON A.odr_seq = B.odr_seq";
		$sql .= " ORDER BY A.acpt_dt_tm DESC";




SELECT * FROM (
SELECT 
a.recv_order_id, 
a.site_kbn, 
a.kainno, 
stfunc_ssk(a.tel_no) as tel_no, 
a.netmember_id, 
to_char(a.order_dt, 'YYYY/MM/DD HH24:MI:SS') as order_dt, 
stfunc_ssk(b.kain_name) as kain_name, 
decode(a.site_kbn, 1, stfunc_ssk(b.email), stfunc_ssk(b.m_email)) as email, 
a.host_flg, 
a.print_flg, 
a.order_status, 
a.session_id 
a.NET_IJ_CD 
c.NET_IJ_INFO
a.RESERVE_KBN
a.GIFT_FLG
(NVL(a.TOTAL_ORDER_AMOUNT, 0) + NVL(a.TOTAL_ORDER_TAXRATE, 0)) as ORDER_AMOUNT
a.ODRROUTEDTLKBN
 a.PAYMENT_NUM
 h.REGIST_HISTORY_ID
 stfunc_ssk(h.KAIIN_ID) as KAIIN_ID
 stfunc_ssk(h.KAIIN_PASS) as KAIIN_PASS
 h.CLR_CORP_CD
 h.CARD_SEQ
 a.CC_TERM
 stfunc_ssk(a.CC_NO) as CC_NO
 chnghst.REGIST_HISTORY_ID as CHNG_HIST_REGIST_HISTORY_ID
 stfunc_ssk(chnghst.KAIIN_ID)  as CHNG_HIST_KAIIN_ID
 stfunc_ssk(chnghst.KAIIN_PASS) as CHNG_HIST_KAIIN_PASS
 chnghst.CLR_CORP_CD as CHNG_HIST_CLR_CORP_CD
 chnghst.CARD_SEQ  as CHNG_HIST_CARD_SEQ
( 
select change_kbn 
from orderchange_tbl
where 
recv_change_id = ''
) as change_kbn, 
( 
select to_char(order_dt, 'YYYY/MM/DD HH24:MI:SS') as order_dt 
from orderchange_tbl
where 
recv_change_id = ''
) as order_change_dt,
( 
SELECT CONCAT(stfunc_ssk(cc_no),CONCAT(',',CONCAT(stfunc_ssk(cc_name),CONCAT(',',CONCAT(cc_term,CONCAT(',',payment_num))))))
from orderchange_tbl
where 
recv_change_id = ''
) as data_payment 

FROM RecvOrder_Tbl a, Member_Tbl b, net_ij_tbl c
, CARDAPPROVALREGISTHISTORY_TBL h
, CARDREGISTHISTORY_TBL chnghst


WHERE 
a.kainno = b.kainno AND 
a.NET_IJ_CD = c.NET_IJ_CD(+) AND 
to_number(a.RECV_ORDER_ID) = h.ORDER_ID (+) AND 
to_number(a.RECV_ORDER_ID) = chnghst.ORDER_ID (+) AND 
$where
)
 ORDER BY order_dt desc
 
if (count($change_kbn) > 0) {
    $whereChangeKbn[] = 'change_kbn IN ('.implode(', ', $change_kbn).') ';
    $sql = 'select * from ('.$sql.') where change_kbn IN ('.implode(', ', $change_kbn).') ';
}

SELECT
*
FROM
( 
SELECT
od.odr_seq AS RECV_ORDER_ID,
od.acpt_dt_tm AS ORDER_DT,
od.cust_no AS KAINNO,
nm.cust_name AS KAIN_NAME,
ij.net_ju_cd AS NET_IJ_CD,
ij.net_ju_rsn AS NET_IJ_INFO,
od.odr_stat_kbn AS ORDER_STATUS,
od.core_sys_kbn AS HOST_FLG,
od.rcv_form_output_kbn AS PRINT_FLG,
ac.odr_kbn AS ORDER_KBN,
odu.upd_kbn AS CHANGE_KBN,
odd.item_kbn AS SHOHIN_TYPE,
od.tel_no AS TEL_NO,
nm.mail_adr AS EMAIL,
od.mbr_kbn AS KAIN_KBN,
od.login_cd AS NETMEMBER_ID,
od.site_kbn AS SITE_KBN,
od.gift_flg AS GIFT_FLG,
cosme_flag AS COSME_FLAG,
herb_flag AS HERB_FLAG,
rb.regular_buy_odr_seq AS REGULAR_ORDER_ID,
od.credit_card_no AS CC_NO,
od.avail_term AS CC_TERM,
rb.credit_card_name AS CC_NAME,
ac.mbr_cd AS KAIIN_ID,
ac.mbr_pwd AS KAIIN_PASS,
odu.acpt_dt_tm AS CHNG_ORDER_DT,
odu.credit_card_no AS CHNG_HIST_CC_NO,
odu.avail_term AS CHNG_HIST_CC_TERM,
odu.credit_card_name AS CHNG_HIST_CC_NAME,
ci.mbr_cd AS CHNG_HIST_KAIIN_ID,
ci.mbr_pwd AS CHNG_HIST_KAIIN_PASS,
pay.trade_cd AS ACCESS_ID,
pay.trade_pwd AS ACCESS_PASS,
pay.order_cd AS ORDER_ID,
pay.e_pay_account_cd AS EPAYMENT_ID,
od.route_dtl_kbn AS ODRROUTEDTLKBN,
ac.hist_seq AS REGIST_HISTORY_ID,
ci.hist_seq AS CHNG_HIST_REGIST_HISTORY_ID,
pay.hist_seq AS EPAYMENTHISTORY_ID,
pay.credit_corp_kbn AS EPAYCLR_CORP_CD,
od.del_flg AS DELETE_FLAG
--.odr_seq,
--.acpt_dt_tm,
--.cust_no,
--nm.cust_name,
--ij.net_ju_cd,
--od.mbr_kbn,
--od.gift_flg,
--rb.regular_buy_odr_seq,
--odd.item_kbn,
--ac.odr_kbn,
--ij.net_ju_rsn,
--od.odr_stat_kbn,
--od.core_sys_kbn,
--od.rcv_form_output_kbn,
--odu.upd_kbn,
--od.tel_no,
--od.del_flg,
--nm.mail_adr,
--od.site_kbn,
--od.route_dtl_kbn,
--od.login_cd,
--od.credit_card_no,
--od.avail_term,
--rb.credit_card_name,
--ac.hist_seq,
--ac.mbr_cd,
--ac.mbr_pwd,
--odu.acpt_dt_tm AS chng_order_dt,
--odu.credit_card_no AS chng_card_no,
--odu.avail_term AS chng_avail_term,
--odu.credit_card_name AS chng_card_name,
--ci.hist_seq AS chng_hist_seq,
--ci.mbr_cd AS chng_mbr_cd,
--ci.mbr_pwd AS chng_mbr_pwd,
--pay.hist_seq AS pay_hist_seq,
--pay.trade_cd,
--pay.trade_pwd,
--pay.order_cd,
--pay.e_pay_account_cd,
--pay.credit_corp_kbn AS pay_clr_corp_cd 
FROM
f_odr od 
INNER JOIN m_net_mbr nm 
ON od.cust_no = nm.cust_no 
LEFT JOIN m_net_ju_rsn ij 
ON od.pend_cd = ij.net_ju_cd 
LEFT JOIN h_approval_card_input ac 
ON od.odr_seq = ac.odr_no 
LEFT JOIN h_card_input ci 
ON od.odr_seq = ci.odr_seq 
LEFT JOIN odr_d odd 
ON od.odr_seq = odd.odr_seq 
LEFT JOIN m_item i 
ON odd.item_cd = i.item_cd 
LEFT JOIN f_odr_upd odu 
ON od.odr_seq = odu.odr_cd 
LEFT JOIN h_e_pay_authori pay 
ON od.odr_seq = pay.odr_no 
LEFT JOIN f_regular_buy_odr_info_record rb 
ON od.cust_no = rb.cust_no 
LEFT JOIN f_regular_buy_odr_info_dtl_record rbd 
ON rb.regular_buy_odr_seq = rbd.regular_buy_odr_seq 
LEFT JOIN m_offline_data of 
ON rb.cust_no = of.cust_no 
LEFT JOIN f_odr_direct oddi 
ON od.odr_seq = oddi.odr_seq
ORDER BY od.acpt_dt_tm DESC
) AS A 
LEFT JOIN ( 
SELECT
base.odr_seq
, coalesce(ad1.cosme_flag, 0) cosme_flag
, coalesce(ad2.herb_flag, 0) herb_flag 
FROM
( 
SELECT
odr_d.odr_seq 
FROM
odr_d 
GROUP BY
odr_d.odr_seq
) AS base 
LEFT JOIN ( 
SELECT
dd.odr_seq
, 1 AS cosme_flag 
FROM
odr_d AS dd 
INNER JOIN m_item AS mm 
ON dd.item_cd = mm.item_cd 
AND mm.ope_kbn = '1' 
GROUP BY
dd.odr_seq
) AS ad1 
ON base.odr_seq = ad1.odr_seq 
LEFT JOIN ( 
SELECT
dd.odr_seq
, 1 AS herb_flag 
FROM
odr_d AS dd 
inner join m_item AS mm 
ON dd.item_cd = mm.item_cd 
AND mm.ope_kbn = '2' 
GROUP BY
dd.odr_seq
) AS ad2 
ON base.odr_seq = ad2.odr_seq
ORDER BY base.odr_seq DESC
) AS B 
ON A.odr_seq = B.odr_seq





-- $sql .= " WHERE ( ";
-- $sql .= $where;
-- $sql .= ") ";
$sql .= " ORDER BY A.acpt_dt_tm DESC";


SELECT
    * 
FROM
    ( 
        SELECT
            a.recv_order_id
            , a.site_kbn
            , a.kainno
            , a.tel_no AS tel_no
            , a.netmember_id
            , to_char(a.order_dt, 'YYYY/MM/DD HH24:MI:SS') AS order_dt
            , b.kain_name AS kain_name
            , decode(a.site_kbn, 1, b.email, b.m_email) AS email
            , a.host_flg
            , a.print_flg
            , a.order_status
            , a.session_id
            , a.NET_IJ_CD
            , c.NET_IJ_INFO
            , a.RESERVE_KBN
            , a.GIFT_FLG
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


SELECT
*
FROM
( 
SELECT
od.odr_seq AS RECV_ORDER_ID,
to_char(od.acpt_dt_tm, 'YYYY/MM/DD HH24:MI:SS') AS ORDER_DT,
od.cust_no AS KAINNO,
nm.cust_name AS KAIN_NAME,
ij.net_ju_cd AS NET_IJ_CD,
ij.net_ju_rsn AS NET_IJ_INFO,
od.odr_stat_kbn AS ORDER_STATUS,
od.core_sys_kbn AS HOST_FLG,
od.rcv_form_output_kbn AS PRINT_FLG,
ac.odr_kbn AS ORDER_KBN,
--odu.upd_kbn AS CHANGE_KBN,
odd.item_kbn AS SHOHIN_TYPE,
od.tel_no AS TEL_NO,
nm.mail_adr AS EMAIL,
od.mbr_kbn AS KAIN_KBN,
od.net_mbr_cd AS NETMEMBER_ID,
od.site_kbn AS SITE_KBN,
od.gift_flg AS GIFT_FLG,
rb.regular_buy_odr_seq AS REGULAR_ORDER_ID,
od.credit_card_no AS CC_NO,
od.avail_term AS CC_TERM,
rb.credit_card_name AS CC_NAME,
ac.mbr_cd AS KAIIN_ID,
ac.mbr_pwd AS KAIIN_PASS,
-- odu.acpt_dt_tm AS CHNG_ORDER_DT,
-- odu.credit_card_no AS CHNG_HIST_CC_NO,
-- odu.avail_term AS CHNG_HIST_CC_TERM,
-- odu.credit_card_name AS CHNG_HIST_CC_NAME,
ci.mbr_cd AS CHNG_HIST_KAIIN_ID,
ci.mbr_pwd AS CHNG_HIST_KAIIN_PASS,
pay.trade_cd AS ACCESS_ID,
pay.trade_pwd AS ACCESS_PASS,
pay.order_cd AS ORDER_ID,
pay.e_pay_account_cd AS EPAYMENT_ID,
od.route_dtl_kbn AS ODRROUTEDTLKBN,
ac.hist_seq AS REGIST_HISTORY_ID,
ci.hist_seq AS CHNG_HIST_REGIST_HISTORY_ID,
pay.hist_seq AS EPAYMENTHISTORY_ID,
pay.credit_corp_kbn AS EPAYCLR_CORP_CD,
od.del_flg AS DELETE_FLAG,
( 
select
upd_kbn 
from
f_odr_upd odu 
where
odu.odr_seq = od.odr_seq
) as CHANGE_KBN,
( 
select
acpt_dt_tm 
from
f_odr_upd odu 
where
odu.odr_seq = od.odr_seq
) as CHNG_ORDER_DT,
( 
SELECT
    CONCAT( 
        credit_card_no
        , CONCAT( 
            ','
            , CONCAT( 
                credit_card_name
                , CONCAT(',', CONCAT(avail_term, CONCAT(',', pay_cnt)))
            )
        )
    ) 
    from
        f_odr_upd odu 
    where
        odu.odr_seq = od.odr_seq
) as DATA_PAYMENT
FROM
f_odr_h od 
INNER JOIN m_net_mbr nm 
ON od.cust_no = nm.cust_no 
LEFT JOIN m_net_ju_rsn ij 
ON od.pend_cd = ij.net_ju_cd 
LEFT JOIN h_approval_card_input ac 
ON od.odr_seq = ac.odr_no 
LEFT JOIN h_card_input ci 
ON od.odr_seq = ci.odr_seq 
LEFT JOIN f_odr_d odd 
ON od.odr_seq = odd.odr_seq 
LEFT JOIN m_item i 
ON odd.item_cd = i.item_cd 
--LEFT JOIN f_odr_upd odu 
--ON od.odr_seq = odu.odr_cd 
LEFT JOIN h_e_pay_authori pay 
ON od.odr_seq = pay.odr_no 
LEFT JOIN f_regular_buy_odr_info_record_h rb 
ON od.cust_no = rb.cust_no 
LEFT JOIN f_regular_buy_odr_info_record_d rbd 
ON rb.regular_buy_odr_seq = rbd.regular_buy_odr_seq 
---LEFT JOIN m_offline_data of 
---ON rb.cust_no = of.cust_no 
LEFT JOIN f_odr_direct oddi 
ON od.odr_seq = oddi.odr_seq
ORDER BY od.acpt_dt_tm DESC
) AS A 
LEFT JOIN ( 
SELECT
base.odr_seq
, coalesce(ad1.cosme_flag, 0) cosme_flag
, coalesce(ad2.herb_flag, 0) herb_flag 
FROM
( 
SELECT
odr_d.odr_seq 
FROM
odr_d 
GROUP BY
odr_d.odr_seq
) AS base 
LEFT JOIN ( 
SELECT
dd.odr_seq
, 1 AS cosme_flag 
FROM
odr_d AS dd 
INNER JOIN m_item AS mm 
ON dd.item_cd = mm.item_cd 
AND mm.ope_kbn = '1' 
GROUP BY
dd.odr_seq
) AS ad1 
ON base.odr_seq = ad1.odr_seq 
LEFT JOIN ( 
SELECT
dd.odr_seq
, 1 AS herb_flag 
FROM
odr_d AS dd 
inner join m_item AS mm 
ON dd.item_cd = mm.item_cd 
AND mm.ope_kbn = '2' 
GROUP BY
dd.odr_seq
) AS ad2 
ON base.odr_seq = ad2.odr_seq
ORDER BY base.odr_seq DESC
) AS B 
ON A.odr_seq = B.odr_seq
)
ORDER BY order_dt DESC


 SELECT
     A.odr_seq AS ORDER_SEQ,
     A.acpt_dt_tm AS ORDER_DT,
     A.cust_no AS KAINNO,
     A.cust_name AS KAIN_NAME,
     A.net_ju_cd AS NET_IJ_CD,
     A.mbr_kbn AS KAIN_KBN,
     A.gift_flg AS GIFT_FLG,
     A.regular_buy_odr_seq AS REGULAR_ORDER_ID,
     A.item_kbn AS SHOHIN_TYPE,
     A.odr_kbn AS ORDER_KBN,
     A.net_ju_rsn AS NET_IJ_INFO,
     A.odr_stat_kbn AS ORDER_STATUS,
     A.core_sys_kbn AS HOST_FLG,
     A.rcv_form_output_kbn AS PRINT_FLG,
     A.upd_kbn AS CHANGE_KBN,
     A.tel_no AS TEL_NO,
     A.mail_adr AS EMAIL,
     A.site_kbn AS SITE_KBN,
     A.route_dtl_kbn AS ODRROUTEDTLKBN,
     A.login_cd AS NETMEMBER_ID,
     A.credit_card_no AS CC_NO,
     A.avail_term AS CC_TERM,
     A.credit_card_name AS CC_NAME,
     A.hist_seq AS REGIST_HISTORY_ID,
     A.mbr_cd AS KAIIN_ID,
     A.mbr_pwd AS KAIIN_PASS,
     A.chng_order_dt AS CHNG_ORDER_DT,
     A.chng_card_no AS CHNG_HIST_CC_NO,
     A.chng_avail_term AS CHNG_HIST_CC_TERM,
     A.chng_card_name AS CHNG_HIST_CC_NAME,
     A.chng_hist_seq AS CHNG_HIST_REGIST_HISTORY_ID,
     A.chng_mbr_cd AS CHNG_HIST_KAIIN_ID,
     A.chng_mbr_pwd AS CHNG_HIST_KAIIN_PASS,
     A.trade_cd AS ACCESS_ID,
     A.trade_pwd AS ACCESS_PASS,
     A.order_cd AS ORDER_ID,
     A.e_pay_account_cd AS EPAYMENT_ID,
     A.del_flg AS DELETE_FLAG,
     B.cosme_flag AS COSME_FLAG,
     B.herb_flag AS HERB_FLAG 
 FROM
     ( 
         SELECT
             od.odr_seq,
             od.acpt_dt_tm,
             od.cust_no,
             nm.cust_name,
             ij.net_ju_cd,
             od.mbr_kbn,
             od.gift_flg,
             rb.regular_buy_odr_seq,
             odd.item_kbn,
             ac.odr_kbn,
             ij.net_ju_rsn,
             od.odr_stat_kbn,
             od.core_sys_kbn,
             od.rcv_form_output_kbn,
             odu.upd_kbn,
             od.tel_no,
             od.del_flg,
             nm.mail_adr,
             od.site_kbn,
             od.route_dtl_kbn,
             od.login_cd,
             od.credit_card_no,
             od.avail_term,
             rb.credit_card_name,
             ac.hist_seq,
             ac.mbr_cd,
             ac.mbr_pwd,
             odu.acpt_dt_tm AS chng_order_dt,
             odu.credit_card_no AS chng_card_no,
             odu.avail_term AS chng_avail_term,
             odu.credit_card_name AS chng_card_name,
             ci.hist_seq AS chng_hist_seq,
             ci.mbr_cd AS chng_mbr_cd,
             ci.mbr_pwd AS chng_mbr_pwd,
             pay.trade_cd,
             pay.trade_pwd,
             pay.order_cd,
             pay.e_pay_account_cd 
         FROM
             f_odr od 
             INNER JOIN m_net_mbr nm 
                 ON od.cust_no = nm.cust_no 
             LEFT JOIN m_net_ju_rsn ij 
                 ON od.pend_cd = ij.net_ju_cd 
             LEFT JOIN h_approval_card_input ac 
                 ON od.odr_seq = ac.odr_no 
             LEFT JOIN h_card_input ci 
                 ON od.odr_seq = ci.odr_seq 
             LEFT JOIN odr_d odd 
                 ON od.odr_seq = odd.odr_seq 
             LEFT JOIN m_item i 
                 ON odd.item_cd = i.item_cd 
             LEFT JOIN f_odr_upd odu 
                 ON od.odr_seq = odu.odr_cd 
             LEFT JOIN h_e_pay_authori pay 
                 ON od.odr_seq = pay.odr_no 
             LEFT JOIN f_regular_buy_odr_info_record rb 
                 ON od.cust_no = rb.cust_no 
             LEFT JOIN f_regular_buy_odr_info_dtl_record rbd 
                 ON rb.regular_buy_odr_seq = rbd.regular_buy_odr_seq 
             LEFT JOIN m_offline_data of 
                 ON rb.cust_no = of.cust_no 
             LEFT JOIN f_odr_direct oddi 
                 ON od.odr_seq = oddi.odr_seq
		 ORDER BY od.acpt_dt_tm DESC
     ) AS A 
     LEFT JOIN ( 
         SELECT
             base.odr_seq
             , coalesce(ad1.cosme_flag, 0) cosme_flag
             , coalesce(ad2.herb_flag, 0) herb_flag 
         FROM
             ( 
                 SELECT
                     odr_d.odr_seq 
                 FROM
                     odr_d 
                 GROUP BY
                     odr_d.odr_seq
             ) AS base 
             LEFT JOIN ( 
                 SELECT
                     dd.odr_seq
                     , 1 AS cosme_flag 
                 FROM
                     odr_d AS dd 
                     INNER JOIN m_item AS mm 
                         ON dd.item_cd = mm.item_cd 
                         AND mm.ope_kbn = '1' 
                 GROUP BY
                     dd.odr_seq
             ) AS ad1 
                 ON base.odr_seq = ad1.odr_seq 
             LEFT JOIN ( 
                 SELECT
                     dd.odr_seq
                     , 1 AS herb_flag 
                 FROM
                     odr_d AS dd 
                     inner join m_item AS mm 
                         ON dd.item_cd = mm.item_cd 
                         AND mm.ope_kbn = '2' 
                 GROUP BY
                     dd.odr_seq
             ) AS ad2 
                 ON base.odr_seq = ad2.odr_seq
		 ORDER BY base.odr_seq DESC
     ) AS B 
         ON A.odr_seq = B.odr_seq
		 ORDER BY A.acpt_dt_tm DESC




SELECT
    * 
FROM
    ( 
        SELECT
            od.odr_seq AS RECV_ORDER_ID
            , od.acpt_dt_tm AS ORDER_DT
            , od.cust_no AS KAINNO
            , nm.cust_name AS KAIN_NAME
            , ij.net_ju_cd AS NET_IJ_CD
            , ij.net_ju_rsn AS NET_IJ_INFO
            , od.odr_stat_kbn AS ORDER_STATUS
            , od.core_sys_kbn AS HOST_FLG
            , od.rcv_form_output_kbn AS PRINT_FLG
            , ac.odr_kbn AS ORDER_KBN           --odu.upd_kbn AS CHANGE_KBN,
            --,odd.item_kbn AS SHOHIN_TYPE
            , od.tel_no AS TEL_NO
            , nm.mail_adr AS EMAIL
            , od.mbr_kbn AS KAIN_KBN
            , od.net_mbr_cd AS NETMEMBER_ID
            , od.site_kbn AS SITE_KBN
            , od.gift_flg AS GIFT_FLG
            , ( 
                select
                    regular_buy_odr_seq 
                from
                    f_regular_buy_odr_info_record_h rb 
                where
                    od.cust_no = rb.cust_no
            ) as REGULAR_ORDER_ID
            , od.credit_card_no AS CC_NO
            , od.avail_term AS CC_TERM
            , ( 
                select
                    credit_card_name 
                from
                    f_regular_buy_odr_info_record_h rb 
                where
                    od.cust_no = rb.cust_no
            ) as CC_NAME
            , ac.mbr_cd AS KAIIN_ID
            , ac.mbr_pwd AS KAIIN_PASS
            ,                                   -- odu.acpt_dt_tm AS CHNG_ORDER_DT,
            -- odu.credit_card_no AS CHNG_HIST_CC_NO,
            -- odu.avail_term AS CHNG_HIST_CC_TERM,
            -- odu.credit_card_name AS CHNG_HIST_CC_NAME,
            ci.mbr_cd AS CHNG_HIST_KAIIN_ID
            , ci.mbr_pwd AS CHNG_HIST_KAIIN_PASS
            , pay.trade_cd AS ACCESS_ID
            , pay.trade_pwd AS ACCESS_PASS
            , pay.order_cd AS ORDER_ID
            , pay.e_pay_account_cd AS EPAYMENT_ID
            , od.route_dtl_kbn AS ODRROUTEDTLKBN
            , ac.hist_seq AS REGIST_HISTORY_ID
            , ci.hist_seq AS CHNG_HIST_REGIST_HISTORY_ID
            , pay.hist_seq AS EPAYMENTHISTORY_ID
            , pay.credit_corp_kbn AS EPAYCLR_CORP_CD
            , od.del_flg AS DELETE_FLAG
            , ( 
                select
                    upd_kbn 
                from
                    f_odr_upd odu 
                where
                    odu.odr_cd = od.odr_seq
            ) as CHANGE_KBN
            , ( 
                select
                    acpt_dt_tm 
                from
                    f_odr_upd odu 
                where
                    odu.odr_cd = od.odr_seq
            ) as CHNG_ORDER_DT
            , ( 
                SELECT
                    CONCAT( 
                        credit_card_no
                        , CONCAT( 
                            ','
                            , CONCAT( 
                                credit_card_name
                                , CONCAT(',', CONCAT(avail_term, CONCAT(',', pay_cnt)))
                            )
                        )
                    ) 
                from
                    f_odr_upd odu 
                where
                    odu.odr_cd = od.odr_seq
            ) as DATA_PAYMENT
            , ( 
                select
                    item_kbn 
                from
                    f_odr_d 
                WHERE
                    od.odr_seq = f_odr_d.odr_seq 
                group by
                    odr_seq
                    , item_kbn
            ) as SHOHIN_TYPE 
        FROM
            f_odr_h od 
            INNER JOIN m_net_mbr nm 
                ON od.cust_no = nm.cust_no 
            LEFT JOIN m_net_ju_rsn ij 
                ON od.pend_cd = ij.net_ju_cd 
            LEFT JOIN h_approval_card_input ac 
                ON od.odr_seq = ac.odr_no 
            LEFT JOIN h_card_input ci 
                ON od.odr_seq = ci.odr_seq      --LEFT JOIN f_odr_d odd
                --ON od.odr_seq = odd.odr_seq     --LEFT JOIN m_item i
                --ON odd.item_cd = i.item_cd      --LEFT JOIN f_odr_upd odu
                --ON od.odr_seq = odu.odr_cd
            LEFT JOIN h_e_pay_authori pay 
                ON od.odr_seq = pay.odr_no 
            LEFT JOIN f_regular_buy_odr_info_record_h rb 
                ON od.cust_no = rb.cust_no      --LEFT JOIN f_regular_buy_odr_info_record_d rbd
                --ON rb.regular_buy_odr_seq = rbd.regular_buy_odr_seq ---LEFT JOIN m_offline_data of
                ---ON rb.cust_no = of.cust_no
                --LEFT JOIN f_odr_direct oddi
                -- ON od.odr_seq = oddi.odr_seq
        ORDER BY
            od.acpt_dt_tm DESC
    ) AS A 
    LEFT JOIN ( 
        SELECT
            base.odr_seq
            , coalesce(ad1.cosme_flag, 0) cosme_flag
            , coalesce(ad2.herb_flag, 0) herb_flag 
        FROM
            ( 
                SELECT
                    f_odr_d.odr_seq 
                FROM
                    f_odr_d 
                GROUP BY
                    f_odr_d.odr_seq
            ) AS base 
            LEFT JOIN ( 
                SELECT
                    dd.odr_seq
                    , 1 AS cosme_flag 
                FROM
                    f_odr_d AS dd 
                    INNER JOIN m_item AS mm 
                        ON dd.item_cd = mm.item_cd 
                        AND mm.ope_kbn = '1' 
                GROUP BY
                    dd.odr_seq
            ) AS ad1 
                ON base.odr_seq = ad1.odr_seq 
            LEFT JOIN ( 
                SELECT
                    dd.odr_seq
                    , 1 AS herb_flag 
                FROM
                    f_odr_d AS dd 
                    inner join m_item AS mm 
                        ON dd.item_cd = mm.item_cd 
                        AND mm.ope_kbn = '2' 
                GROUP BY
                    dd.odr_seq
            ) AS ad2 
                ON base.odr_seq = ad2.odr_seq 
        ORDER BY
            base.odr_seq DESC
    ) AS B 
        ON A.recv_order_id = B.odr_seq 
WHERE
    ( 
        delete_flag != '1' 
        AND order_dt >= to_timestamp('20040608000000', 'yyyymmddhh24miss') 
        AND order_dt <= to_timestamp('20210610235959', 'yyyymmddhh24miss') 
        AND lpad(cast(kainno as VARCHAR), 8, '0') like '%18303598%' 
        AND ( 
            (site_kbn = '1' AND odrroutedtlkbn != '03') 
            OR site_kbn = '2' 
            OR (site_kbn != '2' AND odrroutedtlkbn = '03')
        ) 
        AND order_status IN ('0')
    ) 
ORDER BY
    order_dt DESC

$sql = "SELECT ";
    $sql .= "*  ";
    $sql .= "FROM ";
    $sql .= "(  ";
        $sql .= "SELECT ";
            $sql .= "od.odr_seq AS RECV_ORDER_ID ";
            $sql .= ", od.acpt_dt_tm AS ORDER_DT ";
            $sql .= ", od.cust_no AS KAINNO ";
            $sql .= ", nm.cust_name AS KAIN_NAME ";
            $sql .= ", ij.net_ju_cd AS NET_IJ_CD ";
            $sql .= ", ij.net_ju_rsn AS NET_IJ_INFO ";
            $sql .= ", od.odr_stat_kbn AS ORDER_STATUS ";
            $sql .= ", od.core_sys_kbn AS HOST_FLG ";
            $sql .= ", od.rcv_form_output_kbn AS PRINT_FLG ";
            $sql .= ", ac.odr_kbn AS ORDER_KBN ";
            $sql .= ", (  ";
                $sql .= "select ";
                    $sql .= "item_kbn  ";
                $sql .= "from ";
                    $sql .= "f_odr_d  ";
                $sql .= "WHERE ";
                    $sql .= "od.odr_seq = f_odr_d.odr_seq  ";
                $sql .= "group by ";
                    $sql .= "odr_seq ";
                    $sql .= ", item_kbn ";
            $sql .= ") as SHOHIN_TYPE  ";
            $sql .= ", (  ";
                $sql .= "select ";
                    $sql .= "upd_kbn  ";
                $sql .= "from ";
                    $sql .= "f_odr_upd odu  ";
                $sql .= "where ";
                    $sql .= "odu.odr_cd = od.odr_seq ";
            $sql .= ") as CHANGE_KBN ";
            $sql .= ", od.tel_no AS TEL_NO ";
            $sql .= ", nm.mail_adr AS EMAIL ";
            $sql .= ", od.mbr_kbn AS KAIN_KBN ";
            $sql .= ", od.net_mbr_cd AS NETMEMBER_ID ";
            $sql .= ", od.site_kbn AS SITE_KBN ";
            $sql .= ", od.gift_flg AS GIFT_FLG ";
            $sql .= ", (  ";
                $sql .= "select ";
                    $sql .= "regular_buy_odr_seq  ";
                $sql .= "from ";
                    $sql .= "f_regular_buy_odr_info_record_h rb  ";
                $sql .= "where ";
                    $sql .= "od.cust_no = rb.cust_no ";
            $sql .= ") as REGULAR_ORDER_ID ";
            $sql .= ", od.credit_card_no AS CC_NO ";
            $sql .= ", od.avail_term AS CC_TERM ";
            $sql .= ", (  ";
                $sql .= "select ";
                    $sql .= "credit_card_name  ";
                $sql .= "from ";
                    $sql .= "f_regular_buy_odr_info_record_h rb  ";
                $sql .= "where ";
                    $sql .= "od.cust_no = rb.cust_no ";
            $sql .= ") as CC_NAME ";
            $sql .= ", ac.mbr_cd AS KAIIN_ID ";
            $sql .= ", ac.mbr_pwd AS KAIIN_PASS ";
            $sql .= ", ci.mbr_cd AS CHNG_HIST_KAIIN_ID ";
            $sql .= ", ci.mbr_pwd AS CHNG_HIST_KAIIN_PASS ";
            $sql .= ", pay.trade_cd AS ACCESS_ID ";
            $sql .= ", pay.trade_pwd AS ACCESS_PASS ";
            $sql .= ", pay.order_cd AS ORDER_ID ";
            $sql .= ", pay.e_pay_account_cd AS EPAYMENT_ID ";
            $sql .= ", od.route_dtl_kbn AS ODRROUTEDTLKBN ";
            $sql .= ", ac.hist_seq AS REGIST_HISTORY_ID ";
            $sql .= ", ci.hist_seq AS CHNG_HIST_REGIST_HISTORY_ID ";
            $sql .= ", pay.hist_seq AS EPAYMENTHISTORY_ID ";
            $sql .= ", pay.credit_corp_kbn AS EPAYCLR_CORP_CD ";
            $sql .= ", od.del_flg AS DELETE_FLAG ";
            $sql .= ", (  ";
                $sql .= "select ";
                    $sql .= "acpt_dt_tm  ";
                $sql .= "from ";
                    $sql .= "f_odr_upd odu  ";
                $sql .= "where ";
                    $sql .= "odu.odr_cd = od.odr_seq ";
            $sql .= ") as CHNG_ORDER_DT ";
            $sql .= ", (  ";
                $sql .= "SELECT ";
                    $sql .= "CONCAT(credit_card_no ";
                        $sql .= ", CONCAT(',' ";
                            $sql .= ", CONCAT(credit_card_name ";
                                $sql .= ", CONCAT(',' ";
                                    $sql .= ", CONCAT(avail_term ";
                                        $sql .= ", CONCAT(',', pay_cnt))) ";
                            $sql .= ") ";
                        $sql .= ") ";
                    $sql .= ")  ";
                $sql .= "from ";
                    $sql .= "f_odr_upd odu  ";
                $sql .= "where ";
                    $sql .= "odu.odr_cd = od.odr_seq ";
            $sql .= ") as DATA_PAYMENT ";   
        $sql .= "FROM ";
            $sql .= "f_odr_h od  ";
            $sql .= "INNER JOIN m_net_mbr nm  ";
                $sql .= "ON od.cust_no = nm.cust_no  ";
            $sql .= "LEFT JOIN m_net_ju_rsn ij  ";
                $sql .= "ON od.pend_cd = ij.net_ju_cd  ";
            $sql .= "LEFT JOIN h_approval_card_input ac  ";
                $sql .= "ON od.odr_seq = ac.odr_no  ";
            $sql .= "LEFT JOIN h_card_input ci  ";
                $sql .= "ON od.odr_seq = ci.odr_seq ";
            $sql .= "LEFT JOIN h_e_pay_authori pay  ";
                $sql .= "ON od.odr_seq = pay.odr_no  ";
            $sql .= "LEFT JOIN f_regular_buy_odr_info_record_h rb  ";
                $sql .= "ON od.cust_no = rb.cust_no ";
        $sql .= "ORDER BY ";
            $sql .= "od.acpt_dt_tm DESC ";
    $sql .= ") AS A  ";
    $sql .= "LEFT JOIN (  ";
        $sql .= "SELECT ";
            $sql .= "base.odr_seq ";
            $sql .= ", coalesce(ad1.cosme_flag, 0) cosme_flag ";
            $sql .= ", coalesce(ad2.herb_flag, 0) herb_flag  ";
        $sql .= "FROM ";
            $sql .= "(  ";
                $sql .= "SELECT ";
                    $sql .= "f_odr_d.odr_seq  ";
                $sql .= "FROM ";
                    $sql .= "f_odr_d  ";
                $sql .= "GROUP BY ";
                    $sql .= "f_odr_d.odr_seq ";
            $sql .= ") AS base  ";
            $sql .= "LEFT JOIN (  ";
                $sql .= "SELECT ";
                    $sql .= "dd.odr_seq ";
                    $sql .= ", 1 AS cosme_flag  ";
                $sql .= "FROM ";
                    $sql .= "f_odr_d AS dd  ";
                    $sql .= "INNER JOIN m_item AS mm  ";
                        $sql .= "ON dd.item_cd = mm.item_cd  ";
                        $sql .= "AND mm.ope_kbn = '1'  ";
                $sql .= "GROUP BY ";
                    $sql .= "dd.odr_seq ";
            $sql .= ") AS ad1  ";
                $sql .= "ON base.odr_seq = ad1.odr_seq  ";
            $sql .= "LEFT JOIN (  ";
                $sql .= "SELECT ";
                    $sql .= "dd.odr_seq ";
                    $sql .= ", 1 AS herb_flag  ";
                $sql .= "FROM ";
                    $sql .= "f_odr_d AS dd  ";
                    $sql .= "inner join m_item AS mm  ";
                        $sql .= "ON dd.item_cd = mm.item_cd  ";
                        $sql .= "AND mm.ope_kbn = '2'  ";
                $sql .= "GROUP BY ";
                    $sql .= "dd.odr_seq ";
            $sql .= ") AS ad2  ";
                $sql .= "ON base.odr_seq = ad2.odr_seq  ";
        $sql .= "ORDER BY ";
            $sql .= "base.odr_seq DESC ";
    $sql .= ") AS B  ";
        $sql .= "ON A.recv_order_id = B.odr_seq  ";
$sql .= "WHERE ";
    $sql .= "(  ";
        $sql .= "$where ";
    $sql .= ")  ";
$sql .= "ORDER BY ";
    $sql .= "order_dt DESC ";




$sql = "SELECT ";
    $sql .= "*  ";
$sql .= "FROM ";
    $sql .= "(  ";
        $sql .= "SELECT ";
            $sql .= "od.odr_seq AS RECV_ORDER_ID ";
            $sql .= ", od.acpt_dt_tm AS ORDER_DT ";
            $sql .= ", od.cust_no AS KAINNO ";
            $sql .= ", nm.cust_name AS KAIN_NAME ";
            $sql .= ", ij.net_ju_cd AS NET_IJ_CD ";
            $sql .= ", ij.net_ju_rsn AS NET_IJ_INFO ";
            $sql .= ", od.odr_stat_kbn AS ORDER_STATUS ";
            $sql .= ", od.core_sys_kbn AS HOST_FLG ";
            $sql .= ", od.rcv_form_output_kbn AS PRINT_FLG ";
            $sql .= ", ac.odr_kbn AS ORDER_KBN ";
            $sql .= ", (  ";
                $sql .= "SELECT ";
                    $sql .= "r.item_kbn  ";
                $sql .= "from ";
                    $sql .= "f_odr_d r ";
                    $sql .= ", m_item s ";
                    $sql .= ", m_sys_set sy  ";
                $sql .= "where ";
                    $sql .= "sy.site_kbn = '1'  ";
                    $sql .= "and r.item_cd = s.item_cd  ";
                    $sql .= "and (  ";
                        $sql .= "(r.item_lvl is null and s.item_lvl is null)  ";
                        $sql .= "or (  ";
                            $sql .= "r.item_lvl is not null  ";
                            $sql .= "and r.item_lvl = s.item_lvl ";
                        $sql .= ") ";
                    $sql .= ")  ";
                    $sql .= "and r.odr_seq = od.odr_seq LIMIT 1 ";
              $sql .= ") as SHOHIN_TYPE  ";
            $sql .= ", od.tel_no AS TEL_NO ";
            $sql .= ", (case when od.site_kbn = '1' then nm.mail_adr else nm.mob_mail_adr end) AS EMAIL ";
            $sql .= ", od.mbr_kbn AS KAIN_KBN ";
            $sql .= ", od.net_mbr_cd AS NETMEMBER_ID ";
            $sql .= ", od.site_kbn AS SITE_KBN ";
            $sql .= ", od.gift_flg AS GIFT_FLG ";
            $sql .= ", od.credit_card_no AS CC_NO ";
            $sql .= ", od.avail_term AS CC_TERM ";
            $sql .= ", ac.mbr_cd AS KAIIN_ID ";
            $sql .= ", ac.mbr_pwd AS KAIIN_PASS ";
            $sql .= ", ci.mbr_cd AS CHNG_HIST_KAIIN_ID ";
            $sql .= ", ci.mbr_pwd AS CHNG_HIST_KAIIN_PASS ";
            $sql .= ", pay.trade_cd AS ACCESS_ID ";
            $sql .= ", pay.trade_pwd AS ACCESS_PASS ";
            $sql .= ", pay.order_cd AS ORDER_ID ";
            $sql .= ", pay.e_pay_account_cd AS EPAYMENT_ID ";
            $sql .= ", od.route_dtl_kbn AS ODRROUTEDTLKBN ";
            $sql .= ", ac.hist_seq AS REGIST_HISTORY_ID ";
            $sql .= ", ci.hist_seq AS CHNG_HIST_REGIST_HISTORY_ID ";
            $sql .= ", pay.hist_seq AS EPAYMENTHISTORY_ID ";
            $sql .= ", pay.credit_corp_kbn AS EPAYCLR_CORP_CD ";
            $sql .= ", od.del_flg AS DELETE_FLAG ";
            $sql .= ", (  ";
                $sql .= "select ";
                    $sql .= "upd_kbn  ";
                $sql .= "from ";
                    $sql .= "f_odr_upd odu  ";
                $sql .= "where ";
                    $sql .= "odu.odr_cd = od.odr_seq ";
            $sql .= ") as CHANGE_KBN ";
            $sql .= ", (  ";
                $sql .= "select ";
                    $sql .= "acpt_dt_tm  ";
                $sql .= "from ";
                    $sql .= "f_odr_upd odu  ";
                $sql .= "where ";
                    $sql .= "odu.odr_cd = od.odr_seq ";
            $sql .= ") as CHNG_ORDER_DT ";
            $sql .= ", (  ";
                $sql .= "SELECT ";
                    $sql .= "CONCAT(  ";
                        $sql .= "credit_card_no ";
                        $sql .= ", CONCAT(  ";
                            $sql .= "',' ";
                            $sql .= ", CONCAT(  ";
                                $sql .= "credit_card_name ";
                                $sql .= ", CONCAT(',', CONCAT(avail_term, CONCAT(',', pay_cnt))) ";
                            $sql .= ") ";
                        $sql .= ") ";
                    $sql .= ")  ";
                $sql .= "from ";
                    $sql .= "f_odr_upd odu  ";
                $sql .= "where ";
                    $sql .= "odu.odr_cd = od.odr_seq ";
            $sql .= ") as DATA_PAYMENT ";
            $sql .= ",  ";
        $sql .= "FROM ";
            $sql .= "f_odr_h od  ";
            $sql .= "INNER JOIN m_net_mbr nm  ";
                $sql .= "ON od.cust_no = nm.cust_no  ";
            $sql .= "LEFT JOIN m_net_ju_rsn ij  ";
                $sql .= "ON od.pend_cd = ij.net_ju_cd  ";
            $sql .= "LEFT JOIN h_approval_card_input ac  ";
                $sql .= "ON od.odr_seq = ac.odr_no  ";
            $sql .= "LEFT JOIN h_card_input ci  ";
                $sql .= "ON od.odr_seq = ci.odr_seq  ";
            $sql .= "LEFT JOIN h_e_pay_authori pay  ";
                $sql .= "ON od.odr_seq = pay.odr_no  ";
        $sql .= "ORDER BY ";
            $sql .= "od.acpt_dt_tm DESC ";
    $sql .= ") AS A  ";
    $sql .= "LEFT JOIN (  ";
        $sql .= "SELECT ";
            $sql .= "base.odr_seq ";
            $sql .= ", coalesce(ad1.cosme_flag, 0) cosme_flag ";
            $sql .= ", coalesce(ad2.herb_flag, 0) herb_flag  ";
        $sql .= "FROM ";
            $sql .= "(  ";
                $sql .= "SELECT ";
                    $sql .= "f_odr_d.odr_seq  ";
                $sql .= "FROM ";
                    $sql .= "f_odr_d  ";
                $sql .= "GROUP BY ";
                    $sql .= "f_odr_d.odr_seq ";
            $sql .= ") AS base  ";
            $sql .= "LEFT JOIN (  ";
                $sql .= "SELECT ";
                    $sql .= "dd.odr_seq ";
                    $sql .= ", 1 AS cosme_flag  ";
                $sql .= "FROM ";
                    $sql .= "f_odr_d AS dd  ";
                    $sql .= "INNER JOIN m_item AS mm  ";
                        $sql .= "ON dd.item_cd = mm.item_cd  ";
                        $sql .= "AND mm.ope_kbn = '1'  ";
                $sql .= "GROUP BY ";
                    $sql .= "dd.odr_seq ";
            $sql .= ") AS ad1  ";
                $sql .= "ON base.odr_seq = ad1.odr_seq  ";
            $sql .= "LEFT JOIN (  ";
                $sql .= "SELECT ";
                    $sql .= "dd.odr_seq ";
                    $sql .= ", 1 AS herb_flag  ";
                $sql .= "FROM ";
                    $sql .= "f_odr_d AS dd  ";
                    $sql .= "inner join m_item AS mm  ";
                        $sql .= "ON dd.item_cd = mm.item_cd  ";
                        $sql .= "AND mm.ope_kbn = '2'  ";
                $sql .= "GROUP BY ";
                    $sql .= "dd.odr_seq ";
            $sql .= ") AS ad2  ";
                $sql .= "ON base.odr_seq = ad2.odr_seq  ";
        $sql .= "ORDER BY ";
            $sql .= "base.odr_seq DESC ";
    $sql .= ") AS B  ";
        $sql .= "ON A.recv_order_id = B.odr_seq  ";


        SELECT 
    *  
    FROM 
    (  
        SELECT 
            od.odr_seq AS RECV_ORDER_ID 
            , od.acpt_dt_tm AS ORDER_DT 
            , lpad(cast(od.cust_no as varchar), 8, '0') AS KAINNO 
            , nm.cust_name AS KAIN_NAME 
            , ij.net_ju_cd AS NET_IJ_CD 
            , ij.net_ju_rsn AS NET_IJ_INFO 
            , od.odr_stat_kbn AS ORDER_STATUS 
            , od.core_sys_kbn AS HOST_FLG 
            , od.rcv_form_output_kbn AS PRINT_FLG 
            , ac.odr_kbn AS ORDER_KBN 
            , (  
                SELECT 
                    r.item_kbn  
                from 
                    f_odr_d r 
                    , m_item s 
                    , m_sys_set sy  
                where 
                    sy.site_kbn = '1'  
                    and r.item_cd = s.item_cd  
                    and (  
                        (r.item_lvl is null and s.item_lvl is null)  
                        or (  
                            r.item_lvl is not null  
                            and r.item_lvl = s.item_lvl 
                        ) 
                    )  
                    and r.odr_seq = od.odr_seq LIMIT 1 
              ) as SHOHIN_TYPE  
            , (  
                select 
                    upd_kbn  
                from 
                    f_odr_upd odu  
                where 
                    odu.odr_cd = od.odr_seq 
            ) as CHANGE_KBN 
            , od.tel_no AS TEL_NO 
            , (case when od.site_kbn = '1' then nm.mail_adr else nm.mob_mail_adr end) AS EMAIL 
            , od.mbr_kbn AS KAIN_KBN 
            , od.net_mbr_cd AS NETMEMBER_ID 
            , od.site_kbn AS SITE_KBN 
            , od.gift_flg AS GIFT_FLG 
            , od.credit_card_no AS CC_NO 
            , od.avail_term AS CC_TERM 
            , ac.mbr_cd AS KAIIN_ID 
            , ac.mbr_pwd AS KAIIN_PASS 
            , ci.mbr_cd AS CHNG_HIST_KAIIN_ID 
            , ci.mbr_pwd AS CHNG_HIST_KAIIN_PASS 
            , pay.trade_cd AS ACCESS_ID 
            , pay.trade_pwd AS ACCESS_PASS 
            , pay.order_cd AS ORDER_ID 
            , pay.e_pay_account_cd AS EPAYMENT_ID 
            , od.route_dtl_kbn AS ODRROUTEDTLKBN 
            , ac.hist_seq AS REGIST_HISTORY_ID 
            , ci.hist_seq AS CHNG_HIST_REGIST_HISTORY_ID 
            , pay.hist_seq AS EPAYMENTHISTORY_ID 
            , pay.credit_corp_kbn AS EPAYCLR_CORP_CD 
            , od.del_flg AS DELETE_FLAG 
            , (  
                select 
                    acpt_dt_tm  
                from 
                    f_odr_upd odu  
                where 
                    odu.odr_cd = od.odr_seq 
            ) as CHNG_ORDER_DT 
            , (  
                SELECT 
                    CONCAT(credit_card_no 
                        , CONCAT(',' 
                            , CONCAT(credit_card_name 
                                , CONCAT(',' 
                                    , CONCAT(avail_term 
                                        , CONCAT(',', pay_cnt))) 
                            ) 
                        ) 
                    )  
                from 
                    f_odr_upd odu  
                where 
                    odu.odr_cd = od.odr_seq 
            ) as DATA_PAYMENT 
        FROM 
            f_odr_h od  
            INNER JOIN m_net_mbr nm  
                ON od.cust_no = nm.cust_no  
            LEFT JOIN m_net_ju_rsn ij  
                ON od.pend_cd = ij.net_ju_cd  
            LEFT JOIN h_approval_card_input ac  
                ON od.odr_seq = ac.odr_no  
            LEFT JOIN h_card_input ci  
                ON od.odr_seq = ci.odr_seq 
            LEFT JOIN h_e_pay_authori pay  
                ON od.odr_seq = pay.odr_no  
        ORDER BY 
            od.acpt_dt_tm DESC 
    ) AS A  
    LEFT JOIN (  
        SELECT 
            base.odr_seq 
            , coalesce(ad1.cosme_flag, 0) cosme_flag 
            , coalesce(ad2.herb_flag, 0) herb_flag  
        FROM 
            (  
                SELECT 
                    f_odr_d.odr_seq  
                FROM 
                    f_odr_d  
                GROUP BY 
                    f_odr_d.odr_seq 
            ) AS base  
            LEFT JOIN (  
                SELECT 
                    dd.odr_seq 
                    , 1 AS cosme_flag  
                FROM 
                    f_odr_d AS dd  
                    INNER JOIN m_item AS mm  
                        ON dd.item_cd = mm.item_cd  
                        AND mm.ope_kbn = '1'  
                GROUP BY 
                    dd.odr_seq 
            ) AS ad1  
                ON base.odr_seq = ad1.odr_seq  
            LEFT JOIN (  
                SELECT 
                    dd.odr_seq 
                    , 1 AS herb_flag  
                FROM 
                    f_odr_d AS dd  
                    inner join m_item AS mm  
                        ON dd.item_cd = mm.item_cd  
                        AND mm.ope_kbn = '2'  
                GROUP BY 
                    dd.odr_seq 
            ) AS ad2  
                ON base.odr_seq = ad2.odr_seq  
        ORDER BY 
            base.odr_seq DESC 
    ) AS B  
        ON A.recv_order_id = B.odr_seq  
 WHERE ( 
    wher
    ) 
ORDER BY 
    order_dt DESC 