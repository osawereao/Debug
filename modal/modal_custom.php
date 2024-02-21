<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Confirmation</title>
    <style>
      body {
        position: relative;
        padding-top: 20px;
      }

      .container {
        margin: 0 auto;
        max-width: 600px;
        border: 1px solid tan;
        padding: 10px;
      }

      .button {
        background-color: #EA4C89;
        border-radius: 8px;
        border-style: none;
        box-sizing: border-box;
        color: #FFFFFF;
        cursor: pointer;
        display: inline-block;
        font-family: "Haas Grot Text R Web", "Helvetica Neue", Helvetica, Arial, sans-serif;
        font-size: 14px;
        font-weight: 500;
        height: 40px;
        line-height: 20px;
        list-style: none;
        margin: 0;
        outline: none;
        padding: 10px 16px;
        position: relative;
        text-align: center;
        text-decoration: none;
        transition: color 100ms;
        vertical-align: baseline;
        user-select: none;
        -webkit-user-select: none;
        touch-action: manipulation;
      }

      .button:hover,
      .button:focus {
        background-color: #F082AC;
      }

      /* Your button styles */
      #deleteButton {
        /* position: fixed; */
        /* bottom: 20px;
        right: 20px;
        z-index: 1; */
        /* Ensure the button stays on top of other content */
      }

      /* Add your modal styles here */
      #confirmationModal {
        display: none;
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        padding: 20px;
        background-color: #fff;
        border: 1px solid #ccc;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
      }
    </style>
  </head>

  <body>

    <div class="container">

      <button onclick="showConfirmationModal()">Delete</button>
    </div>
    <!-- Modal -->
    <div id="confirmationModal">
      <p>Are you sure you want to delete?</p>
      <button onclick="deleteItem()">Yes</button>
      <button onclick="hideConfirmationModal()">No</button>
    </div>

    <script>
      function showConfirmationModal() {
        var modal = document.getElementById('confirmationModal');
        modal.style.display = 'block';
      }

      function hideConfirmationModal() {
        var modal = document.getElementById('confirmationModal');
        modal.style.display = 'none';
      }

      function deleteItem() {
        // Replace 'YOUR_DELETE_URL' with the actual URL you want to redirect to after deletion
        window.location.href = 'YOUR_DELETE_URL';
      }
    </script>

  </body>

</html>