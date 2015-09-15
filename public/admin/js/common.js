/**
 * Created by Administrator on 2015/9/4 0004.
 */
$(function(){


    // Initialize card flip
    $('.card.hover').hover(function(){
        $(this).addClass('flip');
    },function(){
        $(this).removeClass('flip');
    });

    // Initialize flot chart
    var d1 =[ [1, 715],
        [2, 985],
        [3, 1525],
        [4, 1254],
        [5, 1861],
        [6, 2621],
        [7, 1987],
        [8, 2136],
        [9, 2364],
        [10, 2851],
        [11, 1546],
        [12, 2541]
    ];
    var d2 =[ [1, 463],
        [2, 578],
        [3, 327],
        [4, 984],
        [5, 1268],
        [6, 1684],
        [7, 1425],
        [8, 1233],
        [9, 1354],
        [10, 1200],
        [11, 1260],
        [12, 1320]
    ];
    var months = ["January", "February", "March", "April", "May", "Juny", "July", "August", "September", "October", "November", "December"];


    $('#mmenu').on(
        "opened.mm",
        function()
        {
            // redraw the graph in the correctly sized div
            plot.resize();
            plot.setupGrid();
            plot.draw();
        }
    );

    $('#mmenu').on(
        "closed.mm",
        function()
        {
            // redraw the graph in the correctly sized div
            plot.resize();
            plot.setupGrid();
            plot.draw();
        }
    );


    // tooltips showing
    $("#statistics-chart").bind("plothover", function (event, pos, item) {
        if (item) {
            var x = item.datapoint[0],
                y = item.datapoint[1];

            $("#tooltip").html('<h1 style="color: #418bca">' + months[x - 1] + '</h1>' + '<strong>' + y + '</strong>' + ' ' + item.series.label)
                .css({top: item.pageY-30, left: item.pageX+5})
                .fadeIn(200);
        } else {
            $("#tooltip").hide();
        }
    });



    //tooltips options
    $("<div id='tooltip'></div>").css({
        position: "absolute",
        //display: "none",
        padding: "10px 20px",
        "background-color": "#ffffff",
        "z-index":"99999"
    }).appendTo("body");



    // sortable table
    $('.table.table-sortable th.sortable').click(function() {
        var o = $(this).hasClass('sort-asc') ? 'sort-desc' : 'sort-asc';
        $('th.sortable').removeClass('sort-asc').removeClass('sort-desc');
        $(this).addClass(o);
    });

    //todo's
    $('#todolist li label').click(function() {
        $(this).toggleClass('done');
    });

    // Initialize tabDrop
    $('.tabdrop').tabdrop({text: '<i class="fa fa-th-list"></i>'});

    //load wysiwyg editor
    $('#quick-message-content').summernote({
        toolbar: [
            //['style', ['style']], // no style button
            ['style', ['bold', 'italic', 'underline', 'clear']],
            ['fontsize', ['fontsize']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['height', ['height']],
            //['insert', ['picture', 'link']], // no insert buttons
            //['table', ['table']], // no table button
            //['help', ['help']] //no help button
        ],
        height: 143   //set editable area's height
    });

    //multiselect input
    $(".chosen-select").chosen({disable_search_threshold: 10});

    //check all checkboxes
    $('table thead input[type="checkbox"]').change(function () {
        $(this).parents('table').find('tbody input[type="checkbox"]').prop('checked', $(this).prop('checked'));
    });

    // sortable table
    $('.table.table-sortable th.sortable').click(function() {
        var o = $(this).hasClass('sort-asc') ? 'sort-desc' : 'sort-asc';
        $(this).parents('table').find('th.sortable').removeClass('sort-asc').removeClass('sort-desc');
        $(this).addClass(o);
    });

    //chosen select input
    $(".chosen-select").chosen({disable_search_threshold: 10});

    //check toggling
    $('.check-toggler').on('click', function(){
        $(this).toggleClass('checked');
    });

});