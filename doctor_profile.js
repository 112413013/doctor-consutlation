// ================= EDIT PROFILE =================

function editProfile() {

    document.getElementById("editForm").style.display = "block";

    document.getElementById("profileActions").style.display = "none";
}


// ================= SAVE PROFILE =================

function saveProfile() {

    let name = document.getElementById("nameInput").value;
    let specialization = document.getElementById("specializationInput").value;
    let email = document.getElementById("emailInput").value;
    let phone = document.getElementById("phoneInput").value;
    let experience = document.getElementById("experienceInput").value;
    let fee = document.getElementById("feeInput").value;


    // Basic validation

    if (
        name === "" ||
        specialization === "" ||
        email === "" ||
        phone === "" ||
        experience === "" ||
        fee === ""
    ) {

        alert("Please fill in all profile details.");

        return;
    }


    // Update profile information

    document.getElementById("displayName").innerText = name;
    document.getElementById("displaySpecialization").innerText = specialization;

    document.getElementById("nameText").innerText = name;
    document.getElementById("specializationText").innerText = specialization;
    document.getElementById("emailText").innerText = email;
    document.getElementById("phoneText").innerText = phone;
    document.getElementById("experienceText").innerText = experience;
    document.getElementById("feeText").innerText = fee;


    // Hide edit form

    document.getElementById("editForm").style.display = "none";

    document.getElementById("profileActions").style.display = "block";


    alert("Profile updated successfully!");
}


// ================= CANCEL EDIT =================

function cancelEdit() {

    document.getElementById("editForm").style.display = "none";

    document.getElementById("profileActions").style.display = "block";

}