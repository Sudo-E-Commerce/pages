<?php
App::booted(function() {
	$namespace = 'Sudo\Page\Http\Controllers';
	
	Route::namespace($namespace)->name('admin.')->prefix(config('app.admin_dir'))->middleware(['web', 'auth-admin'])->group(function() {
		// Tài khoản người dùng quản trị
		Route::resource('pages', 'PageController');
	});
});