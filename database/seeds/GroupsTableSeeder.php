<?php
use Carbon\Carbon;
use App\Models\Auth\Group;
use Illuminate\Database\Seeder;

class GroupsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $timestamps = [
          'created_at' => $t = Carbon::now(), 'updated_at' => $t
        ];
        Group::insert([
          array_merge(['name' => 'Admin', 'permisions' => 'all' ], $timestamps),
          array_merge(['name' => 'User', 'permisions' => 'some' ], $timestamps),
          array_merge(['name' => 'Guest', 'permisions' => 'none' ], $timestamps)
        ]);
    }
}
