// drugVerification.js
const Web3 = require('web3');

// Initialize web3
const web3 = new Web3('https://ropsten.infura.io/v3/YOUR_INFURA_PROJECT_ID'); // Replace with your Infura project ID

// Contract details
const contractABI = [ /* YOUR_CONTRACT_ABI */ ]; // Replace with your actual contract ABI
const contractAddress = 'YOUR_CONTRACT_ADDRESS'; // Replace with your actual contract address
const contract = new web3.eth.Contract(contractABI, contractAddress);

// Function to add a drug
async function addDrug(batchNumber, name, expiryDate, manufacturer) {
    const accounts = await web3.eth.getAccounts();

    try {
        const response = await contract.methods.addDrug(batchNumber, name, expiryDate, manufacturer).send({ from: accounts[0] });
        console.log('Transaction successful:', response);
    } catch (error) {
        console.error('Error adding drug:', error);
    }
}
