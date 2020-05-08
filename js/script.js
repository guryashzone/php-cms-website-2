function checkLoginStatus() {
	var status = window.sessionStorage.getItem( 'loginStatus' );
	if ( status == 'true' ) {
		alert( 'Welcome ' + window.sessionStorage.getItem( 'loginUser' ) );
	}
}

checkLoginStatus();

function searchBlog() {
	var searchQuery = document.getElementById('searchInput').value;

	if (searchQuery == '') {
		alert('Please enter something to search');
	} else {
		alert('You searched for ' + searchQuery);
	}
}

var credentials = [{
	fullname: 'User 1',
	username: 'userwebone',
	password: 'secret123'
}, {
	fullname: 'User 2',
	username: 'userwebtwo',
	password: 'admin@123'
}, {
	fullname: 'User 3',
	username: 'userwebthree',
	password: 'user@123'
}]

function logInUser() {
	var userNameInput = document.getElementById('userNameInput').value;
	var userPwdInput  = document.getElementById('userPwdInput').value;
	var success       = false;

	if ( userNameInput == '' ) {
		alert('Please enter a valid username!');
		return;
	}

	if ( userPwdInput == '' ) {
		alert('Please enter a valid password!');
		return;
	}

	for ( var i=0; i < credentials.length; i++ ) {
		
		if ( credentials[i].username === userNameInput && credentials[i].password === userPwdInput ) {
			success = true;
			break;
		} 

	}

	if ( success ) {
		window.sessionStorage.setItem('loginStatus', true);
		window.sessionStorage.setItem('loginUser', userNameInput);
		alert( credentials[i].fullname + '! you have successfully logged in.' );
	} else {
		alert('Invalid Credentials!');
	}
}

function logoutUser() {
	var status = window.sessionStorage.getItem( 'loginStatus' );
	if ( status == 'true' ) {
		window.sessionStorage.removeItem( 'loginStatus' )
		window.sessionStorage.removeItem( 'loginUser' )
		alert('You have successfully logged out!');
	} else {
		alert('You have not logged in yet!');
	}
}

function displayResult() {
	var city = document.getElementById('cities').value;
	alert( city );
}

function refresh() {
	window.location.reload();
}

function redirect (url) {
	window.location.href = url;
}

function goBack() {
	window.history.back();
}

function goForward() {
	window.history.forward();
}




