const uploadBtn = document.querySelector(".btn-upload-modal");
const dialog = document.querySelector(".dialog");
const cancelBtn = document.querySelector(".cancel-post");
const navAddPost = document.querySelector(".nav-add-post");
const homeIcon = document.querySelector(".home-icon");
const searchIcon = document.querySelector(".search-icon");
const profileIcon = document.querySelector(".profile-icon");
const settingIcon = document.querySelector(".setting-icon");

function shareLink(id) {
  const link = `localhost/issue-sedunia/post.php?id=${id}`;
  navigator.clipboard.writeText(link).then(() => alert("Link copied!"));
}
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

navAddPost.addEventListener("click", () => {
  dialog.showModal();
});

dialog.addEventListener("click", (e) => {
  const dialogDimensions = dialog.getBoundingClientRect();
  if (
    e.clientX < dialogDimensions.left ||
    e.clientX > dialogDimensions.right ||
    e.clientY < dialogDimensions.top ||
    e.clientY > dialogDimensions.bottom
  ) {
    dialog.close();
  }
});

cancelBtn.addEventListener("click", () => {
  dialog.close();
});

uploadBtn.addEventListener("click", () => {
  dialog.showModal();
});
