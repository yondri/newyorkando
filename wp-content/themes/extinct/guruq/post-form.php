<div id="postbox">
	<form id="new_post" name="new_post" method="post" action="<?php echo site_url(); ?>/">
		<input type="hidden" name="action" id="action" value="post" />
		<?php wp_nonce_field( 'new-post' ); ?>
		<div class="inputarea">
			<div id="guruq-ask">

<input class="required1" type="text" name="question" id="question" value="<?php echo Q_DEFAULT; ?>" tabindex="3" onfocus="this.value=(this.value=='<?php echo Q_DEFAULT; ?>') ? '' : this.value;" onblur="this.value=(this.value=='') ? '<?php echo Q_DEFAULT; ?>' : this.value;" />
<label class="hidden" style="display:none;" for="question"><small><strong>Question</strong></small></label></p>

<input type="text" name="name" id="name" value="" size="22" tabindex="4" />
<label for="name"><small><strong>Name</strong></small></label>

<input type="text" name="email" id="email" value="" size="22" tabindex="5" />
<label for="email"><small><strong>E-mail</strong></small></label>

<input type="text" name="website" id="website" value="" size="22" tabindex="6" />
<label for="website"><small><strong>Website</strong></small></label>


<input type="hidden" name="guruq_key" id="guruq_key" value="" /> <br />
<div class="clear"></div>
<input class="button" name="ask-submit" id="ask-submit" type="submit" tabindex="7" value="Ask" />

			</div><!-- // #guruq-ask -->
			<div id="ask-message"></div>
		</div><!-- // #inputarea -->
		<div class="clear"></div>
	</form>
</div> <!-- // #postbox -->
