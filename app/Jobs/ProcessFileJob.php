<?php

namespace App\Jobs;

use App\Models\Location;

class ProcessFileJob extends Job
{

    private $fileName = '';
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($fileName)
    {
        $this->fileName = $fileName;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $file = base_path() . DIRECTORY_SEPARATOR . 'uploads' . DIRECTORY_SEPARATOR . $this->fileName;
        // move to .env file
        $record_read_limit = 1000;

        try {
            if (($fileHandler = fopen($file, "r")) !== false) {
                // skip header
                fgets($fileHandler);
                while (($data = fgetcsv($fileHandler, $record_read_limit, ",")) !== false) {
                    array_walk($data, 'self::removeHexCharacters');
                    // check whether its present or not
                    $location = Location::where([
                        ['office', '=', $data[0]],
                        ['pincode', '=', $data[1]],
                        ['office_type', '=', $data[2]],
                        ['delivery_status', '=', $data[3]],
                        ['division', '=', $data[4]],
                        ['region', '=', $data[5]],
                        ['circle', '=', $data[6]],
                        ['taluk', '=', $data[7]],
                        ['district', '=', $data[8]],
                        ['state', '=', $data[9]],
                    ])->first();

                    // if not present add record in database
                    if (empty($location)) {
                        Location::create(
                            [
                                'office' =>  $data[0],
                                'pincode' =>  $data[1],
                                'office_type' =>  $data[2],
                                'delivery_status' => $data[3],
                                'division' =>  $data[4],
                                'region' =>  $data[5],
                                'circle' =>  $data[6],
                                'taluk' =>  $data[7],
                                'district' =>  $data[8],
                                'state' =>  $data[9]
                            ]
                        );
                    }
                }
                fclose($fileHandler);
            }
        } catch (\Exception $e) {
            //var_dump($e->getMessage());
        }
    }

    static function removeHexCharacters($string){
        return preg_replace('/[\x00-\x1F\x80-\xFF]/', '', $string);
    }
}
