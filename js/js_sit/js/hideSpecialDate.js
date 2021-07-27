function HideSpecialDate() {
}
HideSpecialDate.prototype = {

    /**
     * 年
     */
    year : "",

    /**
     * 非表示にする日時
     */
    // ▼R-#29562_2016年年末年始対応 2016/12/12 nul-sato
    hiddenDateList: [ '12月31日', '01月01日', '01月02日', '01月03日' ],

    /**
     * メッセージ
     */
    getMessage: function() {
        var term = this.hiddenDateList[0] + "～" + this.hiddenDateList[this.hiddenDateList.length - 1];
        return "大変申し訳ございません。年末年始の12月31日から1月3日の期間、営業時間は9：00～18：00となります。\n恐れ入りますが、9：00～18：00の時間帯をお選びくださいませ。";
    // ▲R-#29562_2016年年末年始対応 2016/12/12 nul-sato
    },
    
    /**
     * 選択された値が非表示リストに合致する場合、trueを応答する
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