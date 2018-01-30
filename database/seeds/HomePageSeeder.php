<?php

use Illuminate\Database\Seeder;

use App\Models\CMS\SiteMap;
use App\Models\CMS\SitePage;
use App\Http\Controllers\Site\HomePageController;

class HomePageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $Map = SiteMap::create([
          'type' => HomePageController::class,
          'title' => 'Welcome to Our Site',
          'icon'  => 'home',
          'label' => 'Home',
          'link'  => '/',
          'settings' => ['visible' => true, 'searchable' => true],
          'online' => ['when' => 'always'],
          'viewer' => 'all'
        ]);

        SitePage::create([
          'site_map_id' => $Map->id
        ]);
    }
}
