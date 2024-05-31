<script src="./js/juqery.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
   $(document).ready(function() {
    $('.student-table').DataTable({
        // responsive: true
            // Set number of rows per page
            dom: 'lBfrtip',
            buttons: [
                {
                    extend: 'pdfHtml5', // Use PDF export button
                    filename: 'student_list', // Specify PDF file name
                    title: 'Student List', // Specify PDF title (optional)
                    text: 'Export as PDF', // Button text (optional)
                    customize: function (doc) {
                        // Customize PDF document, if needed
                    }
                }
            ]
            
                });
    $('.teachers-table').DataTable({
        // responsive: true
        // Set number of rows per page
        dom: 'lBfrtip',
        buttons: [
                {
                    extend: 'pdfHtml5', // Use PDF export button
                    filename: 'teacher_list', // Specify PDF file name
                    title: 'Teacher List', // Specify PDF title (optional)
                    text: 'Export as PDF', // Button text (optional)
                    customize: function (doc) {
                        // Customize PDF document, if needed
                    }
                }
            ]
            });
    $('#profile-tab').on('click', function() {
        $('#profile-tab').addClass('mm-active');
        $('#home-tab').removeClass('mm-active');
        $('.teacher-data').removeClass('d-none');
        $('.student-data').addClass('d-none');
    });
    $('#home-tab').on('click', function() {
        
        $('#profile-tab').removeClass('mm-active');
        $('#home-tab').addClass('mm-active');
        $('.student-data').removeClass('d-none');
        $('.teacher-data').addClass('d-none');
    });
});

</script>