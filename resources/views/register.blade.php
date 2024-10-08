<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>register</title>
</head>
<body>
    <h1>Buat Account Baru!</h1>
    <form action="{{ route('welcome') }}" method="POST">
        @csrf
        <label>First Name:</label><br>
        <input type="text" name="first_name"><br>

        <label >Last Name:</label><br>
        <input type="text" name="last_name"><br><br>

        <label>Gender:</label><br>
        <!-- name untuk pilihan radionya hanya bisa 1, value untuk nilai nanti yg dikirim -->
        <input type="radio" name="gender" value="male">Male <br>
        <input type="radio" name="gender" value="female">Female <br>
        <input type="radio" name="gender" value="other">Other <br><br>

        <label>Nationality:</label><br>
        <select name="Nationality">
            <option value="indo">Indonesian</option>
            <option value="spain">Spain</option>
            <option value="usa">United States</option>
        </select><br><br>

        <label>Language Spoken:</label><br>
        <input type="checkbox" name="Language" value="indo"> Bahasa Indonesia <br>
        <input type="checkbox" name="Language" value="english"> English <br>
        <input type="checkbox" name="Language" value="other"> Other <br><br>

        <label>Bio:</label><br>
        <textarea name="bio" rows="10" cols="30"></textarea><br>

        <button type="submit" name="daftar">Sign Up</button>

    </form>
</body>
</html>