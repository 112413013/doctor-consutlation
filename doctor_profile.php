<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Medico Connect - Doctor Profile</title>

    <style>

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        body {
            background: #f4f8fb;
            min-height: 100vh;
        }

        .header {
            background: #1769aa;
            color: white;
            padding: 18px 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            font-size: 22px;
            font-weight: bold;
        }

        .logo span {
            font-weight: 900;
        }

        .back-btn {
            color: white;
            text-decoration: none;
            background: #0d4f80;
            padding: 10px 18px;
            border-radius: 7px;
        }

        .profile-container {
            width: 90%;
            max-width: 1000px;
            margin: 40px auto;
        }

        h1 {
            color: #1769aa;
            margin-bottom: 8px;
        }

        .subtitle {
            color: #777;
            margin-bottom: 25px;
        }

        .profile-card {
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
        }

        .profile-top {
            display: flex;
            align-items: center;
            gap: 20px;
            border-bottom: 1px solid #ddd;
            padding-bottom: 25px;
        }

        .doctor-icon {
            font-size: 55px;
        }

        .profile-top h2 {
            color: #333;
        }

        .profile-top p {
            color: #1769aa;
            margin-top: 5px;
        }

        .profile-details {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
            margin-top: 25px;
        }

        .detail-box {
            background: #f5f9fc;
            padding: 18px;
            border-radius: 10px;
        }

        .detail-box label {
            display: block;
            color: #777;
            font-size: 14px;
            margin-bottom: 8px;
        }

        .detail-box p {
            font-size: 16px;
            font-weight: bold;
            color: #333;
        }

        .edit-form {
            display: none;
            margin-top: 30px;
            border-top: 1px solid #ddd;
            padding-top: 25px;
        }

        .edit-form h2 {
            margin-bottom: 20px;
            color: #1769aa;
        }

        .form-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 7px;
            font-weight: bold;
        }

        .form-group input {
            width: 100%;
            padding: 11px;
            border: 1px solid #ccc;
            border-radius: 7px;
        }

        .form-buttons {
            margin-top: 25px;
        }

        button {
            border: none;
            padding: 11px 20px;
            border-radius: 7px;
            cursor: pointer;
            font-weight: bold;
        }

        .profile-actions {
            margin-top: 25px;
        }

        .profile-actions button,
        .save-btn {
            background: #1769aa;
            color: white;
        }

        .cancel-btn {
            background: #ddd;
            color: #333;
            margin-left: 10px;
        }

        @media(max-width: 700px) {

            .profile-details,
            .form-grid {
                grid-template-columns: 1fr;
            }

            .header {
                padding: 15px;
            }
        }

    </style>

</head>

<body>

<header class="header">

    <div class="logo">
        <span>MEDICO</span> CONNECT
    </div>

    <a href="doctor_dashboard.html" class="back-btn">
        ← Dashboard
    </a>

</header>


<main class="profile-container">

    <h1>My Profile</h1>

    <p class="subtitle">
        View and manage your professional information
    </p>


    <section class="profile-card">

        <div class="profile-top">

            <div class="doctor-icon">
                👨‍⚕️
            </div>

            <div>

                <h2 id="displayName">
                    Loading...
                </h2>

                <p id="displaySpecialization">
                    Loading...
                </p>

            </div>

        </div>


        <div class="profile-details">

            <div class="detail-box">
                <label>Doctor Name</label>
                <p id="nameText">Loading...</p>
            </div>

            <div class="detail-box">
                <label>Specialization</label>
                <p id="specializationText">Loading...</p>
            </div>

            <div class="detail-box">
                <label>Email</label>
                <p id="emailText">Loading...</p>
            </div>

            <div class="detail-box">
                <label>Phone Number</label>
                <p id="phoneText">Loading...</p>
            </div>

            <div class="detail-box">
                <label>Experience</label>
                <p id="experienceText">Loading...</p>
            </div>

            <div class="detail-box">
                <label>Consultation Fee</label>
                <p id="feeText">Loading...</p>
            </div>

        </div>


        <div class="edit-form" id="editForm">

            <h2>Edit Profile</h2>

            <div class="form-grid">

                <div class="form-group">

                    <label>Doctor Name</label>

                    <input
                        type="text"
                        id="nameInput"
                    >

                </div>


                <div class="form-group">

                    <label>Specialization</label>

                    <input
                        type="text"
                        id="specializationInput"
                    >

                </div>


                <div class="form-group">

                    <label>Email</label>

                    <input
                        type="email"
                        id="emailInput"
                    >

                </div>


                <div class="form-group">

                    <label>Phone Number</label>

                    <input
                        type="text"
                        id="phoneInput"
                    >

                </div>


                <div class="form-group">

                    <label>Experience</label>

                    <input
                        type="number"
                        id="experienceInput"
                    >

                </div>


                <div class="form-group">

                    <label>Consultation Fee</label>

                    <input
                        type="number"
                        id="feeInput"
                        step="0.01"
                    >

                </div>

            </div>


            <div class="form-buttons">

                <button
                    class="save-btn"
                    onclick="saveProfile()">
                    Save Changes
                </button>

                <button
                    class="cancel-btn"
                    onclick="cancelEdit()">
                    Cancel
                </button>

            </div>

        </div>


        <div class="profile-actions" id="profileActions">

            <button onclick="editProfile()">
                Edit Profile
            </button>

        </div>

    </section>

</main>


<script>

let doctorData = {};


// Load doctor information
function loadProfile() {

    fetch("doctor_profile.php?action=get")
        .then(response => response.json())
        .then(data => {

            if (data.success) {

                doctorData = data.doctor;

                document.getElementById("displayName").textContent =
                    doctorData.doctor_name;

                document.getElementById("displaySpecialization").textContent =
                    doctorData.specialization;

                document.getElementById("nameText").textContent =
                    doctorData.doctor_name;

                document.getElementById("specializationText").textContent =
                    doctorData.specialization;

                document.getElementById("emailText").textContent =
                    doctorData.email;

                document.getElementById("phoneText").textContent =
                    doctorData.phone;

                document.getElementById("experienceText").textContent =
                    doctorData.experience + " Years";

                document.getElementById("feeText").textContent =
                    "₹" + doctorData.consultation_fee;

            } else {

                alert(data.message);

            }

        })
        .catch(error => {

            console.log(error);

            alert("Unable to load doctor profile.");

        });

}


// Open edit form
function editProfile() {

    document.getElementById("editForm").style.display = "block";

    document.getElementById("profileActions").style.display = "none";

    document.getElementById("nameInput").value =
        doctorData.doctor_name;

    document.getElementById("specializationInput").value =
        doctorData.specialization;

    document.getElementById("emailInput").value =
        doctorData.email;

    document.getElementById("phoneInput").value =
        doctorData.phone;

    document.getElementById("experienceInput").value =
        doctorData.experience;

    document.getElementById("feeInput").value =
        doctorData.consultation_fee;

}


// Save profile
function saveProfile() {

    let formData = new FormData();

    formData.append(
        "doctor_name",
        document.getElementById("nameInput").value
    );

    formData.append(
        "specialization",
        document.getElementById("specializationInput").value
    );

    formData.append(
        "email",
        document.getElementById("emailInput").value
    );

    formData.append(
        "phone",
        document.getElementById("phoneInput").value
    );

    formData.append(
        "experience",
        document.getElementById("experienceInput").value
    );

    formData.append(
        "consultation_fee",
        document.getElementById("feeInput").value
    );

    formData.append("action", "update");


    fetch("doctor_profile.php", {
        method: "POST",
        body: formData
    })

    .then(response => response.json())

    .then(data => {

        if (data.success) {

            alert("Profile updated successfully!");

            document.getElementById("editForm").style.display = "none";

            document.getElementById("profileActions").style.display = "block";

            loadProfile();

        } else {

            alert(data.message);

        }

    })

    .catch(error => {

        console.log(error);

        alert("Unable to update profile.");

    });

}


// Cancel editing
function cancelEdit() {

    document.getElementById("editForm").style.display = "none";

    document.getElementById("profileActions").style.display = "block";

}


// Load when page opens
loadProfile();

</script>

</body>
</html>
