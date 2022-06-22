import config from "./conf.js"
import load from "./load.js"
import renderVideo from "./video.js"
import renderPicture from "./picture.js"
import { secToMs, sleep } from "./util.js"
import { canvas } from "./canvas.js"

let video = null
let slide = {}
let prev_file = null
async function main() {
    prev_file = slide.file
    slide = await load(slide.id)

    if (slide.file === prev_file) {
        setTimeout(main, secToMs(config.timeout))
        return
    }

    console.log(slide)
    canvas.classList.add("hide")
    await sleep(secToMs(config.delay))

    if (slide.video) {
        video = renderVideo(slide.file)
        video.addEventListener("ended", () => {
            video = null
            main()
        })
    } else {
        renderPicture(slide.file)
        setTimeout(main, secToMs(slide.duration))
    }
}

main()

export { main, video }
