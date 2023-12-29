<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        #loader-wrapper {
    position: fixed;
    width: 100%;
    height: 100%;
    top: 0;
    left: 0;
    background: rgba(255, 255, 255, 0.8);
    display: flex;
    align-items: center;
    justify-content: center;
    z-index: 9999;
    display: none; /* Initially hide the loader */
}

#loader {
    border: 8px solid #f3f3f3;
    border-top: 8px solid #3498db;
    border-radius: 50%;
    width: 50px;
    height: 50px;
    animation: spin 1s linear infinite;
}

@keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}

    </style>
    <title>Document</title>
</head>
<body>
<div id="loader-wrapper">
    <div id="loader"></div>
</div>
<script>
    // Function to show the loader
function showLoader() {
    document.getElementById('loader-wrapper').style.display = 'flex';
}

// Function to hide the loader
function hideLoader() {
    document.getElementById('loader-wrapper').style.display = 'none';
}

// Example usage: Call showLoader() when starting an action, and hideLoader() when the action is complete.

// Add this line before any action that may take time (e.g., before redirecting to a new page)
showLoader();

// Example: Redirect to a new page after 3 seconds
setTimeout(function () {
    hideLoader();
    window.location.href ='../notifications.php';
}, 3000);

</script>

</body>
</html>