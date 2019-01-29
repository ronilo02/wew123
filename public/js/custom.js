$(document).ready(function() {

    /*
     *
     * DataTables Js Code
     * 
     */

    $('.dataTables-permission').DataTable({
        pageLength: 25,
        responsive: true,

        ordering: false,

    });

    
 


   var tleads = $('.dataTables-leads').DataTable({
        pageLength: 10,
        responsive: true,
        ordering: false,
        drawCallback: function() {
            $('input[type="checkbox"]').iCheck({
                checkboxClass: 'icheckbox_square-green'
            });
        },
        columnDefs: [{
            'targets': 0,
            'checkboxes': {
                'selectRow': true,
                'selectCallback': function(nodes, selected) {
                    $('input[type="checkbox"]', nodes).iCheck('update');
                },
                'selectAllCallback': function(nodes, selected, indeterminate) {
                    $('input[type="checkbox"]', nodes).iCheck('update');
                }
            }
        }],
        select: 'multi',
    });

    // Handle iCheck change event for "select all" control


    $('.dataTables-notes').DataTable({
        pageLength: 25,
        responsive: true,
    });


    $('.dataTables-lead-import').DataTable({
        pageLength: 25,
        responsive: true,


    });

    /*
     *
     * End of DataTables Js Code
     * 
     */

    $('.ladda-button').ladda('bind', { timeout: 2000 });


    /*var lineData = {
            labels: ["January", "February", "March", "April", "May", "June", "July"],
            datasets: [{
                    label: "Example dataset",
                    backgroundColor: "rgba(26,179,148,0.5)",
                    borderColor: "rgba(26,179,148,0.7)",
                    pointBackgroundColor: "rgba(26,179,148,1)",
                    pointBorderColor: "#fff",
                    data: [28, 48, 40, 19, 86, 27, 90]
                },
                {
                    label: "Example dataset",
                    backgroundColor: "rgba(220,220,220,0.5)",
                    borderColor: "rgba(220,220,220,1)",
                    pointBackgroundColor: "rgba(220,220,220,1)",
                    pointBorderColor: "#fff",
                    data: [65, 59, 80, 81, 56, 55, 40]
                }
            ]
        };

        var lineOptions = {
            responsive: true
        };


        var ctx = document.getElementById("lineChart").getContext("2d");
        new Chart(ctx, { type: 'line', data: lineData, options: lineOptions });
       */
});