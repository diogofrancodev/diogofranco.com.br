<?php
namespace Deployer;

require 'recipe/laravel.php';
require 'contrib/npm.php';
require 'contrib/php-fpm.php';

set('application', 'diogofranco.com.br');
set('repository', 'git@github.com:diogofrancodev/diogofranco.com.br.git');
set('http_user', 'www-data');
set('ssh_multiplexing', true);
set('git_tty', false);
set('default_timeout', 0);
set('php8.2-fpm', '8.2');

host('production')
    ->set('remote_user', 'root')
    ->set('hostname', '194.163.153.154')
    ->set('port', '4321')
    ->set('deploy_path', '/var/www/{{application}}/production')
    ->set('multiplexing', true);

    task('deploy', [
        'deploy:info',
        'deploy:prepare',
        'deploy:vendors',
        'artisan:storage:link',
        'artisan:view:cache',
        'artisan:config:cache',
        'artisan:migrate',
        'npm:install',
        'npm:run:build',
        'artisan:optimize',
        'deploy:publish',
        'php-fpm:reload',

    ]);

    task('artisan:optimize', function () {
        run('echo comando optimize desativado');
    });

    task('artisan:config:clear', function () {
        cd('{{release_path}}');
        run('php artisan config:clear');
    });

    task('composer:dumpautoload', function () {
        cd('{{release_path}}');
        run('composer dumpautoload');
    });

    task('npm:run:build', function () {
        cd('{{release_path}}');
        run('npm install;npm run build;');
    });

    desc('Starts the Pulse server');
    task('artisan:pulse:check', artisan('pulse:check'));


    after('artisan:optimize', 'artisan:config:clear');
    after('artisan:config:clear', 'artisan:migrate');

    after('deploy:failed', 'deploy:unlock');
