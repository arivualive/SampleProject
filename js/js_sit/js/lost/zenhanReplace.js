$(function() {
	// �S�p�����p�ϊ��i�S�p�p���L���j
	$('#form-customer-number, #form-tel01, #form-tel02, #form-tel03, #form-mail01').change(function() {
		var $this = $(this);
		var value = $this.val().replace(/[�I-�`]/g, function(s) {
			return String.fromCharCode(s.charCodeAt(0) - 0xFEE0);
		});
		value = value.replace(/^[\s�@]+|[\s�@]+$/g, '');
		$this.val(value);
	});
});