const homeIcon = document.querySelector(".home-icon");
const searchIcon = document.querySelector(".search-icon");
const profileIcon = document.querySelector(".profile-icon");
const settingIcon = document.querySelector(".setting-icon");

const pathname = window.location.pathname;

if (
  pathname == "/issue-sedunia/" ||
  pathname == "/issue-sedunia/index.php" ||
  pathname.startsWith("/issue-sedunia/post.php")
) {
  homeIcon.classList.add("yellow", "shadow", "border");
} else if (pathname.startsWith("/issue-sedunia/search.php")) {
  searchIcon.classList.add("blue", "shadow", "border");
} else if (pathname.startsWith("/issue-sedunia/profile.php")) {
  profileIcon.classList.add("purple", "shadow", "border");
} else if (pathname.startsWith("/issue-sedunia/editProfile.php")) {
  settingIcon.classList.add("green", "shadow", "border");
}
