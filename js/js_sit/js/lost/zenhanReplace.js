$(function() {
	// 全角→半角変換（全角英数記号）
	$('#form-customer-number, #form-tel01, #form-tel02, #form-tel03, #form-mail01').change(function() {
		var $this = $(this);
		var value = $this.val().replace(/[！-～]/g, function(s) {
			return String.fromCharCode(s.charCodeAt(0) - 0xFEE0);
		});
		value = value.replace(/^[\s　]+|[\s　]+$/g, '');
		$this.val(value);
	});
});