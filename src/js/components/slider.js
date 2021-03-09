import Glide from "@glidejs/glide";

export default function sliders() {
	console.log("Running sliders");

	// Find all sliders
	const sliders = document.querySelectorAll(".glide");

	if (sliders) {
		sliders.forEach(function (slider, i, parent) {
			// Create a new Glide instance
			const glide = new Glide(slider, {
				type: "carousel",
			});

			// Setup the slide counter
			const counterEl = slider.querySelector(".slide-counter");
			const slides = slider.querySelectorAll(".glide__slide");
			var currentSlide = glide.index + 1;
			counterEl.innerHTML = "1 of " + slides.length;

			// Run height function
			glide.on("build.after", function () {
				glideHandleHeight();
			});

			// Run height function and update the slide counter
			glide.on("run.after", function () {
				// Slide counter
				currentSlide = glide.index + 1;
				counterEl.innerHTML = currentSlide + " of " + slides.length;

				glideHandleHeight();
			});

			// Mount
			glide.mount();

			// Resize height function
			function glideHandleHeight() {
				const activeSlide = document.querySelector(
					".glide__slide--active"
				);
				const activeSlideHeight = activeSlide
					? activeSlide.offsetHeight
					: 0;

				const glideTrack = document.querySelector(".glide__track");
				const glideTrackHeight = glideTrack
					? glideTrack.offsetHeight
					: 0;

				if (activeSlideHeight != glideTrackHeight) {
					glideTrack.style.height = `${activeSlideHeight}px`;
				}
			}
		});
	}
}
