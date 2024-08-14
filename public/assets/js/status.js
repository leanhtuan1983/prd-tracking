// updateBackgroundColorLoop.js

/**
 * Hàm để thay đổi màu nền của các element dựa trên trạng thái.
 *
 * @param {string} elementClass - Class của các element cần thay đổi.
 */
function updateBackgroundColors(elementClass) {
    // Lấy tất cả các element có class được chỉ định
    var elements = document.getElementsByClassName(elementClass);

    // Duyệt qua từng element và cập nhật màu nền
    for (var i = 0; i < elements.length; i++) {
        var element = elements[i];

        // Lấy giá trị từ thuộc tính data-status của element
        var status = element.getAttribute("data-status");

        // Đặt màu nền mặc định
        var backgroundColor = "transparent";

        // Cập nhật màu nền dựa trên trạng thái
        switch (status) {
            case "Pending":
                backgroundColor = "orange"; // Màu cam cho trạng thái pending
                break;
            case "Processing":
                backgroundColor = "red"; // Màu xanh dương cho trạng thái running
                break;
            case "Completed":
                backgroundColor = "green"; // Màu xanh lá cây cho trạng thái finished
                color = "white";
                break;
            default:
                backgroundColor = "gray"; // Màu xám cho các trạng thái không xác định
                break;
        }

        // Cập nhật màu nền của element
        element.style.backgroundColor = backgroundColor;
    }
}
