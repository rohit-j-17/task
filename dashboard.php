<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/vue@3"></script>
</head>
<body>
    <div id="main-app">
        <div class="container-fluid p-3 bg-primary text-white text-center">
            <h1>File Uploading</h1>
        </div>

        <div class="container mt-5">
            <form enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="fileInput" class="form-label">*Please Upload CV.</label>
                    <input type="file" class="form-control" id="fileInput" name="fileInput">
                </div>
                <button type="button" class="btn btn-primary" onclick="uploadFile()">Upload</button>
            </form>
          
            <button type="button" class="btn btn-danger" onclick="logout()">Logout</button>

        </div>
        
    </div>
    <script>
        function uploadFile() {
            const input = document.getElementById('fileInput');
            const file = input.files[0];
            const formData = new FormData();
            formData.append('fileInput', file);

            fetch('src/Controllers/upload.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                console.log(data);
            })
            .catch(error => {
                console.error('Error:', error);
            });
        }
        function logout() {
            // Perform logout actions here, such as redirecting to a logout endpoint or clearing session data
            // For example, redirecting to a logout.php page:
            window.location.href = 'logout.php';
        }
    </script>
</body>
</html>
