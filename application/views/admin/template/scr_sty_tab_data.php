<link rel="stylesheet" href="<?php echo base_url();?>css/admin/admin.css" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php echo base_url();?>jqueryUI/themes/base/jquery.ui.all.css" type="text/css" media="screen" />


<script src="<?php echo base_url();?>jqueryUI/ui/jquery.ui.core.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>jqueryUI/ui/jquery.ui.widget.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>jqueryUI/ui/jquery.ui.mouse.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>jqueryUI/ui/jquery.ui.selectable.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>jqueryUI/ui/jquery.ui.tabs.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>jqueryUI/ui/jquery.ui.autocomplete.js" type="text/javascript"></script>

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


<!--This import is for jquery select-->
<!--<script type="text/javascript" language="javascript" src="<?php echo base_url();?>jquery/admin/jquery_select/ui/jquery.ui.core.js"></script>-->

<script type="text/javascript" language="javascript" src="<?php echo base_url();?>jquery/admin/jquery_select/ui/jquery.ui.position.js"></script>
<script type="text/javascript" language="javascript" src="<?php echo base_url();?>jquery/admin/jquery_select/ui/jquery.ui.selectmenu.js"></script>
<!--<script type="text/javascript" language="javascript" src="<?php echo base_url();?>jquery/admin/jquery_select/ui/jquery.ui.widget.js"></script>-->

<link rel="stylesheet" href="<?php echo base_url();?>jquery/admin/jquery_select/themes/base/jquery.ui.selectmenu.css" type="text/css" media="screen" />

<style type="text/css">
    .wrap ul.ui-selectmenu-menu-popup li a { font-weight: bold; }
</style>

<script type="text/javascript">
    $(document).ready(function(){
        $(function(){
                $('select#speedA').selectmenu({style:'popup'});

                $('select#speedAa').selectmenu({
                        style:'popup',
                        maxHeight: 150
                });
                $('select#speedAa').selectmenu("widget").addClass("wrap");

                $('select#speedB').selectmenu({
                        style:'popup',
                        width: '50%',
                        format: addressFormatting
                });

                $('select#speedC').selectmenu();

                $('select#speedD').selectmenu({
                        menuWidth: 400,
                        format: addressFormatting
                });

                $('select#filesC').selectmenu({
                        style:'popup',
                        positionOptions: {
                                my: "left center",
                                at: "right center",
                                offset: "10 0"
                        }
                });
        });

        //a custom format option callback
         addressFormatting = function(text){
                var newText = text;
                //array of find replaces
                var findreps = [
                        {find:/^([^\-]+) \- /g, rep: '<span class="ui-selectmenu-item-header">$1</span>'},
                        {find:/([^\|><]+) \| /g, rep: '<span class="ui-selectmenu-item-content">$1</span>'},
                        {find:/([^\|><\(\)]+) (\()/g, rep: '<span class="ui-selectmenu-item-content">$1</span>$2'},
                        {find:/([^\|><\(\)]+)$/g, rep: '<span class="ui-selectmenu-item-content">$1</span>'},
                        {find:/(\([^\|><]+\))$/g, rep: '<span class="ui-selectmenu-item-footer">$1</span>'}
                ];

                for(var i in findreps){
                        newText = newText.replace(findreps[i].find, findreps[i].rep);
                }
                return newText;
        }

        // add themeswitcher
     /*  	$(function(){
			var ts = $('<div class="ui-button ui-widget ui-state-default ui-corner-all" style="padding: 5px; position: absolute; top: 20px; right: 10px;">Click here to add Themeswitcher!</div>')
			.appendTo('body')
			.bind("click", function() {
				ts.text("Loading Themeswitcher...");
				$.getScript('http://ui.jquery.com/applications/themeroller/themeswitchertool/', function() {
					ts.removeClass("ui-button ui-widget ui-state-default ui-corner-all").text("").unbind("click").themeswitcher();
				});
			});
        });*/
    });
</script>

<!--Time Picker-->

<link rel="stylesheet" href="<?php echo base_url();?>jquery/admin/Timepicker/jquery.ui.timepicker.css" type="text/css" media="screen" />
<script src="<?php echo base_url();?>jquery/admin/Timepicker/jquery.ui.timepicker.js" type="text/javascript"></script>

<style type="text/css" media="screen">
    .error{
            display: block;
        }
</style>

<script src="<?php echo base_url();?>jqueryUI/ui/jquery.ui.accordion.js" type="text/javascript"></script>
