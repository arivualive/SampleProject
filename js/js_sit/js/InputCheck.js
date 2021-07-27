    // �������`�F�b�N
    function LengthCheck(obj, min, max) {
        if (min > 0 && obj.value.length < min) {
            return false;
        }
        if (max > 0 && obj.value.length > max) {
            return false;
        }
        return true;
    }

    // �l�b�g���ID�`�F�b�N
    function CheckNetID(obj, msg) {
        if (LengthCheck(obj, 6, 12) == false) {
            msg.value = '�l�b�g���ID��8�`12�����ł����߂��������B';
            return false;
        }

        if (/^[0-9A-Za-z]+$/.test(obj.value) == false) {
            msg.value = '�l�b�g���ID�͔��p�p�����œ��͂��Ă��������B';
            return false;
        }

        if (/^[0-9]+$/.test(obj.value) == true) {
            msg.value = '�l�b�g���ID�̓A���t�@�x�b�g�Ɛ����̑g�ݍ��킹�Őݒ肵�Ă��������B';
            return false;
        }

        if (/^[A-Za-z]+$/.test(obj.value) == true) {
            msg.value = '�l�b�g���ID�̓A���t�@�x�b�g�Ɛ����̑g�ݍ��킹�Őݒ肵�Ă��������B';
            return false;
        }
        return true;
    }

    // ���[���A�h���X�`�F�b�N
    function CheckEmail(obj, msg) {
        if (LengthCheck(obj, 6, -1) == false) {
            msg.value = '���[���A�h���X�𐳂������͂��Ă��������B';
            return false;
        }

        if (LengthCheck(obj, -1, 100) == false) {
            msg.value = '���[���A�h���X��100�����܂łœ��͂��Ă��������B';
            return false;
        }

        if (emailCheck(obj.value) == false) {
            msg.value = '���[���A�h���X�𐳂������͂��Ă��������B';
            return false;
        }
        return true;
    }

    // �d�b�ԍ��i�s�O�ǔԁj�`�F�b�N
    function CheckTelAreaCode(obj, mode, msg) {
        if (LengthCheck(obj, 2, -1) == false) {
            msg.value = mode + '�ԍ��̎s�O�ǔԂ�2���ȏ�̔��p��������͂��Ă��������B';
            return false;
        }

        if (LengthCheck(obj, -1, 5) == false) {
            msg.value = mode + '�ԍ��̎s�O�ǔԂ�5���ȓ��̔��p��������͂��Ă��������B';
            return false;
        }

        if (/^[0-9]+$/.test(obj.value) == false) {
            msg.value = mode + '�ԍ��̎s�O�ǔԂ�2���ȏ�̔��p��������͂��Ă��������B';
            return false;
        }
        return true;
    }

    // �d�b�ԍ��i�s���ǔԁj�`�F�b�N
    function CheckTelExchangeCode(obj, mode, msg) {
        if (LengthCheck(obj, -1, 4) == false) {
            msg.value = mode + '�ԍ��̎s���ǔԂ�4���ȓ��̔��p��������͂��Ă��������B';
            return false;
        }

        if (/^[0-9]+$/.test(obj.value) == false) {
            msg.value = mode + '�ԍ��̎s���ǔԂ͔��p�����œ��͂��Ă��������B';
            return false;
        }
        return true;
    }

    // �d�b�ԍ��i�����Ҕԍ��j�`�F�b�N
    function CheckTelSubscriberNumber(obj, mode, msg) {
        if (LengthCheck(obj, 4, 4) == false) {
            msg.value = mode + '�ԍ���4���̔��p�����œ��͂��Ă��������B';
            return false;
        }

        if (/^[0-9]+$/.test(obj.value) == false) {
            msg.value = mode + '�ԍ���4���̔��p�����œ��͂��Ă��������B';
            return false;
        }
        return true;
    }

    // �d�b�ԍ��i�s�O�ǔԁE�s���ǔԁE�����Ҕԍ��j�`�F�b�N
    function CheckTel(ac, ec, sn, mode, msg) {
        if (ac.value.length + ec.value.length + sn.value.length < 10) {
            msg.value = mode + '�ԍ��̎s�O�ǔԁA�s���ǔԂ𐳂��������œ��͂��Ă��������B';
            return false;
        }

        if (/^0(5|6|7|8|9)0$/.test(ac.value) == false) {
            if (ac.value.length + ec.value.length + sn.value.length != 10) {
                msg.value = mode + '�ԍ��̎s�O�ǔԁA�s���ǔԂ𐳂��������œ��͂��Ă��������B';
                return false;
            }
        } else {
            if (ac.value.length + ec.value.length + sn.value.length != 11) {
                msg.value = mode + '�ԍ��̎s�O�ǔԁA�s���ǔԂ𐳂��������œ��͂��Ă��������B';
                return false;
            }
        }
        return true;
    }

    // �X�֔ԍ��`�F�b�N
    function CheckZip(obj, mode, msg) {
        if (/^[0-9]+$/.test(obj.value) == false) {
            msg.value = '�X�֔ԍ��͔��p�����œ��͂��Ă��������B';
            return false;
        }

        if (mode == 'main') {
            max_len = 3;
        } else {
            max_len = 4;
        }

        if (LengthCheck(obj, max_len, max_len) == false) {
            msg.value = '�X�֔ԍ��𐳂��������œ��͂��Ă��������B';
            return false;
        }
        return true;
    }
