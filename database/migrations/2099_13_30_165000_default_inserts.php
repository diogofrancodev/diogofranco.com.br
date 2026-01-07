<?php

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Migrations\Migration;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Hash;

class DefaultInserts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     * @throws Exception
     */
    public function up(): void
    {

        $roles = [
            [
                'name' => 'Desenvolvedor',
                'guard_name' => 'web',
            ],
            [
                'name' => 'Administrador',
                'guard_name' => 'web',
            ],
            [
                'name' => 'Funcionário',
                'guard_name' => 'web',
            ],
            [
                'name' => 'Parceiro',
                'guard_name' => 'web',
            ]
        ];

        foreach ($roles as $role) {
            Role::firstOrCreate($role);
        }

        Role::findByName('Desenvolvedor')->permissions()->firstOrCreate(['name' => 'permission-show', 'guard_name' => 'web']);
        Role::findByName('Desenvolvedor')->permissions()->firstOrCreate(['name' => 'permission-create', 'guard_name' => 'web']);
        Role::findByName('Desenvolvedor')->permissions()->firstOrCreate(['name' => 'permission-store', 'guard_name' => 'web']);
        Role::findByName('Desenvolvedor')->permissions()->firstOrCreate(['name' => 'permission-edit', 'guard_name' => 'web']);
        Role::findByName('Desenvolvedor')->permissions()->firstOrCreate(['name' => 'permission-update', 'guard_name' => 'web']);
        Role::findByName('Desenvolvedor')->permissions()->firstOrCreate(['name' => 'permission-delete', 'guard_name' => 'web']);
        Role::findByName('Desenvolvedor')->permissions()->firstOrCreate(['name' => 'role-show', 'guard_name' => 'web']);
        Role::findByName('Desenvolvedor')->permissions()->firstOrCreate(['name' => 'role-create', 'guard_name' => 'web']);
        Role::findByName('Desenvolvedor')->permissions()->firstOrCreate(['name' => 'role-store', 'guard_name' => 'web']);
        Role::findByName('Desenvolvedor')->permissions()->firstOrCreate(['name' => 'role-edit', 'guard_name' => 'web']);
        Role::findByName('Desenvolvedor')->permissions()->firstOrCreate(['name' => 'role-update', 'guard_name' => 'web']);
        Role::findByName('Desenvolvedor')->permissions()->firstOrCreate(['name' => 'role-delete', 'guard_name' => 'web']);
        Role::findByName('Desenvolvedor')->permissions()->firstOrCreate(['name' => 'user-show', 'guard_name' => 'web']);
        Role::findByName('Desenvolvedor')->permissions()->firstOrCreate(['name' => 'user-create', 'guard_name' => 'web']);
        Role::findByName('Desenvolvedor')->permissions()->firstOrCreate(['name' => 'user-store', 'guard_name' => 'web']);
        Role::findByName('Desenvolvedor')->permissions()->firstOrCreate(['name' => 'user-edit', 'guard_name' => 'web']);
        Role::findByName('Desenvolvedor')->permissions()->firstOrCreate(['name' => 'user-update', 'guard_name' => 'web']);
        Role::findByName('Desenvolvedor')->permissions()->firstOrCreate(['name' => 'user-delete', 'guard_name' => 'web']);

        Role::findByName('Desenvolvedor')->permissions()->firstOrCreate(['name' => 'dashboard-index', 'guard_name' => 'web']);

        Role::findByName('Desenvolvedor')->permissions()->firstOrCreate(['name' => 'categorypost-index', 'guard_name' => 'web']);
        Role::findByName('Desenvolvedor')->permissions()->firstOrCreate(['name' => 'categorypost-show', 'guard_name' => 'web']);
        Role::findByName('Desenvolvedor')->permissions()->firstOrCreate(['name' => 'categorypost-store', 'guard_name' => 'web']);
        Role::findByName('Desenvolvedor')->permissions()->firstOrCreate(['name' => 'categorypost-create', 'guard_name' => 'web']);
        Role::findByName('Desenvolvedor')->permissions()->firstOrCreate(['name' => 'categorypost-edit', 'guard_name' => 'web']);
        Role::findByName('Desenvolvedor')->permissions()->firstOrCreate(['name' => 'categorypost-update', 'guard_name' => 'web']);
        Role::findByName('Desenvolvedor')->permissions()->firstOrCreate(['name' => 'categorypost-destroy', 'guard_name' => 'web']);

        Role::findByName('Desenvolvedor')->permissions()->firstOrCreate(['name' => 'depoiment-index', 'guard_name' => 'web']);
        Role::findByName('Desenvolvedor')->permissions()->firstOrCreate(['name' => 'depoiment-show', 'guard_name' => 'web']);
        Role::findByName('Desenvolvedor')->permissions()->firstOrCreate(['name' => 'depoiment-store', 'guard_name' => 'web']);
        Role::findByName('Desenvolvedor')->permissions()->firstOrCreate(['name' => 'depoiment-create', 'guard_name' => 'web']);
        Role::findByName('Desenvolvedor')->permissions()->firstOrCreate(['name' => 'depoiment-edit', 'guard_name' => 'web']);
        Role::findByName('Desenvolvedor')->permissions()->firstOrCreate(['name' => 'depoiment-update', 'guard_name' => 'web']);
        Role::findByName('Desenvolvedor')->permissions()->firstOrCreate(['name' => 'depoiment-destroy', 'guard_name' => 'web']);

        Role::findByName('Desenvolvedor')->permissions()->firstOrCreate(['name' => 'post-index', 'guard_name' => 'web']);
        Role::findByName('Desenvolvedor')->permissions()->firstOrCreate(['name' => 'post-show', 'guard_name' => 'web']);
        Role::findByName('Desenvolvedor')->permissions()->firstOrCreate(['name' => 'post-store', 'guard_name' => 'web']);
        Role::findByName('Desenvolvedor')->permissions()->firstOrCreate(['name' => 'post-create', 'guard_name' => 'web']);
        Role::findByName('Desenvolvedor')->permissions()->firstOrCreate(['name' => 'post-edit', 'guard_name' => 'web']);
        Role::findByName('Desenvolvedor')->permissions()->firstOrCreate(['name' => 'post-update', 'guard_name' => 'web']);
        Role::findByName('Desenvolvedor')->permissions()->firstOrCreate(['name' => 'post-destroy', 'guard_name' => 'web']);

        Role::findByName('Desenvolvedor')->permissions()->firstOrCreate(['name' => 'config-index', 'guard_name' => 'web']);
        Role::findByName('Desenvolvedor')->permissions()->firstOrCreate(['name' => 'config-show', 'guard_name' => 'web']);
        Role::findByName('Desenvolvedor')->permissions()->firstOrCreate(['name' => 'config-store', 'guard_name' => 'web']);
        Role::findByName('Desenvolvedor')->permissions()->firstOrCreate(['name' => 'config-create', 'guard_name' => 'web']);
        Role::findByName('Desenvolvedor')->permissions()->firstOrCreate(['name' => 'config-edit', 'guard_name' => 'web']);
        Role::findByName('Desenvolvedor')->permissions()->firstOrCreate(['name' => 'config-update', 'guard_name' => 'web']);
        Role::findByName('Desenvolvedor')->permissions()->firstOrCreate(['name' => 'config-destroy', 'guard_name' => 'web']);



        if (!App::environment('production')) {
            Model::withoutEvents(function () {
                User::create([
                        'name' => 'Admin',
                        'email' => 'admin@admin.com',
                        'password' => Hash::make('admin')
                    ]
                );
            });
            User::find(1)->syncRoles(Role::all());
        }

        if(App::environment('production')) {
            Model::withoutEvents(function () {
                User::create([
                        'name' => 'Admin',
                        'email' => 'diogo@diogofranco.com.br',
                        'password' => Hash::make('admin123')
                    ]
                );
            });
            User::find(1)->syncRoles(Role::all());
        }
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
    }
}
