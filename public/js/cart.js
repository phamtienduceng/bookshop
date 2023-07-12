// Set the CSRF token for every AJAX request
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$(document).ready(function () {
    // Event handler for increasing and decreasing product quantity
    $('.increase-quantity, .decrease-quantity').click(function () {
        var productId = $(this).data('product-id');
        var quantityElement = $("#quantity-" + productId);
        var totalElement = $("#total-" + productId);
        var quantity = parseInt(quantityElement.text());
        var price = quantityElement.data('price');

        if ($(this).hasClass('increase-quantity')) {
            quantity++;
        } else if ($(this).hasClass('decrease-quantity')) {
            if (quantity > 1)
                quantity--;
        }

        var total = quantity * price;

        // Update quantity and total in the UI
        quantityElement.text(quantity);
        totalElement.text(total.toLocaleString('vi-VN') + "₫"); // Use toLocaleString for better number formatting

        // Update the grand total
        var grandTotal = 0;
        $("td[id^='total-']").each(function () {
            grandTotal += parseInt($(this).text().replace(".", "").replace("₫", "")); // Remove formatting before calculating
        });

        $("#grandTotal").text("Total Price: " + grandTotal.toLocaleString('vi-VN') + "₫"); // Use toLocaleString for better number formatting

        // Call the update quantity API
        $.ajax({
            url: updateQuantityUrl, // Use defined variable instead of direct link
            type: 'POST',
            data: {
                product_id: productId,
                quantity: quantity
            },
            success: function (response) {
                // Handle your response here
            },
            error: function (error) {
                // Handle error here
            }
        });
    });

    // Event handler for removing item from cart
    $('.remove-item').click(function () {
        var productId = $(this).data('product-id');

        $.ajax({
            url: removeItemUrl, // Use defined variable instead of direct link
            method: 'POST',
            data: {
                product_id: productId
            },
            success: function (response) {
                // Instead of reloading, remove the item from the view
                $('#product-row-' + productId).remove();

                // Update total price based on response
                if (response.newTotalPrice !== undefined) {
                    $('.total-price h3').text('Total Price: ' + response.newTotalPrice.toLocaleString('vi-VN') + "₫"); // Use toLocaleString for better number formatting
                } else {
                    $('.total-price h3').text('Remove successfully!!!');
                }
            }
        });
    });
    // Loại bỏ phần thập phân và dấu '.000' trong tổng giá trị
    function formatCurrency(amount) {
        return amount.toLocaleString('en-US').replace(/\.000$/, '');
    }

    // Cập nhật hiển thị tổng giá trị sau mỗi thay đổi
    function updateGrandTotal() {
        var grandTotal = 0;
        $("td[id^='total-']").each(function () {
            grandTotal += parseInt($(this).text().replace(".", "").replace(" đ", ""));
        });
        $("#grandTotal").text("Total Price: " + formatCurrency(grandTotal) + "₫");
    }

    // Gọi hàm updateGrandTotal() sau khi cập nhật số lượng sản phẩm
    $('.increase-quantity, .decrease-quantity').click(function () {
        // Các dòng mã xử lý số lượng sản phẩm
        // ...

        // Cập nhật tổng giá trị
        updateGrandTotal();
    });

    // Gọi hàm updateGrandTotal() sau khi xóa sản phẩm
    $('.remove-item').click(function () {
        // Các dòng mã xóa sản phẩm
        // ...

        // Cập nhật tổng giá trị
        updateGrandTotal();
    });

});
