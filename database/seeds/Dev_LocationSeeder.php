<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Schema;
use Flynsarmy\CsvSeeder\CsvSeeder;


class Dev_LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    protected $table;
    protected $csv_delimiter;
    protected $filename;
    protected $offset_rows;
    protected $mapping;
    protected $should_trim;

    public function __construct()
    {

        $this->table = 'dev_location';
        $this->csv_delimiter=',';
        $this->filename = base_path() . '/database/csv/location4.csv';
        $this->offset_rows=1;
        $this->mapping = [
            0 => 'dev_city',
            1 => 'dev_district',
            2 => 'num_id',
        ];
        $this->should_trim = false;
    }


    public function run()
    {
//        App\Location::truncate();
        DB::table($this->table)->delete();
        $seedData = $this->seedFromCSV($this->filename, ',');
        DB::table($this->table)->insert($seedData);
        //
    }
    private function seedFromCSV($filename, $csv_delimiter = ",")
    {
        if (!file_exists($filename) || !is_readable($filename)) {
            return FALSE;
        }

        $header = NULL;
        $data = array();

        if (($handle = fopen($filename, 'r')) !== FALSE) {
            while (($row = fgetcsv($handle, 1000, $csv_delimiter)) !== FALSE) {
                if (!$header) {
                    $header = $row;
                } else {
                    $data[] = array_combine($header, $row);
                }
            }
            fclose($handle);
        }

        return $data;
    }

}
