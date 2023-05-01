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
  <h1>Medical Certificate Form</h1>
    <div id="mc-form">

       
      <p>Certificate No: <span id="certificate-no">0</span></p>

      <label for="hospDelivered">Hospital Address:</label>
      <input type="text" id="hospDelivered" name="hospDelivered"><br>

      <label for="fatherName">Father Name:</label>
      <input type="text" id="fatherName" name="fatherName" required><br>

      <label for="motherName">Mother Name:</label>
      <input type="text" id="motherName" name="motherName"><br>

      <label for="babyName">Baby Name:</label>
      <input type="text" id="babyName" name="babyName" required><br>

      <label for="birthDate">Birth Date:</label>
      <input type="date" id="birthDate" name="birthDate" required><br>

      <!-- <label for="birthTime">Birth Time:</label>
      <input type="time" id="birthTime" name="birthTime" required><br> -->

      <label for="Sex">Sex:</label>
      <input type="radio" id="male" name="Sex" value="Male" required>
      <label for="male">Male</label>
      <input type="radio" id="female" name="Sex" value="Female">
      <label for="female">Female</label>
      <input type="radio" id="other" name="Sex" value="Other">
      <label for="other">Other</label><br>

      <label for="permAdd">Permanent Address:</label>
      <textarea id="permAdd" name="permAdd" required></textarea><br>

      <label for="docName">Issuing Doctor's Name:</label>
      <input type="text" id="docName" name="docName" required><br>

      <label for="RegistrarAddress">Registrar's Address:</label>
      <textarea id="RegistrarAddress" name="RegistrarAddress" ></textarea><br>

      <label for="registrarVerified">Registrar Verification:</label>
      <input type="checkbox" id="registrarVerified" name="registrarVerified" disabled> <label for="Yes">Yes</label>
      <input type="checkbox" id="registrardenied" name="registrarVerified" disabled> <label for="No">No</label><br>

      <!-- <button type="submit">Submit</button> -->
      <button onclick="sendCertificate()" type="submit" >Submit</button>

      </div>

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

        <script src="https://cdn.ethers.io/lib/ethers-5.2.umd.min.js" type="application/javascript"></script>
        <script>
            const provider = new ethers.providers.Web3Provider(window.ethereum, "goerli");

            // Add a click event listener to the submit button
            // const submitButton = document.querySelector('button[type="submit"]');
            // submitButton.addEventListener('click', function(sendCertificate) {
            // event.preventDefault();
            
            // Get an instance of your smart contract using its ABI and address 0x147c9E7CF12229dA2896234bedd0EE7EaBC0e883
            const contractAddress = '0xD78954cf73F423C3dFE01BF1f259AC3A342a0890';
            const contractABI = 
            [
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
                            "name": "fatherName",
                            "type": "string"
                        },
                        {
                            "indexed": false,
                            "internalType": "string",
                            "name": "motherName",
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
                            "internalType": "address",
                            "name": "registrarAddress",
                            "type": "address"
                        },
                        {
                            "internalType": "string",
                            "name": "_fatherName",
                            "type": "string"
                        },
                        {
                            "internalType": "string",
                            "name": "_motherName",
                            "type": "string"
                        },
                        {
                            "internalType": "string",
                            "name": "_babyName",
                            "type": "string"
                        },
                        {
                            "internalType": "string",
                            "name": "_birthDate",
                            "type": "string"
                        },
                        {
                            "internalType": "string",
                            "name": "_Sex",
                            "type": "string"
                        },
                        {
                            "internalType": "string",
                            "name": "_permAdd",
                            "type": "string"
                        },
                        {
                            "internalType": "string",
                            "name": "_docName",
                            "type": "string"
                        }
                    ],
                    "name": "sendCertificate",
                    "outputs": [
                        {
                            "internalType": "uint256",
                            "name": "",
                            "type": "uint256"
                        }
                    ],
                    "stateMutability": "nonpayable",
                    "type": "function"
                },
                {
                    "inputs": [
                        {
                            "internalType": "uint256",
                            "name": "index",
                            "type": "uint256"
                        }
                    ],
                    "name": "verifyCertificate",
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
                            "name": "fatherName",
                            "type": "string"
                        },
                        {
                            "internalType": "string",
                            "name": "motherName",
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
                            "internalType": "address",
                            "name": "RegistrarAddress",
                            "type": "address"
                        },
                        {
                            "internalType": "bool",
                            "name": "registrarVerified",
                            "type": "bool"
                        },
                        {
                            "internalType": "uint256",
                            "name": "certificateNumber",
                            "type": "uint256"
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
                            "name": "fatherName",
                            "type": "string"
                        },
                        {
                            "internalType": "string",
                            "name": "motherName",
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
                            "internalType": "address",
                            "name": "RegistrarAddress",
                            "type": "address"
                        },
                        {
                            "internalType": "bool",
                            "name": "registrarVerified",
                            "type": "bool"
                        },
                        {
                            "internalType": "uint256",
                            "name": "certificateNumber",
                            "type": "uint256"
                        }
                    ],
                    "stateMutability": "view",
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
                            "name": "fatherName",
                            "type": "string"
                        },
                        {
                            "internalType": "string",
                            "name": "motherName",
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
                            "internalType": "address",
                            "name": "RegistrarAddress",
                            "type": "address"
                        },
                        {
                            "internalType": "bool",
                            "name": "registrarVerified",
                            "type": "bool"
                        },
                        {
                            "internalType": "uint256",
                            "name": "certificateNumber",
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
                            "name": "registrarAddress",
                            "type": "address"
                        },
                        {
                            "internalType": "uint256",
                            "name": "index",
                            "type": "uint256"
                        }
                    ],
                    "name": "getCertificate",
                    "outputs": [
                        {
                            "internalType": "address",
                            "name": "",
                            "type": "address"
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
                        },
                        {
                            "internalType": "string",
                            "name": "",
                            "type": "string"
                        },
                        {
                            "internalType": "address",
                            "name": "",
                            "type": "address"
                        },
                        {
                            "internalType": "bool",
                            "name": "",
                            "type": "bool"
                        },
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
                            "internalType": "address",
                            "name": "registrarAddress",
                            "type": "address"
                        }
                    ],
                    "name": "getCertificateCount",
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
            ]

            let dappContract;
            let signer;

            provider.send("eth_requestAccounts", []).then(() => {
                provider.listAccounts().then(function (accounts) {
                    signer = provider.getSigner(accounts[0]);
                    dappContract = new ethers.Contract(
                        contractAddress,
                        contractABI,
                        signer
                    );
                });
            }); 

            async function getBirthDetails() {
                const getPromise = dappContract.getBirthDetails(0);
                const Details = await getPromise;
                console.log(Details);
            }

            //const contractInstance = new web3.eth.Contract(contractABI, contractAddress);
            
            // Get the values of the form fields
            async function sendCertificate() {
                const fatherName = document.getElementById('fatherName').value;
                const motherName = document.getElementById('motherName').value;
                const babyName = document.getElementById('babyName').value;
                const birthDate = document.getElementById('birthDate').value;
                // const birthTime = document.getElementById('birthTime').value;
                const sex = document.querySelector('input[name="Sex"]:checked').value;
                const permAdd = document.getElementById('permAdd').value;
                const docName = document.getElementById('docName').value;
                const RegistrarAddress = document.getElementById('RegistrarAddress').value;
                const setPromise = dappContract.sendCertificate(RegistrarAddress, fatherName, motherName, babyName, birthDate, sex, permAdd, docName);
                console.log(fatherName);
            }
        </script>
    </body>
</html>