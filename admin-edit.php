<html>
    <head>
        <title> Admin Panel </title>
        <link rel="stylesheet" type="text/css" href="admin-edit-style.css">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Sansita+Swashed&display=swap" rel="stylesheet">
    </head>
    <body>
        <h1>Hello Admin. Make changes as per choice.</h1>
        <div class="first-button-sets">
            <button class="manage-admin" onclick="window.location.href='manage-admin.php'">Manage Admin</button>
            <button class="students" onclick="window.location.href='students-edit.php'">Students</button>
            <button class="subjects" onclick="window.location.href='subjects-edit.php'">Subjects</button>
        </div>
        <div class="second-button-sets">
            <button class="question-paper" onclick="window.location.href='question-paper-edit.php'">Question Papers</button>
            <button class="question" onclick="window.location.href='questions-edit.php'">Questions</button>
            <button class="feedback" onclick="window.location.href='view-feedback.php'">Feedback</button>
    </div>
    </body>
</html>