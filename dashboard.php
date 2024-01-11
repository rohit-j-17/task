<?php include "includes/header.php"; ?>
    <div id="main-app">
        <div class="clearfix">&nbsp;</div>
        <div class="row text-center">
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
          
            

        </div>
        
    </div>
    <?php include "includes/footer.php"; ?>
    <script src="public/js/dashboard.js"></script>

