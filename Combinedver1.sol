//with get details added
// SPDX-License-Identifier: GPL-3.0
pragma solidity >=0.7.0 <0.9.0;

contract newBirth{
    address public rootCA;
    mapping(address=>bool) Registrars;
    mapping(address=>bool) Hospitals;
    
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

    function WhiteListHospital (address user) public onlyOwner {
        Hospitals[user]=true;
    }   
    modifier onlyHospital() {
        //How can i assign access to users address in the array listuser
        require(Hospitals[msg.sender], "only Hospitals can access this function");
        _;
    }

    struct Certificate{
        address hospDelivered;
        string FName;
        string MName;
        string birthDate;
        string birthTime;
        string Sex;
        string permAdd;
        uint certHash;  //this is the certificate number
        bool registrarVerified;
        //address Registrar;
    }

    uint public certCount=0;
    Certificate[] public Cert;
    mapping (uint => Certificate) public certNumber;
    event certAdded(uint indexed attributeID, address indexed owner, string FName, string MName, string birthDate, string birthTime, string Sex, string permAdd, bool registrarVerified);

    function createRecord(string memory FName, string memory MName, string memory birthDate, string memory birthTime, string memory Sex, string memory permAdd) public onlyHospital{
        
        certNumber[certCount].hospDelivered = msg.sender;
        certNumber[certCount].FName = FName;
        certNumber[certCount].MName = MName;
        certNumber[certCount].birthDate = birthDate;
        certNumber[certCount].birthTime = birthTime;
        certNumber[certCount].Sex = Sex;
        certNumber[certCount].permAdd = permAdd;
        certNumber[certCount].certHash = certCount;
        certCount++;
        emit certAdded(certCount, msg.sender, FName, MName, birthDate, birthTime, Sex, permAdd , false);
    }

    function getcert(uint Count) public view returns(Certificate memory) {
        return certNumber[Count];
    }

    function getDetails(uint no) public view returns (string memory, string memory , string memory , string memory , string memory , string memory, uint ) {
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
