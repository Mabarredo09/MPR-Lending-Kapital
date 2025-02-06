const addbtn = document.getElementById('add-btn');
let editbtn = document.getElementById('edit-btn');
let deletebtn = document.getElementById('delete-btn');
let inputText = document.querySelectorAll('.input-text');
let confirmBtn = document.querySelector('.confirmBtn');
let collateralInput = document.getElementById('collateral');
let collateralPreview = document.getElementById('collateral-preview');
let radioBtn = document.querySelectorAll('.input-radio');
let idPhotoInput = document.getElementById('idPhoto');
let idPhotoPreview = document.getElementById('idPhotoPreview');
let insurancePhotoInput = document.getElementById('insurancePhoto');
let insurancePhotoPreview = document.getElementById('insurancePhotoPreview');
let imgInput = document.querySelectorAll('.img-input');

const zooming = new Zooming();

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
});
document.addEventListener('DOMContentLoaded', function () {
    const searchInput = document.getElementById('searchInput');
    const searchBtn = document.getElementById('searchBtn');
    const table = document.getElementById('dataTable');
    const rows = table.getElementsByTagName('tr');

    searchBtn.addEventListener('click', function () {
        const searchText = searchInput.value.toLowerCase();

        for (let i = 1; i < rows.length; i++) { // Start from 1 to skip the header row
            const row = rows[i];
            const cells = row.getElementsByTagName('td');
            let match = false;

            for (let j = 0; j < cells.length; j++) {
                const cellText = cells[j].textContent.toLowerCase();
                if (cellText.includes(searchText)) {
                    match = true;
                    break;
                }
            }

            if (match) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        }
    });

    // Optional: Clear search and show all rows when the search input is empty
    searchInput.addEventListener('input', function () {
        if (searchInput.value === '') {
            for (let i = 1; i < rows.length; i++) {
                rows[i].style.display = '';
            }
        }
    });
});