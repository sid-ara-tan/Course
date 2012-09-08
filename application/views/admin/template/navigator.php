<aside id="sidebar" class="column">
		<form class="quick_search">
			<input type="text" value="Quick Search" onfocus="if(!this._haschanged){this.value=''};this._haschanged=true;">
		</form>
		<hr/>
                
                <?php foreach ($navigator as $key => $value):?>
                    <h3><?php echo $key;?></h3>
                    <ul class="toggle">
                        <?php foreach($value as $item_key=>$item_value):?>
                        <li class="<?php echo $item_value['class'];?>"><a href="<?php echo $item_value['link']?>"><?php echo $item_value['name'];?></a></li>
                        <?php endforeach;?>
                    </ul>
                <?php endforeach;?>

                    <script type="text/javascript" charset="utf-8">
                       /* $(document).ready(function(){
                            $('.toggle').hide();
                        });*/
                    </script>
                    
		<footer id="stickyFooter">
			<hr />
			<p><strong>Contact Info</strong></p>
			<p>siddhartha047@gmail.com</p>
		</footer>
                        <hr/>
	</aside><!-- end of sidebar -->