//image attribution: https://wallpapers.com/wallpapers/kurzgesagt-v21ypm6kko2yuoic/download

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Holocene Calendar Viewer</title>
    <style>
        body {
            font-family: 'Orbitron', 'Arial', sans-serif;
            background: black url('starfield.jpg') repeat;
            color: #00ffcc;
            text-align: center;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 800px;
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
        .calendar {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
            gap: 5px;
            max-width: 600px;
            margin: 0 auto;
        }
        .day {
            background: #222;
            border: 1px solid #00ffcc;
            color: #00ffcc;
            padding: 10px;
            text-align: center;
            transition: background-color 0.3s;
        }
        .day:hover {
            background-color: rgba(0, 255, 204, 0.2);
        }
        .day-name {
            background: #111;
            font-weight: bold;
        }
        .navigation {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }
        .nav-button {
            background-color: #00ffcc;
            border: none;
            padding: 10px 20px;
            color: black;
            cursor: pointer;
            border-radius: 5px;
            text-shadow: 0 0 10px #00ffcc;
            box-shadow: 0 0 15px rgba(0, 255, 204, 0.6);
            transition: transform 0.2s, box-shadow 0.2s;
        }
        .nav-button:hover {
            transform: scale(1.1);
            box-shadow: 0 0 25px rgba(0, 255, 204, 0.9);
        }
        a {
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php
        // Function to calculate first day of the month and days in month
        function getCalendarDetails($month, $year) {
            // Validate inputs
            if (!is_numeric($month) || !is_numeric($year) || 
                $month < 1 || $month > 12 || $year < 1) {
                die("Invalid month or year.");
            }

            // Calculate first day of the month (0 = Sunday, 1 = Monday, etc.)
            $firstDay = date('w', mktime(0, 0, 0, $month, 1, $year - 10000));
            
            // Get number of days in the month
            $daysInMonth = cal_days_in_month(CAL_GREGORIAN, $month, $year - 10000);

            return [
                'firstDay' => $firstDay,
                'daysInMonth' => $daysInMonth
            ];
        }

        // Get current month and year from GET, or use current
        $month = isset($_GET['month']) ? intval($_GET['month']) : intval(date('m'));
        $year = isset($_GET['year']) ? intval($_GET['year']) : (intval(date('Y')) + 10000);

        // Previous and next month calculations
        $prevMonth = $month == 1 ? 12 : $month - 1;
        $prevYear = $month == 1 ? $year - 1 : $year;
        $nextMonth = $month == 12 ? 1 : $month + 1;
        $nextYear = $month == 12 ? $year + 1 : $year;

        // Get calendar details
        $calDetails = getCalendarDetails($month, $year);
        ?>

        <h1>Holocene Calendar: <?php echo date('F', mktime(0, 0, 0, $month)); ?> <?php echo $year; ?> HE</h1>

        <div class="navigation">
            <a href="calendar.php?month=<?php echo $prevMonth; ?>&year=<?php echo $prevYear; ?>">
                <button class="nav-button">Previous Month</button>
            </a>
            <a href="calendar.php?month=<?php echo $nextMonth; ?>&year=<?php echo $nextYear; ?>">
                <button class="nav-button">Next Month</button>
            </a>
        </div>

        <div class="calendar">
            <!-- Day names -->
            <div class="day day-name">Sun</div>
            <div class="day day-name">Mon</div>
            <div class="day day-name">Tue</div>
            <div class="day day-name">Wed</div>
            <div class="day day-name">Thu</div>
            <div class="day day-name">Fri</div>
            <div class="day day-name">Sat</div>

            <!-- Blank spaces for days before the first day of the month -->
            <?php for ($i = 0; $i < $calDetails['firstDay']; $i++): ?>
                <div class="day"></div>
            <?php endfor; ?>

            <!-- Days of the month -->
            <?php for ($day = 1; $day <= $calDetails['daysInMonth']; $day++): ?>
                <div class="day"><?php echo $day; ?></div>
            <?php endfor; ?>
        </div>

        <a href="index.php">
            <button class="nav-button" style="margin-top: 20px;">Back to Converter</button>
        </a>
    </div>
</body>
</html>
