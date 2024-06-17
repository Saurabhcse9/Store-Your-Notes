Features
Add Note: Users can add new notes with a title and description.
View Notes: All notes are displayed in a table format with options to edit or delete each note.
Edit Note: Users can update the title and description of existing notes.
Delete Note: Users can delete notes they no longer need.
Modal Dialogs: Edit functionality is provided through modal dialogs for better user experience.
Search and Pagination: Integrated with DataTables for search and pagination functionalities.
Technologies Used
PHP: Server-side scripting language.
MySQL: Database management system.
Bootstrap: Front-end framework for responsive design.
DataTables: jQuery plugin for enhanced table features.
Installation and Setup
Clone the Repository
git clone https://github.com/Saurabhcse9/Store-Your-Notes.git

Navigate to the Project Directory
cd inote-crud-php
Setup the Database

Create a database named inote.

Import the inote.sql file provided in the repository to create the necessary table.
mysql -u root -p inote < inote.sql
Configure Database Connection

Open inote.php and update the database connection details if necessary.

$servername = "localhost";
$username = "root";
$password = "";
$database = "inote";
Start the Server

Ensure you have XAMPP or a similar local server setup.
Place the project folder in the htdocs directory of XAMPP.
Start Apache and MySQL from the XAMPP control panel.
Access the Application

Open a web browser and navigate to http://localhost/inote-crud-php/inote.php.

Usage
Adding a Note: Fill in the note title and description in the form and click "Add Note".
Editing a Note: Click the "Edit" button next to a note, update the details in the modal dialog, and click "Update".
Deleting a Note: Click the "Delete" button next to a note to remove it from the list.

License
This project is licensed under the MIT License.

Feel free to customize the README file and description further based on your preferences and the specifics of your project.






