<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <link rel="stylesheet" href="admin.css">
</head>
<body>
    <header>
        <p id="para">Welcome to the Admin Page</p>
        <a href="signup.html" class="logout-btn">Sign Out</a>
    </header>

    <nav>
        <ul>
            <li><a href="Home_page.php">HOME</a></li>
            <li><a href="#">Users</a></li>
            <li><a href="clubs.php">Activities</a></li>
            
        </ul>
    </nav>
    <div class="container" id="userList" style="display: none;">
        <h1>User List</h1>
        <button class="add-user-btn" onclick="showAddUserForm()">Add User</button>
        <div id="addUserForm" style="display: none;">
            <h2>Add User</h2>
            <form id="addUserForm">
                <div class="form-group">
                    <label for="newUsername">Username:</label>
                    <input type="text" id="newUsername" name="newUsername" required>
                </div>
                <div class="form-group">
                    <label for="newPassword">Password:</label>
                    <input type="password" id="newPassword" name="newPassword" required>
                </div>
                <div class="form-group">
                    <label for="club">Club:</label>
                    <input type="text" id="club" name="club" required>
                </div>
                <div class="form-group">
                    <label for="profilePic">Profile Picture:</label>
                    <input type="file" id="profilePic" name="profilePic" accept="image/*" required>
                </div>
                <button type="submit" class="add-user-submit-btn">Submit</button>
            </form><br>
        </div>
        <div id="userCards"></div>
    </div>

    <script>
        
        var users = [
            { username: 'Caleb Nyakwara', password: '123', club: 'ZUBES CLUB', profilePic: 'jay.jpg' },
            { username: 'Ruth Kebaso', password: '2467', club: 'LEO CLUB', profilePic: 'Creativity.png' },
            { username: 'Danstan Makori', password: '32435', club: 'AJIRA CLUB', profilePic: 'AIphoto.jpg' }
        ];

        // Function to show the add user form
        function showAddUserForm() {
            document.getElementById('addUserForm').style.display = 'block';
        }

        // Function to display user cards
        function displayUserCards() {
            var userCardsContainer = document.getElementById('userCards');
            userCardsContainer.innerHTML = ''; // Clear previous content
            users.forEach(function(user, index) {
                var userCard = document.createElement('div');
                userCard.className = 'user-card';
                userCard.innerHTML = `
                    <img src="${user.profilePic}" alt="Profile Picture">
                    <p><strong>Name:</strong> ${user.username}</p>
                    <p><strong>Club:</strong> ${user.club}</p>
                    <p><strong>Password:</strong> ${user.password}</p>
                    <button class="delete-user-btn" onclick="deleteUser(${index})">Delete</button>
                `;
                userCardsContainer.appendChild(userCard);
            });
        }

        // Function to delete a user
        function deleteUser(index) {
            users.splice(index, 1); // Remove user from array
            displayUserCards(); // Re-display user cards
        }

        // Function to handle add user form submission
        document.getElementById('addUserForm').addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent form submission
            var newUsername = document.getElementById('newUsername').value;
            var newPassword = document.getElementById('newPassword').value;
            var newClub = document.getElementById('club').value;
            var profilePic = document.getElementById('profilePic').files[0];

            // Dummy logic to add user (replace with actual logic)
            // For profile picture, you can handle file upload and storage in your backend
            var profilePicUrl = 'path/to/default-profile-pic.jpg'; // Default profile picture
            if (profilePic) {
                // Upload profile picture and get the URL
                profilePicUrl = URL.createObjectURL(profilePic);
            }

            users.push({ username: newUsername, password: newPassword, club: newClub, profilePic: profilePicUrl });

            // Clear form fields after submission (optional)
            document.getElementById('newUsername').value = '';
            document.getElementById('newPassword').value = '';
            document.getElementById('club').value = '';
            document.getElementById('profilePic').value = '';

            // Re-display user cards with updated data
            displayUserCards();
        });

        // Display initial user cards
        document.getElementById('userList').style.display = 'block';
        displayUserCards();
    </script>
</body>
</html>
