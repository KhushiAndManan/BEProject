//version 1 with certificate added
// SPDX-License-Identifier: GPL-3.0
pragma solidity >=0.7.0 <0.9.0;

contract newBirth{

    struct Certificate{
        address hospDelivered;
        string FName;
        string MName;
        string birthDate;
        string birthTime;
        string Sex;
        string permAdd;
        string certHash;
        //address Registrar;
    }
    uint public certCount=0;
    Certificate[] public Cert;
    mapping (uint => Certificate) public certNumber;
    event certAdded(uint indexed attributeID, address indexed owner, string FName, string MName, string birthDate, string birthTime, string Sex, string permAdd, string certHash);

    function createRecord(string memory FName, string memory MName, string memory birthDate, string memory birthTime, string memory Sex, string memory permAdd, string memory certHash) public payable returns (uint certID) {
        
        certNumber[certCount].hospDelivered = msg.sender;
        certNumber[certCount].FName = FName;
        certNumber[certCount].MName = MName;
        certNumber[certCount].birthDate = birthDate;
        certNumber[certCount].birthTime = birthTime;
        certNumber[certCount].Sex = Sex;
        certNumber[certCount].permAdd = permAdd;
        certNumber[certCount].certHash = certHash;
        certCount++;
       
        emit certAdded(certID, msg.sender, FName, MName, birthDate, birthTime, Sex, permAdd, certHash);
    }

    function getcert(uint Count) public view returns(Certificate memory) {
        return certNumber[Count];
    }

}


    // diary[0]="Filed by hospital";
    // diary[1]="Pending by Registrar";
    // diary[2]="Certificate created";