<div class="caldera-config-group">
	<label><?php echo __('Webhook URL', 'cf-slack'); ?> </label>
	<div class="caldera-config-field">
		<input type="text" class="block-input field-config required" name="{{_name}}[url]" value="{{url}}">
	</div>
</div>
<div class="caldera-config-group">
	<label><?php echo __('Username', 'cf-slack'); ?> </label>
	<div class="caldera-config-field">
		<input type="text" class="block-input field-config required magic-tag-enabled" name="{{_name}}[username]" value="{{#if username}}{{username}}{{else}}incoming-webhook{{/if}}">
		<p><?php _e('The name of the user the message will be displays as', 'cf-slack'); ?></p>
	</div>
</div>
<div class="caldera-config-group">
	<label><?php echo __('Message Text', 'cf-slack'); ?> </label>
	<div class="caldera-config-field">
		<textarea class="block-input field-config required magic-tag-enabled" name="{{_name}}[text]">{{#if text}}{{text}}{{else}}<?php _e('New form submission', 'cf-slack'); ?>{{/if}}</textarea>
		<p><?php _e('The message that gets sent to Slack.', 'cf-slack'); ?></p>
	</div>
</div>
<div class="caldera-config-group">
	<label><?php echo __('Submission', 'cf-slack'); ?> </label>
	<div class="caldera-config-field">
		<label><input type="checkbox" class="field-config" name="{{_name}}[attach]" id="{{_id}}_attach" value="1" {{#if attach}}checked="checked"{{/if}}> Attach the submission data to the message</label>
	</div>
</div>

<div id="{{_id}}_do_attach">
	<div class="caldera-config-group">
		<label><?php echo __('Color', 'cf-slack'); ?> </label>
		<div class="caldera-config-field">
			<input type="text" class="field-config minicolor-picker" name="{{_name}}[color]" id="{{_id}}_dcolor" style="width:110px;" value="{{#if color}}{{color}}{{else}}#91A856{{/if}}"><span id="{{_id}}_dcolor_preview" data-for="{{_id}}_dcolor" class="preview-color-selector" style="margin-left: -28px;background-color: {{color}};"></span>
			<p><?php _e('The color assigned to the attachment message.', 'cf-slack'); ?></p>
		</div>
	</div>
</div>
<div class="caldera-config-group">
	<label><?php echo __('Channel Override', 'cf-slack'); ?> </label>
	<div class="caldera-config-field">
		<input type="text" class="block-input field-config magic-tag-enabled" name="{{_name}}[channel]" value="{{channel}}">
		<p><?php _e('Overrides the default channel for this webhook. Leave blank to use default.', 'cf-slack'); ?></p>
	</div>
</div>
{{#script}}
	color_picker_init();
	jQuery('body').on('change', '#{{_id}}_dcolor', function(){
		jQuery('#{{_id}}_dcolor_preview').css('background-color', this.value );
	});
	jQuery('body').on('change', '#{{_id}}_attach', function(){
		if(jQuery(this).prop('checked')){
			jQuery('#{{_id}}_do_attach').show();
		}else{
			jQuery('#{{_id}}_do_attach').hide();
		}
	});
	jQuery('#{{_id}}_attach').trigger('change');
{{/script}}