document.addEventListener('DOMContentLoaded', function() {
    const todoForm = document.getElementById('todoForm');
    const todoInput = document.getElementById('todoInput');
    const todoDescription = document.getElementById('todoDescription');
    const todoList = document.getElementById('todoList');

    todoForm.addEventListener('submit', function(event) {
        event.preventDefault();
        addTodo();
    });

    function addTodo() {
        const taskText = todoInput.value.trim();
        const taskDescription = todoDescription.value.trim();
        if (taskText !== '') {
            const li = document.createElement('li');
            
            const taskDetails = document.createElement('div');
            taskDetails.className = 'task-details';
            taskDetails.textContent = taskText;

            const completeButton = document.createElement('button');
            completeButton.textContent = '✓';
            completeButton.addEventListener('click', function() {
                li.classList.toggle('completed');
            });

            const deleteButton = document.createElement('button');
            deleteButton.textContent = '✗';
            deleteButton.addEventListener('click', function() {
                todoList.removeChild(li);
            });

            taskDetails.appendChild(completeButton);
            taskDetails.appendChild(deleteButton);
            li.appendChild(taskDetails);

            if (taskDescription !== '') {
                const description = document.createElement('div');
                description.className = 'description';
                description.textContent = taskDescription;
                li.appendChild(description);
            }

            todoList.appendChild(li);
            todoInput.value = '';
            todoDescription.value = '';
            todoInput.focus();
        }
    }
});
