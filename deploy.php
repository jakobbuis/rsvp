<?php
namespace Deployer;

require 'recipe/laravel.php';

set('repository', 'git@github.com:jakobbuis/rsvp.git');
add('shared_files', []);
add('shared_dirs', []);
add('writable_dirs', []);

host('jakobbuis.nl')
    ->set('remote_user', 'jakob')
    ->set('deploy_path', '/srv/rsvp');
