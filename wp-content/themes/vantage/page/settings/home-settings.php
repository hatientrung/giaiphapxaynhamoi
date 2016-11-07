<div>
	<form method="post" action="home-settings.php" novalidate="novalidate">
		<input type="hidden" name="home-settings" value="ok">
		<table class="form-table">
			<tbody>
				<tr>
					<th scope="row"><label for="blogname">Tên công ty</label></th>
					<td><input name="company-name" type="text" id="company-name" class="regular-text" value="<?php echo get_option('company_name'); ?>"></td>
				</tr>
			</tbody>
		</table>
		<p class="submit"><input type="submit" name="submit" id="submit" class="button button-primary" value="Save Changes"></p></form>
	</form>
</div>