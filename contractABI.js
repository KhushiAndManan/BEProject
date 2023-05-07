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