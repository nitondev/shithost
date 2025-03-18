document.addEventListener("DOMContentLoaded", function () {
    const themeToggle = document.getElementById("theme-toggle");
    const body = document.body;

    let savedTheme = localStorage.getItem("theme");
    let prefersDark = window.matchMedia("(prefers-color-scheme: dark)").matches;
    let currentTheme = savedTheme || (prefersDark ? "dark" : "light");

    applyTheme(currentTheme);

    themeToggle.addEventListener("click", function (e) {
        e.preventDefault();
        let newTheme = body.getAttribute("data-bs-theme") === "dark" ? "light" : "dark";
        applyTheme(newTheme);
        localStorage.setItem("theme", newTheme);
    });

    function applyTheme(theme) {
        body.setAttribute("data-bs-theme", theme);
        themeToggle.innerHTML = theme === "dark"
            ? '<i class="bi bi-sun-fill" style="color: #ffc107;"></i>'
            : '<i class="bi bi-moon-fill" style="color: #6f42c1;"></i>';
    }
});
