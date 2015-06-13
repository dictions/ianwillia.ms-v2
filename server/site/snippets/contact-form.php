<form id="contact" action="/form" method="post">
	<div>
		<fieldset>
			<input class="input" name="fullname" type="text" placeholder="Full Name*" validate-required>
			<span class="error" data-required="Full Name is required*"></span>
		</fieldset>
		<fieldset>
			<input name="email" class="input" type="email" placeholder="Email*" validate-required validate-email>
			<span class="error" data-required="Email is required*" data-email="Invalid email*"></span>
		</fieldset>
	</div>
	<div>
		<fieldset class="select">
			<label>Estimated Timeline</label>
			<select name="timeline">
				<option>1 week</option>
				<option>1 Month</option>
				<option>6 Months</option>
				<option>1 Year</option>
				<option>Ongoing or not sure</option>
			</select>
		</fieldset>
		<fieldset class="select">
			<label>Budget</label>
			<select name="budget">
				<option>$1,000-$5,000</option>
				<option>$5,000-$10,000</option>
				<option>$10,000-$25,000</option>
				<option>$25,000+</option>
				<option>Not sure</option>
			</select>
		</fieldset>
	</div>
	<div>
		<fieldset>
			<textarea name="message" class="input" placeholder="What are you working on?*" validate-required></textarea>
			<span class="error" data-required="What are you working on?*"></span>
		</fieldset>
	</div>
	<p class="alert">
		<span></span>
	</p>
	<button class="submit">Submit Project Inquiry</button>
</form>
<script type="text/javascript">
	GLOBAL_MODULES.push('FORM');
</script>