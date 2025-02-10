document.addEventListener("DOMContentLoaded", function () {
  const addbtn = document.getElementById("add-btn");
  let editbtn = document.getElementById("edit-btn");
  let deletebtn = document.getElementById("delete-btn");
  let inputText = document.querySelectorAll(".input-text");
  let confirmBtn = document.querySelector(".confirmBtn");
  let collateralInput = document.getElementById("collateral");
  let collateralPreview = document.getElementById("collateral-preview");
  let radioBtn = document.querySelectorAll(".input-radio");
  let idPhotoInput = document.getElementById("idPhoto");
  let idPhotoPreview = document.getElementById("idPhotoPreview");
  let insurancePhotoInput = document.getElementById("insurancePhoto");
  let insurancePhotoPreview = document.getElementById("insurancePhotoPreview");
  let imgInput = document.querySelectorAll(".img-input");
  let profileDropdown = document.querySelector(".profile-dropdown");
  let arrowDownIcon = document.querySelector(".arrow-down-icon");
  const notificationIcon = document.querySelector(".notification-icon");
  const notificationDropdown = document.querySelector(".notification-dropdown");

  const zooming = new Zooming();
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
  // Close the dropdown if the user clicks outside of it
  window.addEventListener("click", function (event) {
    if (!event.target.closest(".notification")) {
      if (notificationDropdown.style.display === "block") {
        notificationDropdown.style.display = "none";
      }
    }
  });

  addbtn.addEventListener("click", function () {
    console.log("clicked add button");
    addbtn.innerText = addbtn.innerText === "Add" ? "Cancel" : "Add";
    inputText.forEach(
      (input) => (input.disabled = input.disabled ? false : true)
    );
    radioBtn.forEach(
      (input) => (input.disabled = input.disabled ? false : true)
    );
    imgInput.forEach(
      (input) => (input.disabled = input.disabled ? false : true)
    );
    inputText.forEach((input) => (input.value = ""));
    radioBtn.forEach((input) => (input.checked = false));
    imgInput.forEach((input) => (input.value = ""));
    collateralPreview.innerHTML = "";
    idPhotoPreview.innerHTML = "";
    insurancePhotoPreview.innerHTML = "";
    confirmBtn.style.display =
      confirmBtn.style.display === "block" ? "none" : "block";
    console.log(addbtn.innerText);
    deletebtn.disabled = true;
    editbtn.disabled = true;
  });

  editbtn.addEventListener("click", function () {
    console.log("clicked");
    deletebtn.disabled = false;
  });

  idPhotoInput.addEventListener("change", function () {
    idPhotoPreview.innerHTML = "";
    const file = idPhotoInput.files[0];
    const reader = new FileReader();
    reader.onload = function (e) {
      const img = document.createElement("img");
      img.src = e.target.result;
      img.style.maxWidth = "200px";
      img.style.margin = "10px";
      img.classList.add("zoomable");
      idPhotoPreview.appendChild(img);
      zooming.listen(img);
    };
    reader.readAsDataURL(file);
  });
  idPhotoPreview.addEventListener("click", function () {});

  insurancePhotoInput.addEventListener("change", function () {
    insurancePhotoPreview.innerHTML = "";
    const file = insurancePhotoInput.files[0];
    const reader = new FileReader();
    reader.onload = function (e) {
      const img = document.createElement("img");
      img.src = e.target.result;
      img.style.maxWidth = "200px";
      img.style.margin = "10px";
      img.classList.add("zoomable");
      insurancePhotoPreview.appendChild(img);
      zooming.listen(img);
    };
    reader.readAsDataURL(file);
  });

  collateralInput.addEventListener(
    "change",
    function () {
      collateralPreview.innerHTML = ""; // Clear previous previews
      const files = collateralInput.files;
      for (let i = 0; i < files.length; i++) {
        const file = files[i];
        const reader = new FileReader();
        reader.onload = function (e) {
          const img = document.createElement("img");
          img.src = e.target.result;
          img.style.maxWidth = "200px";
          img.style.margin = "10px";
          img.classList.add("zoomable");
          collateralPreview.appendChild(img);
          zooming.listen(img);
        };
        reader.readAsDataURL(file);
      }
    },
    false
  );

  // Javascript for the table
  const tableAllBtn = document.getElementById("tblAllBtn");
  let tableAddBtn = document.getElementById("addBtn");
  const tablePaymentBtn = document.getElementById("tblPaymentBtn");
  const tableLoanBtn = document.getElementById("tblLoanBtn");
  const tableGroceryBtn = document.getElementById("tblGroceryBtn");

  // Modals for Payment, Loan, and Grocery
  const paymentModal = document.getElementById("paymentModal");
  const loanModal = document.getElementById("loanModal");
  const groceryModal = document.getElementById("groceryModal");
  const closeModalButtons = document.querySelectorAll(".close-modal");
  const today = new Date().toISOString().split("T")[0];

  const customerType = document.getElementById("customerType");
  let interestRate = document.getElementById("interestRate");

  tableAllBtn.addEventListener("click", function () {
    tableAddBtn.style.display = "none";
    tableAllBtn.classList.add("active");
    tableLoanBtn.classList.remove("active");
    tableGroceryBtn.classList.remove("active");
    tablePaymentBtn.classList.remove("active");
  });
  tablePaymentBtn.addEventListener("click", function () {
    tableAddBtn.style.display = "block";
    tableAddBtn.innerHTML = "Add New Payment";
    tablePaymentBtn.classList.add("active");
    tableLoanBtn.classList.remove("active");
    tableGroceryBtn.classList.remove("active");
    tableAllBtn.classList.remove("active");
  });
  tableLoanBtn.addEventListener("click", function () {
    tableAddBtn.style.display = "block";
    tableAddBtn.innerHTML = "Add New Loan";
    tableLoanBtn.classList.add("active");
    tableGroceryBtn.classList.remove("active");
    tablePaymentBtn.classList.remove("active");
    tableAllBtn.classList.remove("active");
  });
  tableGroceryBtn.addEventListener("click", function () {
    tableAddBtn.style.display = "block";
    tableAddBtn.innerHTML = "Add New Grocery";
    tableGroceryBtn.classList.add("active");
    tableLoanBtn.classList.remove("active");
    tablePaymentBtn.classList.remove("active");
    tableAllBtn.classList.remove("active");
  });

  tableAddBtn.addEventListener("click", function () {
    console.log("Add new item");
    if (tableAddBtn.innerHTML === "Add New Payment") {
      paymentModal.style.display = "block";
    } else if (tableAddBtn.innerHTML === "Add New Loan") {
      loanModal.style.display = "block";
    } else if (tableAddBtn.innerHTML === "Add New Grocery") {
      groceryModal.style.display = "block";
    }
  });

  closeModalButtons.forEach((button) => {
    button.addEventListener("click", function () {
      console.log("Close modal");
      const modalId = button.getAttribute("data-modal");
      document.getElementById(modalId).style.display = "none";

      // Clear all inputs except submit and clear buttons
      const modalInputs = document.querySelectorAll(
        `#${modalId} input:not([type="submit"]):not([type="reset"]):not([type="date"])`
      );
      modalInputs.forEach((input) => (input.value = ""));

      // Reset select elements if any
      const modalSelects = document.querySelectorAll(`#${modalId} select`);
      modalSelects.forEach((select) => (select.selectedIndex = 0));
    });
  });

  customerType.addEventListener("change", function () {
    if (customerType.value === "Regular") {
      interestRate.disabled = true;
      interestRate.value = "7";
    } else if (customerType.value === "VIP") {
      interestRate.disabled = true;
      interestRate.value = "5";
    } else if (customerType.value === "Other") {
      interestRate.value = "";
      interestRate.placeholder = "Enter interest rate";
      interestRate.disabled = false;
    } else {
      interestRate.value = "0";
      interestRate.disabled = true;
    }
  });
  // Move the interest rate validation outside the change event
  interestRate.addEventListener("input", function () {
    const value = parseFloat(this.value);
    if (value > 100) {
      this.value = 100;
    } else if (value < 0) {
      this.value = 0;
    }
  });

  // Form validation
  const loanForm = document.querySelector("#loanModal form");
  loanForm.addEventListener("submit", function (event) {
    event.preventDefault();
    const value = parseFloat(interestRate.value);
    if (value < 0 || value > 100) {
      event.preventDefault();
      Swal.fire({
        icon: "error",
        title: "Invalid Interest Rate",
        text: "Interest rate must be between 0% and 100%",
      });
    } else {
      Swal.fire({
        icon: "warning",
        title: "Are you sure you want to add this loan?",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, add it!",
      }).then((result) => {
        if (result.isConfirmed) {
          Swal.fire({
            icon: "success",
            title: "Success!",
            text: "Loan has been successfully added.",
          }).then(() => {
            // Submit the form programmatically
            const formData = new FormData(loanForm);
            fetch(loanForm.action, {
              method: "POST",
              body: formData,
            }).then(() => {
              // Clear form and close modal after successful submission
              loanForm.reset();
              document.getElementById("loanModal").style.display = "none";
              // Reload the table to reflect the new data
              location.reload();
            });
          });
        }
      });
    }
  });

  // Set default date value to today
  document.getElementById("paymentDate").value = today;
  document.getElementById("loanDate").value = today;
  document.getElementById("groceryDate").value = today;
});
