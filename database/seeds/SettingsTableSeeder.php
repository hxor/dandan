<?php

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $setting = [
            'name' => 'Dandan',
            'address' => 'Jl. DR. Cipto Mangunkusumo, No 26 Kesambi, Cirebon 45131',
            'phone' => '(0231) 236-352',
            'logo' => '/photos/shares/Settings/dandan.png',
            'aboutus' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin semper nulla eu nisl malesuada aliquam. Etiam rhoncus, ante nec tempus accumsan, ligula justo sollicitudin leo, quis vestibulum neque leo vel diam. Nullam id fermentum urna.'
        ];

        DB::table('settings')->insert($setting);
    }
}
