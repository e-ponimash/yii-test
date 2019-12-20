$("#companyUpdate").on('click', function() {
    var csrfToken = $('meta[name="csrf-token"]').attr("content"),
        id = $(this).attr("data-item"),
        url = !id ? '/company/manage/create' : '/company/manage/update?id='+id;

    $.ajax({
        url: url,
        type: "POST",
        data: {csrfParam : csrfToken},
        success: function (data) {
            $('#companyModal').find('.modal-body').html(data);
            $('#companyModal').modal({show:true});
        }
    });
});

$('#companySave').on("click", function (event) {
    var id = $(this).attr("data-item"),
        url = !id ? '/company/manage/create' : '/company/manage/update?id='+id;

    $.ajax({
        url: url,
        type: "POST",
        data: $("#companyForm").serialize(),
        success: function (data){
            $('#companyView').empty().html(data);
            $('#companyModal').modal('hide');
        },
        error: function(data){
            $('#companyModal').find('.modal-body').html(data.responseText);
        }
    });
});

function CompanyDelete(id) {
    var url = '/company/manage/delete?id='+ id,
        csrfToken = $('meta[name="csrf-token"]').attr("content");

    $.ajax({
        url: url,
        type: "POST",
        data: {csrfParam : csrfToken},
        success: function (data) {
            $('#companyView').empty().html(data);
        },
        error: function (data) {
            alert("Ошибка при удалении компании!");
        }
    });
};
