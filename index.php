//image attribution:https://wallpapers.com/wallpapers/kurzgesagt-v21ypm6kko2yuoic/download

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Holocene Calendar Converter</title>
    <style>
        body {
            font-family: 'Orbitron', 'Arial', sans-serif;
            background: black url('starfield.jpg') repeat;
            color: #00ffcc;
            text-align: center;
            margin: 0;
            padding: 0;
            line-height: 1.6;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background: rgba(0,0,0,0.7);
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 255, 204, 0.3);
        }
        h1 {
            color: #00ffcc;
            text-shadow: 0 0 10px #00ffcc;
        }
        form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .form-group {
            margin: 10px 0;
            width: 100%;
            max-width: 300px;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input, select {
            width: 100%;
            padding: 8px;
            background: #222;
            border: 1px solid #00ffcc;
            color: #00ffcc;
            border-radius: 5px;
        }
        button {
            background-color: #00ffcc;
            border: none;
            padding: 10px 20px;
            color: black;
            font-size: 16px;
            cursor: pointer;
            border-radius: 5px;
            text-shadow: 0 0 10px #00ffcc;
            box-shadow: 0 0 15px rgba(0, 255, 204, 0.6);
            transition: transform 0.2s, box-shadow 0.2s;
            margin-top: 15px;
        }
        button:hover {
            transform: scale(1.1);
            box-shadow: 0 0 25px rgba(0, 255, 204, 0.9);
        }
        .result {
            margin-top: 20px;
            font-size: 1.2em;
            color: #00ffcc;
        }
        .error {
            color: red;
            text-shadow: 0 0 5px red;
        }
        a {
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Holocene Calendar Converter</h1>
        <p>Convert Gregorian dates to the Human Era (HE) calendar</p>
        
        <form method="POST" action="">
            <div class="form-group">
                <label for="day">Day:</label>
                <input type="number" name="day" id="day" required min="1" max="31">
            </div>

            <div class="form-group">
                <label for="month">Month:</label>
                <input type="number" name="month" id="month" required min="1" max="12">
            </div>

            <div class="form-group">
                <label for="year">Year:</label>
                <input type="number" name="year" id="year" required>
            </div>

            <div class="form-group">
                <label for="era">Era:</label>
                <select name="era" id="era">
                    <option value="CE">CE (AD)</option>
                    <option value="BCE">BCE (BC)</option>
                </select>
            </div>

            <button type="submit">Convert to Holocene</button>
        </form>

        <?php
        function convertToHolocene($day, $month, $year, $era) {
            // Validate inputs
            if (!is_numeric($day) || !is_numeric($month) || !is_numeric($year) || 
                $day < 1 || $day > 31 || $month < 1 || $month > 12 || $year < 1) {
                return ['error' => 'Invalid date input'];
            }

            // Convert to Holocene Year
            if ($era === 'BCE') {
                $holoceneYear = 10001 - $year;
            } else {
                $holoceneYear = $year + 10000;
            }

            // Ensure no zero or negative year
            if ($holoceneYear <= 0) {
                return ['error' => 'Invalid Date. Holocene dates cannot result in year 0 or below.'];
            }

            return [
                'day' => $day,
                'month' => $month,
                'year' => $holoceneYear
            ];
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $result = convertToHolocene(
                $_POST['day'], 
                $_POST['month'], 
                $_POST['year'], 
                $_POST['era']
            );

            if (isset($result['error'])) {
                echo "<div class='result error'>" . htmlspecialchars($result['error']) . "</div>";
            } else {
                echo "<div class='result'>";
                echo "Holocene Date: {$result['day']}/{$result['month']}/{$result['year']} HE";
                echo "</div>";
            }
        }
        ?>

        <a href="calendar.php">
            <button>View Holocene Calendar</button>
        </a>
    </div>
</body>
</html>
