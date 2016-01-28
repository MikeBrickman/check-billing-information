<?php

// check card number
if (!isset($_POST['card_number']) || empty($_POST['card_number'])) {
	print('Please fill card number field');
	exit();
} elseif (!preg_match('/^\d{16}$/', $_POST['card_number'])) {
	print('Card number must contain 16 digits');	
	exit();
} else {
	$card_number = (int)$_POST['card_number'];
	if (!is_valid_credit_card($card_number)) {
		print('Incorrect card number');	
		exit();
	}
}

// check month field
if (!isset($_POST['month']) || empty($_POST['month'])) {
	print('Please fill month field');
	exit();
} elseif (!preg_match('/^(0[1-9]|1[0-2])$/', $_POST['month'])) {
	print('Incorrect month');	
	exit();
} else {
	$month = $_POST['month'];
}

// check year field
if (!isset($_POST['year']) || empty($_POST['year'])) {
	print('Please fill year field');
	exit();
} elseif (!preg_match('/^(1[7-9]|2[0-5])$/', $_POST['year'])) {
	print('Incorrect year');	
	exit();
} else {
	$year = $_POST['year'];
}

// check CVV2 field
if (!isset($_POST['cvv2']) || empty($_POST['cvv2'])) {
	print('Please fill CVV2 field');
	exit();
} elseif (!preg_match('/^(\d{3})$/', $_POST['cvv2'])) {
	print('Incorrect CVV2');	
	exit();
} else {
	$cvv2 = $_POST['cvv2'];
}

// check email field
if (!isset($_POST['email']) || empty($_POST['email'])) {
	print('Please fill Email field');
	exit();
} elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
	print('Incorrect Email');
	exit();
} else {
	$email = $_POST['email'];
}

// check phone field
if (!isset($_POST['phone']) || empty($_POST['phone'])) {
	print('Please fill Phone field');
	exit();
} elseif (!preg_match('/^(\+380\d{9})$/', $_POST['phone'])) {
	print('Incorrect Phone');	
	exit();
} else {
	$phone = $_POST['phone'];
	print('All information is correct');

}

function is_valid_credit_card($s) {
    $sum = 0;
    for ($i = 0, $j = strlen($s); $i < $j; $i++) {
        if (($i % 2) == 0) {
            $val = $s[$i];
        } else {
            $val = $s[$i] * 2;
            if ($val > 9)  $val -= 9;
        }
        $sum += $val;
    }
    return (($sum % 10) == 0);
}
?>