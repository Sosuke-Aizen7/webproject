<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-Do List</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h2 class="logo">TO-DO</h2>
        <nav class="navigation">
            <a href="#">Home</a>
            <a href="#">Saved</a>
            <a href="#">completed</a>
            <a href="#">About</a>
            <a href="#">Contact</a>
            <button class="btnlogin-popup">Logout</button>
        </nav>
    </header>

    <div class="container">
        <h2>To-Do List</h2>
        <form id="todoForm">
            <input type="text" id="todoInput" placeholder="Enter a new task" required>
            <textarea type="text" id="todoDescription" placeholder="Enter task description"></textarea>
            <button type="submit">Add</button>
        </form>
        <ul id="todoList"></ul>
    </div>
    <script src="script.js"></script>
</body>
</html>
