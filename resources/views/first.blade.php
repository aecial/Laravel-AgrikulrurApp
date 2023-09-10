<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- <script type="text/javascript" src="{{ URL::asset('js/app.js') }}"></script> -->
    @vite('resources/js/app.js')
</head>
<body>
        <!-- <a href="send-message">Bid</a> -->
        <h1>First Receiver</h1>
        <input type="text" id="messageInput" placeholder="Type your message...">
        <button id="sendMessageBtn">Send</button>
        <div id="chat-container" class="border border-success">

        </div>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
        $(document).ready(function() {
        $('#sendMessageBtn').click(function() {
            var message = $('#messageInput').val();
            if (message.trim() !== '') {
                // AJAX request to send the message to the server
                $.ajax({
                    method: 'GET',
                    url: '/send-message', // Replace with your route
                    data: { message: message },
                    success: function(response) {
                        // Handle success if needed
                        console.log('Message sent successfully: ', response);
                    },
                    error: function(xhr, status, error) {
                        // Handle error if needed
                        console.log('Error sending message: ', error);
                    }
                });
            }
        });
    });
</script>
<script type="module">//type="module" is important! do not remove it.
    // Add your WebSocket event listener here
    window.Echo.channel('chats1').listen('.recieve.message', (data) => {
        // Update UI with received message
        var messageContainer = document.getElementById('chat-container');
        var newMessageElement = document.createElement('div');
        newMessageElement.textContent = data.message;
        messageContainer.appendChild(newMessageElement);
        
    });
</script>
</body>
<!-- <script type="module">
        window.Echo.channel('chats').listen('NewMessageEvent', (data) => {
            alert('Message receive: ', data.message);
        })
</script> -->
</html>