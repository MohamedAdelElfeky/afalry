<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $settings = [
            ['key' => 'site_name', 'value' => 'Afalry'],
            ['key' => 'marketing_rate', 'value' => '10'],
            ['key' => 'api_store_menu', 'value' => 'https://fvtion.com/API/afirly/store_menu.php'],
            ['key' => 'api_order_status', 'value' => 'https://fvtion.com/API/afirly/OrderStatus.php'],
            ['key' => 'api_cities', 'value' => 'https://fvtion.com/API/afirly/get/get_Cities.php'],
            ['key' => 'api_branches', 'value' => 'https://fvtion.com/API/afirly/get/get_branches.php'],
            ['key' => 'api_reasons', 'value' => 'https://fvtion.com/API/afirly/get/Reasons.php'],
            ['key' => 'api_products ', 'value' => 'https://fvtion.com/API/afirly/aljard.php'],
            ['key' => 'api_item_data ', 'value' => 'https://fvtion.com/API/afirly/ItemDataAPI.php'],
            ['key' => 'api_order_tracking ', 'value' => 'https://fvtion.com/API/afirly/OrderTracking.php'],
            ['key' => 'currency ', 'value' => 'LYD'],
        ];

        foreach ($settings as $setting) {
            Setting::create($setting);
        }
    }
}
