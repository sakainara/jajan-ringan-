<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <link rel="stylesheet" href="CSS/az.css">
<style>
    body{
            background-image: url(3.png) ;
            height:100vh ;
            background-size: cover;
            background-position: center;
            min-height: 100px;

    }
</style>
</body>
</html>
<form action="Web_submit.php" method="POST" onsubmit="return validateform()" >
    <p style="color: white; font-family: 'Times New Roman';"><strong>Nama:</p> <input type="text" name="username" required size="60">
        <br>
    <p style="color: white; font-family: 'Times New Roman';"><strong>Email:</p> <input type="email" name="email" required size="60">
        <br>
    <p style="color: white; font-family: 'Times New Roman';"><strong>Password:</p> <input type="password" name="password" id="password" required size="60">
        <br>
    <br>
    <!-- Checkbox dan Input Jumlah untuk Barang -->
     <tr>
        <td style="color: black; font-size:50px;">Barang :</td> 
        <br>
        <td>
            <br>
            <div>
                <input type = "checkbox" name="barang[]" value="SSD - 216" id="SSD" >
                <label for="SSD" style="color: whaite: 'Times New Roman';">SSD - 216 =</label>
                <input type="number" name="jumlah[]" placeholder="Jumlah" min="1" style="width: 80px">
            </div>
            <div>
                <input type = "checkbox" name="barang[]" value="SSD - 512" id="SSD">
                <label for="SDD" style="color: whaite; font-family: 'Times New Roman';">SSD - 512 =</label>
                <input type="number" name="jumlah[]" placeholder="Jumlah" min="1" style="width: 80px">
            </div>
            <div>
                <input type = "checkbox" name="barang[]" value="HDD - 1 TB" id="HDD">
                <label for="HDD" style="color: whaite; font-family: 'Times New Roman';">HDD - 1TB </label>
                <input type="number" name="jumlah[]" placeholder="Jumlah" min="1" style="width: 80px">
            </div>
        </td>
     </tr>
    <input type="submit" value="Berikutnya">
</form>

<script>
    function validateform() {
        var password = document.getElementById("password").value;
        if (password.length < 6) {
            alert("Password harus memiliki minimal 6 karakter");
            return false;
        }
        return true;
    }
</script>
