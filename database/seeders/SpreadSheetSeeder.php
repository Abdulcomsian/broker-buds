<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SpreadSheet;

class SpreadSheetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $spreadSheet = new SpreadSheet;
        $spreadSheet->spread_sheet_id = '1OUYy0xmCqU6rgcBQEElvMchqEeeM60q8ePtfEc_jBmM';
        $spreadSheet->name = 'Demo';
        $spreadSheet->save();
    }
}
