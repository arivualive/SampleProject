/**
* フォーカスを一度外して再度セットする
* ※Chromeの場合のみ対応する
* #15321.AndroidのChromeでselectボックスが誤動作
*/
function focusRefresh() {
    var userAgent = navigator.userAgent.toLowerCase();
    if (userAgent.indexOf('chrome') > 0 && userAgent.indexOf('edge') == -1)
    {
        id = document.activeElement.id;
        $('#' + id).blur();
        $('#' + id).focus();
    }
}
