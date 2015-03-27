$(document).ready(function() {
	$('.nav-letter-list-item-link').click(function(ev) {
		ev.preventDefault();
		var datakey = $(this).attr('data-letterkey');
		$('.account-member-list li').each(function (i, listElement){
			var sortKey = $(listElement).attr('data-sortkey');
				if ($(listElement).hasClass('list-item-displaynone') && datakey === sortKey) {
					$(listElement).removeClass('list-item-displaynone');
				} else {
					$(listElement).addClass('list-item-displaynone');
				}
		});
	});
	$(".toogleElement").click(function(ev){ // trigger 
		ev.preventDefault();
		var ident = $(this).data('ident'); 
		console.log(ident);
		$("#" + ident).slideToggle("fast"); // blendet beim Klick auf "dt" die nächste "dd" ein. 
		
		if ($('#ico' + ident).hasClass('fa-plus')){
			$('#ico' + ident).removeClass('fa-plus');
			$('#ico' + ident).addClass('fa-minus');
		} else if($('#ico' + ident).hasClass('fa-minus')){
			$('#ico' + ident).removeClass('fa-minus');
			$('#ico' + ident).addClass('fa-plus');
		}
	});	
});