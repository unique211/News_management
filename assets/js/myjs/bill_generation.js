$(document).ready(function() {
    var table_name = "bill_master";

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

        var date1 = $('#bill_date').val();
        var customer_name = $('#customer').val();
        var table_id = $('#table_nm').val();
        var emp_id = $('#emp_nm').val();
        var gst_per = $('#gst').val();
        var total_amt = $('#tamt').val();

        var dateslt = date1.split('/');
        var date = dateslt[2] + '-' + dateslt[1] + '-' + dateslt[0];

        var r1 = $('#file_info_tbody').find('tr');
        var r = r1.length;
        var tr = "";

        if (r > 0) {
            $.ajax({
                type: "POST",
                url: base_url + "CBill_genrate/adddata",

                data: {
                    id: id,
                    date: date,
                    customer_name: customer_name,
                    table_id: table_id,
                    emp_id: emp_id,
                    gst_per: gst_per,
                    total_amt: total_amt,
                    table_name: table_name
                },
                dataType: "JSON",
                async: false,
                success: function(data) {
                    var ref_id = "";

                    if (id == "") {
                        ref_id = data;
                    } else {
                        ref_id = id;
                    }

                    $("#btnprint").show();
                    $('#btnprint').val(ref_id);
                    $('#save_update').val(ref_id);
                    //alert(id);
                    //   alert(id + ",," + ref_id);

                    for (var i = 0; i < r; i++) {

                        var bill_ref_id = ref_id;
                        var item_id = $(r1[i]).find('td:eq(1)').html();
                        var varity = $(r1[i]).find('td:eq(2)').html();
                        var qty = $(r1[i]).find('td:eq(3)').html();
                        var rate = $(r1[i]).find('td:eq(4)').html();
                        var amount = $(r1[i]).find('td:eq(5)').html();

                        $.ajax({
                            type: "POST",
                            url: base_url + "CBill_genrate/adddata2",
                            dataType: "JSON",
                            async: false,
                            data: {
                                bill_ref_id: bill_ref_id,
                                item_id: item_id,
                                varity: varity,
                                qty: qty,
                                rate: rate,
                                amount: amount,
                                table_name: 'bill_details',
                            },
                            success: function(data) {

                                if (data == true) {
                                    if (id != "") {
                                        successTost("Bill Update Successfully");

                                    } else {
                                        successTost("Bill Added Successfully");
                                    }
                                    //    $('#master_form')[0].reset();
                                    //  $('#save_update').val('');
                                    //   $('.formhideshow').hide();
                                    //   $('.tablehideshow').show();
                                    //  $('.closehideshow').trigger('click');
                                    datashow();
                                } else {
                                    errorTost("Bill Cannot Save");
                                }

                            }



                        });
                    }


                }
            });
        } else {
            swal("Details Not Found !!", "Hey, Item Details is Not Found Please fill details !!", "error");
        }





    });
    //----------------------submit form code end------------------------------
    datashow();
    //----------------show data in the tabale code start-----------------------
    function datashow() {
        // var role = 'staff';
        $.ajax({
            type: "POST",
            url: base_url + "CBill_genrate/get_master",
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
                    '<th><font style="font-weight:bold">Bill Number</font></th>' +
                    '<th ><font style="font-weight:bold">Date & Time</font></th>' +
                    '<th><font style="font-weight:bold">Customer Name</font></th>' +
                    '<th><font style="font-weight:bold">Table Name</font></th>' +
                    '<th><font style="font-weight:bold">Employee Name</font></th>' +
                    '<th><font style="font-weight:bold">Total Amount</font></th>' +
                    '<th class="not-export-column"><font style="font-weight:bold">Action</font></th>' +
                    '</tr>' +
                    '</thead>' +
                    '<tbody>';
                for (var i = 0; i < data.length; i++) {
                    // var sr = i + 1;

                    var fdateval = data[i].created_at;
                    var fdateslt = fdateval.split('-');
                    var time = fdateslt[2].split(' ');
                    var created_at = time[0] + '/' + fdateslt[1] + '/' + fdateslt[0] + ' ' + time[1];


                    var gst = data[i].gst_per;
                    var tamt = data[i].total_amt;
                    var Tot_gst = 0;
                    if (tamt == "") {
                        tamt = 1;
                    }
                    if (gst == "") {
                        gst = 0;
                    }

                    Tot_gst = parseFloat(tamt) * parseFloat(gst) / 100;
                    var g_tot = parseFloat(Tot_gst) + parseFloat(tamt);

                    html += '<tr>' +

                        '<td  >' + data[i].id + '</td>' +
                        '<td  >' + created_at + '</td>' +
                        '<td >' + data[i].customer_name + '</td>' +
                        '<td >' + data[i].table_name + '</td>' +
                        '<td >' + data[i].emp_name + '</td>' +
                        '<td >' + g_tot.toFixed(2) + '</td>' +
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
                        url: base_url + "CBill_genrate/deleteData",
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
            url: base_url + "CBill_genrate/get_master_where",
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
                    $("#btnprint").show();
                    $('#btnprint').val(id);
                    var date = data[i].date;
                    var fdob = date.split('-');
                    date = fdob[2] + "/" + fdob[1] + "/" + fdob[0];


                    $('#bill_date').val(date);
                    $('#customer').val(data[i].customer_name);
                    $('#table_nm').val(data[i].table_id);
                    $('#emp_nm').val(data[i].emp_id);
                    $('#tamt').val(data[i].total_amt);
                    $('#gst').val(data[i].gst_per).trigger('blur');


                    $.ajax({
                        type: "POST",
                        url: base_url + "CBill_genrate/get_master_where1",
                        data: {
                            table_name: 'bill_details',
                            id: id,
                        },
                        dataType: "JSON",
                        async: false,
                        success: function(data) {
                            var data = eval(data);
                            var r = data.length;

                            var row_id = $("#row").val();

                            var table = "";
                            for (var i = 0; i < r; i++) {
                                //   alert(row_id);
                                row_id = parseInt(row_id) + 1;
                                table += '<tr id="' + row_id + '">' +
                                    '<td id="item_nm_' + row_id + '">' + data[i].curse + '</td>' +
                                    '<td style="display:none;" id="item_id_' + row_id + '">' + data[i].item_id + '</td>' +
                                    '<td  id="varity_' + row_id + '">' + data[i].varity + '</td>' +
                                    '<td id="qty_' + row_id + '">' + data[i].qty + '</td>' +
                                    '<td id="rate_' + row_id + '">' + data[i].rate + '</td>' +
                                    '<td style="text-align:right;" id="amount_' + row_id + '">' + data[i].amount + '</td>' +
                                    '<td>' +
                                    '<button type="button" name="edit" class="edit_data1 btn btn-success" id="' + row_id + '"><i class="fa fa-edit"></i></button>' +
                                    ' <button type="button" name="delete" value="Delete" class="btn delete_data1 btn-danger"><i class="fa fa-trash"></i></button></td></tr>';
                                $('#row').val(row_id);
                                // alert(table);



                            }
                            $('#file_info_tbody').html(table);
                            count_all_total();
                        }
                    });


                }
            }

        });









    });

    function form_clear() {
        // $('#master_form')[0].reset();



        $("#file_info_tbody").html('');
        $('#save_update').val('');
        $('#bill_date').val('');
        $('#customer').val('');
        $('#table_nm').val('');
        $('#emp_nm').val('');
        $('#tamt').val('');
        $('#gst').val('');
        $("#btnprint").hide();
        $('#btnprint').val('');
        count_all_total();
    }
    $(document).on('click', '.closehideshow', function() {
        form_clear();
    });


    $(document).on('click', '#reset', function() {
        form_clear();
    });



    $(document).on('click', '#plus', function(e) {
        e.preventDefault();
        var rowid = $('#row').val();
        var row_id = parseInt(rowid) + 1;
        var item_nm = $("#item_nm option:selected").text();
        var item_id = $("#item_nm").val();
        var varity = $("#varity").val();
        var qty = $("#qty").val();
        var rate = $("#rate").val();
        var amount = $("#amount").val();
        var id = $("#ids").val();
        //alert(item_id + "=" + varity + "=" + qty);
        if (item_id == null || varity == null || qty == "") {
            swal("Details Not Found !!", "Hey, Item Details is Not Found Please fill details !!", "error");
        } else {
            if (id != "") {
                $("#item_nm_" + id).html(item_nm);
                $("#varity_" + id).html(varity);
                $("#qty_" + id).html(qty);
                $("#rate_" + id).html(rate);
                $("#amount_" + id).html(amount);
            } else {
                //   alert(row_id);
                //$('#file_info_tbody').html('');
                var table = "";
                table = '<tr id="' + row_id + '">' +
                    '<td id="item_nm_' + row_id + '">' + item_nm + '</td>' +
                    '<td style="display:none;" id="item_id_' + row_id + '">' + item_id + '</td>' +
                    '<td  id="varity_' + row_id + '">' + varity + '</td>' +
                    '<td id="qty_' + row_id + '">' + qty + '</td>' +
                    '<td id="rate_' + row_id + '">' + rate + '</td>' +
                    '<td style="text-align:right;" id="amount_' + row_id + '">' + amount + '</td>' +
                    '<td>' +
                    '<button type="button" name="edit" class="edit_data1 btn btn-success" id="' + row_id + '"><i class="fa fa-edit"></i></button>' +
                    ' <button type="button" name="delete" value="Delete" class="btn delete_data1 btn-danger"><i class="fa fa-trash"></i></button></td></tr>';
                $('#file_info_tbody').append(table);
                $('#row').val(row_id);
                $('#ids').val('');

            }
            $('#item_nm').val('');
            $('#varity').val('');
            $('#qty').val('');
            $('#rate').val('');
            $('#amount').val('');
            $('#ids').val('');
            count_all_total();
        }


    });

    function count_all_total() {
        var r1 = $('#file_info_tbody').find('tr');
        var r = r1.length;

        var totalamt = 0;
        var g_tot = 0;


        //   alert(r);

        for (var i = 0; i < r; i++) {


            amt = $(r1[i]).find('td:eq(5)').html();
            totalamt = parseFloat(totalamt) + parseFloat(amt);





        }
        //  alert(gl);

        var gst = $("#gst").val();
        var tamt = totalamt;
        var Tot_gst = 0;
        if (tamt == "") {
            tamt = 1;
        }
        if (gst == "") {
            gst = 0;
        }

        Tot_gst = parseFloat(tamt) * parseFloat(gst) / 100;
        //   alert(gst);
        $("#tgst").val(Tot_gst.toFixed(2));
        var tgst = Tot_gst;
        g_tot = parseFloat(tgst) + parseFloat(totalamt);


        $('#tamt').val(totalamt.toFixed(2));
        $('#gtotal').val(g_tot.toFixed(2));

    }

    $(document).on('change', '#item_nm', function() {
        var item = $("#item_nm").val();
        var item_nm = "";
        var r1 = $('table#file_info').find('tbody').find('tr');
        var r = r1.length;
        for (var i = 0; i < r; i++) {
            item_nm = $(r1[i]).find('td:eq(0)').html();

            if (item_nm == item) {

                swal("Already Exists !!", "Hey, " + item + " is already exists !!", "error");
                $("#item_nm").val('');
            }
        }
        $.ajax({
            type: "POST",
            url: base_url + "CBill_genrate/get_rate",

            data: {
                item: item,
            },
            dataType: "JSON",
            async: false,
            success: function(data) {
                var data = eval(data);

                for (var i = 0; i < data.length; i++) {



                    $('#full_amt').val(data[i].amount_full);
                    $('#half_amt').val(data[i].amount_half);



                }
            }
        });


    });
    $(document).on('change', '#varity', function() {
        var varity = $("#varity").val();
        var full = $("#full_amt").val();
        var half = $("#half_amt").val();
        if (varity == "Full") {
            $("#rate").val(full);
        } else {
            $("#rate").val(half);
        }
    });
    $(document).on('keyup', '#rate', function() {
        count_amount();
    });
    $(document).on('keyup', '#qty', function() {
        count_amount();
    });
    $(document).on('blur', '#gst', function() {
        count_gst();
    });
    $(document).on('click', '.delete_data1', function() {
        if (confirm("Are you sure you want to delete this?")) {
            $(this).parents("tr").remove();
            count_all_total();
        } else {
            return false;
        }
    });
    $(document).on('click', '.edit_data1', function(e) {
        e.preventDefault();
        var id1 = $(this).attr('id');
        $("#ids").val(id1);

        $('#item_nm').val($('#item_id_' + id1).text());
        $('#varity').val($('#varity_' + id1).text());
        $('#qty').val($('#qty_' + id1).text());
        $('#rate').val($('#rate_' + id1).text());
        $('#amount').val($('#amount_' + id1).text());
    });

    function count_amount() {
        var rate = $("#rate").val();
        var qty = $("#qty").val();
        var amount = 0;
        if (qty == "") {
            qty = 1;
        }
        if (rate == "") {
            rate = 0;
        }

        amount = parseFloat(rate) * parseFloat(qty);
        $("#amount").val(amount.toFixed(2));
    }

    function count_gst() {
        // var gst = $("#gst").val();
        // var tamt = $("#tamt").val();
        // var Tot_gst = 0;
        // if (tamt == "") {
        //     tamt = 1;
        // }
        // if (gst == "") {
        //     gst = 0;
        // }

        // Tot_gst = parseFloat(tamt) * parseFloat(gst) / 100;
        // //   alert(gst);
        // $("#tgst").val(Tot_gst.toFixed(2));
        count_all_total();
    }



    getMasterSelect('emp_master', '#table_nm');
    getMasterSelect('table_master', '#emp_nm');
    getMasterSelect('item_master', '#item_nm');

    function getMasterSelect(table_name, selecter) {

        $.ajax({
            type: "POST",
            url: base_url + "CBill_genrate/getdropdown",
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
                    if (table_name == "emp_master") {
                        name = data[i].emp_name;
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
