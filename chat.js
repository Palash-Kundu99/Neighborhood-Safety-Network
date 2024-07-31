document.addEventListener('DOMContentLoaded', () => {
    const messageForm = document.getElementById('messageForm');
    const messageInput = document.getElementById('messageInput');
    const messages = document.getElementById('messages');
    const usersList = document.getElementById('users');

    // Get the logged-in user from the data attribute
    const loggedInUser = document.body.getAttribute('data-logged-in-user');

    function fetchMessages() {
        fetch('fetch_messages.php')
            .then(response => response.json())
            .then(data => {
                messages.innerHTML = '';
                data.messages.forEach(message => {
                    const messageElement = document.createElement('p');
                    messageElement.className = 'message';
                    // Assign class based on the sender
                    messageElement.classList.add(message.username === loggedInUser ? 'sent' : 'received');
                    messageElement.innerHTML = `<strong>${message.username}:</strong> ${message.content}`;
                    messages.appendChild(messageElement);
                });
            });
    }

    function fetchUsers() {
        fetch('fetch_users.php')
            .then(response => response.json())
            .then(data => {
                usersList.innerHTML = '';
                data.users.forEach(user => {
                    const userElement = document.createElement('li');
                    userElement.textContent = user.username;
                    usersList.appendChild(userElement);
                });
            });
    }

    messageForm.addEventListener('submit', event => {
        event.preventDefault();

        const message = messageInput.value;

        fetch('send_message.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ message })
        }).then(() => {
            messageInput.value = '';
            fetchMessages();
        });
    });

    setInterval(fetchMessages, 1000);
    setInterval(fetchUsers, 5000);

    fetchMessages();
    fetchUsers();
});
