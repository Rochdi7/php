<?php
session_start();
include_once('includes/header.php'); 
include_once('config/db.php');

// Check if the user_id session is set
if (!isset($_SESSION['user_id'])) {
    // Redirect to login page if user_id is not set
    header('Location: login.php');
    exit();
}

$user_id = $_SESSION['user_id'];  // Retrieve the user_id from session
$db = new Database();
$pdo = $db->getConnection();

// Fetch current user data
$stmt = $pdo->prepare("SELECT id, first_name, last_name, email, photo, password, birthday, gender FROM users WHERE id = :user_id");
$stmt->bindParam(':user_id', $user_id);
$stmt->execute();
$user = $stmt->fetch();

if ($user) {
    $currentPhoto = $user['photo'] ?? 'default.png';
    $firstName = $user['first_name'] ?? '';
    $lastName = $user['last_name'] ?? '';
    $email = $user['email'] ?? '';  // Make sure $email is set
    $password = $user['password'] ?? '';
    $birthday = $user['birthday'] ?? '';
    $gender = $user['gender'] ?? '';
} else {
    // Handle case where no user is found
    $error = "User not found.";
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Update profile photo
    if (isset($_FILES['photo']) && $_FILES['photo']['tmp_name']) {
        $image = $_FILES['photo'];
        $imageName = time() . '_' . basename($image['name']);
        $imagePath = 'assets/images/' . $imageName;

        $imageType = mime_content_type($image['tmp_name']);
        if (strpos($imageType, 'image') !== false) {
            if (move_uploaded_file($image['tmp_name'], $imagePath)) {
                $stmt = $pdo->prepare("UPDATE users SET photo = :photo WHERE id = :user_id");
                $stmt->bindParam(':photo', $imageName);
                $stmt->bindParam(':user_id', $user_id);
                if ($stmt->execute()) {
                    $_SESSION['photo'] = $imageName;
                    $currentPhoto = $imageName;
                    $success = "Profile photo updated successfully.";
                } else {
                    $error = "Failed to update profile photo.";
                }
            } else {
                $error = "Failed to upload image.";
            }
        } else {
            $error = "Please upload a valid image file.";
        }
    }

    // Update profile data (first name, last name, email, password, etc.)
    if (isset($_POST['first_name'], $_POST['last_name'], $_POST['email'], $_POST['password'], $_POST['birthday'], $_POST['gender'])) {
        $firstName = htmlspecialchars($_POST['first_name']);
        $lastName = htmlspecialchars($_POST['last_name']);
        $newEmail = htmlspecialchars($_POST['email']);
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $birthday = htmlspecialchars($_POST['birthday']);
        $gender = htmlspecialchars($_POST['gender']);

        // Check if the email is already used by another user
        if ($newEmail !== $user['email']) {
            $stmt = $pdo->prepare("SELECT * FROM users WHERE email = :new_email");
            $stmt->bindParam(':new_email', $newEmail);
            $stmt->execute();
            $existingUser = $stmt->fetch();
            if ($existingUser) {
                $error = "This email is already in use.";
            } else {
                $stmt = $pdo->prepare("UPDATE users SET first_name = :first_name, last_name = :last_name, email = :new_email, password = :password, birthday = :birthday, gender = :gender WHERE id = :user_id");
                $stmt->bindParam(':first_name', $firstName);
                $stmt->bindParam(':last_name', $lastName);
                $stmt->bindParam(':new_email', $newEmail);
                $stmt->bindParam(':password', $password);
                $stmt->bindParam(':birthday', $birthday);
                $stmt->bindParam(':gender', $gender);
                $stmt->bindParam(':user_id', $user_id);

                if ($stmt->execute()) {
                    $_SESSION['email'] = $newEmail;  // Update session with new email
                    $success = "Profile updated successfully.";
                } else {
                    $error = "Failed to update profile.";
                }
            }
        } else {
            $stmt = $pdo->prepare("UPDATE users SET first_name = :first_name, last_name = :last_name, birthday = :birthday, gender = :gender WHERE id = :user_id");
            $stmt->bindParam(':first_name', $firstName);
            $stmt->bindParam(':last_name', $lastName);
            $stmt->bindParam(':birthday', $birthday);
            $stmt->bindParam(':gender', $gender);
            $stmt->bindParam(':user_id', $user_id);

            if ($stmt->execute()) {
                $success = "Profile updated successfully.";
            } else {
                $error = "Failed to update profile.";
            }
        }
    }
}
?>


<?php include_once('includes/side_bar.php'); ?>

<div style="background-color: #1c1f26; color: #ffffff; font-family: 'Poppins', sans-serif; min-height: 100vh; display: flex; align-items: center; justify-content: center; margin-top: 40px; margin-bottom: 40px; margin-left: 250px;">
    <div style="background-color: #242731; padding: 40px; border-radius: 10px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2); width: 100%; max-width: 800px;">
        <div style="font-size: 2rem; font-weight: bold; color: #ffffff; text-align: center; margin-bottom: 30px; font-family: 'Pacifico', cursive;">Profile</div>

        <?php if (isset($success)): ?>
            <div style="padding: 10px; border-radius: 5px; text-align: center; margin-bottom: 20px; background-color: #D4EDDA; color: #000;"><?php echo $success; ?></div>
        <?php elseif (isset($error)): ?>
            <div style="padding: 10px; border-radius: 5px; text-align: center; margin-bottom: 20px; background-color: #F8D7DA; color: #000;"><?php echo $error; ?></div>
        <?php endif; ?>

        <form action="profile.php" method="POST" enctype="multipart/form-data">
            <div style="text-align: center; margin-bottom: 20px;">
                <img src="assets/images/<?php echo htmlspecialchars($currentPhoto); ?>" alt="Profile Image" style="width: 100px; height: 100px; border-radius: 50%; object-fit: cover; border: 2px solid #a8fa4f;">
            </div>

            <div style="margin-bottom: 20px;">
                <div style="font-weight: 600; color: #ffffff; font-size: 0.9rem; letter-spacing: 1px; margin-bottom: 8px;">Upload New Photo:</div>
                <input type="file" name="photo" accept="image/*" style="background-color: #1c1f26; border: 1px solid #3a3f4c; color: #ffffff; padding: 12px; border-radius: 5px; width: 100%; transition: all 0.3s ease;" onfocus="this.style.boxShadow='0 0 8px rgba(168, 250, 79, 0.5)'; this.style.borderColor='#a8fa4f';" onblur="this.style.boxShadow='none'; this.style.borderColor='#3a3f4c';">
            </div>

            <div style="margin-bottom: 20px;">
                <div style="font-weight: 600; color: #ffffff; font-size: 0.9rem; letter-spacing: 1px; margin-bottom: 8px;">First Name:</div>
                <input type="text" name="first_name" value="<?php echo htmlspecialchars($firstName); ?>" required style="background-color: #1c1f26; border: 1px solid #3a3f4c; color: #ffffff; padding: 12px; border-radius: 5px; width: 100%; transition: all 0.3s ease;" onfocus="this.style.boxShadow='0 0 8px rgba(168, 250, 79, 0.5)'; this.style.borderColor='#a8fa4f';" onblur="this.style.boxShadow='none'; this.style.borderColor='#3a3f4c';">
            </div>

            <div style="margin-bottom: 20px;">
                <div style="font-weight: 600; color: #ffffff; font-size: 0.9rem; letter-spacing: 1px; margin-bottom: 8px;">Last Name:</div>
                <input type="text" name="last_name" value="<?php echo htmlspecialchars($lastName); ?>" required style="background-color: #1c1f26; border: 1px solid #3a3f4c; color: #ffffff; padding: 12px; border-radius: 5px; width: 100%; transition: all 0.3s ease;" onfocus="this.style.boxShadow='0 0 8px rgba(168, 250, 79, 0.5)'; this.style.borderColor='#a8fa4f';" onblur="this.style.boxShadow='none'; this.style.borderColor='#3a3f4c';">
            </div>

            <div style="margin-bottom: 20px;">
                <div style="font-weight: 600; color: #ffffff; font-size: 0.9rem; letter-spacing: 1px; margin-bottom: 8px;">Email:</div>
                <input type="email" name="email" value="<?php echo htmlspecialchars($email); ?>" required style="background-color: #1c1f26; border: 1px solid #3a3f4c; color: #ffffff; padding: 12px; border-radius: 5px; width: 100%; transition: all 0.3s ease;" onfocus="this.style.boxShadow='0 0 8px rgba(168, 250, 79, 0.5)'; this.style.borderColor='#a8fa4f';" onblur="this.style.boxShadow='none'; this.style.borderColor='#3a3f4c';">
            </div>

            <div style="margin-bottom: 20px;">
                <div style="font-weight: 600; color: #ffffff; font-size: 0.9rem; letter-spacing: 1px; margin-bottom: 8px;">Password:</div>
                <input type="password" name="password" placeholder="Enter new password if changing" style="background-color: #1c1f26; border: 1px solid #3a3f4c; color: #ffffff; padding: 12px; border-radius: 5px; width: 100%; transition: all 0.3s ease;" onfocus="this.style.boxShadow='0 0 8px rgba(168, 250, 79, 0.5)'; this.style.borderColor='#a8fa4f';" onblur="this.style.boxShadow='none'; this.style.borderColor='#3a3f4c';">
            </div>

            <div style="margin-bottom: 20px;">
                <div style="font-weight: 600; color: #ffffff; font-size: 0.9rem; letter-spacing: 1px; margin-bottom: 8px;">Birthday:</div>
                <input type="date" name="birthday" value="<?php echo htmlspecialchars($birthday); ?>" style="background-color: #1c1f26; border: 1px solid #3a3f4c; color: #ffffff; padding: 12px; border-radius: 5px; width: 100%; transition: all 0.3s ease;" onfocus="this.style.boxShadow='0 0 8px rgba(168, 250, 79, 0.5)'; this.style.borderColor='#a8fa4f';" onblur="this.style.boxShadow='none'; this.style.borderColor='#3a3f4c';">
            </div>

            <div style="margin-bottom: 20px;">
                <div style="font-weight: 600; color: #ffffff; font-size: 0.9rem; letter-spacing: 1px; margin-bottom: 8px;">Gender:</div>
                <select name="gender" style="background-color: #1c1f26; border: 1px solid #3a3f4c; color: #ffffff; padding: 12px; border-radius: 5px; width: 100%; transition: all 0.3s ease;" onfocus="this.style.boxShadow='0 0 8px rgba(168, 250, 79, 0.5)'; this.style.borderColor='#a8fa4f';" onblur="this.style.boxShadow='none'; this.style.borderColor='#3a3f4c';">
                    <option value="Male" <?php echo $gender == 'Male' ? 'selected' : ''; ?>>Male</option>
                    <option value="Female" <?php echo $gender == 'Female' ? 'selected' : ''; ?>>Female</option>
                </select>
            </div>

            <button type="submit" style="background-color: #a8fa4f; color: #000000; font-weight: bold; border: none; border-radius: 5px; width: 250px; margin: 0 auto; display: block; padding: 12px 20px; text-transform: uppercase; letter-spacing: 1px; margin-top: 20px; transition: all 0.3s ease-in-out;" onmouseover="this.style.background='linear-gradient(45deg, #A8FA4F, #32CD7C)'; this.style.color='#1c1f26'; this.style.transform='scale(1.05)';" onmouseout="this.style.backgroundColor='#a8fa4f'; this.style.color='#000000'; this.style.transform='scale(1)';">
                Update Profile
            </button>
        </form>
    </div>
</div>

<style>
    .form-label {
    font-family: 'Poppins', sans-serif;
    font-weight: 600;
    color: #ffffff;
    font-size: 0.9rem;
    letter-spacing: 1px;
    text-transform: capitalize;
    margin-bottom: 8px;
    transition: all 0.3s ease;
}

.form-label:hover {
    color: #a8fa4f;
}
.form-control:focus {
    background-color: #1c1f26;
    border-color: #a8fa4f;
    color: #ffffff;
    box-shadow: 0 0 8px rgba(168, 250, 79, 0.5);
    /* Subtle green glow */
}
.form-control {
    background-color: #1c1f26;
    border: 1px solid #3a3f4c;
    color: #ffffff;
}

.form-control:focus {
    background-color: #1c1f26;
    border-color: #a8fa4f;
    color: #ffffff;
}
.form-control::placeholder {
color: #72777F; 
text-shadow: 0 0 5px rgba(0, 0, 0, 0.2); 
}

</style>

<?php include_once('includes/footer.php'); ?>
