$(document).ready(function() {
    var table_name = "transaction_master";

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

        var code = $('#code').val();
        var newspaper_name = $('#newpaper_name').val();
        var type = $('#type').val();
        var impact_of_news = $('#impact').val();
        var heading = $('#heading').val();
        var size = $('#codesize').val();
        var date1 = $('#news_date').val();
        var image = $('#file_attachother').val();
        var amount = $('#amount').val();

        var dateslt = date1.split('/');
        var date = dateslt[2] + '-' + dateslt[1] + '-' + dateslt[0];
        if (newspaper_name == null) {
            swal("News Paper Not Selected", "Hey, Please Select News Paper OR Enter Proper Code of News Paper !!", "error");
        } else {
            $.ajax({
                type: "POST",
                url: base_url + "Ctransaaction/adddata",

                data: {
                    id: id,
                    code: code,
                    newspaper_name: newspaper_name,
                    type: type,
                    impact_of_news: impact_of_news,
                    heading: heading,
                    size: size,
                    date: date,
                    image: image,
                    amount: amount,
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
            url: base_url + "Ctransaaction/get_master",
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
                    '<th><font style="font-weight:bold">Type</font></th>' +
                    '<th><font style="font-weight:bold">Impact of News/Advt.</font></th>' +
                    '<th><font style="font-weight:bold">News/Advt. Amount</font></th>' +
                    '<th><font style="font-weight:bold">View Image</font></th>' +
                    '<th class="not-export-column"><font style="font-weight:bold">Action</font></th>' +
                    '</tr>' +
                    '</thead>' +
                    '<tbody>';
                for (var i = 0; i < data.length; i++) {
                    var sr = i + 1;
                    var type = "";
                    var impact_of_news = "";
                    if (data[i].type != "" || data[i].type != null) {
                        if (data[i].type == 1) {
                            type = "News";
                        } else {
                            type = "Advertisement";
                        }
                    }
                    if (data[i].impact_of_news != "" || data[i].impact_of_news != null) {
                        if (data[i].impact_of_news == 1) {
                            impact_of_news = "Positive";
                        } else {
                            impact_of_news = "Negative";
                        }
                    }
                    var image = "";
                    if (data[i].image == null || data[i].image == "") {
                        image = "No Image";
                    } else {
                        image = '<a href="' + base_url + 'Upload/' + data[i].image + '" target="_blank"><img src="' + base_url + 'Upload/' + data[i].image + '"  height="50px" width="50px"></img></a>';
                    }


                    html += '<tr>' +
                        '<td >' + sr + '</td>' +
                        '<td  >' + data[i].code + '</td>' +
                        '<td  >' + data[i].newspaper_nm + '</td>' +
                        '<td  >' + type + '</td>' +
                        '<td  >' + impact_of_news + '</td>' +
                        '<td  >' + data[i].amount + '</td>' +
                        '<td  >' + image + '</td>' +
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
                        url: base_url + "Ctransaaction/deleteData",
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
            url: base_url + "Ctransaaction/get_master_where",
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

                    var fdateval = data[i].date;
                    var fdateslt = fdateval.split('-');
                    var date = fdateslt[2] + '/' + fdateslt[1] + '/' + fdateslt[0];


                    $('#code').val(data[i].code);
                    $('#newpaper_name').val(data[i].newspaper_name).trigger('change');
                    $('#type').val(data[i].type);
                    $('#impact').val(data[i].impact_of_news);
                    $('#heading').val(data[i].heading);
                    $('#codesize').val(data[i].size);
                    $('#news_date').val(date);
                    $('#file_attachother').val(data[i].image);
                    $('#amount').val(data[i].amount);
                    $("#msg").html("<font id='doc_image_name1' color='green'>" + data[i].image + "</font>");
                    // alert(data[i].image);
                    if (data[i].image == null) {
                        $('#displayimg').attr("src", "https://images.pexels.com/photos/414612/pexels-photo-414612.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500");
                    } else {
                        $('#displayimg').attr("src", base_url + 'Upload/' + data[i].image);
                    }




                }
            }

        });









    });

    function form_clear() {

        $("#msg").html('');
        $('#save_update').val('');

        $('#code').val('');
        $('#newpaper_name').val('');
        $('#newpaper_name').html('');

        $('#type').val('');
        $('#impact').val('');
        $('#heading').val('');
        $('#codesize').val('');
        $('#news_date').val('');
        $('#amount').val('');
        $('#file_attachother').val('');

        $("#msg").html("");
        // alert(data[i].image);

        $('#displayimg').attr("src", "https://images.pexels.com/photos/414612/pexels-photo-414612.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500");

        getMasterSelect('master_table', '#newpaper_name');

    }
    $(document).on('click', '.closehideshow', function() {
        form_clear();
    });


    $(document).on('click', '#reset', function() {
        form_clear();
    });

    getMasterSelect('master_table', '#newpaper_name');

    function getMasterSelect(table_name, selecter) {

        $.ajax({
            type: "POST",
            url: base_url + "Ctransaaction/getdropdown",
            data: {
                table_name: table_name,
            },
            dataType: "JSON",
            async: false,
            success: function(data) {
                console.log(data);
                html = '';
                var name = '';
                //					
                html += '<option selected disabled value="" >Select</option>';
                //						}
                for (i = 0; i < data.length; i++) {
                    var id = '';
                    if (table_name == "master_table") {
                        name = data[i].newspaper_name;
                        id = data[i].id;
                    } else if (table_name == "table_master") {
                        name = data[i].table_name;
                        id = data[i].id;
                    } else if (table_name == "item_master") {
                        name = data[i].curse;
                        id = data[i].id;
                    }

                    //alert(name);
                    html += '<option value="' + id + '" >' + name + '</option>';

                }
                $(selecter).html(html);
            }
        });
    }

    $(document).on('change', '#newpaper_name', function(e) {
        e.preventDefault();
        //    $(".fstselected").text('');

        var newpaper_name = $('#newpaper_name').val();


        $.ajax({
            type: "POST",
            url: base_url + "Ctransaaction/get_code",
            data: {
                table_name: 'master_table',
                newpaper_name: newpaper_name,

            },
            dataType: "JSON",
            async: false,
            success: function(data) {
                console.log(data);
                if (data.length > 0) {
                    $('#code').val(data[0].code);
                } else {
                    $('#code').val('');
                }

            }
        });




        var selectedWord = $("#newpaper_name option[value='" + newpaper_name + "'").text();
        //    $("#client").text(selectedWord);
        // alert(selectedWord);

        if (newpaper_name == null) {
            $('#newpaper_name').val('');
        } else {
            $(".fstselected").text(selectedWord);
        }
    });

    $(document).on('blur', "#code", function(e) {
        e.preventDefault();

        var code = $('#code').val();


        $.ajax({
            type: "POST",
            url: base_url + "Ctransaaction/get_newspaper",
            data: {
                table_name: 'master_table',
                code: code,

            },
            dataType: "JSON",
            async: false,
            success: function(data) {
                console.log(data);
                if (data.length > 0) {
                    $('#newpaper_name').val(data[0].id).trigger('change');
                    // $("#client option[data-value='" + data[0].id + "']").attr("selected", true);



                } else {
                    $('#newpaper_name').val('');

                }

            }
        });
    });
    $('#attachment').ajaxfileupload({
        'action': base_url + 'Ctransaaction/doc_image_upload',
        'onStart': function() { $("#msg").html("<font color='red'><i class='fa fa-refresh fa-spin fa-3x fa-fw'></i>Please wait file is uploading.....</font>"); },
        'onComplete': function(response) {
            if (response == '') {
                $("#msg").html("<font color='red'>" + "Error in file upload" + "</font>");
                $('#displayimg').attr("src", "https://images.pexels.com/photos/414612/pexels-photo-414612.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500");
            } else {
                $("#file_attachother").val(response);
                $("#msg").html("<font id='doc_image_name1' color='green'>" + response + "</font>");
                $('#displayimg').attr("src", base_url + 'Upload/' + response);
            }
        }
    });


});