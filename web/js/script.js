
function loadProducts(categoryId) {
    event.preventDefault();
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("product-list").innerHTML = this.responseText;
        }
    };
    xhttp.open("POST", "products", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("category_id=" + categoryId);
}