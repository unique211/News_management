$(document).ready(function() {
    var table_name = "hotel_master";
    $(document).on("keyup", "#cpsw", function(e) {
        e.preventDefault();
        var confirm = $('#cpsw').val();
        var password = $('#psw').val();
        if (confirm == password) {
            $(".validation").html(''); // remove it
            $(':input[type="submit"]').prop('disabled', false);
        } else {
            $(".validation").html("Please Enter Same Password");
            $(':input[type="submit"]').prop('disabled', true);
            $("#cpsw").focus();
        }
    });
    $(document).on("keyup", "#user_id", function(e) {
        e.preventDefault();
        var user_id = $('#user_id').val();
        $.ajax({
            type: "POST",
            url: base_url + "Settings/chk_user_id",

            data: {
                user_id: user_id,
            },
            dataType: "JSON",
            async: false,
            success: function(data) {
                if (data == 0) {
                    $(".validation2").html(''); // remove it
                    $(':input[type="submit"]').prop('disabled', false);
                } else {
                    $(".validation2").html("This UserId is Already Exists,Please Enter another UserId");
                    $(':input[type="submit"]').prop('disabled', true);
                    $("#user_id").focus();
                }
            }
        });
    });
    $(document).on("submit", "#master_form", function(e) {
        e.preventDefault();
        var user_id = $('#user_id').val();
        var password = $('#psw').val();
        var confirm = $('#cpsw').val();

        var hotel_name = $('#hotel_name').val();
        var mobile1 = $('#mobile_1').val();
        var mobile2 = $('#mobile_2').val();
        var address = $('#address').val();
        var gst_no = $('#gst_no').val();
        var note = $('#spcl_note').val();
        var logo = $('#file_attachother').val();
        var printer = $('#printer').val();
        var from_date1 = $('#from').val();
        var to_date1 = $('#to').val();

        var id = $('#save_update').val();
        var validation1 = $(".validation").html();
        var validation2 = $(".validation2").html();


        var dateslt = from_date1.split('/');
        var from_date = dateslt[2] + '-' + dateslt[1] + '-' + dateslt[0];

        var dateslt = to_date1.split('/');
        var to_date = dateslt[2] + '-' + dateslt[1] + '-' + dateslt[0];

        //  alert("SUBMIT");

        if (confirm == password) {
            $(".validation").html(''); // remove it
            //$(':input[type="submit"]').prop('disabled', false);
            if (validation2 == "") {
                $(':input[type="submit"]').prop('disabled', false);
                $.ajax({
                    type: "POST",
                    url: base_url + "CHotel_masrer/adddata",

                    data: {
                        id: id,
                        hotel_name: hotel_name,
                        mobile1: mobile1,
                        mobile2: mobile2,
                        address: address,
                        gst_no: gst_no,
                        note: note,
                        logo: logo,
                        printer: printer,
                        from_date: from_date,
                        to_date: to_date,
                        table_name: table_name
                    },
                    dataType: "JSON",
                    async: false,
                    success: function(data) {
                        var ref_id = "";
                        // alert(data);
                        if (id == "") {
                            ref_id = data;
                        } else {
                            ref_id = id;
                        }
                        $.ajax({
                            type: "POST",
                            url: base_url + "Settings/add_staff",

                            data: {
                                id: id,
                                ref_id: ref_id,
                                user_id: user_id,
                                password: confirm,

                                // table_name: table_name
                            },
                            dataType: "JSON",
                            async: false,
                            success: function(data) {
                                if (data == true) {
                                    if (id != "") {
                                        successTost("Hotel Update Successfully");

                                    } else {
                                        successTost("Hotel Added Successfully");
                                    }
                                    $('#master_form')[0].reset();
                                    $('#save_update').val('');
                                    $('.formhideshow').hide();
                                    $('.tablehideshow').show();
                                    $('.closehideshow').trigger('click');
                                    datashow();
                                } else {
                                    errorTost("Hotel Cannot Save");
                                }
                            }
                        });
                    }
                });
            } else {
                $(':input[type="submit"]').prop('disabled', true);
                swal("Alert", validation2, "warning");

            }
        } else {
            $(".validation").html("Please Enter Same Password");
            $(':input[type="submit"]').prop('disabled', true);
            $("#cpsw").focus();
            swal("Alert", validation1, "warning");
        }



        /* */





    });
    //----------------------submit form code end------------------------------
    datashow();
    //----------------show data in the tabale code start-----------------------
    function datashow() {
        // var role = 'staff';
        $.ajax({
            type: "POST",
            url: base_url + "CHotel_masrer/get_master",
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
                    '<th ><font style="font-weight:bold">Hotel Name</font></th>' +
                    '<th><font style="font-weight:bold">Mobile Number</font></th>' +
                    '<th><font style="font-weight:bold">Address</font></th>' +


                    '<th class="not-export-column"><font style="font-weight:bold">Action</font></th>' +

                    '</tr>' +
                    '</thead>' +
                    '<tbody>';
                for (var i = 0; i < data.length; i++) {
                    var sr = i + 1;


                    html += '<tr>' +
                        '<td >' + sr + '</td>' +
                        '<td >' + data[i].hotel_name + '</td>' +
                        '<td  >' + data[i].mobile1 + '</td>' +
                        '<td >' + data[i].address + '</td>' +


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
                        url: base_url + "CHotel_masrer/deleteData",
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
            url: base_url + "CHotel_masrer/get_master_where",
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

                    $('#hotel_name').val(data[i].hotel_name);
                    $('#mobile_1').val(data[i].mobile1);
                    $('#mobile_2').val(data[i].mobile2);
                    $('#address').val(data[i].address);
                    $('#gst_no').val(data[i].gst_no);
                    $('#spcl_note').val(data[i].note);
                    $('#file_attachother').val(data[i].logo);
                    $('#printer').val(data[i].printer);

                    var fdateval = data[i].from_date;
                    var fdateslt = fdateval.split('-');
                    var from_date = fdateslt[2] + '/' + fdateslt[1] + '/' + fdateslt[0];


                    var fdateval = data[i].to_date;
                    var fdateslt = fdateval.split('-');
                    var to_date = fdateslt[2] + '/' + fdateslt[1] + '/' + fdateslt[0];


                    $('#from').val(from_date);
                    $('#to').val(to_date);

                }
            }

        });

        $.ajax({
            type: "POST",
            url: base_url + "CHotel_masrer/get_master_where",
            data: {
                table_name: 'login_master',
                id: id,
            },
            dataType: "JSON",
            async: false,
            success: function(data) {
                // console.log('data'+data);
                var data = eval(data);

                for (var i = 0; i < data.length; i++) {


                    $('#user_id').val(data[i].user_id);
                    $('#cpsw').val(data[i].password);
                    $('#psw').val(data[i].password);

                }
            }

        });








    });
    $(document).on('click', '.closehideshow', function() {
        $('#master_form')[0].reset();
        $('#user_id').prop('disabled', false);
        $("#attachment").prop('required', true);
        $(".validation").html('');
        $(".validation2").html('');
        $("#msg").html('');
    });




    $('#attachment').ajaxfileupload({
        'action': base_url + 'CHotel_masrer/doc_image_upload',
        'onStart': function() { $("#msg").html("<font color='red'><i class='fa fa-refresh fa-spin fa-3x fa-fw'></i>Please wait file is uploading.....</font>"); },
        'onComplete': function(response) {
            if (response == '') {
                $("#msg").html("<font color='red'>" + "Error in file upload" + "</font>");
            } else {
                $("#file_attachother").val(response);
                $("#msg").html("<font id='doc_image_name1' color='green'>" + response + "</font>");

            }
        }
    });

});