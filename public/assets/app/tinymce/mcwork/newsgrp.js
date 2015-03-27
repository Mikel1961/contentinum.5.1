(function ($){
	$.fn.McworkNewsParams = function(val, elm) {
		var opts = {};
		if (0 == val){
			return false;
		}
		opts.url = '/mcwork/services/application/newsgroupparams';
		opts.data = { id : val };	
		var datas = Mcwork.Server.request(opts);
		
		if (datas.hasOwnProperty('publishAuthor') ){
			$('#publishAuthor').val(datas.publishAuthor);	
		}
		
		if (datas.hasOwnProperty('authorEmail') ) {
			$('#authorEmail').val(datas.authorEmail);
		}
		
		if (datas.hasOwnProperty('numberCharacterTeaser') ){
			$('#numberCharacterTeaser').val(datas.numberCharacterTeaser);	
		}
		if (datas.hasOwnProperty('labelReadMore') ) {
			$('#labelReadMore').val(datas.labelReadMore);
		}
	};
})(jQuery);
$(document).ready(function() {
	if ( $("#webContentgroup").length) {
		var val = $("#webContentgroup").val();
		$().McworkNewsParams(val, this);
		$("#webContentgroup").change( function(){
			$().McworkNewsParams($("#webContentgroup").val(), this);
		});
	}		
});