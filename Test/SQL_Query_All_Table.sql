-- START TABLE : sskadminuser.f_a100  --
CREATE TABLE sskadminuser.f_a100(
send_dt_tm TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL,
site_kbn CHAR(1),
cust_no INT,
session_id VARCHAR(32),
session_get_dt_tm TIMESTAMP(0) WITHOUT TIME ZONE,
core_sys_send_data VARCHAR(4000),
core_sys_rcv_data VARCHAR(4000),
core_sys_send_rslt_flg CHAR(1),
update_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
register_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
update_user_cd VARCHAR(64) NOT NULL,
register_user_cd VARCHAR(64) NOT NULL
);
-- ADD COLUMN
COMMENT ON TABLE sskadminuser.f_a100 IS 'A100伝票';
COMMENT ON COLUMN sskadminuser.f_a100.send_dt_tm IS '送信日時';
COMMENT ON COLUMN sskadminuser.f_a100.site_kbn IS 'サイト区分';
COMMENT ON COLUMN sskadminuser.f_a100.cust_no IS '会員番号';
COMMENT ON COLUMN sskadminuser.f_a100.session_id IS 'セッションID';
COMMENT ON COLUMN sskadminuser.f_a100.session_get_dt_tm IS 'セッション取得日時';
COMMENT ON COLUMN sskadminuser.f_a100.core_sys_send_data IS '基幹送信データ';
COMMENT ON COLUMN sskadminuser.f_a100.core_sys_rcv_data IS '基幹受信データ';
COMMENT ON COLUMN sskadminuser.f_a100.core_sys_send_rslt_flg IS '基幹送信結果フラグ';
COMMENT ON COLUMN sskadminuser.f_a100.update_date IS '更新日時';
COMMENT ON COLUMN sskadminuser.f_a100.register_date IS '登録日時';
COMMENT ON COLUMN sskadminuser.f_a100.update_user_cd IS '更新者';
COMMENT ON COLUMN sskadminuser.f_a100.register_user_cd IS '登録者';
-- CREATE INDEX 
CREATE INDEX idx_f_a100_01 ON sskadminuser.f_a100 (send_dt_tm);
CREATE INDEX idx_f_a100_02 ON sskadminuser.f_a100 (site_kbn);
CREATE INDEX idx_f_a100_03 ON sskadminuser.f_a100 (cust_no);
CREATE INDEX idx_f_a100_04 ON sskadminuser.f_a100 (session_id);
CREATE INDEX idx_f_a100_05 ON sskadminuser.f_a100 (session_get_dt_tm);
CREATE INDEX idx_f_a100_06 ON sskadminuser.f_a100 (update_date,register_date);
-- END TABLE : sskadminuser.f_a100  --

-- START TABLE : sskadminuser.f_a110  --
CREATE TABLE sskadminuser.f_a110(
send_dt_tm TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL,
site_kbn CHAR(1),
cust_no INT,
session_id VARCHAR(32),
session_get_dt_tm TIMESTAMP(0) WITHOUT TIME ZONE,
core_sys_send_data VARCHAR(4000),
core_sys_rcv_data VARCHAR(4000),
core_sys_send_rslt_flg CHAR(1),
update_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
register_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
update_user_cd VARCHAR(64) NOT NULL,
register_user_cd VARCHAR(64) NOT NULL
);
-- ADD COLUMN
COMMENT ON TABLE sskadminuser.f_a110 IS 'A110伝票';
COMMENT ON COLUMN sskadminuser.f_a110.send_dt_tm IS '送信日時';
COMMENT ON COLUMN sskadminuser.f_a110.site_kbn IS 'サイト区分';
COMMENT ON COLUMN sskadminuser.f_a110.cust_no IS '会員番号';
COMMENT ON COLUMN sskadminuser.f_a110.session_id IS 'セッションID';
COMMENT ON COLUMN sskadminuser.f_a110.session_get_dt_tm IS 'セッション取得日時';
COMMENT ON COLUMN sskadminuser.f_a110.core_sys_send_data IS '基幹送信データ';
COMMENT ON COLUMN sskadminuser.f_a110.core_sys_rcv_data IS '基幹受信データ';
COMMENT ON COLUMN sskadminuser.f_a110.core_sys_send_rslt_flg IS '基幹送信結果フラグ';
COMMENT ON COLUMN sskadminuser.f_a110.update_date IS '更新日時';
COMMENT ON COLUMN sskadminuser.f_a110.register_date IS '登録日時';
COMMENT ON COLUMN sskadminuser.f_a110.update_user_cd IS '更新者';
COMMENT ON COLUMN sskadminuser.f_a110.register_user_cd IS '登録者';
-- CREATE INDEX 
CREATE INDEX idx_f_a110_01 ON sskadminuser.f_a110 (send_dt_tm);
CREATE INDEX idx_f_a110_02 ON sskadminuser.f_a110 (site_kbn);
CREATE INDEX idx_f_a110_03 ON sskadminuser.f_a110 (cust_no);
CREATE INDEX idx_f_a110_04 ON sskadminuser.f_a110 (session_id);
CREATE INDEX idx_f_a110_05 ON sskadminuser.f_a110 (session_get_dt_tm);
CREATE INDEX idx_f_a110_06 ON sskadminuser.f_a110 (update_date,register_date);
-- END TABLE : sskadminuser.f_a110  --

-- START TABLE : sskadminuser.f_a120  --
CREATE TABLE sskadminuser.f_a120(
send_dt_tm TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL,
site_kbn CHAR(1),
cust_no INT,
session_id VARCHAR(32),
session_get_dt_tm TIMESTAMP(0) WITHOUT TIME ZONE,
core_sys_send_data VARCHAR(4000),
core_sys_rcv_data VARCHAR(4000),
core_sys_send_rslt_flg CHAR(1),
update_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
register_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
update_user_cd VARCHAR(64) NOT NULL,
register_user_cd VARCHAR(64) NOT NULL
);
-- ADD COLUMN
COMMENT ON TABLE sskadminuser.f_a120 IS 'A120伝票';
COMMENT ON COLUMN sskadminuser.f_a120.send_dt_tm IS '送信日時';
COMMENT ON COLUMN sskadminuser.f_a120.site_kbn IS 'サイト区分';
COMMENT ON COLUMN sskadminuser.f_a120.cust_no IS '会員番号';
COMMENT ON COLUMN sskadminuser.f_a120.session_id IS 'セッションID';
COMMENT ON COLUMN sskadminuser.f_a120.session_get_dt_tm IS 'セッション取得日時';
COMMENT ON COLUMN sskadminuser.f_a120.core_sys_send_data IS '基幹送信データ';
COMMENT ON COLUMN sskadminuser.f_a120.core_sys_rcv_data IS '基幹受信データ';
COMMENT ON COLUMN sskadminuser.f_a120.core_sys_send_rslt_flg IS '基幹送信結果フラグ';
COMMENT ON COLUMN sskadminuser.f_a120.update_date IS '更新日時';
COMMENT ON COLUMN sskadminuser.f_a120.register_date IS '登録日時';
COMMENT ON COLUMN sskadminuser.f_a120.update_user_cd IS '更新者';
COMMENT ON COLUMN sskadminuser.f_a120.register_user_cd IS '登録者';
-- CREATE INDEX 
CREATE INDEX idx_f_a120_01 ON sskadminuser.f_a120 (send_dt_tm);
CREATE INDEX idx_f_a120_02 ON sskadminuser.f_a120 (site_kbn);
CREATE INDEX idx_f_a120_03 ON sskadminuser.f_a120 (cust_no);
CREATE INDEX idx_f_a120_04 ON sskadminuser.f_a120 (session_id);
CREATE INDEX idx_f_a120_05 ON sskadminuser.f_a120 (session_get_dt_tm);
CREATE INDEX idx_f_a120_06 ON sskadminuser.f_a120 (update_date,register_date);
-- END TABLE : sskadminuser.f_a120  --

-- START TABLE : sskadminuser.f_a130  --
CREATE TABLE sskadminuser.f_a130(
send_dt_tm TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL,
site_kbn CHAR(1),
cust_no INT,
session_id VARCHAR(32),
session_get_dt_tm TIMESTAMP(0) WITHOUT TIME ZONE,
core_sys_send_data VARCHAR(4000),
core_sys_rcv_data VARCHAR(4000),
core_sys_send_rslt_flg CHAR(1),
update_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
register_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
update_user_cd VARCHAR(64) NOT NULL,
register_user_cd VARCHAR(64) NOT NULL
);
-- ADD COLUMN
COMMENT ON TABLE sskadminuser.f_a130 IS 'A130伝票';
COMMENT ON COLUMN sskadminuser.f_a130.send_dt_tm IS '送信日時';
COMMENT ON COLUMN sskadminuser.f_a130.site_kbn IS 'サイト区分';
COMMENT ON COLUMN sskadminuser.f_a130.cust_no IS '会員番号';
COMMENT ON COLUMN sskadminuser.f_a130.session_id IS 'セッションID';
COMMENT ON COLUMN sskadminuser.f_a130.session_get_dt_tm IS 'セッション取得日時';
COMMENT ON COLUMN sskadminuser.f_a130.core_sys_send_data IS '基幹送信データ';
COMMENT ON COLUMN sskadminuser.f_a130.core_sys_rcv_data IS '基幹受信データ';
COMMENT ON COLUMN sskadminuser.f_a130.core_sys_send_rslt_flg IS '基幹送信結果フラグ';
COMMENT ON COLUMN sskadminuser.f_a130.update_date IS '更新日時';
COMMENT ON COLUMN sskadminuser.f_a130.register_date IS '登録日時';
COMMENT ON COLUMN sskadminuser.f_a130.update_user_cd IS '更新者';
COMMENT ON COLUMN sskadminuser.f_a130.register_user_cd IS '登録者';
-- CREATE INDEX 
CREATE INDEX idx_f_a130_01 ON sskadminuser.f_a130 (send_dt_tm);
CREATE INDEX idx_f_a130_02 ON sskadminuser.f_a130 (site_kbn);
CREATE INDEX idx_f_a130_03 ON sskadminuser.f_a130 (cust_no);
CREATE INDEX idx_f_a130_04 ON sskadminuser.f_a130 (session_id);
CREATE INDEX idx_f_a130_05 ON sskadminuser.f_a130 (session_get_dt_tm);
CREATE INDEX idx_f_a130_06 ON sskadminuser.f_a130 (update_date,register_date);
-- END TABLE : sskadminuser.f_a130  --

-- START TABLE : sskadminuser.f_a200  --
CREATE TABLE sskadminuser.f_a200(
send_dt_tm TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL,
site_kbn CHAR(1),
cust_no INT,
session_id VARCHAR(32),
session_get_dt_tm TIMESTAMP(0) WITHOUT TIME ZONE,
core_sys_send_data VARCHAR(4000),
core_sys_rcv_data VARCHAR(4000),
core_sys_send_rslt_flg CHAR(1),
update_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
register_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
update_user_cd VARCHAR(64) NOT NULL,
register_user_cd VARCHAR(64) NOT NULL
);
-- ADD COLUMN
COMMENT ON TABLE sskadminuser.f_a200 IS 'A200伝票';
COMMENT ON COLUMN sskadminuser.f_a200.send_dt_tm IS '送信日時';
COMMENT ON COLUMN sskadminuser.f_a200.site_kbn IS 'サイト区分';
COMMENT ON COLUMN sskadminuser.f_a200.cust_no IS '会員番号';
COMMENT ON COLUMN sskadminuser.f_a200.session_id IS 'セッションID';
COMMENT ON COLUMN sskadminuser.f_a200.session_get_dt_tm IS 'セッション取得日時';
COMMENT ON COLUMN sskadminuser.f_a200.core_sys_send_data IS '基幹送信データ';
COMMENT ON COLUMN sskadminuser.f_a200.core_sys_rcv_data IS '基幹受信データ';
COMMENT ON COLUMN sskadminuser.f_a200.core_sys_send_rslt_flg IS '基幹送信結果フラグ';
COMMENT ON COLUMN sskadminuser.f_a200.update_date IS '更新日時';
COMMENT ON COLUMN sskadminuser.f_a200.register_date IS '登録日時';
COMMENT ON COLUMN sskadminuser.f_a200.update_user_cd IS '更新者';
COMMENT ON COLUMN sskadminuser.f_a200.register_user_cd IS '登録者';
-- CREATE INDEX 
CREATE INDEX idx_f_a200_01 ON sskadminuser.f_a200 (send_dt_tm);
CREATE INDEX idx_f_a200_02 ON sskadminuser.f_a200 (site_kbn);
CREATE INDEX idx_f_a200_03 ON sskadminuser.f_a200 (cust_no);
CREATE INDEX idx_f_a200_04 ON sskadminuser.f_a200 (session_id);
CREATE INDEX idx_f_a200_05 ON sskadminuser.f_a200 (session_get_dt_tm);
CREATE INDEX idx_f_a200_06 ON sskadminuser.f_a200 (update_date,register_date);
-- END TABLE : sskadminuser.f_a200  --

-- START TABLE : sskadminuser.f_a210  --
CREATE TABLE sskadminuser.f_a210(
send_dt_tm TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL,
site_kbn CHAR(1),
cust_no INT,
session_id VARCHAR(32),
session_get_dt_tm TIMESTAMP(0) WITHOUT TIME ZONE,
core_sys_send_data VARCHAR(4000),
core_sys_rcv_data VARCHAR(4000),
core_sys_send_rslt_flg CHAR(1),
update_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
register_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
update_user_cd VARCHAR(64) NOT NULL,
register_user_cd VARCHAR(64) NOT NULL
);
-- ADD COLUMN
COMMENT ON TABLE sskadminuser.f_a210 IS 'A210伝票';
COMMENT ON COLUMN sskadminuser.f_a210.send_dt_tm IS '送信日時';
COMMENT ON COLUMN sskadminuser.f_a210.site_kbn IS 'サイト区分';
COMMENT ON COLUMN sskadminuser.f_a210.cust_no IS '会員番号';
COMMENT ON COLUMN sskadminuser.f_a210.session_id IS 'セッションID';
COMMENT ON COLUMN sskadminuser.f_a210.session_get_dt_tm IS 'セッション取得日時';
COMMENT ON COLUMN sskadminuser.f_a210.core_sys_send_data IS '基幹送信データ';
COMMENT ON COLUMN sskadminuser.f_a210.core_sys_rcv_data IS '基幹受信データ';
COMMENT ON COLUMN sskadminuser.f_a210.core_sys_send_rslt_flg IS '基幹送信結果フラグ';
COMMENT ON COLUMN sskadminuser.f_a210.update_date IS '更新日時';
COMMENT ON COLUMN sskadminuser.f_a210.register_date IS '登録日時';
COMMENT ON COLUMN sskadminuser.f_a210.update_user_cd IS '更新者';
COMMENT ON COLUMN sskadminuser.f_a210.register_user_cd IS '登録者';
-- CREATE INDEX 
CREATE INDEX idx_f_a210_01 ON sskadminuser.f_a210 (send_dt_tm);
CREATE INDEX idx_f_a210_02 ON sskadminuser.f_a210 (site_kbn);
CREATE INDEX idx_f_a210_03 ON sskadminuser.f_a210 (cust_no);
CREATE INDEX idx_f_a210_04 ON sskadminuser.f_a210 (session_id);
CREATE INDEX idx_f_a210_05 ON sskadminuser.f_a210 (session_get_dt_tm);
CREATE INDEX idx_f_a210_06 ON sskadminuser.f_a210 (update_date,register_date);
-- END TABLE : sskadminuser.f_a210  --

-- START TABLE : sskadminuser.f_a220  --
CREATE TABLE sskadminuser.f_a220(
send_dt_tm TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL,
site_kbn CHAR(1),
cust_no INT,
session_id VARCHAR(32),
session_get_dt_tm TIMESTAMP(0) WITHOUT TIME ZONE,
core_sys_send_data VARCHAR(4000),
core_sys_rcv_data VARCHAR(4000),
core_sys_send_rslt_flg CHAR(1),
update_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
register_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
update_user_cd VARCHAR(64) NOT NULL,
register_user_cd VARCHAR(64) NOT NULL
);
-- ADD COLUMN
COMMENT ON TABLE sskadminuser.f_a220 IS 'A220伝票';
COMMENT ON COLUMN sskadminuser.f_a220.send_dt_tm IS '送信日時';
COMMENT ON COLUMN sskadminuser.f_a220.site_kbn IS 'サイト区分';
COMMENT ON COLUMN sskadminuser.f_a220.cust_no IS '会員番号';
COMMENT ON COLUMN sskadminuser.f_a220.session_id IS 'セッションID';
COMMENT ON COLUMN sskadminuser.f_a220.session_get_dt_tm IS 'セッション取得日時';
COMMENT ON COLUMN sskadminuser.f_a220.core_sys_send_data IS '基幹送信データ';
COMMENT ON COLUMN sskadminuser.f_a220.core_sys_rcv_data IS '基幹受信データ';
COMMENT ON COLUMN sskadminuser.f_a220.core_sys_send_rslt_flg IS '基幹送信結果フラグ';
COMMENT ON COLUMN sskadminuser.f_a220.update_date IS '更新日時';
COMMENT ON COLUMN sskadminuser.f_a220.register_date IS '登録日時';
COMMENT ON COLUMN sskadminuser.f_a220.update_user_cd IS '更新者';
COMMENT ON COLUMN sskadminuser.f_a220.register_user_cd IS '登録者';
-- CREATE INDEX 
CREATE INDEX idx_f_a220_01 ON sskadminuser.f_a220 (send_dt_tm);
CREATE INDEX idx_f_a220_02 ON sskadminuser.f_a220 (site_kbn);
CREATE INDEX idx_f_a220_03 ON sskadminuser.f_a220 (cust_no);
CREATE INDEX idx_f_a220_04 ON sskadminuser.f_a220 (session_id);
CREATE INDEX idx_f_a220_05 ON sskadminuser.f_a220 (session_get_dt_tm);
CREATE INDEX idx_f_a220_06 ON sskadminuser.f_a220 (update_date,register_date);
-- END TABLE : sskadminuser.f_a220  --

-- START TABLE : sskadminuser.f_a230  --
CREATE TABLE sskadminuser.f_a230(
send_dt_tm TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL,
site_kbn CHAR(1),
cust_no INT,
session_id VARCHAR(32),
session_get_dt_tm TIMESTAMP(0) WITHOUT TIME ZONE,
core_sys_send_data VARCHAR(4000),
core_sys_rcv_data VARCHAR(4000),
core_sys_send_rslt_flg CHAR(1),
update_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
register_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
update_user_cd VARCHAR(64) NOT NULL,
register_user_cd VARCHAR(64) NOT NULL
);
-- ADD COLUMN
COMMENT ON TABLE sskadminuser.f_a230 IS 'A230伝票';
COMMENT ON COLUMN sskadminuser.f_a230.send_dt_tm IS '送信日時';
COMMENT ON COLUMN sskadminuser.f_a230.site_kbn IS 'サイト区分';
COMMENT ON COLUMN sskadminuser.f_a230.cust_no IS '会員番号';
COMMENT ON COLUMN sskadminuser.f_a230.session_id IS 'セッションID';
COMMENT ON COLUMN sskadminuser.f_a230.session_get_dt_tm IS 'セッション取得日時';
COMMENT ON COLUMN sskadminuser.f_a230.core_sys_send_data IS '基幹送信データ';
COMMENT ON COLUMN sskadminuser.f_a230.core_sys_rcv_data IS '基幹受信データ';
COMMENT ON COLUMN sskadminuser.f_a230.core_sys_send_rslt_flg IS '基幹送信結果フラグ';
COMMENT ON COLUMN sskadminuser.f_a230.update_date IS '更新日時';
COMMENT ON COLUMN sskadminuser.f_a230.register_date IS '登録日時';
COMMENT ON COLUMN sskadminuser.f_a230.update_user_cd IS '更新者';
COMMENT ON COLUMN sskadminuser.f_a230.register_user_cd IS '登録者';
-- CREATE INDEX 
CREATE INDEX idx_f_a230_01 ON sskadminuser.f_a230 (send_dt_tm);
CREATE INDEX idx_f_a230_02 ON sskadminuser.f_a230 (site_kbn);
CREATE INDEX idx_f_a230_03 ON sskadminuser.f_a230 (cust_no);
CREATE INDEX idx_f_a230_04 ON sskadminuser.f_a230 (session_id);
CREATE INDEX idx_f_a230_05 ON sskadminuser.f_a230 (session_get_dt_tm);
CREATE INDEX idx_f_a230_06 ON sskadminuser.f_a230 (update_date,register_date);
-- END TABLE : sskadminuser.f_a230  --

-- START TABLE : sskadminuser.f_a240  --
CREATE TABLE sskadminuser.f_a240(
send_dt_tm TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL,
site_kbn CHAR(1),
cust_no INT,
session_id VARCHAR(32),
session_get_dt_tm TIMESTAMP(0) WITHOUT TIME ZONE,
core_sys_send_data VARCHAR(4000),
core_sys_rcv_data VARCHAR(4000),
core_sys_send_rslt_flg CHAR(1),
update_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
register_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
update_user_cd VARCHAR(64) NOT NULL,
register_user_cd VARCHAR(64) NOT NULL
);
-- ADD COLUMN
COMMENT ON TABLE sskadminuser.f_a240 IS 'A240伝票';
COMMENT ON COLUMN sskadminuser.f_a240.send_dt_tm IS '送信日時';
COMMENT ON COLUMN sskadminuser.f_a240.site_kbn IS 'サイト区分';
COMMENT ON COLUMN sskadminuser.f_a240.cust_no IS '会員番号';
COMMENT ON COLUMN sskadminuser.f_a240.session_id IS 'セッションID';
COMMENT ON COLUMN sskadminuser.f_a240.session_get_dt_tm IS 'セッション取得日時';
COMMENT ON COLUMN sskadminuser.f_a240.core_sys_send_data IS '基幹送信データ';
COMMENT ON COLUMN sskadminuser.f_a240.core_sys_rcv_data IS '基幹受信データ';
COMMENT ON COLUMN sskadminuser.f_a240.core_sys_send_rslt_flg IS '基幹送信結果フラグ';
COMMENT ON COLUMN sskadminuser.f_a240.update_date IS '更新日時';
COMMENT ON COLUMN sskadminuser.f_a240.register_date IS '登録日時';
COMMENT ON COLUMN sskadminuser.f_a240.update_user_cd IS '更新者';
COMMENT ON COLUMN sskadminuser.f_a240.register_user_cd IS '登録者';
-- CREATE INDEX 
CREATE INDEX idx_f_a240_01 ON sskadminuser.f_a240 (send_dt_tm);
CREATE INDEX idx_f_a240_02 ON sskadminuser.f_a240 (site_kbn);
CREATE INDEX idx_f_a240_03 ON sskadminuser.f_a240 (cust_no);
CREATE INDEX idx_f_a240_04 ON sskadminuser.f_a240 (session_id);
CREATE INDEX idx_f_a240_05 ON sskadminuser.f_a240 (session_get_dt_tm);
CREATE INDEX idx_f_a240_06 ON sskadminuser.f_a240 (update_date,register_date);
-- END TABLE : sskadminuser.f_a240  --

-- START TABLE : sskadminuser.f_a300  --
CREATE TABLE sskadminuser.f_a300(
send_dt_tm TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL,
site_kbn CHAR(1),
cust_no INT,
session_id VARCHAR(32),
session_get_dt_tm TIMESTAMP(0) WITHOUT TIME ZONE,
core_sys_send_data VARCHAR(4000),
core_sys_rcv_data VARCHAR(4000),
core_sys_send_rslt_flg CHAR(1),
update_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
register_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
update_user_cd VARCHAR(64) NOT NULL,
register_user_cd VARCHAR(64) NOT NULL
);
-- ADD COLUMN
COMMENT ON TABLE sskadminuser.f_a300 IS 'A300伝票';
COMMENT ON COLUMN sskadminuser.f_a300.send_dt_tm IS '送信日時';
COMMENT ON COLUMN sskadminuser.f_a300.site_kbn IS 'サイト区分';
COMMENT ON COLUMN sskadminuser.f_a300.cust_no IS '会員番号';
COMMENT ON COLUMN sskadminuser.f_a300.session_id IS 'セッションID';
COMMENT ON COLUMN sskadminuser.f_a300.session_get_dt_tm IS 'セッション取得日時';
COMMENT ON COLUMN sskadminuser.f_a300.core_sys_send_data IS '基幹送信データ';
COMMENT ON COLUMN sskadminuser.f_a300.core_sys_rcv_data IS '基幹受信データ';
COMMENT ON COLUMN sskadminuser.f_a300.core_sys_send_rslt_flg IS '基幹送信結果フラグ';
COMMENT ON COLUMN sskadminuser.f_a300.update_date IS '更新日時';
COMMENT ON COLUMN sskadminuser.f_a300.register_date IS '登録日時';
COMMENT ON COLUMN sskadminuser.f_a300.update_user_cd IS '更新者';
COMMENT ON COLUMN sskadminuser.f_a300.register_user_cd IS '登録者';
-- CREATE INDEX 
CREATE INDEX idx_f_a300_01 ON sskadminuser.f_a300 (send_dt_tm);
CREATE INDEX idx_f_a300_02 ON sskadminuser.f_a300 (site_kbn);
CREATE INDEX idx_f_a300_03 ON sskadminuser.f_a300 (cust_no);
CREATE INDEX idx_f_a300_04 ON sskadminuser.f_a300 (session_id);
CREATE INDEX idx_f_a300_05 ON sskadminuser.f_a300 (session_get_dt_tm);
CREATE INDEX idx_f_a300_06 ON sskadminuser.f_a300 (update_date,register_date);
-- END TABLE : sskadminuser.f_a300  --

-- START TABLE : sskadminuser.f_a320  --
CREATE TABLE sskadminuser.f_a320(
send_dt_tm TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL,
site_kbn CHAR(1),
cust_no INT,
session_id VARCHAR(32),
session_get_dt_tm TIMESTAMP(0) WITHOUT TIME ZONE,
core_sys_send_data VARCHAR(4000),
core_sys_rcv_data VARCHAR(4000),
core_sys_send_rslt_flg CHAR(1),
update_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
register_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
update_user_cd VARCHAR(64) NOT NULL,
register_user_cd VARCHAR(64) NOT NULL
);
-- ADD COLUMN
COMMENT ON TABLE sskadminuser.f_a320 IS 'A320伝票';
COMMENT ON COLUMN sskadminuser.f_a320.send_dt_tm IS '送信日時';
COMMENT ON COLUMN sskadminuser.f_a320.site_kbn IS 'サイト区分';
COMMENT ON COLUMN sskadminuser.f_a320.cust_no IS '会員番号';
COMMENT ON COLUMN sskadminuser.f_a320.session_id IS 'セッションID';
COMMENT ON COLUMN sskadminuser.f_a320.session_get_dt_tm IS 'セッション取得日時';
COMMENT ON COLUMN sskadminuser.f_a320.core_sys_send_data IS '基幹送信データ';
COMMENT ON COLUMN sskadminuser.f_a320.core_sys_rcv_data IS '基幹受信データ';
COMMENT ON COLUMN sskadminuser.f_a320.core_sys_send_rslt_flg IS '基幹送信結果フラグ';
COMMENT ON COLUMN sskadminuser.f_a320.update_date IS '更新日時';
COMMENT ON COLUMN sskadminuser.f_a320.register_date IS '登録日時';
COMMENT ON COLUMN sskadminuser.f_a320.update_user_cd IS '更新者';
COMMENT ON COLUMN sskadminuser.f_a320.register_user_cd IS '登録者';
-- CREATE INDEX 
CREATE INDEX idx_f_a320_01 ON sskadminuser.f_a320 (send_dt_tm);
CREATE INDEX idx_f_a320_02 ON sskadminuser.f_a320 (site_kbn);
CREATE INDEX idx_f_a320_03 ON sskadminuser.f_a320 (cust_no);
CREATE INDEX idx_f_a320_04 ON sskadminuser.f_a320 (session_id);
CREATE INDEX idx_f_a320_05 ON sskadminuser.f_a320 (session_get_dt_tm);
CREATE INDEX idx_f_a320_06 ON sskadminuser.f_a320 (update_date,register_date);
-- END TABLE : sskadminuser.f_a320  --

-- START TABLE : sskadminuser.f_a400  --
CREATE TABLE sskadminuser.f_a400(
send_dt_tm TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL,
site_kbn CHAR(1),
cust_no INT,
session_id VARCHAR(32),
session_get_dt_tm TIMESTAMP(0) WITHOUT TIME ZONE,
core_sys_send_data VARCHAR(4000),
core_sys_rcv_data VARCHAR(4000),
core_sys_send_rslt_flg CHAR(1),
update_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
register_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
update_user_cd VARCHAR(64) NOT NULL,
register_user_cd VARCHAR(64) NOT NULL
);
-- ADD COLUMN
COMMENT ON TABLE sskadminuser.f_a400 IS 'A400伝票';
COMMENT ON COLUMN sskadminuser.f_a400.send_dt_tm IS '送信日時';
COMMENT ON COLUMN sskadminuser.f_a400.site_kbn IS 'サイト区分';
COMMENT ON COLUMN sskadminuser.f_a400.cust_no IS '会員番号';
COMMENT ON COLUMN sskadminuser.f_a400.session_id IS 'セッションID';
COMMENT ON COLUMN sskadminuser.f_a400.session_get_dt_tm IS 'セッション取得日時';
COMMENT ON COLUMN sskadminuser.f_a400.core_sys_send_data IS '基幹送信データ';
COMMENT ON COLUMN sskadminuser.f_a400.core_sys_rcv_data IS '基幹受信データ';
COMMENT ON COLUMN sskadminuser.f_a400.core_sys_send_rslt_flg IS '基幹送信結果フラグ';
COMMENT ON COLUMN sskadminuser.f_a400.update_date IS '更新日時';
COMMENT ON COLUMN sskadminuser.f_a400.register_date IS '登録日時';
COMMENT ON COLUMN sskadminuser.f_a400.update_user_cd IS '更新者';
COMMENT ON COLUMN sskadminuser.f_a400.register_user_cd IS '登録者';
-- CREATE INDEX 
CREATE INDEX idx_f_a400_01 ON sskadminuser.f_a400 (send_dt_tm);
CREATE INDEX idx_f_a400_02 ON sskadminuser.f_a400 (site_kbn);
CREATE INDEX idx_f_a400_03 ON sskadminuser.f_a400 (cust_no);
CREATE INDEX idx_f_a400_04 ON sskadminuser.f_a400 (session_id);
CREATE INDEX idx_f_a400_05 ON sskadminuser.f_a400 (session_get_dt_tm);
CREATE INDEX idx_f_a400_06 ON sskadminuser.f_a400 (update_date,register_date);
-- END TABLE : sskadminuser.f_a400  --

-- START TABLE : sskadminuser.f_a500  --
CREATE TABLE sskadminuser.f_a500(
send_dt_tm TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL,
site_kbn CHAR(1),
cust_no INT,
session_id VARCHAR(32),
session_get_dt_tm TIMESTAMP(0) WITHOUT TIME ZONE,
core_sys_send_data VARCHAR(4000),
core_sys_rcv_data VARCHAR(4000),
core_sys_send_rslt_flg CHAR(1),
update_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
register_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
update_user_cd VARCHAR(64) NOT NULL,
register_user_cd VARCHAR(64) NOT NULL
);
-- ADD COLUMN
COMMENT ON TABLE sskadminuser.f_a500 IS 'A500伝票';
COMMENT ON COLUMN sskadminuser.f_a500.send_dt_tm IS '送信日時';
COMMENT ON COLUMN sskadminuser.f_a500.site_kbn IS 'サイト区分';
COMMENT ON COLUMN sskadminuser.f_a500.cust_no IS '会員番号';
COMMENT ON COLUMN sskadminuser.f_a500.session_id IS 'セッションID';
COMMENT ON COLUMN sskadminuser.f_a500.session_get_dt_tm IS 'セッション取得日時';
COMMENT ON COLUMN sskadminuser.f_a500.core_sys_send_data IS '基幹送信データ';
COMMENT ON COLUMN sskadminuser.f_a500.core_sys_rcv_data IS '基幹受信データ';
COMMENT ON COLUMN sskadminuser.f_a500.core_sys_send_rslt_flg IS '基幹送信結果フラグ';
COMMENT ON COLUMN sskadminuser.f_a500.update_date IS '更新日時';
COMMENT ON COLUMN sskadminuser.f_a500.register_date IS '登録日時';
COMMENT ON COLUMN sskadminuser.f_a500.update_user_cd IS '更新者';
COMMENT ON COLUMN sskadminuser.f_a500.register_user_cd IS '登録者';
-- CREATE INDEX 
CREATE INDEX idx_f_a500_01 ON sskadminuser.f_a500 (send_dt_tm);
CREATE INDEX idx_f_a500_02 ON sskadminuser.f_a500 (site_kbn);
CREATE INDEX idx_f_a500_03 ON sskadminuser.f_a500 (cust_no);
CREATE INDEX idx_f_a500_04 ON sskadminuser.f_a500 (session_id);
CREATE INDEX idx_f_a500_05 ON sskadminuser.f_a500 (session_get_dt_tm);
CREATE INDEX idx_f_a500_06 ON sskadminuser.f_a500 (update_date,register_date);
-- END TABLE : sskadminuser.f_a500  --

-- START TABLE : sskadminuser.f_a600  --
CREATE TABLE sskadminuser.f_a600(
send_dt_tm TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL,
site_kbn CHAR(1),
cust_no INT,
session_id VARCHAR(32),
session_get_dt_tm TIMESTAMP(0) WITHOUT TIME ZONE,
core_sys_send_data VARCHAR(4000),
core_sys_rcv_data VARCHAR(4000),
core_sys_send_rslt_flg CHAR(1),
update_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
register_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
update_user_cd VARCHAR(64) NOT NULL,
register_user_cd VARCHAR(64) NOT NULL
);
-- ADD COLUMN
COMMENT ON TABLE sskadminuser.f_a600 IS 'A600伝票';
COMMENT ON COLUMN sskadminuser.f_a600.send_dt_tm IS '送信日時';
COMMENT ON COLUMN sskadminuser.f_a600.site_kbn IS 'サイト区分';
COMMENT ON COLUMN sskadminuser.f_a600.cust_no IS '会員番号';
COMMENT ON COLUMN sskadminuser.f_a600.session_id IS 'セッションID';
COMMENT ON COLUMN sskadminuser.f_a600.session_get_dt_tm IS 'セッション取得日時';
COMMENT ON COLUMN sskadminuser.f_a600.core_sys_send_data IS '基幹送信データ';
COMMENT ON COLUMN sskadminuser.f_a600.core_sys_rcv_data IS '基幹受信データ';
COMMENT ON COLUMN sskadminuser.f_a600.core_sys_send_rslt_flg IS '基幹送信結果フラグ';
COMMENT ON COLUMN sskadminuser.f_a600.update_date IS '更新日時';
COMMENT ON COLUMN sskadminuser.f_a600.register_date IS '登録日時';
COMMENT ON COLUMN sskadminuser.f_a600.update_user_cd IS '更新者';
COMMENT ON COLUMN sskadminuser.f_a600.register_user_cd IS '登録者';
-- CREATE INDEX 
CREATE INDEX idx_f_a600_01 ON sskadminuser.f_a600 (send_dt_tm);
CREATE INDEX idx_f_a600_02 ON sskadminuser.f_a600 (site_kbn);
CREATE INDEX idx_f_a600_03 ON sskadminuser.f_a600 (cust_no);
CREATE INDEX idx_f_a600_04 ON sskadminuser.f_a600 (session_id);
CREATE INDEX idx_f_a600_05 ON sskadminuser.f_a600 (session_get_dt_tm);
CREATE INDEX idx_f_a600_06 ON sskadminuser.f_a600 (update_date,register_date);
-- END TABLE : sskadminuser.f_a600  --

-- START TABLE : sskadminuser.f_a610  --
CREATE TABLE sskadminuser.f_a610(
send_dt_tm TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL,
site_kbn CHAR(1),
cust_no INT,
session_id VARCHAR(32),
session_get_dt_tm TIMESTAMP(0) WITHOUT TIME ZONE,
core_sys_send_data VARCHAR(4000),
core_sys_rcv_data VARCHAR(4000),
core_sys_send_rslt_flg CHAR(1),
update_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
register_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
update_user_cd VARCHAR(64) NOT NULL,
register_user_cd VARCHAR(64) NOT NULL
);
-- ADD COLUMN
COMMENT ON TABLE sskadminuser.f_a610 IS 'A610伝票';
COMMENT ON COLUMN sskadminuser.f_a610.send_dt_tm IS '送信日時';
COMMENT ON COLUMN sskadminuser.f_a610.site_kbn IS 'サイト区分';
COMMENT ON COLUMN sskadminuser.f_a610.cust_no IS '会員番号';
COMMENT ON COLUMN sskadminuser.f_a610.session_id IS 'セッションID';
COMMENT ON COLUMN sskadminuser.f_a610.session_get_dt_tm IS 'セッション取得日時';
COMMENT ON COLUMN sskadminuser.f_a610.core_sys_send_data IS '基幹送信データ';
COMMENT ON COLUMN sskadminuser.f_a610.core_sys_rcv_data IS '基幹受信データ';
COMMENT ON COLUMN sskadminuser.f_a610.core_sys_send_rslt_flg IS '基幹送信結果フラグ';
COMMENT ON COLUMN sskadminuser.f_a610.update_date IS '更新日時';
COMMENT ON COLUMN sskadminuser.f_a610.register_date IS '登録日時';
COMMENT ON COLUMN sskadminuser.f_a610.update_user_cd IS '更新者';
COMMENT ON COLUMN sskadminuser.f_a610.register_user_cd IS '登録者';
-- CREATE INDEX 
CREATE INDEX idx_f_a610_01 ON sskadminuser.f_a610 (send_dt_tm);
CREATE INDEX idx_f_a610_02 ON sskadminuser.f_a610 (site_kbn);
CREATE INDEX idx_f_a610_03 ON sskadminuser.f_a610 (cust_no);
CREATE INDEX idx_f_a610_04 ON sskadminuser.f_a610 (session_id);
CREATE INDEX idx_f_a610_05 ON sskadminuser.f_a610 (session_get_dt_tm);
CREATE INDEX idx_f_a610_06 ON sskadminuser.f_a610 (update_date,register_date);
-- END TABLE : sskadminuser.f_a610  --

-- START TABLE : sskadminuser.f_a900  --
CREATE TABLE sskadminuser.f_a900(
send_dt_tm TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL,
site_kbn CHAR(1),
cust_no INT,
session_id VARCHAR(32),
session_get_dt_tm TIMESTAMP(0) WITHOUT TIME ZONE,
core_sys_send_data VARCHAR(4000),
core_sys_rcv_data VARCHAR(4000),
core_sys_send_rslt_flg CHAR(1),
update_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
register_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
update_user_cd VARCHAR(64) NOT NULL,
register_user_cd VARCHAR(64) NOT NULL
);
-- ADD COLUMN
COMMENT ON TABLE sskadminuser.f_a900 IS 'A900伝票';
COMMENT ON COLUMN sskadminuser.f_a900.send_dt_tm IS '送信日時';
COMMENT ON COLUMN sskadminuser.f_a900.site_kbn IS 'サイト区分';
COMMENT ON COLUMN sskadminuser.f_a900.cust_no IS '会員番号';
COMMENT ON COLUMN sskadminuser.f_a900.session_id IS 'セッションID';
COMMENT ON COLUMN sskadminuser.f_a900.session_get_dt_tm IS 'セッション取得日時';
COMMENT ON COLUMN sskadminuser.f_a900.core_sys_send_data IS '基幹送信データ';
COMMENT ON COLUMN sskadminuser.f_a900.core_sys_rcv_data IS '基幹受信データ';
COMMENT ON COLUMN sskadminuser.f_a900.core_sys_send_rslt_flg IS '基幹送信結果フラグ';
COMMENT ON COLUMN sskadminuser.f_a900.update_date IS '更新日時';
COMMENT ON COLUMN sskadminuser.f_a900.register_date IS '登録日時';
COMMENT ON COLUMN sskadminuser.f_a900.update_user_cd IS '更新者';
COMMENT ON COLUMN sskadminuser.f_a900.register_user_cd IS '登録者';
-- CREATE INDEX 
CREATE INDEX idx_f_a900_01 ON sskadminuser.f_a900 (send_dt_tm);
CREATE INDEX idx_f_a900_02 ON sskadminuser.f_a900 (site_kbn);
CREATE INDEX idx_f_a900_03 ON sskadminuser.f_a900 (cust_no);
CREATE INDEX idx_f_a900_04 ON sskadminuser.f_a900 (session_id);
CREATE INDEX idx_f_a900_05 ON sskadminuser.f_a900 (session_get_dt_tm);
CREATE INDEX idx_f_a900_06 ON sskadminuser.f_a900 (update_date,register_date);
-- END TABLE : sskadminuser.f_a900  --

-- START TABLE : sskadminuser.f_a910  --
CREATE TABLE sskadminuser.f_a910(
send_dt_tm TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL,
site_kbn CHAR(1),
cust_no INT,
session_id VARCHAR(32),
session_get_dt_tm TIMESTAMP(0) WITHOUT TIME ZONE,
core_sys_send_data VARCHAR(4000),
core_sys_rcv_data VARCHAR(4000),
core_sys_send_rslt_flg CHAR(1),
update_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
register_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
update_user_cd VARCHAR(64) NOT NULL,
register_user_cd VARCHAR(64) NOT NULL
);
-- ADD COLUMN
COMMENT ON TABLE sskadminuser.f_a910 IS 'A910伝票';
COMMENT ON COLUMN sskadminuser.f_a910.send_dt_tm IS '送信日時';
COMMENT ON COLUMN sskadminuser.f_a910.site_kbn IS 'サイト区分';
COMMENT ON COLUMN sskadminuser.f_a910.cust_no IS '会員番号';
COMMENT ON COLUMN sskadminuser.f_a910.session_id IS 'セッションID';
COMMENT ON COLUMN sskadminuser.f_a910.session_get_dt_tm IS 'セッション取得日時';
COMMENT ON COLUMN sskadminuser.f_a910.core_sys_send_data IS '基幹送信データ';
COMMENT ON COLUMN sskadminuser.f_a910.core_sys_rcv_data IS '基幹受信データ';
COMMENT ON COLUMN sskadminuser.f_a910.core_sys_send_rslt_flg IS '基幹送信結果フラグ';
COMMENT ON COLUMN sskadminuser.f_a910.update_date IS '更新日時';
COMMENT ON COLUMN sskadminuser.f_a910.register_date IS '登録日時';
COMMENT ON COLUMN sskadminuser.f_a910.update_user_cd IS '更新者';
COMMENT ON COLUMN sskadminuser.f_a910.register_user_cd IS '登録者';
-- CREATE INDEX 
CREATE INDEX idx_f_a910_01 ON sskadminuser.f_a910 (send_dt_tm);
CREATE INDEX idx_f_a910_02 ON sskadminuser.f_a910 (site_kbn);
CREATE INDEX idx_f_a910_03 ON sskadminuser.f_a910 (cust_no);
CREATE INDEX idx_f_a910_04 ON sskadminuser.f_a910 (session_id);
CREATE INDEX idx_f_a910_05 ON sskadminuser.f_a910 (session_get_dt_tm);
CREATE INDEX idx_f_a910_06 ON sskadminuser.f_a910 (update_date,register_date);
-- END TABLE : sskadminuser.f_a910  --

-- START TABLE : sskadminuser.f_a920  --
CREATE TABLE sskadminuser.f_a920(
send_dt_tm TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL,
site_kbn CHAR(1),
cust_no INT,
session_id VARCHAR(32),
session_get_dt_tm TIMESTAMP(0) WITHOUT TIME ZONE,
core_sys_send_data VARCHAR(4000),
core_sys_rcv_data VARCHAR(4000),
core_sys_send_rslt_flg CHAR(1),
update_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
register_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
update_user_cd VARCHAR(64) NOT NULL,
register_user_cd VARCHAR(64) NOT NULL
);
-- ADD COLUMN
COMMENT ON TABLE sskadminuser.f_a920 IS 'A920伝票';
COMMENT ON COLUMN sskadminuser.f_a920.send_dt_tm IS '送信日時';
COMMENT ON COLUMN sskadminuser.f_a920.site_kbn IS 'サイト区分';
COMMENT ON COLUMN sskadminuser.f_a920.cust_no IS '会員番号';
COMMENT ON COLUMN sskadminuser.f_a920.session_id IS 'セッションID';
COMMENT ON COLUMN sskadminuser.f_a920.session_get_dt_tm IS 'セッション取得日時';
COMMENT ON COLUMN sskadminuser.f_a920.core_sys_send_data IS '基幹送信データ';
COMMENT ON COLUMN sskadminuser.f_a920.core_sys_rcv_data IS '基幹受信データ';
COMMENT ON COLUMN sskadminuser.f_a920.core_sys_send_rslt_flg IS '基幹送信結果フラグ';
COMMENT ON COLUMN sskadminuser.f_a920.update_date IS '更新日時';
COMMENT ON COLUMN sskadminuser.f_a920.register_date IS '登録日時';
COMMENT ON COLUMN sskadminuser.f_a920.update_user_cd IS '更新者';
COMMENT ON COLUMN sskadminuser.f_a920.register_user_cd IS '登録者';
-- CREATE INDEX 
CREATE INDEX idx_f_a920_01 ON sskadminuser.f_a920 (send_dt_tm);
CREATE INDEX idx_f_a920_02 ON sskadminuser.f_a920 (site_kbn);
CREATE INDEX idx_f_a920_03 ON sskadminuser.f_a920 (cust_no);
CREATE INDEX idx_f_a920_04 ON sskadminuser.f_a920 (session_id);
CREATE INDEX idx_f_a920_05 ON sskadminuser.f_a920 (session_get_dt_tm);
CREATE INDEX idx_f_a920_06 ON sskadminuser.f_a920 (update_date,register_date);
-- END TABLE : sskadminuser.f_a920  --

-- START TABLE : sskadminuser.f_a930  --
CREATE TABLE sskadminuser.f_a930(
send_dt_tm TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL,
site_kbn CHAR(1),
cust_no INT,
session_id VARCHAR(32),
session_get_dt_tm TIMESTAMP(0) WITHOUT TIME ZONE,
core_sys_send_data VARCHAR(4000),
core_sys_rcv_data VARCHAR(4000),
core_sys_send_rslt_flg CHAR(1),
update_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
register_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
update_user_cd VARCHAR(64) NOT NULL,
register_user_cd VARCHAR(64) NOT NULL
);
-- ADD COLUMN
COMMENT ON TABLE sskadminuser.f_a930 IS 'A930伝票';
COMMENT ON COLUMN sskadminuser.f_a930.send_dt_tm IS '送信日時';
COMMENT ON COLUMN sskadminuser.f_a930.site_kbn IS 'サイト区分';
COMMENT ON COLUMN sskadminuser.f_a930.cust_no IS '会員番号';
COMMENT ON COLUMN sskadminuser.f_a930.session_id IS 'セッションID';
COMMENT ON COLUMN sskadminuser.f_a930.session_get_dt_tm IS 'セッション取得日時';
COMMENT ON COLUMN sskadminuser.f_a930.core_sys_send_data IS '基幹送信データ';
COMMENT ON COLUMN sskadminuser.f_a930.core_sys_rcv_data IS '基幹受信データ';
COMMENT ON COLUMN sskadminuser.f_a930.core_sys_send_rslt_flg IS '基幹送信結果フラグ';
COMMENT ON COLUMN sskadminuser.f_a930.update_date IS '更新日時';
COMMENT ON COLUMN sskadminuser.f_a930.register_date IS '登録日時';
COMMENT ON COLUMN sskadminuser.f_a930.update_user_cd IS '更新者';
COMMENT ON COLUMN sskadminuser.f_a930.register_user_cd IS '登録者';
-- CREATE INDEX 
CREATE INDEX idx_f_a930_01 ON sskadminuser.f_a930 (send_dt_tm);
CREATE INDEX idx_f_a930_02 ON sskadminuser.f_a930 (site_kbn);
CREATE INDEX idx_f_a930_03 ON sskadminuser.f_a930 (cust_no);
CREATE INDEX idx_f_a930_04 ON sskadminuser.f_a930 (session_id);
CREATE INDEX idx_f_a930_05 ON sskadminuser.f_a930 (session_get_dt_tm);
CREATE INDEX idx_f_a930_06 ON sskadminuser.f_a930 (update_date,register_date);
-- END TABLE : sskadminuser.f_a930  --

-- START TABLE : sskadminuser.f_advice_html  --
CREATE TABLE sskadminuser.f_advice_html(
advice_html_cd DOUBLE PRECISION NOT NULL,
voice_consul_cd DOUBLE PRECISION NOT NULL,
advice_html_key CHAR(12) NOT NULL,
flower_cd DOUBLE PRECISION NOT NULL,
background_kbn INT NOT NULL DEFAULT 1,
greet_sente VARCHAR(2000),
register_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
update_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
update_user_cd VARCHAR(64) NOT NULL,
register_user_cd VARCHAR(64) NOT NULL,
bs_kbn CHAR(2),
cust_no INT,
mail_send_dt TIMESTAMP(0) WITHOUT TIME ZONE,
CONSTRAINT pk_f_advice_html PRIMARY KEY (advice_html_cd)
);
-- ADD COLUMN
COMMENT ON TABLE sskadminuser.f_advice_html IS 'アドバイスHTML伝票';
COMMENT ON COLUMN sskadminuser.f_advice_html.advice_html_cd IS 'アドバイスHTMLコード';
COMMENT ON COLUMN sskadminuser.f_advice_html.voice_consul_cd IS 'ご意見・ご相談コード';
COMMENT ON COLUMN sskadminuser.f_advice_html.advice_html_key IS 'アドバイスHTMLキー';
COMMENT ON COLUMN sskadminuser.f_advice_html.flower_cd IS '花コード';
COMMENT ON COLUMN sskadminuser.f_advice_html.background_kbn IS '背景区分';
COMMENT ON COLUMN sskadminuser.f_advice_html.greet_sente IS '挨拶文';
COMMENT ON COLUMN sskadminuser.f_advice_html.register_date IS '登録日時';
COMMENT ON COLUMN sskadminuser.f_advice_html.update_date IS '更新日時';
COMMENT ON COLUMN sskadminuser.f_advice_html.update_user_cd IS '更新者';
COMMENT ON COLUMN sskadminuser.f_advice_html.register_user_cd IS '登録者';
COMMENT ON COLUMN sskadminuser.f_advice_html.bs_kbn IS '業務区分';
COMMENT ON COLUMN sskadminuser.f_advice_html.cust_no IS '会員番号';
COMMENT ON COLUMN sskadminuser.f_advice_html.mail_send_dt IS 'メール送信日';
-- CREATE INDEX 
-- END TABLE : sskadminuser.f_advice_html  --

-- START TABLE : sskadminuser.f_advice_body_letter  --
CREATE TABLE sskadminuser.f_advice_body_letter(
advice_cd DOUBLE PRECISION NOT NULL,
advice_html_cd DOUBLE PRECISION NOT NULL,
advice_kbn INT NOT NULL DEFAULT 0,
advice_title VARCHAR(1000) NOT NULL,
advice_body_letter VARCHAR(4000) NOT NULL,
register_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
update_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
update_user_cd VARCHAR(64) NOT NULL,
register_user_cd VARCHAR(64) NOT NULL,
CONSTRAINT pk_f_advice_body_letter PRIMARY KEY (advice_cd)
);
-- ADD COLUMN
COMMENT ON TABLE sskadminuser.f_advice_body_letter IS 'アドバイス本文伝票';
COMMENT ON COLUMN sskadminuser.f_advice_body_letter.advice_cd IS 'アドバイスコード';
COMMENT ON COLUMN sskadminuser.f_advice_body_letter.advice_html_cd IS 'アドバイスHTMLコード';
COMMENT ON COLUMN sskadminuser.f_advice_body_letter.advice_kbn IS 'アドバイス区分';
COMMENT ON COLUMN sskadminuser.f_advice_body_letter.advice_title IS 'アドバイスタイトル';
COMMENT ON COLUMN sskadminuser.f_advice_body_letter.advice_body_letter IS 'アドバイス本文';
COMMENT ON COLUMN sskadminuser.f_advice_body_letter.register_date IS '登録日時';
COMMENT ON COLUMN sskadminuser.f_advice_body_letter.update_date IS '更新日時';
COMMENT ON COLUMN sskadminuser.f_advice_body_letter.update_user_cd IS '更新者';
COMMENT ON COLUMN sskadminuser.f_advice_body_letter.register_user_cd IS '登録者';
-- CREATE INDEX 
-- END TABLE : sskadminuser.f_advice_body_letter  --

-- START TABLE : sskadminuser.m_advice_template  --
CREATE TABLE sskadminuser.m_advice_template(
advice_template_cd DOUBLE PRECISION NOT NULL,
advice_template_grp_cd DOUBLE PRECISION NOT NULL,
advice_template_name VARCHAR(128) NOT NULL,
advice_template_body_letter VARCHAR(4000),
update_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
register_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
update_user_cd VARCHAR(64) NOT NULL,
register_user_cd VARCHAR(64) NOT NULL,
CONSTRAINT pk_m_advice_template PRIMARY KEY (advice_template_cd)
);
-- ADD COLUMN
COMMENT ON TABLE sskadminuser.m_advice_template IS 'アドバイステンプレート台帳';
COMMENT ON COLUMN sskadminuser.m_advice_template.advice_template_cd IS 'アドバイステンプレートコード';
COMMENT ON COLUMN sskadminuser.m_advice_template.advice_template_grp_cd IS 'アドバイステンプレートグループコード';
COMMENT ON COLUMN sskadminuser.m_advice_template.advice_template_name IS 'アドバイステンプレート名';
COMMENT ON COLUMN sskadminuser.m_advice_template.advice_template_body_letter IS 'アドバイステンプレート本文';
COMMENT ON COLUMN sskadminuser.m_advice_template.update_date IS '更新日時';
COMMENT ON COLUMN sskadminuser.m_advice_template.register_date IS '登録日時';
COMMENT ON COLUMN sskadminuser.m_advice_template.update_user_cd IS '更新者';
COMMENT ON COLUMN sskadminuser.m_advice_template.register_user_cd IS '登録者';
-- CREATE INDEX 
-- END TABLE : sskadminuser.m_advice_template  --

-- START TABLE : sskadminuser.m_advice_template_grp  --
CREATE TABLE sskadminuser.m_advice_template_grp(
advice_template_grp_cd DOUBLE PRECISION NOT NULL,
advice_template_grp_name VARCHAR(200),
update_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
register_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
update_user_cd VARCHAR(64) NOT NULL,
register_user_cd VARCHAR(64) NOT NULL,
CONSTRAINT pk_m_advice_template_grp PRIMARY KEY (advice_template_grp_cd)
);
-- ADD COLUMN
COMMENT ON TABLE sskadminuser.m_advice_template_grp IS 'アドバイステンプレートグループ台帳';
COMMENT ON COLUMN sskadminuser.m_advice_template_grp.advice_template_grp_cd IS 'アドバイステンプレートグループコード';
COMMENT ON COLUMN sskadminuser.m_advice_template_grp.advice_template_grp_name IS 'アドバイステンプレートグループ名';
COMMENT ON COLUMN sskadminuser.m_advice_template_grp.update_date IS '更新日時';
COMMENT ON COLUMN sskadminuser.m_advice_template_grp.register_date IS '登録日時';
COMMENT ON COLUMN sskadminuser.m_advice_template_grp.update_user_cd IS '更新者';
COMMENT ON COLUMN sskadminuser.m_advice_template_grp.register_user_cd IS '登録者';
-- CREATE INDEX 
-- END TABLE : sskadminuser.m_advice_template_grp  --

-- START TABLE : sskadminuser.m_watch_word  --
CREATE TABLE sskadminuser.m_watch_word(
cust_no INT NOT NULL,
func_kbn INT NOT NULL,
watch_word_string VARCHAR(20),
update_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
register_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
update_user_cd VARCHAR(64) NOT NULL,
register_user_cd VARCHAR(64) NOT NULL,
CONSTRAINT pk_m_watch_word PRIMARY KEY (cust_no,func_kbn)
);
-- ADD COLUMN
COMMENT ON TABLE sskadminuser.m_watch_word IS '合言葉台帳';
COMMENT ON COLUMN sskadminuser.m_watch_word.cust_no IS '会員番号';
COMMENT ON COLUMN sskadminuser.m_watch_word.func_kbn IS '機能区分';
COMMENT ON COLUMN sskadminuser.m_watch_word.watch_word_string IS '合言葉文字列';
COMMENT ON COLUMN sskadminuser.m_watch_word.update_date IS '更新日時';
COMMENT ON COLUMN sskadminuser.m_watch_word.register_date IS '登録日時';
COMMENT ON COLUMN sskadminuser.m_watch_word.update_user_cd IS '更新者';
COMMENT ON COLUMN sskadminuser.m_watch_word.register_user_cd IS '登録者';
-- CREATE INDEX 
CREATE INDEX idx_m_watch_word_01 ON sskadminuser.m_watch_word (func_kbn,watch_word_string);
CREATE INDEX idx_m_watch_word_02 ON sskadminuser.m_watch_word (update_date,register_date);
-- END TABLE : sskadminuser.m_watch_word  --

-- START TABLE : sskadminuser.m_att  --
CREATE TABLE sskadminuser.m_att(
att_cd VARCHAR(6) NOT NULL,
att_kbn CHAR(1) NOT NULL,
att_cont CHAR(60) NOT NULL,
disp_turn VARCHAR(2) NOT NULL,
disp_flg CHAR(1) NOT NULL DEFAULT '0',
update_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
register_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
update_user_cd VARCHAR(64) NOT NULL,
register_user_cd VARCHAR(64) NOT NULL,
disp_start_dt_tm TIMESTAMP(0) WITHOUT TIME ZONE,
disp_end_dt_tm TIMESTAMP(0) WITHOUT TIME ZONE,
explain VARCHAR(600),
CONSTRAINT pk_m_att PRIMARY KEY (att_cd,att_kbn)
);
-- ADD COLUMN
COMMENT ON TABLE sskadminuser.m_att IS '注意台帳';
COMMENT ON COLUMN sskadminuser.m_att.att_cd IS '注意コード';
COMMENT ON COLUMN sskadminuser.m_att.att_kbn IS '注意区分';
COMMENT ON COLUMN sskadminuser.m_att.att_cont IS '注意内容';
COMMENT ON COLUMN sskadminuser.m_att.disp_turn IS '表示順';
COMMENT ON COLUMN sskadminuser.m_att.disp_flg IS '表示フラグ';
COMMENT ON COLUMN sskadminuser.m_att.update_date IS '更新日時';
COMMENT ON COLUMN sskadminuser.m_att.register_date IS '登録日時';
COMMENT ON COLUMN sskadminuser.m_att.update_user_cd IS '更新者';
COMMENT ON COLUMN sskadminuser.m_att.register_user_cd IS '登録者';
COMMENT ON COLUMN sskadminuser.m_att.disp_start_dt_tm IS '表示開始日時';
COMMENT ON COLUMN sskadminuser.m_att.disp_end_dt_tm IS '表示終了日時';
COMMENT ON COLUMN sskadminuser.m_att.explain IS '説明';
-- CREATE INDEX 
CREATE INDEX idx_m_att_01 ON sskadminuser.m_att (update_date,register_date);
-- END TABLE : sskadminuser.m_att  --

-- START TABLE : sskadminuser.m_auto_j_stop_mbr  --
CREATE TABLE sskadminuser.m_auto_j_stop_mbr(
cust_no INT NOT NULL,
net_ju_cd CHAR(4) NOT NULL,
del_flg CHAR(1) NOT NULL DEFAULT '0',
update_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
register_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
update_user_cd VARCHAR(64) NOT NULL,
register_user_cd VARCHAR(64) NOT NULL,
CONSTRAINT pk_m_auto_j_stop_mbr PRIMARY KEY (cust_no,net_ju_cd)
);
-- ADD COLUMN
COMMENT ON TABLE sskadminuser.m_auto_j_stop_mbr IS 'オートJ停止会員台帳';
COMMENT ON COLUMN sskadminuser.m_auto_j_stop_mbr.cust_no IS '会員番号';
COMMENT ON COLUMN sskadminuser.m_auto_j_stop_mbr.net_ju_cd IS 'ネットJUコード';
COMMENT ON COLUMN sskadminuser.m_auto_j_stop_mbr.del_flg IS '削除フラグ';
COMMENT ON COLUMN sskadminuser.m_auto_j_stop_mbr.update_date IS '更新日時';
COMMENT ON COLUMN sskadminuser.m_auto_j_stop_mbr.register_date IS '登録日時';
COMMENT ON COLUMN sskadminuser.m_auto_j_stop_mbr.update_user_cd IS '更新者';
COMMENT ON COLUMN sskadminuser.m_auto_j_stop_mbr.register_user_cd IS '登録者';
-- CREATE INDEX 
CREATE INDEX idx_m_auto_j_stop_mbr_01 ON sskadminuser.m_auto_j_stop_mbr (update_date,register_date);
-- END TABLE : sskadminuser.m_auto_j_stop_mbr  --

-- START TABLE : sskadminuser.w_auto_login  --
CREATE TABLE sskadminuser.w_auto_login(
cust_no INT NOT NULL,
net_mbr_cd VARCHAR(12) NOT NULL,
auto_login_key VARCHAR(100) NOT NULL,
term_dt TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL,
update_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
register_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
update_user_cd VARCHAR(64) NOT NULL,
register_user_cd VARCHAR(64) NOT NULL,
CONSTRAINT pk_w_auto_login PRIMARY KEY (auto_login_key)
);
-- ADD COLUMN
COMMENT ON TABLE sskadminuser.w_auto_login IS '自動ログイン補助伝票';
COMMENT ON COLUMN sskadminuser.w_auto_login.cust_no IS '会員番号';
COMMENT ON COLUMN sskadminuser.w_auto_login.net_mbr_cd IS 'ネット会員コード';
COMMENT ON COLUMN sskadminuser.w_auto_login.auto_login_key IS '自動ログインキー';
COMMENT ON COLUMN sskadminuser.w_auto_login.term_dt IS '期限日';
COMMENT ON COLUMN sskadminuser.w_auto_login.update_date IS '更新日時';
COMMENT ON COLUMN sskadminuser.w_auto_login.register_date IS '登録日時';
COMMENT ON COLUMN sskadminuser.w_auto_login.update_user_cd IS '更新者';
COMMENT ON COLUMN sskadminuser.w_auto_login.register_user_cd IS '登録者';
-- CREATE INDEX 
CREATE INDEX idx_w_auto_login_01 ON sskadminuser.w_auto_login (cust_no);
CREATE INDEX idx_w_auto_login_02 ON sskadminuser.w_auto_login (net_mbr_cd);
CREATE INDEX idx_w_auto_login_03 ON sskadminuser.w_auto_login (update_date,register_date);
-- END TABLE : sskadminuser.w_auto_login  --

-- START TABLE : sskadminuser.m_auto_send_mail  --
CREATE TABLE sskadminuser.m_auto_send_mail(
auto_mail_seq BIGINT NOT NULL,
site_kbn CHAR(1) NOT NULL,
mail_name VARCHAR(256) NOT NULL,
mail_explain VARCHAR(4000) NOT NULL,
mail_subject VARCHAR(256) NOT NULL,
mail_cont VARCHAR(4000) NOT NULL,
mail_send_from VARCHAR(256) NOT NULL,
disp_turn INT NOT NULL DEFAULT 50,
update_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
register_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
update_user_cd VARCHAR(64) NOT NULL,
register_user_cd VARCHAR(64) NOT NULL,
CONSTRAINT pk_m_auto_send_mail PRIMARY KEY (auto_mail_seq,site_kbn)
);
-- ADD COLUMN
COMMENT ON TABLE sskadminuser.m_auto_send_mail IS '自動送信メール台帳';
COMMENT ON COLUMN sskadminuser.m_auto_send_mail.auto_mail_seq IS '自動メール連番';
COMMENT ON COLUMN sskadminuser.m_auto_send_mail.site_kbn IS 'サイト区分';
COMMENT ON COLUMN sskadminuser.m_auto_send_mail.mail_name IS 'メール名';
COMMENT ON COLUMN sskadminuser.m_auto_send_mail.mail_explain IS 'メール説明';
COMMENT ON COLUMN sskadminuser.m_auto_send_mail.mail_subject IS 'メール件名';
COMMENT ON COLUMN sskadminuser.m_auto_send_mail.mail_cont IS 'メール内容';
COMMENT ON COLUMN sskadminuser.m_auto_send_mail.mail_send_from IS 'メール送信元';
COMMENT ON COLUMN sskadminuser.m_auto_send_mail.disp_turn IS '表示順';
COMMENT ON COLUMN sskadminuser.m_auto_send_mail.update_date IS '更新日時';
COMMENT ON COLUMN sskadminuser.m_auto_send_mail.register_date IS '登録日時';
COMMENT ON COLUMN sskadminuser.m_auto_send_mail.update_user_cd IS '更新者';
COMMENT ON COLUMN sskadminuser.m_auto_send_mail.register_user_cd IS '登録者';
-- CREATE INDEX 
CREATE INDEX idx_m_auto_send_mail_01 ON sskadminuser.m_auto_send_mail (disp_turn);
CREATE INDEX idx_m_auto_send_mail_02 ON sskadminuser.m_auto_send_mail (update_date,register_date);
-- END TABLE : sskadminuser.m_auto_send_mail  --

-- START TABLE : sskadminuser.m_media  --
CREATE TABLE sskadminuser.m_media(
media_cd VARCHAR(8) NOT NULL,
site_kbn CHAR(1) NOT NULL,
start_dt TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL,
end_dt TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL,
media_kbn INT NOT NULL,
media_name VARCHAR(256) NOT NULL,
disp_turn INT DEFAULT 99,
disp_flg INT NOT NULL DEFAULT 0,
update_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
register_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
update_user_cd VARCHAR(64) NOT NULL,
register_user_cd VARCHAR(64) NOT NULL,
CONSTRAINT pk_m_media PRIMARY KEY (media_cd,site_kbn)
);
-- ADD COLUMN
COMMENT ON TABLE sskadminuser.m_media IS '媒体台帳';
COMMENT ON COLUMN sskadminuser.m_media.media_cd IS '媒体コード';
COMMENT ON COLUMN sskadminuser.m_media.site_kbn IS 'サイト区分';
COMMENT ON COLUMN sskadminuser.m_media.start_dt IS '開始日';
COMMENT ON COLUMN sskadminuser.m_media.end_dt IS '終了日';
COMMENT ON COLUMN sskadminuser.m_media.media_kbn IS '媒体区分';
COMMENT ON COLUMN sskadminuser.m_media.media_name IS '媒体名称';
COMMENT ON COLUMN sskadminuser.m_media.disp_turn IS '表示順';
COMMENT ON COLUMN sskadminuser.m_media.disp_flg IS '表示フラグ';
COMMENT ON COLUMN sskadminuser.m_media.update_date IS '更新日時';
COMMENT ON COLUMN sskadminuser.m_media.register_date IS '登録日時';
COMMENT ON COLUMN sskadminuser.m_media.update_user_cd IS '更新者';
COMMENT ON COLUMN sskadminuser.m_media.register_user_cd IS '登録者';
-- CREATE INDEX 
CREATE INDEX idx_m_media_01 ON sskadminuser.m_media (start_dt,end_dt);
CREATE INDEX idx_m_media_02 ON sskadminuser.m_media (update_date,register_date);
-- END TABLE : sskadminuser.m_media  --

-- START TABLE : sskadminuser.w_cart  --
CREATE TABLE sskadminuser.w_cart(
cust_no INT NOT NULL,
item_cd VARCHAR(4) NOT NULL,
item_lvl VARCHAR(2),
item_kbn VARCHAR(1) NOT NULL,
cnt INT NOT NULL,
update_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
register_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
update_user_cd VARCHAR(64) NOT NULL,
register_user_cd VARCHAR(64) NOT NULL
);
-- ADD COLUMN
COMMENT ON TABLE sskadminuser.w_cart IS '買物かご補助伝票';
COMMENT ON COLUMN sskadminuser.w_cart.cust_no IS '会員番号';
COMMENT ON COLUMN sskadminuser.w_cart.item_cd IS '商品コード';
COMMENT ON COLUMN sskadminuser.w_cart.item_lvl IS '商品レベル';
COMMENT ON COLUMN sskadminuser.w_cart.item_kbn IS '商品区分';
COMMENT ON COLUMN sskadminuser.w_cart.cnt IS '個数';
COMMENT ON COLUMN sskadminuser.w_cart.update_date IS '更新日時';
COMMENT ON COLUMN sskadminuser.w_cart.register_date IS '登録日時';
COMMENT ON COLUMN sskadminuser.w_cart.update_user_cd IS '更新者';
COMMENT ON COLUMN sskadminuser.w_cart.register_user_cd IS '登録者';
-- CREATE INDEX 
CREATE INDEX idx_w_cart_01 ON sskadminuser.w_cart (cust_no);
CREATE INDEX idx_w_cart_02 ON sskadminuser.w_cart (update_date,register_date);
CREATE UNIQUE INDEX idx_w_cart_03 ON sskadminuser.w_cart (cust_no,item_cd,item_lvl);
-- END TABLE : sskadminuser.w_cart  --

-- START TABLE : sskadminuser.c_care_calender_follow  --
CREATE TABLE sskadminuser.c_care_calender_follow(
cust_no INT NOT NULL,
follow_stat_kbn CHAR(1) NOT NULL DEFAULT '1',
follow_cont VARCHAR(100),
update_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
register_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
update_user_cd VARCHAR(64),
register_user_cd VARCHAR(64),
CONSTRAINT pk_c_care_calender_follow PRIMARY KEY (cust_no)
);
-- ADD COLUMN
COMMENT ON TABLE sskadminuser.c_care_calender_follow IS 'お手当カレンダーフォロー管理';
COMMENT ON COLUMN sskadminuser.c_care_calender_follow.cust_no IS '会員番号';
COMMENT ON COLUMN sskadminuser.c_care_calender_follow.follow_stat_kbn IS 'フォロー状態区分';
COMMENT ON COLUMN sskadminuser.c_care_calender_follow.follow_cont IS 'フォロー内容';
COMMENT ON COLUMN sskadminuser.c_care_calender_follow.update_date IS '更新日時';
COMMENT ON COLUMN sskadminuser.c_care_calender_follow.register_date IS '登録日時';
COMMENT ON COLUMN sskadminuser.c_care_calender_follow.update_user_cd IS '更新者';
COMMENT ON COLUMN sskadminuser.c_care_calender_follow.register_user_cd IS '登録者';
-- CREATE INDEX 
CREATE INDEX idx_c_care_calender_follow_01 ON sskadminuser.c_care_calender_follow (update_date,register_date);
-- END TABLE : sskadminuser.c_care_calender_follow  --

-- START TABLE : sskadminuser.m_campgn_item  --
CREATE TABLE sskadminuser.m_campgn_item(
campgn_seq BIGINT NOT NULL,
campgn_ptn_kbn CHAR(1) NOT NULL,
item_cd VARCHAR(4) NOT NULL,
update_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
register_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
update_user_cd VARCHAR(64) NOT NULL,
register_user_cd VARCHAR(64) NOT NULL,
CONSTRAINT pk_m_campgn_item PRIMARY KEY (campgn_seq,campgn_ptn_kbn,item_cd)
);
-- ADD COLUMN
COMMENT ON TABLE sskadminuser.m_campgn_item IS 'キャンペーン商品台帳';
COMMENT ON COLUMN sskadminuser.m_campgn_item.campgn_seq IS 'キャンペーン連番';
COMMENT ON COLUMN sskadminuser.m_campgn_item.campgn_ptn_kbn IS 'キャンペーンパターン区分';
COMMENT ON COLUMN sskadminuser.m_campgn_item.item_cd IS '商品コード';
COMMENT ON COLUMN sskadminuser.m_campgn_item.update_date IS '更新日時';
COMMENT ON COLUMN sskadminuser.m_campgn_item.register_date IS '登録日時';
COMMENT ON COLUMN sskadminuser.m_campgn_item.update_user_cd IS '更新者';
COMMENT ON COLUMN sskadminuser.m_campgn_item.register_user_cd IS '登録者';
-- CREATE INDEX 
CREATE INDEX idx_m_campgn_item_01 ON sskadminuser.m_campgn_item (campgn_seq,campgn_ptn_kbn);
CREATE INDEX idx_m_campgn_item_02 ON sskadminuser.m_campgn_item (campgn_seq);
CREATE INDEX idx_m_campgn_item_03 ON sskadminuser.m_campgn_item (campgn_ptn_kbn,item_cd);
CREATE INDEX idx_m_campgn_item_04 ON sskadminuser.m_campgn_item (update_date,register_date);
-- END TABLE : sskadminuser.m_campgn_item  --

-- START TABLE : sskadminuser.m_campgn  --
CREATE TABLE sskadminuser.m_campgn(
campgn_seq BIGINT NOT NULL,
site_kbn CHAR(1) NOT NULL,
campgn_kbn CHAR(1) NOT NULL,
campgn_ptn_kbn CHAR(1) NOT NULL DEFAULT '1',
disp_flg CHAR(1) NOT NULL DEFAULT '1',
start_dt TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL,
end_dt TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL,
campgn_title VARCHAR(128),
buy_item_cd_1 VARCHAR(4),
buy_item_cd_2 VARCHAR(4),
buy_item_cd_3 VARCHAR(4),
buy_item_cd_4 VARCHAR(4),
buy_item_cd_5 VARCHAR(4),
buy_item_cd_6 VARCHAR(4),
buy_item_cd_7 VARCHAR(4),
campgn_msg VARCHAR(2000),
img_disp_flg CHAR(1) NOT NULL DEFAULT '0',
img_explain_txt VARCHAR(32),
img_param_1 VARCHAR(32) DEFAULT '80',
img_param_2 VARCHAR(32),
background_color VARCHAR(16) DEFAULT '#FFFFFF',
txt_color VARCHAR(16) DEFAULT '#423024',
link_txt_color VARCHAR(16) DEFAULT '#A7735D',
in_target_link_txt_color VARCHAR(16) DEFAULT '#FCEAD3',
visit_fin_link_txt_color VARCHAR(16) DEFAULT '#A7735D',
notice_txt VARCHAR(4000),
update_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
register_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
update_user_cd VARCHAR(64) NOT NULL,
register_user_cd VARCHAR(64) NOT NULL,
CONSTRAINT pk_m_campgn PRIMARY KEY (campgn_seq,site_kbn,campgn_kbn,campgn_ptn_kbn)
);
-- ADD COLUMN
COMMENT ON TABLE sskadminuser.m_campgn IS 'キャンペーン台帳';
COMMENT ON COLUMN sskadminuser.m_campgn.campgn_seq IS 'キャンペーン連番';
COMMENT ON COLUMN sskadminuser.m_campgn.site_kbn IS 'サイト区分';
COMMENT ON COLUMN sskadminuser.m_campgn.campgn_kbn IS 'キャンペーン区分';
COMMENT ON COLUMN sskadminuser.m_campgn.campgn_ptn_kbn IS 'キャンペーンパターン区分';
COMMENT ON COLUMN sskadminuser.m_campgn.disp_flg IS '表示フラグ';
COMMENT ON COLUMN sskadminuser.m_campgn.start_dt IS '開始日';
COMMENT ON COLUMN sskadminuser.m_campgn.end_dt IS '終了日';
COMMENT ON COLUMN sskadminuser.m_campgn.campgn_title IS 'キャンペーンタイトル';
COMMENT ON COLUMN sskadminuser.m_campgn.buy_item_cd_1 IS '購入商品コード1';
COMMENT ON COLUMN sskadminuser.m_campgn.buy_item_cd_2 IS '購入商品コード2';
COMMENT ON COLUMN sskadminuser.m_campgn.buy_item_cd_3 IS '購入商品コード3';
COMMENT ON COLUMN sskadminuser.m_campgn.buy_item_cd_4 IS '購入商品コード4';
COMMENT ON COLUMN sskadminuser.m_campgn.buy_item_cd_5 IS '購入商品コード5';
COMMENT ON COLUMN sskadminuser.m_campgn.buy_item_cd_6 IS '購入商品コード6';
COMMENT ON COLUMN sskadminuser.m_campgn.buy_item_cd_7 IS '購入商品コード7';
COMMENT ON COLUMN sskadminuser.m_campgn.campgn_msg IS 'キャンペーンメッセージ';
COMMENT ON COLUMN sskadminuser.m_campgn.img_disp_flg IS '画像表示フラグ';
COMMENT ON COLUMN sskadminuser.m_campgn.img_explain_txt IS '画像説明テキスト';
COMMENT ON COLUMN sskadminuser.m_campgn.img_param_1 IS '画像パラメータ1';
COMMENT ON COLUMN sskadminuser.m_campgn.img_param_2 IS '画像パラメータ2';
COMMENT ON COLUMN sskadminuser.m_campgn.background_color IS '背景色';
COMMENT ON COLUMN sskadminuser.m_campgn.txt_color IS 'テキスト色';
COMMENT ON COLUMN sskadminuser.m_campgn.link_txt_color IS 'リンクテキスト色';
COMMENT ON COLUMN sskadminuser.m_campgn.in_target_link_txt_color IS 'ターゲット中リンクテキスト色';
COMMENT ON COLUMN sskadminuser.m_campgn.visit_fin_link_txt_color IS '訪問済みリンクテキスト色';
COMMENT ON COLUMN sskadminuser.m_campgn.notice_txt IS 'お知らせテキスト';
COMMENT ON COLUMN sskadminuser.m_campgn.update_date IS '更新日時';
COMMENT ON COLUMN sskadminuser.m_campgn.register_date IS '登録日時';
COMMENT ON COLUMN sskadminuser.m_campgn.update_user_cd IS '更新者';
COMMENT ON COLUMN sskadminuser.m_campgn.register_user_cd IS '登録者';
-- CREATE INDEX 
CREATE INDEX idx_m_campgn_01 ON sskadminuser.m_campgn (campgn_seq,campgn_kbn,campgn_ptn_kbn,disp_flg,start_dt,end_dt);
CREATE INDEX idx_m_campgn_02 ON sskadminuser.m_campgn (campgn_kbn,campgn_ptn_kbn,disp_flg,start_dt,end_dt);
CREATE INDEX idx_m_campgn_03 ON sskadminuser.m_campgn (disp_flg,start_dt,end_dt);
CREATE INDEX idx_m_campgn_04 ON sskadminuser.m_campgn (update_date,register_date);
-- END TABLE : sskadminuser.m_campgn  --

-- START TABLE : sskadminuser.h_approval_card_input  --
CREATE TABLE sskadminuser.h_approval_card_input(
hist_seq BIGINT NOT NULL,
odr_kbn CHAR(2) NOT NULL,
odr_no BIGINT NOT NULL,
credit_corp_kbn CHAR(2),
transaction_id CHAR(12),
mbr_cd VARCHAR(128),
mbr_pwd VARCHAR(64),
dest_to_cd CHAR(7),
card_input_seq CHAR(4),
msg_cd CHAR(3),
msg_no CHAR(2),
err_cd CHAR(3),
err_dtl_cd CHAR(9),
update_date TIMESTAMP(0) WITHOUT TIME ZONE,
update_user_cd VARCHAR(64),
register_date TIMESTAMP(0) WITHOUT TIME ZONE,
register_user_cd VARCHAR(64),
CONSTRAINT pk_h_approval_card_input PRIMARY KEY (hist_seq)
);
-- ADD COLUMN
COMMENT ON TABLE sskadminuser.h_approval_card_input IS '承認後カード登録履歴';
COMMENT ON COLUMN sskadminuser.h_approval_card_input.hist_seq IS '履歴連番';
COMMENT ON COLUMN sskadminuser.h_approval_card_input.odr_kbn IS '注文区分';
COMMENT ON COLUMN sskadminuser.h_approval_card_input.odr_no IS '注文番号';
COMMENT ON COLUMN sskadminuser.h_approval_card_input.credit_corp_kbn IS '決済代行会社区分';
COMMENT ON COLUMN sskadminuser.h_approval_card_input.transaction_id IS 'トランザクションID';
COMMENT ON COLUMN sskadminuser.h_approval_card_input.mbr_cd IS '会員コード';
COMMENT ON COLUMN sskadminuser.h_approval_card_input.mbr_pwd IS '会員パスワード';
COMMENT ON COLUMN sskadminuser.h_approval_card_input.dest_to_cd IS '仕向先コード';
COMMENT ON COLUMN sskadminuser.h_approval_card_input.card_input_seq IS 'カード登録連番';
COMMENT ON COLUMN sskadminuser.h_approval_card_input.msg_cd IS 'メッセージコード';
COMMENT ON COLUMN sskadminuser.h_approval_card_input.msg_no IS 'メッセージ番号';
COMMENT ON COLUMN sskadminuser.h_approval_card_input.err_cd IS 'エラーコード';
COMMENT ON COLUMN sskadminuser.h_approval_card_input.err_dtl_cd IS 'エラー詳細コード';
COMMENT ON COLUMN sskadminuser.h_approval_card_input.update_date IS '更新日時';
COMMENT ON COLUMN sskadminuser.h_approval_card_input.update_user_cd IS '更新者';
COMMENT ON COLUMN sskadminuser.h_approval_card_input.register_date IS '登録日時';
COMMENT ON COLUMN sskadminuser.h_approval_card_input.register_user_cd IS '登録者';
-- CREATE INDEX 
-- END TABLE : sskadminuser.h_approval_card_input  --

-- START TABLE : sskadminuser.h_card_authori  --
CREATE TABLE sskadminuser.h_card_authori(
odr_seq BIGINT NOT NULL,
credit_corp_kbn CHAR(2),
trade_dt CHAR(14),
transaction_id CHAR(28),
mbr_cd CHAR(32),
trade_cd CHAR(32),
trade_pwd CHAR(32),
order_cd CHAR(27),
dest_to_cd CHAR(7),
approval_no CHAR(7),
mbr_store_cd CHAR(13),
bank_reply_cd CHAR(10),
bat_proc_cd CHAR(10),
acs_call_judge CHAR(1),
three_dimensions_auth_input_scr_url VARCHAR(256),
three_dimensions_auth_req_telegram VARCHAR(256),
session_id CHAR(32),
msg_digest VARCHAR(256),
msg_cd CHAR(3),
msg_no CHAR(2),
err_cd CHAR(3),
err_dtl_cd CHAR(9),
update_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
update_user_cd VARCHAR(64),
register_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
register_user_cd VARCHAR(64),
CONSTRAINT pk_h_card_authori PRIMARY KEY (odr_seq)
);
-- ADD COLUMN
COMMENT ON TABLE sskadminuser.h_card_authori IS 'カードオーソリ履歴';
COMMENT ON COLUMN sskadminuser.h_card_authori.odr_seq IS '注文連番';
COMMENT ON COLUMN sskadminuser.h_card_authori.credit_corp_kbn IS '決済代行会社区分';
COMMENT ON COLUMN sskadminuser.h_card_authori.trade_dt IS '取引日';
COMMENT ON COLUMN sskadminuser.h_card_authori.transaction_id IS 'トランザクションID';
COMMENT ON COLUMN sskadminuser.h_card_authori.mbr_cd IS '会員コード';
COMMENT ON COLUMN sskadminuser.h_card_authori.trade_cd IS '取引コード';
COMMENT ON COLUMN sskadminuser.h_card_authori.trade_pwd IS '取引パスワード';
COMMENT ON COLUMN sskadminuser.h_card_authori.order_cd IS 'オーダーコード';
COMMENT ON COLUMN sskadminuser.h_card_authori.dest_to_cd IS '仕向先コード';
COMMENT ON COLUMN sskadminuser.h_card_authori.approval_no IS '承認番号';
COMMENT ON COLUMN sskadminuser.h_card_authori.mbr_store_cd IS '加盟店コード';
COMMENT ON COLUMN sskadminuser.h_card_authori.bank_reply_cd IS '銀行返信コード';
COMMENT ON COLUMN sskadminuser.h_card_authori.bat_proc_cd IS 'バッチ処理コード';
COMMENT ON COLUMN sskadminuser.h_card_authori.acs_call_judge IS 'ACS呼出判定';
COMMENT ON COLUMN sskadminuser.h_card_authori.three_dimensions_auth_input_scr_url IS '3D認証入力画面URL';
COMMENT ON COLUMN sskadminuser.h_card_authori.three_dimensions_auth_req_telegram IS '3D認証要求電文';
COMMENT ON COLUMN sskadminuser.h_card_authori.session_id IS 'セッションID';
COMMENT ON COLUMN sskadminuser.h_card_authori.msg_digest IS 'メッセージダイジェスト';
COMMENT ON COLUMN sskadminuser.h_card_authori.msg_cd IS 'メッセージコード';
COMMENT ON COLUMN sskadminuser.h_card_authori.msg_no IS 'メッセージ番号';
COMMENT ON COLUMN sskadminuser.h_card_authori.err_cd IS 'エラーコード';
COMMENT ON COLUMN sskadminuser.h_card_authori.err_dtl_cd IS 'エラー詳細コード';
COMMENT ON COLUMN sskadminuser.h_card_authori.update_date IS '更新日時';
COMMENT ON COLUMN sskadminuser.h_card_authori.update_user_cd IS '更新者';
COMMENT ON COLUMN sskadminuser.h_card_authori.register_date IS '登録日時';
COMMENT ON COLUMN sskadminuser.h_card_authori.register_user_cd IS '登録者';
-- CREATE INDEX 
CREATE INDEX idx_h_card_authori_01 ON sskadminuser.h_card_authori (update_date,register_date);
-- END TABLE : sskadminuser.h_card_authori  --

-- START TABLE : sskadminuser.h_card_input  --
CREATE TABLE sskadminuser.h_card_input(
hist_seq BIGINT NOT NULL,
odr_kbn CHAR(2) NOT NULL,
odr_seq BIGINT NOT NULL,
credit_corp_kbn CHAR(2),
transaction_id CHAR(12),
mbr_cd VARCHAR(128),
mbr_pwd VARCHAR(64),
dest_to_cd CHAR(7),
card_input_seq CHAR(4),
msg_cd CHAR(3),
msg_no CHAR(2),
err_cd CHAR(3),
err_dtl_cd CHAR(9),
update_date TIMESTAMP(0) WITHOUT TIME ZONE,
update_user_cd VARCHAR(64),
register_date TIMESTAMP(0) WITHOUT TIME ZONE,
register_user_cd VARCHAR(64),
CONSTRAINT pk_h_card_input PRIMARY KEY (hist_seq)
);
-- ADD COLUMN
COMMENT ON TABLE sskadminuser.h_card_input IS 'カード登録履歴';
COMMENT ON COLUMN sskadminuser.h_card_input.hist_seq IS '履歴連番';
COMMENT ON COLUMN sskadminuser.h_card_input.odr_kbn IS '注文区分';
COMMENT ON COLUMN sskadminuser.h_card_input.odr_seq IS '注文連番';
COMMENT ON COLUMN sskadminuser.h_card_input.credit_corp_kbn IS '決済代行会社区分';
COMMENT ON COLUMN sskadminuser.h_card_input.transaction_id IS 'トランザクションID';
COMMENT ON COLUMN sskadminuser.h_card_input.mbr_cd IS '会員コード';
COMMENT ON COLUMN sskadminuser.h_card_input.mbr_pwd IS '会員パスワード';
COMMENT ON COLUMN sskadminuser.h_card_input.dest_to_cd IS '仕向先コード';
COMMENT ON COLUMN sskadminuser.h_card_input.card_input_seq IS 'カード登録連番';
COMMENT ON COLUMN sskadminuser.h_card_input.msg_cd IS 'メッセージコード';
COMMENT ON COLUMN sskadminuser.h_card_input.msg_no IS 'メッセージ番号';
COMMENT ON COLUMN sskadminuser.h_card_input.err_cd IS 'エラーコード';
COMMENT ON COLUMN sskadminuser.h_card_input.err_dtl_cd IS 'エラー詳細コード';
COMMENT ON COLUMN sskadminuser.h_card_input.update_date IS '更新日時';
COMMENT ON COLUMN sskadminuser.h_card_input.update_user_cd IS '更新者';
COMMENT ON COLUMN sskadminuser.h_card_input.register_date IS '登録日時';
COMMENT ON COLUMN sskadminuser.h_card_input.register_user_cd IS '登録者';
-- CREATE INDEX 
-- END TABLE : sskadminuser.h_card_input  --

-- START TABLE : sskadminuser.f_card_bin  --
CREATE TABLE sskadminuser.f_card_bin(
start_card_no CHAR(16),
end_card_no CHAR(16),
sales_to_card_no CHAR(2),
issue_base_card_no CHAR(2),
overseas_flg CHAR(2),
debit_flg CHAR(1),
bin_input_dt CHAR(8),
update_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
register_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
update_user_cd VARCHAR(64) NOT NULL,
register_user_cd VARCHAR(64) NOT NULL
);
-- ADD COLUMN
COMMENT ON TABLE sskadminuser.f_card_bin IS 'カードＢＩＮ伝票';
COMMENT ON COLUMN sskadminuser.f_card_bin.start_card_no IS '開始カード番号';
COMMENT ON COLUMN sskadminuser.f_card_bin.end_card_no IS '終了カード番号';
COMMENT ON COLUMN sskadminuser.f_card_bin.sales_to_card_no IS '売上先カード番号';
COMMENT ON COLUMN sskadminuser.f_card_bin.issue_base_card_no IS '発行元カード番号';
COMMENT ON COLUMN sskadminuser.f_card_bin.overseas_flg IS '海外フラグ';
COMMENT ON COLUMN sskadminuser.f_card_bin.debit_flg IS 'デビットフラグ';
COMMENT ON COLUMN sskadminuser.f_card_bin.bin_input_dt IS 'BIN登録日';
COMMENT ON COLUMN sskadminuser.f_card_bin.update_date IS '更新日時';
COMMENT ON COLUMN sskadminuser.f_card_bin.register_date IS '登録日時';
COMMENT ON COLUMN sskadminuser.f_card_bin.update_user_cd IS '更新者';
COMMENT ON COLUMN sskadminuser.f_card_bin.register_user_cd IS '登録者';
-- CREATE INDEX 
-- END TABLE : sskadminuser.f_card_bin  --

-- START TABLE : sskadminuser.f_skin_worry  --
CREATE TABLE sskadminuser.f_skin_worry(
master_cd INT NOT NULL,
parent_cd INT NOT NULL,
del_flg CHAR(1) DEFAULT '0',
manager_kbn CHAR(1) NOT NULL DEFAULT '0',
cust_no INT NOT NULL,
contributor VARCHAR(50) NOT NULL,
subject VARCHAR(255) NOT NULL,
body_letter TEXT,
icon INT,
skin_worry_consul_1 INT,
skin_worry_consul_2 INT,
skin_worry_consul_3 INT,
skin_worry_consul_4 INT,
skin_worry_consul_5 INT,
skin_worry_consul_6 INT,
skin_worry_consul_7 INT,
skin_worry_consul_8 INT,
skin_worry_consul_9 INT,
item_consul_1 INT,
item_consul_2 INT,
item_consul_3 INT,
item_consul_4 INT,
item_consul_5 INT,
item_consul_6 INT,
item_consul_7 INT,
item_consul_8 INT,
item_consul_9 INT,
item_consul_10 INT,
item_consul_11 INT,
item_consul_12 INT,
item_consul_13 INT,
skin_question_1 INT,
skin_question_2 INT,
skin_question_3 INT,
skin_question_4 INT,
skin_question_5 INT,
skin_question_6 INT,
age_kbn INT,
domo_hist_kbn INT,
notice_mail_rcv_flg CHAR(1) DEFAULT '0',
update_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
register_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
update_user_cd VARCHAR(64) NOT NULL,
register_user_cd VARCHAR(64) NOT NULL,
reply_num INT NOT NULL DEFAULT 0,
site_kbn CHAR(1) NOT NULL DEFAULT 1,
CONSTRAINT pk_f_skin_worry PRIMARY KEY (master_cd)
);
-- ADD COLUMN
COMMENT ON TABLE sskadminuser.f_skin_worry IS 'お肌のお悩み伝票';
COMMENT ON COLUMN sskadminuser.f_skin_worry.master_cd IS 'マスターコード';
COMMENT ON COLUMN sskadminuser.f_skin_worry.parent_cd IS '親コード';
COMMENT ON COLUMN sskadminuser.f_skin_worry.del_flg IS '削除フラグ';
COMMENT ON COLUMN sskadminuser.f_skin_worry.manager_kbn IS '管理者区分';
COMMENT ON COLUMN sskadminuser.f_skin_worry.cust_no IS '会員番号';
COMMENT ON COLUMN sskadminuser.f_skin_worry.contributor IS '投稿者';
COMMENT ON COLUMN sskadminuser.f_skin_worry.subject IS '件名';
COMMENT ON COLUMN sskadminuser.f_skin_worry.body_letter IS '本文';
COMMENT ON COLUMN sskadminuser.f_skin_worry.icon IS 'アイコン';
COMMENT ON COLUMN sskadminuser.f_skin_worry.skin_worry_consul_1 IS 'お肌のお悩みに関するご相談1';
COMMENT ON COLUMN sskadminuser.f_skin_worry.skin_worry_consul_2 IS 'お肌のお悩みに関するご相談2';
COMMENT ON COLUMN sskadminuser.f_skin_worry.skin_worry_consul_3 IS 'お肌のお悩みに関するご相談3';
COMMENT ON COLUMN sskadminuser.f_skin_worry.skin_worry_consul_4 IS 'お肌のお悩みに関するご相談4';
COMMENT ON COLUMN sskadminuser.f_skin_worry.skin_worry_consul_5 IS 'お肌のお悩みに関するご相談5';
COMMENT ON COLUMN sskadminuser.f_skin_worry.skin_worry_consul_6 IS 'お肌のお悩みに関するご相談6';
COMMENT ON COLUMN sskadminuser.f_skin_worry.skin_worry_consul_7 IS 'お肌のお悩みに関するご相談7';
COMMENT ON COLUMN sskadminuser.f_skin_worry.skin_worry_consul_8 IS 'お肌のお悩みに関するご相談8';
COMMENT ON COLUMN sskadminuser.f_skin_worry.skin_worry_consul_9 IS 'お肌のお悩みに関するご相談9';
COMMENT ON COLUMN sskadminuser.f_skin_worry.item_consul_1 IS '商品に関するご相談1';
COMMENT ON COLUMN sskadminuser.f_skin_worry.item_consul_2 IS '商品に関するご相談2';
COMMENT ON COLUMN sskadminuser.f_skin_worry.item_consul_3 IS '商品に関するご相談3';
COMMENT ON COLUMN sskadminuser.f_skin_worry.item_consul_4 IS '商品に関するご相談4';
COMMENT ON COLUMN sskadminuser.f_skin_worry.item_consul_5 IS '商品に関するご相談5';
COMMENT ON COLUMN sskadminuser.f_skin_worry.item_consul_6 IS '商品に関するご相談6';
COMMENT ON COLUMN sskadminuser.f_skin_worry.item_consul_7 IS '商品に関するご相談7';
COMMENT ON COLUMN sskadminuser.f_skin_worry.item_consul_8 IS '商品に関するご相談8';
COMMENT ON COLUMN sskadminuser.f_skin_worry.item_consul_9 IS '商品に関するご相談9';
COMMENT ON COLUMN sskadminuser.f_skin_worry.item_consul_10 IS '商品に関するご相談10';
COMMENT ON COLUMN sskadminuser.f_skin_worry.item_consul_11 IS '商品に関するご相談11';
COMMENT ON COLUMN sskadminuser.f_skin_worry.item_consul_12 IS '商品に関するご相談12';
COMMENT ON COLUMN sskadminuser.f_skin_worry.item_consul_13 IS '商品に関するご相談13';
COMMENT ON COLUMN sskadminuser.f_skin_worry.skin_question_1 IS 'どんな肌ですか？1';
COMMENT ON COLUMN sskadminuser.f_skin_worry.skin_question_2 IS 'どんな肌ですか？2';
COMMENT ON COLUMN sskadminuser.f_skin_worry.skin_question_3 IS 'どんな肌ですか？3';
COMMENT ON COLUMN sskadminuser.f_skin_worry.skin_question_4 IS 'どんな肌ですか？4';
COMMENT ON COLUMN sskadminuser.f_skin_worry.skin_question_5 IS 'どんな肌ですか？5';
COMMENT ON COLUMN sskadminuser.f_skin_worry.skin_question_6 IS 'どんな肌ですか？6';
COMMENT ON COLUMN sskadminuser.f_skin_worry.age_kbn IS '年齢区分';
COMMENT ON COLUMN sskadminuser.f_skin_worry.domo_hist_kbn IS 'ドモ歴区分';
COMMENT ON COLUMN sskadminuser.f_skin_worry.notice_mail_rcv_flg IS 'お知らせメール受取フラグ';
COMMENT ON COLUMN sskadminuser.f_skin_worry.update_date IS '更新日時';
COMMENT ON COLUMN sskadminuser.f_skin_worry.register_date IS '登録日時';
COMMENT ON COLUMN sskadminuser.f_skin_worry.update_user_cd IS '更新者';
COMMENT ON COLUMN sskadminuser.f_skin_worry.register_user_cd IS '登録者';
COMMENT ON COLUMN sskadminuser.f_skin_worry.reply_num IS '返信数';
COMMENT ON COLUMN sskadminuser.f_skin_worry.site_kbn IS 'サイト区分';
-- CREATE INDEX 
CREATE INDEX idx_f_skin_worry_01 ON sskadminuser.f_skin_worry (master_cd,parent_cd,del_flg);
CREATE INDEX idx_f_skin_worry_02 ON sskadminuser.f_skin_worry (update_date,register_date);
-- END TABLE : sskadminuser.f_skin_worry  --

-- START TABLE : sskadminuser.c_charge_sys_entry  --
CREATE TABLE sskadminuser.c_charge_sys_entry(
cust_no INT NOT NULL,
first_buy_dt_tm TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL,
charge_sys_req_kbn CHAR(2),
charge_sys_req_ans_dt_tm TIMESTAMP(0) WITHOUT TIME ZONE,
update_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
register_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
update_user_cd VARCHAR(64) NOT NULL,
register_user_cd VARCHAR(64) NOT NULL,
copy_fin_flg CHAR(1) NOT NULL DEFAULT 0,
CONSTRAINT pk_c_charge_sys_entry PRIMARY KEY (cust_no)
);
-- ADD COLUMN
COMMENT ON TABLE sskadminuser.c_charge_sys_entry IS '担当制エントリー管理';
COMMENT ON COLUMN sskadminuser.c_charge_sys_entry.cust_no IS '会員番号';
COMMENT ON COLUMN sskadminuser.c_charge_sys_entry.first_buy_dt_tm IS '初回購入日時';
COMMENT ON COLUMN sskadminuser.c_charge_sys_entry.charge_sys_req_kbn IS '担当者制希望区分';
COMMENT ON COLUMN sskadminuser.c_charge_sys_entry.charge_sys_req_ans_dt_tm IS '担当者制希望回答日時';
COMMENT ON COLUMN sskadminuser.c_charge_sys_entry.update_date IS '更新日時';
COMMENT ON COLUMN sskadminuser.c_charge_sys_entry.register_date IS '登録日時';
COMMENT ON COLUMN sskadminuser.c_charge_sys_entry.update_user_cd IS '更新者';
COMMENT ON COLUMN sskadminuser.c_charge_sys_entry.register_user_cd IS '登録者';
COMMENT ON COLUMN sskadminuser.c_charge_sys_entry.copy_fin_flg IS '転記済フラグ';
-- CREATE INDEX 
CREATE INDEX idx_c_charge_sys_entry_01 ON sskadminuser.c_charge_sys_entry (update_date,register_date);
-- END TABLE : sskadminuser.c_charge_sys_entry  --

-- START TABLE : sskadminuser.m_line_access_token  --
CREATE TABLE sskadminuser.m_line_access_token(
svc_seq VARCHAR(64) NOT NULL DEFAULT 0,
access_token VARCHAR(256) NOT NULL DEFAULT ' ',
issue_dt_tm TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
avail_term_dt_tm TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
in_avail_term_dt_tm TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
register_user_cd VARCHAR(13) NOT NULL DEFAULT ' ',
register_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
update_user_cd VARCHAR(13) NOT NULL DEFAULT ' ',
scr_upd_dt_tm TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
bat_upd_dt_tm TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
upd_cnt BIGINT NOT NULL DEFAULT 0,
upd_scr_name VARCHAR(80) NOT NULL DEFAULT ' ',
upd_bat_name VARCHAR(80) NOT NULL DEFAULT ' ',
del_flg CHAR(1) NOT NULL DEFAULT '0',
CONSTRAINT pk_m_line_access_token PRIMARY KEY (svc_seq)
);
-- ADD COLUMN
COMMENT ON TABLE sskadminuser.m_line_access_token IS 'LINEアクセストークン台帳';
COMMENT ON COLUMN sskadminuser.m_line_access_token.svc_seq IS 'サービス連番';
COMMENT ON COLUMN sskadminuser.m_line_access_token.access_token IS 'アクセストークン';
COMMENT ON COLUMN sskadminuser.m_line_access_token.issue_dt_tm IS '発行日時';
COMMENT ON COLUMN sskadminuser.m_line_access_token.avail_term_dt_tm IS '有効期限日時';
COMMENT ON COLUMN sskadminuser.m_line_access_token.in_avail_term_dt_tm IS '内部有効期限日時';
COMMENT ON COLUMN sskadminuser.m_line_access_token.register_user_cd IS '登録者';
COMMENT ON COLUMN sskadminuser.m_line_access_token.register_date IS '登録日時';
COMMENT ON COLUMN sskadminuser.m_line_access_token.update_user_cd IS '更新者';
COMMENT ON COLUMN sskadminuser.m_line_access_token.scr_upd_dt_tm IS '画面更新日時';
COMMENT ON COLUMN sskadminuser.m_line_access_token.bat_upd_dt_tm IS 'バッチ更新日時';
COMMENT ON COLUMN sskadminuser.m_line_access_token.upd_cnt IS '更新カウント';
COMMENT ON COLUMN sskadminuser.m_line_access_token.upd_scr_name IS '更新画面名';
COMMENT ON COLUMN sskadminuser.m_line_access_token.upd_bat_name IS '更新バッチ名';
COMMENT ON COLUMN sskadminuser.m_line_access_token.del_flg IS '削除フラグ';
-- CREATE INDEX 
-- END TABLE : sskadminuser.m_line_access_token  --

-- START TABLE : sskadminuser.f_mail_cre_actual  --
CREATE TABLE sskadminuser.f_mail_cre_actual(
act_seq BIGINT NOT NULL,
proc_dt TIMESTAMP(6) WITHOUT TIME ZONE NOT NULL,
charge_cd CHAR(5) NOT NULL,
actual_eva_start_tm CHAR(6) NOT NULL,
actual_eva_end_tm CHAR(6),
bill_kbn CHAR(1),
bs_scr_kbn CHAR(2),
bs_kbn CHAR(2),
eva_kbn CHAR(1),
eva_tm CHAR(6),
cust_no INT,
fixed_kbn CHAR(1) DEFAULT '0',
sync_flg CHAR(1) DEFAULT '0',
update_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
register_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
update_user_cd VARCHAR(64) NOT NULL,
register_user_cd VARCHAR(64) NOT NULL,
indiv_act_mail_send_hist_cd DOUBLE PRECISION,
CONSTRAINT pk_f_mail_cre_actual PRIMARY KEY (act_seq)
);
-- ADD COLUMN
COMMENT ON TABLE sskadminuser.f_mail_cre_actual IS 'メール作成実績伝票';
COMMENT ON COLUMN sskadminuser.f_mail_cre_actual.act_seq IS '対応連番';
COMMENT ON COLUMN sskadminuser.f_mail_cre_actual.proc_dt IS '処理日';
COMMENT ON COLUMN sskadminuser.f_mail_cre_actual.charge_cd IS '担当コード';
COMMENT ON COLUMN sskadminuser.f_mail_cre_actual.actual_eva_start_tm IS '実績評価開始時間';
COMMENT ON COLUMN sskadminuser.f_mail_cre_actual.actual_eva_end_tm IS '実績評価終了時間';
COMMENT ON COLUMN sskadminuser.f_mail_cre_actual.bill_kbn IS '請求区分';
COMMENT ON COLUMN sskadminuser.f_mail_cre_actual.bs_scr_kbn IS '業務画面区分';
COMMENT ON COLUMN sskadminuser.f_mail_cre_actual.bs_kbn IS '業務区分';
COMMENT ON COLUMN sskadminuser.f_mail_cre_actual.eva_kbn IS '評価区分';
COMMENT ON COLUMN sskadminuser.f_mail_cre_actual.eva_tm IS '評価時間';
COMMENT ON COLUMN sskadminuser.f_mail_cre_actual.cust_no IS '会員番号';
COMMENT ON COLUMN sskadminuser.f_mail_cre_actual.fixed_kbn IS '定型区分';
COMMENT ON COLUMN sskadminuser.f_mail_cre_actual.sync_flg IS '同期フラグ';
COMMENT ON COLUMN sskadminuser.f_mail_cre_actual.update_date IS '更新日時';
COMMENT ON COLUMN sskadminuser.f_mail_cre_actual.register_date IS '登録日時';
COMMENT ON COLUMN sskadminuser.f_mail_cre_actual.update_user_cd IS '更新者';
COMMENT ON COLUMN sskadminuser.f_mail_cre_actual.register_user_cd IS '登録者';
COMMENT ON COLUMN sskadminuser.f_mail_cre_actual.indiv_act_mail_send_hist_cd IS '個別対応メール送信履歴コード';
-- CREATE INDEX 
CREATE INDEX idx_f_mail_cre_actual_01 ON sskadminuser.f_mail_cre_actual (proc_dt);
CREATE INDEX idx_f_mail_cre_actual_02 ON sskadminuser.f_mail_cre_actual (charge_cd);
CREATE INDEX idx_f_mail_cre_actual_03 ON sskadminuser.f_mail_cre_actual (sync_flg);
CREATE INDEX idx_f_mail_cre_actual_04 ON sskadminuser.f_mail_cre_actual (indiv_act_mail_send_hist_cd);
CREATE INDEX idx_f_mail_cre_actual_05 ON sskadminuser.f_mail_cre_actual (update_date,register_date);
-- END TABLE : sskadminuser.f_mail_cre_actual  --

-- START TABLE : sskadminuser.m_user  --
CREATE TABLE sskadminuser.m_user(
ctrl_scr_login_cd VARCHAR(10) NOT NULL,
charge_cd VARCHAR(10) NOT NULL,
user_name VARCHAR(108) NOT NULL,
pwd VARCHAR(108) NOT NULL,
title VARCHAR(50),
authori_ty_kbn VARCHAR(100),
sign VARCHAR(4),
sex_kbn CHAR(1),
hobby VARCHAR(255),
msg VARCHAR(512),
icon INT,
update_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
register_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
update_user_cd VARCHAR(64) NOT NULL,
register_user_cd VARCHAR(64) NOT NULL,
care_calendar_charge_flg CHAR(1) DEFAULT 0,
disp_turn INT DEFAULT 0,
del_flg CHAR(1) DEFAULT 0,
CONSTRAINT pk_m_user PRIMARY KEY (ctrl_scr_login_cd)
);
-- ADD COLUMN
COMMENT ON TABLE sskadminuser.m_user IS 'ユーザ台帳';
COMMENT ON COLUMN sskadminuser.m_user.ctrl_scr_login_cd IS '管理画面ログインコード';
COMMENT ON COLUMN sskadminuser.m_user.charge_cd IS '担当コード';
COMMENT ON COLUMN sskadminuser.m_user.user_name IS 'ユーザ氏名';
COMMENT ON COLUMN sskadminuser.m_user.pwd IS 'パスワード';
COMMENT ON COLUMN sskadminuser.m_user.title IS 'タイトル';
COMMENT ON COLUMN sskadminuser.m_user.authori_ty_kbn IS '権限区分';
COMMENT ON COLUMN sskadminuser.m_user.sign IS 'シグネチャ';
COMMENT ON COLUMN sskadminuser.m_user.sex_kbn IS '性別区分';
COMMENT ON COLUMN sskadminuser.m_user.hobby IS '趣味';
COMMENT ON COLUMN sskadminuser.m_user.msg IS 'メッセージ';
COMMENT ON COLUMN sskadminuser.m_user.icon IS 'アイコン';
COMMENT ON COLUMN sskadminuser.m_user.update_date IS '更新日時';
COMMENT ON COLUMN sskadminuser.m_user.register_date IS '登録日時';
COMMENT ON COLUMN sskadminuser.m_user.update_user_cd IS '更新者';
COMMENT ON COLUMN sskadminuser.m_user.register_user_cd IS '登録者';
COMMENT ON COLUMN sskadminuser.m_user.care_calendar_charge_flg IS 'お手当カレンダー担当者フラグ';
COMMENT ON COLUMN sskadminuser.m_user.disp_turn IS '表示順';
COMMENT ON COLUMN sskadminuser.m_user.del_flg IS '削除フラグ';
-- CREATE INDEX 
CREATE INDEX idx_m_user_01 ON sskadminuser.m_user (care_calendar_charge_flg);
CREATE INDEX idx_m_user_02 ON sskadminuser.m_user (del_flg);
CREATE INDEX idx_m_user_03 ON sskadminuser.m_user (disp_turn);
CREATE INDEX idx_m_user_04 ON sskadminuser.m_user (update_date,register_date);
-- END TABLE : sskadminuser.m_user  --

-- START TABLE : sskadminuser.m_country  --
CREATE TABLE sskadminuser.m_country(
country_cd VARCHAR(10) NOT NULL,
country_name VARCHAR(40) NOT NULL,
country_r VARCHAR(20) NOT NULL,
disp_turn_flg CHAR(1) NOT NULL DEFAULT '0',
char_1 VARCHAR(120),
char_2 VARCHAR(120),
char_3 VARCHAR(120),
char_4 VARCHAR(120),
char_5 VARCHAR(120),
char_6 VARCHAR(120),
char_7 VARCHAR(120),
char_8 VARCHAR(120),
char_9 VARCHAR(120),
num_1 DECIMAL(19) NOT NULL DEFAULT 0,
num_2 DECIMAL(19) NOT NULL DEFAULT 0,
num_3 DECIMAL(19) NOT NULL DEFAULT 0,
num_4 DECIMAL(19) NOT NULL DEFAULT 0,
num_5 DECIMAL(19) NOT NULL DEFAULT 0,
num_6 DECIMAL(19) NOT NULL DEFAULT 0,
num_7 DECIMAL(19) NOT NULL DEFAULT 0,
num_8 DECIMAL(19) NOT NULL DEFAULT 0,
num_9 DECIMAL(19) NOT NULL DEFAULT 0,
update_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
register_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
update_user_cd VARCHAR(64) NOT NULL,
register_user_cd VARCHAR(64) NOT NULL,
CONSTRAINT pk_m_country PRIMARY KEY (country_cd)
);
-- ADD COLUMN
COMMENT ON TABLE sskadminuser.m_country IS '国台帳';
COMMENT ON COLUMN sskadminuser.m_country.country_cd IS '国コード';
COMMENT ON COLUMN sskadminuser.m_country.country_name IS '国名称';
COMMENT ON COLUMN sskadminuser.m_country.country_r IS '国略称';
COMMENT ON COLUMN sskadminuser.m_country.disp_turn_flg IS '表示順フラグ';
COMMENT ON COLUMN sskadminuser.m_country.char_1 IS '文字1';
COMMENT ON COLUMN sskadminuser.m_country.char_2 IS '文字2';
COMMENT ON COLUMN sskadminuser.m_country.char_3 IS '文字3';
COMMENT ON COLUMN sskadminuser.m_country.char_4 IS '文字4';
COMMENT ON COLUMN sskadminuser.m_country.char_5 IS '文字5';
COMMENT ON COLUMN sskadminuser.m_country.char_6 IS '文字6';
COMMENT ON COLUMN sskadminuser.m_country.char_7 IS '文字7';
COMMENT ON COLUMN sskadminuser.m_country.char_8 IS '文字8';
COMMENT ON COLUMN sskadminuser.m_country.char_9 IS '文字9';
COMMENT ON COLUMN sskadminuser.m_country.num_1 IS '数字1';
COMMENT ON COLUMN sskadminuser.m_country.num_2 IS '数字2';
COMMENT ON COLUMN sskadminuser.m_country.num_3 IS '数字3';
COMMENT ON COLUMN sskadminuser.m_country.num_4 IS '数字4';
COMMENT ON COLUMN sskadminuser.m_country.num_5 IS '数字5';
COMMENT ON COLUMN sskadminuser.m_country.num_6 IS '数字6';
COMMENT ON COLUMN sskadminuser.m_country.num_7 IS '数字7';
COMMENT ON COLUMN sskadminuser.m_country.num_8 IS '数字8';
COMMENT ON COLUMN sskadminuser.m_country.num_9 IS '数字9';
COMMENT ON COLUMN sskadminuser.m_country.update_date IS '更新日時';
COMMENT ON COLUMN sskadminuser.m_country.register_date IS '登録日時';
COMMENT ON COLUMN sskadminuser.m_country.update_user_cd IS '更新者';
COMMENT ON COLUMN sskadminuser.m_country.register_user_cd IS '登録者';
-- CREATE INDEX 
CREATE INDEX idx_m_country_01 ON sskadminuser.m_country (update_date,register_date);
-- END TABLE : sskadminuser.m_country  --

-- START TABLE : sskadminuser.m_credit_ctrl  --
CREATE TABLE sskadminuser.m_credit_ctrl(
credit_card_corp_cd VARCHAR(2) NOT NULL,
mainte_start_dt_tm TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL,
mainte_end_dt_tm TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL,
authori_amnt INT NOT NULL DEFAULT 1,
update_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
register_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
update_user_cd VARCHAR(64) NOT NULL,
register_user_cd VARCHAR(64) NOT NULL,
CONSTRAINT pk_m_credit_ctrl PRIMARY KEY (credit_card_corp_cd)
);
-- ADD COLUMN
COMMENT ON TABLE sskadminuser.m_credit_ctrl IS 'クレジット管理台帳';
COMMENT ON COLUMN sskadminuser.m_credit_ctrl.credit_card_corp_cd IS 'クレジットカード会社コード';
COMMENT ON COLUMN sskadminuser.m_credit_ctrl.mainte_start_dt_tm IS 'メンテナンス開始日時';
COMMENT ON COLUMN sskadminuser.m_credit_ctrl.mainte_end_dt_tm IS 'メンテナンス終了日時';
COMMENT ON COLUMN sskadminuser.m_credit_ctrl.authori_amnt IS 'オーソリ金額';
COMMENT ON COLUMN sskadminuser.m_credit_ctrl.update_date IS '更新日時';
COMMENT ON COLUMN sskadminuser.m_credit_ctrl.register_date IS '登録日時';
COMMENT ON COLUMN sskadminuser.m_credit_ctrl.update_user_cd IS '更新者';
COMMENT ON COLUMN sskadminuser.m_credit_ctrl.register_user_cd IS '登録者';
-- CREATE INDEX 
CREATE INDEX idx_m_credit_ctrl_01 ON sskadminuser.m_credit_ctrl (update_date,register_date);
-- END TABLE : sskadminuser.m_credit_ctrl  --

-- START TABLE : sskadminuser.m_credit_corp  --
CREATE TABLE sskadminuser.m_credit_corp(
credit_card_corp_cd VARCHAR(2) NOT NULL,
credit_card_corp_r VARCHAR(8) NOT NULL,
credit_card_corp_name VARCHAR(20) NOT NULL,
upper INT NOT NULL,
split_num INT NOT NULL,
bonus_all_pay_flg CHAR(1) NOT NULL,
bonus_dt VARCHAR(26) NOT NULL,
min_amnt INT NOT NULL,
revo_pay_flg CHAR(1) NOT NULL,
bonus_use_avail_start_dt_1 CHAR(8) NOT NULL,
bonus_use_avail_end_dt_1 CHAR(8) NOT NULL,
bonus_use_avail_mth_1 CHAR(2) NOT NULL,
bonus_use_avail_start_dt_2 CHAR(8) NOT NULL,
bonus_use_avail_end_dt_2 CHAR(8) NOT NULL,
bonus_use_avail_mth_2 CHAR(2) NOT NULL,
update_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
register_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
update_user_cd VARCHAR(64) NOT NULL,
register_user_cd VARCHAR(64) NOT NULL,
CONSTRAINT pk_m_credit_corp PRIMARY KEY (credit_card_corp_cd)
);
-- ADD COLUMN
COMMENT ON TABLE sskadminuser.m_credit_corp IS 'クレジット会社台帳';
COMMENT ON COLUMN sskadminuser.m_credit_corp.credit_card_corp_cd IS 'クレジットカード会社コード';
COMMENT ON COLUMN sskadminuser.m_credit_corp.credit_card_corp_r IS 'クレジットカード会社略称';
COMMENT ON COLUMN sskadminuser.m_credit_corp.credit_card_corp_name IS 'クレジットカード会社名称';
COMMENT ON COLUMN sskadminuser.m_credit_corp.upper IS '上限';
COMMENT ON COLUMN sskadminuser.m_credit_corp.split_num IS '分割数';
COMMENT ON COLUMN sskadminuser.m_credit_corp.bonus_all_pay_flg IS 'ボーナス一括支払フラグ';
COMMENT ON COLUMN sskadminuser.m_credit_corp.bonus_dt IS 'ボーナス日';
COMMENT ON COLUMN sskadminuser.m_credit_corp.min_amnt IS '最小金額';
COMMENT ON COLUMN sskadminuser.m_credit_corp.revo_pay_flg IS 'リボ払いフラグ';
COMMENT ON COLUMN sskadminuser.m_credit_corp.bonus_use_avail_start_dt_1 IS 'ボーナス利用可能開始日1';
COMMENT ON COLUMN sskadminuser.m_credit_corp.bonus_use_avail_end_dt_1 IS 'ボーナス利用可能終了日1';
COMMENT ON COLUMN sskadminuser.m_credit_corp.bonus_use_avail_mth_1 IS 'ボーナス利用可能月1';
COMMENT ON COLUMN sskadminuser.m_credit_corp.bonus_use_avail_start_dt_2 IS 'ボーナス利用可能開始日2';
COMMENT ON COLUMN sskadminuser.m_credit_corp.bonus_use_avail_end_dt_2 IS 'ボーナス利用可能終了日2';
COMMENT ON COLUMN sskadminuser.m_credit_corp.bonus_use_avail_mth_2 IS 'ボーナス利用可能月2';
COMMENT ON COLUMN sskadminuser.m_credit_corp.update_date IS '更新日時';
COMMENT ON COLUMN sskadminuser.m_credit_corp.register_date IS '登録日時';
COMMENT ON COLUMN sskadminuser.m_credit_corp.update_user_cd IS '更新者';
COMMENT ON COLUMN sskadminuser.m_credit_corp.register_user_cd IS '登録者';
-- CREATE INDEX 
CREATE INDEX idx_m_credit_corp_01 ON sskadminuser.m_credit_corp (update_date,register_date);
-- END TABLE : sskadminuser.m_credit_corp  --

-- START TABLE : sskadminuser.f_opinion_consul  --
CREATE TABLE sskadminuser.f_opinion_consul(
voice_consul_seq INT NOT NULL,
site_kbn CHAR(1) NOT NULL,
cust_no INT,
tel_no VARCHAR(64) NOT NULL,
corp_name VARCHAR(180),
position VARCHAR(180),
name VARCHAR(84) NOT NULL,
name_kana VARCHAR(124),
mail_adr VARCHAR(180),
adr VARCHAR(388),
voice_consul TEXT,
voice_consul_kbn VARCHAR(2) NOT NULL,
reply_req_flg CHAR(1) DEFAULT '0',
stat_kbn CHAR(1),
responder VARCHAR(10),
body_letter VARCHAR(4000),
ans_dt TIMESTAMP(0) WITHOUT TIME ZONE,
ans_mail_ctrl_no INT,
act_memo VARCHAR(200),
update_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
register_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
update_user_cd VARCHAR(64) NOT NULL,
register_user_cd VARCHAR(64) NOT NULL,
reply_way_kbn CHAR(1),
reply_req_dt VARCHAR(8),
reply_req_tm_kbn CHAR(1),
query_kbn VARCHAR(3),
url VARCHAR(1000),
CONSTRAINT pk_f_opinion_consul PRIMARY KEY (voice_consul_seq)
);
-- ADD COLUMN
COMMENT ON TABLE sskadminuser.f_opinion_consul IS 'ご意見・ご相談伝票';
COMMENT ON COLUMN sskadminuser.f_opinion_consul.voice_consul_seq IS 'ご意見・ご相談連番';
COMMENT ON COLUMN sskadminuser.f_opinion_consul.site_kbn IS 'サイト区分';
COMMENT ON COLUMN sskadminuser.f_opinion_consul.cust_no IS '会員番号';
COMMENT ON COLUMN sskadminuser.f_opinion_consul.tel_no IS '電話番号';
COMMENT ON COLUMN sskadminuser.f_opinion_consul.corp_name IS '会社名';
COMMENT ON COLUMN sskadminuser.f_opinion_consul.position IS '役職';
COMMENT ON COLUMN sskadminuser.f_opinion_consul.name IS '氏名';
COMMENT ON COLUMN sskadminuser.f_opinion_consul.name_kana IS '氏名かな';
COMMENT ON COLUMN sskadminuser.f_opinion_consul.mail_adr IS 'メールアドレス';
COMMENT ON COLUMN sskadminuser.f_opinion_consul.adr IS '住所';
COMMENT ON COLUMN sskadminuser.f_opinion_consul.voice_consul IS 'ご意見・ご相談';
COMMENT ON COLUMN sskadminuser.f_opinion_consul.voice_consul_kbn IS 'ご意見・ご相談区分';
COMMENT ON COLUMN sskadminuser.f_opinion_consul.reply_req_flg IS '返信希望フラグ';
COMMENT ON COLUMN sskadminuser.f_opinion_consul.stat_kbn IS '状態区分';
COMMENT ON COLUMN sskadminuser.f_opinion_consul.responder IS '対応者';
COMMENT ON COLUMN sskadminuser.f_opinion_consul.body_letter IS '本文';
COMMENT ON COLUMN sskadminuser.f_opinion_consul.ans_dt IS '回答日';
COMMENT ON COLUMN sskadminuser.f_opinion_consul.ans_mail_ctrl_no IS '回答メール管理番号';
COMMENT ON COLUMN sskadminuser.f_opinion_consul.act_memo IS '対応メモ';
COMMENT ON COLUMN sskadminuser.f_opinion_consul.update_date IS '更新日時';
COMMENT ON COLUMN sskadminuser.f_opinion_consul.register_date IS '登録日時';
COMMENT ON COLUMN sskadminuser.f_opinion_consul.update_user_cd IS '更新者';
COMMENT ON COLUMN sskadminuser.f_opinion_consul.register_user_cd IS '登録者';
COMMENT ON COLUMN sskadminuser.f_opinion_consul.reply_way_kbn IS '返信方法区分';
COMMENT ON COLUMN sskadminuser.f_opinion_consul.reply_req_dt IS '返信希望日';
COMMENT ON COLUMN sskadminuser.f_opinion_consul.reply_req_tm_kbn IS '返信希望時間区分';
COMMENT ON COLUMN sskadminuser.f_opinion_consul.query_kbn IS '問合区分';
COMMENT ON COLUMN sskadminuser.f_opinion_consul.url IS 'URL';
-- CREATE INDEX 
CREATE INDEX idx_f_opinion_consul_01 ON sskadminuser.f_opinion_consul (site_kbn);
CREATE INDEX idx_f_opinion_consul_02 ON sskadminuser.f_opinion_consul (cust_no);
CREATE INDEX idx_f_opinion_consul_03 ON sskadminuser.f_opinion_consul (update_date,register_date);
-- END TABLE : sskadminuser.f_opinion_consul  --

-- START TABLE : sskadminuser.f_effect_monitor  --
CREATE TABLE sskadminuser.f_effect_monitor(
dt_tm TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
site_kbn CHAR(1) NOT NULL,
effect_monitor_kbn CHAR(1) NOT NULL,
inq_keyword VARCHAR(256),
url VARCHAR(256),
target_dt_tm TIMESTAMP(0) WITHOUT TIME ZONE,
media_cd VARCHAR(8),
keyword_cd VARCHAR(5),
media_cd_2 VARCHAR(8),
keyword_cd_2 VARCHAR(5),
lvl INT,
session_id VARCHAR(100),
update_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
register_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
update_user_cd VARCHAR(64) NOT NULL,
register_user_cd VARCHAR(64) NOT NULL
);
-- ADD COLUMN
COMMENT ON TABLE sskadminuser.f_effect_monitor IS '効果測定伝票';
COMMENT ON COLUMN sskadminuser.f_effect_monitor.dt_tm IS '日時';
COMMENT ON COLUMN sskadminuser.f_effect_monitor.site_kbn IS 'サイト区分';
COMMENT ON COLUMN sskadminuser.f_effect_monitor.effect_monitor_kbn IS '効果測定区分';
COMMENT ON COLUMN sskadminuser.f_effect_monitor.inq_keyword IS '検索キーワード';
COMMENT ON COLUMN sskadminuser.f_effect_monitor.url IS 'URL';
COMMENT ON COLUMN sskadminuser.f_effect_monitor.target_dt_tm IS 'ターゲット日時';
COMMENT ON COLUMN sskadminuser.f_effect_monitor.media_cd IS '媒体コード';
COMMENT ON COLUMN sskadminuser.f_effect_monitor.keyword_cd IS 'キーワードコード';
COMMENT ON COLUMN sskadminuser.f_effect_monitor.media_cd_2 IS '媒体コード2';
COMMENT ON COLUMN sskadminuser.f_effect_monitor.keyword_cd_2 IS 'キーワードコード2';
COMMENT ON COLUMN sskadminuser.f_effect_monitor.lvl IS 'レベル';
COMMENT ON COLUMN sskadminuser.f_effect_monitor.session_id IS 'セッションID';
COMMENT ON COLUMN sskadminuser.f_effect_monitor.update_date IS '更新日時';
COMMENT ON COLUMN sskadminuser.f_effect_monitor.register_date IS '登録日時';
COMMENT ON COLUMN sskadminuser.f_effect_monitor.update_user_cd IS '更新者';
COMMENT ON COLUMN sskadminuser.f_effect_monitor.register_user_cd IS '登録者';
-- CREATE INDEX 
-- END TABLE : sskadminuser.f_effect_monitor  --

-- START TABLE : sskadminuser.f_faq_effect_monitor  --
CREATE TABLE sskadminuser.f_faq_effect_monitor(
dt_tm TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
cls_cd INT NOT NULL,
query_cd INT,
site_kbn CHAR(1) NOT NULL,
content_kbn INT NOT NULL,
effect_monitor_kbn CHAR(1) NOT NULL,
keyword VARCHAR(256),
url VARCHAR(256),
session_id VARCHAR(100),
update_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
register_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
update_user_cd VARCHAR(64) NOT NULL,
register_user_cd VARCHAR(64) NOT NULL
);
-- ADD COLUMN
COMMENT ON TABLE sskadminuser.f_faq_effect_monitor IS 'FAQ効果測定伝票';
COMMENT ON COLUMN sskadminuser.f_faq_effect_monitor.dt_tm IS '日時';
COMMENT ON COLUMN sskadminuser.f_faq_effect_monitor.cls_cd IS '分類コード';
COMMENT ON COLUMN sskadminuser.f_faq_effect_monitor.query_cd IS '問合コード';
COMMENT ON COLUMN sskadminuser.f_faq_effect_monitor.site_kbn IS 'サイト区分';
COMMENT ON COLUMN sskadminuser.f_faq_effect_monitor.content_kbn IS 'コンテンツ使用区分';
COMMENT ON COLUMN sskadminuser.f_faq_effect_monitor.effect_monitor_kbn IS '効果測定区分';
COMMENT ON COLUMN sskadminuser.f_faq_effect_monitor.keyword IS 'キーワード';
COMMENT ON COLUMN sskadminuser.f_faq_effect_monitor.url IS 'URL';
COMMENT ON COLUMN sskadminuser.f_faq_effect_monitor.session_id IS 'セッションID';
COMMENT ON COLUMN sskadminuser.f_faq_effect_monitor.update_date IS '更新日時';
COMMENT ON COLUMN sskadminuser.f_faq_effect_monitor.register_date IS '登録日時';
COMMENT ON COLUMN sskadminuser.f_faq_effect_monitor.update_user_cd IS '更新者';
COMMENT ON COLUMN sskadminuser.f_faq_effect_monitor.register_user_cd IS '登録者';
-- CREATE INDEX 
-- END TABLE : sskadminuser.f_faq_effect_monitor  --

-- START TABLE : sskadminuser.m_faq_cls  --
CREATE TABLE sskadminuser.m_faq_cls(
cls_seq INT NOT NULL,
disp_kbn CHAR(1) NOT NULL,
content_kbn INT NOT NULL DEFAULT 1,
cls INT NOT NULL DEFAULT 0,
clsname VARCHAR(256),
disp_turn INT NOT NULL DEFAULT 50,
update_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
register_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
update_user_cd VARCHAR(64) NOT NULL,
register_user_cd VARCHAR(64) NOT NULL,
CONSTRAINT pk_m_faq_cls PRIMARY KEY (cls_seq)
);
-- ADD COLUMN
COMMENT ON TABLE sskadminuser.m_faq_cls IS 'FAQ分類台帳';
COMMENT ON COLUMN sskadminuser.m_faq_cls.cls_seq IS '分類連番';
COMMENT ON COLUMN sskadminuser.m_faq_cls.disp_kbn IS '表示区分';
COMMENT ON COLUMN sskadminuser.m_faq_cls.content_kbn IS 'コンテンツ使用区分';
COMMENT ON COLUMN sskadminuser.m_faq_cls.cls IS '分類';
COMMENT ON COLUMN sskadminuser.m_faq_cls.clsname IS '分類名称';
COMMENT ON COLUMN sskadminuser.m_faq_cls.disp_turn IS '表示順';
COMMENT ON COLUMN sskadminuser.m_faq_cls.update_date IS '更新日時';
COMMENT ON COLUMN sskadminuser.m_faq_cls.register_date IS '登録日時';
COMMENT ON COLUMN sskadminuser.m_faq_cls.update_user_cd IS '更新者';
COMMENT ON COLUMN sskadminuser.m_faq_cls.register_user_cd IS '登録者';
-- CREATE INDEX 
CREATE INDEX idx_m_faq_cls_01 ON sskadminuser.m_faq_cls (disp_kbn,content_kbn,disp_turn);
CREATE INDEX idx_m_faq_cls_02 ON sskadminuser.m_faq_cls (update_date,register_date);
-- END TABLE : sskadminuser.m_faq_cls  --

-- START TABLE : sskadminuser.f_faq_eva_rslt  --
CREATE TABLE sskadminuser.f_faq_eva_rslt(
query_cd INT NOT NULL,
site_kbn CHAR(1) NOT NULL,
cls_cd INT NOT NULL DEFAULT 1,
cust_no INT,
net_mbr_cd VARCHAR(12),
eva_dt_tm TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL,
eva_tm VARCHAR(8) NOT NULL,
eva_rslt_flg CHAR(1) NOT NULL,
update_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
register_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
update_user_cd VARCHAR(64) NOT NULL,
register_user_cd VARCHAR(64) NOT NULL,
CONSTRAINT pk_f_faq_eva_rslt PRIMARY KEY (query_cd,site_kbn,cls_cd,eva_dt_tm)
);
-- ADD COLUMN
COMMENT ON TABLE sskadminuser.f_faq_eva_rslt IS 'FAQ評価結果伝票';
COMMENT ON COLUMN sskadminuser.f_faq_eva_rslt.query_cd IS '問合コード';
COMMENT ON COLUMN sskadminuser.f_faq_eva_rslt.site_kbn IS 'サイト区分';
COMMENT ON COLUMN sskadminuser.f_faq_eva_rslt.cls_cd IS '分類コード';
COMMENT ON COLUMN sskadminuser.f_faq_eva_rslt.cust_no IS '会員番号';
COMMENT ON COLUMN sskadminuser.f_faq_eva_rslt.net_mbr_cd IS 'ネット会員コード';
COMMENT ON COLUMN sskadminuser.f_faq_eva_rslt.eva_dt_tm IS '評価日時';
COMMENT ON COLUMN sskadminuser.f_faq_eva_rslt.eva_tm IS '評価時刻';
COMMENT ON COLUMN sskadminuser.f_faq_eva_rslt.eva_rslt_flg IS '評価結果フラグ';
COMMENT ON COLUMN sskadminuser.f_faq_eva_rslt.update_date IS '更新日時';
COMMENT ON COLUMN sskadminuser.f_faq_eva_rslt.register_date IS '登録日時';
COMMENT ON COLUMN sskadminuser.f_faq_eva_rslt.update_user_cd IS '更新者';
COMMENT ON COLUMN sskadminuser.f_faq_eva_rslt.register_user_cd IS '登録者';
-- CREATE INDEX 
CREATE INDEX idx_f_faq_eva_rslt_01 ON sskadminuser.f_faq_eva_rslt (update_date,register_date);
-- END TABLE : sskadminuser.f_faq_eva_rslt  --

-- START TABLE : sskadminuser.f_faq_inq_rslt  --
CREATE TABLE sskadminuser.f_faq_inq_rslt(
faq_inq_rslt_seq BIGINT NOT NULL,
cust_no INT,
inq_dt_tm TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT current_timestamp(0),
inq_keyword VARCHAR(100),
rslt_hit_num INT DEFAULT 0,
attr_kbn INT DEFAULT 0,
cosme_g_tot_buy_cnt INT DEFAULT 0,
herb_g_tot_buy_cnt INT DEFAULT 0,
update_date TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT current_timestamp(0),
register_date TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT current_timestamp(0),
update_user_cd VARCHAR(64),
register_user_cd VARCHAR(64),
CONSTRAINT pk_f_faq_inq_rslt PRIMARY KEY (faq_inq_rslt_seq)
);
-- ADD COLUMN
COMMENT ON TABLE sskadminuser.f_faq_inq_rslt IS 'FAQ検索結果伝票';
COMMENT ON COLUMN sskadminuser.f_faq_inq_rslt.faq_inq_rslt_seq IS 'FAQ検索結果連番';
COMMENT ON COLUMN sskadminuser.f_faq_inq_rslt.cust_no IS '会員番号';
COMMENT ON COLUMN sskadminuser.f_faq_inq_rslt.inq_dt_tm IS '検索日時';
COMMENT ON COLUMN sskadminuser.f_faq_inq_rslt.inq_keyword IS '検索キーワード';
COMMENT ON COLUMN sskadminuser.f_faq_inq_rslt.rslt_hit_num IS '結果ヒット数';
COMMENT ON COLUMN sskadminuser.f_faq_inq_rslt.attr_kbn IS '属性区分';
COMMENT ON COLUMN sskadminuser.f_faq_inq_rslt.cosme_g_tot_buy_cnt IS '化粧品累計購入回数';
COMMENT ON COLUMN sskadminuser.f_faq_inq_rslt.herb_g_tot_buy_cnt IS '漢方累計購入回数';
COMMENT ON COLUMN sskadminuser.f_faq_inq_rslt.update_date IS '更新日時';
COMMENT ON COLUMN sskadminuser.f_faq_inq_rslt.register_date IS '登録日時';
COMMENT ON COLUMN sskadminuser.f_faq_inq_rslt.update_user_cd IS '更新者';
COMMENT ON COLUMN sskadminuser.f_faq_inq_rslt.register_user_cd IS '登録者';
-- CREATE INDEX 
CREATE INDEX idx_f_faq_inq_rslt_01 ON sskadminuser.f_faq_inq_rslt (cust_no,inq_dt_tm);
CREATE INDEX idx_f_faq_inq_rslt_02 ON sskadminuser.f_faq_inq_rslt (update_date,register_date);
-- END TABLE : sskadminuser.f_faq_inq_rslt  --

-- START TABLE : sskadminuser.m_faq_common_query  --
CREATE TABLE sskadminuser.m_faq_common_query(
query_cd INT NOT NULL,
site_kbn CHAR(1) NOT NULL,
cls_cd INT NOT NULL,
question VARCHAR(2000),
ans_1 VARCHAR(4000),
ans_2 VARCHAR(4000),
ans_3 VARCHAR(4000),
ans_4 VARCHAR(4000),
disp_flg INT NOT NULL,
disp_start_dt TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL,
disp_end_dt TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL,
disp_turn INT NOT NULL,
img_flg CHAR(1),
update_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL,
register_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL,
update_user_cd VARCHAR(64) NOT NULL,
register_user_cd VARCHAR(64) NOT NULL,
CONSTRAINT pk_m_faq_common_query PRIMARY KEY (query_cd,site_kbn)
);
-- ADD COLUMN
COMMENT ON TABLE sskadminuser.m_faq_common_query IS 'FAQよくある問合台帳';
COMMENT ON COLUMN sskadminuser.m_faq_common_query.query_cd IS '問合コード';
COMMENT ON COLUMN sskadminuser.m_faq_common_query.site_kbn IS 'サイト区分';
COMMENT ON COLUMN sskadminuser.m_faq_common_query.cls_cd IS '分類コード';
COMMENT ON COLUMN sskadminuser.m_faq_common_query.question IS '質問';
COMMENT ON COLUMN sskadminuser.m_faq_common_query.ans_1 IS '回答1';
COMMENT ON COLUMN sskadminuser.m_faq_common_query.ans_2 IS '回答2';
COMMENT ON COLUMN sskadminuser.m_faq_common_query.ans_3 IS '回答3';
COMMENT ON COLUMN sskadminuser.m_faq_common_query.ans_4 IS '回答4';
COMMENT ON COLUMN sskadminuser.m_faq_common_query.disp_flg IS '表示フラグ';
COMMENT ON COLUMN sskadminuser.m_faq_common_query.disp_start_dt IS '表示開始日';
COMMENT ON COLUMN sskadminuser.m_faq_common_query.disp_end_dt IS '表示終了日';
COMMENT ON COLUMN sskadminuser.m_faq_common_query.disp_turn IS '表示順';
COMMENT ON COLUMN sskadminuser.m_faq_common_query.img_flg IS '画像フラグ';
COMMENT ON COLUMN sskadminuser.m_faq_common_query.update_date IS '更新日時';
COMMENT ON COLUMN sskadminuser.m_faq_common_query.register_date IS '登録日時';
COMMENT ON COLUMN sskadminuser.m_faq_common_query.update_user_cd IS '更新者';
COMMENT ON COLUMN sskadminuser.m_faq_common_query.register_user_cd IS '登録者';
-- CREATE INDEX 
CREATE INDEX idx_m_faq_common_query_01 ON sskadminuser.m_faq_common_query (site_kbn,cls_cd,disp_flg,disp_start_dt,disp_end_dt,disp_turn);
CREATE INDEX idx_m_faq_common_query_02 ON sskadminuser.m_faq_common_query (cls_cd,disp_flg,disp_start_dt,disp_end_dt,disp_turn);
CREATE INDEX idx_m_faq_common_query_03 ON sskadminuser.m_faq_common_query (disp_flg,disp_start_dt,disp_end_dt,disp_turn);
CREATE INDEX idx_m_faq_common_query_04 ON sskadminuser.m_faq_common_query (disp_start_dt,disp_end_dt,disp_turn);
CREATE INDEX idx_m_faq_common_query_05 ON sskadminuser.m_faq_common_query (query_cd,site_kbn,ans_1);
CREATE INDEX idx_m_faq_common_query_06 ON sskadminuser.m_faq_common_query (query_cd,site_kbn,ans_2);
CREATE INDEX idx_m_faq_common_query_07 ON sskadminuser.m_faq_common_query (query_cd,site_kbn,ans_3);
CREATE INDEX idx_m_faq_common_query_08 ON sskadminuser.m_faq_common_query (query_cd,site_kbn,ans_4);
CREATE INDEX idx_m_faq_common_query_09 ON sskadminuser.m_faq_common_query (update_date,register_date);
-- END TABLE : sskadminuser.m_faq_common_query  --

-- START TABLE : sskadminuser.m_faq_category  --
CREATE TABLE sskadminuser.m_faq_category(
category_cd INT NOT NULL,
category_name VARCHAR(100) NOT NULL,
explain VARCHAR(2000),
disp_turn INT DEFAULT 0,
update_date TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT current_timestamp(0),
register_date TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT current_timestamp(0),
update_user_cd VARCHAR(64),
register_user_cd VARCHAR(64),
del_flg INT DEFAULT 0,
CONSTRAINT pk_m_faq_category PRIMARY KEY (category_cd)
);
-- ADD COLUMN
COMMENT ON TABLE sskadminuser.m_faq_category IS 'FAQカテゴリ台帳';
COMMENT ON COLUMN sskadminuser.m_faq_category.category_cd IS 'カテゴリコード';
COMMENT ON COLUMN sskadminuser.m_faq_category.category_name IS 'カテゴリ名';
COMMENT ON COLUMN sskadminuser.m_faq_category.explain IS '説明';
COMMENT ON COLUMN sskadminuser.m_faq_category.disp_turn IS '表示順';
COMMENT ON COLUMN sskadminuser.m_faq_category.update_date IS '更新日時';
COMMENT ON COLUMN sskadminuser.m_faq_category.register_date IS '登録日時';
COMMENT ON COLUMN sskadminuser.m_faq_category.update_user_cd IS '更新者';
COMMENT ON COLUMN sskadminuser.m_faq_category.register_user_cd IS '登録者';
COMMENT ON COLUMN sskadminuser.m_faq_category.del_flg IS '削除フラグ';
-- CREATE INDEX 
CREATE INDEX idx_m_faq_category_01 ON sskadminuser.m_faq_category (update_date,register_date);
-- END TABLE : sskadminuser.m_faq_category  --

-- START TABLE : sskadminuser.f_faq_question_ans  --
CREATE TABLE sskadminuser.f_faq_question_ans(
entry_cd INT NOT NULL,
category_cd INT,
question_sente VARCHAR(2000),
ans_1 VARCHAR(4000),
ans_2 VARCHAR(4000),
open_flg CHAR(1) DEFAULT 1,
open_start_dt_tm TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT current_timestamp(0),
open_end_dt_tm TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT to_timestamp('2002-12-31 23:59:59', 'YYYY-MM-DD HH24:MI:SS'),
important_level INT DEFAULT 0,
pv_num INT DEFAULT 0,
update_date TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT current_timestamp(0),
register_date TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT current_timestamp(0),
update_user_cd VARCHAR(64),
register_user_cd VARCHAR(64),
del_flg INT DEFAULT 0,
meta_tag_description VARCHAR(400) DEFAULT NULL,
disp_kbn INT DEFAULT 0,
CONSTRAINT pk_f_faq_question_ans PRIMARY KEY (entry_cd)
);
-- ADD COLUMN
COMMENT ON TABLE sskadminuser.f_faq_question_ans IS 'FAQの質問と回答伝票';
COMMENT ON COLUMN sskadminuser.f_faq_question_ans.entry_cd IS 'エントリコード';
COMMENT ON COLUMN sskadminuser.f_faq_question_ans.category_cd IS 'カテゴリコード';
COMMENT ON COLUMN sskadminuser.f_faq_question_ans.question_sente IS '質問文';
COMMENT ON COLUMN sskadminuser.f_faq_question_ans.ans_1 IS '回答1';
COMMENT ON COLUMN sskadminuser.f_faq_question_ans.ans_2 IS '回答2';
COMMENT ON COLUMN sskadminuser.f_faq_question_ans.open_flg IS '公開フラグ';
COMMENT ON COLUMN sskadminuser.f_faq_question_ans.open_start_dt_tm IS '公開開始日時';
COMMENT ON COLUMN sskadminuser.f_faq_question_ans.open_end_dt_tm IS '公開終了日時';
COMMENT ON COLUMN sskadminuser.f_faq_question_ans.important_level IS '重要度';
COMMENT ON COLUMN sskadminuser.f_faq_question_ans.pv_num IS 'PV数';
COMMENT ON COLUMN sskadminuser.f_faq_question_ans.update_date IS '更新日時';
COMMENT ON COLUMN sskadminuser.f_faq_question_ans.register_date IS '登録日時';
COMMENT ON COLUMN sskadminuser.f_faq_question_ans.update_user_cd IS '更新者';
COMMENT ON COLUMN sskadminuser.f_faq_question_ans.register_user_cd IS '登録者';
COMMENT ON COLUMN sskadminuser.f_faq_question_ans.del_flg IS '削除フラグ';
COMMENT ON COLUMN sskadminuser.f_faq_question_ans.meta_tag_description IS 'メタタグのディスクリプション';
COMMENT ON COLUMN sskadminuser.f_faq_question_ans.disp_kbn IS '表示区分';
-- CREATE INDEX 
CREATE INDEX idx_f_faq_question_ans_01 ON sskadminuser.f_faq_question_ans (category_cd);
CREATE INDEX idx_f_faq_question_ans_02 ON sskadminuser.f_faq_question_ans (open_start_dt_tm,open_end_dt_tm);
CREATE INDEX idx_f_faq_question_ans_03 ON sskadminuser.f_faq_question_ans (update_date,register_date);
-- END TABLE : sskadminuser.f_faq_question_ans  --

-- START TABLE : sskadminuser.f_faq_quesnr_ans  --
CREATE TABLE sskadminuser.f_faq_quesnr_ans(
faq_quesnr_seq BIGINT NOT NULL,
entry_cd INT NOT NULL,
ans_dt_tm TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT current_timestamp(0),
ans_cont INT NOT NULL,
update_date TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT current_timestamp(0),
register_date TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT current_timestamp(0),
update_user_cd VARCHAR(64),
register_user_cd VARCHAR(64),
del_flg INT DEFAULT 0,
CONSTRAINT pk_f_faq_quesnr_ans PRIMARY KEY (faq_quesnr_seq)
);
-- ADD COLUMN
COMMENT ON TABLE sskadminuser.f_faq_quesnr_ans IS 'FAQアンケート回答伝票';
COMMENT ON COLUMN sskadminuser.f_faq_quesnr_ans.faq_quesnr_seq IS 'FAQアンケート連番';
COMMENT ON COLUMN sskadminuser.f_faq_quesnr_ans.entry_cd IS 'エントリコード';
COMMENT ON COLUMN sskadminuser.f_faq_quesnr_ans.ans_dt_tm IS '回答日時';
COMMENT ON COLUMN sskadminuser.f_faq_quesnr_ans.ans_cont IS '回答内容';
COMMENT ON COLUMN sskadminuser.f_faq_quesnr_ans.update_date IS '更新日時';
COMMENT ON COLUMN sskadminuser.f_faq_quesnr_ans.register_date IS '登録日時';
COMMENT ON COLUMN sskadminuser.f_faq_quesnr_ans.update_user_cd IS '更新者';
COMMENT ON COLUMN sskadminuser.f_faq_quesnr_ans.register_user_cd IS '登録者';
COMMENT ON COLUMN sskadminuser.f_faq_quesnr_ans.del_flg IS '削除フラグ';
-- CREATE INDEX 
CREATE INDEX idx_f_faq_quesnr_ans_01 ON sskadminuser.f_faq_quesnr_ans (entry_cd);
CREATE INDEX idx_f_faq_quesnr_ans_02 ON sskadminuser.f_faq_quesnr_ans (update_date,register_date);
-- END TABLE : sskadminuser.f_faq_quesnr_ans  --

-- START TABLE : sskadminuser.first_odr_d  --
CREATE TABLE sskadminuser.first_odr_d(
cust_no INT NOT NULL,
item_cd CHAR(4) NOT NULL,
item_lvl CHAR(2) NOT NULL,
item_num INT NOT NULL,
odr_dt_tm TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
update_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
update_user_cd VARCHAR(64),
register_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
register_user_cd VARCHAR(64),
CONSTRAINT pk_first_odr_d PRIMARY KEY (cust_no,item_cd,item_lvl)
);
-- ADD COLUMN
COMMENT ON TABLE sskadminuser.first_odr_d IS '初回注文明細';
COMMENT ON COLUMN sskadminuser.first_odr_d.cust_no IS '会員番号';
COMMENT ON COLUMN sskadminuser.first_odr_d.item_cd IS '商品コード';
COMMENT ON COLUMN sskadminuser.first_odr_d.item_lvl IS '商品レベル';
COMMENT ON COLUMN sskadminuser.first_odr_d.item_num IS '商品数';
COMMENT ON COLUMN sskadminuser.first_odr_d.odr_dt_tm IS '注文日時';
COMMENT ON COLUMN sskadminuser.first_odr_d.update_date IS '更新日時';
COMMENT ON COLUMN sskadminuser.first_odr_d.update_user_cd IS '更新者';
COMMENT ON COLUMN sskadminuser.first_odr_d.register_date IS '登録日時';
COMMENT ON COLUMN sskadminuser.first_odr_d.register_user_cd IS '登録者';
-- CREATE INDEX 
-- END TABLE : sskadminuser.first_odr_d  --

-- START TABLE : sskadminuser.m_flower  --
CREATE TABLE sskadminuser.m_flower(
flower_cd DOUBLE PRECISION NOT NULL,
flower_name VARCHAR(128) NOT NULL,
flower_language VARCHAR(400),
img_path VARCHAR(400),
memo VARCHAR(400),
disp_flg INT NOT NULL DEFAULT 0,
odr_no DOUBLE PRECISION NOT NULL,
register_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL,
update_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL,
update_user_cd VARCHAR(64) NOT NULL,
register_user_cd VARCHAR(64) NOT NULL,
CONSTRAINT pk_m_flower PRIMARY KEY (flower_cd)
);
-- ADD COLUMN
COMMENT ON TABLE sskadminuser.m_flower IS '花台帳';
COMMENT ON COLUMN sskadminuser.m_flower.flower_cd IS '花コード';
COMMENT ON COLUMN sskadminuser.m_flower.flower_name IS '花名';
COMMENT ON COLUMN sskadminuser.m_flower.flower_language IS '花言葉';
COMMENT ON COLUMN sskadminuser.m_flower.img_path IS '画像パス';
COMMENT ON COLUMN sskadminuser.m_flower.memo IS 'メモ';
COMMENT ON COLUMN sskadminuser.m_flower.disp_flg IS '表示フラグ';
COMMENT ON COLUMN sskadminuser.m_flower.odr_no IS '注文番号';
COMMENT ON COLUMN sskadminuser.m_flower.register_date IS '登録日時';
COMMENT ON COLUMN sskadminuser.m_flower.update_date IS '更新日時';
COMMENT ON COLUMN sskadminuser.m_flower.update_user_cd IS '更新者';
COMMENT ON COLUMN sskadminuser.m_flower.register_user_cd IS '登録者';
-- CREATE INDEX 
-- END TABLE : sskadminuser.m_flower  --

-- START TABLE : sskadminuser.f_app_achiever_comment  --
CREATE TABLE sskadminuser.f_app_achiever_comment(
achieve_comment_seq BIGINT NOT NULL DEFAULT 0,
cust_no INT NOT NULL DEFAULT 0,
challenge_kbn CHAR(1) NOT NULL DEFAULT ' ',
achieve_cd BIGINT NOT NULL DEFAULT 0,
achieve_dt TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT to_timestamp('1900-01-01 00:00:00', 'YYYY-MM-DD HH24:MI:SS'),
achieve_comment VARCHAR(800),
sync_kbn CHAR(1) NOT NULL DEFAULT '0',
register_user_cd VARCHAR(64) NOT NULL DEFAULT ' ',
register_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT to_timestamp('1900-01-01 00:00:00', 'YYYY-MM-DD HH24:MI:SS'),
update_user_cd VARCHAR(64) NOT NULL DEFAULT ' ',
scr_upd_dt_tm TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT to_timestamp('1900-01-01 00:00:00', 'YYYY-MM-DD HH24:MI:SS'),
bat_upd_dt_tm TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT to_timestamp('1900-01-01 00:00:00', 'YYYY-MM-DD HH24:MI:SS'),
upd_cnt BIGINT NOT NULL DEFAULT 0,
upd_scr_name VARCHAR(80) NOT NULL DEFAULT ' ',
upd_bat_name VARCHAR(80) NOT NULL DEFAULT ' ',
del_flg INT NOT NULL DEFAULT 0,
CONSTRAINT pk_f_app_achiever_comment PRIMARY KEY (achieve_comment_seq)
);
-- ADD COLUMN
COMMENT ON TABLE sskadminuser.f_app_achiever_comment IS 'アプリ達成者のコメント伝票';
COMMENT ON COLUMN sskadminuser.f_app_achiever_comment.achieve_comment_seq IS '達成コメント連番';
COMMENT ON COLUMN sskadminuser.f_app_achiever_comment.cust_no IS '会員番号';
COMMENT ON COLUMN sskadminuser.f_app_achiever_comment.challenge_kbn IS 'チャレンジ区分';
COMMENT ON COLUMN sskadminuser.f_app_achiever_comment.achieve_cd IS '達成コード';
COMMENT ON COLUMN sskadminuser.f_app_achiever_comment.achieve_dt IS '達成日';
COMMENT ON COLUMN sskadminuser.f_app_achiever_comment.achieve_comment IS '達成コメント';
COMMENT ON COLUMN sskadminuser.f_app_achiever_comment.sync_kbn IS '同期区分';
COMMENT ON COLUMN sskadminuser.f_app_achiever_comment.register_user_cd IS '登録者';
COMMENT ON COLUMN sskadminuser.f_app_achiever_comment.register_date IS '登録日時';
COMMENT ON COLUMN sskadminuser.f_app_achiever_comment.update_user_cd IS '更新者';
COMMENT ON COLUMN sskadminuser.f_app_achiever_comment.scr_upd_dt_tm IS '画面更新日時';
COMMENT ON COLUMN sskadminuser.f_app_achiever_comment.bat_upd_dt_tm IS 'バッチ更新日時';
COMMENT ON COLUMN sskadminuser.f_app_achiever_comment.upd_cnt IS '更新カウント';
COMMENT ON COLUMN sskadminuser.f_app_achiever_comment.upd_scr_name IS '更新画面名';
COMMENT ON COLUMN sskadminuser.f_app_achiever_comment.upd_bat_name IS '更新バッチ名';
COMMENT ON COLUMN sskadminuser.f_app_achiever_comment.del_flg IS '削除フラグ';
-- CREATE INDEX 
CREATE INDEX idx_f_app_achiever_comment_01 ON sskadminuser.f_app_achiever_comment (sync_kbn);
-- END TABLE : sskadminuser.f_app_achiever_comment  --

-- START TABLE : sskadminuser.f_app_care_calendar_comment  --
CREATE TABLE sskadminuser.f_app_care_calendar_comment(
dtl_no BIGINT NOT NULL DEFAULT 0,
skin_record_dtl_no BIGINT NOT NULL DEFAULT 0,
comment_write_base_mbr_no INT,
comment_write_base_charge_cd VARCHAR(10),
comment_cont VARCHAR(400) NOT NULL DEFAULT '',
register_user_cd VARCHAR(64) NOT NULL DEFAULT '',
register_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT to_timestamp('1900-01-01 00:00:00', 'YYYY-MM-DD HH24:MI:SS'),
update_user_cd VARCHAR(64) NOT NULL DEFAULT '',
scr_upd_dt_tm TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT to_timestamp('1900-01-01 00:00:00', 'YYYY-MM-DD HH24:MI:SS'),
bat_upd_dt_tm TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT to_timestamp('1900-01-01 00:00:00', 'YYYY-MM-DD HH24:MI:SS'),
upd_cnt BIGINT NOT NULL DEFAULT 0,
upd_scr_name VARCHAR(80) NOT NULL DEFAULT '',
upd_bat_name VARCHAR(80) NOT NULL DEFAULT '',
del_flg INT NOT NULL DEFAULT 0,
sync_flg CHAR(1) NOT NULL DEFAULT '0',
CONSTRAINT pk_f_app_care_calendar_comment PRIMARY KEY (dtl_no)
);
-- ADD COLUMN
COMMENT ON TABLE sskadminuser.f_app_care_calendar_comment IS 'アプリお手当カレンダーコメント伝票';
COMMENT ON COLUMN sskadminuser.f_app_care_calendar_comment.dtl_no IS '明細番号';
COMMENT ON COLUMN sskadminuser.f_app_care_calendar_comment.skin_record_dtl_no IS '肌記録の明細番号';
COMMENT ON COLUMN sskadminuser.f_app_care_calendar_comment.comment_write_base_mbr_no IS 'コメント書込元会員番号';
COMMENT ON COLUMN sskadminuser.f_app_care_calendar_comment.comment_write_base_charge_cd IS 'コメント書込元担当者コード';
COMMENT ON COLUMN sskadminuser.f_app_care_calendar_comment.comment_cont IS 'コメント内容';
COMMENT ON COLUMN sskadminuser.f_app_care_calendar_comment.register_user_cd IS '登録者';
COMMENT ON COLUMN sskadminuser.f_app_care_calendar_comment.register_date IS '登録日時';
COMMENT ON COLUMN sskadminuser.f_app_care_calendar_comment.update_user_cd IS '更新者';
COMMENT ON COLUMN sskadminuser.f_app_care_calendar_comment.scr_upd_dt_tm IS '画面更新日時';
COMMENT ON COLUMN sskadminuser.f_app_care_calendar_comment.bat_upd_dt_tm IS 'バッチ更新日時';
COMMENT ON COLUMN sskadminuser.f_app_care_calendar_comment.upd_cnt IS '更新カウント';
COMMENT ON COLUMN sskadminuser.f_app_care_calendar_comment.upd_scr_name IS '更新画面名';
COMMENT ON COLUMN sskadminuser.f_app_care_calendar_comment.upd_bat_name IS '更新バッチ名';
COMMENT ON COLUMN sskadminuser.f_app_care_calendar_comment.del_flg IS '削除フラグ';
COMMENT ON COLUMN sskadminuser.f_app_care_calendar_comment.sync_flg IS '同期フラグ';
-- CREATE INDEX 
CREATE INDEX idx_f_app_care_calendar_comment_01 ON sskadminuser.f_app_care_calendar_comment (skin_record_dtl_no);
-- END TABLE : sskadminuser.f_app_care_calendar_comment  --

-- START TABLE : sskadminuser.h_app_care_calendar  --
CREATE TABLE sskadminuser.h_app_care_calendar(
dtl_no BIGINT NOT NULL DEFAULT 0,
cust_no INT NOT NULL DEFAULT 0,
care_record_dt TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT to_timestamp('1900-01-01 00:00:00', 'YYYY-MM-DD HH24:MI:SS'),
site_kbn CHAR(1) NOT NULL DEFAULT ' ',
plan_memo VARCHAR(800),
skin_feeling_kbn CHAR(1),
care_satisfaction_level_kbn CHAR(1),
comment VARCHAR(800),
condition_cd_1 CHAR(1),
condition_cd_2 CHAR(1),
condition_cd_3 CHAR(1),
condition_cd_4 CHAR(1),
condition_cd_5 CHAR(1),
condition_cd_6 CHAR(1),
memo VARCHAR(800),
care_calendar_flower_anime_ctrl_flg CHAR(1) NOT NULL DEFAULT '0',
event_flower_anime_ctrl_flg CHAR(1) NOT NULL DEFAULT '0',
comment_chk_flg CHAR(1) NOT NULL DEFAULT '0',
sync_kbn CHAR(1) NOT NULL DEFAULT '0',
register_user_cd VARCHAR(64) NOT NULL DEFAULT ' ',
register_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT to_timestamp('1900-01-01 00:00:00', 'YYYY-MM-DD HH24:MI:SS'),
update_user_cd VARCHAR(64) NOT NULL DEFAULT ' ',
scr_upd_dt_tm TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT to_timestamp('1900-01-01 00:00:00', 'YYYY-MM-DD HH24:MI:SS'),
bat_upd_dt_tm TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT to_timestamp('1900-01-01 00:00:00', 'YYYY-MM-DD HH24:MI:SS'),
upd_cnt BIGINT NOT NULL DEFAULT 0,
upd_scr_name VARCHAR(80) NOT NULL DEFAULT ' ',
upd_bat_name VARCHAR(80) NOT NULL DEFAULT ' ',
del_flg INT NOT NULL DEFAULT 0,
morning_care_satisfaction_level_kbn CHAR(1),
night_care_satisfaction_level_kbn CHAR(1),
teachme_pleaser_flg CHAR(1),
CONSTRAINT pk_h_app_care_calendar PRIMARY KEY (dtl_no)
);
-- ADD COLUMN
COMMENT ON TABLE sskadminuser.h_app_care_calendar IS 'アプリお手当カレンダー履歴';
COMMENT ON COLUMN sskadminuser.h_app_care_calendar.dtl_no IS '明細番号';
COMMENT ON COLUMN sskadminuser.h_app_care_calendar.cust_no IS '会員番号';
COMMENT ON COLUMN sskadminuser.h_app_care_calendar.care_record_dt IS 'お手当記録日';
COMMENT ON COLUMN sskadminuser.h_app_care_calendar.site_kbn IS 'サイト区分';
COMMENT ON COLUMN sskadminuser.h_app_care_calendar.plan_memo IS '予定メモ';
COMMENT ON COLUMN sskadminuser.h_app_care_calendar.skin_feeling_kbn IS '肌実感区分';
COMMENT ON COLUMN sskadminuser.h_app_care_calendar.care_satisfaction_level_kbn IS 'お手当満足度区分';
COMMENT ON COLUMN sskadminuser.h_app_care_calendar.comment IS 'コメント';
COMMENT ON COLUMN sskadminuser.h_app_care_calendar.condition_cd_1 IS '体調コード1';
COMMENT ON COLUMN sskadminuser.h_app_care_calendar.condition_cd_2 IS '体調コード2';
COMMENT ON COLUMN sskadminuser.h_app_care_calendar.condition_cd_3 IS '体調コード3';
COMMENT ON COLUMN sskadminuser.h_app_care_calendar.condition_cd_4 IS '体調コード4';
COMMENT ON COLUMN sskadminuser.h_app_care_calendar.condition_cd_5 IS '体調コード5';
COMMENT ON COLUMN sskadminuser.h_app_care_calendar.condition_cd_6 IS '体調コード6';
COMMENT ON COLUMN sskadminuser.h_app_care_calendar.memo IS 'メモ';
COMMENT ON COLUMN sskadminuser.h_app_care_calendar.care_calendar_flower_anime_ctrl_flg IS 'お手カレ花アニメ管理フラグ';
COMMENT ON COLUMN sskadminuser.h_app_care_calendar.event_flower_anime_ctrl_flg IS 'イベント花アニメ管理フラグ';
COMMENT ON COLUMN sskadminuser.h_app_care_calendar.comment_chk_flg IS 'コメントチェックフラグ';
COMMENT ON COLUMN sskadminuser.h_app_care_calendar.sync_kbn IS '同期区分';
COMMENT ON COLUMN sskadminuser.h_app_care_calendar.register_user_cd IS '登録者';
COMMENT ON COLUMN sskadminuser.h_app_care_calendar.register_date IS '登録日時';
COMMENT ON COLUMN sskadminuser.h_app_care_calendar.update_user_cd IS '更新者';
COMMENT ON COLUMN sskadminuser.h_app_care_calendar.scr_upd_dt_tm IS '画面更新日時';
COMMENT ON COLUMN sskadminuser.h_app_care_calendar.bat_upd_dt_tm IS 'バッチ更新日時';
COMMENT ON COLUMN sskadminuser.h_app_care_calendar.upd_cnt IS '更新カウント';
COMMENT ON COLUMN sskadminuser.h_app_care_calendar.upd_scr_name IS '更新画面名';
COMMENT ON COLUMN sskadminuser.h_app_care_calendar.upd_bat_name IS '更新バッチ名';
COMMENT ON COLUMN sskadminuser.h_app_care_calendar.del_flg IS '削除フラグ';
COMMENT ON COLUMN sskadminuser.h_app_care_calendar.morning_care_satisfaction_level_kbn IS '朝のお手当満足度区分';
COMMENT ON COLUMN sskadminuser.h_app_care_calendar.night_care_satisfaction_level_kbn IS '晩のお手当満足度区分';
COMMENT ON COLUMN sskadminuser.h_app_care_calendar.teachme_pleaser_flg IS '教えてプリーザーフラグ';
-- CREATE INDEX 
CREATE INDEX idx_h_app_care_calendar_01 ON sskadminuser.h_app_care_calendar (cust_no);
CREATE INDEX idx_h_app_care_calendar_02 ON sskadminuser.h_app_care_calendar (care_record_dt);
CREATE INDEX idx_h_app_care_calendar_03 ON sskadminuser.h_app_care_calendar (sync_kbn);
-- END TABLE : sskadminuser.h_app_care_calendar  --

-- START TABLE : sskadminuser.m_app_care_calendar_set  --
CREATE TABLE sskadminuser.m_app_care_calendar_set(
cust_no INT NOT NULL DEFAULT 0,
site_kbn CHAR(1) NOT NULL DEFAULT ' ',
nickname VARCHAR(120),
icon VARCHAR(256),
skin_worry_cd_1 CHAR(2),
skin_worry_cd_2 CHAR(2),
skin_worry_cd_3 CHAR(2),
first_ship_dt TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT to_timestamp('1900-01-01 00:00:00', 'YYYY-MM-DD HH24:MI:SS'),
effect_sound_flg CHAR(1) NOT NULL DEFAULT '1',
ocr_chk_kbn CHAR(1),
charge_cd VARCHAR(10),
challenge_progress_popup_kbn CHAR(1) NOT NULL DEFAULT '1',
calendar_open_set_kbn CHAR(1) NOT NULL DEFAULT '1',
sync_kbn CHAR(1) NOT NULL DEFAULT '0',
register_user_cd VARCHAR(64) NOT NULL DEFAULT ' ',
register_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT to_timestamp('1900-01-01 00:00:00', 'YYYY-MM-DD HH24:MI:SS'),
update_user_cd VARCHAR(64) NOT NULL DEFAULT ' ',
scr_upd_dt_tm TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT to_timestamp('1900-01-01 00:00:00', 'YYYY-MM-DD HH24:MI:SS'),
bat_upd_dt_tm TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT to_timestamp('1900-01-01 00:00:00', 'YYYY-MM-DD HH24:MI:SS'),
upd_cnt BIGINT NOT NULL DEFAULT 0,
upd_scr_name VARCHAR(80) NOT NULL DEFAULT ' ',
upd_bat_name VARCHAR(80) NOT NULL DEFAULT ' ',
del_flg INT NOT NULL DEFAULT 0,
CONSTRAINT pk_m_app_care_calendar_set PRIMARY KEY (cust_no)
);
-- ADD COLUMN
COMMENT ON TABLE sskadminuser.m_app_care_calendar_set IS 'アプリお手当カレンダー設定台帳';
COMMENT ON COLUMN sskadminuser.m_app_care_calendar_set.cust_no IS '会員番号';
COMMENT ON COLUMN sskadminuser.m_app_care_calendar_set.site_kbn IS 'サイト区分';
COMMENT ON COLUMN sskadminuser.m_app_care_calendar_set.nickname IS 'ニックネーム';
COMMENT ON COLUMN sskadminuser.m_app_care_calendar_set.icon IS 'アイコン';
COMMENT ON COLUMN sskadminuser.m_app_care_calendar_set.skin_worry_cd_1 IS 'お肌の悩みコード1';
COMMENT ON COLUMN sskadminuser.m_app_care_calendar_set.skin_worry_cd_2 IS 'お肌の悩みコード2';
COMMENT ON COLUMN sskadminuser.m_app_care_calendar_set.skin_worry_cd_3 IS 'お肌の悩みコード3';
COMMENT ON COLUMN sskadminuser.m_app_care_calendar_set.first_ship_dt IS '初回発送日';
COMMENT ON COLUMN sskadminuser.m_app_care_calendar_set.effect_sound_flg IS '効果音フラグ';
COMMENT ON COLUMN sskadminuser.m_app_care_calendar_set.ocr_chk_kbn IS 'OCR確認区分';
COMMENT ON COLUMN sskadminuser.m_app_care_calendar_set.charge_cd IS '担当コード';
COMMENT ON COLUMN sskadminuser.m_app_care_calendar_set.challenge_progress_popup_kbn IS 'チャレンジ進捗ポップアップ区分';
COMMENT ON COLUMN sskadminuser.m_app_care_calendar_set.calendar_open_set_kbn IS 'カレンダー公開設定区分';
COMMENT ON COLUMN sskadminuser.m_app_care_calendar_set.sync_kbn IS '同期区分';
COMMENT ON COLUMN sskadminuser.m_app_care_calendar_set.register_user_cd IS '登録者';
COMMENT ON COLUMN sskadminuser.m_app_care_calendar_set.register_date IS '登録日時';
COMMENT ON COLUMN sskadminuser.m_app_care_calendar_set.update_user_cd IS '更新者';
COMMENT ON COLUMN sskadminuser.m_app_care_calendar_set.scr_upd_dt_tm IS '画面更新日時';
COMMENT ON COLUMN sskadminuser.m_app_care_calendar_set.bat_upd_dt_tm IS 'バッチ更新日時';
COMMENT ON COLUMN sskadminuser.m_app_care_calendar_set.upd_cnt IS '更新カウント';
COMMENT ON COLUMN sskadminuser.m_app_care_calendar_set.upd_scr_name IS '更新画面名';
COMMENT ON COLUMN sskadminuser.m_app_care_calendar_set.upd_bat_name IS '更新バッチ名';
COMMENT ON COLUMN sskadminuser.m_app_care_calendar_set.del_flg IS '削除フラグ';
-- CREATE INDEX 
CREATE INDEX idx_m_app_care_calendar_set_01 ON sskadminuser.m_app_care_calendar_set (sync_kbn);
-- END TABLE : sskadminuser.m_app_care_calendar_set  --

-- START TABLE : sskadminuser.f_app_challenge  --
CREATE TABLE sskadminuser.f_app_challenge(
cust_no INT NOT NULL DEFAULT 0,
challenge_cd BIGINT NOT NULL DEFAULT 0,
challenge_name VARCHAR(60) NOT NULL DEFAULT ' ',
challenge_start_dt TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT to_timestamp('1900-01-01 00:00:00', 'YYYY-MM-DD HH24:MI:SS'),
challenge_end_dt TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT to_timestamp('1900-01-01 00:00:00', 'YYYY-MM-DD HH24:MI:SS'),
memo VARCHAR(800),
achieve_cond_days INT NOT NULL DEFAULT 0,
achieve_kbn CHAR(1) NOT NULL DEFAULT '0',
flower_anime_background_kbn CHAR(1) NOT NULL DEFAULT '1',
flower_anime_achieve_kbn CHAR(1) NOT NULL DEFAULT '1',
register_user_cd VARCHAR(64) NOT NULL DEFAULT ' ',
register_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT to_timestamp('1900-01-01 00:00:00', 'YYYY-MM-DD HH24:MI:SS'),
update_user_cd VARCHAR(64) NOT NULL DEFAULT ' ',
scr_upd_dt_tm TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT to_timestamp('1900-01-01 00:00:00', 'YYYY-MM-DD HH24:MI:SS'),
bat_upd_dt_tm TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT to_timestamp('1900-01-01 00:00:00', 'YYYY-MM-DD HH24:MI:SS'),
upd_cnt BIGINT NOT NULL DEFAULT 0,
upd_scr_name VARCHAR(80) NOT NULL DEFAULT ' ',
upd_bat_name VARCHAR(80) NOT NULL DEFAULT ' ',
del_flg INT NOT NULL DEFAULT 0,
CONSTRAINT pk_f_app_challenge PRIMARY KEY (cust_no,challenge_cd)
);
-- ADD COLUMN
COMMENT ON TABLE sskadminuser.f_app_challenge IS 'アプリチャレンジ伝票';
COMMENT ON COLUMN sskadminuser.f_app_challenge.cust_no IS '会員番号';
COMMENT ON COLUMN sskadminuser.f_app_challenge.challenge_cd IS 'チャレンジコード';
COMMENT ON COLUMN sskadminuser.f_app_challenge.challenge_name IS 'チャレンジ名';
COMMENT ON COLUMN sskadminuser.f_app_challenge.challenge_start_dt IS 'チャレンジ開始日';
COMMENT ON COLUMN sskadminuser.f_app_challenge.challenge_end_dt IS 'チャレンジ終了日';
COMMENT ON COLUMN sskadminuser.f_app_challenge.memo IS 'メモ';
COMMENT ON COLUMN sskadminuser.f_app_challenge.achieve_cond_days IS '達成条件日数';
COMMENT ON COLUMN sskadminuser.f_app_challenge.achieve_kbn IS '達成区分';
COMMENT ON COLUMN sskadminuser.f_app_challenge.flower_anime_background_kbn IS '花アニメ背景区分';
COMMENT ON COLUMN sskadminuser.f_app_challenge.flower_anime_achieve_kbn IS '花アニメ達成区分';
COMMENT ON COLUMN sskadminuser.f_app_challenge.register_user_cd IS '登録者';
COMMENT ON COLUMN sskadminuser.f_app_challenge.register_date IS '登録日時';
COMMENT ON COLUMN sskadminuser.f_app_challenge.update_user_cd IS '更新者';
COMMENT ON COLUMN sskadminuser.f_app_challenge.scr_upd_dt_tm IS '画面更新日時';
COMMENT ON COLUMN sskadminuser.f_app_challenge.bat_upd_dt_tm IS 'バッチ更新日時';
COMMENT ON COLUMN sskadminuser.f_app_challenge.upd_cnt IS '更新カウント';
COMMENT ON COLUMN sskadminuser.f_app_challenge.upd_scr_name IS '更新画面名';
COMMENT ON COLUMN sskadminuser.f_app_challenge.upd_bat_name IS '更新バッチ名';
COMMENT ON COLUMN sskadminuser.f_app_challenge.del_flg IS '削除フラグ';
-- CREATE INDEX 
-- END TABLE : sskadminuser.f_app_challenge  --

-- START TABLE : sskadminuser.r_app_and_event  --
CREATE TABLE sskadminuser.r_app_and_event(
cust_no INT NOT NULL DEFAULT 0,
event_cd BIGINT NOT NULL DEFAULT 0,
dtl_no BIGINT NOT NULL DEFAULT 0,
start_dt TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT to_timestamp('1900-01-01 00:00:00', 'YYYY-MM-DD HH24:MI:SS'),
achieve_kbn CHAR(1) NOT NULL DEFAULT '0',
flower_anime_background_kbn CHAR(1) NOT NULL DEFAULT '1',
flower_anime_achieve_stat_kbn CHAR(1) NOT NULL DEFAULT '1',
register_user_cd VARCHAR(64) NOT NULL DEFAULT ' ',
register_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT to_timestamp('1900-01-01 00:00:00', 'YYYY-MM-DD HH24:MI:SS'),
update_user_cd VARCHAR(64) NOT NULL DEFAULT ' ',
scr_upd_dt_tm TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT to_timestamp('1900-01-01 00:00:00', 'YYYY-MM-DD HH24:MI:SS'),
bat_upd_dt_tm TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT to_timestamp('1900-01-01 00:00:00', 'YYYY-MM-DD HH24:MI:SS'),
upd_cnt BIGINT NOT NULL DEFAULT 0,
upd_scr_name VARCHAR(80) NOT NULL DEFAULT ' ',
upd_bat_name VARCHAR(80) NOT NULL DEFAULT ' ',
del_flg INT NOT NULL DEFAULT 0,
CONSTRAINT pk_r_app_and_event PRIMARY KEY (cust_no,event_cd,dtl_no)
);
-- ADD COLUMN
COMMENT ON TABLE sskadminuser.r_app_and_event IS 'アプリイベント紐付';
COMMENT ON COLUMN sskadminuser.r_app_and_event.cust_no IS '会員番号';
COMMENT ON COLUMN sskadminuser.r_app_and_event.event_cd IS 'イベントコード';
COMMENT ON COLUMN sskadminuser.r_app_and_event.dtl_no IS '明細番号';
COMMENT ON COLUMN sskadminuser.r_app_and_event.start_dt IS '開始日';
COMMENT ON COLUMN sskadminuser.r_app_and_event.achieve_kbn IS '達成区分';
COMMENT ON COLUMN sskadminuser.r_app_and_event.flower_anime_background_kbn IS '花アニメ背景区分';
COMMENT ON COLUMN sskadminuser.r_app_and_event.flower_anime_achieve_stat_kbn IS '花アニメ達成状態区分';
COMMENT ON COLUMN sskadminuser.r_app_and_event.register_user_cd IS '登録者';
COMMENT ON COLUMN sskadminuser.r_app_and_event.register_date IS '登録日時';
COMMENT ON COLUMN sskadminuser.r_app_and_event.update_user_cd IS '更新者';
COMMENT ON COLUMN sskadminuser.r_app_and_event.scr_upd_dt_tm IS '画面更新日時';
COMMENT ON COLUMN sskadminuser.r_app_and_event.bat_upd_dt_tm IS 'バッチ更新日時';
COMMENT ON COLUMN sskadminuser.r_app_and_event.upd_cnt IS '更新カウント';
COMMENT ON COLUMN sskadminuser.r_app_and_event.upd_scr_name IS '更新画面名';
COMMENT ON COLUMN sskadminuser.r_app_and_event.upd_bat_name IS '更新バッチ名';
COMMENT ON COLUMN sskadminuser.r_app_and_event.del_flg IS '削除フラグ';
-- CREATE INDEX 
-- END TABLE : sskadminuser.r_app_and_event  --

-- START TABLE : sskadminuser.app_applause_log  --
CREATE TABLE sskadminuser.app_applause_log(
applause_to_mbr_no INT NOT NULL,
care_record_dt TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT to_timestamp('1900-01-01 00:00:00', 'YYYY-MM-DD HH24:MI:SS'),
applause_from_mbr_no INT NOT NULL,
applause_kbn INT NOT NULL DEFAULT 0,
comment_cd BIGINT NOT NULL DEFAULT 0,
sync_kbn CHAR(1) NOT NULL DEFAULT '0',
register_user_cd VARCHAR(64) NOT NULL DEFAULT ' ',
register_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT to_timestamp('1900-01-01 00:00:00', 'YYYY-MM-DD HH24:MI:SS'),
update_user_cd VARCHAR(64) NOT NULL DEFAULT ' ',
scr_upd_dt_tm TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT to_timestamp('1900-01-01 00:00:00', 'YYYY-MM-DD HH24:MI:SS'),
bat_upd_dt_tm TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT to_timestamp('1900-01-01 00:00:00', 'YYYY-MM-DD HH24:MI:SS'),
upd_cnt BIGINT NOT NULL DEFAULT 0,
upd_scr_name VARCHAR(80) NOT NULL DEFAULT ' ',
upd_bat_name VARCHAR(80) NOT NULL DEFAULT ' ',
del_flg INT NOT NULL DEFAULT 0,
CONSTRAINT pk_app_applause_log PRIMARY KEY (applause_to_mbr_no,care_record_dt,applause_from_mbr_no,applause_kbn,comment_cd)
);
-- ADD COLUMN
COMMENT ON TABLE sskadminuser.app_applause_log IS 'アプリ拍手ログ管理';
COMMENT ON COLUMN sskadminuser.app_applause_log.applause_to_mbr_no IS '拍手された会員番号';
COMMENT ON COLUMN sskadminuser.app_applause_log.care_record_dt IS 'お手当記録日';
COMMENT ON COLUMN sskadminuser.app_applause_log.applause_from_mbr_no IS '拍手した会員番号';
COMMENT ON COLUMN sskadminuser.app_applause_log.applause_kbn IS '拍手区分';
COMMENT ON COLUMN sskadminuser.app_applause_log.comment_cd IS 'コメントコード';
COMMENT ON COLUMN sskadminuser.app_applause_log.sync_kbn IS '同期区分';
COMMENT ON COLUMN sskadminuser.app_applause_log.register_user_cd IS '登録者';
COMMENT ON COLUMN sskadminuser.app_applause_log.register_date IS '登録日時';
COMMENT ON COLUMN sskadminuser.app_applause_log.update_user_cd IS '更新者';
COMMENT ON COLUMN sskadminuser.app_applause_log.scr_upd_dt_tm IS '画面更新日時';
COMMENT ON COLUMN sskadminuser.app_applause_log.bat_upd_dt_tm IS 'バッチ更新日時';
COMMENT ON COLUMN sskadminuser.app_applause_log.upd_cnt IS '更新カウント';
COMMENT ON COLUMN sskadminuser.app_applause_log.upd_scr_name IS '更新画面名';
COMMENT ON COLUMN sskadminuser.app_applause_log.upd_bat_name IS '更新バッチ名';
COMMENT ON COLUMN sskadminuser.app_applause_log.del_flg IS '削除フラグ';
-- CREATE INDEX 
CREATE INDEX idx_app_applause_log_01 ON sskadminuser.app_applause_log (sync_kbn);
-- END TABLE : sskadminuser.app_applause_log  --

-- START TABLE : sskadminuser.f_pleaser_msg  --
CREATE TABLE sskadminuser.f_pleaser_msg(
dtl_no BIGINT NOT NULL DEFAULT 0,
cust_no INT NOT NULL DEFAULT 0,
charge_cd VARCHAR(10) NOT NULL DEFAULT ' ',
msg_record_dt_tm TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT to_timestamp('1900-01-01 00:00:00', 'YYYY-MM-DD HH24:MI:SS'),
site_kbn CHAR(1) NOT NULL DEFAULT ' ',
msg_kbn CHAR(1) NOT NULL DEFAULT ' ',
msg VARCHAR(800) NOT NULL DEFAULT ' ',
comment_cd BIGINT NOT NULL DEFAULT 0,
read_flg CHAR(1) NOT NULL DEFAULT '0',
register_user_cd VARCHAR(64) NOT NULL DEFAULT ' ',
register_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT to_timestamp('1900-01-01 00:00:00', 'YYYY-MM-DD HH24:MI:SS'),
update_user_cd VARCHAR(64) NOT NULL DEFAULT ' ',
scr_upd_dt_tm TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT to_timestamp('1900-01-01 00:00:00', 'YYYY-MM-DD HH24:MI:SS'),
bat_upd_dt_tm TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT to_timestamp('1900-01-01 00:00:00', 'YYYY-MM-DD HH24:MI:SS'),
upd_cnt BIGINT NOT NULL DEFAULT 0,
upd_scr_name VARCHAR(80) NOT NULL DEFAULT ' ',
upd_bat_name VARCHAR(80) NOT NULL DEFAULT ' ',
del_flg INT NOT NULL DEFAULT 0,
CONSTRAINT pk_f_pleaser_msg PRIMARY KEY (dtl_no)
);
-- ADD COLUMN
COMMENT ON TABLE sskadminuser.f_pleaser_msg IS 'プリーザ―メッセージ伝票';
COMMENT ON COLUMN sskadminuser.f_pleaser_msg.dtl_no IS '明細番号';
COMMENT ON COLUMN sskadminuser.f_pleaser_msg.cust_no IS '会員番号';
COMMENT ON COLUMN sskadminuser.f_pleaser_msg.charge_cd IS '担当コード';
COMMENT ON COLUMN sskadminuser.f_pleaser_msg.msg_record_dt_tm IS 'メッセージ記録日時';
COMMENT ON COLUMN sskadminuser.f_pleaser_msg.site_kbn IS 'サイト区分';
COMMENT ON COLUMN sskadminuser.f_pleaser_msg.msg_kbn IS 'メッセージ区分';
COMMENT ON COLUMN sskadminuser.f_pleaser_msg.msg IS 'メッセージ';
COMMENT ON COLUMN sskadminuser.f_pleaser_msg.comment_cd IS 'コメントコード';
COMMENT ON COLUMN sskadminuser.f_pleaser_msg.read_flg IS '既読フラグ';
COMMENT ON COLUMN sskadminuser.f_pleaser_msg.register_user_cd IS '登録者';
COMMENT ON COLUMN sskadminuser.f_pleaser_msg.register_date IS '登録日時';
COMMENT ON COLUMN sskadminuser.f_pleaser_msg.update_user_cd IS '更新者';
COMMENT ON COLUMN sskadminuser.f_pleaser_msg.scr_upd_dt_tm IS '画面更新日時';
COMMENT ON COLUMN sskadminuser.f_pleaser_msg.bat_upd_dt_tm IS 'バッチ更新日時';
COMMENT ON COLUMN sskadminuser.f_pleaser_msg.upd_cnt IS '更新カウント';
COMMENT ON COLUMN sskadminuser.f_pleaser_msg.upd_scr_name IS '更新画面名';
COMMENT ON COLUMN sskadminuser.f_pleaser_msg.upd_bat_name IS '更新バッチ名';
COMMENT ON COLUMN sskadminuser.f_pleaser_msg.del_flg IS '削除フラグ';
-- CREATE INDEX 
-- END TABLE : sskadminuser.f_pleaser_msg  --

-- START TABLE : sskadminuser.f_gift  --
CREATE TABLE sskadminuser.f_gift(
odr_seq BIGINT NOT NULL,
site_kbn CHAR(1) NOT NULL,
cust_no INT NOT NULL,
ship_att_kbn_1 CHAR(6) NOT NULL,
ship_att_kbn_2 CHAR(6) NOT NULL,
msg_card_kbn CHAR(1) NOT NULL,
msg_to_name VARCHAR(124),
msg_body_letter VARCHAR(200),
msg_sender_name VARCHAR(124),
dlv_to_kbn CHAR(1),
dlv_req_dt TIMESTAMP(0) WITHOUT TIME ZONE,
dlv_tm_kbn CHAR(2),
rcver_name VARCHAR(92),
rcver_kana_name VARCHAR(104),
rcver_adr_post_no VARCHAR(8),
kana_adr VARCHAR(124),
rcver_adr VARCHAR(180),
rcver_adr_non_chg_part_kana VARCHAR(124),
rcver_adr_non_chg_part VARCHAR(124),
rcver_adr_tel_no VARCHAR(64),
sender_name VARCHAR(84),
domo_use_kbn CHAR(2) NOT NULL,
rcver_info_input_agree_flg CHAR(1) NOT NULL,
session_id VARCHAR(100) NOT NULL,
del_flg CHAR(1) NOT NULL DEFAULT '0',
update_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
register_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
update_user_cd VARCHAR(64) NOT NULL,
register_user_cd VARCHAR(64) NOT NULL,
CONSTRAINT pk_f_gift PRIMARY KEY (odr_seq)
);
-- ADD COLUMN
COMMENT ON TABLE sskadminuser.f_gift IS '贈物伝票';
COMMENT ON COLUMN sskadminuser.f_gift.odr_seq IS '注文連番';
COMMENT ON COLUMN sskadminuser.f_gift.site_kbn IS 'サイト区分';
COMMENT ON COLUMN sskadminuser.f_gift.cust_no IS '会員番号';
COMMENT ON COLUMN sskadminuser.f_gift.ship_att_kbn_1 IS '発送注意区分1';
COMMENT ON COLUMN sskadminuser.f_gift.ship_att_kbn_2 IS '発送注意区分2';
COMMENT ON COLUMN sskadminuser.f_gift.msg_card_kbn IS 'メッセージカード区分';
COMMENT ON COLUMN sskadminuser.f_gift.msg_to_name IS 'メッセージ宛名';
COMMENT ON COLUMN sskadminuser.f_gift.msg_body_letter IS 'メッセージ本文';
COMMENT ON COLUMN sskadminuser.f_gift.msg_sender_name IS 'メッセージ差出人';
COMMENT ON COLUMN sskadminuser.f_gift.dlv_to_kbn IS '配送先区分';
COMMENT ON COLUMN sskadminuser.f_gift.dlv_req_dt IS '配送希望日';
COMMENT ON COLUMN sskadminuser.f_gift.dlv_tm_kbn IS '配送時刻区分';
COMMENT ON COLUMN sskadminuser.f_gift.rcver_name IS '受取人姓名';
COMMENT ON COLUMN sskadminuser.f_gift.rcver_kana_name IS '受取人カナ名';
COMMENT ON COLUMN sskadminuser.f_gift.rcver_adr_post_no IS '受取人住所郵便番号';
COMMENT ON COLUMN sskadminuser.f_gift.kana_adr IS 'カナ住所';
COMMENT ON COLUMN sskadminuser.f_gift.rcver_adr IS '受取人住所';
COMMENT ON COLUMN sskadminuser.f_gift.rcver_adr_non_chg_part_kana IS '受取人住所非変換部カナ';
COMMENT ON COLUMN sskadminuser.f_gift.rcver_adr_non_chg_part IS '受取人住所非変換部';
COMMENT ON COLUMN sskadminuser.f_gift.rcver_adr_tel_no IS '受取人住所電話番号';
COMMENT ON COLUMN sskadminuser.f_gift.sender_name IS '贈主様姓名';
COMMENT ON COLUMN sskadminuser.f_gift.domo_use_kbn IS 'ドモ使用区分';
COMMENT ON COLUMN sskadminuser.f_gift.rcver_info_input_agree_flg IS '受取人情報登録同意フラグ';
COMMENT ON COLUMN sskadminuser.f_gift.session_id IS 'セッションID';
COMMENT ON COLUMN sskadminuser.f_gift.del_flg IS '削除フラグ';
COMMENT ON COLUMN sskadminuser.f_gift.update_date IS '更新日時';
COMMENT ON COLUMN sskadminuser.f_gift.register_date IS '登録日時';
COMMENT ON COLUMN sskadminuser.f_gift.update_user_cd IS '更新者';
COMMENT ON COLUMN sskadminuser.f_gift.register_user_cd IS '登録者';
-- CREATE INDEX 
CREATE INDEX idx_f_gift_01 ON sskadminuser.f_gift (cust_no);
CREATE INDEX idx_f_gift_02 ON sskadminuser.f_gift (update_date,register_date);
-- END TABLE : sskadminuser.f_gift  --

-- START TABLE : sskadminuser.h_applause_congrats  --
CREATE TABLE sskadminuser.h_applause_congrats(
applause_cd BIGINT NOT NULL,
event_kbn INT NOT NULL,
applause_kbn CHAR(1) NOT NULL,
applause_to_mbr_no INT NOT NULL,
applause_from_mbr_no INT NOT NULL,
memo_record_dt TIMESTAMP(0) WITHOUT TIME ZONE,
session_id VARCHAR(200),
sync_flg CHAR(1) NOT NULL,
update_date TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT current_timestamp(0),
register_date TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT current_timestamp(0),
update_user_cd VARCHAR(64),
register_user_cd VARCHAR(64),
app_sync_flg CHAR(1) NOT NULL DEFAULT '0',
CONSTRAINT pk_h_applause_congrats PRIMARY KEY (applause_cd)
);
-- ADD COLUMN
COMMENT ON TABLE sskadminuser.h_applause_congrats IS '拍手・おめでとう履歴';
COMMENT ON COLUMN sskadminuser.h_applause_congrats.applause_cd IS '拍手コード';
COMMENT ON COLUMN sskadminuser.h_applause_congrats.event_kbn IS 'イベント区分';
COMMENT ON COLUMN sskadminuser.h_applause_congrats.applause_kbn IS '拍手区分';
COMMENT ON COLUMN sskadminuser.h_applause_congrats.applause_to_mbr_no IS '拍手された会員番号';
COMMENT ON COLUMN sskadminuser.h_applause_congrats.applause_from_mbr_no IS '拍手した会員番号';
COMMENT ON COLUMN sskadminuser.h_applause_congrats.memo_record_dt IS 'メモ記録日';
COMMENT ON COLUMN sskadminuser.h_applause_congrats.session_id IS 'セッションID';
COMMENT ON COLUMN sskadminuser.h_applause_congrats.sync_flg IS '同期フラグ';
COMMENT ON COLUMN sskadminuser.h_applause_congrats.update_date IS '更新日時';
COMMENT ON COLUMN sskadminuser.h_applause_congrats.register_date IS '登録日時';
COMMENT ON COLUMN sskadminuser.h_applause_congrats.update_user_cd IS '更新者';
COMMENT ON COLUMN sskadminuser.h_applause_congrats.register_user_cd IS '登録者';
COMMENT ON COLUMN sskadminuser.h_applause_congrats.app_sync_flg IS 'アプリ同期フラグ';
-- CREATE INDEX 
CREATE INDEX idx_h_applause_congrats_01 ON sskadminuser.h_applause_congrats (applause_to_mbr_no);
CREATE INDEX idx_h_applause_congrats_02 ON sskadminuser.h_applause_congrats (applause_from_mbr_no);
CREATE INDEX idx_h_applause_congrats_03 ON sskadminuser.h_applause_congrats (app_sync_flg);
CREATE INDEX idx_h_applause_congrats_04 ON sskadminuser.h_applause_congrats (update_date,register_date);
-- END TABLE : sskadminuser.h_applause_congrats  --

-- START TABLE : sskadminuser.h_line_point  --
CREATE TABLE sskadminuser.h_line_point(
dtl_seq BIGINT NOT NULL DEFAULT 0,
order_cd VARCHAR(64) NOT NULL DEFAULT '0',
line_uid VARCHAR(64) NOT NULL DEFAULT '0',
trade_cd VARCHAR(32) DEFAULT NULL,
trade_dt_tm BIGINT DEFAULT NULL,
trade_kbn CHAR(2) NOT NULL DEFAULT '00',
issue_point_num BIGINT NOT NULL DEFAULT 0,
cncl_point_num BIGINT NOT NULL DEFAULT 0,
bal_trade_point_num BIGINT NOT NULL DEFAULT 0,
point_bal BIGINT NOT NULL DEFAULT 0,
note VARCHAR(200) DEFAULT NULL,
sync_flg CHAR(1) NOT NULL DEFAULT '0',
register_user_cd VARCHAR(13) NOT NULL DEFAULT ' ',
register_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
update_user_cd VARCHAR(13) NOT NULL DEFAULT ' ',
scr_upd_dt_tm TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
bat_upd_dt_tm TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
upd_cnt BIGINT NOT NULL DEFAULT 0,
upd_scr_name VARCHAR(80) NOT NULL DEFAULT ' ',
upd_bat_name VARCHAR(80) NOT NULL DEFAULT ' ',
del_flg CHAR(1) NOT NULL DEFAULT '0',
CONSTRAINT pk_h_line_point PRIMARY KEY (dtl_seq)
);
-- ADD COLUMN
COMMENT ON TABLE sskadminuser.h_line_point IS 'LINEポイント履歴';
COMMENT ON COLUMN sskadminuser.h_line_point.dtl_seq IS '明細連番';
COMMENT ON COLUMN sskadminuser.h_line_point.order_cd IS 'オーダーコード';
COMMENT ON COLUMN sskadminuser.h_line_point.line_uid IS 'LINE固有識別子';
COMMENT ON COLUMN sskadminuser.h_line_point.trade_cd IS '取引コード';
COMMENT ON COLUMN sskadminuser.h_line_point.trade_dt_tm IS '取引日時';
COMMENT ON COLUMN sskadminuser.h_line_point.trade_kbn IS '取引区分';
COMMENT ON COLUMN sskadminuser.h_line_point.issue_point_num IS '発行ポイント数';
COMMENT ON COLUMN sskadminuser.h_line_point.cncl_point_num IS '取消ポイント数';
COMMENT ON COLUMN sskadminuser.h_line_point.bal_trade_point_num IS '残取引ポイント数';
COMMENT ON COLUMN sskadminuser.h_line_point.point_bal IS 'ポイント残高';
COMMENT ON COLUMN sskadminuser.h_line_point.note IS '備考';
COMMENT ON COLUMN sskadminuser.h_line_point.sync_flg IS '同期フラグ';
COMMENT ON COLUMN sskadminuser.h_line_point.register_user_cd IS '登録者';
COMMENT ON COLUMN sskadminuser.h_line_point.register_date IS '登録日時';
COMMENT ON COLUMN sskadminuser.h_line_point.update_user_cd IS '更新者';
COMMENT ON COLUMN sskadminuser.h_line_point.scr_upd_dt_tm IS '画面更新日時';
COMMENT ON COLUMN sskadminuser.h_line_point.bat_upd_dt_tm IS 'バッチ更新日時';
COMMENT ON COLUMN sskadminuser.h_line_point.upd_cnt IS '更新カウント';
COMMENT ON COLUMN sskadminuser.h_line_point.upd_scr_name IS '更新画面名';
COMMENT ON COLUMN sskadminuser.h_line_point.upd_bat_name IS '更新バッチ名';
COMMENT ON COLUMN sskadminuser.h_line_point.del_flg IS '削除フラグ';
-- CREATE INDEX 
CREATE INDEX idx_h_line_point_01 ON sskadminuser.h_line_point (order_cd);
CREATE INDEX idx_h_line_point_02 ON sskadminuser.h_line_point (line_uid);
-- END TABLE : sskadminuser.h_line_point  --

-- START TABLE : sskadminuser.h_character_get  --
CREATE TABLE sskadminuser.h_character_get(
record_seq BIGINT NOT NULL,
cust_no INT NOT NULL,
character_seq INT NOT NULL,
get_kbn INT DEFAULT 0,
get_dt_tm TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT current_timestamp(0),
update_date TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT current_timestamp(0),
register_date TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT current_timestamp(0),
update_user_cd VARCHAR(64) NOT NULL,
register_user_cd VARCHAR(64) NOT NULL,
del_flg INT DEFAULT 0,
CONSTRAINT pk_h_character_get PRIMARY KEY (record_seq)
);
-- ADD COLUMN
COMMENT ON TABLE sskadminuser.h_character_get IS 'キャラクタ獲得履歴';
COMMENT ON COLUMN sskadminuser.h_character_get.record_seq IS 'レコード連番';
COMMENT ON COLUMN sskadminuser.h_character_get.cust_no IS '会員番号';
COMMENT ON COLUMN sskadminuser.h_character_get.character_seq IS 'キャラクタ連番';
COMMENT ON COLUMN sskadminuser.h_character_get.get_kbn IS '獲得区分';
COMMENT ON COLUMN sskadminuser.h_character_get.get_dt_tm IS '獲得日時';
COMMENT ON COLUMN sskadminuser.h_character_get.update_date IS '更新日時';
COMMENT ON COLUMN sskadminuser.h_character_get.register_date IS '登録日時';
COMMENT ON COLUMN sskadminuser.h_character_get.update_user_cd IS '更新者';
COMMENT ON COLUMN sskadminuser.h_character_get.register_user_cd IS '登録者';
COMMENT ON COLUMN sskadminuser.h_character_get.del_flg IS '削除フラグ';
-- CREATE INDEX 
CREATE INDEX idx_h_character_get_01 ON sskadminuser.h_character_get (cust_no);
-- END TABLE : sskadminuser.h_character_get  --

-- START TABLE : sskadminuser.m_info  --
CREATE TABLE sskadminuser.m_info(
cust_no INT NOT NULL,
msg_cd CHAR(4) NOT NULL,
disp_start_dt TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL,
disp_end_dt TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL,
del_flg CHAR(1) NOT NULL DEFAULT '0',
update_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
register_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
update_user_cd VARCHAR(64) NOT NULL,
register_user_cd VARCHAR(64) NOT NULL,
CONSTRAINT pk_m_info PRIMARY KEY (cust_no,msg_cd)
);
-- ADD COLUMN
COMMENT ON TABLE sskadminuser.m_info IS '報知台帳';
COMMENT ON COLUMN sskadminuser.m_info.cust_no IS '会員番号';
COMMENT ON COLUMN sskadminuser.m_info.msg_cd IS 'メッセージコード';
COMMENT ON COLUMN sskadminuser.m_info.disp_start_dt IS '表示開始日';
COMMENT ON COLUMN sskadminuser.m_info.disp_end_dt IS '表示終了日';
COMMENT ON COLUMN sskadminuser.m_info.del_flg IS '削除フラグ';
COMMENT ON COLUMN sskadminuser.m_info.update_date IS '更新日時';
COMMENT ON COLUMN sskadminuser.m_info.register_date IS '登録日時';
COMMENT ON COLUMN sskadminuser.m_info.update_user_cd IS '更新者';
COMMENT ON COLUMN sskadminuser.m_info.register_user_cd IS '登録者';
-- CREATE INDEX 
CREATE INDEX idx_m_info_01 ON sskadminuser.m_info (update_date,register_date);
-- END TABLE : sskadminuser.m_info  --

-- START TABLE : sskadminuser.m_topic_input_ng  --
CREATE TABLE sskadminuser.m_topic_input_ng(
topic_kbn CHAR(1) NOT NULL,
cont VARCHAR(312) NOT NULL,
keyword VARCHAR(100) NOT NULL,
note VARCHAR(1000),
del_flg CHAR(1) NOT NULL,
update_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
register_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
update_user_cd VARCHAR(64) NOT NULL,
register_user_cd VARCHAR(64) NOT NULL
);
-- ADD COLUMN
COMMENT ON TABLE sskadminuser.m_topic_input_ng IS '項目別登録拒否台帳';
COMMENT ON COLUMN sskadminuser.m_topic_input_ng.topic_kbn IS '項目区分';
COMMENT ON COLUMN sskadminuser.m_topic_input_ng.cont IS '内容';
COMMENT ON COLUMN sskadminuser.m_topic_input_ng.keyword IS 'キーワード';
COMMENT ON COLUMN sskadminuser.m_topic_input_ng.note IS '備考';
COMMENT ON COLUMN sskadminuser.m_topic_input_ng.del_flg IS '削除フラグ';
COMMENT ON COLUMN sskadminuser.m_topic_input_ng.update_date IS '更新日時';
COMMENT ON COLUMN sskadminuser.m_topic_input_ng.register_date IS '登録日時';
COMMENT ON COLUMN sskadminuser.m_topic_input_ng.update_user_cd IS '更新者';
COMMENT ON COLUMN sskadminuser.m_topic_input_ng.register_user_cd IS '登録者';
-- CREATE INDEX 
-- END TABLE : sskadminuser.m_topic_input_ng  --

-- START TABLE : sskadminuser.smpl_set_review_worry_d  --
CREATE TABLE sskadminuser.smpl_set_review_worry_d(
feeling_voice_cd VARCHAR(8) NOT NULL,
worry_kbn CHAR(2) NOT NULL,
update_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
update_user_cd VARCHAR(64),
register_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
register_user_cd VARCHAR(64),
CONSTRAINT pk_smpl_set_review_worry_d PRIMARY KEY (feeling_voice_cd,worry_kbn)
);
-- ADD COLUMN
COMMENT ON TABLE sskadminuser.smpl_set_review_worry_d IS 'サンプルセット口コミ悩み明細';
COMMENT ON COLUMN sskadminuser.smpl_set_review_worry_d.feeling_voice_cd IS '実感の声コード';
COMMENT ON COLUMN sskadminuser.smpl_set_review_worry_d.worry_kbn IS '悩み区分';
COMMENT ON COLUMN sskadminuser.smpl_set_review_worry_d.update_date IS '更新日時';
COMMENT ON COLUMN sskadminuser.smpl_set_review_worry_d.update_user_cd IS '更新者';
COMMENT ON COLUMN sskadminuser.smpl_set_review_worry_d.register_date IS '登録日時';
COMMENT ON COLUMN sskadminuser.smpl_set_review_worry_d.register_user_cd IS '登録者';
-- CREATE INDEX 
CREATE INDEX idx_smpl_set_review_worry_d_01 ON sskadminuser.smpl_set_review_worry_d (update_date,register_date);
-- END TABLE : sskadminuser.smpl_set_review_worry_d  --

-- START TABLE : sskadminuser.f_smpl_set_review  --
CREATE TABLE sskadminuser.f_smpl_set_review(
feeling_voice_cd VARCHAR(8) NOT NULL,
site_kbn CHAR(1) NOT NULL,
disp_kbn VARCHAR(2) NOT NULL,
cust_no INT,
handlename VARCHAR(36) NOT NULL,
age VARCHAR(4),
mail_adr VARCHAR(180),
skin_type VARCHAR(2),
worry VARCHAR(200),
un_use_item VARCHAR(200),
quesnr_4 VARCHAR(200),
quesnr_5 VARCHAR(200),
quesnr_6 VARCHAR(200),
quesnr_7 VARCHAR(200),
ans_dt_tm TIMESTAMP(0) WITHOUT TIME ZONE,
ans_cont VARCHAR(4000),
update_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
register_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
update_user_cd VARCHAR(64) NOT NULL,
register_user_cd VARCHAR(64) NOT NULL,
reply_way_kbn CHAR(1),
reply_req_dt VARCHAR(8),
reply_req_tm_kbn CHAR(1)
);
-- ADD COLUMN
COMMENT ON TABLE sskadminuser.f_smpl_set_review IS 'サンプルセット口コミ伝票';
COMMENT ON COLUMN sskadminuser.f_smpl_set_review.feeling_voice_cd IS '実感の声コード';
COMMENT ON COLUMN sskadminuser.f_smpl_set_review.site_kbn IS 'サイト区分';
COMMENT ON COLUMN sskadminuser.f_smpl_set_review.disp_kbn IS '表示区分';
COMMENT ON COLUMN sskadminuser.f_smpl_set_review.cust_no IS '会員番号';
COMMENT ON COLUMN sskadminuser.f_smpl_set_review.handlename IS 'ハンドルネーム';
COMMENT ON COLUMN sskadminuser.f_smpl_set_review.age IS '年齢';
COMMENT ON COLUMN sskadminuser.f_smpl_set_review.mail_adr IS 'メールアドレス';
COMMENT ON COLUMN sskadminuser.f_smpl_set_review.skin_type IS '肌質';
COMMENT ON COLUMN sskadminuser.f_smpl_set_review.worry IS '悩み';
COMMENT ON COLUMN sskadminuser.f_smpl_set_review.un_use_item IS '未使用商品';
COMMENT ON COLUMN sskadminuser.f_smpl_set_review.quesnr_4 IS 'アンケート4';
COMMENT ON COLUMN sskadminuser.f_smpl_set_review.quesnr_5 IS 'アンケート5';
COMMENT ON COLUMN sskadminuser.f_smpl_set_review.quesnr_6 IS 'アンケート6';
COMMENT ON COLUMN sskadminuser.f_smpl_set_review.quesnr_7 IS 'アンケート7';
COMMENT ON COLUMN sskadminuser.f_smpl_set_review.ans_dt_tm IS '回答日時';
COMMENT ON COLUMN sskadminuser.f_smpl_set_review.ans_cont IS '回答内容';
COMMENT ON COLUMN sskadminuser.f_smpl_set_review.update_date IS '更新日時';
COMMENT ON COLUMN sskadminuser.f_smpl_set_review.register_date IS '登録日時';
COMMENT ON COLUMN sskadminuser.f_smpl_set_review.update_user_cd IS '更新者';
COMMENT ON COLUMN sskadminuser.f_smpl_set_review.register_user_cd IS '登録者';
COMMENT ON COLUMN sskadminuser.f_smpl_set_review.reply_way_kbn IS '返信方法区分';
COMMENT ON COLUMN sskadminuser.f_smpl_set_review.reply_req_dt IS '返信希望日';
COMMENT ON COLUMN sskadminuser.f_smpl_set_review.reply_req_tm_kbn IS '返信希望時間区分';
-- CREATE INDEX 
CREATE INDEX idx_f_smpl_set_review_01 ON sskadminuser.f_smpl_set_review (site_kbn,disp_kbn);
CREATE INDEX idx_f_smpl_set_review_02 ON sskadminuser.f_smpl_set_review (feeling_voice_cd,disp_kbn);
CREATE UNIQUE INDEX idx_f_smpl_set_review_03 ON sskadminuser.f_smpl_set_review (feeling_voice_cd,cust_no);
CREATE INDEX idx_f_smpl_set_review_04 ON sskadminuser.f_smpl_set_review (update_date,register_date);
-- END TABLE : sskadminuser.f_smpl_set_review  --

-- START TABLE : sskadminuser.m_job  --
CREATE TABLE sskadminuser.m_job(
job_cd VARCHAR(2) NOT NULL,
job_name VARCHAR(64) NOT NULL,
mob_job_name VARCHAR(64) NOT NULL,
prior_level INT NOT NULL,
avail_flg CHAR(1) NOT NULL DEFAULT '1',
update_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
register_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
update_user_cd VARCHAR(64) NOT NULL,
register_user_cd VARCHAR(64) NOT NULL,
CONSTRAINT pk_m_job PRIMARY KEY (job_cd)
);
-- ADD COLUMN
COMMENT ON TABLE sskadminuser.m_job IS '職業台帳';
COMMENT ON COLUMN sskadminuser.m_job.job_cd IS '職業コード';
COMMENT ON COLUMN sskadminuser.m_job.job_name IS '職業名';
COMMENT ON COLUMN sskadminuser.m_job.mob_job_name IS '携帯での職業名';
COMMENT ON COLUMN sskadminuser.m_job.prior_level IS '優先度';
COMMENT ON COLUMN sskadminuser.m_job.avail_flg IS '有効フラグ';
COMMENT ON COLUMN sskadminuser.m_job.update_date IS '更新日時';
COMMENT ON COLUMN sskadminuser.m_job.register_date IS '登録日時';
COMMENT ON COLUMN sskadminuser.m_job.update_user_cd IS '更新者';
COMMENT ON COLUMN sskadminuser.m_job.register_user_cd IS '登録者';
-- CREATE INDEX 
CREATE INDEX idx_m_job_01 ON sskadminuser.m_job (prior_level);
CREATE INDEX idx_m_job_02 ON sskadminuser.m_job (avail_flg);
CREATE INDEX idx_m_job_03 ON sskadminuser.m_job (update_date,register_date);
-- END TABLE : sskadminuser.m_job  --

-- START TABLE : sskadminuser.m_indiv_act_mail_skelton_category  --
CREATE TABLE sskadminuser.m_indiv_act_mail_skelton_category(
category_cd VARCHAR(4) NOT NULL,
category_name VARCHAR(255) NOT NULL,
update_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
register_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
update_user_cd VARCHAR(64) NOT NULL,
register_user_cd VARCHAR(64) NOT NULL,
site_kbn CHAR(1) NOT NULL,
CONSTRAINT pk_m_indiv_act_mail_skelton_category PRIMARY KEY (category_cd)
);
-- ADD COLUMN
COMMENT ON TABLE sskadminuser.m_indiv_act_mail_skelton_category IS '個別対応メール雛形カテゴリ台帳';
COMMENT ON COLUMN sskadminuser.m_indiv_act_mail_skelton_category.category_cd IS 'カテゴリコード';
COMMENT ON COLUMN sskadminuser.m_indiv_act_mail_skelton_category.category_name IS 'カテゴリ名';
COMMENT ON COLUMN sskadminuser.m_indiv_act_mail_skelton_category.update_date IS '更新日時';
COMMENT ON COLUMN sskadminuser.m_indiv_act_mail_skelton_category.register_date IS '登録日時';
COMMENT ON COLUMN sskadminuser.m_indiv_act_mail_skelton_category.update_user_cd IS '更新者';
COMMENT ON COLUMN sskadminuser.m_indiv_act_mail_skelton_category.register_user_cd IS '登録者';
COMMENT ON COLUMN sskadminuser.m_indiv_act_mail_skelton_category.site_kbn IS 'サイト区分';
-- CREATE INDEX 
CREATE INDEX idx_m_indiv_act_mail_skelton_category_01 ON sskadminuser.m_indiv_act_mail_skelton_category (update_date,register_date);
-- END TABLE : sskadminuser.m_indiv_act_mail_skelton_category  --

-- START TABLE : sskadminuser.m_indiv_act_mail_skelton  --
CREATE TABLE sskadminuser.m_indiv_act_mail_skelton(
mail_cd VARCHAR(4) NOT NULL,
mail_name VARCHAR(60) NOT NULL,
category_cd VARCHAR(4) NOT NULL,
mail_subject VARCHAR(255) NOT NULL,
mob_mail_subject VARCHAR(255) NOT NULL,
mail_body_letter TEXT NOT NULL,
mob_mail_body_letter VARCHAR(4000) NOT NULL,
div_kbn CHAR(1) NOT NULL,
mob_flg CHAR(1) NOT NULL,
disp_flg CHAR(1) NOT NULL DEFAULT '0',
act_memo_1 VARCHAR(60),
act_memo_2 VARCHAR(60),
sign VARCHAR(4) NOT NULL,
update_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
register_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
update_user_cd VARCHAR(64) NOT NULL,
register_user_cd VARCHAR(64) NOT NULL,
site_kbn CHAR(1) NOT NULL,
CONSTRAINT pk_m_indiv_act_mail_skelton PRIMARY KEY (mail_cd)
);
-- ADD COLUMN
COMMENT ON TABLE sskadminuser.m_indiv_act_mail_skelton IS '個別対応メール雛形台帳';
COMMENT ON COLUMN sskadminuser.m_indiv_act_mail_skelton.mail_cd IS 'メールコード';
COMMENT ON COLUMN sskadminuser.m_indiv_act_mail_skelton.mail_name IS 'メール名';
COMMENT ON COLUMN sskadminuser.m_indiv_act_mail_skelton.category_cd IS 'カテゴリコード';
COMMENT ON COLUMN sskadminuser.m_indiv_act_mail_skelton.mail_subject IS 'メール件名';
COMMENT ON COLUMN sskadminuser.m_indiv_act_mail_skelton.mob_mail_subject IS '携帯メール件名';
COMMENT ON COLUMN sskadminuser.m_indiv_act_mail_skelton.mail_body_letter IS 'メール本文';
COMMENT ON COLUMN sskadminuser.m_indiv_act_mail_skelton.mob_mail_body_letter IS '携帯メール本文';
COMMENT ON COLUMN sskadminuser.m_indiv_act_mail_skelton.div_kbn IS '部門区分';
COMMENT ON COLUMN sskadminuser.m_indiv_act_mail_skelton.mob_flg IS '携帯フラグ';
COMMENT ON COLUMN sskadminuser.m_indiv_act_mail_skelton.disp_flg IS '表示フラグ';
COMMENT ON COLUMN sskadminuser.m_indiv_act_mail_skelton.act_memo_1 IS '対応メモ1';
COMMENT ON COLUMN sskadminuser.m_indiv_act_mail_skelton.act_memo_2 IS '対応メモ2';
COMMENT ON COLUMN sskadminuser.m_indiv_act_mail_skelton.sign IS 'シグネチャ';
COMMENT ON COLUMN sskadminuser.m_indiv_act_mail_skelton.update_date IS '更新日時';
COMMENT ON COLUMN sskadminuser.m_indiv_act_mail_skelton.register_date IS '登録日時';
COMMENT ON COLUMN sskadminuser.m_indiv_act_mail_skelton.update_user_cd IS '更新者';
COMMENT ON COLUMN sskadminuser.m_indiv_act_mail_skelton.register_user_cd IS '登録者';
COMMENT ON COLUMN sskadminuser.m_indiv_act_mail_skelton.site_kbn IS 'サイト区分';
-- CREATE INDEX 
CREATE INDEX idx_m_indiv_act_mail_skelton_01 ON sskadminuser.m_indiv_act_mail_skelton (category_cd);
CREATE INDEX idx_m_indiv_act_mail_skelton_02 ON sskadminuser.m_indiv_act_mail_skelton (update_date,register_date);
-- END TABLE : sskadminuser.m_indiv_act_mail_skelton  --

-- START TABLE : sskadminuser.h_indiv_act_mail_send  --
CREATE TABLE sskadminuser.h_indiv_act_mail_send(
req_dt_tm TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL,
cust_no INT NOT NULL,
send_dt_tm TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL,
mail_cd VARCHAR(4),
mail_adr VARCHAR(180) NOT NULL,
mail_body_letter TEXT,
err_flg CHAR(1) NOT NULL DEFAULT '0',
user_cd VARCHAR(10),
act_memo_1 VARCHAR(60),
act_memo_2 VARCHAR(60),
update_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
register_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
update_user_cd VARCHAR(64) NOT NULL,
register_user_cd VARCHAR(64) NOT NULL,
act_memo VARCHAR(400),
mail_data_connect_kbn CHAR(1) NOT NULL DEFAULT '0',
mbr_mail_send_cd DOUBLE PRECISION,
msg_cd VARCHAR(200)
);
-- ADD COLUMN
COMMENT ON TABLE sskadminuser.h_indiv_act_mail_send IS '個別対応メール送信履歴';
COMMENT ON COLUMN sskadminuser.h_indiv_act_mail_send.req_dt_tm IS '依頼日時';
COMMENT ON COLUMN sskadminuser.h_indiv_act_mail_send.cust_no IS '会員番号';
COMMENT ON COLUMN sskadminuser.h_indiv_act_mail_send.send_dt_tm IS '送信日時';
COMMENT ON COLUMN sskadminuser.h_indiv_act_mail_send.mail_cd IS 'メールコード';
COMMENT ON COLUMN sskadminuser.h_indiv_act_mail_send.mail_adr IS 'メールアドレス';
COMMENT ON COLUMN sskadminuser.h_indiv_act_mail_send.mail_body_letter IS 'メール本文';
COMMENT ON COLUMN sskadminuser.h_indiv_act_mail_send.err_flg IS 'エラーフラグ';
COMMENT ON COLUMN sskadminuser.h_indiv_act_mail_send.user_cd IS 'ユーザコード';
COMMENT ON COLUMN sskadminuser.h_indiv_act_mail_send.act_memo_1 IS '対応メモ1';
COMMENT ON COLUMN sskadminuser.h_indiv_act_mail_send.act_memo_2 IS '対応メモ2';
COMMENT ON COLUMN sskadminuser.h_indiv_act_mail_send.update_date IS '更新日時';
COMMENT ON COLUMN sskadminuser.h_indiv_act_mail_send.register_date IS '登録日時';
COMMENT ON COLUMN sskadminuser.h_indiv_act_mail_send.update_user_cd IS '更新者';
COMMENT ON COLUMN sskadminuser.h_indiv_act_mail_send.register_user_cd IS '登録者';
COMMENT ON COLUMN sskadminuser.h_indiv_act_mail_send.act_memo IS '対応メモ';
COMMENT ON COLUMN sskadminuser.h_indiv_act_mail_send.mail_data_connect_kbn IS 'メールデータ連携区分';
COMMENT ON COLUMN sskadminuser.h_indiv_act_mail_send.mbr_mail_send_cd IS '会員メール送信コード';
COMMENT ON COLUMN sskadminuser.h_indiv_act_mail_send.msg_cd IS 'メッセージコード';
-- CREATE INDEX 
CREATE INDEX idx_h_indiv_act_mail_send_01 ON sskadminuser.h_indiv_act_mail_send (req_dt_tm,cust_no);
CREATE INDEX idx_h_indiv_act_mail_send_02 ON sskadminuser.h_indiv_act_mail_send (update_date,register_date);
-- END TABLE : sskadminuser.h_indiv_act_mail_send  --

-- START TABLE : sskadminuser.f_indiv_act_mail_send  --
CREATE TABLE sskadminuser.f_indiv_act_mail_send(
req_dt_tm TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL,
cust_no INT NOT NULL,
send_dt_tm TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL,
mail_cd VARCHAR(4),
mail_adr VARCHAR(180) NOT NULL,
mail_body_letter TEXT,
err_flg CHAR(1) NOT NULL DEFAULT '0',
user_cd VARCHAR(10),
act_memo_1 VARCHAR(60),
act_memo_2 VARCHAR(60),
update_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
register_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
update_user_cd VARCHAR(64) NOT NULL,
register_user_cd VARCHAR(64) NOT NULL,
act_memo VARCHAR(400),
mail_data_connect_kbn CHAR(1) NOT NULL DEFAULT '0',
indiv_act_mail_send_hist_cd DOUBLE PRECISION,
msg_cd VARCHAR(200)
);
-- ADD COLUMN
COMMENT ON TABLE sskadminuser.f_indiv_act_mail_send IS '個別対応メール送信伝票';
COMMENT ON COLUMN sskadminuser.f_indiv_act_mail_send.req_dt_tm IS '依頼日時';
COMMENT ON COLUMN sskadminuser.f_indiv_act_mail_send.cust_no IS '会員番号';
COMMENT ON COLUMN sskadminuser.f_indiv_act_mail_send.send_dt_tm IS '送信日時';
COMMENT ON COLUMN sskadminuser.f_indiv_act_mail_send.mail_cd IS 'メールコード';
COMMENT ON COLUMN sskadminuser.f_indiv_act_mail_send.mail_adr IS 'メールアドレス';
COMMENT ON COLUMN sskadminuser.f_indiv_act_mail_send.mail_body_letter IS 'メール本文';
COMMENT ON COLUMN sskadminuser.f_indiv_act_mail_send.err_flg IS 'エラーフラグ';
COMMENT ON COLUMN sskadminuser.f_indiv_act_mail_send.user_cd IS 'ユーザコード';
COMMENT ON COLUMN sskadminuser.f_indiv_act_mail_send.act_memo_1 IS '対応メモ1';
COMMENT ON COLUMN sskadminuser.f_indiv_act_mail_send.act_memo_2 IS '対応メモ2';
COMMENT ON COLUMN sskadminuser.f_indiv_act_mail_send.update_date IS '更新日時';
COMMENT ON COLUMN sskadminuser.f_indiv_act_mail_send.register_date IS '登録日時';
COMMENT ON COLUMN sskadminuser.f_indiv_act_mail_send.update_user_cd IS '更新者';
COMMENT ON COLUMN sskadminuser.f_indiv_act_mail_send.register_user_cd IS '登録者';
COMMENT ON COLUMN sskadminuser.f_indiv_act_mail_send.act_memo IS '対応メモ';
COMMENT ON COLUMN sskadminuser.f_indiv_act_mail_send.mail_data_connect_kbn IS 'メールデータ連携区分';
COMMENT ON COLUMN sskadminuser.f_indiv_act_mail_send.indiv_act_mail_send_hist_cd IS '個別対応メール送信履歴コード';
COMMENT ON COLUMN sskadminuser.f_indiv_act_mail_send.msg_cd IS 'メッセージコード';
-- CREATE INDEX 
CREATE INDEX idx_f_indiv_act_mail_send_01 ON sskadminuser.f_indiv_act_mail_send (req_dt_tm,cust_no);
CREATE INDEX idx_f_indiv_act_mail_send_02 ON sskadminuser.f_indiv_act_mail_send (cust_no);
CREATE INDEX idx_f_indiv_act_mail_send_03 ON sskadminuser.f_indiv_act_mail_send (send_dt_tm,cust_no);
CREATE INDEX idx_f_indiv_act_mail_send_04 ON sskadminuser.f_indiv_act_mail_send (indiv_act_mail_send_hist_cd);
CREATE INDEX idx_f_indiv_act_mail_send_05 ON sskadminuser.f_indiv_act_mail_send (update_date,register_date);
-- END TABLE : sskadminuser.f_indiv_act_mail_send  --

-- START TABLE : sskadminuser.m_manager_mail  --
CREATE TABLE sskadminuser.m_manager_mail(
mail_seq BIGINT NOT NULL,
ctrl_mail_kbn INT NOT NULL,
site_kbn CHAR(1) NOT NULL,
mail_adr VARCHAR(100) NOT NULL,
mail_name VARCHAR(50) NOT NULL,
send_way_kbn INT NOT NULL DEFAULT 1,
update_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
register_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
update_user_cd VARCHAR(64) NOT NULL,
register_user_cd VARCHAR(64) NOT NULL,
CONSTRAINT pk_m_manager_mail PRIMARY KEY (mail_seq,site_kbn)
);
-- ADD COLUMN
COMMENT ON TABLE sskadminuser.m_manager_mail IS '管理者メール台帳';
COMMENT ON COLUMN sskadminuser.m_manager_mail.mail_seq IS 'メール連番';
COMMENT ON COLUMN sskadminuser.m_manager_mail.ctrl_mail_kbn IS '管理メール区分';
COMMENT ON COLUMN sskadminuser.m_manager_mail.site_kbn IS 'サイト区分';
COMMENT ON COLUMN sskadminuser.m_manager_mail.mail_adr IS 'メールアドレス';
COMMENT ON COLUMN sskadminuser.m_manager_mail.mail_name IS 'メール名';
COMMENT ON COLUMN sskadminuser.m_manager_mail.send_way_kbn IS '送信方法区分';
COMMENT ON COLUMN sskadminuser.m_manager_mail.update_date IS '更新日時';
COMMENT ON COLUMN sskadminuser.m_manager_mail.register_date IS '登録日時';
COMMENT ON COLUMN sskadminuser.m_manager_mail.update_user_cd IS '更新者';
COMMENT ON COLUMN sskadminuser.m_manager_mail.register_user_cd IS '登録者';
-- CREATE INDEX 
CREATE INDEX idx_m_manager_mail_01 ON sskadminuser.m_manager_mail (send_way_kbn);
CREATE INDEX idx_m_manager_mail_02 ON sskadminuser.m_manager_mail (update_date,register_date);
-- END TABLE : sskadminuser.m_manager_mail  --

-- START TABLE : sskadminuser.h_odr_h  --
CREATE TABLE sskadminuser.h_odr_h(
cust_no INT NOT NULL,
proc_no VARCHAR(8) NOT NULL,
odr_stat_kbn CHAR(1) NOT NULL,
odr_acpt_dt TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL,
odr_acpt_tm VARCHAR(8) NOT NULL,
odr_kbn CHAR(1) NOT NULL,
ship_dt TIMESTAMP(0) WITHOUT TIME ZONE,
dlv_corp_cd CHAR(2) NOT NULL,
cvs_flg CHAR(1) NOT NULL,
pay_way_kbn VARCHAR(2) NOT NULL,
update_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
register_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
update_user_cd VARCHAR(64) NOT NULL,
register_user_cd VARCHAR(64) NOT NULL,
invoice_no VARCHAR(12) NOT NULL DEFAULT '000000000000',
dlv_fin_dt TIMESTAMP(0) WITHOUT TIME ZONE,
tot_odr_amnt INT,
tot_odr_tax INT,
tax_rate_kbn VARCHAR(1),
reduction_kbn VARCHAR(2),
reduction_amnt INT,
reduction_amnt_tax INT,
route_dtl_kbn CHAR(2),
CONSTRAINT pk_h_odr_h PRIMARY KEY (cust_no,proc_no)
);
-- ADD COLUMN
COMMENT ON TABLE sskadminuser.h_odr_h IS '注文履歴ヘダー';
COMMENT ON COLUMN sskadminuser.h_odr_h.cust_no IS '会員番号';
COMMENT ON COLUMN sskadminuser.h_odr_h.proc_no IS '処理番号';
COMMENT ON COLUMN sskadminuser.h_odr_h.odr_stat_kbn IS '注文状況区分';
COMMENT ON COLUMN sskadminuser.h_odr_h.odr_acpt_dt IS '注文受付日';
COMMENT ON COLUMN sskadminuser.h_odr_h.odr_acpt_tm IS '注文受付時刻';
COMMENT ON COLUMN sskadminuser.h_odr_h.odr_kbn IS '注文区分';
COMMENT ON COLUMN sskadminuser.h_odr_h.ship_dt IS '発送日';
COMMENT ON COLUMN sskadminuser.h_odr_h.dlv_corp_cd IS '配送会社コード';
COMMENT ON COLUMN sskadminuser.h_odr_h.cvs_flg IS 'コンビニフラグ';
COMMENT ON COLUMN sskadminuser.h_odr_h.pay_way_kbn IS '支払方法区分';
COMMENT ON COLUMN sskadminuser.h_odr_h.update_date IS '更新日時';
COMMENT ON COLUMN sskadminuser.h_odr_h.register_date IS '登録日時';
COMMENT ON COLUMN sskadminuser.h_odr_h.update_user_cd IS '更新者';
COMMENT ON COLUMN sskadminuser.h_odr_h.register_user_cd IS '登録者';
COMMENT ON COLUMN sskadminuser.h_odr_h.invoice_no IS '送り状番号';
COMMENT ON COLUMN sskadminuser.h_odr_h.dlv_fin_dt IS '配送完了日';
COMMENT ON COLUMN sskadminuser.h_odr_h.tot_odr_amnt IS '合計注文金額';
COMMENT ON COLUMN sskadminuser.h_odr_h.tot_odr_tax IS '合計注文消費税';
COMMENT ON COLUMN sskadminuser.h_odr_h.tax_rate_kbn IS '消費税率区分';
COMMENT ON COLUMN sskadminuser.h_odr_h.reduction_kbn IS '還元区分';
COMMENT ON COLUMN sskadminuser.h_odr_h.reduction_amnt IS '還元金額';
COMMENT ON COLUMN sskadminuser.h_odr_h.reduction_amnt_tax IS '還元金額消費税';
COMMENT ON COLUMN sskadminuser.h_odr_h.route_dtl_kbn IS '経路詳細区分';
-- CREATE INDEX 
CREATE INDEX idx_h_odr_h_01 ON sskadminuser.h_odr_h (update_date,register_date);
-- END TABLE : sskadminuser.h_odr_h  --

-- START TABLE : sskadminuser.h_odr_d  --
CREATE TABLE sskadminuser.h_odr_d(
prev_time_odr_seq BIGINT NOT NULL,
mbr_seq BIGINT NOT NULL,
cust_no INT NOT NULL,
proc_no VARCHAR(8),
acpt_dt TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL,
acpt_tm VARCHAR(8) NOT NULL,
item_cd VARCHAR(4) NOT NULL,
num INT NOT NULL,
return_flg CHAR(1) NOT NULL DEFAULT '0',
item_new_old_kbn CHAR(2) DEFAULT NULL,
update_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
register_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
update_user_cd VARCHAR(64) NOT NULL,
register_user_cd VARCHAR(64) NOT NULL,
item_lvl VARCHAR(2),
item_price INT,
item_price_tax INT,
tax_rate_kbn VARCHAR(1),
reduction_kbn VARCHAR(2),
pool_amnt INT
);
-- ADD COLUMN
COMMENT ON TABLE sskadminuser.h_odr_d IS '注文履歴明細';
COMMENT ON COLUMN sskadminuser.h_odr_d.prev_time_odr_seq IS '前回の注文連番';
COMMENT ON COLUMN sskadminuser.h_odr_d.mbr_seq IS '会員連番';
COMMENT ON COLUMN sskadminuser.h_odr_d.cust_no IS '会員番号';
COMMENT ON COLUMN sskadminuser.h_odr_d.proc_no IS '処理番号';
COMMENT ON COLUMN sskadminuser.h_odr_d.acpt_dt IS '受付日';
COMMENT ON COLUMN sskadminuser.h_odr_d.acpt_tm IS '受付時刻';
COMMENT ON COLUMN sskadminuser.h_odr_d.item_cd IS '商品コード';
COMMENT ON COLUMN sskadminuser.h_odr_d.num IS '数';
COMMENT ON COLUMN sskadminuser.h_odr_d.return_flg IS '返品フラグ';
COMMENT ON COLUMN sskadminuser.h_odr_d.item_new_old_kbn IS '商品新旧区分';
COMMENT ON COLUMN sskadminuser.h_odr_d.update_date IS '更新日時';
COMMENT ON COLUMN sskadminuser.h_odr_d.register_date IS '登録日時';
COMMENT ON COLUMN sskadminuser.h_odr_d.update_user_cd IS '更新者';
COMMENT ON COLUMN sskadminuser.h_odr_d.register_user_cd IS '登録者';
COMMENT ON COLUMN sskadminuser.h_odr_d.item_lvl IS '商品レベル';
COMMENT ON COLUMN sskadminuser.h_odr_d.item_price IS '商品単価';
COMMENT ON COLUMN sskadminuser.h_odr_d.item_price_tax IS '商品単価消費税';
COMMENT ON COLUMN sskadminuser.h_odr_d.tax_rate_kbn IS '消費税率区分';
COMMENT ON COLUMN sskadminuser.h_odr_d.reduction_kbn IS '還元区分';
COMMENT ON COLUMN sskadminuser.h_odr_d.pool_amnt IS 'プール金額';
-- CREATE INDEX 
CREATE INDEX idx_h_odr_d_01 ON sskadminuser.h_odr_d (prev_time_odr_seq,mbr_seq,cust_no);
CREATE INDEX idx_h_odr_d_02 ON sskadminuser.h_odr_d (proc_no);
CREATE INDEX idx_h_odr_d_03 ON sskadminuser.h_odr_d (cust_no,item_cd,item_lvl);
CREATE INDEX idx_h_odr_d_04 ON sskadminuser.h_odr_d (mbr_seq);
CREATE INDEX idx_h_odr_d_05 ON sskadminuser.h_odr_d (update_date,register_date);
-- END TABLE : sskadminuser.h_odr_d  --

-- START TABLE : sskadminuser.w_mail_draft  --
CREATE TABLE sskadminuser.w_mail_draft(
mail_draft_cd BIGINT NOT NULL,
charge_cd CHAR(5) NOT NULL,
bs_kbn CHAR(2),
contact_cd BIGINT,
cust_no INT,
mail_draft_to_name VARCHAR(100),
mail_draft_to VARCHAR(112),
mail_draft_cust_no INT,
mail_draft_sender_kbn CHAR(1),
mail_draft_subject VARCHAR(500),
mail_draft_body_letter TEXT,
mail_draft_sign VARCHAR(2000),
mail_draft_fixed_flg CHAR(1),
mail_draft_memo_1 VARCHAR(100),
mail_draft_memo_2 VARCHAR(100),
update_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
register_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
update_user_cd VARCHAR(64) NOT NULL,
register_user_cd VARCHAR(64) NOT NULL,
recommend_item_cd_1 CHAR(4),
recommend_item_cd_2 CHAR(4),
recommend_item_cd_3 CHAR(4),
recommend_item_cd_4 CHAR(4),
recommend_item_cd_5 CHAR(4),
recommend_item_cd_6 CHAR(4),
recommend_item_cd_7 CHAR(4),
recommend_item_cd_8 CHAR(4),
mail_cd VARCHAR(4),
mail_draft_act_memo VARCHAR(400),
recommend_item_cd_9 CHAR(4),
recommend_item_cd_10 CHAR(4),
CONSTRAINT pk_w_mail_draft PRIMARY KEY (mail_draft_cd)
);
-- ADD COLUMN
COMMENT ON TABLE sskadminuser.w_mail_draft IS 'メール下書補助伝票';
COMMENT ON COLUMN sskadminuser.w_mail_draft.mail_draft_cd IS 'メール下書コード';
COMMENT ON COLUMN sskadminuser.w_mail_draft.charge_cd IS '担当コード';
COMMENT ON COLUMN sskadminuser.w_mail_draft.bs_kbn IS '業務区分';
COMMENT ON COLUMN sskadminuser.w_mail_draft.contact_cd IS '接触コード';
COMMENT ON COLUMN sskadminuser.w_mail_draft.cust_no IS '会員番号';
COMMENT ON COLUMN sskadminuser.w_mail_draft.mail_draft_to_name IS 'メール下書宛名';
COMMENT ON COLUMN sskadminuser.w_mail_draft.mail_draft_to IS 'メール下書宛先';
COMMENT ON COLUMN sskadminuser.w_mail_draft.mail_draft_cust_no IS 'メール下書会員番号';
COMMENT ON COLUMN sskadminuser.w_mail_draft.mail_draft_sender_kbn IS 'メール下書差出人区分';
COMMENT ON COLUMN sskadminuser.w_mail_draft.mail_draft_subject IS 'メール下書件名';
COMMENT ON COLUMN sskadminuser.w_mail_draft.mail_draft_body_letter IS 'メール下書本文';
COMMENT ON COLUMN sskadminuser.w_mail_draft.mail_draft_sign IS 'メール下書署名';
COMMENT ON COLUMN sskadminuser.w_mail_draft.mail_draft_fixed_flg IS 'メール下書定型フラグ';
COMMENT ON COLUMN sskadminuser.w_mail_draft.mail_draft_memo_1 IS 'メール下書メモ1';
COMMENT ON COLUMN sskadminuser.w_mail_draft.mail_draft_memo_2 IS 'メール下書メモ2';
COMMENT ON COLUMN sskadminuser.w_mail_draft.update_date IS '更新日時';
COMMENT ON COLUMN sskadminuser.w_mail_draft.register_date IS '登録日時';
COMMENT ON COLUMN sskadminuser.w_mail_draft.update_user_cd IS '更新者';
COMMENT ON COLUMN sskadminuser.w_mail_draft.register_user_cd IS '登録者';
COMMENT ON COLUMN sskadminuser.w_mail_draft.recommend_item_cd_1 IS 'おすすめ商品コード1';
COMMENT ON COLUMN sskadminuser.w_mail_draft.recommend_item_cd_2 IS 'おすすめ商品コード2';
COMMENT ON COLUMN sskadminuser.w_mail_draft.recommend_item_cd_3 IS 'おすすめ商品コード3';
COMMENT ON COLUMN sskadminuser.w_mail_draft.recommend_item_cd_4 IS 'おすすめ商品コード4';
COMMENT ON COLUMN sskadminuser.w_mail_draft.recommend_item_cd_5 IS 'おすすめ商品コード5';
COMMENT ON COLUMN sskadminuser.w_mail_draft.recommend_item_cd_6 IS 'おすすめ商品コード6';
COMMENT ON COLUMN sskadminuser.w_mail_draft.recommend_item_cd_7 IS 'おすすめ商品コード7';
COMMENT ON COLUMN sskadminuser.w_mail_draft.recommend_item_cd_8 IS 'おすすめ商品コード8';
COMMENT ON COLUMN sskadminuser.w_mail_draft.mail_cd IS 'メールコード';
COMMENT ON COLUMN sskadminuser.w_mail_draft.mail_draft_act_memo IS 'メール下書対応メモ';
COMMENT ON COLUMN sskadminuser.w_mail_draft.recommend_item_cd_9 IS 'おすすめ商品コード9';
COMMENT ON COLUMN sskadminuser.w_mail_draft.recommend_item_cd_10 IS 'おすすめ商品コード10';
-- CREATE INDEX 
CREATE INDEX idx_w_mail_draft_01 ON sskadminuser.w_mail_draft (charge_cd);
CREATE INDEX idx_w_mail_draft_02 ON sskadminuser.w_mail_draft (bs_kbn,contact_cd);
CREATE INDEX idx_w_mail_draft_03 ON sskadminuser.w_mail_draft (cust_no);
CREATE INDEX idx_w_mail_draft_04 ON sskadminuser.w_mail_draft (update_date,register_date);
-- END TABLE : sskadminuser.w_mail_draft  --

-- START TABLE : sskadminuser.f_mail_recommend_info_d  --
CREATE TABLE sskadminuser.f_mail_recommend_info_d(
mail_recommend_cd BIGINT NOT NULL,
item_cd CHAR(4) NOT NULL,
report_flg CHAR(1) DEFAULT '0',
sente_keyword_flg CHAR(1) DEFAULT '0',
update_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
register_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
update_user_cd VARCHAR(64) NOT NULL,
register_user_cd VARCHAR(64) NOT NULL,
CONSTRAINT pk_f_mail_recommend_info_d PRIMARY KEY (mail_recommend_cd,item_cd)
);
-- ADD COLUMN
COMMENT ON TABLE sskadminuser.f_mail_recommend_info_d IS 'メールおすすめ伝票明細';
COMMENT ON COLUMN sskadminuser.f_mail_recommend_info_d.mail_recommend_cd IS 'メールおすすめコード';
COMMENT ON COLUMN sskadminuser.f_mail_recommend_info_d.item_cd IS '商品コード';
COMMENT ON COLUMN sskadminuser.f_mail_recommend_info_d.report_flg IS '申告フラグ';
COMMENT ON COLUMN sskadminuser.f_mail_recommend_info_d.sente_keyword_flg IS '文面キーワードフラグ';
COMMENT ON COLUMN sskadminuser.f_mail_recommend_info_d.update_date IS '更新日時';
COMMENT ON COLUMN sskadminuser.f_mail_recommend_info_d.register_date IS '登録日時';
COMMENT ON COLUMN sskadminuser.f_mail_recommend_info_d.update_user_cd IS '更新者';
COMMENT ON COLUMN sskadminuser.f_mail_recommend_info_d.register_user_cd IS '登録者';
-- CREATE INDEX 
CREATE INDEX idx_f_mail_recommend_info_d_01 ON sskadminuser.f_mail_recommend_info_d (update_date,register_date);
-- END TABLE : sskadminuser.f_mail_recommend_info_d  --

-- START TABLE : sskadminuser.f_mail_recommend_info_h  --
CREATE TABLE sskadminuser.f_mail_recommend_info_h(
mail_recommend_cd BIGINT NOT NULL,
charge_cd CHAR(5) NOT NULL,
bs_kbn CHAR(2),
contact_cd BIGINT,
cust_no INT,
send_dt CHAR(8) NOT NULL,
send_tm CHAR(8) NOT NULL,
fixed_flg CHAR(1) DEFAULT '0',
sync_flg CHAR(1) DEFAULT '0',
del_flg CHAR(1) DEFAULT '0',
update_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
register_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
update_user_cd VARCHAR(64) NOT NULL,
register_user_cd VARCHAR(64) NOT NULL,
cust_name VARCHAR(100),
CONSTRAINT pk_f_mail_recommend_info_h PRIMARY KEY (mail_recommend_cd)
);
-- ADD COLUMN
COMMENT ON TABLE sskadminuser.f_mail_recommend_info_h IS 'メールおすすめ伝票ヘダー';
COMMENT ON COLUMN sskadminuser.f_mail_recommend_info_h.mail_recommend_cd IS 'メールおすすめコード';
COMMENT ON COLUMN sskadminuser.f_mail_recommend_info_h.charge_cd IS '担当コード';
COMMENT ON COLUMN sskadminuser.f_mail_recommend_info_h.bs_kbn IS '業務区分';
COMMENT ON COLUMN sskadminuser.f_mail_recommend_info_h.contact_cd IS '接触コード';
COMMENT ON COLUMN sskadminuser.f_mail_recommend_info_h.cust_no IS '会員番号';
COMMENT ON COLUMN sskadminuser.f_mail_recommend_info_h.send_dt IS '送信日';
COMMENT ON COLUMN sskadminuser.f_mail_recommend_info_h.send_tm IS '送信時刻';
COMMENT ON COLUMN sskadminuser.f_mail_recommend_info_h.fixed_flg IS '定型フラグ';
COMMENT ON COLUMN sskadminuser.f_mail_recommend_info_h.sync_flg IS '同期フラグ';
COMMENT ON COLUMN sskadminuser.f_mail_recommend_info_h.del_flg IS '削除フラグ';
COMMENT ON COLUMN sskadminuser.f_mail_recommend_info_h.update_date IS '更新日時';
COMMENT ON COLUMN sskadminuser.f_mail_recommend_info_h.register_date IS '登録日時';
COMMENT ON COLUMN sskadminuser.f_mail_recommend_info_h.update_user_cd IS '更新者';
COMMENT ON COLUMN sskadminuser.f_mail_recommend_info_h.register_user_cd IS '登録者';
COMMENT ON COLUMN sskadminuser.f_mail_recommend_info_h.cust_name IS '会員氏名';
-- CREATE INDEX 
CREATE INDEX idx_f_mail_recommend_info_h_01 ON sskadminuser.f_mail_recommend_info_h (charge_cd);
CREATE INDEX idx_f_mail_recommend_info_h_02 ON sskadminuser.f_mail_recommend_info_h (bs_kbn,contact_cd);
CREATE INDEX idx_f_mail_recommend_info_h_03 ON sskadminuser.f_mail_recommend_info_h (cust_no);
CREATE INDEX idx_f_mail_recommend_info_h_04 ON sskadminuser.f_mail_recommend_info_h (sync_flg);
CREATE INDEX idx_f_mail_recommend_info_h_05 ON sskadminuser.f_mail_recommend_info_h (update_date,register_date);
-- END TABLE : sskadminuser.f_mail_recommend_info_h  --

-- START TABLE : sskadminuser.m_mail_sign_decoration  --
CREATE TABLE sskadminuser.m_mail_sign_decoration(
sign_hdr_cd VARCHAR(4) NOT NULL,
hdr VARCHAR(128) NOT NULL,
mob_hdr VARCHAR(128) NOT NULL,
ftr VARCHAR(128) NOT NULL,
mob_ftr VARCHAR(128) NOT NULL,
update_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
register_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
update_user_cd VARCHAR(64) NOT NULL,
register_user_cd VARCHAR(64) NOT NULL,
CONSTRAINT pk_m_mail_sign_decoration PRIMARY KEY (sign_hdr_cd)
);
-- ADD COLUMN
COMMENT ON TABLE sskadminuser.m_mail_sign_decoration IS 'メールシグネチャ飾り文字台帳';
COMMENT ON COLUMN sskadminuser.m_mail_sign_decoration.sign_hdr_cd IS 'シグネチャヘッダコード';
COMMENT ON COLUMN sskadminuser.m_mail_sign_decoration.hdr IS 'ヘッダ';
COMMENT ON COLUMN sskadminuser.m_mail_sign_decoration.mob_hdr IS '携帯ヘッダ';
COMMENT ON COLUMN sskadminuser.m_mail_sign_decoration.ftr IS 'フッタ';
COMMENT ON COLUMN sskadminuser.m_mail_sign_decoration.mob_ftr IS '携帯フッタ';
COMMENT ON COLUMN sskadminuser.m_mail_sign_decoration.update_date IS '更新日時';
COMMENT ON COLUMN sskadminuser.m_mail_sign_decoration.register_date IS '登録日時';
COMMENT ON COLUMN sskadminuser.m_mail_sign_decoration.update_user_cd IS '更新者';
COMMENT ON COLUMN sskadminuser.m_mail_sign_decoration.register_user_cd IS '登録者';
-- CREATE INDEX 
CREATE INDEX idx_m_mail_sign_decoration_01 ON sskadminuser.m_mail_sign_decoration (update_date,register_date);
-- END TABLE : sskadminuser.m_mail_sign_decoration  --

-- START TABLE : sskadminuser.m_mail_sign  --
CREATE TABLE sskadminuser.m_mail_sign(
sign_cd VARCHAR(4) NOT NULL,
sign_name VARCHAR(256) NOT NULL,
sign VARCHAR(4000) NOT NULL,
mob_sign VARCHAR(4000) NOT NULL,
update_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
register_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
update_user_cd VARCHAR(64) NOT NULL,
register_user_cd VARCHAR(64) NOT NULL,
CONSTRAINT pk_m_mail_sign PRIMARY KEY (sign_cd)
);
-- ADD COLUMN
COMMENT ON TABLE sskadminuser.m_mail_sign IS 'メールシグネチャ台帳';
COMMENT ON COLUMN sskadminuser.m_mail_sign.sign_cd IS 'シグネチャコード';
COMMENT ON COLUMN sskadminuser.m_mail_sign.sign_name IS 'シグネチャ名';
COMMENT ON COLUMN sskadminuser.m_mail_sign.sign IS 'シグネチャ';
COMMENT ON COLUMN sskadminuser.m_mail_sign.mob_sign IS '携帯シグネチャ';
COMMENT ON COLUMN sskadminuser.m_mail_sign.update_date IS '更新日時';
COMMENT ON COLUMN sskadminuser.m_mail_sign.register_date IS '登録日時';
COMMENT ON COLUMN sskadminuser.m_mail_sign.update_user_cd IS '更新者';
COMMENT ON COLUMN sskadminuser.m_mail_sign.register_user_cd IS '登録者';
-- CREATE INDEX 
CREATE INDEX idx_m_mail_sign_01 ON sskadminuser.m_mail_sign (update_date,register_date);
-- END TABLE : sskadminuser.m_mail_sign  --

-- START TABLE : sskadminuser.f_rcv_mail_h  --
CREATE TABLE sskadminuser.f_rcv_mail_h(
act_mail_seq DOUBLE PRECISION NOT NULL,
mail_rcv_dt_tm TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL,
rcv_kbn CHAR(1) NOT NULL DEFAULT '0',
contact_cont_kbn INT NOT NULL DEFAULT 0,
rcv_mail_adr VARCHAR(180) NOT NULL,
act_stat_kbn CHAR(1) NOT NULL DEFAULT '0',
prnt_stat_kbn CHAR(1) NOT NULL DEFAULT '0',
mail_data_connect_kbn CHAR(1) NOT NULL DEFAULT '0',
mail_body_letter_kbn CHAR(1) NOT NULL DEFAULT '0',
mail_body_letter_contact_kbn VARCHAR(4),
mail_body_letter_spcfy_cd VARCHAR(22),
mbr_judge_kbn CHAR(1) NOT NULL DEFAULT '0',
cust_no INT,
cust_name VARCHAR(84),
memo VARCHAR(400),
charge_cd VARCHAR(10),
img_seq BIGINT,
update_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
register_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
update_user_cd VARCHAR(64) NOT NULL,
register_user_cd VARCHAR(64) NOT NULL,
alocate_seq BIGINT,
charge VARCHAR(10),
reply_fin_mbr_mail_send_cd DOUBLE PRECISION,
CONSTRAINT pk_f_rcv_mail_h PRIMARY KEY (act_mail_seq)
);
-- ADD COLUMN
COMMENT ON TABLE sskadminuser.f_rcv_mail_h IS '受信メール伝票ヘダー';
COMMENT ON COLUMN sskadminuser.f_rcv_mail_h.act_mail_seq IS '対応メール連番';
COMMENT ON COLUMN sskadminuser.f_rcv_mail_h.mail_rcv_dt_tm IS 'メール受信日時';
COMMENT ON COLUMN sskadminuser.f_rcv_mail_h.rcv_kbn IS '受け区分';
COMMENT ON COLUMN sskadminuser.f_rcv_mail_h.contact_cont_kbn IS 'コンタクト内容区分';
COMMENT ON COLUMN sskadminuser.f_rcv_mail_h.rcv_mail_adr IS '受信メールアドレス';
COMMENT ON COLUMN sskadminuser.f_rcv_mail_h.act_stat_kbn IS '対応状態区分';
COMMENT ON COLUMN sskadminuser.f_rcv_mail_h.prnt_stat_kbn IS '印刷状態区分';
COMMENT ON COLUMN sskadminuser.f_rcv_mail_h.mail_data_connect_kbn IS 'メールデータ連携区分';
COMMENT ON COLUMN sskadminuser.f_rcv_mail_h.mail_body_letter_kbn IS 'メール本文区分';
COMMENT ON COLUMN sskadminuser.f_rcv_mail_h.mail_body_letter_contact_kbn IS 'メール本文コンタクト区分';
COMMENT ON COLUMN sskadminuser.f_rcv_mail_h.mail_body_letter_spcfy_cd IS 'メール本文特定コード';
COMMENT ON COLUMN sskadminuser.f_rcv_mail_h.mbr_judge_kbn IS '会員判定区分';
COMMENT ON COLUMN sskadminuser.f_rcv_mail_h.cust_no IS '会員番号';
COMMENT ON COLUMN sskadminuser.f_rcv_mail_h.cust_name IS '会員氏名';
COMMENT ON COLUMN sskadminuser.f_rcv_mail_h.memo IS 'メモ';
COMMENT ON COLUMN sskadminuser.f_rcv_mail_h.charge_cd IS '担当コード';
COMMENT ON COLUMN sskadminuser.f_rcv_mail_h.img_seq IS 'イメージ連番';
COMMENT ON COLUMN sskadminuser.f_rcv_mail_h.update_date IS '更新日時';
COMMENT ON COLUMN sskadminuser.f_rcv_mail_h.register_date IS '登録日時';
COMMENT ON COLUMN sskadminuser.f_rcv_mail_h.update_user_cd IS '更新者';
COMMENT ON COLUMN sskadminuser.f_rcv_mail_h.register_user_cd IS '登録者';
COMMENT ON COLUMN sskadminuser.f_rcv_mail_h.alocate_seq IS '振分連番';
COMMENT ON COLUMN sskadminuser.f_rcv_mail_h.charge IS '担当者';
COMMENT ON COLUMN sskadminuser.f_rcv_mail_h.reply_fin_mbr_mail_send_cd IS '返信済会員メール送信コード';
-- CREATE INDEX 
CREATE INDEX idx_f_rcv_mail_h_01 ON sskadminuser.f_rcv_mail_h (mail_rcv_dt_tm);
CREATE INDEX idx_f_rcv_mail_h_02 ON sskadminuser.f_rcv_mail_h (update_date,register_date);
-- END TABLE : sskadminuser.f_rcv_mail_h  --

-- START TABLE : sskadminuser.m_alocate_cond  --
CREATE TABLE sskadminuser.m_alocate_cond(
alocate_seq BIGINT NOT NULL,
inq_string VARCHAR(400) NOT NULL,
chk_kbn CHAR(1) NOT NULL DEFAULT '0',
rcv_kbn CHAR(1) NOT NULL DEFAULT '0',
contact_cont_kbn INT NOT NULL DEFAULT 0,
mail_body_letter_kbn CHAR(1) NOT NULL DEFAULT '0',
act_stat_kbn CHAR(1) NOT NULL DEFAULT '0',
del_flg CHAR(1) NOT NULL DEFAULT '0',
update_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
register_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
update_user_cd VARCHAR(64) NOT NULL,
register_user_cd VARCHAR(64) NOT NULL,
CONSTRAINT pk_m_alocate_cond PRIMARY KEY (alocate_seq)
);
-- ADD COLUMN
COMMENT ON TABLE sskadminuser.m_alocate_cond IS '振分条件台帳';
COMMENT ON COLUMN sskadminuser.m_alocate_cond.alocate_seq IS '振分連番';
COMMENT ON COLUMN sskadminuser.m_alocate_cond.inq_string IS '検索文字列';
COMMENT ON COLUMN sskadminuser.m_alocate_cond.chk_kbn IS 'チェック区分';
COMMENT ON COLUMN sskadminuser.m_alocate_cond.rcv_kbn IS '受け区分';
COMMENT ON COLUMN sskadminuser.m_alocate_cond.contact_cont_kbn IS 'コンタクト内容区分';
COMMENT ON COLUMN sskadminuser.m_alocate_cond.mail_body_letter_kbn IS 'メール本文区分';
COMMENT ON COLUMN sskadminuser.m_alocate_cond.act_stat_kbn IS '対応状態区分';
COMMENT ON COLUMN sskadminuser.m_alocate_cond.del_flg IS '削除フラグ';
COMMENT ON COLUMN sskadminuser.m_alocate_cond.update_date IS '更新日時';
COMMENT ON COLUMN sskadminuser.m_alocate_cond.register_date IS '登録日時';
COMMENT ON COLUMN sskadminuser.m_alocate_cond.update_user_cd IS '更新者';
COMMENT ON COLUMN sskadminuser.m_alocate_cond.register_user_cd IS '登録者';
-- CREATE INDEX 
CREATE INDEX idx_m_alocate_cond_01 ON sskadminuser.m_alocate_cond (inq_string);
CREATE INDEX idx_m_alocate_cond_02 ON sskadminuser.m_alocate_cond (chk_kbn);
CREATE INDEX idx_m_alocate_cond_03 ON sskadminuser.m_alocate_cond (rcv_kbn);
CREATE INDEX idx_m_alocate_cond_04 ON sskadminuser.m_alocate_cond (contact_cont_kbn);
CREATE INDEX idx_m_alocate_cond_05 ON sskadminuser.m_alocate_cond (act_stat_kbn);
CREATE INDEX idx_m_alocate_cond_06 ON sskadminuser.m_alocate_cond (mail_body_letter_kbn);
CREATE INDEX idx_m_alocate_cond_07 ON sskadminuser.m_alocate_cond (update_date,register_date);
-- END TABLE : sskadminuser.m_alocate_cond  --

-- START TABLE : sskadminuser.m_mbr_profile  --
CREATE TABLE sskadminuser.m_mbr_profile(
cust_no INT NOT NULL,
site_kbn CHAR(1),
nickname VARCHAR(120),
icon VARCHAR(256),
del_flg CHAR(1) DEFAULT '0',
sync_flg CHAR(1) NOT NULL,
session_id VARCHAR(200),
update_date TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT current_timestamp(0),
register_date TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT current_timestamp(0),
update_user_cd VARCHAR(64),
register_user_cd VARCHAR(64),
ctrl_account_cd VARCHAR(10),
app_sync_flg CHAR(1) NOT NULL DEFAULT '0',
CONSTRAINT pk_m_mbr_profile PRIMARY KEY (cust_no)
);
-- ADD COLUMN
COMMENT ON TABLE sskadminuser.m_mbr_profile IS '会員プロフィール台帳';
COMMENT ON COLUMN sskadminuser.m_mbr_profile.cust_no IS '会員番号';
COMMENT ON COLUMN sskadminuser.m_mbr_profile.site_kbn IS 'サイト区分';
COMMENT ON COLUMN sskadminuser.m_mbr_profile.nickname IS 'ニックネーム';
COMMENT ON COLUMN sskadminuser.m_mbr_profile.icon IS 'アイコン';
COMMENT ON COLUMN sskadminuser.m_mbr_profile.del_flg IS '削除フラグ';
COMMENT ON COLUMN sskadminuser.m_mbr_profile.sync_flg IS '同期フラグ';
COMMENT ON COLUMN sskadminuser.m_mbr_profile.session_id IS 'セッションID';
COMMENT ON COLUMN sskadminuser.m_mbr_profile.update_date IS '更新日時';
COMMENT ON COLUMN sskadminuser.m_mbr_profile.register_date IS '登録日時';
COMMENT ON COLUMN sskadminuser.m_mbr_profile.update_user_cd IS '更新者';
COMMENT ON COLUMN sskadminuser.m_mbr_profile.register_user_cd IS '登録者';
COMMENT ON COLUMN sskadminuser.m_mbr_profile.ctrl_account_cd IS '管理アカウントコード';
COMMENT ON COLUMN sskadminuser.m_mbr_profile.app_sync_flg IS 'アプリ同期フラグ';
-- CREATE INDEX 
CREATE INDEX idx_m_mbr_profile_01 ON sskadminuser.m_mbr_profile (ctrl_account_cd);
CREATE INDEX idx_m_mbr_profile_02 ON sskadminuser.m_mbr_profile (app_sync_flg);
CREATE INDEX idx_m_mbr_profile_03 ON sskadminuser.m_mbr_profile (update_date,register_date);
-- END TABLE : sskadminuser.m_mbr_profile  --

-- START TABLE : sskadminuser.m_net_mbr  --
CREATE TABLE sskadminuser.m_net_mbr(
mbr_seq BIGINT NOT NULL,
cust_no INT NOT NULL,
tel_no VARCHAR(64),
net_mbr_cd VARCHAR(12),
pwd VARCHAR(108),
cust_name VARCHAR(84),
mail_adr VARCHAR(180),
mail_announce_flg VARCHAR(1),
handlename VARCHAR(30),
dm_mail_flg INT DEFAULT 0,
del_flg INT DEFAULT 0,
mail_style_kbn INT DEFAULT 0,
mail_adr_err_flg INT DEFAULT 0,
mob_carrier CHAR(1),
pc_name VARCHAR(32),
pc_disp_name VARCHAR(32),
mob_mail_adr VARCHAR(180),
mob_mail_announce_flg CHAR(1),
mob_dm_mail_flg INT NOT NULL,
mob_mail_adr_err_flg INT NOT NULL,
user_set_page_disp_kbn CHAR(1) NOT NULL DEFAULT '0',
sync_flg CHAR(1) NOT NULL DEFAULT '0',
login_stat CHAR(1) NOT NULL DEFAULT '1',
temp_pwd_kbn CHAR(1) NOT NULL DEFAULT '0',
pwd_fail_cnt INT,
mob_pwd_fail_cnt INT,
act_memo VARCHAR(200),
update_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
register_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
update_user_cd VARCHAR(64) NOT NULL,
register_user_cd VARCHAR(64) NOT NULL,
agree_flg CHAR(1),
mob_agree_flg CHAR(1),
auto_login_dt_tm TIMESTAMP(0) WITHOUT TIME ZONE,
indiv_id_no VARCHAR(32),
second_auth_fail_cnt INT,
second_auth_fail_cnt_upd_dt_tm TIMESTAMP(0) WITHOUT TIME ZONE,
mbr_kbn CHAR(1),
CONSTRAINT pk_m_net_mbr PRIMARY KEY (cust_no)
);
-- ADD COLUMN
COMMENT ON TABLE sskadminuser.m_net_mbr IS 'ネット会員台帳';
COMMENT ON COLUMN sskadminuser.m_net_mbr.mbr_seq IS '会員連番';
COMMENT ON COLUMN sskadminuser.m_net_mbr.cust_no IS '会員番号';
COMMENT ON COLUMN sskadminuser.m_net_mbr.tel_no IS '電話番号';
COMMENT ON COLUMN sskadminuser.m_net_mbr.net_mbr_cd IS 'ネット会員コード';
COMMENT ON COLUMN sskadminuser.m_net_mbr.pwd IS 'パスワード';
COMMENT ON COLUMN sskadminuser.m_net_mbr.cust_name IS '会員氏名';
COMMENT ON COLUMN sskadminuser.m_net_mbr.mail_adr IS 'メールアドレス';
COMMENT ON COLUMN sskadminuser.m_net_mbr.mail_announce_flg IS 'メール告知フラグ';
COMMENT ON COLUMN sskadminuser.m_net_mbr.handlename IS 'ハンドルネーム';
COMMENT ON COLUMN sskadminuser.m_net_mbr.dm_mail_flg IS 'DMメールフラグ';
COMMENT ON COLUMN sskadminuser.m_net_mbr.del_flg IS '削除フラグ';
COMMENT ON COLUMN sskadminuser.m_net_mbr.mail_style_kbn IS 'メール形式区分';
COMMENT ON COLUMN sskadminuser.m_net_mbr.mail_adr_err_flg IS 'メールアドレスエラーフラグ';
COMMENT ON COLUMN sskadminuser.m_net_mbr.mob_carrier IS '携帯キャリア';
COMMENT ON COLUMN sskadminuser.m_net_mbr.pc_name IS '端末名';
COMMENT ON COLUMN sskadminuser.m_net_mbr.pc_disp_name IS '端末表示名';
COMMENT ON COLUMN sskadminuser.m_net_mbr.mob_mail_adr IS '携帯メールアドレス';
COMMENT ON COLUMN sskadminuser.m_net_mbr.mob_mail_announce_flg IS '携帯メール告知フラグ';
COMMENT ON COLUMN sskadminuser.m_net_mbr.mob_dm_mail_flg IS '携帯DMメールフラグ';
COMMENT ON COLUMN sskadminuser.m_net_mbr.mob_mail_adr_err_flg IS '携帯メールアドレスエラーフラグ';
COMMENT ON COLUMN sskadminuser.m_net_mbr.user_set_page_disp_kbn IS 'ユーザ設定ページ表示区分';
COMMENT ON COLUMN sskadminuser.m_net_mbr.sync_flg IS '同期フラグ';
COMMENT ON COLUMN sskadminuser.m_net_mbr.login_stat IS 'ログイン時ステータス';
COMMENT ON COLUMN sskadminuser.m_net_mbr.temp_pwd_kbn IS '仮パスワード区分';
COMMENT ON COLUMN sskadminuser.m_net_mbr.pwd_fail_cnt IS 'パスワード失敗カウント';
COMMENT ON COLUMN sskadminuser.m_net_mbr.mob_pwd_fail_cnt IS '携帯パスワード失敗カウント';
COMMENT ON COLUMN sskadminuser.m_net_mbr.act_memo IS '対応メモ';
COMMENT ON COLUMN sskadminuser.m_net_mbr.update_date IS '更新日時';
COMMENT ON COLUMN sskadminuser.m_net_mbr.register_date IS '登録日時';
COMMENT ON COLUMN sskadminuser.m_net_mbr.update_user_cd IS '更新者';
COMMENT ON COLUMN sskadminuser.m_net_mbr.register_user_cd IS '登録者';
COMMENT ON COLUMN sskadminuser.m_net_mbr.agree_flg IS '同意フラグ';
COMMENT ON COLUMN sskadminuser.m_net_mbr.mob_agree_flg IS '携帯同意フラグ';
COMMENT ON COLUMN sskadminuser.m_net_mbr.auto_login_dt_tm IS '自動ログイン日時';
COMMENT ON COLUMN sskadminuser.m_net_mbr.indiv_id_no IS '個体識別番号';
COMMENT ON COLUMN sskadminuser.m_net_mbr.second_auth_fail_cnt IS '第2認証失敗回数';
COMMENT ON COLUMN sskadminuser.m_net_mbr.second_auth_fail_cnt_upd_dt_tm IS '第2認証失敗回数更新日時';
COMMENT ON COLUMN sskadminuser.m_net_mbr.mbr_kbn IS '会員区分';
-- CREATE INDEX 
CREATE INDEX idx_m_net_mbr_01 ON sskadminuser.m_net_mbr (tel_no,net_mbr_cd,cust_name,mail_adr,mob_mail_adr,login_stat);
CREATE INDEX idx_m_net_mbr_02 ON sskadminuser.m_net_mbr (net_mbr_cd,cust_name,mail_adr,mob_mail_adr,login_stat);
CREATE UNIQUE INDEX idx_m_net_mbr_03 ON sskadminuser.m_net_mbr (indiv_id_no);
CREATE INDEX idx_m_net_mbr_04 ON sskadminuser.m_net_mbr (mail_announce_flg,dm_mail_flg,del_flg,mail_style_kbn,mail_adr_err_flg,mob_mail_announce_flg,mob_dm_mail_flg,mob_mail_adr_err_flg,user_set_page_disp_kbn,sync_flg,login_stat);
CREATE INDEX idx_m_net_mbr_05 ON sskadminuser.m_net_mbr (mob_carrier,pc_name,pc_disp_name,temp_pwd_kbn,pwd_fail_cnt,mob_pwd_fail_cnt);
CREATE INDEX idx_m_net_mbr_06 ON sskadminuser.m_net_mbr (update_date,register_date);
CREATE UNIQUE INDEX idx_m_net_mbr_07 ON sskadminuser.m_net_mbr (mbr_seq);
-- END TABLE : sskadminuser.m_net_mbr  --

-- START TABLE : sskadminuser.f_mission_attend  --
CREATE TABLE sskadminuser.f_mission_attend(
mission_attend_seq INT NOT NULL,
cust_no INT NOT NULL,
mission_grp_cd INT NOT NULL,
stat_kbn CHAR(1) NOT NULL,
update_date TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT current_timestamp(0),
register_date TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT current_timestamp(0),
update_user_cd VARCHAR(64) NOT NULL,
register_user_cd VARCHAR(64) NOT NULL,
del_flg INT DEFAULT 0,
CONSTRAINT pk_f_mission_attend PRIMARY KEY (mission_attend_seq)
);
-- ADD COLUMN
COMMENT ON TABLE sskadminuser.f_mission_attend IS 'ミッション参加伝票';
COMMENT ON COLUMN sskadminuser.f_mission_attend.mission_attend_seq IS 'ミッション参加連番';
COMMENT ON COLUMN sskadminuser.f_mission_attend.cust_no IS '会員番号';
COMMENT ON COLUMN sskadminuser.f_mission_attend.mission_grp_cd IS 'ミッショングループコード';
COMMENT ON COLUMN sskadminuser.f_mission_attend.stat_kbn IS '状態区分';
COMMENT ON COLUMN sskadminuser.f_mission_attend.update_date IS '更新日時';
COMMENT ON COLUMN sskadminuser.f_mission_attend.register_date IS '登録日時';
COMMENT ON COLUMN sskadminuser.f_mission_attend.update_user_cd IS '更新者';
COMMENT ON COLUMN sskadminuser.f_mission_attend.register_user_cd IS '登録者';
COMMENT ON COLUMN sskadminuser.f_mission_attend.del_flg IS '削除フラグ';
-- CREATE INDEX 
CREATE INDEX idx_f_mission_attend_01 ON sskadminuser.f_mission_attend (cust_no);
-- END TABLE : sskadminuser.f_mission_attend  --

-- START TABLE : sskadminuser.f_mission_progress_ctrl  --
CREATE TABLE sskadminuser.f_mission_progress_ctrl(
mission_progress_seq INT NOT NULL,
cust_no INT NOT NULL,
mission_grp_cd INT NOT NULL,
mission_cd INT NOT NULL,
clr_dt_tm TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT current_timestamp(0),
use_fin_flg CHAR(1) DEFAULT 0,
update_date TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT current_timestamp(0),
register_date TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT current_timestamp(0),
update_user_cd VARCHAR(64) NOT NULL,
register_user_cd VARCHAR(64) NOT NULL,
del_flg INT DEFAULT 0,
CONSTRAINT pk_f_mission_progress_ctrl PRIMARY KEY (mission_progress_seq)
);
-- ADD COLUMN
COMMENT ON TABLE sskadminuser.f_mission_progress_ctrl IS 'ミッション進捗管理伝票';
COMMENT ON COLUMN sskadminuser.f_mission_progress_ctrl.mission_progress_seq IS 'ミッション進捗連番';
COMMENT ON COLUMN sskadminuser.f_mission_progress_ctrl.cust_no IS '会員番号';
COMMENT ON COLUMN sskadminuser.f_mission_progress_ctrl.mission_grp_cd IS 'ミッショングループコード';
COMMENT ON COLUMN sskadminuser.f_mission_progress_ctrl.mission_cd IS 'ミッションコード';
COMMENT ON COLUMN sskadminuser.f_mission_progress_ctrl.clr_dt_tm IS 'クリア日時';
COMMENT ON COLUMN sskadminuser.f_mission_progress_ctrl.use_fin_flg IS '使用済フラグ';
COMMENT ON COLUMN sskadminuser.f_mission_progress_ctrl.update_date IS '更新日時';
COMMENT ON COLUMN sskadminuser.f_mission_progress_ctrl.register_date IS '登録日時';
COMMENT ON COLUMN sskadminuser.f_mission_progress_ctrl.update_user_cd IS '更新者';
COMMENT ON COLUMN sskadminuser.f_mission_progress_ctrl.register_user_cd IS '登録者';
COMMENT ON COLUMN sskadminuser.f_mission_progress_ctrl.del_flg IS '削除フラグ';
-- CREATE INDEX 
CREATE INDEX idx_f_mission_progress_ctrl_01 ON sskadminuser.f_mission_progress_ctrl (cust_no);
-- END TABLE : sskadminuser.f_mission_progress_ctrl  --

-- START TABLE : sskadminuser.m_sns_communication  --
CREATE TABLE sskadminuser.m_sns_communication(
cust_no INT NOT NULL DEFAULT 0,
cd_input_seq INT NOT NULL DEFAULT 1,
sns_kbn CHAR(2) NOT NULL DEFAULT '00',
sns_uid VARCHAR(64) NOT NULL DEFAULT ' ',
temp_mbr_flg CHAR(1) NOT NULL DEFAULT '0',
block_flg CHAR(1) NOT NULL DEFAULT '0',
block_flg_upd_dt_tm TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT to_timestamp('1900-01-01 00:00:00', 'YYYY-MM-DD HH24:MI:SS'),
sync_flg CHAR(1) NOT NULL DEFAULT '0',
first_contact_dt_tm TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT to_timestamp('1900-01-01 00:00:00', 'YYYY-MM-DD HH24:MI:SS'),
last_contact_dt_tm TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT to_timestamp('1900-01-01 00:00:00', 'YYYY-MM-DD HH24:MI:SS'),
register_user_cd VARCHAR(13) NOT NULL DEFAULT ' ',
register_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
update_user_cd VARCHAR(13) NOT NULL DEFAULT ' ',
scr_upd_dt_tm TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
bat_upd_dt_tm TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
upd_cnt BIGINT NOT NULL DEFAULT 0,
upd_scr_name VARCHAR(80) NOT NULL DEFAULT ' ',
upd_bat_name VARCHAR(80) NOT NULL DEFAULT ' ',
del_flg CHAR(1) NOT NULL DEFAULT '0',
CONSTRAINT pk_m_sns_communication PRIMARY KEY (cust_no,cd_input_seq)
);
-- ADD COLUMN
COMMENT ON TABLE sskadminuser.m_sns_communication IS 'SNSコミュニケーション台帳';
COMMENT ON COLUMN sskadminuser.m_sns_communication.cust_no IS '会員番号';
COMMENT ON COLUMN sskadminuser.m_sns_communication.cd_input_seq IS 'コード登録連番';
COMMENT ON COLUMN sskadminuser.m_sns_communication.sns_kbn IS 'SNS区分';
COMMENT ON COLUMN sskadminuser.m_sns_communication.sns_uid IS 'SNS固有識別子';
COMMENT ON COLUMN sskadminuser.m_sns_communication.temp_mbr_flg IS '仮会員フラグ';
COMMENT ON COLUMN sskadminuser.m_sns_communication.block_flg IS 'ブロックフラグ';
COMMENT ON COLUMN sskadminuser.m_sns_communication.block_flg_upd_dt_tm IS 'ブロックフラグ更新日時';
COMMENT ON COLUMN sskadminuser.m_sns_communication.sync_flg IS '同期フラグ';
COMMENT ON COLUMN sskadminuser.m_sns_communication.first_contact_dt_tm IS '初回接触日時';
COMMENT ON COLUMN sskadminuser.m_sns_communication.last_contact_dt_tm IS '最終接触日時';
COMMENT ON COLUMN sskadminuser.m_sns_communication.register_user_cd IS '登録者';
COMMENT ON COLUMN sskadminuser.m_sns_communication.register_date IS '登録日時';
COMMENT ON COLUMN sskadminuser.m_sns_communication.update_user_cd IS '更新者';
COMMENT ON COLUMN sskadminuser.m_sns_communication.scr_upd_dt_tm IS '画面更新日時';
COMMENT ON COLUMN sskadminuser.m_sns_communication.bat_upd_dt_tm IS 'バッチ更新日時';
COMMENT ON COLUMN sskadminuser.m_sns_communication.upd_cnt IS '更新カウント';
COMMENT ON COLUMN sskadminuser.m_sns_communication.upd_scr_name IS '更新画面名';
COMMENT ON COLUMN sskadminuser.m_sns_communication.upd_bat_name IS '更新バッチ名';
COMMENT ON COLUMN sskadminuser.m_sns_communication.del_flg IS '削除フラグ';
-- CREATE INDEX 
CREATE INDEX idx_m_sns_communication_01 ON sskadminuser.m_sns_communication (sns_kbn);
CREATE INDEX idx_m_sns_communication_02 ON sskadminuser.m_sns_communication (sns_uid);
-- END TABLE : sskadminuser.m_sns_communication  --

-- START TABLE : sskadminuser.m_mbr_attr_distinct_cond  --
CREATE TABLE sskadminuser.m_mbr_attr_distinct_cond(
attr_seq BIGINT NOT NULL,
avail_flg CHAR(1) NOT NULL DEFAULT '1',
attr_name VARCHAR(255),
age_range_from BIGINT DEFAULT 0,
age_range_upper BIGINT DEFAULT 999,
local_mbr VARCHAR(2) DEFAULT '00',
sex_kbn CHAR(1) NOT NULL DEFAULT '2',
last_buy_prog_dt_start BIGINT DEFAULT 0,
last_buy_prog_dt_end BIGINT DEFAULT 999999,
first_buy_prog_dt_start BIGINT DEFAULT 0,
first_buy_prog_dt_end BIGINT DEFAULT 999999,
cosme_buy_cnt_from BIGINT DEFAULT 0,
cosme_buy_cnt_upper BIGINT DEFAULT 999999,
cosme_buy_amnt_from BIGINT DEFAULT 0,
cosme_buy_amnt_upper BIGINT DEFAULT 99999999,
smpl_req_dt_start TIMESTAMP(0) WITHOUT TIME ZONE,
smpl_req_dt_end TIMESTAMP(0) WITHOUT TIME ZONE,
general_flg VARCHAR(5),
prior_level INT NOT NULL DEFAULT 50,
update_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
register_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
update_user_cd VARCHAR(64) NOT NULL,
register_user_cd VARCHAR(64) NOT NULL,
CONSTRAINT pk_m_mbr_attr_distinct_cond PRIMARY KEY (attr_seq)
);
-- ADD COLUMN
COMMENT ON TABLE sskadminuser.m_mbr_attr_distinct_cond IS '会員属性判別条件台帳';
COMMENT ON COLUMN sskadminuser.m_mbr_attr_distinct_cond.attr_seq IS '属性連番';
COMMENT ON COLUMN sskadminuser.m_mbr_attr_distinct_cond.avail_flg IS '有効フラグ';
COMMENT ON COLUMN sskadminuser.m_mbr_attr_distinct_cond.attr_name IS '属性名';
COMMENT ON COLUMN sskadminuser.m_mbr_attr_distinct_cond.age_range_from IS '年齢範囲下限';
COMMENT ON COLUMN sskadminuser.m_mbr_attr_distinct_cond.age_range_upper IS '年齢範囲上限';
COMMENT ON COLUMN sskadminuser.m_mbr_attr_distinct_cond.local_mbr IS '熊本県の会員';
COMMENT ON COLUMN sskadminuser.m_mbr_attr_distinct_cond.sex_kbn IS '性別区分';
COMMENT ON COLUMN sskadminuser.m_mbr_attr_distinct_cond.last_buy_prog_dt_start IS '最終購入経過日開始';
COMMENT ON COLUMN sskadminuser.m_mbr_attr_distinct_cond.last_buy_prog_dt_end IS '最終購入経過日終了';
COMMENT ON COLUMN sskadminuser.m_mbr_attr_distinct_cond.first_buy_prog_dt_start IS '初回購入経過日開始';
COMMENT ON COLUMN sskadminuser.m_mbr_attr_distinct_cond.first_buy_prog_dt_end IS '初回購入経過日終了';
COMMENT ON COLUMN sskadminuser.m_mbr_attr_distinct_cond.cosme_buy_cnt_from IS '化粧品購入回数下限';
COMMENT ON COLUMN sskadminuser.m_mbr_attr_distinct_cond.cosme_buy_cnt_upper IS '化粧品購入回数上限';
COMMENT ON COLUMN sskadminuser.m_mbr_attr_distinct_cond.cosme_buy_amnt_from IS '化粧品購入金額下限';
COMMENT ON COLUMN sskadminuser.m_mbr_attr_distinct_cond.cosme_buy_amnt_upper IS '化粧品購入金額上限';
COMMENT ON COLUMN sskadminuser.m_mbr_attr_distinct_cond.smpl_req_dt_start IS 'サンプル請求日開始';
COMMENT ON COLUMN sskadminuser.m_mbr_attr_distinct_cond.smpl_req_dt_end IS 'サンプル請求日終了';
COMMENT ON COLUMN sskadminuser.m_mbr_attr_distinct_cond.general_flg IS '汎用フラグ';
COMMENT ON COLUMN sskadminuser.m_mbr_attr_distinct_cond.prior_level IS '優先度';
COMMENT ON COLUMN sskadminuser.m_mbr_attr_distinct_cond.update_date IS '更新日時';
COMMENT ON COLUMN sskadminuser.m_mbr_attr_distinct_cond.register_date IS '登録日時';
COMMENT ON COLUMN sskadminuser.m_mbr_attr_distinct_cond.update_user_cd IS '更新者';
COMMENT ON COLUMN sskadminuser.m_mbr_attr_distinct_cond.register_user_cd IS '登録者';
-- CREATE INDEX 
CREATE INDEX idx_m_mbr_attr_distinct_cond_01 ON sskadminuser.m_mbr_attr_distinct_cond (avail_flg,attr_name,age_range_from,age_range_upper,local_mbr,sex_kbn,last_buy_prog_dt_start,last_buy_prog_dt_end,first_buy_prog_dt_start,first_buy_prog_dt_end,cosme_buy_cnt_from,cosme_buy_cnt_upper,cosme_buy_amnt_from,cosme_buy_amnt_upper,smpl_req_dt_start,smpl_req_dt_end);
CREATE INDEX idx_m_mbr_attr_distinct_cond_02 ON sskadminuser.m_mbr_attr_distinct_cond (prior_level);
CREATE INDEX idx_m_mbr_attr_distinct_cond_03 ON sskadminuser.m_mbr_attr_distinct_cond (update_date,register_date);
-- END TABLE : sskadminuser.m_mbr_attr_distinct_cond  --

-- START TABLE : sskadminuser.m_msg  --
CREATE TABLE sskadminuser.m_msg(
msg_seq INT NOT NULL,
mbr_attr_cond_cd BIGINT NOT NULL DEFAULT 0,
msg_name VARCHAR(256),
category_cd INT NOT NULL,
category_name VARCHAR(256) NOT NULL,
explain VARCHAR(256),
msg_title VARCHAR(64),
mob_msg_title VARCHAR(64),
msg_body_letter VARCHAR(4000),
mob_msg_body_letter VARCHAR(4000),
disp_flg INT NOT NULL,
disp_start_dt_tm TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL,
disp_end_dt_tm TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL,
update_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
register_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
update_user_cd VARCHAR(64) NOT NULL,
register_user_cd VARCHAR(64) NOT NULL,
domo_app_msg_title VARCHAR(64),
domo_app_msg_body_letter VARCHAR(4000),
CONSTRAINT pk_m_msg PRIMARY KEY (msg_seq,mbr_attr_cond_cd)
);
-- ADD COLUMN
COMMENT ON TABLE sskadminuser.m_msg IS 'メッセージ台帳';
COMMENT ON COLUMN sskadminuser.m_msg.msg_seq IS 'メッセージ連番';
COMMENT ON COLUMN sskadminuser.m_msg.mbr_attr_cond_cd IS '会員属性条件コード';
COMMENT ON COLUMN sskadminuser.m_msg.msg_name IS 'メッセージ名';
COMMENT ON COLUMN sskadminuser.m_msg.category_cd IS 'カテゴリコード';
COMMENT ON COLUMN sskadminuser.m_msg.category_name IS 'カテゴリ名';
COMMENT ON COLUMN sskadminuser.m_msg.explain IS '説明';
COMMENT ON COLUMN sskadminuser.m_msg.msg_title IS 'メッセージタイトル';
COMMENT ON COLUMN sskadminuser.m_msg.mob_msg_title IS '携帯用メッセージタイトル';
COMMENT ON COLUMN sskadminuser.m_msg.msg_body_letter IS 'メッセージ本文';
COMMENT ON COLUMN sskadminuser.m_msg.mob_msg_body_letter IS '携帯用メッセージ本文';
COMMENT ON COLUMN sskadminuser.m_msg.disp_flg IS '表示フラグ';
COMMENT ON COLUMN sskadminuser.m_msg.disp_start_dt_tm IS '表示開始日時';
COMMENT ON COLUMN sskadminuser.m_msg.disp_end_dt_tm IS '表示終了日時';
COMMENT ON COLUMN sskadminuser.m_msg.update_date IS '更新日時';
COMMENT ON COLUMN sskadminuser.m_msg.register_date IS '登録日時';
COMMENT ON COLUMN sskadminuser.m_msg.update_user_cd IS '更新者';
COMMENT ON COLUMN sskadminuser.m_msg.register_user_cd IS '登録者';
COMMENT ON COLUMN sskadminuser.m_msg.domo_app_msg_title IS 'ドモアプリ用メッセージタイトル';
COMMENT ON COLUMN sskadminuser.m_msg.domo_app_msg_body_letter IS 'ドモアプリ用メッセージ本文';
-- CREATE INDEX 
CREATE INDEX idx_m_msg_01 ON sskadminuser.m_msg (mbr_attr_cond_cd,disp_flg,disp_start_dt_tm,disp_end_dt_tm);
CREATE INDEX idx_m_msg_02 ON sskadminuser.m_msg (disp_flg,disp_start_dt_tm,disp_end_dt_tm);
CREATE INDEX idx_m_msg_03 ON sskadminuser.m_msg (update_date,register_date);
-- END TABLE : sskadminuser.m_msg  --

-- START TABLE : sskadminuser.m_pref_area  --
CREATE TABLE sskadminuser.m_pref_area(
pref_cd VARCHAR(2) NOT NULL,
area_public_bodies_cd VARCHAR(2) NOT NULL,
area_cd VARCHAR(2) NOT NULL,
pref_name VARCHAR(12) NOT NULL,
area_name VARCHAR(12) NOT NULL,
update_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
register_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
update_user_cd VARCHAR(64) NOT NULL,
register_user_cd VARCHAR(64) NOT NULL
);
-- ADD COLUMN
COMMENT ON TABLE sskadminuser.m_pref_area IS '県・地方台帳';
COMMENT ON COLUMN sskadminuser.m_pref_area.pref_cd IS '県コード';
COMMENT ON COLUMN sskadminuser.m_pref_area.area_public_bodies_cd IS '地方公共団体コード';
COMMENT ON COLUMN sskadminuser.m_pref_area.area_cd IS '地方コード';
COMMENT ON COLUMN sskadminuser.m_pref_area.pref_name IS '都道府県名';
COMMENT ON COLUMN sskadminuser.m_pref_area.area_name IS '地方名';
COMMENT ON COLUMN sskadminuser.m_pref_area.update_date IS '更新日時';
COMMENT ON COLUMN sskadminuser.m_pref_area.register_date IS '登録日時';
COMMENT ON COLUMN sskadminuser.m_pref_area.update_user_cd IS '更新者';
COMMENT ON COLUMN sskadminuser.m_pref_area.register_user_cd IS '登録者';
-- CREATE INDEX 
CREATE INDEX idx_m_pref_area_01 ON sskadminuser.m_pref_area (pref_cd,area_cd);
CREATE INDEX idx_m_pref_area_02 ON sskadminuser.m_pref_area (area_public_bodies_cd);
CREATE INDEX idx_m_pref_area_03 ON sskadminuser.m_pref_area (update_date,register_date);
-- END TABLE : sskadminuser.m_pref_area  --

-- START TABLE : sskadminuser.m_challenge_fin_question_ans_cont  --
CREATE TABLE sskadminuser.m_challenge_fin_question_ans_cont(
event_cd BIGINT NOT NULL DEFAULT 0,
disp_turn INT NOT NULL DEFAULT 0,
ans_no VARCHAR(3) NOT NULL DEFAULT '',
ans_cont VARCHAR(100) NOT NULL DEFAULT '',
register_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT to_timestamp('1900-01-01 00:00:00', 'YYYY-MM-DD HH24:MI:SS'),
register_user_cd VARCHAR(64) NOT NULL DEFAULT '',
update_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT to_timestamp('1900-01-01 00:00:00', 'YYYY-MM-DD HH24:MI:SS'),
update_user_cd VARCHAR(64) NOT NULL DEFAULT '',
del_flg INT NOT NULL DEFAULT 0,
challenge_kbn CHAR(1) NOT NULL DEFAULT 3,
CONSTRAINT pk_m_challenge_fin_question_ans_cont PRIMARY KEY (event_cd,disp_turn,ans_no,challenge_kbn)
);
-- ADD COLUMN
COMMENT ON TABLE sskadminuser.m_challenge_fin_question_ans_cont IS 'チャレンジ完了時質問回答内容台帳';
COMMENT ON COLUMN sskadminuser.m_challenge_fin_question_ans_cont.event_cd IS 'イベントコード';
COMMENT ON COLUMN sskadminuser.m_challenge_fin_question_ans_cont.disp_turn IS '表示順';
COMMENT ON COLUMN sskadminuser.m_challenge_fin_question_ans_cont.ans_no IS '回答番号';
COMMENT ON COLUMN sskadminuser.m_challenge_fin_question_ans_cont.ans_cont IS '回答内容';
COMMENT ON COLUMN sskadminuser.m_challenge_fin_question_ans_cont.register_date IS '登録日時';
COMMENT ON COLUMN sskadminuser.m_challenge_fin_question_ans_cont.register_user_cd IS '登録者';
COMMENT ON COLUMN sskadminuser.m_challenge_fin_question_ans_cont.update_date IS '更新日時';
COMMENT ON COLUMN sskadminuser.m_challenge_fin_question_ans_cont.update_user_cd IS '更新者';
COMMENT ON COLUMN sskadminuser.m_challenge_fin_question_ans_cont.del_flg IS '削除フラグ';
COMMENT ON COLUMN sskadminuser.m_challenge_fin_question_ans_cont.challenge_kbn IS 'チャレンジ区分';
-- CREATE INDEX 
-- END TABLE : sskadminuser.m_challenge_fin_question_ans_cont  --

-- START TABLE : sskadminuser.m_challenge_fin_question  --
CREATE TABLE sskadminuser.m_challenge_fin_question(
event_cd BIGINT NOT NULL DEFAULT 0,
disp_turn INT NOT NULL DEFAULT 0,
question_cont VARCHAR(100) NOT NULL DEFAULT '',
register_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT to_timestamp('1900-01-01 00:00:00', 'YYYY-MM-DD HH24:MI:SS'),
register_user_cd VARCHAR(64) NOT NULL DEFAULT '',
update_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT to_timestamp('1900-01-01 00:00:00', 'YYYY-MM-DD HH24:MI:SS'),
update_user_cd VARCHAR(64) NOT NULL DEFAULT '',
del_flg INT NOT NULL DEFAULT 0,
challenge_kbn CHAR(1) NOT NULL DEFAULT 3,
CONSTRAINT pk_m_challenge_fin_question PRIMARY KEY (event_cd,disp_turn,challenge_kbn)
);
-- ADD COLUMN
COMMENT ON TABLE sskadminuser.m_challenge_fin_question IS 'チャレンジ完了時質問台帳';
COMMENT ON COLUMN sskadminuser.m_challenge_fin_question.event_cd IS 'イベントコード';
COMMENT ON COLUMN sskadminuser.m_challenge_fin_question.disp_turn IS '表示順';
COMMENT ON COLUMN sskadminuser.m_challenge_fin_question.question_cont IS '質問内容';
COMMENT ON COLUMN sskadminuser.m_challenge_fin_question.register_date IS '登録日時';
COMMENT ON COLUMN sskadminuser.m_challenge_fin_question.register_user_cd IS '登録者';
COMMENT ON COLUMN sskadminuser.m_challenge_fin_question.update_date IS '更新日時';
COMMENT ON COLUMN sskadminuser.m_challenge_fin_question.update_user_cd IS '更新者';
COMMENT ON COLUMN sskadminuser.m_challenge_fin_question.del_flg IS '削除フラグ';
COMMENT ON COLUMN sskadminuser.m_challenge_fin_question.challenge_kbn IS 'チャレンジ区分';
-- CREATE INDEX 
-- END TABLE : sskadminuser.m_challenge_fin_question  --

-- START TABLE : sskadminuser.f_achieve_character_ctrl  --
CREATE TABLE sskadminuser.f_achieve_character_ctrl(
achieve_character_seq INT NOT NULL,
challenge_kbn INT NOT NULL,
event_cd INT NOT NULL,
file_prefix VARCHAR(40) NOT NULL,
in_name VARCHAR(80) NOT NULL,
disp_name VARCHAR(80) NOT NULL,
need_score INT DEFAULT 0,
appear_rate INT DEFAULT 100,
update_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
register_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
update_user_cd VARCHAR(64) NOT NULL,
register_user_cd VARCHAR(64) NOT NULL,
del_flg INT DEFAULT 0,
CONSTRAINT pk_f_achieve_character_ctrl PRIMARY KEY (achieve_character_seq)
);
-- ADD COLUMN
COMMENT ON TABLE sskadminuser.f_achieve_character_ctrl IS '達成時キャラクタ管理伝票';
COMMENT ON COLUMN sskadminuser.f_achieve_character_ctrl.achieve_character_seq IS '達成時キャラクタ連番';
COMMENT ON COLUMN sskadminuser.f_achieve_character_ctrl.challenge_kbn IS 'チャレンジ区分';
COMMENT ON COLUMN sskadminuser.f_achieve_character_ctrl.event_cd IS 'イベントコード';
COMMENT ON COLUMN sskadminuser.f_achieve_character_ctrl.file_prefix IS 'ファイル接頭辞';
COMMENT ON COLUMN sskadminuser.f_achieve_character_ctrl.in_name IS '内部名';
COMMENT ON COLUMN sskadminuser.f_achieve_character_ctrl.disp_name IS '表示名';
COMMENT ON COLUMN sskadminuser.f_achieve_character_ctrl.need_score IS '必要スコア';
COMMENT ON COLUMN sskadminuser.f_achieve_character_ctrl.appear_rate IS '出現率';
COMMENT ON COLUMN sskadminuser.f_achieve_character_ctrl.update_date IS '更新日時';
COMMENT ON COLUMN sskadminuser.f_achieve_character_ctrl.register_date IS '登録日時';
COMMENT ON COLUMN sskadminuser.f_achieve_character_ctrl.update_user_cd IS '更新者';
COMMENT ON COLUMN sskadminuser.f_achieve_character_ctrl.register_user_cd IS '登録者';
COMMENT ON COLUMN sskadminuser.f_achieve_character_ctrl.del_flg IS '削除フラグ';
-- CREATE INDEX 
CREATE INDEX idx_f_achieve_character_ctrl_01 ON sskadminuser.f_achieve_character_ctrl (challenge_kbn);
CREATE UNIQUE INDEX idx_f_achieve_character_ctrl_02 ON sskadminuser.f_achieve_character_ctrl (in_name);
CREATE INDEX idx_f_achieve_character_ctrl_03 ON sskadminuser.f_achieve_character_ctrl (need_score);
-- END TABLE : sskadminuser.f_achieve_character_ctrl  --

-- START TABLE : sskadminuser.m_app_care_calendar_use_way  --
CREATE TABLE sskadminuser.m_app_care_calendar_use_way(
use_way_cd BIGINT NOT NULL,
use_way_name VARCHAR(40) NOT NULL,
disp_start_dt_tm TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL,
disp_end_dt_tm TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL,
calendar_use_way_dtl VARCHAR(4000) NOT NULL,
disp_flg INT NOT NULL,
register_user_cd VARCHAR(64) NOT NULL,
register_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL,
update_user_cd VARCHAR(64) NOT NULL,
scr_upd_dt_tm TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL,
bat_upd_dt_tm TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL,
upd_cnt BIGINT NOT NULL,
upd_scr_name VARCHAR(80) NOT NULL,
upd_bat_name VARCHAR(80) NOT NULL,
del_flg INT NOT NULL,
CONSTRAINT pk_m_app_care_calendar_use_way PRIMARY KEY (use_way_cd)
);
-- ADD COLUMN
COMMENT ON TABLE sskadminuser.m_app_care_calendar_use_way IS 'アプリ用お手当カレンダー利用方法台帳';
COMMENT ON COLUMN sskadminuser.m_app_care_calendar_use_way.use_way_cd IS '利用方法コード';
COMMENT ON COLUMN sskadminuser.m_app_care_calendar_use_way.use_way_name IS '利用方法名';
COMMENT ON COLUMN sskadminuser.m_app_care_calendar_use_way.disp_start_dt_tm IS '表示開始日時';
COMMENT ON COLUMN sskadminuser.m_app_care_calendar_use_way.disp_end_dt_tm IS '表示終了日時';
COMMENT ON COLUMN sskadminuser.m_app_care_calendar_use_way.calendar_use_way_dtl IS 'カレンダー利用方法詳細';
COMMENT ON COLUMN sskadminuser.m_app_care_calendar_use_way.disp_flg IS '表示フラグ';
COMMENT ON COLUMN sskadminuser.m_app_care_calendar_use_way.register_user_cd IS '登録者';
COMMENT ON COLUMN sskadminuser.m_app_care_calendar_use_way.register_date IS '登録日時';
COMMENT ON COLUMN sskadminuser.m_app_care_calendar_use_way.update_user_cd IS '更新者';
COMMENT ON COLUMN sskadminuser.m_app_care_calendar_use_way.scr_upd_dt_tm IS '画面更新日時';
COMMENT ON COLUMN sskadminuser.m_app_care_calendar_use_way.bat_upd_dt_tm IS 'バッチ更新日時';
COMMENT ON COLUMN sskadminuser.m_app_care_calendar_use_way.upd_cnt IS '更新カウント';
COMMENT ON COLUMN sskadminuser.m_app_care_calendar_use_way.upd_scr_name IS '更新画面名';
COMMENT ON COLUMN sskadminuser.m_app_care_calendar_use_way.upd_bat_name IS '更新バッチ名';
COMMENT ON COLUMN sskadminuser.m_app_care_calendar_use_way.del_flg IS '削除フラグ';
-- CREATE INDEX 
-- END TABLE : sskadminuser.m_app_care_calendar_use_way  --

-- START TABLE : sskadminuser.c_app_login  --
CREATE TABLE sskadminuser.c_app_login(
cust_no INT NOT NULL DEFAULT 0,
access_token VARCHAR(32) NOT NULL,
device_kbn CHAR(3),
second_auth_token VARCHAR(256),
push_notice_token VARCHAR(256),
send_fin_msg_pointa BIGINT DEFAULT 0,
last_access_dt_tm TIMESTAMP(0) WITHOUT TIME ZONE,
session_id VARCHAR(100),
last_info_get_dt_tm TIMESTAMP(0) WITHOUT TIME ZONE,
wao_upd_dt_tm TIMESTAMP(0) WITHOUT TIME ZONE,
register_user_cd VARCHAR(64) NOT NULL,
register_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL,
update_user_cd VARCHAR(64) NOT NULL,
scr_upd_dt_tm TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL,
bat_upd_dt_tm TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL,
upd_cnt BIGINT NOT NULL,
upd_scr_name VARCHAR(80) NOT NULL,
upd_bat_name VARCHAR(80) NOT NULL,
del_flg INT NOT NULL,
CONSTRAINT pk_c_app_login PRIMARY KEY (cust_no,access_token)
);
-- ADD COLUMN
COMMENT ON TABLE sskadminuser.c_app_login IS 'アプリログイン管理';
COMMENT ON COLUMN sskadminuser.c_app_login.cust_no IS '会員番号';
COMMENT ON COLUMN sskadminuser.c_app_login.access_token IS 'アクセストークン';
COMMENT ON COLUMN sskadminuser.c_app_login.device_kbn IS 'デバイス区分';
COMMENT ON COLUMN sskadminuser.c_app_login.second_auth_token IS '第2認証トークン';
COMMENT ON COLUMN sskadminuser.c_app_login.push_notice_token IS 'プッシュ通知トークン';
COMMENT ON COLUMN sskadminuser.c_app_login.send_fin_msg_pointa IS '送信済メッセージポインタ';
COMMENT ON COLUMN sskadminuser.c_app_login.last_access_dt_tm IS '最終アクセス日時';
COMMENT ON COLUMN sskadminuser.c_app_login.session_id IS 'セッションID';
COMMENT ON COLUMN sskadminuser.c_app_login.last_info_get_dt_tm IS '最終情報取得日時';
COMMENT ON COLUMN sskadminuser.c_app_login.wao_upd_dt_tm IS 'WAO更新日時';
COMMENT ON COLUMN sskadminuser.c_app_login.register_user_cd IS '登録者';
COMMENT ON COLUMN sskadminuser.c_app_login.register_date IS '登録日時';
COMMENT ON COLUMN sskadminuser.c_app_login.update_user_cd IS '更新者';
COMMENT ON COLUMN sskadminuser.c_app_login.scr_upd_dt_tm IS '画面更新日時';
COMMENT ON COLUMN sskadminuser.c_app_login.bat_upd_dt_tm IS 'バッチ更新日時';
COMMENT ON COLUMN sskadminuser.c_app_login.upd_cnt IS '更新カウント';
COMMENT ON COLUMN sskadminuser.c_app_login.upd_scr_name IS '更新画面名';
COMMENT ON COLUMN sskadminuser.c_app_login.upd_bat_name IS '更新バッチ名';
COMMENT ON COLUMN sskadminuser.c_app_login.del_flg IS '削除フラグ';
-- CREATE INDEX 
CREATE INDEX idx_c_app_login_01 ON sskadminuser.c_app_login (access_token);
-- END TABLE : sskadminuser.c_app_login  --

-- START TABLE : sskadminuser.m_app_event  --
CREATE TABLE sskadminuser.m_app_event(
event_cd BIGINT NOT NULL DEFAULT 0,
event_name VARCHAR(60) NOT NULL DEFAULT ' ',
event_start_dt_tm TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT to_timestamp('1900-01-01 00:00:00', 'YYYY-MM-DD HH24:MI:SS'),
event_end_dt_tm TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT to_timestamp('1900-01-01 00:00:00', 'YYYY-MM-DD HH24:MI:SS'),
achieve_cond_days INT NOT NULL DEFAULT 0,
event_explain_sente VARCHAR(2000) NOT NULL DEFAULT ' ',
banner_disp_start_dt_tm TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT to_timestamp('1900-01-01 00:00:00', 'YYYY-MM-DD HH24:MI:SS'),
banner_disp_end_dt_tm TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT to_timestamp('1900-01-01 00:00:00', 'YYYY-MM-DD HH24:MI:SS'),
register_user_cd VARCHAR(64) NOT NULL DEFAULT ' ',
register_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT to_timestamp('1900-01-01 00:00:00', 'YYYY-MM-DD HH24:MI:SS'),
update_user_cd VARCHAR(64) NOT NULL DEFAULT ' ',
scr_upd_dt_tm TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT to_timestamp('1900-01-01 00:00:00', 'YYYY-MM-DD HH24:MI:SS'),
bat_upd_dt_tm TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT to_timestamp('1900-01-01 00:00:00', 'YYYY-MM-DD HH24:MI:SS'),
upd_cnt BIGINT NOT NULL DEFAULT 0,
upd_scr_name VARCHAR(80) NOT NULL DEFAULT ' ',
upd_bat_name VARCHAR(80) NOT NULL DEFAULT ' ',
del_flg INT NOT NULL DEFAULT 0,
CONSTRAINT pk_m_app_event PRIMARY KEY (event_cd)
);
-- ADD COLUMN
COMMENT ON TABLE sskadminuser.m_app_event IS 'アプリイベント台帳';
COMMENT ON COLUMN sskadminuser.m_app_event.event_cd IS 'イベントコード';
COMMENT ON COLUMN sskadminuser.m_app_event.event_name IS 'イベント名';
COMMENT ON COLUMN sskadminuser.m_app_event.event_start_dt_tm IS 'イベント開始日時';
COMMENT ON COLUMN sskadminuser.m_app_event.event_end_dt_tm IS 'イベント終了日時';
COMMENT ON COLUMN sskadminuser.m_app_event.achieve_cond_days IS '達成条件日数';
COMMENT ON COLUMN sskadminuser.m_app_event.event_explain_sente IS 'イベント説明文';
COMMENT ON COLUMN sskadminuser.m_app_event.banner_disp_start_dt_tm IS 'バナー表示開始日時';
COMMENT ON COLUMN sskadminuser.m_app_event.banner_disp_end_dt_tm IS 'バナー表示終了日時';
COMMENT ON COLUMN sskadminuser.m_app_event.register_user_cd IS '登録者';
COMMENT ON COLUMN sskadminuser.m_app_event.register_date IS '登録日時';
COMMENT ON COLUMN sskadminuser.m_app_event.update_user_cd IS '更新者';
COMMENT ON COLUMN sskadminuser.m_app_event.scr_upd_dt_tm IS '画面更新日時';
COMMENT ON COLUMN sskadminuser.m_app_event.bat_upd_dt_tm IS 'バッチ更新日時';
COMMENT ON COLUMN sskadminuser.m_app_event.upd_cnt IS '更新カウント';
COMMENT ON COLUMN sskadminuser.m_app_event.upd_scr_name IS '更新画面名';
COMMENT ON COLUMN sskadminuser.m_app_event.upd_bat_name IS '更新バッチ名';
COMMENT ON COLUMN sskadminuser.m_app_event.del_flg IS '削除フラグ';
-- CREATE INDEX 
-- END TABLE : sskadminuser.m_app_event  --

-- START TABLE : sskadminuser.f_feeling_chk_sheet_ans  --
CREATE TABLE sskadminuser.f_feeling_chk_sheet_ans(
cust_no INT NOT NULL DEFAULT 0,
question_no BIGINT NOT NULL DEFAULT 0,
disp_turn INT NOT NULL DEFAULT 0,
challenge_kbn CHAR(1) NOT NULL DEFAULT ' ',
feeling_cd BIGINT NOT NULL DEFAULT 0,
site_kbn CHAR(1) NOT NULL DEFAULT ' ',
ans_cont_kbn VARCHAR(800),
another_adr_etc_entry_field VARCHAR(800) NOT NULL DEFAULT ' ',
sync_kbn CHAR(1) NOT NULL DEFAULT '0',
register_user_cd VARCHAR(64) NOT NULL DEFAULT ' ',
register_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT to_timestamp('1900-01-01 00:00:00', 'YYYY-MM-DD HH24:MI:SS'),
update_user_cd VARCHAR(64) NOT NULL DEFAULT ' ',
scr_upd_dt_tm TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT to_timestamp('1900-01-01 00:00:00', 'YYYY-MM-DD HH24:MI:SS'),
bat_upd_dt_tm TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT to_timestamp('1900-01-01 00:00:00', 'YYYY-MM-DD HH24:MI:SS'),
upd_cnt BIGINT NOT NULL DEFAULT 0,
upd_scr_name VARCHAR(80) NOT NULL DEFAULT ' ',
upd_bat_name VARCHAR(80) NOT NULL DEFAULT ' ',
del_flg INT NOT NULL DEFAULT 0,
CONSTRAINT pk_f_feeling_chk_sheet_ans PRIMARY KEY (cust_no,question_no)
);
-- ADD COLUMN
COMMENT ON TABLE sskadminuser.f_feeling_chk_sheet_ans IS '実感チェックシート回答伝票';
COMMENT ON COLUMN sskadminuser.f_feeling_chk_sheet_ans.cust_no IS '会員番号';
COMMENT ON COLUMN sskadminuser.f_feeling_chk_sheet_ans.question_no IS '質問番号';
COMMENT ON COLUMN sskadminuser.f_feeling_chk_sheet_ans.disp_turn IS '表示順';
COMMENT ON COLUMN sskadminuser.f_feeling_chk_sheet_ans.challenge_kbn IS 'チャレンジ区分';
COMMENT ON COLUMN sskadminuser.f_feeling_chk_sheet_ans.feeling_cd IS '実感コード';
COMMENT ON COLUMN sskadminuser.f_feeling_chk_sheet_ans.site_kbn IS 'サイト区分';
COMMENT ON COLUMN sskadminuser.f_feeling_chk_sheet_ans.ans_cont_kbn IS '回答内容区分';
COMMENT ON COLUMN sskadminuser.f_feeling_chk_sheet_ans.another_adr_etc_entry_field IS '別住所等記入欄';
COMMENT ON COLUMN sskadminuser.f_feeling_chk_sheet_ans.sync_kbn IS '同期区分';
COMMENT ON COLUMN sskadminuser.f_feeling_chk_sheet_ans.register_user_cd IS '登録者';
COMMENT ON COLUMN sskadminuser.f_feeling_chk_sheet_ans.register_date IS '登録日時';
COMMENT ON COLUMN sskadminuser.f_feeling_chk_sheet_ans.update_user_cd IS '更新者';
COMMENT ON COLUMN sskadminuser.f_feeling_chk_sheet_ans.scr_upd_dt_tm IS '画面更新日時';
COMMENT ON COLUMN sskadminuser.f_feeling_chk_sheet_ans.bat_upd_dt_tm IS 'バッチ更新日時';
COMMENT ON COLUMN sskadminuser.f_feeling_chk_sheet_ans.upd_cnt IS '更新カウント';
COMMENT ON COLUMN sskadminuser.f_feeling_chk_sheet_ans.upd_scr_name IS '更新画面名';
COMMENT ON COLUMN sskadminuser.f_feeling_chk_sheet_ans.upd_bat_name IS '更新バッチ名';
COMMENT ON COLUMN sskadminuser.f_feeling_chk_sheet_ans.del_flg IS '削除フラグ';
-- CREATE INDEX 
CREATE INDEX idx_f_feeling_chk_sheet_ans_01 ON sskadminuser.f_feeling_chk_sheet_ans (sync_kbn);
-- END TABLE : sskadminuser.f_feeling_chk_sheet_ans  --

-- START TABLE : sskadminuser.m_feeling_chk_sheet_now  --
CREATE TABLE sskadminuser.m_feeling_chk_sheet_now(
question_no BIGINT NOT NULL DEFAULT 0,
disp_turn INT NOT NULL DEFAULT 0,
challenge_kbn CHAR(1) NOT NULL DEFAULT ' ',
feeling_cd BIGINT NOT NULL DEFAULT 0,
site_kbn CHAR(1) NOT NULL DEFAULT ' ',
sync_kbn CHAR(1) NOT NULL DEFAULT '0',
register_user_cd VARCHAR(64) NOT NULL DEFAULT ' ',
register_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT to_timestamp('1900-01-01 00:00:00', 'YYYY-MM-DD HH24:MI:SS'),
update_user_cd VARCHAR(64) NOT NULL DEFAULT ' ',
scr_upd_dt_tm TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT to_timestamp('1900-01-01 00:00:00', 'YYYY-MM-DD HH24:MI:SS'),
bat_upd_dt_tm TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT to_timestamp('1900-01-01 00:00:00', 'YYYY-MM-DD HH24:MI:SS'),
upd_cnt BIGINT NOT NULL DEFAULT 0,
upd_scr_name VARCHAR(80) NOT NULL DEFAULT ' ',
upd_bat_name VARCHAR(80) NOT NULL DEFAULT ' ',
del_flg INT NOT NULL DEFAULT 0,
CONSTRAINT pk_m_feeling_chk_sheet_now PRIMARY KEY (question_no,disp_turn)
);
-- ADD COLUMN
COMMENT ON TABLE sskadminuser.m_feeling_chk_sheet_now IS '実感チェックシート現行台帳';
COMMENT ON COLUMN sskadminuser.m_feeling_chk_sheet_now.question_no IS '質問番号';
COMMENT ON COLUMN sskadminuser.m_feeling_chk_sheet_now.disp_turn IS '表示順';
COMMENT ON COLUMN sskadminuser.m_feeling_chk_sheet_now.challenge_kbn IS 'チャレンジ区分';
COMMENT ON COLUMN sskadminuser.m_feeling_chk_sheet_now.feeling_cd IS '実感コード';
COMMENT ON COLUMN sskadminuser.m_feeling_chk_sheet_now.site_kbn IS 'サイト区分';
COMMENT ON COLUMN sskadminuser.m_feeling_chk_sheet_now.sync_kbn IS '同期区分';
COMMENT ON COLUMN sskadminuser.m_feeling_chk_sheet_now.register_user_cd IS '登録者';
COMMENT ON COLUMN sskadminuser.m_feeling_chk_sheet_now.register_date IS '登録日時';
COMMENT ON COLUMN sskadminuser.m_feeling_chk_sheet_now.update_user_cd IS '更新者';
COMMENT ON COLUMN sskadminuser.m_feeling_chk_sheet_now.scr_upd_dt_tm IS '画面更新日時';
COMMENT ON COLUMN sskadminuser.m_feeling_chk_sheet_now.bat_upd_dt_tm IS 'バッチ更新日時';
COMMENT ON COLUMN sskadminuser.m_feeling_chk_sheet_now.upd_cnt IS '更新カウント';
COMMENT ON COLUMN sskadminuser.m_feeling_chk_sheet_now.upd_scr_name IS '更新画面名';
COMMENT ON COLUMN sskadminuser.m_feeling_chk_sheet_now.upd_bat_name IS '更新バッチ名';
COMMENT ON COLUMN sskadminuser.m_feeling_chk_sheet_now.del_flg IS '削除フラグ';
-- CREATE INDEX 
CREATE INDEX idx_m_feeling_chk_sheet_now_01 ON sskadminuser.m_feeling_chk_sheet_now (sync_kbn);
-- END TABLE : sskadminuser.m_feeling_chk_sheet_now  --

-- START TABLE : sskadminuser.f_feeling_chk_sheet_question  --
CREATE TABLE sskadminuser.f_feeling_chk_sheet_question(
question_no BIGINT NOT NULL DEFAULT 0,
challenge_kbn CHAR(1) NOT NULL DEFAULT ' ',
feeling_cd BIGINT NOT NULL DEFAULT 0,
site_kbn CHAR(1) NOT NULL DEFAULT ' ',
question_cont_kbn CHAR(1) NOT NULL DEFAULT ' ',
question_cont VARCHAR(400) NOT NULL DEFAULT ' ',
sync_kbn CHAR(1) NOT NULL DEFAULT '0',
register_user_cd VARCHAR(64) NOT NULL DEFAULT ' ',
register_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT to_timestamp('1900-01-01 00:00:00', 'YYYY-MM-DD HH24:MI:SS'),
update_user_cd VARCHAR(64) NOT NULL DEFAULT ' ',
scr_upd_dt_tm TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT to_timestamp('1900-01-01 00:00:00', 'YYYY-MM-DD HH24:MI:SS'),
bat_upd_dt_tm TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT to_timestamp('1900-01-01 00:00:00', 'YYYY-MM-DD HH24:MI:SS'),
upd_cnt BIGINT NOT NULL DEFAULT 0,
upd_scr_name VARCHAR(80) NOT NULL DEFAULT ' ',
upd_bat_name VARCHAR(80) NOT NULL DEFAULT ' ',
del_flg INT NOT NULL DEFAULT 0,
CONSTRAINT pk_f_feeling_chk_sheet_question PRIMARY KEY (question_no)
);
-- ADD COLUMN
COMMENT ON TABLE sskadminuser.f_feeling_chk_sheet_question IS '実感チェックシート質問伝票';
COMMENT ON COLUMN sskadminuser.f_feeling_chk_sheet_question.question_no IS '質問番号';
COMMENT ON COLUMN sskadminuser.f_feeling_chk_sheet_question.challenge_kbn IS 'チャレンジ区分';
COMMENT ON COLUMN sskadminuser.f_feeling_chk_sheet_question.feeling_cd IS '実感コード';
COMMENT ON COLUMN sskadminuser.f_feeling_chk_sheet_question.site_kbn IS 'サイト区分';
COMMENT ON COLUMN sskadminuser.f_feeling_chk_sheet_question.question_cont_kbn IS '質問内容区分';
COMMENT ON COLUMN sskadminuser.f_feeling_chk_sheet_question.question_cont IS '質問内容';
COMMENT ON COLUMN sskadminuser.f_feeling_chk_sheet_question.sync_kbn IS '同期区分';
COMMENT ON COLUMN sskadminuser.f_feeling_chk_sheet_question.register_user_cd IS '登録者';
COMMENT ON COLUMN sskadminuser.f_feeling_chk_sheet_question.register_date IS '登録日時';
COMMENT ON COLUMN sskadminuser.f_feeling_chk_sheet_question.update_user_cd IS '更新者';
COMMENT ON COLUMN sskadminuser.f_feeling_chk_sheet_question.scr_upd_dt_tm IS '画面更新日時';
COMMENT ON COLUMN sskadminuser.f_feeling_chk_sheet_question.bat_upd_dt_tm IS 'バッチ更新日時';
COMMENT ON COLUMN sskadminuser.f_feeling_chk_sheet_question.upd_cnt IS '更新カウント';
COMMENT ON COLUMN sskadminuser.f_feeling_chk_sheet_question.upd_scr_name IS '更新画面名';
COMMENT ON COLUMN sskadminuser.f_feeling_chk_sheet_question.upd_bat_name IS '更新バッチ名';
COMMENT ON COLUMN sskadminuser.f_feeling_chk_sheet_question.del_flg IS '削除フラグ';
-- CREATE INDEX 
CREATE INDEX idx_f_feeling_chk_sheet_question_01 ON sskadminuser.f_feeling_chk_sheet_question (sync_kbn);
-- END TABLE : sskadminuser.f_feeling_chk_sheet_question  --

-- START TABLE : sskadminuser.m_flower_anime_judge  --
CREATE TABLE sskadminuser.m_flower_anime_judge(
achieve_cond_days INT NOT NULL DEFAULT 0,
stat_continue_range_start INT NOT NULL DEFAULT 0,
stat_continue_range_end INT NOT NULL DEFAULT 0,
stat_kbn CHAR(1) NOT NULL DEFAULT ' ',
register_user_cd VARCHAR(64) NOT NULL DEFAULT ' ',
register_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT to_timestamp('1900-01-01 00:00:00', 'YYYY-MM-DD HH24:MI:SS'),
update_user_cd VARCHAR(64) NOT NULL DEFAULT ' ',
scr_upd_dt_tm TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT to_timestamp('1900-01-01 00:00:00', 'YYYY-MM-DD HH24:MI:SS'),
bat_upd_dt_tm TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT to_timestamp('1900-01-01 00:00:00', 'YYYY-MM-DD HH24:MI:SS'),
upd_cnt BIGINT NOT NULL DEFAULT 0,
upd_scr_name VARCHAR(80) NOT NULL DEFAULT ' ',
upd_bat_name VARCHAR(80) NOT NULL DEFAULT ' ',
del_flg INT NOT NULL DEFAULT 0,
CONSTRAINT pk_m_flower_anime_judge PRIMARY KEY (achieve_cond_days,stat_continue_range_start,stat_continue_range_end)
);
-- ADD COLUMN
COMMENT ON TABLE sskadminuser.m_flower_anime_judge IS '花アニメ判定台帳';
COMMENT ON COLUMN sskadminuser.m_flower_anime_judge.achieve_cond_days IS '達成条件日数';
COMMENT ON COLUMN sskadminuser.m_flower_anime_judge.stat_continue_range_start IS '状態継続範囲開始';
COMMENT ON COLUMN sskadminuser.m_flower_anime_judge.stat_continue_range_end IS '状態継続範囲終了';
COMMENT ON COLUMN sskadminuser.m_flower_anime_judge.stat_kbn IS '状態区分';
COMMENT ON COLUMN sskadminuser.m_flower_anime_judge.register_user_cd IS '登録者';
COMMENT ON COLUMN sskadminuser.m_flower_anime_judge.register_date IS '登録日時';
COMMENT ON COLUMN sskadminuser.m_flower_anime_judge.update_user_cd IS '更新者';
COMMENT ON COLUMN sskadminuser.m_flower_anime_judge.scr_upd_dt_tm IS '画面更新日時';
COMMENT ON COLUMN sskadminuser.m_flower_anime_judge.bat_upd_dt_tm IS 'バッチ更新日時';
COMMENT ON COLUMN sskadminuser.m_flower_anime_judge.upd_cnt IS '更新カウント';
COMMENT ON COLUMN sskadminuser.m_flower_anime_judge.upd_scr_name IS '更新画面名';
COMMENT ON COLUMN sskadminuser.m_flower_anime_judge.upd_bat_name IS '更新バッチ名';
COMMENT ON COLUMN sskadminuser.m_flower_anime_judge.del_flg IS '削除フラグ';
-- CREATE INDEX 
-- END TABLE : sskadminuser.m_flower_anime_judge  --

-- START TABLE : sskadminuser.m_img_ctrl  --
CREATE TABLE sskadminuser.m_img_ctrl(
img_cd BIGINT NOT NULL DEFAULT 0,
file_path VARCHAR(256) NOT NULL DEFAULT ' ',
img_upd_dt_tm TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT to_timestamp('1900-01-01 00:00:00', 'YYYY-MM-DD HH24:MI:SS'),
register_user_cd VARCHAR(64) NOT NULL DEFAULT ' ',
register_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT to_timestamp('1900-01-01 00:00:00', 'YYYY-MM-DD HH24:MI:SS'),
update_user_cd VARCHAR(64) NOT NULL DEFAULT ' ',
scr_upd_dt_tm TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT to_timestamp('1900-01-01 00:00:00', 'YYYY-MM-DD HH24:MI:SS'),
bat_upd_dt_tm TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT to_timestamp('1900-01-01 00:00:00', 'YYYY-MM-DD HH24:MI:SS'),
upd_cnt BIGINT NOT NULL DEFAULT 0,
upd_scr_name VARCHAR(80) NOT NULL DEFAULT ' ',
upd_bat_name VARCHAR(80) NOT NULL DEFAULT ' ',
del_flg INT NOT NULL DEFAULT 0,
CONSTRAINT pk_m_img_ctrl PRIMARY KEY (img_cd)
);
-- ADD COLUMN
COMMENT ON TABLE sskadminuser.m_img_ctrl IS '画像管理台帳';
COMMENT ON COLUMN sskadminuser.m_img_ctrl.img_cd IS '画像コード';
COMMENT ON COLUMN sskadminuser.m_img_ctrl.file_path IS 'ファイルパス';
COMMENT ON COLUMN sskadminuser.m_img_ctrl.img_upd_dt_tm IS '画像更新日時';
COMMENT ON COLUMN sskadminuser.m_img_ctrl.register_user_cd IS '登録者';
COMMENT ON COLUMN sskadminuser.m_img_ctrl.register_date IS '登録日時';
COMMENT ON COLUMN sskadminuser.m_img_ctrl.update_user_cd IS '更新者';
COMMENT ON COLUMN sskadminuser.m_img_ctrl.scr_upd_dt_tm IS '画面更新日時';
COMMENT ON COLUMN sskadminuser.m_img_ctrl.bat_upd_dt_tm IS 'バッチ更新日時';
COMMENT ON COLUMN sskadminuser.m_img_ctrl.upd_cnt IS '更新カウント';
COMMENT ON COLUMN sskadminuser.m_img_ctrl.upd_scr_name IS '更新画面名';
COMMENT ON COLUMN sskadminuser.m_img_ctrl.upd_bat_name IS '更新バッチ名';
COMMENT ON COLUMN sskadminuser.m_img_ctrl.del_flg IS '削除フラグ';
-- CREATE INDEX 
-- END TABLE : sskadminuser.m_img_ctrl  --

-- START TABLE : sskadminuser.m_img_relat  --
CREATE TABLE sskadminuser.m_img_relat(
relat_kbn VARCHAR(2) NOT NULL DEFAULT ' ',
relat_key VARCHAR(256) NOT NULL DEFAULT ' ',
dtl_kbn VARCHAR(256) NOT NULL DEFAULT ' ',
disp_turn INT NOT NULL DEFAULT 0,
img_cd BIGINT NOT NULL DEFAULT 0,
register_user_cd VARCHAR(64) NOT NULL DEFAULT ' ',
register_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT to_timestamp('1900-01-01 00:00:00', 'YYYY-MM-DD HH24:MI:SS'),
update_user_cd VARCHAR(64) NOT NULL DEFAULT ' ',
scr_upd_dt_tm TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT to_timestamp('1900-01-01 00:00:00', 'YYYY-MM-DD HH24:MI:SS'),
bat_upd_dt_tm TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT to_timestamp('1900-01-01 00:00:00', 'YYYY-MM-DD HH24:MI:SS'),
upd_cnt BIGINT NOT NULL DEFAULT 0,
upd_scr_name VARCHAR(80) NOT NULL DEFAULT ' ',
upd_bat_name VARCHAR(80) NOT NULL DEFAULT ' ',
del_flg INT NOT NULL DEFAULT 0,
CONSTRAINT pk_m_img_relat PRIMARY KEY (relat_kbn,relat_key,dtl_kbn)
);
-- ADD COLUMN
COMMENT ON TABLE sskadminuser.m_img_relat IS '画像紐付台帳';
COMMENT ON COLUMN sskadminuser.m_img_relat.relat_kbn IS '紐付区分';
COMMENT ON COLUMN sskadminuser.m_img_relat.relat_key IS '紐付キー';
COMMENT ON COLUMN sskadminuser.m_img_relat.dtl_kbn IS '明細区分';
COMMENT ON COLUMN sskadminuser.m_img_relat.disp_turn IS '表示順';
COMMENT ON COLUMN sskadminuser.m_img_relat.img_cd IS '画像コード';
COMMENT ON COLUMN sskadminuser.m_img_relat.register_user_cd IS '登録者';
COMMENT ON COLUMN sskadminuser.m_img_relat.register_date IS '登録日時';
COMMENT ON COLUMN sskadminuser.m_img_relat.update_user_cd IS '更新者';
COMMENT ON COLUMN sskadminuser.m_img_relat.scr_upd_dt_tm IS '画面更新日時';
COMMENT ON COLUMN sskadminuser.m_img_relat.bat_upd_dt_tm IS 'バッチ更新日時';
COMMENT ON COLUMN sskadminuser.m_img_relat.upd_cnt IS '更新カウント';
COMMENT ON COLUMN sskadminuser.m_img_relat.upd_scr_name IS '更新画面名';
COMMENT ON COLUMN sskadminuser.m_img_relat.upd_bat_name IS '更新バッチ名';
COMMENT ON COLUMN sskadminuser.m_img_relat.del_flg IS '削除フラグ';
-- CREATE INDEX 
-- END TABLE : sskadminuser.m_img_relat  --

-- START TABLE : sskadminuser.m_quesnr_ptn  --
CREATE TABLE sskadminuser.m_quesnr_ptn(
ptn_cd CHAR(5) NOT NULL,
ptn_name VARCHAR(200),
update_date TIMESTAMP(0) WITHOUT TIME ZONE,
register_date TIMESTAMP(0) WITHOUT TIME ZONE,
update_user_cd VARCHAR(64),
register_user_cd VARCHAR(64),
del_flg CHAR(1),
CONSTRAINT pk_m_quesnr_ptn PRIMARY KEY (ptn_cd)
);
-- ADD COLUMN
COMMENT ON TABLE sskadminuser.m_quesnr_ptn IS 'アンケートパターン台帳';
COMMENT ON COLUMN sskadminuser.m_quesnr_ptn.ptn_cd IS 'パターンコード';
COMMENT ON COLUMN sskadminuser.m_quesnr_ptn.ptn_name IS 'パターン名';
COMMENT ON COLUMN sskadminuser.m_quesnr_ptn.update_date IS '更新日時';
COMMENT ON COLUMN sskadminuser.m_quesnr_ptn.register_date IS '登録日時';
COMMENT ON COLUMN sskadminuser.m_quesnr_ptn.update_user_cd IS '更新者';
COMMENT ON COLUMN sskadminuser.m_quesnr_ptn.register_user_cd IS '登録者';
COMMENT ON COLUMN sskadminuser.m_quesnr_ptn.del_flg IS '削除フラグ';
-- CREATE INDEX 
-- END TABLE : sskadminuser.m_quesnr_ptn  --

-- START TABLE : sskadminuser.m_worry_cd  --
CREATE TABLE sskadminuser.m_worry_cd(
worry_kbn VARCHAR(2) NOT NULL,
worry_cd VARCHAR(2) NOT NULL,
worry_name VARCHAR(30) NOT NULL,
update_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
register_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
update_user_cd VARCHAR(64) NOT NULL,
register_user_cd VARCHAR(64) NOT NULL,
disp_turn INT NOT NULL DEFAULT 0,
disp_flg CHAR(1) NOT NULL DEFAULT 0,
CONSTRAINT pk_m_worry_cd PRIMARY KEY (worry_kbn,worry_cd)
);
-- ADD COLUMN
COMMENT ON TABLE sskadminuser.m_worry_cd IS '悩みコード台帳';
COMMENT ON COLUMN sskadminuser.m_worry_cd.worry_kbn IS '悩み区分';
COMMENT ON COLUMN sskadminuser.m_worry_cd.worry_cd IS '悩みコード';
COMMENT ON COLUMN sskadminuser.m_worry_cd.worry_name IS '悩み名称';
COMMENT ON COLUMN sskadminuser.m_worry_cd.update_date IS '更新日時';
COMMENT ON COLUMN sskadminuser.m_worry_cd.register_date IS '登録日時';
COMMENT ON COLUMN sskadminuser.m_worry_cd.update_user_cd IS '更新者';
COMMENT ON COLUMN sskadminuser.m_worry_cd.register_user_cd IS '登録者';
COMMENT ON COLUMN sskadminuser.m_worry_cd.disp_turn IS '表示順';
COMMENT ON COLUMN sskadminuser.m_worry_cd.disp_flg IS '表示フラグ';
-- CREATE INDEX 
CREATE INDEX idx_m_worry_cd_01 ON sskadminuser.m_worry_cd (update_date,register_date);
-- END TABLE : sskadminuser.m_worry_cd  --

-- START TABLE : sskadminuser.m_net_ju_rsn  --
CREATE TABLE sskadminuser.m_net_ju_rsn(
net_ju_cd CHAR(4) NOT NULL,
net_ju_rsn VARCHAR(50) NOT NULL,
update_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
register_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
update_user_cd VARCHAR(64) NOT NULL,
register_user_cd VARCHAR(64) NOT NULL,
CONSTRAINT pk_m_net_ju_rsn PRIMARY KEY (net_ju_cd)
);
-- ADD COLUMN
COMMENT ON TABLE sskadminuser.m_net_ju_rsn IS 'ネットJU理由台帳';
COMMENT ON COLUMN sskadminuser.m_net_ju_rsn.net_ju_cd IS 'ネットJUコード';
COMMENT ON COLUMN sskadminuser.m_net_ju_rsn.net_ju_rsn IS 'ネットJU理由';
COMMENT ON COLUMN sskadminuser.m_net_ju_rsn.update_date IS '更新日時';
COMMENT ON COLUMN sskadminuser.m_net_ju_rsn.register_date IS '登録日時';
COMMENT ON COLUMN sskadminuser.m_net_ju_rsn.update_user_cd IS '更新者';
COMMENT ON COLUMN sskadminuser.m_net_ju_rsn.register_user_cd IS '登録者';
-- CREATE INDEX 
CREATE INDEX idx_m_net_ju_rsn_01 ON sskadminuser.m_net_ju_rsn (update_date,register_date);
-- END TABLE : sskadminuser.m_net_ju_rsn  --

-- START TABLE : sskadminuser.m_news_release  --
CREATE TABLE sskadminuser.m_news_release(
news_seq BIGINT NOT NULL,
site_kbn CHAR(1) NOT NULL,
pub_kbn INT NOT NULL,
title VARCHAR(200),
link_kbn CHAR(1) NOT NULL DEFAULT '0',
link_url VARCHAR(128),
disp_start_dt_tm TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL,
disp_end_dt_tm TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL,
file_name VARCHAR(100),
append_doc_file BYTEA,
disp_flg CHAR(1) NOT NULL DEFAULT '1',
del_flg CHAR(1) NOT NULL DEFAULT '0',
update_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
register_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
update_user_cd VARCHAR(64) NOT NULL,
register_user_cd VARCHAR(64) NOT NULL,
important_flg CHAR(1) NOT NULL DEFAULT '0'
);
-- ADD COLUMN
COMMENT ON TABLE sskadminuser.m_news_release IS 'ニュースリリース台帳';
COMMENT ON COLUMN sskadminuser.m_news_release.news_seq IS 'ニュース連番';
COMMENT ON COLUMN sskadminuser.m_news_release.site_kbn IS 'サイト区分';
COMMENT ON COLUMN sskadminuser.m_news_release.pub_kbn IS '掲載区分';
COMMENT ON COLUMN sskadminuser.m_news_release.title IS 'タイトル';
COMMENT ON COLUMN sskadminuser.m_news_release.link_kbn IS 'リンク区分';
COMMENT ON COLUMN sskadminuser.m_news_release.link_url IS 'リンクURL';
COMMENT ON COLUMN sskadminuser.m_news_release.disp_start_dt_tm IS '表示開始日時';
COMMENT ON COLUMN sskadminuser.m_news_release.disp_end_dt_tm IS '表示終了日時';
COMMENT ON COLUMN sskadminuser.m_news_release.file_name IS 'ファイル名';
COMMENT ON COLUMN sskadminuser.m_news_release.append_doc_file IS '添付ファイル';
COMMENT ON COLUMN sskadminuser.m_news_release.disp_flg IS '表示フラグ';
COMMENT ON COLUMN sskadminuser.m_news_release.del_flg IS '削除フラグ';
COMMENT ON COLUMN sskadminuser.m_news_release.update_date IS '更新日時';
COMMENT ON COLUMN sskadminuser.m_news_release.register_date IS '登録日時';
COMMENT ON COLUMN sskadminuser.m_news_release.update_user_cd IS '更新者';
COMMENT ON COLUMN sskadminuser.m_news_release.register_user_cd IS '登録者';
COMMENT ON COLUMN sskadminuser.m_news_release.important_flg IS '重要フラグ';
-- CREATE INDEX 
CREATE UNIQUE INDEX idx_m_news_release_01 ON sskadminuser.m_news_release (news_seq,site_kbn,file_name);
CREATE INDEX idx_m_news_release_02 ON sskadminuser.m_news_release (site_kbn,pub_kbn,link_kbn,disp_start_dt_tm,disp_end_dt_tm,file_name,disp_flg,del_flg);
CREATE INDEX idx_m_news_release_03 ON sskadminuser.m_news_release (pub_kbn,link_kbn,disp_start_dt_tm,disp_end_dt_tm,disp_flg,del_flg);
CREATE INDEX idx_m_news_release_04 ON sskadminuser.m_news_release (link_kbn,disp_start_dt_tm,disp_end_dt_tm,disp_flg,del_flg);
CREATE INDEX idx_m_news_release_05 ON sskadminuser.m_news_release (link_kbn,disp_start_dt_tm,disp_end_dt_tm);
CREATE INDEX idx_m_news_release_06 ON sskadminuser.m_news_release (update_date,register_date);
-- END TABLE : sskadminuser.m_news_release  --

-- START TABLE : sskadminuser.m_ng_pwd_ctrl  --
CREATE TABLE sskadminuser.m_ng_pwd_ctrl(
ng_pw_seq DECIMAL(32) NOT NULL DEFAULT 0,
cust_no INT NOT NULL,
leak_pwd VARCHAR(108),
temp_pwd VARCHAR(108),
avail_term_dt_tm TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL,
update_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
register_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
update_user_cd VARCHAR(64) NOT NULL,
register_user_cd VARCHAR(64) NOT NULL,
CONSTRAINT pk_m_ng_pwd_ctrl PRIMARY KEY (ng_pw_seq)
);
-- ADD COLUMN
COMMENT ON TABLE sskadminuser.m_ng_pwd_ctrl IS '禁止パスワード管理台帳';
COMMENT ON COLUMN sskadminuser.m_ng_pwd_ctrl.ng_pw_seq IS '禁止パスワード連番';
COMMENT ON COLUMN sskadminuser.m_ng_pwd_ctrl.cust_no IS '会員番号';
COMMENT ON COLUMN sskadminuser.m_ng_pwd_ctrl.leak_pwd IS '漏洩パスワード';
COMMENT ON COLUMN sskadminuser.m_ng_pwd_ctrl.temp_pwd IS '仮パスワード';
COMMENT ON COLUMN sskadminuser.m_ng_pwd_ctrl.avail_term_dt_tm IS '有効期限日時';
COMMENT ON COLUMN sskadminuser.m_ng_pwd_ctrl.update_date IS '更新日時';
COMMENT ON COLUMN sskadminuser.m_ng_pwd_ctrl.register_date IS '登録日時';
COMMENT ON COLUMN sskadminuser.m_ng_pwd_ctrl.update_user_cd IS '更新者';
COMMENT ON COLUMN sskadminuser.m_ng_pwd_ctrl.register_user_cd IS '登録者';
-- CREATE INDEX 
CREATE INDEX idx_m_ng_pwd_ctrl_01 ON sskadminuser.m_ng_pwd_ctrl (cust_no);
CREATE INDEX idx_m_ng_pwd_ctrl_02 ON sskadminuser.m_ng_pwd_ctrl (update_date,register_date);
-- END TABLE : sskadminuser.m_ng_pwd_ctrl  --

-- START TABLE : sskadminuser.c_mail_adr_dupl  --
CREATE TABLE sskadminuser.c_mail_adr_dupl(
cust_no INT NOT NULL DEFAULT 0,
local_mail_adr VARCHAR(180),
mail_adr VARCHAR(180),
del_flg CHAR(1) NOT NULL DEFAULT '0',
update_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
register_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
update_user_cd VARCHAR(64) NOT NULL,
register_user_cd VARCHAR(64) NOT NULL,
CONSTRAINT pk_c_mail_adr_dupl PRIMARY KEY (cust_no,mail_adr)
);
-- ADD COLUMN
COMMENT ON TABLE sskadminuser.c_mail_adr_dupl IS 'メールアドレス重複管理';
COMMENT ON COLUMN sskadminuser.c_mail_adr_dupl.cust_no IS '会員番号';
COMMENT ON COLUMN sskadminuser.c_mail_adr_dupl.local_mail_adr IS 'ローカルメールアドレス';
COMMENT ON COLUMN sskadminuser.c_mail_adr_dupl.mail_adr IS 'メールアドレス';
COMMENT ON COLUMN sskadminuser.c_mail_adr_dupl.del_flg IS '削除フラグ';
COMMENT ON COLUMN sskadminuser.c_mail_adr_dupl.update_date IS '更新日時';
COMMENT ON COLUMN sskadminuser.c_mail_adr_dupl.register_date IS '登録日時';
COMMENT ON COLUMN sskadminuser.c_mail_adr_dupl.update_user_cd IS '更新者';
COMMENT ON COLUMN sskadminuser.c_mail_adr_dupl.register_user_cd IS '登録者';
-- CREATE INDEX 
CREATE INDEX idx_c_mail_adr_dupl_01 ON sskadminuser.c_mail_adr_dupl (cust_no,local_mail_adr,mail_adr);
CREATE INDEX idx_c_mail_adr_dupl_02 ON sskadminuser.c_mail_adr_dupl (local_mail_adr);
CREATE INDEX idx_c_mail_adr_dupl_03 ON sskadminuser.c_mail_adr_dupl (update_date,register_date);
-- END TABLE : sskadminuser.c_mail_adr_dupl  --

-- START TABLE : sskadminuser.m_notice  --
CREATE TABLE sskadminuser.m_notice(
notice_seq BIGINT NOT NULL,
site_kbn CHAR(1) NOT NULL,
category_kbn INT NOT NULL,
pub_kbn INT NOT NULL,
mbr_attr_cond_cd BIGINT NOT NULL,
disp_flg CHAR(1) NOT NULL DEFAULT '0',
campgn_flg CHAR(1) NOT NULL DEFAULT '0',
disp_start_dt_tm TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL,
disp_end_dt_tm TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL,
login_kbn CHAR(1) NOT NULL,
link_kbn CHAR(1) NOT NULL DEFAULT '0',
link_url VARCHAR(128),
img_disp_flg CHAR(1) NOT NULL DEFAULT '0',
img_explain_txt VARCHAR(32),
img_param_1 VARCHAR(32) DEFAULT '80',
img_param_2 VARCHAR(32),
title VARCHAR(512),
background_color VARCHAR(16),
txt_color VARCHAR(16),
link_txt_color VARCHAR(16),
in_target_link_txt_color VARCHAR(16),
visit_fin_link_txt_color VARCHAR(16),
scr_upper_txt VARCHAR(4000),
scr_lower_txt VARCHAR(4000),
update_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
register_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
update_user_cd VARCHAR(64) NOT NULL,
register_user_cd VARCHAR(64) NOT NULL,
rel_flg CHAR(1) DEFAULT '0',
important_flg CHAR(1) NOT NULL DEFAULT '0',
CONSTRAINT pk_m_notice PRIMARY KEY (notice_seq,site_kbn)
);
-- ADD COLUMN
COMMENT ON TABLE sskadminuser.m_notice IS 'お知らせ台帳';
COMMENT ON COLUMN sskadminuser.m_notice.notice_seq IS 'お知らせ連番';
COMMENT ON COLUMN sskadminuser.m_notice.site_kbn IS 'サイト区分';
COMMENT ON COLUMN sskadminuser.m_notice.category_kbn IS 'カテゴリ区分';
COMMENT ON COLUMN sskadminuser.m_notice.pub_kbn IS '掲載区分';
COMMENT ON COLUMN sskadminuser.m_notice.mbr_attr_cond_cd IS '会員属性条件コード';
COMMENT ON COLUMN sskadminuser.m_notice.disp_flg IS '表示フラグ';
COMMENT ON COLUMN sskadminuser.m_notice.campgn_flg IS 'キャンペーンフラグ';
COMMENT ON COLUMN sskadminuser.m_notice.disp_start_dt_tm IS '表示開始日時';
COMMENT ON COLUMN sskadminuser.m_notice.disp_end_dt_tm IS '表示終了日時';
COMMENT ON COLUMN sskadminuser.m_notice.login_kbn IS 'ログイン区分';
COMMENT ON COLUMN sskadminuser.m_notice.link_kbn IS 'リンク区分';
COMMENT ON COLUMN sskadminuser.m_notice.link_url IS 'リンクURL';
COMMENT ON COLUMN sskadminuser.m_notice.img_disp_flg IS '画像表示フラグ';
COMMENT ON COLUMN sskadminuser.m_notice.img_explain_txt IS '画像説明テキスト';
COMMENT ON COLUMN sskadminuser.m_notice.img_param_1 IS '画像パラメータ1';
COMMENT ON COLUMN sskadminuser.m_notice.img_param_2 IS '画像パラメータ2';
COMMENT ON COLUMN sskadminuser.m_notice.title IS 'タイトル';
COMMENT ON COLUMN sskadminuser.m_notice.background_color IS '背景色';
COMMENT ON COLUMN sskadminuser.m_notice.txt_color IS 'テキスト色';
COMMENT ON COLUMN sskadminuser.m_notice.link_txt_color IS 'リンクテキスト色';
COMMENT ON COLUMN sskadminuser.m_notice.in_target_link_txt_color IS 'ターゲット中リンクテキスト色';
COMMENT ON COLUMN sskadminuser.m_notice.visit_fin_link_txt_color IS '訪問済みリンクテキスト色';
COMMENT ON COLUMN sskadminuser.m_notice.scr_upper_txt IS '画面上部テキスト';
COMMENT ON COLUMN sskadminuser.m_notice.scr_lower_txt IS '画面下部テキスト';
COMMENT ON COLUMN sskadminuser.m_notice.update_date IS '更新日時';
COMMENT ON COLUMN sskadminuser.m_notice.register_date IS '登録日時';
COMMENT ON COLUMN sskadminuser.m_notice.update_user_cd IS '更新者';
COMMENT ON COLUMN sskadminuser.m_notice.register_user_cd IS '登録者';
COMMENT ON COLUMN sskadminuser.m_notice.rel_flg IS '解除フラグ';
COMMENT ON COLUMN sskadminuser.m_notice.important_flg IS '重要フラグ';
-- CREATE INDEX 
CREATE INDEX idx_m_notice_01 ON sskadminuser.m_notice (site_kbn,category_kbn,pub_kbn,mbr_attr_cond_cd,disp_flg,campgn_flg,disp_start_dt_tm,disp_end_dt_tm,login_kbn,link_kbn);
CREATE INDEX idx_m_notice_02 ON sskadminuser.m_notice (category_kbn,pub_kbn,mbr_attr_cond_cd,disp_flg,campgn_flg,disp_start_dt_tm,disp_end_dt_tm,login_kbn,link_kbn);
CREATE INDEX idx_m_notice_03 ON sskadminuser.m_notice (mbr_attr_cond_cd,disp_flg,campgn_flg,disp_start_dt_tm,disp_end_dt_tm,login_kbn,link_kbn);
CREATE INDEX idx_m_notice_04 ON sskadminuser.m_notice (disp_flg,campgn_flg,disp_start_dt_tm,disp_end_dt_tm,login_kbn,link_kbn);
CREATE INDEX idx_m_notice_05 ON sskadminuser.m_notice (campgn_flg,disp_start_dt_tm,disp_end_dt_tm,login_kbn,link_kbn);
CREATE INDEX idx_m_notice_06 ON sskadminuser.m_notice (disp_start_dt_tm,disp_end_dt_tm,login_kbn,link_kbn);
CREATE INDEX idx_m_notice_07 ON sskadminuser.m_notice (update_date,register_date);
-- END TABLE : sskadminuser.m_notice  --

-- START TABLE : sskadminuser.h_operat  --
CREATE TABLE sskadminuser.h_operat(
mbr_seq BIGINT NOT NULL,
proc_dt_tm TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
site_kbn CHAR(1) NOT NULL,
proc_kbn CHAR(2) NOT NULL,
session_id VARCHAR(100),
odr_cd BIGINT,
err_cd CHAR(3),
err_dtl VARCHAR(400),
sync_flg CHAR(1) NOT NULL DEFAULT '0',
update_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
register_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
update_user_cd VARCHAR(64) NOT NULL,
register_user_cd VARCHAR(64) NOT NULL,
hist_kbn CHAR(1),
sel_kbn CHAR(2),
sel_memo VARCHAR(400),
scr_kbn CHAR(2),
scr_name VARCHAR(100),
sel_memo_dtl VARCHAR(100),
route_dtl_kbn CHAR(2)
);
-- ADD COLUMN
COMMENT ON TABLE sskadminuser.h_operat IS '操作履歴';
COMMENT ON COLUMN sskadminuser.h_operat.mbr_seq IS '会員連番';
COMMENT ON COLUMN sskadminuser.h_operat.proc_dt_tm IS '処理日時';
COMMENT ON COLUMN sskadminuser.h_operat.site_kbn IS 'サイト区分';
COMMENT ON COLUMN sskadminuser.h_operat.proc_kbn IS '処理区分';
COMMENT ON COLUMN sskadminuser.h_operat.session_id IS 'セッションID';
COMMENT ON COLUMN sskadminuser.h_operat.odr_cd IS '注文コード';
COMMENT ON COLUMN sskadminuser.h_operat.err_cd IS 'エラーコード';
COMMENT ON COLUMN sskadminuser.h_operat.err_dtl IS 'エラー詳細';
COMMENT ON COLUMN sskadminuser.h_operat.sync_flg IS '同期フラグ';
COMMENT ON COLUMN sskadminuser.h_operat.update_date IS '更新日時';
COMMENT ON COLUMN sskadminuser.h_operat.register_date IS '登録日時';
COMMENT ON COLUMN sskadminuser.h_operat.update_user_cd IS '更新者';
COMMENT ON COLUMN sskadminuser.h_operat.register_user_cd IS '登録者';
COMMENT ON COLUMN sskadminuser.h_operat.hist_kbn IS '履歴区分';
COMMENT ON COLUMN sskadminuser.h_operat.sel_kbn IS '選択区分';
COMMENT ON COLUMN sskadminuser.h_operat.sel_memo IS '選択メモ';
COMMENT ON COLUMN sskadminuser.h_operat.scr_kbn IS '画面区分';
COMMENT ON COLUMN sskadminuser.h_operat.scr_name IS '画面名称';
COMMENT ON COLUMN sskadminuser.h_operat.sel_memo_dtl IS '選択メモ詳細';
COMMENT ON COLUMN sskadminuser.h_operat.route_dtl_kbn IS '経路詳細区分';
-- CREATE INDEX 
CREATE INDEX idx_h_operat_01 ON sskadminuser.h_operat (mbr_seq,proc_dt_tm,site_kbn);
CREATE INDEX idx_h_operat_02 ON sskadminuser.h_operat (sync_flg);
CREATE INDEX idx_h_operat_03 ON sskadminuser.h_operat (update_date,register_date);
-- END TABLE : sskadminuser.h_operat  --

-- START TABLE : sskadminuser.m_odr_hist_annotation_tgt_mbr  --
CREATE TABLE sskadminuser.m_odr_hist_annotation_tgt_mbr(
cust_no INT NOT NULL,
del_flg CHAR(1) NOT NULL DEFAULT '0',
update_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
register_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
update_user_cd VARCHAR(64),
register_user_cd VARCHAR(64),
CONSTRAINT pk_m_odr_hist_annotation_tgt_mbr PRIMARY KEY (cust_no)
);
-- ADD COLUMN
COMMENT ON TABLE sskadminuser.m_odr_hist_annotation_tgt_mbr IS '注文履歴注記対象会員台帳';
COMMENT ON COLUMN sskadminuser.m_odr_hist_annotation_tgt_mbr.cust_no IS '会員番号';
COMMENT ON COLUMN sskadminuser.m_odr_hist_annotation_tgt_mbr.del_flg IS '削除フラグ';
COMMENT ON COLUMN sskadminuser.m_odr_hist_annotation_tgt_mbr.update_date IS '更新日時';
COMMENT ON COLUMN sskadminuser.m_odr_hist_annotation_tgt_mbr.register_date IS '登録日時';
COMMENT ON COLUMN sskadminuser.m_odr_hist_annotation_tgt_mbr.update_user_cd IS '更新者';
COMMENT ON COLUMN sskadminuser.m_odr_hist_annotation_tgt_mbr.register_user_cd IS '登録者';
-- CREATE INDEX 
CREATE INDEX idx_m_odr_hist_annotation_tgt_mbr_01 ON sskadminuser.m_odr_hist_annotation_tgt_mbr (update_date,register_date);
-- END TABLE : sskadminuser.m_odr_hist_annotation_tgt_mbr  --

-- START TABLE : sskadminuser.m_care_calendar_ctrl  --
CREATE TABLE sskadminuser.m_care_calendar_ctrl(
enclos_cd CHAR(4) NOT NULL,
sheet_seq DECIMAL(38) NOT NULL,
cust_no INT NOT NULL,
cust_name VARCHAR(38),
ship_dt CHAR(8),
proc_no CHAR(10),
enclos_ver CHAR(1),
rcv_dt CHAR(8),
ocr_chk_flg CHAR(1),
img_file_cd VARCHAR(256),
core_sys_ftp_send_dt CHAR(8),
update_date TIMESTAMP(0) WITHOUT TIME ZONE,
sync_flg CHAR(1) NOT NULL DEFAULT '0',
app_sync_flg CHAR(1) NOT NULL DEFAULT '0',
CONSTRAINT pk_m_care_calendar_ctrl PRIMARY KEY (enclos_cd,sheet_seq,cust_no)
);
-- ADD COLUMN
COMMENT ON TABLE sskadminuser.m_care_calendar_ctrl IS 'お手当カレンダー管理台帳';
COMMENT ON COLUMN sskadminuser.m_care_calendar_ctrl.enclos_cd IS '同封物コード';
COMMENT ON COLUMN sskadminuser.m_care_calendar_ctrl.sheet_seq IS '用紙連番';
COMMENT ON COLUMN sskadminuser.m_care_calendar_ctrl.cust_no IS '会員番号';
COMMENT ON COLUMN sskadminuser.m_care_calendar_ctrl.cust_name IS '会員氏名';
COMMENT ON COLUMN sskadminuser.m_care_calendar_ctrl.ship_dt IS '発送日';
COMMENT ON COLUMN sskadminuser.m_care_calendar_ctrl.proc_no IS '処理番号';
COMMENT ON COLUMN sskadminuser.m_care_calendar_ctrl.enclos_ver IS '同封物バージョン';
COMMENT ON COLUMN sskadminuser.m_care_calendar_ctrl.rcv_dt IS '受信日';
COMMENT ON COLUMN sskadminuser.m_care_calendar_ctrl.ocr_chk_flg IS 'OCR確認フラグ ';
COMMENT ON COLUMN sskadminuser.m_care_calendar_ctrl.img_file_cd IS '画像ファイルコード';
COMMENT ON COLUMN sskadminuser.m_care_calendar_ctrl.core_sys_ftp_send_dt IS '基幹FTP送信日';
COMMENT ON COLUMN sskadminuser.m_care_calendar_ctrl.update_date IS '更新日時';
COMMENT ON COLUMN sskadminuser.m_care_calendar_ctrl.sync_flg IS '同期フラグ';
COMMENT ON COLUMN sskadminuser.m_care_calendar_ctrl.app_sync_flg IS 'アプリ同期フラグ';
-- CREATE INDEX 
CREATE INDEX idx_m_care_calendar_ctrl_01 ON sskadminuser.m_care_calendar_ctrl (cust_no);
CREATE INDEX idx_m_care_calendar_ctrl_02 ON sskadminuser.m_care_calendar_ctrl (app_sync_flg);
-- END TABLE : sskadminuser.m_care_calendar_ctrl  --

-- START TABLE : sskadminuser.m_care_calendar_charge  --
CREATE TABLE sskadminuser.m_care_calendar_charge(
key_cd INT NOT NULL,
charge_account VARCHAR(12),
session_id VARCHAR(200),
update_date TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT current_timestamp(0),
register_date TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT current_timestamp(0),
update_user_cd VARCHAR(64),
register_user_cd VARCHAR(64),
CONSTRAINT pk_m_care_calendar_charge PRIMARY KEY (key_cd)
);
-- ADD COLUMN
COMMENT ON TABLE sskadminuser.m_care_calendar_charge IS 'お手当カレンダー担当台帳';
COMMENT ON COLUMN sskadminuser.m_care_calendar_charge.key_cd IS 'キーコード';
COMMENT ON COLUMN sskadminuser.m_care_calendar_charge.charge_account IS '担当者アカウント';
COMMENT ON COLUMN sskadminuser.m_care_calendar_charge.session_id IS 'セッションID';
COMMENT ON COLUMN sskadminuser.m_care_calendar_charge.update_date IS '更新日時';
COMMENT ON COLUMN sskadminuser.m_care_calendar_charge.register_date IS '登録日時';
COMMENT ON COLUMN sskadminuser.m_care_calendar_charge.update_user_cd IS '更新者';
COMMENT ON COLUMN sskadminuser.m_care_calendar_charge.register_user_cd IS '登録者';
-- CREATE INDEX 
CREATE INDEX idx_m_care_calendar_charge_01 ON sskadminuser.m_care_calendar_charge (charge_account);
CREATE INDEX idx_m_care_calendar_charge_02 ON sskadminuser.m_care_calendar_charge (update_date,register_date);
-- END TABLE : sskadminuser.m_care_calendar_charge  --

-- START TABLE : sskadminuser.f_care_calendar_comment  --
CREATE TABLE sskadminuser.f_care_calendar_comment(
comment_cd BIGINT NOT NULL,
cust_no INT,
ctrl_scr_login_account VARCHAR(12),
calendar_cd BIGINT NOT NULL,
tgt_memo_record_dt TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL,
comment_record_dt_tm TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL,
comment_cont VARCHAR(400) NOT NULL,
session_id VARCHAR(200),
sync_flg CHAR(1) NOT NULL DEFAULT '0',
del_flg CHAR(1) NOT NULL DEFAULT '0',
update_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
register_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
update_user_cd VARCHAR(64),
register_user_cd VARCHAR(64),
CONSTRAINT pk_f_care_calendar_comment PRIMARY KEY (comment_cd)
);
-- ADD COLUMN
COMMENT ON TABLE sskadminuser.f_care_calendar_comment IS 'お手当カレンダーコメント伝票';
COMMENT ON COLUMN sskadminuser.f_care_calendar_comment.comment_cd IS 'コメントコード';
COMMENT ON COLUMN sskadminuser.f_care_calendar_comment.cust_no IS '会員番号';
COMMENT ON COLUMN sskadminuser.f_care_calendar_comment.ctrl_scr_login_account IS '管理画面ログインアカウント';
COMMENT ON COLUMN sskadminuser.f_care_calendar_comment.calendar_cd IS 'カレンダーコード';
COMMENT ON COLUMN sskadminuser.f_care_calendar_comment.tgt_memo_record_dt IS '対象のメモ記録日';
COMMENT ON COLUMN sskadminuser.f_care_calendar_comment.comment_record_dt_tm IS 'コメント記録日時';
COMMENT ON COLUMN sskadminuser.f_care_calendar_comment.comment_cont IS 'コメント内容';
COMMENT ON COLUMN sskadminuser.f_care_calendar_comment.session_id IS 'セッションID';
COMMENT ON COLUMN sskadminuser.f_care_calendar_comment.sync_flg IS '同期フラグ';
COMMENT ON COLUMN sskadminuser.f_care_calendar_comment.del_flg IS '削除フラグ';
COMMENT ON COLUMN sskadminuser.f_care_calendar_comment.update_date IS '更新日時';
COMMENT ON COLUMN sskadminuser.f_care_calendar_comment.register_date IS '登録日時';
COMMENT ON COLUMN sskadminuser.f_care_calendar_comment.update_user_cd IS '更新者';
COMMENT ON COLUMN sskadminuser.f_care_calendar_comment.register_user_cd IS '登録者';
-- CREATE INDEX 
CREATE INDEX idx_f_care_calendar_comment_01 ON sskadminuser.f_care_calendar_comment (calendar_cd);
CREATE INDEX idx_f_care_calendar_comment_02 ON sskadminuser.f_care_calendar_comment (tgt_memo_record_dt);
CREATE INDEX idx_f_care_calendar_comment_03 ON sskadminuser.f_care_calendar_comment (sync_flg);
CREATE INDEX idx_f_care_calendar_comment_04 ON sskadminuser.f_care_calendar_comment (del_flg);
CREATE INDEX idx_f_care_calendar_comment_05 ON sskadminuser.f_care_calendar_comment (register_date);
-- END TABLE : sskadminuser.f_care_calendar_comment  --

-- START TABLE : sskadminuser.f_care_calendar_achieve  --
CREATE TABLE sskadminuser.f_care_calendar_achieve(
care_calendar_cd BIGINT NOT NULL,
cust_no INT NOT NULL,
site_kbn CHAR(1),
achieve_comment VARCHAR(800),
feeling_chk_1 VARCHAR(400),
feeling_chk_2 VARCHAR(400),
feeling_chk_3 VARCHAR(400),
feeling_chk_4 VARCHAR(400),
feeling_chk_5 VARCHAR(400),
feeling_chk_6 VARCHAR(400),
feeling_chk_ans_kbn_1 CHAR(1),
feeling_chk_ans_kbn_2 CHAR(1),
feeling_chk_ans_kbn_3 CHAR(1),
feeling_chk_ans_kbn_4 CHAR(1),
feeling_chk_ans_kbn_5 CHAR(1),
feeling_chk_ans_kbn_6 CHAR(1),
another_adr_etc_entry_field VARCHAR(800),
sync_flg CHAR(1) NOT NULL,
session_id VARCHAR(200),
update_date TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT current_timestamp(0),
register_date TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT current_timestamp(0),
update_user_cd VARCHAR(64),
register_user_cd VARCHAR(64),
app_sync_flg CHAR(1) NOT NULL DEFAULT '0',
CONSTRAINT pk_f_care_calendar_achieve PRIMARY KEY (care_calendar_cd)
);
-- ADD COLUMN
COMMENT ON TABLE sskadminuser.f_care_calendar_achieve IS 'お手当カレンダー達成伝票';
COMMENT ON COLUMN sskadminuser.f_care_calendar_achieve.care_calendar_cd IS 'お手当カレンダーコード';
COMMENT ON COLUMN sskadminuser.f_care_calendar_achieve.cust_no IS '会員番号';
COMMENT ON COLUMN sskadminuser.f_care_calendar_achieve.site_kbn IS 'サイト区分';
COMMENT ON COLUMN sskadminuser.f_care_calendar_achieve.achieve_comment IS '達成コメント';
COMMENT ON COLUMN sskadminuser.f_care_calendar_achieve.feeling_chk_1 IS '実感チェック1';
COMMENT ON COLUMN sskadminuser.f_care_calendar_achieve.feeling_chk_2 IS '実感チェック2';
COMMENT ON COLUMN sskadminuser.f_care_calendar_achieve.feeling_chk_3 IS '実感チェック3';
COMMENT ON COLUMN sskadminuser.f_care_calendar_achieve.feeling_chk_4 IS '実感チェック4';
COMMENT ON COLUMN sskadminuser.f_care_calendar_achieve.feeling_chk_5 IS '実感チェック5';
COMMENT ON COLUMN sskadminuser.f_care_calendar_achieve.feeling_chk_6 IS '実感チェック6';
COMMENT ON COLUMN sskadminuser.f_care_calendar_achieve.feeling_chk_ans_kbn_1 IS '実感チェック回答区分1';
COMMENT ON COLUMN sskadminuser.f_care_calendar_achieve.feeling_chk_ans_kbn_2 IS '実感チェック回答区分2';
COMMENT ON COLUMN sskadminuser.f_care_calendar_achieve.feeling_chk_ans_kbn_3 IS '実感チェック回答区分3';
COMMENT ON COLUMN sskadminuser.f_care_calendar_achieve.feeling_chk_ans_kbn_4 IS '実感チェック回答区分4';
COMMENT ON COLUMN sskadminuser.f_care_calendar_achieve.feeling_chk_ans_kbn_5 IS '実感チェック回答区分5';
COMMENT ON COLUMN sskadminuser.f_care_calendar_achieve.feeling_chk_ans_kbn_6 IS '実感チェック回答区分6';
COMMENT ON COLUMN sskadminuser.f_care_calendar_achieve.another_adr_etc_entry_field IS '別住所等記入欄';
COMMENT ON COLUMN sskadminuser.f_care_calendar_achieve.sync_flg IS '同期フラグ';
COMMENT ON COLUMN sskadminuser.f_care_calendar_achieve.session_id IS 'セッションID';
COMMENT ON COLUMN sskadminuser.f_care_calendar_achieve.update_date IS '更新日時';
COMMENT ON COLUMN sskadminuser.f_care_calendar_achieve.register_date IS '登録日時';
COMMENT ON COLUMN sskadminuser.f_care_calendar_achieve.update_user_cd IS '更新者';
COMMENT ON COLUMN sskadminuser.f_care_calendar_achieve.register_user_cd IS '登録者';
COMMENT ON COLUMN sskadminuser.f_care_calendar_achieve.app_sync_flg IS 'アプリ同期フラグ';
-- CREATE INDEX 
CREATE INDEX idx_f_care_calendar_achieve_01 ON sskadminuser.f_care_calendar_achieve (cust_no);
CREATE INDEX idx_f_care_calendar_achieve_02 ON sskadminuser.f_care_calendar_achieve (app_sync_flg);
CREATE INDEX idx_f_care_calendar_achieve_03 ON sskadminuser.f_care_calendar_achieve (update_date,register_date);
-- END TABLE : sskadminuser.f_care_calendar_achieve  --

-- START TABLE : sskadminuser.h_care_calendar  --
CREATE TABLE sskadminuser.h_care_calendar(
care_calendar_cd BIGINT NOT NULL,
care_record_dt TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL,
cust_no INT NOT NULL,
site_kbn CHAR(1),
care_days INT NOT NULL,
skin_feeling_kbn CHAR(1),
comment VARCHAR(800),
condition_cd_1 CHAR(1),
condition_cd_2 CHAR(1),
condition_cd_3 CHAR(1),
condition_cd_4 CHAR(1),
condition_cd_5 CHAR(1),
condition_cd_6 CHAR(1),
memo VARCHAR(800),
sync_flg CHAR(1) NOT NULL,
session_id VARCHAR(200),
update_date TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT current_timestamp(0),
register_date TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT current_timestamp(0),
update_user_cd VARCHAR(64),
register_user_cd VARCHAR(64),
comment_chk_flg CHAR(1) DEFAULT '0',
app_sync_flg CHAR(1) NOT NULL DEFAULT '0',
CONSTRAINT pk_h_care_calendar PRIMARY KEY (care_calendar_cd,care_record_dt)
);
-- ADD COLUMN
COMMENT ON TABLE sskadminuser.h_care_calendar IS 'お手当カレンダー履歴';
COMMENT ON COLUMN sskadminuser.h_care_calendar.care_calendar_cd IS 'お手当カレンダーコード';
COMMENT ON COLUMN sskadminuser.h_care_calendar.care_record_dt IS 'お手当記録日';
COMMENT ON COLUMN sskadminuser.h_care_calendar.cust_no IS '会員番号';
COMMENT ON COLUMN sskadminuser.h_care_calendar.site_kbn IS 'サイト区分';
COMMENT ON COLUMN sskadminuser.h_care_calendar.care_days IS 'お手当日数';
COMMENT ON COLUMN sskadminuser.h_care_calendar.skin_feeling_kbn IS '肌実感区分';
COMMENT ON COLUMN sskadminuser.h_care_calendar.comment IS 'コメント';
COMMENT ON COLUMN sskadminuser.h_care_calendar.condition_cd_1 IS '体調コード1';
COMMENT ON COLUMN sskadminuser.h_care_calendar.condition_cd_2 IS '体調コード2';
COMMENT ON COLUMN sskadminuser.h_care_calendar.condition_cd_3 IS '体調コード3';
COMMENT ON COLUMN sskadminuser.h_care_calendar.condition_cd_4 IS '体調コード4';
COMMENT ON COLUMN sskadminuser.h_care_calendar.condition_cd_5 IS '体調コード5';
COMMENT ON COLUMN sskadminuser.h_care_calendar.condition_cd_6 IS '体調コード6';
COMMENT ON COLUMN sskadminuser.h_care_calendar.memo IS 'メモ';
COMMENT ON COLUMN sskadminuser.h_care_calendar.sync_flg IS '同期フラグ';
COMMENT ON COLUMN sskadminuser.h_care_calendar.session_id IS 'セッションID';
COMMENT ON COLUMN sskadminuser.h_care_calendar.update_date IS '更新日時';
COMMENT ON COLUMN sskadminuser.h_care_calendar.register_date IS '登録日時';
COMMENT ON COLUMN sskadminuser.h_care_calendar.update_user_cd IS '更新者';
COMMENT ON COLUMN sskadminuser.h_care_calendar.register_user_cd IS '登録者';
COMMENT ON COLUMN sskadminuser.h_care_calendar.comment_chk_flg IS 'コメントチェックフラグ';
COMMENT ON COLUMN sskadminuser.h_care_calendar.app_sync_flg IS 'アプリ同期フラグ';
-- CREATE INDEX 
CREATE INDEX idx_h_care_calendar_01 ON sskadminuser.h_care_calendar (comment_chk_flg);
CREATE INDEX idx_h_care_calendar_02 ON sskadminuser.h_care_calendar (cust_no);
CREATE INDEX idx_h_care_calendar_03 ON sskadminuser.h_care_calendar (app_sync_flg);
CREATE INDEX idx_h_care_calendar_04 ON sskadminuser.h_care_calendar (update_date,register_date);
-- END TABLE : sskadminuser.h_care_calendar  --

-- START TABLE : sskadminuser.c_care_calendar_redirect  --
CREATE TABLE sskadminuser.c_care_calendar_redirect(
cust_no INT NOT NULL,
fin_flg CHAR(1) NOT NULL,
update_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
register_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
update_user_cd VARCHAR(64) NOT NULL,
register_user_cd VARCHAR(64) NOT NULL,
CONSTRAINT pk_c_care_calendar_redirect PRIMARY KEY (cust_no)
);
-- ADD COLUMN
COMMENT ON TABLE sskadminuser.c_care_calendar_redirect IS 'お手当カレンダーリダイレクト管理';
COMMENT ON COLUMN sskadminuser.c_care_calendar_redirect.cust_no IS '会員番号';
COMMENT ON COLUMN sskadminuser.c_care_calendar_redirect.fin_flg IS '完了フラグ';
COMMENT ON COLUMN sskadminuser.c_care_calendar_redirect.update_date IS '更新日時';
COMMENT ON COLUMN sskadminuser.c_care_calendar_redirect.register_date IS '登録日時';
COMMENT ON COLUMN sskadminuser.c_care_calendar_redirect.update_user_cd IS '更新者';
COMMENT ON COLUMN sskadminuser.c_care_calendar_redirect.register_user_cd IS '登録者';
-- CREATE INDEX 
CREATE INDEX idx_c_care_calendar_redirect_01 ON sskadminuser.c_care_calendar_redirect (update_date,register_date);
-- END TABLE : sskadminuser.c_care_calendar_redirect  --

-- START TABLE : sskadminuser.m_care_calendar_set  --
CREATE TABLE sskadminuser.m_care_calendar_set(
care_calendar_cd BIGINT NOT NULL,
site_kbn CHAR(1),
skin_worry_cd_1 CHAR(1),
skin_worry_cd_2 CHAR(1),
skin_worry_cd_3 CHAR(1),
start_dt TIMESTAMP(0) WITHOUT TIME ZONE,
stat_kbn CHAR(1) DEFAULT '0',
support_mail_delivery_flg CHAR(1) DEFAULT '1',
scold_mail_delivery_flg CHAR(1) DEFAULT '1',
effect_sound_flg CHAR(1) DEFAULT '1',
cust_no INT NOT NULL,
del_flg CHAR(1) DEFAULT '0',
sync_flg CHAR(1) NOT NULL,
session_id VARCHAR(200),
update_date TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT current_timestamp(0),
register_date TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT current_timestamp(0),
update_user_cd VARCHAR(64),
register_user_cd VARCHAR(64),
app_sync_flg CHAR(1) NOT NULL DEFAULT '0',
CONSTRAINT pk_m_care_calendar_set PRIMARY KEY (care_calendar_cd)
);
-- ADD COLUMN
COMMENT ON TABLE sskadminuser.m_care_calendar_set IS 'お手当カレンダー設定台帳';
COMMENT ON COLUMN sskadminuser.m_care_calendar_set.care_calendar_cd IS 'お手当カレンダーコード';
COMMENT ON COLUMN sskadminuser.m_care_calendar_set.site_kbn IS 'サイト区分';
COMMENT ON COLUMN sskadminuser.m_care_calendar_set.skin_worry_cd_1 IS 'お肌の悩みコード1';
COMMENT ON COLUMN sskadminuser.m_care_calendar_set.skin_worry_cd_2 IS 'お肌の悩みコード2';
COMMENT ON COLUMN sskadminuser.m_care_calendar_set.skin_worry_cd_3 IS 'お肌の悩みコード3';
COMMENT ON COLUMN sskadminuser.m_care_calendar_set.start_dt IS '開始日';
COMMENT ON COLUMN sskadminuser.m_care_calendar_set.stat_kbn IS '状態区分';
COMMENT ON COLUMN sskadminuser.m_care_calendar_set.support_mail_delivery_flg IS 'サポートメール配信フラグ';
COMMENT ON COLUMN sskadminuser.m_care_calendar_set.scold_mail_delivery_flg IS 'お叱りメール配信フラグ';
COMMENT ON COLUMN sskadminuser.m_care_calendar_set.effect_sound_flg IS '効果音フラグ';
COMMENT ON COLUMN sskadminuser.m_care_calendar_set.cust_no IS '会員番号';
COMMENT ON COLUMN sskadminuser.m_care_calendar_set.del_flg IS '削除フラグ';
COMMENT ON COLUMN sskadminuser.m_care_calendar_set.sync_flg IS '同期フラグ';
COMMENT ON COLUMN sskadminuser.m_care_calendar_set.session_id IS 'セッションID';
COMMENT ON COLUMN sskadminuser.m_care_calendar_set.update_date IS '更新日時';
COMMENT ON COLUMN sskadminuser.m_care_calendar_set.register_date IS '登録日時';
COMMENT ON COLUMN sskadminuser.m_care_calendar_set.update_user_cd IS '更新者';
COMMENT ON COLUMN sskadminuser.m_care_calendar_set.register_user_cd IS '登録者';
COMMENT ON COLUMN sskadminuser.m_care_calendar_set.app_sync_flg IS 'アプリ同期フラグ';
-- CREATE INDEX 
CREATE UNIQUE INDEX idx_m_care_calendar_set_01 ON sskadminuser.m_care_calendar_set (cust_no);
CREATE INDEX idx_m_care_calendar_set_02 ON sskadminuser.m_care_calendar_set (cust_no,stat_kbn);
CREATE INDEX idx_m_care_calendar_set_03 ON sskadminuser.m_care_calendar_set (app_sync_flg);
CREATE INDEX idx_m_care_calendar_set_04 ON sskadminuser.m_care_calendar_set (update_date,register_date);
-- END TABLE : sskadminuser.m_care_calendar_set  --

-- START TABLE : sskadminuser.m_care_mail_delivery  --
CREATE TABLE sskadminuser.m_care_mail_delivery(
mail_delivery_cd BIGINT NOT NULL,
site_kbn CHAR(1),
mail_kbn CHAR(1) NOT NULL,
mail_delivery_dt TIMESTAMP(0) WITHOUT TIME ZONE,
care_calendar_cd BIGINT,
cust_no INT NOT NULL,
sync_flg CHAR(1) NOT NULL,
update_date TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT current_timestamp(0),
register_date TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT current_timestamp(0),
update_user_cd VARCHAR(64),
register_user_cd VARCHAR(64)
);
-- ADD COLUMN
COMMENT ON TABLE sskadminuser.m_care_mail_delivery IS 'お手当メール配信台帳';
COMMENT ON COLUMN sskadminuser.m_care_mail_delivery.mail_delivery_cd IS 'メール配信コード';
COMMENT ON COLUMN sskadminuser.m_care_mail_delivery.site_kbn IS 'サイト区分';
COMMENT ON COLUMN sskadminuser.m_care_mail_delivery.mail_kbn IS 'メール区分';
COMMENT ON COLUMN sskadminuser.m_care_mail_delivery.mail_delivery_dt IS 'メール配信日';
COMMENT ON COLUMN sskadminuser.m_care_mail_delivery.care_calendar_cd IS 'お手当カレンダーコード';
COMMENT ON COLUMN sskadminuser.m_care_mail_delivery.cust_no IS '会員番号';
COMMENT ON COLUMN sskadminuser.m_care_mail_delivery.sync_flg IS '同期フラグ';
COMMENT ON COLUMN sskadminuser.m_care_mail_delivery.update_date IS '更新日時';
COMMENT ON COLUMN sskadminuser.m_care_mail_delivery.register_date IS '登録日時';
COMMENT ON COLUMN sskadminuser.m_care_mail_delivery.update_user_cd IS '更新者';
COMMENT ON COLUMN sskadminuser.m_care_mail_delivery.register_user_cd IS '登録者';
-- CREATE INDEX 
CREATE INDEX idx_m_care_mail_delivery_01 ON sskadminuser.m_care_mail_delivery (update_date,register_date);
CREATE UNIQUE INDEX idx_m_care_mail_delivery_02 ON sskadminuser.m_care_mail_delivery (mail_delivery_cd,care_calendar_cd);
-- END TABLE : sskadminuser.m_care_mail_delivery  --

-- START TABLE : sskadminuser.m_care_msg_disp_cond  --
CREATE TABLE sskadminuser.m_care_msg_disp_cond(
care_msg_cd BIGINT NOT NULL,
msg_kbn CHAR(1),
disp_cond_days INT,
disp_cond_score_from INT,
disp_cond_score_upper INT,
his_flg CHAR(1),
care_msg VARCHAR(400),
del_flg CHAR(1) NOT NULL DEFAULT '0',
update_date TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT current_timestamp(0),
register_date TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT current_timestamp(0),
update_user_cd VARCHAR(64),
register_user_cd VARCHAR(64),
CONSTRAINT pk_m_care_msg_disp_cond PRIMARY KEY (care_msg_cd)
);
-- ADD COLUMN
COMMENT ON TABLE sskadminuser.m_care_msg_disp_cond IS 'お手当メッセージ表示条件台帳';
COMMENT ON COLUMN sskadminuser.m_care_msg_disp_cond.care_msg_cd IS 'お手当メッセージコード';
COMMENT ON COLUMN sskadminuser.m_care_msg_disp_cond.msg_kbn IS 'メッセージ区分';
COMMENT ON COLUMN sskadminuser.m_care_msg_disp_cond.disp_cond_days IS '表示条件日数';
COMMENT ON COLUMN sskadminuser.m_care_msg_disp_cond.disp_cond_score_from IS '表示条件スコア下限';
COMMENT ON COLUMN sskadminuser.m_care_msg_disp_cond.disp_cond_score_upper IS '表示条件スコア上限';
COMMENT ON COLUMN sskadminuser.m_care_msg_disp_cond.his_flg IS '本人フラグ';
COMMENT ON COLUMN sskadminuser.m_care_msg_disp_cond.care_msg IS 'お手当メッセージ';
COMMENT ON COLUMN sskadminuser.m_care_msg_disp_cond.del_flg IS '削除フラグ';
COMMENT ON COLUMN sskadminuser.m_care_msg_disp_cond.update_date IS '更新日時';
COMMENT ON COLUMN sskadminuser.m_care_msg_disp_cond.register_date IS '登録日時';
COMMENT ON COLUMN sskadminuser.m_care_msg_disp_cond.update_user_cd IS '更新者';
COMMENT ON COLUMN sskadminuser.m_care_msg_disp_cond.register_user_cd IS '登録者';
-- CREATE INDEX 
CREATE INDEX idx_m_care_msg_disp_cond_01 ON sskadminuser.m_care_msg_disp_cond (update_date,register_date);
-- END TABLE : sskadminuser.m_care_msg_disp_cond  --

-- START TABLE : sskadminuser.m_post_no  --
CREATE TABLE sskadminuser.m_post_no(
grp_cd VARCHAR(5) NOT NULL,
post_no_5_len CHAR(5) NOT NULL,
post_no_7_len CHAR(7) NOT NULL,
pref_kana_name VARCHAR(8) NOT NULL,
city_kana_name VARCHAR(25) NOT NULL,
town_area_kana_name VARCHAR(80) NOT NULL,
pref_name VARCHAR(8) NOT NULL,
city_name VARCHAR(22) NOT NULL,
town_area_name VARCHAR(74) NOT NULL,
flg_1 CHAR(1) NOT NULL,
flg_2 CHAR(1) NOT NULL,
flg_3 CHAR(1) NOT NULL,
flg_4 CHAR(1) NOT NULL,
flg_5 CHAR(1) NOT NULL,
flg_6 CHAR(1) NOT NULL,
town_area_kana_name_aft_proc VARCHAR(80) NOT NULL,
town_area_aft_proc VARCHAR(74) NOT NULL,
town_area_kana_name_key VARCHAR(80) NOT NULL,
file_idx VARCHAR(6) NOT NULL,
update_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
register_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
update_user_cd VARCHAR(64) NOT NULL,
register_user_cd VARCHAR(64) NOT NULL
);
-- ADD COLUMN
COMMENT ON TABLE sskadminuser.m_post_no IS '郵便番号台帳';
COMMENT ON COLUMN sskadminuser.m_post_no.grp_cd IS 'グループコード';
COMMENT ON COLUMN sskadminuser.m_post_no.post_no_5_len IS '郵便番号5桁';
COMMENT ON COLUMN sskadminuser.m_post_no.post_no_7_len IS '郵便番号7桁';
COMMENT ON COLUMN sskadminuser.m_post_no.pref_kana_name IS '都道府県カナ名';
COMMENT ON COLUMN sskadminuser.m_post_no.city_kana_name IS '市区町村カナ名';
COMMENT ON COLUMN sskadminuser.m_post_no.town_area_kana_name IS '町域カナ名';
COMMENT ON COLUMN sskadminuser.m_post_no.pref_name IS '都道府県名';
COMMENT ON COLUMN sskadminuser.m_post_no.city_name IS '市区町村名';
COMMENT ON COLUMN sskadminuser.m_post_no.town_area_name IS '町域名';
COMMENT ON COLUMN sskadminuser.m_post_no.flg_1 IS 'フラグ1';
COMMENT ON COLUMN sskadminuser.m_post_no.flg_2 IS 'フラグ2';
COMMENT ON COLUMN sskadminuser.m_post_no.flg_3 IS 'フラグ3';
COMMENT ON COLUMN sskadminuser.m_post_no.flg_4 IS 'フラグ4';
COMMENT ON COLUMN sskadminuser.m_post_no.flg_5 IS 'フラグ5';
COMMENT ON COLUMN sskadminuser.m_post_no.flg_6 IS 'フラグ6';
COMMENT ON COLUMN sskadminuser.m_post_no.town_area_kana_name_aft_proc IS '町域カナ名加工後';
COMMENT ON COLUMN sskadminuser.m_post_no.town_area_aft_proc IS '町域名加工後';
COMMENT ON COLUMN sskadminuser.m_post_no.town_area_kana_name_key IS '町域カナ名キー';
COMMENT ON COLUMN sskadminuser.m_post_no.file_idx IS 'ファイルインデックス';
COMMENT ON COLUMN sskadminuser.m_post_no.update_date IS '更新日時';
COMMENT ON COLUMN sskadminuser.m_post_no.register_date IS '登録日時';
COMMENT ON COLUMN sskadminuser.m_post_no.update_user_cd IS '更新者';
COMMENT ON COLUMN sskadminuser.m_post_no.register_user_cd IS '登録者';
-- CREATE INDEX 
CREATE INDEX idx_m_post_no_01 ON sskadminuser.m_post_no (grp_cd,post_no_5_len);
CREATE INDEX idx_m_post_no_02 ON sskadminuser.m_post_no (post_no_7_len);
CREATE INDEX idx_m_post_no_03 ON sskadminuser.m_post_no (pref_kana_name,city_kana_name,town_area_kana_name);
CREATE INDEX idx_m_post_no_04 ON sskadminuser.m_post_no (pref_name,city_name,town_area_name);
CREATE INDEX idx_m_post_no_05 ON sskadminuser.m_post_no (file_idx);
CREATE INDEX idx_m_post_no_06 ON sskadminuser.m_post_no (update_date,register_date);
-- END TABLE : sskadminuser.m_post_no  --

-- START TABLE : sskadminuser.f_prdbup_pwd_zero  --
CREATE TABLE sskadminuser.f_prdbup_pwd_zero(
site_kbn CHAR(1),
cust_no INT,
tel_no VARCHAR(64),
cust_name VARCHAR(84),
mail_adr VARCHAR(180),
mob_mail_adr VARCHAR(180),
net_mbr_cd VARCHAR(12),
pwd VARCHAR(108),
old_pwd VARCHAR(108),
update_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
register_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
update_user_cd VARCHAR(64),
register_user_cd VARCHAR(64)
);
-- ADD COLUMN
COMMENT ON TABLE sskadminuser.f_prdbup_pwd_zero IS 'PRDBUPパスワードゼロ障害検知伝票';
COMMENT ON COLUMN sskadminuser.f_prdbup_pwd_zero.site_kbn IS 'サイト区分';
COMMENT ON COLUMN sskadminuser.f_prdbup_pwd_zero.cust_no IS '会員番号';
COMMENT ON COLUMN sskadminuser.f_prdbup_pwd_zero.tel_no IS '電話番号';
COMMENT ON COLUMN sskadminuser.f_prdbup_pwd_zero.cust_name IS '会員氏名';
COMMENT ON COLUMN sskadminuser.f_prdbup_pwd_zero.mail_adr IS 'メールアドレス';
COMMENT ON COLUMN sskadminuser.f_prdbup_pwd_zero.mob_mail_adr IS '携帯メールアドレス';
COMMENT ON COLUMN sskadminuser.f_prdbup_pwd_zero.net_mbr_cd IS 'ネット会員コード';
COMMENT ON COLUMN sskadminuser.f_prdbup_pwd_zero.pwd IS 'パスワード';
COMMENT ON COLUMN sskadminuser.f_prdbup_pwd_zero.old_pwd IS '旧パスワード';
COMMENT ON COLUMN sskadminuser.f_prdbup_pwd_zero.update_date IS '更新日時';
COMMENT ON COLUMN sskadminuser.f_prdbup_pwd_zero.register_date IS '登録日時';
COMMENT ON COLUMN sskadminuser.f_prdbup_pwd_zero.update_user_cd IS '更新者';
COMMENT ON COLUMN sskadminuser.f_prdbup_pwd_zero.register_user_cd IS '登録者';
-- CREATE INDEX 
-- END TABLE : sskadminuser.f_prdbup_pwd_zero  --

-- START TABLE : sskadminuser.m_temp_net_mbr  --
CREATE TABLE sskadminuser.m_temp_net_mbr(
smpl_req_seq VARCHAR(32) NOT NULL,
site_kbn CHAR(1) NOT NULL,
net_mbr_cd VARCHAR(12) NOT NULL,
pwd VARCHAR(108) NOT NULL,
session_id VARCHAR(50),
update_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
register_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
update_user_cd VARCHAR(64) NOT NULL,
register_user_cd VARCHAR(64) NOT NULL,
CONSTRAINT pk_m_temp_net_mbr PRIMARY KEY (smpl_req_seq)
);
-- ADD COLUMN
COMMENT ON TABLE sskadminuser.m_temp_net_mbr IS '仮ネット会員台帳';
COMMENT ON COLUMN sskadminuser.m_temp_net_mbr.smpl_req_seq IS 'サンプル請求連番';
COMMENT ON COLUMN sskadminuser.m_temp_net_mbr.site_kbn IS 'サイト区分';
COMMENT ON COLUMN sskadminuser.m_temp_net_mbr.net_mbr_cd IS 'ネット会員コード';
COMMENT ON COLUMN sskadminuser.m_temp_net_mbr.pwd IS 'パスワード';
COMMENT ON COLUMN sskadminuser.m_temp_net_mbr.session_id IS 'セッションID';
COMMENT ON COLUMN sskadminuser.m_temp_net_mbr.update_date IS '更新日時';
COMMENT ON COLUMN sskadminuser.m_temp_net_mbr.register_date IS '登録日時';
COMMENT ON COLUMN sskadminuser.m_temp_net_mbr.update_user_cd IS '更新者';
COMMENT ON COLUMN sskadminuser.m_temp_net_mbr.register_user_cd IS '登録者';
-- CREATE INDEX 
CREATE UNIQUE INDEX idx_m_temp_net_mbr_01 ON sskadminuser.m_temp_net_mbr (net_mbr_cd);
CREATE INDEX idx_m_temp_net_mbr_02 ON sskadminuser.m_temp_net_mbr (update_date,register_date);
-- END TABLE : sskadminuser.m_temp_net_mbr  --

-- START TABLE : sskadminuser.c_front_media_g_tot_buy_item  --
CREATE TABLE sskadminuser.c_front_media_g_tot_buy_item(
g_tot_cd BIGINT NOT NULL,
buy_amnt INT NOT NULL,
buy_item VARCHAR(32) NOT NULL,
update_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
register_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
update_user_cd VARCHAR(64) NOT NULL,
register_user_cd VARCHAR(64) NOT NULL,
CONSTRAINT pk_c_front_media_g_tot_buy_item PRIMARY KEY (g_tot_cd)
);
-- ADD COLUMN
COMMENT ON TABLE sskadminuser.c_front_media_g_tot_buy_item IS '間口媒体累積購入商品管理';
COMMENT ON COLUMN sskadminuser.c_front_media_g_tot_buy_item.g_tot_cd IS '累積コード';
COMMENT ON COLUMN sskadminuser.c_front_media_g_tot_buy_item.buy_amnt IS '購入金額';
COMMENT ON COLUMN sskadminuser.c_front_media_g_tot_buy_item.buy_item IS '購入商品';
COMMENT ON COLUMN sskadminuser.c_front_media_g_tot_buy_item.update_date IS '更新日時';
COMMENT ON COLUMN sskadminuser.c_front_media_g_tot_buy_item.register_date IS '登録日時';
COMMENT ON COLUMN sskadminuser.c_front_media_g_tot_buy_item.update_user_cd IS '更新者';
COMMENT ON COLUMN sskadminuser.c_front_media_g_tot_buy_item.register_user_cd IS '登録者';
-- CREATE INDEX 
-- END TABLE : sskadminuser.c_front_media_g_tot_buy_item  --

-- START TABLE : sskadminuser.f_front_media_g_tot  --
CREATE TABLE sskadminuser.f_front_media_g_tot(
g_tot_seq BIGINT NOT NULL,
user_cd VARCHAR(10) NOT NULL,
net_mbr_cd VARCHAR(12),
cust_no INT,
visit_dt_tm TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL,
session_id VARCHAR(50),
referrer VARCHAR(1000),
user_agent VARCHAR(400),
user_agent_kbn VARCHAR(2),
visit_cnt INT NOT NULL,
bill_start_dt_tm TIMESTAMP(0) WITHOUT TIME ZONE,
bill_fin_dt_tm TIMESTAMP(0) WITHOUT TIME ZONE,
bill_kbn VARCHAR(2),
media_cd VARCHAR(8),
key_cd VARCHAR(6),
entry_trigger_cd VARCHAR(8),
entry_trigger_name VARCHAR(50),
update_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
register_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
update_user_cd VARCHAR(64) NOT NULL,
register_user_cd VARCHAR(64) NOT NULL,
promotion_cd VARCHAR(8),
google_click_cd VARCHAR(200),
CONSTRAINT pk_f_front_media_g_tot PRIMARY KEY (g_tot_seq)
);
-- ADD COLUMN
COMMENT ON TABLE sskadminuser.f_front_media_g_tot IS '間口媒体累積伝票';
COMMENT ON COLUMN sskadminuser.f_front_media_g_tot.g_tot_seq IS '累積連番';
COMMENT ON COLUMN sskadminuser.f_front_media_g_tot.user_cd IS 'ユーザコード';
COMMENT ON COLUMN sskadminuser.f_front_media_g_tot.net_mbr_cd IS 'ネット会員コード';
COMMENT ON COLUMN sskadminuser.f_front_media_g_tot.cust_no IS '会員番号';
COMMENT ON COLUMN sskadminuser.f_front_media_g_tot.visit_dt_tm IS '訪問日時';
COMMENT ON COLUMN sskadminuser.f_front_media_g_tot.session_id IS 'セッションID';
COMMENT ON COLUMN sskadminuser.f_front_media_g_tot.referrer IS 'リファラ';
COMMENT ON COLUMN sskadminuser.f_front_media_g_tot.user_agent IS 'ユーザエージェント';
COMMENT ON COLUMN sskadminuser.f_front_media_g_tot.user_agent_kbn IS 'ユーザエージェント区分';
COMMENT ON COLUMN sskadminuser.f_front_media_g_tot.visit_cnt IS '訪問回数';
COMMENT ON COLUMN sskadminuser.f_front_media_g_tot.bill_start_dt_tm IS '請求開始日時';
COMMENT ON COLUMN sskadminuser.f_front_media_g_tot.bill_fin_dt_tm IS '請求完了日時';
COMMENT ON COLUMN sskadminuser.f_front_media_g_tot.bill_kbn IS '請求区分';
COMMENT ON COLUMN sskadminuser.f_front_media_g_tot.media_cd IS '媒体コード';
COMMENT ON COLUMN sskadminuser.f_front_media_g_tot.key_cd IS 'キーコード';
COMMENT ON COLUMN sskadminuser.f_front_media_g_tot.entry_trigger_cd IS '申込のきっかけコード';
COMMENT ON COLUMN sskadminuser.f_front_media_g_tot.entry_trigger_name IS '申込のきっかけ名称';
COMMENT ON COLUMN sskadminuser.f_front_media_g_tot.update_date IS '更新日時';
COMMENT ON COLUMN sskadminuser.f_front_media_g_tot.register_date IS '登録日時';
COMMENT ON COLUMN sskadminuser.f_front_media_g_tot.update_user_cd IS '更新者';
COMMENT ON COLUMN sskadminuser.f_front_media_g_tot.register_user_cd IS '登録者';
COMMENT ON COLUMN sskadminuser.f_front_media_g_tot.promotion_cd IS 'プロモーションコード';
COMMENT ON COLUMN sskadminuser.f_front_media_g_tot.google_click_cd IS 'Googleクリックコード';
-- CREATE INDEX 
CREATE INDEX idx_f_front_media_g_tot_01 ON sskadminuser.f_front_media_g_tot (user_cd);
CREATE INDEX idx_f_front_media_g_tot_02 ON sskadminuser.f_front_media_g_tot (net_mbr_cd);
CREATE INDEX idx_f_front_media_g_tot_03 ON sskadminuser.f_front_media_g_tot (cust_no);
CREATE INDEX idx_f_front_media_g_tot_04 ON sskadminuser.f_front_media_g_tot (visit_dt_tm);
CREATE INDEX idx_f_front_media_g_tot_05 ON sskadminuser.f_front_media_g_tot (media_cd);
CREATE INDEX idx_f_front_media_g_tot_06 ON sskadminuser.f_front_media_g_tot (promotion_cd);
CREATE INDEX idx_f_front_media_g_tot_07 ON sskadminuser.f_front_media_g_tot (update_date,register_date);
-- END TABLE : sskadminuser.f_front_media_g_tot  --

-- START TABLE : sskadminuser.f_quesnr_ans_d  --
CREATE TABLE sskadminuser.f_quesnr_ans_d(
cust_no INT NOT NULL,
ptn_cd CHAR(5) NOT NULL,
question_cd CHAR(4) NOT NULL,
ans_cd CHAR(2),
ans_cont VARCHAR(2000),
disp_turn CHAR(3),
update_date TIMESTAMP(0) WITHOUT TIME ZONE,
register_date TIMESTAMP(0) WITHOUT TIME ZONE,
update_user_cd VARCHAR(64),
register_user_cd VARCHAR(64),
del_flg CHAR(1),
CONSTRAINT pk_f_quesnr_ans_d PRIMARY KEY (cust_no,ptn_cd,question_cd)
);
-- ADD COLUMN
COMMENT ON TABLE sskadminuser.f_quesnr_ans_d IS 'アンケート回答伝票明細';
COMMENT ON COLUMN sskadminuser.f_quesnr_ans_d.cust_no IS '会員番号';
COMMENT ON COLUMN sskadminuser.f_quesnr_ans_d.ptn_cd IS 'パターンコード';
COMMENT ON COLUMN sskadminuser.f_quesnr_ans_d.question_cd IS '質問コード';
COMMENT ON COLUMN sskadminuser.f_quesnr_ans_d.ans_cd IS '回答コード';
COMMENT ON COLUMN sskadminuser.f_quesnr_ans_d.ans_cont IS '回答内容';
COMMENT ON COLUMN sskadminuser.f_quesnr_ans_d.disp_turn IS '表示順';
COMMENT ON COLUMN sskadminuser.f_quesnr_ans_d.update_date IS '更新日時';
COMMENT ON COLUMN sskadminuser.f_quesnr_ans_d.register_date IS '登録日時';
COMMENT ON COLUMN sskadminuser.f_quesnr_ans_d.update_user_cd IS '更新者';
COMMENT ON COLUMN sskadminuser.f_quesnr_ans_d.register_user_cd IS '登録者';
COMMENT ON COLUMN sskadminuser.f_quesnr_ans_d.del_flg IS '削除フラグ';
-- CREATE INDEX 
CREATE INDEX idx_f_quesnr_ans_d_01 ON sskadminuser.f_quesnr_ans_d (cust_no);
CREATE INDEX idx_f_quesnr_ans_d_02 ON sskadminuser.f_quesnr_ans_d (update_date,register_date);
-- END TABLE : sskadminuser.f_quesnr_ans_d  --

-- START TABLE : sskadminuser.f_quesnr_ans_h  --
CREATE TABLE sskadminuser.f_quesnr_ans_h(
cust_no INT NOT NULL,
ptn_cd CHAR(5) NOT NULL,
ans_dt_tm TIMESTAMP(0) WITHOUT TIME ZONE,
update_date TIMESTAMP(0) WITHOUT TIME ZONE,
register_date TIMESTAMP(0) WITHOUT TIME ZONE,
update_user_cd VARCHAR(64),
register_user_cd VARCHAR(64),
del_flg CHAR(1),
CONSTRAINT pk_f_quesnr_ans_h PRIMARY KEY (cust_no,ptn_cd)
);
-- ADD COLUMN
COMMENT ON TABLE sskadminuser.f_quesnr_ans_h IS 'アンケート回答伝票ヘダー';
COMMENT ON COLUMN sskadminuser.f_quesnr_ans_h.cust_no IS '会員番号';
COMMENT ON COLUMN sskadminuser.f_quesnr_ans_h.ptn_cd IS 'パターンコード';
COMMENT ON COLUMN sskadminuser.f_quesnr_ans_h.ans_dt_tm IS '回答日時';
COMMENT ON COLUMN sskadminuser.f_quesnr_ans_h.update_date IS '更新日時';
COMMENT ON COLUMN sskadminuser.f_quesnr_ans_h.register_date IS '登録日時';
COMMENT ON COLUMN sskadminuser.f_quesnr_ans_h.update_user_cd IS '更新者';
COMMENT ON COLUMN sskadminuser.f_quesnr_ans_h.register_user_cd IS '登録者';
COMMENT ON COLUMN sskadminuser.f_quesnr_ans_h.del_flg IS '削除フラグ';
-- CREATE INDEX 
CREATE INDEX idx_f_quesnr_ans_h_01 ON sskadminuser.f_quesnr_ans_h (cust_no);
CREATE INDEX idx_f_quesnr_ans_h_02 ON sskadminuser.f_quesnr_ans_h (ans_dt_tm);
CREATE INDEX idx_f_quesnr_ans_h_03 ON sskadminuser.f_quesnr_ans_h (update_date,register_date);
-- END TABLE : sskadminuser.f_quesnr_ans_h  --

-- START TABLE : sskadminuser.f_rcv_mail_d  --
CREATE TABLE sskadminuser.f_rcv_mail_d(
act_mail_cd DOUBLE PRECISION NOT NULL,
mail_subject VARCHAR(256) NOT NULL,
mail_body_letter TEXT NOT NULL,
append_doc_name TEXT,
update_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
register_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
update_user_cd VARCHAR(64) NOT NULL,
register_user_cd VARCHAR(64) NOT NULL,
msg_cd VARCHAR(200),
reply_fin_msg_cd VARCHAR(200),
CONSTRAINT pk_f_rcv_mail_d PRIMARY KEY (act_mail_cd)
);
-- ADD COLUMN
COMMENT ON TABLE sskadminuser.f_rcv_mail_d IS '受信メール伝票明細';
COMMENT ON COLUMN sskadminuser.f_rcv_mail_d.act_mail_cd IS '対応メールコード';
COMMENT ON COLUMN sskadminuser.f_rcv_mail_d.mail_subject IS 'メール件名';
COMMENT ON COLUMN sskadminuser.f_rcv_mail_d.mail_body_letter IS 'メール本文';
COMMENT ON COLUMN sskadminuser.f_rcv_mail_d.append_doc_name IS '添付資料名';
COMMENT ON COLUMN sskadminuser.f_rcv_mail_d.update_date IS '更新日時';
COMMENT ON COLUMN sskadminuser.f_rcv_mail_d.register_date IS '登録日時';
COMMENT ON COLUMN sskadminuser.f_rcv_mail_d.update_user_cd IS '更新者';
COMMENT ON COLUMN sskadminuser.f_rcv_mail_d.register_user_cd IS '登録者';
COMMENT ON COLUMN sskadminuser.f_rcv_mail_d.msg_cd IS 'メッセージコード';
COMMENT ON COLUMN sskadminuser.f_rcv_mail_d.reply_fin_msg_cd IS '返信済メッセージコード';
-- CREATE INDEX 
CREATE INDEX idx_f_rcv_mail_d_01 ON sskadminuser.f_rcv_mail_d (update_date,register_date);
-- END TABLE : sskadminuser.f_rcv_mail_d  --

-- START TABLE : sskadminuser.f_odr_h  --
CREATE TABLE sskadminuser.f_odr_h(
odr_seq BIGINT NOT NULL,
site_kbn CHAR(1) NOT NULL,
cust_no INT NOT NULL,
tel_no VARCHAR(64) NOT NULL,
net_mbr_cd VARCHAR(12) NOT NULL,
acpt_dt_tm TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL,
acpt_tm VARCHAR(8) NOT NULL,
accumulation_point INT NOT NULL,
this_time_buy_point INT NOT NULL,
this_time_use_point INT NOT NULL DEFAULT 0,
pay_way_kbn CHAR(2) NOT NULL,
pay_cnt CHAR(2),
credit_card_corp CHAR(2),
credit_card_no CHAR(68),
credit_card_name CHAR(72),
bonus_kbn CHAR(1),
bonus_mth CHAR(2),
avail_term CHAR(6),
approval_no CHAR(7),
card_input_kbn CHAR(1),
ship_dt TIMESTAMP(0) WITHOUT TIME ZONE,
dlv_req_dt TIMESTAMP(0) WITHOUT TIME ZONE,
dlv_tm_kbn CHAR(2),
ship_att_cd_1 CHAR(6),
ship_att_cd_2 CHAR(6),
ship_att_cd_3 CHAR(6),
ship_att_cd_4 CHAR(6),
ship_att_cd_5 CHAR(6),
enclos_cd1 CHAR(6),
enclos_cd2 CHAR(6),
enclos_cd3 CHAR(6),
enclos_cd4 CHAR(6),
enclos_cd5 CHAR(6),
enclos_cd6 CHAR(6),
enclos_cd7 CHAR(6),
enclos_cd8 CHAR(6),
enclos_cd9 CHAR(6),
enclos_cd10 CHAR(6),
dlv_req_memo VARCHAR(400),
dlv_to_kbn CHAR(1),
other_adr VARCHAR(180),
other_non_chg_part VARCHAR(124),
other_adr_tel_no VARCHAR(64),
other_adr_post_no VARCHAR(8),
dlv_to_input_kbn CHAR(1),
cvs_rcv_site_odr_no VARCHAR(50),
barcd VARCHAR(13),
store_cd VARCHAR(6),
store_name VARCHAR(50),
store_item_rcv_start_dt TIMESTAMP(0) WITHOUT TIME ZONE,
store_item_rcv_end_dt TIMESTAMP(0) WITHOUT TIME ZONE,
odr_stat_kbn CHAR(1) NOT NULL DEFAULT '0',
del_flg CHAR(1) NOT NULL DEFAULT '0',
core_sys_kbn INT NOT NULL DEFAULT 0,
core_sys_send_dt_tm TIMESTAMP(0) WITHOUT TIME ZONE,
sync_flg CHAR(1) NOT NULL DEFAULT '0',
rcv_form_output_kbn CHAR(1) NOT NULL DEFAULT '0',
stat_kbn INT NOT NULL,
ship_mail_send_kbn CHAR(1) NOT NULL DEFAULT '0',
responder VARCHAR(10),
thank_mail_send_dt TIMESTAMP(0) WITHOUT TIME ZONE,
thank_mail_ctrl_no INT,
session_id VARCHAR(100) NOT NULL,
update_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
register_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
update_user_cd VARCHAR(64) NOT NULL,
register_user_cd VARCHAR(64) NOT NULL,
point_double_flg CHAR(1) DEFAULT '0',
mail_fixed_kbn CHAR(1) DEFAULT '0',
pend_cd CHAR(4),
modal_shift_flg CHAR(1),
card_approval_ctrl_seq VARCHAR(10),
country_cd VARCHAR(2),
overseas_to_name VARCHAR(124),
overseas_post_no VARCHAR(15),
overseas_adr_1 VARCHAR(124),
overseas_adr_2 VARCHAR(124),
overseas_adr_3 VARCHAR(124),
overseas_tel_no VARCHAR(72),
resrv_kbn CHAR(1),
gift_flg CHAR(1) NOT NULL DEFAULT '0',
ikusei_comment VARCHAR(400),
security_cd VARCHAR(52),
tot_odr_amnt INT,
tot_odr_tax INT,
reduction_kbn VARCHAR(2),
reduction_amnt INT,
reduction_amnt_tax INT,
use_fin_deposit INT,
carry_over_amnt INT,
mbr_seq BIGINT,
mbr_kbn CHAR(1),
route_dtl_kbn CHAR(2),
approval_use_card_kbn CHAR(2),
regular_entry_flg CHAR(1),
regular_dlv_interval_kbn CHAR(2),
regular_dlv_spcfy_dt CHAR(2),
regular_dlv_spcfy_weekly_kbn CHAR(2),
regular_dlv_spcfy_wday_kbn CHAR(2),
indiv_name_ship_kbn CHAR(3),
indiv_name_ship_sender_name VARCHAR(30),
CONSTRAINT pk_f_odr_h PRIMARY KEY (odr_seq)
);
-- ADD COLUMN
COMMENT ON TABLE sskadminuser.f_odr_h IS '注文伝票ヘダー';
COMMENT ON COLUMN sskadminuser.f_odr_h.odr_seq IS '注文連番';
COMMENT ON COLUMN sskadminuser.f_odr_h.site_kbn IS 'サイト区分';
COMMENT ON COLUMN sskadminuser.f_odr_h.cust_no IS '会員番号';
COMMENT ON COLUMN sskadminuser.f_odr_h.tel_no IS '電話番号';
COMMENT ON COLUMN sskadminuser.f_odr_h.net_mbr_cd IS 'ネット会員コード';
COMMENT ON COLUMN sskadminuser.f_odr_h.acpt_dt_tm IS '受付日時';
COMMENT ON COLUMN sskadminuser.f_odr_h.acpt_tm IS '受付時刻';
COMMENT ON COLUMN sskadminuser.f_odr_h.accumulation_point IS '積立ポイント';
COMMENT ON COLUMN sskadminuser.f_odr_h.this_time_buy_point IS '今回購入ポイント';
COMMENT ON COLUMN sskadminuser.f_odr_h.this_time_use_point IS '今回使用ポイント';
COMMENT ON COLUMN sskadminuser.f_odr_h.pay_way_kbn IS '支払方法区分';
COMMENT ON COLUMN sskadminuser.f_odr_h.pay_cnt IS '支払回数';
COMMENT ON COLUMN sskadminuser.f_odr_h.credit_card_corp IS 'クレジットカード会社';
COMMENT ON COLUMN sskadminuser.f_odr_h.credit_card_no IS 'クレジットカード番号';
COMMENT ON COLUMN sskadminuser.f_odr_h.credit_card_name IS 'クレジットカード名義人';
COMMENT ON COLUMN sskadminuser.f_odr_h.bonus_kbn IS 'ボーナス区分';
COMMENT ON COLUMN sskadminuser.f_odr_h.bonus_mth IS 'ボーナス月';
COMMENT ON COLUMN sskadminuser.f_odr_h.avail_term IS '有効期限';
COMMENT ON COLUMN sskadminuser.f_odr_h.approval_no IS '承認番号';
COMMENT ON COLUMN sskadminuser.f_odr_h.card_input_kbn IS 'カード登録区分';
COMMENT ON COLUMN sskadminuser.f_odr_h.ship_dt IS '発送日';
COMMENT ON COLUMN sskadminuser.f_odr_h.dlv_req_dt IS '配送希望日';
COMMENT ON COLUMN sskadminuser.f_odr_h.dlv_tm_kbn IS '配送時刻区分';
COMMENT ON COLUMN sskadminuser.f_odr_h.ship_att_cd_1 IS '発送注意コード1';
COMMENT ON COLUMN sskadminuser.f_odr_h.ship_att_cd_2 IS '発送注意コード2';
COMMENT ON COLUMN sskadminuser.f_odr_h.ship_att_cd_3 IS '発送注意コード3';
COMMENT ON COLUMN sskadminuser.f_odr_h.ship_att_cd_4 IS '発送注意コード4';
COMMENT ON COLUMN sskadminuser.f_odr_h.ship_att_cd_5 IS '発送注意コード5';
COMMENT ON COLUMN sskadminuser.f_odr_h.enclos_cd1 IS '同封物コード1';
COMMENT ON COLUMN sskadminuser.f_odr_h.enclos_cd2 IS '同封物コード2';
COMMENT ON COLUMN sskadminuser.f_odr_h.enclos_cd3 IS '同封物コード3';
COMMENT ON COLUMN sskadminuser.f_odr_h.enclos_cd4 IS '同封物コード4';
COMMENT ON COLUMN sskadminuser.f_odr_h.enclos_cd5 IS '同封物コード5';
COMMENT ON COLUMN sskadminuser.f_odr_h.enclos_cd6 IS '同封物コード6';
COMMENT ON COLUMN sskadminuser.f_odr_h.enclos_cd7 IS '同封物コード7';
COMMENT ON COLUMN sskadminuser.f_odr_h.enclos_cd8 IS '同封物コード8';
COMMENT ON COLUMN sskadminuser.f_odr_h.enclos_cd9 IS '同封物コード9';
COMMENT ON COLUMN sskadminuser.f_odr_h.enclos_cd10 IS '同封物コード10';
COMMENT ON COLUMN sskadminuser.f_odr_h.dlv_req_memo IS '配送要望メモ';
COMMENT ON COLUMN sskadminuser.f_odr_h.dlv_to_kbn IS '配送先区分';
COMMENT ON COLUMN sskadminuser.f_odr_h.other_adr IS 'その他住所';
COMMENT ON COLUMN sskadminuser.f_odr_h.other_non_chg_part IS 'その他非変換部';
COMMENT ON COLUMN sskadminuser.f_odr_h.other_adr_tel_no IS 'その他住所電話番号';
COMMENT ON COLUMN sskadminuser.f_odr_h.other_adr_post_no IS 'その他住所郵便番号';
COMMENT ON COLUMN sskadminuser.f_odr_h.dlv_to_input_kbn IS '配送先登録区分';
COMMENT ON COLUMN sskadminuser.f_odr_h.cvs_rcv_site_odr_no IS 'コンビニ受取サイト注文番号';
COMMENT ON COLUMN sskadminuser.f_odr_h.barcd IS 'バーコード';
COMMENT ON COLUMN sskadminuser.f_odr_h.store_cd IS '店舗コード';
COMMENT ON COLUMN sskadminuser.f_odr_h.store_name IS '店舗名称';
COMMENT ON COLUMN sskadminuser.f_odr_h.store_item_rcv_start_dt IS '店舗商品受取開始日';
COMMENT ON COLUMN sskadminuser.f_odr_h.store_item_rcv_end_dt IS '店舗商品受取終了日';
COMMENT ON COLUMN sskadminuser.f_odr_h.odr_stat_kbn IS '注文状況区分';
COMMENT ON COLUMN sskadminuser.f_odr_h.del_flg IS '削除フラグ';
COMMENT ON COLUMN sskadminuser.f_odr_h.core_sys_kbn IS '基幹区分';
COMMENT ON COLUMN sskadminuser.f_odr_h.core_sys_send_dt_tm IS '基幹送信日時';
COMMENT ON COLUMN sskadminuser.f_odr_h.sync_flg IS '同期フラグ';
COMMENT ON COLUMN sskadminuser.f_odr_h.rcv_form_output_kbn IS '受票出力区分';
COMMENT ON COLUMN sskadminuser.f_odr_h.stat_kbn IS '状態区分';
COMMENT ON COLUMN sskadminuser.f_odr_h.ship_mail_send_kbn IS '発送メール送信区分';
COMMENT ON COLUMN sskadminuser.f_odr_h.responder IS '対応者';
COMMENT ON COLUMN sskadminuser.f_odr_h.thank_mail_send_dt IS 'お礼メール送信日';
COMMENT ON COLUMN sskadminuser.f_odr_h.thank_mail_ctrl_no IS 'お礼メール管理番号';
COMMENT ON COLUMN sskadminuser.f_odr_h.session_id IS 'セッションID';
COMMENT ON COLUMN sskadminuser.f_odr_h.update_date IS '更新日時';
COMMENT ON COLUMN sskadminuser.f_odr_h.register_date IS '登録日時';
COMMENT ON COLUMN sskadminuser.f_odr_h.update_user_cd IS '更新者';
COMMENT ON COLUMN sskadminuser.f_odr_h.register_user_cd IS '登録者';
COMMENT ON COLUMN sskadminuser.f_odr_h.point_double_flg IS 'ポイント2倍フラグ';
COMMENT ON COLUMN sskadminuser.f_odr_h.mail_fixed_kbn IS 'メール定型区分';
COMMENT ON COLUMN sskadminuser.f_odr_h.pend_cd IS '保留コード';
COMMENT ON COLUMN sskadminuser.f_odr_h.modal_shift_flg IS 'モーダルシフトフラグ';
COMMENT ON COLUMN sskadminuser.f_odr_h.card_approval_ctrl_seq IS 'カード承認管理連番';
COMMENT ON COLUMN sskadminuser.f_odr_h.country_cd IS '国コード';
COMMENT ON COLUMN sskadminuser.f_odr_h.overseas_to_name IS '海外宛名';
COMMENT ON COLUMN sskadminuser.f_odr_h.overseas_post_no IS '海外郵便番号';
COMMENT ON COLUMN sskadminuser.f_odr_h.overseas_adr_1 IS '海外住所1';
COMMENT ON COLUMN sskadminuser.f_odr_h.overseas_adr_2 IS '海外住所2';
COMMENT ON COLUMN sskadminuser.f_odr_h.overseas_adr_3 IS '海外住所3';
COMMENT ON COLUMN sskadminuser.f_odr_h.overseas_tel_no IS '海外電話番号';
COMMENT ON COLUMN sskadminuser.f_odr_h.resrv_kbn IS '予約区分';
COMMENT ON COLUMN sskadminuser.f_odr_h.gift_flg IS '贈物フラグ';
COMMENT ON COLUMN sskadminuser.f_odr_h.ikusei_comment IS '育成コメント';
COMMENT ON COLUMN sskadminuser.f_odr_h.security_cd IS 'セキュリティコード';
COMMENT ON COLUMN sskadminuser.f_odr_h.tot_odr_amnt IS '合計注文金額';
COMMENT ON COLUMN sskadminuser.f_odr_h.tot_odr_tax IS '合計注文消費税';
COMMENT ON COLUMN sskadminuser.f_odr_h.reduction_kbn IS '還元区分';
COMMENT ON COLUMN sskadminuser.f_odr_h.reduction_amnt IS '還元金額';
COMMENT ON COLUMN sskadminuser.f_odr_h.reduction_amnt_tax IS '還元金額消費税';
COMMENT ON COLUMN sskadminuser.f_odr_h.use_fin_deposit IS '使用済預金';
COMMENT ON COLUMN sskadminuser.f_odr_h.carry_over_amnt IS '繰越金';
COMMENT ON COLUMN sskadminuser.f_odr_h.mbr_seq IS '会員連番';
COMMENT ON COLUMN sskadminuser.f_odr_h.mbr_kbn IS '会員区分';
COMMENT ON COLUMN sskadminuser.f_odr_h.route_dtl_kbn IS '経路詳細区分';
COMMENT ON COLUMN sskadminuser.f_odr_h.approval_use_card_kbn IS '承認使用カード区分';
COMMENT ON COLUMN sskadminuser.f_odr_h.regular_entry_flg IS '定期申込フラグ';
COMMENT ON COLUMN sskadminuser.f_odr_h.regular_dlv_interval_kbn IS '定期配送間隔区分';
COMMENT ON COLUMN sskadminuser.f_odr_h.regular_dlv_spcfy_dt IS '定期配達指定日';
COMMENT ON COLUMN sskadminuser.f_odr_h.regular_dlv_spcfy_weekly_kbn IS '定期配達指定週区分';
COMMENT ON COLUMN sskadminuser.f_odr_h.regular_dlv_spcfy_wday_kbn IS '定期配達指定曜日区分';
COMMENT ON COLUMN sskadminuser.f_odr_h.indiv_name_ship_kbn IS '個人名発送区分';
COMMENT ON COLUMN sskadminuser.f_odr_h.indiv_name_ship_sender_name IS '個人名発送差出人名';
-- CREATE INDEX 
CREATE INDEX idx_f_odr_h_01 ON sskadminuser.f_odr_h (site_kbn,cust_no,tel_no,net_mbr_cd);
CREATE INDEX idx_f_odr_h_02 ON sskadminuser.f_odr_h (acpt_dt_tm);
CREATE INDEX idx_f_odr_h_03 ON sskadminuser.f_odr_h (cust_no);
CREATE INDEX idx_f_odr_h_04 ON sskadminuser.f_odr_h (core_sys_kbn);
CREATE INDEX idx_f_odr_h_05 ON sskadminuser.f_odr_h (sync_flg,rcv_form_output_kbn);
CREATE INDEX idx_f_odr_h_06 ON sskadminuser.f_odr_h (update_date,register_date);
-- END TABLE : sskadminuser.f_odr_h  --

-- START TABLE : sskadminuser.f_odr_d  --
CREATE TABLE sskadminuser.f_odr_d(
odr_seq BIGINT NOT NULL,
item_cd VARCHAR(4) NOT NULL,
item_new_old_kbn CHAR(1) DEFAULT NULL,
num INT NOT NULL,
amnt INT NOT NULL,
cncl_flg CHAR(1) NOT NULL DEFAULT '0',
update_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
register_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
update_user_cd VARCHAR(64) NOT NULL,
register_user_cd VARCHAR(64) NOT NULL,
campgn_grp_cd VARCHAR(5),
campgn_cd VARCHAR(5),
item_lvl VARCHAR(2),
item_kbn CHAR(1) NOT NULL DEFAULT '1',
item_price_tax INT,
tax_rate_cd INT,
CONSTRAINT pk_f_odr_d PRIMARY KEY (odr_seq,item_cd)
);
-- ADD COLUMN
COMMENT ON TABLE sskadminuser.f_odr_d IS '注文伝票明細';
COMMENT ON COLUMN sskadminuser.f_odr_d.odr_seq IS '注文連番';
COMMENT ON COLUMN sskadminuser.f_odr_d.item_cd IS '商品コード';
COMMENT ON COLUMN sskadminuser.f_odr_d.item_new_old_kbn IS '商品新旧区分';
COMMENT ON COLUMN sskadminuser.f_odr_d.num IS '数';
COMMENT ON COLUMN sskadminuser.f_odr_d.amnt IS '金額';
COMMENT ON COLUMN sskadminuser.f_odr_d.cncl_flg IS 'キャンセルフラグ';
COMMENT ON COLUMN sskadminuser.f_odr_d.update_date IS '更新日時';
COMMENT ON COLUMN sskadminuser.f_odr_d.register_date IS '登録日時';
COMMENT ON COLUMN sskadminuser.f_odr_d.update_user_cd IS '更新者';
COMMENT ON COLUMN sskadminuser.f_odr_d.register_user_cd IS '登録者';
COMMENT ON COLUMN sskadminuser.f_odr_d.campgn_grp_cd IS 'キャンペーングループコード';
COMMENT ON COLUMN sskadminuser.f_odr_d.campgn_cd IS 'キャンペーンコード';
COMMENT ON COLUMN sskadminuser.f_odr_d.item_lvl IS '商品レベル';
COMMENT ON COLUMN sskadminuser.f_odr_d.item_kbn IS '商品区分';
COMMENT ON COLUMN sskadminuser.f_odr_d.item_price_tax IS '商品単価消費税';
COMMENT ON COLUMN sskadminuser.f_odr_d.tax_rate_cd IS '税率コード';
-- CREATE INDEX 
CREATE INDEX idx_f_odr_d_01 ON sskadminuser.f_odr_d (cncl_flg);
CREATE INDEX idx_f_odr_d_02 ON sskadminuser.f_odr_d (update_date,register_date);
-- END TABLE : sskadminuser.f_odr_d  --

-- START TABLE : sskadminuser.f_regular_buy_odr_info_record_h  --
CREATE TABLE sskadminuser.f_regular_buy_odr_info_record_h(
regular_buy_odr_seq BIGINT NOT NULL,
site_kbn CHAR(1) NOT NULL,
cust_no INT NOT NULL,
tel_no VARCHAR(64) NOT NULL,
net_mbr_cd VARCHAR(12) NOT NULL,
acpt_dt TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL,
acpt_tm VARCHAR(8) NOT NULL,
accumulation_point INT NOT NULL,
this_time_buy_point INT NOT NULL,
this_time_use_point INT NOT NULL DEFAULT 0,
pay_way_kbn CHAR(2) NOT NULL,
pay_cnt CHAR(2),
credit_card_corp CHAR(2),
credit_card_no CHAR(68),
credit_card_name CHAR(72),
avail_term CHAR(6),
approval_no CHAR(6),
card_input_kbn CHAR(1),
ship_dt TIMESTAMP(0) WITHOUT TIME ZONE,
dlv_req_dt TIMESTAMP(0) WITHOUT TIME ZONE,
dlv_tm_kbn CHAR(2),
ship_att_cd_1 CHAR(6),
ship_att_cd_3 CHAR(6),
ship_att_cd_4 CHAR(6),
ship_att_cd_5 CHAR(6),
dlv_req_memo VARCHAR(400),
dlv_to_kbn CHAR(1),
odr_stat_kbn CHAR(1) NOT NULL DEFAULT '0',
del_flg CHAR(1) NOT NULL DEFAULT '0',
core_sys_kbn INT NOT NULL DEFAULT 0,
core_sys_send_dt_tm TIMESTAMP(0) WITHOUT TIME ZONE,
sync_flg CHAR(1) NOT NULL DEFAULT '0',
rcv_form_output_kbn CHAR(1) NOT NULL DEFAULT '0',
stat_kbn INT NOT NULL,
ship_mail_send_kbn CHAR(1) NOT NULL DEFAULT '0',
responder VARCHAR(10),
thank_mail_send_dt TIMESTAMP(0) WITHOUT TIME ZONE,
thank_mail_ctrl_no INT,
session_id VARCHAR(100) NOT NULL,
update_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
register_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
update_user_cd VARCHAR(64) NOT NULL,
register_user_cd VARCHAR(64) NOT NULL,
point_double_flg CHAR(1),
mail_fixed_kbn CHAR(1) DEFAULT '0',
pend_cd CHAR(4),
card_approval_ctrl_seq VARCHAR(10),
security_cd VARCHAR(52),
tot_odr_amnt INT,
tot_odr_tax INT,
use_fin_deposit INT,
carry_over_amnt INT,
next_time_dlv_dt CHAR(2),
next_time_dlv_week CHAR(2),
next_time_dlv_wday_kbn CHAR(2),
route_dtl_kbn CHAR(2),
mbr_kbn CHAR(1),
CONSTRAINT pk_f_regular_buy_odr_info_record_h PRIMARY KEY (regular_buy_odr_seq)
);
-- ADD COLUMN
COMMENT ON TABLE sskadminuser.f_regular_buy_odr_info_record_h IS '定期購入注文情報記録伝票ヘダー';
COMMENT ON COLUMN sskadminuser.f_regular_buy_odr_info_record_h.regular_buy_odr_seq IS '定期購入注文連番';
COMMENT ON COLUMN sskadminuser.f_regular_buy_odr_info_record_h.site_kbn IS 'サイト区分';
COMMENT ON COLUMN sskadminuser.f_regular_buy_odr_info_record_h.cust_no IS '会員番号';
COMMENT ON COLUMN sskadminuser.f_regular_buy_odr_info_record_h.tel_no IS '電話番号';
COMMENT ON COLUMN sskadminuser.f_regular_buy_odr_info_record_h.net_mbr_cd IS 'ネット会員コード';
COMMENT ON COLUMN sskadminuser.f_regular_buy_odr_info_record_h.acpt_dt IS '受付日';
COMMENT ON COLUMN sskadminuser.f_regular_buy_odr_info_record_h.acpt_tm IS '受付時刻';
COMMENT ON COLUMN sskadminuser.f_regular_buy_odr_info_record_h.accumulation_point IS '積立ポイント';
COMMENT ON COLUMN sskadminuser.f_regular_buy_odr_info_record_h.this_time_buy_point IS '今回購入ポイント';
COMMENT ON COLUMN sskadminuser.f_regular_buy_odr_info_record_h.this_time_use_point IS '今回使用ポイント';
COMMENT ON COLUMN sskadminuser.f_regular_buy_odr_info_record_h.pay_way_kbn IS '支払方法区分';
COMMENT ON COLUMN sskadminuser.f_regular_buy_odr_info_record_h.pay_cnt IS '支払回数';
COMMENT ON COLUMN sskadminuser.f_regular_buy_odr_info_record_h.credit_card_corp IS 'クレジットカード会社';
COMMENT ON COLUMN sskadminuser.f_regular_buy_odr_info_record_h.credit_card_no IS 'クレジットカード番号';
COMMENT ON COLUMN sskadminuser.f_regular_buy_odr_info_record_h.credit_card_name IS 'クレジットカード名義人';
COMMENT ON COLUMN sskadminuser.f_regular_buy_odr_info_record_h.avail_term IS '有効期限';
COMMENT ON COLUMN sskadminuser.f_regular_buy_odr_info_record_h.approval_no IS '承認番号';
COMMENT ON COLUMN sskadminuser.f_regular_buy_odr_info_record_h.card_input_kbn IS 'カード登録区分';
COMMENT ON COLUMN sskadminuser.f_regular_buy_odr_info_record_h.ship_dt IS '発送日';
COMMENT ON COLUMN sskadminuser.f_regular_buy_odr_info_record_h.dlv_req_dt IS '配送希望日';
COMMENT ON COLUMN sskadminuser.f_regular_buy_odr_info_record_h.dlv_tm_kbn IS '配送時刻区分';
COMMENT ON COLUMN sskadminuser.f_regular_buy_odr_info_record_h.ship_att_cd_1 IS '発送注意コード1';
COMMENT ON COLUMN sskadminuser.f_regular_buy_odr_info_record_h.ship_att_cd_3 IS '発送注意コード3';
COMMENT ON COLUMN sskadminuser.f_regular_buy_odr_info_record_h.ship_att_cd_4 IS '発送注意コード4';
COMMENT ON COLUMN sskadminuser.f_regular_buy_odr_info_record_h.ship_att_cd_5 IS '発送注意コード5';
COMMENT ON COLUMN sskadminuser.f_regular_buy_odr_info_record_h.dlv_req_memo IS '配送要望メモ';
COMMENT ON COLUMN sskadminuser.f_regular_buy_odr_info_record_h.dlv_to_kbn IS '配送先区分';
COMMENT ON COLUMN sskadminuser.f_regular_buy_odr_info_record_h.odr_stat_kbn IS '注文状況区分';
COMMENT ON COLUMN sskadminuser.f_regular_buy_odr_info_record_h.del_flg IS '削除フラグ';
COMMENT ON COLUMN sskadminuser.f_regular_buy_odr_info_record_h.core_sys_kbn IS '基幹区分';
COMMENT ON COLUMN sskadminuser.f_regular_buy_odr_info_record_h.core_sys_send_dt_tm IS '基幹送信日時';
COMMENT ON COLUMN sskadminuser.f_regular_buy_odr_info_record_h.sync_flg IS '同期フラグ';
COMMENT ON COLUMN sskadminuser.f_regular_buy_odr_info_record_h.rcv_form_output_kbn IS '受票出力区分';
COMMENT ON COLUMN sskadminuser.f_regular_buy_odr_info_record_h.stat_kbn IS '状態区分';
COMMENT ON COLUMN sskadminuser.f_regular_buy_odr_info_record_h.ship_mail_send_kbn IS '発送メール送信区分';
COMMENT ON COLUMN sskadminuser.f_regular_buy_odr_info_record_h.responder IS '対応者';
COMMENT ON COLUMN sskadminuser.f_regular_buy_odr_info_record_h.thank_mail_send_dt IS 'お礼メール送信日';
COMMENT ON COLUMN sskadminuser.f_regular_buy_odr_info_record_h.thank_mail_ctrl_no IS 'お礼メール管理番号';
COMMENT ON COLUMN sskadminuser.f_regular_buy_odr_info_record_h.session_id IS 'セッションID';
COMMENT ON COLUMN sskadminuser.f_regular_buy_odr_info_record_h.update_date IS '更新日時';
COMMENT ON COLUMN sskadminuser.f_regular_buy_odr_info_record_h.register_date IS '登録日時';
COMMENT ON COLUMN sskadminuser.f_regular_buy_odr_info_record_h.update_user_cd IS '更新者';
COMMENT ON COLUMN sskadminuser.f_regular_buy_odr_info_record_h.register_user_cd IS '登録者';
COMMENT ON COLUMN sskadminuser.f_regular_buy_odr_info_record_h.point_double_flg IS 'ポイント2倍フラグ';
COMMENT ON COLUMN sskadminuser.f_regular_buy_odr_info_record_h.mail_fixed_kbn IS 'メール定型区分';
COMMENT ON COLUMN sskadminuser.f_regular_buy_odr_info_record_h.pend_cd IS '保留コード';
COMMENT ON COLUMN sskadminuser.f_regular_buy_odr_info_record_h.card_approval_ctrl_seq IS 'カード承認管理連番';
COMMENT ON COLUMN sskadminuser.f_regular_buy_odr_info_record_h.security_cd IS 'セキュリティコード';
COMMENT ON COLUMN sskadminuser.f_regular_buy_odr_info_record_h.tot_odr_amnt IS '合計注文金額';
COMMENT ON COLUMN sskadminuser.f_regular_buy_odr_info_record_h.tot_odr_tax IS '合計注文消費税';
COMMENT ON COLUMN sskadminuser.f_regular_buy_odr_info_record_h.use_fin_deposit IS '使用済預金';
COMMENT ON COLUMN sskadminuser.f_regular_buy_odr_info_record_h.carry_over_amnt IS '繰越金';
COMMENT ON COLUMN sskadminuser.f_regular_buy_odr_info_record_h.next_time_dlv_dt IS '次回配送日';
COMMENT ON COLUMN sskadminuser.f_regular_buy_odr_info_record_h.next_time_dlv_week IS '次回配送週';
COMMENT ON COLUMN sskadminuser.f_regular_buy_odr_info_record_h.next_time_dlv_wday_kbn IS '次回配送曜日区分';
COMMENT ON COLUMN sskadminuser.f_regular_buy_odr_info_record_h.route_dtl_kbn IS '経路詳細区分';
COMMENT ON COLUMN sskadminuser.f_regular_buy_odr_info_record_h.mbr_kbn IS '会員区分';
-- CREATE INDEX 
CREATE INDEX idx_f_regular_buy_odr_info_record_h_01 ON sskadminuser.f_regular_buy_odr_info_record_h (site_kbn,cust_no,tel_no,net_mbr_cd);
CREATE INDEX idx_f_regular_buy_odr_info_record_h_02 ON sskadminuser.f_regular_buy_odr_info_record_h (acpt_dt);
CREATE INDEX idx_f_regular_buy_odr_info_record_h_03 ON sskadminuser.f_regular_buy_odr_info_record_h (sync_flg,rcv_form_output_kbn);
CREATE INDEX idx_f_regular_buy_odr_info_record_h_04 ON sskadminuser.f_regular_buy_odr_info_record_h (update_date,register_date);
-- END TABLE : sskadminuser.f_regular_buy_odr_info_record_h  --

-- START TABLE : sskadminuser.f_regular_buy_odr_info_record_d  --
CREATE TABLE sskadminuser.f_regular_buy_odr_info_record_d(
regular_buy_odr_seq BIGINT NOT NULL,
item_cd VARCHAR(4) NOT NULL,
item_new_old_kbn CHAR(1) DEFAULT NULL,
num INT NOT NULL,
amnt INT NOT NULL,
cncl_flg CHAR(1) NOT NULL DEFAULT '0',
update_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
register_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
update_user_cd VARCHAR(64) NOT NULL,
register_user_cd VARCHAR(64) NOT NULL,
campgn_grp_cd VARCHAR(5),
campgn_cd VARCHAR(5),
item_lvl VARCHAR(2),
item_price_tax INT,
tax_rate_cd INT,
CONSTRAINT pk_f_regular_buy_odr_info_record_d PRIMARY KEY (regular_buy_odr_seq,item_cd)
);
-- ADD COLUMN
COMMENT ON TABLE sskadminuser.f_regular_buy_odr_info_record_d IS '定期購入注文情報記録伝票明細';
COMMENT ON COLUMN sskadminuser.f_regular_buy_odr_info_record_d.regular_buy_odr_seq IS '定期購入注文連番';
COMMENT ON COLUMN sskadminuser.f_regular_buy_odr_info_record_d.item_cd IS '商品コード';
COMMENT ON COLUMN sskadminuser.f_regular_buy_odr_info_record_d.item_new_old_kbn IS '商品新旧区分';
COMMENT ON COLUMN sskadminuser.f_regular_buy_odr_info_record_d.num IS '数';
COMMENT ON COLUMN sskadminuser.f_regular_buy_odr_info_record_d.amnt IS '金額';
COMMENT ON COLUMN sskadminuser.f_regular_buy_odr_info_record_d.cncl_flg IS 'キャンセルフラグ';
COMMENT ON COLUMN sskadminuser.f_regular_buy_odr_info_record_d.update_date IS '更新日時';
COMMENT ON COLUMN sskadminuser.f_regular_buy_odr_info_record_d.register_date IS '登録日時';
COMMENT ON COLUMN sskadminuser.f_regular_buy_odr_info_record_d.update_user_cd IS '更新者';
COMMENT ON COLUMN sskadminuser.f_regular_buy_odr_info_record_d.register_user_cd IS '登録者';
COMMENT ON COLUMN sskadminuser.f_regular_buy_odr_info_record_d.campgn_grp_cd IS 'キャンペーングループコード';
COMMENT ON COLUMN sskadminuser.f_regular_buy_odr_info_record_d.campgn_cd IS 'キャンペーンコード';
COMMENT ON COLUMN sskadminuser.f_regular_buy_odr_info_record_d.item_lvl IS '商品レベル';
COMMENT ON COLUMN sskadminuser.f_regular_buy_odr_info_record_d.item_price_tax IS '商品単価消費税';
COMMENT ON COLUMN sskadminuser.f_regular_buy_odr_info_record_d.tax_rate_cd IS '税率コード';
-- CREATE INDEX 
CREATE INDEX idx_f_regular_buy_odr_info_record_d_01 ON sskadminuser.f_regular_buy_odr_info_record_d (cncl_flg);
CREATE INDEX idx_f_regular_buy_odr_info_record_d_02 ON sskadminuser.f_regular_buy_odr_info_record_d (update_date,register_date);
-- END TABLE : sskadminuser.f_regular_buy_odr_info_record_d  --

-- START TABLE : sskadminuser.f_reminder_issue  --
CREATE TABLE sskadminuser.f_reminder_issue(
random_string VARCHAR(21) NOT NULL,
site_kbn CHAR(1) NOT NULL,
func_kbn VARCHAR(4) NOT NULL,
cust_no INT,
secret_question_no INT NOT NULL,
secret_question_ans VARCHAR(110) NOT NULL,
tsumugi_kbn VARCHAR(2) NOT NULL DEFAULT '0',
remind_effective_dt_tm TIMESTAMP(0) WITHOUT TIME ZONE,
auth_fail_cnt INT NOT NULL DEFAULT 0,
update_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
register_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
update_user_cd VARCHAR(64) NOT NULL,
register_user_cd VARCHAR(64) NOT NULL,
CONSTRAINT pk_f_reminder_issue PRIMARY KEY (random_string,site_kbn)
);
-- ADD COLUMN
COMMENT ON TABLE sskadminuser.f_reminder_issue IS 'リマインダ発行伝票';
COMMENT ON COLUMN sskadminuser.f_reminder_issue.random_string IS 'ランダム文字列';
COMMENT ON COLUMN sskadminuser.f_reminder_issue.site_kbn IS 'サイト区分';
COMMENT ON COLUMN sskadminuser.f_reminder_issue.func_kbn IS '機能区分';
COMMENT ON COLUMN sskadminuser.f_reminder_issue.cust_no IS '会員番号';
COMMENT ON COLUMN sskadminuser.f_reminder_issue.secret_question_no IS '秘密の質問番号';
COMMENT ON COLUMN sskadminuser.f_reminder_issue.secret_question_ans IS '秘密の質問の答え';
COMMENT ON COLUMN sskadminuser.f_reminder_issue.tsumugi_kbn IS 'つむぎ区分';
COMMENT ON COLUMN sskadminuser.f_reminder_issue.remind_effective_dt_tm IS 'リマインダ発効日時';
COMMENT ON COLUMN sskadminuser.f_reminder_issue.auth_fail_cnt IS '認証失敗回数';
COMMENT ON COLUMN sskadminuser.f_reminder_issue.update_date IS '更新日時';
COMMENT ON COLUMN sskadminuser.f_reminder_issue.register_date IS '登録日時';
COMMENT ON COLUMN sskadminuser.f_reminder_issue.update_user_cd IS '更新者';
COMMENT ON COLUMN sskadminuser.f_reminder_issue.register_user_cd IS '登録者';
-- CREATE INDEX 
CREATE INDEX idx_f_reminder_issue_01 ON sskadminuser.f_reminder_issue (random_string,site_kbn,func_kbn,cust_no);
CREATE INDEX idx_f_reminder_issue_02 ON sskadminuser.f_reminder_issue (secret_question_no,secret_question_ans);
CREATE INDEX idx_f_reminder_issue_03 ON sskadminuser.f_reminder_issue (update_date,register_date);
-- END TABLE : sskadminuser.f_reminder_issue  --

-- START TABLE : sskadminuser.c_odr_resrv  --
CREATE TABLE sskadminuser.c_odr_resrv(
odr_seq BIGINT NOT NULL,
resrv_kbn CHAR(1) NOT NULL DEFAULT '0',
resrv_info VARCHAR(800),
update_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
register_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
update_user_cd VARCHAR(64) NOT NULL,
register_user_cd VARCHAR(64) NOT NULL,
CONSTRAINT pk_c_odr_resrv PRIMARY KEY (odr_seq,resrv_kbn)
);
-- ADD COLUMN
COMMENT ON TABLE sskadminuser.c_odr_resrv IS '注文予約管理';
COMMENT ON COLUMN sskadminuser.c_odr_resrv.odr_seq IS '注文連番';
COMMENT ON COLUMN sskadminuser.c_odr_resrv.resrv_kbn IS '予約区分';
COMMENT ON COLUMN sskadminuser.c_odr_resrv.resrv_info IS '予約情報';
COMMENT ON COLUMN sskadminuser.c_odr_resrv.update_date IS '更新日時';
COMMENT ON COLUMN sskadminuser.c_odr_resrv.register_date IS '登録日時';
COMMENT ON COLUMN sskadminuser.c_odr_resrv.update_user_cd IS '更新者';
COMMENT ON COLUMN sskadminuser.c_odr_resrv.register_user_cd IS '登録者';
-- CREATE INDEX 
CREATE INDEX idx_c_odr_resrv_01 ON sskadminuser.c_odr_resrv (update_date,register_date);
-- END TABLE : sskadminuser.c_odr_resrv  --

-- START TABLE : sskadminuser.h_offline_odr_d  --
CREATE TABLE sskadminuser.h_offline_odr_d(
mbr_seq BIGINT NOT NULL,
proc_no VARCHAR(8) NOT NULL,
proc_dt TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL,
data_kbn CHAR(2) NOT NULL,
item_cd CHAR(4),
num INT,
item_flg CHAR(2),
update_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
register_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
update_user_cd VARCHAR(64) NOT NULL,
register_user_cd VARCHAR(64) NOT NULL,
item_price INT,
item_price_tax INT,
tax_rate_kbn VARCHAR(1),
CONSTRAINT pk_h_offline_odr_d PRIMARY KEY (mbr_seq,proc_no,proc_dt,data_kbn,item_cd,item_flg)
);
-- ADD COLUMN
COMMENT ON TABLE sskadminuser.h_offline_odr_d IS 'オフライン用注文履歴明細';
COMMENT ON COLUMN sskadminuser.h_offline_odr_d.mbr_seq IS '会員連番';
COMMENT ON COLUMN sskadminuser.h_offline_odr_d.proc_no IS '処理番号';
COMMENT ON COLUMN sskadminuser.h_offline_odr_d.proc_dt IS '処理日';
COMMENT ON COLUMN sskadminuser.h_offline_odr_d.data_kbn IS 'データ区分';
COMMENT ON COLUMN sskadminuser.h_offline_odr_d.item_cd IS '商品コード';
COMMENT ON COLUMN sskadminuser.h_offline_odr_d.num IS '数';
COMMENT ON COLUMN sskadminuser.h_offline_odr_d.item_flg IS '商品フラグ';
COMMENT ON COLUMN sskadminuser.h_offline_odr_d.update_date IS '更新日時';
COMMENT ON COLUMN sskadminuser.h_offline_odr_d.register_date IS '登録日時';
COMMENT ON COLUMN sskadminuser.h_offline_odr_d.update_user_cd IS '更新者';
COMMENT ON COLUMN sskadminuser.h_offline_odr_d.register_user_cd IS '登録者';
COMMENT ON COLUMN sskadminuser.h_offline_odr_d.item_price IS '商品単価';
COMMENT ON COLUMN sskadminuser.h_offline_odr_d.item_price_tax IS '商品単価消費税';
COMMENT ON COLUMN sskadminuser.h_offline_odr_d.tax_rate_kbn IS '消費税率区分';
-- CREATE INDEX 
-- END TABLE : sskadminuser.h_offline_odr_d  --

-- START TABLE : sskadminuser.h_offline_odr_h  --
CREATE TABLE sskadminuser.h_offline_odr_h(
mbr_seq BIGINT NOT NULL,
inq_proc_no VARCHAR(8) NOT NULL,
proc_no VARCHAR(8) NOT NULL,
proc_dt TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL,
data_kbn CHAR(2) NOT NULL,
odr_kbn CHAR(1),
pay_way_kbn CHAR(2),
pay_cnt INT,
plural_pay_flg CHAR(1),
non_arivd_kbn CHAR(1),
update_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
register_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
update_user_cd VARCHAR(64) NOT NULL,
register_user_cd VARCHAR(64) NOT NULL,
tot_odr_amnt INT,
tot_odr_tax INT,
tax_rate_kbn VARCHAR(1),
reduction_kbn VARCHAR(2),
reduction_amnt INT,
reduction_amnt_tax INT,
route_dtl_kbn CHAR(2),
CONSTRAINT pk_h_offline_odr_h PRIMARY KEY (mbr_seq,proc_no,proc_dt,data_kbn)
);
-- ADD COLUMN
COMMENT ON TABLE sskadminuser.h_offline_odr_h IS 'オフライン用注文履歴ヘダー';
COMMENT ON COLUMN sskadminuser.h_offline_odr_h.mbr_seq IS '会員連番';
COMMENT ON COLUMN sskadminuser.h_offline_odr_h.inq_proc_no IS '検索処理番号';
COMMENT ON COLUMN sskadminuser.h_offline_odr_h.proc_no IS '処理番号';
COMMENT ON COLUMN sskadminuser.h_offline_odr_h.proc_dt IS '処理日';
COMMENT ON COLUMN sskadminuser.h_offline_odr_h.data_kbn IS 'データ区分';
COMMENT ON COLUMN sskadminuser.h_offline_odr_h.odr_kbn IS '注文区分';
COMMENT ON COLUMN sskadminuser.h_offline_odr_h.pay_way_kbn IS '支払方法区分';
COMMENT ON COLUMN sskadminuser.h_offline_odr_h.pay_cnt IS '支払回数';
COMMENT ON COLUMN sskadminuser.h_offline_odr_h.plural_pay_flg IS '複数支払フラグ';
COMMENT ON COLUMN sskadminuser.h_offline_odr_h.non_arivd_kbn IS '未着区分';
COMMENT ON COLUMN sskadminuser.h_offline_odr_h.update_date IS '更新日時';
COMMENT ON COLUMN sskadminuser.h_offline_odr_h.register_date IS '登録日時';
COMMENT ON COLUMN sskadminuser.h_offline_odr_h.update_user_cd IS '更新者';
COMMENT ON COLUMN sskadminuser.h_offline_odr_h.register_user_cd IS '登録者';
COMMENT ON COLUMN sskadminuser.h_offline_odr_h.tot_odr_amnt IS '合計注文金額';
COMMENT ON COLUMN sskadminuser.h_offline_odr_h.tot_odr_tax IS '合計注文消費税';
COMMENT ON COLUMN sskadminuser.h_offline_odr_h.tax_rate_kbn IS '消費税率区分';
COMMENT ON COLUMN sskadminuser.h_offline_odr_h.reduction_kbn IS '還元区分';
COMMENT ON COLUMN sskadminuser.h_offline_odr_h.reduction_amnt IS '還元金額';
COMMENT ON COLUMN sskadminuser.h_offline_odr_h.reduction_amnt_tax IS '還元金額消費税';
COMMENT ON COLUMN sskadminuser.h_offline_odr_h.route_dtl_kbn IS '経路詳細区分';
-- CREATE INDEX 
CREATE INDEX idx_h_offline_odr_h_01 ON sskadminuser.h_offline_odr_h (mbr_seq,proc_dt);
CREATE INDEX idx_h_offline_odr_h_02 ON sskadminuser.h_offline_odr_h (inq_proc_no);
-- END TABLE : sskadminuser.h_offline_odr_h  --

-- START TABLE : sskadminuser.c_smpl_req_mobile_cd  --
CREATE TABLE sskadminuser.c_smpl_req_mobile_cd(
smpl_req_seq VARCHAR(32) NOT NULL,
site_kbn CHAR(1) NOT NULL,
indiv_id_no VARCHAR(32),
session_id VARCHAR(50),
update_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
register_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
update_user_cd VARCHAR(64) NOT NULL,
register_user_cd VARCHAR(64) NOT NULL,
CONSTRAINT pk_c_smpl_req_mobile_cd PRIMARY KEY (smpl_req_seq)
);
-- ADD COLUMN
COMMENT ON TABLE sskadminuser.c_smpl_req_mobile_cd IS 'サンプル請求モバイルコード管理';
COMMENT ON COLUMN sskadminuser.c_smpl_req_mobile_cd.smpl_req_seq IS 'サンプル請求連番';
COMMENT ON COLUMN sskadminuser.c_smpl_req_mobile_cd.site_kbn IS 'サイト区分';
COMMENT ON COLUMN sskadminuser.c_smpl_req_mobile_cd.indiv_id_no IS '個体識別番号';
COMMENT ON COLUMN sskadminuser.c_smpl_req_mobile_cd.session_id IS 'セッションID';
COMMENT ON COLUMN sskadminuser.c_smpl_req_mobile_cd.update_date IS '更新日時';
COMMENT ON COLUMN sskadminuser.c_smpl_req_mobile_cd.register_date IS '登録日時';
COMMENT ON COLUMN sskadminuser.c_smpl_req_mobile_cd.update_user_cd IS '更新者';
COMMENT ON COLUMN sskadminuser.c_smpl_req_mobile_cd.register_user_cd IS '登録者';
-- CREATE INDEX 
CREATE INDEX idx_c_smpl_req_mobile_cd_01 ON sskadminuser.c_smpl_req_mobile_cd (indiv_id_no);
CREATE INDEX idx_c_smpl_req_mobile_cd_02 ON sskadminuser.c_smpl_req_mobile_cd (update_date,register_date);
-- END TABLE : sskadminuser.c_smpl_req_mobile_cd  --

-- START TABLE : sskadminuser.f_smpl_req  --
CREATE TABLE sskadminuser.f_smpl_req(
smpl_req_seq VARCHAR(32) NOT NULL,
site_kbn CHAR(1) NOT NULL,
acpt_dt_tm TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
rcv_kbn CHAR(1) NOT NULL DEFAULT '1',
tel_no VARCHAR(64),
mail_adr VARCHAR(180),
core_sys_acpt_dt_tm TIMESTAMP(0) WITHOUT TIME ZONE,
core_sys_acpt_tm VARCHAR(8),
cust_name_kana VARCHAR(92),
cust_name VARCHAR(104),
sex_kbn CHAR(1),
post_no VARCHAR(8),
kana_adr VARCHAR(124),
adr VARCHAR(180),
adr_non_chg_part VARCHAR(124),
adr_non_chg_part_kana VARCHAR(124),
pref_cd CHAR(2),
job_cd CHAR(2),
daytime_in_home_kbn CHAR(1),
back_req_dt VARCHAR(8),
back_kbn CHAR(1),
worry_kbn_1 CHAR(2) DEFAULT '00',
worry_kbn_2 CHAR(2) DEFAULT '00',
worry_kbn_3 CHAR(2) DEFAULT '00',
worry_kbn_4 CHAR(2) DEFAULT '00',
worry_kbn_5 CHAR(2) DEFAULT '00',
worry_kbn_6 CHAR(2) DEFAULT '00',
worry_kbn_7 CHAR(2) DEFAULT '00',
worry_kbn_8 CHAR(2) DEFAULT '00',
worry_kbn_9 CHAR(2) DEFAULT '00',
worry_kbn_10 CHAR(2) DEFAULT '00',
skin_type_kbn CHAR(1),
sensitive_skin_kbn CHAR(1),
atopi_kbn CHAR(1) DEFAULT '0',
era_kbn CHAR(1),
birthday VARCHAR(56),
media_cd VARCHAR(8),
inq_keyword VARCHAR(6),
worry_comment VARCHAR(800),
dlv_comment VARCHAR(1000),
skin_comment VARCHAR(800),
blood_press_upper VARCHAR(3),
blood_press_from VARCHAR(3),
ship_stat_kbn CHAR(1) NOT NULL DEFAULT '0',
del_kbn CHAR(1) NOT NULL DEFAULT '0',
rcv_form_output_kbn CHAR(1) NOT NULL DEFAULT '0',
core_sys_send_rslt_flg CHAR(1),
core_sys_flg CHAR(3) NOT NULL DEFAULT '0',
sync_flg CHAR(1) NOT NULL DEFAULT '0',
dupl_flg CHAR(1) NOT NULL DEFAULT '0',
session_id VARCHAR(50),
update_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
register_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
update_user_cd VARCHAR(64) NOT NULL,
register_user_cd VARCHAR(64) NOT NULL,
media_cd_2 VARCHAR(8),
inq_keyword_2 VARCHAR(5),
agree_flg CHAR(1),
allergy_comment VARCHAR(800),
pain_part_1 CHAR(2),
pain_part_2 CHAR(2),
pain_part_3 CHAR(2),
pain_part_4 CHAR(2),
pain_part_5 CHAR(2),
pain_part_6 CHAR(2),
pain_part_7 CHAR(2),
pain_part_8 CHAR(2),
pain_part_9 CHAR(2),
pain_part_10 CHAR(2),
pain_start_season_kbn CHAR(2),
pain_except_therapy_1 CHAR(2),
pain_except_therapy_2 CHAR(2),
pain_except_therapy_3 CHAR(2),
pain_except_therapy_4 CHAR(2),
pain_except_therapy_5 CHAR(2),
pain_except_therapy_6 CHAR(2),
pain_except_therapy_7 CHAR(2),
pain_except_therapy_8 CHAR(2),
pain_except_therapy_9 CHAR(2),
pain_except_therapy_10 CHAR(2),
diagnosis_name_symptom VARCHAR(800),
entry_trigger_name VARCHAR(50),
talk_language_kbn CHAR(3),
read_write_language_kbn CHAR(3),
worry_season_kbn CHAR(2),
care_way_kbn_1 CHAR(2),
care_way_kbn_2 CHAR(2),
care_way_kbn_3 CHAR(2),
care_way_kbn_4 CHAR(2),
care_way_kbn_5 CHAR(2),
care_way_kbn_6 CHAR(2),
care_way_kbn_7 CHAR(2),
care_way_kbn_8 CHAR(2),
care_way_kbn_9 CHAR(2),
care_way_kbn_10 CHAR(2),
mob_tel_no VARCHAR(64),
entry_trigger_cd VARCHAR(8) DEFAULT NULL,
mob_tel_prior_flg CHAR(1),
mbr_seq BIGINT,
temp_mbr_no INT,
smpl_req_no DECIMAL(20),
route_dtl_kbn CHAR(2),
care_way_comment VARCHAR(400),
cosme_opt_in_kbn CHAR(1),
herb_optin_kbn CHAR(1),
entry_trigger_dtl_comment VARCHAR(800),
cust_barcd VARCHAR(13),
CONSTRAINT pk_f_smpl_req PRIMARY KEY (smpl_req_seq)
);
-- ADD COLUMN
COMMENT ON TABLE sskadminuser.f_smpl_req IS 'サンプル請求伝票';
COMMENT ON COLUMN sskadminuser.f_smpl_req.smpl_req_seq IS 'サンプル請求連番';
COMMENT ON COLUMN sskadminuser.f_smpl_req.site_kbn IS 'サイト区分';
COMMENT ON COLUMN sskadminuser.f_smpl_req.acpt_dt_tm IS '受付日時';
COMMENT ON COLUMN sskadminuser.f_smpl_req.rcv_kbn IS '受け区分';
COMMENT ON COLUMN sskadminuser.f_smpl_req.tel_no IS '電話番号';
COMMENT ON COLUMN sskadminuser.f_smpl_req.mail_adr IS 'メールアドレス';
COMMENT ON COLUMN sskadminuser.f_smpl_req.core_sys_acpt_dt_tm IS '基幹受付日時';
COMMENT ON COLUMN sskadminuser.f_smpl_req.core_sys_acpt_tm IS '基幹受付時刻';
COMMENT ON COLUMN sskadminuser.f_smpl_req.cust_name_kana IS '会員氏名カナ';
COMMENT ON COLUMN sskadminuser.f_smpl_req.cust_name IS '会員氏名';
COMMENT ON COLUMN sskadminuser.f_smpl_req.sex_kbn IS '性別区分';
COMMENT ON COLUMN sskadminuser.f_smpl_req.post_no IS '郵便番号';
COMMENT ON COLUMN sskadminuser.f_smpl_req.kana_adr IS 'カナ住所';
COMMENT ON COLUMN sskadminuser.f_smpl_req.adr IS '住所';
COMMENT ON COLUMN sskadminuser.f_smpl_req.adr_non_chg_part IS '住所非変換部';
COMMENT ON COLUMN sskadminuser.f_smpl_req.adr_non_chg_part_kana IS '住所非変換部カナ';
COMMENT ON COLUMN sskadminuser.f_smpl_req.pref_cd IS '県コード';
COMMENT ON COLUMN sskadminuser.f_smpl_req.job_cd IS '職業コード';
COMMENT ON COLUMN sskadminuser.f_smpl_req.daytime_in_home_kbn IS '昼間在宅区分';
COMMENT ON COLUMN sskadminuser.f_smpl_req.back_req_dt IS '折返希望日';
COMMENT ON COLUMN sskadminuser.f_smpl_req.back_kbn IS '折返区分';
COMMENT ON COLUMN sskadminuser.f_smpl_req.worry_kbn_1 IS '悩み区分1';
COMMENT ON COLUMN sskadminuser.f_smpl_req.worry_kbn_2 IS '悩み区分2';
COMMENT ON COLUMN sskadminuser.f_smpl_req.worry_kbn_3 IS '悩み区分3';
COMMENT ON COLUMN sskadminuser.f_smpl_req.worry_kbn_4 IS '悩み区分4';
COMMENT ON COLUMN sskadminuser.f_smpl_req.worry_kbn_5 IS '悩み区分5';
COMMENT ON COLUMN sskadminuser.f_smpl_req.worry_kbn_6 IS '悩み区分6';
COMMENT ON COLUMN sskadminuser.f_smpl_req.worry_kbn_7 IS '悩み区分7';
COMMENT ON COLUMN sskadminuser.f_smpl_req.worry_kbn_8 IS '悩み区分8';
COMMENT ON COLUMN sskadminuser.f_smpl_req.worry_kbn_9 IS '悩み区分9';
COMMENT ON COLUMN sskadminuser.f_smpl_req.worry_kbn_10 IS '悩み区分10';
COMMENT ON COLUMN sskadminuser.f_smpl_req.skin_type_kbn IS '肌質区分';
COMMENT ON COLUMN sskadminuser.f_smpl_req.sensitive_skin_kbn IS '敏感肌区分';
COMMENT ON COLUMN sskadminuser.f_smpl_req.atopi_kbn IS 'アトピー区分';
COMMENT ON COLUMN sskadminuser.f_smpl_req.era_kbn IS '年号区分';
COMMENT ON COLUMN sskadminuser.f_smpl_req.birthday IS '生年月日';
COMMENT ON COLUMN sskadminuser.f_smpl_req.media_cd IS '媒体コード';
COMMENT ON COLUMN sskadminuser.f_smpl_req.inq_keyword IS '検索キーワード';
COMMENT ON COLUMN sskadminuser.f_smpl_req.worry_comment IS '悩みコメント';
COMMENT ON COLUMN sskadminuser.f_smpl_req.dlv_comment IS '配送コメント';
COMMENT ON COLUMN sskadminuser.f_smpl_req.skin_comment IS '肌コメント';
COMMENT ON COLUMN sskadminuser.f_smpl_req.blood_press_upper IS '血圧上限';
COMMENT ON COLUMN sskadminuser.f_smpl_req.blood_press_from IS '血圧下限';
COMMENT ON COLUMN sskadminuser.f_smpl_req.ship_stat_kbn IS '発送状態区分';
COMMENT ON COLUMN sskadminuser.f_smpl_req.del_kbn IS '削除区分';
COMMENT ON COLUMN sskadminuser.f_smpl_req.rcv_form_output_kbn IS '受票出力区分';
COMMENT ON COLUMN sskadminuser.f_smpl_req.core_sys_send_rslt_flg IS '基幹送信結果フラグ';
COMMENT ON COLUMN sskadminuser.f_smpl_req.core_sys_flg IS '基幹フラグ';
COMMENT ON COLUMN sskadminuser.f_smpl_req.sync_flg IS '同期フラグ';
COMMENT ON COLUMN sskadminuser.f_smpl_req.dupl_flg IS '重複フラグ';
COMMENT ON COLUMN sskadminuser.f_smpl_req.session_id IS 'セッションID';
COMMENT ON COLUMN sskadminuser.f_smpl_req.update_date IS '更新日時';
COMMENT ON COLUMN sskadminuser.f_smpl_req.register_date IS '登録日時';
COMMENT ON COLUMN sskadminuser.f_smpl_req.update_user_cd IS '更新者';
COMMENT ON COLUMN sskadminuser.f_smpl_req.register_user_cd IS '登録者';
COMMENT ON COLUMN sskadminuser.f_smpl_req.media_cd_2 IS '媒体コード2';
COMMENT ON COLUMN sskadminuser.f_smpl_req.inq_keyword_2 IS '検索キーワード2';
COMMENT ON COLUMN sskadminuser.f_smpl_req.agree_flg IS '同意フラグ';
COMMENT ON COLUMN sskadminuser.f_smpl_req.allergy_comment IS 'アレルギーコメント';
COMMENT ON COLUMN sskadminuser.f_smpl_req.pain_part_1 IS '痛む部位1';
COMMENT ON COLUMN sskadminuser.f_smpl_req.pain_part_2 IS '痛む部位2';
COMMENT ON COLUMN sskadminuser.f_smpl_req.pain_part_3 IS '痛む部位3';
COMMENT ON COLUMN sskadminuser.f_smpl_req.pain_part_4 IS '痛む部位4';
COMMENT ON COLUMN sskadminuser.f_smpl_req.pain_part_5 IS '痛む部位5';
COMMENT ON COLUMN sskadminuser.f_smpl_req.pain_part_6 IS '痛む部位6';
COMMENT ON COLUMN sskadminuser.f_smpl_req.pain_part_7 IS '痛む部位7';
COMMENT ON COLUMN sskadminuser.f_smpl_req.pain_part_8 IS '痛む部位8';
COMMENT ON COLUMN sskadminuser.f_smpl_req.pain_part_9 IS '痛む部位9';
COMMENT ON COLUMN sskadminuser.f_smpl_req.pain_part_10 IS '痛む部位10';
COMMENT ON COLUMN sskadminuser.f_smpl_req.pain_start_season_kbn IS '痛み始めた時期区分';
COMMENT ON COLUMN sskadminuser.f_smpl_req.pain_except_therapy_1 IS '痛み以外の治療1';
COMMENT ON COLUMN sskadminuser.f_smpl_req.pain_except_therapy_2 IS '痛み以外の治療2';
COMMENT ON COLUMN sskadminuser.f_smpl_req.pain_except_therapy_3 IS '痛み以外の治療3';
COMMENT ON COLUMN sskadminuser.f_smpl_req.pain_except_therapy_4 IS '痛み以外の治療4';
COMMENT ON COLUMN sskadminuser.f_smpl_req.pain_except_therapy_5 IS '痛み以外の治療5';
COMMENT ON COLUMN sskadminuser.f_smpl_req.pain_except_therapy_6 IS '痛み以外の治療6';
COMMENT ON COLUMN sskadminuser.f_smpl_req.pain_except_therapy_7 IS '痛み以外の治療7';
COMMENT ON COLUMN sskadminuser.f_smpl_req.pain_except_therapy_8 IS '痛み以外の治療8';
COMMENT ON COLUMN sskadminuser.f_smpl_req.pain_except_therapy_9 IS '痛み以外の治療9';
COMMENT ON COLUMN sskadminuser.f_smpl_req.pain_except_therapy_10 IS '痛み以外の治療10';
COMMENT ON COLUMN sskadminuser.f_smpl_req.diagnosis_name_symptom IS '診断名・症状';
COMMENT ON COLUMN sskadminuser.f_smpl_req.entry_trigger_name IS '申込のきっかけ名称';
COMMENT ON COLUMN sskadminuser.f_smpl_req.talk_language_kbn IS '会話言語区分';
COMMENT ON COLUMN sskadminuser.f_smpl_req.read_write_language_kbn IS '読み書き言語区分';
COMMENT ON COLUMN sskadminuser.f_smpl_req.worry_season_kbn IS '悩み時期区分';
COMMENT ON COLUMN sskadminuser.f_smpl_req.care_way_kbn_1 IS 'お手当方法区分1';
COMMENT ON COLUMN sskadminuser.f_smpl_req.care_way_kbn_2 IS 'お手当方法区分2';
COMMENT ON COLUMN sskadminuser.f_smpl_req.care_way_kbn_3 IS 'お手当方法区分3';
COMMENT ON COLUMN sskadminuser.f_smpl_req.care_way_kbn_4 IS 'お手当方法区分4';
COMMENT ON COLUMN sskadminuser.f_smpl_req.care_way_kbn_5 IS 'お手当方法区分5';
COMMENT ON COLUMN sskadminuser.f_smpl_req.care_way_kbn_6 IS 'お手当方法区分6';
COMMENT ON COLUMN sskadminuser.f_smpl_req.care_way_kbn_7 IS 'お手当方法区分7';
COMMENT ON COLUMN sskadminuser.f_smpl_req.care_way_kbn_8 IS 'お手当方法区分8';
COMMENT ON COLUMN sskadminuser.f_smpl_req.care_way_kbn_9 IS 'お手当方法区分9';
COMMENT ON COLUMN sskadminuser.f_smpl_req.care_way_kbn_10 IS 'お手当方法区分10';
COMMENT ON COLUMN sskadminuser.f_smpl_req.mob_tel_no IS '携帯電話番号';
COMMENT ON COLUMN sskadminuser.f_smpl_req.entry_trigger_cd IS '申込のきっかけコード';
COMMENT ON COLUMN sskadminuser.f_smpl_req.mob_tel_prior_flg IS '携帯電話の優先フラグ';
COMMENT ON COLUMN sskadminuser.f_smpl_req.mbr_seq IS '会員連番';
COMMENT ON COLUMN sskadminuser.f_smpl_req.temp_mbr_no IS '仮会員番号';
COMMENT ON COLUMN sskadminuser.f_smpl_req.smpl_req_no IS 'サンプル請求番号';
COMMENT ON COLUMN sskadminuser.f_smpl_req.route_dtl_kbn IS '経路詳細区分';
COMMENT ON COLUMN sskadminuser.f_smpl_req.care_way_comment IS 'お手入れ方法コメント';
COMMENT ON COLUMN sskadminuser.f_smpl_req.cosme_opt_in_kbn IS '化粧品オプトイン区分';
COMMENT ON COLUMN sskadminuser.f_smpl_req.herb_optin_kbn IS '漢方オプトイン区分';
COMMENT ON COLUMN sskadminuser.f_smpl_req.entry_trigger_dtl_comment IS '申込のきっかけ詳細コメント';
COMMENT ON COLUMN sskadminuser.f_smpl_req.cust_barcd IS 'カスタマバーコード';
-- CREATE INDEX 
CREATE INDEX idx_f_smpl_req_01 ON sskadminuser.f_smpl_req (site_kbn,acpt_dt_tm);
CREATE INDEX idx_f_smpl_req_02 ON sskadminuser.f_smpl_req (smpl_req_no);
CREATE INDEX idx_f_smpl_req_03 ON sskadminuser.f_smpl_req (mbr_seq);
CREATE INDEX idx_f_smpl_req_04 ON sskadminuser.f_smpl_req (acpt_dt_tm);
CREATE INDEX idx_f_smpl_req_05 ON sskadminuser.f_smpl_req (ship_stat_kbn,rcv_form_output_kbn);
CREATE INDEX idx_f_smpl_req_06 ON sskadminuser.f_smpl_req (del_kbn);
CREATE INDEX idx_f_smpl_req_07 ON sskadminuser.f_smpl_req (core_sys_flg);
CREATE INDEX idx_f_smpl_req_08 ON sskadminuser.f_smpl_req (sync_flg);
CREATE INDEX idx_f_smpl_req_09 ON sskadminuser.f_smpl_req (update_date,register_date);
CREATE INDEX idx_f_smpl_req_10 ON sskadminuser.f_smpl_req (temp_mbr_no);
-- END TABLE : sskadminuser.f_smpl_req  --

-- START TABLE : sskadminuser.m_second_auth  --
CREATE TABLE sskadminuser.m_second_auth(
cust_no INT NOT NULL,
device_cd VARCHAR(50) NOT NULL,
device_kbn CHAR(2) NOT NULL,
device_token VARCHAR(80) NOT NULL,
update_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
register_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
update_user_cd VARCHAR(64) NOT NULL,
register_user_cd VARCHAR(64) NOT NULL,
CONSTRAINT pk_m_second_auth PRIMARY KEY (cust_no,device_cd,device_kbn)
);
-- ADD COLUMN
COMMENT ON TABLE sskadminuser.m_second_auth IS '第2認証台帳';
COMMENT ON COLUMN sskadminuser.m_second_auth.cust_no IS '会員番号';
COMMENT ON COLUMN sskadminuser.m_second_auth.device_cd IS 'デバイスコード';
COMMENT ON COLUMN sskadminuser.m_second_auth.device_kbn IS 'デバイス区分';
COMMENT ON COLUMN sskadminuser.m_second_auth.device_token IS 'デバイストークン';
COMMENT ON COLUMN sskadminuser.m_second_auth.update_date IS '更新日時';
COMMENT ON COLUMN sskadminuser.m_second_auth.register_date IS '登録日時';
COMMENT ON COLUMN sskadminuser.m_second_auth.update_user_cd IS '更新者';
COMMENT ON COLUMN sskadminuser.m_second_auth.register_user_cd IS '登録者';
-- CREATE INDEX 
CREATE INDEX idx_m_second_auth_01 ON sskadminuser.m_second_auth (update_date,register_date);
-- END TABLE : sskadminuser.m_second_auth  --

-- START TABLE : sskadminuser.h_session_log  --
CREATE TABLE sskadminuser.h_session_log(
session_log_hist_req BIGINT,
site_kbn CHAR(1) NOT NULL,
session_id VARCHAR(100),
cust_no INT,
page_no INT,
tgt_program VARCHAR(256),
session_data TEXT,
update_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
register_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
update_user_cd VARCHAR(64) NOT NULL,
register_user_cd VARCHAR(64) NOT NULL
);
-- ADD COLUMN
COMMENT ON TABLE sskadminuser.h_session_log IS 'セッションログ履歴';
COMMENT ON COLUMN sskadminuser.h_session_log.session_log_hist_req IS 'セッションログ履歴連番';
COMMENT ON COLUMN sskadminuser.h_session_log.site_kbn IS 'サイト区分';
COMMENT ON COLUMN sskadminuser.h_session_log.session_id IS 'セッションID';
COMMENT ON COLUMN sskadminuser.h_session_log.cust_no IS '会員番号';
COMMENT ON COLUMN sskadminuser.h_session_log.page_no IS 'ページ番号';
COMMENT ON COLUMN sskadminuser.h_session_log.tgt_program IS '対象プログラム';
COMMENT ON COLUMN sskadminuser.h_session_log.session_data IS 'セッションデータ';
COMMENT ON COLUMN sskadminuser.h_session_log.update_date IS '更新日時';
COMMENT ON COLUMN sskadminuser.h_session_log.register_date IS '登録日時';
COMMENT ON COLUMN sskadminuser.h_session_log.update_user_cd IS '更新者';
COMMENT ON COLUMN sskadminuser.h_session_log.register_user_cd IS '登録者';
-- CREATE INDEX 
CREATE INDEX idx_h_session_log_01 ON sskadminuser.h_session_log (session_log_hist_req,site_kbn,session_id);
CREATE INDEX idx_h_session_log_02 ON sskadminuser.h_session_log (session_id);
CREATE INDEX idx_h_session_log_03 ON sskadminuser.h_session_log (cust_no);
CREATE INDEX idx_h_session_log_04 ON sskadminuser.h_session_log (update_date,register_date);
-- END TABLE : sskadminuser.h_session_log  --

-- START TABLE : sskadminuser.f_session_log  --
CREATE TABLE sskadminuser.f_session_log(
session_log_seq BIGINT,
site_kbn CHAR(1) NOT NULL,
session_id VARCHAR(100),
cust_no INT,
page_no INT,
tgt_program VARCHAR(256),
session_data TEXT,
update_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
register_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
update_user_cd VARCHAR(64) NOT NULL,
register_user_cd VARCHAR(64) NOT NULL
);
-- ADD COLUMN
COMMENT ON TABLE sskadminuser.f_session_log IS 'セッションログ伝票';
COMMENT ON COLUMN sskadminuser.f_session_log.session_log_seq IS 'セッションログ連番';
COMMENT ON COLUMN sskadminuser.f_session_log.site_kbn IS 'サイト区分';
COMMENT ON COLUMN sskadminuser.f_session_log.session_id IS 'セッションID';
COMMENT ON COLUMN sskadminuser.f_session_log.cust_no IS '会員番号';
COMMENT ON COLUMN sskadminuser.f_session_log.page_no IS 'ページ番号';
COMMENT ON COLUMN sskadminuser.f_session_log.tgt_program IS '対象プログラム';
COMMENT ON COLUMN sskadminuser.f_session_log.session_data IS 'セッションデータ';
COMMENT ON COLUMN sskadminuser.f_session_log.update_date IS '更新日時';
COMMENT ON COLUMN sskadminuser.f_session_log.register_date IS '登録日時';
COMMENT ON COLUMN sskadminuser.f_session_log.update_user_cd IS '更新者';
COMMENT ON COLUMN sskadminuser.f_session_log.register_user_cd IS '登録者';
-- CREATE INDEX 
CREATE INDEX idx_f_session_log_01 ON sskadminuser.f_session_log (session_id);
CREATE INDEX idx_f_session_log_02 ON sskadminuser.f_session_log (cust_no);
CREATE INDEX idx_f_session_log_03 ON sskadminuser.f_session_log (update_date,register_date);
-- END TABLE : sskadminuser.f_session_log  --

-- START TABLE : sskadminuser.w_session  --
CREATE TABLE sskadminuser.w_session(
session_id VARCHAR(100),
site_kbn CHAR(1) NOT NULL,
cust_no INT,
session_data TEXT,
update_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
register_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
update_user_cd VARCHAR(64) NOT NULL,
register_user_cd VARCHAR(64) NOT NULL,
relation_session_id VARCHAR(100),
CONSTRAINT pk_w_session PRIMARY KEY (session_id)
);
-- ADD COLUMN
COMMENT ON TABLE sskadminuser.w_session IS 'セッション補助伝票';
COMMENT ON COLUMN sskadminuser.w_session.session_id IS 'セッションID';
COMMENT ON COLUMN sskadminuser.w_session.site_kbn IS 'サイト区分';
COMMENT ON COLUMN sskadminuser.w_session.cust_no IS '会員番号';
COMMENT ON COLUMN sskadminuser.w_session.session_data IS 'セッションデータ';
COMMENT ON COLUMN sskadminuser.w_session.update_date IS '更新日時';
COMMENT ON COLUMN sskadminuser.w_session.register_date IS '登録日時';
COMMENT ON COLUMN sskadminuser.w_session.update_user_cd IS '更新者';
COMMENT ON COLUMN sskadminuser.w_session.register_user_cd IS '登録者';
COMMENT ON COLUMN sskadminuser.w_session.relation_session_id IS '間柄セッションID';
-- CREATE INDEX 
CREATE INDEX idx_w_session_01 ON sskadminuser.w_session (session_id,site_kbn,cust_no);
CREATE INDEX idx_w_session_02 ON sskadminuser.w_session (relation_session_id);
CREATE INDEX idx_w_session_03 ON sskadminuser.w_session (cust_no);
CREATE INDEX idx_w_session_04 ON sskadminuser.w_session (update_date,register_date);
-- END TABLE : sskadminuser.w_session  --

-- START TABLE : sskadminuser.m_area_tel_no  --
CREATE TABLE sskadminuser.m_area_tel_no(
area_tel_no VARCHAR(6) NOT NULL,
pref_name VARCHAR(10) NOT NULL,
zone_name VARCHAR(50) NOT NULL,
offer_pref_cd_1 VARCHAR(2) NOT NULL,
offer_pref_cd_2 VARCHAR(2) NOT NULL,
offer_pref_cd_3 VARCHAR(2) NOT NULL,
offer_pref_cd_4 VARCHAR(2) NOT NULL,
offer_pref_cd_5 VARCHAR(2) NOT NULL,
area_subdivision_cd_1 VARCHAR(4),
area_subdivision_cd_2 VARCHAR(4),
area_subdivision_cd_3 VARCHAR(4),
area_subdivision_cd_4 VARCHAR(4),
area_cd_1 VARCHAR(3),
area_cd_2 VARCHAR(3),
area_cd_3 VARCHAR(3),
area_cd_4 VARCHAR(3),
update_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
register_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
update_user_cd VARCHAR(64) NOT NULL,
register_user_cd VARCHAR(64) NOT NULL
);
-- ADD COLUMN
COMMENT ON TABLE sskadminuser.m_area_tel_no IS '市外局番台帳';
COMMENT ON COLUMN sskadminuser.m_area_tel_no.area_tel_no IS '市外局番';
COMMENT ON COLUMN sskadminuser.m_area_tel_no.pref_name IS '都道府県名';
COMMENT ON COLUMN sskadminuser.m_area_tel_no.zone_name IS '区域名';
COMMENT ON COLUMN sskadminuser.m_area_tel_no.offer_pref_cd_1 IS '提供県コード1';
COMMENT ON COLUMN sskadminuser.m_area_tel_no.offer_pref_cd_2 IS '提供県コード2';
COMMENT ON COLUMN sskadminuser.m_area_tel_no.offer_pref_cd_3 IS '提供県コード3';
COMMENT ON COLUMN sskadminuser.m_area_tel_no.offer_pref_cd_4 IS '提供県コード4';
COMMENT ON COLUMN sskadminuser.m_area_tel_no.offer_pref_cd_5 IS '提供県コード5';
COMMENT ON COLUMN sskadminuser.m_area_tel_no.area_subdivision_cd_1 IS '地域細分コード1';
COMMENT ON COLUMN sskadminuser.m_area_tel_no.area_subdivision_cd_2 IS '地域細分コード2';
COMMENT ON COLUMN sskadminuser.m_area_tel_no.area_subdivision_cd_3 IS '地域細分コード3';
COMMENT ON COLUMN sskadminuser.m_area_tel_no.area_subdivision_cd_4 IS '地域細分コード4';
COMMENT ON COLUMN sskadminuser.m_area_tel_no.area_cd_1 IS '地区コード1';
COMMENT ON COLUMN sskadminuser.m_area_tel_no.area_cd_2 IS '地区コード2';
COMMENT ON COLUMN sskadminuser.m_area_tel_no.area_cd_3 IS '地区コード3';
COMMENT ON COLUMN sskadminuser.m_area_tel_no.area_cd_4 IS '地区コード4';
COMMENT ON COLUMN sskadminuser.m_area_tel_no.update_date IS '更新日時';
COMMENT ON COLUMN sskadminuser.m_area_tel_no.register_date IS '登録日時';
COMMENT ON COLUMN sskadminuser.m_area_tel_no.update_user_cd IS '更新者';
COMMENT ON COLUMN sskadminuser.m_area_tel_no.register_user_cd IS '登録者';
-- CREATE INDEX 
CREATE INDEX idx_m_area_tel_no_01 ON sskadminuser.m_area_tel_no (area_tel_no);
CREATE INDEX idx_m_area_tel_no_02 ON sskadminuser.m_area_tel_no (update_date,register_date);
-- END TABLE : sskadminuser.m_area_tel_no  --

-- START TABLE : sskadminuser.m_item_dtl  --
CREATE TABLE sskadminuser.m_item_dtl(
item_cd VARCHAR(4) NOT NULL,
disp_flg CHAR(1) NOT NULL DEFAULT '1',
item_dtl_kbn CHAR(1) NOT NULL DEFAULT '1',
pre_kbn CHAR(1) NOT NULL DEFAULT '0',
drug_quasi_flg CHAR(1) NOT NULL DEFAULT '0',
travel_kbn CHAR(1) NOT NULL DEFAULT '0',
site_disp_name VARCHAR(64),
comment_1 VARCHAR(100),
comment_2 VARCHAR(100),
explain_1 VARCHAR(4000),
explain_2 VARCHAR(4000),
explain_3 VARCHAR(4000),
explain_4 VARCHAR(4000),
explain_5 VARCHAR(4000),
explain_6 VARCHAR(4000),
new_old_flg CHAR(1) DEFAULT NULL,
prior_turn INT NOT NULL DEFAULT 100,
update_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
register_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
update_user_cd VARCHAR(64) NOT NULL,
register_user_cd VARCHAR(64) NOT NULL,
item_lvl VARCHAR(2),
caption VARCHAR(200),
contribution_avail_flg CHAR(1),
base_item_cd VARCHAR(100)
);
-- ADD COLUMN
COMMENT ON TABLE sskadminuser.m_item_dtl IS '商品詳細台帳';
COMMENT ON COLUMN sskadminuser.m_item_dtl.item_cd IS '商品コード';
COMMENT ON COLUMN sskadminuser.m_item_dtl.disp_flg IS '表示フラグ';
COMMENT ON COLUMN sskadminuser.m_item_dtl.item_dtl_kbn IS '商品詳細区分';
COMMENT ON COLUMN sskadminuser.m_item_dtl.pre_kbn IS 'プレゼント区分';
COMMENT ON COLUMN sskadminuser.m_item_dtl.drug_quasi_flg IS '医薬部外品フラグ';
COMMENT ON COLUMN sskadminuser.m_item_dtl.travel_kbn IS 'トラベル区分';
COMMENT ON COLUMN sskadminuser.m_item_dtl.site_disp_name IS 'サイト表示名';
COMMENT ON COLUMN sskadminuser.m_item_dtl.comment_1 IS 'コメント1';
COMMENT ON COLUMN sskadminuser.m_item_dtl.comment_2 IS 'コメント2';
COMMENT ON COLUMN sskadminuser.m_item_dtl.explain_1 IS '説明1';
COMMENT ON COLUMN sskadminuser.m_item_dtl.explain_2 IS '説明2';
COMMENT ON COLUMN sskadminuser.m_item_dtl.explain_3 IS '説明3';
COMMENT ON COLUMN sskadminuser.m_item_dtl.explain_4 IS '説明4';
COMMENT ON COLUMN sskadminuser.m_item_dtl.explain_5 IS '説明5';
COMMENT ON COLUMN sskadminuser.m_item_dtl.explain_6 IS '説明6';
COMMENT ON COLUMN sskadminuser.m_item_dtl.new_old_flg IS '新旧フラグ';
COMMENT ON COLUMN sskadminuser.m_item_dtl.prior_turn IS '優先順';
COMMENT ON COLUMN sskadminuser.m_item_dtl.update_date IS '更新日時';
COMMENT ON COLUMN sskadminuser.m_item_dtl.register_date IS '登録日時';
COMMENT ON COLUMN sskadminuser.m_item_dtl.update_user_cd IS '更新者';
COMMENT ON COLUMN sskadminuser.m_item_dtl.register_user_cd IS '登録者';
COMMENT ON COLUMN sskadminuser.m_item_dtl.item_lvl IS '商品レベル';
COMMENT ON COLUMN sskadminuser.m_item_dtl.caption IS 'キャプション';
COMMENT ON COLUMN sskadminuser.m_item_dtl.contribution_avail_flg IS '投稿可能フラグ';
COMMENT ON COLUMN sskadminuser.m_item_dtl.base_item_cd IS '基本商品コード';
-- CREATE INDEX 
CREATE INDEX idx_m_item_dtl_01 ON sskadminuser.m_item_dtl (disp_flg);
CREATE INDEX idx_m_item_dtl_02 ON sskadminuser.m_item_dtl (update_date,register_date);
CREATE UNIQUE INDEX idx_m_item_dtl_03 ON sskadminuser.m_item_dtl (item_cd,item_lvl);
-- END TABLE : sskadminuser.m_item_dtl  --

-- START TABLE : sskadminuser.f_item_review  --
CREATE TABLE sskadminuser.f_item_review(
review_seq INT NOT NULL,
site_kbn CHAR(1) NOT NULL DEFAULT '1',
item_cd VARCHAR(4) NOT NULL,
mbr_seq BIGINT NOT NULL,
cust_no INT NOT NULL,
net_mbr_cd VARCHAR(12) NOT NULL,
contributor_name VARCHAR(40) NOT NULL,
skin_type_kbn CHAR(1) NOT NULL,
worry_kbn VARCHAR(2) NOT NULL,
age_zone_kbn CHAR(1) NOT NULL,
review_stat_kbn CHAR(1) NOT NULL DEFAULT '1',
item_satisfaction_level_kbn CHAR(1) NOT NULL,
review_comment VARCHAR(800) NOT NULL,
del_flg CHAR(1) NOT NULL DEFAULT '0',
update_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
register_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
update_user_cd VARCHAR(64) NOT NULL,
register_user_cd VARCHAR(64) NOT NULL,
item_lvl VARCHAR(2),
grp_cd INT,
CONSTRAINT pk_f_item_review PRIMARY KEY (review_seq)
);
-- ADD COLUMN
COMMENT ON TABLE sskadminuser.f_item_review IS '商品口コミ伝票';
COMMENT ON COLUMN sskadminuser.f_item_review.review_seq IS '口コミ連番';
COMMENT ON COLUMN sskadminuser.f_item_review.site_kbn IS 'サイト区分';
COMMENT ON COLUMN sskadminuser.f_item_review.item_cd IS '商品コード';
COMMENT ON COLUMN sskadminuser.f_item_review.mbr_seq IS '会員連番';
COMMENT ON COLUMN sskadminuser.f_item_review.cust_no IS '会員番号';
COMMENT ON COLUMN sskadminuser.f_item_review.net_mbr_cd IS 'ネット会員コード';
COMMENT ON COLUMN sskadminuser.f_item_review.contributor_name IS '投稿者名';
COMMENT ON COLUMN sskadminuser.f_item_review.skin_type_kbn IS '肌質区分';
COMMENT ON COLUMN sskadminuser.f_item_review.worry_kbn IS '悩み区分';
COMMENT ON COLUMN sskadminuser.f_item_review.age_zone_kbn IS '年代区分';
COMMENT ON COLUMN sskadminuser.f_item_review.review_stat_kbn IS '口コミ状態区分';
COMMENT ON COLUMN sskadminuser.f_item_review.item_satisfaction_level_kbn IS '商品満足度区分';
COMMENT ON COLUMN sskadminuser.f_item_review.review_comment IS '口コミコメント';
COMMENT ON COLUMN sskadminuser.f_item_review.del_flg IS '削除フラグ';
COMMENT ON COLUMN sskadminuser.f_item_review.update_date IS '更新日時';
COMMENT ON COLUMN sskadminuser.f_item_review.register_date IS '登録日時';
COMMENT ON COLUMN sskadminuser.f_item_review.update_user_cd IS '更新者';
COMMENT ON COLUMN sskadminuser.f_item_review.register_user_cd IS '登録者';
COMMENT ON COLUMN sskadminuser.f_item_review.item_lvl IS '商品レベル';
COMMENT ON COLUMN sskadminuser.f_item_review.grp_cd IS 'グループコード';
-- CREATE INDEX 
CREATE INDEX idx_f_item_review_01 ON sskadminuser.f_item_review (site_kbn,item_cd,mbr_seq,cust_no);
CREATE INDEX idx_f_item_review_02 ON sskadminuser.f_item_review (net_mbr_cd,contributor_name);
-- END TABLE : sskadminuser.f_item_review  --

-- START TABLE : sskadminuser.m_intro_cust  --
CREATE TABLE sskadminuser.m_intro_cust(
intro_dt_tm TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL,
site_kbn CHAR(1) NOT NULL,
intro_cust_from_kana_name VARCHAR(124),
intro_cust_from_name VARCHAR(88),
intro_cust_from_tel_no VARCHAR(64),
mail_adr VARCHAR(180),
post_no VARCHAR(8),
adr VARCHAR(180),
adr_att_memo VARCHAR(400),
msg VARCHAR(400),
back_mail_flg CHAR(1),
cust_no INT,
print_flg CHAR(1),
update_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
register_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
update_user_cd VARCHAR(64) NOT NULL,
register_user_cd VARCHAR(64) NOT NULL,
kana_adr VARCHAR(180),
tm_zone_kbn CHAR(1),
relation_kbn CHAR(1),
relation_kbn_other VARCHAR(100)
);
-- ADD COLUMN
COMMENT ON TABLE sskadminuser.m_intro_cust IS '紹介者台帳';
COMMENT ON COLUMN sskadminuser.m_intro_cust.intro_dt_tm IS '紹介日時';
COMMENT ON COLUMN sskadminuser.m_intro_cust.site_kbn IS 'サイト区分';
COMMENT ON COLUMN sskadminuser.m_intro_cust.intro_cust_from_kana_name IS '被紹介者かな姓名';
COMMENT ON COLUMN sskadminuser.m_intro_cust.intro_cust_from_name IS '被紹介者姓名';
COMMENT ON COLUMN sskadminuser.m_intro_cust.intro_cust_from_tel_no IS '被紹介者電話番号';
COMMENT ON COLUMN sskadminuser.m_intro_cust.mail_adr IS 'メールアドレス';
COMMENT ON COLUMN sskadminuser.m_intro_cust.post_no IS '郵便番号';
COMMENT ON COLUMN sskadminuser.m_intro_cust.adr IS '住所';
COMMENT ON COLUMN sskadminuser.m_intro_cust.adr_att_memo IS '住所注意メモ';
COMMENT ON COLUMN sskadminuser.m_intro_cust.msg IS 'メッセージ';
COMMENT ON COLUMN sskadminuser.m_intro_cust.back_mail_flg IS '折メールフラグ';
COMMENT ON COLUMN sskadminuser.m_intro_cust.cust_no IS '会員番号';
COMMENT ON COLUMN sskadminuser.m_intro_cust.print_flg IS 'プリントフラグ';
COMMENT ON COLUMN sskadminuser.m_intro_cust.update_date IS '更新日時';
COMMENT ON COLUMN sskadminuser.m_intro_cust.register_date IS '登録日時';
COMMENT ON COLUMN sskadminuser.m_intro_cust.update_user_cd IS '更新者';
COMMENT ON COLUMN sskadminuser.m_intro_cust.register_user_cd IS '登録者';
COMMENT ON COLUMN sskadminuser.m_intro_cust.kana_adr IS 'かな住所';
COMMENT ON COLUMN sskadminuser.m_intro_cust.tm_zone_kbn IS '時間帯区分';
COMMENT ON COLUMN sskadminuser.m_intro_cust.relation_kbn IS 'あなた様との間柄区分';
COMMENT ON COLUMN sskadminuser.m_intro_cust.relation_kbn_other IS 'あなた様との間柄その他';
-- CREATE INDEX 
CREATE INDEX idx_m_intro_cust_01 ON sskadminuser.m_intro_cust (intro_dt_tm,site_kbn,intro_cust_from_kana_name);
CREATE INDEX idx_m_intro_cust_02 ON sskadminuser.m_intro_cust (update_date,register_date);
-- END TABLE : sskadminuser.m_intro_cust  --

-- START TABLE : sskadminuser.f_skin_counseling  --
CREATE TABLE sskadminuser.f_skin_counseling(
skin_counseling_cd DOUBLE PRECISION NOT NULL,
voice_consul_seq INT NOT NULL,
now_in_use_domo VARCHAR(400),
other_in_use_item VARCHAR(2000),
free_input VARCHAR(2000),
forehead_worry VARCHAR(800),
nose_worry VARCHAR(800),
eyes_worry VARCHAR(800),
cheek_worry VARCHAR(800),
mouth_worry VARCHAR(800),
neck_worry VARCHAR(800),
update_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
register_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
update_user_cd VARCHAR(64) NOT NULL,
register_user_cd VARCHAR(64) NOT NULL,
CONSTRAINT pk_f_skin_counseling PRIMARY KEY (skin_counseling_cd)
);
-- ADD COLUMN
COMMENT ON TABLE sskadminuser.f_skin_counseling IS '素肌度カウンセリング伝票';
COMMENT ON COLUMN sskadminuser.f_skin_counseling.skin_counseling_cd IS '素肌度カウンセリングコード';
COMMENT ON COLUMN sskadminuser.f_skin_counseling.voice_consul_seq IS 'ご意見・ご相談連番';
COMMENT ON COLUMN sskadminuser.f_skin_counseling.now_in_use_domo IS '現在お使いのドモホルンリンクル';
COMMENT ON COLUMN sskadminuser.f_skin_counseling.other_in_use_item IS 'その他お使いの商品';
COMMENT ON COLUMN sskadminuser.f_skin_counseling.free_input IS 'フリー入力';
COMMENT ON COLUMN sskadminuser.f_skin_counseling.forehead_worry IS '額の悩み';
COMMENT ON COLUMN sskadminuser.f_skin_counseling.nose_worry IS '鼻の悩み';
COMMENT ON COLUMN sskadminuser.f_skin_counseling.eyes_worry IS '目もとの悩み';
COMMENT ON COLUMN sskadminuser.f_skin_counseling.cheek_worry IS '頬の悩み';
COMMENT ON COLUMN sskadminuser.f_skin_counseling.mouth_worry IS '口もとの悩み';
COMMENT ON COLUMN sskadminuser.f_skin_counseling.neck_worry IS '首もとの悩み';
COMMENT ON COLUMN sskadminuser.f_skin_counseling.update_date IS '更新日時';
COMMENT ON COLUMN sskadminuser.f_skin_counseling.register_date IS '登録日時';
COMMENT ON COLUMN sskadminuser.f_skin_counseling.update_user_cd IS '更新者';
COMMENT ON COLUMN sskadminuser.f_skin_counseling.register_user_cd IS '登録者';
-- CREATE INDEX 
-- END TABLE : sskadminuser.f_skin_counseling  --

-- START TABLE : sskadminuser.f_skin_chk_ans_d  --
CREATE TABLE sskadminuser.f_skin_chk_ans_d(
ans_seq BIGINT NOT NULL,
question_cd INT NOT NULL,
question_sente VARCHAR(400) NOT NULL,
choices_cd INT NOT NULL,
choices_sente VARCHAR(700) NOT NULL,
update_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
register_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
update_user_cd VARCHAR(64) NOT NULL,
register_user_cd VARCHAR(64) NOT NULL,
CONSTRAINT pk_f_skin_chk_ans_d PRIMARY KEY (ans_seq,question_cd)
);
-- ADD COLUMN
COMMENT ON TABLE sskadminuser.f_skin_chk_ans_d IS '美肌度チェック回答伝票明細';
COMMENT ON COLUMN sskadminuser.f_skin_chk_ans_d.ans_seq IS '回答連番';
COMMENT ON COLUMN sskadminuser.f_skin_chk_ans_d.question_cd IS '質問コード';
COMMENT ON COLUMN sskadminuser.f_skin_chk_ans_d.question_sente IS '質問文';
COMMENT ON COLUMN sskadminuser.f_skin_chk_ans_d.choices_cd IS '選択肢コード';
COMMENT ON COLUMN sskadminuser.f_skin_chk_ans_d.choices_sente IS '選択肢文';
COMMENT ON COLUMN sskadminuser.f_skin_chk_ans_d.update_date IS '更新日時';
COMMENT ON COLUMN sskadminuser.f_skin_chk_ans_d.register_date IS '登録日時';
COMMENT ON COLUMN sskadminuser.f_skin_chk_ans_d.update_user_cd IS '更新者';
COMMENT ON COLUMN sskadminuser.f_skin_chk_ans_d.register_user_cd IS '登録者';
-- CREATE INDEX 
CREATE INDEX idx_f_skin_chk_ans_d_01 ON sskadminuser.f_skin_chk_ans_d (update_date,register_date);
-- END TABLE : sskadminuser.f_skin_chk_ans_d  --

-- START TABLE : sskadminuser.f_skin_chk_ans_h  --
CREATE TABLE sskadminuser.f_skin_chk_ans_h(
ans_seq BIGINT NOT NULL,
cust_no INT NOT NULL,
smpl_req_cd VARCHAR(8) NOT NULL,
ans_fin_flg CHAR(1) NOT NULL,
del_flg CHAR(1) NOT NULL,
ans_start_dt_tm TIMESTAMP(0) WITHOUT TIME ZONE,
ans_fin_dt_tm TIMESTAMP(0) WITHOUT TIME ZONE,
free_comment_flg CHAR(1) NOT NULL,
free_comment_question_sente VARCHAR(400),
free_comment VARCHAR(4000),
prnt_stat_kbn CHAR(1) NOT NULL DEFAULT '0',
update_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
register_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
update_user_cd VARCHAR(64) NOT NULL,
register_user_cd VARCHAR(64) NOT NULL,
CONSTRAINT pk_f_skin_chk_ans_h PRIMARY KEY (ans_seq)
);
-- ADD COLUMN
COMMENT ON TABLE sskadminuser.f_skin_chk_ans_h IS '美肌度チェック回答伝票ヘダー';
COMMENT ON COLUMN sskadminuser.f_skin_chk_ans_h.ans_seq IS '回答連番';
COMMENT ON COLUMN sskadminuser.f_skin_chk_ans_h.cust_no IS '会員番号';
COMMENT ON COLUMN sskadminuser.f_skin_chk_ans_h.smpl_req_cd IS 'サンプル請求コード';
COMMENT ON COLUMN sskadminuser.f_skin_chk_ans_h.ans_fin_flg IS '回答完了フラグ';
COMMENT ON COLUMN sskadminuser.f_skin_chk_ans_h.del_flg IS '削除フラグ';
COMMENT ON COLUMN sskadminuser.f_skin_chk_ans_h.ans_start_dt_tm IS '回答開始日時';
COMMENT ON COLUMN sskadminuser.f_skin_chk_ans_h.ans_fin_dt_tm IS '回答完了日時';
COMMENT ON COLUMN sskadminuser.f_skin_chk_ans_h.free_comment_flg IS 'フリーコメントフラグ';
COMMENT ON COLUMN sskadminuser.f_skin_chk_ans_h.free_comment_question_sente IS 'フリーコメント質問文';
COMMENT ON COLUMN sskadminuser.f_skin_chk_ans_h.free_comment IS 'フリーコメント';
COMMENT ON COLUMN sskadminuser.f_skin_chk_ans_h.prnt_stat_kbn IS '印刷状態区分';
COMMENT ON COLUMN sskadminuser.f_skin_chk_ans_h.update_date IS '更新日時';
COMMENT ON COLUMN sskadminuser.f_skin_chk_ans_h.register_date IS '登録日時';
COMMENT ON COLUMN sskadminuser.f_skin_chk_ans_h.update_user_cd IS '更新者';
COMMENT ON COLUMN sskadminuser.f_skin_chk_ans_h.register_user_cd IS '登録者';
-- CREATE INDEX 
CREATE INDEX idx_f_skin_chk_ans_h_01 ON sskadminuser.f_skin_chk_ans_h (cust_no);
CREATE INDEX idx_f_skin_chk_ans_h_02 ON sskadminuser.f_skin_chk_ans_h (smpl_req_cd);
CREATE INDEX idx_f_skin_chk_ans_h_03 ON sskadminuser.f_skin_chk_ans_h (ans_fin_flg);
CREATE INDEX idx_f_skin_chk_ans_h_04 ON sskadminuser.f_skin_chk_ans_h (ans_fin_dt_tm);
CREATE INDEX idx_f_skin_chk_ans_h_05 ON sskadminuser.f_skin_chk_ans_h (free_comment_flg);
CREATE INDEX idx_f_skin_chk_ans_h_06 ON sskadminuser.f_skin_chk_ans_h (prnt_stat_kbn);
CREATE INDEX idx_f_skin_chk_ans_h_07 ON sskadminuser.f_skin_chk_ans_h (update_date,register_date);
-- END TABLE : sskadminuser.f_skin_chk_ans_h  --

-- START TABLE : sskadminuser.m_skin_chk_question  --
CREATE TABLE sskadminuser.m_skin_chk_question(
question_cd INT NOT NULL,
question_sente VARCHAR(400) NOT NULL,
disp_turn INT,
disp_flg CHAR(1) NOT NULL,
update_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
register_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
update_user_cd VARCHAR(64) NOT NULL,
register_user_cd VARCHAR(64) NOT NULL,
CONSTRAINT pk_m_skin_chk_question PRIMARY KEY (question_cd)
);
-- ADD COLUMN
COMMENT ON TABLE sskadminuser.m_skin_chk_question IS '美肌度チェック質問台帳';
COMMENT ON COLUMN sskadminuser.m_skin_chk_question.question_cd IS '質問コード';
COMMENT ON COLUMN sskadminuser.m_skin_chk_question.question_sente IS '質問文';
COMMENT ON COLUMN sskadminuser.m_skin_chk_question.disp_turn IS '表示順';
COMMENT ON COLUMN sskadminuser.m_skin_chk_question.disp_flg IS '表示フラグ';
COMMENT ON COLUMN sskadminuser.m_skin_chk_question.update_date IS '更新日時';
COMMENT ON COLUMN sskadminuser.m_skin_chk_question.register_date IS '登録日時';
COMMENT ON COLUMN sskadminuser.m_skin_chk_question.update_user_cd IS '更新者';
COMMENT ON COLUMN sskadminuser.m_skin_chk_question.register_user_cd IS '登録者';
-- CREATE INDEX 
CREATE INDEX idx_m_skin_chk_question_01 ON sskadminuser.m_skin_chk_question (disp_turn);
CREATE INDEX idx_m_skin_chk_question_02 ON sskadminuser.m_skin_chk_question (update_date,register_date);
-- END TABLE : sskadminuser.m_skin_chk_question  --

-- START TABLE : sskadminuser.m_skin_chk_selection  --
CREATE TABLE sskadminuser.m_skin_chk_selection(
choices_cd INT NOT NULL,
question_cd INT NOT NULL,
choices_sente VARCHAR(200) NOT NULL,
piece INT NOT NULL,
disp_turn INT,
disp_flg CHAR(1) NOT NULL,
update_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
register_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
update_user_cd VARCHAR(64) NOT NULL,
register_user_cd VARCHAR(64) NOT NULL,
CONSTRAINT pk_m_skin_chk_selection PRIMARY KEY (choices_cd)
);
-- ADD COLUMN
COMMENT ON TABLE sskadminuser.m_skin_chk_selection IS '美肌度チェック選択肢台帳';
COMMENT ON COLUMN sskadminuser.m_skin_chk_selection.choices_cd IS '選択肢コード';
COMMENT ON COLUMN sskadminuser.m_skin_chk_selection.question_cd IS '質問コード';
COMMENT ON COLUMN sskadminuser.m_skin_chk_selection.choices_sente IS '選択肢文';
COMMENT ON COLUMN sskadminuser.m_skin_chk_selection.piece IS '点数';
COMMENT ON COLUMN sskadminuser.m_skin_chk_selection.disp_turn IS '表示順';
COMMENT ON COLUMN sskadminuser.m_skin_chk_selection.disp_flg IS '表示フラグ';
COMMENT ON COLUMN sskadminuser.m_skin_chk_selection.update_date IS '更新日時';
COMMENT ON COLUMN sskadminuser.m_skin_chk_selection.register_date IS '登録日時';
COMMENT ON COLUMN sskadminuser.m_skin_chk_selection.update_user_cd IS '更新者';
COMMENT ON COLUMN sskadminuser.m_skin_chk_selection.register_user_cd IS '登録者';
-- CREATE INDEX 
CREATE INDEX idx_m_skin_chk_selection_01 ON sskadminuser.m_skin_chk_selection (question_cd);
CREATE INDEX idx_m_skin_chk_selection_02 ON sskadminuser.m_skin_chk_selection (update_date,register_date);
-- END TABLE : sskadminuser.m_skin_chk_selection  --

-- START TABLE : sskadminuser.f_skin_memo_comment  --
CREATE TABLE sskadminuser.f_skin_memo_comment(
comment_cd BIGINT NOT NULL,
cust_no INT,
ctrl_scr_login_account VARCHAR(12),
skin_memo_cd BIGINT NOT NULL,
skin_memo_record_dt TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL,
comment_record_dt_tm TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL,
comment_cont VARCHAR(400) NOT NULL,
session_id VARCHAR(200),
sync_flg CHAR(1) NOT NULL DEFAULT '0',
del_flg CHAR(1) NOT NULL DEFAULT '0',
update_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
register_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
update_user_cd VARCHAR(64),
register_user_cd VARCHAR(64),
CONSTRAINT pk_f_skin_memo_comment PRIMARY KEY (comment_cd)
);
-- ADD COLUMN
COMMENT ON TABLE sskadminuser.f_skin_memo_comment IS 'お肌メモコメント伝票';
COMMENT ON COLUMN sskadminuser.f_skin_memo_comment.comment_cd IS 'コメントコード';
COMMENT ON COLUMN sskadminuser.f_skin_memo_comment.cust_no IS '会員番号';
COMMENT ON COLUMN sskadminuser.f_skin_memo_comment.ctrl_scr_login_account IS '管理画面ログインアカウント';
COMMENT ON COLUMN sskadminuser.f_skin_memo_comment.skin_memo_cd IS 'お肌メモコード';
COMMENT ON COLUMN sskadminuser.f_skin_memo_comment.skin_memo_record_dt IS 'お肌メモ記録日';
COMMENT ON COLUMN sskadminuser.f_skin_memo_comment.comment_record_dt_tm IS 'コメント記録日時';
COMMENT ON COLUMN sskadminuser.f_skin_memo_comment.comment_cont IS 'コメント内容';
COMMENT ON COLUMN sskadminuser.f_skin_memo_comment.session_id IS 'セッションID';
COMMENT ON COLUMN sskadminuser.f_skin_memo_comment.sync_flg IS '同期フラグ';
COMMENT ON COLUMN sskadminuser.f_skin_memo_comment.del_flg IS '削除フラグ';
COMMENT ON COLUMN sskadminuser.f_skin_memo_comment.update_date IS '更新日時';
COMMENT ON COLUMN sskadminuser.f_skin_memo_comment.register_date IS '登録日時';
COMMENT ON COLUMN sskadminuser.f_skin_memo_comment.update_user_cd IS '更新者';
COMMENT ON COLUMN sskadminuser.f_skin_memo_comment.register_user_cd IS '登録者';
-- CREATE INDEX 
CREATE INDEX idx_f_skin_memo_comment_01 ON sskadminuser.f_skin_memo_comment (skin_memo_cd);
CREATE INDEX idx_f_skin_memo_comment_02 ON sskadminuser.f_skin_memo_comment (skin_memo_record_dt);
CREATE INDEX idx_f_skin_memo_comment_03 ON sskadminuser.f_skin_memo_comment (sync_flg);
CREATE INDEX idx_f_skin_memo_comment_04 ON sskadminuser.f_skin_memo_comment (del_flg);
CREATE INDEX idx_f_skin_memo_comment_05 ON sskadminuser.f_skin_memo_comment (register_date);
-- END TABLE : sskadminuser.f_skin_memo_comment  --

-- START TABLE : sskadminuser.m_skin_memo_set  --
CREATE TABLE sskadminuser.m_skin_memo_set(
skin_memo_cd BIGINT NOT NULL,
site_kbn CHAR(1),
care_fin_dt TIMESTAMP(0) WITHOUT TIME ZONE,
stat_kbn CHAR(1) DEFAULT '0',
cust_no INT NOT NULL,
del_flg CHAR(1) DEFAULT '0',
sync_flg CHAR(1) NOT NULL,
session_id VARCHAR(200),
update_date TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT current_timestamp(0),
register_date TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT current_timestamp(0),
update_user_cd VARCHAR(64),
register_user_cd VARCHAR(64),
CONSTRAINT pk_m_skin_memo_set PRIMARY KEY (skin_memo_cd)
);
-- ADD COLUMN
COMMENT ON TABLE sskadminuser.m_skin_memo_set IS 'お肌メモ設定台帳';
COMMENT ON COLUMN sskadminuser.m_skin_memo_set.skin_memo_cd IS 'お肌メモコード';
COMMENT ON COLUMN sskadminuser.m_skin_memo_set.site_kbn IS 'サイト区分';
COMMENT ON COLUMN sskadminuser.m_skin_memo_set.care_fin_dt IS 'お手当完了日';
COMMENT ON COLUMN sskadminuser.m_skin_memo_set.stat_kbn IS '状態区分';
COMMENT ON COLUMN sskadminuser.m_skin_memo_set.cust_no IS '会員番号';
COMMENT ON COLUMN sskadminuser.m_skin_memo_set.del_flg IS '削除フラグ';
COMMENT ON COLUMN sskadminuser.m_skin_memo_set.sync_flg IS '同期フラグ';
COMMENT ON COLUMN sskadminuser.m_skin_memo_set.session_id IS 'セッションID';
COMMENT ON COLUMN sskadminuser.m_skin_memo_set.update_date IS '更新日時';
COMMENT ON COLUMN sskadminuser.m_skin_memo_set.register_date IS '登録日時';
COMMENT ON COLUMN sskadminuser.m_skin_memo_set.update_user_cd IS '更新者';
COMMENT ON COLUMN sskadminuser.m_skin_memo_set.register_user_cd IS '登録者';
-- CREATE INDEX 
CREATE INDEX idx_m_skin_memo_set_01 ON sskadminuser.m_skin_memo_set (cust_no);
CREATE INDEX idx_m_skin_memo_set_02 ON sskadminuser.m_skin_memo_set (update_date,register_date);
-- END TABLE : sskadminuser.m_skin_memo_set  --

-- START TABLE : sskadminuser.m_skin_memo  --
CREATE TABLE sskadminuser.m_skin_memo(
skin_memo_cd BIGINT NOT NULL,
skin_memo_record_dt TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL,
cust_no INT NOT NULL,
site_kbn CHAR(1),
skin_feeling CHAR(1),
comment VARCHAR(800),
condition_cd_1 CHAR(1),
condition_cd_2 CHAR(1),
condition_cd_3 CHAR(1),
condition_cd_4 CHAR(1),
condition_cd_5 CHAR(1),
condition_cd_6 CHAR(1),
memo VARCHAR(800),
sync_flg CHAR(1) NOT NULL,
session_id VARCHAR(200),
update_date TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT current_timestamp(0),
register_date TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT current_timestamp(0),
update_user_cd VARCHAR(64),
register_user_cd VARCHAR(64),
comment_chk_flg CHAR(1) DEFAULT '0',
app_sync_flg CHAR(1) NOT NULL DEFAULT '0',
CONSTRAINT pk_m_skin_memo PRIMARY KEY (skin_memo_cd,skin_memo_record_dt)
);
-- ADD COLUMN
COMMENT ON TABLE sskadminuser.m_skin_memo IS 'お肌メモ台帳';
COMMENT ON COLUMN sskadminuser.m_skin_memo.skin_memo_cd IS 'お肌メモコード';
COMMENT ON COLUMN sskadminuser.m_skin_memo.skin_memo_record_dt IS 'お肌メモ記録日';
COMMENT ON COLUMN sskadminuser.m_skin_memo.cust_no IS '会員番号';
COMMENT ON COLUMN sskadminuser.m_skin_memo.site_kbn IS 'サイト区分';
COMMENT ON COLUMN sskadminuser.m_skin_memo.skin_feeling IS '肌実感';
COMMENT ON COLUMN sskadminuser.m_skin_memo.comment IS 'コメント';
COMMENT ON COLUMN sskadminuser.m_skin_memo.condition_cd_1 IS '体調コード1';
COMMENT ON COLUMN sskadminuser.m_skin_memo.condition_cd_2 IS '体調コード2';
COMMENT ON COLUMN sskadminuser.m_skin_memo.condition_cd_3 IS '体調コード3';
COMMENT ON COLUMN sskadminuser.m_skin_memo.condition_cd_4 IS '体調コード4';
COMMENT ON COLUMN sskadminuser.m_skin_memo.condition_cd_5 IS '体調コード5';
COMMENT ON COLUMN sskadminuser.m_skin_memo.condition_cd_6 IS '体調コード6';
COMMENT ON COLUMN sskadminuser.m_skin_memo.memo IS 'メモ';
COMMENT ON COLUMN sskadminuser.m_skin_memo.sync_flg IS '同期フラグ';
COMMENT ON COLUMN sskadminuser.m_skin_memo.session_id IS 'セッションID';
COMMENT ON COLUMN sskadminuser.m_skin_memo.update_date IS '更新日時';
COMMENT ON COLUMN sskadminuser.m_skin_memo.register_date IS '登録日時';
COMMENT ON COLUMN sskadminuser.m_skin_memo.update_user_cd IS '更新者';
COMMENT ON COLUMN sskadminuser.m_skin_memo.register_user_cd IS '登録者';
COMMENT ON COLUMN sskadminuser.m_skin_memo.comment_chk_flg IS 'コメントチェックフラグ';
COMMENT ON COLUMN sskadminuser.m_skin_memo.app_sync_flg IS 'アプリ同期フラグ';
-- CREATE INDEX 
CREATE INDEX idx_m_skin_memo_01 ON sskadminuser.m_skin_memo (app_sync_flg);
CREATE INDEX idx_m_skin_memo_02 ON sskadminuser.m_skin_memo (cust_no);
CREATE INDEX idx_m_skin_memo_03 ON sskadminuser.m_skin_memo (update_date,register_date);
-- END TABLE : sskadminuser.m_skin_memo  --

-- START TABLE : sskadminuser.m_item  --
CREATE TABLE sskadminuser.m_item(
item_cd VARCHAR(4) NOT NULL,
avail_start_dt TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL,
avail_end_dt TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL,
input_end_dt TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL,
official_name VARCHAR(22),
item_name VARCHAR(20),
item_name_12 VARCHAR(12),
item_name_10 VARCHAR(10),
item_name_6 VARCHAR(6),
item_name_5 VARCHAR(5),
item_name_4 VARCHAR(4),
price VARCHAR(6) NOT NULL,
point INT NOT NULL,
item_kbn CHAR(1) NOT NULL,
item_disp_turn INT,
ope_kbn CHAR(1) NOT NULL,
pre_kbn CHAR(1) NOT NULL,
tax_kbn CHAR(1) NOT NULL,
shin_item_flg CHAR(1),
update_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
register_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
update_user_cd VARCHAR(64) NOT NULL,
register_user_cd VARCHAR(64) NOT NULL,
item_form_kbn CHAR(1),
item_lvl VARCHAR(2),
tax_rate_cd INT
);
-- ADD COLUMN
COMMENT ON TABLE sskadminuser.m_item IS '商品台帳';
COMMENT ON COLUMN sskadminuser.m_item.item_cd IS '商品コード';
COMMENT ON COLUMN sskadminuser.m_item.avail_start_dt IS '有効開始日';
COMMENT ON COLUMN sskadminuser.m_item.avail_end_dt IS '有効終了日';
COMMENT ON COLUMN sskadminuser.m_item.input_end_dt IS '入力終了日';
COMMENT ON COLUMN sskadminuser.m_item.official_name IS 'オフィシャル名';
COMMENT ON COLUMN sskadminuser.m_item.item_name IS '商品名称';
COMMENT ON COLUMN sskadminuser.m_item.item_name_12 IS '商品名称12';
COMMENT ON COLUMN sskadminuser.m_item.item_name_10 IS '商品名称10';
COMMENT ON COLUMN sskadminuser.m_item.item_name_6 IS '商品名称6';
COMMENT ON COLUMN sskadminuser.m_item.item_name_5 IS '商品名称5';
COMMENT ON COLUMN sskadminuser.m_item.item_name_4 IS '商品名称4';
COMMENT ON COLUMN sskadminuser.m_item.price IS '価格';
COMMENT ON COLUMN sskadminuser.m_item.point IS 'ポイント';
COMMENT ON COLUMN sskadminuser.m_item.item_kbn IS '商品区分';
COMMENT ON COLUMN sskadminuser.m_item.item_disp_turn IS '商品表示順';
COMMENT ON COLUMN sskadminuser.m_item.ope_kbn IS '事業区分';
COMMENT ON COLUMN sskadminuser.m_item.pre_kbn IS 'プレゼント区分';
COMMENT ON COLUMN sskadminuser.m_item.tax_kbn IS '課税区分';
COMMENT ON COLUMN sskadminuser.m_item.shin_item_flg IS '進商品フラグ';
COMMENT ON COLUMN sskadminuser.m_item.update_date IS '更新日時';
COMMENT ON COLUMN sskadminuser.m_item.register_date IS '登録日時';
COMMENT ON COLUMN sskadminuser.m_item.update_user_cd IS '更新者';
COMMENT ON COLUMN sskadminuser.m_item.register_user_cd IS '登録者';
COMMENT ON COLUMN sskadminuser.m_item.item_form_kbn IS '商品形状区分';
COMMENT ON COLUMN sskadminuser.m_item.item_lvl IS '商品レベル';
COMMENT ON COLUMN sskadminuser.m_item.tax_rate_cd IS '税率コード';
-- CREATE INDEX 
CREATE INDEX idx_m_item_01 ON sskadminuser.m_item (item_cd);
CREATE INDEX idx_m_item_02 ON sskadminuser.m_item (item_cd,item_lvl);
CREATE INDEX idx_m_item_03 ON sskadminuser.m_item (update_date,register_date);
-- END TABLE : sskadminuser.m_item  --

-- START TABLE : sskadminuser.m_static_param_ctrl  --
CREATE TABLE sskadminuser.m_static_param_ctrl(
param_key VARCHAR(100) NOT NULL,
param VARCHAR(500) NOT NULL,
param_comment VARCHAR(500),
update_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
register_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
update_user_cd VARCHAR(64) NOT NULL,
register_user_cd VARCHAR(64) NOT NULL,
CONSTRAINT pk_m_static_param_ctrl PRIMARY KEY (param_key)
);
-- ADD COLUMN
COMMENT ON TABLE sskadminuser.m_static_param_ctrl IS '静的パラメータ管理台帳';
COMMENT ON COLUMN sskadminuser.m_static_param_ctrl.param_key IS 'パラメータキー';
COMMENT ON COLUMN sskadminuser.m_static_param_ctrl.param IS 'パラメータ';
COMMENT ON COLUMN sskadminuser.m_static_param_ctrl.param_comment IS 'パラメータコメント';
COMMENT ON COLUMN sskadminuser.m_static_param_ctrl.update_date IS '更新日時';
COMMENT ON COLUMN sskadminuser.m_static_param_ctrl.register_date IS '登録日時';
COMMENT ON COLUMN sskadminuser.m_static_param_ctrl.update_user_cd IS '更新者';
COMMENT ON COLUMN sskadminuser.m_static_param_ctrl.register_user_cd IS '登録者';
-- CREATE INDEX 
CREATE INDEX idx_m_static_param_ctrl_01 ON sskadminuser.m_static_param_ctrl (update_date,register_date);
-- END TABLE : sskadminuser.m_static_param_ctrl  --

-- START TABLE : sskadminuser.m_sys_set  --
CREATE TABLE sskadminuser.m_sys_set(
stat_kbn INT NOT NULL,
site_kbn CHAR(1) NOT NULL,
offline_plan_dt TIMESTAMP(0) WITHOUT TIME ZONE,
tax_rate DECIMAL(5,3) NOT NULL,
update_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
register_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
update_user_cd VARCHAR(64) NOT NULL,
register_user_cd VARCHAR(64) NOT NULL,
CONSTRAINT pk_m_sys_set PRIMARY KEY (stat_kbn,site_kbn)
);
-- ADD COLUMN
COMMENT ON TABLE sskadminuser.m_sys_set IS 'システム設定台帳';
COMMENT ON COLUMN sskadminuser.m_sys_set.stat_kbn IS '状態区分';
COMMENT ON COLUMN sskadminuser.m_sys_set.site_kbn IS 'サイト区分';
COMMENT ON COLUMN sskadminuser.m_sys_set.offline_plan_dt IS 'オフライン予定日';
COMMENT ON COLUMN sskadminuser.m_sys_set.tax_rate IS '消費税率';
COMMENT ON COLUMN sskadminuser.m_sys_set.update_date IS '更新日時';
COMMENT ON COLUMN sskadminuser.m_sys_set.register_date IS '登録日時';
COMMENT ON COLUMN sskadminuser.m_sys_set.update_user_cd IS '更新者';
COMMENT ON COLUMN sskadminuser.m_sys_set.register_user_cd IS '登録者';
-- CREATE INDEX 
CREATE INDEX idx_m_sys_set_01 ON sskadminuser.m_sys_set (update_date,register_date);
-- END TABLE : sskadminuser.m_sys_set  --

-- START TABLE : sskadminuser.m_tax_rate  --
CREATE TABLE sskadminuser.m_tax_rate(
tax_rate_cd INT NOT NULL,
tax_rate INT NOT NULL,
app_start_dt_tm TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL,
app_end_dt_tm TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL,
tax_kbn CHAR(1) NOT NULL,
update_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
register_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
update_user_cd VARCHAR(64) NOT NULL,
register_user_cd VARCHAR(64) NOT NULL,
reduced_tax_rate_kbn INT NOT NULL DEFAULT 0,
CONSTRAINT pk_m_tax_rate PRIMARY KEY (tax_rate_cd)
);
-- ADD COLUMN
COMMENT ON TABLE sskadminuser.m_tax_rate IS '税率台帳';
COMMENT ON COLUMN sskadminuser.m_tax_rate.tax_rate_cd IS '税率コード';
COMMENT ON COLUMN sskadminuser.m_tax_rate.tax_rate IS '消費税率';
COMMENT ON COLUMN sskadminuser.m_tax_rate.app_start_dt_tm IS '適用開始日時';
COMMENT ON COLUMN sskadminuser.m_tax_rate.app_end_dt_tm IS '適用終了日時';
COMMENT ON COLUMN sskadminuser.m_tax_rate.tax_kbn IS '課税区分';
COMMENT ON COLUMN sskadminuser.m_tax_rate.update_date IS '更新日時';
COMMENT ON COLUMN sskadminuser.m_tax_rate.register_date IS '登録日時';
COMMENT ON COLUMN sskadminuser.m_tax_rate.update_user_cd IS '更新者';
COMMENT ON COLUMN sskadminuser.m_tax_rate.register_user_cd IS '登録者';
COMMENT ON COLUMN sskadminuser.m_tax_rate.reduced_tax_rate_kbn IS '軽減税率区分';
-- CREATE INDEX 
CREATE INDEX idx_m_tax_rate_01 ON sskadminuser.m_tax_rate (app_start_dt_tm,app_end_dt_tm);
CREATE INDEX idx_m_tax_rate_02 ON sskadminuser.m_tax_rate (update_date,register_date);
-- END TABLE : sskadminuser.m_tax_rate  --

-- START TABLE : sskadminuser.m_telegram_ctrl  --
CREATE TABLE sskadminuser.m_telegram_ctrl(
telegram_kbn VARCHAR(10) NOT NULL,
send_flg CHAR(1) NOT NULL,
update_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
register_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
update_user_cd VARCHAR(64) NOT NULL,
register_user_cd VARCHAR(64) NOT NULL,
telegram_explain VARCHAR(40)
);
-- ADD COLUMN
COMMENT ON TABLE sskadminuser.m_telegram_ctrl IS '電文管理台帳';
COMMENT ON COLUMN sskadminuser.m_telegram_ctrl.telegram_kbn IS '電文区分';
COMMENT ON COLUMN sskadminuser.m_telegram_ctrl.send_flg IS '送信フラグ';
COMMENT ON COLUMN sskadminuser.m_telegram_ctrl.update_date IS '更新日時';
COMMENT ON COLUMN sskadminuser.m_telegram_ctrl.register_date IS '登録日時';
COMMENT ON COLUMN sskadminuser.m_telegram_ctrl.update_user_cd IS '更新者';
COMMENT ON COLUMN sskadminuser.m_telegram_ctrl.register_user_cd IS '登録者';
COMMENT ON COLUMN sskadminuser.m_telegram_ctrl.telegram_explain IS '電文説明';
-- CREATE INDEX 
CREATE INDEX idx_m_telegram_ctrl_01 ON sskadminuser.m_telegram_ctrl (telegram_kbn);
CREATE INDEX idx_m_telegram_ctrl_02 ON sskadminuser.m_telegram_ctrl (update_date,register_date);
-- END TABLE : sskadminuser.m_telegram_ctrl  --

-- START TABLE : sskadminuser.m_tool_authority  --
CREATE TABLE sskadminuser.m_tool_authority(
ctrl_scr_login_account VARCHAR(10) NOT NULL,
func_cd VARCHAR(10) NOT NULL,
view_flg CHAR(1) NOT NULL DEFAULT '0',
edit_flg CHAR(1) NOT NULL DEFAULT '0',
del_flg CHAR(1) NOT NULL DEFAULT '0',
update_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
register_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
update_user_cd VARCHAR(64) NOT NULL,
register_user_cd VARCHAR(64) NOT NULL,
CONSTRAINT pk_m_tool_authority PRIMARY KEY (ctrl_scr_login_account,func_cd)
);
-- ADD COLUMN
COMMENT ON TABLE sskadminuser.m_tool_authority IS 'ツール権限台帳';
COMMENT ON COLUMN sskadminuser.m_tool_authority.ctrl_scr_login_account IS '管理画面ログインアカウント';
COMMENT ON COLUMN sskadminuser.m_tool_authority.func_cd IS '機能コード';
COMMENT ON COLUMN sskadminuser.m_tool_authority.view_flg IS '閲覧フラグ';
COMMENT ON COLUMN sskadminuser.m_tool_authority.edit_flg IS '編集フラグ';
COMMENT ON COLUMN sskadminuser.m_tool_authority.del_flg IS '削除フラグ';
COMMENT ON COLUMN sskadminuser.m_tool_authority.update_date IS '更新日時';
COMMENT ON COLUMN sskadminuser.m_tool_authority.register_date IS '登録日時';
COMMENT ON COLUMN sskadminuser.m_tool_authority.update_user_cd IS '更新者';
COMMENT ON COLUMN sskadminuser.m_tool_authority.register_user_cd IS '登録者';
-- CREATE INDEX 
CREATE INDEX idx_m_tool_authority_01 ON sskadminuser.m_tool_authority (update_date,register_date);
-- END TABLE : sskadminuser.m_tool_authority  --

-- START TABLE : sskadminuser.f_vip_smpl_req_info_record  --
CREATE TABLE sskadminuser.f_vip_smpl_req_info_record(
vip_smpl_req_seq VARCHAR(32) NOT NULL,
site_kbn CHAR(2) NOT NULL,
acpt_dt_tm TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
rcv_kbn CHAR(1) NOT NULL,
tel_no VARCHAR(64),
mail_adr VARCHAR(180),
cust_name VARCHAR(104),
cust_name_kana VARCHAR(92),
sex_kbn CHAR(1),
post_no VARCHAR(8),
adr VARCHAR(180),
kana_adr VARCHAR(124),
adr_non_chg_part VARCHAR(124),
kana_adr_non_chg_part VARCHAR(124),
pref_cd CHAR(2),
other_comment VARCHAR(800),
ship_stat_kbn CHAR(1) NOT NULL DEFAULT '0',
del_flg CHAR(1) NOT NULL DEFAULT '0',
session_id VARCHAR(50),
update_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
register_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
update_user_cd VARCHAR(64) NOT NULL,
register_user_cd VARCHAR(64) NOT NULL,
CONSTRAINT pk_f_vip_smpl_req_info_record PRIMARY KEY (vip_smpl_req_seq)
);
-- ADD COLUMN
COMMENT ON TABLE sskadminuser.f_vip_smpl_req_info_record IS 'VIPサンプル請求情報記録伝票';
COMMENT ON COLUMN sskadminuser.f_vip_smpl_req_info_record.vip_smpl_req_seq IS 'VIPサンプル請求連番';
COMMENT ON COLUMN sskadminuser.f_vip_smpl_req_info_record.site_kbn IS 'サイト区分';
COMMENT ON COLUMN sskadminuser.f_vip_smpl_req_info_record.acpt_dt_tm IS '受付日時';
COMMENT ON COLUMN sskadminuser.f_vip_smpl_req_info_record.rcv_kbn IS '受け区分';
COMMENT ON COLUMN sskadminuser.f_vip_smpl_req_info_record.tel_no IS '電話番号';
COMMENT ON COLUMN sskadminuser.f_vip_smpl_req_info_record.mail_adr IS 'メールアドレス';
COMMENT ON COLUMN sskadminuser.f_vip_smpl_req_info_record.cust_name IS '会員氏名';
COMMENT ON COLUMN sskadminuser.f_vip_smpl_req_info_record.cust_name_kana IS '会員氏名カナ';
COMMENT ON COLUMN sskadminuser.f_vip_smpl_req_info_record.sex_kbn IS '性別区分';
COMMENT ON COLUMN sskadminuser.f_vip_smpl_req_info_record.post_no IS '郵便番号';
COMMENT ON COLUMN sskadminuser.f_vip_smpl_req_info_record.adr IS '住所';
COMMENT ON COLUMN sskadminuser.f_vip_smpl_req_info_record.kana_adr IS 'カナ住所';
COMMENT ON COLUMN sskadminuser.f_vip_smpl_req_info_record.adr_non_chg_part IS '住所非変換部';
COMMENT ON COLUMN sskadminuser.f_vip_smpl_req_info_record.kana_adr_non_chg_part IS 'カナ住所非変換部';
COMMENT ON COLUMN sskadminuser.f_vip_smpl_req_info_record.pref_cd IS '県コード';
COMMENT ON COLUMN sskadminuser.f_vip_smpl_req_info_record.other_comment IS 'その他コメント';
COMMENT ON COLUMN sskadminuser.f_vip_smpl_req_info_record.ship_stat_kbn IS '発送状態区分';
COMMENT ON COLUMN sskadminuser.f_vip_smpl_req_info_record.del_flg IS '削除フラグ';
COMMENT ON COLUMN sskadminuser.f_vip_smpl_req_info_record.session_id IS 'セッションID';
COMMENT ON COLUMN sskadminuser.f_vip_smpl_req_info_record.update_date IS '更新日時';
COMMENT ON COLUMN sskadminuser.f_vip_smpl_req_info_record.register_date IS '登録日時';
COMMENT ON COLUMN sskadminuser.f_vip_smpl_req_info_record.update_user_cd IS '更新者';
COMMENT ON COLUMN sskadminuser.f_vip_smpl_req_info_record.register_user_cd IS '登録者';
-- CREATE INDEX 
CREATE INDEX idx_f_vip_smpl_req_info_record_01 ON sskadminuser.f_vip_smpl_req_info_record (site_kbn);
CREATE INDEX idx_f_vip_smpl_req_info_record_02 ON sskadminuser.f_vip_smpl_req_info_record (acpt_dt_tm);
CREATE INDEX idx_f_vip_smpl_req_info_record_03 ON sskadminuser.f_vip_smpl_req_info_record (del_flg);
CREATE INDEX idx_f_vip_smpl_req_info_record_04 ON sskadminuser.f_vip_smpl_req_info_record (session_id);
CREATE INDEX idx_f_vip_smpl_req_info_record_05 ON sskadminuser.f_vip_smpl_req_info_record (update_date,register_date);
-- END TABLE : sskadminuser.f_vip_smpl_req_info_record  --

-- START TABLE : sskadminuser.h_operat_item  --
CREATE TABLE sskadminuser.h_operat_item(
mbr_seq BIGINT NOT NULL,
proc_dt TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT current_timestamp(0),
item_kbn CHAR(1),
item_cd VARCHAR(5),
item_lvl INT,
num INT,
sync_flg CHAR(1),
update_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
register_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
update_user_cd VARCHAR(64) NOT NULL,
register_user_cd VARCHAR(64) NOT NULL
);
-- ADD COLUMN
COMMENT ON TABLE sskadminuser.h_operat_item IS '商品操作履歴';
COMMENT ON COLUMN sskadminuser.h_operat_item.mbr_seq IS '会員連番';
COMMENT ON COLUMN sskadminuser.h_operat_item.proc_dt IS '処理日';
COMMENT ON COLUMN sskadminuser.h_operat_item.item_kbn IS '商品区分';
COMMENT ON COLUMN sskadminuser.h_operat_item.item_cd IS '商品コード';
COMMENT ON COLUMN sskadminuser.h_operat_item.item_lvl IS '商品レベル';
COMMENT ON COLUMN sskadminuser.h_operat_item.num IS '数';
COMMENT ON COLUMN sskadminuser.h_operat_item.sync_flg IS '同期フラグ';
COMMENT ON COLUMN sskadminuser.h_operat_item.update_date IS '更新日時';
COMMENT ON COLUMN sskadminuser.h_operat_item.register_date IS '登録日時';
COMMENT ON COLUMN sskadminuser.h_operat_item.update_user_cd IS '更新者';
COMMENT ON COLUMN sskadminuser.h_operat_item.register_user_cd IS '登録者';
-- CREATE INDEX 
CREATE INDEX idx_h_operat_item_01 ON sskadminuser.h_operat_item (mbr_seq,proc_dt);
CREATE INDEX idx_h_operat_item_02 ON sskadminuser.h_operat_item (sync_flg);
CREATE INDEX idx_h_operat_item_03 ON sskadminuser.h_operat_item (update_date,register_date);
CREATE UNIQUE INDEX idx_h_operat_item_04 ON sskadminuser.h_operat_item (mbr_seq,proc_dt,item_cd,item_lvl);
-- END TABLE : sskadminuser.h_operat_item  --

-- START TABLE : sskadminuser.h_mbr_upd  --
CREATE TABLE sskadminuser.h_mbr_upd(
mbr_seq BIGINT NOT NULL,
cust_no INT,
net_mbr_cd VARCHAR(12),
pwd VARCHAR(108),
mail_adr VARCHAR(180),
mail_notice_flg CHAR(1),
dm_mail_notice_flg INT,
mail_style_kbn INT DEFAULT 0,
err_mail_flg INT,
msg VARCHAR(100) NOT NULL,
site_kbn CHAR(1) NOT NULL,
update_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
register_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
update_user_cd VARCHAR(64) NOT NULL,
register_user_cd VARCHAR(64) NOT NULL,
dm_flg CHAR(1)
);
-- ADD COLUMN
COMMENT ON TABLE sskadminuser.h_mbr_upd IS '会員変更履歴';
COMMENT ON COLUMN sskadminuser.h_mbr_upd.mbr_seq IS '会員連番';
COMMENT ON COLUMN sskadminuser.h_mbr_upd.cust_no IS '会員番号';
COMMENT ON COLUMN sskadminuser.h_mbr_upd.net_mbr_cd IS 'ネット会員コード';
COMMENT ON COLUMN sskadminuser.h_mbr_upd.pwd IS 'パスワード';
COMMENT ON COLUMN sskadminuser.h_mbr_upd.mail_adr IS 'メールアドレス';
COMMENT ON COLUMN sskadminuser.h_mbr_upd.mail_notice_flg IS 'メール通知フラグ';
COMMENT ON COLUMN sskadminuser.h_mbr_upd.dm_mail_notice_flg IS 'ＤＭ的メール通知フラグ';
COMMENT ON COLUMN sskadminuser.h_mbr_upd.mail_style_kbn IS 'メール形式区分';
COMMENT ON COLUMN sskadminuser.h_mbr_upd.err_mail_flg IS 'エラーメールフラグ';
COMMENT ON COLUMN sskadminuser.h_mbr_upd.msg IS 'メッセージ';
COMMENT ON COLUMN sskadminuser.h_mbr_upd.site_kbn IS 'サイト区分';
COMMENT ON COLUMN sskadminuser.h_mbr_upd.update_date IS '更新日時';
COMMENT ON COLUMN sskadminuser.h_mbr_upd.register_date IS '登録日時';
COMMENT ON COLUMN sskadminuser.h_mbr_upd.update_user_cd IS '更新者';
COMMENT ON COLUMN sskadminuser.h_mbr_upd.register_user_cd IS '登録者';
COMMENT ON COLUMN sskadminuser.h_mbr_upd.dm_flg IS 'ＤＭフラグ';
-- CREATE INDEX 
CREATE INDEX idx_h_mbr_upd_01 ON sskadminuser.h_mbr_upd (mbr_seq,cust_no);
CREATE INDEX idx_h_mbr_upd_02 ON sskadminuser.h_mbr_upd (site_kbn);
CREATE INDEX idx_h_mbr_upd_03 ON sskadminuser.h_mbr_upd (update_date,register_date);
-- END TABLE : sskadminuser.h_mbr_upd  --

-- START TABLE : sskadminuser.s_skin_karte_ans_avg_val  --
CREATE TABLE sskadminuser.s_skin_karte_ans_avg_val(
ptn_cd CHAR(5) NOT NULL,
question_cd CHAR(4) NOT NULL,
ans_30_age_zone_under CHAR(2),
ans_40_age_zone_under CHAR(2),
ans_50_age_zone_under CHAR(2),
ans_60_age_zone_under CHAR(2),
ans_all_age_zone CHAR(2),
update_date TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT current_timestamp(0),
register_date TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT current_timestamp(0),
update_user_cd VARCHAR(64),
register_user_cd VARCHAR(64),
CONSTRAINT pk_s_skin_karte_ans_avg_val PRIMARY KEY (ptn_cd,question_cd)
);
-- ADD COLUMN
COMMENT ON TABLE sskadminuser.s_skin_karte_ans_avg_val IS '素肌カルテ回答平均値集計表';
COMMENT ON COLUMN sskadminuser.s_skin_karte_ans_avg_val.ptn_cd IS 'パターンコード';
COMMENT ON COLUMN sskadminuser.s_skin_karte_ans_avg_val.question_cd IS '質問コード';
COMMENT ON COLUMN sskadminuser.s_skin_karte_ans_avg_val.ans_30_age_zone_under IS '回答[30代以下]';
COMMENT ON COLUMN sskadminuser.s_skin_karte_ans_avg_val.ans_40_age_zone_under IS '回答[40代以下]';
COMMENT ON COLUMN sskadminuser.s_skin_karte_ans_avg_val.ans_50_age_zone_under IS '回答[50代以下]';
COMMENT ON COLUMN sskadminuser.s_skin_karte_ans_avg_val.ans_60_age_zone_under IS '回答[60代以下]';
COMMENT ON COLUMN sskadminuser.s_skin_karte_ans_avg_val.ans_all_age_zone IS '回答[全年代]';
COMMENT ON COLUMN sskadminuser.s_skin_karte_ans_avg_val.update_date IS '更新日時';
COMMENT ON COLUMN sskadminuser.s_skin_karte_ans_avg_val.register_date IS '登録日時';
COMMENT ON COLUMN sskadminuser.s_skin_karte_ans_avg_val.update_user_cd IS '更新者';
COMMENT ON COLUMN sskadminuser.s_skin_karte_ans_avg_val.register_user_cd IS '登録者';
-- CREATE INDEX 
CREATE INDEX idx_s_skin_karte_ans_avg_val_01 ON sskadminuser.s_skin_karte_ans_avg_val (update_date,register_date);
-- END TABLE : sskadminuser.s_skin_karte_ans_avg_val  --

-- START TABLE : sskadminuser.f_a140  --
CREATE TABLE sskadminuser.f_a140(
send_dt_tm TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL,
site_kbn CHAR(1),
cust_no INT,
session_id VARCHAR(32),
session_get_dt_tm TIMESTAMP(0) WITHOUT TIME ZONE,
core_sys_send_data VARCHAR(4000),
core_sys_rcv_data VARCHAR(4000),
core_sys_send_rslt_flg CHAR(1),
update_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
register_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
update_user_cd VARCHAR(64) NOT NULL,
register_user_cd VARCHAR(64) NOT NULL
);
-- ADD COLUMN
COMMENT ON TABLE sskadminuser.f_a140 IS 'A140伝票';
COMMENT ON COLUMN sskadminuser.f_a140.send_dt_tm IS '送信日時';
COMMENT ON COLUMN sskadminuser.f_a140.site_kbn IS 'サイト区分';
COMMENT ON COLUMN sskadminuser.f_a140.cust_no IS '会員番号';
COMMENT ON COLUMN sskadminuser.f_a140.session_id IS 'セッションID';
COMMENT ON COLUMN sskadminuser.f_a140.session_get_dt_tm IS 'セッション取得日時';
COMMENT ON COLUMN sskadminuser.f_a140.core_sys_send_data IS '基幹送信データ';
COMMENT ON COLUMN sskadminuser.f_a140.core_sys_rcv_data IS '基幹受信データ';
COMMENT ON COLUMN sskadminuser.f_a140.core_sys_send_rslt_flg IS '基幹送信結果フラグ';
COMMENT ON COLUMN sskadminuser.f_a140.update_date IS '更新日時';
COMMENT ON COLUMN sskadminuser.f_a140.register_date IS '登録日時';
COMMENT ON COLUMN sskadminuser.f_a140.update_user_cd IS '更新者';
COMMENT ON COLUMN sskadminuser.f_a140.register_user_cd IS '登録者';
-- CREATE INDEX 
CREATE INDEX idx_f_a140_01 ON sskadminuser.f_a140 (send_dt_tm);
CREATE INDEX idx_f_a140_02 ON sskadminuser.f_a140 (site_kbn);
CREATE INDEX idx_f_a140_03 ON sskadminuser.f_a140 (cust_no);
CREATE INDEX idx_f_a140_04 ON sskadminuser.f_a140 (session_id);
CREATE INDEX idx_f_a140_05 ON sskadminuser.f_a140 (session_get_dt_tm);
CREATE INDEX idx_f_a140_06 ON sskadminuser.f_a140 (update_date,register_date);
-- END TABLE : sskadminuser.f_a140  --

-- START TABLE : sskadminuser.h_e_pay_authori  --
CREATE TABLE sskadminuser.h_e_pay_authori(
hist_seq BIGINT NOT NULL,
odr_kbn CHAR(2),
odr_no BIGINT,
credit_corp_kbn CHAR(2),
trade_dt_tm CHAR(14),
trade_cd CHAR(88),
trade_pwd CHAR(88),
order_cd CHAR(64),
e_pay_account_cd VARCHAR(88),
update_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
update_user_cd VARCHAR(64),
register_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
register_user_cd VARCHAR(64),
CONSTRAINT pk_h_e_pay_authori PRIMARY KEY (hist_seq)
);
-- ADD COLUMN
COMMENT ON TABLE sskadminuser.h_e_pay_authori IS '電子決済オーソリ履歴';
COMMENT ON COLUMN sskadminuser.h_e_pay_authori.hist_seq IS '履歴連番';
COMMENT ON COLUMN sskadminuser.h_e_pay_authori.odr_kbn IS '注文区分';
COMMENT ON COLUMN sskadminuser.h_e_pay_authori.odr_no IS '注文番号';
COMMENT ON COLUMN sskadminuser.h_e_pay_authori.credit_corp_kbn IS '決済代行会社区分';
COMMENT ON COLUMN sskadminuser.h_e_pay_authori.trade_dt_tm IS '取引日時';
COMMENT ON COLUMN sskadminuser.h_e_pay_authori.trade_cd IS '取引コード';
COMMENT ON COLUMN sskadminuser.h_e_pay_authori.trade_pwd IS '取引パスワード';
COMMENT ON COLUMN sskadminuser.h_e_pay_authori.order_cd IS 'オーダーコード';
COMMENT ON COLUMN sskadminuser.h_e_pay_authori.e_pay_account_cd IS '電子決済アカウントコード';
COMMENT ON COLUMN sskadminuser.h_e_pay_authori.update_date IS '更新日時';
COMMENT ON COLUMN sskadminuser.h_e_pay_authori.update_user_cd IS '更新者';
COMMENT ON COLUMN sskadminuser.h_e_pay_authori.register_date IS '登録日時';
COMMENT ON COLUMN sskadminuser.h_e_pay_authori.register_user_cd IS '登録者';
-- CREATE INDEX 
CREATE INDEX idx_h_e_pay_authori_01 ON sskadminuser.h_e_pay_authori (odr_kbn,odr_no);
CREATE INDEX idx_h_e_pay_authori_02 ON sskadminuser.h_e_pay_authori (update_date,register_date);
-- END TABLE : sskadminuser.h_e_pay_authori  --

-- START TABLE : sskadminuser.h_trans_for_e_pay  --
CREATE TABLE sskadminuser.h_trans_for_e_pay(
hist_no BIGINT NOT NULL,
credit_corp_kbn CHAR(2),
trade_dt_tm CHAR(14),
cust_no INT NOT NULL,
trade_cd CHAR(88),
trade_pwd CHAR(88),
order_cd CHAR(64),
e_pay_account_cd VARCHAR(64),
bill_no VARCHAR(5) NOT NULL,
pay_cnt CHAR(2),
odr_amnt INT,
update_date TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT current_timestamp(0),
register_date TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT current_timestamp(0),
update_user_cd VARCHAR(64),
register_user_cd VARCHAR(64),
del_flg CHAR(1) NOT NULL DEFAULT '0',
core_sys_kbn INT NOT NULL DEFAULT 0,
CONSTRAINT pk_h_trans_for_e_pay PRIMARY KEY (hist_no)
);
-- ADD COLUMN
COMMENT ON TABLE sskadminuser.h_trans_for_e_pay IS '振込用電子決済履歴';
COMMENT ON COLUMN sskadminuser.h_trans_for_e_pay.hist_no IS '履歴番号';
COMMENT ON COLUMN sskadminuser.h_trans_for_e_pay.credit_corp_kbn IS '決済代行会社区分';
COMMENT ON COLUMN sskadminuser.h_trans_for_e_pay.trade_dt_tm IS '取引日時';
COMMENT ON COLUMN sskadminuser.h_trans_for_e_pay.cust_no IS '会員番号';
COMMENT ON COLUMN sskadminuser.h_trans_for_e_pay.trade_cd IS '取引コード';
COMMENT ON COLUMN sskadminuser.h_trans_for_e_pay.trade_pwd IS '取引パスワード';
COMMENT ON COLUMN sskadminuser.h_trans_for_e_pay.order_cd IS 'オーダーコード';
COMMENT ON COLUMN sskadminuser.h_trans_for_e_pay.e_pay_account_cd IS '電子決済アカウントコード';
COMMENT ON COLUMN sskadminuser.h_trans_for_e_pay.bill_no IS '請求書番号';
COMMENT ON COLUMN sskadminuser.h_trans_for_e_pay.pay_cnt IS '支払回数';
COMMENT ON COLUMN sskadminuser.h_trans_for_e_pay.odr_amnt IS '注文金額';
COMMENT ON COLUMN sskadminuser.h_trans_for_e_pay.update_date IS '更新日時';
COMMENT ON COLUMN sskadminuser.h_trans_for_e_pay.register_date IS '登録日時';
COMMENT ON COLUMN sskadminuser.h_trans_for_e_pay.update_user_cd IS '更新者';
COMMENT ON COLUMN sskadminuser.h_trans_for_e_pay.register_user_cd IS '登録者';
COMMENT ON COLUMN sskadminuser.h_trans_for_e_pay.del_flg IS '削除フラグ';
COMMENT ON COLUMN sskadminuser.h_trans_for_e_pay.core_sys_kbn IS '基幹区分';
-- CREATE INDEX 
CREATE INDEX idx_h_trans_for_e_pay_01 ON sskadminuser.h_trans_for_e_pay (cust_no);
CREATE INDEX idx_h_trans_for_e_pay_02 ON sskadminuser.h_trans_for_e_pay (update_date,register_date);
-- END TABLE : sskadminuser.h_trans_for_e_pay  --

-- START TABLE : sskadminuser.f_a150  --
CREATE TABLE sskadminuser.f_a150(
send_dt_tm TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL,
site_kbn CHAR(1),
cust_no INT,
session_id VARCHAR(32),
session_get_dt_tm TIMESTAMP(0) WITHOUT TIME ZONE,
core_sys_send_data VARCHAR(4000),
core_sys_rcv_data VARCHAR(4000),
core_sys_send_rslt_flg CHAR(1),
update_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
register_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
update_user_cd VARCHAR(64) NOT NULL,
register_user_cd VARCHAR(64) NOT NULL
);
-- ADD COLUMN
COMMENT ON TABLE sskadminuser.f_a150 IS 'A150伝票';
COMMENT ON COLUMN sskadminuser.f_a150.send_dt_tm IS '送信日時';
COMMENT ON COLUMN sskadminuser.f_a150.site_kbn IS 'サイト区分';
COMMENT ON COLUMN sskadminuser.f_a150.cust_no IS '会員番号';
COMMENT ON COLUMN sskadminuser.f_a150.session_id IS 'セッションID';
COMMENT ON COLUMN sskadminuser.f_a150.session_get_dt_tm IS 'セッション取得日時';
COMMENT ON COLUMN sskadminuser.f_a150.core_sys_send_data IS '基幹送信データ';
COMMENT ON COLUMN sskadminuser.f_a150.core_sys_rcv_data IS '基幹受信データ';
COMMENT ON COLUMN sskadminuser.f_a150.core_sys_send_rslt_flg IS '基幹送信結果フラグ';
COMMENT ON COLUMN sskadminuser.f_a150.update_date IS '更新日時';
COMMENT ON COLUMN sskadminuser.f_a150.register_date IS '登録日時';
COMMENT ON COLUMN sskadminuser.f_a150.update_user_cd IS '更新者';
COMMENT ON COLUMN sskadminuser.f_a150.register_user_cd IS '登録者';
-- CREATE INDEX 
CREATE INDEX idx_f_a150_01 ON sskadminuser.f_a150 (cust_no);
CREATE INDEX idx_f_a150_02 ON sskadminuser.f_a150 (update_date,register_date);
-- END TABLE : sskadminuser.f_a150  --

-- START TABLE : sskadminuser.m_except_string  --
CREATE TABLE sskadminuser.m_except_string(
except_string_cd INT NOT NULL,
func_kbn INT NOT NULL,
except_string VARCHAR(20) NOT NULL,
note VARCHAR(128),
update_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
register_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
update_user_cd VARCHAR(64) NOT NULL,
register_user_cd VARCHAR(64) NOT NULL,
CONSTRAINT pk_m_except_string PRIMARY KEY (except_string_cd)
);
-- ADD COLUMN
COMMENT ON TABLE sskadminuser.m_except_string IS '除外文字列台帳';
COMMENT ON COLUMN sskadminuser.m_except_string.except_string_cd IS '除外文字列コード';
COMMENT ON COLUMN sskadminuser.m_except_string.func_kbn IS '機能区分';
COMMENT ON COLUMN sskadminuser.m_except_string.except_string IS '除外文字列';
COMMENT ON COLUMN sskadminuser.m_except_string.note IS '備考';
COMMENT ON COLUMN sskadminuser.m_except_string.update_date IS '更新日時';
COMMENT ON COLUMN sskadminuser.m_except_string.register_date IS '登録日時';
COMMENT ON COLUMN sskadminuser.m_except_string.update_user_cd IS '更新者';
COMMENT ON COLUMN sskadminuser.m_except_string.register_user_cd IS '登録者';
-- CREATE INDEX 
CREATE INDEX idx_m_except_string_01 ON sskadminuser.m_except_string (update_date,register_date);
-- END TABLE : sskadminuser.m_except_string  --

-- START TABLE : sskadminuser.f_indiv_act_mail_send_kbn  --
CREATE TABLE sskadminuser.f_indiv_act_mail_send_kbn(
indiv_act_mail_send_info_cd DOUBLE PRECISION NOT NULL,
indiv_act_mail_send_hist_cd DOUBLE PRECISION NOT NULL,
subject_mail_send_kbn INT NOT NULL,
body_letter_mail_send_kbn INT NOT NULL,
update_date TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT current_timestamp(0),
register_date TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT current_timestamp(0),
update_user_cd VARCHAR(64) NOT NULL,
register_user_cd VARCHAR(64) NOT NULL,
CONSTRAINT pk_f_indiv_act_mail_send_kbn PRIMARY KEY (indiv_act_mail_send_info_cd)
);
-- ADD COLUMN
COMMENT ON TABLE sskadminuser.f_indiv_act_mail_send_kbn IS '個別対応メール送信区分伝票';
COMMENT ON COLUMN sskadminuser.f_indiv_act_mail_send_kbn.indiv_act_mail_send_info_cd IS '個別対応メール送信情報コード';
COMMENT ON COLUMN sskadminuser.f_indiv_act_mail_send_kbn.indiv_act_mail_send_hist_cd IS '個別対応メール送信履歴コード';
COMMENT ON COLUMN sskadminuser.f_indiv_act_mail_send_kbn.subject_mail_send_kbn IS '件名メール送信区分';
COMMENT ON COLUMN sskadminuser.f_indiv_act_mail_send_kbn.body_letter_mail_send_kbn IS '本文メール送信区分';
COMMENT ON COLUMN sskadminuser.f_indiv_act_mail_send_kbn.update_date IS '更新日時';
COMMENT ON COLUMN sskadminuser.f_indiv_act_mail_send_kbn.register_date IS '登録日時';
COMMENT ON COLUMN sskadminuser.f_indiv_act_mail_send_kbn.update_user_cd IS '更新者';
COMMENT ON COLUMN sskadminuser.f_indiv_act_mail_send_kbn.register_user_cd IS '登録者';
-- CREATE INDEX 
CREATE INDEX idx_f_indiv_act_mail_send_kbn_01 ON sskadminuser.f_indiv_act_mail_send_kbn (indiv_act_mail_send_hist_cd);
CREATE INDEX idx_f_indiv_act_mail_send_kbn_02 ON sskadminuser.f_indiv_act_mail_send_kbn (subject_mail_send_kbn);
CREATE INDEX idx_f_indiv_act_mail_send_kbn_03 ON sskadminuser.f_indiv_act_mail_send_kbn (body_letter_mail_send_kbn);
CREATE INDEX idx_f_indiv_act_mail_send_kbn_04 ON sskadminuser.f_indiv_act_mail_send_kbn (update_date,register_date);
-- END TABLE : sskadminuser.f_indiv_act_mail_send_kbn  --

-- START TABLE : sskadminuser.m_indiv_act_mail_send_kbn  --
CREATE TABLE sskadminuser.m_indiv_act_mail_send_kbn(
indiv_act_mail_send_kbn DOUBLE PRECISION NOT NULL,
indiv_act_mail_send_kbn_name VARCHAR(100) NOT NULL,
indiv_act_mail_send_kbn_memo VARCHAR(200) NOT NULL,
indiv_act_mail_send_chk_string VARCHAR(100) NOT NULL,
update_date TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT current_timestamp(0),
register_date TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT current_timestamp(0),
update_user_cd VARCHAR(64) NOT NULL,
register_user_cd VARCHAR(64) NOT NULL,
CONSTRAINT pk_m_indiv_act_mail_send_kbn PRIMARY KEY (indiv_act_mail_send_kbn)
);
-- ADD COLUMN
COMMENT ON TABLE sskadminuser.m_indiv_act_mail_send_kbn IS '個別対応メール送信区分台帳';
COMMENT ON COLUMN sskadminuser.m_indiv_act_mail_send_kbn.indiv_act_mail_send_kbn IS '個別対応メール送信区分';
COMMENT ON COLUMN sskadminuser.m_indiv_act_mail_send_kbn.indiv_act_mail_send_kbn_name IS '個別対応メール送信区分名称';
COMMENT ON COLUMN sskadminuser.m_indiv_act_mail_send_kbn.indiv_act_mail_send_kbn_memo IS '個別対応メール送信区分メモ';
COMMENT ON COLUMN sskadminuser.m_indiv_act_mail_send_kbn.indiv_act_mail_send_chk_string IS '個別対応メール送信チェック文字列';
COMMENT ON COLUMN sskadminuser.m_indiv_act_mail_send_kbn.update_date IS '更新日時';
COMMENT ON COLUMN sskadminuser.m_indiv_act_mail_send_kbn.register_date IS '登録日時';
COMMENT ON COLUMN sskadminuser.m_indiv_act_mail_send_kbn.update_user_cd IS '更新者';
COMMENT ON COLUMN sskadminuser.m_indiv_act_mail_send_kbn.register_user_cd IS '登録者';
-- CREATE INDEX 
CREATE INDEX idx_m_indiv_act_mail_send_kbn_01 ON sskadminuser.m_indiv_act_mail_send_kbn (update_date,register_date);
-- END TABLE : sskadminuser.m_indiv_act_mail_send_kbn  --

-- START TABLE : sskadminuser.f_e_pay_fix_notice  --
CREATE TABLE sskadminuser.f_e_pay_fix_notice(
e_pay_fix_cd BIGINT NOT NULL,
credit_corp_kbn CHAR(2),
cust_no INT,
odr_cd CHAR(64) NOT NULL,
odr_amnt INT,
response_pay_way VARCHAR(20),
response_rslt CHAR(2),
response_tracking_cd CHAR(88),
response_sps_cust_no VARCHAR(12),
response_sps_pay_ctrl_no VARCHAR(3),
response_cust_pay_info VARCHAR(145),
response_fin_dt_tm CHAR(14),
response_err_cd VARCHAR(4),
response_dt_tm CHAR(14),
response_limit_tm VARCHAR(4),
update_date TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT current_timestamp(0),
register_date TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT current_timestamp(0),
update_user_cd VARCHAR(88),
register_user_cd VARCHAR(88),
CONSTRAINT pk_f_e_pay_fix_notice PRIMARY KEY (e_pay_fix_cd)
);
-- ADD COLUMN
COMMENT ON TABLE sskadminuser.f_e_pay_fix_notice IS '電子決済確定通知伝票';
COMMENT ON COLUMN sskadminuser.f_e_pay_fix_notice.e_pay_fix_cd IS '電子決済確定コード';
COMMENT ON COLUMN sskadminuser.f_e_pay_fix_notice.credit_corp_kbn IS '決済代行会社区分';
COMMENT ON COLUMN sskadminuser.f_e_pay_fix_notice.cust_no IS '会員番号';
COMMENT ON COLUMN sskadminuser.f_e_pay_fix_notice.odr_cd IS '注文コード';
COMMENT ON COLUMN sskadminuser.f_e_pay_fix_notice.odr_amnt IS '注文金額';
COMMENT ON COLUMN sskadminuser.f_e_pay_fix_notice.response_pay_way IS 'レスポンス支払方法';
COMMENT ON COLUMN sskadminuser.f_e_pay_fix_notice.response_rslt IS 'レスポンス結果';
COMMENT ON COLUMN sskadminuser.f_e_pay_fix_notice.response_tracking_cd IS 'レスポンストラッキングコード';
COMMENT ON COLUMN sskadminuser.f_e_pay_fix_notice.response_sps_cust_no IS 'レスポンスSPS会員番号';
COMMENT ON COLUMN sskadminuser.f_e_pay_fix_notice.response_sps_pay_ctrl_no IS 'レスポンスSPS支払管理番号';
COMMENT ON COLUMN sskadminuser.f_e_pay_fix_notice.response_cust_pay_info IS 'レスポンス顧客決済情報';
COMMENT ON COLUMN sskadminuser.f_e_pay_fix_notice.response_fin_dt_tm IS 'レスポンス完了日時';
COMMENT ON COLUMN sskadminuser.f_e_pay_fix_notice.response_err_cd IS 'レスポンスエラーコード';
COMMENT ON COLUMN sskadminuser.f_e_pay_fix_notice.response_dt_tm IS 'レスポンス日時';
COMMENT ON COLUMN sskadminuser.f_e_pay_fix_notice.response_limit_tm IS 'レスポンス制限時間';
COMMENT ON COLUMN sskadminuser.f_e_pay_fix_notice.update_date IS '更新日時';
COMMENT ON COLUMN sskadminuser.f_e_pay_fix_notice.register_date IS '登録日時';
COMMENT ON COLUMN sskadminuser.f_e_pay_fix_notice.update_user_cd IS '更新者';
COMMENT ON COLUMN sskadminuser.f_e_pay_fix_notice.register_user_cd IS '登録者';
-- CREATE INDEX 
CREATE INDEX idx_f_e_pay_fix_notice_01 ON sskadminuser.f_e_pay_fix_notice (cust_no);
CREATE INDEX idx_f_e_pay_fix_notice_02 ON sskadminuser.f_e_pay_fix_notice (update_date,register_date);
-- END TABLE : sskadminuser.f_e_pay_fix_notice  --

-- START TABLE : sskadminuser.f_e_pay_cgi_response  --
CREATE TABLE sskadminuser.f_e_pay_cgi_response(
odr_no BIGINT NOT NULL,
odr_kbn CHAR(2) NOT NULL,
cust_no INT,
mbr_kbn CHAR(1),
attr_kbn CHAR(1),
proc_dt_tm TIMESTAMP(0) WITHOUT TIME ZONE,
mail_send_to VARCHAR(180),
mail_send_from VARCHAR(100),
mail_subject VARCHAR(500),
mail_cont TEXT,
net_mbr_cd VARCHAR(12) DEFAULT NULL,
net_mbr_pwd VARCHAR(108) DEFAULT NULL,
update_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
update_user_cd VARCHAR(64),
register_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
register_user_cd VARCHAR(64),
CONSTRAINT pk_f_e_pay_cgi_response PRIMARY KEY (odr_no,odr_kbn)
);
-- ADD COLUMN
COMMENT ON TABLE sskadminuser.f_e_pay_cgi_response IS '電子決済CGI応答伝票';
COMMENT ON COLUMN sskadminuser.f_e_pay_cgi_response.odr_no IS '注文番号';
COMMENT ON COLUMN sskadminuser.f_e_pay_cgi_response.odr_kbn IS '注文区分';
COMMENT ON COLUMN sskadminuser.f_e_pay_cgi_response.cust_no IS '会員番号';
COMMENT ON COLUMN sskadminuser.f_e_pay_cgi_response.mbr_kbn IS '会員区分';
COMMENT ON COLUMN sskadminuser.f_e_pay_cgi_response.attr_kbn IS '属性区分';
COMMENT ON COLUMN sskadminuser.f_e_pay_cgi_response.proc_dt_tm IS '処理日時';
COMMENT ON COLUMN sskadminuser.f_e_pay_cgi_response.mail_send_to IS 'メール送信先';
COMMENT ON COLUMN sskadminuser.f_e_pay_cgi_response.mail_send_from IS 'メール送信元';
COMMENT ON COLUMN sskadminuser.f_e_pay_cgi_response.mail_subject IS 'メール件名';
COMMENT ON COLUMN sskadminuser.f_e_pay_cgi_response.mail_cont IS 'メール内容';
COMMENT ON COLUMN sskadminuser.f_e_pay_cgi_response.net_mbr_cd IS 'ネット会員コード';
COMMENT ON COLUMN sskadminuser.f_e_pay_cgi_response.net_mbr_pwd IS 'ネット会員パスワード';
COMMENT ON COLUMN sskadminuser.f_e_pay_cgi_response.update_date IS '更新日時';
COMMENT ON COLUMN sskadminuser.f_e_pay_cgi_response.update_user_cd IS '更新者';
COMMENT ON COLUMN sskadminuser.f_e_pay_cgi_response.register_date IS '登録日時';
COMMENT ON COLUMN sskadminuser.f_e_pay_cgi_response.register_user_cd IS '登録者';
-- CREATE INDEX 
CREATE INDEX idx_f_e_pay_cgi_response_01 ON sskadminuser.f_e_pay_cgi_response (cust_no);
CREATE INDEX idx_f_e_pay_cgi_response_02 ON sskadminuser.f_e_pay_cgi_response (update_date,register_date);
-- END TABLE : sskadminuser.f_e_pay_cgi_response  --

-- START TABLE : sskadminuser.f_odr_stat_chk  --
CREATE TABLE sskadminuser.f_odr_stat_chk(
session_id VARCHAR(100) NOT NULL,
cust_no INT,
login_dt_tm TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT current_timestamp(0),
odr_fin_flg CHAR(1),
update_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
update_user_cd VARCHAR(64),
register_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
register_user_cd VARCHAR(64),
CONSTRAINT pk_f_odr_stat_chk PRIMARY KEY (session_id)
);
-- ADD COLUMN
COMMENT ON TABLE sskadminuser.f_odr_stat_chk IS '注文状況確認伝票';
COMMENT ON COLUMN sskadminuser.f_odr_stat_chk.session_id IS 'セッションID';
COMMENT ON COLUMN sskadminuser.f_odr_stat_chk.cust_no IS '会員番号';
COMMENT ON COLUMN sskadminuser.f_odr_stat_chk.login_dt_tm IS 'ログイン日時';
COMMENT ON COLUMN sskadminuser.f_odr_stat_chk.odr_fin_flg IS '注文済フラグ';
COMMENT ON COLUMN sskadminuser.f_odr_stat_chk.update_date IS '更新日時';
COMMENT ON COLUMN sskadminuser.f_odr_stat_chk.update_user_cd IS '更新者';
COMMENT ON COLUMN sskadminuser.f_odr_stat_chk.register_date IS '登録日時';
COMMENT ON COLUMN sskadminuser.f_odr_stat_chk.register_user_cd IS '登録者';
-- CREATE INDEX 
CREATE INDEX idx_f_odr_stat_chk_01 ON sskadminuser.f_odr_stat_chk (cust_no);
CREATE INDEX idx_f_odr_stat_chk_02 ON sskadminuser.f_odr_stat_chk (update_date,register_date);
-- END TABLE : sskadminuser.f_odr_stat_chk  --

-- START TABLE : sskadminuser.m_user_stat  --
CREATE TABLE sskadminuser.m_user_stat(
charge_cd VARCHAR(5) NOT NULL,
stat_kbn CHAR(1) NOT NULL,
cust_no INT,
update_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
CONSTRAINT pk_m_user_stat PRIMARY KEY (charge_cd)
);
-- ADD COLUMN
COMMENT ON TABLE sskadminuser.m_user_stat IS 'ユーザ状態台帳';
COMMENT ON COLUMN sskadminuser.m_user_stat.charge_cd IS '担当コード';
COMMENT ON COLUMN sskadminuser.m_user_stat.stat_kbn IS '状態区分';
COMMENT ON COLUMN sskadminuser.m_user_stat.cust_no IS '会員番号';
COMMENT ON COLUMN sskadminuser.m_user_stat.update_date IS '更新日時';
-- CREATE INDEX 
-- END TABLE : sskadminuser.m_user_stat  --

-- START TABLE : sskadminuser.f_a800  --
CREATE TABLE sskadminuser.f_a800(
send_dt_tm TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL,
site_kbn CHAR(1),
cust_no INT,
session_id VARCHAR(32),
session_get_dt_tm TIMESTAMP(0) WITHOUT TIME ZONE,
core_sys_send_data VARCHAR(4000),
core_sys_rcv_data VARCHAR(4000),
core_sys_send_rslt_flg CHAR(1),
update_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
register_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
update_user_cd VARCHAR(64) NOT NULL,
register_user_cd VARCHAR(64) NOT NULL
);
-- ADD COLUMN
COMMENT ON TABLE sskadminuser.f_a800 IS 'A800伝票';
COMMENT ON COLUMN sskadminuser.f_a800.send_dt_tm IS '送信日時';
COMMENT ON COLUMN sskadminuser.f_a800.site_kbn IS 'サイト区分';
COMMENT ON COLUMN sskadminuser.f_a800.cust_no IS '会員番号';
COMMENT ON COLUMN sskadminuser.f_a800.session_id IS 'セッションID';
COMMENT ON COLUMN sskadminuser.f_a800.session_get_dt_tm IS 'セッション取得日時';
COMMENT ON COLUMN sskadminuser.f_a800.core_sys_send_data IS '基幹送信データ';
COMMENT ON COLUMN sskadminuser.f_a800.core_sys_rcv_data IS '基幹受信データ';
COMMENT ON COLUMN sskadminuser.f_a800.core_sys_send_rslt_flg IS '基幹送信結果フラグ';
COMMENT ON COLUMN sskadminuser.f_a800.update_date IS '更新日時';
COMMENT ON COLUMN sskadminuser.f_a800.register_date IS '登録日時';
COMMENT ON COLUMN sskadminuser.f_a800.update_user_cd IS '更新者';
COMMENT ON COLUMN sskadminuser.f_a800.register_user_cd IS '登録者';
-- CREATE INDEX 
CREATE INDEX idx_f_a800_01 ON sskadminuser.f_a800 (send_dt_tm);
CREATE INDEX idx_f_a800_02 ON sskadminuser.f_a800 (site_kbn);
CREATE INDEX idx_f_a800_03 ON sskadminuser.f_a800 (cust_no);
CREATE INDEX idx_f_a800_04 ON sskadminuser.f_a800 (session_id);
CREATE INDEX idx_f_a800_05 ON sskadminuser.f_a800 (session_get_dt_tm);
CREATE INDEX idx_f_a800_06 ON sskadminuser.f_a800 (update_date,register_date);
-- END TABLE : sskadminuser.f_a800  --

-- START TABLE : sskadminuser.f_corona_voice  --
CREATE TABLE sskadminuser.f_corona_voice(
corona_voice_cd DECIMAL(20) NOT NULL,
nickname VARCHAR(20) NOT NULL,
comment VARCHAR(300) NOT NULL,
age_zone_kbn CHAR(1) NOT NULL,
icon CHAR(1) NOT NULL,
contribution_dt_tm TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT current_timestamp(0),
disp_flg CHAR(1) NOT NULL,
update_date TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT current_timestamp(0),
register_date TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT current_timestamp(0),
update_user_cd VARCHAR(64) NOT NULL,
register_user_cd VARCHAR(64) NOT NULL,
CONSTRAINT pk_f_corona_voice PRIMARY KEY (corona_voice_cd)
);
-- ADD COLUMN
COMMENT ON TABLE sskadminuser.f_corona_voice IS 'コロナのお声伝票';
COMMENT ON COLUMN sskadminuser.f_corona_voice.corona_voice_cd IS 'コロナのお声コード';
COMMENT ON COLUMN sskadminuser.f_corona_voice.nickname IS 'ニックネーム';
COMMENT ON COLUMN sskadminuser.f_corona_voice.comment IS 'コメント';
COMMENT ON COLUMN sskadminuser.f_corona_voice.age_zone_kbn IS '年代区分';
COMMENT ON COLUMN sskadminuser.f_corona_voice.icon IS 'アイコン';
COMMENT ON COLUMN sskadminuser.f_corona_voice.contribution_dt_tm IS '投稿日時';
COMMENT ON COLUMN sskadminuser.f_corona_voice.disp_flg IS '表示フラグ';
COMMENT ON COLUMN sskadminuser.f_corona_voice.update_date IS '更新日時';
COMMENT ON COLUMN sskadminuser.f_corona_voice.register_date IS '登録日時';
COMMENT ON COLUMN sskadminuser.f_corona_voice.update_user_cd IS '更新者';
COMMENT ON COLUMN sskadminuser.f_corona_voice.register_user_cd IS '登録者';
-- CREATE INDEX 
CREATE INDEX idx_f_corona_voice_01 ON sskadminuser.f_corona_voice (contribution_dt_tm);
CREATE INDEX idx_f_corona_voice_02 ON sskadminuser.f_corona_voice (disp_flg);
CREATE INDEX idx_f_corona_voice_03 ON sskadminuser.f_corona_voice (update_date,register_date);
-- END TABLE : sskadminuser.f_corona_voice  --

-- START TABLE : sskadminuser.m_faq_tag  --
CREATE TABLE sskadminuser.m_faq_tag(
faq_tag_cd BIGINT NOT NULL,
tag_name VARCHAR(60) NOT NULL,
faq_content_cd INT NOT NULL,
disp_turn INT DEFAULT 0,
update_date TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT current_timestamp(0),
register_date TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT current_timestamp(0),
update_user_cd VARCHAR(64) NOT NULL,
register_user_cd VARCHAR(64) NOT NULL,
CONSTRAINT pk_m_faq_tag PRIMARY KEY (faq_tag_cd)
);
-- ADD COLUMN
COMMENT ON TABLE sskadminuser.m_faq_tag IS 'FAQタグ台帳';
COMMENT ON COLUMN sskadminuser.m_faq_tag.faq_tag_cd IS 'FAQタグコード';
COMMENT ON COLUMN sskadminuser.m_faq_tag.tag_name IS 'タグ名';
COMMENT ON COLUMN sskadminuser.m_faq_tag.faq_content_cd IS 'FAQコンテンツコード';
COMMENT ON COLUMN sskadminuser.m_faq_tag.disp_turn IS '表示順';
COMMENT ON COLUMN sskadminuser.m_faq_tag.update_date IS '更新日時';
COMMENT ON COLUMN sskadminuser.m_faq_tag.register_date IS '登録日時';
COMMENT ON COLUMN sskadminuser.m_faq_tag.update_user_cd IS '更新者';
COMMENT ON COLUMN sskadminuser.m_faq_tag.register_user_cd IS '登録者';
-- CREATE INDEX 
CREATE INDEX idx_m_faq_tag_01 ON sskadminuser.m_faq_tag (faq_content_cd,disp_turn);
CREATE INDEX idx_m_faq_tag_02 ON sskadminuser.m_faq_tag (faq_content_cd);
CREATE INDEX idx_m_faq_tag_03 ON sskadminuser.m_faq_tag (update_date,register_date);
-- END TABLE : sskadminuser.m_faq_tag  --

-- START TABLE : sskadminuser.m_adr_1  --
CREATE TABLE sskadminuser.m_adr_1(
pref_adr_cd CHAR(2) NOT NULL,
city_adr_cd CHAR(3) NOT NULL,
other_adr_cd CHAR(3) NOT NULL,
street_adr_cd CHAR(3) NOT NULL,
new_adr_cd CHAR(11) NOT NULL,
post_no CHAR(7) NOT NULL,
old_post_no CHAR(7) NOT NULL,
pref_name CHAR(8) NOT NULL,
pref_kana_name CHAR(8) NOT NULL,
adr VARCHAR(120) NOT NULL,
adr_kana VARCHAR(116) NOT NULL,
street VARCHAR(36) NOT NULL,
street_kana VARCHAR(32) NOT NULL,
pref_len INT NOT NULL,
pref_kana_len INT NOT NULL,
city_len INT NOT NULL,
city_kana_len INT NOT NULL,
other_len INT NOT NULL,
other_kana_len INT NOT NULL,
street_len INT NOT NULL,
street_kana_len INT NOT NULL,
tot_len INT NOT NULL,
tot_kana_len INT NOT NULL,
abol_avail_flg INT NOT NULL,
abol_year_mth INT NOT NULL,
enforce_year_mth INT NOT NULL,
cust_barcd CHAR(13) NOT NULL,
barcd_len INT NOT NULL,
streetname_flg INT NOT NULL,
register_user_cd VARCHAR(13) NOT NULL,
register_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL,
update_user_cd VARCHAR(13) NOT NULL,
scr_upd_dt_tm TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL,
bat_upd_dt_tm TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL,
upd_cnt INT NOT NULL,
upd_scr_name VARCHAR(80) NOT NULL,
upd_bat_name VARCHAR(80) NOT NULL,
del_flg INT NOT NULL,
CONSTRAINT pk_m_adr_1 PRIMARY KEY (pref_adr_cd,city_adr_cd,other_adr_cd,street_adr_cd)
);
-- ADD COLUMN
COMMENT ON TABLE sskadminuser.m_adr_1 IS '住所1台帳';
COMMENT ON COLUMN sskadminuser.m_adr_1.pref_adr_cd IS '都道府県住所コード';
COMMENT ON COLUMN sskadminuser.m_adr_1.city_adr_cd IS '市区町村住所コード';
COMMENT ON COLUMN sskadminuser.m_adr_1.other_adr_cd IS '大字・通称住所コード';
COMMENT ON COLUMN sskadminuser.m_adr_1.street_adr_cd IS '字・丁目住所コード';
COMMENT ON COLUMN sskadminuser.m_adr_1.new_adr_cd IS '新住所コード';
COMMENT ON COLUMN sskadminuser.m_adr_1.post_no IS '郵便番号';
COMMENT ON COLUMN sskadminuser.m_adr_1.old_post_no IS '旧郵便番号';
COMMENT ON COLUMN sskadminuser.m_adr_1.pref_name IS '都道府県名';
COMMENT ON COLUMN sskadminuser.m_adr_1.pref_kana_name IS '都道府県カナ名';
COMMENT ON COLUMN sskadminuser.m_adr_1.adr IS '住所';
COMMENT ON COLUMN sskadminuser.m_adr_1.adr_kana IS '住所カナ';
COMMENT ON COLUMN sskadminuser.m_adr_1.street IS '字丁目';
COMMENT ON COLUMN sskadminuser.m_adr_1.street_kana IS '字丁目カナ';
COMMENT ON COLUMN sskadminuser.m_adr_1.pref_len IS '都道府県文字数';
COMMENT ON COLUMN sskadminuser.m_adr_1.pref_kana_len IS '都道府県カナ文字数';
COMMENT ON COLUMN sskadminuser.m_adr_1.city_len IS '市区町村文字数';
COMMENT ON COLUMN sskadminuser.m_adr_1.city_kana_len IS '市区町村カナ文字数';
COMMENT ON COLUMN sskadminuser.m_adr_1.other_len IS '大字文字数';
COMMENT ON COLUMN sskadminuser.m_adr_1.other_kana_len IS '大字カナ文字数';
COMMENT ON COLUMN sskadminuser.m_adr_1.street_len IS '字文字数';
COMMENT ON COLUMN sskadminuser.m_adr_1.street_kana_len IS '字カナ文字数';
COMMENT ON COLUMN sskadminuser.m_adr_1.tot_len IS '総文字数';
COMMENT ON COLUMN sskadminuser.m_adr_1.tot_kana_len IS '総カナ文字数';
COMMENT ON COLUMN sskadminuser.m_adr_1.abol_avail_flg IS '廃止有効フラグ';
COMMENT ON COLUMN sskadminuser.m_adr_1.abol_year_mth IS '廃止年月';
COMMENT ON COLUMN sskadminuser.m_adr_1.enforce_year_mth IS '施行年月';
COMMENT ON COLUMN sskadminuser.m_adr_1.cust_barcd IS 'カスタマバーコード';
COMMENT ON COLUMN sskadminuser.m_adr_1.barcd_len IS 'バーコード文字数';
COMMENT ON COLUMN sskadminuser.m_adr_1.streetname_flg IS '通り名フラグ';
COMMENT ON COLUMN sskadminuser.m_adr_1.register_user_cd IS '登録者';
COMMENT ON COLUMN sskadminuser.m_adr_1.register_date IS '登録日時';
COMMENT ON COLUMN sskadminuser.m_adr_1.update_user_cd IS '更新者';
COMMENT ON COLUMN sskadminuser.m_adr_1.scr_upd_dt_tm IS '画面更新日時';
COMMENT ON COLUMN sskadminuser.m_adr_1.bat_upd_dt_tm IS 'バッチ更新日時';
COMMENT ON COLUMN sskadminuser.m_adr_1.upd_cnt IS '更新カウント';
COMMENT ON COLUMN sskadminuser.m_adr_1.upd_scr_name IS '更新画面名';
COMMENT ON COLUMN sskadminuser.m_adr_1.upd_bat_name IS '更新バッチ名';
COMMENT ON COLUMN sskadminuser.m_adr_1.del_flg IS '削除フラグ';
-- CREATE INDEX 
CREATE INDEX idx_m_adr_1_01 ON sskadminuser.m_adr_1 (post_no);
CREATE INDEX idx_m_adr_1_02 ON sskadminuser.m_adr_1 (abol_avail_flg);
-- END TABLE : sskadminuser.m_adr_1  --

-- START TABLE : sskadminuser.m_adr_2  --
CREATE TABLE sskadminuser.m_adr_2(
pref_adr_cd CHAR(2) NOT NULL,
city_adr_cd CHAR(3) NOT NULL,
other_adr_cd CHAR(3) NOT NULL,
street_adr_cd CHAR(3) NOT NULL,
new_adr_cd CHAR(11) NOT NULL,
post_no CHAR(7) NOT NULL,
old_post_no CHAR(7) NOT NULL,
pref_name CHAR(8) NOT NULL,
pref_kana_name CHAR(8) NOT NULL,
adr VARCHAR(120) NOT NULL,
adr_kana VARCHAR(116) NOT NULL,
street VARCHAR(36) NOT NULL,
street_kana VARCHAR(32) NOT NULL,
pref_len INT NOT NULL,
pref_kana_len INT NOT NULL,
city_len INT NOT NULL,
city_kana_len INT NOT NULL,
other_len INT NOT NULL,
other_kana_len INT NOT NULL,
street_len INT NOT NULL,
street_kana_len INT NOT NULL,
tot_len INT NOT NULL,
tot_kana_len INT NOT NULL,
abol_avail_flg INT NOT NULL,
abol_year_mth INT NOT NULL,
enforce_year_mth INT NOT NULL,
cust_barcd CHAR(13) NOT NULL,
barcd_len INT NOT NULL,
streetname_flg INT NOT NULL,
register_user_cd VARCHAR(13) NOT NULL,
register_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL,
update_user_cd VARCHAR(13) NOT NULL,
scr_upd_dt_tm TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL,
bat_upd_dt_tm TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL,
upd_cnt INT NOT NULL,
upd_scr_name VARCHAR(80) NOT NULL,
upd_bat_name VARCHAR(80) NOT NULL,
del_flg INT NOT NULL,
CONSTRAINT pk_m_adr_2 PRIMARY KEY (pref_adr_cd,city_adr_cd,other_adr_cd,street_adr_cd)
);
-- ADD COLUMN
COMMENT ON TABLE sskadminuser.m_adr_2 IS '住所2台帳';
COMMENT ON COLUMN sskadminuser.m_adr_2.pref_adr_cd IS '都道府県住所コード';
COMMENT ON COLUMN sskadminuser.m_adr_2.city_adr_cd IS '市区町村住所コード';
COMMENT ON COLUMN sskadminuser.m_adr_2.other_adr_cd IS '大字・通称住所コード';
COMMENT ON COLUMN sskadminuser.m_adr_2.street_adr_cd IS '字・丁目住所コード';
COMMENT ON COLUMN sskadminuser.m_adr_2.new_adr_cd IS '新住所コード';
COMMENT ON COLUMN sskadminuser.m_adr_2.post_no IS '郵便番号';
COMMENT ON COLUMN sskadminuser.m_adr_2.old_post_no IS '旧郵便番号';
COMMENT ON COLUMN sskadminuser.m_adr_2.pref_name IS '都道府県名';
COMMENT ON COLUMN sskadminuser.m_adr_2.pref_kana_name IS '都道府県カナ名';
COMMENT ON COLUMN sskadminuser.m_adr_2.adr IS '住所';
COMMENT ON COLUMN sskadminuser.m_adr_2.adr_kana IS '住所カナ';
COMMENT ON COLUMN sskadminuser.m_adr_2.street IS '字丁目';
COMMENT ON COLUMN sskadminuser.m_adr_2.street_kana IS '字丁目カナ';
COMMENT ON COLUMN sskadminuser.m_adr_2.pref_len IS '都道府県文字数';
COMMENT ON COLUMN sskadminuser.m_adr_2.pref_kana_len IS '都道府県カナ文字数';
COMMENT ON COLUMN sskadminuser.m_adr_2.city_len IS '市区町村文字数';
COMMENT ON COLUMN sskadminuser.m_adr_2.city_kana_len IS '市区町村カナ文字数';
COMMENT ON COLUMN sskadminuser.m_adr_2.other_len IS '大字文字数';
COMMENT ON COLUMN sskadminuser.m_adr_2.other_kana_len IS '大字カナ文字数';
COMMENT ON COLUMN sskadminuser.m_adr_2.street_len IS '字文字数';
COMMENT ON COLUMN sskadminuser.m_adr_2.street_kana_len IS '字カナ文字数';
COMMENT ON COLUMN sskadminuser.m_adr_2.tot_len IS '総文字数';
COMMENT ON COLUMN sskadminuser.m_adr_2.tot_kana_len IS '総カナ文字数';
COMMENT ON COLUMN sskadminuser.m_adr_2.abol_avail_flg IS '廃止有効フラグ';
COMMENT ON COLUMN sskadminuser.m_adr_2.abol_year_mth IS '廃止年月';
COMMENT ON COLUMN sskadminuser.m_adr_2.enforce_year_mth IS '施行年月';
COMMENT ON COLUMN sskadminuser.m_adr_2.cust_barcd IS 'カスタマバーコード';
COMMENT ON COLUMN sskadminuser.m_adr_2.barcd_len IS 'バーコード文字数';
COMMENT ON COLUMN sskadminuser.m_adr_2.streetname_flg IS '通り名フラグ';
COMMENT ON COLUMN sskadminuser.m_adr_2.register_user_cd IS '登録者';
COMMENT ON COLUMN sskadminuser.m_adr_2.register_date IS '登録日時';
COMMENT ON COLUMN sskadminuser.m_adr_2.update_user_cd IS '更新者';
COMMENT ON COLUMN sskadminuser.m_adr_2.scr_upd_dt_tm IS '画面更新日時';
COMMENT ON COLUMN sskadminuser.m_adr_2.bat_upd_dt_tm IS 'バッチ更新日時';
COMMENT ON COLUMN sskadminuser.m_adr_2.upd_cnt IS '更新カウント';
COMMENT ON COLUMN sskadminuser.m_adr_2.upd_scr_name IS '更新画面名';
COMMENT ON COLUMN sskadminuser.m_adr_2.upd_bat_name IS '更新バッチ名';
COMMENT ON COLUMN sskadminuser.m_adr_2.del_flg IS '削除フラグ';
-- CREATE INDEX 
CREATE INDEX idx_m_adr_2_01 ON sskadminuser.m_adr_2 (post_no);
CREATE INDEX idx_m_adr_2_02 ON sskadminuser.m_adr_2 (abol_avail_flg);
-- END TABLE : sskadminuser.m_adr_2  --

-- START TABLE : sskadminuser.h_smpl_block  --
CREATE TABLE sskadminuser.h_smpl_block(
smpl_block_cd DECIMAL(20) NOT NULL,
block_dt_tm TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT current_timestamp(0),
rcv_kbn CHAR(1) NOT NULL,
tel_no VARCHAR(64),
mail_adr VARCHAR(180),
cust_name_kana VARCHAR(92),
cust_name VARCHAR(104),
post_no VARCHAR(8),
adr VARCHAR(180),
adr_non_chg_part VARCHAR(124),
pref_cd CHAR(2),
era_kbn CHAR(1),
birthday VARCHAR(56),
smpl_req_acpt_ng_cond CHAR(2) NOT NULL,
update_date TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT current_timestamp(0),
register_date TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT current_timestamp(0),
update_user_cd VARCHAR(64) NOT NULL,
register_user_cd VARCHAR(64) NOT NULL,
CONSTRAINT pk_h_smpl_block PRIMARY KEY (smpl_block_cd)
);
-- ADD COLUMN
COMMENT ON TABLE sskadminuser.h_smpl_block IS 'サンプルブロック履歴';
COMMENT ON COLUMN sskadminuser.h_smpl_block.smpl_block_cd IS 'サンプルブロックコード';
COMMENT ON COLUMN sskadminuser.h_smpl_block.block_dt_tm IS 'ブロック日時';
COMMENT ON COLUMN sskadminuser.h_smpl_block.rcv_kbn IS '受け区分';
COMMENT ON COLUMN sskadminuser.h_smpl_block.tel_no IS '電話番号';
COMMENT ON COLUMN sskadminuser.h_smpl_block.mail_adr IS 'メールアドレス';
COMMENT ON COLUMN sskadminuser.h_smpl_block.cust_name_kana IS '会員氏名カナ';
COMMENT ON COLUMN sskadminuser.h_smpl_block.cust_name IS '会員氏名';
COMMENT ON COLUMN sskadminuser.h_smpl_block.post_no IS '郵便番号';
COMMENT ON COLUMN sskadminuser.h_smpl_block.adr IS '住所';
COMMENT ON COLUMN sskadminuser.h_smpl_block.adr_non_chg_part IS '住所非変換部';
COMMENT ON COLUMN sskadminuser.h_smpl_block.pref_cd IS '県コード';
COMMENT ON COLUMN sskadminuser.h_smpl_block.era_kbn IS '年号区分';
COMMENT ON COLUMN sskadminuser.h_smpl_block.birthday IS '生年月日';
COMMENT ON COLUMN sskadminuser.h_smpl_block.smpl_req_acpt_ng_cond IS 'サンプル請求受付拒否条件';
COMMENT ON COLUMN sskadminuser.h_smpl_block.update_date IS '更新日時';
COMMENT ON COLUMN sskadminuser.h_smpl_block.register_date IS '登録日時';
COMMENT ON COLUMN sskadminuser.h_smpl_block.update_user_cd IS '更新者';
COMMENT ON COLUMN sskadminuser.h_smpl_block.register_user_cd IS '登録者';
-- CREATE INDEX 
CREATE INDEX idx_h_smpl_block_01 ON sskadminuser.h_smpl_block (block_dt_tm);
CREATE INDEX idx_h_smpl_block_02 ON sskadminuser.h_smpl_block (block_dt_tm,rcv_kbn);
CREATE INDEX idx_h_smpl_block_03 ON sskadminuser.h_smpl_block (update_date,register_date);
-- END TABLE : sskadminuser.h_smpl_block  --

-- START TABLE : sskadminuser.m_odr_upd_acpt_avail_tm  --
CREATE TABLE sskadminuser.m_odr_upd_acpt_avail_tm(
acpt_avail_tm_cd BIGINT NOT NULL,
odr_start_tm VARCHAR(4) NOT NULL,
odr_end_tm VARCHAR(4) NOT NULL,
next_day_flg CHAR(1) NOT NULL DEFAULT '0',
disp_tm VARCHAR(4) NOT NULL,
acpt_avail_tm VARCHAR(4) NOT NULL,
memo VARCHAR(200),
set_kbn CHAR(1) NOT NULL DEFAULT '0',
del_flg CHAR(1) NOT NULL DEFAULT '0',
update_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
register_date TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT current_timestamp(0),
update_user_cd VARCHAR(128) NOT NULL,
register_user_cd VARCHAR(128) NOT NULL,
CONSTRAINT pk_m_odr_upd_acpt_avail_tm PRIMARY KEY (acpt_avail_tm_cd)
);
-- ADD COLUMN
COMMENT ON TABLE sskadminuser.m_odr_upd_acpt_avail_tm IS '注文変更受付可能時間台帳';
COMMENT ON COLUMN sskadminuser.m_odr_upd_acpt_avail_tm.acpt_avail_tm_cd IS '受付可能時間コード';
COMMENT ON COLUMN sskadminuser.m_odr_upd_acpt_avail_tm.odr_start_tm IS '注文開始時間';
COMMENT ON COLUMN sskadminuser.m_odr_upd_acpt_avail_tm.odr_end_tm IS '注文終了時間';
COMMENT ON COLUMN sskadminuser.m_odr_upd_acpt_avail_tm.next_day_flg IS '翌日フラグ';
COMMENT ON COLUMN sskadminuser.m_odr_upd_acpt_avail_tm.disp_tm IS '表示時間';
COMMENT ON COLUMN sskadminuser.m_odr_upd_acpt_avail_tm.acpt_avail_tm IS '受付可能時間';
COMMENT ON COLUMN sskadminuser.m_odr_upd_acpt_avail_tm.memo IS 'メモ';
COMMENT ON COLUMN sskadminuser.m_odr_upd_acpt_avail_tm.set_kbn IS '設定区分';
COMMENT ON COLUMN sskadminuser.m_odr_upd_acpt_avail_tm.del_flg IS '削除フラグ';
COMMENT ON COLUMN sskadminuser.m_odr_upd_acpt_avail_tm.update_date IS '更新日時';
COMMENT ON COLUMN sskadminuser.m_odr_upd_acpt_avail_tm.register_date IS '登録日時';
COMMENT ON COLUMN sskadminuser.m_odr_upd_acpt_avail_tm.update_user_cd IS '更新者';
COMMENT ON COLUMN sskadminuser.m_odr_upd_acpt_avail_tm.register_user_cd IS '登録者';
-- CREATE INDEX 
-- END TABLE : sskadminuser.m_odr_upd_acpt_avail_tm  --

-- START TABLE : sskadminuser.f_odr_upd  --
CREATE TABLE sskadminuser.f_odr_upd(
upd_odr_cd BIGINT NOT NULL,
odr_cd BIGINT NOT NULL,
upd_kbn CHAR(1) NOT NULL,
site_kbn CHAR(1) NOT NULL,
cust_no INT NOT NULL,
mbr_seq BIGINT,
mbr_kbn CHAR(1),
tel_no VARCHAR(64) NOT NULL,
acpt_dt_tm TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL,
acpt_tm VARCHAR(8) NOT NULL,
ship_dt TIMESTAMP(0) WITHOUT TIME ZONE,
route_dtl_kbn CHAR(2),
tot_odr_amnt INT,
tot_odr_tax INT,
accumulation_point INT NOT NULL,
this_time_buy_point INT NOT NULL,
this_time_use_point INT NOT NULL DEFAULT 0,
point_double_flg CHAR(1) DEFAULT '0',
dlv_to_kbn CHAR(1),
other_adr_post_no VARCHAR(8),
other_adr VARCHAR(180),
other_non_chg_part VARCHAR(124),
other_adr_tel_no VARCHAR(64),
dlv_to_input_kbn CHAR(1),
dlv_req_dt TIMESTAMP(0) WITHOUT TIME ZONE,
dlv_tm_kbn CHAR(2),
ship_att_cd_1 CHAR(6),
ship_att_cd_2 CHAR(6),
ship_att_cd_3 CHAR(6),
ship_att_cd_4 CHAR(6),
ship_att_cd_5 CHAR(6),
dlv_req_memo VARCHAR(400),
pay_way_kbn CHAR(2) NOT NULL,
pay_cnt CHAR(2),
credit_card_corp CHAR(2),
credit_card_no CHAR(68),
credit_card_name CHAR(72),
avail_term CHAR(6),
security_cd VARCHAR(52),
bonus_kbn CHAR(1),
bonus_mth CHAR(2),
card_input_kbn CHAR(1),
approval_no CHAR(7),
approval_use_card_kbn CHAR(2),
enclos_cd1 CHAR(6),
enclos_cd2 CHAR(6),
enclos_cd3 CHAR(6),
enclos_cd4 CHAR(6),
enclos_cd5 CHAR(6),
enclos_cd6 CHAR(6),
enclos_cd7 CHAR(6),
enclos_cd8 CHAR(6),
enclos_cd9 CHAR(6),
enclos_cd10 CHAR(6),
ikusei_comment VARCHAR(400),
resrv_kbn CHAR(1),
gift_flg CHAR(1) NOT NULL DEFAULT '0',
pend_cd CHAR(4),
odr_stat_kbn CHAR(1) NOT NULL DEFAULT '0',
del_flg CHAR(1) NOT NULL DEFAULT '0',
core_sys_kbn INT NOT NULL DEFAULT '0',
core_sys_send_dt_tm TIMESTAMP(0) WITHOUT TIME ZONE,
sync_flg CHAR(1) NOT NULL DEFAULT '0',
rcv_form_output_kbn CHAR(1) NOT NULL DEFAULT '0',
mail_fixed_kbn CHAR(1) DEFAULT '0',
stat_kbn INT NOT NULL,
ship_mail_send_kbn CHAR(1) NOT NULL DEFAULT '0',
responder VARCHAR(10),
thank_mail_send_dt TIMESTAMP(0) WITHOUT TIME ZONE,
thank_mail_ctrl_no INT,
session_id VARCHAR(100) NOT NULL,
update_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
register_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
update_user_cd VARCHAR(64) NOT NULL,
register_user_cd VARCHAR(64) NOT NULL,
indiv_name_ship_kbn CHAR(3),
indiv_name_ship_sender_name VARCHAR(30),
CONSTRAINT pk_f_odr_upd PRIMARY KEY (upd_odr_cd)
);
-- ADD COLUMN
COMMENT ON TABLE sskadminuser.f_odr_upd IS '注文変更伝票';
COMMENT ON COLUMN sskadminuser.f_odr_upd.upd_odr_cd IS '変更注文コード';
COMMENT ON COLUMN sskadminuser.f_odr_upd.odr_cd IS '注文コード';
COMMENT ON COLUMN sskadminuser.f_odr_upd.upd_kbn IS '変更区分';
COMMENT ON COLUMN sskadminuser.f_odr_upd.site_kbn IS 'サイト区分';
COMMENT ON COLUMN sskadminuser.f_odr_upd.cust_no IS '会員番号';
COMMENT ON COLUMN sskadminuser.f_odr_upd.mbr_seq IS '会員連番';
COMMENT ON COLUMN sskadminuser.f_odr_upd.mbr_kbn IS '会員区分';
COMMENT ON COLUMN sskadminuser.f_odr_upd.tel_no IS '電話番号';
COMMENT ON COLUMN sskadminuser.f_odr_upd.acpt_dt_tm IS '受付日時';
COMMENT ON COLUMN sskadminuser.f_odr_upd.acpt_tm IS '受付時刻';
COMMENT ON COLUMN sskadminuser.f_odr_upd.ship_dt IS '発送日';
COMMENT ON COLUMN sskadminuser.f_odr_upd.route_dtl_kbn IS '経路詳細区分';
COMMENT ON COLUMN sskadminuser.f_odr_upd.tot_odr_amnt IS '合計注文金額';
COMMENT ON COLUMN sskadminuser.f_odr_upd.tot_odr_tax IS '合計注文消費税';
COMMENT ON COLUMN sskadminuser.f_odr_upd.accumulation_point IS '積立ポイント';
COMMENT ON COLUMN sskadminuser.f_odr_upd.this_time_buy_point IS '今回購入ポイント';
COMMENT ON COLUMN sskadminuser.f_odr_upd.this_time_use_point IS '今回使用ポイント';
COMMENT ON COLUMN sskadminuser.f_odr_upd.point_double_flg IS 'ポイント2倍フラグ';
COMMENT ON COLUMN sskadminuser.f_odr_upd.dlv_to_kbn IS '配送先区分';
COMMENT ON COLUMN sskadminuser.f_odr_upd.other_adr_post_no IS 'その他住所郵便番号';
COMMENT ON COLUMN sskadminuser.f_odr_upd.other_adr IS 'その他住所';
COMMENT ON COLUMN sskadminuser.f_odr_upd.other_non_chg_part IS 'その他非変換部';
COMMENT ON COLUMN sskadminuser.f_odr_upd.other_adr_tel_no IS 'その他住所電話番号';
COMMENT ON COLUMN sskadminuser.f_odr_upd.dlv_to_input_kbn IS '配送先登録区分';
COMMENT ON COLUMN sskadminuser.f_odr_upd.dlv_req_dt IS '配送希望日';
COMMENT ON COLUMN sskadminuser.f_odr_upd.dlv_tm_kbn IS '配送時刻区分';
COMMENT ON COLUMN sskadminuser.f_odr_upd.ship_att_cd_1 IS '発送注意コード1';
COMMENT ON COLUMN sskadminuser.f_odr_upd.ship_att_cd_2 IS '発送注意コード2';
COMMENT ON COLUMN sskadminuser.f_odr_upd.ship_att_cd_3 IS '発送注意コード3';
COMMENT ON COLUMN sskadminuser.f_odr_upd.ship_att_cd_4 IS '発送注意コード4';
COMMENT ON COLUMN sskadminuser.f_odr_upd.ship_att_cd_5 IS '発送注意コード5';
COMMENT ON COLUMN sskadminuser.f_odr_upd.dlv_req_memo IS '配送要望メモ';
COMMENT ON COLUMN sskadminuser.f_odr_upd.pay_way_kbn IS '支払方法区分';
COMMENT ON COLUMN sskadminuser.f_odr_upd.pay_cnt IS '支払回数';
COMMENT ON COLUMN sskadminuser.f_odr_upd.credit_card_corp IS 'クレジットカード会社';
COMMENT ON COLUMN sskadminuser.f_odr_upd.credit_card_no IS 'クレジットカード番号';
COMMENT ON COLUMN sskadminuser.f_odr_upd.credit_card_name IS 'クレジットカード名義人';
COMMENT ON COLUMN sskadminuser.f_odr_upd.avail_term IS '有効期限';
COMMENT ON COLUMN sskadminuser.f_odr_upd.security_cd IS 'セキュリティコード';
COMMENT ON COLUMN sskadminuser.f_odr_upd.bonus_kbn IS 'ボーナス区分';
COMMENT ON COLUMN sskadminuser.f_odr_upd.bonus_mth IS 'ボーナス月';
COMMENT ON COLUMN sskadminuser.f_odr_upd.card_input_kbn IS 'カード登録区分';
COMMENT ON COLUMN sskadminuser.f_odr_upd.approval_no IS '承認番号';
COMMENT ON COLUMN sskadminuser.f_odr_upd.approval_use_card_kbn IS '承認使用カード区分';
COMMENT ON COLUMN sskadminuser.f_odr_upd.enclos_cd1 IS '同封物コード1';
COMMENT ON COLUMN sskadminuser.f_odr_upd.enclos_cd2 IS '同封物コード2';
COMMENT ON COLUMN sskadminuser.f_odr_upd.enclos_cd3 IS '同封物コード3';
COMMENT ON COLUMN sskadminuser.f_odr_upd.enclos_cd4 IS '同封物コード4';
COMMENT ON COLUMN sskadminuser.f_odr_upd.enclos_cd5 IS '同封物コード5';
COMMENT ON COLUMN sskadminuser.f_odr_upd.enclos_cd6 IS '同封物コード6';
COMMENT ON COLUMN sskadminuser.f_odr_upd.enclos_cd7 IS '同封物コード7';
COMMENT ON COLUMN sskadminuser.f_odr_upd.enclos_cd8 IS '同封物コード8';
COMMENT ON COLUMN sskadminuser.f_odr_upd.enclos_cd9 IS '同封物コード9';
COMMENT ON COLUMN sskadminuser.f_odr_upd.enclos_cd10 IS '同封物コード10';
COMMENT ON COLUMN sskadminuser.f_odr_upd.ikusei_comment IS '育成コメント';
COMMENT ON COLUMN sskadminuser.f_odr_upd.resrv_kbn IS '予約区分';
COMMENT ON COLUMN sskadminuser.f_odr_upd.gift_flg IS '贈物フラグ';
COMMENT ON COLUMN sskadminuser.f_odr_upd.pend_cd IS '保留コード';
COMMENT ON COLUMN sskadminuser.f_odr_upd.odr_stat_kbn IS '注文状況区分';
COMMENT ON COLUMN sskadminuser.f_odr_upd.del_flg IS '削除フラグ';
COMMENT ON COLUMN sskadminuser.f_odr_upd.core_sys_kbn IS '基幹区分';
COMMENT ON COLUMN sskadminuser.f_odr_upd.core_sys_send_dt_tm IS '基幹送信日時';
COMMENT ON COLUMN sskadminuser.f_odr_upd.sync_flg IS '同期フラグ';
COMMENT ON COLUMN sskadminuser.f_odr_upd.rcv_form_output_kbn IS '受票出力区分';
COMMENT ON COLUMN sskadminuser.f_odr_upd.mail_fixed_kbn IS 'メール定型区分';
COMMENT ON COLUMN sskadminuser.f_odr_upd.stat_kbn IS '状態区分';
COMMENT ON COLUMN sskadminuser.f_odr_upd.ship_mail_send_kbn IS '発送メール送信区分';
COMMENT ON COLUMN sskadminuser.f_odr_upd.responder IS '対応者';
COMMENT ON COLUMN sskadminuser.f_odr_upd.thank_mail_send_dt IS 'お礼メール送信日';
COMMENT ON COLUMN sskadminuser.f_odr_upd.thank_mail_ctrl_no IS 'お礼メール管理番号';
COMMENT ON COLUMN sskadminuser.f_odr_upd.session_id IS 'セッションID';
COMMENT ON COLUMN sskadminuser.f_odr_upd.update_date IS '更新日時';
COMMENT ON COLUMN sskadminuser.f_odr_upd.register_date IS '登録日時';
COMMENT ON COLUMN sskadminuser.f_odr_upd.update_user_cd IS '更新者';
COMMENT ON COLUMN sskadminuser.f_odr_upd.register_user_cd IS '登録者';
COMMENT ON COLUMN sskadminuser.f_odr_upd.indiv_name_ship_kbn IS '個人名発送区分';
COMMENT ON COLUMN sskadminuser.f_odr_upd.indiv_name_ship_sender_name IS '個人名発送差出人名';
-- CREATE INDEX 
CREATE INDEX idx_f_odr_upd_01 ON sskadminuser.f_odr_upd (site_kbn,cust_no,tel_no,mbr_seq);
CREATE INDEX idx_f_odr_upd_02 ON sskadminuser.f_odr_upd (acpt_dt_tm);
CREATE INDEX idx_f_odr_upd_03 ON sskadminuser.f_odr_upd (cust_no);
CREATE INDEX idx_f_odr_upd_04 ON sskadminuser.f_odr_upd (core_sys_kbn);
CREATE INDEX idx_f_odr_upd_05 ON sskadminuser.f_odr_upd (sync_flg,rcv_form_output_kbn);
CREATE INDEX idx_f_odr_upd_06 ON sskadminuser.f_odr_upd (update_date,register_date);
-- END TABLE : sskadminuser.f_odr_upd  --

-- START TABLE : sskadminuser.f_line_quesnr_ans_d  --
CREATE TABLE sskadminuser.f_line_quesnr_ans_d(
quesnr_ans_no CHAR(8) NOT NULL,
ptn_cd CHAR(5) NOT NULL,
question_cd CHAR(4) NOT NULL,
ans_cd CHAR(2),
ans_cont VARCHAR(2000),
disp_turn CHAR(3),
update_date TIMESTAMP(0) WITHOUT TIME ZONE,
register_date TIMESTAMP(0) WITHOUT TIME ZONE,
update_user_cd VARCHAR(64),
register_user_cd VARCHAR(64),
del_flg CHAR(1),
CONSTRAINT pk_f_line_quesnr_ans_d PRIMARY KEY (quesnr_ans_no,ptn_cd,question_cd)
);
-- ADD COLUMN
COMMENT ON TABLE sskadminuser.f_line_quesnr_ans_d IS 'LINEアンケート回答伝票明細';
COMMENT ON COLUMN sskadminuser.f_line_quesnr_ans_d.quesnr_ans_no IS 'アンケート回答番号';
COMMENT ON COLUMN sskadminuser.f_line_quesnr_ans_d.ptn_cd IS 'パターンコード';
COMMENT ON COLUMN sskadminuser.f_line_quesnr_ans_d.question_cd IS '質問コード';
COMMENT ON COLUMN sskadminuser.f_line_quesnr_ans_d.ans_cd IS '回答コード';
COMMENT ON COLUMN sskadminuser.f_line_quesnr_ans_d.ans_cont IS '回答内容';
COMMENT ON COLUMN sskadminuser.f_line_quesnr_ans_d.disp_turn IS '表示順';
COMMENT ON COLUMN sskadminuser.f_line_quesnr_ans_d.update_date IS '更新日時';
COMMENT ON COLUMN sskadminuser.f_line_quesnr_ans_d.register_date IS '登録日時';
COMMENT ON COLUMN sskadminuser.f_line_quesnr_ans_d.update_user_cd IS '更新者';
COMMENT ON COLUMN sskadminuser.f_line_quesnr_ans_d.register_user_cd IS '登録者';
COMMENT ON COLUMN sskadminuser.f_line_quesnr_ans_d.del_flg IS '削除フラグ';
-- CREATE INDEX 
CREATE INDEX idx_f_line_quesnr_ans_d_01 ON sskadminuser.f_line_quesnr_ans_d (ans_cd);
CREATE INDEX idx_f_line_quesnr_ans_d_02 ON sskadminuser.f_line_quesnr_ans_d (question_cd);
CREATE INDEX idx_f_line_quesnr_ans_d_03 ON sskadminuser.f_line_quesnr_ans_d (update_date,register_date);
-- END TABLE : sskadminuser.f_line_quesnr_ans_d  --

-- START TABLE : sskadminuser.f_line_quesnr_ans_h  --
CREATE TABLE sskadminuser.f_line_quesnr_ans_h(
quesnr_ans_no CHAR(8) NOT NULL,
ptn_cd CHAR(5) NOT NULL,
ans_dt_tm TIMESTAMP(0) WITHOUT TIME ZONE,
update_date TIMESTAMP(0) WITHOUT TIME ZONE,
register_date TIMESTAMP(0) WITHOUT TIME ZONE,
update_user_cd VARCHAR(64),
register_user_cd VARCHAR(64),
del_flg CHAR(1),
CONSTRAINT pk_f_line_quesnr_ans_h PRIMARY KEY (quesnr_ans_no,ptn_cd)
);
-- ADD COLUMN
COMMENT ON TABLE sskadminuser.f_line_quesnr_ans_h IS 'LINEアンケート回答伝票ヘダー';
COMMENT ON COLUMN sskadminuser.f_line_quesnr_ans_h.quesnr_ans_no IS 'アンケート回答番号';
COMMENT ON COLUMN sskadminuser.f_line_quesnr_ans_h.ptn_cd IS 'パターンコード';
COMMENT ON COLUMN sskadminuser.f_line_quesnr_ans_h.ans_dt_tm IS '回答日時';
COMMENT ON COLUMN sskadminuser.f_line_quesnr_ans_h.update_date IS '更新日時';
COMMENT ON COLUMN sskadminuser.f_line_quesnr_ans_h.register_date IS '登録日時';
COMMENT ON COLUMN sskadminuser.f_line_quesnr_ans_h.update_user_cd IS '更新者';
COMMENT ON COLUMN sskadminuser.f_line_quesnr_ans_h.register_user_cd IS '登録者';
COMMENT ON COLUMN sskadminuser.f_line_quesnr_ans_h.del_flg IS '削除フラグ';
-- CREATE INDEX 
CREATE INDEX idx_f_line_quesnr_ans_h_01 ON sskadminuser.f_line_quesnr_ans_h (ans_dt_tm);
CREATE INDEX idx_f_line_quesnr_ans_h_02 ON sskadminuser.f_line_quesnr_ans_h (update_date,register_date);
-- END TABLE : sskadminuser.f_line_quesnr_ans_h  --

-- START TABLE : sskadminuser.m_city_adr_1  --
CREATE TABLE sskadminuser.m_city_adr_1(
pref_adr_cd CHAR(2) NOT NULL,
city_adr_cd CHAR(3) NOT NULL,
city_name VARCHAR(24) NOT NULL,
city_kana_name VARCHAR(24) NOT NULL,
register_user_cd VARCHAR(13) NOT NULL,
register_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL,
update_user_cd VARCHAR(13) NOT NULL,
scr_upd_dt_tm TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL,
bat_upd_dt_tm TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL,
upd_cnt INT NOT NULL,
upd_scr_name VARCHAR(80) NOT NULL,
upd_bat_name VARCHAR(80) NOT NULL,
del_flg INT NOT NULL,
CONSTRAINT pk_m_city_adr_1 PRIMARY KEY (pref_adr_cd,city_adr_cd)
);
-- ADD COLUMN
COMMENT ON TABLE sskadminuser.m_city_adr_1 IS '市区町村住所1台帳';
COMMENT ON COLUMN sskadminuser.m_city_adr_1.pref_adr_cd IS '都道府県住所コード';
COMMENT ON COLUMN sskadminuser.m_city_adr_1.city_adr_cd IS '市区町村住所コード';
COMMENT ON COLUMN sskadminuser.m_city_adr_1.city_name IS '市区町村名';
COMMENT ON COLUMN sskadminuser.m_city_adr_1.city_kana_name IS '市区町村カナ名';
COMMENT ON COLUMN sskadminuser.m_city_adr_1.register_user_cd IS '登録者';
COMMENT ON COLUMN sskadminuser.m_city_adr_1.register_date IS '登録日時';
COMMENT ON COLUMN sskadminuser.m_city_adr_1.update_user_cd IS '更新者';
COMMENT ON COLUMN sskadminuser.m_city_adr_1.scr_upd_dt_tm IS '画面更新日時';
COMMENT ON COLUMN sskadminuser.m_city_adr_1.bat_upd_dt_tm IS 'バッチ更新日時';
COMMENT ON COLUMN sskadminuser.m_city_adr_1.upd_cnt IS '更新カウント';
COMMENT ON COLUMN sskadminuser.m_city_adr_1.upd_scr_name IS '更新画面名';
COMMENT ON COLUMN sskadminuser.m_city_adr_1.upd_bat_name IS '更新バッチ名';
COMMENT ON COLUMN sskadminuser.m_city_adr_1.del_flg IS '削除フラグ';
-- CREATE INDEX 
-- END TABLE : sskadminuser.m_city_adr_1  --

-- START TABLE : sskadminuser.m_city_adr_2  --
CREATE TABLE sskadminuser.m_city_adr_2(
pref_adr_cd CHAR(2) NOT NULL,
city_adr_cd CHAR(3) NOT NULL,
city_name VARCHAR(24) NOT NULL,
city_kana_name VARCHAR(24) NOT NULL,
register_user_cd VARCHAR(13) NOT NULL,
register_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL,
update_user_cd VARCHAR(13) NOT NULL,
scr_upd_dt_tm TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL,
bat_upd_dt_tm TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL,
upd_cnt INT NOT NULL,
upd_scr_name VARCHAR(80) NOT NULL,
upd_bat_name VARCHAR(80) NOT NULL,
del_flg INT NOT NULL,
CONSTRAINT pk_m_city_adr_2 PRIMARY KEY (pref_adr_cd,city_adr_cd)
);
-- ADD COLUMN
COMMENT ON TABLE sskadminuser.m_city_adr_2 IS '市区町村住所2台帳';
COMMENT ON COLUMN sskadminuser.m_city_adr_2.pref_adr_cd IS '都道府県住所コード';
COMMENT ON COLUMN sskadminuser.m_city_adr_2.city_adr_cd IS '市区町村住所コード';
COMMENT ON COLUMN sskadminuser.m_city_adr_2.city_name IS '市区町村名';
COMMENT ON COLUMN sskadminuser.m_city_adr_2.city_kana_name IS '市区町村カナ名';
COMMENT ON COLUMN sskadminuser.m_city_adr_2.register_user_cd IS '登録者';
COMMENT ON COLUMN sskadminuser.m_city_adr_2.register_date IS '登録日時';
COMMENT ON COLUMN sskadminuser.m_city_adr_2.update_user_cd IS '更新者';
COMMENT ON COLUMN sskadminuser.m_city_adr_2.scr_upd_dt_tm IS '画面更新日時';
COMMENT ON COLUMN sskadminuser.m_city_adr_2.bat_upd_dt_tm IS 'バッチ更新日時';
COMMENT ON COLUMN sskadminuser.m_city_adr_2.upd_cnt IS '更新カウント';
COMMENT ON COLUMN sskadminuser.m_city_adr_2.upd_scr_name IS '更新画面名';
COMMENT ON COLUMN sskadminuser.m_city_adr_2.upd_bat_name IS '更新バッチ名';
COMMENT ON COLUMN sskadminuser.m_city_adr_2.del_flg IS '削除フラグ';
-- CREATE INDEX 
-- END TABLE : sskadminuser.m_city_adr_2  --

-- START TABLE : sskadminuser.m_other_adr_1  --
CREATE TABLE sskadminuser.m_other_adr_1(
pref_adr_cd CHAR(2) NOT NULL,
city_adr_cd CHAR(3) NOT NULL,
other_adr_cd CHAR(3) NOT NULL,
post_no CHAR(7) NOT NULL,
other_name VARCHAR(60) NOT NULL,
other_kana_name VARCHAR(60) NOT NULL,
other_kana_name_normalize VARCHAR(60) NOT NULL,
register_user_cd VARCHAR(13) NOT NULL,
register_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL,
update_user_cd VARCHAR(13) NOT NULL,
scr_upd_dt_tm TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL,
bat_upd_dt_tm TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL,
upd_cnt INT NOT NULL,
upd_scr_name VARCHAR(80) NOT NULL,
upd_bat_name VARCHAR(80) NOT NULL,
del_flg INT NOT NULL,
CONSTRAINT pk_m_other_adr_1 PRIMARY KEY (pref_adr_cd,city_adr_cd,other_adr_cd)
);
-- ADD COLUMN
COMMENT ON TABLE sskadminuser.m_other_adr_1 IS '大字・通称住所1台帳';
COMMENT ON COLUMN sskadminuser.m_other_adr_1.pref_adr_cd IS '都道府県住所コード';
COMMENT ON COLUMN sskadminuser.m_other_adr_1.city_adr_cd IS '市区町村住所コード';
COMMENT ON COLUMN sskadminuser.m_other_adr_1.other_adr_cd IS '大字・通称住所コード';
COMMENT ON COLUMN sskadminuser.m_other_adr_1.post_no IS '郵便番号';
COMMENT ON COLUMN sskadminuser.m_other_adr_1.other_name IS '大字・通称名';
COMMENT ON COLUMN sskadminuser.m_other_adr_1.other_kana_name IS '大字・通称カナ名';
COMMENT ON COLUMN sskadminuser.m_other_adr_1.other_kana_name_normalize IS '大字・通称カナ名読み';
COMMENT ON COLUMN sskadminuser.m_other_adr_1.register_user_cd IS '登録者';
COMMENT ON COLUMN sskadminuser.m_other_adr_1.register_date IS '登録日時';
COMMENT ON COLUMN sskadminuser.m_other_adr_1.update_user_cd IS '更新者';
COMMENT ON COLUMN sskadminuser.m_other_adr_1.scr_upd_dt_tm IS '画面更新日時';
COMMENT ON COLUMN sskadminuser.m_other_adr_1.bat_upd_dt_tm IS 'バッチ更新日時';
COMMENT ON COLUMN sskadminuser.m_other_adr_1.upd_cnt IS '更新カウント';
COMMENT ON COLUMN sskadminuser.m_other_adr_1.upd_scr_name IS '更新画面名';
COMMENT ON COLUMN sskadminuser.m_other_adr_1.upd_bat_name IS '更新バッチ名';
COMMENT ON COLUMN sskadminuser.m_other_adr_1.del_flg IS '削除フラグ';
-- CREATE INDEX 
-- END TABLE : sskadminuser.m_other_adr_1  --

-- START TABLE : sskadminuser.m_other_adr_2  --
CREATE TABLE sskadminuser.m_other_adr_2(
pref_adr_cd CHAR(2) NOT NULL,
city_adr_cd CHAR(3) NOT NULL,
other_adr_cd CHAR(3) NOT NULL,
post_no CHAR(7) NOT NULL,
other_name VARCHAR(60) NOT NULL,
other_name_kana VARCHAR(60) NOT NULL,
other_name_normalize_kana VARCHAR(60) NOT NULL,
register_user_cd VARCHAR(13) NOT NULL,
register_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL,
update_user_cd VARCHAR(13) NOT NULL,
scr_upd_dt_tm TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL,
bat_upd_dt_tm TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL,
upd_cnt INT NOT NULL,
upd_scr_name VARCHAR(80) NOT NULL,
upd_bat_name VARCHAR(80) NOT NULL,
del_flg INT NOT NULL,
CONSTRAINT pk_m_other_adr_2 PRIMARY KEY (pref_adr_cd,city_adr_cd,other_adr_cd)
);
-- ADD COLUMN
COMMENT ON TABLE sskadminuser.m_other_adr_2 IS '大字・通称住所2台帳';
COMMENT ON COLUMN sskadminuser.m_other_adr_2.pref_adr_cd IS '都道府県住所コード';
COMMENT ON COLUMN sskadminuser.m_other_adr_2.city_adr_cd IS '市区町村住所コード';
COMMENT ON COLUMN sskadminuser.m_other_adr_2.other_adr_cd IS '大字・通称住所コード';
COMMENT ON COLUMN sskadminuser.m_other_adr_2.post_no IS '郵便番号';
COMMENT ON COLUMN sskadminuser.m_other_adr_2.other_name IS '大字・通称名';
COMMENT ON COLUMN sskadminuser.m_other_adr_2.other_name_kana IS '大字・通称名カナ';
COMMENT ON COLUMN sskadminuser.m_other_adr_2.other_name_normalize_kana IS '大字・通称名読みカナ';
COMMENT ON COLUMN sskadminuser.m_other_adr_2.register_user_cd IS '登録者';
COMMENT ON COLUMN sskadminuser.m_other_adr_2.register_date IS '登録日時';
COMMENT ON COLUMN sskadminuser.m_other_adr_2.update_user_cd IS '更新者';
COMMENT ON COLUMN sskadminuser.m_other_adr_2.scr_upd_dt_tm IS '画面更新日時';
COMMENT ON COLUMN sskadminuser.m_other_adr_2.bat_upd_dt_tm IS 'バッチ更新日時';
COMMENT ON COLUMN sskadminuser.m_other_adr_2.upd_cnt IS '更新カウント';
COMMENT ON COLUMN sskadminuser.m_other_adr_2.upd_scr_name IS '更新画面名';
COMMENT ON COLUMN sskadminuser.m_other_adr_2.upd_bat_name IS '更新バッチ名';
COMMENT ON COLUMN sskadminuser.m_other_adr_2.del_flg IS '削除フラグ';
-- CREATE INDEX 
-- END TABLE : sskadminuser.m_other_adr_2  --

-- START TABLE : sskadminuser.m_pref_name_adr_1  --
CREATE TABLE sskadminuser.m_pref_name_adr_1(
pref_adr_cd CHAR(2) NOT NULL,
pref_name CHAR(8) NOT NULL,
pref_kana_name CHAR(8) NOT NULL,
register_user_cd VARCHAR(13) NOT NULL,
register_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL,
update_user_cd VARCHAR(13) NOT NULL,
scr_upd_dt_tm TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL,
bat_upd_dt_tm TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL,
upd_cnt INT NOT NULL,
upd_scr_name VARCHAR(80) NOT NULL,
upd_bat_name VARCHAR(80) NOT NULL,
del_flg INT NOT NULL,
CONSTRAINT pk_m_pref_name_adr_1 PRIMARY KEY (pref_adr_cd)
);
-- ADD COLUMN
COMMENT ON TABLE sskadminuser.m_pref_name_adr_1 IS '都道府県住所1台帳';
COMMENT ON COLUMN sskadminuser.m_pref_name_adr_1.pref_adr_cd IS '都道府県住所コード';
COMMENT ON COLUMN sskadminuser.m_pref_name_adr_1.pref_name IS '都道府県名';
COMMENT ON COLUMN sskadminuser.m_pref_name_adr_1.pref_kana_name IS '都道府県カナ名';
COMMENT ON COLUMN sskadminuser.m_pref_name_adr_1.register_user_cd IS '登録者';
COMMENT ON COLUMN sskadminuser.m_pref_name_adr_1.register_date IS '登録日時';
COMMENT ON COLUMN sskadminuser.m_pref_name_adr_1.update_user_cd IS '更新者';
COMMENT ON COLUMN sskadminuser.m_pref_name_adr_1.scr_upd_dt_tm IS '画面更新日時';
COMMENT ON COLUMN sskadminuser.m_pref_name_adr_1.bat_upd_dt_tm IS 'バッチ更新日時';
COMMENT ON COLUMN sskadminuser.m_pref_name_adr_1.upd_cnt IS '更新カウント';
COMMENT ON COLUMN sskadminuser.m_pref_name_adr_1.upd_scr_name IS '更新画面名';
COMMENT ON COLUMN sskadminuser.m_pref_name_adr_1.upd_bat_name IS '更新バッチ名';
COMMENT ON COLUMN sskadminuser.m_pref_name_adr_1.del_flg IS '削除フラグ';
-- CREATE INDEX 
-- END TABLE : sskadminuser.m_pref_name_adr_1  --

-- START TABLE : sskadminuser.m_pref_name_adr_2  --
CREATE TABLE sskadminuser.m_pref_name_adr_2(
pref_adr_cd CHAR(2) NOT NULL,
pref_name CHAR(8) NOT NULL,
pref_kana_name CHAR(8) NOT NULL,
register_user_cd VARCHAR(13) NOT NULL,
register_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL,
update_user_cd VARCHAR(13) NOT NULL,
scr_upd_dt_tm TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL,
bat_upd_dt_tm TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL,
upd_cnt INT NOT NULL,
upd_scr_name VARCHAR(80) NOT NULL,
upd_bat_name VARCHAR(80) NOT NULL,
del_flg INT NOT NULL,
CONSTRAINT pk_m_pref_name_adr_2 PRIMARY KEY (pref_adr_cd)
);
-- ADD COLUMN
COMMENT ON TABLE sskadminuser.m_pref_name_adr_2 IS '都道府県住所2台帳';
COMMENT ON COLUMN sskadminuser.m_pref_name_adr_2.pref_adr_cd IS '都道府県住所コード';
COMMENT ON COLUMN sskadminuser.m_pref_name_adr_2.pref_name IS '都道府県名';
COMMENT ON COLUMN sskadminuser.m_pref_name_adr_2.pref_kana_name IS '都道府県カナ名';
COMMENT ON COLUMN sskadminuser.m_pref_name_adr_2.register_user_cd IS '登録者';
COMMENT ON COLUMN sskadminuser.m_pref_name_adr_2.register_date IS '登録日時';
COMMENT ON COLUMN sskadminuser.m_pref_name_adr_2.update_user_cd IS '更新者';
COMMENT ON COLUMN sskadminuser.m_pref_name_adr_2.scr_upd_dt_tm IS '画面更新日時';
COMMENT ON COLUMN sskadminuser.m_pref_name_adr_2.bat_upd_dt_tm IS 'バッチ更新日時';
COMMENT ON COLUMN sskadminuser.m_pref_name_adr_2.upd_cnt IS '更新カウント';
COMMENT ON COLUMN sskadminuser.m_pref_name_adr_2.upd_scr_name IS '更新画面名';
COMMENT ON COLUMN sskadminuser.m_pref_name_adr_2.upd_bat_name IS '更新バッチ名';
COMMENT ON COLUMN sskadminuser.m_pref_name_adr_2.del_flg IS '削除フラグ';
-- CREATE INDEX 
-- END TABLE : sskadminuser.m_pref_name_adr_2  --

-- START TABLE : sskadminuser.c_web_auto_login_auth  --
CREATE TABLE sskadminuser.c_web_auto_login_auth(
access_token VARCHAR(32) NOT NULL DEFAULT ' ',
cust_no INT NOT NULL DEFAULT 0,
session_id VARCHAR(100) NOT NULL DEFAULT ' ',
auth_token VARCHAR(32) NOT NULL DEFAULT ' ',
avail_term TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT to_timestamp('1900-01-01 00:00:00', 'YYYY-MM-DD HH24:MI:SS'),
register_user_cd VARCHAR(64) NOT NULL DEFAULT ' ',
register_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT to_timestamp('1900-01-01 00:00:00', 'YYYY-MM-DD HH24:MI:SS'),
update_user_cd VARCHAR(64) NOT NULL DEFAULT ' ',
scr_upd_dt_tm TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT to_timestamp('1900-01-01 00:00:00', 'YYYY-MM-DD HH24:MI:SS'),
bat_upd_dt_tm TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT to_timestamp('1900-01-01 00:00:00', 'YYYY-MM-DD HH24:MI:SS'),
upd_cnt BIGINT NOT NULL DEFAULT 0,
upd_scr_name VARCHAR(80) NOT NULL DEFAULT ' ',
upd_bat_name VARCHAR(80) NOT NULL DEFAULT ' ',
del_flg INT NOT NULL DEFAULT 0,
CONSTRAINT pk_c_web_auto_login_auth PRIMARY KEY (access_token)
);
-- ADD COLUMN
COMMENT ON TABLE sskadminuser.c_web_auto_login_auth IS 'WEB自動ログイン用認証管理';
COMMENT ON COLUMN sskadminuser.c_web_auto_login_auth.access_token IS 'アクセストークン';
COMMENT ON COLUMN sskadminuser.c_web_auto_login_auth.cust_no IS '会員番号';
COMMENT ON COLUMN sskadminuser.c_web_auto_login_auth.session_id IS 'セッションID';
COMMENT ON COLUMN sskadminuser.c_web_auto_login_auth.auth_token IS '認証用トークン';
COMMENT ON COLUMN sskadminuser.c_web_auto_login_auth.avail_term IS '有効期限';
COMMENT ON COLUMN sskadminuser.c_web_auto_login_auth.register_user_cd IS '登録者';
COMMENT ON COLUMN sskadminuser.c_web_auto_login_auth.register_date IS '登録日時';
COMMENT ON COLUMN sskadminuser.c_web_auto_login_auth.update_user_cd IS '更新者';
COMMENT ON COLUMN sskadminuser.c_web_auto_login_auth.scr_upd_dt_tm IS '画面更新日時';
COMMENT ON COLUMN sskadminuser.c_web_auto_login_auth.bat_upd_dt_tm IS 'バッチ更新日時';
COMMENT ON COLUMN sskadminuser.c_web_auto_login_auth.upd_cnt IS '更新カウント';
COMMENT ON COLUMN sskadminuser.c_web_auto_login_auth.upd_scr_name IS '更新画面名';
COMMENT ON COLUMN sskadminuser.c_web_auto_login_auth.upd_bat_name IS '更新バッチ名';
COMMENT ON COLUMN sskadminuser.c_web_auto_login_auth.del_flg IS '削除フラグ';
-- CREATE INDEX 
-- END TABLE : sskadminuser.c_web_auto_login_auth  --

-- START TABLE : sskadminuser.f_mail_domain_revision  --
CREATE TABLE sskadminuser.f_mail_domain_revision(
err_tgt_domain VARCHAR(200) NOT NULL,
revision_aft_domain_1 VARCHAR(200) NOT NULL,
revision_aft_domain_2 VARCHAR(200),
update_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
register_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
update_user_cd VARCHAR(64) NOT NULL,
register_user_cd VARCHAR(64) NOT NULL,
CONSTRAINT pk_f_mail_domain_revision PRIMARY KEY (err_tgt_domain)
);
-- ADD COLUMN
COMMENT ON TABLE sskadminuser.f_mail_domain_revision IS 'メールドメイン補正伝票';
COMMENT ON COLUMN sskadminuser.f_mail_domain_revision.err_tgt_domain IS 'エラー対象ドメイン';
COMMENT ON COLUMN sskadminuser.f_mail_domain_revision.revision_aft_domain_1 IS '補正後ドメイン1';
COMMENT ON COLUMN sskadminuser.f_mail_domain_revision.revision_aft_domain_2 IS '補正後ドメイン2';
COMMENT ON COLUMN sskadminuser.f_mail_domain_revision.update_date IS '更新日時';
COMMENT ON COLUMN sskadminuser.f_mail_domain_revision.register_date IS '登録日時';
COMMENT ON COLUMN sskadminuser.f_mail_domain_revision.update_user_cd IS '更新者';
COMMENT ON COLUMN sskadminuser.f_mail_domain_revision.register_user_cd IS '登録者';
-- CREATE INDEX 
CREATE INDEX idx_f_mail_domain_revision_01 ON sskadminuser.f_mail_domain_revision (err_tgt_domain,revision_aft_domain_1,revision_aft_domain_2);
CREATE INDEX idx_f_mail_domain_revision_02 ON sskadminuser.f_mail_domain_revision (update_date,register_date);
-- END TABLE : sskadminuser.f_mail_domain_revision  --

-- START TABLE : sskadminuser.w_chatbot_session  --
CREATE TABLE sskadminuser.w_chatbot_session(
cust_no INT DEFAULT 0,
chatbot_session_id VARCHAR(255) NOT NULL,
del_flg CHAR(1) NOT NULL DEFAULT '0',
update_date TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT current_timestamp(0),
register_date TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT current_timestamp(0),
update_user_cd VARCHAR(64),
register_user_cd VARCHAR(64)
);
-- ADD COLUMN
COMMENT ON TABLE sskadminuser.w_chatbot_session IS 'チャットボット用セッション補助伝票';
COMMENT ON COLUMN sskadminuser.w_chatbot_session.cust_no IS '会員番号';
COMMENT ON COLUMN sskadminuser.w_chatbot_session.chatbot_session_id IS 'チャットボットセッションID';
COMMENT ON COLUMN sskadminuser.w_chatbot_session.del_flg IS '削除フラグ';
COMMENT ON COLUMN sskadminuser.w_chatbot_session.update_date IS '更新日時';
COMMENT ON COLUMN sskadminuser.w_chatbot_session.register_date IS '登録日時';
COMMENT ON COLUMN sskadminuser.w_chatbot_session.update_user_cd IS '更新者';
COMMENT ON COLUMN sskadminuser.w_chatbot_session.register_user_cd IS '登録者';
-- CREATE INDEX 
-- END TABLE : sskadminuser.w_chatbot_session  --

-- START TABLE : sskadminuser.m_important_notice  --
CREATE TABLE sskadminuser.m_important_notice(
notice_seq BIGINT NOT NULL,
notice_dtl VARCHAR(2000) NOT NULL,
start_dt_tm TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL,
end_dt_tm TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL,
disp_flg CHAR(1) NOT NULL DEFAULT '1',
del_flg CHAR(1) NOT NULL DEFAULT '0',
update_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
register_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
update_user_cd VARCHAR(64) NOT NULL,
register_user_cd VARCHAR(64) NOT NULL,
CONSTRAINT pk_m_important_notice PRIMARY KEY (notice_seq)
);
-- ADD COLUMN
COMMENT ON TABLE sskadminuser.m_important_notice IS '重要なお知らせ台帳';
COMMENT ON COLUMN sskadminuser.m_important_notice.notice_seq IS 'お知らせ連番';
COMMENT ON COLUMN sskadminuser.m_important_notice.notice_dtl IS 'お知らせ詳細';
COMMENT ON COLUMN sskadminuser.m_important_notice.start_dt_tm IS '開始日時';
COMMENT ON COLUMN sskadminuser.m_important_notice.end_dt_tm IS '終了日時';
COMMENT ON COLUMN sskadminuser.m_important_notice.disp_flg IS '表示フラグ';
COMMENT ON COLUMN sskadminuser.m_important_notice.del_flg IS '削除フラグ';
COMMENT ON COLUMN sskadminuser.m_important_notice.update_date IS '更新日時';
COMMENT ON COLUMN sskadminuser.m_important_notice.register_date IS '登録日時';
COMMENT ON COLUMN sskadminuser.m_important_notice.update_user_cd IS '更新者';
COMMENT ON COLUMN sskadminuser.m_important_notice.register_user_cd IS '登録者';
-- CREATE INDEX 
CREATE INDEX idx_m_important_notice_01 ON sskadminuser.m_important_notice (start_dt_tm,end_dt_tm,disp_flg,del_flg);
CREATE INDEX idx_m_important_notice_02 ON sskadminuser.m_important_notice (start_dt_tm,end_dt_tm);
CREATE INDEX idx_m_important_notice_03 ON sskadminuser.m_important_notice (update_date,register_date);
-- END TABLE : sskadminuser.m_important_notice  --

-- START TABLE : sskadminuser.m_ec_campgn  --
CREATE TABLE sskadminuser.m_ec_campgn(
campgn_grp_cd VARCHAR(5) NOT NULL,
campgn_cd VARCHAR(5) NOT NULL,
key VARCHAR(30) NOT NULL,
start_dt VARCHAR(8) NOT NULL,
start_tm VARCHAR(8) NOT NULL,
end_dt VARCHAR(8) NOT NULL,
end_tm VARCHAR(8) NOT NULL,
disp_start_dt VARCHAR(8) NOT NULL,
disp_start_tm VARCHAR(8) NOT NULL,
disp_end_dt VARCHAR(8) NOT NULL,
disp_end_tm VARCHAR(8) NOT NULL,
surprise_item_flg INT,
overseas_ship_ng_campgn_item_flg INT,
base_4_piece_cnt_banner VARCHAR(200),
base_4_piece_cnt_banner_up_color_cd VARCHAR(7),
base_4_piece_cnt_banner_deadline_dt TIMESTAMP(0) WITHOUT TIME ZONE,
new_term VARCHAR(3),
other VARCHAR(500),
prev_end_term VARCHAR(3),
icon VARCHAR(200),
caption VARCHAR(200),
campgn_pre_item_thumbnail_1 VARCHAR(200),
campgn_pre_item_thumbnail_2 VARCHAR(200),
campgn_pre_item_thumbnail_3 VARCHAR(200),
campgn_pre_item_name VARCHAR(20),
campgn_wording VARCHAR(500),
mob_campgn_wording VARCHAR(500),
banner VARCHAR(200),
banner_low_wording_1 VARCHAR(500),
banner_low_wording_2 VARCHAR(500),
banner_low_wording_3 VARCHAR(500),
pre_item_impressions VARCHAR(500),
pre_item_impressions_disp_turn INT,
pre_item_thumbnail_1 VARCHAR(200),
pre_item_thumbnail_2 VARCHAR(200),
pre_item_thumbnail_3 VARCHAR(200),
pre_item_name VARCHAR(20),
pre_item_name_thumbnail VARCHAR(200),
pre_item_turn INT,
point VARCHAR(50),
point_icon_color VARCHAR(7),
point_pre_item_thumbnail_1 VARCHAR(200),
point_pre_item_thumbnail_2 VARCHAR(200),
point_pre_item_name VARCHAR(20),
capa VARCHAR(20),
season_pre_item_turn INT,
wording VARCHAR(500),
link_to VARCHAR(200),
prior_turn INT,
temp_login_disp_flg INT NOT NULL,
un_login_ikusei_disp_flg INT NOT NULL,
un_login_disp_flg INT NOT NULL,
un_login_resend_disp_flg INT NOT NULL,
un_login_resend_replace_flg INT NOT NULL,
campgn_lst_end_dt_disp_flg INT NOT NULL,
update_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
register_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
update_user_cd VARCHAR(64) NOT NULL,
register_user_cd VARCHAR(64) NOT NULL,
del_flg INT
);
-- ADD COLUMN
COMMENT ON TABLE sskadminuser.m_ec_campgn IS 'ECキャンペーン台帳';
COMMENT ON COLUMN sskadminuser.m_ec_campgn.campgn_grp_cd IS 'キャンペーングループコード';
COMMENT ON COLUMN sskadminuser.m_ec_campgn.campgn_cd IS 'キャンペーンコード';
COMMENT ON COLUMN sskadminuser.m_ec_campgn.key IS 'キー';
COMMENT ON COLUMN sskadminuser.m_ec_campgn.start_dt IS '開始日';
COMMENT ON COLUMN sskadminuser.m_ec_campgn.start_tm IS '開始時間';
COMMENT ON COLUMN sskadminuser.m_ec_campgn.end_dt IS '終了日';
COMMENT ON COLUMN sskadminuser.m_ec_campgn.end_tm IS '終了時間';
COMMENT ON COLUMN sskadminuser.m_ec_campgn.disp_start_dt IS '表示開始日';
COMMENT ON COLUMN sskadminuser.m_ec_campgn.disp_start_tm IS '表示開始時間';
COMMENT ON COLUMN sskadminuser.m_ec_campgn.disp_end_dt IS '表示終了日';
COMMENT ON COLUMN sskadminuser.m_ec_campgn.disp_end_tm IS '表示終了時間';
COMMENT ON COLUMN sskadminuser.m_ec_campgn.surprise_item_flg IS 'サプライズ商品フラグ';
COMMENT ON COLUMN sskadminuser.m_ec_campgn.overseas_ship_ng_campgn_item_flg IS '海外発送禁止キャンペーン品フラグ';
COMMENT ON COLUMN sskadminuser.m_ec_campgn.base_4_piece_cnt_banner IS '基本4点カウンターバナー ';
COMMENT ON COLUMN sskadminuser.m_ec_campgn.base_4_piece_cnt_banner_up_color_cd IS '基本4点カウンターバナー上カラーコード';
COMMENT ON COLUMN sskadminuser.m_ec_campgn.base_4_piece_cnt_banner_deadline_dt IS '基本4点カウンター締切日';
COMMENT ON COLUMN sskadminuser.m_ec_campgn.new_term IS 'NEW期間';
COMMENT ON COLUMN sskadminuser.m_ec_campgn.other IS 'その他';
COMMENT ON COLUMN sskadminuser.m_ec_campgn.prev_end_term IS 'もうすぐ終了期間';
COMMENT ON COLUMN sskadminuser.m_ec_campgn.icon IS 'アイコン';
COMMENT ON COLUMN sskadminuser.m_ec_campgn.caption IS 'キャプション';
COMMENT ON COLUMN sskadminuser.m_ec_campgn.campgn_pre_item_thumbnail_1 IS 'キャンペーンプレゼント品サムネイル1';
COMMENT ON COLUMN sskadminuser.m_ec_campgn.campgn_pre_item_thumbnail_2 IS 'キャンペーンプレゼント品サムネイル2';
COMMENT ON COLUMN sskadminuser.m_ec_campgn.campgn_pre_item_thumbnail_3 IS 'キャンペーンプレゼント品サムネイル3';
COMMENT ON COLUMN sskadminuser.m_ec_campgn.campgn_pre_item_name IS 'キャンペーンプレゼント品名称';
COMMENT ON COLUMN sskadminuser.m_ec_campgn.campgn_wording IS 'キャンペーン文言';
COMMENT ON COLUMN sskadminuser.m_ec_campgn.mob_campgn_wording IS '携帯用キャンペーン文言';
COMMENT ON COLUMN sskadminuser.m_ec_campgn.banner IS 'バナー';
COMMENT ON COLUMN sskadminuser.m_ec_campgn.banner_low_wording_1 IS 'バナー下文言1';
COMMENT ON COLUMN sskadminuser.m_ec_campgn.banner_low_wording_2 IS 'バナー下文言2';
COMMENT ON COLUMN sskadminuser.m_ec_campgn.banner_low_wording_3 IS 'バナー下文言3';
COMMENT ON COLUMN sskadminuser.m_ec_campgn.pre_item_impressions IS 'プレゼント品のご感想';
COMMENT ON COLUMN sskadminuser.m_ec_campgn.pre_item_impressions_disp_turn IS 'プレゼント品のご感想表示順';
COMMENT ON COLUMN sskadminuser.m_ec_campgn.pre_item_thumbnail_1 IS 'プレゼント品サムネイル 1';
COMMENT ON COLUMN sskadminuser.m_ec_campgn.pre_item_thumbnail_2 IS 'プレゼント品サムネイル 2';
COMMENT ON COLUMN sskadminuser.m_ec_campgn.pre_item_thumbnail_3 IS 'プレゼント品サムネイル 3';
COMMENT ON COLUMN sskadminuser.m_ec_campgn.pre_item_name IS 'プレゼント品名称';
COMMENT ON COLUMN sskadminuser.m_ec_campgn.pre_item_name_thumbnail IS 'プレゼント品名称サムネイル';
COMMENT ON COLUMN sskadminuser.m_ec_campgn.pre_item_turn IS 'プレゼント品順番';
COMMENT ON COLUMN sskadminuser.m_ec_campgn.point IS 'ポイント';
COMMENT ON COLUMN sskadminuser.m_ec_campgn.point_icon_color IS 'ポイントアイコン色';
COMMENT ON COLUMN sskadminuser.m_ec_campgn.point_pre_item_thumbnail_1 IS 'ポイントプレゼント品サムネイル 1';
COMMENT ON COLUMN sskadminuser.m_ec_campgn.point_pre_item_thumbnail_2 IS 'ポイントプレゼント品サムネイル 2';
COMMENT ON COLUMN sskadminuser.m_ec_campgn.point_pre_item_name IS 'ポイントプレゼント品名称';
COMMENT ON COLUMN sskadminuser.m_ec_campgn.capa IS '内容量';
COMMENT ON COLUMN sskadminuser.m_ec_campgn.season_pre_item_turn IS '季節のプレゼント品順番';
COMMENT ON COLUMN sskadminuser.m_ec_campgn.wording IS '文言';
COMMENT ON COLUMN sskadminuser.m_ec_campgn.link_to IS '遷移先';
COMMENT ON COLUMN sskadminuser.m_ec_campgn.prior_turn IS '優先順';
COMMENT ON COLUMN sskadminuser.m_ec_campgn.temp_login_disp_flg IS '仮ログイン時表示フラグ';
COMMENT ON COLUMN sskadminuser.m_ec_campgn.un_login_ikusei_disp_flg IS '未ログイン時育成用表示フラグ';
COMMENT ON COLUMN sskadminuser.m_ec_campgn.un_login_disp_flg IS '未ログイン時表示フラグ';
COMMENT ON COLUMN sskadminuser.m_ec_campgn.un_login_resend_disp_flg IS '未ログイン時再送用表示フラグ';
COMMENT ON COLUMN sskadminuser.m_ec_campgn.un_login_resend_replace_flg IS '未ログイン時再送用置換フラグ';
COMMENT ON COLUMN sskadminuser.m_ec_campgn.campgn_lst_end_dt_disp_flg IS 'キャンペーン一覧終了日表示フラグ';
COMMENT ON COLUMN sskadminuser.m_ec_campgn.update_date IS '更新日時';
COMMENT ON COLUMN sskadminuser.m_ec_campgn.register_date IS '登録日時';
COMMENT ON COLUMN sskadminuser.m_ec_campgn.update_user_cd IS '更新者';
COMMENT ON COLUMN sskadminuser.m_ec_campgn.register_user_cd IS '登録者';
COMMENT ON COLUMN sskadminuser.m_ec_campgn.del_flg IS '削除フラグ';
-- CREATE INDEX 
-- END TABLE : sskadminuser.m_ec_campgn  --

-- START TABLE : sskadminuser.f_odr_dlv  --
CREATE TABLE sskadminuser.f_odr_dlv(
odr_seq BIGINT NOT NULL,
post_no VARCHAR(8),
kana_adr VARCHAR(180),
adr VARCHAR(180),
adr_non_chg_part VARCHAR(124),
kana_adr_non_chg_part VARCHAR(124),
pref_cd CHAR(2),
update_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
register_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
update_user_cd VARCHAR(64) NOT NULL,
register_user_cd VARCHAR(64) NOT NULL,
CONSTRAINT pk_f_odr_dlv PRIMARY KEY (odr_seq)
);
-- ADD COLUMN
COMMENT ON TABLE sskadminuser.f_odr_dlv IS '注文配送先伝票';
COMMENT ON COLUMN sskadminuser.f_odr_dlv.odr_seq IS '注文連番';
COMMENT ON COLUMN sskadminuser.f_odr_dlv.post_no IS '郵便番号';
COMMENT ON COLUMN sskadminuser.f_odr_dlv.kana_adr IS 'カナ住所';
COMMENT ON COLUMN sskadminuser.f_odr_dlv.adr IS '住所';
COMMENT ON COLUMN sskadminuser.f_odr_dlv.adr_non_chg_part IS '住所非変換部';
COMMENT ON COLUMN sskadminuser.f_odr_dlv.kana_adr_non_chg_part IS 'カナ住所非変換部';
COMMENT ON COLUMN sskadminuser.f_odr_dlv.pref_cd IS '県コード';
COMMENT ON COLUMN sskadminuser.f_odr_dlv.update_date IS '更新日時';
COMMENT ON COLUMN sskadminuser.f_odr_dlv.register_date IS '登録日時';
COMMENT ON COLUMN sskadminuser.f_odr_dlv.update_user_cd IS '更新者';
COMMENT ON COLUMN sskadminuser.f_odr_dlv.register_user_cd IS '登録者';
-- CREATE INDEX 
-- END TABLE : sskadminuser.f_odr_dlv  --

-- START TABLE : sskadminuser.f_odr_direct  --
CREATE TABLE sskadminuser.f_odr_direct(
odr_seq BIGINT NOT NULL,
name VARCHAR(104),
name_kana VARCHAR(92),
sex_kbn CHAR(1),
birthday VARCHAR(56),
era_kbn CHAR(1),
post_no VARCHAR(8),
adr VARCHAR(180),
adr_kana VARCHAR(180),
adr_non_chg_part VARCHAR(124),
adr_non_chg_part_kana VARCHAR(124),
mail_adr VARCHAR(180),
pref_cd CHAR(2),
job_cd CHAR(2),
dm_mail_flg CHAR(1) DEFAULT '1',
media_cd VARCHAR(8),
media_name VARCHAR(50),
entry_trigger_question_media_kbn VARCHAR(8),
entry_trigger_question_media_name VARCHAR(50),
inq_keyword VARCHAR(6),
mob_mail_adr VARCHAR(180),
sensitive_skin_flg CHAR(1),
sensitive_skin_comment TEXT,
indiv_info_handling_agree_flg CHAR(1) DEFAULT '0',
mail_send_kbn CHAR(1),
core_sys_send_rslt_flg CHAR(1),
dupl_flg CHAR(1) NOT NULL DEFAULT '0',
cosme_opt_in_kbn CHAR(1),
herb_optin_kbn CHAR(1),
smpl_req_seq VARCHAR(32),
update_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
register_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
update_user_cd VARCHAR(64) NOT NULL,
register_user_cd VARCHAR(64) NOT NULL,
CONSTRAINT pk_f_odr_direct PRIMARY KEY (odr_seq)
);
-- ADD COLUMN
COMMENT ON TABLE sskadminuser.f_odr_direct IS '注文直販伝票';
COMMENT ON COLUMN sskadminuser.f_odr_direct.odr_seq IS '注文連番';
COMMENT ON COLUMN sskadminuser.f_odr_direct.name IS '氏名';
COMMENT ON COLUMN sskadminuser.f_odr_direct.name_kana IS '氏名カナ';
COMMENT ON COLUMN sskadminuser.f_odr_direct.sex_kbn IS '性別区分';
COMMENT ON COLUMN sskadminuser.f_odr_direct.birthday IS '生年月日';
COMMENT ON COLUMN sskadminuser.f_odr_direct.era_kbn IS '年号区分';
COMMENT ON COLUMN sskadminuser.f_odr_direct.post_no IS '郵便番号';
COMMENT ON COLUMN sskadminuser.f_odr_direct.adr IS '住所';
COMMENT ON COLUMN sskadminuser.f_odr_direct.adr_kana IS '住所カナ';
COMMENT ON COLUMN sskadminuser.f_odr_direct.adr_non_chg_part IS '住所非変換部';
COMMENT ON COLUMN sskadminuser.f_odr_direct.adr_non_chg_part_kana IS '住所非変換部カナ';
COMMENT ON COLUMN sskadminuser.f_odr_direct.mail_adr IS 'メールアドレス';
COMMENT ON COLUMN sskadminuser.f_odr_direct.pref_cd IS '県コード';
COMMENT ON COLUMN sskadminuser.f_odr_direct.job_cd IS '職業コード';
COMMENT ON COLUMN sskadminuser.f_odr_direct.dm_mail_flg IS 'DMメールフラグ';
COMMENT ON COLUMN sskadminuser.f_odr_direct.media_cd IS '媒体コード';
COMMENT ON COLUMN sskadminuser.f_odr_direct.media_name IS '媒体名称';
COMMENT ON COLUMN sskadminuser.f_odr_direct.entry_trigger_question_media_kbn IS '申込のきっかけ質問媒体区分';
COMMENT ON COLUMN sskadminuser.f_odr_direct.entry_trigger_question_media_name IS '申込のきっかけ質問媒体名称';
COMMENT ON COLUMN sskadminuser.f_odr_direct.inq_keyword IS '検索キーワード';
COMMENT ON COLUMN sskadminuser.f_odr_direct.mob_mail_adr IS '携帯メールアドレス';
COMMENT ON COLUMN sskadminuser.f_odr_direct.sensitive_skin_flg IS '敏感肌フラグ';
COMMENT ON COLUMN sskadminuser.f_odr_direct.sensitive_skin_comment IS '敏感肌コメント';
COMMENT ON COLUMN sskadminuser.f_odr_direct.indiv_info_handling_agree_flg IS '個人情報取扱同意フラグ';
COMMENT ON COLUMN sskadminuser.f_odr_direct.mail_send_kbn IS 'メール送信区分';
COMMENT ON COLUMN sskadminuser.f_odr_direct.core_sys_send_rslt_flg IS '基幹送信結果フラグ';
COMMENT ON COLUMN sskadminuser.f_odr_direct.dupl_flg IS '重複フラグ';
COMMENT ON COLUMN sskadminuser.f_odr_direct.cosme_opt_in_kbn IS '化粧品オプトイン区分';
COMMENT ON COLUMN sskadminuser.f_odr_direct.herb_optin_kbn IS '漢方オプトイン区分';
COMMENT ON COLUMN sskadminuser.f_odr_direct.smpl_req_seq IS 'サンプル請求連番';
COMMENT ON COLUMN sskadminuser.f_odr_direct.update_date IS '更新日時';
COMMENT ON COLUMN sskadminuser.f_odr_direct.register_date IS '登録日時';
COMMENT ON COLUMN sskadminuser.f_odr_direct.update_user_cd IS '更新者';
COMMENT ON COLUMN sskadminuser.f_odr_direct.register_user_cd IS '登録者';
-- CREATE INDEX 
-- END TABLE : sskadminuser.f_odr_direct  --

-- START TABLE : sskadminuser.f_odr_regular  --
CREATE TABLE sskadminuser.f_odr_regular(
odr_seq BIGINT NOT NULL,
next_dlv_dt CHAR(2),
next_dlv_week CHAR(2),
next_dlv_day CHAR(2),
update_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
register_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
update_user_cd VARCHAR(64) NOT NULL,
register_user_cd VARCHAR(64) NOT NULL,
CONSTRAINT pk_f_odr_regular PRIMARY KEY (odr_seq)
);
-- ADD COLUMN
COMMENT ON TABLE sskadminuser.f_odr_regular IS '注文定期伝票';
COMMENT ON COLUMN sskadminuser.f_odr_regular.odr_seq IS '注文連番';
COMMENT ON COLUMN sskadminuser.f_odr_regular.next_dlv_dt IS '次回配送日';
COMMENT ON COLUMN sskadminuser.f_odr_regular.next_dlv_week IS '次回配送週';
COMMENT ON COLUMN sskadminuser.f_odr_regular.next_dlv_day IS '次回配送曜日';
COMMENT ON COLUMN sskadminuser.f_odr_regular.update_date IS '更新日時';
COMMENT ON COLUMN sskadminuser.f_odr_regular.register_date IS '登録日時';
COMMENT ON COLUMN sskadminuser.f_odr_regular.update_user_cd IS '更新者';
COMMENT ON COLUMN sskadminuser.f_odr_regular.register_user_cd IS '登録者';
-- CREATE INDEX 
-- END TABLE : sskadminuser.f_odr_regular  --

-- START TABLE : sskadminuser.m_mypage  --
CREATE TABLE sskadminuser.m_mypage(
area_cd VARCHAR(5) NOT NULL,
area_name VARCHAR(20) NOT NULL,
ptnkbn INT DEFAULT 0,
disp_flg INT DEFAULT 0,
add_area_flg INT DEFAULT 0,
prior_turn INT,
partial_path VARCHAR(50),
disp_start_dt_tm TIMESTAMP(0) WITHOUT TIME ZONE,
disp_end_dt_tm TIMESTAMP(0) WITHOUT TIME ZONE,
update_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
register_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
update_user_cd VARCHAR(64) NOT NULL,
register_user_cd VARCHAR(64) NOT NULL,
del_flg INT DEFAULT 0,
CONSTRAINT pk_m_mypage PRIMARY KEY (area_cd,area_name)
);
-- ADD COLUMN
COMMENT ON TABLE sskadminuser.m_mypage IS 'マイページ台帳';
COMMENT ON COLUMN sskadminuser.m_mypage.area_cd IS 'エリアコード';
COMMENT ON COLUMN sskadminuser.m_mypage.area_name IS 'エリア名';
COMMENT ON COLUMN sskadminuser.m_mypage.ptnkbn IS 'パターン区分';
COMMENT ON COLUMN sskadminuser.m_mypage.disp_flg IS '表示フラグ';
COMMENT ON COLUMN sskadminuser.m_mypage.add_area_flg IS '追加エリアフラグ';
COMMENT ON COLUMN sskadminuser.m_mypage.prior_turn IS '優先順';
COMMENT ON COLUMN sskadminuser.m_mypage.partial_path IS 'パーシャルパス';
COMMENT ON COLUMN sskadminuser.m_mypage.disp_start_dt_tm IS '表示開始日時';
COMMENT ON COLUMN sskadminuser.m_mypage.disp_end_dt_tm IS '表示終了日時';
COMMENT ON COLUMN sskadminuser.m_mypage.update_date IS '更新日時';
COMMENT ON COLUMN sskadminuser.m_mypage.register_date IS '登録日時';
COMMENT ON COLUMN sskadminuser.m_mypage.update_user_cd IS '更新者';
COMMENT ON COLUMN sskadminuser.m_mypage.register_user_cd IS '登録者';
COMMENT ON COLUMN sskadminuser.m_mypage.del_flg IS '削除フラグ';
-- CREATE INDEX 
-- END TABLE : sskadminuser.m_mypage  --

-- START TABLE : sskadminuser.m_item_name_conversion  --
CREATE TABLE sskadminuser.m_item_name_conversion(
item_cd VARCHAR(4) NOT NULL,
avail_start_dt TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL,
avail_end_dt TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL,
item_name VARCHAR(22) NOT NULL,
update_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
register_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
update_user_cd VARCHAR(64) NOT NULL,
register_user_cd VARCHAR(64) NOT NULL,
CONSTRAINT pk_m_item_name_conversion PRIMARY KEY (item_cd,avail_start_dt)
);
-- ADD COLUMN
COMMENT ON TABLE sskadminuser.m_item_name_conversion IS '商品名変換台帳';
COMMENT ON COLUMN sskadminuser.m_item_name_conversion.item_cd IS '商品コード';
COMMENT ON COLUMN sskadminuser.m_item_name_conversion.avail_start_dt IS '有効開始日';
COMMENT ON COLUMN sskadminuser.m_item_name_conversion.avail_end_dt IS '有効終了日';
COMMENT ON COLUMN sskadminuser.m_item_name_conversion.item_name IS '商品名称';
COMMENT ON COLUMN sskadminuser.m_item_name_conversion.update_date IS '更新日時';
COMMENT ON COLUMN sskadminuser.m_item_name_conversion.register_date IS '登録日時';
COMMENT ON COLUMN sskadminuser.m_item_name_conversion.update_user_cd IS '更新者';
COMMENT ON COLUMN sskadminuser.m_item_name_conversion.register_user_cd IS '登録者';
-- CREATE INDEX 
-- END TABLE : sskadminuser.m_item_name_conversion  --

-- START TABLE : sskadminuser.m_offline_data  --
CREATE TABLE sskadminuser.m_offline_data(
mbr_seq BIGINT NOT NULL,
cust_no INT NOT NULL,
tel_no CHAR(64),
net_mbr_cd VARCHAR(12),
input_kbn CHAR(1) NOT NULL DEFAULT '1',
err_flg CHAR(1) NOT NULL DEFAULT '0',
cust_name_kana VARCHAR(84),
cust_name VARCHAR(84),
adr_post_no VARCHAR(8),
kana_adr VARCHAR(292),
adr VARCHAR(216),
adr_non_chg_part VARCHAR(124),
pref_cd VARCHAR(2),
another_adr_flg CHAR(1) DEFAULT '0',
another_adr VARCHAR(216),
another_adr_non_chg_part VARCHAR(124),
another_adr_tel_no VARCHAR(64),
another_adr_post_no VARCHAR(8),
sex_kbn CHAR(1),
era_kbn CHAR(1),
birthday CHAR(56),
fax_no VARCHAR(64),
odr_kbn CHAR(1) DEFAULT '0',
odr_ng_rsn VARCHAR(2) DEFAULT '0',
last_buy_dt_1 VARCHAR(8),
last_buy_dt_2 VARCHAR(8),
last_buy_dt_3 VARCHAR(8),
last_buy_dt_4 VARCHAR(8),
last_buy_dt_5 VARCHAR(8),
first_buy_dt_1 VARCHAR(8),
first_buy_dt_2 VARCHAR(8),
first_buy_dt_3 VARCHAR(8),
first_buy_dt_4 VARCHAR(8),
first_buy_dt_5 VARCHAR(8),
buy_cnt VARCHAR(4),
herb_buy_cnt VARCHAR(4),
today_buy_flg CHAR(1),
today_buy_odr_kbn CHAR(1),
accumulation_point INT,
point_avail_term TIMESTAMP(0) WITHOUT TIME ZONE,
credit_card_corp_kbn VARCHAR(2),
credit_card_no CHAR(68),
credit_card_name VARCHAR(72),
credit_card_avail_term CHAR(6),
acnt_kbn CHAR(1),
shin_base_4_piece_campgn_tgt_person_flg CHAR(1) DEFAULT '0',
shin_base_4_piece_campgn_notice_cd VARCHAR(6) DEFAULT '0',
base_4_piece_campgn_g_tot_num INT DEFAULT 0,
preparation_3_piece_campgn_tgt_person_flg CHAR(1) DEFAULT '0',
preparation_3_piece_campgn_notice_cd VARCHAR(6) DEFAULT '0',
preparation_3_piece_campgn_g_tot_num INT,
domo_7_piece_campgn_tgt_person_flg CHAR(1) DEFAULT '0',
domo_7_piece_campgn_notice_cd VARCHAR(6) DEFAULT '0',
domo_7_piece_campgn_g_tot_num INT DEFAULT 0,
domo_7_piece_buy_g_tot_num_1 INT DEFAULT 0,
domo_7_piece_buy_g_tot_num_2 INT DEFAULT 0,
domo_7_piece_buy_g_tot_num_3 INT DEFAULT 0,
domo_7_piece_buy_g_tot_num_4 INT DEFAULT 0,
domo_7_piece_buy_g_tot_num_5 INT DEFAULT 0,
domo_7_piece_buy_g_tot_num_6 INT DEFAULT 0,
domo_7_piece_buy_g_tot_num_7 INT DEFAULT 0,
year_end_pre_tgt_person_flg CHAR(1) DEFAULT '0',
campgn_flg_1 CHAR(1) DEFAULT '0',
campgn_notice_cd_1 VARCHAR(6) DEFAULT '0',
campgn_flg_2 CHAR(1) DEFAULT '0',
campgn_notice_cd_2 VARCHAR(6) DEFAULT '0',
campgn_flg_3 CHAR(1) DEFAULT '0',
campgn_notice_cd_3 VARCHAR(6) DEFAULT '0',
campgn_flg_4 CHAR(1) DEFAULT '0',
campgn_notice_cd_4 VARCHAR(6) DEFAULT '0',
campgn_flg_5 CHAR(1) DEFAULT '0',
campgn_notice_cd_5 VARCHAR(6) DEFAULT '0',
campgn_g_tot_num_1 INT DEFAULT 0,
campgn_g_tot_num_2 INT DEFAULT 0,
campgn_g_tot_num_3 INT DEFAULT 0,
campgn_g_tot_num_4 INT DEFAULT 0,
more_tabi_stat_kbn CHAR(1),
more_tabi_entry_dt TIMESTAMP(0) WITHOUT TIME ZONE,
more_tabi_kbn CHAR(1),
pay_limit_flg CHAR(1),
pay_over_flg CHAR(1),
debit_flg CHAR(1),
last_login_dt_tm TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT current_timestamp(0),
update_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
register_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
update_user_cd VARCHAR(64) NOT NULL,
register_user_cd VARCHAR(64) NOT NULL,
base_4_piece_buy_num_1 INT DEFAULT 0,
base_4_piece_buy_num_2 INT DEFAULT 0,
base_4_piece_buy_num_3 INT DEFAULT 0,
base_4_piece_buy_num_4 INT DEFAULT 0,
base_3_piece_buy_num_1 INT,
base_3_piece_buy_num_2 INT,
base_3_piece_buy_num_3 INT,
base_7_piece_buy_num_1 INT DEFAULT 0,
base_7_piece_buy_num_2 INT DEFAULT 0,
base_7_piece_buy_num_3 INT DEFAULT 0,
base_7_piece_buy_num_4 INT DEFAULT 0,
base_7_piece_buy_num_5 INT DEFAULT 0,
base_7_piece_buy_num_6 INT DEFAULT 0,
base_7_piece_buy_num_7 INT DEFAULT 0,
base_4_piece_2_buy_num_1 INT,
base_4_piece_2_buy_num_2 INT,
base_4_piece_2_buy_num_3 INT,
base_4_piece_2_buy_num_4 INT,
dw_half_kbn CHAR(1),
dress_another_send_kbn CHAR(1) DEFAULT '0',
dress_direct_kbn CHAR(1) DEFAULT '0',
dm_flg CHAR(1),
dm_flg_upd_dt VARCHAR(8),
modal_shift_flg CHAR(1),
country_cd VARCHAR(2),
overseas_to_name VARCHAR(124),
overseas_post_no VARCHAR(15),
overseas_adr_1 VARCHAR(124),
overseas_adr_2 VARCHAR(124),
overseas_adr_3 VARCHAR(124),
overseas_tel_no VARCHAR(72),
drink_domo_direct_kbn CHAR(1),
reply_way_kbn CHAR(1),
depo INT,
route_dtl_kbn CHAR(2),
cosme_g_tot_buy_cnt VARCHAR(4),
credit_corp_kbn CHAR(2),
mbr_cd VARCHAR(128),
mbr_pwd VARCHAR(64),
card_input_seq INT,
card_input_seq_mode CHAR(1),
chohaku_regular_buy_stat_kbn CHAR(1),
yojo_5_pack_buy_cnt INT,
amazon_billing_agreement_id VARCHAR(64),
indiv_name_ship_kbn CHAR(3),
indiv_name_ship_sender_name VARCHAR(30),
CONSTRAINT pk_m_offline_data PRIMARY KEY (mbr_seq)
);
-- ADD COLUMN
COMMENT ON TABLE sskadminuser.m_offline_data IS 'オフライン用データ台帳';
COMMENT ON COLUMN sskadminuser.m_offline_data.mbr_seq IS '会員連番';
COMMENT ON COLUMN sskadminuser.m_offline_data.cust_no IS '会員番号';
COMMENT ON COLUMN sskadminuser.m_offline_data.tel_no IS '電話番号';
COMMENT ON COLUMN sskadminuser.m_offline_data.net_mbr_cd IS 'ネット会員コード';
COMMENT ON COLUMN sskadminuser.m_offline_data.input_kbn IS '登録区分';
COMMENT ON COLUMN sskadminuser.m_offline_data.err_flg IS 'エラーフラグ';
COMMENT ON COLUMN sskadminuser.m_offline_data.cust_name_kana IS '会員氏名カナ';
COMMENT ON COLUMN sskadminuser.m_offline_data.cust_name IS '会員氏名';
COMMENT ON COLUMN sskadminuser.m_offline_data.adr_post_no IS '住所郵便番号';
COMMENT ON COLUMN sskadminuser.m_offline_data.kana_adr IS 'カナ住所';
COMMENT ON COLUMN sskadminuser.m_offline_data.adr IS '本住所';
COMMENT ON COLUMN sskadminuser.m_offline_data.adr_non_chg_part IS '住所非変換部';
COMMENT ON COLUMN sskadminuser.m_offline_data.pref_cd IS '県コード';
COMMENT ON COLUMN sskadminuser.m_offline_data.another_adr_flg IS '別住所フラグ';
COMMENT ON COLUMN sskadminuser.m_offline_data.another_adr IS '別住所';
COMMENT ON COLUMN sskadminuser.m_offline_data.another_adr_non_chg_part IS '別住所非変換部';
COMMENT ON COLUMN sskadminuser.m_offline_data.another_adr_tel_no IS '別住所電話番号';
COMMENT ON COLUMN sskadminuser.m_offline_data.another_adr_post_no IS '別住所郵便番号';
COMMENT ON COLUMN sskadminuser.m_offline_data.sex_kbn IS '性別区分';
COMMENT ON COLUMN sskadminuser.m_offline_data.era_kbn IS '年号区分';
COMMENT ON COLUMN sskadminuser.m_offline_data.birthday IS '生年月日';
COMMENT ON COLUMN sskadminuser.m_offline_data.fax_no IS 'FAX番号';
COMMENT ON COLUMN sskadminuser.m_offline_data.odr_kbn IS '注文区分';
COMMENT ON COLUMN sskadminuser.m_offline_data.odr_ng_rsn IS '注文不可理由';
COMMENT ON COLUMN sskadminuser.m_offline_data.last_buy_dt_1 IS '最終購入日1';
COMMENT ON COLUMN sskadminuser.m_offline_data.last_buy_dt_2 IS '最終購入日2';
COMMENT ON COLUMN sskadminuser.m_offline_data.last_buy_dt_3 IS '最終購入日3';
COMMENT ON COLUMN sskadminuser.m_offline_data.last_buy_dt_4 IS '最終購入日4';
COMMENT ON COLUMN sskadminuser.m_offline_data.last_buy_dt_5 IS '最終購入日5';
COMMENT ON COLUMN sskadminuser.m_offline_data.first_buy_dt_1 IS '初回購入日1';
COMMENT ON COLUMN sskadminuser.m_offline_data.first_buy_dt_2 IS '初回購入日2';
COMMENT ON COLUMN sskadminuser.m_offline_data.first_buy_dt_3 IS '初回購入日3';
COMMENT ON COLUMN sskadminuser.m_offline_data.first_buy_dt_4 IS '初回購入日4';
COMMENT ON COLUMN sskadminuser.m_offline_data.first_buy_dt_5 IS '初回購入日5';
COMMENT ON COLUMN sskadminuser.m_offline_data.buy_cnt IS '購入回数';
COMMENT ON COLUMN sskadminuser.m_offline_data.herb_buy_cnt IS '漢方購入回数';
COMMENT ON COLUMN sskadminuser.m_offline_data.today_buy_flg IS '当日購入フラグ';
COMMENT ON COLUMN sskadminuser.m_offline_data.today_buy_odr_kbn IS '当日購入注文区分';
COMMENT ON COLUMN sskadminuser.m_offline_data.accumulation_point IS '積立ポイント';
COMMENT ON COLUMN sskadminuser.m_offline_data.point_avail_term IS 'ポイント有効期限';
COMMENT ON COLUMN sskadminuser.m_offline_data.credit_card_corp_kbn IS 'クレジットカード会社区分';
COMMENT ON COLUMN sskadminuser.m_offline_data.credit_card_no IS 'クレジットカード番号';
COMMENT ON COLUMN sskadminuser.m_offline_data.credit_card_name IS 'クレジットカード名義人';
COMMENT ON COLUMN sskadminuser.m_offline_data.credit_card_avail_term IS 'クレジットカード有効期限';
COMMENT ON COLUMN sskadminuser.m_offline_data.acnt_kbn IS '口座区分';
COMMENT ON COLUMN sskadminuser.m_offline_data.shin_base_4_piece_campgn_tgt_person_flg IS '進基本4点キャンペーン対象者フラグ';
COMMENT ON COLUMN sskadminuser.m_offline_data.shin_base_4_piece_campgn_notice_cd IS '進基本4点キャンペーンお知らせコード';
COMMENT ON COLUMN sskadminuser.m_offline_data.base_4_piece_campgn_g_tot_num IS '基本4点キャンペーン累積数';
COMMENT ON COLUMN sskadminuser.m_offline_data.preparation_3_piece_campgn_tgt_person_flg IS '準備3点キャンペーン対象者フラグ';
COMMENT ON COLUMN sskadminuser.m_offline_data.preparation_3_piece_campgn_notice_cd IS '準備3点キャンペーンお知らせコード';
COMMENT ON COLUMN sskadminuser.m_offline_data.preparation_3_piece_campgn_g_tot_num IS '準備3点キャンペーン累積数';
COMMENT ON COLUMN sskadminuser.m_offline_data.domo_7_piece_campgn_tgt_person_flg IS 'ドモ7点キャンペーン対象者フラグ';
COMMENT ON COLUMN sskadminuser.m_offline_data.domo_7_piece_campgn_notice_cd IS 'ドモ7点キャンペーンお知らせコード';
COMMENT ON COLUMN sskadminuser.m_offline_data.domo_7_piece_campgn_g_tot_num IS 'ドモ7点キャンペーン累積数';
COMMENT ON COLUMN sskadminuser.m_offline_data.domo_7_piece_buy_g_tot_num_1 IS 'ドモ7点購入累計数1';
COMMENT ON COLUMN sskadminuser.m_offline_data.domo_7_piece_buy_g_tot_num_2 IS 'ドモ7点購入累計数2';
COMMENT ON COLUMN sskadminuser.m_offline_data.domo_7_piece_buy_g_tot_num_3 IS 'ドモ7点購入累計数3';
COMMENT ON COLUMN sskadminuser.m_offline_data.domo_7_piece_buy_g_tot_num_4 IS 'ドモ7点購入累計数4';
COMMENT ON COLUMN sskadminuser.m_offline_data.domo_7_piece_buy_g_tot_num_5 IS 'ドモ7点購入累計数5';
COMMENT ON COLUMN sskadminuser.m_offline_data.domo_7_piece_buy_g_tot_num_6 IS 'ドモ7点購入累計数6';
COMMENT ON COLUMN sskadminuser.m_offline_data.domo_7_piece_buy_g_tot_num_7 IS 'ドモ7点購入累計数7';
COMMENT ON COLUMN sskadminuser.m_offline_data.year_end_pre_tgt_person_flg IS 'お歳暮対象者フラグ';
COMMENT ON COLUMN sskadminuser.m_offline_data.campgn_flg_1 IS 'キャンペーンフラグ1';
COMMENT ON COLUMN sskadminuser.m_offline_data.campgn_notice_cd_1 IS 'キャンペーンお知らせコード1';
COMMENT ON COLUMN sskadminuser.m_offline_data.campgn_flg_2 IS 'キャンペーンフラグ2';
COMMENT ON COLUMN sskadminuser.m_offline_data.campgn_notice_cd_2 IS 'キャンペーンお知らせコード2';
COMMENT ON COLUMN sskadminuser.m_offline_data.campgn_flg_3 IS 'キャンペーンフラグ3';
COMMENT ON COLUMN sskadminuser.m_offline_data.campgn_notice_cd_3 IS 'キャンペーンお知らせコード3';
COMMENT ON COLUMN sskadminuser.m_offline_data.campgn_flg_4 IS 'キャンペーンフラグ4';
COMMENT ON COLUMN sskadminuser.m_offline_data.campgn_notice_cd_4 IS 'キャンペーンお知らせコード4';
COMMENT ON COLUMN sskadminuser.m_offline_data.campgn_flg_5 IS 'キャンペーンフラグ5';
COMMENT ON COLUMN sskadminuser.m_offline_data.campgn_notice_cd_5 IS 'キャンペーンお知らせコード5';
COMMENT ON COLUMN sskadminuser.m_offline_data.campgn_g_tot_num_1 IS 'キャンペーン累積数1';
COMMENT ON COLUMN sskadminuser.m_offline_data.campgn_g_tot_num_2 IS 'キャンペーン累積数2';
COMMENT ON COLUMN sskadminuser.m_offline_data.campgn_g_tot_num_3 IS 'キャンペーン累積数3';
COMMENT ON COLUMN sskadminuser.m_offline_data.campgn_g_tot_num_4 IS 'キャンペーン累積数4';
COMMENT ON COLUMN sskadminuser.m_offline_data.more_tabi_stat_kbn IS 'モア旅状態区分';
COMMENT ON COLUMN sskadminuser.m_offline_data.more_tabi_entry_dt IS 'モア旅申込日';
COMMENT ON COLUMN sskadminuser.m_offline_data.more_tabi_kbn IS 'モア旅区分';
COMMENT ON COLUMN sskadminuser.m_offline_data.pay_limit_flg IS '支払制限フラグ';
COMMENT ON COLUMN sskadminuser.m_offline_data.pay_over_flg IS '支払超過フラグ';
COMMENT ON COLUMN sskadminuser.m_offline_data.debit_flg IS 'デビットフラグ';
COMMENT ON COLUMN sskadminuser.m_offline_data.last_login_dt_tm IS '最終ログイン日時';
COMMENT ON COLUMN sskadminuser.m_offline_data.update_date IS '更新日時';
COMMENT ON COLUMN sskadminuser.m_offline_data.register_date IS '登録日時';
COMMENT ON COLUMN sskadminuser.m_offline_data.update_user_cd IS '更新者';
COMMENT ON COLUMN sskadminuser.m_offline_data.register_user_cd IS '登録者';
COMMENT ON COLUMN sskadminuser.m_offline_data.base_4_piece_buy_num_1 IS '基本4点購入数1';
COMMENT ON COLUMN sskadminuser.m_offline_data.base_4_piece_buy_num_2 IS '基本4点購入数2';
COMMENT ON COLUMN sskadminuser.m_offline_data.base_4_piece_buy_num_3 IS '基本4点購入数3';
COMMENT ON COLUMN sskadminuser.m_offline_data.base_4_piece_buy_num_4 IS '基本4点購入数4';
COMMENT ON COLUMN sskadminuser.m_offline_data.base_3_piece_buy_num_1 IS '基本3点購入数1';
COMMENT ON COLUMN sskadminuser.m_offline_data.base_3_piece_buy_num_2 IS '基本3点購入数2';
COMMENT ON COLUMN sskadminuser.m_offline_data.base_3_piece_buy_num_3 IS '基本3点購入数3';
COMMENT ON COLUMN sskadminuser.m_offline_data.base_7_piece_buy_num_1 IS '基本7点購入数1';
COMMENT ON COLUMN sskadminuser.m_offline_data.base_7_piece_buy_num_2 IS '基本7点購入数2';
COMMENT ON COLUMN sskadminuser.m_offline_data.base_7_piece_buy_num_3 IS '基本7点購入数3';
COMMENT ON COLUMN sskadminuser.m_offline_data.base_7_piece_buy_num_4 IS '基本7点購入数4';
COMMENT ON COLUMN sskadminuser.m_offline_data.base_7_piece_buy_num_5 IS '基本7点購入数5';
COMMENT ON COLUMN sskadminuser.m_offline_data.base_7_piece_buy_num_6 IS '基本7点購入数6';
COMMENT ON COLUMN sskadminuser.m_offline_data.base_7_piece_buy_num_7 IS '基本7点購入数7';
COMMENT ON COLUMN sskadminuser.m_offline_data.base_4_piece_2_buy_num_1 IS '基本4点2購入数1';
COMMENT ON COLUMN sskadminuser.m_offline_data.base_4_piece_2_buy_num_2 IS '基本4点2購入数2';
COMMENT ON COLUMN sskadminuser.m_offline_data.base_4_piece_2_buy_num_3 IS '基本4点2購入数3';
COMMENT ON COLUMN sskadminuser.m_offline_data.base_4_piece_2_buy_num_4 IS '基本4点2購入数4';
COMMENT ON COLUMN sskadminuser.m_offline_data.dw_half_kbn IS 'DWハーフ区分';
COMMENT ON COLUMN sskadminuser.m_offline_data.dress_another_send_kbn IS 'ドレス別送区分';
COMMENT ON COLUMN sskadminuser.m_offline_data.dress_direct_kbn IS 'ドレス直販区分';
COMMENT ON COLUMN sskadminuser.m_offline_data.dm_flg IS 'ＤＭフラグ';
COMMENT ON COLUMN sskadminuser.m_offline_data.dm_flg_upd_dt IS 'DMフラグ更新日';
COMMENT ON COLUMN sskadminuser.m_offline_data.modal_shift_flg IS 'モーダルシフトフラグ';
COMMENT ON COLUMN sskadminuser.m_offline_data.country_cd IS '国コード';
COMMENT ON COLUMN sskadminuser.m_offline_data.overseas_to_name IS '海外宛名';
COMMENT ON COLUMN sskadminuser.m_offline_data.overseas_post_no IS '海外郵便番号';
COMMENT ON COLUMN sskadminuser.m_offline_data.overseas_adr_1 IS '海外住所1';
COMMENT ON COLUMN sskadminuser.m_offline_data.overseas_adr_2 IS '海外住所2';
COMMENT ON COLUMN sskadminuser.m_offline_data.overseas_adr_3 IS '海外住所3';
COMMENT ON COLUMN sskadminuser.m_offline_data.overseas_tel_no IS '海外電話番号';
COMMENT ON COLUMN sskadminuser.m_offline_data.drink_domo_direct_kbn IS '飲むドモ直販区分';
COMMENT ON COLUMN sskadminuser.m_offline_data.reply_way_kbn IS '返信方法区分';
COMMENT ON COLUMN sskadminuser.m_offline_data.depo IS '預り金';
COMMENT ON COLUMN sskadminuser.m_offline_data.route_dtl_kbn IS '経路詳細区分';
COMMENT ON COLUMN sskadminuser.m_offline_data.cosme_g_tot_buy_cnt IS '化粧品累計購入回数';
COMMENT ON COLUMN sskadminuser.m_offline_data.credit_corp_kbn IS '決済代行会社区分';
COMMENT ON COLUMN sskadminuser.m_offline_data.mbr_cd IS '会員コード';
COMMENT ON COLUMN sskadminuser.m_offline_data.mbr_pwd IS '会員パスワード';
COMMENT ON COLUMN sskadminuser.m_offline_data.card_input_seq IS 'カード登録連番';
COMMENT ON COLUMN sskadminuser.m_offline_data.card_input_seq_mode IS 'カード登録連番モード';
COMMENT ON COLUMN sskadminuser.m_offline_data.chohaku_regular_buy_stat_kbn IS '長白仙参定期購入状態区分';
COMMENT ON COLUMN sskadminuser.m_offline_data.yojo_5_pack_buy_cnt IS '養生薬湯5包購入回数';
COMMENT ON COLUMN sskadminuser.m_offline_data.amazon_billing_agreement_id IS 'AmazonビリングアグリーメントID';
COMMENT ON COLUMN sskadminuser.m_offline_data.indiv_name_ship_kbn IS '個人名発送区分';
COMMENT ON COLUMN sskadminuser.m_offline_data.indiv_name_ship_sender_name IS '個人名発送差出人名';
-- CREATE INDEX 
CREATE INDEX idx_m_offline_data_01 ON sskadminuser.m_offline_data (cust_no);
CREATE INDEX idx_m_offline_data_02 ON sskadminuser.m_offline_data (tel_no,net_mbr_cd);
CREATE INDEX idx_m_offline_data_03 ON sskadminuser.m_offline_data (net_mbr_cd);
CREATE INDEX idx_m_offline_data_04 ON sskadminuser.m_offline_data (debit_flg,update_date,register_date);
-- END TABLE : sskadminuser.m_offline_data  --

-- START TABLE : sskadminuser.m_offline_smpl_req_dt  --
CREATE TABLE sskadminuser.m_offline_smpl_req_dt(
mbr_seq BIGINT NOT NULL,
item_kbn INT NOT NULL,
smpl_req_dt VARCHAR(8) NOT NULL,
update_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
register_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
update_user_cd VARCHAR(64) NOT NULL,
register_user_cd VARCHAR(64) NOT NULL,
CONSTRAINT pk_m_offline_smpl_req_dt PRIMARY KEY (mbr_seq,item_kbn)
);
-- ADD COLUMN
COMMENT ON TABLE sskadminuser.m_offline_smpl_req_dt IS 'オフライン用サンプル請求日台帳';
COMMENT ON COLUMN sskadminuser.m_offline_smpl_req_dt.mbr_seq IS '会員連番';
COMMENT ON COLUMN sskadminuser.m_offline_smpl_req_dt.item_kbn IS '商品区分';
COMMENT ON COLUMN sskadminuser.m_offline_smpl_req_dt.smpl_req_dt IS 'サンプル請求日';
COMMENT ON COLUMN sskadminuser.m_offline_smpl_req_dt.update_date IS '更新日時';
COMMENT ON COLUMN sskadminuser.m_offline_smpl_req_dt.register_date IS '登録日時';
COMMENT ON COLUMN sskadminuser.m_offline_smpl_req_dt.update_user_cd IS '更新者';
COMMENT ON COLUMN sskadminuser.m_offline_smpl_req_dt.register_user_cd IS '登録者';
-- CREATE INDEX 
-- END TABLE : sskadminuser.m_offline_smpl_req_dt  --

-- START TABLE : sskadminuser.m_offline_last_odr  --
CREATE TABLE sskadminuser.m_offline_last_odr(
mbr_seq BIGINT NOT NULL,
odr_stat_kbn CHAR(1),
odr_acpt_dt TIMESTAMP(0) WITHOUT TIME ZONE,
odr_acpt_tm VARCHAR(8),
proc_no INT,
odr_kbn CHAR(1),
ship_dt TIMESTAMP(0) WITHOUT TIME ZONE,
dlv_corp_cd CHAR(2),
dlv_term_dt_spcfy TIMESTAMP(0) WITHOUT TIME ZONE,
dlv_tm_spcfy_flg VARCHAR(2) DEFAULT '9',
dlv_query_no VARCHAR(15),
dlv_fin_dt TIMESTAMP(0) WITHOUT TIME ZONE,
pay_way_kbn VARCHAR(2),
pay_cnt INT,
credit_card_corp CHAR(2),
credit_card_no VARCHAR(68),
credit_card_name VARCHAR(72),
credit_card_avail_term CHAR(6),
back_mail_req_flg CHAR(1),
dlv_to_kbn CHAR(1),
temp_kana_adr VARCHAR(292),
temp_adr VARCHAR(296),
ship_att_cd_1 CHAR(6),
ship_att_cd_2 CHAR(6),
ship_att_cd_3 CHAR(6),
ship_att_cd_4 CHAR(6),
ship_att_cd_5 CHAR(6),
enclos_cd_1 CHAR(6),
enclos_num_1 INT,
enclos_cd_2 CHAR(6),
enclos_num_2 INT,
enclos_cd_3 CHAR(6),
enclos_num_3 INT,
enclos_cd_4 CHAR(6),
enclos_num_4 INT,
enclos_cd_5 CHAR(6),
enclos_num_5 INT,
enclos_cd_6 CHAR(6),
enclos_num_6 INT,
enclos_cd_7 CHAR(6),
enclos_num_7 INT,
enclos_cd_8 CHAR(6),
enclos_num_8 INT,
enclos_cd_9 CHAR(6),
enclos_num_9 INT,
enclos_cd_10 CHAR(6),
enclos_num_10 INT,
update_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
register_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
update_user_cd VARCHAR(64) NOT NULL,
register_user_cd VARCHAR(64) NOT NULL,
CONSTRAINT pk_m_offline_last_odr PRIMARY KEY (mbr_seq)
);
-- ADD COLUMN
COMMENT ON TABLE sskadminuser.m_offline_last_odr IS 'オフライン用最終注文台帳';
COMMENT ON COLUMN sskadminuser.m_offline_last_odr.mbr_seq IS '会員連番';
COMMENT ON COLUMN sskadminuser.m_offline_last_odr.odr_stat_kbn IS '注文状況区分';
COMMENT ON COLUMN sskadminuser.m_offline_last_odr.odr_acpt_dt IS '注文受付日';
COMMENT ON COLUMN sskadminuser.m_offline_last_odr.odr_acpt_tm IS '注文受付時刻';
COMMENT ON COLUMN sskadminuser.m_offline_last_odr.proc_no IS '処理番号';
COMMENT ON COLUMN sskadminuser.m_offline_last_odr.odr_kbn IS '注文区分';
COMMENT ON COLUMN sskadminuser.m_offline_last_odr.ship_dt IS '発送日';
COMMENT ON COLUMN sskadminuser.m_offline_last_odr.dlv_corp_cd IS '配送会社コード';
COMMENT ON COLUMN sskadminuser.m_offline_last_odr.dlv_term_dt_spcfy IS '配送期日指定';
COMMENT ON COLUMN sskadminuser.m_offline_last_odr.dlv_tm_spcfy_flg IS '配送時間指定フラグ';
COMMENT ON COLUMN sskadminuser.m_offline_last_odr.dlv_query_no IS '配送問合番号';
COMMENT ON COLUMN sskadminuser.m_offline_last_odr.dlv_fin_dt IS '配送完了日';
COMMENT ON COLUMN sskadminuser.m_offline_last_odr.pay_way_kbn IS '支払方法区分';
COMMENT ON COLUMN sskadminuser.m_offline_last_odr.pay_cnt IS '支払回数';
COMMENT ON COLUMN sskadminuser.m_offline_last_odr.credit_card_corp IS 'クレジットカード会社';
COMMENT ON COLUMN sskadminuser.m_offline_last_odr.credit_card_no IS 'クレジットカード番号';
COMMENT ON COLUMN sskadminuser.m_offline_last_odr.credit_card_name IS 'クレジットカード名義人';
COMMENT ON COLUMN sskadminuser.m_offline_last_odr.credit_card_avail_term IS 'クレジットカード有効期限';
COMMENT ON COLUMN sskadminuser.m_offline_last_odr.back_mail_req_flg IS '折返メール希望者フラグ';
COMMENT ON COLUMN sskadminuser.m_offline_last_odr.dlv_to_kbn IS '配送先区分';
COMMENT ON COLUMN sskadminuser.m_offline_last_odr.temp_kana_adr IS '一時カナ住所';
COMMENT ON COLUMN sskadminuser.m_offline_last_odr.temp_adr IS '一時住所';
COMMENT ON COLUMN sskadminuser.m_offline_last_odr.ship_att_cd_1 IS '発送注意コード1';
COMMENT ON COLUMN sskadminuser.m_offline_last_odr.ship_att_cd_2 IS '発送注意コード2';
COMMENT ON COLUMN sskadminuser.m_offline_last_odr.ship_att_cd_3 IS '発送注意コード3';
COMMENT ON COLUMN sskadminuser.m_offline_last_odr.ship_att_cd_4 IS '発送注意コード4';
COMMENT ON COLUMN sskadminuser.m_offline_last_odr.ship_att_cd_5 IS '発送注意コード5';
COMMENT ON COLUMN sskadminuser.m_offline_last_odr.enclos_cd_1 IS '同封物コード1';
COMMENT ON COLUMN sskadminuser.m_offline_last_odr.enclos_num_1 IS '同封物数1';
COMMENT ON COLUMN sskadminuser.m_offline_last_odr.enclos_cd_2 IS '同封物コード2';
COMMENT ON COLUMN sskadminuser.m_offline_last_odr.enclos_num_2 IS '同封物数2';
COMMENT ON COLUMN sskadminuser.m_offline_last_odr.enclos_cd_3 IS '同封物コード3';
COMMENT ON COLUMN sskadminuser.m_offline_last_odr.enclos_num_3 IS '同封物数3';
COMMENT ON COLUMN sskadminuser.m_offline_last_odr.enclos_cd_4 IS '同封物コード4';
COMMENT ON COLUMN sskadminuser.m_offline_last_odr.enclos_num_4 IS '同封物数4';
COMMENT ON COLUMN sskadminuser.m_offline_last_odr.enclos_cd_5 IS '同封物コード5';
COMMENT ON COLUMN sskadminuser.m_offline_last_odr.enclos_num_5 IS '同封物数5';
COMMENT ON COLUMN sskadminuser.m_offline_last_odr.enclos_cd_6 IS '同封物コード6';
COMMENT ON COLUMN sskadminuser.m_offline_last_odr.enclos_num_6 IS '同封物数6';
COMMENT ON COLUMN sskadminuser.m_offline_last_odr.enclos_cd_7 IS '同封物コード7';
COMMENT ON COLUMN sskadminuser.m_offline_last_odr.enclos_num_7 IS '同封物数7';
COMMENT ON COLUMN sskadminuser.m_offline_last_odr.enclos_cd_8 IS '同封物コード8';
COMMENT ON COLUMN sskadminuser.m_offline_last_odr.enclos_num_8 IS '同封物数8';
COMMENT ON COLUMN sskadminuser.m_offline_last_odr.enclos_cd_9 IS '同封物コード9';
COMMENT ON COLUMN sskadminuser.m_offline_last_odr.enclos_num_9 IS '同封物数9';
COMMENT ON COLUMN sskadminuser.m_offline_last_odr.enclos_cd_10 IS '同封物コード10';
COMMENT ON COLUMN sskadminuser.m_offline_last_odr.enclos_num_10 IS '同封物数10';
COMMENT ON COLUMN sskadminuser.m_offline_last_odr.update_date IS '更新日時';
COMMENT ON COLUMN sskadminuser.m_offline_last_odr.register_date IS '登録日時';
COMMENT ON COLUMN sskadminuser.m_offline_last_odr.update_user_cd IS '更新者';
COMMENT ON COLUMN sskadminuser.m_offline_last_odr.register_user_cd IS '登録者';
-- CREATE INDEX 
-- END TABLE : sskadminuser.m_offline_last_odr  --

-- START TABLE : sskadminuser.m_offline_dlv  --
CREATE TABLE sskadminuser.m_offline_dlv(
mbr_seq BIGINT NOT NULL,
adr_kbn CHAR(1) NOT NULL,
ship_dt TIMESTAMP(0) WITHOUT TIME ZONE,
earliest_deliver_days INT DEFAULT 0,
term_dt_spcfy_fin_dt TIMESTAMP(0) WITHOUT TIME ZONE,
term_dt_spcfy_ng_flg CHAR(1),
tm_spcfy_flg CHAR(1),
nt_am_spcfy_ng_flg CHAR(1) DEFAULT '0',
sg_earliest_deliver_days INT,
sg_term_dt_spcfy_ng_flg CHAR(1),
sg_tm_spcfy_flg CHAR(1),
sg_cod_ng_flg CHAR(1) DEFAULT '0',
sg_dlv_ng_flg CHAR(1) DEFAULT '0',
nt_ym_cod_ng_flg CHAR(1) DEFAULT '0',
land_earliest_deliver_days INT DEFAULT '0',
land_tm_spcfy_flg CHAR(1),
land_term_dt_spcfy_ng_flg CHAR(1),
update_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
register_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
update_user_cd VARCHAR(64) NOT NULL,
register_user_cd VARCHAR(64) NOT NULL,
CONSTRAINT pk_m_offline_dlv PRIMARY KEY (mbr_seq,adr_kbn)
);
-- ADD COLUMN
COMMENT ON TABLE sskadminuser.m_offline_dlv IS 'オフライン用配送台帳';
COMMENT ON COLUMN sskadminuser.m_offline_dlv.mbr_seq IS '会員連番';
COMMENT ON COLUMN sskadminuser.m_offline_dlv.adr_kbn IS '住所区分';
COMMENT ON COLUMN sskadminuser.m_offline_dlv.ship_dt IS '発送日';
COMMENT ON COLUMN sskadminuser.m_offline_dlv.earliest_deliver_days IS '最短お届け日数';
COMMENT ON COLUMN sskadminuser.m_offline_dlv.term_dt_spcfy_fin_dt IS '期日指定終了日';
COMMENT ON COLUMN sskadminuser.m_offline_dlv.term_dt_spcfy_ng_flg IS '期日指定不可フラグ';
COMMENT ON COLUMN sskadminuser.m_offline_dlv.tm_spcfy_flg IS '時間指定フラグ';
COMMENT ON COLUMN sskadminuser.m_offline_dlv.nt_am_spcfy_ng_flg IS '日通午前指定不可フラグ';
COMMENT ON COLUMN sskadminuser.m_offline_dlv.sg_earliest_deliver_days IS '佐川の最短お届け日数';
COMMENT ON COLUMN sskadminuser.m_offline_dlv.sg_term_dt_spcfy_ng_flg IS '佐川の期日指定不可フラグ';
COMMENT ON COLUMN sskadminuser.m_offline_dlv.sg_tm_spcfy_flg IS '佐川の時間指定フラグ';
COMMENT ON COLUMN sskadminuser.m_offline_dlv.sg_cod_ng_flg IS '佐川代引不可フラグ';
COMMENT ON COLUMN sskadminuser.m_offline_dlv.sg_dlv_ng_flg IS '佐川配送不可フラグ';
COMMENT ON COLUMN sskadminuser.m_offline_dlv.nt_ym_cod_ng_flg IS '日通ヤマト代引不可フラグ';
COMMENT ON COLUMN sskadminuser.m_offline_dlv.land_earliest_deliver_days IS '陸便最短お届け日数';
COMMENT ON COLUMN sskadminuser.m_offline_dlv.land_tm_spcfy_flg IS '陸便時間指定フラグ';
COMMENT ON COLUMN sskadminuser.m_offline_dlv.land_term_dt_spcfy_ng_flg IS '陸便期日指定不可フラグ';
COMMENT ON COLUMN sskadminuser.m_offline_dlv.update_date IS '更新日時';
COMMENT ON COLUMN sskadminuser.m_offline_dlv.register_date IS '登録日時';
COMMENT ON COLUMN sskadminuser.m_offline_dlv.update_user_cd IS '更新者';
COMMENT ON COLUMN sskadminuser.m_offline_dlv.register_user_cd IS '登録者';
-- CREATE INDEX 
-- END TABLE : sskadminuser.m_offline_dlv  --

-- START TABLE : sskadminuser.m_offline_worry  --
CREATE TABLE sskadminuser.m_offline_worry(
mbr_seq BIGINT NOT NULL,
worry_topic_kbn CHAR(2) NOT NULL,
worry_ans VARCHAR(2),
update_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
register_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
update_user_cd VARCHAR(64) NOT NULL,
register_user_cd VARCHAR(64) NOT NULL,
CONSTRAINT pk_m_offline_worry PRIMARY KEY (mbr_seq,worry_topic_kbn)
);
-- ADD COLUMN
COMMENT ON TABLE sskadminuser.m_offline_worry IS 'オフライン用お悩み台帳';
COMMENT ON COLUMN sskadminuser.m_offline_worry.mbr_seq IS '会員連番';
COMMENT ON COLUMN sskadminuser.m_offline_worry.worry_topic_kbn IS 'お悩み項目区分';
COMMENT ON COLUMN sskadminuser.m_offline_worry.worry_ans IS 'お悩み回答';
COMMENT ON COLUMN sskadminuser.m_offline_worry.update_date IS '更新日時';
COMMENT ON COLUMN sskadminuser.m_offline_worry.register_date IS '登録日時';
COMMENT ON COLUMN sskadminuser.m_offline_worry.update_user_cd IS '更新者';
COMMENT ON COLUMN sskadminuser.m_offline_worry.register_user_cd IS '登録者';
-- CREATE INDEX 
-- END TABLE : sskadminuser.m_offline_worry  --

-- START TABLE : sskadminuser.m_offline_campgn  --
CREATE TABLE sskadminuser.m_offline_campgn(
mbr_seq BIGINT NOT NULL,
campgn_grp_cd VARCHAR(5) NOT NULL,
campgn_cd VARCHAR(5) NOT NULL,
disp_start_dt VARCHAR(8),
disp_end_dt VARCHAR(8),
update_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
register_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
update_user_cd VARCHAR(64) NOT NULL,
register_user_cd VARCHAR(64) NOT NULL,
CONSTRAINT pk_m_offline_campgn PRIMARY KEY (mbr_seq,campgn_grp_cd,campgn_cd)
);
-- ADD COLUMN
COMMENT ON TABLE sskadminuser.m_offline_campgn IS 'オフライン用キャンペーン台帳';
COMMENT ON COLUMN sskadminuser.m_offline_campgn.mbr_seq IS '会員連番';
COMMENT ON COLUMN sskadminuser.m_offline_campgn.campgn_grp_cd IS 'キャンペーングループコード';
COMMENT ON COLUMN sskadminuser.m_offline_campgn.campgn_cd IS 'キャンペーンコード';
COMMENT ON COLUMN sskadminuser.m_offline_campgn.disp_start_dt IS '表示開始日';
COMMENT ON COLUMN sskadminuser.m_offline_campgn.disp_end_dt IS '表示終了日';
COMMENT ON COLUMN sskadminuser.m_offline_campgn.update_date IS '更新日時';
COMMENT ON COLUMN sskadminuser.m_offline_campgn.register_date IS '登録日時';
COMMENT ON COLUMN sskadminuser.m_offline_campgn.update_user_cd IS '更新者';
COMMENT ON COLUMN sskadminuser.m_offline_campgn.register_user_cd IS '登録者';
-- CREATE INDEX 
-- END TABLE : sskadminuser.m_offline_campgn  --

-- START TABLE : sskadminuser.m_offline_buy  --
CREATE TABLE sskadminuser.m_offline_buy(
mbr_seq BIGINT NOT NULL,
buy_item_cd VARCHAR(5) NOT NULL,
buy_cnt INT DEFAULT 0,
update_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
register_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
update_user_cd VARCHAR(64) NOT NULL,
register_user_cd VARCHAR(64) NOT NULL,
CONSTRAINT pk_m_offline_buy PRIMARY KEY (mbr_seq,buy_item_cd)
);
-- ADD COLUMN
COMMENT ON TABLE sskadminuser.m_offline_buy IS 'オフライン用購入台帳';
COMMENT ON COLUMN sskadminuser.m_offline_buy.mbr_seq IS '会員連番';
COMMENT ON COLUMN sskadminuser.m_offline_buy.buy_item_cd IS '購入商品コード';
COMMENT ON COLUMN sskadminuser.m_offline_buy.buy_cnt IS '購入回数';
COMMENT ON COLUMN sskadminuser.m_offline_buy.update_date IS '更新日時';
COMMENT ON COLUMN sskadminuser.m_offline_buy.register_date IS '登録日時';
COMMENT ON COLUMN sskadminuser.m_offline_buy.update_user_cd IS '更新者';
COMMENT ON COLUMN sskadminuser.m_offline_buy.register_user_cd IS '登録者';
-- CREATE INDEX 
-- END TABLE : sskadminuser.m_offline_buy  --

-- START TABLE : sskadminuser.m_offline_ship_dt  --
CREATE TABLE sskadminuser.m_offline_ship_dt(
mbr_seq BIGINT NOT NULL,
ship_dt_kbn CHAR(2) NOT NULL,
cosme_first_ship_dt VARCHAR(8),
update_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
register_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
update_user_cd VARCHAR(64) NOT NULL,
register_user_cd VARCHAR(64) NOT NULL,
CONSTRAINT pk_m_offline_ship_dt PRIMARY KEY (mbr_seq,ship_dt_kbn)
);
-- ADD COLUMN
COMMENT ON TABLE sskadminuser.m_offline_ship_dt IS 'オフライン用発送日台帳';
COMMENT ON COLUMN sskadminuser.m_offline_ship_dt.mbr_seq IS '会員連番';
COMMENT ON COLUMN sskadminuser.m_offline_ship_dt.ship_dt_kbn IS '発送日区分';
COMMENT ON COLUMN sskadminuser.m_offline_ship_dt.cosme_first_ship_dt IS '化粧品初回発送日';
COMMENT ON COLUMN sskadminuser.m_offline_ship_dt.update_date IS '更新日時';
COMMENT ON COLUMN sskadminuser.m_offline_ship_dt.register_date IS '登録日時';
COMMENT ON COLUMN sskadminuser.m_offline_ship_dt.update_user_cd IS '更新者';
COMMENT ON COLUMN sskadminuser.m_offline_ship_dt.register_user_cd IS '登録者';
-- CREATE INDEX 
-- END TABLE : sskadminuser.m_offline_ship_dt  --

-- START TABLE : sskadminuser.m_offline_item_use  --
CREATE TABLE sskadminuser.m_offline_item_use(
mbr_seq BIGINT NOT NULL,
item_cd VARCHAR(4) NOT NULL,
last_use_dt VARCHAR(8),
g_tot_use_num INT,
update_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
register_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
update_user_cd VARCHAR(64) NOT NULL,
register_user_cd VARCHAR(64) NOT NULL,
CONSTRAINT pk_m_offline_item_use PRIMARY KEY (mbr_seq,item_cd)
);
-- ADD COLUMN
COMMENT ON TABLE sskadminuser.m_offline_item_use IS 'オフライン用商品使用台帳';
COMMENT ON COLUMN sskadminuser.m_offline_item_use.mbr_seq IS '会員連番';
COMMENT ON COLUMN sskadminuser.m_offline_item_use.item_cd IS '商品コード';
COMMENT ON COLUMN sskadminuser.m_offline_item_use.last_use_dt IS '最終使用日';
COMMENT ON COLUMN sskadminuser.m_offline_item_use.g_tot_use_num IS '累計使用数';
COMMENT ON COLUMN sskadminuser.m_offline_item_use.update_date IS '更新日時';
COMMENT ON COLUMN sskadminuser.m_offline_item_use.register_date IS '登録日時';
COMMENT ON COLUMN sskadminuser.m_offline_item_use.update_user_cd IS '更新者';
COMMENT ON COLUMN sskadminuser.m_offline_item_use.register_user_cd IS '登録者';
-- CREATE INDEX 
-- END TABLE : sskadminuser.m_offline_item_use  --

-- START TABLE : sskadminuser.m_non_disp_point_exchg_item  --
CREATE TABLE sskadminuser.m_non_disp_point_exchg_item(
item_cd VARCHAR(4) NOT NULL,
non_disp_start_dt TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL,
non_disp_end_dt TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL,
update_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL,
register_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL,
update_user_cd VARCHAR(64) NOT NULL,
register_user_cd VARCHAR(64) NOT NULL,
CONSTRAINT pk_m_non_disp_point_exchg_item PRIMARY KEY (item_cd)
);
-- ADD COLUMN
COMMENT ON TABLE sskadminuser.m_non_disp_point_exchg_item IS '非表示ポイント交換品台帳';
COMMENT ON COLUMN sskadminuser.m_non_disp_point_exchg_item.item_cd IS '商品コード';
COMMENT ON COLUMN sskadminuser.m_non_disp_point_exchg_item.non_disp_start_dt IS '非表示開始日時';
COMMENT ON COLUMN sskadminuser.m_non_disp_point_exchg_item.non_disp_end_dt IS '非表示終了日時';
COMMENT ON COLUMN sskadminuser.m_non_disp_point_exchg_item.update_date IS '更新日時';
COMMENT ON COLUMN sskadminuser.m_non_disp_point_exchg_item.register_date IS '登録日時';
COMMENT ON COLUMN sskadminuser.m_non_disp_point_exchg_item.update_user_cd IS '更新者';
COMMENT ON COLUMN sskadminuser.m_non_disp_point_exchg_item.register_user_cd IS '登録者';
-- CREATE INDEX 
-- END TABLE : sskadminuser.m_non_disp_point_exchg_item  --

-- START TABLE : sskadminuser.m_point_exchg_item_campgn_info  --
CREATE TABLE sskadminuser.m_point_exchg_item_campgn_info(
point_exchg_item_campgn_cd BIGINT NOT NULL,
point_exchg_item_campaign_kbn INT NOT NULL,
point_exchg_item_campaign_name VARCHAR(100) NOT NULL,
avail_start_dt TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL,
avail_end_dt TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL,
prev_term_item_cd VARCHAR(4),
in_term_item_cd VARCHAR(4),
aft_term_item_cd VARCHAR(4),
term_limit_item_cd VARCHAR(4),
smpl_item_cd VARCHAR(4),
update_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL,
register_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL,
update_user_cd VARCHAR(64) NOT NULL,
register_user_cd VARCHAR(64) NOT NULL,
CONSTRAINT pk_m_point_exchg_item_campgn_info PRIMARY KEY (point_exchg_item_campgn_cd,point_exchg_item_campaign_kbn)
);
-- ADD COLUMN
COMMENT ON TABLE sskadminuser.m_point_exchg_item_campgn_info IS 'ポイント交換品キャンペーン情報台帳';
COMMENT ON COLUMN sskadminuser.m_point_exchg_item_campgn_info.point_exchg_item_campgn_cd IS 'ポイント交換品キャンペーンコード';
COMMENT ON COLUMN sskadminuser.m_point_exchg_item_campgn_info.point_exchg_item_campaign_kbn IS 'ポイント交換品キャンペーン区分';
COMMENT ON COLUMN sskadminuser.m_point_exchg_item_campgn_info.point_exchg_item_campaign_name IS 'ポイント交換品キャンペーン名称';
COMMENT ON COLUMN sskadminuser.m_point_exchg_item_campgn_info.avail_start_dt IS '有効開始日時';
COMMENT ON COLUMN sskadminuser.m_point_exchg_item_campgn_info.avail_end_dt IS '有効終了日時';
COMMENT ON COLUMN sskadminuser.m_point_exchg_item_campgn_info.prev_term_item_cd IS '期間前商品コード';
COMMENT ON COLUMN sskadminuser.m_point_exchg_item_campgn_info.in_term_item_cd IS '期間中商品コード';
COMMENT ON COLUMN sskadminuser.m_point_exchg_item_campgn_info.aft_term_item_cd IS '期間後商品コード';
COMMENT ON COLUMN sskadminuser.m_point_exchg_item_campgn_info.term_limit_item_cd IS '期間限定商品コード';
COMMENT ON COLUMN sskadminuser.m_point_exchg_item_campgn_info.smpl_item_cd IS 'サンプル商品コード';
COMMENT ON COLUMN sskadminuser.m_point_exchg_item_campgn_info.update_date IS '更新日時';
COMMENT ON COLUMN sskadminuser.m_point_exchg_item_campgn_info.register_date IS '登録日時';
COMMENT ON COLUMN sskadminuser.m_point_exchg_item_campgn_info.update_user_cd IS '更新者';
COMMENT ON COLUMN sskadminuser.m_point_exchg_item_campgn_info.register_user_cd IS '登録者';
-- CREATE INDEX 
-- END TABLE : sskadminuser.m_point_exchg_item_campgn_info  --

-- START TABLE : sskadminuser.m_point_exchg_item_lst_disp_ctrl  --
CREATE TABLE sskadminuser.m_point_exchg_item_lst_disp_ctrl(
item_cd VARCHAR(4) NOT NULL,
item_name_1 VARCHAR(13),
item_name_2 VARCHAR(13),
food_prod_kbn CHAR(1),
caption_1 VARCHAR(13),
caption_2 VARCHAR(13),
end_plan_title VARCHAR(13),
drug_law_kbn CHAR(1),
update_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL,
register_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL,
update_user_cd VARCHAR(64) NOT NULL,
register_user_cd VARCHAR(64) NOT NULL,
CONSTRAINT pk_m_point_exchg_item_lst_disp_ctrl PRIMARY KEY (item_cd)
);
-- ADD COLUMN
COMMENT ON TABLE sskadminuser.m_point_exchg_item_lst_disp_ctrl IS 'ポイント交換品一覧表示管理台帳';
COMMENT ON COLUMN sskadminuser.m_point_exchg_item_lst_disp_ctrl.item_cd IS '商品コード';
COMMENT ON COLUMN sskadminuser.m_point_exchg_item_lst_disp_ctrl.item_name_1 IS '商品名1';
COMMENT ON COLUMN sskadminuser.m_point_exchg_item_lst_disp_ctrl.item_name_2 IS '商品名2';
COMMENT ON COLUMN sskadminuser.m_point_exchg_item_lst_disp_ctrl.food_prod_kbn IS '食品区分';
COMMENT ON COLUMN sskadminuser.m_point_exchg_item_lst_disp_ctrl.caption_1 IS 'キャプション1';
COMMENT ON COLUMN sskadminuser.m_point_exchg_item_lst_disp_ctrl.caption_2 IS 'キャプション2';
COMMENT ON COLUMN sskadminuser.m_point_exchg_item_lst_disp_ctrl.end_plan_title IS '終了予定タイトル';
COMMENT ON COLUMN sskadminuser.m_point_exchg_item_lst_disp_ctrl.drug_law_kbn IS '薬事法区分';
COMMENT ON COLUMN sskadminuser.m_point_exchg_item_lst_disp_ctrl.update_date IS '更新日時';
COMMENT ON COLUMN sskadminuser.m_point_exchg_item_lst_disp_ctrl.register_date IS '登録日時';
COMMENT ON COLUMN sskadminuser.m_point_exchg_item_lst_disp_ctrl.update_user_cd IS '更新者';
COMMENT ON COLUMN sskadminuser.m_point_exchg_item_lst_disp_ctrl.register_user_cd IS '登録者';
-- CREATE INDEX 
-- END TABLE : sskadminuser.m_point_exchg_item_lst_disp_ctrl  --

-- START TABLE : sskadminuser.m_point_exchg_item_map_ctrl  --
CREATE TABLE sskadminuser.m_point_exchg_item_map_ctrl(
item_cd VARCHAR(4) NOT NULL,
guide_no VARCHAR(4) NOT NULL,
update_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL,
register_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL,
update_user_cd VARCHAR(64) NOT NULL,
register_user_cd VARCHAR(64) NOT NULL,
CONSTRAINT pk_m_point_exchg_item_map_ctrl PRIMARY KEY (item_cd)
);
-- ADD COLUMN
COMMENT ON TABLE sskadminuser.m_point_exchg_item_map_ctrl IS 'ポイント交換品マッピング管理台帳';
COMMENT ON COLUMN sskadminuser.m_point_exchg_item_map_ctrl.item_cd IS '商品コード';
COMMENT ON COLUMN sskadminuser.m_point_exchg_item_map_ctrl.guide_no IS 'ガイド用番号';
COMMENT ON COLUMN sskadminuser.m_point_exchg_item_map_ctrl.update_date IS '更新日時';
COMMENT ON COLUMN sskadminuser.m_point_exchg_item_map_ctrl.register_date IS '登録日時';
COMMENT ON COLUMN sskadminuser.m_point_exchg_item_map_ctrl.update_user_cd IS '更新者';
COMMENT ON COLUMN sskadminuser.m_point_exchg_item_map_ctrl.register_user_cd IS '登録者';
-- CREATE INDEX 
-- END TABLE : sskadminuser.m_point_exchg_item_map_ctrl  --

-- START TABLE : sskadminuser.m_badge_comment  --
CREATE TABLE sskadminuser.m_badge_comment(
item_cd VARCHAR(4) NOT NULL,
badge_kbn CHAR(1) NOT NULL,
badge_comment VARCHAR(4) NOT NULL,
avail_start_dt TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL,
avail_end_dt TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL,
update_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL,
register_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL,
update_user_cd VARCHAR(64) NOT NULL,
register_user_cd VARCHAR(64) NOT NULL,
CONSTRAINT pk_m_badge_comment PRIMARY KEY (item_cd,badge_kbn)
);
-- ADD COLUMN
COMMENT ON TABLE sskadminuser.m_badge_comment IS 'バッジコメント台帳';
COMMENT ON COLUMN sskadminuser.m_badge_comment.item_cd IS '商品コード';
COMMENT ON COLUMN sskadminuser.m_badge_comment.badge_kbn IS 'バッジ区分';
COMMENT ON COLUMN sskadminuser.m_badge_comment.badge_comment IS 'バッジコメント';
COMMENT ON COLUMN sskadminuser.m_badge_comment.avail_start_dt IS '有効開始日時';
COMMENT ON COLUMN sskadminuser.m_badge_comment.avail_end_dt IS '有効終了日時';
COMMENT ON COLUMN sskadminuser.m_badge_comment.update_date IS '更新日時';
COMMENT ON COLUMN sskadminuser.m_badge_comment.register_date IS '登録日時';
COMMENT ON COLUMN sskadminuser.m_badge_comment.update_user_cd IS '更新者';
COMMENT ON COLUMN sskadminuser.m_badge_comment.register_user_cd IS '登録者';
-- CREATE INDEX 
-- END TABLE : sskadminuser.m_badge_comment  --

-- START TABLE : sskadminuser.m_point_exchg_item_base_info  --
CREATE TABLE sskadminuser.m_point_exchg_item_base_info(
guide_no VARCHAR(4) NOT NULL,
point INT NOT NULL,
item_cd VARCHAR(4) NOT NULL,
update_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL,
register_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL,
update_user_cd VARCHAR(64) NOT NULL,
register_user_cd VARCHAR(64) NOT NULL,
CONSTRAINT pk_m_point_exchg_item_base_info PRIMARY KEY (guide_no)
);
-- ADD COLUMN
COMMENT ON TABLE sskadminuser.m_point_exchg_item_base_info IS 'ポイント交換品基本情報台帳';
COMMENT ON COLUMN sskadminuser.m_point_exchg_item_base_info.guide_no IS 'ガイド用番号';
COMMENT ON COLUMN sskadminuser.m_point_exchg_item_base_info.point IS 'ポイント';
COMMENT ON COLUMN sskadminuser.m_point_exchg_item_base_info.item_cd IS '商品コード';
COMMENT ON COLUMN sskadminuser.m_point_exchg_item_base_info.update_date IS '更新日時';
COMMENT ON COLUMN sskadminuser.m_point_exchg_item_base_info.register_date IS '登録日時';
COMMENT ON COLUMN sskadminuser.m_point_exchg_item_base_info.update_user_cd IS '更新者';
COMMENT ON COLUMN sskadminuser.m_point_exchg_item_base_info.register_user_cd IS '登録者';
-- CREATE INDEX 
-- END TABLE : sskadminuser.m_point_exchg_item_base_info  --

-- START TABLE : sskadminuser.m_old_mail_adr_dupl_chk  --
CREATE TABLE sskadminuser.m_old_mail_adr_dupl_chk(
direct_odr_seq BIGINT NOT NULL,
cust_no INT NOT NULL,
mail_adr VARCHAR(180),
tel_no VARCHAR(64),
update_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
register_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL DEFAULT current_timestamp(0),
update_user_cd VARCHAR(64) NOT NULL,
register_user_cd VARCHAR(64) NOT NULL,
CONSTRAINT pk_m_old_mail_adr_dupl_chk PRIMARY KEY (direct_odr_seq)
);
-- ADD COLUMN
COMMENT ON TABLE sskadminuser.m_old_mail_adr_dupl_chk IS '旧メールアドレス重複チェック台帳';
COMMENT ON COLUMN sskadminuser.m_old_mail_adr_dupl_chk.direct_odr_seq IS '直販注文連番';
COMMENT ON COLUMN sskadminuser.m_old_mail_adr_dupl_chk.cust_no IS '会員番号';
COMMENT ON COLUMN sskadminuser.m_old_mail_adr_dupl_chk.mail_adr IS 'メールアドレス';
COMMENT ON COLUMN sskadminuser.m_old_mail_adr_dupl_chk.tel_no IS '電話番号';
COMMENT ON COLUMN sskadminuser.m_old_mail_adr_dupl_chk.update_date IS '更新日時';
COMMENT ON COLUMN sskadminuser.m_old_mail_adr_dupl_chk.register_date IS '登録日時';
COMMENT ON COLUMN sskadminuser.m_old_mail_adr_dupl_chk.update_user_cd IS '更新者';
COMMENT ON COLUMN sskadminuser.m_old_mail_adr_dupl_chk.register_user_cd IS '登録者';
-- CREATE INDEX 
-- END TABLE : sskadminuser.m_old_mail_adr_dupl_chk  --

-- START TABLE : sskadminuser.old_chohakudirectorder_tbl  --
CREATE TABLE sskadminuser.old_chohakudirectorder_tbl(
direct_order_id VARCHAR(32) NOT NULL,
site_kbn CHAR(1) NOT NULL,
direct_dt TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL,
tel_no VARCHAR(64),
email VARCHAR(180),
dmmail_flg CHAR(1),
host_dt TIMESTAMP(0) WITHOUT TIME ZONE,
host_time VARCHAR(8),
name_kana VARCHAR(92),
name_kanji VARCHAR(104),
gender CHAR(1),
post_no VARCHAR(8),
addr_kana VARCHAR(292),
addr_kanji VARCHAR(216),
addr_not_conv VARCHAR(124),
addr_not_conv_kana VARCHAR(124),
prefecture_cd CHAR(2),
job_cd CHAR(2),
year_type CHAR(1),
birthday VARCHAR(56),
baitai_cd VARCHAR(8),
baitai_name VARCHAR(50),
q_baitai_cd VARCHAR(8),
q_baitai_name VARCHAR(50),
key_cd VARCHAR(6),
m_email VARCHAR(180),
shohin_cd01 VARCHAR(5),
shohin_level01 VARCHAR(2),
order_count01 INT,
price01 INT,
price_taxrate01 INT,
taxrate_id01 INT,
shohin_cd02 VARCHAR(5),
shohin_level02 VARCHAR(2),
order_count02 INT,
price02 INT,
price_taxrate02 INT,
taxrate_id02 INT,
shohin_cd03 VARCHAR(5),
shohin_level03 VARCHAR(2),
order_count03 INT,
price03 INT,
price_taxrate03 INT,
taxrate_id03 INT,
shohin_cd04 VARCHAR(5),
shohin_level04 VARCHAR(2),
order_count04 INT,
price04 INT,
price_taxrate04 INT,
taxrate_id04 INT,
shohin_cd05 VARCHAR(5),
shohin_level05 VARCHAR(2),
order_count05 INT,
price05 INT,
price_taxrate05 INT,
taxrate_id05 INT,
shohin_cd06 VARCHAR(5),
shohin_level06 VARCHAR(2),
order_count06 INT,
price06 INT,
price_taxrate06 INT,
taxrate_id06 INT,
shohin_cd07 VARCHAR(5),
shohin_level07 VARCHAR(2),
order_count07 INT,
price07 INT,
price_taxrate07 INT,
taxrate_id07 INT,
shohin_cd08 VARCHAR(5),
shohin_level08 VARCHAR(2),
order_count08 INT,
price08 INT,
price_taxrate08 INT,
taxrate_id08 INT,
shohin_cd09 VARCHAR(5),
shohin_level09 VARCHAR(2),
order_count09 INT,
price09 INT,
price_taxrate09 INT,
taxrate_id09 INT,
shohin_cd10 VARCHAR(5),
shohin_level10 VARCHAR(2),
order_count10 INT,
price10 INT,
price_taxrate10 INT,
taxrate_id10 INT,
shohin_cd11 VARCHAR(5),
shohin_level11 VARCHAR(2),
order_count11 INT,
price11 INT,
price_taxrate11 INT,
taxrate_id11 INT,
shohin_cd12 VARCHAR(5),
shohin_level12 VARCHAR(2),
order_count12 INT,
price12 INT,
price_taxrate12 INT,
taxrate_id12 INT,
shohin_cd13 VARCHAR(5),
shohin_level13 VARCHAR(2),
order_count13 INT,
price13 INT,
price_taxrate13 INT,
taxrate_id13 INT,
shohin_cd14 VARCHAR(5),
shohin_level14 VARCHAR(2),
order_count14 INT,
price14 INT,
price_taxrate14 INT,
taxrate_id14 INT,
shohin_cd15 VARCHAR(5),
shohin_level15 VARCHAR(2),
order_count15 INT,
price15 INT,
price_taxrate15 INT,
taxrate_id15 INT,
shohin_cd16 VARCHAR(5),
shohin_level16 VARCHAR(2),
order_count16 INT,
price16 INT,
price_taxrate16 INT,
taxrate_id16 INT,
shohin_cd17 VARCHAR(5),
shohin_level17 VARCHAR(2),
order_count17 INT,
price17 INT,
price_taxrate17 INT,
taxrate_id17 INT,
shohin_cd18 VARCHAR(5),
shohin_level18 VARCHAR(2),
order_count18 INT,
price18 INT,
price_taxrate18 INT,
taxrate_id18 INT,
shohin_cd19 VARCHAR(5),
shohin_level19 VARCHAR(2),
order_count19 INT,
price19 INT,
price_taxrate19 INT,
taxrate_id19 INT,
shohin_cd20 VARCHAR(5),
shohin_level20 VARCHAR(2),
order_count20 INT,
price20 INT,
price_taxrate20 INT,
taxrate_id20 INT,
total_order_amount INT,
total_order_taxrate INT,
payment_type CHAR(2),
payment_num CHAR(2),
cc_type CHAR(2),
cc_no CHAR(68),
cc_term CHAR(6),
cc_name VARCHAR(84),
cc_scd VARCHAR(52),
recognition_no CHAR(6),
delivery_dt TIMESTAMP(0) WITHOUT TIME ZONE,
delivery_time_type CHAR(2),
ship_caution_cd CHAR(6),
another_addr_type CHAR(1),
another_addr VARCHAR(180),
another_addr_not_conv VARCHAR(124),
another_telno VARCHAR(64),
another_post_no VARCHAR(8),
agree_flg CHAR(1),
mail_send_flg CHAR(1),
kainno CHAR(8) NOT NULL,
order_status CHAR(1) NOT NULL,
delete_flg CHAR(1) NOT NULL,
print_flg CHAR(1) NOT NULL,
host_result CHAR(1),
host_flg CHAR(3) NOT NULL,
sync_flg CHAR(1) NOT NULL,
status INT NOT NULL,
mail_flg CHAR(1) NOT NULL,
communicator VARCHAR(10),
mail_send_dt TIMESTAMP(0) WITHOUT TIME ZONE,
ctrl_no INT,
mailteikei_flg CHAR(1),
overlap_flg CHAR(1) NOT NULL,
session_id VARCHAR(50),
update_dt TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL,
regist_dt TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL,
update_user VARCHAR(64) NOT NULL,
regist_user VARCHAR(64) NOT NULL,
reduction_kbn VARCHAR(2),
gift_flg CHAR(1),
q_etc_comment VARCHAR(800),
odrroutedtlkbn CHAR(2),
regularorder_flg CHAR(1),
regularorder_shohin_cd01 VARCHAR(5),
regularorder_shohin_level01 VARCHAR(2),
regularorder_order_count01 INT,
regularorder_price01 INT,
regularorder_price_taxrate01 INT,
regularorder_taxrate_id01 INT,
regularorder_shohin_cd02 VARCHAR(5),
regularorder_shohin_level02 VARCHAR(2),
regularorder_order_count02 INT,
regularorder_price02 INT,
regularorder_price_taxrate02 INT,
regularorder_taxrate_id02 INT,
regularorder_shohin_cd03 VARCHAR(5),
regularorder_shohin_level03 VARCHAR(2),
regularorder_order_count03 INT,
regularorder_price03 INT,
regularorder_price_taxrate03 INT,
regularorder_taxrate_id03 INT,
regularorder_shohin_cd04 VARCHAR(5),
regularorder_shohin_level04 VARCHAR(2),
regularorder_order_count04 INT,
regularorder_price04 INT,
regularorder_price_taxrate04 INT,
regularorder_taxrate_id04 INT,
regularorder_shohin_cd05 VARCHAR(5),
regularorder_shohin_level05 VARCHAR(2),
regularorder_order_count05 INT,
regularorder_price05 INT,
regularorder_price_taxrate05 INT,
regularorder_taxrate_id05 INT,
delivery_interval_type CHAR(2),
next_delivery_dt CHAR(2),
next_delivery_week CHAR(2),
next_delivery_day CHAR(2),
optin_flg CHAR(1),
harb_optin_flg CHAR(1),
indivnamesender_flg CHAR(3),
CONSTRAINT pk_old_chohakudirectorder_tbl PRIMARY KEY (direct_order_id)
);
-- ADD COLUMN
COMMENT ON TABLE sskadminuser.old_chohakudirectorder_tbl IS '（後日削除）旧一般注文テーブル（長白仙参）';
COMMENT ON COLUMN sskadminuser.old_chohakudirectorder_tbl.direct_order_id IS 'ID';
COMMENT ON COLUMN sskadminuser.old_chohakudirectorder_tbl.site_kbn IS 'サイト区分';
COMMENT ON COLUMN sskadminuser.old_chohakudirectorder_tbl.direct_dt IS '受付日時';
COMMENT ON COLUMN sskadminuser.old_chohakudirectorder_tbl.tel_no IS '電話番号';
COMMENT ON COLUMN sskadminuser.old_chohakudirectorder_tbl.email IS 'メールアドレス';
COMMENT ON COLUMN sskadminuser.old_chohakudirectorder_tbl.dmmail_flg IS 'DM的メールフラグ';
COMMENT ON COLUMN sskadminuser.old_chohakudirectorder_tbl.host_dt IS 'ホスト受付日付';
COMMENT ON COLUMN sskadminuser.old_chohakudirectorder_tbl.host_time IS 'ホスト受付時刻';
COMMENT ON COLUMN sskadminuser.old_chohakudirectorder_tbl.name_kana IS 'カナ氏名';
COMMENT ON COLUMN sskadminuser.old_chohakudirectorder_tbl.name_kanji IS '漢字氏名';
COMMENT ON COLUMN sskadminuser.old_chohakudirectorder_tbl.gender IS '性別';
COMMENT ON COLUMN sskadminuser.old_chohakudirectorder_tbl.post_no IS '郵便番号';
COMMENT ON COLUMN sskadminuser.old_chohakudirectorder_tbl.addr_kana IS 'カナ住所';
COMMENT ON COLUMN sskadminuser.old_chohakudirectorder_tbl.addr_kanji IS '漢字住所';
COMMENT ON COLUMN sskadminuser.old_chohakudirectorder_tbl.addr_not_conv IS '住所非変換部';
COMMENT ON COLUMN sskadminuser.old_chohakudirectorder_tbl.addr_not_conv_kana IS '住所非変換部';
COMMENT ON COLUMN sskadminuser.old_chohakudirectorder_tbl.prefecture_cd IS '県コード';
COMMENT ON COLUMN sskadminuser.old_chohakudirectorder_tbl.job_cd IS '職業コード';
COMMENT ON COLUMN sskadminuser.old_chohakudirectorder_tbl.year_type IS '年号';
COMMENT ON COLUMN sskadminuser.old_chohakudirectorder_tbl.birthday IS '生年月日';
COMMENT ON COLUMN sskadminuser.old_chohakudirectorder_tbl.baitai_cd IS '媒体コード';
COMMENT ON COLUMN sskadminuser.old_chohakudirectorder_tbl.baitai_name IS '媒体名称';
COMMENT ON COLUMN sskadminuser.old_chohakudirectorder_tbl.q_baitai_cd IS '質問：お申し込みのきっかけ（媒体コード）';
COMMENT ON COLUMN sskadminuser.old_chohakudirectorder_tbl.q_baitai_name IS '質問：お申し込みのきっかけ（媒体名称）';
COMMENT ON COLUMN sskadminuser.old_chohakudirectorder_tbl.key_cd IS '検索キーワード';
COMMENT ON COLUMN sskadminuser.old_chohakudirectorder_tbl.m_email IS '携帯メールアドレス';
COMMENT ON COLUMN sskadminuser.old_chohakudirectorder_tbl.shohin_cd01 IS '商品コード01';
COMMENT ON COLUMN sskadminuser.old_chohakudirectorder_tbl.shohin_level01 IS '商品レベル01';
COMMENT ON COLUMN sskadminuser.old_chohakudirectorder_tbl.order_count01 IS '注文数01';
COMMENT ON COLUMN sskadminuser.old_chohakudirectorder_tbl.price01 IS '商品単価01';
COMMENT ON COLUMN sskadminuser.old_chohakudirectorder_tbl.price_taxrate01 IS '商品単価消費税01';
COMMENT ON COLUMN sskadminuser.old_chohakudirectorder_tbl.taxrate_id01 IS '税率ID01';
COMMENT ON COLUMN sskadminuser.old_chohakudirectorder_tbl.shohin_cd02 IS '商品コード02';
COMMENT ON COLUMN sskadminuser.old_chohakudirectorder_tbl.shohin_level02 IS '商品レベル02';
COMMENT ON COLUMN sskadminuser.old_chohakudirectorder_tbl.order_count02 IS '注文数02';
COMMENT ON COLUMN sskadminuser.old_chohakudirectorder_tbl.price02 IS '商品単価02';
COMMENT ON COLUMN sskadminuser.old_chohakudirectorder_tbl.price_taxrate02 IS '商品単価消費税02';
COMMENT ON COLUMN sskadminuser.old_chohakudirectorder_tbl.taxrate_id02 IS '税率ID02';
COMMENT ON COLUMN sskadminuser.old_chohakudirectorder_tbl.shohin_cd03 IS '商品コード03';
COMMENT ON COLUMN sskadminuser.old_chohakudirectorder_tbl.shohin_level03 IS '商品レベル03';
COMMENT ON COLUMN sskadminuser.old_chohakudirectorder_tbl.order_count03 IS '注文数03';
COMMENT ON COLUMN sskadminuser.old_chohakudirectorder_tbl.price03 IS '商品単価03';
COMMENT ON COLUMN sskadminuser.old_chohakudirectorder_tbl.price_taxrate03 IS '商品単価消費税03';
COMMENT ON COLUMN sskadminuser.old_chohakudirectorder_tbl.taxrate_id03 IS '税率ID03';
COMMENT ON COLUMN sskadminuser.old_chohakudirectorder_tbl.shohin_cd04 IS '商品コード04';
COMMENT ON COLUMN sskadminuser.old_chohakudirectorder_tbl.shohin_level04 IS '商品レベル04';
COMMENT ON COLUMN sskadminuser.old_chohakudirectorder_tbl.order_count04 IS '注文数04';
COMMENT ON COLUMN sskadminuser.old_chohakudirectorder_tbl.price04 IS '商品単価04';
COMMENT ON COLUMN sskadminuser.old_chohakudirectorder_tbl.price_taxrate04 IS '商品単価消費税04';
COMMENT ON COLUMN sskadminuser.old_chohakudirectorder_tbl.taxrate_id04 IS '税率ID04';
COMMENT ON COLUMN sskadminuser.old_chohakudirectorder_tbl.shohin_cd05 IS '商品コード05';
COMMENT ON COLUMN sskadminuser.old_chohakudirectorder_tbl.shohin_level05 IS '商品レベル05';
COMMENT ON COLUMN sskadminuser.old_chohakudirectorder_tbl.order_count05 IS '注文数05';
COMMENT ON COLUMN sskadminuser.old_chohakudirectorder_tbl.price05 IS '商品単価05';
COMMENT ON COLUMN sskadminuser.old_chohakudirectorder_tbl.price_taxrate05 IS '商品単価消費税05';
COMMENT ON COLUMN sskadminuser.old_chohakudirectorder_tbl.taxrate_id05 IS '税率ID05';
COMMENT ON COLUMN sskadminuser.old_chohakudirectorder_tbl.shohin_cd06 IS '商品コード06';
COMMENT ON COLUMN sskadminuser.old_chohakudirectorder_tbl.shohin_level06 IS '商品レベル06';
COMMENT ON COLUMN sskadminuser.old_chohakudirectorder_tbl.order_count06 IS '注文数06';
COMMENT ON COLUMN sskadminuser.old_chohakudirectorder_tbl.price06 IS '商品単価06';
COMMENT ON COLUMN sskadminuser.old_chohakudirectorder_tbl.price_taxrate06 IS '商品単価消費税06';
COMMENT ON COLUMN sskadminuser.old_chohakudirectorder_tbl.taxrate_id06 IS '税率ID06';
COMMENT ON COLUMN sskadminuser.old_chohakudirectorder_tbl.shohin_cd07 IS '商品コード07';
COMMENT ON COLUMN sskadminuser.old_chohakudirectorder_tbl.shohin_level07 IS '商品レベル07';
COMMENT ON COLUMN sskadminuser.old_chohakudirectorder_tbl.order_count07 IS '注文数07';
COMMENT ON COLUMN sskadminuser.old_chohakudirectorder_tbl.price07 IS '商品単価07';
COMMENT ON COLUMN sskadminuser.old_chohakudirectorder_tbl.price_taxrate07 IS '商品単価消費税07';
COMMENT ON COLUMN sskadminuser.old_chohakudirectorder_tbl.taxrate_id07 IS '税率ID07';
COMMENT ON COLUMN sskadminuser.old_chohakudirectorder_tbl.shohin_cd08 IS '商品コード08';
COMMENT ON COLUMN sskadminuser.old_chohakudirectorder_tbl.shohin_level08 IS '商品レベル08';
COMMENT ON COLUMN sskadminuser.old_chohakudirectorder_tbl.order_count08 IS '注文数08';
COMMENT ON COLUMN sskadminuser.old_chohakudirectorder_tbl.price08 IS '商品単価08';
COMMENT ON COLUMN sskadminuser.old_chohakudirectorder_tbl.price_taxrate08 IS '商品単価消費税08';
COMMENT ON COLUMN sskadminuser.old_chohakudirectorder_tbl.taxrate_id08 IS '税率ID08';
COMMENT ON COLUMN sskadminuser.old_chohakudirectorder_tbl.shohin_cd09 IS '商品コード09';
COMMENT ON COLUMN sskadminuser.old_chohakudirectorder_tbl.shohin_level09 IS '商品レベル09';
COMMENT ON COLUMN sskadminuser.old_chohakudirectorder_tbl.order_count09 IS '注文数09';
COMMENT ON COLUMN sskadminuser.old_chohakudirectorder_tbl.price09 IS '商品単価09';
COMMENT ON COLUMN sskadminuser.old_chohakudirectorder_tbl.price_taxrate09 IS '商品単価消費税09';
COMMENT ON COLUMN sskadminuser.old_chohakudirectorder_tbl.taxrate_id09 IS '税率ID09';
COMMENT ON COLUMN sskadminuser.old_chohakudirectorder_tbl.shohin_cd10 IS '商品コード10';
COMMENT ON COLUMN sskadminuser.old_chohakudirectorder_tbl.shohin_level10 IS '商品レベル10';
COMMENT ON COLUMN sskadminuser.old_chohakudirectorder_tbl.order_count10 IS '注文数10';
COMMENT ON COLUMN sskadminuser.old_chohakudirectorder_tbl.price10 IS '商品単価10';
COMMENT ON COLUMN sskadminuser.old_chohakudirectorder_tbl.price_taxrate10 IS '商品単価消費税10';
COMMENT ON COLUMN sskadminuser.old_chohakudirectorder_tbl.taxrate_id10 IS '税率ID10';
COMMENT ON COLUMN sskadminuser.old_chohakudirectorder_tbl.shohin_cd11 IS '商品コード11';
COMMENT ON COLUMN sskadminuser.old_chohakudirectorder_tbl.shohin_level11 IS '商品レベル11';
COMMENT ON COLUMN sskadminuser.old_chohakudirectorder_tbl.order_count11 IS '注文数11';
COMMENT ON COLUMN sskadminuser.old_chohakudirectorder_tbl.price11 IS '商品単価11';
COMMENT ON COLUMN sskadminuser.old_chohakudirectorder_tbl.price_taxrate11 IS '商品単価消費税11';
COMMENT ON COLUMN sskadminuser.old_chohakudirectorder_tbl.taxrate_id11 IS '税率ID11';
COMMENT ON COLUMN sskadminuser.old_chohakudirectorder_tbl.shohin_cd12 IS '商品コード12';
COMMENT ON COLUMN sskadminuser.old_chohakudirectorder_tbl.shohin_level12 IS '商品レベル12';
COMMENT ON COLUMN sskadminuser.old_chohakudirectorder_tbl.order_count12 IS '注文数12';
COMMENT ON COLUMN sskadminuser.old_chohakudirectorder_tbl.price12 IS '商品単価12';
COMMENT ON COLUMN sskadminuser.old_chohakudirectorder_tbl.price_taxrate12 IS '商品単価消費税12';
COMMENT ON COLUMN sskadminuser.old_chohakudirectorder_tbl.taxrate_id12 IS '税率ID12';
COMMENT ON COLUMN sskadminuser.old_chohakudirectorder_tbl.shohin_cd13 IS '商品コード13';
COMMENT ON COLUMN sskadminuser.old_chohakudirectorder_tbl.shohin_level13 IS '商品レベル13';
COMMENT ON COLUMN sskadminuser.old_chohakudirectorder_tbl.order_count13 IS '注文数13';
COMMENT ON COLUMN sskadminuser.old_chohakudirectorder_tbl.price13 IS '商品単価13';
COMMENT ON COLUMN sskadminuser.old_chohakudirectorder_tbl.price_taxrate13 IS '商品単価消費税13';
COMMENT ON COLUMN sskadminuser.old_chohakudirectorder_tbl.taxrate_id13 IS '税率ID13';
COMMENT ON COLUMN sskadminuser.old_chohakudirectorder_tbl.shohin_cd14 IS '商品コード14';
COMMENT ON COLUMN sskadminuser.old_chohakudirectorder_tbl.shohin_level14 IS '商品レベル14';
COMMENT ON COLUMN sskadminuser.old_chohakudirectorder_tbl.order_count14 IS '注文数14';
COMMENT ON COLUMN sskadminuser.old_chohakudirectorder_tbl.price14 IS '商品単価14';
COMMENT ON COLUMN sskadminuser.old_chohakudirectorder_tbl.price_taxrate14 IS '商品単価消費税14';
COMMENT ON COLUMN sskadminuser.old_chohakudirectorder_tbl.taxrate_id14 IS '税率ID14';
COMMENT ON COLUMN sskadminuser.old_chohakudirectorder_tbl.shohin_cd15 IS '商品コード15';
COMMENT ON COLUMN sskadminuser.old_chohakudirectorder_tbl.shohin_level15 IS '商品レベル15';
COMMENT ON COLUMN sskadminuser.old_chohakudirectorder_tbl.order_count15 IS '注文数15';
COMMENT ON COLUMN sskadminuser.old_chohakudirectorder_tbl.price15 IS '商品単価15';
COMMENT ON COLUMN sskadminuser.old_chohakudirectorder_tbl.price_taxrate15 IS '商品単価消費税15';
COMMENT ON COLUMN sskadminuser.old_chohakudirectorder_tbl.taxrate_id15 IS '税率ID15';
COMMENT ON COLUMN sskadminuser.old_chohakudirectorder_tbl.shohin_cd16 IS '商品コード16';
COMMENT ON COLUMN sskadminuser.old_chohakudirectorder_tbl.shohin_level16 IS '商品レベル16';
COMMENT ON COLUMN sskadminuser.old_chohakudirectorder_tbl.order_count16 IS '注文数16';
COMMENT ON COLUMN sskadminuser.old_chohakudirectorder_tbl.price16 IS '商品単価16';
COMMENT ON COLUMN sskadminuser.old_chohakudirectorder_tbl.price_taxrate16 IS '商品単価消費税16';
COMMENT ON COLUMN sskadminuser.old_chohakudirectorder_tbl.taxrate_id16 IS '税率ID16';
COMMENT ON COLUMN sskadminuser.old_chohakudirectorder_tbl.shohin_cd17 IS '商品コード17';
COMMENT ON COLUMN sskadminuser.old_chohakudirectorder_tbl.shohin_level17 IS '商品レベル17';
COMMENT ON COLUMN sskadminuser.old_chohakudirectorder_tbl.order_count17 IS '注文数17';
COMMENT ON COLUMN sskadminuser.old_chohakudirectorder_tbl.price17 IS '商品単価17';
COMMENT ON COLUMN sskadminuser.old_chohakudirectorder_tbl.price_taxrate17 IS '商品単価消費税17';
COMMENT ON COLUMN sskadminuser.old_chohakudirectorder_tbl.taxrate_id17 IS '税率ID17';
COMMENT ON COLUMN sskadminuser.old_chohakudirectorder_tbl.shohin_cd18 IS '商品コード18';
COMMENT ON COLUMN sskadminuser.old_chohakudirectorder_tbl.shohin_level18 IS '商品レベル18';
COMMENT ON COLUMN sskadminuser.old_chohakudirectorder_tbl.order_count18 IS '注文数18';
COMMENT ON COLUMN sskadminuser.old_chohakudirectorder_tbl.price18 IS '商品単価18';
COMMENT ON COLUMN sskadminuser.old_chohakudirectorder_tbl.price_taxrate18 IS '商品単価消費税18';
COMMENT ON COLUMN sskadminuser.old_chohakudirectorder_tbl.taxrate_id18 IS '税率ID18';
COMMENT ON COLUMN sskadminuser.old_chohakudirectorder_tbl.shohin_cd19 IS '商品コード19';
COMMENT ON COLUMN sskadminuser.old_chohakudirectorder_tbl.shohin_level19 IS '商品レベル19';
COMMENT ON COLUMN sskadminuser.old_chohakudirectorder_tbl.order_count19 IS '注文数19';
COMMENT ON COLUMN sskadminuser.old_chohakudirectorder_tbl.price19 IS '商品単価19';
COMMENT ON COLUMN sskadminuser.old_chohakudirectorder_tbl.price_taxrate19 IS '商品単価消費税19';
COMMENT ON COLUMN sskadminuser.old_chohakudirectorder_tbl.taxrate_id19 IS '税率ID19';
COMMENT ON COLUMN sskadminuser.old_chohakudirectorder_tbl.shohin_cd20 IS '商品コード20';
COMMENT ON COLUMN sskadminuser.old_chohakudirectorder_tbl.shohin_level20 IS '商品レベル20';
COMMENT ON COLUMN sskadminuser.old_chohakudirectorder_tbl.order_count20 IS '注文数20';
COMMENT ON COLUMN sskadminuser.old_chohakudirectorder_tbl.price20 IS '商品単価20';
COMMENT ON COLUMN sskadminuser.old_chohakudirectorder_tbl.price_taxrate20 IS '商品単価消費税20';
COMMENT ON COLUMN sskadminuser.old_chohakudirectorder_tbl.taxrate_id20 IS '税率ID20';
COMMENT ON COLUMN sskadminuser.old_chohakudirectorder_tbl.total_order_amount IS '合計注文金額';
COMMENT ON COLUMN sskadminuser.old_chohakudirectorder_tbl.total_order_taxrate IS '合計注文消費税';
COMMENT ON COLUMN sskadminuser.old_chohakudirectorder_tbl.payment_type IS '支払い方法';
COMMENT ON COLUMN sskadminuser.old_chohakudirectorder_tbl.payment_num IS '支払い回数';
COMMENT ON COLUMN sskadminuser.old_chohakudirectorder_tbl.cc_type IS 'クレジット会社';
COMMENT ON COLUMN sskadminuser.old_chohakudirectorder_tbl.cc_no IS 'クレジットカード番号';
COMMENT ON COLUMN sskadminuser.old_chohakudirectorder_tbl.cc_term IS '有効期限';
COMMENT ON COLUMN sskadminuser.old_chohakudirectorder_tbl.cc_name IS 'クレジットカード名義人';
COMMENT ON COLUMN sskadminuser.old_chohakudirectorder_tbl.cc_scd IS 'セキュリティコード';
COMMENT ON COLUMN sskadminuser.old_chohakudirectorder_tbl.recognition_no IS '承認番号';
COMMENT ON COLUMN sskadminuser.old_chohakudirectorder_tbl.delivery_dt IS '配送希望日';
COMMENT ON COLUMN sskadminuser.old_chohakudirectorder_tbl.delivery_time_type IS '配送時刻区分';
COMMENT ON COLUMN sskadminuser.old_chohakudirectorder_tbl.ship_caution_cd IS '発送注意コード';
COMMENT ON COLUMN sskadminuser.old_chohakudirectorder_tbl.another_addr_type IS '配送先区分';
COMMENT ON COLUMN sskadminuser.old_chohakudirectorder_tbl.another_addr IS 'その他住所';
COMMENT ON COLUMN sskadminuser.old_chohakudirectorder_tbl.another_addr_not_conv IS 'その他非変換部';
COMMENT ON COLUMN sskadminuser.old_chohakudirectorder_tbl.another_telno IS 'その他住所電話番号';
COMMENT ON COLUMN sskadminuser.old_chohakudirectorder_tbl.another_post_no IS 'その他住所郵便番号';
COMMENT ON COLUMN sskadminuser.old_chohakudirectorder_tbl.agree_flg IS '個人情報取扱同意フラグ';
COMMENT ON COLUMN sskadminuser.old_chohakudirectorder_tbl.mail_send_flg IS 'メール送信フラグ';
COMMENT ON COLUMN sskadminuser.old_chohakudirectorder_tbl.kainno IS '会員コード';
COMMENT ON COLUMN sskadminuser.old_chohakudirectorder_tbl.order_status IS '状態フラグ';
COMMENT ON COLUMN sskadminuser.old_chohakudirectorder_tbl.delete_flg IS '削除フラグ';
COMMENT ON COLUMN sskadminuser.old_chohakudirectorder_tbl.print_flg IS '受票出力';
COMMENT ON COLUMN sskadminuser.old_chohakudirectorder_tbl.host_result IS 'ホスト送信結果';
COMMENT ON COLUMN sskadminuser.old_chohakudirectorder_tbl.host_flg IS 'ホストフラグ';
COMMENT ON COLUMN sskadminuser.old_chohakudirectorder_tbl.sync_flg IS 'PC同期フラグ';
COMMENT ON COLUMN sskadminuser.old_chohakudirectorder_tbl.status IS 'ステータス';
COMMENT ON COLUMN sskadminuser.old_chohakudirectorder_tbl.mail_flg IS '発送メール送信フラグ';
COMMENT ON COLUMN sskadminuser.old_chohakudirectorder_tbl.communicator IS '対応者';
COMMENT ON COLUMN sskadminuser.old_chohakudirectorder_tbl.mail_send_dt IS 'お礼メール送信日';
COMMENT ON COLUMN sskadminuser.old_chohakudirectorder_tbl.ctrl_no IS 'お礼メール管理Ｎｏ';
COMMENT ON COLUMN sskadminuser.old_chohakudirectorder_tbl.mailteikei_flg IS 'メール定型フラグ';
COMMENT ON COLUMN sskadminuser.old_chohakudirectorder_tbl.overlap_flg IS '重複フラグ';
COMMENT ON COLUMN sskadminuser.old_chohakudirectorder_tbl.session_id IS 'セッションID';
COMMENT ON COLUMN sskadminuser.old_chohakudirectorder_tbl.update_dt IS '更新日';
COMMENT ON COLUMN sskadminuser.old_chohakudirectorder_tbl.regist_dt IS '登録日';
COMMENT ON COLUMN sskadminuser.old_chohakudirectorder_tbl.update_user IS '最終更新者';
COMMENT ON COLUMN sskadminuser.old_chohakudirectorder_tbl.regist_user IS '登録者';
COMMENT ON COLUMN sskadminuser.old_chohakudirectorder_tbl.reduction_kbn IS '還元区分';
COMMENT ON COLUMN sskadminuser.old_chohakudirectorder_tbl.gift_flg IS '贈り物区分';
COMMENT ON COLUMN sskadminuser.old_chohakudirectorder_tbl.q_etc_comment IS 'Q_ETC_COMMENT';
COMMENT ON COLUMN sskadminuser.old_chohakudirectorder_tbl.odrroutedtlkbn IS '経路詳細区分';
COMMENT ON COLUMN sskadminuser.old_chohakudirectorder_tbl.regularorder_flg IS '定期申込フラグ';
COMMENT ON COLUMN sskadminuser.old_chohakudirectorder_tbl.regularorder_shohin_cd01 IS '定期商品コード1';
COMMENT ON COLUMN sskadminuser.old_chohakudirectorder_tbl.regularorder_shohin_level01 IS '定期商品レベルコード1';
COMMENT ON COLUMN sskadminuser.old_chohakudirectorder_tbl.regularorder_order_count01 IS '定期数量1';
COMMENT ON COLUMN sskadminuser.old_chohakudirectorder_tbl.regularorder_price01 IS '定期商品価格1';
COMMENT ON COLUMN sskadminuser.old_chohakudirectorder_tbl.regularorder_price_taxrate01 IS '定期商品消費税1';
COMMENT ON COLUMN sskadminuser.old_chohakudirectorder_tbl.regularorder_taxrate_id01 IS '定期商品消費税ID1';
COMMENT ON COLUMN sskadminuser.old_chohakudirectorder_tbl.regularorder_shohin_cd02 IS '定期商品コード2';
COMMENT ON COLUMN sskadminuser.old_chohakudirectorder_tbl.regularorder_shohin_level02 IS '定期商品レベルコード2';
COMMENT ON COLUMN sskadminuser.old_chohakudirectorder_tbl.regularorder_order_count02 IS '定期数量2';
COMMENT ON COLUMN sskadminuser.old_chohakudirectorder_tbl.regularorder_price02 IS '定期商品価格2';
COMMENT ON COLUMN sskadminuser.old_chohakudirectorder_tbl.regularorder_price_taxrate02 IS '定期商品消費税2';
COMMENT ON COLUMN sskadminuser.old_chohakudirectorder_tbl.regularorder_taxrate_id02 IS '定期商品消費税ID2';
COMMENT ON COLUMN sskadminuser.old_chohakudirectorder_tbl.regularorder_shohin_cd03 IS '定期商品コード3';
COMMENT ON COLUMN sskadminuser.old_chohakudirectorder_tbl.regularorder_shohin_level03 IS '定期商品レベルコード3';
COMMENT ON COLUMN sskadminuser.old_chohakudirectorder_tbl.regularorder_order_count03 IS '定期数量3';
COMMENT ON COLUMN sskadminuser.old_chohakudirectorder_tbl.regularorder_price03 IS '定期商品価格3';
COMMENT ON COLUMN sskadminuser.old_chohakudirectorder_tbl.regularorder_price_taxrate03 IS '定期商品消費税3';
COMMENT ON COLUMN sskadminuser.old_chohakudirectorder_tbl.regularorder_taxrate_id03 IS '定期商品消費税ID3';
COMMENT ON COLUMN sskadminuser.old_chohakudirectorder_tbl.regularorder_shohin_cd04 IS '定期商品コード4';
COMMENT ON COLUMN sskadminuser.old_chohakudirectorder_tbl.regularorder_shohin_level04 IS '定期商品レベルコード4';
COMMENT ON COLUMN sskadminuser.old_chohakudirectorder_tbl.regularorder_order_count04 IS '定期数量4';
COMMENT ON COLUMN sskadminuser.old_chohakudirectorder_tbl.regularorder_price04 IS '定期商品価格4';
COMMENT ON COLUMN sskadminuser.old_chohakudirectorder_tbl.regularorder_price_taxrate04 IS '定期商品消費税4';
COMMENT ON COLUMN sskadminuser.old_chohakudirectorder_tbl.regularorder_taxrate_id04 IS '定期商品消費税ID4';
COMMENT ON COLUMN sskadminuser.old_chohakudirectorder_tbl.regularorder_shohin_cd05 IS '定期商品コード5';
COMMENT ON COLUMN sskadminuser.old_chohakudirectorder_tbl.regularorder_shohin_level05 IS '定期商品レベルコード5';
COMMENT ON COLUMN sskadminuser.old_chohakudirectorder_tbl.regularorder_order_count05 IS '定期数量5';
COMMENT ON COLUMN sskadminuser.old_chohakudirectorder_tbl.regularorder_price05 IS '定期商品価格5';
COMMENT ON COLUMN sskadminuser.old_chohakudirectorder_tbl.regularorder_price_taxrate05 IS '定期商品消費税5';
COMMENT ON COLUMN sskadminuser.old_chohakudirectorder_tbl.regularorder_taxrate_id05 IS '定期商品消費税ID5';
COMMENT ON COLUMN sskadminuser.old_chohakudirectorder_tbl.delivery_interval_type IS '定期配送間隔区分';
COMMENT ON COLUMN sskadminuser.old_chohakudirectorder_tbl.next_delivery_dt IS '定期配達指定日';
COMMENT ON COLUMN sskadminuser.old_chohakudirectorder_tbl.next_delivery_week IS '定期配達指定週区分';
COMMENT ON COLUMN sskadminuser.old_chohakudirectorder_tbl.next_delivery_day IS '定期配達指定曜日区分';
COMMENT ON COLUMN sskadminuser.old_chohakudirectorder_tbl.optin_flg IS 'オプトイン（化粧品）';
COMMENT ON COLUMN sskadminuser.old_chohakudirectorder_tbl.harb_optin_flg IS 'オプトイン（漢方）';
COMMENT ON COLUMN sskadminuser.old_chohakudirectorder_tbl.indivnamesender_flg IS '個人名発送フラグ';
-- CREATE INDEX 
-- END TABLE : sskadminuser.old_chohakudirectorder_tbl  --

-- START TABLE : sskadminuser.old_drinkdirectorder_tbl  --
CREATE TABLE sskadminuser.old_drinkdirectorder_tbl(
direct_order_id VARCHAR(32) NOT NULL,
site_kbn CHAR(1) NOT NULL,
direct_dt TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL,
tel_no VARCHAR(64),
email VARCHAR(112),
host_dt TIMESTAMP(0) WITHOUT TIME ZONE,
host_time VARCHAR(8),
name_kana VARCHAR(92),
name_kanji VARCHAR(104),
gender CHAR(1),
post_no VARCHAR(8),
addr_kana VARCHAR(180),
addr_kanji VARCHAR(180),
addr_not_conv VARCHAR(124),
addr_not_conv_kana VARCHAR(124),
prefecture_cd CHAR(2),
job_cd CHAR(2),
worry_type1 CHAR(2),
worry_type2 CHAR(2),
worry_type3 CHAR(2),
worry_type10 CHAR(2),
skin_type CHAR(1),
sensitive_type CHAR(1),
year_type CHAR(1),
birthday VARCHAR(56),
baitai_cd VARCHAR(8),
key_cd VARCHAR(6),
dmflg INT,
dmmailflg INT,
m_email VARCHAR(112),
hada VARCHAR(800),
shohin_cd01 VARCHAR(5),
order_count01 INT,
shohin_cd02 VARCHAR(5),
order_count02 INT,
shohin_cd03 VARCHAR(5),
order_count03 INT,
shohin_cd04 VARCHAR(5),
order_count04 INT,
shohin_cd05 VARCHAR(5),
order_count05 INT,
shohin_cd06 VARCHAR(5),
order_count06 INT,
shohin_cd07 VARCHAR(5),
order_count07 INT,
shohin_cd08 VARCHAR(5),
order_count08 INT,
shohin_cd09 VARCHAR(5),
order_count09 INT,
shohin_cd10 VARCHAR(5),
order_count10 INT,
shohin_cd11 VARCHAR(5),
order_count11 INT,
shohin_cd12 VARCHAR(5),
order_count12 INT,
shohin_cd13 VARCHAR(5),
order_count13 INT,
shohin_cd14 VARCHAR(5),
order_count14 INT,
shohin_cd15 VARCHAR(5),
order_count15 INT,
shohin_cd16 VARCHAR(5),
order_count16 INT,
shohin_cd17 VARCHAR(5),
order_count17 INT,
shohin_cd18 VARCHAR(5),
order_count18 INT,
shohin_cd19 VARCHAR(5),
order_count19 INT,
shohin_cd20 VARCHAR(5),
order_count20 INT,
payment_type CHAR(2),
payment_num CHAR(2),
cc_type CHAR(2),
cc_no CHAR(68),
cc_term CHAR(6),
recognition_no CHAR(6),
delivery_dt TIMESTAMP(0) WITHOUT TIME ZONE,
delivery_time_type CHAR(2),
ship_caution_cd CHAR(6),
another_addr_type CHAR(1),
another_addr VARCHAR(180),
another_addr_not_conv VARCHAR(124),
another_telno VARCHAR(64),
another_post_no VARCHAR(8),
agree_flg CHAR(1),
mail_send_flg CHAR(1),
kainno CHAR(8) NOT NULL,
order_status CHAR(1) NOT NULL,
delete_flg CHAR(1) NOT NULL,
print_flg CHAR(1) NOT NULL,
host_result CHAR(1),
host_flg CHAR(3) NOT NULL,
sync_flg CHAR(1) NOT NULL,
status INT NOT NULL,
mail_flg CHAR(1) NOT NULL,
communicator VARCHAR(10),
mail_send_dt TIMESTAMP(0) WITHOUT TIME ZONE,
ctrl_no INT,
mailteikei_flg CHAR(1),
session_id VARCHAR(50),
update_dt TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL,
regist_dt TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL,
update_user VARCHAR(64) NOT NULL,
regist_user VARCHAR(64) NOT NULL,
shohin_level01 VARCHAR(2),
shohin_level02 VARCHAR(2),
shohin_level03 VARCHAR(2),
shohin_level04 VARCHAR(2),
shohin_level05 VARCHAR(2),
shohin_level06 VARCHAR(2),
shohin_level07 VARCHAR(2),
shohin_level08 VARCHAR(2),
shohin_level09 VARCHAR(2),
shohin_level10 VARCHAR(2),
shohin_level11 VARCHAR(2),
shohin_level12 VARCHAR(2),
shohin_level13 VARCHAR(2),
shohin_level14 VARCHAR(2),
shohin_level15 VARCHAR(2),
shohin_level16 VARCHAR(2),
shohin_level17 VARCHAR(2),
shohin_level18 VARCHAR(2),
shohin_level19 VARCHAR(2),
shohin_level20 VARCHAR(2),
cc_name VARCHAR(84),
cc_scd VARCHAR(52),
baitai_name VARCHAR(50),
q_aftercare CHAR(1),
q_baitai_cd VARCHAR(8),
q_baitai_name VARCHAR(50),
q_first_hoped CHAR(1),
q_reason_type CHAR(1),
q_reason_comment VARCHAR(800),
price01 INT,
price_taxrate01 INT,
taxrate_id01 INT,
price02 INT,
price_taxrate02 INT,
taxrate_id02 INT,
price03 INT,
price_taxrate03 INT,
taxrate_id03 INT,
price04 INT,
price_taxrate04 INT,
taxrate_id04 INT,
price05 INT,
price_taxrate05 INT,
taxrate_id05 INT,
price06 INT,
price_taxrate06 INT,
taxrate_id06 INT,
price07 INT,
price_taxrate07 INT,
taxrate_id07 INT,
price08 INT,
price_taxrate08 INT,
taxrate_id08 INT,
price09 INT,
price_taxrate09 INT,
taxrate_id09 INT,
price10 INT,
price_taxrate10 INT,
taxrate_id10 INT,
price11 INT,
price_taxrate11 INT,
taxrate_id11 INT,
price12 INT,
price_taxrate12 INT,
taxrate_id12 INT,
price13 INT,
price_taxrate13 INT,
taxrate_id13 INT,
price14 INT,
price_taxrate14 INT,
taxrate_id14 INT,
price15 INT,
price_taxrate15 INT,
taxrate_id15 INT,
price16 INT,
price_taxrate16 INT,
taxrate_id16 INT,
price17 INT,
price_taxrate17 INT,
taxrate_id17 INT,
price18 INT,
price_taxrate18 INT,
taxrate_id18 INT,
price19 INT,
price_taxrate19 INT,
taxrate_id19 INT,
price20 INT,
price_taxrate20 INT,
taxrate_id20 INT,
total_order_amount INT,
total_order_taxrate INT,
reduction_kbn VARCHAR(2),
odrroutedtlkbn CHAR(2),
CONSTRAINT pk_old_drinkdirectorder_tbl PRIMARY KEY (direct_order_id)
);
-- ADD COLUMN
COMMENT ON TABLE sskadminuser.old_drinkdirectorder_tbl IS '（後日削除）旧一般注文テーブル（飲むドモ）';
COMMENT ON COLUMN sskadminuser.old_drinkdirectorder_tbl.direct_order_id IS 'ID';
COMMENT ON COLUMN sskadminuser.old_drinkdirectorder_tbl.site_kbn IS 'サイト区分';
COMMENT ON COLUMN sskadminuser.old_drinkdirectorder_tbl.direct_dt IS '受付日時';
COMMENT ON COLUMN sskadminuser.old_drinkdirectorder_tbl.tel_no IS '電話番号';
COMMENT ON COLUMN sskadminuser.old_drinkdirectorder_tbl.email IS 'メールアドレス';
COMMENT ON COLUMN sskadminuser.old_drinkdirectorder_tbl.host_dt IS 'ホスト受付日付';
COMMENT ON COLUMN sskadminuser.old_drinkdirectorder_tbl.host_time IS 'ホスト受付時刻';
COMMENT ON COLUMN sskadminuser.old_drinkdirectorder_tbl.name_kana IS 'カナ氏名';
COMMENT ON COLUMN sskadminuser.old_drinkdirectorder_tbl.name_kanji IS '漢字氏名';
COMMENT ON COLUMN sskadminuser.old_drinkdirectorder_tbl.gender IS '性別';
COMMENT ON COLUMN sskadminuser.old_drinkdirectorder_tbl.post_no IS '郵便番号';
COMMENT ON COLUMN sskadminuser.old_drinkdirectorder_tbl.addr_kana IS 'カナ住所';
COMMENT ON COLUMN sskadminuser.old_drinkdirectorder_tbl.addr_kanji IS '漢字住所';
COMMENT ON COLUMN sskadminuser.old_drinkdirectorder_tbl.addr_not_conv IS '住所非変換部';
COMMENT ON COLUMN sskadminuser.old_drinkdirectorder_tbl.addr_not_conv_kana IS '住所非変換部';
COMMENT ON COLUMN sskadminuser.old_drinkdirectorder_tbl.prefecture_cd IS '県コード';
COMMENT ON COLUMN sskadminuser.old_drinkdirectorder_tbl.job_cd IS '職業コード';
COMMENT ON COLUMN sskadminuser.old_drinkdirectorder_tbl.worry_type1 IS '悩みコード1';
COMMENT ON COLUMN sskadminuser.old_drinkdirectorder_tbl.worry_type2 IS '悩みコード2';
COMMENT ON COLUMN sskadminuser.old_drinkdirectorder_tbl.worry_type3 IS '悩みコード3';
COMMENT ON COLUMN sskadminuser.old_drinkdirectorder_tbl.worry_type10 IS '悩みコード10';
COMMENT ON COLUMN sskadminuser.old_drinkdirectorder_tbl.skin_type IS '肌質';
COMMENT ON COLUMN sskadminuser.old_drinkdirectorder_tbl.sensitive_type IS '敏感肌区分';
COMMENT ON COLUMN sskadminuser.old_drinkdirectorder_tbl.year_type IS '年号';
COMMENT ON COLUMN sskadminuser.old_drinkdirectorder_tbl.birthday IS '生年月日';
COMMENT ON COLUMN sskadminuser.old_drinkdirectorder_tbl.baitai_cd IS '媒体コード';
COMMENT ON COLUMN sskadminuser.old_drinkdirectorder_tbl.key_cd IS '検索キーワード';
COMMENT ON COLUMN sskadminuser.old_drinkdirectorder_tbl.dmflg IS 'DMフラグ';
COMMENT ON COLUMN sskadminuser.old_drinkdirectorder_tbl.dmmailflg IS 'DMメールフラグ';
COMMENT ON COLUMN sskadminuser.old_drinkdirectorder_tbl.m_email IS '携帯メールアドレス';
COMMENT ON COLUMN sskadminuser.old_drinkdirectorder_tbl.hada IS '敏感肌コメント';
COMMENT ON COLUMN sskadminuser.old_drinkdirectorder_tbl.shohin_cd01 IS '商品コード01';
COMMENT ON COLUMN sskadminuser.old_drinkdirectorder_tbl.order_count01 IS '注文数01';
COMMENT ON COLUMN sskadminuser.old_drinkdirectorder_tbl.shohin_cd02 IS '商品コード02';
COMMENT ON COLUMN sskadminuser.old_drinkdirectorder_tbl.order_count02 IS '注文数02';
COMMENT ON COLUMN sskadminuser.old_drinkdirectorder_tbl.shohin_cd03 IS '商品コード03';
COMMENT ON COLUMN sskadminuser.old_drinkdirectorder_tbl.order_count03 IS '注文数03';
COMMENT ON COLUMN sskadminuser.old_drinkdirectorder_tbl.shohin_cd04 IS '商品コード04';
COMMENT ON COLUMN sskadminuser.old_drinkdirectorder_tbl.order_count04 IS '注文数04';
COMMENT ON COLUMN sskadminuser.old_drinkdirectorder_tbl.shohin_cd05 IS '商品コード05';
COMMENT ON COLUMN sskadminuser.old_drinkdirectorder_tbl.order_count05 IS '注文数05';
COMMENT ON COLUMN sskadminuser.old_drinkdirectorder_tbl.shohin_cd06 IS '商品コード06';
COMMENT ON COLUMN sskadminuser.old_drinkdirectorder_tbl.order_count06 IS '注文数06';
COMMENT ON COLUMN sskadminuser.old_drinkdirectorder_tbl.shohin_cd07 IS '商品コード07';
COMMENT ON COLUMN sskadminuser.old_drinkdirectorder_tbl.order_count07 IS '注文数07';
COMMENT ON COLUMN sskadminuser.old_drinkdirectorder_tbl.shohin_cd08 IS '商品コード08';
COMMENT ON COLUMN sskadminuser.old_drinkdirectorder_tbl.order_count08 IS '注文数08';
COMMENT ON COLUMN sskadminuser.old_drinkdirectorder_tbl.shohin_cd09 IS '商品コード09';
COMMENT ON COLUMN sskadminuser.old_drinkdirectorder_tbl.order_count09 IS '注文数09';
COMMENT ON COLUMN sskadminuser.old_drinkdirectorder_tbl.shohin_cd10 IS '商品コード10';
COMMENT ON COLUMN sskadminuser.old_drinkdirectorder_tbl.order_count10 IS '注文数10';
COMMENT ON COLUMN sskadminuser.old_drinkdirectorder_tbl.shohin_cd11 IS '商品コード11';
COMMENT ON COLUMN sskadminuser.old_drinkdirectorder_tbl.order_count11 IS '注文数11';
COMMENT ON COLUMN sskadminuser.old_drinkdirectorder_tbl.shohin_cd12 IS '商品コード12';
COMMENT ON COLUMN sskadminuser.old_drinkdirectorder_tbl.order_count12 IS '注文数12';
COMMENT ON COLUMN sskadminuser.old_drinkdirectorder_tbl.shohin_cd13 IS '商品コード13';
COMMENT ON COLUMN sskadminuser.old_drinkdirectorder_tbl.order_count13 IS '注文数13';
COMMENT ON COLUMN sskadminuser.old_drinkdirectorder_tbl.shohin_cd14 IS '商品コード14';
COMMENT ON COLUMN sskadminuser.old_drinkdirectorder_tbl.order_count14 IS '注文数14';
COMMENT ON COLUMN sskadminuser.old_drinkdirectorder_tbl.shohin_cd15 IS '商品コード15';
COMMENT ON COLUMN sskadminuser.old_drinkdirectorder_tbl.order_count15 IS '注文数15';
COMMENT ON COLUMN sskadminuser.old_drinkdirectorder_tbl.shohin_cd16 IS '商品コード16';
COMMENT ON COLUMN sskadminuser.old_drinkdirectorder_tbl.order_count16 IS '注文数16';
COMMENT ON COLUMN sskadminuser.old_drinkdirectorder_tbl.shohin_cd17 IS '商品コード17';
COMMENT ON COLUMN sskadminuser.old_drinkdirectorder_tbl.order_count17 IS '注文数17';
COMMENT ON COLUMN sskadminuser.old_drinkdirectorder_tbl.shohin_cd18 IS '商品コード18';
COMMENT ON COLUMN sskadminuser.old_drinkdirectorder_tbl.order_count18 IS '注文数18';
COMMENT ON COLUMN sskadminuser.old_drinkdirectorder_tbl.shohin_cd19 IS '商品コード19';
COMMENT ON COLUMN sskadminuser.old_drinkdirectorder_tbl.order_count19 IS '注文数19';
COMMENT ON COLUMN sskadminuser.old_drinkdirectorder_tbl.shohin_cd20 IS '商品コード20';
COMMENT ON COLUMN sskadminuser.old_drinkdirectorder_tbl.order_count20 IS '注文数20';
COMMENT ON COLUMN sskadminuser.old_drinkdirectorder_tbl.payment_type IS '支払い方法';
COMMENT ON COLUMN sskadminuser.old_drinkdirectorder_tbl.payment_num IS '支払い回数';
COMMENT ON COLUMN sskadminuser.old_drinkdirectorder_tbl.cc_type IS 'クレジット会社';
COMMENT ON COLUMN sskadminuser.old_drinkdirectorder_tbl.cc_no IS 'クレジットカード番号';
COMMENT ON COLUMN sskadminuser.old_drinkdirectorder_tbl.cc_term IS '有効期限';
COMMENT ON COLUMN sskadminuser.old_drinkdirectorder_tbl.recognition_no IS '承認番号';
COMMENT ON COLUMN sskadminuser.old_drinkdirectorder_tbl.delivery_dt IS '配送希望日';
COMMENT ON COLUMN sskadminuser.old_drinkdirectorder_tbl.delivery_time_type IS '配送時刻区分';
COMMENT ON COLUMN sskadminuser.old_drinkdirectorder_tbl.ship_caution_cd IS '発送注意コード';
COMMENT ON COLUMN sskadminuser.old_drinkdirectorder_tbl.another_addr_type IS '配送先区分';
COMMENT ON COLUMN sskadminuser.old_drinkdirectorder_tbl.another_addr IS 'その他住所';
COMMENT ON COLUMN sskadminuser.old_drinkdirectorder_tbl.another_addr_not_conv IS 'その他非変換部';
COMMENT ON COLUMN sskadminuser.old_drinkdirectorder_tbl.another_telno IS 'その他住所電話番号';
COMMENT ON COLUMN sskadminuser.old_drinkdirectorder_tbl.another_post_no IS 'その他住所郵便番号';
COMMENT ON COLUMN sskadminuser.old_drinkdirectorder_tbl.agree_flg IS '個人情報取扱同意フラグ';
COMMENT ON COLUMN sskadminuser.old_drinkdirectorder_tbl.mail_send_flg IS 'メール送信フラグ';
COMMENT ON COLUMN sskadminuser.old_drinkdirectorder_tbl.kainno IS '会員コード';
COMMENT ON COLUMN sskadminuser.old_drinkdirectorder_tbl.order_status IS '状態フラグ';
COMMENT ON COLUMN sskadminuser.old_drinkdirectorder_tbl.delete_flg IS '削除フラグ';
COMMENT ON COLUMN sskadminuser.old_drinkdirectorder_tbl.print_flg IS '受票出力';
COMMENT ON COLUMN sskadminuser.old_drinkdirectorder_tbl.host_result IS 'ホスト送信結果';
COMMENT ON COLUMN sskadminuser.old_drinkdirectorder_tbl.host_flg IS 'ホストフラグ';
COMMENT ON COLUMN sskadminuser.old_drinkdirectorder_tbl.sync_flg IS 'PC同期フラグ';
COMMENT ON COLUMN sskadminuser.old_drinkdirectorder_tbl.status IS 'ステータス';
COMMENT ON COLUMN sskadminuser.old_drinkdirectorder_tbl.mail_flg IS '発送メール送信フラグ';
COMMENT ON COLUMN sskadminuser.old_drinkdirectorder_tbl.communicator IS '対応者';
COMMENT ON COLUMN sskadminuser.old_drinkdirectorder_tbl.mail_send_dt IS 'お礼メール送信日';
COMMENT ON COLUMN sskadminuser.old_drinkdirectorder_tbl.ctrl_no IS 'お礼メール管理Ｎｏ';
COMMENT ON COLUMN sskadminuser.old_drinkdirectorder_tbl.mailteikei_flg IS 'メール定型フラグ';
COMMENT ON COLUMN sskadminuser.old_drinkdirectorder_tbl.session_id IS 'セッションID';
COMMENT ON COLUMN sskadminuser.old_drinkdirectorder_tbl.update_dt IS '更新日';
COMMENT ON COLUMN sskadminuser.old_drinkdirectorder_tbl.regist_dt IS '登録日';
COMMENT ON COLUMN sskadminuser.old_drinkdirectorder_tbl.update_user IS '最終更新者';
COMMENT ON COLUMN sskadminuser.old_drinkdirectorder_tbl.regist_user IS '登録者';
COMMENT ON COLUMN sskadminuser.old_drinkdirectorder_tbl.shohin_level01 IS '商品レベル01';
COMMENT ON COLUMN sskadminuser.old_drinkdirectorder_tbl.shohin_level02 IS '商品レベル02';
COMMENT ON COLUMN sskadminuser.old_drinkdirectorder_tbl.shohin_level03 IS '商品レベル03';
COMMENT ON COLUMN sskadminuser.old_drinkdirectorder_tbl.shohin_level04 IS '商品レベル04';
COMMENT ON COLUMN sskadminuser.old_drinkdirectorder_tbl.shohin_level05 IS '商品レベル05';
COMMENT ON COLUMN sskadminuser.old_drinkdirectorder_tbl.shohin_level06 IS '商品レベル06';
COMMENT ON COLUMN sskadminuser.old_drinkdirectorder_tbl.shohin_level07 IS '商品レベル07';
COMMENT ON COLUMN sskadminuser.old_drinkdirectorder_tbl.shohin_level08 IS '商品レベル08';
COMMENT ON COLUMN sskadminuser.old_drinkdirectorder_tbl.shohin_level09 IS '商品レベル09';
COMMENT ON COLUMN sskadminuser.old_drinkdirectorder_tbl.shohin_level10 IS '商品レベル10';
COMMENT ON COLUMN sskadminuser.old_drinkdirectorder_tbl.shohin_level11 IS '商品レベル11';
COMMENT ON COLUMN sskadminuser.old_drinkdirectorder_tbl.shohin_level12 IS '商品レベル12';
COMMENT ON COLUMN sskadminuser.old_drinkdirectorder_tbl.shohin_level13 IS '商品レベル13';
COMMENT ON COLUMN sskadminuser.old_drinkdirectorder_tbl.shohin_level14 IS '商品レベル14';
COMMENT ON COLUMN sskadminuser.old_drinkdirectorder_tbl.shohin_level15 IS '商品レベル15';
COMMENT ON COLUMN sskadminuser.old_drinkdirectorder_tbl.shohin_level16 IS '商品レベル16';
COMMENT ON COLUMN sskadminuser.old_drinkdirectorder_tbl.shohin_level17 IS '商品レベル17';
COMMENT ON COLUMN sskadminuser.old_drinkdirectorder_tbl.shohin_level18 IS '商品レベル18';
COMMENT ON COLUMN sskadminuser.old_drinkdirectorder_tbl.shohin_level19 IS '商品レベル19';
COMMENT ON COLUMN sskadminuser.old_drinkdirectorder_tbl.shohin_level20 IS '商品レベル20';
COMMENT ON COLUMN sskadminuser.old_drinkdirectorder_tbl.cc_name IS 'クレジットカード名義人';
COMMENT ON COLUMN sskadminuser.old_drinkdirectorder_tbl.cc_scd IS 'セキュリティコード';
COMMENT ON COLUMN sskadminuser.old_drinkdirectorder_tbl.baitai_name IS '媒体名称';
COMMENT ON COLUMN sskadminuser.old_drinkdirectorder_tbl.q_aftercare IS '質問：アフターケア';
COMMENT ON COLUMN sskadminuser.old_drinkdirectorder_tbl.q_baitai_cd IS '質問：お申し込みのきっかけ（媒体コード）';
COMMENT ON COLUMN sskadminuser.old_drinkdirectorder_tbl.q_baitai_name IS '質問：お申し込みのきっかけ（媒体名称）';
COMMENT ON COLUMN sskadminuser.old_drinkdirectorder_tbl.q_first_hoped IS '質問：飲むドモホルンリンクルについて';
COMMENT ON COLUMN sskadminuser.old_drinkdirectorder_tbl.q_reason_type IS '質問：飲むドモホルンリンクルの購入理由について';
COMMENT ON COLUMN sskadminuser.old_drinkdirectorder_tbl.q_reason_comment IS '質問：飲むドモホルンリンクルの購入理由について（その他の理由）';
COMMENT ON COLUMN sskadminuser.old_drinkdirectorder_tbl.price01 IS '商品単価01';
COMMENT ON COLUMN sskadminuser.old_drinkdirectorder_tbl.price_taxrate01 IS '商品単価消費税01';
COMMENT ON COLUMN sskadminuser.old_drinkdirectorder_tbl.taxrate_id01 IS '税率ID01';
COMMENT ON COLUMN sskadminuser.old_drinkdirectorder_tbl.price02 IS '商品単価02';
COMMENT ON COLUMN sskadminuser.old_drinkdirectorder_tbl.price_taxrate02 IS '商品単価消費税02';
COMMENT ON COLUMN sskadminuser.old_drinkdirectorder_tbl.taxrate_id02 IS '税率ID02';
COMMENT ON COLUMN sskadminuser.old_drinkdirectorder_tbl.price03 IS '商品単価03';
COMMENT ON COLUMN sskadminuser.old_drinkdirectorder_tbl.price_taxrate03 IS '商品単価消費税03';
COMMENT ON COLUMN sskadminuser.old_drinkdirectorder_tbl.taxrate_id03 IS '税率ID03';
COMMENT ON COLUMN sskadminuser.old_drinkdirectorder_tbl.price04 IS '商品単価04';
COMMENT ON COLUMN sskadminuser.old_drinkdirectorder_tbl.price_taxrate04 IS '商品単価消費税04';
COMMENT ON COLUMN sskadminuser.old_drinkdirectorder_tbl.taxrate_id04 IS '税率ID04';
COMMENT ON COLUMN sskadminuser.old_drinkdirectorder_tbl.price05 IS '商品単価05';
COMMENT ON COLUMN sskadminuser.old_drinkdirectorder_tbl.price_taxrate05 IS '商品単価消費税05';
COMMENT ON COLUMN sskadminuser.old_drinkdirectorder_tbl.taxrate_id05 IS '税率ID05';
COMMENT ON COLUMN sskadminuser.old_drinkdirectorder_tbl.price06 IS '商品単価06';
COMMENT ON COLUMN sskadminuser.old_drinkdirectorder_tbl.price_taxrate06 IS '商品単価消費税06';
COMMENT ON COLUMN sskadminuser.old_drinkdirectorder_tbl.taxrate_id06 IS '税率ID06';
COMMENT ON COLUMN sskadminuser.old_drinkdirectorder_tbl.price07 IS '商品単価07';
COMMENT ON COLUMN sskadminuser.old_drinkdirectorder_tbl.price_taxrate07 IS '商品単価消費税07';
COMMENT ON COLUMN sskadminuser.old_drinkdirectorder_tbl.taxrate_id07 IS '税率ID07';
COMMENT ON COLUMN sskadminuser.old_drinkdirectorder_tbl.price08 IS '商品単価08';
COMMENT ON COLUMN sskadminuser.old_drinkdirectorder_tbl.price_taxrate08 IS '商品単価消費税08';
COMMENT ON COLUMN sskadminuser.old_drinkdirectorder_tbl.taxrate_id08 IS '税率ID08';
COMMENT ON COLUMN sskadminuser.old_drinkdirectorder_tbl.price09 IS '商品単価09';
COMMENT ON COLUMN sskadminuser.old_drinkdirectorder_tbl.price_taxrate09 IS '商品単価消費税09';
COMMENT ON COLUMN sskadminuser.old_drinkdirectorder_tbl.taxrate_id09 IS '税率ID09';
COMMENT ON COLUMN sskadminuser.old_drinkdirectorder_tbl.price10 IS '商品単価10';
COMMENT ON COLUMN sskadminuser.old_drinkdirectorder_tbl.price_taxrate10 IS '商品単価消費税10';
COMMENT ON COLUMN sskadminuser.old_drinkdirectorder_tbl.taxrate_id10 IS '税率ID10';
COMMENT ON COLUMN sskadminuser.old_drinkdirectorder_tbl.price11 IS '商品単価11';
COMMENT ON COLUMN sskadminuser.old_drinkdirectorder_tbl.price_taxrate11 IS '商品単価消費税11';
COMMENT ON COLUMN sskadminuser.old_drinkdirectorder_tbl.taxrate_id11 IS '税率ID11';
COMMENT ON COLUMN sskadminuser.old_drinkdirectorder_tbl.price12 IS '商品単価12';
COMMENT ON COLUMN sskadminuser.old_drinkdirectorder_tbl.price_taxrate12 IS '商品単価消費税12';
COMMENT ON COLUMN sskadminuser.old_drinkdirectorder_tbl.taxrate_id12 IS '税率ID12';
COMMENT ON COLUMN sskadminuser.old_drinkdirectorder_tbl.price13 IS '商品単価13';
COMMENT ON COLUMN sskadminuser.old_drinkdirectorder_tbl.price_taxrate13 IS '商品単価消費税13';
COMMENT ON COLUMN sskadminuser.old_drinkdirectorder_tbl.taxrate_id13 IS '税率ID13';
COMMENT ON COLUMN sskadminuser.old_drinkdirectorder_tbl.price14 IS '商品単価14';
COMMENT ON COLUMN sskadminuser.old_drinkdirectorder_tbl.price_taxrate14 IS '商品単価消費税14';
COMMENT ON COLUMN sskadminuser.old_drinkdirectorder_tbl.taxrate_id14 IS '税率ID14';
COMMENT ON COLUMN sskadminuser.old_drinkdirectorder_tbl.price15 IS '商品単価15';
COMMENT ON COLUMN sskadminuser.old_drinkdirectorder_tbl.price_taxrate15 IS '商品単価消費税15';
COMMENT ON COLUMN sskadminuser.old_drinkdirectorder_tbl.taxrate_id15 IS '税率ID15';
COMMENT ON COLUMN sskadminuser.old_drinkdirectorder_tbl.price16 IS '商品単価16';
COMMENT ON COLUMN sskadminuser.old_drinkdirectorder_tbl.price_taxrate16 IS '商品単価消費税16';
COMMENT ON COLUMN sskadminuser.old_drinkdirectorder_tbl.taxrate_id16 IS '税率ID16';
COMMENT ON COLUMN sskadminuser.old_drinkdirectorder_tbl.price17 IS '商品単価17';
COMMENT ON COLUMN sskadminuser.old_drinkdirectorder_tbl.price_taxrate17 IS '商品単価消費税17';
COMMENT ON COLUMN sskadminuser.old_drinkdirectorder_tbl.taxrate_id17 IS '税率ID17';
COMMENT ON COLUMN sskadminuser.old_drinkdirectorder_tbl.price18 IS '商品単価18';
COMMENT ON COLUMN sskadminuser.old_drinkdirectorder_tbl.price_taxrate18 IS '商品単価消費税18';
COMMENT ON COLUMN sskadminuser.old_drinkdirectorder_tbl.taxrate_id18 IS '税率ID18';
COMMENT ON COLUMN sskadminuser.old_drinkdirectorder_tbl.price19 IS '商品単価19';
COMMENT ON COLUMN sskadminuser.old_drinkdirectorder_tbl.price_taxrate19 IS '商品単価消費税19';
COMMENT ON COLUMN sskadminuser.old_drinkdirectorder_tbl.taxrate_id19 IS '税率ID19';
COMMENT ON COLUMN sskadminuser.old_drinkdirectorder_tbl.price20 IS '商品単価20';
COMMENT ON COLUMN sskadminuser.old_drinkdirectorder_tbl.price_taxrate20 IS '商品単価消費税20';
COMMENT ON COLUMN sskadminuser.old_drinkdirectorder_tbl.taxrate_id20 IS '税率ID20';
COMMENT ON COLUMN sskadminuser.old_drinkdirectorder_tbl.total_order_amount IS '合計注文金額';
COMMENT ON COLUMN sskadminuser.old_drinkdirectorder_tbl.total_order_taxrate IS '合計注文消費税';
COMMENT ON COLUMN sskadminuser.old_drinkdirectorder_tbl.reduction_kbn IS '還元区分';
COMMENT ON COLUMN sskadminuser.old_drinkdirectorder_tbl.odrroutedtlkbn IS '経路詳細区分';
-- CREATE INDEX 
-- END TABLE : sskadminuser.old_drinkdirectorder_tbl  --

-- START TABLE : sskadminuser.old_domodirectorder_tbl  --
CREATE TABLE sskadminuser.old_domodirectorder_tbl(
direct_order_id VARCHAR(32) NOT NULL,
site_kbn CHAR(1) NOT NULL,
direct_dt TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL,
tel_no VARCHAR(64),
email VARCHAR(180),
dm_mail_flg CHAR(1),
host_dt TIMESTAMP(0) WITHOUT TIME ZONE,
host_time VARCHAR(8),
name_kana VARCHAR(92),
name_kanji VARCHAR(104),
year_type CHAR(1),
birthday VARCHAR(56),
gender CHAR(1),
post_no VARCHAR(8),
addr_kana VARCHAR(180),
addr_kanji VARCHAR(180),
addr_not_conv VARCHAR(124),
addr_not_conv_kana VARCHAR(124),
prefecture_cd CHAR(2),
job_cd CHAR(2),
baitai_cd VARCHAR(8),
baitai_name VARCHAR(50),
q_baitai_cd VARCHAR(8),
q_baitai_name VARCHAR(50),
q_aftercare CHAR(1),
q_first_hoped CHAR(1),
q_hada_comment VARCHAR(800),
q_hada_type CHAR(1),
q_reason_comment VARCHAR(800),
q_reason_type CHAR(1),
q_skin_type CHAR(1),
q_worry_type1 CHAR(2),
q_worry_type2 CHAR(2),
q_worry_type3 CHAR(2),
q_worry_type10 CHAR(2),
key_cd VARCHAR(6),
m_email VARCHAR(112),
shohin_cd01 VARCHAR(5),
shohin_level01 VARCHAR(2),
order_count01 INT,
price01 INT,
price_taxrate01 INT,
taxrate_id01 INT,
shohin_cd02 VARCHAR(5),
shohin_level02 VARCHAR(2),
order_count02 INT,
price02 INT,
price_taxrate02 INT,
taxrate_id02 INT,
shohin_cd03 VARCHAR(5),
shohin_level03 VARCHAR(2),
order_count03 INT,
price03 INT,
price_taxrate03 INT,
taxrate_id03 INT,
shohin_cd04 VARCHAR(5),
shohin_level04 VARCHAR(2),
order_count04 INT,
price04 INT,
price_taxrate04 INT,
taxrate_id04 INT,
shohin_cd05 VARCHAR(5),
shohin_level05 VARCHAR(2),
order_count05 INT,
price05 INT,
price_taxrate05 INT,
taxrate_id05 INT,
shohin_cd06 VARCHAR(5),
shohin_level06 VARCHAR(2),
order_count06 INT,
price06 INT,
price_taxrate06 INT,
taxrate_id06 INT,
shohin_cd07 VARCHAR(5),
shohin_level07 VARCHAR(2),
order_count07 INT,
price07 INT,
price_taxrate07 INT,
taxrate_id07 INT,
shohin_cd08 VARCHAR(5),
shohin_level08 VARCHAR(2),
order_count08 INT,
price08 INT,
price_taxrate08 INT,
taxrate_id08 INT,
shohin_cd09 VARCHAR(5),
shohin_level09 VARCHAR(2),
order_count09 INT,
price09 INT,
price_taxrate09 INT,
taxrate_id09 INT,
shohin_cd10 VARCHAR(5),
shohin_level10 VARCHAR(2),
order_count10 INT,
price10 INT,
price_taxrate10 INT,
taxrate_id10 INT,
shohin_cd11 VARCHAR(5),
shohin_level11 VARCHAR(2),
order_count11 INT,
price11 INT,
price_taxrate11 INT,
taxrate_id11 INT,
shohin_cd12 VARCHAR(5),
shohin_level12 VARCHAR(2),
order_count12 INT,
price12 INT,
price_taxrate12 INT,
taxrate_id12 INT,
shohin_cd13 VARCHAR(5),
shohin_level13 VARCHAR(2),
order_count13 INT,
price13 INT,
price_taxrate13 INT,
taxrate_id13 INT,
shohin_cd14 VARCHAR(5),
shohin_level14 VARCHAR(2),
order_count14 INT,
price14 INT,
price_taxrate14 INT,
taxrate_id14 INT,
shohin_cd15 VARCHAR(5),
shohin_level15 VARCHAR(2),
order_count15 INT,
price15 INT,
price_taxrate15 INT,
taxrate_id15 INT,
shohin_cd16 VARCHAR(5),
shohin_level16 VARCHAR(2),
order_count16 INT,
price16 INT,
price_taxrate16 INT,
taxrate_id16 INT,
shohin_cd17 VARCHAR(5),
shohin_level17 VARCHAR(2),
order_count17 INT,
price17 INT,
price_taxrate17 INT,
taxrate_id17 INT,
shohin_cd18 VARCHAR(5),
shohin_level18 VARCHAR(2),
order_count18 INT,
price18 INT,
price_taxrate18 INT,
taxrate_id18 INT,
shohin_cd19 VARCHAR(5),
shohin_level19 VARCHAR(2),
order_count19 INT,
price19 INT,
price_taxrate19 INT,
taxrate_id19 INT,
shohin_cd20 VARCHAR(5),
shohin_level20 VARCHAR(2),
order_count20 INT,
price20 INT,
price_taxrate20 INT,
taxrate_id20 INT,
shohin_cd21 VARCHAR(5),
shohin_level21 VARCHAR(2),
order_count21 INT,
price21 INT,
price_taxrate21 INT,
taxrate_id21 INT,
shohin_cd22 VARCHAR(5),
shohin_level22 VARCHAR(2),
order_count22 INT,
price22 INT,
price_taxrate22 INT,
taxrate_id22 INT,
shohin_cd23 VARCHAR(5),
shohin_level23 VARCHAR(2),
order_count23 INT,
price23 INT,
price_taxrate23 INT,
taxrate_id23 INT,
shohin_cd24 VARCHAR(5),
shohin_level24 VARCHAR(2),
order_count24 INT,
price24 INT,
price_taxrate24 INT,
taxrate_id24 INT,
shohin_cd25 VARCHAR(5),
shohin_level25 VARCHAR(2),
order_count25 INT,
price25 INT,
price_taxrate25 INT,
taxrate_id25 INT,
shohin_cd26 VARCHAR(5),
shohin_level26 VARCHAR(2),
order_count26 INT,
price26 INT,
price_taxrate26 INT,
taxrate_id26 INT,
shohin_cd27 VARCHAR(5),
shohin_level27 VARCHAR(2),
order_count27 INT,
price27 INT,
price_taxrate27 INT,
taxrate_id27 INT,
shohin_cd28 VARCHAR(5),
shohin_level28 VARCHAR(2),
order_count28 INT,
price28 INT,
price_taxrate28 INT,
taxrate_id28 INT,
shohin_cd29 VARCHAR(5),
shohin_level29 VARCHAR(2),
order_count29 INT,
price29 INT,
price_taxrate29 INT,
taxrate_id29 INT,
shohin_cd30 VARCHAR(5),
shohin_level30 VARCHAR(2),
order_count30 INT,
price30 INT,
price_taxrate30 INT,
taxrate_id30 INT,
shohin_cd31 VARCHAR(5),
shohin_level31 VARCHAR(2),
order_count31 INT,
price31 INT,
price_taxrate31 INT,
taxrate_id31 INT,
shohin_cd32 VARCHAR(5),
shohin_level32 VARCHAR(2),
order_count32 INT,
price32 INT,
price_taxrate32 INT,
taxrate_id32 INT,
shohin_cd33 VARCHAR(5),
shohin_level33 VARCHAR(2),
order_count33 INT,
price33 INT,
price_taxrate33 INT,
taxrate_id33 INT,
shohin_cd34 VARCHAR(5),
shohin_level34 VARCHAR(2),
order_count34 INT,
price34 INT,
price_taxrate34 INT,
taxrate_id34 INT,
shohin_cd35 VARCHAR(5),
shohin_level35 VARCHAR(2),
order_count35 INT,
price35 INT,
price_taxrate35 INT,
taxrate_id35 INT,
shohin_cd36 VARCHAR(5),
shohin_level36 VARCHAR(2),
order_count36 INT,
price36 INT,
price_taxrate36 INT,
taxrate_id36 INT,
shohin_cd37 VARCHAR(5),
shohin_level37 VARCHAR(2),
order_count37 INT,
price37 INT,
price_taxrate37 INT,
taxrate_id37 INT,
shohin_cd38 VARCHAR(5),
shohin_level38 VARCHAR(2),
order_count38 INT,
price38 INT,
price_taxrate38 INT,
taxrate_id38 INT,
shohin_cd39 VARCHAR(5),
shohin_level39 VARCHAR(2),
order_count39 INT,
price39 INT,
price_taxrate39 INT,
taxrate_id39 INT,
shohin_cd40 VARCHAR(5),
shohin_level40 VARCHAR(2),
order_count40 INT,
price40 INT,
price_taxrate40 INT,
taxrate_id40 INT,
total_order_amount INT,
total_order_taxrate INT,
payment_type CHAR(2),
payment_num CHAR(2),
cc_type CHAR(2),
cc_no CHAR(68),
cc_term CHAR(6),
cc_name VARCHAR(84),
cc_scd VARCHAR(52),
recognition_no CHAR(6),
delivery_dt TIMESTAMP(0) WITHOUT TIME ZONE,
delivery_time_type CHAR(2),
ship_caution_cd CHAR(6),
another_addr_type CHAR(1),
another_addr VARCHAR(180),
another_addr_not_conv VARCHAR(124),
another_telno VARCHAR(64),
another_post_no VARCHAR(8),
agree_flg CHAR(1),
mail_send_flg CHAR(1),
overlap_flg CHAR(1) NOT NULL,
kainno CHAR(8) NOT NULL,
order_status CHAR(1) NOT NULL,
delete_flg CHAR(1) NOT NULL,
print_flg CHAR(1) NOT NULL,
host_result CHAR(1),
host_flg CHAR(3) NOT NULL,
sync_flg CHAR(1) NOT NULL,
status INT NOT NULL,
mail_flg CHAR(1) NOT NULL,
communicator VARCHAR(10),
mail_send_dt TIMESTAMP(0) WITHOUT TIME ZONE,
ctrl_no INT,
mailteikei_flg CHAR(1),
session_id VARCHAR(50),
update_dt TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL,
regist_dt TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL,
update_user VARCHAR(64) NOT NULL,
regist_user VARCHAR(64) NOT NULL,
reduction_kbn CHAR(2),
odrroutedtlkbn CHAR(2),
regularorder_flg CHAR(1),
regularorder_shohin_cd01 VARCHAR(5),
regularorder_shohin_level01 VARCHAR(2),
regularorder_order_count01 INT,
regularorder_price01 INT,
regularorder_price_taxrate01 INT,
regularorder_taxrate_id01 INT,
regularorder_shohin_cd02 VARCHAR(5),
regularorder_shohin_level02 VARCHAR(2),
regularorder_order_count02 INT,
regularorder_price02 INT,
regularorder_price_taxrate02 INT,
regularorder_taxrate_id02 INT,
regularorder_shohin_cd03 VARCHAR(5),
regularorder_shohin_level03 VARCHAR(2),
regularorder_order_count03 INT,
regularorder_price03 INT,
regularorder_price_taxrate03 INT,
regularorder_taxrate_id03 INT,
regularorder_shohin_cd04 VARCHAR(5),
regularorder_shohin_level04 VARCHAR(2),
regularorder_order_count04 INT,
regularorder_price04 INT,
regularorder_price_taxrate04 INT,
regularorder_taxrate_id04 INT,
regularorder_shohin_cd05 VARCHAR(5),
regularorder_shohin_level05 VARCHAR(2),
regularorder_order_count05 INT,
regularorder_price05 INT,
regularorder_price_taxrate05 INT,
regularorder_taxrate_id05 INT,
delivery_interval_type CHAR(2),
next_delivery_dt CHAR(2),
next_delivery_week CHAR(2),
next_delivery_day CHAR(2),
optin_flg CHAR(1),
harb_optin_flg CHAR(1),
indivnamesender_flg CHAR(3),
CONSTRAINT pk_old_domodirectorder_tbl PRIMARY KEY (direct_order_id)
);
-- ADD COLUMN
COMMENT ON TABLE sskadminuser.old_domodirectorder_tbl IS '（後日削除）旧一般注文テーブル（ドモホルンリンクル）';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.direct_order_id IS 'ID';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.site_kbn IS 'サイト区分';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.direct_dt IS '受付日時';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.tel_no IS '電話番号';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.email IS 'メールアドレス';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.dm_mail_flg IS 'DM的メールフラグ';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.host_dt IS 'ホスト受付日付';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.host_time IS 'ホスト受付時刻';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.name_kana IS 'カナ氏名';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.name_kanji IS '漢字氏名';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.year_type IS '年号';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.birthday IS '生年月日';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.gender IS '性別';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.post_no IS '郵便番号';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.addr_kana IS 'カナ住所';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.addr_kanji IS '漢字住所';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.addr_not_conv IS '住所非変換部';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.addr_not_conv_kana IS '住所非変換部';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.prefecture_cd IS '県コード';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.job_cd IS '職業コード';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.baitai_cd IS '媒体コード';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.baitai_name IS '媒体名称';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.q_baitai_cd IS '質問：お申し込みのきっかけ（媒体コード）';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.q_baitai_name IS '質問：お申し込みのきっかけ（媒体名称）';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.q_aftercare IS 'Q_AFTERCARE';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.q_first_hoped IS 'Q_FIRST_HOPED';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.q_hada_comment IS 'Q_HADA_COMMENT';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.q_hada_type IS 'Q_HADA_TYPE';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.q_reason_comment IS 'Q_REASON_COMMENT';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.q_reason_type IS 'Q_REASON_TYPE';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.q_skin_type IS 'Q_SKIN_TYPE';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.q_worry_type1 IS 'Q_WORRY_TYPE1';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.q_worry_type2 IS 'Q_WORRY_TYPE2';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.q_worry_type3 IS 'Q_WORRY_TYPE3';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.q_worry_type10 IS 'Q_WORRY_TYPE10';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.key_cd IS '検索キーワード';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.m_email IS '携帯メールアドレス';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.shohin_cd01 IS '商品コード01';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.shohin_level01 IS '商品レベル01';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.order_count01 IS '注文数01';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.price01 IS '商品単価01';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.price_taxrate01 IS '商品単価消費税01';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.taxrate_id01 IS '税率ID01';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.shohin_cd02 IS '商品コード02';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.shohin_level02 IS '商品レベル02';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.order_count02 IS '注文数02';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.price02 IS '商品単価02';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.price_taxrate02 IS '商品単価消費税02';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.taxrate_id02 IS '税率ID02';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.shohin_cd03 IS '商品コード03';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.shohin_level03 IS '商品レベル03';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.order_count03 IS '注文数03';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.price03 IS '商品単価03';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.price_taxrate03 IS '商品単価消費税03';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.taxrate_id03 IS '税率ID03';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.shohin_cd04 IS '商品コード04';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.shohin_level04 IS '商品レベル04';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.order_count04 IS '注文数04';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.price04 IS '商品単価04';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.price_taxrate04 IS '商品単価消費税04';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.taxrate_id04 IS '税率ID04';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.shohin_cd05 IS '商品コード05';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.shohin_level05 IS '商品レベル05';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.order_count05 IS '注文数05';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.price05 IS '商品単価05';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.price_taxrate05 IS '商品単価消費税05';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.taxrate_id05 IS '税率ID05';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.shohin_cd06 IS '商品コード06';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.shohin_level06 IS '商品レベル06';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.order_count06 IS '注文数06';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.price06 IS '商品単価06';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.price_taxrate06 IS '商品単価消費税06';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.taxrate_id06 IS '税率ID06';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.shohin_cd07 IS '商品コード07';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.shohin_level07 IS '商品レベル07';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.order_count07 IS '注文数07';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.price07 IS '商品単価07';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.price_taxrate07 IS '商品単価消費税07';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.taxrate_id07 IS '税率ID07';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.shohin_cd08 IS '商品コード08';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.shohin_level08 IS '商品レベル08';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.order_count08 IS '注文数08';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.price08 IS '商品単価08';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.price_taxrate08 IS '商品単価消費税08';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.taxrate_id08 IS '税率ID08';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.shohin_cd09 IS '商品コード09';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.shohin_level09 IS '商品レベル09';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.order_count09 IS '注文数09';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.price09 IS '商品単価09';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.price_taxrate09 IS '商品単価消費税09';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.taxrate_id09 IS '税率ID09';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.shohin_cd10 IS '商品コード10';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.shohin_level10 IS '商品レベル10';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.order_count10 IS '注文数10';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.price10 IS '商品単価10';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.price_taxrate10 IS '商品単価消費税10';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.taxrate_id10 IS '税率ID10';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.shohin_cd11 IS '商品コード11';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.shohin_level11 IS '商品レベル11';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.order_count11 IS '注文数11';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.price11 IS '商品単価11';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.price_taxrate11 IS '商品単価消費税11';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.taxrate_id11 IS '税率ID11';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.shohin_cd12 IS '商品コード12';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.shohin_level12 IS '商品レベル12';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.order_count12 IS '注文数12';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.price12 IS '商品単価12';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.price_taxrate12 IS '商品単価消費税12';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.taxrate_id12 IS '税率ID12';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.shohin_cd13 IS '商品コード13';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.shohin_level13 IS '商品レベル13';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.order_count13 IS '注文数13';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.price13 IS '商品単価13';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.price_taxrate13 IS '商品単価消費税13';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.taxrate_id13 IS '税率ID13';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.shohin_cd14 IS '商品コード14';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.shohin_level14 IS '商品レベル14';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.order_count14 IS '注文数14';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.price14 IS '商品単価14';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.price_taxrate14 IS '商品単価消費税14';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.taxrate_id14 IS '税率ID14';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.shohin_cd15 IS '商品コード15';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.shohin_level15 IS '商品レベル15';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.order_count15 IS '注文数15';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.price15 IS '商品単価15';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.price_taxrate15 IS '商品単価消費税15';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.taxrate_id15 IS '税率ID15';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.shohin_cd16 IS '商品コード16';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.shohin_level16 IS '商品レベル16';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.order_count16 IS '注文数16';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.price16 IS '商品単価16';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.price_taxrate16 IS '商品単価消費税16';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.taxrate_id16 IS '税率ID16';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.shohin_cd17 IS '商品コード17';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.shohin_level17 IS '商品レベル17';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.order_count17 IS '注文数17';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.price17 IS '商品単価17';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.price_taxrate17 IS '商品単価消費税17';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.taxrate_id17 IS '税率ID17';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.shohin_cd18 IS '商品コード18';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.shohin_level18 IS '商品レベル18';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.order_count18 IS '注文数18';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.price18 IS '商品単価18';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.price_taxrate18 IS '商品単価消費税18';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.taxrate_id18 IS '税率ID18';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.shohin_cd19 IS '商品コード19';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.shohin_level19 IS '商品レベル19';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.order_count19 IS '注文数19';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.price19 IS '商品単価19';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.price_taxrate19 IS '商品単価消費税19';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.taxrate_id19 IS '税率ID19';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.shohin_cd20 IS '商品コード20';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.shohin_level20 IS '商品レベル20';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.order_count20 IS '注文数20';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.price20 IS '商品単価20';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.price_taxrate20 IS '商品単価消費税20';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.taxrate_id20 IS '税率ID20';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.shohin_cd21 IS '商品コード21';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.shohin_level21 IS '商品レベル21';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.order_count21 IS '注文数21';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.price21 IS '商品単価21';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.price_taxrate21 IS '商品単価消費税21';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.taxrate_id21 IS '税率ID21';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.shohin_cd22 IS '商品コード22';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.shohin_level22 IS '商品レベル22';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.order_count22 IS '注文数22';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.price22 IS '商品単価22';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.price_taxrate22 IS '商品単価消費税22';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.taxrate_id22 IS '税率ID22';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.shohin_cd23 IS '商品コード23';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.shohin_level23 IS '商品レベル23';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.order_count23 IS '注文数23';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.price23 IS '商品単価23';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.price_taxrate23 IS '商品単価消費税23';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.taxrate_id23 IS '税率ID23';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.shohin_cd24 IS '商品コード24';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.shohin_level24 IS '商品レベル24';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.order_count24 IS '注文数24';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.price24 IS '商品単価24';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.price_taxrate24 IS '商品単価消費税24';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.taxrate_id24 IS '税率ID24';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.shohin_cd25 IS '商品コード25';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.shohin_level25 IS '商品レベル25';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.order_count25 IS '注文数25';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.price25 IS '商品単価25';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.price_taxrate25 IS '商品単価消費税25';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.taxrate_id25 IS '税率ID25';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.shohin_cd26 IS '商品コード26';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.shohin_level26 IS '商品レベル26';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.order_count26 IS '注文数26';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.price26 IS '商品単価26';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.price_taxrate26 IS '商品単価消費税26';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.taxrate_id26 IS '税率ID26';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.shohin_cd27 IS '商品コード27';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.shohin_level27 IS '商品レベル27';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.order_count27 IS '注文数27';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.price27 IS '商品単価27';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.price_taxrate27 IS '商品単価消費税27';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.taxrate_id27 IS '税率ID27';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.shohin_cd28 IS '商品コード28';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.shohin_level28 IS '商品レベル28';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.order_count28 IS '注文数28';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.price28 IS '商品単価28';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.price_taxrate28 IS '商品単価消費税28';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.taxrate_id28 IS '税率ID28';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.shohin_cd29 IS '商品コード29';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.shohin_level29 IS '商品レベル29';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.order_count29 IS '注文数29';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.price29 IS '商品単価29';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.price_taxrate29 IS '商品単価消費税29';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.taxrate_id29 IS '税率ID29';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.shohin_cd30 IS '商品コード30';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.shohin_level30 IS '商品レベル30';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.order_count30 IS '注文数30';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.price30 IS '商品単価30';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.price_taxrate30 IS '商品単価消費税30';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.taxrate_id30 IS '税率ID30';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.shohin_cd31 IS '商品コード31';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.shohin_level31 IS '商品レベル31';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.order_count31 IS '注文数31';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.price31 IS '商品単価31';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.price_taxrate31 IS '商品単価消費税31';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.taxrate_id31 IS '税率ID31';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.shohin_cd32 IS '商品コード32';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.shohin_level32 IS '商品レベル32';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.order_count32 IS '注文数32';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.price32 IS '商品単価32';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.price_taxrate32 IS '商品単価消費税32';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.taxrate_id32 IS '税率ID32';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.shohin_cd33 IS '商品コード33';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.shohin_level33 IS '商品レベル33';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.order_count33 IS '注文数33';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.price33 IS '商品単価33';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.price_taxrate33 IS '商品単価消費税33';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.taxrate_id33 IS '税率ID33';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.shohin_cd34 IS '商品コード34';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.shohin_level34 IS '商品レベル34';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.order_count34 IS '注文数34';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.price34 IS '商品単価34';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.price_taxrate34 IS '商品単価消費税34';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.taxrate_id34 IS '税率ID34';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.shohin_cd35 IS '商品コード35';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.shohin_level35 IS '商品レベル35';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.order_count35 IS '注文数35';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.price35 IS '商品単価35';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.price_taxrate35 IS '商品単価消費税35';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.taxrate_id35 IS '税率ID35';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.shohin_cd36 IS '商品コード36';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.shohin_level36 IS '商品レベル36';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.order_count36 IS '注文数36';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.price36 IS '商品単価36';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.price_taxrate36 IS '商品単価消費税36';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.taxrate_id36 IS '税率ID36';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.shohin_cd37 IS '商品コード37';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.shohin_level37 IS '商品レベル37';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.order_count37 IS '注文数37';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.price37 IS '商品単価37';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.price_taxrate37 IS '商品単価消費税37';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.taxrate_id37 IS '税率ID37';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.shohin_cd38 IS '商品コード38';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.shohin_level38 IS '商品レベル38';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.order_count38 IS '注文数38';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.price38 IS '商品単価38';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.price_taxrate38 IS '商品単価消費税38';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.taxrate_id38 IS '税率ID38';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.shohin_cd39 IS '商品コード39';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.shohin_level39 IS '商品レベル39';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.order_count39 IS '注文数39';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.price39 IS '商品単価39';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.price_taxrate39 IS '商品単価消費税39';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.taxrate_id39 IS '税率ID39';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.shohin_cd40 IS '商品コード40';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.shohin_level40 IS '商品レベル40';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.order_count40 IS '注文数40';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.price40 IS '商品単価40';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.price_taxrate40 IS '商品単価消費税40';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.taxrate_id40 IS '税率ID40';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.total_order_amount IS '合計注文金額';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.total_order_taxrate IS '合計注文消費税';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.payment_type IS '支払い方法';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.payment_num IS '支払い回数';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.cc_type IS 'クレジット会社';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.cc_no IS 'クレジットカード番号';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.cc_term IS '有効期限';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.cc_name IS 'クレジットカード名義人';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.cc_scd IS 'セキュリティコード';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.recognition_no IS '承認番号';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.delivery_dt IS '配送希望日';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.delivery_time_type IS '配送時刻区分';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.ship_caution_cd IS '発送注意コード';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.another_addr_type IS '配送先区分';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.another_addr IS 'その他住所';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.another_addr_not_conv IS 'その他非変換部';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.another_telno IS 'その他住所電話番号';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.another_post_no IS 'その他住所郵便番号';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.agree_flg IS '個人情報取扱同意フラグ';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.mail_send_flg IS 'メール送信フラグ';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.overlap_flg IS '重複フラグ';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.kainno IS '会員コード';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.order_status IS '状態フラグ';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.delete_flg IS '削除フラグ';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.print_flg IS '受票出力';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.host_result IS 'ホスト送信結果';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.host_flg IS 'ホストフラグ';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.sync_flg IS 'PC同期フラグ';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.status IS 'ステータス';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.mail_flg IS '発送メール送信フラグ';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.communicator IS '対応者';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.mail_send_dt IS 'お礼メール送信日';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.ctrl_no IS 'お礼メール管理Ｎｏ';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.mailteikei_flg IS 'メール定型フラグ';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.session_id IS 'セッションID';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.update_dt IS '更新日';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.regist_dt IS '登録日';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.update_user IS '最終更新者';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.regist_user IS '登録者';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.reduction_kbn IS '還元区分';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.odrroutedtlkbn IS '経路詳細区分';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.regularorder_flg IS '定期申込フラグ';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.regularorder_shohin_cd01 IS '定期商品コード1';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.regularorder_shohin_level01 IS '定期商品レベルコード1';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.regularorder_order_count01 IS '定期数量1';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.regularorder_price01 IS '定期商品価格1';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.regularorder_price_taxrate01 IS '定期商品消費税1';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.regularorder_taxrate_id01 IS '定期商品消費税ID1';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.regularorder_shohin_cd02 IS '定期商品コード2';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.regularorder_shohin_level02 IS '定期商品レベルコード2';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.regularorder_order_count02 IS '定期数量2';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.regularorder_price02 IS '定期商品価格2';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.regularorder_price_taxrate02 IS '定期商品消費税2';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.regularorder_taxrate_id02 IS '定期商品消費税ID2';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.regularorder_shohin_cd03 IS '定期商品コード3';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.regularorder_shohin_level03 IS '定期商品レベルコード3';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.regularorder_order_count03 IS '定期数量3';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.regularorder_price03 IS '定期商品価格3';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.regularorder_price_taxrate03 IS '定期商品消費税3';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.regularorder_taxrate_id03 IS '定期商品消費税ID3';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.regularorder_shohin_cd04 IS '定期商品コード4';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.regularorder_shohin_level04 IS '定期商品レベルコード4';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.regularorder_order_count04 IS '定期数量4';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.regularorder_price04 IS '定期商品価格4';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.regularorder_price_taxrate04 IS '定期商品消費税4';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.regularorder_taxrate_id04 IS '定期商品消費税ID4';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.regularorder_shohin_cd05 IS '定期商品コード5';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.regularorder_shohin_level05 IS '定期商品レベルコード5';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.regularorder_order_count05 IS '定期数量5';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.regularorder_price05 IS '定期商品価格5';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.regularorder_price_taxrate05 IS '定期商品消費税5';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.regularorder_taxrate_id05 IS '定期商品消費税ID5';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.delivery_interval_type IS '定期配送間隔区分';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.next_delivery_dt IS '定期配達指定日';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.next_delivery_week IS '定期配達指定週区分';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.next_delivery_day IS '定期配達指定曜日区分';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.optin_flg IS 'オプトイン（化粧品）';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.harb_optin_flg IS 'オプトイン（漢方）';
COMMENT ON COLUMN sskadminuser.old_domodirectorder_tbl.indivnamesender_flg IS '個人名発送フラグ';
-- CREATE INDEX 
-- END TABLE : sskadminuser.old_domodirectorder_tbl  --

-- START TABLE : sskadminuser.old_halfdirectorder_tbl  --
CREATE TABLE sskadminuser.old_halfdirectorder_tbl(
direct_order_id VARCHAR(32) NOT NULL,
site_kbn CHAR(1) NOT NULL,
direct_dt TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL,
tel_no VARCHAR(64),
email VARCHAR(112),
host_dt TIMESTAMP(0) WITHOUT TIME ZONE,
host_time VARCHAR(8),
name_kana VARCHAR(92),
name_kanji VARCHAR(104),
year_type CHAR(1),
birthday VARCHAR(56),
gender CHAR(1),
post_no VARCHAR(8),
addr_kana VARCHAR(124),
addr_kanji VARCHAR(180),
addr_not_conv VARCHAR(124),
addr_not_conv_kana VARCHAR(124),
prefecture_cd CHAR(2),
job_cd CHAR(2),
baitai_cd VARCHAR(8),
baitai_name VARCHAR(50),
q_aftercare CHAR(1),
q_baitai_cd VARCHAR(8),
q_baitai_name VARCHAR(50),
q_first_hoped CHAR(1),
q_reason_type CHAR(1),
q_reason_comment VARCHAR(800),
q_worry_type1 CHAR(2),
q_worry_type2 CHAR(2),
q_worry_type3 CHAR(2),
q_worry_type10 CHAR(2),
q_skin_type CHAR(1),
q_hada_type CHAR(1),
q_hada_comment VARCHAR(800),
key_cd VARCHAR(6),
m_email VARCHAR(112),
shohin_cd01 VARCHAR(5),
shohin_level01 VARCHAR(2),
order_count01 INT,
shohin_cd02 VARCHAR(5),
shohin_level02 VARCHAR(2),
order_count02 INT,
shohin_cd03 VARCHAR(5),
shohin_level03 VARCHAR(2),
order_count03 INT,
shohin_cd04 VARCHAR(5),
shohin_level04 VARCHAR(2),
order_count04 INT,
shohin_cd05 VARCHAR(5),
shohin_level05 VARCHAR(2),
order_count05 INT,
shohin_cd06 VARCHAR(5),
shohin_level06 VARCHAR(2),
order_count06 INT,
shohin_cd07 VARCHAR(5),
shohin_level07 VARCHAR(2),
order_count07 INT,
shohin_cd08 VARCHAR(5),
shohin_level08 VARCHAR(2),
order_count08 INT,
shohin_cd09 VARCHAR(5),
shohin_level09 VARCHAR(2),
order_count09 INT,
shohin_cd10 VARCHAR(5),
shohin_level10 VARCHAR(2),
order_count10 INT,
shohin_cd11 VARCHAR(5),
shohin_level11 VARCHAR(2),
order_count11 INT,
shohin_cd12 VARCHAR(5),
shohin_level12 VARCHAR(2),
order_count12 INT,
shohin_cd13 VARCHAR(5),
shohin_level13 VARCHAR(2),
order_count13 INT,
shohin_cd14 VARCHAR(5),
shohin_level14 VARCHAR(2),
order_count14 INT,
shohin_cd15 VARCHAR(5),
shohin_level15 VARCHAR(2),
order_count15 INT,
shohin_cd16 VARCHAR(5),
shohin_level16 VARCHAR(2),
order_count16 INT,
shohin_cd17 VARCHAR(5),
shohin_level17 VARCHAR(2),
order_count17 INT,
shohin_cd18 VARCHAR(5),
shohin_level18 VARCHAR(2),
order_count18 INT,
shohin_cd19 VARCHAR(5),
shohin_level19 VARCHAR(2),
order_count19 INT,
shohin_cd20 VARCHAR(5),
shohin_level20 VARCHAR(2),
order_count20 INT,
payment_type CHAR(2),
payment_num CHAR(2),
cc_type CHAR(2),
cc_no CHAR(68),
cc_term CHAR(6),
recognition_no CHAR(6),
delivery_dt TIMESTAMP(0) WITHOUT TIME ZONE,
delivery_time_type CHAR(2),
ship_caution_cd CHAR(6),
another_addr_type CHAR(1),
another_addr VARCHAR(180),
another_addr_not_conv VARCHAR(124),
another_telno VARCHAR(64),
another_post_no VARCHAR(8),
agree_flg CHAR(1),
mail_send_flg CHAR(1),
overlap_flg CHAR(1) NOT NULL,
kainno CHAR(8) NOT NULL,
order_status CHAR(1) NOT NULL,
delete_flg CHAR(1) NOT NULL,
print_flg CHAR(1) NOT NULL,
host_result CHAR(1),
host_flg CHAR(3) NOT NULL,
sync_flg CHAR(1) NOT NULL,
status INT NOT NULL,
mail_flg CHAR(1) NOT NULL,
communicator VARCHAR(10),
mail_send_dt TIMESTAMP(0) WITHOUT TIME ZONE,
ctrl_no INT,
mailteikei_flg CHAR(1),
session_id VARCHAR(50),
update_dt TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL,
regist_dt TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL,
update_user VARCHAR(64) NOT NULL,
regist_user VARCHAR(64) NOT NULL,
cc_name VARCHAR(84),
cc_scd VARCHAR(52),
price01 INT,
price_taxrate01 INT,
taxrate_id01 INT,
price02 INT,
price_taxrate02 INT,
taxrate_id02 INT,
price03 INT,
price_taxrate03 INT,
taxrate_id03 INT,
price04 INT,
price_taxrate04 INT,
taxrate_id04 INT,
price05 INT,
price_taxrate05 INT,
taxrate_id05 INT,
price06 INT,
price_taxrate06 INT,
taxrate_id06 INT,
price07 INT,
price_taxrate07 INT,
taxrate_id07 INT,
price08 INT,
price_taxrate08 INT,
taxrate_id08 INT,
price09 INT,
price_taxrate09 INT,
taxrate_id09 INT,
price10 INT,
price_taxrate10 INT,
taxrate_id10 INT,
price11 INT,
price_taxrate11 INT,
taxrate_id11 INT,
price12 INT,
price_taxrate12 INT,
taxrate_id12 INT,
price13 INT,
price_taxrate13 INT,
taxrate_id13 INT,
price14 INT,
price_taxrate14 INT,
taxrate_id14 INT,
price15 INT,
price_taxrate15 INT,
taxrate_id15 INT,
price16 INT,
price_taxrate16 INT,
taxrate_id16 INT,
price17 INT,
price_taxrate17 INT,
taxrate_id17 INT,
price18 INT,
price_taxrate18 INT,
taxrate_id18 INT,
price19 INT,
price_taxrate19 INT,
taxrate_id19 INT,
price20 INT,
price_taxrate20 INT,
taxrate_id20 INT,
total_order_amount INT,
total_order_taxrate INT,
reduction_kbn VARCHAR(2),
CONSTRAINT pk_old_halfdirectorder_tbl PRIMARY KEY (direct_order_id)
);
-- ADD COLUMN
COMMENT ON TABLE sskadminuser.old_halfdirectorder_tbl IS '（後日削除）旧一般注文テーブル（ハーフ）';
COMMENT ON COLUMN sskadminuser.old_halfdirectorder_tbl.direct_order_id IS 'ID';
COMMENT ON COLUMN sskadminuser.old_halfdirectorder_tbl.site_kbn IS 'サイト区分';
COMMENT ON COLUMN sskadminuser.old_halfdirectorder_tbl.direct_dt IS '受付日時';
COMMENT ON COLUMN sskadminuser.old_halfdirectorder_tbl.tel_no IS '電話番号';
COMMENT ON COLUMN sskadminuser.old_halfdirectorder_tbl.email IS 'メールアドレス';
COMMENT ON COLUMN sskadminuser.old_halfdirectorder_tbl.host_dt IS 'ホスト受付日付';
COMMENT ON COLUMN sskadminuser.old_halfdirectorder_tbl.host_time IS 'ホスト受付時刻';
COMMENT ON COLUMN sskadminuser.old_halfdirectorder_tbl.name_kana IS 'カナ氏名';
COMMENT ON COLUMN sskadminuser.old_halfdirectorder_tbl.name_kanji IS '漢字氏名';
COMMENT ON COLUMN sskadminuser.old_halfdirectorder_tbl.year_type IS '年号';
COMMENT ON COLUMN sskadminuser.old_halfdirectorder_tbl.birthday IS '生年月日';
COMMENT ON COLUMN sskadminuser.old_halfdirectorder_tbl.gender IS '性別';
COMMENT ON COLUMN sskadminuser.old_halfdirectorder_tbl.post_no IS '郵便番号';
COMMENT ON COLUMN sskadminuser.old_halfdirectorder_tbl.addr_kana IS 'カナ住所';
COMMENT ON COLUMN sskadminuser.old_halfdirectorder_tbl.addr_kanji IS '漢字住所';
COMMENT ON COLUMN sskadminuser.old_halfdirectorder_tbl.addr_not_conv IS '住所非変換部';
COMMENT ON COLUMN sskadminuser.old_halfdirectorder_tbl.addr_not_conv_kana IS '住所非変換部';
COMMENT ON COLUMN sskadminuser.old_halfdirectorder_tbl.prefecture_cd IS '県コード';
COMMENT ON COLUMN sskadminuser.old_halfdirectorder_tbl.job_cd IS '職業コード';
COMMENT ON COLUMN sskadminuser.old_halfdirectorder_tbl.baitai_cd IS '媒体コード';
COMMENT ON COLUMN sskadminuser.old_halfdirectorder_tbl.baitai_name IS '媒体名称';
COMMENT ON COLUMN sskadminuser.old_halfdirectorder_tbl.q_aftercare IS '質問：アフターケア';
COMMENT ON COLUMN sskadminuser.old_halfdirectorder_tbl.q_baitai_cd IS '質問：お申し込みのきっかけ（媒体コード）';
COMMENT ON COLUMN sskadminuser.old_halfdirectorder_tbl.q_baitai_name IS '質問：お申し込みのきっかけ（媒体名称）';
COMMENT ON COLUMN sskadminuser.old_halfdirectorder_tbl.q_first_hoped IS '質問：1ヵ月実感セットについて';
COMMENT ON COLUMN sskadminuser.old_halfdirectorder_tbl.q_reason_type IS '質問：1ヵ月実感セットの購入理由について';
COMMENT ON COLUMN sskadminuser.old_halfdirectorder_tbl.q_reason_comment IS '質問：1ヵ月実感セットの購入理由について（その他の理由）';
COMMENT ON COLUMN sskadminuser.old_halfdirectorder_tbl.q_worry_type1 IS '質問：悩みコード1';
COMMENT ON COLUMN sskadminuser.old_halfdirectorder_tbl.q_worry_type2 IS '質問：悩みコード2';
COMMENT ON COLUMN sskadminuser.old_halfdirectorder_tbl.q_worry_type3 IS '質問：悩みコード3';
COMMENT ON COLUMN sskadminuser.old_halfdirectorder_tbl.q_worry_type10 IS '質問：悩みコード10';
COMMENT ON COLUMN sskadminuser.old_halfdirectorder_tbl.q_skin_type IS '質問：肌質区分';
COMMENT ON COLUMN sskadminuser.old_halfdirectorder_tbl.q_hada_type IS '質問：敏感肌区分';
COMMENT ON COLUMN sskadminuser.old_halfdirectorder_tbl.q_hada_comment IS '質問：敏感肌コメント';
COMMENT ON COLUMN sskadminuser.old_halfdirectorder_tbl.key_cd IS '検索キーワード';
COMMENT ON COLUMN sskadminuser.old_halfdirectorder_tbl.m_email IS '携帯メールアドレス';
COMMENT ON COLUMN sskadminuser.old_halfdirectorder_tbl.shohin_cd01 IS '商品コード01';
COMMENT ON COLUMN sskadminuser.old_halfdirectorder_tbl.shohin_level01 IS '商品レベル01';
COMMENT ON COLUMN sskadminuser.old_halfdirectorder_tbl.order_count01 IS '注文数01';
COMMENT ON COLUMN sskadminuser.old_halfdirectorder_tbl.shohin_cd02 IS '商品コード02';
COMMENT ON COLUMN sskadminuser.old_halfdirectorder_tbl.shohin_level02 IS '商品レベル02';
COMMENT ON COLUMN sskadminuser.old_halfdirectorder_tbl.order_count02 IS '注文数02';
COMMENT ON COLUMN sskadminuser.old_halfdirectorder_tbl.shohin_cd03 IS '商品コード03';
COMMENT ON COLUMN sskadminuser.old_halfdirectorder_tbl.shohin_level03 IS '商品レベル03';
COMMENT ON COLUMN sskadminuser.old_halfdirectorder_tbl.order_count03 IS '注文数03';
COMMENT ON COLUMN sskadminuser.old_halfdirectorder_tbl.shohin_cd04 IS '商品コード04';
COMMENT ON COLUMN sskadminuser.old_halfdirectorder_tbl.shohin_level04 IS '商品レベル04';
COMMENT ON COLUMN sskadminuser.old_halfdirectorder_tbl.order_count04 IS '注文数04';
COMMENT ON COLUMN sskadminuser.old_halfdirectorder_tbl.shohin_cd05 IS '商品コード05';
COMMENT ON COLUMN sskadminuser.old_halfdirectorder_tbl.shohin_level05 IS '商品レベル05';
COMMENT ON COLUMN sskadminuser.old_halfdirectorder_tbl.order_count05 IS '注文数05';
COMMENT ON COLUMN sskadminuser.old_halfdirectorder_tbl.shohin_cd06 IS '商品コード06';
COMMENT ON COLUMN sskadminuser.old_halfdirectorder_tbl.shohin_level06 IS '商品レベル06';
COMMENT ON COLUMN sskadminuser.old_halfdirectorder_tbl.order_count06 IS '注文数06';
COMMENT ON COLUMN sskadminuser.old_halfdirectorder_tbl.shohin_cd07 IS '商品コード07';
COMMENT ON COLUMN sskadminuser.old_halfdirectorder_tbl.shohin_level07 IS '商品レベル07';
COMMENT ON COLUMN sskadminuser.old_halfdirectorder_tbl.order_count07 IS '注文数07';
COMMENT ON COLUMN sskadminuser.old_halfdirectorder_tbl.shohin_cd08 IS '商品コード08';
COMMENT ON COLUMN sskadminuser.old_halfdirectorder_tbl.shohin_level08 IS '商品レベル08';
COMMENT ON COLUMN sskadminuser.old_halfdirectorder_tbl.order_count08 IS '注文数08';
COMMENT ON COLUMN sskadminuser.old_halfdirectorder_tbl.shohin_cd09 IS '商品コード09';
COMMENT ON COLUMN sskadminuser.old_halfdirectorder_tbl.shohin_level09 IS '商品レベル09';
COMMENT ON COLUMN sskadminuser.old_halfdirectorder_tbl.order_count09 IS '注文数09';
COMMENT ON COLUMN sskadminuser.old_halfdirectorder_tbl.shohin_cd10 IS '商品コード10';
COMMENT ON COLUMN sskadminuser.old_halfdirectorder_tbl.shohin_level10 IS '商品レベル10';
COMMENT ON COLUMN sskadminuser.old_halfdirectorder_tbl.order_count10 IS '注文数10';
COMMENT ON COLUMN sskadminuser.old_halfdirectorder_tbl.shohin_cd11 IS '商品コード11';
COMMENT ON COLUMN sskadminuser.old_halfdirectorder_tbl.shohin_level11 IS '商品レベル11';
COMMENT ON COLUMN sskadminuser.old_halfdirectorder_tbl.order_count11 IS '注文数11';
COMMENT ON COLUMN sskadminuser.old_halfdirectorder_tbl.shohin_cd12 IS '商品コード12';
COMMENT ON COLUMN sskadminuser.old_halfdirectorder_tbl.shohin_level12 IS '商品レベル12';
COMMENT ON COLUMN sskadminuser.old_halfdirectorder_tbl.order_count12 IS '注文数12';
COMMENT ON COLUMN sskadminuser.old_halfdirectorder_tbl.shohin_cd13 IS '商品コード13';
COMMENT ON COLUMN sskadminuser.old_halfdirectorder_tbl.shohin_level13 IS '商品レベル13';
COMMENT ON COLUMN sskadminuser.old_halfdirectorder_tbl.order_count13 IS '注文数13';
COMMENT ON COLUMN sskadminuser.old_halfdirectorder_tbl.shohin_cd14 IS '商品コード14';
COMMENT ON COLUMN sskadminuser.old_halfdirectorder_tbl.shohin_level14 IS '商品レベル14';
COMMENT ON COLUMN sskadminuser.old_halfdirectorder_tbl.order_count14 IS '注文数14';
COMMENT ON COLUMN sskadminuser.old_halfdirectorder_tbl.shohin_cd15 IS '商品コード15';
COMMENT ON COLUMN sskadminuser.old_halfdirectorder_tbl.shohin_level15 IS '商品レベル15';
COMMENT ON COLUMN sskadminuser.old_halfdirectorder_tbl.order_count15 IS '注文数15';
COMMENT ON COLUMN sskadminuser.old_halfdirectorder_tbl.shohin_cd16 IS '商品コード16';
COMMENT ON COLUMN sskadminuser.old_halfdirectorder_tbl.shohin_level16 IS '商品レベル16';
COMMENT ON COLUMN sskadminuser.old_halfdirectorder_tbl.order_count16 IS '注文数16';
COMMENT ON COLUMN sskadminuser.old_halfdirectorder_tbl.shohin_cd17 IS '商品コード17';
COMMENT ON COLUMN sskadminuser.old_halfdirectorder_tbl.shohin_level17 IS '商品レベル17';
COMMENT ON COLUMN sskadminuser.old_halfdirectorder_tbl.order_count17 IS '注文数17';
COMMENT ON COLUMN sskadminuser.old_halfdirectorder_tbl.shohin_cd18 IS '商品コード18';
COMMENT ON COLUMN sskadminuser.old_halfdirectorder_tbl.shohin_level18 IS '商品レベル18';
COMMENT ON COLUMN sskadminuser.old_halfdirectorder_tbl.order_count18 IS '注文数18';
COMMENT ON COLUMN sskadminuser.old_halfdirectorder_tbl.shohin_cd19 IS '商品コード19';
COMMENT ON COLUMN sskadminuser.old_halfdirectorder_tbl.shohin_level19 IS '商品レベル19';
COMMENT ON COLUMN sskadminuser.old_halfdirectorder_tbl.order_count19 IS '注文数19';
COMMENT ON COLUMN sskadminuser.old_halfdirectorder_tbl.shohin_cd20 IS '商品コード20';
COMMENT ON COLUMN sskadminuser.old_halfdirectorder_tbl.shohin_level20 IS '商品レベル20';
COMMENT ON COLUMN sskadminuser.old_halfdirectorder_tbl.order_count20 IS '注文数20';
COMMENT ON COLUMN sskadminuser.old_halfdirectorder_tbl.payment_type IS '支払い方法';
COMMENT ON COLUMN sskadminuser.old_halfdirectorder_tbl.payment_num IS '支払い回数';
COMMENT ON COLUMN sskadminuser.old_halfdirectorder_tbl.cc_type IS 'クレジット会社';
COMMENT ON COLUMN sskadminuser.old_halfdirectorder_tbl.cc_no IS 'クレジットカード番号';
COMMENT ON COLUMN sskadminuser.old_halfdirectorder_tbl.cc_term IS '有効期限';
COMMENT ON COLUMN sskadminuser.old_halfdirectorder_tbl.recognition_no IS '承認番号';
COMMENT ON COLUMN sskadminuser.old_halfdirectorder_tbl.delivery_dt IS '配送希望日';
COMMENT ON COLUMN sskadminuser.old_halfdirectorder_tbl.delivery_time_type IS '配送時刻区分';
COMMENT ON COLUMN sskadminuser.old_halfdirectorder_tbl.ship_caution_cd IS '発送注意コード';
COMMENT ON COLUMN sskadminuser.old_halfdirectorder_tbl.another_addr_type IS '配送先区分';
COMMENT ON COLUMN sskadminuser.old_halfdirectorder_tbl.another_addr IS 'その他住所';
COMMENT ON COLUMN sskadminuser.old_halfdirectorder_tbl.another_addr_not_conv IS 'その他非変換部';
COMMENT ON COLUMN sskadminuser.old_halfdirectorder_tbl.another_telno IS 'その他住所電話番号';
COMMENT ON COLUMN sskadminuser.old_halfdirectorder_tbl.another_post_no IS 'その他住所郵便番号';
COMMENT ON COLUMN sskadminuser.old_halfdirectorder_tbl.agree_flg IS '個人情報取扱同意フラグ';
COMMENT ON COLUMN sskadminuser.old_halfdirectorder_tbl.mail_send_flg IS 'メール送信フラグ';
COMMENT ON COLUMN sskadminuser.old_halfdirectorder_tbl.overlap_flg IS '重複フラグ';
COMMENT ON COLUMN sskadminuser.old_halfdirectorder_tbl.kainno IS '会員コード';
COMMENT ON COLUMN sskadminuser.old_halfdirectorder_tbl.order_status IS '状態フラグ';
COMMENT ON COLUMN sskadminuser.old_halfdirectorder_tbl.delete_flg IS '削除フラグ';
COMMENT ON COLUMN sskadminuser.old_halfdirectorder_tbl.print_flg IS '受票出力';
COMMENT ON COLUMN sskadminuser.old_halfdirectorder_tbl.host_result IS 'ホスト送信結果';
COMMENT ON COLUMN sskadminuser.old_halfdirectorder_tbl.host_flg IS 'ホストフラグ';
COMMENT ON COLUMN sskadminuser.old_halfdirectorder_tbl.sync_flg IS 'PC同期フラグ';
COMMENT ON COLUMN sskadminuser.old_halfdirectorder_tbl.status IS 'ステータス';
COMMENT ON COLUMN sskadminuser.old_halfdirectorder_tbl.mail_flg IS '発送メール送信フラグ';
COMMENT ON COLUMN sskadminuser.old_halfdirectorder_tbl.communicator IS '対応者';
COMMENT ON COLUMN sskadminuser.old_halfdirectorder_tbl.mail_send_dt IS 'お礼メール送信日';
COMMENT ON COLUMN sskadminuser.old_halfdirectorder_tbl.ctrl_no IS 'お礼メール管理Ｎｏ';
COMMENT ON COLUMN sskadminuser.old_halfdirectorder_tbl.mailteikei_flg IS 'メール定型フラグ';
COMMENT ON COLUMN sskadminuser.old_halfdirectorder_tbl.session_id IS 'セッションID';
COMMENT ON COLUMN sskadminuser.old_halfdirectorder_tbl.update_dt IS '更新日';
COMMENT ON COLUMN sskadminuser.old_halfdirectorder_tbl.regist_dt IS '登録日';
COMMENT ON COLUMN sskadminuser.old_halfdirectorder_tbl.update_user IS '最終更新者';
COMMENT ON COLUMN sskadminuser.old_halfdirectorder_tbl.regist_user IS '登録者';
COMMENT ON COLUMN sskadminuser.old_halfdirectorder_tbl.cc_name IS 'クレジットカード名義人';
COMMENT ON COLUMN sskadminuser.old_halfdirectorder_tbl.cc_scd IS 'セキュリティコード';
COMMENT ON COLUMN sskadminuser.old_halfdirectorder_tbl.price01 IS '商品単価01';
COMMENT ON COLUMN sskadminuser.old_halfdirectorder_tbl.price_taxrate01 IS '商品単価消費税01';
COMMENT ON COLUMN sskadminuser.old_halfdirectorder_tbl.taxrate_id01 IS '税率ID01';
COMMENT ON COLUMN sskadminuser.old_halfdirectorder_tbl.price02 IS '商品単価02';
COMMENT ON COLUMN sskadminuser.old_halfdirectorder_tbl.price_taxrate02 IS '商品単価消費税02';
COMMENT ON COLUMN sskadminuser.old_halfdirectorder_tbl.taxrate_id02 IS '税率ID02';
COMMENT ON COLUMN sskadminuser.old_halfdirectorder_tbl.price03 IS '商品単価03';
COMMENT ON COLUMN sskadminuser.old_halfdirectorder_tbl.price_taxrate03 IS '商品単価消費税03';
COMMENT ON COLUMN sskadminuser.old_halfdirectorder_tbl.taxrate_id03 IS '税率ID03';
COMMENT ON COLUMN sskadminuser.old_halfdirectorder_tbl.price04 IS '商品単価04';
COMMENT ON COLUMN sskadminuser.old_halfdirectorder_tbl.price_taxrate04 IS '商品単価消費税04';
COMMENT ON COLUMN sskadminuser.old_halfdirectorder_tbl.taxrate_id04 IS '税率ID04';
COMMENT ON COLUMN sskadminuser.old_halfdirectorder_tbl.price05 IS '商品単価05';
COMMENT ON COLUMN sskadminuser.old_halfdirectorder_tbl.price_taxrate05 IS '商品単価消費税05';
COMMENT ON COLUMN sskadminuser.old_halfdirectorder_tbl.taxrate_id05 IS '税率ID05';
COMMENT ON COLUMN sskadminuser.old_halfdirectorder_tbl.price06 IS '商品単価06';
COMMENT ON COLUMN sskadminuser.old_halfdirectorder_tbl.price_taxrate06 IS '商品単価消費税06';
COMMENT ON COLUMN sskadminuser.old_halfdirectorder_tbl.taxrate_id06 IS '税率ID06';
COMMENT ON COLUMN sskadminuser.old_halfdirectorder_tbl.price07 IS '商品単価07';
COMMENT ON COLUMN sskadminuser.old_halfdirectorder_tbl.price_taxrate07 IS '商品単価消費税07';
COMMENT ON COLUMN sskadminuser.old_halfdirectorder_tbl.taxrate_id07 IS '税率ID07';
COMMENT ON COLUMN sskadminuser.old_halfdirectorder_tbl.price08 IS '商品単価08';
COMMENT ON COLUMN sskadminuser.old_halfdirectorder_tbl.price_taxrate08 IS '商品単価消費税08';
COMMENT ON COLUMN sskadminuser.old_halfdirectorder_tbl.taxrate_id08 IS '税率ID08';
COMMENT ON COLUMN sskadminuser.old_halfdirectorder_tbl.price09 IS '商品単価09';
COMMENT ON COLUMN sskadminuser.old_halfdirectorder_tbl.price_taxrate09 IS '商品単価消費税09';
COMMENT ON COLUMN sskadminuser.old_halfdirectorder_tbl.taxrate_id09 IS '税率ID09';
COMMENT ON COLUMN sskadminuser.old_halfdirectorder_tbl.price10 IS '商品単価10';
COMMENT ON COLUMN sskadminuser.old_halfdirectorder_tbl.price_taxrate10 IS '商品単価消費税10';
COMMENT ON COLUMN sskadminuser.old_halfdirectorder_tbl.taxrate_id10 IS '税率ID10';
COMMENT ON COLUMN sskadminuser.old_halfdirectorder_tbl.price11 IS '商品単価11';
COMMENT ON COLUMN sskadminuser.old_halfdirectorder_tbl.price_taxrate11 IS '商品単価消費税11';
COMMENT ON COLUMN sskadminuser.old_halfdirectorder_tbl.taxrate_id11 IS '税率ID11';
COMMENT ON COLUMN sskadminuser.old_halfdirectorder_tbl.price12 IS '商品単価12';
COMMENT ON COLUMN sskadminuser.old_halfdirectorder_tbl.price_taxrate12 IS '商品単価消費税12';
COMMENT ON COLUMN sskadminuser.old_halfdirectorder_tbl.taxrate_id12 IS '税率ID12';
COMMENT ON COLUMN sskadminuser.old_halfdirectorder_tbl.price13 IS '商品単価13';
COMMENT ON COLUMN sskadminuser.old_halfdirectorder_tbl.price_taxrate13 IS '商品単価消費税13';
COMMENT ON COLUMN sskadminuser.old_halfdirectorder_tbl.taxrate_id13 IS '税率ID13';
COMMENT ON COLUMN sskadminuser.old_halfdirectorder_tbl.price14 IS '商品単価14';
COMMENT ON COLUMN sskadminuser.old_halfdirectorder_tbl.price_taxrate14 IS '商品単価消費税14';
COMMENT ON COLUMN sskadminuser.old_halfdirectorder_tbl.taxrate_id14 IS '税率ID14';
COMMENT ON COLUMN sskadminuser.old_halfdirectorder_tbl.price15 IS '商品単価15';
COMMENT ON COLUMN sskadminuser.old_halfdirectorder_tbl.price_taxrate15 IS '商品単価消費税15';
COMMENT ON COLUMN sskadminuser.old_halfdirectorder_tbl.taxrate_id15 IS '税率ID15';
COMMENT ON COLUMN sskadminuser.old_halfdirectorder_tbl.price16 IS '商品単価16';
COMMENT ON COLUMN sskadminuser.old_halfdirectorder_tbl.price_taxrate16 IS '商品単価消費税16';
COMMENT ON COLUMN sskadminuser.old_halfdirectorder_tbl.taxrate_id16 IS '税率ID16';
COMMENT ON COLUMN sskadminuser.old_halfdirectorder_tbl.price17 IS '商品単価17';
COMMENT ON COLUMN sskadminuser.old_halfdirectorder_tbl.price_taxrate17 IS '商品単価消費税17';
COMMENT ON COLUMN sskadminuser.old_halfdirectorder_tbl.taxrate_id17 IS '税率ID17';
COMMENT ON COLUMN sskadminuser.old_halfdirectorder_tbl.price18 IS '商品単価18';
COMMENT ON COLUMN sskadminuser.old_halfdirectorder_tbl.price_taxrate18 IS '商品単価消費税18';
COMMENT ON COLUMN sskadminuser.old_halfdirectorder_tbl.taxrate_id18 IS '税率ID18';
COMMENT ON COLUMN sskadminuser.old_halfdirectorder_tbl.price19 IS '商品単価19';
COMMENT ON COLUMN sskadminuser.old_halfdirectorder_tbl.price_taxrate19 IS '商品単価消費税19';
COMMENT ON COLUMN sskadminuser.old_halfdirectorder_tbl.taxrate_id19 IS '税率ID19';
COMMENT ON COLUMN sskadminuser.old_halfdirectorder_tbl.price20 IS '商品単価20';
COMMENT ON COLUMN sskadminuser.old_halfdirectorder_tbl.price_taxrate20 IS '商品単価消費税20';
COMMENT ON COLUMN sskadminuser.old_halfdirectorder_tbl.taxrate_id20 IS '税率ID20';
COMMENT ON COLUMN sskadminuser.old_halfdirectorder_tbl.total_order_amount IS '合計注文金額';
COMMENT ON COLUMN sskadminuser.old_halfdirectorder_tbl.total_order_taxrate IS '合計注文消費税';
COMMENT ON COLUMN sskadminuser.old_halfdirectorder_tbl.reduction_kbn IS '還元区分';
-- CREATE INDEX 
-- END TABLE : sskadminuser.old_halfdirectorder_tbl  --


