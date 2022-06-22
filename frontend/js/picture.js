import { ctx, canvas, width, height } from "./canvas.js"

export default function renderPicture(url) {
    const img = document.createElement("img")
    img.addEventListener("load", () => {
        canvas.classList.remove("hide")
        ctx.drawImage(img, 0, 0)
    })
    img.setAttribute("src", url)
    ctx.clearRect(0, 0, width, height)
}
