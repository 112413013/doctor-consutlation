// ================= LOGOUT =================

function logout() {
    let confirmLogout = confirm("Are you sure you want to logout?");

    if (confirmLogout) {
        window.location.href = "../login.html";
    }
}


// ================= ACCEPT CONSULTATION =================

document.querySelector(".accept").addEventListener("click", function () {

    alert("Consultation request accepted successfully!");

    this.innerText = "Accepted";
    this.disabled = true;

    document.querySelector(".reject").disabled = true;
});


// ================= REJECT CONSULTATION =================

document.querySelector(".reject").addEventListener("click", function () {

    let confirmReject = confirm(
        "Are you sure you want to reject this consultation request?"
    );

    if (confirmReject) {

        alert("Consultation request rejected.");

        this.innerText = "Rejected";
        this.disabled = true;

        document.querySelector(".accept").disabled = true;
    }
});