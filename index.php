<html>
<body>

<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
    Enter a string to encrypt: <input type="text" name="string"><br>
    <input type="submit" name="encrypt" value="Encrypt">
</form>

<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
    Enter an encrypted string to decrypt: <input type="text" name="encrypted_string"><br>
    <input type="submit" name="decrypt" value="Decrypt">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST["encrypt"])) {
        $string = $_POST["string"];
        $encrypted_string = encrypt($string, 3);
        echo "<span name = 'output'>" . $encrypted_string . "<br></span>";
    } elseif(isset($_POST["decrypt"])) {
        $encrypted_string = $_POST["encrypted_string"];
        $decrypted_string = decrypt($encrypted_string, 3);
        echo "<span name = 'output'>" . $decrypted_string . "<br></span>";
    }
}

function encrypt($string, $shift) {
    $encrypted_string = "";
    for ($i = 0; $i < strlen($string); $i++) {
        $char = $string[$i];
        $ascii = ord($char);
        if($ascii >= 65 && $ascii <= 90){
            $ascii = (($ascii - 65 + $shift) % 26) + 65;
        }else if($ascii >= 97 && $ascii <= 122){
            $ascii = (($ascii - 97 + $shift) % 26) + 97;
        }
        $encrypted_string .= chr($ascii);
    }
    return $encrypted_string;
}


function decrypt($encrypted_string, $shift) {
    $decrypted_string = "";
    for ($i = 0; $i < strlen($encrypted_string); $i++) {
        $char = $encrypted_string[$i];
        $ascii = ord($char);
        if($ascii >= 65 && $ascii <= 90){
            $ascii = (($ascii - 65 - $shift + 26) % 26) + 65;
        }else if($ascii >= 97 && $ascii <= 122){
            $ascii = (($ascii - 97 - $shift + 26) % 26) + 97;
        }
        $decrypted_string .= chr($ascii);
    }
    return $decrypted_string;
}

?>

</body>
</html>
