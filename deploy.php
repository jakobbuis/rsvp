<?php
namespace Deployer;

require 'recipe/laravel.php';

set('application', 'rsvp');
set('repository', 'git@github.com:jakobbuis/rsvp.git');
set('keep_releases', 5);

host('jakobbuis.nl')
    ->set('remote_user', 'jakob')
    ->set('deploy_path', '/srv/rsvp')
    ->set('branch', 'main');

// Build frontend upon release
task('build:frontend', function () {
    within('{{release_path}}', function () {
        run('npm install');
        run('npm run production');
    });
});
before('deploy:publish', 'build:frontend');

// Always migrate on deployment
before('deploy:symlink', 'artisan:migrate');
