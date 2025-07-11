document.addEventListener("DOMContentLoaded", () => {
  const darkToggleDesktop = document.getElementById("darkToggle");
  const darkToggleMobile = document.getElementById("darkToggleMobile");

  // Function to apply theme
  function applyTheme(theme) {
    if (theme === "light") {
      document.body.classList.add("light");
    } else {
      document.body.classList.remove("light");
    }
  }

  // Function to update both toggles
  function updateToggles(isDark) {
    if (darkToggleDesktop) darkToggleDesktop.checked = isDark;
    if (darkToggleMobile) darkToggleMobile.checked = isDark;
  }

  // Function to set theme and save to localStorage
  function setTheme(isDark) {
    const theme = isDark ? "dark" : "light";
    applyTheme(theme);
    updateToggles(isDark);
    localStorage.setItem("theme", theme);
  }

  // Event listeners
  if (darkToggleDesktop) {
    darkToggleDesktop.addEventListener("change", () => {
      setTheme(darkToggleDesktop.checked);
    });
  }

  if (darkToggleMobile) {
    darkToggleMobile.addEventListener("change", () => {
      setTheme(darkToggleMobile.checked);
    });
  }

  // Load theme from localStorage
  const savedTheme = localStorage.getItem("theme") || "dark";
  applyTheme(savedTheme);
  updateToggles(savedTheme === "dark");
});
document.getElementById("darkToggle").addEventListener("change", function () {
  document.body.classList.toggle("light-mode");
});