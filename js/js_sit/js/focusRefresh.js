/**
* �t�H�[�J�X����x�O���čēx�Z�b�g����
* ��Chrome�̏ꍇ�̂ݑΉ�����
* #15321.Android��Chrome��select�{�b�N�X���듮��
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
