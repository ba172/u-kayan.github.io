<?php
$endTime = strtotime('today 12:00 AM') + 24 * 60 * 60; // 12 منتصف الليل + 24 ساعة
$timeRemaining = $endTime - time();

if ($timeRemaining > 0) {
    $hours = floor($timeRemaining / 3600);
    $minutes = floor(($timeRemaining % 3600) / 60);
    $seconds = $timeRemaining % 60;
    $timeDisplay = sprintf('%02d:%02d:%02d', $hours, $minutes, $seconds);
} else {
    // إعادة تعيين العد التنازلي لليوم التالي
    $endTime += 24 * 60 * 60;
    $timeRemaining = $endTime - time();
    $hours = floor($timeRemaining / 3600);
    $minutes = floor(($timeRemaining % 3600) / 60);
    $seconds = $timeRemaining % 60;
    $timeDisplay = sprintf('%02d:%02d:%02d', $hours, $minutes, $seconds);
}
?>

<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>الموقع تحت الصيانة</title>
</head>
<body>
    <h1>الموقع تحت الصيانة</h1>
    <p>سيكون الموقع متاحًا بعد: <span id="timer"><?php echo $timeDisplay; ?></span></p>
    <script>
        const endTime = <?php echo $endTime; ?> * 1000;
        const timerElement = document.getElementById('timer');

        function updateTimer() {
            const now = new Date().getTime();
            const timeRemaining = endTime - now;

            if (timeRemaining > 0) {
                const hours = Math.floor((timeRemaining % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                const minutes = Math.floor((timeRemaining % (1000 * 60 * 60)) / (1000 * 60));
                const seconds = Math.floor((timeRemaining % (1000 * 60)) / 1000);
                timerElement.innerHTML = String(hours).padStart(2, '0') + ':' + String(minutes).padStart(2, '0') + ':' + String(seconds).padStart(2, '0');
            } else {
                clearInterval(timerInterval);
            }
        }

        const timerInterval = setInterval(updateTimer, 1000);
    </script>
</body>
</html>
