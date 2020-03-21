<!-- Bootstrap Core JavaScript -->
<script src="admin/themes/js/bootstrap.min.js"></script>
<!-- Metis Menu Plugin JavaScript -->
<script src="admin/themes/js/metisMenu.min.js"></script>
<!-- Morris Charts JavaScript -->
<script src="admin/themes/js/raphael-min.js"></script>
<script src="admin/themes/js/morris.min.js"></script>
<!-- Custom Theme JavaScript -->
<script src="admin/themes/js/sb-admin-2.js"></script>
<!-- DataTables JavaScript -->
<script src="admin/themes/js/jquery.dataTables.min.js"></script>
<script src="admin/themes/js/dataTables.bootstrap.min.js"></script>
<!-- Page-Level Demo Scripts - Tables - Use for reference -->
<!--<script type="text/javascript">
    document.title = "<?/*=$title;*/ ?>"
</script>-->
<script type="text/javascript">
    $(document).ready(function() {
        $(this).attr("title", "<?= $title; ?>");
    });
</script>
<script>
    $('.deleteitem').on('click', function() {
        return confirm('Are you sure?');
    });
</script>
</body>

</html>