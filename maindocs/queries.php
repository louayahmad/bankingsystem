<?php
function updatingBalanceInDatabase($transferingAmount,$typeOfTransaction,$accountNo) {
	$server = "localhost";
    $username = "ahmadl1_louayahmad20";
    $password = 'Redhawks2023@';
    $databaseName = "ahmadl1_bankingproject";
	$connectionDatabase = new mysqli($server, $username, $password, $databaseName);
	$arrayOfUserData = $connectionDatabase->query("SELECT * from useraccounts where accountNo='$accountNo'");
	$info = $arrayOfUserData->fetch_assoc();
	if ($typeOfTransaction == 'credit'){
		$balance = $info['balance'] + $transferingAmount;
		return $connectionDatabase->query("UPDATE useraccounts set balance = '$balance' where accountNo = '$accountNo'");
	}
	elseif ($typeOfTransaction == 'billing') {
			$balance = $info['balance'] - $transferingAmount;
			return $connectionDatabase->query("UPDATE useraccounts set balance = '$balance' where accountNo = '$accountNo'");
	}
	elseif ($typeOfTransaction == 'debit') {
		$balance = $info['balance'] - $transferingAmount - 5;
		return $connectionDatabase->query("UPDATE useraccounts set balance = '$balance' where accountNo = '$accountNo'");
	}
	else {
		echo "None apply to the different operations....";
	}
}
function deposit($operation, $transferingAmount, $receiver){
    $server = "localhost";
    $username = "ahmadl1_louayahmad20";
    $password = 'Redhawks2023@';
    $databaseName = "ahmadl1_bankingproject";
	$conn = new mysqli($server, $username, $password, $databaseName);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "INSERT INTO transactions (operation, creditAmount, receiver, userId) values ('deposit','$transferingAmount','$receiver','$_SESSION[userId]')";
    if ($conn->query($sql) === TRUE) {
    }   
    else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
}
function userMakingTransactions($operation, $transferingAmount, $receiver) {
	$server = "localhost";
    $username = "ahmadl1_louayahmad20";
    $password = 'Redhawks2023@';
    $databaseName = "ahmadl1_bankingproject";
	$connectionDatabase = new mysqli($server, $username, $password, $databaseName);
	if ($operation == 'transfer'){
		return $connectionDatabase->query("INSERT INTO transactions (operation, debitAmount, receiver, userId) values ('transfer','$transferingAmount','$receiver','$_SESSION[userId]')");
	}
	elseif ($operation == 'withdraw'){
		return $connectionDatabase->query("INSERT INTO transactions (operation, debitAmount, receiver, userId) values ('withdraw','$transferingAmount','$receiver','$_SESSION[userId]')");
	}
	elseif ($operation == 'deposit'){
		return $connectionDatabase->query("INSERT INTO transactions (operation, creditAmount, receiver, userId) values ('deposit','$transferingAmount','$receiver','$_SESSION[userId]')");
	}
	else {
		echo "None apply to the different operations....";
	}
}
function adminDepositAndWithdrawl($operation, $transferingAmount, $receiver, $userId) {
	$server = "localhost";
    $username = "ahmadl1_louayahmad20";
    $password = 'Redhawks2023@';
    $databaseName = "ahmadl1_bankingproject";
	$connectionDatabase = new mysqli($server, $username, $password, $databaseName);
	if ($operation == 'transfer'){
		return $connectionDatabase->query("INSERT INTO transactions (operation, debitAmount,receiver, userId) values ('transfer','$transferingAmount','$receiver','$userId')");
	}
	elseif ($operation == 'withdraw'){
		return $connectionDatabase->query("INSERT INTO transactions (operation, debitAmount, receiver, userId) values ('withdraw','$transferingAmount','$receiver','$userId')");
	}
	elseif ($operation == 'deposit'){
		return $connectionDatabase->query("INSERT INTO transactions (operation, creditAmount, receiver, userId) values ('deposit','$transferingAmount','$receiver','$userId')");
	}
	else {
		echo "None apply to the different operations.....";
	}
}
function payBill($operation, $referenceNum, $transferingAmount, $description) {
	$server = "localhost";
    $username = "ahmadl1_louayahmad20";
    $password = 'Redhawks2023@';
    $databaseName = "ahmadl1_bankingproject";
	$connectionDatabase = new mysqli($server, $username, $password, $databaseName);
	if ($operation == 'billing'){
		return $connectionDatabase->query("INSERT INTO bills (operation, referenceNum,amount, description, userId) values ('billing','$referenceNum', '$transferingAmount','$description', '$_SESSION[userId]')");
	}
}
?>