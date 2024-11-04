<?php

namespace App\Services\Blockchain;

use GuzzleHttp\Client;

class DrugVerificationService
{
    protected $client;
    protected $contractAddress;
    protected $fromAddress;
    protected $abi;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => 'https://ropsten.infura.io/v3/YOUR_INFURA_PROJECT_ID', // or local node URI
        ]);

        $this->contractAddress = 'YOUR_CONTRACT_ADDRESS';
        $this->fromAddress = 'YOUR_ETHEREUM_ADDRESS';

        // Paste the ABI JSON as a string here or load it from a file
        $this->abi = json_decode('YOUR_CONTRACT_ABI_JSON', true);
    }

    public function addDrug($batchNumber, $name, $expiryDate, $manufacturer)
    {
        $encodedData = $this->encodeFunctionCall('addDrug', [
            $batchNumber,
            $name,
            $expiryDate,
            $manufacturer
        ]);

        $response = $this->client->post('', [
            'json' => [
                'jsonrpc' => '2.0',
                'method' => 'eth_sendTransaction',
                'params' => [
                    [
                        'from' => $this->fromAddress,
                        'to' => $this->contractAddress,
                        'data' => $encodedData,
                    ]
                ],
                'id' => 1,
            ]
        ]);

        $result = json_decode($response->getBody()->getContents(), true);

        if (isset($result['error'])) {
            throw new \Exception($result['error']['message']);
        }

        return $result['result'];
    }

    public function getDrug($batchNumber)
    {
        $encodedData = $this->encodeFunctionCall('getDrug', [$batchNumber]);

        $response = $this->client->post('', [
            'json' => [
                'jsonrpc' => '2.0',
                'method' => 'eth_call',
                'params' => [
                    [
                        'to' => $this->contractAddress,
                        'data' => $encodedData,
                    ],
                    'latest'
                ],
                'id' => 1,
            ]
        ]);

        $result = json_decode($response->getBody()->getContents(), true);

        if (isset($result['error'])) {
            throw new \Exception($result['error']['message']);
        }

        return $result['result'];
    }

    private function encodeFunctionCall($functionName, $params)
    {
        // Encoding logic here: you'd typically use the `abi.encodeFunctionCall` method in Web3 libraries
        // However, without a library like web3.js, you need to handle encoding manually or use a service that does this.
        throw new \Exception('Function encoding is not implemented. Consider using web3.js in a frontend.');
    }
}
