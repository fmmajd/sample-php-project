<?php

Route::resource('posts', 'PostController')->only(['store']);
