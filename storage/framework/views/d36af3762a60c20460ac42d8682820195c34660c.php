<script>
    window.deleteButtonTrans = '<?php echo e(trans("quickadmin.qa_delete_selected")); ?>';
    window.copyButtonTrans = '<?php echo e(trans("quickadmin.qa_copy")); ?>';
    window.csvButtonTrans = '<?php echo e(trans("quickadmin.qa_csv")); ?>';
    window.excelButtonTrans = '<?php echo e(trans("quickadmin.qa_excel")); ?>';
    window.pdfButtonTrans = '<?php echo e(trans("quickadmin.qa_pdf")); ?>';
    window.printButtonTrans = '<?php echo e(trans("quickadmin.qa_print")); ?>';
    window.colvisButtonTrans = '<?php echo e(trans("quickadmin.qa_colvis")); ?>';
</script>
<script src="//code.jquery.com/jquery-3.3.1.js"></script>
<script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="//cdn.datatables.net/buttons/1.2.4/js/dataTables.buttons.min.js"></script>
<script src="//cdn.datatables.net/buttons/1.2.4/js/buttons.flash.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
<script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
<script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.colVis.min.js"></script>
<script src="https://cdn.datatables.net/select/1.2.0/js/dataTables.select.min.js"></script>
<script src="https://code.jquery.com/ui/1.11.3/jquery-ui.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="<?php echo e(url('toast/toast.min.js')); ?>"></script>
<script src="<?php echo e(url('adminlte/js')); ?>/select2.full.min.js"></script>
<script src="<?php echo e(url('adminlte/js')); ?>/main.js"></script>
<script src="<?php echo e(asset('adminlte/plugins/moment/js/momentjs.js')); ?>"></script>
<script src="<?php echo e(asset('adminlte/plugins/moment/js/moment-hijri.js')); ?>"></script>
<script src="<?php echo e(asset('adminlte/plugins/moment/js/bootstrap-hijri-datetimepicker.js')); ?>"></script>
<script src="<?php echo e(url('adminlte/plugins/slimScroll/jquery.slimscroll.min.js')); ?>"></script>
<script src="<?php echo e(url('adminlte/plugins/fastclick/fastclick.js')); ?>"></script>
<script src="<?php echo e(url('adminlte/js/app.min.js')); ?>"></script>
<script src="<?php echo e(url('hos-dev/js')); ?>/sweetalert2.js"></script>


<script>
    window._token = '<?php echo e(csrf_token()); ?>';
</script>


<script>
    $(function(){
        /** add active class and stay opened when selected */
        var url = window.location;

        // for sidebar menu entirely but not cover treeview
        $('ul.sidebar-menu a').filter(function() {
            return this.href == url;
        }).parent().addClass('active');

        $('ul.treeview-menu a').filter(function() {
            return this.href == url;
        }).parent().addClass('active');

        // for treeview
        $('ul.treeview-menu a').filter(function() {
             return this.href == url;
        }).parentsUntil('.sidebar-menu > .treeview-menu').addClass('menu-open').css('display', 'block');
    });
</script>
<?php /**PATH C:\laragon\www\ensraf\resources\views/partials/javascripts.blade.php ENDPATH**/ ?>