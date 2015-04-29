module.exports = function() {
	// FASTCLICK ALTERNATIVE
	(function(fastActiveClassName, isFastActiveTarget) {
		var activeElement = null,
			clearActive = function() {
				if (activeElement) {
					activeElement.classList.remove(fastActiveClassName);
					activeElement = null;
				}
			},
			setActive = function(e) {
				clearActive();
				if (isFastActiveTarget(e)) {
					activeElement = e.target;
					activeElement.classList.add(fastActiveClassName);
				}
			};
		document.body.addEventListener('touchstart', setActive, false);
		document.body.addEventListener('touchmove', clearActive, false);
	})('active', function(e) {
		return ['A', 'INPUT', 'SELECT', 'TEXTAREA'].indexOf(e.target.tagName) > -1; // Put your conditional logic here
	});
};