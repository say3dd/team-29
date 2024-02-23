<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Return Request Form</title>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 0;
    }
    .container {
        max-width: 600px;
        margin: 20px auto;
        background-color: #fff;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    }
    h2 {
        margin-top: 0;
        font-size: 24px;
        color: #333;
    }
    label {
        font-weight: bold;
    }
    input[type="text"],
    select,
    textarea {
        width: 100%;
        padding: 10px;
        margin: 8px 0;
        box-sizing: border-box;
        border: 1px solid #ccc;
        border-radius: 4px;
    }
    textarea {
        height: 100px;
    }
    input[type="submit"] {
        background-color: #1E3A8A;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 16px;
    }
    input[type="submit"]:hover {
        background-color: #1E3A8A;
    }
</style>
</head>
<body>
<div class="container">
    <h2>Return Request Form</h2>
    <form action="/submit-return-request" method="post">
        <label for="orderNumber">Order Number:</label>
        <input type="text" id="orderNumber" name="orderNumber" required>

        <label for="itemName">Item Name:</label>
        <input type="text" id="itemName" name="itemName" required>

        <label for="reason">Reason for Return:</label>
        <select id="reason" name="reason" required>
            <option value="">Select a reason</option>
            <option value="Defective">Defective</option>
            <option value="Wrong Item">Wrong Item</option>
            <option value="Changed Mind">Changed my Mind</option>
            <option value="Other">Other</option>
        </select>

        <label for="resolution">Preferred Resolution:</label>
        <select id="resolution" name="resolution" required>
            <option value="">Select a resolution</option>
            <option value="Refund">Refund</option>
            <option value="Exchange">Exchange</option>
        </select>

        <label for="comments">Comments:</label>
        <textarea id="comments" name="comments" placeholder="Enter additional comments"></textarea>

        <input type="submit" value="Submit Request">
    </form>
</div>
</body>
</html>