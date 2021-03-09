export default function toggleMenu(buttonId) {
	var button = document.getElementById(buttonId);

	if (button) {
		button.addEventListener("click", (event) => {
			if (document.body.classList.contains("open-menu")) {
				document.body.classList.remove("open-menu");
			} else {
				document.body.classList.add("open-menu");
			}
		});
	}
}
