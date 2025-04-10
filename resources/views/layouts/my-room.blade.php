<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>My Rooms</title>
  <style>
    :root {
      --primary: #6366f1;
      --primary-dark: #4f46e5;
      --danger: #ef4444;
      --danger-dark: #dc2626;
      --gray-light: #f3f4f6;
      --gray-dark: #6b7280;
      --white: #ffffff;
      --shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    body {
      background-color: var(--gray-light);
      color: #333;
      padding: 10px;
    }

    .header {
      background-color: var(--white);
      padding: 15px;
      box-shadow: var(--shadow);
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 20px;
      border-radius: 8px;
    }

    .room-list,
    .room-form {
      background: var(--white);
      border-radius: 8px;
      box-shadow: var(--shadow);
      padding: 20px;
      margin-bottom: 20px;
    }

    h2 {
      margin-bottom: 15px;
    }

    .form-group {
      margin-bottom: 15px;
    }

    .form-group label {
      display: block;
      margin-bottom: 5px;
      font-weight: 500;
    }

    .form-group input,
    .form-group textarea {
      width: 100%;
      padding: 10px;
      font-size: 1rem;
      border: 1px solid #ddd;
      border-radius: 4px;
    }

    .btn {
      padding: 10px 15px;
      border-radius: 4px;
      text-align: center;
      font-weight: 500;
      text-decoration: none;
      display: inline-block;
      border: none;
      cursor: pointer;
      margin-right: 5px;
    }

    .btn-primary {
      background-color: var(--primary);
      color: var(--white);
    }

    .btn-danger {
      background-color: var(--danger);
      color: var(--white);
    }

    .room-item {
      padding: 15px;
      border-bottom: 1px solid #eee;
    }

    .room-item:last-child {
      border-bottom: none;
    }

    .room-actions {
      margin-top: 10px;
    }
  </style>
</head>
<body>
  @include('layouts.header',['name'=>'MyRoom'])

  <div class="room-list" id="roomList">
    <h2>Room List</h2>
    <!-- Example Room (loop this dynamically with backend data) -->
    <div class="room-item">
      <strong>Room Name:</strong> Sample Room<br>
      <strong>Description:</strong> This is a room description.<br>
      <strong>Wallet:</strong> $100.00
      <div class="room-actions">
        <button class="btn btn-primary" onclick="editRoom(1)">Edit</button>
        <button class="btn btn-danger" onclick="deleteRoom(1)">Delete</button>
      </div>
    </div>
  </div>

  <div class="room-form" id="roomForm">
    <h2 id="formTitle">Create Room</h2>
    <form id="roomFormElement">
      <input type="hidden" name="room_id" id="room_id">

      <div class="form-group">
        <label for="name">Room Name</label>
        <input type="text" id="name" name="name" placeholder="Enter room name" required>
      </div>

      <div class="form-group">
        <label for="description">Description</label>
        <textarea id="description" name="description" rows="3" placeholder="Enter room description"></textarea>
      </div>

      <div class="form-group">
        <label for="wallet">Wallet</label>
        <input type="number" id="wallet" name="wallet" placeholder="Enter wallet amount" min="0" step="0.01">
      </div>

      <button type="submit" class="btn btn-primary">Save</button>
    </form>
  </div>
  <div style="height: 75px;"></div>
  @include('layouts.footer')
</body>
</html>
