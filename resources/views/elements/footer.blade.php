<div class="footer">
    <div class="pull-right">
        10GB of <strong>250GB</strong> Free.
    </div>
    <div>
        <strong>Copyright</strong> Example Company &copy; 2014-2017
    </div>
</div>
<script>

    $('.chosen-select').chosen({
        width: "100%",
        search_contains: true
    });

    $('.date_selector .input-group.date').datepicker({
        format: 'dd/mm/yyyy',
        keyboardNavigation: false,
        forceParse: false,
        forceParse: false,
        autoclose: true,
        startView: 'days', // Set the start view to 'days'
    minViewMode: 'days', // Set the minimum view mode to 'months'
        todayHighlight: true
    });

    var date = new Date();
    var today = new Date(date.getFullYear(), date.getMonth(), date.getDate());

    $( '.date_selector .input-group.date' ).datepicker( 'setDate', today );

</script>