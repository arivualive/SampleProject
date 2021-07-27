// キャンペーンプレゼント用入力チェック 
function InputChk() {
	with (document.form_inp){

		if(presentshohin_cd1.selectedIndex != ""){
			
			if(presentshohin_cd1.selectedIndex == presentshohin_cd2.selectedIndex){
					fncAlert("選択商品が重複しています",presentshohin_cd1);
					return false
			}
			if(presentshohin_cd1.selectedIndex == presentshohin_cd3.selectedIndex){
					fncAlert("選択商品が重複しています",presentshohin_cd1);
					return false
			}
			if(presentshohin_cd1.selectedIndex == presentshohin_cd4.selectedIndex){
					fncAlert("選択商品が重複しています",presentshohin_cd1);
					return false
			}
			if(presentshohin_cd1.selectedIndex == presentshohin_cd5.selectedIndex){
					fncAlert("選択商品が重複しています",presentshohin_cd1);
					return false
			}
		}
		if(presentshohin_cd2.selectedIndex != ""){
			if(presentshohin_cd2.selectedIndex == presentshohin_cd3.selectedIndex){
					fncAlert("選択商品が重複しています",presentshohin_cd2);
					return false
			}
			if(presentshohin_cd2.selectedIndex == presentshohin_cd4.selectedIndex){
					fncAlert("選択商品が重複しています",presentshohin_cd2);
					return false
			}
			if(presentshohin_cd2.selectedIndex == presentshohin_cd5.selectedIndex){
					fncAlert("選択商品が重複しています",presentshohin_cd2);
					return false
			}
		}
		if(presentshohin_cd3.selectedIndex != ""){
			if(presentshohin_cd3.selectedIndex == presentshohin_cd4.selectedIndex){
					fncAlert("選択商品が重複しています",presentshohin_cd3);
					return false
			}
			if(presentshohin_cd3.selectedIndex == presentshohin_cd5.selectedIndex){
					fncAlert("選択商品が重複しています",presentshohin_cd3);
					return false
			}
		}
		if(presentshohin_cd4.selectedIndex != ""){
			if(presentshohin_cd4.selectedIndex == presentshohin_cd5.selectedIndex){
					fncAlert("選択商品が重複しています",presentshohin_cd4);
					return false
			}
		}
		if(!fncEditConfirm()){
			return false;
		}
	}
}
