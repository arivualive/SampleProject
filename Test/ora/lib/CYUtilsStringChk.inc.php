<?php
/**
 *
 * 【文字列操作 関数(チェック関数)群ファイル】
 *
 * 入力文字列, mbstring.internal_encoding ともにShift_JIS(SJIS)で
 * あることを前提とします.
 *
 * @package default
 * @version $Id: CYUtilsStringChk.inc.php,v 1.1 2007/03/16 02:44:46 hiroaki_tanaka Exp $
 */

/*
 * TODO: chk関数の返り値の一致
 * TODO: chkNgWord() の移動ないし適切なファイルのinclude
 */

/**
 * 'CYUtilsLog.inc.php' の require_once
 */
require_once dirname(__FILE__). '/CYUtilsLog.inc.php';


//--------------------------------------------------------
/**
 * 文字列がひらがなのみで構成されているかをチェックする
 *
 * ここでのひらがなとは、 （いわゆる）ひらがなに
 *  'ー','・', 全角スペース, 半角スペース を加えたものです.
 *
 * @param string $text チェック対象文字列
 * @return int 全てひらがなの場合:1, ひらがな以外を含む場合(空文字列の含む):0
*/
//--------------------------------------------------------
function chkHiragana($text)
{
    if (mb_ereg('^[ぁ-んー・　 ]+$', $text) === false) {
        return 0;
    }
    return 1;
}

//--------------------------------------------------------
/**
 * 文字列が全角文字のみで構成されているかをチェックする.
 *
 * @param string $text チェック対象文字列
 *
 * @return bool 全角のみで構成されている場合 true,
 * 					それ以外はfalse
 */
//--------------------------------------------------------
function chkZenkaku($text)
{
    if (mb_convert_kana($text, 'ASKR') === $text) {
        return true;
    } else {
        return false;
    }
}


//--------------------------------------------------------
/**
 * メールのローカルパートがRFC2822(+DoCoMoの拡張)に従っているかをチェックする
 *
 * TODO: 独立したテストの作成
 *
 * @param string $text チェック対象文字列
 * @return int ドメイン名として正しい形式の文字列:1 それ以外:0
 *
 */
//--------------------------------------------------------
function chkLocalPartOfEmailAddress ($text)
{

    /* RFC2822では 末尾の '.' は許されていないが, DoCoMoは許すので
     * ここでも許している.
     */

     // '.' を除く利用してもよい文字
    $atext =  "a-z0-9!#\$%&'*+\-\/=?^_`{|}~";

    if (preg_match("/^[$atext][$atext.]*$/i", $text) === 1) {
        return 1;
    }
    return 0;
}
//--------------------------------------------------------
/**
 * ドメイン名がRFC1035に従っているかをチェックする
 *
 * TODO: 独立したテストの作成
 * TODO: TLDが2文字以上のチェック?
 *
 * @param string $text チェック対象文字列
 * @return int ドメイン名として正しい形式の文字列:1 それ以外:0
 *
 */
//--------------------------------------------------------
function chkDomainName($text)
{

    // domain のチェック

    // domainの長さは255文字まで
    if (strlen($text) > 255) {
        return 0;
    }

    $domain_labels= explode('.', $text);

    // 2つ以上の部分にわかれることを確認
    if ($domain_labels === false || count($domain_labels) < 2) {
        return 0;
    }

    foreach ($domain_labels as $label) {

        //ラベルの長さは1文字から63文字まで
        if (strlen($label) < 1 || strlen($label) > 63) {
            return 0;
        }

        /*
         * ラベルに用いてよい文字は [a-z0-9-]だが,
         * 最初と末尾は '-' は禁止されている
         * ここでは, 1文字の場合を特別扱いしている.
         */
        if (strlen($label) === 1) {
            if (preg_match('/^[a-z0-9]$/i', $label) === 0) {
                return 0;
            }
        } else {

            if (preg_match('/^([a-z0-9][a-z0-9-]*[a-z0-9])$/i', $label) === 0) {
                return 0;
            }
        }
    }

    return 1;
}
//--------------------------------------------------------
/**
 * メールアドレスがRFC2822(+DoCoMoの拡張)に従っているかをチェックする
 *
 * @param string $email チェック対象メールアドレス
 * @return int メールアドレスとして正しい形式の文字列:1 それ以外:0
 *
 */
//--------------------------------------------------------
function chkEmail($email)
{
    $mail_parts= explode('@', $email);

    // 2つの部分にわかれることを確認
    if ($mail_parts === false || count($mail_parts) !== 2) {
        return 0;
    }

    // local-part のチェック
    if (chkLocalPartOfEmailAddress($mail_parts[0]) === 0) {
        return 0;
    }

    // domain name のチェック

    return chkDomainName($mail_parts[1]);
}

//--------------------------------------------------------
/**
 * 文字列がASCIIの整数文字列であるかをチェックする
 *
 * 小数などの整数以外の数値について
 * 数字ないし数値文字列であるかを調べるならば
 * is_numeric()を利用してください.
 *
 * @param string $text チェック対象文字列
 *
 * @return int 整数文字列の場合:1 それ以外:0
*/
//--------------------------------------------------------
function chkNumeric($text)
{
    if (preg_match('/^[0-9]+$/', $text) === 1) {
        return 1;
    }
    return 0;
}

//--------------------------------------------------------
/**
 * 与えられた文字列が固定電話番号として正しい形式かチェックする.
 *
 * '-'を市外局番, 市内局番, 加入者番号の区切りとして解釈します.
 * いわゆる 0AB0特番についてはチェックを行ないません.
 *
 * @param string $text チェック対象文字列
 *
 * @return int 固定電話番号と解釈できる文字列の場合:1 それ以外:0
*/
//--------------------------------------------------------
function chkTelephone($text)
{

    $len= strlen(str_replace('-', '', $text));
    if ($len !== 9 && $len !== 10) {
        return 0;
    }
    if (preg_match('/^0[1-9][0-9]{0,4}[\-]?[0-9]{0,4}[\-]?[0-9]{4}$/',
     $text) === 1) {
        return 1;
    }
    return 0;
}

//--------------------------------------------------------
/**
 * 与えられた文字列が携帯電話番号として正しい形式がチェックする.
 *
 * '-'を市外局番, 市内局番, 加入者番号の区切りに用いてよい
 *
 * @param string $text チェック対象文字列
 *
 * @return int 携帯電話番号と解釈できる文字列の場合:1 それ以外:0
 */
//--------------------------------------------------------
function chkCellularPhone($text)
{
    if (preg_match('/^0[1-9]0[\-]?[0-9]{4}[\-]?[0-9]{4}$/', $text) === 1) {
        return 1;
    }
    return 0;
}

//--------------------------------------------------------
//--------------------------------------------------------
/**
 * 与えられた文字列が電話番号/携帯電話番号として正しい形式がチェックする.
 *
 * 携帯電話の番号の場合は, '-'を市外局番, 市内局番, 加入者番号の区切りに用いることができない
 * TODO: chkCellularPhone() では使えるので
 *       chkPhone()でも使えたほうがよい.
 *
 * @param string $text チェック対象文字列
 * @return int 電話番号と解釈できる文字列の場合:1 それ以外:0
 */
//--------------------------------------------------------
function chkPhone($text)
{

    // 固定:9桁10桁 携帯:11桁
    $len= strlen($text);
    if ($len === 11) {
        return chkCellularPhone($text);
    }

    // chkTelephone() 内で長さのチェックを行なっている.
    return chkTelephone($text);

}

/**
 * 文字列にNGワードが含まれているかをチェックする
 *
 * @global string NGワードファイルがあるディレクトリのパス
 * @global string NGワードファイルのファイル名
 *
 * @param string $word チェック対象文字列
 *
 * @return array チェック結果が入った配列。
 * 'NG_FLAG'=>trueの場合は文字列の中にNGワードが入っている
 *            それ以外は false
 * 'DANGEROUS_LEVEL'=>NGレベル、
 * 'TARGET_WORD'=>検出されたNGワード
 */
//--------------------------------------------------------

function chkNgWord($word)
{
    global $LIB_PATH, $NG_WORD_FILE;

    $result['NG_FLAG']= false;
    $result['DANGEROUS_LEVEL']= '';
    $result['TARGET_WORD']= '';

    $file_path= $LIB_PATH . '/' . $NG_WORD_FILE;

    if (!is_file($file_path)) {
        logError('NGワードファイル(' . $file_path . ')' .
                'が見つからないか, ファイルではありません.');
        exit;
    }

    if (!is_readable($file_path)) {
        logError('NGワードファイル(' . $file_path . ')が読みこめません.');
        exit;
    }

    $file_data= @file($file_path);

    if ($file_data === false) {
        logError('NGワードファイル(' . $file_path . ')の読み込みに失敗しました.');
        exit;
    }

    $list_count= count($file_data);

    for ($i= 0; $i < $list_count; ++$i) {
        $object_list= explode(',', $file_data[$i]);
        if ($object_list === false || count($object_list) < 2) {
            continue;
        }

        $ng_word= trim($object_list[1]);
        if (!( mb_strpos($word, $ng_word) === false)) {
            $result['NG_FLAG']= true;
            $result['DANGEROUS_LEVEL']= trim($object_list[0]);
            $result['TARGET_WORD']= $ng_word;
            break;
        }
    }
    return $result;
}

/**
 * 送信許可メールアドレスチェック
 *
 * @param  mixed $to メールアドレス
 * @return bool  許可されているドメインの場合、true。それ以外はFALSE。
 */
function PermmitMailDomainCheck($to)
{
    // ▼モバイル対応 #738 2009/02/26 kdl.ohyanagi
    // 携帯アドレスのチェック
    // 許可されたアドレスのみ許す
    if (is_array($to)) {
        foreach ($to as $mail) {
            if (isMailAddressAllowed($email) === true) {
                logDebug("Mail address exists in list");
                return true;
            }
        }
    } else {
        if (isMailAddressAllowed($to) === true) {
            logDebug("Mail address exists in list");
            return true;
        }
    }
    
    // ▲モバイル対応 #738 2009/02/26 kdl.ohyanagi

    // 許可ドメイン一覧
    $Ok_MailAddress[0] = "saishunkan.co.jp";
    $Ok_MailAddress[1] = "aifront.co.jp";
    $Ok_MailAddress[2] = "kdl.co.jp";

    $toArray = array();
    if (is_array($to)) {
        $toArray = array_merge($toArray , $to);
    } else {
        $toArray = array_merge($toArray , preg_split("/,/", $to));
    }

    foreach ($toArray as $email) {
        // メアドを＠で分割
        $email_part = explode('@', $email);
        $domain = trim(str_replace('>', '', $email_part[1]));
        if(in_array($domain, $Ok_MailAddress) ){
            logDebug("mailto OK:".$email);
        } else {
            logError("mailto NG:".$email);
            return false;
        }
    }

    return true;
}

/**
 * 許可されたメールアドレスか判定する
 *
 * @param  mixed $to メールアドレス
 * @access public
 * @return bool true:Allowed mail address, false:Not allowed
 */
function isMailAddressAllowed($to, $iniPath = null)
{
    // 値が配列の場合、再帰チェックを行う
    if (is_array($to)) {
        foreach ($to as $val) {
            $ret = isMailAddressAllowed($val, $iniPath);
            if ($ret === true) {
                return true;
            }
        }
    }

    if (is_null($iniPath)) {
        $iniPath = dirname(__FILE__) . '/allowed_mailaddress.ini';
    }
    $ini = file_get_contents($iniPath);
    if (is_string($ini)) {
        $mails = explode(',', rtrim($ini, ','));
        foreach($mails as $mail) {
            if (trim($mail) === $to) {
                return true;
            }
        }
    }

    return false;
}
/**#@-*/

// ▼R-#3743 スマートフォン対応 2012/06/29 uls-motoi
function myIsMobileDomain($email, $ng_mailaddress = null) {

		global $NG_MAILADDRESS;

		// メアドを＠で分割
		$tmp = explode('@', $email);

		// PCのメールアドレスをチェック
		if( in_array($tmp[1], $NG_MAILADDRESS) ){
			return true;
		}

		return false;
}
// ▲R-#3743 スマートフォン対応 2012/06/29 uls-motoi
?>
