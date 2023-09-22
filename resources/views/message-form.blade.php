<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM"
      crossorigin="anonymous"
    />
    <script
      defer
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
      crossorigin="anonymous"
    ></script>
    <!-- @if ($errors->any()) 
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif-->

                    <div id="validation-errors">

                    </div>

                            <input type="number" id="message" name="message" placeholder="Enter your message">
                            <button id="btn1" type="submit">Submit</button>
                    

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
      $(document).ready(function() {

        //para sa Web toh par
           
             $('#btn1').click(function() {
                var message = $('#message').val();
                if (message.trim() !== '') {
                    // AJAX request to send the message to the server
                    $.ajax({
                        method: 'POST',
                        url: '/process-message', // Replace with your route
                        data: 
                        { 
                          _token: '{{ csrf_token() }}',
                          message: message,

                        },
                        success: function(response) {
                            // Handle success if needed
                            console.log('Message sent successfully: ', response);
                        },
                        error: function(xhr, status, error) {
                            // Handle error if needed
                            console.log('Error sending message: ', error);


                            if (xhr.status === 422) {
                                // Log or display validation errors
                                console.log(xhr.responseJSON.errors);


                                const errors = xhr.responseJSON.errors;

                                // Clear any existing error messages
                                const validationErrorsDiv = document.getElementById('validation-errors');
                                validationErrorsDiv.innerHTML = '';
                                

                                // Create and append error messages
                                for (const field in errors) {
                                    if (errors.hasOwnProperty(field)) {
                                        const errorMessages = errors[field].join('<br>'); // Combine multiple error messages for the field
                                        const errorMessageElement = document.createElement('div');
                                        errorMessageElement.classList.add("new");
                                        errorMessageElement.innerHTML = `<div class="alert alert-danger">${field}: ${errorMessages}</div>`;
                                        validationErrorsDiv.appendChild(errorMessageElement);
                                    }
                                }

                                

                            } else {
                                // Handle other errors
                            }
                            /*let row = document.createElement("tr");

                            let bid = document.createElement("td");
                            bid.innerText = 'Please provide Higher bid';
                            row.appendChild(bid);

                            $("tbody").prepend(row);*/
                                                        

                        }
                    });
                }
            });


  });
</script>

</body>
</html>