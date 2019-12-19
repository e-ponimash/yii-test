$(document).ready(function () {
    $("#companyUpdate").on('click', function() {
        var csrfToken = $('meta[name="csrf-token"]').attr("content");
        $.ajax({
            'url': '/company/manage/update?id=2',
            type: "POST",
            data: {csrfParam : csrfToken},
            success: function (data) {
                $('#companyModal').find('.modal-body').html(data);
                $('#companyModal').modal({show:true});
            }
        });
    });

    $('#companySave').on("click", function (event) {
        var companyForm = $("#companyForm");
        $.ajax({
            url: "/company/manage/update?id=2",
            type: "POST",
            data: companyForm.serialize(),
            success: function (data){
                $('#companyView').empty().html(data);
                $('#companyModal').modal('hide');
            },
            error: function(data){
                console.log(data.responseText);
                $('#companyModal').find('.modal-body').html(data.responseText);
            }
        });
    });

});