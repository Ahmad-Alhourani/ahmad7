<?php

Breadcrumbs::for('admin.dashboard', function ($trail) {
    $trail->push(
        __('strings.backend.dashboard.title'),
        route('admin.dashboard')
    );
});

//start_Hello_start
Breadcrumbs::register('admin.hello.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(
        __('strings.backend.helloes.title'),
        route('admin.hello.index')
    );
});

Breadcrumbs::register('admin.hello.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.hello.index');
    $breadcrumbs->push(
        __('labels.backend.helloes.create'),
        route('admin.hello.create')
    );
});

Breadcrumbs::register('admin.hello.show', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.hello.index');
    $breadcrumbs->push(
        __('menus.backend.helloes.view'),
        route('admin.hello.show', $id)
    );
});

Breadcrumbs::register('admin.hello.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.hello.index');
    $breadcrumbs->push(
        __('menus.backend.helloes.edit'),
        route('admin.hello.edit', $id)
    );
});
//end_Hello_end

//*****Do Not Delete Me

require __DIR__ . '/auth.php';
require __DIR__ . '/log-viewer.php';
