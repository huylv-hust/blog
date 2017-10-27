var message_confirm_del = '削除します、よろしいですか？';
var message_confirm_save = '保存します、よろしいですか？';
var message_approval_confirm = '承認します、よろしいですか？';
$(function() {
	$('.datepicker').datepicker({
		autoclose: true
	});

	$(document).ready(function(){
		$('#select_all').click(function(){
			var checkboxes = $(this).closest('table').find(':checkbox');
			if($(this).prop('checked')) {
				checkboxes.prop('checked', true);
			} else {
				checkboxes.prop('checked', false);
			}
		});
	});
});