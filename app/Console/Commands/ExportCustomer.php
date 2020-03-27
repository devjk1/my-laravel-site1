<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use League\Csv\Writer;
use App\Customer;

class ExportCustomer extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:ExportCustomer';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Export Customers to csv';

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
        // copy paste path to database/csv folder
        $path = '/copy/paste/path/to/database/csv' . '/customer' . date("Y-m-dh:m:s") . '.csv';
        $writer = Writer::createFromPath($path, 'w+');
        $records = Customer::all();
        $header = ['id', 'first_name', 'last_name', 'email', 'created_at', 'updated_at'];
        $writer->insertOne($header);

        foreach ($records as $record) {
            $writer->insertOne($record->toArray());
        }
    }
}
