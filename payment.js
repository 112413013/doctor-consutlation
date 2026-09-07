// ================= PAYMENT SUMMARY =================

function updatePaymentSummary() {

    let paidPayments =
        document.querySelectorAll(".paid");

    let pendingPayments =
        document.querySelectorAll(".pending");


    document.querySelector(
        ".summary-card:nth-child(2) p"
    ).innerText = paidPayments.length;


    document.querySelector(
        ".summary-card:nth-child(3) p"
    ).innerText = pendingPayments.length;

}


// Update summary when page opens

updatePaymentSummary();