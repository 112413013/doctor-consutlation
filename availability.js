// ================= AVAILABILITY DATA =================

let availability = JSON.parse(
    localStorage.getItem("doctorAvailability")
) || [];

let editIndex = -1;


// ================= SAVE AVAILABILITY =================

function saveAvailability() {

    let day = document.getElementById("day").value;

    let startTime = document.getElementById("startTime").value;

    let endTime = document.getElementById("endTime").value;

    let status = document.getElementById("status").value;


    // Check day

    if (day === "") {

        alert("Please select a day.");

        return;
    }


    // Check time

    if (startTime === "" || endTime === "") {

        alert("Please select start time and end time.");

        return;
    }


    // Check time order

    if (startTime >= endTime) {

        alert("End time must be after start time.");

        return;
    }


    // Create availability object

    let slot = {

        day: day,

        startTime: startTime,

        endTime: endTime,

        status: status

    };


    // Edit existing slot

    if (editIndex !== -1) {

        availability[editIndex] = slot;

        alert("Availability updated successfully!");

        editIndex = -1;

        document.getElementById("saveButton").innerText =
            "Add Availability";

        document.getElementById("cancelButton").style.display =
            "none";

    }

    // Add new slot

    else {

        availability.push(slot);

        alert("Availability added successfully!");

    }


    // Save in browser

    localStorage.setItem(
        "doctorAvailability",
        JSON.stringify(availability)
    );


    clearForm();

    displayAvailability();
}


// ================= DISPLAY AVAILABILITY =================

function displayAvailability() {

    let list = document.getElementById("availabilityList");

    list.innerHTML = "";


    if (availability.length === 0) {

        list.innerHTML =
            '<p class="empty-message">No availability added yet.</p>';

        return;
    }


    availability.forEach(function(slot, index) {

        let start = formatTime(slot.startTime);

        let end = formatTime(slot.endTime);


        let statusClass =
            slot.status === "Available"
            ? "available"
            : "not-available";


        list.innerHTML += `

            <div class="slot">

                <div class="slot-info">

                    <h3>${slot.day}</h3>

                    <p>
                        <strong>Time:</strong>
                        ${start} - ${end}
                    </p>

                    <p class="${statusClass}">
                        ${slot.status}
                    </p>

                </div>


                <div class="slot-buttons">

                    <button
                        class="edit-btn"
                        onclick="editAvailability(${index})">
                        Edit
                    </button>

                    <button
                        class="delete-btn"
                        onclick="deleteAvailability(${index})">
                        Delete
                    </button>

                </div>

            </div>

        `;

    });
}


// ================= EDIT AVAILABILITY =================

function editAvailability(index) {

    let slot = availability[index];


    document.getElementById("day").value =
        slot.day;

    document.getElementById("startTime").value =
        slot.startTime;

    document.getElementById("endTime").value =
        slot.endTime;

    document.getElementById("status").value =
        slot.status;


    editIndex = index;


    document.getElementById("saveButton").innerText =
        "Update Availability";

    document.getElementById("cancelButton").style.display =
        "inline-block";


    window.scrollTo({
        top: 0,
        behavior: "smooth"
    });
}


// ================= DELETE AVAILABILITY =================

function deleteAvailability(index) {

    let confirmDelete = confirm(
        "Are you sure you want to delete this availability?"
    );


    if (confirmDelete) {

        availability.splice(index, 1);


        localStorage.setItem(
            "doctorAvailability",
            JSON.stringify(availability)
        );


        displayAvailability();


        alert("Availability deleted successfully!");
    }
}


// ================= CANCEL EDIT =================

function cancelEdit() {

    editIndex = -1;


    clearForm();


    document.getElementById("saveButton").innerText =
        "Add Availability";

    document.getElementById("cancelButton").style.display =
        "none";
}


// ================= CLEAR FORM =================

function clearForm() {

    document.getElementById("day").value = "";

    document.getElementById("startTime").value = "";

    document.getElementById("endTime").value = "";

    document.getElementById("status").value =
        "Available";
}


// ================= FORMAT TIME =================

function formatTime(time) {

    let parts = time.split(":");

    let hour = parseInt(parts[0]);

    let minute = parts[1];


    let period = hour >= 12 ? "PM" : "AM";


    if (hour === 0) {

        hour = 12;

    } else if (hour > 12) {

        hour = hour - 12;
    }


    return hour + ":" + minute + " " + period;
}


// ================= LOAD DATA =================

displayAvailability();