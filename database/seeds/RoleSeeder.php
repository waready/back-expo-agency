<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = Role::create(['name' => 'Administrador']);
        $role2 = Role::create(['name' => 'Especialista_drep']);
        $role3 = Role::create(['name' => 'Especialista_ugel']);
        $role4 = Role::create(['name' => 'Director']);
        
        Permission::create(['name' => 'admin.home'])->syncRoles([$role1,$role2]);

        Permission::create(['name' => 'admin.drep.index'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'admin.drep.create'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'admin.drep.edit'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'admin.drep.destroy'])->syncRoles([$role1,$role2]);

        Permission::create(['name' => 'admin.ugel.index'])->syncRoles([$role1,$role2,$role3]);
        Permission::create(['name' => 'admin.ugel.create'])->syncRoles([$role1,$role2,$role3]);
        Permission::create(['name' => 'admin.ugel.edit'])->syncRoles([$role1,$role2,$role3]);
        Permission::create(['name' => 'admin.ugel.destroy'])->syncRoles([$role1,$role2,$role3]);

        Permission::create(['name' => 'admin.director.index'])->syncRoles([$role1,$role2,$role3,$role4]);
        Permission::create(['name' => 'admin.director.create'])->syncRoles([$role1,$role2,$role3,$role4]);
        Permission::create(['name' => 'admin.director.edit'])->syncRoles([$role1,$role2,$role3,$role4]);
        Permission::create(['name' => 'admin.director.destroy'])->syncRoles([$role1,$role2,$role3,$role4]);
    }
}
