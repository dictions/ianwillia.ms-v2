<form id="contact" action="/assets/actions/contact.php">
	<div>
		<fieldset>
			<input class="input" type="text" placeholder="Full Name*" validate-required>
			<span class="error" data-required="Please enter your full name*"></span>
		</fieldset>
		<fieldset>
			<input class="input" type="email" placeholder="Email*" validate-required validate-email>
			<span class="error" data-required="Please enter a valid email*" data-email="Email is not valid*"></span>
		</fieldset>
	</div>
	<div>
		<fieldset class="select">
			<label>Estimated Timeline</label>
			<select>
				<option>1 week</option>
				<option>1 Month</option>
				<option>6 Months</option>
				<option>1 Year</option>
				<option>Ongoing or Not Sure</option>
			</select>
		</fieldset>
		<fieldset class="select">
			<label>Budget</label>
			<select>
				<option>$1,000-$5,000</option>
				<option>$5,000-$10,000</option>
				<option>$10,000-$25,000</option>
				<option>$25,000-$50,000</option>
				<option>Not Sure</option>
			</select>
		</fieldset>
	</div>
	<div>
		<fieldset>
			<textarea class="input" placeholder="What are you working on?*" validate-required></textarea>
			<span class="error" data-required="What are you working on?*"></span>
		</fieldset>
	</div>
	<button class="submit">Submit Project Inquiry</button>
</form>
<script type="text/javascript">
	initializeForm = true;
</script>