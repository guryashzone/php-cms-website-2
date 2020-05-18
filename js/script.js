

$(document).on('click', '.showPwd', function(){
	var type = $('#userPwdInput').attr('type');

	if ( type == 'password') {
		$('#userPwdInput').attr('type', 'text');
	} else {
		$('#userPwdInput').attr('type', 'password');
	}
	$('.showPwd').children('span').toggleClass('fa-eye-slash fa-eye');
	
})




$(document).on('click', '#searchBlogBtn', function(){
	var searchQuery = $('#searchInput').val();
	$("#serachedKeywords").append( '<li>' + searchQuery + '</li>' );
})

$(document).on('click', '#clearSearchList', function(){
	// $("#serachedKeywords").html('');	
	// $("#serachedKeywords").empty();	
	$("#serachedKeywords").remove();
})
