// require("waypoints/lib/noframework.waypoints.js");
import "waypoints/lib/noframework.waypoints.js";

export default function animate() {
	var mightyBlocks = document.querySelectorAll(".block");
	for (var i = 0; i < mightyBlocks.length; i++) {
		var mightyBlock = mightyBlocks[i];
		mightyBlock.classList.add("ready");
		new Waypoint({
			element: mightyBlock,
			handler: function () {
				this.element.classList.add("animate");
			},
			offset: "50%",
		});
	}

	var mightyComponents = document.querySelectorAll(".component");
	for (var i = 0; i < mightyComponents.length; i++) {
		var mightyComponent = mightyComponents[i];
		mightyComponent.classList.add("ready");
		new Waypoint({
			element: mightyComponent,
			handler: function () {
				this.element.classList.add("animate");
			},
			offset: "50%",
		});
	}
}
