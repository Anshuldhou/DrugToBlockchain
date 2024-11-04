// web3.js setup
const Web3 = require('web3');
const web3 = new Web3('https://ropsten.infura.io/v3/YOUR_INFURA_PROJECT_ID');

// Contract setup
const contractABI = [
    {
        "inputs": [
            {
                "internalType": "string",
                "name": "batchNumber",
                "type": "string"
            },
            {
                "internalType": "string",
                "name": "name",
                "type": "string"
            },
            {
                "internalType": "string",
                "name": "expiryDate",
                "type": "string"
            },
            {
                "internalType": "string",
                "name": "manufacturer",
                "type": "string"
            }
        ],
        "name": "addDrug",
        "outputs": [],
        "stateMutability": "nonpayable",
        "type": "function"
    },
    {
        "inputs": [
            {
                "internalType": "string",
                "name": "batchNumber",
                "type": "string"
            }
        ],
        "name": "getDrug",
        "outputs": [
            {
                "internalType": "string",
                "name": "",
                "type": "string"
            },
            {
                "internalType": "string",
                "name": "",
                "type": "string"
            },
            {
                "internalType": "string",
                "name": "",
                "type": "string"
            },
            {
                "internalType": "string",
                "name": "",
                "type": "string"
            }
        ],
        "stateMutability": "view",
        "type": "function"
    }
];
const contractAddress = 'YOUR_CONTRACT_ADDRESS';
const contract = new web3.eth.Contract(contractABI, contractAddress);

// Function to add a drug
async function addDrug(batchNumber, name, expiryDate, manufacturer) {
    const accounts = await web3.eth.getAccounts();
    await contract.methods.addDrug(batchNumber, name, expiryDate, manufacturer).send({ from: accounts[0] });
}
