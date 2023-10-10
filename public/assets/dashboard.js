var modal = document.getElementById('exampleModal');
const video = document.querySelector("#v1");
if (modal.classList.contains('show')) {
    console.log('is show');
} else {
    video.pause();
}