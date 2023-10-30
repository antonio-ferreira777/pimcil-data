<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'product_create',
            ],
            [
                'id'    => 18,
                'title' => 'product_edit',
            ],
            [
                'id'    => 19,
                'title' => 'product_show',
            ],
            [
                'id'    => 20,
                'title' => 'product_delete',
            ],
            [
                'id'    => 21,
                'title' => 'product_access',
            ],
            [
                'id'    => 22,
                'title' => 'brand_create',
            ],
            [
                'id'    => 23,
                'title' => 'brand_edit',
            ],
            [
                'id'    => 24,
                'title' => 'brand_show',
            ],
            [
                'id'    => 25,
                'title' => 'brand_delete',
            ],
            [
                'id'    => 26,
                'title' => 'brand_access',
            ],
            [
                'id'    => 27,
                'title' => 'color_create',
            ],
            [
                'id'    => 28,
                'title' => 'color_edit',
            ],
            [
                'id'    => 29,
                'title' => 'color_show',
            ],
            [
                'id'    => 30,
                'title' => 'color_delete',
            ],
            [
                'id'    => 31,
                'title' => 'color_access',
            ],
            [
                'id'    => 32,
                'title' => 'country_create',
            ],
            [
                'id'    => 33,
                'title' => 'country_edit',
            ],
            [
                'id'    => 34,
                'title' => 'country_show',
            ],
            [
                'id'    => 35,
                'title' => 'country_delete',
            ],
            [
                'id'    => 36,
                'title' => 'country_access',
            ],
            [
                'id'    => 37,
                'title' => 'food_create',
            ],
            [
                'id'    => 38,
                'title' => 'food_edit',
            ],
            [
                'id'    => 39,
                'title' => 'food_show',
            ],
            [
                'id'    => 40,
                'title' => 'food_delete',
            ],
            [
                'id'    => 41,
                'title' => 'food_access',
            ],
            [
                'id'    => 42,
                'title' => 'grape_create',
            ],
            [
                'id'    => 43,
                'title' => 'grape_edit',
            ],
            [
                'id'    => 44,
                'title' => 'grape_show',
            ],
            [
                'id'    => 45,
                'title' => 'grape_delete',
            ],
            [
                'id'    => 46,
                'title' => 'grape_access',
            ],
            [
                'id'    => 47,
                'title' => 'region_create',
            ],
            [
                'id'    => 48,
                'title' => 'region_edit',
            ],
            [
                'id'    => 49,
                'title' => 'region_show',
            ],
            [
                'id'    => 50,
                'title' => 'region_delete',
            ],
            [
                'id'    => 51,
                'title' => 'region_access',
            ],
            [
                'id'    => 52,
                'title' => 'taxonomy_create',
            ],
            [
                'id'    => 53,
                'title' => 'taxonomy_edit',
            ],
            [
                'id'    => 54,
                'title' => 'taxonomy_show',
            ],
            [
                'id'    => 55,
                'title' => 'taxonomy_delete',
            ],
            [
                'id'    => 56,
                'title' => 'taxonomy_access',
            ],
            [
                'id'    => 57,
                'title' => 'winemaker_create',
            ],
            [
                'id'    => 58,
                'title' => 'winemaker_edit',
            ],
            [
                'id'    => 59,
                'title' => 'winemaker_show',
            ],
            [
                'id'    => 60,
                'title' => 'winemaker_delete',
            ],
            [
                'id'    => 61,
                'title' => 'winemaker_access',
            ],
            [
                'id'    => 62,
                'title' => 'field_create',
            ],
            [
                'id'    => 63,
                'title' => 'field_edit',
            ],
            [
                'id'    => 64,
                'title' => 'field_show',
            ],
            [
                'id'    => 65,
                'title' => 'field_delete',
            ],
            [
                'id'    => 66,
                'title' => 'field_access',
            ],
            [
                'id'    => 67,
                'title' => 'fields_data_create',
            ],
            [
                'id'    => 68,
                'title' => 'fields_data_edit',
            ],
            [
                'id'    => 69,
                'title' => 'fields_data_show',
            ],
            [
                'id'    => 70,
                'title' => 'fields_data_delete',
            ],
            [
                'id'    => 71,
                'title' => 'fields_data_access',
            ],
            [
                'id'    => 72,
                'title' => 'fields_group_create',
            ],
            [
                'id'    => 73,
                'title' => 'fields_group_edit',
            ],
            [
                'id'    => 74,
                'title' => 'fields_group_show',
            ],
            [
                'id'    => 75,
                'title' => 'fields_group_delete',
            ],
            [
                'id'    => 76,
                'title' => 'fields_group_access',
            ],
            [
                'id'    => 77,
                'title' => 'fields_setup_access',
            ],
            [
                'id'    => 78,
                'title' => 'values_setup_access',
            ],
            [
                'id'    => 79,
                'title' => 'producer_create',
            ],
            [
                'id'    => 80,
                'title' => 'producer_edit',
            ],
            [
                'id'    => 81,
                'title' => 'producer_show',
            ],
            [
                'id'    => 82,
                'title' => 'producer_delete',
            ],
            [
                'id'    => 83,
                'title' => 'producer_access',
            ],
        ];

        Permission::insert($permissions);
    }
}
