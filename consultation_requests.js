// ================= ACCEPT REQUEST =================

function acceptRequest(button) {

    alert("Consultation request accepted successfully!");

    button.innerText = "Accepted";
    button.disabled = true;

    // Disable the Reject button
    let rejectButton = button.parentElement.querySelector(".reject-btn");

    rejectButton.disabled = true;
}


// ================= REJECT REQUEST =================

function rejectRequest(button) {

    let confirmReject = confirm(
        "Are you sure you want to reject this consultation request?"
    );

    if (confirmReject) {

        alert("Consultation request rejected.");

        button.innerText = "Rejected";
        button.disabled = true;

        // Disable the Accept button
        let acceptButton = button.parentElement.querySelector(".accept-btn");

        acceptButton.disabled = true;
    }
}