```javascript
document.addEventListener("DOMContentLoaded", function () {

    loadDashboard();


    // =========================
    // LOAD DASHBOARD
    // =========================

    function loadDashboard() {

        fetch("doctor_dashboard.php")
            .then(response => response.json())
            .then(data => {

                if (!data.success) {

                    alert(data.message);

                    window.location.href = "doctor_login.html";

                    return;
                }


                // =========================
                // DOCTOR NAME
                // =========================

                document.getElementById("sidebarDoctorName").textContent =
                    data.doctor.doctor_name;

                document.getElementById("welcomeMessage").textContent =
                    "Welcome, Dr. " + data.doctor.doctor_name;


                // =========================
                // DASHBOARD COUNTS
                // =========================

                document.getElementById("totalPatients").textContent =
                    data.counts.total_patients;

                document.getElementById("todayConsultations").textContent =
                    data.counts.today_consultations;

                document.getElementById("pendingRequests").textContent =
                    data.counts.pending_requests;

                document.getElementById("completedConsultations").textContent =
                    data.counts.completed_consultations;


                // =========================
                // AVAILABILITY
                // =========================

                if (data.availability) {

                    document.getElementById("availabilityStatus").textContent =
                        "Available";

                    document.getElementById("availableDays").textContent =
                        data.availability.available_days || "No data";

                    document.getElementById("availableTime").textContent =
                        data.availability.available_time || "No data";

                } else {

                    document.getElementById("availabilityStatus").textContent =
                        "Not Available";

                    document.getElementById("availableDays").textContent =
                        "No data";

                    document.getElementById("availableTime").textContent =
                        "No data";
                }


                // =========================
                // CONSULTATION REQUEST
                // =========================

                displayRequest(data.request);

            })

            .catch(error => {

                console.error("Error:", error);

                alert("Unable to load dashboard data.");

            });
    }


    // =========================
    // DISPLAY REQUEST
    // =========================

    function displayRequest(request) {

        const requestContainer =
            document.getElementById("consultationRequest");


        if (!request) {

            requestContainer.innerHTML = `
                <p class="no-data">
                    No pending consultation requests.
                </p>
            `;

            return;
        }


        requestContainer.innerHTML = `

            <div class="request-box">

                <p>
                    <strong>Patient:</strong>
                    ${request.patient_name}
                </p>

                <p>
                    <strong>Date:</strong>
                    ${request.consultation_date}
                </p>

                <p>
                    <strong>Time:</strong>
                    ${request.consultation_time}
                </p>

                <p>
                    <strong>Reason:</strong>
                    ${request.reason || "Not provided"}
                </p>

                <div class="request-buttons">

                    <button
                        class="accept-btn"
                        onclick="updateRequest(${request.consultation_id}, 'Accepted')">
                        Accept
                    </button>

                    <button
                        class="reject-btn"
                        onclick="updateRequest(${request.consultation_id}, 'Rejected')">
                        Reject
                    </button>

                </div>

            </div>
        `;
    }


    // =========================
    // LOGOUT
    // =========================

    document.getElementById("logoutBtn").addEventListener("click", function (event) {

        event.preventDefault();

        if (confirm("Are you sure you want to logout?")) {

            window.location.href = "doctor_logout.php";

        }

    });

});


// =========================
// UPDATE CONSULTATION
// =========================

function updateRequest(consultationId, status) {

    const formData = new FormData();

    formData.append("consultation_id", consultationId);

    formData.append("status", status);


    fetch("doctor_dashboard.php", {

        method: "POST",

        body: formData

    })

    .then(response => response.json())

    .then(data => {

        if (data.success) {

            alert(data.message);

            location.reload();

        } else {

            alert(data.message);

        }

    })

    .catch(error => {

        console.error("Error:", error);

        alert("Unable to update consultation.");

    });
}
```
