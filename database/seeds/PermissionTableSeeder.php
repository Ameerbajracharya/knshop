<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'user',
        	'create-user',
        	'edit-user',
        	'delete-user',
            'show-user',
            'role',
            'create-role',
            'edit-role',
            'delete-role',
            'show-role', 
            'permission',
            'create-permission',
            'edit-permission',
            'delete-permission',
            'show-permission',
            'slider',
            'slider-create',
            'slider-edit',
            'slider-delete',
            'slider-status',
            'product',
            'product-create',
            'product-edit',
            'product-delete',
            'product-status',
            'product-detail',
            'product-detail-create',
            'product-detail-edit',
            'product-detail-delete',
            'product-category',
            'product-category-create',
            'product-category-edit',
            'product-category-delete',
            'product-category-status',
            'product-brand',
            'product-brand-create',
            'product-brand-edit',
            'product-brand-delete',
            'product-brand-status',
        ];
        foreach ($permissions as $permission) {
             Permission::create(['name' => $permission]);
        }
    }
}
