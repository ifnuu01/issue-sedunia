const uploadBtn = document.querySelector(".btn-upload-modal");
const dialog = document.querySelector(".dialog");
const cancelBtn = document.querySelector(".cancel-post");
const navAddPost = document.querySelector(".nav-add-post");
const homeIcon = document.querySelector(".home-icon");
const searchIcon = document.querySelector(".search-icon");
const profileIcon = document.querySelector(".profile-icon");
const settingIcon = document.querySelector(".setting-icon");
const musicContainer = document.querySelector(".music-container");
const musicToggler = document.querySelector(".music-toggler");

const audioSources = [
  { src: "assets/musics/rain.mp3", label: "Rain" },
  { src: "assets/musics/campire.mp3", label: "Campire" },
  { src: "assets/musics/cafe.mp3", label: "Cafe" },
  { src: "assets/musics/delta.mp3", label: "Delta" },
  { src: "assets/musics/theta.mp3", label: "Theta" },
  { src: "assets/musics/milk-tea.m4a", label: "Milk Tea" },
];

musicToggler.addEventListener("click", () => {
  musicContainer.classList.toggle("hidden");
});

audioSources.forEach((audioData, index) => {
  musicContainer.insertAdjacentHTML(
    "beforeend",
    `
        <div>
            <button type="button" class="music-player" data-index="${index}">
                <img src="assets/icons/play.svg" alt="Controller">
                <label for="${audioData.label}">${audioData.label}</label>
            </button>
            <input type="range" name="${audioData.label}" id="${audioData.label}" min="0" max="100" value="0">
        </div>
    `
  );
});

const musicBtns = document.querySelectorAll(".music-player");

musicBtns.forEach((button, index) => {
  const audio = new Audio(audioSources[index].src);
  const volumeSlider = button.nextElementSibling;

  button.addEventListener("click", () => {
    if (audio.paused) {
      volumeSlider.value = audio.volume * 100;
      audio.play();
      button.querySelector("img").src = "assets/icons/pause.svg";
    } else {
      audio.pause();
      button.querySelector("img").src = "assets/icons/play.svg";
    }
  });

  volumeSlider.addEventListener("input", (event) => {
    audio.volume = event.target.value / 100;
  });
});

const pathname = window.location.pathname;

if (pathname == "/issue-sedunia/" || pathname == "/issue-sedunia/index.php") {
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
