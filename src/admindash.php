<?php
session_start();
include 'setup.php';
include 'admindash.html';

?>
<script>
    // JavaScript to trigger the modal when the page loads
    document.addEventListener("DOMContentLoaded", function () {
        var modalParam = new URLSearchParams(window.location.search).get("modal");

        if (modalParam === "pendingModal") {
            var myModal = new bootstrap.Modal(document.getElementById("pendingModal"));
            myModal.show();
        }
    });
</script>