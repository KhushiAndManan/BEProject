// SPDX-License-Identifier: GPL-3.0
pragma solidity >=0.7.0 <0.9.0;

contract newBirth{
    address public rootCA;
    mapping(address=>bool) Registrars;
    mapping(address=>bool) Hospitals;
    struct hospDetails{
        address hospital;
        string hospName;
        string firstLine;
        string taluka;
        string district;
        string state;
        uint pincode;
    }
    uint public hospCount=0;
    hospDetails[] public hosp;
    mapping (uint => hospDetails) public hospDeets;
    
    struct registrarDetails{
        address Registrar;
        string registrarName;
        string taluka;
        string district;
        uint pincode;
    }
    uint public registrarCount=0;
    registrarDetails[] public Reg;
    mapping (uint => registrarDetails) public registrarDeets;

    constructor() {
        rootCA=msg.sender;
    }
    modifier onlyOwner(){
        require(rootCA==msg.sender, "Only Root Certificate Authority can access this function");
        _;
    }

    modifier onlyRegistrar() {
        require(Registrars[msg.sender], "Only Registrars can access this function");
        _;
    }

    function WhiteListRegistrars (address user, string memory name, string memory taluka, string memory district , uint pincode) public onlyOwner {
        Registrars[user]=true;
        registrarDeets[registrarCount].Registrar = user;
        registrarDeets[registrarCount].registrarName = name;
        registrarDeets[registrarCount].taluka = taluka;
        registrarDeets[registrarCount].district = district;
        registrarDeets[registrarCount].pincode = pincode;
    }   

    function WhiteListHospital (address user, string memory hospName, string memory firstLine, string memory taluka, string memory district , string memory state, uint pincode) public onlyRegistrar {
        Hospitals[user]=true;
        hospDeets[hospCount].hospital = user; 
        hospDeets[hospCount].hospName = hospName;
        hospDeets[hospCount].firstLine = firstLine;
        hospDeets[hospCount].taluka = taluka;
        hospDeets[hospCount].district = district;
        hospDeets[hospCount].state = state;
        hospDeets[hospCount].pincode = pincode;
        hospCount++;
    }   
    modifier onlyHospital() {
        require(Hospitals[msg.sender], "only Hospitals can access this function");
        _;
    }
    function getHospitalDetails(uint no) public onlyOwner view returns (hospDetails memory) {
        return (hospDeets[no]);
    }
    function getRegistrarDetails(uint no) public onlyOwner view returns (registrarDetails memory) {
        return (registrarDeets[no]);
    }
    struct Certificate {
        address hospDelivered;
        string fatherName;
        string motherName;
        string babyName;
        string birthDate;
        string Sex;
        string permAdd;
        string docName;
        address RegistrarAddress;
        bool registrarVerified;
        uint certificateNumber;
    }

    uint public certCount=1;
    Certificate[] public Cert;
    uint public BlackCertCount=1;
    Certificate[] public BCert;
    mapping (uint => Certificate) public certNumber;
    event certAdded(uint indexed attributeID, address indexed owner, string fatherName, /*string fatherAadhar,*/ string motherName, /*string motherAadhar,*/ string babyName, string birthDate, string Sex, string permAdd, string docName , bool registrarVerified);

    mapping(address => Certificate[]) private certificates;

    function sendCertificate(address registrarAddress, string memory _fatherName, string memory _motherName, string memory _babyName, string memory _birthDate, string memory _Sex, string memory _permAdd, string memory _docName) public onlyHospital returns (uint){
        address _hospDelivered = msg.sender;
        require(registrarAddress != address(0), "Registrar address cannot be null");
        uint index = certificates[registrarAddress].length;
        certificates[registrarAddress].push(Certificate(_hospDelivered, _fatherName, _motherName, _babyName, _birthDate, _Sex, _permAdd, _docName, address(0), false, 0));
        return index;
    }

    function verifyCertificate(uint index) public onlyRegistrar{
        address registrarAddress = msg.sender;
        require(index < certificates[registrarAddress].length, "Certificate index out of range");
        Certificate storage certificate = certificates[registrarAddress][index];
        require(!certificate.registrarVerified, "Certificate already verified");
        certificate.RegistrarAddress = registrarAddress;
        certificate.registrarVerified = true;
        certificate.certificateNumber = block.number;
    }

    function getCertificateCount(address registrarAddress) public view onlyOwner returns (uint) {
        return certificates[registrarAddress].length;
    }

    function getCertificate(address registrarAddress, uint index) public view returns (address, string memory, string memory, string memory, string memory, string memory, string memory, string memory, address, bool, uint) {
        require(index < certificates[registrarAddress].length, "Certificate index out of range");
        Certificate storage certificate = certificates[registrarAddress][index];
        return (certificate.hospDelivered, certificate.fatherName, certificate.motherName, certificate.babyName, certificate.birthDate, certificate.Sex, certificate.permAdd, certificate.docName, certificate.RegistrarAddress, certificate.registrarVerified, certificate.certificateNumber);
    }
}

// Registrar: 0xAb8483F64d9C6d1EcF9b849Ae677dD3315835cb2
// Hospital: 0x4B20993Bc481177ec7E8f571ceCaE8A9e22C02db
