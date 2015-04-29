<form id="contact" action="/assets/actions/contact.php">
	<div>
		<fieldset>
			<input type="text" placeholder="Full Name*" validate-required>
		</fieldset>
		<fieldset>
			<input type="email" placeholder="Email*" validate-required validate-email>
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
			<textarea placeholder="What are you working on?*" validate-required></textarea>
		</fieldset>
	</div>
	<button class="submit">Submit Project Inquiry</button>
</form>
<script type="text/javascript">
	initializeForm = true;
</script>