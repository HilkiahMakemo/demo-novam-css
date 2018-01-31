<?php

Route::namespace('Site')->group(function(){
	Route::any('/', HomePageController::class);
	Route::any('/about-our-company', AboutPageController::class);
	Route::any('/about-our-company/our-staff-members', AboutPageController::class);
	Route::any('/about-our-company/our-sponsors', AboutPageController::class);
	Route::any('/our-blog-articles', BlogHolderController::class);
	Route::any('/our-blog-articles/our-first-blog-article', BlogPageController::class);
	Route::any('/our-blog-articles/2nd-blog-article', BlogPageController::class);
	Route::any('/contact-us', AboutPageController::class);
	Route::any('/features', AboutPageController::class);
	Route::any('/pricing', AboutPageController::class);
	Route::any('/features/our-services', AboutPageController::class);
	Route::any('/comments', AboutPageController::class);
	Route::any('/consultation', AboutPageController::class);
});