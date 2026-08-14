<?php
$conn = mysqli_connect("localhost", "root", "", "flood_monitoring");

if (!$conn) {
    die("Connection Failed: " . mysqli_connect_error());
}

$message = "";
$message_type = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $resident_name = trim($_POST["resident_name"] ?? "");
    $resident_address = trim($_POST["resident_address"] ?? "");
    $contact_number = trim($_POST["contact_number"] ?? "");

    if ($resident_name == "" || $resident_address == "" || $contact_number == "") {
        $message = "Please complete all required fields.";
        $message_type = "error";
    } elseif (!preg_match('/^09[0-9]{9}$/', $contact_number)) {
        $message = "Please enter a valid 11-digit contact number.";
        $message_type = "error";
    } else {

        $stmt = mysqli_prepare(
            $conn,
            "INSERT INTO resident_table (Resident_name, Resident_address, contact_number)
         VALUES (?, ?, ?)"
        );

        mysqli_stmt_bind_param(
            $stmt,
            "sss",
            $resident_name,
            $resident_address,
            $contact_number
        );

        if (mysqli_stmt_execute($stmt)) {
            $message = "Resident registered successfully.";
            $message_type = "success";
        } else {
            $message = "Failed to register resident.";
            $message_type = "error";
        }

        mysqli_stmt_close($stmt);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resident Registration</title>
    <link rel="stylesheet" href="css/Resident_register.css">

</head>

<body>

    <div class="register-container">

        <div class="header">

            <div class="logo">
                ≋
            </div>

            <h1>Resident Registration</h1>
            <p>Flood Monitoring System</p>

        </div>

        <?php if ($message != ""): ?>

            <div class="message <?php echo $message_type; ?>">
                <?php echo htmlspecialchars($message); ?>
            </div>

        <?php endif; ?>

        <form method="POST" action="">

            <div class="form-group">

                <label>
                    Resident Name <span class="required">*</span>
                </label>

                <div class="input-wrapper">

                    <span>👤</span>

                    <input
                        type="text"
                        name="resident_name"
                        placeholder="Full Name"
                        maxlength="60"
                        required>

                </div>

            </div>


            <div class="form-group">

                <label>
                    Resident Address <span class="required">*</span>
                </label>

                <div class="input-wrapper">

                    <span>⌂</span>

                    <select name="resident_address" required>

                        <option value="" disabled selected>
                            Select Address
                        </option>

                        <option value="Petalsville Subdivision">
                            Petalsville Subdivision
                        </option>

                        <option value="Tabuc Suba Ilaya">
                            Tabuc Suba Ilaya
                        </option>

                        <option value="Bankers Village IV">
                            Bankers Village IV
                        </option>

                        <option value="Cubay Road">
                            Cubay Road
                        </option>

                        <option value="MacArthur Drive">
                            MacArthur Drive
                        </option>

                        <option value="Benedicto Street">
                            Benedicto Street
                        </option>

                        <option value="Comision Civil Street">
                            Comision Civil Street
                        </option>

                        <option value="Quintin Salas Street">
                            Quintin Salas Street
                        </option>

                        <option value="Dollar Avenue">
                            Dollar Avenue
                        </option>

                        <option value="Peso Avenue">
                            Peso Avenue
                        </option>

                    </select>

                </div>

            </div>


            <div class="form-group">

                <label>
                    Contact Number <span class="required">*</span>
                </label>

                <div class="input-wrapper">

                    <span>☎</span>

                    <input
                        type="tel"
                        name="contact_number"
                        placeholder="09XXXXXXXXX"
                        maxlength="11"
                        pattern="09[0-9]{9}"
                        required>

                </div>

            </div>


            <div class="button-container">

                <button
                    type="button"
                    class="back-btn"
                    onclick="history.back()">
                    Back
                </button>

                <button
                    type="submit"
                    class="register-btn">
                    Register Resident
                </button>

            </div>

        </form>

        <div class="footer">
            Protected Flood Monitoring System
        </div>

    </div>

</body>

</html>