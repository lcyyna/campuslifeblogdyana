<?php
require_once 'dbconnect.php';

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    // Prepare the SQL query to insert the data into the database
    $sql = "INSERT INTO contacts (name, email, message) VALUES (?, ?, ?)";

    // Prepare the statement
    $stmt = $conn->prepare($sql);

    // Bind the parameters
    $stmt->bind_param("sss", $name, $email, $message);

    // Execute the statement
    if ($stmt->execute()) {
        echo "<script>alert('Message sent successfully!');</script>";
    } else {
        echo "<script>alert('Error sending message: " . $stmt->error . "');</script>";
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Campus Life Blog's Diyanah</title>
    <style>
        /* Reset some default styles */
        body, h1, h2, h3, p {
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Arial', sans-serif;
            line-height: 1.4;
            color: #333;
            background-color: #f8f8f8;
            margin: 0;
            padding: 0;
        }

        header {
            background: linear-gradient(45deg, #333, #555);
            color: #fff;
            padding: 0.5rem;
            text-align: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        nav {
            display: flex;
            justify-content: center;
            background-color: #444;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        nav ul {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
        }

        nav ul li {
            margin: 0 0.5rem;
        }

        nav a {
            color: #fff;
            text-decoration: none;
            padding: 0.3rem 0.5rem;
            display: inline-block;
            transition: background-color 0.3s ease;
        }

        nav a:hover {
            background-color: #666;
            border-radius: 3px;
        }

        main {
            padding: 1rem;
            max-width: 1000px;
            margin: 0 auto;
        }

        section {
            margin-bottom: 1rem;
        }

        h2 {
            border-bottom: 2px solid #333;
            padding-bottom: 0.3rem;
            margin-bottom: 0.5rem;
            font-size: 1.5rem;
            color: #444;
        }

        h3 {
            font-size: 1.2rem;
            color: #555;
            margin-bottom: 0.3rem;
        }

        .posts-container {
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }

        article {
            background-color: #fff;
            padding: 0.5rem;
            margin-bottom: 1rem;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            transition: transform 0.2s ease;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        article:hover {
            transform: translateY(-5px);
        }

        img {
            width: 150px;
            height: auto;
            border-radius: 8px;
            margin-left: 1rem;
        }

        footer {
            background: #333;
            color: #fff;
            text-align: center;
            padding: 0.5rem;
            position: fixed;
            bottom: 0;
            width: 100%;
        }

        .about, .contact {
            padding: 1rem;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            margin-bottom: 1rem;
            width: 48%;
        }

        .about {
            margin-right: 2%;
        }

        .contact-container {
            display: flex;
            justify-content: space-between;
            margin-bottom: 1rem;
        }

        .contact-form {
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
        }

        .contact-form input, .contact-form textarea {
            padding: 0.5rem;
            border: 1px solid #ddd;
            border-radius: 4px;
            width: 100%;
            box-sizing: border-box;
        }

        .contact-form button {
            padding: 0.5rem;
            border: none;
            background-color: #333;
            color: #fff;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .contact-form button:hover {
            background-color: #555;
        }
    </style>
</head>
<body>
    <header>
        <h1>Campus Life Blog's Diyanah</h1>
        <nav>
            <ul>
                <li><a onclick="scrollToSection('home');">Home</a></li>
                <li><a onclick="scrollToSection('about');">About</a></li>
                <li><a onclick="scrollToSection('contact');">Contact</a></li>
            </ul>
        </nav>
    </header>

    <main id="home">
        <section>
            <h2>Today's Posts</h2>
            <div class="posts-container">
                <article>
                    <div>
                        <h3>Wakeup to go for morning class</h3>
                        <p>First of all, wake up and read the prayer when you wake up.أَللَّهُمَّ بِكَ أَصْبَحْنَا وَبِكَ أَمْسَيْنَا وَبِكَ نَحَيَا وَبِكَ نَمُوْتُ وَإِلَيْكَ النُّشُوْرُ.
                            After that, I went to the shower to clean myself and put on makeup. </p>
                    </div>
                    <img src="img/25.jpg" alt="Post 1 Image">
                </article>
                <article>
                    <div>
                        <h3>Mirror selfie</h3>
                        <p>Mirror selfie before go to class</p>
                    </div>
                    <img src="img/26.jpg" alt="Post 2 Image">
                </article>
                <article>
                    <div>
                        <h3>Bring bottle</h3>
                        <p>Bring a bottle to class to stay hydrated</p>
                    </div>
                    <img src="img/27.jpg" alt="Post 3 Image">
                </article>
                <article>
                    <div>
                        <h3>Walk to class</h3>
                        <p>Go to class 15 minutes early</p>
                    </div>
                    <img src="img/28.jpg" alt="Post 4 Image">
                </article>
                <article>
                    <div>
                        <h3>Class</h3>
                        <p>Focus on the class when lecture teach</p>
                    </div>
                    <img src="img/29.jpg" alt="Post 5 Image">
                </article>
                <article>
                    <div>
                        <h3>Another class</h3>
                        <p>After class finish, we go to another class.</p>
                    </div>
                    <img src="img/30.jpg" alt="Post 6 Image">
                </article>
                <article>
                    <div>
                        <h3>Back to hostel</h3>
                        <p>Then, back to the hostel</p>
                    </div>
                    <img src="img/31.jpg" alt="Post 7 Image">
                </article>
                <article>
                    <div>
                        <h3>Buy food</h3>
                        <p>Buy some food before go to hostel</p>
                    </div>
                    <img src="img/32.jpg" alt="Post 8 Image">
                </article>
                <article>
                    <div>
                        <h3>Night out with girls</h3>
                        <p>Night out with friends to spend time together.</p>
                    </div>
                    <img src="img/33.jpg" alt="Post 9 Image">
                </article>
                <article>
                    <div>
                        <h3>Ready for sleep</h3>
                        <p>Finally, get ready for bed and read a prayer before going to sleep</p>
                    </div>
                    <img src="img/35.jpg" alt="Post 10 Image">
                </article>
            </div>
        </section>
    </main>

    <div class="contact-container">
        <section id="about" class="about" >
            <h2>About</h2>
            <p>Welcome to my Campus Life Blog! My name is Diyanah, and I'm a final-year student at Universiti Selangor. This blog is a space where I share my daily activities, experiences, and adventures on campus. I hope you enjoy reading about my journey!</p>
        </section>

        <section id="contact" class="contact">
            <h2>Contact</h2>
            <form id="contactForm" action="index.php" method="post">
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" required>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>

    <label for="message">Message:</label>
    <textarea id="message" name="message" rows="4" required></textarea>

    <button type="submit">Send Message</button>
</form>
        </section>
    </div>

    <footer>
        <p>&copy; 2024 Campus Life Blog</p>
    </footer>
</body>
</html>