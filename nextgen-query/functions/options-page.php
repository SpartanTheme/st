<?php
    $opt_name = array('remove_styles' =>'ngq_remove_style',
			      'remove_scripts' => 'ngq_remove_scripts'
				  );
    $hidden_field_name = 'ngq_hidden_submit';

$opt_val = array('remove_styles' => get_option( $opt_name['remove_styles'] ),
  'remove_scripts' => get_option( $opt_name['remove_scripts'] )
  );

if(isset($_POST[ $hidden_field_name ]) && $_POST[ $hidden_field_name ] == 'Y' ) {
    // Read their posted value
    $opt_val = array('remove_styles' => $_POST[ $opt_name['remove_styles'] ],
      'remove_scripts' => $_POST[ $opt_name['remove_scripts'] ]
	  );

        // Save the posted value in the database
        update_option( $opt_name['remove_styles'], $opt_val['remove_styles'] );
		update_option( $opt_name['remove_scripts'], $opt_val['remove_scripts'] );
        // Put an options updated message on the screen
?>
<div id="message" class="updated fade">
  <p><strong>
<?php _e('Options saved.', 'ngq_trans_domain' ); ?>
    </strong></p>
</div>
<?php
$current_style = get_option('ngq_remove_style');
$current_script = get_option('ngq_remove_scripts');
}
$current_style = get_option('ngq_remove_style');
$current_script = get_option('ngq_remove_scripts');
?>

<div class="wrap">

	<div id="icon-options-general" class="icon32"></div>
	<h2>
		<?php _e( 'NextGen Query', 'ngq_trans_domain' ); ?>
	</h2>
	
	<p>Version 1.2.0</p>
	
	<form name="ngq_options" method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>">
		<input type="hidden" name="<?php echo $hidden_field_name; ?>" value="Y">
		<table>
			<tbody>
				<tr>
          <td>
            <input <?php if ($current_style == 'on'){ echo 'checked="checked"'; } ?> type="checkbox" name="<?php echo $opt_name['remove_styles']; ?>">
          </td>
					<td>
						<span class="label">Deregister NextGen Gallery Header Styles</span>
					</td>
				</tr>
				<tr>
          <td>
            <input <?php if ($current_script == 'on'){ echo 'checked="checked"'; } ?> type="checkbox" name="<?php echo $opt_name['remove_scripts']; ?>">
          </td>
					<td>
						<span class="label">Deregister NextGen Gallery Header Scripts</span>
					</td>
				</tr>
			</tbody>
		</table>
    <br/><input type="submit" name="submit" value="Save" class="button-primary">
	</form>

	<h3>Functions</h3>
  <pre>$ngqSinglePicture = ngq_query_singlepic($pictureID);</pre>
  <hr/>
  <pre>$ngqGalleryObject = ngq_query($galleryID);</pre>

</div>
