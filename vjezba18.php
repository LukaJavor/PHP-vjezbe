<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="Luka Javor">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
    <title>Vjezba18</title>
</head>
<body>
    <h1>Register User</h1>
    <form method="POST" action="">
        <label for="first_name">First Name:*</label>
        <input type="text" id="first_name" name="first_name" required><br><br>

        <label for="last_name">Last Name:*</label>
        <input type="text" id="last_name" name="last_name" required><br><br>

        <label for="email">Your E-mail:*</label>
        <input type="email" id="email" name="email" required><br><br>

        <label for="username">Username:*</label>
        <input type="text" id="username" name="username" required><br><br>

        <label for="password">Password:*</label>
        <input type="password" id="password" name="password" required><br><br>

        <label for="country">Country:</label>
        <select id="country" name="country_id" required>
            <?php
            // Povezivanje s bazom podataka
            $host = 'localhost';
            $dbname = 'user_registration';
            $user = 'root';
            $password = '';

            try {
                $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                // Dohvaćanje popisa zemalja
                $query = "SELECT id, country_name FROM countries";
                $stmt = $pdo->query($query);
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo "<option value='{$row['id']}'>{$row['country_name']}</option>";
                }
            } catch (PDOException $e) {
                die("Connection failed: " . $e->getMessage());
            }
            ?>
        </select><br><br>

        <button type="submit">Submit</button>
    </form>

    <?php
    // Obrada forme za registraciju
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['first_name'])) {
        $first_name = trim($_POST['first_name']);
        $last_name = trim($_POST['last_name']);
        $email = trim($_POST['email']);
        $username = trim($_POST['username']);
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $country_id = $_POST['country_id'];

        // Unos podataka u bazu
        $query = "INSERT INTO users (first_name, last_name, email, username, password, country_id) 
                  VALUES (:first_name, :last_name, :email, :username, :password, :country_id)";
        $stmt = $pdo->prepare($query);
        $stmt->execute([
            'first_name' => $first_name,
            'last_name' => $last_name,
            'email' => $email,
            'username' => $username,
            'password' => $password,
            'country_id' => $country_id
        ]);

        echo "<p>User successfully registered!</p>";
    }

    // Obrada forme za uređivanje
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['edit_user_id'])) {
        $edit_user_id = $_POST['edit_user_id'];
        $edit_first_name = trim($_POST['edit_first_name']);
        $edit_last_name = trim($_POST['edit_last_name']);
        $edit_country_id = $_POST['edit_country_id'];

        // Ažuriranje podataka u bazi
        $query = "UPDATE users SET first_name = :first_name, last_name = :last_name, country_id = :country_id WHERE id = :id";
        $stmt = $pdo->prepare($query);
        $stmt->execute([
            'first_name' => $edit_first_name,
            'last_name' => $edit_last_name,
            'country_id' => $edit_country_id,
            'id' => $edit_user_id
        ]);

        echo "<p>User details updated successfully!</p>";
    }

    // Prikaz korisnika
    echo "<h1>Registered Users</h1>";
    echo "<table border='1'>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Username</th>
                <th>Country</th>
                <th>Registered At</th>
                <th>Action</th>
            </tr>";

    try {
        // Dohvaćanje podataka korisnika zajedno s imenima zemalja
        $query = "SELECT users.id, users.first_name, users.last_name, users.email, users.username, countries.country_name, users.created_at 
                  FROM users 
                  JOIN countries ON users.country_id = countries.id";
        $stmt = $pdo->query($query);
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>
                    <td>{$row['first_name']}</td>
                    <td>{$row['last_name']}</td>
                    <td>{$row['email']}</td>
                    <td>{$row['username']}</td>
                    <td>{$row['country_name']}</td>
                    <td>{$row['created_at']}</td>
                    <td>
                        <form method='POST' action='' style='display:inline-block;'>
                            <input type='hidden' name='edit_user_id' value='{$row['id']}'>
                            <input type='text' name='edit_first_name' value='{$row['first_name']}' required>
                            <input type='text' name='edit_last_name' value='{$row['last_name']}' required>
                            <select name='edit_country_id' required>";
            // Ponovno dohvaćanje popisa zemalja za padajući izbornik
            $country_stmt = $pdo->query("SELECT id, country_name FROM countries");
            while ($country_row = $country_stmt->fetch(PDO::FETCH_ASSOC)) {
                $selected = $country_row['id'] == $row['country_id'] ? 'selected' : '';
                echo "<option value='{$country_row['id']}' {$selected}>{$country_row['country_name']}</option>";
            }
            echo "        </select>
                            <button type='submit'>Save</button>
                        </form>
                    </td>
                  </tr>";
        }
    } catch (PDOException $e) {
        die("Connection failed: " . $e->getMessage());
    }

    echo "</table>";
    ?>
</body>
</html>
