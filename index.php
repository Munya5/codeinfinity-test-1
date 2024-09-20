<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styles.css"> 
    <title>Registration Form</title>
</head>
<body>
    <div class="card">
        <div class="card-header">
            <h1>Registration Form</h1>
        </div>
        <div class="card-body">
            <form action="submit.php" method="POST">
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" required>
                </div>

                <div class="form-group">
                    <label for="surname">Surname:</label>
                    <input type="text" id="surname" name="surname" required>
                </div>

                <div class="form-group">
                    <label for="id_number">ID Number:</label>
                    <input type="text" id="id_number" name="id_number" required pattern="\d{13}" title="ID Number must be exactly 13 digits">
                </div>

                <div class="form-group">
                    <label for="dob">Date of Birth (dd/mm/yyyy):</label>
                    <input type="text" id="dob" name="dob" required pattern="\d{2}/\d{2}/\d{4}" title="Date of Birth must be in the format dd/mm/yyyy">
                </div>

                <button type="submit">POST</button>
                <button type="button" class="cancel-button" onclick="window.location.href='index.php'">CANCEL</button>   

            </form>
            
            <!-- Display error message if there is one -->
            <?php if (isset($_GET['error'])): ?>
                <p style="color:red;"><?php echo htmlspecialchars($_GET['error']); ?></p>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>




