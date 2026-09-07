// ================= SEARCH HISTORY =================

function searchHistory() {

    let searchText =
        document.getElementById("searchInput").value.toLowerCase();

    let historyItems =
        document.querySelectorAll(".history-item");


    for (let i = 0; i < historyItems.length; i++) {

        let patientName =
            historyItems[i]
            .querySelector("h3")
            .innerText
            .toLowerCase();


        if (patientName.includes(searchText)) {

            historyItems[i].style.display = "flex";

        } else {

            historyItems[i].style.display = "none";

        }

    }

}


// ================= VIEW PRESCRIPTION =================

function viewPrescription(patient) {

    if (patient == "sarah") {

        alert(
            "Sarah Johnson\n\n" +
            "Medicine: Paracetamol\n" +
            "Dosage: 500 mg\n" +
            "Duration: 3 Days\n" +
            "Instructions: Take after food"
        );

    }


    else if (patient == "emily") {

        alert(
            "Emily Davis\n\n" +
            "Medicine: Cetirizine\n" +
            "Dosage: 10 mg\n" +
            "Duration: 5 Days\n" +
            "Instructions: Take at night"
        );

    }


    else if (patient == "david") {

        alert(
            "David Wilson\n\n" +
            "Medicine: Vitamin D3\n" +
            "Dosage: 1000 IU\n" +
            "Duration: 7 Days\n" +
            "Instructions: Take after breakfast"
        );

    }

}