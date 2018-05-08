(function($){
	
	$(document).on('change', '#categorychecklist li input[type="checkbox"]', function(){
		var _this = $(this);
		category_check_linkage(_this);
	});	
	
	
	/*
	 * カテゴリーボックスのチェック連動
	 */
	function category_check_linkage(_this) {
		var prop_checked = _this.prop('checked');
		if(prop_checked){
			$(_this.parents('li[id^="category-"]')).each(function(){
				$(this).children('.selectit').children('input[type="checkbox"]').prop('checked', prop_checked);
			});
		} else {
			$(_this.closest('li[id^="category-"]').find('li[id^="category-"]')).each(function(){
				$(this).children('.selectit').children('input[type="checkbox"]').prop('checked', prop_checked);
			});
		}
	}
	
	
})(jQuery);