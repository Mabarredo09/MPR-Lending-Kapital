let profileDropdown = document.querySelector(".profile-dropdown");
let arrowDownIcon = document.querySelector(".arrow-down-icon");
let editProfileButton = document.getElementById("edit-profile-btn");
let saveProfileButton = document.getElementById("save-profile-btn");
let inputs = document.querySelectorAll(".inputs");
const zooming = new Zooming();
const notificationIcon = document.querySelector(".notification-icon");
const notificationDropdown = document.querySelector(".notification-dropdown");
let dashboardHeader = document.querySelector(".dashboard-header-right-content");

let profilePicturePreview = document.getElementById("profile-picture-preview");
let profilePictureUpload = document.getElementById("profile-picture-upload");
let uploadConfirmBtn = document.getElementById("upload-profile-btn");
let uploadCancelBtn = document.getElementById("cancel-upload-profile-btn");

profileDropdown.addEventListener("mouseover", function () {
  console.log("hovered");
  arrowDownIcon.style.transform = "rotate(180deg)";
  arrowDownIcon.style.transition = "transform 0.5s ease";
});

profileDropdown.addEventListener("mouseout", function () {
  arrowDownIcon.style.transform = "rotate(0deg)";
  arrowDownIcon.style.transition = "transform 0.5s ease";
});

notificationIcon.addEventListener("click", function () {
  notificationDropdown.style.display =
    notificationDropdown.style.display === "block" ? "none" : "block";
});

dashboardHeader.addEventListener("click", function () {
  window.location.href = "dashboard.php";
});
// Close the dropdown if the user clicks outside of it
window.addEventListener("click", function (event) {
  if (!event.target.closest(".notification")) {
    if (notificationDropdown.style.display === "block") {
      notificationDropdown.style.display = "none";
    }
  }
});

// Zooming
zooming.listen("#profile-picture-preview");
// Profile Picture Preview
profilePictureUpload.addEventListener("change", function () {
  const file = profilePictureUpload.files[0];
  if (file) {
    const reader = new FileReader();
    reader.onload = function (e) {
      profilePicturePreview.src = e.target.result;
    };
    reader.readAsDataURL(file);
    zooming.listen("#profile-picture-preview");
  }

  uploadConfirmBtn.disabled = false;
  uploadConfirmBtn.style.backgroundColor = "#1E3E62";
  uploadCancelBtn.style.display = "block";
});

uploadCancelBtn.addEventListener("click", function () {
  profilePicturePreview.src = "";
  uploadConfirmBtn.disabled = true;
  uploadConfirmBtn.style.backgroundColor = "#c1c1c1";
  uploadCancelBtn.style.display = "none";
});

// Edit Profile Information
editProfileButton.addEventListener("click", function () {
  console.log("clicked");
  editProfileButton.innerHTML =
    editProfileButton.innerHTML === "Edit Profile" ? "Cancel" : "Edit Profile";
  if (editProfileButton.innerHTML === "Cancel") {
    editProfileButton.style.backgroundColor = "#FF0000";
  } else {
    editProfileButton.style.backgroundColor = "#1E3E62";
  }

  if (editProfileButton.innerHTML === "Cancel") {
    saveProfileButton.disabled = false;
  } else {
    saveProfileButton.disabled = true;
  }

  if (editProfileButton.innerHTML === "Cancel") {
    saveProfileButton.style.backgroundColor = "#1E3E62";
  } else {
    saveProfileButton.style.backgroundColor = "#c1c1c1";
  }

  if (editProfileButton.innerHTML === "Cancel") {
    inputs.forEach((input) => (input.disabled = false));
  } else {
    inputs.forEach((input) => (input.disabled = true));
  }
});

saveProfileButton.addEventListener("click", function () {
  console.log("clicked");
  saveProfileButton.disabled = true;
  saveProfileButton.style.backgroundColor = "#c1c1c1";
  editProfileButton.innerHTML = "Edit Profile";
  editProfileButton.style.backgroundColor = "#1E3E62";
  inputs.forEach((input) => (input.disabled = true));
});
