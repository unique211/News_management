$(document).ready(function() {
    var table_name = "master_table";

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
    //  alert("sdfsd");
    function getDate(input) {
        from = input.split("/");
        return new Date(from[2], from[1] - 1, from[0]);
    }
    $(document).on("submit", "#master_form", function(e) {
        e.preventDefault();

        var from = $('#from_date').val();
        var to = $('#to_date').val();



        var date1 = new Date();
        date1 = date1.toString('dd/MM/yyyy');
        var cur_date = getDate(date1);
        var date_ini = getDate(from);
        var date_end = getDate(to);



        var tdateAr = from.split('/');
        var fromdate = tdateAr[2] + '-' + tdateAr[1] + '-' + tdateAr[0];

        var tdateAr = to.split('/');
        var todate = tdateAr[2] + '-' + tdateAr[1] + '-' + tdateAr[0];





        var today = new Date().toDateString();

        var date_ini2 = new Date(fromdate).toDateString();
        var date_end2 = new Date(todate).toDateString();





        if (date_ini < date_end) {

            datashow();
            //put code here to call server
        } else {
            if (date_ini2 == date_end2) {
                datashow();
            } else {
                swal("To Date is Invalid", "Hey, To Date is Always > OR = From Date !!", "error");
            }

        }

        //  datashow();
        //  alert("sdsdui");

    });
    //----------------------submit form code end------------------------------
    datashow();
    //----------------show data in the tabale code start-----------------------
    function datashow() {

        var from_date = $("#from_date").val();
        var to_date = $("#to_date").val();
        var type = $("#type").val();
        var impact = $("#impact").val();
        var newspaper = $("#newpaper_name").val();

        var dateslt = from_date.split('/');
        var from = dateslt[2] + '-' + dateslt[1] + '-' + dateslt[0];

        var dateslt = to_date.split('/');
        var to = dateslt[2] + '-' + dateslt[1] + '-' + dateslt[0];



        $.ajax({
            type: "POST",
            url: base_url + "Creport/generate_report",
            data: {
                type: type,
                impact: impact,
                newspaper: newspaper,
                from: from,
                to: to,
                // table_name: table_name,

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
                    '<th ><font style="font-weight:bold">News/Advt. Date</font></th>' +
                    '<th><font style="font-weight:bold">Code</font></th>' +
                    '<th><font style="font-weight:bold">NewsPaper Name</font></th>' +
                    '<th><font style="font-weight:bold">Type</font></th>' +
                    '<th><font style="font-weight:bold">Impact of News/Advt.</font></th>' +
                    '<th><font style="font-weight:bold">News/Advt. Heading</font></th>' +
                    '<th><font style="font-weight:bold">News/Advt. Size</font></th>' +
                    '<th><font style="font-weight:bold">News/Advt. Amount</font></th>' +
                    '<th><font style="font-weight:bold">View Image</font></th>' +
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

                    var fdateval = data[i].date;
                    var fdateslt = fdateval.split('-');
                    var date = fdateslt[2] + '/' + fdateslt[1] + '/' + fdateslt[0];
                    var image = "";
                    if (data[i].image == null || data[i].image == "") {
                        image = "No Image";
                    } else {
                        image = '<a href="' + base_url + 'Upload/' + data[i].image + '" target="_blank"><img src="' + base_url + 'Upload/' + data[i].image + '" height="50px" width="50px"></img></a>';
                    }


                    html += '<tr>' +
                        '<td >' + sr + '</td>' +
                        '<td  >' + date + '</td>' +
                        '<td  >' + data[i].code + '</td>' +
                        '<td  >' + data[i].newspaper_nm + '</td>' +
                        '<td  >' + type + '</td>' +
                        '<td  >' + impact_of_news + '</td>' +
                        '<td  >' + data[i].heading + '</td>' +
                        '<td  >' + data[i].size + '</td>' +
                        '<td  >' + data[i].amount + '</td>' +
                        '<td  >' + image + '</td>' +
                        '</tr>';

                }
                html += '</tbody></table>';

                $('#show_master').html(html);
                $('#myTable').DataTable({
                    dom: 'Bfrtip',

                    buttons: [{
                            extend: 'print',
                            title: 'News Report',

                            orientation: 'landscape',
                            //pageSize: 'LEGAL',
                            footer: true,
                            exportOptions: {
                                columns: [0, 1, 2, 3, 4, 5, 6, 7]
                            },
                        },
                        {
                            title: 'News Report',
                            extend: 'excelHtml5',
                            exportOptions: {
                                columns: [0, 1, 2, 3, 4, 5, 6, 7]
                            }
                        }
                    ]
                });

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
                html += '<option selected  value="0" >All</option>';
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



});