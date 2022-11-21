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
        string secondLine;
        string taluka;
        string district;
        string state;
        uint pincode;
    }
    uint public hospCount=0;
    hospDetails[] public hosp;
    mapping (uint => hospDetails) public hospDeets;

    constructor() {
        rootCA=msg.sender;
    }
    modifier onlyOwner(){
        require(rootCA==msg.sender, "Only Root Certificate Authority can access this function");
        _;
    }

    function WhiteListRegistrars (address user) public onlyOwner {
        Registrars[user]=true;
    }   
    modifier onlyRegistrar() {
        //How can i assign access to users address in the array listuser
        require(Registrars[msg.sender], "Only Registrars can access this function");
        _;
    }

    function WhiteListHospital (address user, string memory hospName, string memory firstLine, string memory secondLine, string memory taluka, string memory district , string memory state, uint pincode) public onlyOwner {
        Hospitals[user]=true;
        hospDeets[hospCount].hospital = user; 
        hospDeets[hospCount].hospName = hospName;
        hospDeets[hospCount].firstLine = firstLine;
        hospDeets[hospCount].secondLine = secondLine;
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
    function getHospitalDetails(uint no) public view returns (address, string memory, string memory , string memory , string memory , string memory , string memory) {
        return (hospDeets[no].hospital,hospDeets[no].hospName,  hospDeets[no].firstLine,
            hospDeets[no].secondLine, hospDeets[no].taluka, 
            hospDeets[no].district, hospDeets[no].state);
    }

    struct Certificate{
        address hospDelivered;
        string FName;
        string MName;
        string birthDate;
        string birthTime;
        string Sex;
        string permAdd;
        string docName;
        uint certHash;  //this is the certificate number
        bool registrarVerified;
        //address Registrar;
    }

    uint public certCount=0;
    Certificate[] public Cert;
    mapping (uint => Certificate) public certNumber;
    event certAdded(uint indexed attributeID, address indexed owner, string FName, string MName, string birthDate, string birthTime, string Sex, string permAdd, string docName , bool registrarVerified);

    function createBirthRecord(string memory FName, string memory MName, string memory birthDate, string memory birthTime, string memory Sex, string memory permAdd, string memory docName) public onlyHospital{
        
        certNumber[certCount].hospDelivered = msg.sender;
        certNumber[certCount].FName = FName;
        certNumber[certCount].MName = MName;
        certNumber[certCount].birthDate = birthDate;
        certNumber[certCount].birthTime = birthTime;
        certNumber[certCount].Sex = Sex;
        certNumber[certCount].permAdd = permAdd;
        certNumber[certCount].docName = docName;
        certNumber[certCount].certHash = certCount;
        certCount++;
        emit certAdded(certCount, msg.sender, FName, MName, birthDate, birthTime, Sex, permAdd , docName, false);
    }

    // function getcert(uint Count) public view returns(Certificate memory) {
    //     return certNumber[Count];
    // }

    function getBirthDetails(uint no) public view returns (string memory, string memory , string memory , string memory , string memory , string memory, uint ) {
        return (certNumber[no].FName, certNumber[no].MName, 
            certNumber[no].birthDate, certNumber[no].birthTime, 
            certNumber[no].Sex, certNumber[no].permAdd,
            certNumber[no].certHash
        );
    }

    function registrarVerification (uint _no) public onlyRegistrar returns (bool registrarVerified) {
        uint no = _no;
        require(certNumber[no].registrarVerified= false, "The certificate has already been verified by Registrar");
        certNumber[no].registrarVerified= true;
        return certNumber[no].registrarVerified;
    }
}
// Hospital: 0xAb8483F64d9C6d1EcF9b849Ae677dD3315835cb2
// Registrar: 0x4B20993Bc481177ec7E8f571ceCaE8A9e22C02db
