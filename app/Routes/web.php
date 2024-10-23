<?php

use App\Controllers\PostController;

// تعريف المسارات باستخدام المتغير $r
$r->addRoute('GET', '/users', [PostController::class, 'users']);
$r->addRoute('GET', '/posts', [PostController::class, 'index']);
$r->addRoute('POST', '/posts', [PostController::class, 'store']);
$r->addRoute('GET', '/posts/{id:\d+}', [PostController::class, 'show']);
$r->addRoute('PUT', '/posts/{id:\d+}', [PostController::class, 'update']);
$r->addRoute('DELETE', '/posts/{id:\d+}', [PostController::class, 'delete']);
