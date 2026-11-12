$(document).ready(function () {
    $("#registrationForm").on("submit", function (e) {
        e.preventDefault();

        const phone = $("#phone").val().trim();
        if (phone.length < 10) {
            alert("Please enter a valid phone number with at least 10 digits.");
            return;
        }

        $("#submitBtn").text("Processing...").prop("disabled", true);

        $.ajax({
            type: "POST",
            url: "process.php",
            data: $(this).serialize(),
            success: function (response) {
                $("#form-section").fadeOut(200, function () {
                    $("#result-section").html(response).fadeIn(300);
                });
            },
            error: function () {
                alert("An error occurred while submitting the form. Please try again.");
                $("#submitBtn").text("Submit Application").prop("disabled", false);
            }
        });
    });
});

function resetForm() {
    $("#result-section").fadeOut(200, function () {
        $("#registrationForm")[0].reset();
        $("#submitBtn").text("Submit Application").prop("disabled", false);
        $("#form-section").fadeIn(300);
    });
}
