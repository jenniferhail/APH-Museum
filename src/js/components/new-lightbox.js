import Glide from "@glidejs/glide";

export default function newLightbox() {
	console.log("Running new lightbox");

	// https://glidejs.com/
	// https://sachinchoolur.github.io/lightgallery.js/

	var sliders = document.querySelectorAll(".glide");
	var lg = document.querySelectorAll(".glide__slides");

	var glide = [];

	for (var i = 0; i < sliders.length; i++) {
		glide[i] = new Glide(sliders[i], {
			// settings
		});

		// Run height function
		glide[i].on("build.after", function () {
			console.log("Running Glide build.after");
			// glideHandleHeight();
		});

		// Run height function and update the slide counter
		glide[i].on("run.after", function () {
			console.log("Running Glide run.after");
			// // Slide counter
			// currentSlide = glide[i].index + 1;
			// console.log("Current slide: " + currentSlide);
			// counterEl.innerHTML = currentSlide + " of " + slides.length;

			// glideHandleHeight();
		});

		glide[i].mount();

		lg[i].addEventListener(
			"onBeforeSlide",
			function (event) {
				// This is where the problem is.
				var parentGlideIndex = Array.from(sliders).indexOf(
					event.target.closest(".glide")
				);

				glide[parentGlideIndex].go("=" + event.detail.index);
			},
			false
		);

		lightGallery(lg[i], {
			// settings
		});

		// Resize height function
		function glideHandleHeight() {
			var activeSlide = sliders[i].querySelector(".glide__slide--active");

			const activeSlideHeight = activeSlide
				? activeSlide.offsetHeight
				: 0;
			console.log("Height - " + activeSlide.offsetHeight);

			const glideTrack = sliders[i].querySelector(".glide__track");
			const glideTrackHeight = glideTrack ? glideTrack.offsetHeight : 0;

			if (activeSlideHeight != glideTrackHeight) {
				glideTrack.style.height = `${activeSlideHeight}px`;
			}
		}
	}
}
