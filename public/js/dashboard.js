var token = "";
var userId = "";
if (localStorage.getItem("token") == null) {
  window.location.href = "/NEC";
} else {
  token = localStorage.getItem("token");
  userId = localStorage.getItem("user_id");
}
function uploadFile() {
  const input = document.getElementById("fileInput");
  const file = input.files[0];
  const formData = new FormData();
  formData.append("fileInput", file);

  fetch("src/Controllers/upload.php", {
    method: "POST",
    headers: {
      Authorization: token,
      User_id: userId,
    },
    body: formData,
  })
    .then((response) => response.json())
    .then((data) => {
      // console.log(data);
      alert(data.message) ? "" : location.reload();
    })
    .catch((error) => {
      console.log("Error:", data.message) ? "" : location.reload();
    });
}
function logout() {
  // Perform logout actions here, such as redirecting to a logout endpoint or clearing session data
  // For example, redirecting to a logout.php page:

  localStorage.removeItem("token");
  window.location.href = "";
}
