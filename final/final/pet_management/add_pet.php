<form action="pet_management/add_pet.php" method="POST">
    <input type="text" name="name" placeholder="Pet Name" required>
    <input type="text" name="category" placeholder="Category (cat, dog, etc.)" required>
    <input type="file" name="image" required>
    <button type="submit">Add Pet</button>
</form>
<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $category = $_POST['category'];
    $image = $_FILES['image']['name'];

    // Upload the image
    move_uploaded_file($_FILES['image']['tmp_name'], "../images/$image");

    $sql = "INSERT INTO pets (name, category, image) VALUES ('$name', '$category', '$image')";

    if ($conn->query($sql) === TRUE) {
        echo "New pet added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
