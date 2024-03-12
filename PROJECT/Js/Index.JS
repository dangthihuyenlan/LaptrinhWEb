// <!-- script onclick view product -->
function view_product_1(){
    const 
    content = event.currentTarget.closest(".conten_product"),
    take_productID = content.querySelector(".take_productID"); 
    const productID = take_productID.innerText;
    
    var url = '/PROJECT/view/Product.php' + '?productID='+productID;

    window.location.href = url;
}
function view_product(){
    const 
    content = event.currentTarget.closest(".conten_card"),
    take_productID = content.querySelector(".take_productID"); 
    const productID = take_productID.innerText;
    
    var url = '/PROJECT/view/Product.php' + '?productID='+productID;

    window.location.href = url;
}
function review(button){
    var Product_id = button.closest('.product').dataset.id_product;

    
    var url = '/PROJECT/view/Product.php' + '?productID='+Product_id;

    window.location.href = url;
}
// search
function searchProducts() {
    // Lấy giá trị từ ô tìm kiếm
    var searchText = document.getElementById('search').value.toUpperCase();
    
    // Lấy danh sách các sản phẩm
    var products = document.querySelectorAll('.card_product');

    var notFoundMessage = document.getElementById('notFoundMessage');

    var foundCount = 0;

    // Lặp qua từng sản phẩm và ẩn/hiện tùy thuộc vào kết quả tìm kiếm
    products.forEach(function(product) {
        var productName = product.getAttribute('data-name').toUpperCase();
        if (productName.indexOf(searchText) > -1) {
            product.style.display = 'block';
            foundCount++;
        } else {
            product.style.display = 'none';
            
        }
        if (foundCount === 0) {
            notFoundMessage.style.display = 'block';
        } else {
            notFoundMessage.style.display = 'none';
        }
    });
}
// add
    // add favorite
    function add_favorite(button){
        var name_customers = button.closest('.product_love').dataset.name_customers;
        var id_product = button.closest('.product_love').dataset.id_product;

        var url = '/PROJECT/php/xulyyeuthich.php?name_customers=' + name_customers+ '&id_product='+id_product;
        window.location.href = url;
    }

// delete 
    // favorite
    function delete_click(button){
        var favorite_id = button.closest('.product').dataset.id;
        
        var confirmDelete = confirm("Bạn có muốn xóa khỏi yêu thích?");
        if(confirmDelete){
            window.location.href = '/PROJECT/php/DeleteFavorite.php?favorite_id='+favorite_id;
        }
    }