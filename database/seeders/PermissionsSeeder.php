<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Define permissions for type_payments
        $this->createPermissions([
            'add_payment', 'update_payment', 'delete_payment', 'show_payment'
        ]);

        // Define permissions for statuses
        $this->createPermissions([
            'add_status', 'update_status', 'delete_status', 'show_status'
        ]);

        // Define permissions for reasons
        $this->createPermissions([
            'add_reason', 'update_reason', 'delete_reason', 'show_reason'
        ]);

        // Define permissions for questions
        $this->createPermissions([
            'add_question', 'update_question', 'delete_question', 'show_question'
        ]);

        // Define permissions for plans
        $this->createPermissions([
            'add_plan', 'update_plan', 'delete_plan', 'show_plan'
        ]);

        // Define permissions for complaints
        $this->createPermissions([
            'add_complaint', 'update_complaint', 'delete_complaint', 'show_complaint'
        ]);

        // Define permissions for users
        $this->createPermissions([
            'add_user', 'update_user', 'delete_user', 'show_user'
        ]);

        // Define permissions for roles
        $this->createPermissions([
            'add_role', 'update_role', 'delete_role', 'show_role'
        ]);

        // Define permissions for carts
        $this->createPermissions([
            'add_cart', 'update_cart', 'delete_cart', 'show_cart'
        ]);

        // Define permissions for cities
        $this->createPermissions([
            'add_city', 'update_city', 'delete_city', 'show_city'
        ]);

        // Define permissions for dealers
        $this->createPermissions([
            'add_dealer', 'update_dealer', 'delete_dealer', 'show_dealer'
        ]);

        // Define permissions for offers
        $this->createPermissions([
            'add_offers', 'update_offers', 'delete_offers', 'show_offers'
        ]);

        // Define permissions for orders
        $this->createPermissions([
            'add_orders', 'update_orders', 'delete_orders', 'show_orders'
        ]);
    }

    /**
     * Create permissions in the database.
     *
     * @param array $permissions
     * @return void
     */
    private function createPermissions(array $permissions)
    {
        foreach ($permissions as $permission) {
            Permission::create([
                'name' => $permission,
                'guard_name' => 'web',
            ]);
        }
    }
}
