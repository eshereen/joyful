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
                'title' => 'product_management_access',
            ],
            [
                'id'    => 18,
                'title' => 'product_category_create',
            ],
            [
                'id'    => 19,
                'title' => 'product_category_edit',
            ],
            [
                'id'    => 20,
                'title' => 'product_category_show',
            ],
            [
                'id'    => 21,
                'title' => 'product_category_delete',
            ],
            [
                'id'    => 22,
                'title' => 'product_category_access',
            ],
            [
                'id'    => 23,
                'title' => 'product_tag_create',
            ],
            [
                'id'    => 24,
                'title' => 'product_tag_edit',
            ],
            [
                'id'    => 25,
                'title' => 'product_tag_show',
            ],
            [
                'id'    => 26,
                'title' => 'product_tag_delete',
            ],
            [
                'id'    => 27,
                'title' => 'product_tag_access',
            ],
            [
                'id'    => 28,
                'title' => 'product_create',
            ],
            [
                'id'    => 29,
                'title' => 'product_edit',
            ],
            [
                'id'    => 30,
                'title' => 'product_show',
            ],
            [
                'id'    => 31,
                'title' => 'product_delete',
            ],
            [
                'id'    => 32,
                'title' => 'product_access',
            ],
            [
                'id'    => 33,
                'title' => 'shipping_access',
            ],
            [
                'id'    => 34,
                'title' => 'countery_create',
            ],
            [
                'id'    => 35,
                'title' => 'countery_edit',
            ],
            [
                'id'    => 36,
                'title' => 'countery_show',
            ],
            [
                'id'    => 37,
                'title' => 'countery_delete',
            ],
            [
                'id'    => 38,
                'title' => 'countery_access',
            ],
            [
                'id'    => 39,
                'title' => 'city_create',
            ],
            [
                'id'    => 40,
                'title' => 'city_edit',
            ],
            [
                'id'    => 41,
                'title' => 'city_show',
            ],
            [
                'id'    => 42,
                'title' => 'city_delete',
            ],
            [
                'id'    => 43,
                'title' => 'city_access',
            ],
            [
                'id'    => 44,
                'title' => 'area_create',
            ],
            [
                'id'    => 45,
                'title' => 'area_edit',
            ],
            [
                'id'    => 46,
                'title' => 'area_show',
            ],
            [
                'id'    => 47,
                'title' => 'area_delete',
            ],
            [
                'id'    => 48,
                'title' => 'area_access',
            ],
            [
                'id'    => 49,
                'title' => 'shipment_create',
            ],
            [
                'id'    => 50,
                'title' => 'shipment_edit',
            ],
            [
                'id'    => 51,
                'title' => 'shipment_show',
            ],
            [
                'id'    => 52,
                'title' => 'shipment_delete',
            ],
            [
                'id'    => 53,
                'title' => 'shipment_access',
            ],
            [
                'id'    => 54,
                'title' => 'shipment_company_create',
            ],
            [
                'id'    => 55,
                'title' => 'shipment_company_edit',
            ],
            [
                'id'    => 56,
                'title' => 'shipment_company_show',
            ],
            [
                'id'    => 57,
                'title' => 'shipment_company_delete',
            ],
            [
                'id'    => 58,
                'title' => 'shipment_company_access',
            ],
            [
                'id'    => 59,
                'title' => 'order_mangement_access',
            ],
            [
                'id'    => 60,
                'title' => 'order_create',
            ],
            [
                'id'    => 61,
                'title' => 'order_edit',
            ],
            [
                'id'    => 62,
                'title' => 'order_show',
            ],
            [
                'id'    => 63,
                'title' => 'order_delete',
            ],
            [
                'id'    => 64,
                'title' => 'order_access',
            ],
            [
                'id'    => 65,
                'title' => 'coupon_create',
            ],
            [
                'id'    => 66,
                'title' => 'coupon_edit',
            ],
            [
                'id'    => 67,
                'title' => 'coupon_show',
            ],
            [
                'id'    => 68,
                'title' => 'coupon_delete',
            ],
            [
                'id'    => 69,
                'title' => 'coupon_access',
            ],
            [
                'id'    => 70,
                'title' => 'size_create',
            ],
            [
                'id'    => 71,
                'title' => 'size_edit',
            ],
            [
                'id'    => 72,
                'title' => 'size_show',
            ],
            [
                'id'    => 73,
                'title' => 'size_delete',
            ],
            [
                'id'    => 74,
                'title' => 'size_access',
            ],
            [
                'id'    => 75,
                'title' => 'sale_create',
            ],
            [
                'id'    => 76,
                'title' => 'sale_edit',
            ],
            [
                'id'    => 77,
                'title' => 'sale_show',
            ],
            [
                'id'    => 78,
                'title' => 'sale_delete',
            ],
            [
                'id'    => 79,
                'title' => 'sale_access',
            ],
            [
                'id'    => 80,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
