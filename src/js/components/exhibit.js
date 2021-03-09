export default function openTOC() {
	var buttons = document.querySelectorAll(".table-of-contents .button");

	buttons.forEach(function (buttonEl, i) {
		buttonEl.addEventListener("click", (event) => {
			if (buttonEl.parentElement.classList.contains("open")) {
				buttonEl.parentElement.classList.remove("open");
			} else {
				buttonEl.parentElement.classList.add("open");
			}
		});
	});
}
