import "../styles/main.scss";

import toggleMenu from "./components/header";
import openTOC from "./components/exhibit";
import animate from "./components/waypoints";
// import sliders from "./components/slider";
import vue from "./components/vue";
// import lightbox from "./components/lightbox";
import toggleShare from "./components/share";
import newLightbox from "./components/new-lightbox";
import { Accordion } from "carbon-components";

document.addEventListener("DOMContentLoaded", function () {
	vue();
	toggleMenu("menu-btn");
	toggleMenu("close-btn");
	animate();
	openTOC();
	// sliders();
	// lightbox();
	toggleShare(".toggle-share");
	newLightbox();

	// Carbon
	const accordionEls = document.querySelectorAll(".bx--accordion");
	accordionEls.forEach((el) => {
		Accordion.create(el);
	});
});
