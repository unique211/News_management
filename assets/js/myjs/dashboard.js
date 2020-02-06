$(document).ready(function() {

    datashow();
    //----------------show data in the tabale code start-----------------------
    function datashow() {

        $.ajax({
            type: "POST",
            url: base_url + "Dashboard/get_count",
            data: {



            },
            dataType: "JSON",
            async: false,
            success: function(data) {
                var data = eval(data);



                $("#today_news").text(data.today_news);
                $("#all_news").text(data.all_news);
                $("#today_transaction").text(data.today_transaction);
                $("#all_transaction").text(data.all_transaction);

            }
        });


        $.ajax({
            type: "POST",
            url: base_url + "Dashboard/generate_report",
            data: {

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
                    // '<th><font style="font-weight:bold">Sr. No.</font></th>' +
                    '<th ><font style="font-weight:bold">News Date</font></th>' +
                    '<th><font style="font-weight:bold">Code</font></th>' +
                    '<th><font style="font-weight:bold">News Paper Name</font></th>' +
                    '<th><font style="font-weight:bold">Type</font></th>' +
                    '<th><font style="font-weight:bold">Impact of News</font></th>' +
                    '<th><font style="font-weight:bold">News Heading</font></th>' +
                    '<th><font style="font-weight:bold">News Size</font></th>' +
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
                        image = '<img src="' + base_url + 'Upload/' + data[i].image + '" height="50px" width="50px"></img>';
                    }


                    html += '<tr>' +
                        // '<td class="table-plus datatable-nosort">' + sr + '</td>' +
                        '<td  >' + date + '</td>' +
                        '<td  >' + data[i].code + '</td>' +
                        '<td  >' + data[i].newspaper_nm + '</td>' +
                        '<td  >' + type + '</td>' +
                        '<td  >' + impact_of_news + '</td>' +
                        '<td  >' + data[i].heading + '</td>' +
                        '<td  >' + data[i].size + '</td>' +
                        '<td  >' + image + '</td>' +
                        '</tr>';

                }
                html += '</tbody></table>';

                $('#show_master').html(html);
                $('#myTable').DataTable({

                    "order": [
                        [0, "asc"]
                    ],

                    dom: 'Bfrtip',
                    buttons: [{
                            extend: 'print',
                            title: 'News Report',

                            orientation: 'landscape',
                            pageSize: 'LEGAL',
                            footer: true,
                            exportOptions: {
                                columns: [0, 1, 2, 3, 4, 5, 6]
                            },
                        },
                        {
                            title: 'News Report',
                            extend: 'excelHtml5',
                            exportOptions: {
                                columns: [0, 1, 2, 3, 4, 5, 6]
                            }
                        }
                    ]
                });

            }

        });

    }






});