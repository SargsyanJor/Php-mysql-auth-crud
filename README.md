### 📝 Project Interface Showcase

The screenshot below displays the main post feed of the application.

![Reg-Log-Posts---PHP-SQL](image/image.png)


#### Key Interface Features Shown:
*   **Navigation Header:** Includes the main title "Recent Posts" and a "Back to Profile" button, indicating a logged-in user state.
*   **Dynamic Post Cards:** Each post is contained within a clean, shadowed white card.
    *   **Post Details:** Displays the author's full name, the post title (bold), and the full content of the post.
    *   **Comment Section:** Includes a "Comments" heading with an icon and lists existing comments with the commenter's name.
    *   **Interactive Input:** A text input field labeled "Write a comment..." with a green "Send" button for each post.


#### Technology Stack in This View:
*   **HTML:** Structuring the post feed, cards, input fields, and buttons.
*   **CSS:** Styling the clean, modern look, including card shadows, rounded corners, button colors, and typography layout.
*   **PHP:** (Implied) Dynamically fetching the post and comment data from the MySQL database and rendering it into the HTML structure.


#### Database Setup
* To get this project running locally, follow these steps:

* **Create Database:** Open phpMyAdmin and create a new database named blog_db (or your preferred name).

* **Import SQL:** Select your database, go to the Import tab, and upload the database.sql file included in this repository.

**Configure Connection:**
* Open db/db.php and update the connection parameters to match your local environment: 

```
<?php
$database = "localhost";
$username = "root";
$password = "";
$dbname = "blog_db"; // Change this to your database name

// Create connection
$conn = mysqli_connect($database, $username, $password, $dbname);

// Check connection
if (!$conn) {
die("Connection failed: " . mysqli_connect_error());
}
?>
```
