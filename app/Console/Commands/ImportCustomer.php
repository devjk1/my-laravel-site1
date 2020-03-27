<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use League\Csv\Reader;
use App\Importedcustomer;

class ImportCustomer extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:ImportCustomer';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import csv to Customers';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        // copy paste path to database/csv/customerTimestamp.csv
        $path = '/copy/paste/path/to/database/csv/customerTimestamp.csv';
        $reader = Reader::createFromPath($path, 'r');
        $reader->setHeaderOffset(0);    // column header
        $records = $reader->getRecords();
        foreach ($records as $offset => $record) {
            $importedCustomer = new Importedcustomer;
            $importedCustomer->fill($record)->save();
        }
    }
}
