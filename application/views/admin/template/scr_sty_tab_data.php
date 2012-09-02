<link rel="stylesheet" href="<?php echo base_url();?>css/admin/admin.css" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php echo base_url();?>jqueryUI/themes/base/jquery.ui.all.css" type="text/css" media="screen" />


<script src="<?php echo base_url();?>jqueryUI/ui/jquery.ui.core.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>jqueryUI/ui/jquery.ui.widget.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>jqueryUI/ui/jquery.ui.mouse.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>jqueryUI/ui/jquery.ui.selectable.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>jqueryUI/ui/jquery.ui.tabs.js" type="text/javascript"></script>

<script type="text/javascript" charset="utf-8">
    $(document).ready(function(){
        $(function() {
		$( "#page_tabs" ).tabs({
                        ajaxOptions: {
				error: function( xhr, status, index, anchor ) {
					$( anchor.hash ).html(
						"Couldn't load this tab. We'll try to fix this as soon as possible.");
				}
			}
                });
	});
    });
</script>

<!--This style import has been done for datatable-->


<style type="text/css" title="currentStyle">
        @import "<?php echo base_url();?>jquery/admin/DataTables/media/css/demo_page.css";
        @import "<?php echo base_url();?>jquery/admin/DataTables/media/css/demo_table.css";
        @import "<?php echo base_url();?>jquery/admin/DataTables/media/css/demo_table_jui.css";
        @import "<?php echo base_url();?>jquery/admin/Datatables_Editables/media/css/demo_validation.css";
        @import "<?php echo base_url();?>jqueryUI/themes/smoothness/jquery-ui-1.8.23.custom.css";
        @import "<?php echo base_url();?>css/admin/highlight_row.css";

</style>

<!--<script type="text/javascript" language="javascript" src="<?php echo base_url();?>jquery/admin/DataTables/media/js/jquery.dataTables.js"></script>-->

<script type="text/javascript" language="javascript" src="<?php echo base_url();?>jquery/admin/Datatables_Editables/media/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" language="javascript" src="<?php echo base_url();?>jquery/admin/Datatables_Editables/media/js/jquery.jeditable.js"></script>
<script type="text/javascript" language="javascript" src="<?php echo base_url();?>jquery/admin/Datatables_Editables/media/js/jquery-ui.js"></script>
<script type="text/javascript" language="javascript" src="<?php echo base_url();?>jquery/admin/Datatables_Editables/media/js/jquery.validate.js"></script>
<script type="text/javascript" language="javascript" src="<?php echo base_url();?>jquery/admin/Datatables_Editables/media/js/jquery.DataTables.editable.js"></script>

