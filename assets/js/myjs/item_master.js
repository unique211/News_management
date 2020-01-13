$(document).ready(function() {
    var table_name = "item_master";

    // $(document).on("keyup", "#user_id", function(e) {
    //     e.preventDefault();
    //     var user_id = $('#user_id').val();
    //     $.ajax({
    //         type: "POST",
    //         url: base_url + "Settings/chk_user_id",

    //         data: {
    //             user_id: user_id,
    //         },
    //         dataType: "JSON",
    //         async: false,
    //         success: function(data) {
    //             if (data == 0) {
    //                 $(".validation2").html(''); // remove it
    //                 $(':input[type="submit"]').prop('disabled', false);
    //             } else {
    //                 $(".validation2").html("This UserId is Already Exists,Please Enter another UserId");
    //                 $(':input[type="submit"]').prop('disabled', true);
    //                 $("#user_id").focus();
    //             }
    //         }
    //     });
    // });
    $(document).on("submit", "#master_form", function(e) {
        e.preventDefault();
        var id = $('#save_update').val();

        var curse = $('#course').val();
        var amount_half = $('#amt_half').val();
        var amount_full = $('#amt_full').val();
        var description = $('#description').val();





        $.ajax({
            type: "POST",
            url: base_url + "CItem_master/adddata",

            data: {
                id: id,
                curse: curse,
                amount_half: amount_half,
                amount_full: amount_full,
                description: description,

                table_name: table_name
            },
            dataType: "JSON",
            async: false,
            success: function(data) {
                if (data == true) {
                    if (id != "") {
                        successTost("Item Update Successfully");

                    } else {
                        successTost("Item Added Successfully");
                    }
                    //    $('#master_form')[0].reset();
                    $('#save_update').val('');
                    $('.formhideshow').hide();
                    $('.tablehideshow').show();
                    $('.closehideshow').trigger('click');
                    datashow();
                } else {
                    errorTost("Item Cannot Save");
                }

            }
        });




    });
    //----------------------submit form code end------------------------------
    datashow();
    //----------------show data in the tabale code start-----------------------
    function datashow() {
        // var role = 'staff';
        $.ajax({
            type: "POST",
            url: base_url + "CItem_master/get_master",
            data: {
                table_name: table_name,

            },
            dataType: "JSON",
            async: false,
            success: function(data) {
                // console.log('data'+data);
                var data = eval(data);


                var html = '';
                html += '<table id="myTable" class="table table-striped">' +
                    '<thead>' +
                    '<tr>' +
                    '<th><font style="font-weight:bold">Sr. No.</font></th>' +
                    '<th ><font style="font-weight:bold">Course</font></th>' +
                    '<th><font style="font-weight:bold">Amount Half</font></th>' +
                    '<th><font style="font-weight:bold">Amount Full</font></th>' +
                    '<th><font style="font-weight:bold">Description</font></th>' +
                    '<th class="not-export-column"><font style="font-weight:bold">Action</font></th>' +
                    '</tr>' +
                    '</thead>' +
                    '<tbody>';
                for (var i = 0; i < data.length; i++) {
                    var sr = i + 1;


                    html += '<tr>' +
                        '<td >' + sr + '</td>' +
                        '<td  >' + data[i].curse + '</td>' +
                        '<td  >' + data[i].amount_half + '</td>' +
                        '<td >' + data[i].amount_full + '</td>' +
                        '<td >' + data[i].description + '</td>' +

                        '<td class="not-export-column" ><button name="edit" value="edit" class="edit_data btn btn-success" id=' + data[i].id + '><i class="fa fa-edit"></i></button>' +
                        '&nbsp;<button name="delete" value="Delete" class="delete_data btn btn-danger" id=' + data[i].id + '><i class="fa fa-trash"></i></button>' +
                        '</td></tr>';

                }
                html += '</tbody></table>';

                $('#show_master').html(html);
                $('#myTable').DataTable({});

            }

        });

    }
    //-----------------------delete data code start----------------------------------------------------


    $(document).on('click', '.delete_data', function() {

        var id1 = $(this).attr('id');



        if (id1 != "") {
            swal({
                    title: "Are you sure to delete ?",
                    text: "You will not be able to recover this Data !!",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Yes, delete it !!",
                    closeOnConfirm: false
                },
                function() {

                    $.ajax({
                        type: "POST",
                        url: base_url + "CItem_master/deleteData",
                        dataType: "JSON",
                        data: {
                            id: id1,
                            table_name: table_name,
                        },
                        success: function(data) {
                            if (data == true) {
                                swal("Deleted !!", "Hey, your Data has been deleted !!", "success");


                                datashow(); //call function show all data	


                            } else {
                                errorTost("Data Delete Failed");
                            }

                        }
                    });
                    return false;

                });

        }


    });

    //-----------------------delete data code end-----------------------------------
    $(document).on("click", ".edit_data", function() {

        $('.formhideshow').show();
        $('.tablehideshow').hide();
        $(".btnhideshow").show();
        $("#attachment").prop('required', false);
        $('#user_id').prop('disabled', true);
        var id = $(this).attr('id');

        $.ajax({
            type: "POST",
            url: base_url + "CItem_master/get_master_where",
            data: {
                table_name: table_name,
                id: id,
            },
            dataType: "JSON",
            async: false,
            success: function(data) {
                // console.log('data'+data);
                var data = eval(data);

                for (var i = 0; i < data.length; i++) {
                    $('#save_update').val(id);


                    $('#course').val(data[i].curse);
                    $('#amt_half').val(data[i].amount_half);
                    $('#amt_full').val(data[i].amount_full);
                    $('#description').val(data[i].description);


                }
            }

        });









    });

    function form_clear() {
        $('#user_id').prop('disabled', false);
        $("#attachment").prop('required', true);
        $(".validation").html('');
        $(".validation2").html('');
        $("#msg").html('');
        $('#save_update').val('');


        $('#course').val('');
        $('#amt_half').val('');
        $('#amt_full').val('');
        $('#description').val('');
    }
    $(document).on('click', '.closehideshow', function() {
        form_clear();
    });


    $(document).on('click', '#reset', function() {
        form_clear();
    });



});