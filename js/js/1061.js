<?php
    require_once $ROOT_PATH.'/js/line_common.js';
?>

function submitForm() {
    document.form_inp.button.disabled=true;
    document.form_inp.submit();
    return false;
}
function action1061Find() {
    if(!Action1061Find()){
        return false;
    }
    return true;
}
