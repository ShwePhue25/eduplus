<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\State;
use App\Models\Country;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CountryStateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*------------------------------------------
        --------------------------------------------
        Myanmar Country Data
        --------------------------------------------
        --------------------------------------------*/
        $country = Country::create(['name' => 'Myanmar']);

        $state = State::create(['country_id' => $country->id, 'name' => 'Ka Chin']);

        City::create(['state_id' => $state->id, 'name' => 'Myint Kyi Nar']);
        City::create(['state_id' => $state->id, 'name' => 'Pu Tar O']);

        /*------------------------------------------
        --------------------------------------------
        Myanmar Country Data
        --------------------------------------------
        --------------------------------------------*/
        $country = Country::create(['name' => 'Myanmar']);

        $state = State::create(['country_id' => $country->id, 'name' => 'Ka Yah']);

        City::create(['state_id' => $state->id, 'name' => 'Loi Kaw']);
        City::create(['state_id' => $state->id, 'name' => 'Bankom']);
    }
}
