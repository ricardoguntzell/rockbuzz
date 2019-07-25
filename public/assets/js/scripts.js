$(function () {

    // DATATABLES
    $('#dataTable').DataTable({
        lengthMenu: [[5, 10, -1], [5, 10, "Todos"]],
        // responsive: true,
        order: [[0, "desc"]],
    });

});
