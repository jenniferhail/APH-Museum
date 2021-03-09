export default function toggleShare(buttonClass) {
	var button = document.querySelector(buttonClass);

	if (button) {
		button.addEventListener("click", (event) => {
			button.closest(".share").classList.toggle("show");
		});
	}
}
