    // 文字数チェック
    function LengthCheck(obj, min, max) {
        if (min > 0 && obj.value.length < min) {
            return false;
        }
        if (max > 0 && obj.value.length > max) {
            return false;
        }
        return true;
    }

    // ネット会員IDチェック
    function CheckNetID(obj, msg) {
        if (LengthCheck(obj, 6, 12) == false) {
            msg.value = 'ネット会員IDは8～12文字でお決めください。';
            return false;
        }

        if (/^[0-9A-Za-z]+$/.test(obj.value) == false) {
            msg.value = 'ネット会員IDは半角英数字で入力してください。';
            return false;
        }

        if (/^[0-9]+$/.test(obj.value) == true) {
            msg.value = 'ネット会員IDはアルファベットと数字の組み合わせで設定してください。';
            return false;
        }

        if (/^[A-Za-z]+$/.test(obj.value) == true) {
            msg.value = 'ネット会員IDはアルファベットと数字の組み合わせで設定してください。';
            return false;
        }
        return true;
    }

    // メールアドレスチェック
    function CheckEmail(obj, msg) {
        if (LengthCheck(obj, 6, -1) == false) {
            msg.value = 'メールアドレスを正しく入力してください。';
            return false;
        }

        if (LengthCheck(obj, -1, 100) == false) {
            msg.value = 'メールアドレスは100文字までで入力してください。';
            return false;
        }

        if (emailCheck(obj.value) == false) {
            msg.value = 'メールアドレスを正しく入力してください。';
            return false;
        }
        return true;
    }

    // 電話番号（市外局番）チェック
    function CheckTelAreaCode(obj, mode, msg) {
        if (LengthCheck(obj, 2, -1) == false) {
            msg.value = mode + '番号の市外局番は2桁以上の半角数字を入力してください。';
            return false;
        }

        if (LengthCheck(obj, -1, 5) == false) {
            msg.value = mode + '番号の市外局番は5桁以内の半角数字を入力してください。';
            return false;
        }

        if (/^[0-9]+$/.test(obj.value) == false) {
            msg.value = mode + '番号の市外局番は2桁以上の半角数字を入力してください。';
            return false;
        }
        return true;
    }

    // 電話番号（市内局番）チェック
    function CheckTelExchangeCode(obj, mode, msg) {
        if (LengthCheck(obj, -1, 4) == false) {
            msg.value = mode + '番号の市内局番は4桁以内の半角数字を入力してください。';
            return false;
        }

        if (/^[0-9]+$/.test(obj.value) == false) {
            msg.value = mode + '番号の市内局番は半角数字で入力してください。';
            return false;
        }
        return true;
    }

    // 電話番号（加入者番号）チェック
    function CheckTelSubscriberNumber(obj, mode, msg) {
        if (LengthCheck(obj, 4, 4) == false) {
            msg.value = mode + '番号は4桁の半角数字で入力してください。';
            return false;
        }

        if (/^[0-9]+$/.test(obj.value) == false) {
            msg.value = mode + '番号は4桁の半角数字で入力してください。';
            return false;
        }
        return true;
    }

    // 電話番号（市外局番・市内局番・加入者番号）チェック
    function CheckTel(ac, ec, sn, mode, msg) {
        if (ac.value.length + ec.value.length + sn.value.length < 10) {
            msg.value = mode + '番号の市外局番、市内局番を正しく数字で入力してください。';
            return false;
        }

        if (/^0(5|6|7|8|9)0$/.test(ac.value) == false) {
            if (ac.value.length + ec.value.length + sn.value.length != 10) {
                msg.value = mode + '番号の市外局番、市内局番を正しく数字で入力してください。';
                return false;
            }
        } else {
            if (ac.value.length + ec.value.length + sn.value.length != 11) {
                msg.value = mode + '番号の市外局番、市内局番を正しく数字で入力してください。';
                return false;
            }
        }
        return true;
    }

    // 郵便番号チェック
    function CheckZip(obj, mode, msg) {
        if (/^[0-9]+$/.test(obj.value) == false) {
            msg.value = '郵便番号は半角数字で入力してください。';
            return false;
        }

        if (mode == 'main') {
            max_len = 3;
        } else {
            max_len = 4;
        }

        if (LengthCheck(obj, max_len, max_len) == false) {
            msg.value = '郵便番号を正しく数字で入力してください。';
            return false;
        }
        return true;
    }
