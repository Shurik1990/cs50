<form id="regist_form" method="POST">
	<div>
		<span class="descr">
			Name
			<span class="required">*</span>
		</span>
		<input type="text" name="name" value="" data-required="1" />
	</div>
	<div>
		<span class="descr">Phone</span>
		<input type="text" name="phone" value="" />
	</div>
	<div>
		<span class="descr">Password <span class="required">*</span></span>
		<input type="password" name="password1" value="" data-required="1" />
	</div>
	<div>
		<span class="descr">Confirm password <span class="required">*</span></span>
		<input type="password" name="password2" value="" data-required="1" />
	</div>
	<input type="submit" name="s" value="OK">
	<input type="hidden" name="page" value="regist" />
</form>
