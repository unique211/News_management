$(document).ready(function() {
    var table_name = "master_table";
    var code_flag = 0;
    var name_flag = 0;

    $(document).on("blur", "#code", function(e) {
        e.preventDefault();
        var code = $('#code').val();
        $(':input[type="submit"]').prop('disabled', false);
        $.ajax({
            type: "POST",
            url: base_url + "CMaster/chk_code",

            data: {
                code: code,
            },
            dataType: "JSON",
            async: false,
            success: function(data) {
                //   alert(data);
                if (data == 0) {

                    $(':input[type="submit"]').prop('disabled', false);
                    code_flag = 0;
                } else {
                    swal("Already Exists !!", "Hey, This Code is Already Exists,Please Enter another Code !!", "error");
                    $(':input[type="submit"]').prop('disabled', true);
                    code_flag = 1;
                    //   $("#code").focus();
                }
            }
        });
    });
    $(document).on("blur", "#news_name", function(e) {
        e.preventDefault();
        var news_name = $('#news_name').val();
        $(':input[type="submit"]').prop('disabled', false);
        $.ajax({
            type: "POST",
            url: base_url + "CMaster/chk_name",

            data: {
                news_name: news_name,
            },
            dataType: "JSON",
            async: false,
            success: function(data) {
                //   alert(data);
                if (data == 0) {

                    $(':input[type="submit"]').prop('disabled', false);
                    name_flag = 0;
                } else {
                    swal("Already Exists !!", "Hey, This Newspaper is Already Exists,Please Enter another Newspaper !!", "error");
                    $(':input[type="submit"]').prop('disabled', true);
                    name_flag = 1;
                    //   $("#code").focus();
                }
            }
        });
    });


    $(document).on("submit", "#master_form", function(e) {
        e.preventDefault();
        var id = $('#save_update').val();

        var code = $('#code').val();
        var newspaper_name = $('#news_name').val();

        if (name_flag == 1 || code_flag == 1) {
            swal("Already Exists !!", "Hey, Your Code OR Newspaper Name is Already Exists !!", "error");
        } else {
            $.ajax({
                type: "POST",
                url: base_url + "CMaster/adddata",

                data: {
                    id: id,
                    code: code,
                    newspaper_name: newspaper_name,
                    table_name: table_name
                },
                dataType: "JSON",
                async: false,
                success: function(data) {
                    if (data == true) {
                        if (id != "") {
                            successTost("Master Update Successfully");

                        } else {
                            successTost("Master Added Successfully");
                        }
                        //   $('#master_form')[0].reset();
                        $('#save_update').val('');
                        $('.formhideshow').hide();
                        $('.tablehideshow').show();
                        form_clear();
                        $('.closehideshow').trigger('click');
                        datashow();
                    } else {
                        errorTost("Master Cannot Save");
                    }

                }
            });
        }










    });
    //----------------------submit form code end------------------------------
    datashow();
    //----------------show data in the tabale code start-----------------------
    function datashow() {
        // var role = 'staff';
        $.ajax({
            type: "POST",
            url: base_url + "CMaster/get_master",
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
                    '<th ><font style="font-weight:bold">Code</font></th>' +
                    '<th><font style="font-weight:bold">Newspaper Name</font></th>' +
                    '<th class="not-export-column"><font style="font-weight:bold">Action</font></th>' +
                    '</tr>' +
                    '</thead>' +
                    '<tbody>';
                for (var i = 0; i < data.length; i++) {
                    var sr = i + 1;


                    html += '<tr>' +
                        '<td >' + sr + '</td>' +
                        '<td  >' + data[i].code + '</td>' +
                        '<td  >' + data[i].newspaper_name + '</td>' +
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
                        url: base_url + "CMaster/deleteData",
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

        var id = $(this).attr('id');

        $.ajax({
            type: "POST",
            url: base_url + "CMaster/get_master_where",
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


                    $('#code').val(data[i].code);
                    $('#news_name').val(data[i].newspaper_name);



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


        $('#code').val('');
        $('#news_name').val('');

    }
    $(document).on('click', '.closehideshow', function() {
        form_clear();
    });


    $(document).on('click', '#reset', function() {
        form_clear();
    });






});