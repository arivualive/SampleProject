function HideSpecialDate() {
}
HideSpecialDate.prototype = {

    /**
     * �N
     */
    year : "",

    /**
     * ��\���ɂ������
     */
    // ��R-#29562_2016�N�N���N�n�Ή� 2016/12/12 nul-sato
    hiddenDateList: [ '12��31��', '01��01��', '01��02��', '01��03��' ],

    /**
     * ���b�Z�[�W
     */
    getMessage: function() {
        var term = this.hiddenDateList[0] + "�`" + this.hiddenDateList[this.hiddenDateList.length - 1];
        return "��ϐ\���󂲂����܂���B�N���N�n��12��31������1��3���̊��ԁA�c�Ǝ��Ԃ�9�F00�`18�F00�ƂȂ�܂��B\n�������܂����A9�F00�`18�F00�̎��ԑт����I�т��������܂��B";
    // ��R-#29562_2016�N�N���N�n�Ή� 2016/12/12 nul-sato
    },
    
    /**
     * �I�����ꂽ�l����\�����X�g�ɍ��v����ꍇ�Atrue����������
     */
    isHiddenDate: function(value) {
        for (key in this.hiddenDateList) {
            if (value === this.hiddenDateList[key]) {
                return true;
            }
        }
        return false;
	}
}