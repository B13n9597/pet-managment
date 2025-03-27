<form action="pet_management/book_appointment.php" method="POST">
    <select name="pet_id">
        <!-- Dynamically populate pet names here using PHP -->
    </select>
    <input type="date" name="date" required>
    <input type="time" name="time" required>
    <input type="email" name="email" placeholder="Email for Reminder" required>
    <input type="text" name="phone" placeholder="Phone Number for SMS" required>
    <button type="submit">Book Appointment</button>
</form>
<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pet_id = $_POST['pet_id'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    $sql = "INSERT INTO appointments (pet_id, type, date, time, contact_email, contact_phone) 
            VALUES ('$pet_id', 'Vet Appointment', '$date', '$time', '$email', '$phone')";

    if ($conn->query($sql) === TRUE) {
        echo "Appointment booked successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
