//with docs added
// SPDX-License-Identifier: GPL-3.0
pragma solidity >=0.8.0 <0.9.0;

contract hospDir{

    struct docDetails{
        string firstName;
        string middleName;
        string lastName;
    }

    docDetails[] docArray;
    
    struct hospDetails{
        address hospital;
        string hospName;
        docDetails[] docs;
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

    event docAdded(uint indexed attributeID, string _firstName, string _middleName, string _lastName);



    function addDoc(uint id, string memory _firstName, string memory _middleName, string memory _lastName) public{
        //require (msg.sender == hospDeets[id].address);
        hospDeets[id].docs.push(docDetails(_firstName, _middleName, _lastName));
        // hospDeets[id].docs.firstName = _firstName;
        // hospDeets[id].docs.middleName = _middleName;
        // hospDeets[id].docs.lastName = _lastName;
    }

    event hospAdded(/*uint indexed attributeID, */ address indexed owner, string hospName, docDetails docs, string firstLine, string secondLine, string taluka, string district, string state, uint pincode);

    function createHosp(string memory hospName, string memory firstLine, string memory secondLine, string memory _firstName, string memory _middleName, string memory _lastName, string memory taluka, string memory district , string memory state, uint pincode) public {
        
        hospDeets[hospCount].hospital = msg.sender; // MODIFY LATER SO THAT ROOT OWNER CAN ADD HOSPITAL
        hospDeets[hospCount].hospName = hospName;
        hospDeets[hospCount].firstLine = firstLine;
        hospDeets[hospCount].secondLine = secondLine;
        hospDeets[hospCount].docs.push(docDetails(_firstName, _middleName, _lastName));
        hospDeets[hospCount].taluka = taluka;
        hospDeets[hospCount].district = district;
        hospDeets[hospCount].state = state;
        hospDeets[hospCount].pincode = pincode;
        hospCount++;
       
        //emit hospAdded(msg.sender, hospName, docs, firstLine, secondLine, taluka, district, state , pincode);
    }

    function getDetails(uint no, uint id) public view returns (string memory,  docDetails memory, string memory , string memory /*, string memory , string memory , string memory, uint*/ ) {
        return (hospDeets[no].hospName, hospDeets[no].docs[id],  hospDeets[no].firstLine,
            hospDeets[no].secondLine/*, hospDeets[no].taluka, 
            hospDeets[no].district, hospDeets[no].state,
            hospDeets[no].pincode*/);
    }
}


    // diary[0]="Filed by hospital";
    // diary[1]="Pending by Registrar";
    // diary[2]="Certificate created";