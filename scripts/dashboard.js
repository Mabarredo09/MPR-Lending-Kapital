document.addEventListener('DOMContentLoaded', function() {

const addbtn = document.getElementById('add-btn');
let editbtn = document.getElementById('edit-btn');
let deletebtn = document.getElementById('delete-btn');
let inputText = document.querySelectorAll('.input-text');
let confirmBtn = document.querySelector('.confirmBtn');
let collateralInput = document.getElementById('collateralPhoto');
let collateralPreview = document.getElementById('collateral-preview');
let radioBtn = document.querySelectorAll('.input-radio');
let idPhotoInput = document.getElementById('idPhoto');
let idPhotoPreview = document.getElementById('idPhotoPreview');
let insurancePhotoInput = document.getElementById('insurancePhoto');
let insurancePhotoPreview = document.getElementById('insurancePhotoPreview');
let imgInput = document.querySelectorAll('.img-input');
let profileDropdown = document.querySelector('.profile-dropdown');
let arrowDownIcon = document.querySelector('.arrow-down-icon'); 
const notificationIcon = document.querySelector('.notification-icon');
const notificationDropdown = document.querySelector('.notification-dropdown');

const zooming = new Zooming();
profileDropdown.addEventListener('mouseover', function(){
    console.log('hovered');
    arrowDownIcon.style.transform = 'rotate(180deg)';
    arrowDownIcon.style.transition = 'transform 0.5s ease';
});

profileDropdown.addEventListener('mouseout', function(){
    arrowDownIcon.style.transform = 'rotate(0deg)';
    arrowDownIcon.style.transition = 'transform 0.5s ease';
});

notificationIcon.addEventListener('click', function() {
    notificationDropdown.style.display = notificationDropdown.style.display === 'block' ? 'none' : 'block';
});
// Close the dropdown if the user clicks outside of it
window.addEventListener('click', function(event) {
    if (!event.target.closest('.notification')) {
        if (notificationDropdown.style.display === 'block') {
            notificationDropdown.style.display = 'none';
        }
    }
});


addbtn.addEventListener('click',function(){
    console.log('clicked add button');
    addbtn.innerText= addbtn.innerText === "Add" ? "Cancel" : "Add";
    inputText.forEach(input => input.disabled = input.disabled ? false : true)
    radioBtn.forEach(input => input.disabled = input.disabled ? false : true)
    imgInput.forEach(input => input.disabled = input.disabled? false : true)
    inputText.forEach(input => input.value = "")
    radioBtn.forEach(input => input.checked = false)
    imgInput.forEach(input => input.value = "")
    collateralPreview.innerHTML = '';
    idPhotoPreview.innerHTML = '';
    insurancePhotoPreview.innerHTML = '';
    confirmBtn.style.display = confirmBtn.style.display === "block" ? "none" : "block";
    console.log(addbtn.innerText);
    deletebtn.disabled = true;
    editbtn.disabled = true;
});

editbtn.addEventListener('click',function(){
    console.log('clicked');
    deletebtn.disabled = false;
});

idPhotoInput.addEventListener('change',function(){
    idPhotoPreview.innerHTML= '';
    const file = idPhotoInput.files[0];
    const reader = new FileReader();
    reader.onload = function(e) {
        const img = document.createElement('img');
        img.src = e.target.result;
        img.style.maxWidth = '200px';
        img.style.margin = '10px';
        img.classList.add('zoomable');
        idPhotoPreview.appendChild(img);
        zooming.listen(img);
    };
    reader.readAsDataURL(file);
});
idPhotoPreview.addEventListener('click',function(){
   
});

insurancePhotoInput.addEventListener('change',function(){
    insurancePhotoPreview.innerHTML= '';
    const file = insurancePhotoInput.files[0];
    const reader = new FileReader();
    reader.onload = function(e) {
        const img = document.createElement('img');
        img.src = e.target.result;
        img.style.maxWidth = '200px';
        img.style.margin = '10px';
        img.classList.add('zoomable');
        insurancePhotoPreview.appendChild(img);
        zooming.listen(img);
    };
    reader.readAsDataURL(file);
});

collateralInput.addEventListener('change', function() {
    collateralPreview.innerHTML = ''; // Clear previous previews
    const files = collateralInput.files;
    for (let i = 0; i < files.length; i++) {
        const file = files[i];
        const reader = new FileReader();
        reader.onload = function(e) {
            const img = document.createElement('img');
            img.src = e.target.result;
            img.style.maxWidth = '200px';
            img.style.margin = '10px';
            img.classList.add('zoomable');
            collateralPreview.appendChild(img);
            zooming.listen(img);
        };
        reader.readAsDataURL(file);
    }
}, false);



// Javascript for the table
const tableAllBtn = document.getElementById('tblAllBtn');
let tableAddBtn = document.getElementById('addBtn');
const tablePaymentBtn = document.getElementById('tblPaymentBtn');
const tableLoanBtn = document.getElementById('tblLoanBtn');
const tableGroceryBtn = document.getElementById('tblGroceryBtn');


tableAllBtn.addEventListener('click', function() {
    tableAddBtn.style.display = 'none';
    tableAllBtn.classList.add('active');
    tableLoanBtn.classList.remove('active');
    tableGroceryBtn.classList.remove('active');
    tablePaymentBtn.classList.remove('active');

});
tablePaymentBtn.addEventListener('click', function() {
    tableAddBtn.style.display = 'block';
    tableAddBtn.innerHTML = 'Add New Payment';
    tablePaymentBtn.classList.add('active');
    tableLoanBtn.classList.remove('active');
    tableGroceryBtn.classList.remove('active');
    tableAllBtn.classList.remove('active');
});
tableLoanBtn.addEventListener('click', function() { 
    tableAddBtn.style.display = 'block';
    tableAddBtn.innerHTML = 'Add New Loan';
    tableLoanBtn.classList.add('active');
    tableGroceryBtn.classList.remove('active');
    tablePaymentBtn.classList.remove('active');
    tableAllBtn.classList.remove('active');

});
tableGroceryBtn.addEventListener('click', function() {
    tableAddBtn.style.display = 'block';
    tableAddBtn.innerHTML = 'Add New Grocery';
    tableGroceryBtn.classList.add('active');
    tableLoanBtn.classList.remove('active');
    tablePaymentBtn.classList.remove('active');
    tableAllBtn.classList.remove('active');
});

});
document.getElementById('search-input').addEventListener('input', function () {
    let searchValue = this.value.trim();
    let dataList = document.getElementById('borrower-list');

    if (searchValue === "") {
        dataList.innerHTML = "";
        return;
    }

    fetch(`search.php?name=${encodeURIComponent(searchValue)}`)
        .then(response => response.json())
        .then(data => {
            dataList.innerHTML = ""; // Clear previous results

            if (data.success && data.borrowers.length > 0) {
                data.borrowers.forEach(borrower => {
                    let option = document.createElement('option');
                    option.value = `${borrower.first_name} ${borrower.middle_name || ''} ${borrower.surname}`;
                    option.dataset.id = borrower.id;
                    dataList.appendChild(option);
                });
            }
        })
        .catch(error => console.error('Error:', error));
});



// Auto-fill form when borrower is selected
document.getElementById('search-input').addEventListener('change', function () {
    let selectedValue = this.value.trim();
    let selectedOption = Array.from(document.getElementById('borrower-list').options).find(opt => opt.value === selectedValue);

    const zooming = new Zooming();

    if (!selectedOption) return;

    let borrowerId = selectedOption.dataset.id;

    fetch(`get_borrower.php?id=${borrowerId}`)
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                const fields = {
                    first_name: 'first_name',
                    middle_name: 'middle_name',
                    surname: 'surname',
                    suffix: 'suffix',
                    sex: 'sex',
                    dob: 'DOB',
                    marital_status: 'maritalStatus',
                    contact_number: 'contactNo',
                    home_no: 'homeNo',
                    street: 'street',
                    baranggay: 'baranggay',
                    city: 'city',
                    province: 'province',
                    region: 'region',
                    idPhoto: 'id_photo',
                    id_type: 'idType',
                    id_no: 'idNo',
                    expiry_date: 'expiryDate',

                    // Employer details
                    employer_name: 'employerName',
                    years_with_employer: 'noOfYearsWorked',
                    position: 'position',
                    phone_no_employer: 'phoneNoEmployer',
                    salary: 'salary',

                    // Employer address
                    employer_home_no: 'employer_home_no',
                    employer_street: 'employer_street',
                    employer_baranggay: 'employer_baranggay',
                    employer_city: 'employer_city',
                    employer_province: 'employer_province',
                    employer_region: 'employer_region',

                    // Insurance details
                    insurancePhoto: 'insurance_file',
                    insurance_type: 'insuranceType',
                    insurance_issued_date: 'issuedDate',
                    insurance_expiry_date: 'insuranceExpiryDate',

                    // Dependent details
                    dependent_name: 'dependentName',
                    dependent_contact_no: 'dependentContactNo',

                    // Collateral details
                    collateralPhoto: 'collateral_files'
                };
            
                console.log(data);
                // Populate text fields
                Object.keys(fields).forEach(key => {
                    const element = document.getElementById(fields[key]);
                    if (element) {
                        element.value = data[key] || '';
                    }
                });

                // Handle sex radio buttons
                if (data.sex) {
                    document.querySelectorAll('input[name="sex"]').forEach(radio => {
                        radio.checked = radio.value === data.sex;
                    });
                }

               // Handle image previews
                if (data.id_photo) {
                    console.log(data.id_photo);
                    const idPreviewContainer = document.getElementById('idPhotoPreview');
                    idPreviewContainer.innerHTML = '';
                    const idImg = document.createElement('img');
                    idImg.src = data.id_photo;
                    idImg.style.maxWidth = '200px';
                    idImg.style.margin = '10px';
                    idImg.classList.add('zoomable');
                    idPreviewContainer.appendChild(idImg);
                    zooming.listen(idImg);
                }

                if (data.insurance_file) {
                    console.log(data.insurance_file);
                    const insurancePreviewContainer = document.getElementById('insurancePhotoPreview');
                    insurancePreviewContainer.innerHTML = '';
                    const insuranceImg = document.createElement('img');
                    insuranceImg.src = data.insurance_file;
                    insuranceImg.style.maxWidth = '200px';
                    insuranceImg.style.margin = '10px';
                    insuranceImg.classList.add('zoomable');
                    insurancePreviewContainer.appendChild(insuranceImg);
                    zooming.listen(insuranceImg);
                }

                if (data.collateral_files) {
                    
                    const collateralPreviewContainer = document.getElementById('collateral-preview');
                    // collateralPreviewContainer.innerHTML = ''; // Clear previous preview
                    // Handle multiple collateral images if they're in an array
                    const collateralFiles = Array.isArray(data.collateralPhoto) 
                        ? data.collateralPhoto 
                        : [data.collateralPhoto];
                    console.log(collateralFiles);
                    collateralFiles.forEach(file => {
                        const collateralImg = document.createElement('img');
                        collateralImg.src = file;
                        collateralImg.style.maxWidth = '200px';
                        collateralImg.style.margin = '10px';
                        collateralImg.classList.add('zoomable');
                        collateralPreviewContainer.appendChild(collateralImg);
                        zooming.listen(collateralImg);
                    });
                }

            } else {
                alert("Borrower not found!");
            }
        })
        .catch(error => console.error('Error:', error));
});



