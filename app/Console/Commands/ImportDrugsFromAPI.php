<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use App\Models\Drug;

class ImportDrugsFromAPI extends Command
{
    protected $signature = 'import:drugs';
    protected $description = 'Imports drugs data from external API';

    public function handle()
    {
        // Fetch data from the API
        $response = Http::get('https://api.fda.gov/drug/label.json', [
            'api_key' => 'YOUR_API_KEY',  // Replace with your actual API key
            'limit' => 100,               // Set the limit as per API restrictions
        ]);

        if ($response->ok()) {
            $drugs = $response->json()['results'];
            foreach ($drugs as $drugData) {
                Drug::updateOrCreate(
                    ['name' => $drugData['openfda']['generic_name'][0] ?? 'Unknown'],
                    [
                        'manufacturer' => $drugData['openfda']['manufacturer_name'][0] ?? 'Unknown',
                        'batch_number' => $drugData['set_id'] ?? null,
                        'expiry_date' => $drugData['effective_time'] ?? null,
                    ]
                );
            }
            $this->info("Drugs imported successfully!");
        } else {
            $this->error("Failed to fetch drug data. Status Code: " . $response->status());
            $this->error("Response: " . $response->body());
        }
    }
}
