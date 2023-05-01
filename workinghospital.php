<?php

// session_start(); // start session

// // check if user is logged in
// if(!isset($_SESSION["hospital_id"])) {
//     header("Location: hospLogin.php"); // redirect to login page if user is not logged in
//     exit();
// }

// // get user information
// $hospital_id = $_SESSION["hospital_id"];
// $hospital_name = $_SESSION["hospital_name"];

// Connect to the database
$db = mysqli_connect('localhost', "root","", 'projectphase3');

// Check for form submission
if (isset($_POST['submit'])) {
    // Get the user input
    $hospital = mysqli_real_escape_string($db, $_POST['hospital']);
    $father_name = mysqli_real_escape_string($db, $_POST['father_name']);
    $mother_name = mysqli_real_escape_string($db, $_POST['mother_name']);
    $baby_name = mysqli_real_escape_string($db, $_POST['baby_name']);
    $birth_date = mysqli_real_escape_string($db, $_POST['birth_date']);
    $birth_time = mysqli_real_escape_string($db, $_POST['birth_time']);
    $sex = mysqli_real_escape_string($db, $_POST['sex']);
    $permAdd = mysqli_real_escape_string($db, $_POST['permAdd']);
    $docName = mysqli_real_escape_string($db, $_POST['docName']);

    //Check if the username is already taken
    //$query = "SELECT * FROM birth_certificates WHERE username='$username'";
    //$result = mysqli_query($db, $query);
    //if (mysqli_num_rows($result) > 0) {
    //    echo "Username already taken";
    //    exit;
    //}
    
    // Insert the user data into the database
    $query = "INSERT INTO birth_certificates (hospital, father_name, mother_name, baby_name, birth_date, birth_time, sex, doctor_name) 
              VALUES ('$hospDelivered', '$father_name', '$mother_name', '$babyName', '$birth_date', '$birth_time', '$sex', '$docName')";
    mysqli_query($db, $query);

    // Redirect to the login page or some other page
    header('Location: thanksReg.html');
}
?>


<!DOCTYPE html>
<html>
  <head>
    <title>Birth Certificate Form</title>
    <link rel="stylesheet" type="text/css" href="cssforhtmlform.css">
    <style>
        .back-button {
			font-size: 16px;
			padding: 5px;
			background-color: #333;
			color: #fff;
			border: none;
			border-radius: 5px;
			cursor: pointer;
			position: absolute;
			top: 20px;
			right: 20px;
		}
		.back-button:hover {
			background-color: #444;
		}
        </style>

  </head>
  <body>
    
    <h1>Birth Certificate Form</h1>
    <form method="post">

       
      <p>Certificate No: <span id="certificate-no"></span></p>

      <label for="hospDelivered">Hospital id:</label>
      <input type="text" id="hospDelivered" name="hospDelivered" readonly><br>

      <label for="father_name">Father Name:</label>
      <input type="text" id="father_name" name="father_name" required><br>

      <label for="mother_name">Mother Name:</label>
      <input type="text" id="mother_name" name="mother_name"><br>

      <label for="baby_name">Baby Name:</label>
      <input type="text" id="baby_name" name="baby_name" required><br>

      <label for="birth_date">Birth Date:</label>
      <input type="date" id="birth_date" name="birth_date" required><br>

      <label for="birth_time">Birth Time:</label>
      <input type="time" id="birth_time" name="birth_time" required><br>

      <label for="sex">Sex:</label>
      <input type="radio" id="male" name="sex" value="Male" required>
      <label for="male">Male</label>
      <input type="radio" id="female" name="sex" value="Female">
      <label for="female">Female</label>
      <input type="radio" id="other" name="sex" value="Other">
      <label for="other">Other</label><br>

      <label for="permAdd">Permanent Address:</label>
      <textarea id="permAdd" name="permAdd" required></textarea><br>

      <label for="docName">Issuing Doctor's Name:</label>
      <input type="text" id="docName" name="docName" required><br>

      <label for="RegistrarAddress">Registrar's Address:</label>
      <textarea id="RegistrarAddress" name="RegistrarAddress" readonly></textarea><br>

      <label for="registrarVerified">Registrar Verification:</label>
      <input type="checkbox" id="registrarVerified" name="registrarVerified" disabled> <label for="Yes">Yes</label>
      <input type="checkbox" id="registrardenied" name="registrarVerified" disabled> <label for="No">No</label><br>


      <input type="submit" name="submit" value="Signup">
      <button class="back-button" onclick="location.href='logout.php'">Logout</button>
    </form>
    <script>
        document.getElementById("hospDelivered").value = "<?php echo $hospital_id; ?>";
    </script>

    <!-- <script src="https://cdn.jsdelivr.net/npm/web3@1.3.5/dist/web3.min.js"></script>
    <script>
        var web3;
        // Connect to the Ethereum network using web3.js
        if (typeof web3 !== 'undefined') {
        web3 = new Web3(web3.currentProvider);
        } else {
        alert("Please install MetaMask to access the Ethereum network!");
        } 
        if (typeof web3 !== 'undefined') {
            web3 = new Web3(web3.currentProvider);
        } 
        else {
            //If web3 is not available, create a new provider for a local network
            const Web3 = require('web3');
            const web3 = new Web3(new Web3.providers.HttpProvider('https://goerli.infura.io/v3/f9ecf1241a9543948565696b827d9961'));
            prompt("Please install MetaMask to access the Ethereum network!");
        } -->

        <!-- <script src="https://cdn.ethers.io/lib/ethers-5.2.umd.min.js" type="application/javascript"></script>
        <script>
            const provider = new ethers.providers.Web3Provider(
            window.ethereum,
            "goerli"
            );

            // Add a click event listener to the submit button
            const submitButton = document.querySelector('button[type="submit"]');
            submitButton.addEventListener('click', function(event) {
            event.preventDefault();
            
            // Get an instance of your smart contract using its ABI and address 0x147c9E7CF12229dA2896234bedd0EE7EaBC0e883
            const contractAddress = '00x147c9E7CF12229dA2896234bedd0EE7EaBC0e883';
            const contractABI = [
                {
                    "inputs": [],
                    "stateMutability": "nonpayable",
                    "type": "constructor"
                },
                {
                    "anonymous": false,
                    "inputs": [
                        {
                            "indexed": true,
                            "internalType": "uint256",
                            "name": "attributeID",
                            "type": "uint256"
                        },
                        {
                            "indexed": true,
                            "internalType": "address",
                            "name": "owner",
                            "type": "address"
                        },
                        {
                            "indexed": false,
                            "internalType": "string",
                            "name": "father_name",
                            "type": "string"
                        },
                        {
                            "indexed": false,
                            "internalType": "string",
                            "name": "mother_name",
                            "type": "string"
                        },
                        {
                            "indexed": false,
                            "internalType": "string",
                            "name": "babyName",
                            "type": "string"
                        },
                        {
                            "indexed": false,
                            "internalType": "string",
                            "name": "birthDate",
                            "type": "string"
                        },
                        {
                            "indexed": false,
                            "internalType": "string",
                            "name": "birthTime",
                            "type": "string"
                        },
                        {
                            "indexed": false,
                            "internalType": "string",
                            "name": "Sex",
                            "type": "string"
                        },
                        {
                            "indexed": false,
                            "internalType": "string",
                            "name": "permAdd",
                            "type": "string"
                        },
                        {
                            "indexed": false,
                            "internalType": "string",
                            "name": "docName",
                            "type": "string"
                        },
                        {
                            "indexed": false,
                            "internalType": "bool",
                            "name": "registrarVerified",
                            "type": "bool"
                        }
                    ],
                    "name": "certAdded",
                    "type": "event"
                },
                {
                    "inputs": [
                        {
                            "internalType": "uint256",
                            "name": "",
                            "type": "uint256"
                        }
                    ],
                    "name": "BCert",
                    "outputs": [
                        {
                            "internalType": "address",
                            "name": "hospDelivered",
                            "type": "address"
                        },
                        {
                            "internalType": "string",
                            "name": "father_name",
                            "type": "string"
                        },
                        {
                            "internalType": "string",
                            "name": "mother_name",
                            "type": "string"
                        },
                        {
                            "internalType": "string",
                            "name": "babyName",
                            "type": "string"
                        },
                        {
                            "internalType": "string",
                            "name": "birthDate",
                            "type": "string"
                        },
                        {
                            "internalType": "string",
                            "name": "birthTime",
                            "type": "string"
                        },
                        {
                            "internalType": "string",
                            "name": "Sex",
                            "type": "string"
                        },
                        {
                            "internalType": "string",
                            "name": "permAdd",
                            "type": "string"
                        },
                        {
                            "internalType": "string",
                            "name": "docName",
                            "type": "string"
                        },
                        {
                            "internalType": "uint256",
                            "name": "certHash",
                            "type": "uint256"
                        },
                        {
                            "internalType": "address",
                            "name": "RegistrarAddress",
                            "type": "address"
                        },
                        {
                            "internalType": "bool",
                            "name": "registrarVerified",
                            "type": "bool"
                        }
                    ],
                    "stateMutability": "view",
                    "type": "function"
                },
                {
                    "inputs": [],
                    "name": "BlackCertCount",
                    "outputs": [
                        {
                            "internalType": "uint256",
                            "name": "",
                            "type": "uint256"
                        }
                    ],
                    "stateMutability": "view",
                    "type": "function"
                },
                {
                    "inputs": [
                        {
                            "internalType": "uint256",
                            "name": "",
                            "type": "uint256"
                        }
                    ],
                    "name": "Cert",
                    "outputs": [
                        {
                            "internalType": "address",
                            "name": "hospDelivered",
                            "type": "address"
                        },
                        {
                            "internalType": "string",
                            "name": "father_name",
                            "type": "string"
                        },
                        {
                            "internalType": "string",
                            "name": "mother_name",
                            "type": "string"
                        },
                        {
                            "internalType": "string",
                            "name": "babyName",
                            "type": "string"
                        },
                        {
                            "internalType": "string",
                            "name": "birthDate",
                            "type": "string"
                        },
                        {
                            "internalType": "string",
                            "name": "birthTime",
                            "type": "string"
                        },
                        {
                            "internalType": "string",
                            "name": "Sex",
                            "type": "string"
                        },
                        {
                            "internalType": "string",
                            "name": "permAdd",
                            "type": "string"
                        },
                        {
                            "internalType": "string",
                            "name": "docName",
                            "type": "string"
                        },
                        {
                            "internalType": "uint256",
                            "name": "certHash",
                            "type": "uint256"
                        },
                        {
                            "internalType": "address",
                            "name": "RegistrarAddress",
                            "type": "address"
                        },
                        {
                            "internalType": "bool",
                            "name": "registrarVerified",
                            "type": "bool"
                        }
                    ],
                    "stateMutability": "view",
                    "type": "function"
                },
                {
                    "inputs": [
                        {
                            "internalType": "uint256",
                            "name": "",
                            "type": "uint256"
                        }
                    ],
                    "name": "Reg",
                    "outputs": [
                        {
                            "internalType": "address",
                            "name": "Registrar",
                            "type": "address"
                        },
                        {
                            "internalType": "string",
                            "name": "registrarName",
                            "type": "string"
                        },
                        {
                            "internalType": "string",
                            "name": "taluka",
                            "type": "string"
                        },
                        {
                            "internalType": "string",
                            "name": "district",
                            "type": "string"
                        },
                        {
                            "internalType": "uint256",
                            "name": "pincode",
                            "type": "uint256"
                        }
                    ],
                    "stateMutability": "view",
                    "type": "function"
                },
                {
                    "inputs": [
                        {
                            "internalType": "address",
                            "name": "user",
                            "type": "address"
                        },
                        {
                            "internalType": "string",
                            "name": "hospName",
                            "type": "string"
                        },
                        {
                            "internalType": "string",
                            "name": "firstLine",
                            "type": "string"
                        },
                        {
                            "internalType": "string",
                            "name": "taluka",
                            "type": "string"
                        },
                        {
                            "internalType": "string",
                            "name": "district",
                            "type": "string"
                        },
                        {
                            "internalType": "string",
                            "name": "state",
                            "type": "string"
                        },
                        {
                            "internalType": "uint256",
                            "name": "pincode",
                            "type": "uint256"
                        }
                    ],
                    "name": "WhiteListHospital",
                    "outputs": [],
                    "stateMutability": "nonpayable",
                    "type": "function"
                },
                {
                    "inputs": [
                        {
                            "internalType": "address",
                            "name": "user",
                            "type": "address"
                        },
                        {
                            "internalType": "string",
                            "name": "name",
                            "type": "string"
                        },
                        {
                            "internalType": "string",
                            "name": "taluka",
                            "type": "string"
                        },
                        {
                            "internalType": "string",
                            "name": "district",
                            "type": "string"
                        },
                        {
                            "internalType": "uint256",
                            "name": "pincode",
                            "type": "uint256"
                        }
                    ],
                    "name": "WhiteListRegistrars",
                    "outputs": [],
                    "stateMutability": "nonpayable",
                    "type": "function"
                },
                {
                    "inputs": [],
                    "name": "certCount",
                    "outputs": [
                        {
                            "internalType": "uint256",
                            "name": "",
                            "type": "uint256"
                        }
                    ],
                    "stateMutability": "view",
                    "type": "function"
                },
                {
                    "inputs": [
                        {
                            "internalType": "uint256",
                            "name": "",
                            "type": "uint256"
                        }
                    ],
                    "name": "certNumber",
                    "outputs": [
                        {
                            "internalType": "address",
                            "name": "hospDelivered",
                            "type": "address"
                        },
                        {
                            "internalType": "string",
                            "name": "father_name",
                            "type": "string"
                        },
                        {
                            "internalType": "string",
                            "name": "mother_name",
                            "type": "string"
                        },
                        {
                            "internalType": "string",
                            "name": "babyName",
                            "type": "string"
                        },
                        {
                            "internalType": "string",
                            "name": "birthDate",
                            "type": "string"
                        },
                        {
                            "internalType": "string",
                            "name": "birthTime",
                            "type": "string"
                        },
                        {
                            "internalType": "string",
                            "name": "Sex",
                            "type": "string"
                        },
                        {
                            "internalType": "string",
                            "name": "permAdd",
                            "type": "string"
                        },
                        {
                            "internalType": "string",
                            "name": "docName",
                            "type": "string"
                        },
                        {
                            "internalType": "uint256",
                            "name": "certHash",
                            "type": "uint256"
                        },
                        {
                            "internalType": "address",
                            "name": "RegistrarAddress",
                            "type": "address"
                        },
                        {
                            "internalType": "bool",
                            "name": "registrarVerified",
                            "type": "bool"
                        }
                    ],
                    "stateMutability": "view",
                    "type": "function"
                },
                {
                    "inputs": [
                        {
                            "internalType": "string",
                            "name": "father_name",
                            "type": "string"
                        },
                        {
                            "internalType": "string",
                            "name": "mother_name",
                            "type": "string"
                        },
                        {
                            "internalType": "string",
                            "name": "babyName",
                            "type": "string"
                        },
                        {
                            "internalType": "string",
                            "name": "birthDate",
                            "type": "string"
                        },
                        {
                            "internalType": "string",
                            "name": "birthTime",
                            "type": "string"
                        },
                        {
                            "internalType": "string",
                            "name": "Sex",
                            "type": "string"
                        },
                        {
                            "internalType": "string",
                            "name": "permAdd",
                            "type": "string"
                        },
                        {
                            "internalType": "string",
                            "name": "docName",
                            "type": "string"
                        }
                    ],
                    "name": "createBirthRecord",
                    "outputs": [],
                    "stateMutability": "nonpayable",
                    "type": "function"
                },
                {
                    "inputs": [
                        {
                            "internalType": "uint256",
                            "name": "Count",
                            "type": "uint256"
                        }
                    ],
                    "name": "getBirthDetails",
                    "outputs": [
                        {
                            "components": [
                                {
                                    "internalType": "address",
                                    "name": "hospDelivered",
                                    "type": "address"
                                },
                                {
                                    "internalType": "string",
                                    "name": "father_name",
                                    "type": "string"
                                },
                                {
                                    "internalType": "string",
                                    "name": "mother_name",
                                    "type": "string"
                                },
                                {
                                    "internalType": "string",
                                    "name": "babyName",
                                    "type": "string"
                                },
                                {
                                    "internalType": "string",
                                    "name": "birthDate",
                                    "type": "string"
                                },
                                {
                                    "internalType": "string",
                                    "name": "birthTime",
                                    "type": "string"
                                },
                                {
                                    "internalType": "string",
                                    "name": "Sex",
                                    "type": "string"
                                },
                                {
                                    "internalType": "string",
                                    "name": "permAdd",
                                    "type": "string"
                                },
                                {
                                    "internalType": "string",
                                    "name": "docName",
                                    "type": "string"
                                },
                                {
                                    "internalType": "uint256",
                                    "name": "certHash",
                                    "type": "uint256"
                                },
                                {
                                    "internalType": "address",
                                    "name": "RegistrarAddress",
                                    "type": "address"
                                },
                                {
                                    "internalType": "bool",
                                    "name": "registrarVerified",
                                    "type": "bool"
                                }
                            ],
                            "internalType": "struct newBirth.Certificate",
                            "name": "",
                            "type": "tuple"
                        }
                    ],
                    "stateMutability": "view",
                    "type": "function"
                },
                {
                    "inputs": [
                        {
                            "internalType": "uint256",
                            "name": "no",
                            "type": "uint256"
                        }
                    ],
                    "name": "getHospitalDetails",
                    "outputs": [
                        {
                            "components": [
                                {
                                    "internalType": "address",
                                    "name": "hospital",
                                    "type": "address"
                                },
                                {
                                    "internalType": "string",
                                    "name": "hospName",
                                    "type": "string"
                                },
                                {
                                    "internalType": "string",
                                    "name": "firstLine",
                                    "type": "string"
                                },
                                {
                                    "internalType": "string",
                                    "name": "taluka",
                                    "type": "string"
                                },
                                {
                                    "internalType": "string",
                                    "name": "district",
                                    "type": "string"
                                },
                                {
                                    "internalType": "string",
                                    "name": "state",
                                    "type": "string"
                                },
                                {
                                    "internalType": "uint256",
                                    "name": "pincode",
                                    "type": "uint256"
                                }
                            ],
                            "internalType": "struct newBirth.hospDetails",
                            "name": "",
                            "type": "tuple"
                        }
                    ],
                    "stateMutability": "view",
                    "type": "function"
                },
                {
                    "inputs": [
                        {
                            "internalType": "uint256",
                            "name": "no",
                            "type": "uint256"
                        }
                    ],
                    "name": "getRegistrarDetails",
                    "outputs": [
                        {
                            "components": [
                                {
                                    "internalType": "address",
                                    "name": "Registrar",
                                    "type": "address"
                                },
                                {
                                    "internalType": "string",
                                    "name": "registrarName",
                                    "type": "string"
                                },
                                {
                                    "internalType": "string",
                                    "name": "taluka",
                                    "type": "string"
                                },
                                {
                                    "internalType": "string",
                                    "name": "district",
                                    "type": "string"
                                },
                                {
                                    "internalType": "uint256",
                                    "name": "pincode",
                                    "type": "uint256"
                                }
                            ],
                            "internalType": "struct newBirth.registrarDetails",
                            "name": "",
                            "type": "tuple"
                        }
                    ],
                    "stateMutability": "view",
                    "type": "function"
                },
                {
                    "inputs": [
                        {
                            "internalType": "uint256",
                            "name": "",
                            "type": "uint256"
                        }
                    ],
                    "name": "hosp",
                    "outputs": [
                        {
                            "internalType": "address",
                            "name": "hospital",
                            "type": "address"
                        },
                        {
                            "internalType": "string",
                            "name": "hospName",
                            "type": "string"
                        },
                        {
                            "internalType": "string",
                            "name": "firstLine",
                            "type": "string"
                        },
                        {
                            "internalType": "string",
                            "name": "taluka",
                            "type": "string"
                        },
                        {
                            "internalType": "string",
                            "name": "district",
                            "type": "string"
                        },
                        {
                            "internalType": "string",
                            "name": "state",
                            "type": "string"
                        },
                        {
                            "internalType": "uint256",
                            "name": "pincode",
                            "type": "uint256"
                        }
                    ],
                    "stateMutability": "view",
                    "type": "function"
                },
                {
                    "inputs": [],
                    "name": "hospCount",
                    "outputs": [
                        {
                            "internalType": "uint256",
                            "name": "",
                            "type": "uint256"
                        }
                    ],
                    "stateMutability": "view",
                    "type": "function"
                },
                {
                    "inputs": [
                        {
                            "internalType": "uint256",
                            "name": "",
                            "type": "uint256"
                        }
                    ],
                    "name": "hospDeets",
                    "outputs": [
                        {
                            "internalType": "address",
                            "name": "hospital",
                            "type": "address"
                        },
                        {
                            "internalType": "string",
                            "name": "hospName",
                            "type": "string"
                        },
                        {
                            "internalType": "string",
                            "name": "firstLine",
                            "type": "string"
                        },
                        {
                            "internalType": "string",
                            "name": "taluka",
                            "type": "string"
                        },
                        {
                            "internalType": "string",
                            "name": "district",
                            "type": "string"
                        },
                        {
                            "internalType": "string",
                            "name": "state",
                            "type": "string"
                        },
                        {
                            "internalType": "uint256",
                            "name": "pincode",
                            "type": "uint256"
                        }
                    ],
                    "stateMutability": "view",
                    "type": "function"
                },
                {
                    "inputs": [],
                    "name": "registrarCount",
                    "outputs": [
                        {
                            "internalType": "uint256",
                            "name": "",
                            "type": "uint256"
                        }
                    ],
                    "stateMutability": "view",
                    "type": "function"
                },
                {
                    "inputs": [
                        {
                            "internalType": "uint256",
                            "name": "",
                            "type": "uint256"
                        }
                    ],
                    "name": "registrarDeets",
                    "outputs": [
                        {
                            "internalType": "address",
                            "name": "Registrar",
                            "type": "address"
                        },
                        {
                            "internalType": "string",
                            "name": "registrarName",
                            "type": "string"
                        },
                        {
                            "internalType": "string",
                            "name": "taluka",
                            "type": "string"
                        },
                        {
                            "internalType": "string",
                            "name": "district",
                            "type": "string"
                        },
                        {
                            "internalType": "uint256",
                            "name": "pincode",
                            "type": "uint256"
                        }
                    ],
                    "stateMutability": "view",
                    "type": "function"
                },
                {
                    "inputs": [
                        {
                            "internalType": "uint256",
                            "name": "_no",
                            "type": "uint256"
                        },
                        {
                            "internalType": "string",
                            "name": "_babyName",
                            "type": "string"
                        }
                    ],
                    "name": "registrarVerification",
                    "outputs": [],
                    "stateMutability": "nonpayable",
                    "type": "function"
                },
                {
                    "inputs": [
                        {
                            "internalType": "uint256",
                            "name": "_no",
                            "type": "uint256"
                        }
                    ],
                    "name": "revokeCertificate",
                    "outputs": [],
                    "stateMutability": "nonpayable",
                    "type": "function"
                },
                {
                    "inputs": [],
                    "name": "rootCA",
                    "outputs": [
                        {
                            "internalType": "address",
                            "name": "",
                            "type": "address"
                        }
                    ],
                    "stateMutability": "view",
                    "type": "function"
                }
            ]; 

            let dappContract;
            let signer;

            provider.send("eth_requestAccounts", []).then(() => {
                provider.listAccounts().then(function (accounts) {
                    signer = provider.getSigner(accounts[0]);
                    dappContract = new ethers.Contract(
                        ContractAddress,
                        ContractABI,
                        signer
                    );
                });
            }); 


            async function get() {
                const getPromise = dappContract.getBirthDetails(0);
                const Details = await getPromise;
                console.log(Details);
            }

            //const contractInstance = new web3.eth.Contract(contractABI, contractAddress);
                    
            // Get the values of the form fields
            async function set() {
                const father_name = document.getElementById('father_name').value;
                const mother_name = document.getElementById('mother_name').value;
                const babyName = document.getElementById('babyName').value;
                const birthDate = document.getElementById('birthDate').value;
                const birthTime = document.getElementById('birthTime').value;
                const sex = document.querySelector('input[name="Sex"]:checked').value;
                const permAdd = document.getElementById('permAdd').value;
                const docName = document.getElementById('docName').value;
                const setPromise = dappContract.createBirthRecord(father_name, mother_name, babyName, birthDate, birthTime, sex, permAdd, docName);
            }
        </script> -->
    </body>
</html>