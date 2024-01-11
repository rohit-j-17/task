  
  <link href="public/css/style.css" rel="stylesheet">
  <div class="container-fluid">
    <footer id="foot" class="bg-dark text-white text-center py-3">
      <p>&copy; 2024 Nec Software Solution. All rights reserved.</p>
    </footer>
  </div>
  <script>
    if(localStorage.getItem('token') == null){
      // window.location.href = "";
      document.getElementById("logout-btn").remove();
    }
  </script>
