<?php

Route::get('', ['as' => 'admin.dashboard', function () {
	return redirect('admin/feedback');
}]);

Route::get('contacts', [function () {
	return redirect('admin/contacts/1/edit');
}]);

Route::get('abouts', [function () {
	return redirect('admin/abouts/1/edit');
}]);