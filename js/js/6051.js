// 利用者管理用入力チェック
function InputChk() {
    with (document.form_inp){

        if (fncTrim(comm_cd.value) == "") {
            fncAlert("社員コードを入力してください",comm_cd);
            return false;
        }

        if (fncTrim(comm_nm.value) == "") {
            fncAlert("氏名を入力してください",comm_nm);
            return false;
        }
        if (fncTrim(comm_pw.value) == "") {
            fncAlert("パスワードを入力してください",comm_pw);
            return false;
        }
        if(!fncJudgeHankaku(comm_pw.value)){
            fncAlert("パスワードは半角英数字で入力してください",comm_pw);
            return false;
        }
        if (fncTrim(comm_pw_check.value) == "") {
            fncAlert("確認のためパスワードをもう一度入力してください",comm_pw_check);
            return false;
        }
        if (fncTrim(comm_pw_check.value) != fncTrim(comm_pw.value)) {
            fncAlert("パスワードとパスワード（確認）が異なります。確認の上もう一度入力してください",comm_pw_check);
            return false;
        }
        if(!fncEditConfirm()){
            return false;
        }
    }
}

// 配列のprototypeに関数を追加
if( ! Array.prototype.contains ){
   /**
    * @access public
    * @param value mixed 検索するオブジェクト
    * @return boolean 対象配列に既にオブジェクトが存在していれば true, そうでなければ false
    * 配列の値の重複チェックなどに使用。
    */
    Array.prototype.contains = function(value) {
        for (var i in this) {
            if (this.hasOwnProperty(i) && this[i] === value) {
                return true;
            }
        }
        return false;
    }
}
/*▼2015/05/25 R-#_WEB管理ツールの権限追加 sai_yamaguchi*/
var menu = [1011,1111,1012,1013,1014,1015,1016,1021,1031,1041,1042,1043,1061,
            2011,2012,2013,2014,2015,2016,2017,2018,2019,2021,2022,2031,2041,2051,2061,2085,2086,2087,2089,2091,3013,3014,3015,
            3021,3031,3032,3131,3041,3051,3052,3061,3071,3072,3081,3141,3171,3191,
            3091,3101,3111,3181,3211,3212,3213,3214,3221,3222,4011,4012,4112,4013,4113,4014,4015,4021,5011,5012,
            6011,6021,6031,6041,6051,6061
           ]

function AllChecked() {
    for (i=0;i<menu.length;i++){
        document.form_inp.elements["view_"  + menu[i]].checked   = true;
        document.form_inp.elements["edit_"  + menu[i]].checked   = true;
        document.form_inp.elements["delete_"+ menu[i]].checked   = true;
    }
}

function ManagerChecked() {
/*▼2015/05/25 R-#_WEB管理ツールの権限追加 sai_yamaguchi*/
var manager_menu = [1011,1111,1012,1013,1014,1015,1016,1021,1031,1041,1042,1043,1061,
                    2011,2012,2013,2014,2015,2016,2017,2021,2022,2031,2085,2086,2087,2089,2091,3031,3032,3131,3081,3221,3222,
                    4011,4012,4112,4013,4015,4113,4021,5011,5012,6051,6061
                   ];
var manager_view_menu = [2018,2019,2041,2051,3013,3014,3015,3091,3181,3211,3212,3213,3214];
	AllClearChecked();
    for (i=0;i<menu.length;i++){
        if (manager_menu.contains(menu[i])) {
            document.form_inp.elements["view_"  + menu[i]].checked   = true;
            document.form_inp.elements["edit_"  + menu[i]].checked   = true;
            document.form_inp.elements["delete_"+ menu[i]].checked   = true;
        } else if (manager_view_menu.contains(menu[i])) {
            document.form_inp.elements["view_"  + menu[i]].checked   = true;
        }
    }
}

function CommunicatorChecked() {
/*▼2015/05/25 R-#_WEB管理ツールの権限追加 sai_yamaguchi*/
var communicator_edit_menu = [1011,1111,1012,1013,1014,1015,1016,1021,1031,1041,1042,1043,1061,
                              2011,2012,2013,2014,2015,2016,2017,2021,2022,2031,2085,2086,2087,2089,2091,3222,4021,5011];
var communicator_view_menu = [2018,2019,2041,2051,2089,2091,3015,3091,3181,3221,4011,4012,4112,4013,4015,4113,5012,6051,6061];
	AllClearChecked();
    for (i=0;i<menu.length;i++){
        if (communicator_edit_menu.contains(menu[i])) {
            document.form_inp.elements["view_"  + menu[i]].checked   = true;
            document.form_inp.elements["edit_"  + menu[i]].checked   = true;
        } else if (communicator_view_menu.contains(menu[i])) {
            document.form_inp.elements["view_"  + menu[i]].checked   = true;
        }
    }
}

function ViewChecked() {
    AllClearChecked();
    for (i=0;i<menu.length;i++){
        document.form_inp.elements["view_"  + menu[i]].checked   = true;
    }
}

function NormalChecked() {
    AllClearChecked();
    for (i=0;i<menu.length;i++){
        document.form_inp.elements["view_"  + menu[i]].checked   = true;
        document.form_inp.elements["edit_"  + menu[i]].checked   = true;
    }
}

function AllClearChecked() {
    for (i=0;i<menu.length;i++){
        document.form_inp.elements["view_"  + menu[i]].checked   = false;
        document.form_inp.elements["edit_"  + menu[i]].checked   = false;
        document.form_inp.elements["delete_"+ menu[i]].checked   = false;
    }
}
