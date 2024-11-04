<!-- resources/views/drugs/index.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Drug Management</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/web3/dist/web3.min.js"></script> <!-- Include Web3 from CDN -->
    <script src="{{ asset('js/drugVerification.js') }}" defer></script> <!-- Link to your JS file -->
</head>
<body>
<div id="app">
    <button onclick="addDrugToBlockchain()" class="btn btn-primary">Add Drug to Blockchain</button>
</div>

<script>
    document.getElementById('addDrugForm').addEventListener('submit', async (event) => {
        event.preventDefault(); // Prevent the form from submitting normally

        const batchNumber = document.getElementById('batchNumber').value;
        const name = document.getElementById('name').value;
        const expiryDate = document.getElementById('expiryDate').value;
        const manufacturer = document.getElementById('manufacturer').value;


        await addDrugToBlockchain(batchNumber, name, expiryDate, manufacturer);
    });

    async function addDrugToBlockchain(batchNumber, name, expiryDate, manufacturer) {
        if (typeof window.ethereum !== 'undefined') {
            const web3 = new Web3(window.ethereum);
            await window.ethereum.enable();

            const contractAddress = 'YOUR_CONTRACT_ADDRESS';
            const contractABI = [ /* Your ABI here */ ];

            const contract = new web3.eth.Contract(contractABI, contractAddress);

            try {
                const accounts = await web3.eth.getAccounts();
                const result = await contract.methods.addDrug(batchNumber, name, expiryDate, manufacturer)
                    .send({ from: accounts[0] });

                console.log('Drug added successfully:', result);
                alert('Drug added to blockchain successfully!');
            } catch (error) {
                console.error('Error adding drug to blockchain:', error);
                alert('Failed to add drug to blockchain');
            }
        } else {
            alert('Please install MetaMask!');
        }
    }
</script>
</body>
</html>
