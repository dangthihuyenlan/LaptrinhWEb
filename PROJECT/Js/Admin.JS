// -------------------------------------------------
// pagination
    // Product
document.addEventListener('DOMContentLoaded', function () {
    var rows = document.querySelectorAll('.hang_product');
    var rowsPerPage = 7;
    var totalPages = Math.ceil(rows.length / rowsPerPage);
    showPage(1);
    function showPage(page) {
        var start = (page - 1) * rowsPerPage;
        var end = start + rowsPerPage;
    
        for (var i = 0; i < rows.length; i++) {
            rows[i].classList.remove('active');
        }
    
        for (var i = start; i < end && i < rows.length; i++) {
            rows[i].classList.add('active');
        }
    }
    function updatePagination() {
        var paginationContainer = document.querySelector('.pagination');
        paginationContainer.innerHTML = '';
    
        for (var i = 1; i <= totalPages; i++) {
            var button = document.createElement('button');
            button.textContent = i;
            button.addEventListener('click', function () {
                showPage(parseInt(this.textContent));
            });
    
            paginationContainer.appendChild(button);
        }
    }
    updatePagination();
    
});
    // warehouse
    document.addEventListener('DOMContentLoaded', function () {
        var rows = document.querySelectorAll('.hang_warehouse');
        var rowsPerPage = 7;
        var totalPages = Math.ceil(rows.length / rowsPerPage);
        showPage(1);
        function showPage(page) {
            var start = (page - 1) * rowsPerPage;
            var end = start + rowsPerPage;
        
            for (var i = 0; i < rows.length; i++) {
                rows[i].classList.remove('active');
            }
        
            for (var i = start; i < end && i < rows.length; i++) {
                rows[i].classList.add('active');
            }
        }
        function updatePagination() {
            var paginationContainer = document.querySelector('.pagination_warehouse');
            paginationContainer.innerHTML = '';
        
            for (var i = 1; i <= totalPages; i++) {
                var button = document.createElement('button');
                button.textContent = i;
                button.addEventListener('click', function () {
                    showPage(parseInt(this.textContent));
                });
        
                paginationContainer.appendChild(button);
            }
        }
        updatePagination();
        
    });
    // Orders
    document.addEventListener('DOMContentLoaded', function () {
        var rows = document.querySelectorAll('.hang_orders');
        var rowsPerPage = 7;
        var totalPages = Math.ceil(rows.length / rowsPerPage);
        showPage(1);
        function showPage(page) {
            var start = (page - 1) * rowsPerPage;
            var end = start + rowsPerPage;
        
            for (var i = 0; i < rows.length; i++) {
                rows[i].classList.remove('active');
            }
        
            for (var i = start; i < end && i < rows.length; i++) {
                rows[i].classList.add('active');
            }
        }
        function updatePagination() {
            var paginationContainer = document.querySelector('.pagination_orders');
            paginationContainer.innerHTML = '';
        
            for (var i = 1; i <= totalPages; i++) {
                var button = document.createElement('button');
                button.textContent = i;
                button.addEventListener('click', function () {
                    showPage(parseInt(this.textContent));
                });
        
                paginationContainer.appendChild(button);
            }
        }
        updatePagination();
        
    });
    // Customers
    document.addEventListener('DOMContentLoaded', function () {
        var rows = document.querySelectorAll('.hang_customers');
        var rowsPerPage = 7;
        var totalPages = Math.ceil(rows.length / rowsPerPage);
        showPage(1);
        function showPage(page) {
            var start = (page - 1) * rowsPerPage;
            var end = start + rowsPerPage;
        
            for (var i = 0; i < rows.length; i++) {
                rows[i].classList.remove('active');
            }
        
            for (var i = start; i < end && i < rows.length; i++) {
                rows[i].classList.add('active');
            }
        }
        function updatePagination() {
            var paginationContainer = document.querySelector('.pagination_customers');
            paginationContainer.innerHTML = '';
        
            for (var i = 1; i <= totalPages; i++) {
                var button = document.createElement('button');
                button.textContent = i;
                button.addEventListener('click', function () {
                    showPage(parseInt(this.textContent));
                });
        
                paginationContainer.appendChild(button);
            }
        }
        updatePagination();
        
    });
//---------------------------------------------------------------------------------------------
// add 
    // addProduct
       // add_img_product
           document.addEventListener("DOMContentLoaded", function () {
            var uploadForm = document.getElementById("uploadForm");
            var imageUpload = document.getElementById("imageUpload");
            var previewContainer = document.getElementById("previewContainer");
        
            // Hiển thị ảnh trước khi tải lên
            imageUpload.addEventListener("change", function () {
                previewContainer.innerHTML = ""; // Xóa các ảnh trước đó
        
                var files = imageUpload.files;
                var maxImagesToShow = 4;
                for (var i = 0; i < Math.min(files.length, maxImagesToShow); i++) {
                    var file = files[i];
                    var reader = new FileReader();
        
                    reader.onload = function (e) {
                        var previewImage = document.createElement("img");
                        previewImage.src = e.target.result;
                        previewImage.alt = "Preview";
                        previewImage.style.maxWidth = "100%";
                        previewContainer.appendChild(previewImage);
                    };
        
                    reader.readAsDataURL(file);
                }
            });
            uploadForm.addEventListener("dragover", function (e) {
                e.preventDefault();
                uploadForm.classList.add("dragover");
            });
        
            uploadForm.addEventListener("dragleave", function (e) {
                e.preventDefault();
                uploadForm.classList.remove("dragover");
            });
        
            uploadForm.addEventListener("drop", function (e) {
                e.preventDefault();
                uploadForm.classList.remove("dragover");
        
                var files = e.dataTransfer.files;
                var maxImagesToShow = 4;
                for (var i = 0; i < Math.min(files.length, maxImagesToShow); i++) {
                    var file = files[i];
                    var reader = new FileReader();
        
                    reader.onload = function (e) {
                        var previewImage = document.createElement("img");
                        previewImage.src = e.target.result;
                        previewImage.alt = "Preview";
                        previewImage.style.maxWidth = "100%";
                        previewContainer.appendChild(previewImage);
                    };
        
                    reader.readAsDataURL(file);
                }
            });
        
            // Gửi biểu mẫu khi nhấn nút submit
            uploadForm.addEventListener("submit", function (e) {
                e.preventDefault();
                uploadForm.submit();
            });
        });

// show 
    // img 
        document.addEventListener("DOMContentLoaded", function () {
            var imageUpload = document.getElementById("imageUpload_edit");
            var previewContainer = document.getElementById("previewContainer_edit");
        
            // Hiển thị ảnh trước khi tải lên
            imageUpload.addEventListener("change", function () {
                previewContainer.innerHTML = ""; // Xóa các ảnh trước đó
        
                var files = imageUpload.files;
                var maxImagesToShow = 4;
                for (var i = 0; i < Math.min(files.length, maxImagesToShow); i++) {
                    var file = files[i];
                    var reader = new FileReader();
        
                    reader.onload = function (e) {
                        var previewImage = document.createElement("img");
                        previewImage.src = e.target.result;
                        previewImage.alt = "Preview";
                        previewImage.style.maxWidth = "100%";
                        previewContainer.appendChild(previewImage);
                    };
        
                    reader.readAsDataURL(file);
                }
            });
        });
    // element
         function showContent(ContentType) {
             const content_1 = document.querySelector('.content_overview'),
             content_2 = document.querySelector('.account_user'),
             content_3 = document.querySelector('.Product'),
             content_4 = document.querySelector('.ware_house'),
             content_5 = document.querySelector('.order');
     
             if (ContentType === 'click_1') {
                 content_1.style.display = 'block';
                 content_2.style.display = 'none';
                 content_3.style.display = 'none';
                 content_4.style.display = 'none';
                 content_5.style.display = 'none';
             }else if (ContentType === 'click_2') {
                 content_1.style.display = 'none';
                 content_2.style.display = 'block';
                 content_3.style.display = 'none';
                 content_4.style.display = 'none';
                 content_5.style.display = 'none';
             }else if (ContentType === 'click_3') {
                 content_1.style.display = 'none';
                 content_2.style.display = 'none';
                 content_3.style.display = 'block';
                 content_4.style.display = 'none';
                 content_5.style.display = 'none';
             }else if (ContentType === 'click_4') {
                 content_1.style.display = 'none';
                 content_2.style.display = 'none';
                 content_3.style.display = 'none';
                 content_4.style.display = 'block';
                 content_5.style.display = 'none';
             }else if (ContentType === 'click_5') {
                 content_1.style.display = 'none';
                 content_2.style.display = 'none';
                 content_3.style.display = 'none';
                 content_4.style.display = 'none';
                 content_5.style.display = 'block';
             }
         }
// delete
    // delete customers
    function delete_customers(button){
        var customers_id = button.closest('.hang_customers').dataset.customersid;
        console.log(customers_id);

        const confirmdelete = confirm("Bạn có muốn xóa tài khoảng này không?");
        if(confirmdelete){
            window.location.href = '/PROJECT/Admin/xulyadmin.php?customers_id=' + customers_id;
        }
    }
    // detete Product
    function delete_product(button){
        var product_id =button.closest('.hang_product').dataset.id;
        console.log(product_id);

        const confirmdelete = confirm("Bạn có muốn xóa sản phẩm không?");
        if(confirmdelete){
            window.location.href = '/PROJECT/Admin/xulyadmin.php?product_id=' + product_id;
        }
    }
    // delete order
    function delete_orders(button){
        var orders_id = button.closest('.hang_orders').dataset.orders;
        const confirmdelete = confirm("Bạn có muốn xóa đơn hàng không?");
        if(confirmdelete){
            window.location.href = "/PROJECT/Admin/xulyadmin.php?orders_id=" + orders_id;
        }
    }



// update 
    // update trạng thái
    function updateStatus(selectElement) {
        var ordersID = selectElement.closest('.hang_orders').getAttribute('data-orders');
        var newStatus = selectElement.value;
        fetch('/PROJECT/admin/xulyadmin.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: 'ordersID=' + ordersID + '&newStatus=' + newStatus,
        })
        .then(response => response.json())
        .then(data => {
            // Xử lý phản hồi từ server nếu cần
            alert("Cập nhật trạng thái thành công");
        })
        .catch(error => {
            console.error('Error:', error);
        });
    }
// edit
    //Product
    function edit(button) {
        var product_id = button.closest('.hang_product').dataset.id;
        var product_name = button.closest('.hang_product').dataset.name;
        var product_price = button.closest('.hang_product').dataset.price;
        var product_groups = button.closest('.hang_product').dataset.groups;
        var product_img1 = button.closest('.hang_product').dataset.img1;
        var product_img2 = button.closest('.hang_product').dataset.img2;
        var product_img3 = button.closest('.hang_product').dataset.img3;
        var product_img4 = button.closest('.hang_product').dataset.img4;
        var imageUpload = document.getElementById("imageUpload_edit");
        var input_edit_product =document.querySelector('.input_edit_product');
        if(input_edit_product.style.display === 'none'){
            input_edit_product.style.display = 'block';
        }else{
            input_edit_product.style.display = 'none';
        }
        document.getElementById('name_edit').value = product_name;
        document.getElementById('group_edit').value = product_groups;
        document.getElementById('price_edit').value = product_price;
        document.getElementById('id_edit').value = product_id;
        
        document.getElementById('previewContainer_edit').innerHTML = `
            <img src="/PROJECT/images/anhao/${product_img1}" alt="">
            <img src="/PROJECT/images/anhao/${product_img2}" alt="">
            <img src="/PROJECT/images/anhao/${product_img3}" alt="">
            <img src="/PROJECT/images/anhao/${product_img4}" alt="">
        `;
    }
    // warehouse
    function edit_warehouse(button) {
        var warehouse_id = button.closest('.hang_warehouse').dataset.id_warehouse;
        var Product_name = button.closest('.hang_warehouse').dataset.name_product;
        var quantity_warehouse = button.closest('.hang_warehouse').dataset.quantity_warehouse;
    
        var input_edit_warehouse =document.querySelector('.input_edit_warehouse');
        if(input_edit_warehouse.style.display === 'none'){
            input_edit_warehouse.style.display = 'block';
        }else{
            input_edit_warehouse.style.display = 'none';
        }
        document.getElementById('update_warehouse').value = quantity_warehouse;
        document.getElementById('id_warehouse').value = warehouse_id;
        document.querySelector('.name_show').innerHTML =Product_name;
    }


