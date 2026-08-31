<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PHP Capabilities Demo</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 30px; line-height: 1.6; }
        .box { border: 1px solid #ccc; padding: 15px; margin-bottom: 20px; border-radius: 5px; background: #f9f9f9; }
        .success { color: green; font-weight: bold; }
    </style>
</head>
<body>

    <h1>What Can PHP Do? A Quick Demo</h1>

    <!-- 1. DYNAMIC CONTENT GENERATION -->
    <div class="box">
        <h2>1. Dynamic Content Generation</h2>
        <p>PHP can read the server's environment data and dynamically update pages in real-time.</p>
        <p><strong>Current Server Time:</strong> <?php echo date('Y-m-d H:i:s'); ?></p>
        <p><strong>Your Browser/User Agent:</strong> <?php echo htmlspecialchars($_SERVER['HTTP_USER_AGENT']); ?></p>
    </div>

    <!-- 2. CONDITIONAL LOGIC & MATH -->
    <div class="box">
        <h2>2. Conditional Logic & Math</h2>
        <?php
            $hour = (int)date('G'); 
            if ($hour < 12) {
                $greeting = "Good morning!";
            } elseif ($hour < 18) {
                $greeting = "Good afternoon!";
            } else {
                $greeting = "Good evening!";
            }
            
            $num1 = 15;
            $num2 = 27;
            $sum = $num1 + $num2;
        ?>
        <p><strong>Greeting based on time:</strong> <?php echo $greeting; ?></p>
        <p><strong>Server-side Math:</strong> <?php echo "$num1 + $num2 = $sum"; ?></p>
    </div>

    <!-- 3. FORM HANDLING & SECURITY -->
    <div class="box">
        <h2>3. Interactive Form Handling & Sanitization</h2>
        <p>PHP can intercept data sent by users, filter it for security, and display a tailored message.</p>
        
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['username'])) {
            // htmlspecialchars prevents XSS attacks by escaping malicious code
            $username = htmlspecialchars($_POST['username']);
            echo "<p class='success'>Hello, $username! PHP safely intercepted and processed this input on the server.</p>";
        }
        ?>

        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <label for="username">Enter your name:</label>
            <input type="text" id="username" name="username" required>
            <input type="submit" value="Submit to PHP">
        </form>
    </div>

    <!-- 4. LOOPS AND DATA STRUCTURES -->
    <div class="box">
        <h2>4. Loops & Array Rendering</h2>
        <p>PHP handles database queries or lists by looping through arrays to construct HTML components automatically.</p>
        <ul>
            <?php
                $skills = ["Form Processing", "Database Connectivity", "Session Tracking", "API Integration"];
                foreach ($skills as $skill) {
                    echo "<li>Capable of: $skill</li>";
                }
            ?>
        </ul>
    </div>

</body>
</html>
