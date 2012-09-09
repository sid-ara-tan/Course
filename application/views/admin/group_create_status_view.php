<script type="text/javascript" charset="utf-8">
    $(document).ready(function(){
        $('#group_create_status_image').click(function(){
            $('#group_create_status').toggle('slow');
        });
    });
</script>
<article class="module width_full shadow ">
              <div id="group_create_status">
                    <div align="" style="padding:20px;font-size: 1.1em;">
                    <p style="color: yellowgreen;">
                        <img src="<?php echo base_url();?>/images/admin/valid.png" width="20px" height="20px" />
                        <?php echo $no_success;?> Entries successfully created.
                    </p>
                    <p style="color: #990000;">
                        <img src="<?php echo base_url();?>/images/admin/error.png" width="20px" height="20px" />
                        <?php echo $no_error;?> Entries creation failed.
                    </p>
                    <p style="color: #cc6600;">
                        <img src="<?php echo base_url();?>/images/admin/warning.png" width="20px" height="20px" />
                        <?php echo $no_warning;?> Entries Already Exists.
                    </p>
                </div>
                <div style="font-size:1.1em;-moz-column-count:3;-webkit-column-count:3;text-align:center;" >
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