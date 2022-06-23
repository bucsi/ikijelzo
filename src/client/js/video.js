import { ctx, canvas, width, height } from "./canvas.js"

export default function renderVideo(url) {
    let video = document.createElement("video")
    video.loop = false
    video.muted = true
    video.autoplay = false
    video.addEventListener("canplay", () => {
        canvas.classList.remove("hide")
        video.play()
        requestAnimationFrame(() => drawVideo(video))
    })
    video.setAttribute("src", url)
    return video
}

function drawVideo(video) {
    ctx.clearRect(0, 0, width, height)
    ctx.drawImage(video, 0, 0)
    if (!video.paused) {
        requestAnimationFrame(() => drawVideo(video))
    }
}
