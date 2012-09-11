<script type="text/javascript" charset="utf-8">
    $(document).ready(function(){
        $('#group_create_status_image').click(function(){
            $('#group_create_status').toggle('slow');
        });
    });
</script>
<article class="module width_full shadow ">
              <div id="group_create_status">                    
                <div style="font-size:12px;-moz-column-count:4;-webkit-column-count:4;" >
                    <?php echo $output; ?>
                </div>
            </div>
            <div id="button_bar">
            <table cellpadding="0" cellspacing="30" border="0"  class="ui-widget" align="center">
                <tr>
                    <td>
                        <img src="<?php echo base_url();?>images/admin/icon/updown.png" id="group_create_status_image" alt="hide" height="30px" title="click to show or hide the contents"/>
                    </td>
                </tr>
            </table>
           </div>
</article>